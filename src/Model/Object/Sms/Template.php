<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sms.template
 * ---
 * Name : sms.template
 * ---
 * Info :
 * Templates for sending SMS
 */
final class Template extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Applies to
     * ---
     * The type of document this template can be used with
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Related Document Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $model;

    /**
     * Body
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $body;

    /**
     * Sidebar action
     * ---
     * Sidebar action to make this template available on records of the related document model
     * ---
     * Relation : many2one (ir.actions.act_window)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sidebar_action_id;

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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
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
     * @param OdooRelation $model_id Applies to
     *        ---
     *        The type of document this template can be used with
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $body Body
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $model_id, string $body)
    {
        $this->model_id = $model_id;
        $this->body = $body;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
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
     * @param string|null $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
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
     * @param OdooRelation|null $sub_model_object_field
     */
    public function setSubModelObjectField(?OdooRelation $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param OdooRelation|null $sub_object
     */
    public function setSubObject(?OdooRelation $sub_object): void
    {
        $this->sub_object = $sub_object;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * @param OdooRelation|null $model_object_field
     */
    public function setModelObjectField(?OdooRelation $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
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
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

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
     * @param OdooRelation|null $sidebar_action_id
     */
    public function setSidebarActionId(?OdooRelation $sidebar_action_id): void
    {
        $this->sidebar_action_id = $sidebar_action_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sidebar_action_id")
     */
    public function getSidebarActionId(): ?OdooRelation
    {
        return $this->sidebar_action_id;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     *
     * @SerializedName("body")
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.template';
    }
}
