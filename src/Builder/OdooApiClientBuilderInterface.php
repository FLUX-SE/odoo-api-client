<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Builder;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\HttPlug\Factory\OdooHttpClientFactoryInterface;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;
use FluxSE\OdooApiClient\Operations\DbOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\Operations\OperationsInterface;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Serializer\Serializer;

interface OdooApiClientBuilderInterface
{
    public function buildApiRequestMaker(): OdooApiRequestMakerInterface;

    public function buildBaseUri(): UriInterface;

    public function buildOdooHttpClientFactory(): OdooHttpClientFactoryInterface;

    public function buildHttpClient(): ClientInterface;

    public function buildSerializer(): Serializer;

    public function buildRpcSerializerHelper(): RpcSerializerHelperInterface;

    public function buildRequestBodyFactory(): RequestBodyFactoryInterface;

    /**
     * @param class-string<OperationsInterface> $className
     */
    public function buildOperations(string $className): OperationsInterface;

    public function buildDbOperations(): DbOperationsInterface;

    public function buildCommonOperations(): CommonOperationsInterface;

    public function buildObjectOperations(
        string $database,
        string $username,
        string $password
    ): ObjectOperationsInterface;

    /**
     * @template T of ExecuteKwOperationsInterface
     * @param class-string<T> $className
     * @return T
     */
    public function buildExecuteKwOperations(
        string $className,
        string $database,
        string $username,
        string $password
    ): ExecuteKwOperationsInterface;

    public function setBaseHostname(string $baseHostname): void;

    public function getBaseHostname(): string;

    public function getBasePath(): string;

    public function setBasePath(string $basePath): void;

    public function setOdooHttpClientFactory(OdooHttpClientFactoryInterface $odooHttpClientFactory): void;

    public function setOdooApiRequestMaker(OdooApiRequestMakerInterface $odooApiRequestMaker): void;

    public function setSerializer(?Serializer $serializer): void;

    public function setRpcSerializerHelper(?RpcSerializerHelperInterface $rpcSerializerHelper): void;

    public function setHttpClient(?ClientInterface $httpClient): void;

    public function setRequestBodyFactory(?RequestBodyFactoryInterface $requestBodyFactory): void;
}
