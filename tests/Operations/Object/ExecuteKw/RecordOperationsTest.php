<?php

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use DateTime;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Sale\Order;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line;
use Flux\OdooApiClient\Model\OdooRelation;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

class RecordOperationsTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    /** @var RecordListOperations */
    private $recordListOperations;
    /** @var RecordOperations */
    private $recordOperations;
    /** @var Serializer */
    private $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->recordListOperations = $this->buildExecuteKwOperations(RecordListOperations::class);
        $this->recordOperations = $this->buildExecuteKwOperations(RecordOperations::class);
        $this->serializer = $this->recordOperations->getObjectOperations()->getXmlRpcSerializerHelper()->getSerializer();
    }

    /**
     * @throws ExceptionInterface
     */
    public function testCreate(): void
    {
        // 1 - Retrieve Accounts
        $accountPayable = $this->recordListOperations->search_read(Account::ODOO_MODEL_NAME, [[
            ['code', '=', '411100', ],
        ]])[0];

        $accountReceivable = $this->recordListOperations->search_read(Account::ODOO_MODEL_NAME, [[
            ['code', '=', '401100', ],
        ]])[0];

        // 2 - create or retrieve Partner
        $partner = [
            'id' => 7,
        ];

        // 3 - retrieve the PriceList
        $priceList = $this->recordListOperations->search_read(Pricelist::ODOO_MODEL_NAME)[0];

        // 4 - retrieve currency
        $currency = $this->recordListOperations->search_read(Currency::ODOO_MODEL_NAME, [[
            ['name', '=', 'EUR', ],
        ]])[0];

        // 5 - retrieve the company owning the sale
        $company = $this->recordListOperations->search_read(Company::ODOO_MODEL_NAME)[0];

        // 6 - retrieve the product
        $product = $this->recordListOperations->search_read(Product::ODOO_MODEL_NAME)[0];

        $partner = new OdooRelation($partner['id']);
        $saleOrder = new Order(
            'I00001',
            new DateTime(),
            $partner,
            $partner,
            $partner,
            new OdooRelation($priceList['id']),
            new OdooRelation($currency['id']),
            new OdooRelation($company['id']),
        );

        $saleOrderArr = $this->serializer->normalize($saleOrder);
        $orderId = $this->recordOperations->create($saleOrder::ODOO_MODEL_NAME, [$saleOrderArr]);
        $this->assertIsInt($orderId);

        $line = new Line(
            new OdooRelation($orderId),
            'A description',
            123.50,
            1.0,
            0
        );
        $line->setProductId(new OdooRelation($product['id']));
        $saleLineArr = $this->serializer->normalize($line);

        $lineId = $this->recordOperations->create($line::ODOO_MODEL_NAME, [$saleLineArr]);
        $this->assertIsInt($lineId);
    }
}
