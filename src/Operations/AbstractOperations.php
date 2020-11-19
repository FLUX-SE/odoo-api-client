<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;
use Webmozart\Assert\Assert;

abstract class AbstractOperations implements OperationsInterface
{
    /** @var OdooApiRequestMakerInterface */
    protected $apiRequestMaker;

    /** @var RequestBodyFactoryInterface */
    protected $requestBodyFactory;

    /** @var XmlRpcSerializerHelperInterface */
    protected $xmlRpcSerializerHelper;

    public function __construct(
        OdooApiRequestMakerInterface $apiRequestMaker,
        RequestBodyFactoryInterface $requestBodyFactory,
        XmlRpcSerializerHelperInterface $xmlRpcSerializerHelper
    ) {
        $this->apiRequestMaker = $apiRequestMaker;
        $this->requestBodyFactory = $requestBodyFactory;
        $this->xmlRpcSerializerHelper = $xmlRpcSerializerHelper;
    }

    public function request(string $method, array $params = []): ResponseInterface
    {
        $requestBody = $this->requestBodyFactory->create($method);
        $requestBody->setParams($params);

        $body = $this->xmlRpcSerializerHelper->serializeRequestBody($requestBody);

        return $this->apiRequestMaker->request(
            $this->getEndpointPath(),
            $body
        );
    }

    public function decode(ResponseInterface $response): array
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody(
            $response->getBody()
        );

        Assert::isArray($body,'The decoded value should be an array value, "%s" found !');

        return $body;
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeModel(ResponseInterface $response, string $model)
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            $model
        );

        Assert::isInstanceOf(
            $body,
            $model,
            'The deserialize value should be an instance of "%2$s" value, "%s" found !'
        );

        return $body;
    }

    public function deserializeArrayOf(ResponseInterface $response, string $type = 'string'): array
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::allString($body, 'The deserialize value should be an array value, "%s" found !');

        return $body;
    }

    public function deserializeBoolean(ResponseInterface $response): bool
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::boolean($body, 'The deserialize value should be a boolean value, "%s" found !');

        return $body;
    }

    public function deserializeInteger(ResponseInterface $response): int
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::integer($body, 'The deserialize value should be an integer value, "%s" found !');

        return $body;
    }

    public function deserializeFloat(ResponseInterface $response): float
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::float($body, 'The deserialize value should be a float value, "%s" found !');

        return $body;
    }

    public function deserializeString(ResponseInterface $response): string
    {
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::string($body, 'The deserialize value should be a string value, "%s" found !');

        return $body;
    }

    public function getApiRequestMaker(): OdooApiRequestMakerInterface
    {
        return $this->apiRequestMaker;
    }

    public function getRequestBodyFactory(): RequestBodyFactoryInterface
    {
        return $this->requestBodyFactory;
    }

    public function getXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface
    {
        return $this->xmlRpcSerializerHelper;
    }
}
