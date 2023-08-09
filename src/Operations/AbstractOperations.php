<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use LogicException;
use Psr\Http\Message\ResponseInterface;
use Webmozart\Assert\Assert;

abstract class AbstractOperations implements OperationsInterface
{
    public function __construct(
        protected OdooApiRequestMakerInterface $apiRequestMaker,
        protected RequestBodyFactoryInterface $requestBodyFactory,
        protected RpcSerializerHelperInterface $rpcSerializerHelper,
    ) {
    }

    public function request(string $method, array $params = []): ResponseInterface
    {
        if ($this->getApiRequestMaker()->isJsonRpc()) {
            return $this->jsonRpcRequest($method, $params);
        }

        if ($this->getApiRequestMaker()->isXmlRpc()) {
            return $this->xmlRpcRequest($method, $params);
        }

        throw new LogicException('The request can\'t be processed because it\'s neither a JSON nor an XML one.');
    }

    protected function jsonRpcRequest(string $method, array $params = []): ResponseInterface
    {
        $requestBody = $this->requestBodyFactory->create('call');
        $requestBody->setJsonParams(
            $this->getService(),
            $method,
            $params
        );

        $body = $this->rpcSerializerHelper->serializeRequestBody($requestBody);

        return $this->apiRequestMaker->request('', $body);
    }

    protected function xmlRpcRequest(string $method, array $params = []): ResponseInterface
    {
        $requestBody = $this->requestBodyFactory->create($method);
        $requestBody->setParams($params);

        $body = $this->rpcSerializerHelper->serializeRequestBody($requestBody);

        return $this->apiRequestMaker->request(
            $this->getEndpointPath(),
            $body
        );
    }

    public function decode(ResponseInterface $response): array
    {
        /** @var array $body */
        $body = $this->rpcSerializerHelper->decodeResponseBody(
            $response->getBody()
        );

        Assert::isArray($body, sprintf(
            'The decoded value should be an array value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

        return $body;
    }

    public function deserializeModel(ResponseInterface $response, string $model)
    {
        $body = $this->rpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            $model
        );

        Assert::isInstanceOf(
            $body,
            $model,
            sprintf(
                'The deserialized value should be an instance of "%2$s" value, "%s" found ! : %s',
                '%s',
                print_r($body, true)
            )
        );

        return $body;
    }

    public function deserializeArrayOfString(ResponseInterface $response): array
    {
        /** @var string[] $body */
        $body = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::allString($body, sprintf(
            'The deserialized value should be an array value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

        return $body;
    }

    public function deserializeBoolean(ResponseInterface $response): bool
    {
        /** @var bool $body */
        $body = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::boolean($body, sprintf(
            'The deserialized value should be a boolean value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

        return $body;
    }

    public function deserializeInteger(ResponseInterface $response): int
    {
        /** @var int $body */
        $body = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::integer($body, sprintf(
            'The deserialized value should be an integer value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

        return $body;
    }

    public function deserializeString(ResponseInterface $response): string
    {
        /** @var string $body */
        $body = $this->rpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::string($body, sprintf(
            'The deserialized value should be a string value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

        return $body;
    }

    public function getService(): string
    {
        return trim($this->getEndpointPath(), '/');
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
}
