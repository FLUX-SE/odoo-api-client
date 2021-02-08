<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Mail\Render;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.render.mixin
 * ---
 * Name : mail.render.mixin
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Mixin extends Base
{
    /**
     * Language
     * ---
     * Optional translation language (ISO code) to select when sending out an email. If not set, the english version
     * will be used. This should usually be a placeholder expression that provides the appropriate language, e.g.
     * ${object.partner_id.lang}.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lang;

    /**
     * Field
     * ---
     * Select target field from the related document model.
     * If it is a relationship field you will be able to select a target field at the destination of the
     * relationship.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model\Fields
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_object_field;

    /**
     * Sub-model
     * ---
     * When a relationship field is selected as first field, this field shows the document model the relationship
     * goes to.
     * ---
     * Relation : many2one (ir.model)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sub_object;

    /**
     * Sub-field
     * ---
     * When a relationship field is selected as first field, this field lets you select the target field within the
     * destination document model (sub-model).
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model\Fields
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sub_model_object_field;

    /**
     * Default Value
     * ---
     * Optional value to use if the target field is empty
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $null_value;

    /**
     * Placeholder Expression
     * ---
     * Final placeholder expression, to be copy-pasted in the desired template field.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $copyvalue;

    /**
     * @return string|null
     *
     * @SerializedName("lang")
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_object_field")
     */
    public function getModelObjectField(): ?OdooRelation
    {
        return $this->model_object_field;
    }

    /**
     * @param OdooRelation|null $model_object_field
     */
    public function setModelObjectField(?OdooRelation $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sub_object")
     */
    public function getSubObject(): ?OdooRelation
    {
        return $this->sub_object;
    }

    /**
     * @param OdooRelation|null $sub_object
     */
    public function setSubObject(?OdooRelation $sub_object): void
    {
        $this->sub_object = $sub_object;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sub_model_object_field")
     */
    public function getSubModelObjectField(): ?OdooRelation
    {
        return $this->sub_model_object_field;
    }

    /**
     * @param OdooRelation|null $sub_model_object_field
     */
    public function setSubModelObjectField(?OdooRelation $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @return string|null
     *
     * @SerializedName("null_value")
     */
    public function getNullValue(): ?string
    {
        return $this->null_value;
    }

    /**
     * @param string|null $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @return string|null
     *
     * @SerializedName("copyvalue")
     */
    public function getCopyvalue(): ?string
    {
        return $this->copyvalue;
    }

    /**
     * @param string|null $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.render.mixin';
    }
}
