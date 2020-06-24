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
final class Supplierinfo extends Base
{
    /**
     * Vendor
     *
     * @var null|Partner
     */
    private $name;

    /**
     * Vendor Product Name
     *
     * @var string
     */
    private $product_name;

    /**
     * Vendor Product Code
     *
     * @var string
     */
    private $product_code;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom;

    /**
     * Quantity
     *
     * @var null|float
     */
    private $min_qty;

    /**
     * Price
     *
     * @var null|float
     */
    private $price;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

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
     * Product Variant
     *
     * @var Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Variant Count
     *
     * @var int
     */
    private $product_variant_count;

    /**
     * Delivery Lead Time
     *
     * @var null|int
     */
    private $delay;

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
     * @param null|Partner $name
     */
    public function setName(Partner $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface $date_end
     */
    public function setDateEnd(DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|int $delay
     */
    public function setDelay(?int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @param int $product_variant_count
     */
    public function setProductVariantCount(int $product_variant_count): void
    {
        $this->product_variant_count = $product_variant_count;
    }

    /**
     * @param Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|float $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param null|float $min_qty
     */
    public function setMinQty(?float $min_qty): void
    {
        $this->min_qty = $min_qty;
    }

    /**
     * @return Uom
     */
    public function getProductUom(): Uom
    {
        return $this->product_uom;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $product_code
     */
    public function setProductCode(string $product_code): void
    {
        $this->product_code = $product_code;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
