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
 * Info :
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
     * @var string
     */
    protected $name;

    /**
     * Action Type
     *
     * @var string
     */
    protected $type;

    /**
     * Sequence
     * When dealing with multiple actions, the execution order is based on the sequence. Low number means high
     * priority.
     *
     * @var null|int
     */
    protected $sequence;

    /**
     * Model
     * Model on which the server action runs.
     *
     * @var Model
     */
    protected $model_id;

    /**
     * Model Name
     *
     * @var null|string
     */
    protected $model_name;

    /**
     * Python Code
     * Write Python code that the action will execute. Some variables are available for use; help about python
     * expression is given in the help tab.
     *
     * @var null|string
     */
    protected $code;

    /**
     * Child Actions
     * Child server actions that will be executed. Note that the last return returned action value will be used as
     * global return value.
     *
     * @var null|ServerAlias[]
     */
    protected $child_ids;

    /**
     * Create/Write Target Model
     * Model for record creation / update. Set this field only to specify a different model than the base model.
     *
     * @var null|Model
     */
    protected $crud_model_id;

    /**
     * Target Model
     *
     * @var null|string
     */
    protected $crud_model_name;

    /**
     * Link using field
     * Provide the field used to link the newly created record on the record on used by the server action.
     *
     * @var null|Fields
     */
    protected $link_field_id;

    /**
     * Value Mapping
     *
     * @var null|Lines[]
     */
    protected $fields_lines;

    /**
     * Groups
     *
     * @var null|Groups[]
     */
    protected $groups_id;

    /**
     * Add Followers
     *
     * @var null|Partner[]
     */
    protected $partner_ids;

    /**
     * Add Channels
     *
     * @var null|Channel[]
     */
    protected $channel_ids;

    /**
     * Email Template
     *
     * @var null|Template
     */
    protected $template_id;

    /**
     * Activity
     *
     * @var null|Type
     */
    protected $activity_type_id;

    /**
     * Summary
     *
     * @var null|string
     */
    protected $activity_summary;

    /**
     * Note
     *
     * @var null|string
     */
    protected $activity_note;

    /**
     * Due Date In
     *
     * @var null|int
     */
    protected $activity_date_deadline_range;

    /**
     * Due type
     *
     * @var null|array
     */
    protected $activity_date_deadline_range_type;

    /**
     * Activity User Type
     * Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     * specify the field name of the user to choose on the record.
     *
     * @var array
     */
    protected $activity_user_type;

    /**
     * Responsible
     *
     * @var null|Users
     */
    protected $activity_user_id;

    /**
     * User field name
     * Technical name of the user on the record
     *
     * @var null|string
     */
    protected $activity_user_field_name;

    /**
     * Usage
     *
     * @var array
     */
    protected $usage;

    /**
     * Action To Do
     * Type of server action. The following values are available:
     * - 'Execute Python Code': a block of python code that will be executed
     * - 'Create': create a new record with new values
     * - 'Update a Record': update the values of a record
     * - 'Execute several actions': define an action that triggers several other server actions
     * - 'Send Email': automatically send an email (Discuss)
     * - 'Add Followers': add followers to a record (Discuss)
     * - 'Create Next Activity': create an activity (Discuss)
     *
     * @var array
     */
    protected $state;

    /**
     * SMS Template
     *
     * @var null|TemplateAlias
     */
    protected $sms_template_id;

    /**
     * Log a note
     *
     * @var null|bool
     */
    protected $sms_mass_keep_log;

    /**
     * External ID
     *
     * @var null|string
     */
    protected $xml_id;

    /**
     * Action Description
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     *
     * @var null|string
     */
    protected $help;

    /**
     * Binding Model
     * Setting a value makes this action available in the sidebar for the given model.
     *
     * @var null|Model
     */
    protected $binding_model_id;

    /**
     * Binding Type
     *
     * @var array
     */
    protected $binding_type;

    /**
     * Binding View Types
     *
     * @var null|string
     */
    protected $binding_view_types;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $name Action Name
     * @param string $type Action Type
     * @param Model $model_id Model
     *        Model on which the server action runs.
     * @param array $activity_user_type Activity User Type
     *        Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     *        specify the field name of the user to choose on the record.
     * @param array $usage Usage
     * @param array $state Action To Do
     *        Type of server action. The following values are available:
     *        - 'Execute Python Code': a block of python code that will be executed
     *        - 'Create': create a new record with new values
     *        - 'Update a Record': update the values of a record
     *        - 'Execute several actions': define an action that triggers several other server actions
     *        - 'Send Email': automatically send an email (Discuss)
     *        - 'Add Followers': add followers to a record (Discuss)
     *        - 'Create Next Activity': create an activity (Discuss)
     * @param array $binding_type Binding Type
     */
    public function __construct(
        string $name,
        string $type,
        Model $model_id,
        array $activity_user_type,
        array $usage,
        array $state,
        array $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->model_id = $model_id;
        $this->activity_user_type = $activity_user_type;
        $this->usage = $usage;
        $this->state = $state;
        $this->binding_type = $binding_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState($item, bool $strict = true): bool
    {
        return in_array($item, $this->state, $strict);
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityDateDeadlineRangeType($item, bool $strict = true): bool
    {
        if (null === $this->activity_date_deadline_range_type) {
            return false;
        }

        return in_array($item, $this->activity_date_deadline_range_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addActivityDateDeadlineRangeType($item): void
    {
        if ($this->hasActivityDateDeadlineRangeType($item)) {
            return;
        }

        if (null === $this->activity_date_deadline_range_type) {
            $this->activity_date_deadline_range_type = [];
        }

        $this->activity_date_deadline_range_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeActivityDateDeadlineRangeType($item): void
    {
        if (null === $this->activity_date_deadline_range_type) {
            $this->activity_date_deadline_range_type = [];
        }

        if ($this->hasActivityDateDeadlineRangeType($item)) {
            $index = array_search($item, $this->activity_date_deadline_range_type);
            unset($this->activity_date_deadline_range_type[$index]);
        }
    }

    /**
     * @param array $activity_user_type
     */
    public function setActivityUserType(array $activity_user_type): void
    {
        $this->activity_user_type = $activity_user_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityUserType($item, bool $strict = true): bool
    {
        return in_array($item, $this->activity_user_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addActivityUserType($item): void
    {
        if ($this->hasActivityUserType($item)) {
            return;
        }

        $this->activity_user_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeActivityUserType($item): void
    {
        if ($this->hasActivityUserType($item)) {
            $index = array_search($item, $this->activity_user_type);
            unset($this->activity_user_type[$index]);
        }
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param null|string $activity_user_field_name
     */
    public function setActivityUserFieldName(?string $activity_user_field_name): void
    {
        $this->activity_user_field_name = $activity_user_field_name;
    }

    /**
     * @param array $usage
     */
    public function setUsage(array $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUsage($item, bool $strict = true): bool
    {
        return in_array($item, $this->usage, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addUsage($item): void
    {
        if ($this->hasUsage($item)) {
            return;
        }

        $this->usage[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeUsage($item): void
    {
        if ($this->hasUsage($item)) {
            $index = array_search($item, $this->usage);
            unset($this->usage[$index]);
        }
    }

    /**
     * @param array $state
     */
    public function setState(array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param mixed $item
     */
    public function addState($item): void
    {
        if ($this->hasState($item)) {
            return;
        }

        $this->state[] = $item;
    }

    /**
     * @param null|int $activity_date_deadline_range
     */
    public function setActivityDateDeadlineRange(?int $activity_date_deadline_range): void
    {
        $this->activity_date_deadline_range = $activity_date_deadline_range;
    }

    /**
     * @param mixed $item
     */
    public function removeState($item): void
    {
        if ($this->hasState($item)) {
            $index = array_search($item, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param null|TemplateAlias $sms_template_id
     */
    public function setSmsTemplateId(?TemplateAlias $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @param null|bool $sms_mass_keep_log
     */
    public function setSmsMassKeepLog(?bool $sms_mass_keep_log): void
    {
        $this->sms_mass_keep_log = $sms_mass_keep_log;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param null|string $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param null|Model $binding_model_id
     */
    public function setBindingModelId(?Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param array $binding_type
     */
    public function setBindingType(array $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType($item, bool $strict = true): bool
    {
        return in_array($item, $this->binding_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            return;
        }

        $this->binding_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            $index = array_search($item, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param null|string $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
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
     * @param null|array $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(?array $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
    }

    /**
     * @param null|string $activity_note
     */
    public function setActivityNote(?string $activity_note): void
    {
        $this->activity_note = $activity_note;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Lines $item
     */
    public function addFieldsLines(Lines $item): void
    {
        if ($this->hasFieldsLines($item)) {
            return;
        }

        if (null === $this->fields_lines) {
            $this->fields_lines = [];
        }

        $this->fields_lines[] = $item;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
    public function getModelName(): ?string
    {
        return $this->model_name;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|ServerAlias[] $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param ServerAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildIds(ServerAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids, $strict);
    }

    /**
     * @param ServerAlias $item
     */
    public function addChildIds(ServerAlias $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param ServerAlias $item
     */
    public function removeChildIds(ServerAlias $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param null|Model $crud_model_id
     */
    public function setCrudModelId(?Model $crud_model_id): void
    {
        $this->crud_model_id = $crud_model_id;
    }

    /**
     * @return null|string
     */
    public function getCrudModelName(): ?string
    {
        return $this->crud_model_name;
    }

    /**
     * @param null|Fields $link_field_id
     */
    public function setLinkFieldId(?Fields $link_field_id): void
    {
        $this->link_field_id = $link_field_id;
    }

    /**
     * @param null|Lines[] $fields_lines
     */
    public function setFieldsLines(?array $fields_lines): void
    {
        $this->fields_lines = $fields_lines;
    }

    /**
     * @param Lines $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFieldsLines(Lines $item, bool $strict = true): bool
    {
        if (null === $this->fields_lines) {
            return false;
        }

        return in_array($item, $this->fields_lines, $strict);
    }

    /**
     * @param Lines $item
     */
    public function removeFieldsLines(Lines $item): void
    {
        if (null === $this->fields_lines) {
            $this->fields_lines = [];
        }

        if ($this->hasFieldsLines($item)) {
            $index = array_search($item, $this->fields_lines);
            unset($this->fields_lines[$index]);
        }
    }

    /**
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroupsId(Groups $item, bool $strict = true): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id, $strict);
    }

    /**
     * @param Groups $item
     */
    public function addGroupsId(Groups $item): void
    {
        if ($this->hasGroupsId($item)) {
            return;
        }

        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        $this->groups_id[] = $item;
    }

    /**
     * @param Groups $item
     */
    public function removeGroupsId(Groups $item): void
    {
        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        if ($this->hasGroupsId($item)) {
            $index = array_search($item, $this->groups_id);
            unset($this->groups_id[$index]);
        }
    }

    /**
     * @param null|Partner[] $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids, $strict);
    }

    /**
     * @param Partner $item
     */
    public function addPartnerIds(Partner $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param Partner $item
     */
    public function removePartnerIds(Partner $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param null|Channel[] $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param Channel $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelIds(Channel $item, bool $strict = true): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids, $strict);
    }

    /**
     * @param Channel $item
     */
    public function addChannelIds(Channel $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
    }

    /**
     * @param Channel $item
     */
    public function removeChannelIds(Channel $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
    }

    /**
     * @param null|Template $template_id
     */
    public function setTemplateId(?Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
