<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.report
 * ---
 * Name : sale.report
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
     * Order Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Order Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Product Variant
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
     * Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_uom;

    /**
     * Qty Ordered
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_uom_qty;

    /**
     * Qty Delivered
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_delivered;

    /**
     * Qty To Invoice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_to_invoice;

    /**
     * Qty Invoiced
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_invoiced;

    /**
     * Customer
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
     * Salesperson
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
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Untaxed Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_subtotal;

    /**
     * Untaxed Amount To Invoice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $untaxed_amount_to_invoice;

    /**
     * Untaxed Amount Invoiced
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $untaxed_amount_invoiced;

    /**
     * Product
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
    private $categ_id;

    /**
     * # of Lines
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nbr;

    /**
     * Pricelist
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pricelist_id;

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
    private $analytic_account_id;

    /**
     * Sales Team
     * ---
     * Relation : many2one (crm.team)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Team
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * Customer Country
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
     * Customer Industry
     * ---
     * Relation : many2one (res.partner.industry)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Industry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $industry_id;

    /**
     * Customer Entity
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
     * Status
     * ---
     * Selection :
     *     -> draft (Draft Quotation)
     *     -> sent (Quotation Sent)
     *     -> sale (Sales Order)
     *     -> done (Sales Done)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

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
     * Discount %
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

    /**
     * Discount Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount_amount;

    /**
     * Campaign
     * ---
     * Relation : many2one (utm.campaign)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Campaign
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $campaign_id;

    /**
     * Medium
     * ---
     * Relation : many2one (utm.medium)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Medium
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $medium_id;

    /**
     * Source
     * ---
     * Relation : many2one (utm.source)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Source
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_id;

    /**
     * Order #
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_id;

    /**
     * Days To Confirm
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $days_to_confirm;

    /**
     * Invoice Status
     * ---
     * Selection :
     *     -> upselling (Upselling Opportunity)
     *     -> invoiced (Fully Invoiced)
     *     -> to invoice (To Invoice)
     *     -> no (Nothing to Invoice)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_status;

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
    private $warehouse_id;

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * @return float|null
     *
     * @SerializedName("volume")
     */
    public function getVolume(): ?float
    {
        return $this->volume;
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
     * @SerializedName("weight")
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @param OdooRelation|null $industry_id
     */
    public function setIndustryId(?OdooRelation $industry_id): void
    {
        $this->industry_id = $industry_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("discount")
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("industry_id")
     */
    public function getIndustryId(): ?OdooRelation
    {
        return $this->industry_id;
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
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("team_id")
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @param float|null $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param OdooRelation|null $pricelist_id
     */
    public function setPricelistId(?OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param OdooRelation|null $order_id
     */
    public function setOrderId(?OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param OdooRelation|null $warehouse_id
     */
    public function setWarehouseId(?OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("warehouse_id")
     */
    public function getWarehouseId(): ?OdooRelation
    {
        return $this->warehouse_id;
    }

    /**
     * @param string|null $invoice_status
     */
    public function setInvoiceStatus(?string $invoice_status): void
    {
        $this->invoice_status = $invoice_status;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_status")
     */
    public function getInvoiceStatus(): ?string
    {
        return $this->invoice_status;
    }

    /**
     * @param float|null $days_to_confirm
     */
    public function setDaysToConfirm(?float $days_to_confirm): void
    {
        $this->days_to_confirm = $days_to_confirm;
    }

    /**
     * @return float|null
     *
     * @SerializedName("days_to_confirm")
     */
    public function getDaysToConfirm(): ?float
    {
        return $this->days_to_confirm;
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
     * @return float|null
     *
     * @SerializedName("discount_amount")
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discount_amount;
    }

    /**
     * @param OdooRelation|null $source_id
     */
    public function setSourceId(?OdooRelation $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("source_id")
     */
    public function getSourceId(): ?OdooRelation
    {
        return $this->source_id;
    }

    /**
     * @param OdooRelation|null $medium_id
     */
    public function setMediumId(?OdooRelation $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("medium_id")
     */
    public function getMediumId(): ?OdooRelation
    {
        return $this->medium_id;
    }

    /**
     * @param OdooRelation|null $campaign_id
     */
    public function setCampaignId(?OdooRelation $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("campaign_id")
     */
    public function getCampaignId(): ?OdooRelation
    {
        return $this->campaign_id;
    }

    /**
     * @param float|null $discount_amount
     */
    public function setDiscountAmount(?float $discount_amount): void
    {
        $this->discount_amount = $discount_amount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("analytic_account_id")
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("pricelist_id")
     */
    public function getPricelistId(): ?OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param float|null $product_uom_qty
     */
    public function setProductUomQty(?float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @param float|null $qty_invoiced
     */
    public function setQtyInvoiced(?float $qty_invoiced): void
    {
        $this->qty_invoiced = $qty_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_invoiced")
     */
    public function getQtyInvoiced(): ?float
    {
        return $this->qty_invoiced;
    }

    /**
     * @param float|null $qty_to_invoice
     */
    public function setQtyToInvoice(?float $qty_to_invoice): void
    {
        $this->qty_to_invoice = $qty_to_invoice;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_to_invoice")
     */
    public function getQtyToInvoice(): ?float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @param float|null $qty_delivered
     */
    public function setQtyDelivered(?float $qty_delivered): void
    {
        $this->qty_delivered = $qty_delivered;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_delivered")
     */
    public function getQtyDelivered(): ?float
    {
        return $this->qty_delivered;
    }

    /**
     * @return float|null
     *
     * @SerializedName("product_uom_qty")
     */
    public function getProductUomQty(): ?float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation|null $product_uom
     */
    public function setProductUom(?OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom")
     */
    public function getProductUom(): ?OdooRelation
    {
        return $this->product_uom;
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
     * @SerializedName("product_id")
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param int|null $nbr
     */
    public function setNbr(?int $nbr): void
    {
        $this->nbr = $nbr;
    }

    /**
     * @return float|null
     *
     * @SerializedName("untaxed_amount_invoiced")
     */
    public function getUntaxedAmountInvoiced(): ?float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nbr")
     */
    public function getNbr(): ?int
    {
        return $this->nbr;
    }

    /**
     * @param OdooRelation|null $categ_id
     */
    public function setCategId(?OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("categ_id")
     */
    public function getCategId(): ?OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
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
     * @param float|null $untaxed_amount_invoiced
     */
    public function setUntaxedAmountInvoiced(?float $untaxed_amount_invoiced): void
    {
        $this->untaxed_amount_invoiced = $untaxed_amount_invoiced;
    }

    /**
     * @param float|null $untaxed_amount_to_invoice
     */
    public function setUntaxedAmountToInvoice(?float $untaxed_amount_to_invoice): void
    {
        $this->untaxed_amount_to_invoice = $untaxed_amount_to_invoice;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("untaxed_amount_to_invoice")
     */
    public function getUntaxedAmountToInvoice(): ?float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @param float|null $price_subtotal
     */
    public function setPriceSubtotal(?float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_subtotal")
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
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
     * @SerializedName("price_total")
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.report';
    }
}
