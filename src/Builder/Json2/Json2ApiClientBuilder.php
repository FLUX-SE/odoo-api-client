<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Builder\Json2;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactory;
use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\Json2\Json2Client;
use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelManager;
use FluxSE\OdooApiClient\Operations\Json2\Json2InspectionOperations;
use FluxSE\OdooApiClient\Operations\Json2\Json2ObjectOperations;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapperInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\InspectionCallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\InspectionCallMapperInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistryInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ResultMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ResultMapperInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface as ExecuteKwOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use FluxSE\OdooApiClient\Provider\ModelFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Codec;
use FluxSE\OdooApiClient\Serializer\Json2\Json2CodecInterface;
use FluxSE\OdooApiClient\Serializer\JsonRpc\JsonRpcSerializerHelper;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Symfony\Component\Serializer\Serializer;

/** Opt-in JSON-2 composition root; it never changes the legacy builder. */
final class Json2ApiClientBuilder
{
    private ?ClientInterface $httpClient = null;

    private ?RequestFactoryInterface $requestFactory = null;

    private ?ResponseFactoryInterface $responseFactory = null;

    private ?StreamFactoryInterface $streamFactory = null;

    private ?UriFactoryInterface $uriFactory = null;

    private ?Serializer $serializer = null;

    private ?Json2CodecInterface $codec = null;

    private ?MethodSignatureRegistryInterface $registry = null;

    private ?CallMapperInterface $callMapper = null;

    private ?InspectionCallMapperInterface $inspectionCallMapper = null;

    private ?ResultMapperInterface $resultMapper = null;

    private ?RequestBodyFactoryInterface $requestBodyFactory = null;

    private ?RpcSerializerHelperInterface $rpcSerializerHelper = null;

    private ?Json2ClientInterface $json2Client = null;

    private ?Json2ObjectOperations $objectOperations = null;

    /** @var array<class-string<ExecuteKwOperationsInterface>, ExecuteKwOperationsInterface> */
    private array $executeKwOperations = [];

    private int $operationsGeneration = 0;

    public function __construct(
        private Json2Connection $connection,
        private string $username = '',
        private string $apiKey = '',
    ) {
        if ('' === $apiKey) {
            throw new \InvalidArgumentException(
                'The JSON-2 builder requires the explicit API key used to create its connection.',
            );
        }

        $this->connection = $connection->withApiKey($apiKey);
    }

    public function buildJson2Client(): Json2ClientInterface
    {
        return $this->json2Client ??= $this->createJson2Client($this->connection);
    }

    public function buildObjectOperations(): Json2ObjectOperations
    {
        if (null === $this->objectOperations) {
            $generation = $this->operationsGeneration;
            $httpClient = $this->buildHttpClient();
            $requestFactory = $this->buildRequestFactory();
            $streamFactory = $this->buildStreamFactory();
            $codec = $this->buildCodec();
            $this->objectOperations = new Json2ObjectOperations(
                $this->connection,
                $this->username,
                $this->apiKey,
                static fn (Json2Connection $connection): Json2ClientInterface => new Json2Client(
                    $httpClient,
                    $requestFactory,
                    $streamFactory,
                    $connection,
                    $codec,
                ),
                function (Json2Connection $connection, string $username, string $apiKey) use ($generation): void {
                    $this->synchronizeConfiguration($generation, $connection, $username, $apiKey);
                },
                $this->buildCallMapper(),
                $this->buildInspectionCallMapper(),
                $this->buildResultMapper(),
                $this->buildResponseFactory(),
                $this->buildStreamFactory(),
                $this->buildUriFactory(),
                $this->buildHttpClient(),
                $this->buildRequestFactory(),
                $this->buildRequestBodyFactory(),
                $this->buildRpcSerializerHelper(),
            );
        }

        return $this->objectOperations;
    }

    /**
     * @template T of ExecuteKwOperationsInterface
     * @param class-string<T> $className
     * @return T
     */
    public function buildExecuteKwOperations(string $className): ExecuteKwOperationsInterface
    {
        /** @var T|null $operations */
        $operations = $this->executeKwOperations[$className] ?? null;
        if (null === $operations) {
            $operations = new $className($this->buildObjectOperations());
            $this->executeKwOperations[$className] = $operations;
        }

        return $operations;
    }

    public function buildRecordOperations(): RecordOperationsInterface
    {
        return $this->buildExecuteKwOperations(RecordOperations::class);
    }

    public function buildRecordListOperations(): RecordListOperationsInterface
    {
        return $this->buildExecuteKwOperations(RecordListOperations::class);
    }

    public function buildInspectionOperations(): Json2InspectionOperations
    {
        return $this->buildExecuteKwOperations(Json2InspectionOperations::class);
    }

    public function buildModelManager(): ModelManager
    {
        return new ModelManager($this->buildSerializer(), $this->buildRecordOperations());
    }

    public function buildModelListManager(?ModelFieldsProviderInterface $modelFieldsProvider = null): ModelListManager
    {
        return new ModelListManager(
            $this->buildSerializer(),
            $this->buildRecordListOperations(),
            $modelFieldsProvider ?? new ModelFieldsProvider(),
        );
    }

    public function buildHttpClient(): ClientInterface
    {
        return $this->httpClient ??= Psr18ClientDiscovery::find();
    }

    public function buildRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory ??= Psr17FactoryDiscovery::findRequestFactory();
    }

    public function buildResponseFactory(): ResponseFactoryInterface
    {
        return $this->responseFactory ??= Psr17FactoryDiscovery::findResponseFactory();
    }

    public function buildStreamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory ??= Psr17FactoryDiscovery::findStreamFactory();
    }

    public function buildUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory ??= Psr17FactoryDiscovery::findUriFactory();
    }

    public function buildSerializer(): Serializer
    {
        return $this->serializer ??= (new SerializerFactory())->create();
    }

    public function buildCodec(): Json2CodecInterface
    {
        return $this->codec ??= new Json2Codec();
    }

    public function buildRegistry(): MethodSignatureRegistryInterface
    {
        return $this->registry ??= new MethodSignatureRegistry();
    }

    public function buildCallMapper(): CallMapperInterface
    {
        return $this->callMapper ??= new CallMapper($this->buildRegistry());
    }

    public function buildInspectionCallMapper(): InspectionCallMapperInterface
    {
        return $this->inspectionCallMapper ??= new InspectionCallMapper($this->buildCallMapper());
    }

    public function buildResultMapper(): ResultMapperInterface
    {
        return $this->resultMapper ??= new ResultMapper();
    }

    public function buildRequestBodyFactory(): RequestBodyFactoryInterface
    {
        return $this->requestBodyFactory ??= new RequestBodyFactory(RequestBody::class);
    }

    public function buildRpcSerializerHelper(): RpcSerializerHelperInterface
    {
        return $this->rpcSerializerHelper ??= new JsonRpcSerializerHelper(
            $this->buildSerializer(),
            $this->buildStreamFactory(),
        );
    }

    public function setHttpClient(?ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
        $this->resetTransportGraph();
    }

    public function setRequestFactory(?RequestFactoryInterface $requestFactory): void
    {
        $this->requestFactory = $requestFactory;
        $this->resetTransportGraph();
    }

    public function setResponseFactory(?ResponseFactoryInterface $responseFactory): void
    {
        $this->responseFactory = $responseFactory;
        $this->resetOperationsGraph();
    }

    public function setStreamFactory(?StreamFactoryInterface $streamFactory): void
    {
        $this->streamFactory = $streamFactory;
        $this->rpcSerializerHelper = null;
        $this->resetTransportGraph();
    }

    public function setUriFactory(?UriFactoryInterface $uriFactory): void
    {
        $this->uriFactory = $uriFactory;
        $this->resetOperationsGraph();
    }

    public function setSerializer(?Serializer $serializer): void
    {
        $this->serializer = $serializer;
        $this->rpcSerializerHelper = null;
        $this->resetOperationsGraph();
    }

    public function setCodec(?Json2CodecInterface $codec): void
    {
        $this->codec = $codec;
        $this->resetTransportGraph();
    }

    public function setRegistry(?MethodSignatureRegistryInterface $registry): void
    {
        $this->registry = $registry;
        $this->callMapper = null;
        $this->inspectionCallMapper = null;
        $this->resetOperationsGraph();
    }

    public function setRequestBodyFactory(?RequestBodyFactoryInterface $requestBodyFactory): void
    {
        $this->requestBodyFactory = $requestBodyFactory;
        $this->resetOperationsGraph();
    }

    public function setRpcSerializerHelper(?RpcSerializerHelperInterface $rpcSerializerHelper): void
    {
        $this->rpcSerializerHelper = $rpcSerializerHelper;
        $this->resetOperationsGraph();
    }

    private function createJson2Client(Json2Connection $connection): Json2ClientInterface
    {
        return new Json2Client(
            $this->buildHttpClient(),
            $this->buildRequestFactory(),
            $this->buildStreamFactory(),
            $connection,
            $this->buildCodec(),
        );
    }

    private function resetTransportGraph(): void
    {
        $this->json2Client = null;
        $this->resetOperationsGraph();
    }

    private function resetOperationsGraph(): void
    {
        ++$this->operationsGeneration;
        $this->objectOperations = null;
        $this->executeKwOperations = [];
    }

    private function synchronizeConfiguration(
        int $generation,
        Json2Connection $connection,
        string $username,
        string $apiKey,
    ): void {
        if ($generation !== $this->operationsGeneration) {
            return;
        }

        $connectionChanged = $this->connection !== $connection || $this->apiKey !== $apiKey;
        $this->connection = $connection;
        $this->username = $username;
        $this->apiKey = $apiKey;

        if ($connectionChanged) {
            $this->json2Client = null;
        }
    }
}
