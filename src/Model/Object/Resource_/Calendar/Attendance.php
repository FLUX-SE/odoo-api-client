<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : resource.calendar.attendance
 * Name : resource.calendar.attendance
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Attendance extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Day of Week
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> 0 (Monday)
     *     -> 1 (Tuesday)
     *     -> 2 (Wednesday)
     *     -> 3 (Thursday)
     *     -> 4 (Friday)
     *     -> 5 (Saturday)
     *     -> 6 (Sunday)
     *
     *
     * @var string
     */
    private $dayofweek;

    /**
     * Starting Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_from;

    /**
     * End Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_to;

    /**
     * Work from
     * Start and End time of working.
     * A specific value of 24:00 is interpreted as 23:59:59.999999.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $hour_from;

    /**
     * Work to
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $hour_to;

    /**
     * Resource's Calendar
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $calendar_id;

    /**
     * Day Period
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> morning (Morning)
     *     -> afternoon (Afternoon)
     *
     *
     * @var string
     */
    private $day_period;

    /**
     * Resource
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_id;

    /**
     * Week Even/Odd
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> 1 (Odd week)
     *     -> 0 (Even week)
     *
     *
     * @var string|null
     */
    private $week_type;

    /**
     * Calendar in 2 weeks mode
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $two_weeks_calendar;

    /**
     * Display Type
     * Technical field for UX purpose.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> line_section (Section)
     *
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Sequence
     * Gives the sequence of this line when displaying the resource calendar.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $dayofweek Day of Week
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> 0 (Monday)
     *            -> 1 (Tuesday)
     *            -> 2 (Wednesday)
     *            -> 3 (Thursday)
     *            -> 4 (Friday)
     *            -> 5 (Saturday)
     *            -> 6 (Sunday)
     *
     * @param float $hour_from Work from
     *        Start and End time of working.
     *        A specific value of 24:00 is interpreted as 23:59:59.999999.
     *        Searchable : yes
     *        Sortable : yes
     * @param float $hour_to Work to
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $calendar_id Resource's Calendar
     *        Searchable : yes
     *        Sortable : yes
     * @param string $day_period Day Period
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> morning (Morning)
     *            -> afternoon (Afternoon)
     *
     */
    public function __construct(
        string $name,
        string $dayofweek,
        float $hour_from,
        float $hour_to,
        OdooRelation $calendar_id,
        string $day_period
    ) {
        $this->name = $name;
        $this->dayofweek = $dayofweek;
        $this->hour_from = $hour_from;
        $this->hour_to = $hour_to;
        $this->calendar_id = $calendar_id;
        $this->day_period = $day_period;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return bool|null
     */
    public function isTwoWeeksCalendar(): ?bool
    {
        return $this->two_weeks_calendar;
    }

    /**
     * @param bool|null $two_weeks_calendar
     */
    public function setTwoWeeksCalendar(?bool $two_weeks_calendar): void
    {
        $this->two_weeks_calendar = $two_weeks_calendar;
    }

    /**
     * @return string|null
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return string|null
     */
    public function getWeekType(): ?string
    {
        return $this->week_type;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param string|null $week_type
     */
    public function setWeekType(?string $week_type): void
    {
        $this->week_type = $week_type;
    }

    /**
     * @param OdooRelation|null $resource_id
     */
    public function setResourceId(?OdooRelation $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param DateTimeInterface|null $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDayofweek(): string
    {
        return $this->dayofweek;
    }

    /**
     * @param string $dayofweek
     */
    public function setDayofweek(string $dayofweek): void
    {
        $this->dayofweek = $dayofweek;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateFrom(): ?DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @param DateTimeInterface|null $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateTo(): ?DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @return float
     */
    public function getHourFrom(): float
    {
        return $this->hour_from;
    }

    /**
     * @return OdooRelation|null
     */
    public function getResourceId(): ?OdooRelation
    {
        return $this->resource_id;
    }

    /**
     * @param float $hour_from
     */
    public function setHourFrom(float $hour_from): void
    {
        $this->hour_from = $hour_from;
    }

    /**
     * @return float
     */
    public function getHourTo(): float
    {
        return $this->hour_to;
    }

    /**
     * @param float $hour_to
     */
    public function setHourTo(float $hour_to): void
    {
        $this->hour_to = $hour_to;
    }

    /**
     * @return OdooRelation
     */
    public function getCalendarId(): OdooRelation
    {
        return $this->calendar_id;
    }

    /**
     * @param OdooRelation $calendar_id
     */
    public function setCalendarId(OdooRelation $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @return string
     */
    public function getDayPeriod(): string
    {
        return $this->day_period;
    }

    /**
     * @param string $day_period
     */
    public function setDayPeriod(string $day_period): void
    {
        $this->day_period = $day_period;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'resource.calendar.attendance';
    }
}
