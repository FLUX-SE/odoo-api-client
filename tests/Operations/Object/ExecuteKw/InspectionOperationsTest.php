<?php

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperations;
use PHPUnit\Framework\TestCase;

class InspectionOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var InspectionOperations */
    private $inspectionOperations;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->inspectionOperations = $this->buildExecuteKwOperations(InspectionOperations::class);
    }

    public function testFields_get()
    {
        $response = $this->inspectionOperations->fields_get('res.partner');
        $this->assertArrayHasKey('name', $response);
    }
}
