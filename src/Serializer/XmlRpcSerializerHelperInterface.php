<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Serializer;

interface XmlRpcSerializerHelperInterface
{
    public function serializeRequestBody(RequestBodyInterface $requestBody): StreamInterface;

    /**
     * @return mixed
     */
    public function deserializeResponseBody(StreamInterface $body, string $type);

    /**
     * @return mixed
     */
    public function decodeResponseBody(StreamInterface $body);

    public function getEncoding(): string;

    public function setEncoding(string $encoding): void;

    public function getSerializer(): Serializer;
}
