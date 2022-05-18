<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Psr\Http\Message\ResponseInterface;
use Webmozart\Assert\Assert;

abstract class AbstractOperations implements OperationsInterface
{
    protected OdooApiRequestMakerInterface $apiRequestMaker;

    protected RequestBodyFactoryInterface $requestBodyFactory;

    protected XmlRpcSerializerHelperInterface $xmlRpcSerializerHelper;

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
        /** @var array $body */
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody(
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
        $body = $this->xmlRpcSerializerHelper->deserializeResponseBody(
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
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

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
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

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
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

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
        $body = $this->xmlRpcSerializerHelper->decodeResponseBody($response->getBody());

        Assert::string($body, sprintf(
            'The deserialized value should be a string value, "%s" found ! : %s',
            '%s',
            print_r($body, true)
        ));

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
