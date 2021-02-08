<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Factory;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;

interface RequestBodyFactoryInterface
{
    public function create(string $method): RequestBodyInterface;
}
