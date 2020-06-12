<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

use Flux\OdooApiClient\XmlRpc\RequestBodyInterface;
use Flux\OdooApiClient\XmlRpc\ResponseBody;
use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Exception as HttpClientException;

final class OdooApi implements OdooApiInterface
{
    /** @var HttpMethodsClientInterface */
    private $httpMethodsClient;

    public function __construct(HttpMethodsClientInterface $httpMethodsClient)
    {
        $this->httpMethodsClient = $httpMethodsClient;
    }

    /**
     * {@inheritdoc}
     *
     * @throws HttpClientException
     */
    public function request(string $operationPath, RequestBodyInterface $requestBody): ResponseBodyInterface
    {
        $response = $this->httpMethodsClient->post(
            $operationPath,
            [],
            $requestBody->encode()
        );

        return new ResponseBody($response);
    }

    public function getHttpMethodsClient(): HttpMethodsClientInterface
    {
        return $this->httpMethodsClient;
    }
}
