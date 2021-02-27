<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptionsInterface;

interface InspectionOperationsInterface extends OperationsInterface
{
    /**
     * @param array<int, string> $fields
     *
     * @return array<string, array>
     */
    public function fields_get(
        string $modelName,
        array $fields = [],
        ?FieldsGetOptionsInterface $fieldsGetOptions = null
    ): array;
}
