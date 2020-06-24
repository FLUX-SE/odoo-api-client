<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Template\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.template.attribute.exclusion
 * Name : product.template.attribute.exclusion
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
final class Exclusion extends Base
{
    /**
     * Attribute Value
     *
     * @var Value
     */
    private $product_template_attribute_value_id;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     *
     * @var Value
     */
    private $value_ids;

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
     * @param Value $product_template_attribute_value_id
     */
    public function setProductTemplateAttributeValueId(Value $product_template_attribute_value_id): void
    {
        $this->product_template_attribute_value_id = $product_template_attribute_value_id;
    }

    /**
     * @param null|Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param Value $value_ids
     */
    public function setValueIds(Value $value_ids): void
    {
        $this->value_ids = $value_ids;
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
