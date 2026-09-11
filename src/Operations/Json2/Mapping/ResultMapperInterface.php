<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

interface ResultMapperInterface
{
    public function map(MappedCall $call, mixed $result): mixed;
}
