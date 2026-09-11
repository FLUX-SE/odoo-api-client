<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2HttpException;
use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Operations\Json2\Exception\Json2CompatibilityException;
use FluxSE\OdooApiClient\Operations\Json2\Exception\Json2UnsupportedCallException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapperInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\InspectionCallMapperInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MappedCall;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ResultMapperInterface;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Client\Common\Exception\ServerErrorException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

final class Json2ObjectOperations implements ObjectOperationsInterface
{
    public const COMPATIBILITY_RESPONSE_ID = 'json2-compat';

    private ?int $uid = null;

    private ?ResponseInterface $lastResponse = null;

    private Json2ClientInterface $json2Client;

    private OdooApiRequestMakerInterface $apiRequestMaker;

    /** @var \Closure(Json2Connection): Json2ClientInterface */
    private \Closure $json2ClientFactory;

    /** @var \Closure(Json2Connection, string, string): void */
    private \Closure $configurationUpdated;

    /**
     * The historical password name denotes the JSON-2 API key. The username
     * is only an unverified compatibility label and is never sent to Odoo.
     *
     * @param callable(Json2Connection): Json2ClientInterface $json2ClientFactory
     * @param callable(Json2Connection, string, string): void $configurationUpdated
     */
    public function __construct(
        private Json2Connection $connection,
        private string $username,
        private string $password,
        callable $json2ClientFactory,
        callable $configurationUpdated,
        private readonly CallMapperInterface $callMapper,
        private readonly InspectionCallMapperInterface $inspectionCallMapper,
        private readonly ResultMapperInterface $resultMapper,
        private readonly ResponseFactoryInterface $responseFactory,
        private readonly StreamFactoryInterface $streamFactory,
        UriFactoryInterface $uriFactory,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        private readonly RequestBodyFactoryInterface $requestBodyFactory,
        private readonly RpcSerializerHelperInterface $rpcSerializerHelper,
    ) {
        $this->json2ClientFactory = \Closure::fromCallable($json2ClientFactory);
        $this->configurationUpdated = \Closure::fromCallable($configurationUpdated);
        $this->connection = $connection->withApiKey($password);
        $this->json2Client = ($this->json2ClientFactory)($this->connection);
        $this->apiRequestMaker = new Json2CompatibilityRequestMaker(
            $httpClient,
            $requestFactory,
            $uriFactory->createUri($this->connection->getBaseUri()),
            function (UriInterface $baseUri): void {
                $this->replaceConnection($this->connection->withBaseUri((string) $baseUri));
            },
            fn (): ?ResponseInterface => $this->lastResponse,
        );
    }

    public function getEndpointPath(): string
    {
        return '/object';
    }

    public function getService(): string
    {
        return 'object';
    }

    public function execute_kw(
        string $modelName,
        string $methodName,
        array $arguments = [],
        array $options = []
    ): ResponseInterface {
        return $this->executeMappedCall($this->callMapper->map(
            $modelName,
            $methodName,
            $arguments,
            $options,
        ));
    }

    /**
     * The only supported facade request grammar is:
     * request('execute_kw', [$model, $method, $arguments?, $options?]).
     */
    public function request(string $method, array $params = []): ResponseInterface
    {
        if ('execute_kw' !== $method || !array_is_list($params) || count($params) < 2 || count($params) > 4) {
            throw new Json2UnsupportedCallException(
                'JSON-2 compatibility request() only accepts execute_kw with [model, method, arguments?, options?].',
            );
        }

        [$modelName, $methodName] = $params;
        $arguments = $params[2] ?? [];
        $options = $params[3] ?? [];
        if (!is_string($modelName) || !is_string($methodName) || !is_array($arguments) || !is_array($options)) {
            throw new Json2UnsupportedCallException(
                'JSON-2 compatibility execute_kw parameters have invalid types.',
            );
        }

        /** @var array<string, mixed> $options */

        return $this->execute_kw($modelName, $methodName, $arguments, $options);
    }

    /**
     * @param string[] $fields
     * @param array<string, mixed> $options
     */
    public function executeFieldsGet(string $modelName, array $fields = [], array $options = []): ResponseInterface
    {
        return $this->executeMappedCall(
            $this->inspectionCallMapper->mapFieldsGet($modelName, $fields, $options),
        );
    }

    public function executeMappedCall(MappedCall $call): ResponseInterface
    {
        $this->lastResponse = null;
        try {
            $nativeResponse = $this->json2Client->call(
                $call->getModel(),
                $call->getMethod(),
                $call->getParameters(),
            );
        } catch (Json2HttpException $exception) {
            throw $this->translateHttpException($exception);
        }
        $result = $this->resultMapper->map($call, $this->json2Client->decode($nativeResponse));

        if (!is_array($result) && !is_int($result) && !is_string($result) && !is_bool($result)) {
            throw new Json2CompatibilityException(sprintf(
                'JSON-2 returned %s, which cannot cross the historical operations result contract.',
                get_debug_type($result),
            ));
        }

        $body = json_encode([
            'jsonrpc' => '2.0',
            'id' => self::COMPATIBILITY_RESPONSE_ID,
            'result' => $result,
        ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION);

        $response = $this->responseFactory->createResponse(
            $nativeResponse->getStatusCode(),
            $nativeResponse->getReasonPhrase(),
        );
        foreach ($nativeResponse->getHeaders() as $name => $values) {
            if (in_array(strtolower($name), ['content-length', 'content-encoding', 'etag', 'transfer-encoding', 'content-type'], true)) {
                continue;
            }

            $response = $response->withHeader($name, $values);
        }

        $this->lastResponse = $response
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withHeader('Content-Length', (string) strlen($body))
            ->withBody($this->streamFactory->createStream($body));

        return $this->lastResponse;
    }

    public function decode(ResponseInterface $response): array
    {
        $decoded = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());
        if (!is_array($decoded)) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response is not an array.');
        }

        return $decoded;
    }

    public function deserializeModel(ResponseInterface $response, string $model)
    {
        $decoded = $this->rpcSerializerHelper->deserializeResponseBody($response->getBody(), $model);
        if (!$decoded instanceof $model) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response cannot be deserialized to the requested model.');
        }

        return $decoded;
    }

    public function deserializeArrayOfString(ResponseInterface $response): array
    {
        $decoded = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());
        if (!is_array($decoded)) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response is not a string array.');
        }
        foreach ($decoded as $value) {
            if (!is_string($value)) {
                throw new Json2CompatibilityException('The JSON-2 compatibility response is not a string array.');
            }
        }

        /** @var string[] $decoded */

        return $decoded;
    }

    public function deserializeBoolean(ResponseInterface $response): bool
    {
        $decoded = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());
        if (!is_bool($decoded)) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response is not a boolean.');
        }

        return $decoded;
    }

    public function deserializeInteger(ResponseInterface $response): int
    {
        $decoded = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());
        if (!is_int($decoded)) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response is not an integer.');
        }

        return $decoded;
    }

    public function deserializeString(ResponseInterface $response): string
    {
        $decoded = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());
        if (!is_string($decoded)) {
            throw new Json2CompatibilityException('The JSON-2 compatibility response is not a string.');
        }

        return $decoded;
    }

    public function retrieveUid(): int
    {
        if (null !== $this->uid) {
            return $this->uid;
        }

        $response = $this->execute_kw('res.users', 'context_get');
        $context = $this->decode($response);
        $uid = $context['uid'] ?? null;
        if (!is_int($uid)) {
            throw new Json2CompatibilityException('res.users/context_get did not return an integer uid.');
        }

        return $this->uid = $uid;
    }

    public function setDatabase(string $database): void
    {
        $this->replaceConnection($this->connection->withDatabase($database));
    }

    public function getDatabase(): string
    {
        return $this->connection->getDatabase() ?? '';
    }

    public function setUsername(string $username): void
    {
        if ($username === $this->username) {
            return;
        }

        $this->username = $username;
        $this->uid = null;
        $this->lastResponse = null;
        ($this->configurationUpdated)($this->connection, $this->username, $this->password);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $connection = $this->connection->withApiKey($password);
        $this->replaceConnection($connection, $password);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setBaseUri(UriInterface $baseUri): void
    {
        $this->apiRequestMaker->setBaseUri($baseUri);
    }

    public function getApiRequestMaker(): OdooApiRequestMakerInterface
    {
        return $this->apiRequestMaker;
    }

    public function getRequestBodyFactory(): RequestBodyFactoryInterface
    {
        return $this->requestBodyFactory;
    }

    public function getRpcSerializerHelper(): RpcSerializerHelperInterface
    {
        return $this->rpcSerializerHelper;
    }

    public function getJson2Client(): Json2ClientInterface
    {
        return $this->json2Client;
    }

    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }

    private function replaceConnection(Json2Connection $connection, ?string $password = null): void
    {
        $json2Client = ($this->json2ClientFactory)($connection);
        $this->connection = $connection;
        $this->password = $password ?? $this->password;
        $this->json2Client = $json2Client;
        $this->uid = null;
        $this->lastResponse = null;
        ($this->configurationUpdated)($this->connection, $this->username, $this->password);
    }

    private function translateHttpException(Json2HttpException $exception): \Throwable
    {
        $status = $exception->getStatusCode();
        $request = $this->apiRequestMaker->getRequestFactory()->createRequest('POST', '/json/2');
        $response = $this->responseFactory->createResponse($status);
        $message = sprintf('The JSON-2 request failed with HTTP status %d.', $status);

        if ($status >= 400 && $status < 500) {
            return new ClientErrorException($message, $request, $response, $exception);
        }

        if ($status >= 500 && $status < 600) {
            return new ServerErrorException($message, $request, $response, $exception);
        }

        return $exception;
    }
}
