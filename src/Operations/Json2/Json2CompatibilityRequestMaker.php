<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Operations\Json2\Exception\Json2UnsupportedCallException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Exposes the historical accessor contract without ever serialising or sending
 * an RPC envelope to a JSON-2 endpoint.
 */
final class Json2CompatibilityRequestMaker implements OdooApiRequestMakerInterface
{
    /** @var \Closure(UriInterface): void */
    private \Closure $baseUriSetter;

    /** @var \Closure(): ?ResponseInterface */
    private \Closure $lastResponseProvider;

    /**
     * @param callable(UriInterface): void $baseUriSetter
     * @param callable(): ?ResponseInterface $lastResponseProvider
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        private UriInterface $baseUri,
        callable $baseUriSetter,
        callable $lastResponseProvider,
    ) {
        $this->baseUriSetter = \Closure::fromCallable($baseUriSetter);
        $this->lastResponseProvider = \Closure::fromCallable($lastResponseProvider);
    }

    public function request(string $operationPath, StreamInterface $body): ResponseInterface
    {
        throw new Json2UnsupportedCallException(
            'Raw request-maker calls are unsupported in JSON-2 compatibility mode; use execute_kw() or Json2ClientInterface::call().',
        );
    }

    public function getLastResponse(): ?ResponseInterface
    {
        return ($this->lastResponseProvider)();
    }

    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function getBaseUri(): UriInterface
    {
        return $this->baseUri;
    }

    public function setBaseUri(UriInterface $baseUri): void
    {
        ($this->baseUriSetter)($baseUri);
        $this->baseUri = $baseUri;
    }

    public function isJsonRpc(): bool
    {
        return false;
    }

    public function isXmlRpc(): bool
    {
        return false;
    }
}
