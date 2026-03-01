<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelListManagerInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\OdooVersionedClassProviderTrait;
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;

class ModelListManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait,
        CommonOperationsTrait,
        OdooVersionedClassProviderTrait;

    private RecordListOperationsInterface $recordListOperations;

    private ModelListManagerInterface $modelListManager;

    private int $odooVersion;

    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->modelListManager = new ModelListManager(
            $this->recordListOperations->getObjectOperations()->getRpcSerializerHelper()->getSerializer(),
            $this->recordListOperations,
            $this->buildModelFieldsProvider()
        );

        $this->odooVersion = $this->buildCommonOperations()->version()->getServerVersionInfo()[0];
    }

    protected function getOdooVersion(): int
    {
        return $this->odooVersion;
    }

    public function testFind(): void
    {
        $partnerClass = $this->getPartnerClass();
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);
        $searchReadOptions->setOrder('id');
        $results = $this->recordListOperations->search_read($partnerClass::getOdooModelName(), null, $searchReadOptions);

        self::assertCount(1, $results);
        self::assertArrayHasKey(0, $results);
        self::assertIsArray($results[0]);
        self::assertArrayHasKey('id', $results[0]);
        self::assertIsInt($results[0]['id']);

        $partner = $this->modelListManager->find($partnerClass, $results[0]['id']);
        self::assertInstanceOf($partnerClass, $partner);
        self::assertEquals($results[0]['id'], $partner->getId());
    }

    public function testFindByIds(): void
    {
        $partnerClass = $this->getPartnerClass();
        $partners = $this->modelListManager->findByIds($partnerClass, [1]);
        self::assertContainsOnlyInstancesOf($partnerClass, $partners);
    }

    public function testFindOneBy(): void
    {
        $partnerClass = $this->getPartnerClass();
        $partner = $this->modelListManager->findOneBy($partnerClass);
        self::assertInstanceOf($partnerClass, $partner);
    }

    public function testFindBy(): void
    {
        $partnerClass = $this->getPartnerClass();
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(2);

        $partners = $this->modelListManager->findBy($partnerClass, null, $searchReadOptions);
        self::assertContainsOnlyInstancesOf($partnerClass, $partners);
    }
}
