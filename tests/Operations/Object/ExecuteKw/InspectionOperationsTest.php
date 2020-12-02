<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use PHPUnit\Framework\TestCase;

class InspectionOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var InspectionOperations */
    private $inspectionOperations;

    protected function setUp(): void
    {
        $this->inspectionOperations = $this->buildExecuteKwOperations(InspectionOperations::class);
    }

    public function testFields_get()
    {
        $result = $this->inspectionOperations->fields_get('ir.model');
        $irModelFields = array_keys($result);

        foreach ([Partner::getOdooModelName(), Line::getOdooModelName(), Company::getOdooModelName()] as $modelName) {
            $fieldGetOptions = new FieldsGetOptions();
            $fieldGetOptions->setAttributes($irModelFields);

            $result = $this->inspectionOperations->fields_get($modelName, [], $fieldGetOptions);
            $this->assertArrayHasKey('id', $result);
        }
    }
}
