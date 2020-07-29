<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.actions.server
 * ---
 * Name : ir.actions.server
 * ---
 * Info :
 * Add SMS option in server actions.
 */
class Server extends Base
{
    /**
     * Action Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $name;

    /**
     * Action Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $type;

    /**
     * Usage
     * ---
     * Selection : (default value, usually null)
     *     -> ir_actions_server (Server Action)
     *     -> ir_cron (Scheduled Action)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $usage;

    /**
     * Sequence
     * ---
     * When dealing with multiple actions, the execution order is based on the sequence. Low number means high
     * priority.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence;

    /**
     * Model
     * ---
     * Model on which the server action runs.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $model_id;

    /**
     * Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $model_name;

    /**
     * Python Code
     * ---
     * Write Python code that the action will execute. Some variables are available for use; help about python
     * expression is given in the help tab.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $code;

    /**
     * Child Actions
     * ---
     * Child server actions that will be executed. Note that the last return returned action value will be used as
     * global return value.
     * ---
     * Relation : many2many (ir.actions.server)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Server
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $child_ids;

    /**
     * Create/Write Target Model
     * ---
     * Model for record creation / update. Set this field only to specify a different model than the base model.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $crud_model_id;

    /**
     * Target Model
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $crud_model_name;

    /**
     * Link using field
     * ---
     * Provide the field used to link the newly created record on the record on used by the server action.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $link_field_id;

    /**
     * Value Mapping
     * ---
     * Relation : one2many (ir.server.object.lines -> server_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Server\Object_\Lines
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $fields_lines;

    /**
     * Groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $groups_id;

    /**
     * Add Followers
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $partner_ids;

    /**
     * Add Channels
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $channel_ids;

    /**
     * Email Template
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $template_id;

    /**
     * Activity
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_summary;

    /**
     * Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_note;

    /**
     * Due Date In
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $activity_date_deadline_range;

    /**
     * Due type
     * ---
     * Selection : (default value, usually null)
     *     -> days (Days)
     *     -> weeks (Weeks)
     *     -> months (Months)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_date_deadline_range_type;

    /**
     * Activity User Type
     * ---
     * Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     * specify the field name of the user to choose on the record.
     * ---
     * Selection : (default value, usually null)
     *     -> specific (Specific User)
     *     -> generic (Generic User From Record)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $activity_user_type;

    /**
     * Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $activity_user_id;

    /**
     * User field name
     * ---
     * Technical name of the user on the record
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $activity_user_field_name;

    /**
     * Action To Do
     * ---
     * Type of server action. The following values are available:
     * - 'Execute Python Code': a block of python code that will be executed
     * - 'Create': create a new record with new values
     * - 'Update a Record': update the values of a record
     * - 'Execute several actions': define an action that triggers several other server actions
     * - 'Send Email': automatically send an email (Discuss)
     * - 'Add Followers': add followers to a record (Discuss)
     * - 'Create Next Activity': create an activity (Discuss)
     * ---
     * Selection : (default value, usually null)
     *     -> code (Execute Python Code)
     *     -> object_create (Create a new Record)
     *     -> object_write (Update the Record)
     *     -> multi (Execute several actions)
     *     -> email (Send Email)
     *     -> followers (Add Followers)
     *     -> next_activity (Create Next Activity)
     *     -> sms (Send SMS Text Message)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $state;

    /**
     * SMS Template
     * ---
     * Relation : many2one (sms.template)
     * @see \Flux\OdooApiClient\Model\Object\Sms\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $sms_template_id;

    /**
     * Log a note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $sms_mass_keep_log;

    /**
     * External ID
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $xml_id;

    /**
     * Action Description
     * ---
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $help;

    /**
     * Binding Model
     * ---
     * Setting a value makes this action available in the sidebar for the given model.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $binding_model_id;

    /**
     * Binding Type
     * ---
     * Selection : (default value, usually null)
     *     -> action (Action)
     *     -> report (Report)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $binding_type;

    /**
     * Binding View Types
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $binding_view_types;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param string $name Action Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $usage Usage
     *        ---
     *        Selection : (default value, usually null)
     *            -> ir_actions_server (Server Action)
     *            -> ir_cron (Scheduled Action)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        ---
     *        Model on which the server action runs.
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $activity_user_type Activity User Type
     *        ---
     *        Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     *        specify the field name of the user to choose on the record.
     *        ---
     *        Selection : (default value, usually null)
     *            -> specific (Specific User)
     *            -> generic (Generic User From Record)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Action To Do
     *        ---
     *        Type of server action. The following values are available:
     *        - 'Execute Python Code': a block of python code that will be executed
     *        - 'Create': create a new record with new values
     *        - 'Update a Record': update the values of a record
     *        - 'Execute several actions': define an action that triggers several other server actions
     *        - 'Send Email': automatically send an email (Discuss)
     *        - 'Add Followers': add followers to a record (Discuss)
     *        - 'Create Next Activity': create an activity (Discuss)
     *        ---
     *        Selection : (default value, usually null)
     *            -> code (Execute Python Code)
     *            -> object_create (Create a new Record)
     *            -> object_write (Update the Record)
     *            -> multi (Execute several actions)
     *            -> email (Send Email)
     *            -> followers (Add Followers)
     *            -> next_activity (Create Next Activity)
     *            -> sms (Send SMS Text Message)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $binding_type Binding Type
     *        ---
     *        Selection : (default value, usually null)
     *            -> action (Action)
     *            -> report (Report)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $type,
        string $usage,
        OdooRelation $model_id,
        string $activity_user_type,
        string $state,
        string $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->usage = $usage;
        $this->model_id = $model_id;
        $this->activity_user_type = $activity_user_type;
        $this->state = $state;
        $this->binding_type = $binding_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_date_deadline_range_type")
     */
    public function getActivityDateDeadlineRangeType(): ?string
    {
        return $this->activity_date_deadline_range_type;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
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
     *
     * @SerializedName("activity_user_field_name")
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
     *
     * @SerializedName("activity_user_id")
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
     * @return string
     *
     * @SerializedName("activity_user_type")
     */
    public function getActivityUserType(): string
    {
        return $this->activity_user_type;
    }

    /**
     * @param string|null $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(?string $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
    }

    /**
     * @param int|null $activity_date_deadline_range
     */
    public function setActivityDateDeadlineRange(?int $activity_date_deadline_range): void
    {
        $this->activity_date_deadline_range = $activity_date_deadline_range;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sms_template_id")
     */
    public function getSmsTemplateId(): ?OdooRelation
    {
        return $this->sms_template_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("activity_date_deadline_range")
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
     *
     * @SerializedName("activity_note")
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
     *
     * @SerializedName("activity_summary")
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
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
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
     * @return string|null
     *
     * @SerializedName("binding_view_types")
     */
    public function getBindingViewTypes(): ?string
    {
        return $this->binding_view_types;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("sms_mass_keep_log")
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
     *
     * @SerializedName("binding_type")
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
     *
     * @SerializedName("binding_model_id")
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
     *
     * @SerializedName("help")
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
     *
     * @SerializedName("xml_id")
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
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model_name")
     */
    public function getModelName(): ?string
    {
        return $this->model_name;
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
     *
     * @SerializedName("child_ids")
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
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $model_name
     */
    public function setModelName(?string $model_name): void
    {
        $this->model_name = $model_name;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param OdooRelation|null $crud_model_id
     */
    public function setCrudModelId(?OdooRelation $crud_model_id): void
    {
        $this->crud_model_id = $crud_model_id;
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
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
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
     *
     * @SerializedName("usage")
     */
    public function getUsage(): string
    {
        return $this->usage;
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
     *
     * @SerializedName("type")
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
     * @return OdooRelation|null
     *
     * @SerializedName("crud_model_id")
     */
    public function getCrudModelId(): ?OdooRelation
    {
        return $this->crud_model_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("crud_model_name")
     */
    public function getCrudModelName(): ?string
    {
        return $this->crud_model_name;
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
     * @param OdooRelation[]|null $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("channel_ids")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
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
     * @param string|null $crud_model_name
     */
    public function setCrudModelName(?string $crud_model_name): void
    {
        $this->crud_model_name = $crud_model_name;
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
     *
     * @SerializedName("groups_id")
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
     *
     * @SerializedName("fields_lines")
     */
    public function getFieldsLines(): ?array
    {
        return $this->fields_lines;
    }

    /**
     * @param OdooRelation|null $link_field_id
     */
    public function setLinkFieldId(?OdooRelation $link_field_id): void
    {
        $this->link_field_id = $link_field_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("link_field_id")
     */
    public function getLinkFieldId(): ?OdooRelation
    {
        return $this->link_field_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.actions.server';
    }
}
