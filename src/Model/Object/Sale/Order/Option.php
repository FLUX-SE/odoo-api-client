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
     * Present on Quotation
     * This field will be checked if the option line's product is already present in the quotation.
     *
     * @var null|bool
     */
    private $is_present;

    /**
     * Sales Order Reference
     *
     * @var null|Order
     */
    private $order_id;

    /**
     * Line
     *
     * @var null|Line
     */
    private $line_id;

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
     * Sequence
     * Gives the sequence order when displaying a list of optional products.
     *
     * @var null|int
     */
    private $sequence;

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
     * @param string $name Description
     * @param Product $product_id Product
     * @param float $price_unit Unit Price
     * @param Uom $uom_id Unit of Measure
     * @param float $quantity Quantity
     */
    public function __construct(
        string $name,
        Product $product_id,
        float $price_unit,
        Uom $uom_id,
        float $quantity
    ) {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price_unit = $price_unit;
        $this->uom_id = $uom_id;
        $this->quantity = $quantity;
    }

    /**
     * @return null|bool
     */
    public function isIsPresent(): ?bool
    {
        return $this->is_present;
    }

    /**
     * @param null|Order $order_id
     */
    public function setOrderId(?Order $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param null|Line $line_id
     */
    public function setLineId(?Line $line_id): void
    {
        $this->line_id = $line_id;
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
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
