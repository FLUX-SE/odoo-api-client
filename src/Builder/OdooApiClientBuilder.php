<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactory;
use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMaker;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Api\RequestBody;
use Flux\OdooApiClient\HttPlug\Factory\OdooHttpClientFactory;
use Flux\OdooApiClient\Operations\CommonOperations;
use Flux\OdooApiClient\Operations\CommonOperationsInterface;
use Flux\OdooApiClient\Operations\DbOperations;
use Flux\OdooApiClient\Operations\DbOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use Flux\OdooApiClient\Operations\ObjectOperations;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Flux\OdooApiClient\Operations\OperationsInterface;
use Flux\OdooApiClient\Serializer\Factory\SerializerFactory;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelper;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\Serializer\Serializer;
use UnexpectedValueException;

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
    /** @var OperationsInterface[] */
    private $operations = [];
    /** @var ExecuteKwOperationsInterface[] */
    private $executeKwOperations = [];

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

    public function buildOperations(string $className): OperationsInterface
    {
        $operations = $this->operations[$className] ?? null;
        if (null === $operations) {

            $this->operations[$className] = new $className(
                $this->buildApiRequestMaker(),
                $this->buildRequestBodyFactory(),
                $this->buildXmlRpcSerializerHelper()
            );
        }

        return $this->operations[$className];
    }

    public function buildDbOperations(): DbOperationsInterface
    {
        $operations = $this->buildOperations(DbOperations::class);
        if (false === $operations instanceof DbOperationsInterface) {
            throw new UnexpectedValueException(sprintf(
                'The operations should be an instanceof "%s" !',
                DbOperationsInterface::class
            ));
        }
        return $operations;
    }

    public function buildCommonOperations(): CommonOperationsInterface
    {
        $operations = $this->buildOperations(CommonOperations::class);
        if (false === $operations instanceof CommonOperationsInterface) {
            throw new UnexpectedValueException(sprintf(
                'The operations should be an instanceof "%s" !',
                CommonOperationsInterface::class
            ));
        }
        return $operations;
    }

    public function buildObjectOperations(
        string $database,
        string $username,
        string $password
    ): ObjectOperationsInterface {
        $className = ObjectOperations::class;
        $operations = $this->operations[$className] ?? null;
        if (null === $operations) {

            $this->operations[$className] = new ObjectOperations(
                $database,
                $username,
                $password,
                $this->buildCommonOperations()
            );
        }

        $operations = $this->operations[$className];
        if (false === $operations instanceof ObjectOperationsInterface) {
            throw new UnexpectedValueException(sprintf(
                'The operations should be an instanceof "%s" !',
                ObjectOperationsInterface::class
            ));
        }

        return $operations;
    }

    public function buildExecuteKwOperations(
        string $className,
        string $database,
        string $username,
        string $password
    ): ExecuteKwOperationsInterface {
        $operations = $this->executeKwOperations[$className] ?? null;
        if (null === $operations) {
            $this->executeKwOperations[$className] = new $className(
                $this->buildObjectOperations(
                    $database,
                    $username,
                    $password
                )
            );
        }

        return $this->executeKwOperations[$className];
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