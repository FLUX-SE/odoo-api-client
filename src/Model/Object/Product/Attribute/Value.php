<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Attribute;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.attribute.value
 * Name : product.attribute.value
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
final class Value extends Base
{
    /**
     * Value
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * Determine the display order
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Attribute
     * The attribute cannot be changed once the value is used on at least one product.
     *
     * @var Attribute
     */
    private $attribute_id;

    /**
     * Lines
     *
     * @var null|Line[]
     */
    private $pav_attribute_line_ids;

    /**
     * Used on Products
     *
     * @var null|bool
     */
    private $is_used_on_products;

    /**
     * Is custom value
     * Allow users to input custom values for this attribute value
     *
     * @var null|bool
     */
    private $is_custom;

    /**
     * Color
     * Here you can set a specific HTML color index (e.g. #ff0000) to display the color if the attribute type is
     * 'Color'.
     *
     * @var null|string
     */
    private $html_color;

    /**
     * Display Type
     * The display type used in the Product Configurator.
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
     * @param string $name Value
     * @param Attribute $attribute_id Attribute
     *        The attribute cannot be changed once the value is used on at least one product.
     */
    public function __construct(string $name, Attribute $attribute_id)
    {
        $this->name = $name;
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Attribute $attribute_id
     */
    public function setAttributeId(Attribute $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param null|Line[] $pav_attribute_line_ids
     */
    public function setPavAttributeLineIds(?array $pav_attribute_line_ids): void
    {
        $this->pav_attribute_line_ids = $pav_attribute_line_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPavAttributeLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->pav_attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->pav_attribute_line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addPavAttributeLineIds(Line $item): void
    {
        if ($this->hasPavAttributeLineIds($item)) {
            return;
        }

        if (null === $this->pav_attribute_line_ids) {
            $this->pav_attribute_line_ids = [];
        }

        $this->pav_attribute_line_ids[] = $item;
    }

    /**
     * @param Line $item
     */
    public function removePavAttributeLineIds(Line $item): void
    {
        if (null === $this->pav_attribute_line_ids) {
            $this->pav_attribute_line_ids = [];
        }

        if ($this->hasPavAttributeLineIds($item)) {
            $index = array_search($item, $this->pav_attribute_line_ids);
            unset($this->pav_attribute_line_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isIsUsedOnProducts(): ?bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @param null|bool $is_custom
     */
    public function setIsCustom(?bool $is_custom): void
    {
        $this->is_custom = $is_custom;
    }

    /**
     * @param null|string $html_color
     */
    public function setHtmlColor(?string $html_color): void
    {
        $this->html_color = $html_color;
    }

    /**
     * @return null|array
     */
    public function getDisplayType(): ?array
    {
        return $this->display_type;
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
