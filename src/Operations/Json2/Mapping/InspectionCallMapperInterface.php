<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

interface InspectionCallMapperInterface
{
    /**
     * Maps the historical inspection wrapper's flat field list without
     * changing the low-level positional convention for fields_get.
     *
     * @param mixed[] $fields
     * @param array<string, mixed> $options
     */
    public function mapFieldsGet(string $model, array $fields = [], array $options = []): MappedCall;
}
