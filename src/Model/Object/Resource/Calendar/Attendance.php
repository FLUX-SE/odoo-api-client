<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource\Calendar;
use Flux\OdooApiClient\Model\Object\Resource\Resource;

/**
 * Odoo model : resource.calendar.attendance
 * Name : resource.calendar.attendance
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Attendance extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Day of Week
     *
     * @var null|array
     */
    private $dayofweek;

    /**
     * Starting Date
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Work from
     *
     * @var null|float
     */
    private $hour_from;

    /**
     * Work to
     *
     * @var null|float
     */
    private $hour_to;

    /**
     * Resource's Calendar
     *
     * @var null|Calendar
     */
    private $calendar_id;

    /**
     * Day Period
     *
     * @var null|array
     */
    private $day_period;

    /**
     * Resource
     *
     * @var Resource
     */
    private $resource_id;

    /**
     * Week Even/Odd
     *
     * @var array
     */
    private $week_type;

    /**
     * Calendar in 2 weeks mode
     *
     * @var bool
     */
    private $two_weeks_calendar;

    /**
     * Display Type
     *
     * @var array
     */
    private $display_type;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @param array $week_type
     */
    public function setWeekType(array $week_type): void
    {
        $this->week_type = $week_type;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param array $display_type
     */
    public function removeDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            $index = array_search($display_type, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param array $display_type
     */
    public function addDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            return;
        }

        $this->display_type[] = $display_type;
    }

    /**
     * @param array $display_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType(array $display_type, bool $strict = true): bool
    {
        return in_array($display_type, $this->display_type, $strict);
    }

    /**
     * @param array $display_type
     */
    public function setDisplayType(array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return bool
     */
    public function isTwoWeeksCalendar(): bool
    {
        return $this->two_weeks_calendar;
    }

    /**
     * @param array $week_type
     */
    public function removeWeekType(array $week_type): void
    {
        if ($this->hasWeekType($week_type)) {
            $index = array_search($week_type, $this->week_type);
            unset($this->week_type[$index]);
        }
    }

    /**
     * @param array $week_type
     */
    public function addWeekType(array $week_type): void
    {
        if ($this->hasWeekType($week_type)) {
            return;
        }

        $this->week_type[] = $week_type;
    }

    /**
     * @param array $week_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWeekType(array $week_type, bool $strict = true): bool
    {
        return in_array($week_type, $this->week_type, $strict);
    }

    /**
     * @param Resource $resource_id
     */
    public function setResourceId(Resource $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param null|array $dayofweek
     */
    public function setDayofweek(?array $dayofweek): void
    {
        $this->dayofweek = $dayofweek;
    }

    /**
     * @param ?array $day_period
     */
    public function removeDayPeriod(?array $day_period): void
    {
        if ($this->hasDayPeriod($day_period)) {
            $index = array_search($day_period, $this->day_period);
            unset($this->day_period[$index]);
        }
    }

    /**
     * @param ?array $day_period
     */
    public function addDayPeriod(?array $day_period): void
    {
        if ($this->hasDayPeriod($day_period)) {
            return;
        }

        if (null === $this->day_period) {
            $this->day_period = [];
        }

        $this->day_period[] = $day_period;
    }

    /**
     * @param ?array $day_period
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDayPeriod(?array $day_period, bool $strict = true): bool
    {
        if (null === $this->day_period) {
            return false;
        }

        return in_array($day_period, $this->day_period, $strict);
    }

    /**
     * @param null|array $day_period
     */
    public function setDayPeriod(?array $day_period): void
    {
        $this->day_period = $day_period;
    }

    /**
     * @param null|Calendar $calendar_id
     */
    public function setCalendarId(Calendar $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @param null|float $hour_to
     */
    public function setHourTo(?float $hour_to): void
    {
        $this->hour_to = $hour_to;
    }

    /**
     * @param null|float $hour_from
     */
    public function setHourFrom(?float $hour_from): void
    {
        $this->hour_from = $hour_from;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param ?array $dayofweek
     */
    public function removeDayofweek(?array $dayofweek): void
    {
        if ($this->hasDayofweek($dayofweek)) {
            $index = array_search($dayofweek, $this->dayofweek);
            unset($this->dayofweek[$index]);
        }
    }

    /**
     * @param ?array $dayofweek
     */
    public function addDayofweek(?array $dayofweek): void
    {
        if ($this->hasDayofweek($dayofweek)) {
            return;
        }

        if (null === $this->dayofweek) {
            $this->dayofweek = [];
        }

        $this->dayofweek[] = $dayofweek;
    }

    /**
     * @param ?array $dayofweek
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDayofweek(?array $dayofweek, bool $strict = true): bool
    {
        if (null === $this->dayofweek) {
            return false;
        }

        return in_array($dayofweek, $this->dayofweek, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
