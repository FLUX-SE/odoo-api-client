<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

interface CallMapperInterface
{
    /**
     * @param mixed[] $arguments
     * @param mixed[] $options
     */
    public function map(
        string $model,
        string $method,
        array $arguments = [],
        array $options = [],
    ): MappedCall;
}
