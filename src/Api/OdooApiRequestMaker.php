<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

final class OdooApiRequestMaker implements OdooApiRequestMakerInterface
{
    /** @var ClientInterface */
    private $httpClient;
    /** @var RequestFactoryInterface */
    private $requestFactory;
    /** @var UriInterface */
    private $baseUri;

    /** @var ResponseInterface */
    private $lastResponse;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        UriInterface $baseUri
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->baseUri = $baseUri;
    }

    /**
     * @param string $operationPath
     * @param StreamInterface $body
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function request(string $operationPath, StreamInterface $body): ResponseInterface
    {
        $uri = $this->baseUri->withPath($this->baseUri->getPath() . $operationPath);
        $request = $this->requestFactory
            ->createRequest('POST', $uri)
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

    public function getBaseUri(): UriInterface
    {
        return $this->baseUri;
    }

    public function setBaseUri(UriInterface $baseUri): void
    {
        $this->baseUri = $baseUri;
    }
}
