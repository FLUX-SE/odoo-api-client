<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use PHPUnit\Framework\TestCase;

class InspectionOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    private InspectionOperations $inspectionOperations;

    protected function setUp(): void
    {
        $this->inspectionOperations = $this->buildExecuteKwOperations(InspectionOperations::class);
    }

    public function testFields_get(): void
    {
        $result = $this->inspectionOperations->fields_get('ir.model');
        $irModelFields = array_keys($result);

        foreach (['res.partner', 'account.move.line', 'res.company'] as $modelName) {
            $fieldGetOptions = new FieldsGetOptions();
            $fieldGetOptions->setAttributes($irModelFields);

            $result = $this->inspectionOperations->fields_get($modelName, [], $fieldGetOptions);
            $this->assertArrayHasKey('id', $result);
        }
    }
}
