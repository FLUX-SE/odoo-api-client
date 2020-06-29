<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : product.supplierinfo
 * Name : product.supplierinfo
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
final class Supplierinfo extends Base
{
    /**
     * Vendor
     * Vendor of this product
     *
     * @var Partner
     */
    private $name;

    /**
     * Vendor Product Name
     * This vendor's product name will be used when printing a request for quotation. Keep empty to use the internal
     * one.
     *
     * @var null|string
     */
    private $product_name;

    /**
     * Vendor Product Code
     * This vendor's product code will be used when printing a request for quotation. Keep empty to use the internal
     * one.
     *
     * @var null|string
     */
    private $product_code;

    /**
     * Sequence
     * Assigns the priority to the list of product vendor.
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Unit of Measure
     * This comes from the product form.
     *
     * @var null|Uom
     */
    private $product_uom;

    /**
     * Quantity
     * The quantity to purchase from this vendor to benefit from the price, expressed in the vendor Product Unit of
     * Measure if not any, in the default unit of measure of the product otherwise.
     *
     * @var float
     */
    private $min_qty;

    /**
     * Price
     * The price to purchase a product
     *
     * @var float
     */
    private $price;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Start Date
     * Start date for this vendor price
     *
     * @var null|DateTimeInterface
     */
    private $date_start;

    /**
     * End Date
     * End date for this vendor price
     *
     * @var null|DateTimeInterface
     */
    private $date_end;

    /**
     * Product Variant
     * If not set, the vendor price will apply to all variants of this product.
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Variant Count
     *
     * @var null|int
     */
    private $product_variant_count;

    /**
     * Delivery Lead Time
     * Lead time in days between the confirmation of the purchase order and the receipt of the products in your
     * warehouse. Used by the scheduler for automatic computation of the purchase order planning.
     *
     * @var int
     */
    private $delay;

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
     * @param Partner $name Vendor
     *        Vendor of this product
     * @param float $min_qty Quantity
     *        The quantity to purchase from this vendor to benefit from the price, expressed in the vendor Product Unit of
     *        Measure if not any, in the default unit of measure of the product otherwise.
     * @param float $price Price
     *        The price to purchase a product
     * @param Currency $currency_id Currency
     * @param int $delay Delivery Lead Time
     *        Lead time in days between the confirmation of the purchase order and the receipt of the products in your
     *        warehouse. Used by the scheduler for automatic computation of the purchase order planning.
     */
    public function __construct(
        Partner $name,
        float $min_qty,
        float $price,
        Currency $currency_id,
        int $delay
    ) {
        $this->name = $name;
        $this->min_qty = $min_qty;
        $this->price = $price;
        $this->currency_id = $currency_id;
        $this->delay = $delay;
    }

    /**
     * @param null|DateTimeInterface $date_end
     */
    public function setDateEnd(?DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param int $delay
     */
    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @param null|int $product_variant_count
     */
    public function setProductVariantCount(?int $product_variant_count): void
    {
        $this->product_variant_count = $product_variant_count;
    }

    /**
     * @param null|Template $product_tmpl_id
     */
    public function setProductTmplId(?Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|DateTimeInterface $date_start
     */
    public function setDateStart(?DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @param Partner $name
     */
    public function setName(Partner $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param float $min_qty
     */
    public function setMinQty(float $min_qty): void
    {
        $this->min_qty = $min_qty;
    }

    /**
     * @return null|Uom
     */
    public function getProductUom(): ?Uom
    {
        return $this->product_uom;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|string $product_code
     */
    public function setProductCode(?string $product_code): void
    {
        $this->product_code = $product_code;
    }

    /**
     * @param null|string $product_name
     */
    public function setProductName(?string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
