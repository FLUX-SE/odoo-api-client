<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

interface MethodSignatureRegistryInterface
{
    public function resolve(string $model, string $method): MethodSignature;
}
