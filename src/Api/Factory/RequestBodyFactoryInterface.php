<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api\Factory;

use Flux\OdooApiClient\Api\RequestBodyInterface;

interface RequestBodyFactoryInterface
{
    public function create(string $method): RequestBodyInterface;
}
