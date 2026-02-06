<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\XmlRpc;

use Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class XmlRpcDecoder implements ContextAwareDecoderInterface
{
    public const FORMAT = 'xmlrpc';

    public const CTX_XMLRPC_ENCODING = 'xmlrpc_encoding';

    /** @var array<string, mixed> */
    private array $defaultContext = [
        self::CTX_XMLRPC_ENCODING => 'UTF-8',
    ];

    /** @param array<string, mixed> $defaultContext */
    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    /** @param array<string, mixed> $context */
    public function supportsDecoding($format, array $context = []): bool
    {
        return $format === self::FORMAT;
    }

    /**
     * @param array<string, mixed> $context
     * @return mixed[]|int|string|bool
     */
    public function decode(string $data, string $format, array $context = []): array|bool|int|string
    {
        if ('' === trim($data)) {
            throw new UnexpectedValueException('Invalid XML data, it can not be empty.');
        }

        /** @var string $encoding */
        $encoding = $context[self::CTX_XMLRPC_ENCODING] ?? $this->defaultContext[self::CTX_XMLRPC_ENCODING];

        /** @var mixed[]|int|string|bool $decoded */
        $decoded = xmlrpc_decode($data, $encoding);

        return $decoded;
    }
}
