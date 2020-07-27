<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Manager\ModelListManager;
use Flux\OdooApiClient\Manager\ModelManagerInterface;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use PHPUnit\Framework\TestCase;
use Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;

class ModelListManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var RecordListOperations */
    private $recordListOperations;
    /** @var ModelManagerInterface */
    private $modelListManager;

    /**
     * {@inheritdoc}
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
