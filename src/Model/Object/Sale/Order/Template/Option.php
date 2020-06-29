<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order\Template;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Template;
use Flux\OdooApiClient\Model\Object\Uom\Category;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : sale.order.template.option
 * Name : sale.order.template.option
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
final class Option extends Base
{
    /**
     * Quotation Template Reference
     *
     * @var Template
     */
    private $sale_order_template_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Description
     *
     * @var string
     */
    private $name;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Unit Price
     *
     * @var float
     */
    private $price_unit;

    /**
     * Discount (%)
     *
     * @var null|float
     */
    private $discount;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $uom_id;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     *
     * @var null|Category
     */
    private $product_uom_category_id;

    /**
     * Quantity
     *
     * @var float
     */
    private $quantity;

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
     * @param Template $sale_order_template_id Quotation Template Reference
     * @param string $name Description
     * @param Product $product_id Product
     * @param float $price_unit Unit Price
     * @param Uom $uom_id Unit of Measure
     * @param float $quantity Quantity
     */
    public function __construct(
        Template $sale_order_template_id,
        string $name,
        Product $product_id,
        float $price_unit,
        Uom $uom_id,
        float $quantity
    ) {
        $this->sale_order_template_id = $sale_order_template_id;
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price_unit = $price_unit;
        $this->uom_id = $uom_id;
        $this->quantity = $quantity;
    }

    /**
     * @param Template $sale_order_template_id
     */
    public function setSaleOrderTemplateId(Template $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param null|float $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param Uom $uom_id
     */
    public function setUomId(Uom $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @return null|Category
     */
    public function getProductUomCategoryId(): ?Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
