<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\XmlRpc;

use Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class XmlRpcDecoder implements ContextAwareDecoderInterface
{
    public const FORMAT = 'xmlrpc';

    public const CTX_XMLRPC_ENCODING = 'xmlrpc_encoding';

    private array $defaultContext = [
        self::CTX_XMLRPC_ENCODING => 'UTF-8',
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    public function supportsDecoding($format, array $context = []): bool
    {
        return $format === self::FORMAT;
    }

    /**
     * @return array|integer|string|boolean
     */
    public function decode(string $data, string $format, array $context = []): mixed
    {
        if ('' === trim($data)) {
            throw new UnexpectedValueException('Invalid XML data, it can not be empty.');
        }

        $encoding = $context[self::CTX_XMLRPC_ENCODING] ?? $this->defaultContext[self::CTX_XMLRPC_ENCODING];

        /** @var array|integer|string|boolean $decoded */
        $decoded = xmlrpc_decode($data, $encoding);
        return $decoded;
    }
}
