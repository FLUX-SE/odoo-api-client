<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar;

/**
 * Odoo model : base.automation
 * Name : base.automation
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Automation extends Server
{
    /**
     * Server Actions
     *
     * @var Server
     */
    private $action_server_id;

    /**
     * Active
     * When unchecked, the rule is hidden and will not be executed.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Trigger Condition
     *
     * @var array
     */
    private $trigger;

    /**
     * Trigger Date
     * When should the condition be triggered.
     * If present, will be checked by the scheduler. If empty, will be checked at creation and update.
     *
     * @var null|Fields
     */
    private $trg_date_id;

    /**
     * Delay after trigger date
     * Delay after the trigger date.
     * You can put a negative number if you need a delay before the
     * trigger date, like sending a reminder 15 minutes before a meeting.
     *
     * @var null|int
     */
    private $trg_date_range;

    /**
     * Delay type
     *
     * @var null|array
     */
    private $trg_date_range_type;

    /**
     * Use Calendar
     * When calculating a day-based timed condition, it is possible to use a calendar to compute the date based on
     * working days.
     *
     * @var null|Calendar
     */
    private $trg_date_calendar_id;

    /**
     * Before Update Domain
     * If present, this condition must be satisfied before the update of the record.
     *
     * @var null|string
     */
    private $filter_pre_domain;

    /**
     * Apply on
     * If present, this condition must be satisfied before executing the action rule.
     *
     * @var null|string
     */
    private $filter_domain;

    /**
     * Last Run
     *
     * @var null|DateTimeInterface
     */
    private $last_run;

    /**
     * On Change Fields Trigger
     * Comma-separated list of field names that triggers the onchange.
     *
     * @var null|string
     */
    private $on_change_fields;

    /**
     * Watched fields
     * The action will be triggered if and only if one of these fields is updated.If empty, all fields are watched.
     *
     * @var null|Fields[]
     */
    private $trigger_field_ids;

    /**
     * @param Server $action_server_id Server Actions
     * @param array $trigger Trigger Condition
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
        Server $action_server_id,
        array $trigger,
        string $name,
        string $type,
        Model $model_id,
        array $activity_user_type,
        array $usage,
        array $state,
        array $binding_type
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
     * @param mixed $item
     */
    public function removeTrgDateRangeType($item): void
    {
        if (null === $this->trg_date_range_type) {
            $this->trg_date_range_type = [];
        }

        if ($this->hasTrgDateRangeType($item)) {
            $index = array_search($item, $this->trg_date_range_type);
            unset($this->trg_date_range_type[$index]);
        }
    }

    /**
     * @param Fields $item
     */
    public function addTriggerFieldIds(Fields $item): void
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
     * @param Fields $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTriggerFieldIds(Fields $item, bool $strict = true): bool
    {
        if (null === $this->trigger_field_ids) {
            return false;
        }

        return in_array($item, $this->trigger_field_ids, $strict);
    }

    /**
     * @param null|Fields[] $trigger_field_ids
     */
    public function setTriggerFieldIds(?array $trigger_field_ids): void
    {
        $this->trigger_field_ids = $trigger_field_ids;
    }

    /**
     * @param null|string $on_change_fields
     */
    public function setOnChangeFields(?string $on_change_fields): void
    {
        $this->on_change_fields = $on_change_fields;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLastRun(): ?DateTimeInterface
    {
        return $this->last_run;
    }

    /**
     * @param null|string $filter_domain
     */
    public function setFilterDomain(?string $filter_domain): void
    {
        $this->filter_domain = $filter_domain;
    }

    /**
     * @param null|string $filter_pre_domain
     */
    public function setFilterPreDomain(?string $filter_pre_domain): void
    {
        $this->filter_pre_domain = $filter_pre_domain;
    }

    /**
     * @param null|Calendar $trg_date_calendar_id
     */
    public function setTrgDateCalendarId(?Calendar $trg_date_calendar_id): void
    {
        $this->trg_date_calendar_id = $trg_date_calendar_id;
    }

    /**
     * @param mixed $item
     */
    public function addTrgDateRangeType($item): void
    {
        if ($this->hasTrgDateRangeType($item)) {
            return;
        }

        if (null === $this->trg_date_range_type) {
            $this->trg_date_range_type = [];
        }

        $this->trg_date_range_type[] = $item;
    }

    /**
     * @param Server $action_server_id
     */
    public function setActionServerId(Server $action_server_id): void
    {
        $this->action_server_id = $action_server_id;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrgDateRangeType($item, bool $strict = true): bool
    {
        if (null === $this->trg_date_range_type) {
            return false;
        }

        return in_array($item, $this->trg_date_range_type, $strict);
    }

    /**
     * @param null|array $trg_date_range_type
     */
    public function setTrgDateRangeType(?array $trg_date_range_type): void
    {
        $this->trg_date_range_type = $trg_date_range_type;
    }

    /**
     * @param null|int $trg_date_range
     */
    public function setTrgDateRange(?int $trg_date_range): void
    {
        $this->trg_date_range = $trg_date_range;
    }

    /**
     * @param null|Fields $trg_date_id
     */
    public function setTrgDateId(?Fields $trg_date_id): void
    {
        $this->trg_date_id = $trg_date_id;
    }

    /**
     * @param mixed $item
     */
    public function removeTrigger($item): void
    {
        if ($this->hasTrigger($item)) {
            $index = array_search($item, $this->trigger);
            unset($this->trigger[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addTrigger($item): void
    {
        if ($this->hasTrigger($item)) {
            return;
        }

        $this->trigger[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrigger($item, bool $strict = true): bool
    {
        return in_array($item, $this->trigger, $strict);
    }

    /**
     * @param array $trigger
     */
    public function setTrigger(array $trigger): void
    {
        $this->trigger = $trigger;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Fields $item
     */
    public function removeTriggerFieldIds(Fields $item): void
    {
        if (null === $this->trigger_field_ids) {
            $this->trigger_field_ids = [];
        }

        if ($this->hasTriggerFieldIds($item)) {
            $index = array_search($item, $this->trigger_field_ids);
            unset($this->trigger_field_ids[$index]);
        }
    }
}
