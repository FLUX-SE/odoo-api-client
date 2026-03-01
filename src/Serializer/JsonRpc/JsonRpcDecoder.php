<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\JsonRpc;

use JsonException;
use Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class JsonRpcDecoder implements ContextAwareDecoderInterface
{
    public const FORMAT = 'jsonrpc';

    public const CTX_JSONRPC_DECODE_DEPTH = 'jsonrpc_decode_depth';

    /**
     * @var array<string, mixed>
     */
    private array $defaultContext = [
        self::CTX_JSONRPC_DECODE_DEPTH => 512,
    ];

    /**
     * @param array<string, mixed> $defaultContext
     */
    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supportsDecoding($format, array $context = []): bool
    {
        return $format === self::FORMAT;
    }

    /**
     * @param array<string, mixed> $context
     * @return mixed[]|int|string|bool
     *
     * @throws JsonException
     */
    public function decode(string $data, string $format, array $context = []): array|int|string|bool
    {
        if ('' === trim($data)) {
            throw new UnexpectedValueException('Invalid JSON data, it can not be empty.');
        }

        /** @var int<1, max> $depth */
        $depth = $context[self::CTX_JSONRPC_DECODE_DEPTH] ?? $this->defaultContext[self::CTX_JSONRPC_DECODE_DEPTH];

        /** @var array{ error?: mixed[]|int|string|bool, result?: mixed[]|int|string|bool }|integer|string|bool $decoded */
        $decoded = json_decode($data, true, $depth, JSON_THROW_ON_ERROR);

        if (isset($decoded['error'])) {
            return $decoded['error'];
        }

        if (isset($decoded['result'])) {
            return $decoded['result'];
        }

        return $decoded;
    }
}
