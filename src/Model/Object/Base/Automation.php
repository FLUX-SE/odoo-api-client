<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.automation
 * Name : base.automation
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class Automation extends Server
{
    /**
     * Server Actions
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $action_server_id;

    /**
     * Active
     * When unchecked, the rule is hidden and will not be executed.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Trigger Condition
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> on_create (On Creation)
     *     -> on_write (On Update)
     *     -> on_create_or_write (On Creation & Update)
     *     -> on_unlink (On Deletion)
     *     -> on_change (Based on Form Modification)
     *     -> on_time (Based on Timed Condition)
     *
     *
     * @var string
     */
    private $trigger;

    /**
     * Trigger Date
     * When should the condition be triggered.
     *                                                                     If present, will be checked by the
     * scheduler. If empty, will be checked at creation and update.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $trg_date_id;

    /**
     * Delay after trigger date
     * Delay after the trigger date.
     *                                                                         You can put a negative number if you
     * need a delay before the
     *                                                                         trigger date, like sending a reminder
     * 15 minutes before a meeting.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $trg_date_range;

    /**
     * Delay type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> minutes (Minutes)
     *     -> hour (Hours)
     *     -> day (Days)
     *     -> month (Months)
     *
     *
     * @var string|null
     */
    private $trg_date_range_type;

    /**
     * Use Calendar
     * When calculating a day-based timed condition, it is possible to use a calendar to compute the date based on
     * working days.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $trg_date_calendar_id;

    /**
     * Before Update Domain
     * If present, this condition must be satisfied before the update of the record.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $filter_pre_domain;

    /**
     * Apply on
     * If present, this condition must be satisfied before executing the action rule.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $filter_domain;

    /**
     * Last Run
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $last_run;

    /**
     * On Change Fields Trigger
     * Comma-separated list of field names that triggers the onchange.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $on_change_fields;

    /**
     * Watched fields
     * The action will be triggered if and only if one of these fields is updated.If empty, all fields are watched.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $trigger_field_ids;

    /**
     * @param OdooRelation $action_server_id Server Actions
     *        Searchable : yes
     *        Sortable : yes
     * @param string $trigger Trigger Condition
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> on_create (On Creation)
     *            -> on_write (On Update)
     *            -> on_create_or_write (On Creation & Update)
     *            -> on_unlink (On Deletion)
     *            -> on_change (Based on Form Modification)
     *            -> on_time (Based on Timed Condition)
     *       
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
     * @return string|null
     */
    public function getFilterPreDomain(): ?string
    {
        return $this->filter_pre_domain;
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
     */
    public function getFilterDomain(): ?string
    {
        return $this->filter_domain;
    }

    /**
     * @param string|null $filter_pre_domain
     */
    public function setFilterPreDomain(?string $filter_pre_domain): void
    {
        $this->filter_pre_domain = $filter_pre_domain;
    }

    /**
     * @param OdooRelation|null $trg_date_calendar_id
     */
    public function setTrgDateCalendarId(?OdooRelation $trg_date_calendar_id): void
    {
        $this->trg_date_calendar_id = $trg_date_calendar_id;
    }

    /**
     * @return OdooRelation
     */
    public function getActionServerId(): OdooRelation
    {
        return $this->action_server_id;
    }

    /**
     * @return OdooRelation|null
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
