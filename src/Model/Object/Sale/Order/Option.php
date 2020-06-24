<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order;
use Flux\OdooApiClient\Model\Object\Uom\Category;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : sale.order.option
 * Name : sale.order.option
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
     * Present on Quotation
     *
     * @var bool
     */
    private $is_present;

    /**
     * Sales Order Reference
     *
     * @var Order
     */
    private $order_id;

    /**
     * Line
     *
     * @var Line
     */
    private $line_id;

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
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @return bool
     */
    public function isIsPresent(): bool
    {
        return $this->is_present;
    }

    /**
     * @param Order $order_id
     */
    public function setOrderId(Order $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param Line $line_id
     */
    public function setLineId(Line $line_id): void
    {
        $this->line_id = $line_id;
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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
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
