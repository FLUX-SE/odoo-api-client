<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.supplierinfo
 * Name : product.supplierinfo
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
final class Supplierinfo extends Base
{
    /**
     * Vendor
     * ---
     * Vendor of this product
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $name;

    /**
     * Vendor Product Name
     * ---
     * This vendor's product name will be used when printing a request for quotation. Keep empty to use the internal
     * one.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_name;

    /**
     * Vendor Product Code
     * ---
     * This vendor's product code will be used when printing a request for quotation. Keep empty to use the internal
     * one.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_code;

    /**
     * Sequence
     * ---
     * Assigns the priority to the list of product vendor.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Unit of Measure
     * ---
     * This comes from the product form.
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_uom;

    /**
     * Quantity
     * ---
     * The quantity to purchase from this vendor to benefit from the price, expressed in the vendor Product Unit of
     * Measure if not any, in the default unit of measure of the product otherwise.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $min_qty;

    /**
     * Price
     * ---
     * The price to purchase a product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price;

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
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Start Date
     * ---
     * Start date for this vendor price
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
     * End date for this vendor price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_end;

    /**
     * Product Variant
     * ---
     * If not set, the vendor price will apply to all variants of this product.
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
     * Variant Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $product_variant_count;

    /**
     * Delivery Lead Time
     * ---
     * Lead time in days between the confirmation of the purchase order and the receipt of the products in your
     * warehouse. Used by the scheduler for automatic computation of the purchase order planning.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $delay;

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
     * @param OdooRelation $name Vendor
     *        ---
     *        Vendor of this product
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $min_qty Quantity
     *        ---
     *        The quantity to purchase from this vendor to benefit from the price, expressed in the vendor Product Unit of
     *        Measure if not any, in the default unit of measure of the product otherwise.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price Price
     *        ---
     *        The price to purchase a product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $delay Delivery Lead Time
     *        ---
     *        Lead time in days between the confirmation of the purchase order and the receipt of the products in your
     *        warehouse. Used by the scheduler for automatic computation of the purchase order planning.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $name,
        float $min_qty,
        float $price,
        OdooRelation $currency_id,
        int $delay
    ) {
        $this->name = $name;
        $this->min_qty = $min_qty;
        $this->price = $price;
        $this->currency_id = $currency_id;
        $this->delay = $delay;
    }

    /**
     * @param int $delay
     */
    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
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
     * @return int|null
     */
    public function getProductVariantCount(): ?int
    {
        return $this->product_variant_count;
    }

    /**
     * @param int|null $product_variant_count
     */
    public function setProductVariantCount(?int $product_variant_count): void
    {
        $this->product_variant_count = $product_variant_count;
    }

    /**
     * @return int
     */
    public function getDelay(): int
    {
        return $this->delay;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateEnd(): ?DateTimeInterface
    {
        return $this->date_end;
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
     * @param DateTimeInterface|null $date_end
     */
    public function setDateEnd(?DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @param DateTimeInterface|null $date_start
     */
    public function setDateStart(?DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return OdooRelation
     */
    public function getName(): OdooRelation
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductUom(): ?OdooRelation
    {
        return $this->product_uom;
    }

    /**
     * @param OdooRelation $name
     */
    public function setName(OdooRelation $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    /**
     * @param string|null $product_name
     */
    public function setProductName(?string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return string|null
     */
    public function getProductCode(): ?string
    {
        return $this->product_code;
    }

    /**
     * @param string|null $product_code
     */
    public function setProductCode(?string $product_code): void
    {
        $this->product_code = $product_code;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param OdooRelation|null $product_uom
     */
    public function setProductUom(?OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateStart(): ?DateTimeInterface
    {
        return $this->date_start;
    }

    /**
     * @return float
     */
    public function getMinQty(): float
    {
        return $this->min_qty;
    }

    /**
     * @param float $min_qty
     */
    public function setMinQty(float $min_qty): void
    {
        $this->min_qty = $min_qty;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.supplierinfo';
    }
}
