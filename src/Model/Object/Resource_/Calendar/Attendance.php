<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar;
use Flux\OdooApiClient\Model\Object\Resource_\Resource_;

/**
 * Odoo model : resource.calendar.attendance
 * Name : resource.calendar.attendance
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Day of Week
     *
     * @var array
     */
    private $dayofweek;

    /**
     * Starting Date
     *
     * @var null|DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     *
     * @var null|DateTimeInterface
     */
    private $date_to;

    /**
     * Work from
     * Start and End time of working.
     * A specific value of 24:00 is interpreted as 23:59:59.999999.
     *
     * @var float
     */
    private $hour_from;

    /**
     * Work to
     *
     * @var float
     */
    private $hour_to;

    /**
     * Resource's Calendar
     *
     * @var Calendar
     */
    private $calendar_id;

    /**
     * Day Period
     *
     * @var array
     */
    private $day_period;

    /**
     * Resource
     *
     * @var null|Resource_
     */
    private $resource_id;

    /**
     * Week Even/Odd
     *
     * @var null|array
     */
    private $week_type;

    /**
     * Calendar in 2 weeks mode
     *
     * @var null|bool
     */
    private $two_weeks_calendar;

    /**
     * Display Type
     * Technical field for UX purpose.
     *
     * @var null|array
     */
    private $display_type;

    /**
     * Sequence
     * Gives the sequence of this line when displaying the resource calendar.
     *
     * @var null|int
     */
    private $sequence;

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
     * @param array $dayofweek Day of Week
     * @param float $hour_from Work from
     *        Start and End time of working.
     *        A specific value of 24:00 is interpreted as 23:59:59.999999.
     * @param float $hour_to Work to
     * @param Calendar $calendar_id Resource's Calendar
     * @param array $day_period Day Period
     */
    public function __construct(
        string $name,
        array $dayofweek,
        float $hour_from,
        float $hour_to,
        Calendar $calendar_id,
        array $day_period
    ) {
        $this->name = $name;
        $this->dayofweek = $dayofweek;
        $this->hour_from = $hour_from;
        $this->hour_to = $hour_to;
        $this->calendar_id = $calendar_id;
        $this->day_period = $day_period;
    }

    /**
     * @param null|array $week_type
     */
    public function setWeekType(?array $week_type): void
    {
        $this->week_type = $week_type;
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
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param mixed $item
     */
    public function removeDisplayType($item): void
    {
        if (null === $this->display_type) {
            $this->display_type = [];
        }

        if ($this->hasDisplayType($item)) {
            $index = array_search($item, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDisplayType($item): void
    {
        if ($this->hasDisplayType($item)) {
            return;
        }

        if (null === $this->display_type) {
            $this->display_type = [];
        }

        $this->display_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType($item, bool $strict = true): bool
    {
        if (null === $this->display_type) {
            return false;
        }

        return in_array($item, $this->display_type, $strict);
    }

    /**
     * @param null|array $display_type
     */
    public function setDisplayType(?array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return null|bool
     */
    public function isTwoWeeksCalendar(): ?bool
    {
        return $this->two_weeks_calendar;
    }

    /**
     * @param mixed $item
     */
    public function removeWeekType($item): void
    {
        if (null === $this->week_type) {
            $this->week_type = [];
        }

        if ($this->hasWeekType($item)) {
            $index = array_search($item, $this->week_type);
            unset($this->week_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addWeekType($item): void
    {
        if ($this->hasWeekType($item)) {
            return;
        }

        if (null === $this->week_type) {
            $this->week_type = [];
        }

        $this->week_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWeekType($item, bool $strict = true): bool
    {
        if (null === $this->week_type) {
            return false;
        }

        return in_array($item, $this->week_type, $strict);
    }

    /**
     * @param null|Resource_ $resource_id
     */
    public function setResourceId(?Resource_ $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     */
    public function removeDayPeriod($item): void
    {
        if ($this->hasDayPeriod($item)) {
            $index = array_search($item, $this->day_period);
            unset($this->day_period[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDayPeriod($item): void
    {
        if ($this->hasDayPeriod($item)) {
            return;
        }

        $this->day_period[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDayPeriod($item, bool $strict = true): bool
    {
        return in_array($item, $this->day_period, $strict);
    }

    /**
     * @param array $day_period
     */
    public function setDayPeriod(array $day_period): void
    {
        $this->day_period = $day_period;
    }

    /**
     * @param Calendar $calendar_id
     */
    public function setCalendarId(Calendar $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @param float $hour_to
     */
    public function setHourTo(float $hour_to): void
    {
        $this->hour_to = $hour_to;
    }

    /**
     * @param float $hour_from
     */
    public function setHourFrom(float $hour_from): void
    {
        $this->hour_from = $hour_from;
    }

    /**
     * @param null|DateTimeInterface $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param null|DateTimeInterface $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param mixed $item
     */
    public function removeDayofweek($item): void
    {
        if ($this->hasDayofweek($item)) {
            $index = array_search($item, $this->dayofweek);
            unset($this->dayofweek[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDayofweek($item): void
    {
        if ($this->hasDayofweek($item)) {
            return;
        }

        $this->dayofweek[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDayofweek($item, bool $strict = true): bool
    {
        return in_array($item, $this->dayofweek, $strict);
    }

    /**
     * @param array $dayofweek
     */
    public function setDayofweek(array $dayofweek): void
    {
        $this->dayofweek = $dayofweek;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
