<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Resource\Calendar;

/**
 * Odoo model : base.automation
 * Name : base.automation
 *
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
     * @var null|Server
     */
    private $action_server_id;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Trigger Condition
     *
     * @var null|array
     */
    private $trigger;

    /**
     * Trigger Date
     *
     * @var Fields
     */
    private $trg_date_id;

    /**
     * Delay after trigger date
     *
     * @var int
     */
    private $trg_date_range;

    /**
     * Delay type
     *
     * @var array
     */
    private $trg_date_range_type;

    /**
     * Use Calendar
     *
     * @var Calendar
     */
    private $trg_date_calendar_id;

    /**
     * Before Update Domain
     *
     * @var string
     */
    private $filter_pre_domain;

    /**
     * Apply on
     *
     * @var string
     */
    private $filter_domain;

    /**
     * Last Run
     *
     * @var DateTimeInterface
     */
    private $last_run;

    /**
     * On Change Fields Trigger
     *
     * @var string
     */
    private $on_change_fields;

    /**
     * Watched fields
     *
     * @var Fields
     */
    private $trigger_field_ids;

    /**
     * @param null|Server $action_server_id
     */
    public function setActionServerId(Server $action_server_id): void
    {
        $this->action_server_id = $action_server_id;
    }

    /**
     * @param array $trg_date_range_type
     */
    public function addTrgDateRangeType(array $trg_date_range_type): void
    {
        if ($this->hasTrgDateRangeType($trg_date_range_type)) {
            return;
        }

        $this->trg_date_range_type[] = $trg_date_range_type;
    }

    /**
     * @param string $on_change_fields
     */
    public function setOnChangeFields(string $on_change_fields): void
    {
        $this->on_change_fields = $on_change_fields;
    }

    /**
     * @return DateTimeInterface
     */
    public function getLastRun(): DateTimeInterface
    {
        return $this->last_run;
    }

    /**
     * @param string $filter_domain
     */
    public function setFilterDomain(string $filter_domain): void
    {
        $this->filter_domain = $filter_domain;
    }

    /**
     * @param string $filter_pre_domain
     */
    public function setFilterPreDomain(string $filter_pre_domain): void
    {
        $this->filter_pre_domain = $filter_pre_domain;
    }

    /**
     * @param Calendar $trg_date_calendar_id
     */
    public function setTrgDateCalendarId(Calendar $trg_date_calendar_id): void
    {
        $this->trg_date_calendar_id = $trg_date_calendar_id;
    }

    /**
     * @param array $trg_date_range_type
     */
    public function removeTrgDateRangeType(array $trg_date_range_type): void
    {
        if ($this->hasTrgDateRangeType($trg_date_range_type)) {
            $index = array_search($trg_date_range_type, $this->trg_date_range_type);
            unset($this->trg_date_range_type[$index]);
        }
    }

    /**
     * @param array $trg_date_range_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrgDateRangeType(array $trg_date_range_type, bool $strict = true): bool
    {
        return in_array($trg_date_range_type, $this->trg_date_range_type, $strict);
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param array $trg_date_range_type
     */
    public function setTrgDateRangeType(array $trg_date_range_type): void
    {
        $this->trg_date_range_type = $trg_date_range_type;
    }

    /**
     * @param int $trg_date_range
     */
    public function setTrgDateRange(int $trg_date_range): void
    {
        $this->trg_date_range = $trg_date_range;
    }

    /**
     * @param Fields $trg_date_id
     */
    public function setTrgDateId(Fields $trg_date_id): void
    {
        $this->trg_date_id = $trg_date_id;
    }

    /**
     * @param ?array $trigger
     */
    public function removeTrigger(?array $trigger): void
    {
        if ($this->hasTrigger($trigger)) {
            $index = array_search($trigger, $this->trigger);
            unset($this->trigger[$index]);
        }
    }

    /**
     * @param ?array $trigger
     */
    public function addTrigger(?array $trigger): void
    {
        if ($this->hasTrigger($trigger)) {
            return;
        }

        if (null === $this->trigger) {
            $this->trigger = [];
        }

        $this->trigger[] = $trigger;
    }

    /**
     * @param ?array $trigger
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrigger(?array $trigger, bool $strict = true): bool
    {
        if (null === $this->trigger) {
            return false;
        }

        return in_array($trigger, $this->trigger, $strict);
    }

    /**
     * @param null|array $trigger
     */
    public function setTrigger(?array $trigger): void
    {
        $this->trigger = $trigger;
    }

    /**
     * @param Fields $trigger_field_ids
     */
    public function setTriggerFieldIds(Fields $trigger_field_ids): void
    {
        $this->trigger_field_ids = $trigger_field_ids;
    }
}
