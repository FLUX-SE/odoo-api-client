<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Manager;

use DateTime;
use DateTimeInterface;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelListManagerInterface;
use FluxSE\OdooApiClient\Manager\ModelManager;
use FluxSE\OdooApiClient\Manager\ModelManagerInterface;
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
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move\Line;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Method;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Register;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Category;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom;

class ModelManagerTest extends TestCase
{
    use ExecuteKwOperationsTrait;

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

        $commonOperations = $this->buildOdooApiClientBuilder()->buildCommonOperations();
        $version = $commonOperations->version();
        $this->odooVersion = $version->getServerVersionInfo()[0];
    }

    public function testManageProduct(): void
    {
        $searchDomains1 = new SearchDomains();
        $searchDomains1->addCriterion(Criterion::equal('code', '411100'));
        /** @var Account|null $propertyAccountPayableId */
        $propertyAccountPayableId = $this->modelListManager->findOneBy(Account::class, $searchDomains1);

        $searchDomains2 = new SearchDomains();
        $searchDomains2->addCriterion(Criterion::equal('code', '401100'));
        /** @var Account|null $propertyAccountReceivableId */
        $propertyAccountReceivableId = $this->modelListManager->findOneBy(Account::class, $searchDomains2);

        $partner = $this->createPartner(
            new OdooRelation($propertyAccountPayableId?->getId()),
            new OdooRelation($propertyAccountReceivableId?->getId()),
        );
        $partner->setName('Test partner');

        $partnerId = $this->modelManager->persist($partner);
        /** @var Partner|null $savedPartner */
        $savedPartner = $this->modelListManager->find(Partner::class, $partnerId);

        $this->assertInstanceOf(Partner::class, $savedPartner);

        $savedPartner->setComment('<p>Test</p>');

        $result = $this->modelManager->update($savedPartner);
        $this->assertTrue($result);

        /** @var Partner|null $updatedPartner */
        $updatedPartner = $this->modelListManager->find(Partner::class, $partnerId);

        $this->assertInstanceOf(Partner::class, $updatedPartner);
        // test a null field to be null not empty string
        $this->assertNull($updatedPartner->getParentName());
        $this->assertEquals($savedPartner->getComment(), $updatedPartner->getComment());

        $result = $this->modelManager->delete($updatedPartner);
        $this->assertTrue($result);
    }

    private function retrieveUom(string $name): Uom
    {
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('name', $name));

        /** @var Uom|null $uom */
        $uom = $this->modelListManager->findOneBy(Uom::class, $searchDomains);

        $this->assertNotNull($uom, sprintf(
            'Unable to find the the uom named "%s" !',
            $name
        ));

        return $uom;
    }

    private function retrieveFirstCategory(): Category
    {
        /** @var Category|null $category */
        $category = $this->modelListManager->findOneBy(Category::class);

        $this->assertNotNull($category, 'Please create at least one category in ODOO !');

        return $category;
    }

    public function testCreateProduct(): void
    {
        $uom = $this->retrieveUom('Units');
        $category = $this->retrieveFirstCategory();

        if ($this->odooVersion <= 15) {
            /** @phpstan-ignore-next-line */
            $template = new Template(
                'test',
                'consu',
                new OdooRelation($category->getId()),
                new OdooRelation($uom->getId()),
                new OdooRelation($uom->getId()),
                []
            );
        } elseif ($this->odooVersion <= 17) {
            /** @phpstan-ignore-next-line */
            $template = new Template(
                'test',
                'consu',
                new OdooRelation($category->getId()),
                new OdooRelation($uom->getId()),
                new OdooRelation($uom->getId()),
                [],
                'warning'
            );
        } else {
            /** @phpstan-ignore-next-line */
            $template = new Template(
                'test',
                'consu',
                'no',
                new OdooRelation($category->getId()),
                new OdooRelation($uom->getId()),
                new OdooRelation($uom->getId()),
                [],
                'warning'
            );
        }

        $template->setType('consu');
        $template->setActive(true);
        $template->setDefaultCode(sprintf('TEST_%d', time()));

        $templateId = $this->modelManager->persist($template);

        $this->assertGreaterThan(0, $templateId);
    }

    public function testCreateMove(): void
    {
        $date = new DateTime();
        // 0 - retrieve the Company
        $companyId = 2; // FR Company
        if (13 === $this->odooVersion) {
            $companyId = 1; // No multiple company created
        }

        // 1 - Retrieve Accounts
        $searchDomains = new SearchDomains();
        if ($this->odooVersion <= 17) {
            $searchDomains->addCriterion(Criterion::equal('code', '707000'));
            $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        } else {
            $searchDomains->addCriterion(Criterion::equal('name', 'Sales of goods'));
            $searchDomains->addCriterion(Criterion::in('company_ids', [$companyId]));
        }
        $account = $this->modelListManager->findOneBy(Account::class, $searchDomains);
        $this->assertNotNull($account);

        // 2 - retrieve a Partner
        $partner = $this->modelListManager->findOneBy(Partner::class);
        $this->assertNotNull($partner);

        // 3 - retrieve a sale Journal
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('type', 'sale'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $journal = $this->modelListManager->findOneBy(Journal::class, $searchDomains);
        $this->assertNotNull($journal);

        // 4 - retrieve an active currency
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $currency = $this->modelListManager->findOneBy(Currency::class, $searchDomains);
        $this->assertNotNull($currency);

        // 5 - retrieve an active product
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $product = $this->modelListManager->findOneBy(Product::class);
        $this->assertNotNull($product);

        // 6 - retrieve a tax (here: 20% from French accounting)
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('amount', 20));
        $searchDomains->addCriterion(Criterion::equal('price_include', false));
        $searchDomains->addCriterion(Criterion::equal('type_tax_use', 'sale'));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $tax = $this->modelListManager->findOneBy(Tax::class, $searchDomains);
        $this->assertNotNull($tax);

        $partnerRel = new OdooRelation($partner->getId());
        $companyRel = new OdooRelation($companyId);

        $move = $this->createMove($date, $journal->getId(), $currency->getId());
        $move->setCompanyId($companyRel);
        $move->setPartnerId($partnerRel);
        $move->setRef(sprintf('TEST_I%d', time()));

        $productRel = new OdooRelation($product->getId());
        $accountRel = new OdooRelation($account->getId());
        $taxRel = new OdooRelation($tax->getId());

        $line1 = $this->createMoveLine($currency->getId());
        $line1->setName('test article');
        $line1->setProductId($productRel);
        $line1->setAccountId($accountRel);
        $line1->setQuantity(2);
        $line1->setPriceUnit(10);
        $line1->setDiscount(50);
        $line1->addTaxIds($taxRel);

        $line2 = $this->createMoveLine($currency->getId());
        $line2->setAccountId(new OdooRelation(false)); //Required...
        $line2->setDisplayType('line_note');
        $line2->setName('test');

        foreach ([$line1, $line2] as $line) {
            $relation = new OdooRelation();
            $relation->buildAdd($line);
            $move->addInvoiceLineIds($relation);
        }

        $moveId = $this->modelManager->persist($move);

        $this->assertGreaterThan(0, $moveId);

        $arguments = new Arguments();
        $arguments->addArgument($moveId);
        $body = $this->recordOperations->execute_kw_action(
            $move::getOdooModelName(),
            'action_post',
            $arguments
        );

        if (13 === $this->odooVersion) {
            $this->assertTrue($body);
        } else {
            $this->assertFalse($body);
        }
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreatePayment(): void
    {
        $date = new DateTime();
        // 0 - retrieve the Company
        $companyId = 2; // FR Company
        if (13 === $this->odooVersion) {
            $companyId = 1; // No multiple company created
        }

        // 1 - Retrieve the move to pay
        $searchDomains = new SearchDomains();
        $fieldName = 'payment_state';
        if (13 === $this->odooVersion) {
            $fieldName = 'invoice_payment_state';
        }
        $searchDomains->addCriterion(Criterion::equal('state', 'posted'));
        $searchDomains->addCriterion(Criterion::equal($fieldName, 'not_paid'));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        /** @var Move|null $move */
        $move = $this->modelListManager->findOneBy(Move::class, $searchDomains);
        $this->assertNotNull($move);
        $this->assertEquals('posted', $move->getState());
        if (13 === $this->odooVersion) {
            $this->assertEquals('not_paid', $move->getInvoicePaymentState());
        } else {
            $this->assertEquals('not_paid', $move->getPaymentState());
        }

        // 2 - Retrieve the right journal
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('type', 'bank'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
        $searchDomains->addCriterion(Criterion::equal('company_id', $companyId));
        $journal = $this->modelListManager->findOneBy(Journal::class, $searchDomains);
        $this->assertNotNull($journal);

        // 3 - Retrieve the paymentMethod
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', 'manual'));
        $searchDomains->addCriterion(Criterion::equal('payment_type', 'inbound'));
        /** @var Payment\Method|null $method */
        $paymentMethod = $this->modelListManager->findOneBy(Method::class, $searchDomains);
        $this->assertNotNull($paymentMethod);

        $paymentRegister = $this->createPaymentRegister($date, $journal, $paymentMethod);
        $ref = sprintf('PAY_%d', time());
        if (13 === $this->odooVersion) {
            $paymentRegister->setDisplayName($ref);
        } else {
            $paymentRegister->setAmount($move->getAmountTotal());

            $paymentRegister->setCommunication($ref);

            $paymentRegister->setCompanyId($move->getCompanyId());
        }


        $options = new Options();
        $options->addOption('context', [
            'active_model' => $move::getOdooModelName(),
            'active_ids' => [$move->getId()],
        ]);
        $paymentRegisterId = $this->modelManager->persist($paymentRegister, $options);
        $this->assertGreaterThan(0, $paymentRegisterId);

        $actionName = 'action_create_payments';
        if (13 === $this->odooVersion) {
            $actionName = 'create_payments';
        }

        $arguments = new Arguments();
        $arguments->addArgument($paymentRegisterId);
        $data = $this->recordOperations->execute_kw_action(
            $paymentRegister::getOdooModelName(),
            $actionName,
            $arguments
        );

        $this->assertArrayHasKey('res_model', $data);
        $this->assertEquals(Payment::getOdooModelName(), $data['res_model']);
        $this->assertArrayHasKey('res_id', $data);
        $this->assertIsInt($data['res_id']);
    }

    private function createMove(
        DateTimeInterface $date,
        int $journalId,
        int $currencyId,
        string $moveType = 'out_invoice'
    ): Move {
        $journalRel = new OdooRelation($journalId);
        $currencyRel = new OdooRelation($currencyId);

        if (13 === $this->odooVersion) {
            return new Move(
                '/', // !important
                $date,
                'draft',
                $moveType,
                $journalRel,
                $currencyRel
            );
        }

        if ($this->odooVersion <= 15) {
            return new Move(
                $date,
                'draft',
                $moveType,
                $journalRel,
                $currencyRel,
                'no_extract_requested'
            );
        }


        return new Move(
            $date,
            'draft',
            $moveType,
            $journalRel,
            'no',
            $currencyRel,
        );
    }

    private function createMoveLine(int $currencyId): Line
    {
        $emptyMoveRel = new OdooRelation();
        $currencyRel = new OdooRelation($currencyId);

        if (13 === $this->odooVersion) {
            $moveLine = new Line($emptyMoveRel);
            return $moveLine;
        }

        if ($this->odooVersion <= 15) {
            return new Line($emptyMoveRel, $currencyRel);
        }

        return new Line($emptyMoveRel, $currencyRel, 'product');
    }

    private function createPaymentRegister(DateTimeInterface $date, Journal $journal, Method $paymentMethod): Register
    {
        $journalRel = new OdooRelation($journal->getId());
        $paymentMethodRel = new OdooRelation($paymentMethod->getId());

        if (13 === $this->odooVersion) {
            return new Register(
                $date,
                $journalRel,
                $paymentMethodRel
            );
        }

        $paymentRegister = new Register($date);
        $paymentRegister->setJournalId($journalRel);
        if (14 === $this->odooVersion) {
            $paymentRegister->setPaymentMethodId($paymentMethodRel);
        } else {
            $paymentRegister->setPaymentMethodCode($paymentMethod->getCode());
        }
        return $paymentRegister;
    }

    private function createPartner(OdooRelation $payableRel, OdooRelation $receivableRel): Partner
    {
        if ($this->odooVersion <= 17) {
            return new Partner(
                $payableRel,
                $receivableRel,
            );
        }

        return new Partner(
            'never'
        );
    }
}
