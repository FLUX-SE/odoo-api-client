<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server as ServerAlias;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Ir\Server\Object_\Lines;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Template;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sms\Template as TemplateAlias;

/**
 * Odoo model : ir.actions.server
 * Name : ir.actions.server
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
class Server extends Base
{
    /**
     * Action Name
     *
     * @var null|string
     */
    protected $name;

    /**
     * Action Type
     *
     * @var null|string
     */
    protected $type;

    /**
     * Sequence
     *
     * @var int
     */
    protected $sequence;

    /**
     * Model
     *
     * @var null|Model
     */
    protected $model_id;

    /**
     * Model Name
     *
     * @var string
     */
    protected $model_name;

    /**
     * Python Code
     *
     * @var string
     */
    protected $code;

    /**
     * Child Actions
     *
     * @var ServerAlias
     */
    protected $child_ids;

    /**
     * Create/Write Target Model
     *
     * @var Model
     */
    protected $crud_model_id;

    /**
     * Target Model
     *
     * @var string
     */
    protected $crud_model_name;

    /**
     * Link using field
     *
     * @var Fields
     */
    protected $link_field_id;

    /**
     * Value Mapping
     *
     * @var Lines
     */
    protected $fields_lines;

    /**
     * Groups
     *
     * @var Groups
     */
    protected $groups_id;

    /**
     * Add Followers
     *
     * @var Partner
     */
    protected $partner_ids;

    /**
     * Add Channels
     *
     * @var Channel
     */
    protected $channel_ids;

    /**
     * Email Template
     *
     * @var Template
     */
    protected $template_id;

    /**
     * Activity
     *
     * @var Type
     */
    protected $activity_type_id;

    /**
     * Summary
     *
     * @var string
     */
    protected $activity_summary;

    /**
     * Note
     *
     * @var string
     */
    protected $activity_note;

    /**
     * Due Date In
     *
     * @var int
     */
    protected $activity_date_deadline_range;

    /**
     * Due type
     *
     * @var array
     */
    protected $activity_date_deadline_range_type;

    /**
     * Activity User Type
     *
     * @var null|array
     */
    protected $activity_user_type;

    /**
     * Responsible
     *
     * @var Users
     */
    protected $activity_user_id;

    /**
     * User field name
     *
     * @var string
     */
    protected $activity_user_field_name;

    /**
     * Usage
     *
     * @var null|array
     */
    protected $usage;

    /**
     * Action To Do
     *
     * @var null|array
     */
    protected $state;

    /**
     * SMS Template
     *
     * @var TemplateAlias
     */
    protected $sms_template_id;

    /**
     * Log a note
     *
     * @var bool
     */
    protected $sms_mass_keep_log;

    /**
     * External ID
     *
     * @var string
     */
    protected $xml_id;

    /**
     * Action Description
     *
     * @var string
     */
    protected $help;

    /**
     * Binding Model
     *
     * @var Model
     */
    protected $binding_model_id;

    /**
     * Binding Type
     *
     * @var null|array
     */
    protected $binding_type;

    /**
     * Binding View Types
     *
     * @var string
     */
    protected $binding_view_types;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool $sms_mass_keep_log
     */
    public function setSmsMassKeepLog(bool $sms_mass_keep_log): void
    {
        $this->sms_mass_keep_log = $sms_mass_keep_log;
    }

    /**
     * @param string $activity_user_field_name
     */
    public function setActivityUserFieldName(string $activity_user_field_name): void
    {
        $this->activity_user_field_name = $activity_user_field_name;
    }

    /**
     * @param null|array $usage
     */
    public function setUsage(?array $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @param ?array $usage
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUsage(?array $usage, bool $strict = true): bool
    {
        if (null === $this->usage) {
            return false;
        }

        return in_array($usage, $this->usage, $strict);
    }

    /**
     * @param ?array $usage
     */
    public function addUsage(?array $usage): void
    {
        if ($this->hasUsage($usage)) {
            return;
        }

        if (null === $this->usage) {
            $this->usage = [];
        }

        $this->usage[] = $usage;
    }

    /**
     * @param ?array $usage
     */
    public function removeUsage(?array $usage): void
    {
        if ($this->hasUsage($usage)) {
            $index = array_search($usage, $this->usage);
            unset($this->usage[$index]);
        }
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param ?array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(?array $state, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($state, $this->state, $strict);
    }

    /**
     * @param ?array $state
     */
    public function addState(?array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $state;
    }

    /**
     * @param ?array $state
     */
    public function removeState(?array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param TemplateAlias $sms_template_id
     */
    public function setSmsTemplateId(TemplateAlias $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @param ?array $activity_user_type
     */
    public function removeActivityUserType(?array $activity_user_type): void
    {
        if ($this->hasActivityUserType($activity_user_type)) {
            $index = array_search($activity_user_type, $this->activity_user_type);
            unset($this->activity_user_type[$index]);
        }
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param Model $binding_model_id
     */
    public function setBindingModelId(Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param null|array $binding_type
     */
    public function setBindingType(?array $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @param ?array $binding_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType(?array $binding_type, bool $strict = true): bool
    {
        if (null === $this->binding_type) {
            return false;
        }

        return in_array($binding_type, $this->binding_type, $strict);
    }

    /**
     * @param ?array $binding_type
     */
    public function addBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            return;
        }

        if (null === $this->binding_type) {
            $this->binding_type = [];
        }

        $this->binding_type[] = $binding_type;
    }

    /**
     * @param ?array $binding_type
     */
    public function removeBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            $index = array_search($binding_type, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param string $binding_view_types
     */
    public function setBindingViewTypes(string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
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
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param ?array $activity_user_type
     */
    public function addActivityUserType(?array $activity_user_type): void
    {
        if ($this->hasActivityUserType($activity_user_type)) {
            return;
        }

        if (null === $this->activity_user_type) {
            $this->activity_user_type = [];
        }

        $this->activity_user_type[] = $activity_user_type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
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
    public function getModelName(): string
    {
        return $this->model_name;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param ServerAlias $child_ids
     */
    public function setChildIds(ServerAlias $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param Model $crud_model_id
     */
    public function setCrudModelId(Model $crud_model_id): void
    {
        $this->crud_model_id = $crud_model_id;
    }

    /**
     * @return string
     */
    public function getCrudModelName(): string
    {
        return $this->crud_model_name;
    }

    /**
     * @param Fields $link_field_id
     */
    public function setLinkFieldId(Fields $link_field_id): void
    {
        $this->link_field_id = $link_field_id;
    }

    /**
     * @param Lines $fields_lines
     */
    public function setFieldsLines(Lines $fields_lines): void
    {
        $this->fields_lines = $fields_lines;
    }

    /**
     * @param Groups $groups_id
     */
    public function setGroupsId(Groups $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param Channel $channel_ids
     */
    public function setChannelIds(Channel $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param ?array $activity_user_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityUserType(?array $activity_user_type, bool $strict = true): bool
    {
        if (null === $this->activity_user_type) {
            return false;
        }

        return in_array($activity_user_type, $this->activity_user_type, $strict);
    }

    /**
     * @param Template $template_id
     */
    public function setTemplateId(Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param string $activity_summary
     */
    public function setActivitySummary(string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param string $activity_note
     */
    public function setActivityNote(string $activity_note): void
    {
        $this->activity_note = $activity_note;
    }

    /**
     * @param int $activity_date_deadline_range
     */
    public function setActivityDateDeadlineRange(int $activity_date_deadline_range): void
    {
        $this->activity_date_deadline_range = $activity_date_deadline_range;
    }

    /**
     * @param array $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(array $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
    }

    /**
     * @param array $activity_date_deadline_range_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityDateDeadlineRangeType(
        array $activity_date_deadline_range_type,
        bool $strict = true
    ): bool
    {
        return in_array($activity_date_deadline_range_type, $this->activity_date_deadline_range_type, $strict);
    }

    /**
     * @param array $activity_date_deadline_range_type
     */
    public function addActivityDateDeadlineRangeType(array $activity_date_deadline_range_type): void
    {
        if ($this->hasActivityDateDeadlineRangeType($activity_date_deadline_range_type)) {
            return;
        }

        $this->activity_date_deadline_range_type[] = $activity_date_deadline_range_type;
    }

    /**
     * @param array $activity_date_deadline_range_type
     */
    public function removeActivityDateDeadlineRangeType(array $activity_date_deadline_range_type): void
    {
        if ($this->hasActivityDateDeadlineRangeType($activity_date_deadline_range_type)) {
            $index = array_search($activity_date_deadline_range_type, $this->activity_date_deadline_range_type);
            unset($this->activity_date_deadline_range_type[$index]);
        }
    }

    /**
     * @param null|array $activity_user_type
     */
    public function setActivityUserType(?array $activity_user_type): void
    {
        $this->activity_user_type = $activity_user_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
