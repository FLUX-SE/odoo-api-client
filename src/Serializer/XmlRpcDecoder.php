<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class XmlRpcDecoder implements ContextAwareDecoderInterface
{
    public const FORMAT = 'xmlrpc';

    public const CTX_XMLRPC_ENCODING = 'xmlrpc_encoding';

    /**
     * @var string[]
     */
    private $defaultContext = [
        self::CTX_XMLRPC_ENCODING => 'UTF-8',
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    public function supportsDecoding($format, array $context = [])
    {
        return $format === self::FORMAT;
    }

    public function decode($data, $format, array $context = [])
    {
        if ('' === trim($data)) {
            throw new UnexpectedValueException('Invalid XML data, it can not be empty.');
        }

        $encoding = $context[self::CTX_XMLRPC_ENCODING] ?? $this->defaultContext[self::CTX_XMLRPC_ENCODING];

        return xmlrpc_decode($data, $encoding);
    }
}
