<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptionsInterface;

final class InspectionOperations extends AbstractOperations implements InspectionOperationsInterface
{
    public function fields_get(
        string $modelName,
        array $fields = [],
        ?FieldsGetOptionsInterface $fieldsGetOptions = null
    ): array {
        $options = [];
        if (null !== $fieldsGetOptions) {
            $options = $fieldsGetOptions->toArray();
        }

        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $fields,
            $options
        );

        return $this->getObjectOperations()->decode($response);
    }
}
