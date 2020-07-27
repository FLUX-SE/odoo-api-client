<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Pos;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : report.pos.order
 * ---
 * Name : report.pos.order
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
final class Order extends Base
{
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
     * Order
     * ---
     * Relation : many2one (pos.order)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_id;

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
     * Status
     * ---
     * Selection : (default value, usually null)
     *     -> draft (New)
     *     -> paid (Paid)
     *     -> done (Posted)
     *     -> invoiced (Invoiced)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * User
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
     * Total Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Subtotal w/o discount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_sub_total;

    /**
     * Total Discount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $total_discount;

    /**
     * Average Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $average_price;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_id;

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
     * Sale Line Count
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nbr_lines;

    /**
     * Product Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $product_qty;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Delay Validation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $delay_validation;

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
    private $product_categ_id;

    /**
     * Invoiced
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $invoiced;

    /**
     * Point of Sale
     * ---
     * Relation : many2one (pos.config)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Config
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $config_id;

    /**
     * PoS Category
     * ---
     * Relation : many2one (pos.category)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pos_categ_id;

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
     * Session
     * ---
     * Relation : many2one (pos.session)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $session_id;

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation|null $product_categ_id
     */
    public function setProductCategId(?OdooRelation $product_categ_id): void
    {
        $this->product_categ_id = $product_categ_id;
    }

    /**
     * @return int|null
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
     * @return int|null
     */
    public function getProductQty(): ?int
    {
        return $this->product_qty;
    }

    /**
     * @param int|null $product_qty
     */
    public function setProductQty(?int $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return int|null
     */
    public function getDelayValidation(): ?int
    {
        return $this->delay_validation;
    }

    /**
     * @param int|null $delay_validation
     */
    public function setDelayValidation(?int $delay_validation): void
    {
        $this->delay_validation = $delay_validation;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductCategId(): ?OdooRelation
    {
        return $this->product_categ_id;
    }

    /**
     * @return bool|null
     */
    public function isInvoiced(): ?bool
    {
        return $this->invoiced;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param bool|null $invoiced
     */
    public function setInvoiced(?bool $invoiced): void
    {
        $this->invoiced = $invoiced;
    }

    /**
     * @return OdooRelation|null
     */
    public function getConfigId(): ?OdooRelation
    {
        return $this->config_id;
    }

    /**
     * @param OdooRelation|null $config_id
     */
    public function setConfigId(?OdooRelation $config_id): void
    {
        $this->config_id = $config_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPosCategId(): ?OdooRelation
    {
        return $this->pos_categ_id;
    }

    /**
     * @param OdooRelation|null $pos_categ_id
     */
    public function setPosCategId(?OdooRelation $pos_categ_id): void
    {
        $this->pos_categ_id = $pos_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPricelistId(): ?OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param OdooRelation|null $pricelist_id
     */
    public function setPricelistId(?OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSessionId(): ?OdooRelation
    {
        return $this->session_id;
    }

    /**
     * @param OdooRelation|null $session_id
     */
    public function setSessionId(?OdooRelation $session_id): void
    {
        $this->session_id = $session_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param OdooRelation|null $location_id
     */
    public function setLocationId(?OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
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
     */
    public function getOrderId(): ?OdooRelation
    {
        return $this->order_id;
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
     * @return OdooRelation|null
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
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLocationId(): ?OdooRelation
    {
        return $this->location_id;
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
     */
    public function getPriceSubTotal(): ?float
    {
        return $this->price_sub_total;
    }

    /**
     * @param float|null $price_sub_total
     */
    public function setPriceSubTotal(?float $price_sub_total): void
    {
        $this->price_sub_total = $price_sub_total;
    }

    /**
     * @return float|null
     */
    public function getTotalDiscount(): ?float
    {
        return $this->total_discount;
    }

    /**
     * @param float|null $total_discount
     */
    public function setTotalDiscount(?float $total_discount): void
    {
        $this->total_discount = $total_discount;
    }

    /**
     * @return float|null
     */
    public function getAveragePrice(): ?float
    {
        return $this->average_price;
    }

    /**
     * @param float|null $average_price
     */
    public function setAveragePrice(?float $average_price): void
    {
        $this->average_price = $average_price;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.pos.order';
    }
}
