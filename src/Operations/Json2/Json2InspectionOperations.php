<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\AbstractOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptionsInterface;

final class Json2InspectionOperations extends AbstractOperations implements InspectionOperationsInterface
{
    public function fields_get(
        string $modelName,
        array $fields = [],
        ?FieldsGetOptionsInterface $fieldsGetOptions = null
    ): array {
        $objectOperations = $this->getObjectOperations();
        if (!$objectOperations instanceof Json2ObjectOperations) {
            throw new \LogicException('Json2InspectionOperations requires Json2ObjectOperations.');
        }

        $response = $objectOperations->executeFieldsGet(
            $modelName,
            $fields,
            $fieldsGetOptions?->toArray() ?? [],
        );

        /** @var array<string, array<string, mixed>> $decoded */
        $decoded = $objectOperations->decode($response);

        return $decoded;
    }
}
