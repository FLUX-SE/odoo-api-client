<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Attribute\Custom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value as ValueAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line;

/**
 * Odoo model : product.attribute.custom.value
 * Name : product.attribute.custom.value
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
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Attribute Value
     *
     * @var null|ValueAlias
     */
    private $custom_product_template_attribute_value_id;

    /**
     * Sales Order Line
     *
     * @var null|Line
     */
    private $sale_order_line_id;

    /**
     * Custom Value
     *
     * @var string
     */
    private $custom_value;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param null|ValueAlias $custom_product_template_attribute_value_id
     */
    public function setCustomProductTemplateAttributeValueId(
        ValueAlias $custom_product_template_attribute_value_id
    ): void
    {
        $this->custom_product_template_attribute_value_id = $custom_product_template_attribute_value_id;
    }

    /**
     * @param null|Line $sale_order_line_id
     */
    public function setSaleOrderLineId(Line $sale_order_line_id): void
    {
        $this->sale_order_line_id = $sale_order_line_id;
    }

    /**
     * @param string $custom_value
     */
    public function setCustomValue(string $custom_value): void
    {
        $this->custom_value = $custom_value;
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
