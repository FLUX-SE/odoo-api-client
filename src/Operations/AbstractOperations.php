<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

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

        if (false === is_array($body)) {
            throw new UnexpectedValueException(sprintf(
                'The decoded value should be an array value, "%s" found !',
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeModel(ResponseInterface $response, string $model)
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            $model
        );

        if (false === $body instanceof $model) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be an instance of "%s" value, "%s" found !',
                $model,
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeArrayOf(ResponseInterface $response, string $type = 'string'): array
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            sprintf('%s[]', $type)
        );

        if (false === is_array($body)) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be an array value, "%s" found !',
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeBoolean(ResponseInterface $response): bool
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            'bool'
        );

        if (false === is_bool($body)) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be a boolean value, "%s" found !',
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeInteger(ResponseInterface $response): int
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            'int'
        );

        if (false === is_int($body)) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be an integer value, "%s" found !',
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeFloat(ResponseInterface $response): float
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            'float'
        );

        if (false === is_float($body)) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be a float value, "%s" found !',
                gettype($body)
            ));
        }

        return $body;
    }

    public function deserializeString(ResponseInterface $response): string
    {
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
            $response->getBody(),
            'string'
        );

        if (false === is_string($body)) {
            throw new UnexpectedValueException(sprintf(
                'The deserialize value should be a string value, "%s" found !',
                gettype($body)
            ));
        }

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
