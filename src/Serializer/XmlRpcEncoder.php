<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

final class XmlRpcEncoder implements EncoderInterface
{
    public const FORMAT = 'xmlrpc';

    public const CTX_XMLRPC_ENCODING = 'xmlrpc_encoding';
    public const CTX_XMLRPC_ESCAPING = 'xmlrpc_escaping';

    /**
     * @var string[]
     */
    private $defaultContext = [
        self::CTX_XMLRPC_ENCODING => 'UTF-8',
        self::CTX_XMLRPC_ESCAPING => 'markup',
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    /**
     *
     */
    public function supportsEncoding($format)
    {
        return $format === self::FORMAT;
    }

    /**
     *
     */
    public function encode($data, $format, array $context = [])
    {
        if (false === is_array($data)) {
            throw new UnexpectedValueException(sprintf(
                'The $data should be an array, "%s" given !',
                gettype($data)
            ));
        }

        $method = $data['method'] ?? null;
        if (null === $method) {
            throw new UnexpectedValueException('A "method" is required required !');
        }

        $encoding = $context[self::CTX_XMLRPC_ENCODING] ?? $this->defaultContext[self::CTX_XMLRPC_ENCODING];
        $escaping = $context[self::CTX_XMLRPC_ESCAPING] ?? $this->defaultContext[self::CTX_XMLRPC_ESCAPING];
        $params = $data['params'] ?? [];
        $outputOptions = array_merge(
            $this->defaultContext,
            [
                'version' => self::FORMAT,
                'encoding' => $encoding,
                'escaping' => $escaping,
            ]
        );

        return xmlrpc_encode_request($method, $params, $outputOptions);
    }
}
