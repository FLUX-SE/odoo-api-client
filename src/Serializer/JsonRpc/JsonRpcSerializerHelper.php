<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\JsonRpc;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Serializer;

final class JsonRpcSerializerHelper implements JsonRpcSerializerHelperInterface
{
    private string $version = '2.0';

    private int $decodeDepth = 512;

    public function __construct(private Serializer $serializer, private StreamFactoryInterface $streamFactory)
    {
    }

    public function serializeRequestBody(RequestBodyInterface $requestBody): StreamInterface
    {
        $body = $this->serializer->serialize(
            $requestBody,
            JsonRpcEncoder::FORMAT,
            [
                JsonRpcEncoder::CTX_JSONRPC_VERSION => $this->version,
            ]
        );

        return $this->streamFactory->createStream($body);
    }

    public function deserializeResponseBody(StreamInterface $body, string $type)
    {
        return $this->serializer->deserialize(
            $body->__toString(),
            $type,
            JsonRpcDecoder::FORMAT,
            [
                JsonRpcDecoder::CTX_JSONRPC_DECODE_DEPTH => $this->decodeDepth,
            ]
        );
    }

    public function decodeResponseBody(StreamInterface $body)
    {
        return $this->serializer->decode(
            $body->__toString(),
            JsonRpcDecoder::FORMAT,
            [
                JsonRpcDecoder::CTX_JSONRPC_DECODE_DEPTH => $this->decodeDepth,
            ]
        );
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getDecodeDepth(): int
    {
        return $this->decodeDepth;
    }

    public function setDecodeDepth(int $decodeDepth): void
    {
        $this->decodeDepth = $decodeDepth;
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}
