<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : sms.template
 * Name : sms.template
 * Info :
 * Templates for sending SMS
 */
final class Template extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Applies to
     * The type of document this template can be used with
     *
     * @var Model
     */
    private $model_id;

    /**
     * Related Document Model
     *
     * @var null|string
     */
    private $model;

    /**
     * Body
     *
     * @var string
     */
    private $body;

    /**
     * Language
     * Use this field to either force a specific language (ISO code) or dynamically detect the language of your
     * recipient by a placeholder expression (e.g. ${object.partner_id.lang})
     *
     * @var null|string
     */
    private $lang;

    /**
     * Sidebar action
     * Sidebar action to make this template available on records of the related document model
     *
     * @var null|ActWindow
     */
    private $sidebar_action_id;

    /**
     * Field
     * Select target field from the related document model.
     * If it is a relationship field you will be able to select a target field at the destination of the
     * relationship.
     *
     * @var null|Fields
     */
    private $model_object_field;

    /**
     * Sub-model
     * When a relationship field is selected as first field, this field shows the document model the relationship
     * goes to.
     *
     * @var null|Model
     */
    private $sub_object;

    /**
     * Sub-field
     * When a relationship field is selected as first field, this field lets you select the target field within the
     * destination document model (sub-model).
     *
     * @var null|Fields
     */
    private $sub_model_object_field;

    /**
     * Default Value
     * Optional value to use if the target field is empty
     *
     * @var null|string
     */
    private $null_value;

    /**
     * Placeholder Expression
     * Final placeholder expression, to be copy-pasted in the desired template field.
     *
     * @var null|string
     */
    private $copyvalue;

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
     * @param Model $model_id Applies to
     *        The type of document this template can be used with
     * @param string $body Body
     */
    public function __construct(Model $model_id, string $body)
    {
        $this->model_id = $model_id;
        $this->body = $body;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return null|string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|string $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return null|ActWindow
     */
    public function getSidebarActionId(): ?ActWindow
    {
        return $this->sidebar_action_id;
    }

    /**
     * @param null|Fields $model_object_field
     */
    public function setModelObjectField(?Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @return null|Model
     */
    public function getSubObject(): ?Model
    {
        return $this->sub_object;
    }

    /**
     * @param null|Fields $sub_model_object_field
     */
    public function setSubModelObjectField(?Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param null|string $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param null|string $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
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
