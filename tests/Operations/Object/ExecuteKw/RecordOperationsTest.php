<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use DateTime;
use Flux\OdooApiClient\Manager\ModelManager;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\OdooRelation;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RecordOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var RecordListOperations */
    private $recordListOperations;
    /** @var ModelManager */
    private $modelManager;

    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        /** @var RecordOperationsInterface $recordOperations */
        $recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->modelManager = new ModelManager(
            $recordOperations->getObjectOperations()->getXmlRpcSerializerHelper()->getSerializer(),
            $recordOperations
        );
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreate(): void
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);

        // 1 - Retrieve Accounts
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', '411100'));
        $accountPayable = $this->recordListOperations->search_read(
            Account::getOdooModelName(),
            $searchDomains,
            $searchReadOptions
        )[0];

        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', '401100'));
        $accountReceivable = $this->recordListOperations->search_read(
            Account::getOdooModelName(),
            $searchDomains,
            $searchReadOptions
        )[0];

        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('code', '707100'));
        $account = $this->recordListOperations->search_read(
            Account::getOdooModelName(),
            $searchDomains,
            $searchReadOptions
        )[0];

        // 2 - create or retrieve Partner
        $partner = [
            'id' => 7,
        ];

        // 3 - retrieve the PriceList
        $priceList = $this->recordListOperations->search_read(
            Pricelist::getOdooModelName(),
            null,
            $searchReadOptions
        )[0];

        // 4 - retrieve the Journal
        $journal = $this->recordListOperations->search_read(
            Journal::getOdooModelName(),
            null,
            $searchReadOptions
        )[0];

        // 4 - retrieve currency
        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal('name', 'EUR'));
        $currency = $this->recordListOperations->search_read(
            Currency::getOdooModelName(),
            $searchDomains,
            $searchReadOptions
        )[0];

        // 5 - retrieve the company owning the sale
        $company = $this->recordListOperations->read(Company::getOdooModelName(), [1])[0];

        // 6 - retrieve the product
        $products = $this->recordListOperations->search_read(
            Product::getOdooModelName(),
            null,
            $searchReadOptions
        );
        $product = count($products) === 0 ? null : $products[0];

        $searchDomains = new SearchDomains();
        $searchDomains->addCriterion(Criterion::equal_like('description', '% 20_'));
        $tax = $this->recordListOperations->search_read(
            Tax::getOdooModelName(),
            null,
            $searchReadOptions
        )[0];

        $partner = new OdooRelation($partner['id']);
        $currency_id = new OdooRelation($currency['id']);
        $move = new Move(
            new DateTime(),
            'draft',
            'out_invoice',
            new OdooRelation($journal['id']),
             $currency_id,
            'no_extract_requested'
        );
        $move->setRef('TEST_I000000');

        $line = new Line(new OdooRelation(), new OdooRelation());
        $line->setAccountId(new OdooRelation($account['id']));
        $line->setQuantity(2);
        $line->setPriceUnit(10);
        $line->setCredit(20);
        $line->addTaxIds(new OdooRelation($tax['id']));
        $line->setProductId(new OdooRelation($product['id'] ?? null));
        $line->setName('test article');
        $line->setDiscount(100);
        $relation = new OdooRelation();
        $relation->buildAdd($line);
        $move->addInvoiceLineIds($relation);

        $line2 = new Line(new OdooRelation(), $currency_id);
        $line2->setAccountId(new OdooRelation(false));
        $line2->setDisplayType('line_note');
        $line2->setName('test');
        $relation2 = new OdooRelation();
        $relation2->buildAdd($line2);
        $move->addInvoiceLineIds($relation2);

        $moveId = $this->modelManager->persist($move);

        $this->assertIsInt($moveId);
    }
}
