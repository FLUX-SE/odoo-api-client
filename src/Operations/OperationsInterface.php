<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Message\ResponseInterface;

interface OperationsInterface
{
    public function request(string $method, array $params = []): ResponseInterface;

    public function getEndpointPath(): string;

    public function decode(ResponseInterface $response): array;

    /**
     * @param class-string<object> $model
     *
     * @return mixed
     */
    public function deserializeModel(ResponseInterface $response, string $model);

    /**
     * @return string[]
     */
    public function deserializeArrayOfString(ResponseInterface $response): array;

    public function deserializeBoolean(ResponseInterface $response): bool;

    public function deserializeInteger(ResponseInterface $response): int;

    public function deserializeFloat(ResponseInterface $response): float;

    public function deserializeString(ResponseInterface $response): string;

    public function getApiRequestMaker(): OdooApiRequestMakerInterface;

    public function getRequestBodyFactory(): RequestBodyFactoryInterface;

    public function getXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface;
}
