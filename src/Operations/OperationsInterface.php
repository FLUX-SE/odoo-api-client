<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApiInterface;
use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;

interface OperationsInterface
{
    public function request(string $method, array $params = []): ResponseBodyInterface;

    public function getEndpointPath(): string;

    public function getApi(): OdooApiInterface;
}
