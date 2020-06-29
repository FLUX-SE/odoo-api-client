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
 * Odoo model : sale.order.template.line
 * Name : sale.order.template.line
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
final class Line extends Base
{
    /**
     * Sequence
     * Gives the sequence order when displaying a list of sale quote lines.
     *
     * @var null|int
     */
    private $sequence;

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
     * @var null|Product
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
     * Quantity
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom_id;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     *
     * @var null|Category
     */
    private $product_uom_category_id;

    /**
     * Display Type
     * Technical field for UX purpose.
     *
     * @var null|array
     */
    private $display_type;

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
     * @param float $price_unit Unit Price
     * @param float $product_uom_qty Quantity
     */
    public function __construct(
        Template $sale_order_template_id,
        string $name,
        float $price_unit,
        float $product_uom_qty
    ) {
        $this->sale_order_template_id = $sale_order_template_id;
        $this->name = $name;
        $this->price_unit = $price_unit;
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return null|Category
     */
    public function getProductUomCategoryId(): ?Category
    {
        return $this->product_uom_category_id;
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
     * @param mixed $item
     */
    public function removeDisplayType($item): void
    {
        if (null === $this->display_type) {
            $this->display_type = [];
        }

        if ($this->hasDisplayType($item)) {
            $index = array_search($item, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDisplayType($item): void
    {
        if ($this->hasDisplayType($item)) {
            return;
        }

        if (null === $this->display_type) {
            $this->display_type = [];
        }

        $this->display_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType($item, bool $strict = true): bool
    {
        if (null === $this->display_type) {
            return false;
        }

        return in_array($item, $this->display_type, $strict);
    }

    /**
     * @param null|array $display_type
     */
    public function setDisplayType(?array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @param null|Uom $product_uom_id
     */
    public function setProductUomId(?Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @param null|float $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param Template $sale_order_template_id
     */
    public function setSaleOrderTemplateId(Template $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
