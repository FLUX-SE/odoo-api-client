<?php

namespace Tests\FluxSE\OdooApiClient\Manager;

use DateTime;
use DateTimeInterface;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Manager\ModelManager;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;
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

    /** @var RecordListOperations */
    private $recordListOperations;

    /** @var RecordOperationsInterface */
    private $recordOperations;

    /** @var ModelManager */
    private $modelManager;

    /** @var ModelListManager */
    private $modelListManager;

    /** @var CommonOperationsInterface */
    private $commonOperations;

    /** @var int */
    private $odooVersion;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->modelManager = new ModelManager(
            $this->recordOperations->getObjectOperations()->getXmlRpcSerializerHelper()->getSerializer(),
            $this->recordOperations
        );

        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->modelListManager = new ModelListManager(
            $this->recordListOperations->getObjectOperations()->getXmlRpcSerializerHelper()->getSerializer(),
            $this->recordListOperations
        );

        $this->commonOperations = $this->buildOdooApiClientBuilder()->buildCommonOperations();
        $version = $this->commonOperations->version();
        $this->odooVersion = $version->getServerVersionInfo()[0];
    }

    /**
     * @throws ExceptionInterface
     */
    public function testManageProduct()
    {
        $searchDomains1 = new SearchDomains();
        $searchDomains1->addCriterion(Criterion::equal('code', '411100'));
        /** @var Account|null $propertyAccountPayableId */
        $propertyAccountPayableId = $this->modelListManager->findOneBy(Account::class, $searchDomains1);

        $searchDomains2 = new SearchDomains();
        $searchDomains2->addCriterion(Criterion::equal('code', '401100'));
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

        /** @var Partner|null $updatedPartner */
        $updatedPartner = $this->modelListManager->find(Partner::class, $partnerId);

        $this->assertInstanceOf(Partner::class, $updatedPartner);
        // test a null field to be null not empty string
        $this->assertNull($updatedPartner->getParentName());
        $this->assertEquals($savedPartner->getComment(), $updatedPartner->getComment());

        $result = $this->modelManager->delete($updatedPartner);
        $this->assertTrue($result);
    }

    /**
     * @throws ExceptionInterface
     */
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

    /**
     * @throws ExceptionInterface
     */
    private function retrieveFirstCategory(): Category
    {
        /** @var Category|null $category */
        $category = $this->modelListManager->findOneBy(Category::class);

        $this->assertNotNull($category, 'Please create at least one category in ODOO !');

        return $category;
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreateProduct(): void
    {
        $uom = $this->retrieveUom('Units');
        $category = $this->retrieveFirstCategory();

        $template = new Template(
            'test',
            'consu',
            new OdooRelation($category->getId()),
            new OdooRelation($uom->getId()),
            new OdooRelation($uom->getId()),
            []
        );

        $template->setType('consu');
        $template->setActive(true);
        $template->setDefaultCode(sprintf('TEST_%d', time()));

        $templateId = $this->modelManager->persist($template);

        $this->assertIsInt($templateId);
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreateMove(): void
    {
        $date = new DateTime();
        // 1 - Retrieve Accounts
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', '707100'));
        $searchDomains->addCriterion(Criterion::equal('company_id', 1));
        $account = $this->modelListManager->findOneBy(Account::class, $searchDomains);
        $this->assertNotNull($account);

        // 2 - retrieve a Partner
        $partner = $this->modelListManager->findOneBy(Template::class);
        $this->assertNotNull($partner);

        // 3 - retrieve a sale Journal
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('type', 'sale'));
        $searchDomains->addCriterion(Criterion::equal('active', true));
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
        $tax = $this->modelListManager->findOneBy(Tax::class, $searchDomains);
        $this->assertNotNull($tax);

        $partnerRel = new OdooRelation($partner->getId());

        $move = $this->createMove($date, $journal->getId(), $currency->getId());
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

        $this->assertIsInt($moveId);

        if (14 === $this->odooVersion) {
            $this->expectExceptionMessageMatches(
                '#.*TypeError: cannot marshal (None unless allow_none is enabled|<class \'odoo\.api\.account\.move\'> objects\.).*#'
            );
        }

        $response = $this->recordOperations->getObjectOperations()->execute_kw(
            $move::getOdooModelName(),
            'action_post',
            [$moveId]
        );

        $body = $this->modelListManager->getRecordListOperations()->getObjectOperations()
            ->getXmlRpcSerializerHelper()->decodeResponseBody($response->getBody());
        $this->assertTrue($body);
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreatePayment()
    {
        $date = new DateTime();
        // 1 - Retrieve the move to pay
        $searchDomains = new SearchDomains();
        $fieldName = 'invoice_payment_state';
        if (14 === $this->odooVersion) {
            $fieldName = 'payment_state';
        }
        $searchDomains->addAndCriteria(
            Criterion::equal('state', 'posted'),
            Criterion::equal($fieldName, 'not_paid')
        );
        /** @var Move|null $move */
        $move = $this->modelListManager->findOneBy(Move::class, $searchDomains);
        $this->assertNotNull($move);
        $this->assertEquals('posted', $move->getState());
        if (14 === $this->odooVersion) {
            $this->assertEquals('not_paid', $move->getPaymentState());
        } else {
            $this->assertEquals('not_paid', $move->getInvoicePaymentState());
        }

        // 2 - Retrieve the right journal
        $searchDomains = new SearchDomains();
        $searchDomains->addAndCriteria(
            Criterion::equal('type', 'bank'),
            Criterion::equal('active', true)
        );
        $journal = $this->modelListManager->findOneBy(Journal::class, $searchDomains);
        $this->assertNotNull($journal);

        // 3 - Retrieve the paymentMethod
        $searchDomains = new SearchDomains();
        $searchDomains->addAndCriteria(
            Criterion::equal('code', 'manual'),
            Criterion::equal('payment_type', 'inbound')
        );

        /** @var Payment\Method|null $method */
        $paymentMethod = $this->modelListManager->findOneBy(Payment\Method::class, $searchDomains);
        $this->assertNotNull($paymentMethod);

        $paymentRegister = $this->createPaymentRegister($date, $journal->getId(), $paymentMethod->getId());
        $ref = sprintf('PAY_%d', time());
        if (14 === $this->odooVersion) {
            $paymentRegister->setAmount($move->getAmountTotal());
            $paymentRegister->setCommunication($ref);
        } else {
            $paymentRegister->setDisplayName($ref);
        }

        $options = new Options();
        $options->addOption('context', [
            'active_model' => $move::getOdooModelName(),
            'active_ids' => [$move->getId()],
        ]);
        $paymentRegisterId = $this->modelManager->persist($paymentRegister, $options);
        $this->assertIsInt($paymentRegisterId);

        $actionName = 'create_payments';
        if (14 === $this->odooVersion) {
            $actionName = 'action_create_payments';
        }

        $arguments = new Arguments();
        $arguments->addArgument($paymentRegisterId);
        $data = $this->modelManager->getRecordOperations()->execute_kw_action(
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

        if (14 === $this->odooVersion) {
            return new Move(
                $date,
                'draft',
                $moveType,
                $journalRel,
                $currencyRel
            );
            $move->setMoveType($moveType);
            return $move;
        }

        return new Move(
            '/', // !important
            $date,
            'draft',
            $moveType,
            $journalRel,
            $currencyRel
        );
    }

    private function createMoveLine(int $currencyId): Line
    {
        $emptyMoveRel = new OdooRelation();
        $currencyRel = new OdooRelation($currencyId);
        if (14 === $this->odooVersion) {
            return new Line($emptyMoveRel, $currencyRel);
        }

        $moveLine = new Line($emptyMoveRel);
        $moveLine->setCurrencyId($currencyRel);
        return $moveLine;
    }

    private function createPaymentRegister(DateTimeInterface $date, int $journalId, int $paymentMethodId): Payment\Register
    {
        $journalRel = new OdooRelation($journalId);
        $paymentMethodRel = new OdooRelation($paymentMethodId);

        if (14 === $this->odooVersion) {
            $paymentRegister = new Payment\Register($date);
            $paymentRegister->setJournalId($journalRel);
            $paymentRegister->setPaymentMethodId($paymentMethodRel);
            return $paymentRegister;
        }

        return new Payment\Register(
            $date,
            $journalRel,
            $paymentMethodRel
        );
    }
}
