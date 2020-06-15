<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Api\RequestBodyInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

final class XmlRpcSerializerHelper implements XmlRpcSerializerHelperInterface
{
    /** @var Serializer */
    private $serializer;
    /** @var StreamFactoryInterface */
    private $streamFactory;

    /** @var string */
    private $encoding = 'UTF-8';

    public function __construct(
        Serializer $serializer,
        StreamFactoryInterface $streamFactory
    ) {
        $this->serializer = $serializer;
        $this->streamFactory = $streamFactory;
    }

    /**
     * {@inheritDoc}
     *
     * @throws ExceptionInterface
     */
    public function serializeRequestBody(RequestBodyInterface $requestBody): StreamInterface
    {
        $body = $this->serializer->serialize(
            $requestBody,
            XmlRpcEncoder::FORMAT,
            [
                XmlRpcEncoder::CTX_XMLRPC_ENCODING => $this->encoding,
            ]
        );

        return $this->streamFactory->createStream($body);
    }

    /**
     * {@inheritDoc}
     *
     * @throws ExceptionInterface
     */
    public function deserializeResponseBody(StreamInterface $body, string $type)
    {
        return $this->serializer->deserialize(
            $body,
            $type,
            XmlRpcDecoder::FORMAT,
            [
                XmlRpcDecoder::CTX_XMLRPC_ENCODING => $this->encoding,
            ]
        );
    }

    public function decodeResponseBody(StreamInterface $body)
    {
        return $this->serializer->decode(
            $body->__toString(),
            XmlRpcDecoder::FORMAT,
            [
                XmlRpcDecoder::CTX_XMLRPC_ENCODING => $this->encoding,
            ]
        );
    }

    public function getEncoding(): string
    {
        return $this->encoding;
    }

    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}