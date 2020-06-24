<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource\Calendar\Attendance;
use Flux\OdooApiClient\Model\Object\Resource\Calendar\Leaves;

/**
 * Odoo model : resource.calendar
 * Name : resource.calendar
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Working Time
     *
     * @var Attendance
     */
    private $attendance_ids;

    /**
     * Time Off
     *
     * @var Leaves
     */
    private $leave_ids;

    /**
     * Global Time Off
     *
     * @var Leaves
     */
    private $global_leave_ids;

    /**
     * Average Hour per Day
     *
     * @var float
     */
    private $hours_per_day;

    /**
     * Timezone
     *
     * @var null|array
     */
    private $tz;

    /**
     * Calendar in 2 weeks mode
     *
     * @var bool
     */
    private $two_weeks_calendar;

    /**
     * Explanation
     *
     * @var string
     */
    private $two_weeks_explanation;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Attendance $attendance_ids
     */
    public function setAttendanceIds(Attendance $attendance_ids): void
    {
        $this->attendance_ids = $attendance_ids;
    }

    /**
     * @param Leaves $leave_ids
     */
    public function setLeaveIds(Leaves $leave_ids): void
    {
        $this->leave_ids = $leave_ids;
    }

    /**
     * @param Leaves $global_leave_ids
     */
    public function setGlobalLeaveIds(Leaves $global_leave_ids): void
    {
        $this->global_leave_ids = $global_leave_ids;
    }

    /**
     * @param float $hours_per_day
     */
    public function setHoursPerDay(float $hours_per_day): void
    {
        $this->hours_per_day = $hours_per_day;
    }

    /**
     * @param null|array $tz
     */
    public function setTz(?array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param ?array $tz
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz(?array $tz, bool $strict = true): bool
    {
        if (null === $this->tz) {
            return false;
        }

        return in_array($tz, $this->tz, $strict);
    }

    /**
     * @param ?array $tz
     */
    public function addTz(?array $tz): void
    {
        if ($this->hasTz($tz)) {
            return;
        }

        if (null === $this->tz) {
            $this->tz = [];
        }

        $this->tz[] = $tz;
    }

    /**
     * @param ?array $tz
     */
    public function removeTz(?array $tz): void
    {
        if ($this->hasTz($tz)) {
            $index = array_search($tz, $this->tz);
            unset($this->tz[$index]);
        }
    }

    /**
     * @param bool $two_weeks_calendar
     */
    public function setTwoWeeksCalendar(bool $two_weeks_calendar): void
    {
        $this->two_weeks_calendar = $two_weeks_calendar;
    }

    /**
     * @return string
     */
    public function getTwoWeeksExplanation(): string
    {
        return $this->two_weeks_explanation;
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
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
