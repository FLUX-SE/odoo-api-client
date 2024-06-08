<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Builder;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactory;
use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMaker;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\HttpClient\Factory\OdooHttpClientFactory;
use FluxSE\OdooApiClient\HttpClient\Factory\OdooHttpClientFactoryInterface;
use FluxSE\OdooApiClient\Operations\CommonOperations;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;
use FluxSE\OdooApiClient\Operations\DbOperations;
use FluxSE\OdooApiClient\Operations\DbOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use FluxSE\OdooApiClient\Operations\ObjectOperations;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\Operations\OperationsInterface;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\JsonRpc\JsonRpcSerializerHelper;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use FluxSE\OdooApiClient\Serializer\XmlRpc\XmlRpcSerializerHelper;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Serializer\Serializer;
use UnexpectedValueException;

final class OdooApiClientBuilder implements OdooApiClientBuilderInterface
{
    private string $baseHostname;

    private string $basePath;

    private ?OdooHttpClientFactoryInterface $odooHttpClientFactory = null;

    private ?UriInterface $baseUri = null;

    private ?OdooApiRequestMakerInterface $odooApiRequestMaker = null;

    private ?RpcSerializerHelperInterface $rpcSerializerHelper = null;

    private ?ClientInterface $httpClient = null;

    private ?Serializer $serializer = null;

    private ?RequestBodyFactoryInterface $requestBodyFactory = null;

    /** @var OperationsInterface[] */
    private array $operations = [];

    private array $executeKwOperations = [];

    public function __construct(
        string $baseHostname,
        string $basePath = OdooApiRequestMakerInterface::BASE_JSONRPC_PATH,
    ) {
        $this->baseHostname = rtrim($baseHostname, '/');
        $this->basePath = trim($basePath, '/');
    }

    public function buildApiRequestMaker(): OdooApiRequestMakerInterface
    {
        if (null === $this->odooApiRequestMaker) {
            $this->odooApiRequestMaker = new OdooApiRequestMaker(
                $this->buildHttpClient(),
                Psr17FactoryDiscovery::findRequestFactory(),
                $this->buildBaseUri()
            );
        }

        return $this->odooApiRequestMaker;
    }

    public function buildBaseUri(): UriInterface
    {
        if (null === $this->baseUri) {
            $uriFactory = Psr17FactoryDiscovery::findUriFactory();
            $this->baseUri = $uriFactory->createUri(sprintf(
                '%s/%s',
                $this->baseHostname,
                $this->basePath
            ));
        }

        return $this->baseUri;
    }

    public function buildOdooHttpClientFactory(): OdooHttpClientFactoryInterface
    {
        if (null === $this->odooHttpClientFactory) {
            $this->odooHttpClientFactory = new OdooHttpClientFactory(
                $this->buildRpcSerializerHelper()
            );
        }

        return $this->odooHttpClientFactory;
    }

    public function buildHttpClient(): ClientInterface
    {
        if (null === $this->httpClient) {
            $odooHttpClientFactory = $this->buildOdooHttpClientFactory();
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

    public function buildRpcSerializerHelper(): RpcSerializerHelperInterface
    {
        if (null === $this->rpcSerializerHelper) {
            $serializer = $this->buildSerializer();
            $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
            $this->rpcSerializerHelper = new JsonRpcSerializerHelper($serializer, $streamFactory);

            if ($this->basePath === OdooApiRequestMakerInterface::BASE_XMLRPC_PATH) {
                $this->rpcSerializerHelper = new XmlRpcSerializerHelper($serializer, $streamFactory);
            }
        }

        return $this->rpcSerializerHelper;
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
                $this->buildRpcSerializerHelper()
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
            $operations = new $className(
                $this->buildObjectOperations(
                    $database,
                    $username,
                    $password
                )
            );
            $this->executeKwOperations[$className] = $operations;
        }

        return $operations;
    }

    public function getBaseHostname(): string
    {
        return $this->baseHostname;
    }

    public function setBaseHostname(string $baseHostname): void
    {
        $this->baseHostname = $baseHostname;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    public function setOdooHttpClientFactory(OdooHttpClientFactoryInterface $odooHttpClientFactory): void
    {
        $this->odooHttpClientFactory = $odooHttpClientFactory;
    }

    public function setOdooApiRequestMaker(OdooApiRequestMakerInterface $odooApiRequestMaker): void
    {
        $this->odooApiRequestMaker = $odooApiRequestMaker;
    }

    public function setRpcSerializerHelper(?RpcSerializerHelperInterface $rpcSerializerHelper): void
    {
        $this->rpcSerializerHelper = $rpcSerializerHelper;
    }

    public function setHttpClient(?ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function setSerializer(?Serializer $serializer): void
    {
        $this->serializer = $serializer;
    }

    public function setRequestBodyFactory(?RequestBodyFactoryInterface $requestBodyFactory): void
    {
        $this->requestBodyFactory = $requestBodyFactory;
    }
}
