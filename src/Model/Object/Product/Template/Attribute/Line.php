<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Template\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.template.attribute.line
 * Name : product.template.attribute.line
 * Info :
 * Attributes available on product.template with their selected values in a m2m.
 *         Used as a configuration model to generate the appropriate product.template.attribute.value
 */
final class Line extends Base
{
    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Attribute
     * ---
     * Relation : many2one (product.attribute)
     * @see \Flux\OdooApiClient\Model\Object\Product\Attribute
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $attribute_id;

    /**
     * Values
     * ---
     * Relation : many2many (product.attribute.value)
     * @see \Flux\OdooApiClient\Model\Object\Product\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $value_ids;

    /**
     * Product Attribute Values
     * ---
     * Relation : one2many (product.template.attribute.value -> attribute_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_template_value_ids;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $product_tmpl_id Product Template
     *        ---
     *        Relation : many2one (product.template)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $attribute_id Attribute
     *        ---
     *        Relation : many2one (product.attribute)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Attribute
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $product_tmpl_id, OdooRelation $attribute_id)
    {
        $this->product_tmpl_id = $product_tmpl_id;
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTemplateValueIds(OdooRelation $item): bool
    {
        if (null === $this->product_template_value_ids) {
            return false;
        }

        return in_array($item, $this->product_template_value_ids);
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductTemplateValueIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addProductTemplateValueIds(OdooRelation $item): void
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
     * @param OdooRelation[]|null $product_template_value_ids
     */
    public function setProductTemplateValueIds(?array $product_template_value_ids): void
    {
        $this->product_template_value_ids = $product_template_value_ids;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getProductTemplateValueIds(): ?array
    {
        return $this->product_template_value_ids;
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
     * @param OdooRelation[]|null $value_ids
     */
    public function setValueIds(?array $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getValueIds(): ?array
    {
        return $this->value_ids;
    }

    /**
     * @param OdooRelation $attribute_id
     */
    public function setAttributeId(OdooRelation $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @return OdooRelation
     */
    public function getAttributeId(): OdooRelation
    {
        return $this->attribute_id;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.template.attribute.line';
    }
}
