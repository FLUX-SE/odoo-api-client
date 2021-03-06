<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelManagerInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner;

class ModelListManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var RecordListOperations */
    private $recordListOperations;
    /** @var ModelManagerInterface */
    private $modelListManager;

    /**
     *
     */
    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->modelListManager = new ModelListManager(
            $this->recordListOperations->getObjectOperations()->getXmlRpcSerializerHelper()->getSerializer(),
            $this->recordListOperations
        );
    }

    public function testFind()
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);
        $searchReadOptions->setOrder('id');
        $results = $this->recordListOperations->search_read(Partner::getOdooModelName(), null, $searchReadOptions);

        $this->assertCount(1, $results);
        $this->assertArrayHasKey('id', $results[0]);

        $partner = $this->modelListManager->find(Partner::class, $results[0]['id']);
        $this->assertInstanceOf(Partner::class, $partner);
    }

    public function testFindOneBy()
    {
        $partner = $this->modelListManager->findOneBy(Partner::class);
        $this->assertInstanceOf(Partner::class, $partner);
    }

    public function testFindBy()
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(2);

        $partners = $this->modelListManager->findBy(Partner::class, null, $searchReadOptions);
        $this->assertContainsOnlyInstancesOf(Partner::class, $partners);
    }
}
