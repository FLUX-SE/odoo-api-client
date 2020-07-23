<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.attribute
 * Name : product.attribute
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
final class Attribute extends Base
{
    /**
     * Attribute
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Values
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $value_ids;

    /**
     * Sequence
     * Determine the display order
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attribute_line_ids;

    /**
     * Variants Creation Mode
     * - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     *                 - Dynamically: Each variant is created only when its corresponding attributes and values are
     * added to a sales order.
     *                 - Never: Variants are never created for the attribute.
     *                 Note: the variants creation mode cannot be changed once the attribute is used on at least one
     * product.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> always (Instantly)
     *     -> dynamic (Dynamically)
     *     -> no_variant (Never)
     *
     *
     * @var string
     */
    private $create_variant;

    /**
     * Used on Products
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_used_on_products;

    /**
     * Related Products
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_tmpl_ids;

    /**
     * Display Type
     * The display type used in the Product Configurator.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> radio (Radio)
     *     -> select (Select)
     *     -> color (Color)
     *
     *
     * @var string
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
     * @param string $name Attribute
     *        Searchable : yes
     *        Sortable : yes
     * @param string $create_variant Variants Creation Mode
     *        - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     *                        - Dynamically: Each variant is created only when its corresponding attributes and values are
     *        added to a sales order.
     *                        - Never: Variants are never created for the attribute.
     *                        Note: the variants creation mode cannot be changed once the attribute is used on at least one
     *        product.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> always (Instantly)
     *            -> dynamic (Dynamically)
     *            -> no_variant (Never)
     *
     * @param string $display_type Display Type
     *        The display type used in the Product Configurator.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> radio (Radio)
     *            -> select (Select)
     *            -> color (Color)
     *
     */
    public function __construct(string $name, string $create_variant, string $display_type)
    {
        $this->name = $name;
        $this->create_variant = $create_variant;
        $this->display_type = $display_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation[]|null $product_tmpl_ids
     */
    public function setProductTmplIds(?array $product_tmpl_ids): void
    {
        $this->product_tmpl_ids = $product_tmpl_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTmplIds(OdooRelation $item): bool
    {
        if (null === $this->product_tmpl_ids) {
            return false;
        }

        return in_array($item, $this->product_tmpl_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductTmplIds(OdooRelation $item): void
    {
        if ($this->hasProductTmplIds($item)) {
            return;
        }

        if (null === $this->product_tmpl_ids) {
            $this->product_tmpl_ids = [];
        }

        $this->product_tmpl_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductTmplIds(OdooRelation $item): void
    {
        if (null === $this->product_tmpl_ids) {
            $this->product_tmpl_ids = [];
        }

        if ($this->hasProductTmplIds($item)) {
            $index = array_search($item, $this->product_tmpl_ids);
            unset($this->product_tmpl_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public function getDisplayType(): string
    {
        return $this->display_type;
    }

    /**
     * @param string $display_type
     */
    public function setDisplayType(string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param bool|null $is_used_on_products
     */
    public function setIsUsedOnProducts(?bool $is_used_on_products): void
    {
        $this->is_used_on_products = $is_used_on_products;
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
     * @return OdooRelation[]|null
     */
    public function getProductTmplIds(): ?array
    {
        return $this->product_tmpl_ids;
    }

    /**
     * @return bool|null
     */
    public function isIsUsedOnProducts(): ?bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getValueIds(): ?array
    {
        return $this->value_ids;
    }

    /**
     * @param OdooRelation[]|null $value_ids
     */
    public function setValueIds(?array $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasValueIds(OdooRelation $item): bool
    {
        if (null === $this->value_ids) {
            return false;
        }

        return in_array($item, $this->value_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addValueIds(OdooRelation $item): void
    {
        if ($this->hasValueIds($item)) {
            return;
        }

        if (null === $this->value_ids) {
            $this->value_ids = [];
        }

        $this->value_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeValueIds(OdooRelation $item): void
    {
        if (null === $this->value_ids) {
            $this->value_ids = [];
        }

        if ($this->hasValueIds($item)) {
            $index = array_search($item, $this->value_ids);
            unset($this->value_ids[$index]);
        }
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $create_variant
     */
    public function setCreateVariant(string $create_variant): void
    {
        $this->create_variant = $create_variant;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttributeLineIds(): ?array
    {
        return $this->attribute_line_ids;
    }

    /**
     * @param OdooRelation[]|null $attribute_line_ids
     */
    public function setAttributeLineIds(?array $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttributeLineIds(OdooRelation $item): bool
    {
        if (null === $this->attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->attribute_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttributeLineIds(OdooRelation $item): void
    {
        if ($this->hasAttributeLineIds($item)) {
            return;
        }

        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        $this->attribute_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttributeLineIds(OdooRelation $item): void
    {
        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        if ($this->hasAttributeLineIds($item)) {
            $index = array_search($item, $this->attribute_line_ids);
            unset($this->attribute_line_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public function getCreateVariant(): string
    {
        return $this->create_variant;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.attribute';
    }
}
