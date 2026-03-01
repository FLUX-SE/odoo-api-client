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
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Account as AccountV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Journal as JournalV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Move as MoveV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Move\Line as LineV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Payment as PaymentV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Payment\Method as MethodV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Payment\Register as RegisterV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Tax as TaxV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Product\Category as CategoryV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Product\Product as ProductV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Product\Template as TemplateV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Res\Currency as CurrencyV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Res\Partner as PartnerV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Uom\Uom as UomV17;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Account as AccountV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Journal as JournalV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Move as MoveV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Move\Line as LineV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Payment as PaymentV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Payment\Method as MethodV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Payment\Register as RegisterV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Tax as TaxV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Product\Category as CategoryV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Product\Product as ProductV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Product\Template as TemplateV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Res\Currency as CurrencyV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Res\Partner as PartnerV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Uom\Uom as UomV18;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Account as AccountV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Journal as JournalV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Move as MoveV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Move\Line as LineV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Payment as PaymentV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Payment\Method as MethodV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Payment\Register as RegisterV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Tax as TaxV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Product\Category as CategoryV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Product\Product as ProductV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Product\Template as TemplateV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Res\Currency as CurrencyV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Res\Partner as PartnerV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Uom\Uom as UomV19;

class ModelManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait,
        CommonOperationsTrait;

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

    /**
     * Get the appropriate Partner class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getPartnerClass(): string
    {
        /** @var class-string<BaseInterface> $partnerClass */
        $partnerClass = match (true) {
            $this->odooVersion <= 17 => PartnerV17::class,
            $this->odooVersion <= 18 => PartnerV18::class,
            default => PartnerV19::class,
        };

        return $partnerClass;
    }

    /**
     * Get the appropriate Account class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getAccountClass(): string
    {
        /** @var class-string<BaseInterface> $accountClass */
        $accountClass = match (true) {
            $this->odooVersion <= 17 => AccountV17::class,
            $this->odooVersion <= 18 => AccountV18::class,
            default => AccountV19::class,
        };

        return $accountClass;
    }

    /**
     * Get the appropriate Uom class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getUomClass(): string
    {
        /** @var class-string<BaseInterface> $uomClass */
        $uomClass = match (true) {
            $this->odooVersion <= 17 => UomV17::class,
            $this->odooVersion <= 18 => UomV18::class,
            default => UomV19::class,
        };

        return $uomClass;
    }

    /**
     * Get the appropriate Category class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getCategoryClass(): string
    {
        /** @var class-string<BaseInterface> $categoryClass */
        $categoryClass = match (true) {
            $this->odooVersion <= 17 => CategoryV17::class,
            $this->odooVersion <= 18 => CategoryV18::class,
            default => CategoryV19::class,
        };

        return $categoryClass;
    }

    /**
     * Get the appropriate Move class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getMoveClass(): string
    {
        /** @var class-string<BaseInterface> $moveClass */
        $moveClass = match (true) {
            $this->odooVersion <= 17 => MoveV17::class,
            $this->odooVersion <= 18 => MoveV18::class,
            default => MoveV19::class,
        };

        return $moveClass;
    }

    /**
     * Get the appropriate Journal class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getJournalClass(): string
    {
        /** @var class-string<BaseInterface> $journalClass */
        $journalClass = match (true) {
            $this->odooVersion <= 17 => JournalV17::class,
            $this->odooVersion <= 18 => JournalV18::class,
            default => JournalV19::class,
        };

        return $journalClass;
    }

    /**
     * Get the appropriate Currency class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getCurrencyClass(): string
    {
        /** @var class-string<BaseInterface> $currencyClass */
        $currencyClass = match (true) {
            $this->odooVersion <= 17 => CurrencyV17::class,
            $this->odooVersion <= 18 => CurrencyV18::class,
            default => CurrencyV19::class,
        };

        return $currencyClass;
    }

    /**
     * Get the appropriate Product class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getProductClass(): string
    {
        /** @var class-string<BaseInterface> $productClass */
        $productClass = match (true) {
            $this->odooVersion <= 17 => ProductV17::class,
            $this->odooVersion <= 18 => ProductV18::class,
            default => ProductV19::class,
        };

        return $productClass;
    }

    /**
     * Get the appropriate Tax class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getTaxClass(): string
    {
        /** @var class-string<BaseInterface> $taxClass */
        $taxClass = match (true) {
            $this->odooVersion <= 17 => TaxV17::class,
            $this->odooVersion <= 18 => TaxV18::class,
            default => TaxV19::class,
        };

        return $taxClass;
    }

    /**
     * Get the appropriate Method class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getMethodClass(): string
    {
        /** @var class-string<BaseInterface> $methodClass */
        $methodClass = match (true) {
            $this->odooVersion <= 17 => MethodV17::class,
            $this->odooVersion <= 18 => MethodV18::class,
            default => MethodV19::class,
        };

        return $methodClass;
    }

    /**
     * Get the appropriate Payment class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getPaymentClass(): string
    {
        /** @var class-string<BaseInterface> $paymentClass */
        $paymentClass = match (true) {
            $this->odooVersion <= 17 => PaymentV17::class,
            $this->odooVersion <= 18 => PaymentV18::class,
            default => PaymentV19::class,
        };

        return $paymentClass;
    }

    /**
     * Get the appropriate Template class based on Odoo version
     * @return class-string<BaseInterface>
     */
    public function getTemplateClass(): string
    {
        /** @var class-string<BaseInterface> $templateClass */
        $templateClass = match (true) {
            $this->odooVersion <= 17 => TemplateV17::class,
            $this->odooVersion <= 18 => TemplateV18::class,
            default => TemplateV19::class,
        };

        return $templateClass;
    }

    /**
     * Get the appropriate Line class based on Odoo version
     * @return class-string<BaseInterface>
     */
    public function getLineClass(): string
    {
        /** @var class-string<BaseInterface> $lineClass */
        $lineClass = match (true) {
            $this->odooVersion <= 17 => LineV17::class,
            $this->odooVersion <= 18 => LineV18::class,
            default => LineV19::class,
        };

        return $lineClass;
    }

    /**
     * Get the appropriate Register class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getRegisterClass(): string
    {
        /** @var class-string<BaseInterface> $registerClass */
        $registerClass = match (true) {
            $this->odooVersion <= 17 => RegisterV17::class,
            $this->odooVersion <= 18 => RegisterV18::class,
            default => RegisterV19::class,
        };

        return $registerClass;
    }

    public function testManageProduct(): void
    {
        $accountClass = $this->getAccountClass();
        $partnerClass = $this->getPartnerClass();

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
        $uomClass = $this->getUomClass();
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
        $categoryClass = $this->getCategoryClass();
        $category = $this->modelListManager->findOneBy($categoryClass);

        self::assertNotNull($category, 'Please create at least one category in ODOO !');

        return $category;
    }

    public function testCreateProduct(): void
    {
        $uom = $this->retrieveUom('Units');
        $category = $this->retrieveFirstCategory();

        $templateClass = $this->getTemplateClass();

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

        $partnerClass = $this->getPartnerClass();
        $journalClass = $this->getJournalClass();
        $currencyClass = $this->getCurrencyClass();
        $productClass = $this->getProductClass();
        $taxClass = $this->getTaxClass();

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

        $moveClass = $this->getMoveClass();
        $journalClass = $this->getJournalClass();
        $methodClass = $this->getMethodClass();

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

        $paymentClass = $this->getPaymentClass();
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

        $moveClass = $this->getMoveClass();

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

        $lineClass = $this->getLineClass();

        return new $lineClass($emptyMoveRel, $currencyRel, 'product');
    }

    private function createPaymentRegister(
        DateTimeInterface $date,
        BaseInterface $journal,
        BaseInterface $paymentMethod
    ): BaseInterface {
        $journalRel = new OdooRelation($journal->getId());

        $registerClass = $this->getRegisterClass();

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
        $partnerClass = $this->getPartnerClass();

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
