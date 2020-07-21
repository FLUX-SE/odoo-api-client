<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.actions.server
 * Name : ir.actions.server
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
class Server extends Base
{
    /**
     * Action Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $name;

    /**
     * Action Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $type;

    /**
     * Sequence
     * When dealing with multiple actions, the execution order is based on the sequence. Low number means high
     * priority.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence;

    /**
     * Model
     * Model on which the server action runs.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $model_id;

    /**
     * Model Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $model_name;

    /**
     * Python Code
     * Write Python code that the action will execute. Some variables are available for use; help about python
     * expression is given in the help tab.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $code;

    /**
     * Child Actions
     * Child server actions that will be executed. Note that the last return returned action value will be used as
     * global return value.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $child_ids;

    /**
     * Create/Write Target Model
     * Model for record creation / update. Set this field only to specify a different model than the base model.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $crud_model_id;

    /**
     * Target Model
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $crud_model_name;

    /**
     * Link using field
     * Provide the field used to link the newly created record on the record on used by the server action.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $link_field_id;

    /**
     * Value Mapping
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $fields_lines;

    /**
     * Groups
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $groups_id;

    /**
     * Add Followers
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $partner_ids;

    /**
     * Add Channels
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $channel_ids;

    /**
     * Email Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $template_id;

    /**
     * Activity
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Summary
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_summary;

    /**
     * Note
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_note;

    /**
     * Due Date In
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $activity_date_deadline_range;

    /**
     * Due type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> days (Days)
     *     -> weeks (Weeks)
     *     -> months (Months)
     *
     *
     * @var string|null
     */
    protected $activity_date_deadline_range_type;

    /**
     * Activity User Type
     * Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     * specify the field name of the user to choose on the record.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> specific (Specific User)
     *     -> generic (Generic User From Record)
     *
     *
     * @var string
     */
    protected $activity_user_type;

    /**
     * Responsible
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $activity_user_id;

    /**
     * User field name
     * Technical name of the user on the record
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_user_field_name;

    /**
     * Usage
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> ir_actions_server (Server Action)
     *     -> ir_cron (Scheduled Action)
     *     -> base_automation (Automated Action)
     *
     *
     * @var string
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
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> code (Execute Python Code)
     *     -> object_create (Create a new Record)
     *     -> object_write (Update the Record)
     *     -> multi (Execute several actions)
     *     -> email (Send Email)
     *     -> followers (Add Followers)
     *     -> next_activity (Create Next Activity)
     *     -> sms (Send SMS Text Message)
     *
     *
     * @var string
     */
    protected $state;

    /**
     * SMS Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $sms_template_id;

    /**
     * Log a note
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $sms_mass_keep_log;

    /**
     * External ID
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $xml_id;

    /**
     * Action Description
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $help;

    /**
     * Binding Model
     * Setting a value makes this action available in the sidebar for the given model.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $binding_model_id;

    /**
     * Binding Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> action (Action)
     *     -> report (Report)
     *
     *
     * @var string
     */
    protected $binding_type;

    /**
     * Binding View Types
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $binding_view_types;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param string $name Action Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        Model on which the server action runs.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $activity_user_type Activity User Type
     *        Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     *        specify the field name of the user to choose on the record.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> specific (Specific User)
     *            -> generic (Generic User From Record)
     *       
     * @param string $usage Usage
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> ir_actions_server (Server Action)
     *            -> ir_cron (Scheduled Action)
     *            -> base_automation (Automated Action)
     *       
     * @param string $state Action To Do
     *        Type of server action. The following values are available:
     *        - 'Execute Python Code': a block of python code that will be executed
     *        - 'Create': create a new record with new values
     *        - 'Update a Record': update the values of a record
     *        - 'Execute several actions': define an action that triggers several other server actions
     *        - 'Send Email': automatically send an email (Discuss)
     *        - 'Add Followers': add followers to a record (Discuss)
     *        - 'Create Next Activity': create an activity (Discuss)
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> code (Execute Python Code)
     *            -> object_create (Create a new Record)
     *            -> object_write (Update the Record)
     *            -> multi (Execute several actions)
     *            -> email (Send Email)
     *            -> followers (Add Followers)
     *            -> next_activity (Create Next Activity)
     *            -> sms (Send SMS Text Message)
     *       
     * @param string $binding_type Binding Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> action (Action)
     *            -> report (Report)
     *       
     */
    public function __construct(
        string $name,
        string $type,
        OdooRelation $model_id,
        string $activity_user_type,
        string $usage,
        string $state,
        string $binding_type
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
     * @return string
     */
    public function getActivityUserType(): string
    {
        return $this->activity_user_type;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $usage
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @param string|null $activity_user_field_name
     */
    public function setActivityUserFieldName(?string $activity_user_field_name): void
    {
        $this->activity_user_field_name = $activity_user_field_name;
    }

    /**
     * @return string|null
     */
    public function getActivityUserFieldName(): ?string
    {
        return $this->activity_user_field_name;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param string $activity_user_type
     */
    public function setActivityUserType(string $activity_user_type): void
    {
        $this->activity_user_type = $activity_user_type;
    }

    /**
     * @param string|null $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(?string $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSmsTemplateId(): ?OdooRelation
    {
        return $this->sms_template_id;
    }

    /**
     * @return string|null
     */
    public function getActivityDateDeadlineRangeType(): ?string
    {
        return $this->activity_date_deadline_range_type;
    }

    /**
     * @param int|null $activity_date_deadline_range
     */
    public function setActivityDateDeadlineRange(?int $activity_date_deadline_range): void
    {
        $this->activity_date_deadline_range = $activity_date_deadline_range;
    }

    /**
     * @return int|null
     */
    public function getActivityDateDeadlineRange(): ?int
    {
        return $this->activity_date_deadline_range;
    }

    /**
     * @param string|null $activity_note
     */
    public function setActivityNote(?string $activity_note): void
    {
        $this->activity_note = $activity_note;
    }

    /**
     * @return string|null
     */
    public function getActivityNote(): ?string
    {
        return $this->activity_note;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param OdooRelation|null $sms_template_id
     */
    public function setSmsTemplateId(?OdooRelation $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param string|null $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
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
     * @return string|null
     */
    public function getBindingViewTypes(): ?string
    {
        return $this->binding_view_types;
    }

    /**
     * @return bool|null
     */
    public function isSmsMassKeepLog(): ?bool
    {
        return $this->sms_mass_keep_log;
    }

    /**
     * @param string $binding_type
     */
    public function setBindingType(string $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @return string
     */
    public function getBindingType(): string
    {
        return $this->binding_type;
    }

    /**
     * @param OdooRelation|null $binding_model_id
     */
    public function setBindingModelId(?OdooRelation $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBindingModelId(): ?OdooRelation
    {
        return $this->binding_model_id;
    }

    /**
     * @param string|null $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return string|null
     */
    public function getHelp(): ?string
    {
        return $this->help;
    }

    /**
     * @param string|null $xml_id
     */
    public function setXmlId(?string $xml_id): void
    {
        $this->xml_id = $xml_id;
    }

    /**
     * @return string|null
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param bool|null $sms_mass_keep_log
     */
    public function setSmsMassKeepLog(?bool $sms_mass_keep_log): void
    {
        $this->sms_mass_keep_log = $sms_mass_keep_log;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param OdooRelation|null $crud_model_id
     */
    public function setCrudModelId(?OdooRelation $crud_model_id): void
    {
        $this->crud_model_id = $crud_model_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCrudModelId(): ?OdooRelation
    {
        return $this->crud_model_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param string|null $model_name
     */
    public function setModelName(?string $model_name): void
    {
        $this->model_name = $model_name;
    }

    /**
     * @param string|null $crud_model_name
     */
    public function setCrudModelName(?string $crud_model_name): void
    {
        $this->crud_model_name = $crud_model_name;
    }

    /**
     * @return string|null
     */
    public function getModelName(): ?string
    {
        return $this->model_name;
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
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCrudModelName(): ?string
    {
        return $this->crud_model_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLinkFieldId(): ?OdooRelation
    {
        return $this->link_field_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelIds(OdooRelation $item): void
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
     * @return OdooRelation[]|null
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChannelIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelIds(OdooRelation $item): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChannelIds(): ?array
    {
        return $this->channel_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroupsId(OdooRelation $item): void
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
     * @param OdooRelation|null $link_field_id
     */
    public function setLinkFieldId(?OdooRelation $link_field_id): void
    {
        $this->link_field_id = $link_field_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addGroupsId(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroupsId(OdooRelation $item): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id);
    }

    /**
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFieldsLines(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addFieldsLines(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFieldsLines(OdooRelation $item): bool
    {
        if (null === $this->fields_lines) {
            return false;
        }

        return in_array($item, $this->fields_lines);
    }

    /**
     * @param OdooRelation[]|null $fields_lines
     */
    public function setFieldsLines(?array $fields_lines): void
    {
        $this->fields_lines = $fields_lines;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getFieldsLines(): ?array
    {
        return $this->fields_lines;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.actions.server';
    }
}
