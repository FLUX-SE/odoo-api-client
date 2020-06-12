<?php

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use PHPUnit\Framework\TestCase;

class RecordListOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;
    /** @var RecordListOperations */
    private $recordListOperations;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
    }

    public function testSearch_count()
    {
        $count = $this->recordListOperations->search_count('ir.model');
        dump($count);
        $this->assertIsInt($count);
    }

    public function testRead()
    {
        $result = $this->recordListOperations->read('ir.model');
        dump($result);
        $this->assertIsArray($result);
    }

    public function testSearch()
    {
        $result = $this->recordListOperations->search('ir.model');
        dump($result);
        $this->assertIsArray($result);
    }

    public function testSearch_read()
    {
        $result = $this->recordListOperations->search_read('ir.model');
        dump($result);
        $this->assertIsArray($result);
    }
}
