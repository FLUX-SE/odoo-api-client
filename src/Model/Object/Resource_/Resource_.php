<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : resource.resource
 * Name : resource.resource
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
final class Resource_ extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * If the active field is set to False, it will allow you to hide the resource record without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Resource Type
     *
     * @var array
     */
    private $resource_type;

    /**
     * User
     * Related user name for the resource to manage its access.
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Efficiency Factor
     * This field is used to calculate the the expected duration of a work order at this work center. For example, if
     * a work order takes one hour and the efficiency factor is 100%, then the expected duration will be one hour. If
     * the efficiency factor is 200%, however the expected duration will be 30 minutes.
     *
     * @var float
     */
    private $time_efficiency;

    /**
     * Working Time
     * Define the schedule of resource
     *
     * @var Calendar
     */
    private $calendar_id;

    /**
     * Timezone
     * This field is used in order to define in which timezone the resources will work.
     *
     * @var array
     */
    private $tz;

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
     * @param array $resource_type Resource Type
     * @param float $time_efficiency Efficiency Factor
     *        This field is used to calculate the the expected duration of a work order at this work center. For example, if
     *        a work order takes one hour and the efficiency factor is 100%, then the expected duration will be one hour. If
     *        the efficiency factor is 200%, however the expected duration will be 30 minutes.
     * @param Calendar $calendar_id Working Time
     *        Define the schedule of resource
     * @param array $tz Timezone
     *        This field is used in order to define in which timezone the resources will work.
     */
    public function __construct(
        string $name,
        array $resource_type,
        float $time_efficiency,
        Calendar $calendar_id,
        array $tz
    ) {
        $this->name = $name;
        $this->resource_type = $resource_type;
        $this->time_efficiency = $time_efficiency;
        $this->calendar_id = $calendar_id;
        $this->tz = $tz;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|bool
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return array
     */
    public function getResourceType(): array
    {
        return $this->resource_type;
    }

    /**
     * @return null|Users
     */
    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    /**
     * @return float
     */
    public function getTimeEfficiency(): float
    {
        return $this->time_efficiency;
    }

    /**
     * @return Calendar
     */
    public function getCalendarId(): Calendar
    {
        return $this->calendar_id;
    }

    /**
     * @return array
     */
    public function getTz(): array
    {
        return $this->tz;
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
