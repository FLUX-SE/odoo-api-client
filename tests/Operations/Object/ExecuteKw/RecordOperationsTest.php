<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use PHPUnit\Framework\TestCase;

class RecordOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var RecordListOperations */
    private $recordListOperations;

    /** @var RecordOperationsInterface */
    private $recordOperations;

    protected function setUp(): void
    {
        $this->recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
    }

    private function retrieveUom(string $name): array
    {
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('name', $name));

        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);

        $results = $this->recordListOperations->search_read(
            'uom.uom',
            $searchDomains,
            $searchReadOptions
        );

        $this->assertNotEmpty($results, sprintf(
            'Unable to find the the uom named "%s" !',
            $name
        ));

        return $results[0];
    }

    private function retrieveFirstCategory(): array
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);

        $results = $this->recordListOperations->search_read(
            'product.category',
            null,
            $searchReadOptions
        );

        $this->assertNotEmpty($results, 'Please create at least one category in ODOO !');

        return $results[0];
    }

    public function testCreateProduct()
    {
        $uom = $this->retrieveUom('Units');
        $category = $this->retrieveFirstCategory();

        $template = [
            // required
            'name' => 'test',
            'type' => 'consu',
            'categ_id' => $category['id'],
            'uom_id' => $uom['id'],
            'uom_po_id' => $uom['id'],
            'product_variant_ids' => [],
            // mandatory
            'active' => true,
            'default_code' => sprintf('TESTRAW_%d', time()),
        ];

        $templateId = $this->recordOperations->create('product.template', $template);

        $this->assertIsInt($templateId);
    }
}
