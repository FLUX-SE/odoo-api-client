<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Message\ResponseInterface;

interface OperationsInterface
{
    public function request(string $method, array $params = []): ResponseInterface;

    public function getEndpointPath(): string;

    public function decode(ResponseInterface $response): array;

    /**
     * @param ResponseInterface $response
     * @param string $model
     *
     * @return mixed
     */
    public function deserializeModel(ResponseInterface $response, string $model);

    public function deserializeArrayOf(ResponseInterface $response, string $type): array;

    public function deserializeBoolean(ResponseInterface $response): bool;

    public function deserializeInteger(ResponseInterface $response): int;

    public function deserializeFloat(ResponseInterface $response): float;

    public function deserializeString(ResponseInterface $response): string;

    public function getApiRequestMaker(): OdooApiRequestMakerInterface;

    public function getRequestBodyFactory(): RequestBodyFactoryInterface;

    public function getXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface;
}
