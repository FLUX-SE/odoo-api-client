<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar\Attendance;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar\Leaves;

/**
 * Odoo model : resource.calendar
 * Name : resource.calendar
 * Info :
 * Calendar model for a resource. It has
 *
 * - attendance_ids: list of resource.calendar.attendance that are a working
 * interval in a given weekday.
 * - leave_ids: list of leaves linked to this calendar. A leave can be general
 * or linked to a specific resource, depending on its resource_id.
 *
 * All methods in this class use intervals. An interval is a tuple holding
 * (begin_datetime, end_datetime). A list of intervals is therefore a list of
 * tuples, holding several intervals of work or leaves.
 */
final class Calendar extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Working Time
     *
     * @var null|Attendance[]
     */
    private $attendance_ids;

    /**
     * Time Off
     *
     * @var null|Leaves[]
     */
    private $leave_ids;

    /**
     * Global Time Off
     *
     * @var null|Leaves[]
     */
    private $global_leave_ids;

    /**
     * Average Hour per Day
     * Average hours per day a resource is supposed to work with this calendar.
     *
     * @var null|float
     */
    private $hours_per_day;

    /**
     * Timezone
     * This field is used in order to define in which timezone the resources will work.
     *
     * @var array
     */
    private $tz;

    /**
     * Calendar in 2 weeks mode
     *
     * @var null|bool
     */
    private $two_weeks_calendar;

    /**
     * Explanation
     *
     * @var null|string
     */
    private $two_weeks_explanation;

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
     * @param string $name Name
     * @param array $tz Timezone
     *        This field is used in order to define in which timezone the resources will work.
     */
    public function __construct(string $name, array $tz)
    {
        $this->name = $name;
        $this->tz = $tz;
    }

    /**
     * @param Leaves $item
     */
    public function removeGlobalLeaveIds(Leaves $item): void
    {
        if (null === $this->global_leave_ids) {
            $this->global_leave_ids = [];
        }

        if ($this->hasGlobalLeaveIds($item)) {
            $index = array_search($item, $this->global_leave_ids);
            unset($this->global_leave_ids[$index]);
        }
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
     * @return null|string
     */
    public function getTwoWeeksExplanation(): ?string
    {
        return $this->two_weeks_explanation;
    }

    /**
     * @param null|bool $two_weeks_calendar
     */
    public function setTwoWeeksCalendar(?bool $two_weeks_calendar): void
    {
        $this->two_weeks_calendar = $two_weeks_calendar;
    }

    /**
     * @param mixed $item
     */
    public function removeTz($item): void
    {
        if ($this->hasTz($item)) {
            $index = array_search($item, $this->tz);
            unset($this->tz[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addTz($item): void
    {
        if ($this->hasTz($item)) {
            return;
        }

        $this->tz[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz($item, bool $strict = true): bool
    {
        return in_array($item, $this->tz, $strict);
    }

    /**
     * @param array $tz
     */
    public function setTz(array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param null|float $hours_per_day
     */
    public function setHoursPerDay(?float $hours_per_day): void
    {
        $this->hours_per_day = $hours_per_day;
    }

    /**
     * @param Leaves $item
     */
    public function addGlobalLeaveIds(Leaves $item): void
    {
        if ($this->hasGlobalLeaveIds($item)) {
            return;
        }

        if (null === $this->global_leave_ids) {
            $this->global_leave_ids = [];
        }

        $this->global_leave_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Leaves $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGlobalLeaveIds(Leaves $item, bool $strict = true): bool
    {
        if (null === $this->global_leave_ids) {
            return false;
        }

        return in_array($item, $this->global_leave_ids, $strict);
    }

    /**
     * @param null|Leaves[] $global_leave_ids
     */
    public function setGlobalLeaveIds(?array $global_leave_ids): void
    {
        $this->global_leave_ids = $global_leave_ids;
    }

    /**
     * @param Leaves $item
     */
    public function removeLeaveIds(Leaves $item): void
    {
        if (null === $this->leave_ids) {
            $this->leave_ids = [];
        }

        if ($this->hasLeaveIds($item)) {
            $index = array_search($item, $this->leave_ids);
            unset($this->leave_ids[$index]);
        }
    }

    /**
     * @param Leaves $item
     */
    public function addLeaveIds(Leaves $item): void
    {
        if ($this->hasLeaveIds($item)) {
            return;
        }

        if (null === $this->leave_ids) {
            $this->leave_ids = [];
        }

        $this->leave_ids[] = $item;
    }

    /**
     * @param Leaves $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLeaveIds(Leaves $item, bool $strict = true): bool
    {
        if (null === $this->leave_ids) {
            return false;
        }

        return in_array($item, $this->leave_ids, $strict);
    }

    /**
     * @param null|Leaves[] $leave_ids
     */
    public function setLeaveIds(?array $leave_ids): void
    {
        $this->leave_ids = $leave_ids;
    }

    /**
     * @param Attendance $item
     */
    public function removeAttendanceIds(Attendance $item): void
    {
        if (null === $this->attendance_ids) {
            $this->attendance_ids = [];
        }

        if ($this->hasAttendanceIds($item)) {
            $index = array_search($item, $this->attendance_ids);
            unset($this->attendance_ids[$index]);
        }
    }

    /**
     * @param Attendance $item
     */
    public function addAttendanceIds(Attendance $item): void
    {
        if ($this->hasAttendanceIds($item)) {
            return;
        }

        if (null === $this->attendance_ids) {
            $this->attendance_ids = [];
        }

        $this->attendance_ids[] = $item;
    }

    /**
     * @param Attendance $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAttendanceIds(Attendance $item, bool $strict = true): bool
    {
        if (null === $this->attendance_ids) {
            return false;
        }

        return in_array($item, $this->attendance_ids, $strict);
    }

    /**
     * @param null|Attendance[] $attendance_ids
     */
    public function setAttendanceIds(?array $attendance_ids): void
    {
        $this->attendance_ids = $attendance_ids;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
