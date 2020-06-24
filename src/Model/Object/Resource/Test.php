<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : resource.test
 * Name : resource.test
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
final class Test extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Resource
     *
     * @var null|Resource
     */
    private $resource_id;

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
    private $resource_calendar_id;

    /**
     * Timezone
     *
     * @var array
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Resource $resource_id
     */
    public function setResourceId(Resource $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param array $tz
     */
    public function setTz(array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param array $tz
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz(array $tz, bool $strict = true): bool
    {
        return in_array($tz, $this->tz, $strict);
    }

    /**
     * @param array $tz
     */
    public function addTz(array $tz): void
    {
        if ($this->hasTz($tz)) {
            return;
        }

        $this->tz[] = $tz;
    }

    /**
     * @param array $tz
     */
    public function removeTz(array $tz): void
    {
        if ($this->hasTz($tz)) {
            $index = array_search($tz, $this->tz);
            unset($this->tz[$index]);
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
