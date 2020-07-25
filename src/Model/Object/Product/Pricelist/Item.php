<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Pricelist;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.pricelist.item
 * Name : product.pricelist.item
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
final class Item extends Base
{
    /**
     * Product
     * ---
     * Specify a template if this rule only applies to one product template. Keep empty otherwise.
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
     * Product Variant
     * ---
     * Specify a product if this rule only applies to one product. Keep empty otherwise.
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
     * Product Category
     * ---
     * Specify a product category if this rule only applies to products belonging to this category or its children
     * categories. Keep empty otherwise.
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
     * Min. Quantity
     * ---
     * For the rule to apply, bought/sold quantity must be greater than or equal to the minimum quantity specified in
     * this field.
     * Expressed in the default unit of measure of the product.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $min_quantity;

    /**
     * Apply On
     * ---
     * Pricelist Item applicable on selected option
     * ---
     * Selection : (default value, usually null)
     *     -> 3_global (All Products)
     *     -> 2_product_category (Product Category)
     *     -> 1_product (Product)
     *     -> 0_product_variant (Product Variant)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $applied_on;

    /**
     * Based on
     * ---
     * Base price for computation.
     * Sales Price: The base price will be the Sales Price.
     * Cost Price : The base price will be the cost price.
     * Other Pricelist : Computation of the base price based on another Pricelist.
     * ---
     * Selection : (default value, usually null)
     *     -> list_price (Sales Price)
     *     -> standard_price (Cost)
     *     -> pricelist (Other Pricelist)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $base;

    /**
     * Other Pricelist
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $base_pricelist_id;

    /**
     * Pricelist
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pricelist_id;

    /**
     * Price Surcharge
     * ---
     * Specify the fixed amount to add or substract(if negative) to the amount calculated with the discount.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_surcharge;

    /**
     * Price Discount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_discount;

    /**
     * Price Rounding
     * ---
     * Sets the price so that it is a multiple of this value.
     * Rounding is applied after the discount and before the surcharge.
     * To have prices that end in 9.99, set rounding 10, surcharge -0.01
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_round;

    /**
     * Min. Price Margin
     * ---
     * Specify the minimum amount of margin over the base price.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_min_margin;

    /**
     * Max. Price Margin
     * ---
     * Specify the maximum amount of margin over the base price.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_max_margin;

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
     * Active
     * ---
     * If unchecked, it will allow you to hide the pricelist without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Start Date
     * ---
     * Starting date for the pricelist item validation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_start;

    /**
     * End Date
     * ---
     * Ending valid for the pricelist item validation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_end;

    /**
     * Compute Price
     * ---
     * Selection : (default value, usually null)
     *     -> fixed (Fixed Price)
     *     -> percentage (Percentage (discount))
     *     -> formula (Formula)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $compute_price;

    /**
     * Fixed Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fixed_price;

    /**
     * Percentage Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $percent_price;

    /**
     * Name
     * ---
     * Explicit rule name for this pricelist line.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Price
     * ---
     * Explicit rule name for this pricelist line.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $price;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $applied_on Apply On
     *        ---
     *        Pricelist Item applicable on selected option
     *        ---
     *        Selection : (default value, usually null)
     *            -> 3_global (All Products)
     *            -> 2_product_category (Product Category)
     *            -> 1_product (Product)
     *            -> 0_product_variant (Product Variant)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $base Based on
     *        ---
     *        Base price for computation.
     *        Sales Price: The base price will be the Sales Price.
     *        Cost Price : The base price will be the cost price.
     *        Other Pricelist : Computation of the base price based on another Pricelist.
     *        ---
     *        Selection : (default value, usually null)
     *            -> list_price (Sales Price)
     *            -> standard_price (Cost)
     *            -> pricelist (Other Pricelist)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $pricelist_id Pricelist
     *        ---
     *        Relation : many2one (product.pricelist)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $compute_price Compute Price
     *        ---
     *        Selection : (default value, usually null)
     *            -> fixed (Fixed Price)
     *            -> percentage (Percentage (discount))
     *            -> formula (Formula)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $applied_on,
        string $base,
        OdooRelation $pricelist_id,
        string $compute_price
    ) {
        $this->applied_on = $applied_on;
        $this->base = $base;
        $this->pricelist_id = $pricelist_id;
        $this->compute_price = $compute_price;
    }

    /**
     * @param float|null $percent_price
     */
    public function setPercentPrice(?float $percent_price): void
    {
        $this->percent_price = $percent_price;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateStart(): ?DateTimeInterface
    {
        return $this->date_start;
    }

    /**
     * @param DateTimeInterface|null $date_start
     */
    public function setDateStart(?DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateEnd(): ?DateTimeInterface
    {
        return $this->date_end;
    }

    /**
     * @param DateTimeInterface|null $date_end
     */
    public function setDateEnd(?DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return string
     */
    public function getComputePrice(): string
    {
        return $this->compute_price;
    }

    /**
     * @param string $compute_price
     */
    public function setComputePrice(string $compute_price): void
    {
        $this->compute_price = $compute_price;
    }

    /**
     * @return float|null
     */
    public function getFixedPrice(): ?float
    {
        return $this->fixed_price;
    }

    /**
     * @param float|null $fixed_price
     */
    public function setFixedPrice(?float $fixed_price): void
    {
        $this->fixed_price = $fixed_price;
    }

    /**
     * @return float|null
     */
    public function getPercentPrice(): ?float
    {
        return $this->percent_price;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBasePricelistId(): ?OdooRelation
    {
        return $this->base_pricelist_id;
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
    public function getCategId(): ?OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation|null $categ_id
     */
    public function setCategId(?OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @return int|null
     */
    public function getMinQuantity(): ?int
    {
        return $this->min_quantity;
    }

    /**
     * @param int|null $min_quantity
     */
    public function setMinQuantity(?int $min_quantity): void
    {
        $this->min_quantity = $min_quantity;
    }

    /**
     * @return string
     */
    public function getAppliedOn(): string
    {
        return $this->applied_on;
    }

    /**
     * @param string $applied_on
     */
    public function setAppliedOn(string $applied_on): void
    {
        $this->applied_on = $applied_on;
    }

    /**
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public function setBase(string $base): void
    {
        $this->base = $base;
    }

    /**
     * @param OdooRelation|null $base_pricelist_id
     */
    public function setBasePricelistId(?OdooRelation $base_pricelist_id): void
    {
        $this->base_pricelist_id = $base_pricelist_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPricelistId(): OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param OdooRelation $pricelist_id
     */
    public function setPricelistId(OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return float|null
     */
    public function getPriceSurcharge(): ?float
    {
        return $this->price_surcharge;
    }

    /**
     * @param float|null $price_surcharge
     */
    public function setPriceSurcharge(?float $price_surcharge): void
    {
        $this->price_surcharge = $price_surcharge;
    }

    /**
     * @return float|null
     */
    public function getPriceDiscount(): ?float
    {
        return $this->price_discount;
    }

    /**
     * @param float|null $price_discount
     */
    public function setPriceDiscount(?float $price_discount): void
    {
        $this->price_discount = $price_discount;
    }

    /**
     * @return float|null
     */
    public function getPriceRound(): ?float
    {
        return $this->price_round;
    }

    /**
     * @param float|null $price_round
     */
    public function setPriceRound(?float $price_round): void
    {
        $this->price_round = $price_round;
    }

    /**
     * @return float|null
     */
    public function getPriceMinMargin(): ?float
    {
        return $this->price_min_margin;
    }

    /**
     * @param float|null $price_min_margin
     */
    public function setPriceMinMargin(?float $price_min_margin): void
    {
        $this->price_min_margin = $price_min_margin;
    }

    /**
     * @return float|null
     */
    public function getPriceMaxMargin(): ?float
    {
        return $this->price_max_margin;
    }

    /**
     * @param float|null $price_max_margin
     */
    public function setPriceMaxMargin(?float $price_max_margin): void
    {
        $this->price_max_margin = $price_max_margin;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.pricelist.item';
    }
}
