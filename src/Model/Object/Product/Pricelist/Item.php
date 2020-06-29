<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Pricelist;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Category;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.pricelist.item
 * Name : product.pricelist.item
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
final class Item extends Base
{
    /**
     * Product
     * Specify a template if this rule only applies to one product template. Keep empty otherwise.
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Product Variant
     * Specify a product if this rule only applies to one product. Keep empty otherwise.
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Product Category
     * Specify a product category if this rule only applies to products belonging to this category or its children
     * categories. Keep empty otherwise.
     *
     * @var null|Category
     */
    private $categ_id;

    /**
     * Min. Quantity
     * For the rule to apply, bought/sold quantity must be greater than or equal to the minimum quantity specified in
     * this field.
     * Expressed in the default unit of measure of the product.
     *
     * @var null|int
     */
    private $min_quantity;

    /**
     * Apply On
     * Pricelist Item applicable on selected option
     *
     * @var array
     */
    private $applied_on;

    /**
     * Based on
     * Base price for computation.
     * Sales Price: The base price will be the Sales Price.
     * Cost Price : The base price will be the cost price.
     * Other Pricelist : Computation of the base price based on another Pricelist.
     *
     * @var array
     */
    private $base;

    /**
     * Other Pricelist
     *
     * @var null|Pricelist
     */
    private $base_pricelist_id;

    /**
     * Pricelist
     *
     * @var Pricelist
     */
    private $pricelist_id;

    /**
     * Price Surcharge
     * Specify the fixed amount to add or substract(if negative) to the amount calculated with the discount.
     *
     * @var null|float
     */
    private $price_surcharge;

    /**
     * Price Discount
     *
     * @var null|float
     */
    private $price_discount;

    /**
     * Price Rounding
     * Sets the price so that it is a multiple of this value.
     * Rounding is applied after the discount and before the surcharge.
     * To have prices that end in 9.99, set rounding 10, surcharge -0.01
     *
     * @var null|float
     */
    private $price_round;

    /**
     * Min. Price Margin
     * Specify the minimum amount of margin over the base price.
     *
     * @var null|float
     */
    private $price_min_margin;

    /**
     * Max. Price Margin
     * Specify the maximum amount of margin over the base price.
     *
     * @var null|float
     */
    private $price_max_margin;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Active
     * If unchecked, it will allow you to hide the pricelist without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Start Date
     * Starting date for the pricelist item validation
     *
     * @var null|DateTimeInterface
     */
    private $date_start;

    /**
     * End Date
     * Ending valid for the pricelist item validation
     *
     * @var null|DateTimeInterface
     */
    private $date_end;

    /**
     * Compute Price
     *
     * @var array
     */
    private $compute_price;

    /**
     * Fixed Price
     *
     * @var null|float
     */
    private $fixed_price;

    /**
     * Percentage Price
     *
     * @var null|float
     */
    private $percent_price;

    /**
     * Name
     * Explicit rule name for this pricelist line.
     *
     * @var null|string
     */
    private $name;

    /**
     * Price
     * Explicit rule name for this pricelist line.
     *
     * @var null|string
     */
    private $price;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param array $applied_on Apply On
     *        Pricelist Item applicable on selected option
     * @param array $base Based on
     *        Base price for computation.
     *        Sales Price: The base price will be the Sales Price.
     *        Cost Price : The base price will be the cost price.
     *        Other Pricelist : Computation of the base price based on another Pricelist.
     * @param Pricelist $pricelist_id Pricelist
     * @param array $compute_price Compute Price
     */
    public function __construct(
        array $applied_on,
        array $base,
        Pricelist $pricelist_id,
        array $compute_price
    ) {
        $this->applied_on = $applied_on;
        $this->base = $base;
        $this->pricelist_id = $pricelist_id;
        $this->compute_price = $compute_price;
    }

    /**
     * @param mixed $item
     */
    public function addComputePrice($item): void
    {
        if ($this->hasComputePrice($item)) {
            return;
        }

        $this->compute_price[] = $item;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|bool
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param null|DateTimeInterface $date_start
     */
    public function setDateStart(?DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @param null|DateTimeInterface $date_end
     */
    public function setDateEnd(?DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @param array $compute_price
     */
    public function setComputePrice(array $compute_price): void
    {
        $this->compute_price = $compute_price;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasComputePrice($item, bool $strict = true): bool
    {
        return in_array($item, $this->compute_price, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeComputePrice($item): void
    {
        if ($this->hasComputePrice($item)) {
            $index = array_search($item, $this->compute_price);
            unset($this->compute_price[$index]);
        }
    }

    /**
     * @param null|float $price_max_margin
     */
    public function setPriceMaxMargin(?float $price_max_margin): void
    {
        $this->price_max_margin = $price_max_margin;
    }

    /**
     * @param null|float $fixed_price
     */
    public function setFixedPrice(?float $fixed_price): void
    {
        $this->fixed_price = $fixed_price;
    }

    /**
     * @param null|float $percent_price
     */
    public function setPercentPrice(?float $percent_price): void
    {
        $this->percent_price = $percent_price;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param null|float $price_min_margin
     */
    public function setPriceMinMargin(?float $price_min_margin): void
    {
        $this->price_min_margin = $price_min_margin;
    }

    /**
     * @param null|Template $product_tmpl_id
     */
    public function setProductTmplId(?Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param mixed $item
     */
    public function removeAppliedOn($item): void
    {
        if ($this->hasAppliedOn($item)) {
            $index = array_search($item, $this->applied_on);
            unset($this->applied_on[$index]);
        }
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|Category $categ_id
     */
    public function setCategId(?Category $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @param null|int $min_quantity
     */
    public function setMinQuantity(?int $min_quantity): void
    {
        $this->min_quantity = $min_quantity;
    }

    /**
     * @param array $applied_on
     */
    public function setAppliedOn(array $applied_on): void
    {
        $this->applied_on = $applied_on;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAppliedOn($item, bool $strict = true): bool
    {
        return in_array($item, $this->applied_on, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAppliedOn($item): void
    {
        if ($this->hasAppliedOn($item)) {
            return;
        }

        $this->applied_on[] = $item;
    }

    /**
     * @param array $base
     */
    public function setBase(array $base): void
    {
        $this->base = $base;
    }

    /**
     * @param null|float $price_round
     */
    public function setPriceRound(?float $price_round): void
    {
        $this->price_round = $price_round;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBase($item, bool $strict = true): bool
    {
        return in_array($item, $this->base, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addBase($item): void
    {
        if ($this->hasBase($item)) {
            return;
        }

        $this->base[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeBase($item): void
    {
        if ($this->hasBase($item)) {
            $index = array_search($item, $this->base);
            unset($this->base[$index]);
        }
    }

    /**
     * @param null|Pricelist $base_pricelist_id
     */
    public function setBasePricelistId(?Pricelist $base_pricelist_id): void
    {
        $this->base_pricelist_id = $base_pricelist_id;
    }

    /**
     * @param Pricelist $pricelist_id
     */
    public function setPricelistId(Pricelist $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param null|float $price_surcharge
     */
    public function setPriceSurcharge(?float $price_surcharge): void
    {
        $this->price_surcharge = $price_surcharge;
    }

    /**
     * @param null|float $price_discount
     */
    public function setPriceDiscount(?float $price_discount): void
    {
        $this->price_discount = $price_discount;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
