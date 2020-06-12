<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

use Flux\OdooApiClient\XmlRpc\RequestBodyInterface;
use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;
use Http\Client\Common\HttpMethodsClientInterface;

interface OdooApiInterface
{
    public const BASE_PATH = 'xmlrpc/2';

    public function request(string $operationPath, RequestBodyInterface $requestBody): ResponseBodyInterface;

    public function getHttpMethodsClient(): HttpMethodsClientInterface;
}
