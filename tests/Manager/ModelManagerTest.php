<?php

namespace Tests\Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Manager\ModelListManager;
use Flux\OdooApiClient\Manager\ModelManager;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\OdooRelation;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\Criterion;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomains;
use PHPUnit\Framework\TestCase;
use Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;

class ModelManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    private $modelManager;
    /** @var ModelListManager */
    private $modelListManager;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        /** @var RecordOperationsInterface $recordOperations */
        $recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->modelManager = new ModelManager(
            $this->odooApiClientBuilder->buildSerializer(),
            $recordOperations
        );
        /** @var RecordListOperationsInterface $recordListOperations */
        $recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->modelListManager = new ModelListManager(
            $this->odooApiClientBuilder->buildSerializer(),
            $recordListOperations
        );
    }

    public function test()
    {
        $searchDomains1 = new SearchDomains();
        $searchDomains1->addCriterion(Criterion::equal('code', '411100'));
        /** @var Account|null $propertyAccountPayableId */
        $propertyAccountPayableId = $this->modelListManager->findOneBy(Account::class, $searchDomains1);

        $searchDomains2 = new SearchDomains();
        $searchDomains2->addCriterion(Criterion::equal('code', '411100'));
        /** @var Account|null $propertyAccountReceivableId */
        $propertyAccountReceivableId = $this->modelListManager->findOneBy(Account::class, $searchDomains2);

        $partner = new Partner(
            new OdooRelation($propertyAccountPayableId->getId()),
            new OdooRelation($propertyAccountReceivableId->getId()),
        );
        $partner->setName('Test partner');

        $partnerId = $this->modelManager->persist($partner);
        /** @var Partner|null $savedPartner */
        $savedPartner = $this->modelListManager->find(Partner::class, $partnerId);

        $this->assertInstanceOf(Partner::class, $savedPartner);

        $savedPartner->setComment('Test');

        $result = $this->modelManager->update($savedPartner);
        $this->assertTrue($result);

        $updatedPartner = $this->modelListManager->find(Partner::class, $partnerId);

        $this->assertInstanceOf(Partner::class, $updatedPartner);
        $this->assertEquals($savedPartner->getComment(), $updatedPartner->getComment());

        $result = $this->modelManager->delete($updatedPartner);
        $this->assertTrue($result);
    }
}
