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
 *
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
     * @var string
     */
    private $name;

    /**
     * Order Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Product Variant
     *
     * @var Product
     */
    private $product_id;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom;

    /**
     * Qty Ordered
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Qty Delivered
     *
     * @var float
     */
    private $qty_delivered;

    /**
     * Qty To Invoice
     *
     * @var float
     */
    private $qty_to_invoice;

    /**
     * Qty Invoiced
     *
     * @var float
     */
    private $qty_invoiced;

    /**
     * Customer
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $user_id;

    /**
     * Total
     *
     * @var float
     */
    private $price_total;

    /**
     * Untaxed Total
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Untaxed Amount To Invoice
     *
     * @var float
     */
    private $untaxed_amount_to_invoice;

    /**
     * Untaxed Amount Invoiced
     *
     * @var float
     */
    private $untaxed_amount_invoiced;

    /**
     * Product
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Product Category
     *
     * @var Category
     */
    private $categ_id;

    /**
     * # of Lines
     *
     * @var int
     */
    private $nbr;

    /**
     * Pricelist
     *
     * @var Pricelist
     */
    private $pricelist_id;

    /**
     * Analytic Account
     *
     * @var Account
     */
    private $analytic_account_id;

    /**
     * Sales Team
     *
     * @var Team
     */
    private $team_id;

    /**
     * Customer Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Customer Industry
     *
     * @var Industry
     */
    private $industry_id;

    /**
     * Customer Entity
     *
     * @var Partner
     */
    private $commercial_partner_id;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Gross Weight
     *
     * @var float
     */
    private $weight;

    /**
     * Volume
     *
     * @var float
     */
    private $volume;

    /**
     * Discount %
     *
     * @var float
     */
    private $discount;

    /**
     * Discount Amount
     *
     * @var float
     */
    private $discount_amount;

    /**
     * Campaign
     *
     * @var Campaign
     */
    private $campaign_id;

    /**
     * Medium
     *
     * @var Medium
     */
    private $medium_id;

    /**
     * Source
     *
     * @var Source
     */
    private $source_id;

    /**
     * Order #
     *
     * @var Order
     */
    private $order_id;

    /**
     * Days To Confirm
     *
     * @var float
     */
    private $days_to_confirm;

    /**
     * Invoice Status
     *
     * @var array
     */
    private $invoice_status;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @return Team
     */
    public function getTeamId(): Team
    {
        return $this->team_id;
    }

    /**
     * @return Country
     */
    public function getCountryId(): Country
    {
        return $this->country_id;
    }

    /**
     * @return Industry
     */
    public function getIndustryId(): Industry
    {
        return $this->industry_id;
    }

    /**
     * @return Partner
     */
    public function getCommercialPartnerId(): Partner
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @return Pricelist
     */
    public function getPricelistId(): Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->discount_amount;
    }

    /**
     * @param Campaign $campaign_id
     */
    public function setCampaignId(Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @param Medium $medium_id
     */
    public function setMediumId(Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param Source $source_id
     */
    public function setSourceId(Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return Order
     */
    public function getOrderId(): Order
    {
        return $this->order_id;
    }

    /**
     * @return float
     */
    public function getDaysToConfirm(): float
    {
        return $this->days_to_confirm;
    }

    /**
     * @return Account
     */
    public function getAnalyticAccountId(): Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return int
     */
    public function getNbr(): int
    {
        return $this->nbr;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return Product
     */
    public function getProductId(): Product
    {
        return $this->product_id;
    }

    /**
     * @return Uom
     */
    public function getProductUom(): Uom
    {
        return $this->product_uom;
    }

    /**
     * @return float
     */
    public function getProductUomQty(): float
    {
        return $this->product_uom_qty;
    }

    /**
     * @return float
     */
    public function getQtyDelivered(): float
    {
        return $this->qty_delivered;
    }

    /**
     * @return float
     */
    public function getQtyToInvoice(): float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @return float
     */
    public function getQtyInvoiced(): float
    {
        return $this->qty_invoiced;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return Category
     */
    public function getCategId(): Category
    {
        return $this->categ_id;
    }

    /**
     * @return Users
     */
    public function getUserId(): Users
    {
        return $this->user_id;
    }

    /**
     * @return float
     */
    public function getPriceTotal(): float
    {
        return $this->price_total;
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @return float
     */
    public function getUntaxedAmountToInvoice(): float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @return float
     */
    public function getUntaxedAmountInvoiced(): float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @return Template
     */
    public function getProductTmplId(): Template
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return array
     */
    public function getInvoiceStatus(): array
    {
        return $this->invoice_status;
    }
}
