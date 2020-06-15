<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
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

    public function setHostname(string $hostname): void;

    public function getHostname(): string;
}