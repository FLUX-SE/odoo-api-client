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
final class Exclusion extends Base
{
    /**
     * Attribute Value
     *
     * @var null|Value
     */
    private $product_template_attribute_value_id;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     *
     * @var null|Value[]
     */
    private $value_ids;

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
     * @param Template $product_tmpl_id Product Template
     */
    public function __construct(Template $product_tmpl_id)
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param null|Value $product_template_attribute_value_id
     */
    public function setProductTemplateAttributeValueId(?Value $product_template_attribute_value_id): void
    {
        $this->product_template_attribute_value_id = $product_template_attribute_value_id;
    }

    /**
     * @param Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param null|Value[] $value_ids
     */
    public function setValueIds(?array $value_ids): void
    {
        $this->value_ids = $value_ids;
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
