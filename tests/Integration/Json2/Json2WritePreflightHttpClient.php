<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use LogicException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Integration-only safety boundary: unknown methods are considered mutating.
 *
 * The delegate receives the business request exactly once and only after the
 * target server has proved, through an authenticated read, that it is Odoo 19.
 */
final class Json2WritePreflightHttpClient implements ClientInterface
{
    private const READ_ONLY_METHODS = [
        'check_access_rights',
        'context_get',
        'default_get',
        'fields_get',
        'read',
        'search',
        'search_count',
        'search_read',
    ];

    private ?string $validatedTarget = null;

    public function __construct(
        private readonly ClientInterface $client,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly bool $writesAllowed = true,
        private readonly ?Json2Connection $authorizedConnection = null,
    ) {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        if (!$this->isReadOnly($request)) {
            if (!$this->writesAllowed) {
                throw new LogicException('JSON-2 integration writes are not authorized by the local safety gates.');
            }

            $this->assertOdoo19($request);
        }

        return $this->client->sendRequest($request);
    }

    private function assertOdoo19(RequestInterface $businessRequest): void
    {
        $path = $businessRequest->getUri()->getPath();
        $json2Position = strpos($path, '/json/2/');
        if (false === $json2Position) {
            throw new LogicException('The write preflight requires a JSON-2 endpoint.');
        }

        $preflightPath = substr($path, 0, $json2Position)
            . '/json/2/ir.module.module/search_read';
        $preflightUri = $businessRequest->getUri()
            ->withPath($preflightPath)
            ->withQuery('')
            ->withFragment('');
        if (null !== $this->authorizedConnection
            && ((string) $preflightUri !== $this->authorizedConnection->getEndpointUri('ir.module.module', 'search_read')
                || $businessRequest->getHeaderLine('X-Odoo-Database') !== $this->authorizedConnection->getDatabase())
        ) {
            throw new LogicException('The write target differs from the explicitly authorized integration connection.');
        }
        $target = hash('sha256', implode("\0", [
            (string) $preflightUri,
            $businessRequest->getHeaderLine('X-Odoo-Database'),
            $businessRequest->getHeaderLine('Authorization'),
        ]));
        if ($target === $this->validatedTarget) {
            return;
        }
        $this->validatedTarget = null;
        $preflightBody = json_encode([
            'domain' => [['name', '=', 'base']],
            'fields' => ['installed_version'],
            'limit' => 1,
        ], JSON_THROW_ON_ERROR);
        $preflightRequest = $businessRequest
            ->withUri($preflightUri)
            ->withBody($this->streamFactory->createStream($preflightBody))
            ->withoutHeader('Content-Length')
            ->withoutHeader('Content-Encoding')
            ->withHeader('Content-Type', 'application/json; charset=utf-8');

        $response = $this->client->sendRequest($preflightRequest);
        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw new LogicException('The read-only Odoo 19 preflight was rejected by the server.');
        }

        try {
            $modules = json_decode((string) $response->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            throw new LogicException('The read-only Odoo 19 preflight returned invalid JSON.');
        }

        if (!is_array($modules)
            || 1 !== count($modules)
            || !is_array($modules[0] ?? null)
            || !is_string($modules[0]['installed_version'] ?? null)
        ) {
            throw new LogicException('The read-only Odoo 19 preflight returned an invalid version response.');
        }

        if (!str_starts_with($modules[0]['installed_version'], '19.')) {
            throw new LogicException('The write target did not prove that it runs Odoo 19.');
        }

        $this->validatedTarget = $target;
    }

    private function isReadOnly(RequestInterface $request): bool
    {
        $path = rtrim($request->getUri()->getPath(), '/');
        $method = rawurldecode(substr($path, (int) strrpos($path, '/') + 1));

        return in_array($method, self::READ_ONLY_METHODS, true);
    }
}
