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
final class Value extends Base
{
    /**
     * Value
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Attribute
     *
     * @var null|Attribute
     */
    private $attribute_id;

    /**
     * Lines
     *
     * @var Line
     */
    private $pav_attribute_line_ids;

    /**
     * Used on Products
     *
     * @var bool
     */
    private $is_used_on_products;

    /**
     * Is custom value
     *
     * @var bool
     */
    private $is_custom;

    /**
     * Color
     *
     * @var string
     */
    private $html_color;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Attribute $attribute_id
     */
    public function setAttributeId(Attribute $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param Line $pav_attribute_line_ids
     */
    public function setPavAttributeLineIds(Line $pav_attribute_line_ids): void
    {
        $this->pav_attribute_line_ids = $pav_attribute_line_ids;
    }

    /**
     * @return bool
     */
    public function isIsUsedOnProducts(): bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @param bool $is_custom
     */
    public function setIsCustom(bool $is_custom): void
    {
        $this->is_custom = $is_custom;
    }

    /**
     * @param string $html_color
     */
    public function setHtmlColor(string $html_color): void
    {
        $this->html_color = $html_color;
    }

    /**
     * @return array
     */
    public function getDisplayType(): array
    {
        return $this->display_type;
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
