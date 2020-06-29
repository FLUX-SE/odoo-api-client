<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : resource.test
 * Name : resource.test
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
final class Test extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Resource
     *
     * @var Resource_
     */
    private $resource_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Working Hours
     * Define the schedule of resource
     *
     * @var null|Calendar
     */
    private $resource_calendar_id;

    /**
     * Timezone
     * This field is used in order to define in which timezone the resources will work.
     *
     * @var null|array
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
     * @param Resource_ $resource_id Resource
     */
    public function __construct(Resource_ $resource_id)
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Resource_ $resource_id
     */
    public function setResourceId(Resource_ $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(?Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param null|array $tz
     */
    public function setTz(?array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz($item, bool $strict = true): bool
    {
        if (null === $this->tz) {
            return false;
        }

        return in_array($item, $this->tz, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTz($item): void
    {
        if ($this->hasTz($item)) {
            return;
        }

        if (null === $this->tz) {
            $this->tz = [];
        }

        $this->tz[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTz($item): void
    {
        if (null === $this->tz) {
            $this->tz = [];
        }

        if ($this->hasTz($item)) {
            $index = array_search($item, $this->tz);
            unset($this->tz[$index]);
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
