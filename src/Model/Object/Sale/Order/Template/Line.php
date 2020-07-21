<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order\Template;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : sale.order.template.line
 * Name : sale.order.template.line
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
final class Line extends Base
{
    /**
     * Sequence
     * Gives the sequence order when displaying a list of sale quote lines.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Quotation Template Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sale_order_template_id;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Product
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Unit Price
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price_unit;

    /**
     * Discount (%)
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

    /**
     * Quantity
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_uom_id;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_uom_category_id;

    /**
     * Display Type
     * Technical field for UX purpose.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> line_section (Section)
     *     -> line_note (Note)
     *
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $sale_order_template_id Quotation Template Reference
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Description
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price_unit Unit Price
     *        Searchable : yes
     *        Sortable : yes
     * @param float $product_uom_qty Quantity
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $sale_order_template_id,
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
     * @return OdooRelation|null
     */
    public function getProductUomId(): ?OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return string|null
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductUomCategoryId(): ?OdooRelation
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param OdooRelation|null $product_uom_id
     */
    public function setProductUomId(?OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return float
     */
    public function getProductUomQty(): float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @return float
     */
    public function getPriceUnit(): float
    {
        return $this->price_unit;
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
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $sale_order_template_id
     */
    public function setSaleOrderTemplateId(OdooRelation $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @return OdooRelation
     */
    public function getSaleOrderTemplateId(): OdooRelation
    {
        return $this->sale_order_template_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order.template.line';
    }
}
