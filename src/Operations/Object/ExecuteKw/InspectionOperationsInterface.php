<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptionsInterface;

interface InspectionOperationsInterface extends OperationsInterface
{
    public function fields_get(
        string $modelName,
        array $criteria = [],
        ?FieldsGetOptionsInterface $fieldsGetOptions = null
    ): array;
}
