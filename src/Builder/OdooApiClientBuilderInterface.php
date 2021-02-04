<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\HttPlug\Factory\OdooHttpClientFactoryInterface;
use Flux\OdooApiClient\Operations\CommonOperationsInterface;
use Flux\OdooApiClient\Operations\DbOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Flux\OdooApiClient\Operations\OperationsInterface;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
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

    public function buildXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface;

    public function buildRequestBodyFactory(): RequestBodyFactoryInterface;

    public function buildOperations(string $className): OperationsInterface;
    public function buildDbOperations(): DbOperationsInterface;
    public function buildCommonOperations(): CommonOperationsInterface;
    public function buildObjectOperations(
        string $database,
        string $username,
        string $password
    ): ObjectOperationsInterface;
    public function buildExecuteKwOperations(
        string $className,
        string $database,
        string $username,
        string $password
    ): ExecuteKwOperationsInterface;

    public function setBaseHostname(string $hostname): void;

    public function getBaseHostname(): string;

    public function getBasePath(): string;

    public function setBasePath(string $basePath): void;

    public function setOdooHttpClientFactory(OdooHttpClientFactoryInterface $odooHttpClientFactory): void;

    public function setOdooApiRequestMaker(OdooApiRequestMakerInterface $odooApiRequestMaker): void;

    public function setSerializer(?Serializer $serializer): void;

    public function setXmlRpcSerializerHelper(?XmlRpcSerializerHelperInterface $xmlRpcSerializerHelper): void;

    public function setHttpClient(?ClientInterface $httpClient): void;

    public function setRequestBodyFactory(?RequestBodyFactoryInterface $requestBodyFactory): void;
}
