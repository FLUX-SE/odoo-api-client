<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : resource.resource
 * Name : resource.resource
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
final class Resource extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Resource Type
     *
     * @var null|array
     */
    private $resource_type;

    /**
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * Efficiency Factor
     *
     * @var null|float
     */
    private $time_efficiency;

    /**
     * Working Time
     *
     * @var null|Calendar
     */
    private $calendar_id;

    /**
     * Timezone
     *
     * @var null|array
     */
    private $tz;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return null|array
     */
    public function getResourceType(): ?array
    {
        return $this->resource_type;
    }

    /**
     * @return Users
     */
    public function getUserId(): Users
    {
        return $this->user_id;
    }

    /**
     * @return null|float
     */
    public function getTimeEfficiency(): ?float
    {
        return $this->time_efficiency;
    }

    /**
     * @return null|Calendar
     */
    public function getCalendarId(): Calendar
    {
        return $this->calendar_id;
    }

    /**
     * @return null|array
     */
    public function getTz(): ?array
    {
        return $this->tz;
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
