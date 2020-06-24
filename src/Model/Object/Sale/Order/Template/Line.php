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
final class Line extends Base
{
    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @var Product
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
     * Quantity
     *
     * @var null|float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom_id;

    /**
     * Category
     *
     * @var Category
     */
    private $product_uom_category_id;

    /**
     * Display Type
     *
     * @var array
     */
    private $display_type;

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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param array $display_type
     */
    public function setDisplayType(array $display_type): void
    {
        $this->display_type = $display_type;
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
     * @param array $display_type
     */
    public function removeDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            $index = array_search($display_type, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param array $display_type
     */
    public function addDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            return;
        }

        $this->display_type[] = $display_type;
    }

    /**
     * @param array $display_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType(array $display_type, bool $strict = true): bool
    {
        return in_array($display_type, $this->display_type, $strict);
    }

    /**
     * @return Category
     */
    public function getProductUomCategoryId(): Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param null|Template $sale_order_template_id
     */
    public function setSaleOrderTemplateId(Template $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @param Uom $product_uom_id
     */
    public function setProductUomId(Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param null|float $product_uom_qty
     */
    public function setProductUomQty(?float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param null|float $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
