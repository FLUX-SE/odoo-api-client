<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Serializer;

final class XmlRpcSerializerHelper implements XmlRpcSerializerHelperInterface
{
    private string $encoding = 'UTF-8';

    public function __construct(
        private Serializer $serializer,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

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

    public function deserializeResponseBody(StreamInterface $body, string $type)
    {
        return $this->serializer->deserialize(
            $body->__toString(),
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
