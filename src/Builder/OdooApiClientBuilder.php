<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactory;
use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMaker;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Api\RequestBody;
use Flux\OdooApiClient\HttPlug\Factory\OdooHttpClientFactory;
use Flux\OdooApiClient\Serializer\Factory\SerializerFactory;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelper;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\Serializer\Serializer;

final class OdooApiClientBuilder implements OdooApiClientBuilderInterface
{
    /** @var string */
    private $hostname;

    /** @var OdooApiRequestMakerInterface */
    private $odooApiRequestMaker;
    /** @var XmlRpcSerializerHelperInterface|null */
    private $xmlRpcSerializerHelper;
    /** @var ClientInterface|null */
    private $httpClient;
    /** @var Serializer|null */
    private $serializer;
    /** @var RequestBodyFactoryInterface|null */
    private $requestBodyFactory;

    public function __construct(string $hostname)
    {
        $this->hostname = $hostname;
    }

    public function buildApiRequestMaker(): OdooApiRequestMakerInterface
    {
        if (null === $this->odooApiRequestMaker) {
            $this->odooApiRequestMaker = new OdooApiRequestMaker(
                $this->buildHttpClient(),
                Psr17FactoryDiscovery::findRequestFactory()
            );
        }

        return $this->odooApiRequestMaker;
    }

    public function buildHttpClient(): ClientInterface
    {
        if (null === $this->httpClient) {
            $odooHttpClientFactory = new OdooHttpClientFactory(
                $this->buildXmlRpcSerializerHelper(),
                $this->hostname
            );
            $this->httpClient = $odooHttpClientFactory->create();
        }

        return $this->httpClient;
    }

    public function buildSerializer(): Serializer
    {
        if (null === $this->serializer) {
            $serializerFactory = new SerializerFactory();
            $this->serializer = $serializerFactory->create();
        }

        return $this->serializer;
    }

    public function buildXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface
    {
        if (null === $this->xmlRpcSerializerHelper) {
            $this->xmlRpcSerializerHelper = new XmlRpcSerializerHelper(
                $this->buildSerializer(),
                Psr17FactoryDiscovery::findStreamFactory()
            );
        }

        return $this->xmlRpcSerializerHelper;
    }

    public function buildRequestBodyFactory(): RequestBodyFactoryInterface
    {
        if (null === $this->requestBodyFactory) {
            $this->requestBodyFactory = new RequestBodyFactory(RequestBody::class);
        }

        return $this->requestBodyFactory;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): void
    {
        $this->hostname = $hostname;
    }
}