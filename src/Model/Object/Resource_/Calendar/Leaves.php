<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar;
use Flux\OdooApiClient\Model\Object\Resource_\Resource_;

/**
 * Odoo model : resource.calendar.leaves
 * Name : resource.calendar.leaves
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
final class Leaves extends Base
{
    /**
     * Reason
     *
     * @var null|string
     */
    private $name;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Working Hours
     *
     * @var null|Calendar
     */
    private $calendar_id;

    /**
     * Start Date
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
     * Resource
     * If empty, this is a generic time off for the company. If a resource is set, the time off is only for this
     * resource
     *
     * @var null|Resource_
     */
    private $resource_id;

    /**
     * Time Type
     * Whether this should be computed as a time off or as work time (eg: formation)
     *
     * @var null|array
     */
    private $time_type;

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
     * @param DateTimeInterface $date_from Start Date
     * @param DateTimeInterface $date_to End Date
     */
    public function __construct(DateTimeInterface $date_from, DateTimeInterface $date_to)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param null|Calendar $calendar_id
     */
    public function setCalendarId(?Calendar $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param null|Resource_ $resource_id
     */
    public function setResourceId(?Resource_ $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param null|array $time_type
     */
    public function setTimeType(?array $time_type): void
    {
        $this->time_type = $time_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTimeType($item, bool $strict = true): bool
    {
        if (null === $this->time_type) {
            return false;
        }

        return in_array($item, $this->time_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTimeType($item): void
    {
        if ($this->hasTimeType($item)) {
            return;
        }

        if (null === $this->time_type) {
            $this->time_type = [];
        }

        $this->time_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTimeType($item): void
    {
        if (null === $this->time_type) {
            $this->time_type = [];
        }

        if ($this->hasTimeType($item)) {
            $index = array_search($item, $this->time_type);
            unset($this->time_type[$index]);
        }
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
