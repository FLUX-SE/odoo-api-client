<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms\Template;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sms\Template;

/**
 * Odoo model : sms.template.preview
 * Name : sms.template.preview
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Preview extends Base
{
    /**
     * Sms Template
     *
     * @var Template
     */
    private $sms_template_id;

    /**
     * Template Preview Language
     *
     * @var array
     */
    private $lang;

    /**
     * Applies to
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Record ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Record reference
     *
     * @var mixed
     */
    private $resource_ref;

    /**
     * Name
     *
     * @var string
     */
    private $name;

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
     * @param Template $sms_template_id
     */
    public function setSmsTemplateId(Template $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @return ActWindow
     */
    public function getSidebarActionId(): ActWindow
    {
        return $this->sidebar_action_id;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param string $copyvalue
     */
    public function setCopyvalue(string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param string $null_value
     */
    public function setNullValue(string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param Fields $sub_model_object_field
     */
    public function setSubModelObjectField(Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @return Model
     */
    public function getSubObject(): Model
    {
        return $this->sub_object;
    }

    /**
     * @param Fields $model_object_field
     */
    public function setModelObjectField(Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param array $lang
     */
    public function setLang(array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return null|Model
     */
    public function getModelId(): Model
    {
        return $this->model_id;
    }

    /**
     * @param array $lang
     */
    public function removeLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            $index = array_search($lang, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param array $lang
     */
    public function addLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            return;
        }

        $this->lang[] = $lang;
    }

    /**
     * @param array $lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang(array $lang, bool $strict = true): bool
    {
        return in_array($lang, $this->lang, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
