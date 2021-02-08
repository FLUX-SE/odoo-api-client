<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

interface OdooApiRequestMakerInterface
{
    public const BASE_PATH = 'xmlrpc/2';

    public function request(string $operationPath, StreamInterface $body): ResponseInterface;

    public function getLastResponse(): ResponseInterface;

    public function getRequestFactory(): RequestFactoryInterface;

    public function getHttpClient(): ClientInterface;

    public function getBaseUri(): UriInterface;

    public function setBaseUri(UriInterface $baseUri): void;
}
