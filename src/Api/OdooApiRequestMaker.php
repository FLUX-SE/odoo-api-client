<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class OdooApiRequestMaker implements OdooApiRequestMakerInterface
{
    /** @var ClientInterface */
    private $httpClient;
    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var ResponseInterface */
    private $lastResponse;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
    }


    /**
     * {@inheritdoc}
     *
     * @throws ClientExceptionInterface
     */
    public function request(string $operationPath, StreamInterface $body): ResponseInterface
    {
        $request = $this->requestFactory
            ->createRequest('POST', $operationPath)
            ->withBody($body);

        $this->lastResponse = $this->httpClient->sendRequest($request);

        return $this->lastResponse;
    }

    public function getLastResponse(): ResponseInterface
    {
        return $this->lastResponse;
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }
}
