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
final class Option extends Base
{
    /**
     * Quotation Template Reference
     *
     * @var null|Template
     */
    private $sale_order_template_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Description
     *
     * @var null|string
     */
    private $name;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Unit Price
     *
     * @var null|float
     */
    private $price_unit;

    /**
     * Discount (%)
     *
     * @var float
     */
    private $discount;

    /**
     * Unit of Measure 
     *
     * @var null|Uom
     */
    private $uom_id;

    /**
     * Category
     *
     * @var Category
     */
    private $product_uom_category_id;

    /**
     * Quantity
     *
     * @var null|float
     */
    private $quantity;

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
     * @param null|Template $sale_order_template_id
     */
    public function setSaleOrderTemplateId(Template $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|float $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param null|Uom $uom_id
     */
    public function setUomId(Uom $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @return Category
     */
    public function getProductUomCategoryId(): Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param null|float $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
