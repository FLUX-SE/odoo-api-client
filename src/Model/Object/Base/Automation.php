<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : base.automation
 * ---
 * Name : base.automation
 * ---
 * Info :
 * Add resource and calendar for time-based conditions
 */
final class Automation extends Server
{
    /**
     * Server Actions
     * ---
     * Relation : many2one (ir.actions.server)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Server
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $action_server_id;

    /**
     * Active
     * ---
     * When unchecked, the rule is hidden and will not be executed.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Trigger Condition
     * ---
     * Selection :
     *     -> on_create (On Creation)
     *     -> on_write (On Update)
     *     -> on_create_or_write (On Creation & Update)
     *     -> on_unlink (On Deletion)
     *     -> on_change (Based on Form Modification)
     *     -> on_time (Based on Timed Condition)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $trigger;

    /**
     * Trigger Date
     * ---
     * When should the condition be triggered.
     *                                                                     If present, will be checked by the
     * scheduler. If empty, will be checked at creation and update.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $trg_date_id;

    /**
     * Delay after trigger date
     * ---
     * Delay after the trigger date.
     *                                                                         You can put a negative number if you
     * need a delay before the
     *                                                                         trigger date, like sending a reminder
     * 15 minutes before a meeting.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $trg_date_range;

    /**
     * Delay type
     * ---
     * Selection :
     *     -> minutes (Minutes)
     *     -> hour (Hours)
     *     -> day (Days)
     *     -> month (Months)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $trg_date_range_type;

    /**
     * Use Calendar
     * ---
     * When calculating a day-based timed condition, it is possible to use a calendar to compute the date based on
     * working days.
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $trg_date_calendar_id;

    /**
     * Before Update Domain
     * ---
     * If present, this condition must be satisfied before the update of the record.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $filter_pre_domain;

    /**
     * Apply on
     * ---
     * If present, this condition must be satisfied before executing the action rule.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $filter_domain;

    /**
     * Last Run
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $last_run;

    /**
     * On Change Fields Trigger
     * ---
     * Comma-separated list of field names that triggers the onchange.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $on_change_fields;

    /**
     * Watched fields
     * ---
     * The action will be triggered if and only if one of these fields is updated.If empty, all fields are watched.
     * ---
     * Relation : many2many (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $trigger_field_ids;

    /**
     * Use employee work schedule
     * ---
     * Use the user's working schedule.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $trg_date_resource_field_id;

    /**
     * @param OdooRelation $action_server_id Server Actions
     *        ---
     *        Relation : many2one (ir.actions.server)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Server
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $trigger Trigger Condition
     *        ---
     *        Selection :
     *            -> on_create (On Creation)
     *            -> on_write (On Update)
     *            -> on_create_or_write (On Creation & Update)
     *            -> on_unlink (On Deletion)
     *            -> on_change (Based on Form Modification)
     *            -> on_time (Based on Timed Condition)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Action Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
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
     *        Selection :
     *            -> specific (Specific User)
     *            -> generic (Generic User From Record)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $usage Usage
     *        ---
     *        Selection :
     *            -> ir_actions_server (Server Action)
     *            -> ir_cron (Scheduled Action)
     *            -> base_automation (Automated Action)
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
     *        Selection :
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
     *        Selection :
     *            -> action (Action)
     *            -> report (Report)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $action_server_id,
        string $trigger,
        string $name,
        string $type,
        OdooRelation $model_id,
        string $activity_user_type,
        string $usage,
        string $state,
        string $binding_type
    ) {
        $this->action_server_id = $action_server_id;
        $this->trigger = $trigger;
        parent::__construct(
            $name,
            $type,
            $model_id,
            $activity_user_type,
            $usage,
            $state,
            $binding_type
        );
    }

    /**
     * @param string|null $filter_pre_domain
     */
    public function setFilterPreDomain(?string $filter_pre_domain): void
    {
        $this->filter_pre_domain = $filter_pre_domain;
    }

    /**
     * @param OdooRelation|null $trg_date_resource_field_id
     */
    public function setTrgDateResourceFieldId(?OdooRelation $trg_date_resource_field_id): void
    {
        $this->trg_date_resource_field_id = $trg_date_resource_field_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("trg_date_resource_field_id")
     */
    public function getTrgDateResourceFieldId(): ?OdooRelation
    {
        return $this->trg_date_resource_field_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTriggerFieldIds(OdooRelation $item): void
    {
        if (null === $this->trigger_field_ids) {
            $this->trigger_field_ids = [];
        }

        if ($this->hasTriggerFieldIds($item)) {
            $index = array_search($item, $this->trigger_field_ids);
            unset($this->trigger_field_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addTriggerFieldIds(OdooRelation $item): void
    {
        if ($this->hasTriggerFieldIds($item)) {
            return;
        }

        if (null === $this->trigger_field_ids) {
            $this->trigger_field_ids = [];
        }

        $this->trigger_field_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTriggerFieldIds(OdooRelation $item): bool
    {
        if (null === $this->trigger_field_ids) {
            return false;
        }

        return in_array($item, $this->trigger_field_ids);
    }

    /**
     * @param OdooRelation[]|null $trigger_field_ids
     */
    public function setTriggerFieldIds(?array $trigger_field_ids): void
    {
        $this->trigger_field_ids = $trigger_field_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("trigger_field_ids")
     */
    public function getTriggerFieldIds(): ?array
    {
        return $this->trigger_field_ids;
    }

    /**
     * @param string|null $on_change_fields
     */
    public function setOnChangeFields(?string $on_change_fields): void
    {
        $this->on_change_fields = $on_change_fields;
    }

    /**
     * @return string|null
     *
     * @SerializedName("on_change_fields")
     */
    public function getOnChangeFields(): ?string
    {
        return $this->on_change_fields;
    }

    /**
     * @param DateTimeInterface|null $last_run
     */
    public function setLastRun(?DateTimeInterface $last_run): void
    {
        $this->last_run = $last_run;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_run")
     */
    public function getLastRun(): ?DateTimeInterface
    {
        return $this->last_run;
    }

    /**
     * @param string|null $filter_domain
     */
    public function setFilterDomain(?string $filter_domain): void
    {
        $this->filter_domain = $filter_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("filter_domain")
     */
    public function getFilterDomain(): ?string
    {
        return $this->filter_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("filter_pre_domain")
     */
    public function getFilterPreDomain(): ?string
    {
        return $this->filter_pre_domain;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("action_server_id")
     */
    public function getActionServerId(): OdooRelation
    {
        return $this->action_server_id;
    }

    /**
     * @param OdooRelation|null $trg_date_calendar_id
     */
    public function setTrgDateCalendarId(?OdooRelation $trg_date_calendar_id): void
    {
        $this->trg_date_calendar_id = $trg_date_calendar_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("trg_date_calendar_id")
     */
    public function getTrgDateCalendarId(): ?OdooRelation
    {
        return $this->trg_date_calendar_id;
    }

    /**
     * @param string|null $trg_date_range_type
     */
    public function setTrgDateRangeType(?string $trg_date_range_type): void
    {
        $this->trg_date_range_type = $trg_date_range_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("trg_date_range_type")
     */
    public function getTrgDateRangeType(): ?string
    {
        return $this->trg_date_range_type;
    }

    /**
     * @param int|null $trg_date_range
     */
    public function setTrgDateRange(?int $trg_date_range): void
    {
        $this->trg_date_range = $trg_date_range;
    }

    /**
     * @return int|null
     *
     * @SerializedName("trg_date_range")
     */
    public function getTrgDateRange(): ?int
    {
        return $this->trg_date_range;
    }

    /**
     * @param OdooRelation|null $trg_date_id
     */
    public function setTrgDateId(?OdooRelation $trg_date_id): void
    {
        $this->trg_date_id = $trg_date_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("trg_date_id")
     */
    public function getTrgDateId(): ?OdooRelation
    {
        return $this->trg_date_id;
    }

    /**
     * @param string $trigger
     */
    public function setTrigger(string $trigger): void
    {
        $this->trigger = $trigger;
    }

    /**
     * @return string
     *
     * @SerializedName("trigger")
     */
    public function getTrigger(): string
    {
        return $this->trigger;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param OdooRelation $action_server_id
     */
    public function setActionServerId(OdooRelation $action_server_id): void
    {
        $this->action_server_id = $action_server_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.automation';
    }
}
