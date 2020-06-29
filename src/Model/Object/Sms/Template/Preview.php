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
 * Info :
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
     * @var null|Template
     */
    private $sms_template_id;

    /**
     * Template Preview Language
     *
     * @var null|array
     */
    private $lang;

    /**
     * Applies to
     * The type of document this template can be used with
     *
     * @var Model
     */
    private $model_id;

    /**
     * Record ID
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Record reference
     *
     * @var null|mixed
     */
    private $resource_ref;

    /**
     * Name
     *
     * @var null|string
     */
    private $name;

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
     * @return null|ActWindow
     */
    public function getSidebarActionId(): ?ActWindow
    {
        return $this->sidebar_action_id;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|string $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param null|string $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param null|Fields $sub_model_object_field
     */
    public function setSubModelObjectField(?Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @return null|Model
     */
    public function getSubObject(): ?Model
    {
        return $this->sub_object;
    }

    /**
     * @param null|Fields $model_object_field
     */
    public function setModelObjectField(?Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|Template $sms_template_id
     */
    public function setSmsTemplateId(?Template $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @return null|string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|mixed $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return Model
     */
    public function getModelId(): Model
    {
        return $this->model_id;
    }

    /**
     * @param mixed $item
     */
    public function removeLang($item): void
    {
        if (null === $this->lang) {
            $this->lang = [];
        }

        if ($this->hasLang($item)) {
            $index = array_search($item, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addLang($item): void
    {
        if ($this->hasLang($item)) {
            return;
        }

        if (null === $this->lang) {
            $this->lang = [];
        }

        $this->lang[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang($item, bool $strict = true): bool
    {
        if (null === $this->lang) {
            return false;
        }

        return in_array($item, $this->lang, $strict);
    }

    /**
     * @param null|array $lang
     */
    public function setLang(?array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
