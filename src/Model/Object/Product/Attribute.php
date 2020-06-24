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
final class Attribute extends Base
{
    /**
     * Attribute
     *
     * @var null|string
     */
    private $name;

    /**
     * Values
     *
     * @var Value
     */
    private $value_ids;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Lines
     *
     * @var Line
     */
    private $attribute_line_ids;

    /**
     * Variants Creation Mode
     *
     * @var null|array
     */
    private $create_variant;

    /**
     * Used on Products
     *
     * @var bool
     */
    private $is_used_on_products;

    /**
     * Related Products
     *
     * @var Template
     */
    private $product_tmpl_ids;

    /**
     * Display Type
     *
     * @var null|array
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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $display_type
     */
    public function setDisplayType(?array $display_type): void
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
     * @param ?array $display_type
     */
    public function removeDisplayType(?array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            $index = array_search($display_type, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param ?array $display_type
     */
    public function addDisplayType(?array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            return;
        }

        if (null === $this->display_type) {
            $this->display_type = [];
        }

        $this->display_type[] = $display_type;
    }

    /**
     * @param ?array $display_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType(?array $display_type, bool $strict = true): bool
    {
        if (null === $this->display_type) {
            return false;
        }

        return in_array($display_type, $this->display_type, $strict);
    }

    /**
     * @return Template
     */
    public function getProductTmplIds(): Template
    {
        return $this->product_tmpl_ids;
    }

    /**
     * @param Value $value_ids
     */
    public function setValueIds(Value $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @return bool
     */
    public function isIsUsedOnProducts(): bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @param ?array $create_variant
     */
    public function removeCreateVariant(?array $create_variant): void
    {
        if ($this->hasCreateVariant($create_variant)) {
            $index = array_search($create_variant, $this->create_variant);
            unset($this->create_variant[$index]);
        }
    }

    /**
     * @param ?array $create_variant
     */
    public function addCreateVariant(?array $create_variant): void
    {
        if ($this->hasCreateVariant($create_variant)) {
            return;
        }

        if (null === $this->create_variant) {
            $this->create_variant = [];
        }

        $this->create_variant[] = $create_variant;
    }

    /**
     * @param ?array $create_variant
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCreateVariant(?array $create_variant, bool $strict = true): bool
    {
        if (null === $this->create_variant) {
            return false;
        }

        return in_array($create_variant, $this->create_variant, $strict);
    }

    /**
     * @param null|array $create_variant
     */
    public function setCreateVariant(?array $create_variant): void
    {
        $this->create_variant = $create_variant;
    }

    /**
     * @param Line $attribute_line_ids
     */
    public function setAttributeLineIds(Line $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
