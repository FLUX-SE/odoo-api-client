<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Purchase;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : purchase.report
 * ---
 * Name : purchase.report
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Report extends Base
{
    /**
     * Order Date
     * ---
     * Date on which this document has been created
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_order;

    /**
     * Order Status
     * ---
     * Selection :
     *     -> draft (Draft RFQ)
     *     -> sent (RFQ Sent)
     *     -> to approve (To Approve)
     *     -> purchase (Purchase Order)
     *     -> done (Done)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Vendor
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Confirmation Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_approve;

    /**
     * Reference Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_uom;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Purchase Representative
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Days to Confirm
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $delay;

    /**
     * Days to Receive
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $delay_pass;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Average Cost
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_average;

    /**
     * # of Lines
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nbr_lines;

    /**
     * Product Category
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $category_id;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_tmpl_id;

    /**
     * Partner Country
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_analytic_id;

    /**
     * Commercial Entity
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $commercial_partner_id;

    /**
     * Gross Weight
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $weight;

    /**
     * Volume
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $volume;

    /**
     * Order
     * ---
     * Relation : many2one (purchase.order)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_id;

    /**
     * Untaxed Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $untaxed_total;

    /**
     * Qty Ordered
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_ordered;

    /**
     * Qty Received
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_received;

    /**
     * Qty Billed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_billed;

    /**
     * Qty to be Billed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_to_be_billed;

    /**
     * Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $picking_type_id;

    /**
     * @param OdooRelation $product_uom Reference Unit of Measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $product_uom)
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("order_id")
     */
    public function getOrderId(): ?OdooRelation
    {
        return $this->order_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("fiscal_position_id")
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_analytic_id")
     */
    public function getAccountAnalyticId(): ?OdooRelation
    {
        return $this->account_analytic_id;
    }

    /**
     * @param OdooRelation|null $account_analytic_id
     */
    public function setAccountAnalyticId(?OdooRelation $account_analytic_id): void
    {
        $this->account_analytic_id = $account_analytic_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("commercial_partner_id")
     */
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
    }

    /**
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("weight")
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float|null
     *
     * @SerializedName("volume")
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @param float|null $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @param OdooRelation|null $order_id
     */
    public function setOrderId(?OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("untaxed_total")
     */
    public function getUntaxedTotal(): ?float
    {
        return $this->untaxed_total;
    }

    /**
     * @param float|null $untaxed_total
     */
    public function setUntaxedTotal(?float $untaxed_total): void
    {
        $this->untaxed_total = $untaxed_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_ordered")
     */
    public function getQtyOrdered(): ?float
    {
        return $this->qty_ordered;
    }

    /**
     * @param float|null $qty_ordered
     */
    public function setQtyOrdered(?float $qty_ordered): void
    {
        $this->qty_ordered = $qty_ordered;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_received")
     */
    public function getQtyReceived(): ?float
    {
        return $this->qty_received;
    }

    /**
     * @param float|null $qty_received
     */
    public function setQtyReceived(?float $qty_received): void
    {
        $this->qty_received = $qty_received;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_billed")
     */
    public function getQtyBilled(): ?float
    {
        return $this->qty_billed;
    }

    /**
     * @param float|null $qty_billed
     */
    public function setQtyBilled(?float $qty_billed): void
    {
        $this->qty_billed = $qty_billed;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_to_be_billed")
     */
    public function getQtyToBeBilled(): ?float
    {
        return $this->qty_to_be_billed;
    }

    /**
     * @param float|null $qty_to_be_billed
     */
    public function setQtyToBeBilled(?float $qty_to_be_billed): void
    {
        $this->qty_to_be_billed = $qty_to_be_billed;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("picking_type_id")
     */
    public function getPickingTypeId(): ?OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation|null $picking_type_id
     */
    public function setPickingTypeId(?OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $category_id
     */
    public function setCategoryId(?OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_order")
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param DateTimeInterface|null $date_order
     */
    public function setDateOrder(?DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_approve")
     */
    public function getDateApprove(): ?DateTimeInterface
    {
        return $this->date_approve;
    }

    /**
     * @param DateTimeInterface|null $date_approve
     */
    public function setDateApprove(?DateTimeInterface $date_approve): void
    {
        $this->date_approve = $date_approve;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_uom")
     */
    public function getProductUom(): OdooRelation
    {
        return $this->product_uom;
    }

    /**
     * @param OdooRelation $product_uom
     */
    public function setProductUom(OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("delay")
     */
    public function getDelay(): ?float
    {
        return $this->delay;
    }

    /**
     * @param float|null $delay
     */
    public function setDelay(?float $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return float|null
     *
     * @SerializedName("delay_pass")
     */
    public function getDelayPass(): ?float
    {
        return $this->delay_pass;
    }

    /**
     * @param float|null $delay_pass
     */
    public function setDelayPass(?float $delay_pass): void
    {
        $this->delay_pass = $delay_pass;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_total")
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @param float|null $price_total
     */
    public function setPriceTotal(?float $price_total): void
    {
        $this->price_total = $price_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_average")
     */
    public function getPriceAverage(): ?float
    {
        return $this->price_average;
    }

    /**
     * @param float|null $price_average
     */
    public function setPriceAverage(?float $price_average): void
    {
        $this->price_average = $price_average;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nbr_lines")
     */
    public function getNbrLines(): ?int
    {
        return $this->nbr_lines;
    }

    /**
     * @param int|null $nbr_lines
     */
    public function setNbrLines(?int $nbr_lines): void
    {
        $this->nbr_lines = $nbr_lines;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'purchase.report';
    }
}
