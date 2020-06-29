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
 * Info :
 * Attributes available on product.template with their selected values in a m2m.
 * Used as a configuration model to generate the appropriate product.template.attribute.value
 */
final class Line extends Base
{
    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Attribute
     *
     * @var Attribute
     */
    private $attribute_id;

    /**
     * Values
     *
     * @var null|Value[]
     */
    private $value_ids;

    /**
     * Product Attribute Values
     *
     * @var null|ValueAlias[]
     */
    private $product_template_value_ids;

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
     * @param Attribute $attribute_id Attribute
     */
    public function __construct(Template $product_tmpl_id, Attribute $attribute_id)
    {
        $this->product_tmpl_id = $product_tmpl_id;
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param Attribute $attribute_id
     */
    public function setAttributeId(Attribute $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
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
     * @param null|ValueAlias[] $product_template_value_ids
     */
    public function setProductTemplateValueIds(?array $product_template_value_ids): void
    {
        $this->product_template_value_ids = $product_template_value_ids;
    }

    /**
     * @param ValueAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductTemplateValueIds(ValueAlias $item, bool $strict = true): bool
    {
        if (null === $this->product_template_value_ids) {
            return false;
        }

        return in_array($item, $this->product_template_value_ids, $strict);
    }

    /**
     * @param ValueAlias $item
     */
    public function addProductTemplateValueIds(ValueAlias $item): void
    {
        if ($this->hasProductTemplateValueIds($item)) {
            return;
        }

        if (null === $this->product_template_value_ids) {
            $this->product_template_value_ids = [];
        }

        $this->product_template_value_ids[] = $item;
    }

    /**
     * @param ValueAlias $item
     */
    public function removeProductTemplateValueIds(ValueAlias $item): void
    {
        if (null === $this->product_template_value_ids) {
            $this->product_template_value_ids = [];
        }

        if ($this->hasProductTemplateValueIds($item)) {
            $index = array_search($item, $this->product_template_value_ids);
            unset($this->product_template_value_ids[$index]);
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
