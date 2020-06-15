<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Operations\CommonOperationsInterface;
use Flux\OdooApiClient\Operations\DbOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Flux\OdooApiClient\Operations\OperationsInterface;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\Serializer\Serializer;

interface OdooApiClientBuilderInterface
{
    public function buildApiRequestMaker(): OdooApiRequestMakerInterface;

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

    public function setHostname(string $hostname): void;

    public function getHostname(): string;
}