<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Product\Category;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Industry;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Uom\Uom;
use Flux\OdooApiClient\Model\Object\Utm\Campaign;
use Flux\OdooApiClient\Model\Object\Utm\Medium;
use Flux\OdooApiClient\Model\Object\Utm\Source;

/**
 * Odoo model : sale.report
 * Name : sale.report
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Report extends Base
{
    /**
     * Order Reference
     *
     * @var null|string
     */
    private $name;

    /**
     * Order Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Product Variant
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom;

    /**
     * Qty Ordered
     *
     * @var null|float
     */
    private $product_uom_qty;

    /**
     * Qty Delivered
     *
     * @var null|float
     */
    private $qty_delivered;

    /**
     * Qty To Invoice
     *
     * @var null|float
     */
    private $qty_to_invoice;

    /**
     * Qty Invoiced
     *
     * @var null|float
     */
    private $qty_invoiced;

    /**
     * Customer
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Total
     *
     * @var null|float
     */
    private $price_total;

    /**
     * Untaxed Total
     *
     * @var null|float
     */
    private $price_subtotal;

    /**
     * Untaxed Amount To Invoice
     *
     * @var null|float
     */
    private $untaxed_amount_to_invoice;

    /**
     * Untaxed Amount Invoiced
     *
     * @var null|float
     */
    private $untaxed_amount_invoiced;

    /**
     * Product
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Product Category
     *
     * @var null|Category
     */
    private $categ_id;

    /**
     * # of Lines
     *
     * @var null|int
     */
    private $nbr;

    /**
     * Pricelist
     *
     * @var null|Pricelist
     */
    private $pricelist_id;

    /**
     * Analytic Account
     *
     * @var null|Account
     */
    private $analytic_account_id;

    /**
     * Sales Team
     *
     * @var null|Team
     */
    private $team_id;

    /**
     * Customer Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Customer Industry
     *
     * @var null|Industry
     */
    private $industry_id;

    /**
     * Customer Entity
     *
     * @var null|Partner
     */
    private $commercial_partner_id;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Gross Weight
     *
     * @var null|float
     */
    private $weight;

    /**
     * Volume
     *
     * @var null|float
     */
    private $volume;

    /**
     * Discount %
     *
     * @var null|float
     */
    private $discount;

    /**
     * Discount Amount
     *
     * @var null|float
     */
    private $discount_amount;

    /**
     * Campaign
     *
     * @var null|Campaign
     */
    private $campaign_id;

    /**
     * Medium
     *
     * @var null|Medium
     */
    private $medium_id;

    /**
     * Source
     *
     * @var null|Source
     */
    private $source_id;

    /**
     * Order #
     *
     * @var null|Order
     */
    private $order_id;

    /**
     * Days To Confirm
     *
     * @var null|float
     */
    private $days_to_confirm;

    /**
     * Invoice Status
     *
     * @var null|array
     */
    private $invoice_status;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|float
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @return null|Team
     */
    public function getTeamId(): ?Team
    {
        return $this->team_id;
    }

    /**
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    /**
     * @return null|Industry
     */
    public function getIndustryId(): ?Industry
    {
        return $this->industry_id;
    }

    /**
     * @return null|Partner
     */
    public function getCommercialPartnerId(): ?Partner
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|float
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @return null|float
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @return null|Pricelist
     */
    public function getPricelistId(): ?Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return null|float
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discount_amount;
    }

    /**
     * @param null|Campaign $campaign_id
     */
    public function setCampaignId(?Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @param null|Medium $medium_id
     */
    public function setMediumId(?Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param null|Source $source_id
     */
    public function setSourceId(?Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return null|Order
     */
    public function getOrderId(): ?Order
    {
        return $this->order_id;
    }

    /**
     * @return null|float
     */
    public function getDaysToConfirm(): ?float
    {
        return $this->days_to_confirm;
    }

    /**
     * @return null|Account
     */
    public function getAnalyticAccountId(): ?Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return null|int
     */
    public function getNbr(): ?int
    {
        return $this->nbr;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @return null|Product
     */
    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    /**
     * @return null|Uom
     */
    public function getProductUom(): ?Uom
    {
        return $this->product_uom;
    }

    /**
     * @return null|float
     */
    public function getProductUomQty(): ?float
    {
        return $this->product_uom_qty;
    }

    /**
     * @return null|float
     */
    public function getQtyDelivered(): ?float
    {
        return $this->qty_delivered;
    }

    /**
     * @return null|float
     */
    public function getQtyToInvoice(): ?float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @return null|float
     */
    public function getQtyInvoiced(): ?float
    {
        return $this->qty_invoiced;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Category
     */
    public function getCategId(): ?Category
    {
        return $this->categ_id;
    }

    /**
     * @return null|Users
     */
    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    /**
     * @return null|float
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return null|float
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @return null|float
     */
    public function getUntaxedAmountToInvoice(): ?float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @return null|float
     */
    public function getUntaxedAmountInvoiced(): ?float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @return null|Template
     */
    public function getProductTmplId(): ?Template
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return null|array
     */
    public function getInvoiceStatus(): ?array
    {
        return $this->invoice_status;
    }
}
