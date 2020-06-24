<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Template\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Attribute;
use Flux\OdooApiClient\Model\Object\Product\Attribute\Value;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value as ValueAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.template.attribute.line
 * Name : product.template.attribute.line
 *
 * Attributes available on product.template with their selected values in a m2m.
 * Used as a configuration model to generate the appropriate product.template.attribute.value
 */
final class Line extends Base
{
    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Attribute
     *
     * @var null|Attribute
     */
    private $attribute_id;

    /**
     * Values
     *
     * @var Value
     */
    private $value_ids;

    /**
     * Product Attribute Values
     *
     * @var ValueAlias
     */
    private $product_template_value_ids;

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
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param null|Attribute $attribute_id
     */
    public function setAttributeId(Attribute $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param Value $value_ids
     */
    public function setValueIds(Value $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @param ValueAlias $product_template_value_ids
     */
    public function setProductTemplateValueIds(ValueAlias $product_template_value_ids): void
    {
        $this->product_template_value_ids = $product_template_value_ids;
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
