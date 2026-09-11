<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;

final class InspectionCallMapper implements InspectionCallMapperInterface
{
    public function __construct(private readonly CallMapperInterface $callMapper)
    {
    }

    /**
     * @param mixed[] $fields
     * @param array<string, mixed> $options
     */
    public function mapFieldsGet(string $model, array $fields = [], array $options = []): MappedCall
    {
        foreach ($fields as $field) {
            if (!is_string($field)) {
                throw new InvalidCallMappingException('Every fields_get field name must be a string.');
            }
        }

        return $this->callMapper->map($model, 'fields_get', [$fields], $options);
    }
}
