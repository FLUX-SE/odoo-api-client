<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use PHPUnit\Framework\TestCase;

class RecordListOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;
    /** @var RecordListOperations */
    private $recordListOperations;

    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
    }

    public function testSearch_count()
    {
        $count = $this->recordListOperations->search_count('ir.model');
        $this->assertIsInt($count);
    }

    public function testRead()
    {
        $result = $this->recordListOperations->read('ir.model', [1]);
        $this->assertIsArray($result);
    }

    public function testSearch()
    {
        $result = $this->recordListOperations->search('ir.model');
        $this->assertIsArray($result);
    }

    public function testSearch_read()
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);
        $searchReadOptions->addField('name');

        $result = $this->recordListOperations->search_read(
            'res.partner',
            null,
            $searchReadOptions
        );

        $this->assertIsArray($result);
    }
}
