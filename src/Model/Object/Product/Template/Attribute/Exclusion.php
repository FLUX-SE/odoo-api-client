<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Template\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.template.attribute.exclusion
 * Name : product.template.attribute.exclusion
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Exclusion extends Base
{
    /**
     * Attribute Value
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_template_attribute_value_id;

    /**
     * Product Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $value_ids;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $product_tmpl_id Product Template
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $product_tmpl_id)
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @return OdooRelation|null
     */
    public function getProductTemplateAttributeValueId(): ?OdooRelation
    {
        return $this->product_template_attribute_value_id;
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
     * @param OdooRelation|null $product_template_attribute_value_id
     */
    public function setProductTemplateAttributeValueId(
        ?OdooRelation $product_template_attribute_value_id
    ): void {
        $this->product_template_attribute_value_id = $product_template_attribute_value_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.template.attribute.exclusion';
    }
}
