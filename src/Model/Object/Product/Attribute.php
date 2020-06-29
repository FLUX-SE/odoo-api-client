<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Attribute\Value;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.attribute
 * Name : product.attribute
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
final class Attribute extends Base
{
    /**
     * Attribute
     *
     * @var string
     */
    private $name;

    /**
     * Values
     *
     * @var null|Value[]
     */
    private $value_ids;

    /**
     * Sequence
     * Determine the display order
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Lines
     *
     * @var null|Line[]
     */
    private $attribute_line_ids;

    /**
     * Variants Creation Mode
     * - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     * - Dynamically: Each variant is created only when its corresponding attributes and values are added to a sales
     * order.
     * - Never: Variants are never created for the attribute.
     * Note: the variants creation mode cannot be changed once the attribute is used on at least one product.
     *
     * @var array
     */
    private $create_variant;

    /**
     * Used on Products
     *
     * @var null|bool
     */
    private $is_used_on_products;

    /**
     * Related Products
     *
     * @var null|Template[]
     */
    private $product_tmpl_ids;

    /**
     * Display Type
     * The display type used in the Product Configurator.
     *
     * @var array
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
     * @param string $name Attribute
     * @param array $create_variant Variants Creation Mode
     *        - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     *        - Dynamically: Each variant is created only when its corresponding attributes and values are added to a sales
     *        order.
     *        - Never: Variants are never created for the attribute.
     *        Note: the variants creation mode cannot be changed once the attribute is used on at least one product.
     * @param array $display_type Display Type
     *        The display type used in the Product Configurator.
     */
    public function __construct(string $name, array $create_variant, array $display_type)
    {
        $this->name = $name;
        $this->create_variant = $create_variant;
        $this->display_type = $display_type;
    }

    /**
     * @param mixed $item
     */
    public function addCreateVariant($item): void
    {
        if ($this->hasCreateVariant($item)) {
            return;
        }

        $this->create_variant[] = $item;
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
        return in_array($item, $this->display_type, $strict);
    }

    /**
     * @param array $display_type
     */
    public function setDisplayType(array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return null|Template[]
     */
    public function getProductTmplIds(): ?array
    {
        return $this->product_tmpl_ids;
    }

    /**
     * @return null|bool
     */
    public function isIsUsedOnProducts(): ?bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @param mixed $item
     */
    public function removeCreateVariant($item): void
    {
        if ($this->hasCreateVariant($item)) {
            $index = array_search($item, $this->create_variant);
            unset($this->create_variant[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCreateVariant($item, bool $strict = true): bool
    {
        return in_array($item, $this->create_variant, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $create_variant
     */
    public function setCreateVariant(array $create_variant): void
    {
        $this->create_variant = $create_variant;
    }

    /**
     * @param Line $item
     */
    public function removeAttributeLineIds(Line $item): void
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
     * @param Line $item
     */
    public function addAttributeLineIds(Line $item): void
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
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAttributeLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->attribute_line_ids, $strict);
    }

    /**
     * @param null|Line[] $attribute_line_ids
     */
    public function setAttributeLineIds(?array $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Value $item
     */
    public function removeValueIds(Value $item): void
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
     * @param Value $item
     */
    public function addValueIds(Value $item): void
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
     * @param Value $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasValueIds(Value $item, bool $strict = true): bool
    {
        if (null === $this->value_ids) {
            return false;
        }

        return in_array($item, $this->value_ids, $strict);
    }

    /**
     * @param null|Value[] $value_ids
     */
    public function setValueIds(?array $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
