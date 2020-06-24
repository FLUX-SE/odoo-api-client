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
final class Item extends Base
{
    /**
     * Product
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Product Variant
     *
     * @var Product
     */
    private $product_id;

    /**
     * Product Category
     *
     * @var Category
     */
    private $categ_id;

    /**
     * Min. Quantity
     *
     * @var int
     */
    private $min_quantity;

    /**
     * Apply On
     *
     * @var null|array
     */
    private $applied_on;

    /**
     * Based on
     *
     * @var null|array
     */
    private $base;

    /**
     * Other Pricelist
     *
     * @var Pricelist
     */
    private $base_pricelist_id;

    /**
     * Pricelist
     *
     * @var null|Pricelist
     */
    private $pricelist_id;

    /**
     * Price Surcharge
     *
     * @var float
     */
    private $price_surcharge;

    /**
     * Price Discount
     *
     * @var float
     */
    private $price_discount;

    /**
     * Price Rounding
     *
     * @var float
     */
    private $price_round;

    /**
     * Min. Price Margin
     *
     * @var float
     */
    private $price_min_margin;

    /**
     * Max. Price Margin
     *
     * @var float
     */
    private $price_max_margin;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Start Date
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * End Date
     *
     * @var DateTimeInterface
     */
    private $date_end;

    /**
     * Compute Price
     *
     * @var null|array
     */
    private $compute_price;

    /**
     * Fixed Price
     *
     * @var float
     */
    private $fixed_price;

    /**
     * Percentage Price
     *
     * @var float
     */
    private $percent_price;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Price
     *
     * @var string
     */
    private $price;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param ?array $compute_price
     */
    public function removeComputePrice(?array $compute_price): void
    {
        if ($this->hasComputePrice($compute_price)) {
            $index = array_search($compute_price, $this->compute_price);
            unset($this->compute_price[$index]);
        }
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @param DateTimeInterface $date_end
     */
    public function setDateEnd(DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @param null|array $compute_price
     */
    public function setComputePrice(?array $compute_price): void
    {
        $this->compute_price = $compute_price;
    }

    /**
     * @param ?array $compute_price
     * @param bool $strict
     *
     * @return bool
     */
    public function hasComputePrice(?array $compute_price, bool $strict = true): bool
    {
        if (null === $this->compute_price) {
            return false;
        }

        return in_array($compute_price, $this->compute_price, $strict);
    }

    /**
     * @param ?array $compute_price
     */
    public function addComputePrice(?array $compute_price): void
    {
        if ($this->hasComputePrice($compute_price)) {
            return;
        }

        if (null === $this->compute_price) {
            $this->compute_price = [];
        }

        $this->compute_price[] = $compute_price;
    }

    /**
     * @param float $fixed_price
     */
    public function setFixedPrice(float $fixed_price): void
    {
        $this->fixed_price = $fixed_price;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param float $percent_price
     */
    public function setPercentPrice(float $percent_price): void
    {
        $this->percent_price = $percent_price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param float $price_max_margin
     */
    public function setPriceMaxMargin(float $price_max_margin): void
    {
        $this->price_max_margin = $price_max_margin;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|array $base
     */
    public function setBase(?array $base): void
    {
        $this->base = $base;
    }

    /**
     * @param Category $categ_id
     */
    public function setCategId(Category $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @param int $min_quantity
     */
    public function setMinQuantity(int $min_quantity): void
    {
        $this->min_quantity = $min_quantity;
    }

    /**
     * @param null|array $applied_on
     */
    public function setAppliedOn(?array $applied_on): void
    {
        $this->applied_on = $applied_on;
    }

    /**
     * @param ?array $applied_on
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAppliedOn(?array $applied_on, bool $strict = true): bool
    {
        if (null === $this->applied_on) {
            return false;
        }

        return in_array($applied_on, $this->applied_on, $strict);
    }

    /**
     * @param ?array $applied_on
     */
    public function addAppliedOn(?array $applied_on): void
    {
        if ($this->hasAppliedOn($applied_on)) {
            return;
        }

        if (null === $this->applied_on) {
            $this->applied_on = [];
        }

        $this->applied_on[] = $applied_on;
    }

    /**
     * @param ?array $applied_on
     */
    public function removeAppliedOn(?array $applied_on): void
    {
        if ($this->hasAppliedOn($applied_on)) {
            $index = array_search($applied_on, $this->applied_on);
            unset($this->applied_on[$index]);
        }
    }

    /**
     * @param ?array $base
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBase(?array $base, bool $strict = true): bool
    {
        if (null === $this->base) {
            return false;
        }

        return in_array($base, $this->base, $strict);
    }

    /**
     * @param float $price_min_margin
     */
    public function setPriceMinMargin(float $price_min_margin): void
    {
        $this->price_min_margin = $price_min_margin;
    }

    /**
     * @param ?array $base
     */
    public function addBase(?array $base): void
    {
        if ($this->hasBase($base)) {
            return;
        }

        if (null === $this->base) {
            $this->base = [];
        }

        $this->base[] = $base;
    }

    /**
     * @param ?array $base
     */
    public function removeBase(?array $base): void
    {
        if ($this->hasBase($base)) {
            $index = array_search($base, $this->base);
            unset($this->base[$index]);
        }
    }

    /**
     * @param Pricelist $base_pricelist_id
     */
    public function setBasePricelistId(Pricelist $base_pricelist_id): void
    {
        $this->base_pricelist_id = $base_pricelist_id;
    }

    /**
     * @param null|Pricelist $pricelist_id
     */
    public function setPricelistId(Pricelist $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param float $price_surcharge
     */
    public function setPriceSurcharge(float $price_surcharge): void
    {
        $this->price_surcharge = $price_surcharge;
    }

    /**
     * @param float $price_discount
     */
    public function setPriceDiscount(float $price_discount): void
    {
        $this->price_discount = $price_discount;
    }

    /**
     * @param float $price_round
     */
    public function setPriceRound(float $price_round): void
    {
        $this->price_round = $price_round;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
