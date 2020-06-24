<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Resource\Calendar;
use Flux\OdooApiClient\Model\Object\Resource\Resource;

/**
 * Odoo model : resource.calendar.leaves
 * Name : resource.calendar.leaves
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
final class Leaves extends Base
{
    /**
     * Reason
     *
     * @var string
     */
    private $name;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Working Hours
     *
     * @var Calendar
     */
    private $calendar_id;

    /**
     * Start Date
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
     * Resource
     *
     * @var Resource
     */
    private $resource_id;

    /**
     * Time Type
     *
     * @var array
     */
    private $time_type;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param Calendar $calendar_id
     */
    public function setCalendarId(Calendar $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @param null|DateTimeInterface $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param null|DateTimeInterface $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param Resource $resource_id
     */
    public function setResourceId(Resource $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param array $time_type
     */
    public function setTimeType(array $time_type): void
    {
        $this->time_type = $time_type;
    }

    /**
     * @param array $time_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTimeType(array $time_type, bool $strict = true): bool
    {
        return in_array($time_type, $this->time_type, $strict);
    }

    /**
     * @param array $time_type
     */
    public function addTimeType(array $time_type): void
    {
        if ($this->hasTimeType($time_type)) {
            return;
        }

        $this->time_type[] = $time_type;
    }

    /**
     * @param array $time_type
     */
    public function removeTimeType(array $time_type): void
    {
        if ($this->hasTimeType($time_type)) {
            $index = array_search($time_type, $this->time_type);
            unset($this->time_type[$index]);
        }
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
