<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Manager;

use DateTime;
use DateTimeInterface;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelListManagerInterface;
use FluxSE\OdooApiClient\Manager\ModelManager;
use FluxSE\OdooApiClient\Manager\ModelManagerInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\Options;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Tests\FluxSE\OdooApiClient\OdooVersionedClassProviderTrait;
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;

class ModelManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait,
        CommonOperationsTrait,
        OdooVersionedClassProviderTrait;

    private RecordOperationsInterface $recordOperations;

    private ModelManagerInterface $modelManager;

    private ModelListManagerInterface $modelListManager;

    private int $odooVersion;

    protected function setUp(): void
    {
        $this->recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->modelManager = new ModelManager(
            $this->recordOperations->getObjectOperations()->getRpcSerializerHelper()->getSerializer(),
            $this->recordOperations
        );

        $recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->modelListManager = new ModelListManager(
            $recordListOperations->getObjectOperations()->getRpcSerializerHelper()->getSerializer(),
            $recordListOperations,
            $this->buildModelFieldsProvider()
        );

        $this->odooVersion = $this->buildCommonOperations()->version()->getServerVersionInfo()[0];
    }

    protected function getOdooVersion(): int
    {
        return $this->odooVersion;
    }

    public function testManageProduct(): void
    {
        $accountClass = $this->getAccountAccountClass();
        $partnerClass = $this->getResPartnerClass();

        $searchDomains1 = new SearchDomains();
        $searchDomains1->addCriterion(Criterion::equal('code', '411100'));
        $propertyAccountPayableId = $this->modelListManager->findOneBy($accountClass, $searchDomains1);

        $searchDomains2 = new SearchDomains();
        $searchDomains2->addCriterion(Criterion::equal('code', '401100'));
        $propertyAccountReceivableId = $this->modelListManager->findOneBy($accountClass, $searchDomains2);

        $partner = $this->createPartner(
            new OdooRelation($propertyAccountPayableId?->getId()),
            new OdooRelation($propertyAccountReceivableId?->getId()),
        );
        self::assertTrue(method_exists($partner, 'setName'));
        $partner->setName('Test partner');

        $partnerId = $this->modelManager->persist($partner);
        $savedPartner = $this->modelListManager->find($partnerClass, $partnerId);

        self::assertInstanceOf($partnerClass, $savedPartner);

        self::assertTrue(method_exists($savedPartner, 'setComment'));
        $savedPartner->setComment('<p>Test</p>');

        $result = $this->modelManager->update($savedPartner);
        self::assertTrue($result);

        $updatedPartner = $this->modelListManager->find($partnerClass, $partnerId);

        self::assertInstanceOf($partnerClass, $updatedPartner);
        // test a null field to be null not empty string
        self::assertTrue(method_exists($updatedPartner, 'getParentName'));
        self::assertNull($updatedPartner->getParentName());
        self::assertTrue(method_exists($updatedPartner, 'getComment'));
        self::assertTrue(method_exists($savedPartner, 'getComment'));
        self::assertEquals($savedPartner->getComment(), $updatedPartner->getComment());

        $result = $this->modelManager->delete($updatedPartner);
        self::assertTrue($result);
    }

    private function retrieveUom(string $name): BaseInterface
    {
        $uomClass = $this->getUomUomClass();
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('name', $name));

        $uom = $this->modelListManager->findOneBy($uomClass, $searchDomains);

        self::assertNotNull($uom, sprintf(
            'Unable to find the the uom named "%s" !',
            $name
        ));

        return $uom;
    }

    private function retrieveFirstCategory(): BaseInterface
    {
        $categoryClass = $this->getProductCategoryClass();
        $category = $this->modelListManager->findOneBy($categoryClass);

        self::assertNotNull($category, 'Please create at least one category in ODOO !');

        return $category;
    }

    public function testCreateProduct(): void
    {
        $uom = $this->retrieveUom('Units');
        $category = $this->retrieveFirstCategory();

        $templateClass = $this->getProductTemplateClass();

        // Use versioned classes based on Odoo version
        $template = match (true) {
            $this->odooVersion <= 17 => new $templateClass(
                'test',
                'consu',
                new OdooRelation($category->getId()),
                new OdooRelation($uom->getId()),
                new OdooRelation($uom->getId()),
                [],
                'block'
            ),
            $this->odooVersion <= 18 => new $templateClass(
                'test',
                'consu',
                'no',
                new OdooRelation($category->getId()),
                new OdooRelation($uom->getId()),
                new OdooRelation($uom->getId()),
                [],
                'warning'
            ),
            default => new $templateClass(
                'test',
                'consu',
                'no',
                new OdooRelation($uom->getId()),
                []
            ),
        };

        self::assertTrue(method_exists($template, 'setType'));
        $template->setType('consu');
        self::assertTrue(method_exists($template, 'setActive'));
        $template->setActive(true);
        self::assertTrue(method_exists($template, 'setDefaultCode'));
        $template->setDefaultCode(sprintf('TEST_%d', time()));

        $templateId = $this->modelManager->persist($template);

        self::assertGreaterThan(0, $templateId);
    }

    public function testCreateMove(): void
    {
        $date = new DateTime();
        // 1 - retrieve the Company
        $companyId = 1;

        $partnerClass = $this->getResPartnerClass();
        $journalClass = $this->getAccountJournalClass();
        $currencyClass = $this->getResCurrencyClass();
        $productClass = $this->getProductProductClass();
        $taxClass = $this->getAccountTaxClass();

        // 2 - retrieve a Partner
        $partner = $this->modelListManager->findOneBy($partnerClass);
        self::assertNotNull($partner);

        // 3 - retrieve a sale Journal
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('type', 'sale'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $journal = $this->modelListManager->findOneBy($journalClass, $searchDomains);
        self::assertNotNull($journal);

        // 4 - retrieve an active currency
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $currency = $this->modelListManager->findOneBy($currencyClass, $searchDomains);
        self::assertNotNull($currency);

        // 5 - retrieve an active product
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $product = $this->modelListManager->findOneBy($productClass);
        self::assertNotNull($product);

        // 6 - retrieve a tax
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('price_include', false));
        $searchDomains->addCriterion(Criterion::equal('type_tax_use', 'sale'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $tax = $this->modelListManager->findOneBy($taxClass, $searchDomains);
        self::assertNotNull($tax);

        $partnerRel = new OdooRelation($partner->getId());
        $companyRel = new OdooRelation($companyId);

        $move = $this->createMove($date, (int) $journal->getId(), (int) $currency->getId());
        self::assertTrue(method_exists($move, 'setCompanyId'));
        $move->setCompanyId($companyRel);
        self::assertTrue(method_exists($move, 'setPartnerId'));
        $move->setPartnerId($partnerRel);
        self::assertTrue(method_exists($move, 'setRef'));
        $move->setRef(sprintf('TEST_I%d', time()));

        $productRel = new OdooRelation($product->getId());
        $taxRel = new OdooRelation($tax->getId());

        $line1 = $this->createMoveLine((int) $currency->getId());
        self::assertTrue(method_exists($line1, 'setName'));
        $line1->setName('test article');
        self::assertTrue(method_exists($line1, 'setProductId'));
        $line1->setProductId($productRel);
        self::assertTrue(method_exists($line1, 'setQuantity'));
        $line1->setQuantity(2);
        self::assertTrue(method_exists($line1, 'setPriceUnit'));
        $line1->setPriceUnit(10);
        self::assertTrue(method_exists($line1, 'setDiscount'));
        $line1->setDiscount(50);
        self::assertTrue(method_exists($line1, 'addTaxIds'));
        $line1->addTaxIds($taxRel);

        $line2 = $this->createMoveLine((int) $currency->getId());
        self::assertTrue(method_exists($line2, 'setAccountId'));
        $line2->setAccountId(new OdooRelation(false)); //Required...
        self::assertTrue(method_exists($line2, 'setDisplayType'));
        $line2->setDisplayType('line_note');
        self::assertTrue(method_exists($line2, 'setName'));
        $line2->setName('test');

        foreach ([$line1, $line2] as $line) {
            $relation = new OdooRelation();
            $relation->buildAdd($line);
            self::assertTrue(method_exists($move, 'addInvoiceLineIds'));
            $move->addInvoiceLineIds($relation);
        }

        $moveId = $this->modelManager->persist($move);

        self::assertGreaterThan(0, $moveId);

        $arguments = new Arguments();
        $arguments->addArgument($moveId);
        $body = $this->recordOperations->execute_kw_action(
            $move::getOdooModelName(),
            'action_post',
            $arguments
        );

        self::assertFalse($body);
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreatePayment(): void
    {
        $date = new DateTime();
        // 0 - retrieve the Company
        $companyId = 1;

        $moveClass = $this->getAccountMoveClass();
        $journalClass = $this->getAccountJournalClass();
        $methodClass = $this->getAccountPaymentMethodClass();

        // 1 - Retrieve the move to pay
        $searchDomains = new SearchDomains();
        $fieldName = 'payment_state';
        $searchDomains->addCriterion(Criterion::equal('state', 'posted'));
        $searchDomains->addCriterion(Criterion::equal($fieldName, 'not_paid'));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $move = $this->modelListManager->findOneBy($moveClass, $searchDomains);
        self::assertNotNull($move);
        self::assertTrue(method_exists($move, 'getState'));
        self::assertEquals('posted', $move->getState());
        self::assertTrue(method_exists($move, 'getPaymentState'));
        self::assertEquals('not_paid', $move->getPaymentState());

        // 2 - Retrieve the right journal
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('type', 'bank'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $journal = $this->modelListManager->findOneBy($journalClass, $searchDomains);
        self::assertNotNull($journal);

        // 3 - Retrieve the paymentMethod
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', 'manual'));
        $searchDomains->addCriterion(Criterion::equal('payment_type', 'inbound'));
        $paymentMethod = $this->modelListManager->findOneBy($methodClass, $searchDomains);
        self::assertNotNull($paymentMethod);

        $paymentRegister = $this->createPaymentRegister($date, $journal, $paymentMethod);
        $ref = sprintf('PAY_%d', time());

        self::assertTrue(method_exists($paymentRegister, 'setAmount'));
        self::assertTrue(method_exists($move, 'getAmountTotal'));
        $paymentRegister->setAmount($move->getAmountTotal());
        self::assertTrue(method_exists($paymentRegister, 'setCommunication'));
        $paymentRegister->setCommunication($ref);
        self::assertTrue(method_exists($paymentRegister, 'setCompanyId'));
        self::assertTrue(method_exists($move, 'getCompanyId'));
        $paymentRegister->setCompanyId($move->getCompanyId());

        $options = new Options();
        $options->addOption('context', [
            'active_model' => $move::getOdooModelName(),
            'active_ids' => [$move->getId()],
        ]);
        $paymentRegisterId = $this->modelManager->persist($paymentRegister, $options);
        self::assertGreaterThan(0, $paymentRegisterId);

        $actionName = 'action_create_payments';

        $arguments = new Arguments();
        $arguments->addArgument($paymentRegisterId);
        $data = $this->recordOperations->execute_kw_action(
            $paymentRegister::getOdooModelName(),
            $actionName,
            $arguments
        );

        $paymentClass = $this->getAccountPaymentClass();
        self::assertIsArray($data);
        self::assertArrayHasKey('res_model', $data);
        self::assertEquals($paymentClass::getOdooModelName(), $data['res_model']);
        self::assertArrayHasKey('res_id', $data);
        self::assertIsInt($data['res_id']);
    }

    private function createMove(
        DateTimeInterface $date,
        int $journalId,
        int $currencyId,
        string $moveType = 'out_invoice'
    ): BaseInterface {
        $journalRel = new OdooRelation($journalId);
        $currencyRel = new OdooRelation($currencyId);

        $moveClass = $this->getAccountMoveClass();

        return new $moveClass(
            $date,
            'draft',
            $moveType,
            $journalRel,
            'no',
            $currencyRel,
        );
    }

    private function createMoveLine(int $currencyId): BaseInterface
    {
        $emptyMoveRel = new OdooRelation();
        $currencyRel = new OdooRelation($currencyId);

        $lineClass = $this->getAccountMoveLineClass();

        return new $lineClass($emptyMoveRel, $currencyRel, 'product');
    }

    private function createPaymentRegister(
        DateTimeInterface $date,
        BaseInterface $journal,
        BaseInterface $paymentMethod
    ): BaseInterface {
        $journalRel = new OdooRelation($journal->getId());

        $registerClass = $this->getAccountPaymentRegisterClass();

        self::assertTrue(method_exists($paymentMethod, 'getCode'));
        $paymentRegister = new $registerClass($date);
        self::assertTrue(method_exists($paymentRegister, 'setJournalId'));
        $paymentRegister->setJournalId($journalRel);
        self::assertTrue(method_exists($paymentRegister, 'setPaymentMethodCode'));
        $paymentRegister->setPaymentMethodCode($paymentMethod->getCode());
        return $paymentRegister;
    }

    private function createPartner(OdooRelation $payableRel, OdooRelation $receivableRel): BaseInterface
    {
        $partnerClass = $this->getResPartnerClass();

        return match (true) {
            $this->odooVersion <= 17 => new $partnerClass(
                $payableRel,
                $receivableRel,
            ),
            default => new $partnerClass(
                'never'
            ),
        };
    }
}
