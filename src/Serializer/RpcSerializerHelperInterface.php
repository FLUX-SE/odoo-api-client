<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Serializer;

interface RpcSerializerHelperInterface
{
    public function serializeRequestBody(RequestBodyInterface $requestBody): StreamInterface;

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    public function deserializeResponseBody(StreamInterface $body, string $type);

    /**
     * @return array|integer|string|boolean
     */
    public function decodeResponseBody(StreamInterface $body);

    public function getSerializer(): Serializer;
}
