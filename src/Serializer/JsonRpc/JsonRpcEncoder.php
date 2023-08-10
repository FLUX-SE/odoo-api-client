<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\JsonRpc;

use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class JsonRpcEncoder implements EncoderInterface
{
    public const FORMAT = 'jsonrpc';

    public const CTX_JSONRPC_VERSION = 'jsonrpc_version';

    private array $defaultContext = [
        self::CTX_JSONRPC_VERSION => '2.0',
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    public function supportsEncoding($format): bool
    {
        return $format === self::FORMAT;
    }

    public function encode($data, string $format, array $context = []): string
    {
        if (false === is_array($data)) {
            throw new UnexpectedValueException(sprintf(
                'The $data should be an array, "%s" given !',
                gettype($data)
            ));
        }

        $method = $data['method'] ?? null;
        if (null === $method) {
            throw new UnexpectedValueException('A "method" is required !');
        }

        $params = $data['params'] ?? [];

        $version = $context[self::CTX_JSONRPC_VERSION] ?? $this->defaultContext[self::CTX_JSONRPC_VERSION];

        return json_encode([
            'jsonrpc' => $version,
            'method' => $method,
            'params' => $params,
        ], JSON_THROW_ON_ERROR);
    }
}
