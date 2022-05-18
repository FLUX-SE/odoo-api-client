<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use PHPUnit\Framework\TestCase;

class RecordListOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    private RecordListOperationsInterface $recordListOperations;

    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
    }

    public function testSearch_count(): void
    {
        $count = $this->recordListOperations->search_count('ir.model');
        $this->assertGreaterThan(0, $count);
    }

    public function testRead(): void
    {
        $result = $this->recordListOperations->read('ir.model', [1]);
        $this->assertNotEmpty($result);
    }

    public function testSearch(): void
    {
        $result = $this->recordListOperations->search('ir.model');
        $this->assertNotEmpty($result);
    }

    public function testSearch_read(): void
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);
        $searchReadOptions->addField('name');

        $result = $this->recordListOperations->search_read(
            'res.partner',
            null,
            $searchReadOptions
        );

        $this->assertNotEmpty($result);
    }
}
