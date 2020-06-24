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
 *
 * Templates for sending SMS
 */
final class Template extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Applies to
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Related Document Model
     *
     * @var string
     */
    private $model;

    /**
     * Body
     *
     * @var null|string
     */
    private $body;

    /**
     * Language
     *
     * @var string
     */
    private $lang;

    /**
     * Sidebar action
     *
     * @var ActWindow
     */
    private $sidebar_action_id;

    /**
     * Field
     *
     * @var Fields
     */
    private $model_object_field;

    /**
     * Sub-model
     *
     * @var Model
     */
    private $sub_object;

    /**
     * Sub-field
     *
     * @var Fields
     */
    private $sub_model_object_field;

    /**
     * Default Value
     *
     * @var string
     */
    private $null_value;

    /**
     * Placeholder Expression
     *
     * @var string
     */
    private $copyvalue;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return ActWindow
     */
    public function getSidebarActionId(): ActWindow
    {
        return $this->sidebar_action_id;
    }

    /**
     * @param Fields $model_object_field
     */
    public function setModelObjectField(Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @return Model
     */
    public function getSubObject(): Model
    {
        return $this->sub_object;
    }

    /**
     * @param Fields $sub_model_object_field
     */
    public function setSubModelObjectField(Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param string $null_value
     */
    public function setNullValue(string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param string $copyvalue
     */
    public function setCopyvalue(string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
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
