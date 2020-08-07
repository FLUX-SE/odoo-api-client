<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.order.option
 * ---
 * Name : sale.order.option
 * ---
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
final class Option extends Base
{
    /**
     * Present on Quotation
     * ---
     * This field will be checked if the option line's product is already present in the quotation.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_present;

    /**
     * Sales Order Reference
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_id;

    /**
     * Line
     * ---
     * Relation : many2one (sale.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $line_id;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_id;

    /**
     * Unit Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price_unit;

    /**
     * Discount (%)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

    /**
     * Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $uom_id;

    /**
     * Category
     * ---
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     * ---
     * Relation : many2one (uom.category)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_uom_category_id;

    /**
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $quantity;

    /**
     * Sequence
     * ---
     * Gives the sequence order when displaying a list of optional products.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

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
     * @param string $name Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price_unit Unit Price
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $quantity Quantity
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $product_id,
        float $price_unit,
        OdooRelation $uom_id,
        float $quantity
    ) {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price_unit = $price_unit;
        $this->uom_id = $uom_id;
        $this->quantity = $quantity;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_category_id")
     */
    public function getProductUomCategoryId(): ?OdooRelation
    {
        return $this->product_uom_category_id;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     *
     * @SerializedName("quantity")
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @param OdooRelation $uom_id
     */
    public function setUomId(OdooRelation $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_present")
     */
    public function isIsPresent(): ?bool
    {
        return $this->is_present;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("uom_id")
     */
    public function getUomId(): OdooRelation
    {
        return $this->uom_id;
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
     *
     * @SerializedName("discount")
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
     *
     * @SerializedName("price_unit")
     */
    public function getPriceUnit(): float
    {
        return $this->price_unit;
    }

    /**
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): OdooRelation
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
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $line_id
     */
    public function setLineId(?OdooRelation $line_id): void
    {
        $this->line_id = $line_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("line_id")
     */
    public function getLineId(): ?OdooRelation
    {
        return $this->line_id;
    }

    /**
     * @param OdooRelation|null $order_id
     */
    public function setOrderId(?OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("order_id")
     */
    public function getOrderId(): ?OdooRelation
    {
        return $this->order_id;
    }

    /**
     * @param bool|null $is_present
     */
    public function setIsPresent(?bool $is_present): void
    {
        $this->is_present = $is_present;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order.option';
    }
}
