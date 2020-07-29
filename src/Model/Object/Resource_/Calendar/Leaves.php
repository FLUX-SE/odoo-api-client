<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : resource.calendar.leaves
 * ---
 * Name : resource.calendar.leaves
 * ---
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
final class Leaves extends Base
{
    /**
     * Reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Working Hours
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $calendar_id;

    /**
     * Start Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Resource
     * ---
     * If empty, this is a generic time off for the company. If a resource is set, the time off is only for this
     * resource
     * ---
     * Relation : many2one (resource.resource)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Resource_
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_id;

    /**
     * Time Type
     * ---
     * Whether this should be computed as a time off or as work time (eg: formation)
     * ---
     * Selection : (default value, usually null)
     *     -> leave (Time Off)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $time_type;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param DateTimeInterface $date_from Start Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_to End Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $date_from, DateTimeInterface $date_to)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    /**
     * @return string|null
     *
     * @SerializedName("time_type")
     */
    public function getTimeType(): ?string
    {
        return $this->time_type;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $time_type
     */
    public function setTimeType(?string $time_type): void
    {
        $this->time_type = $time_type;
    }

    /**
     * @param OdooRelation|null $resource_id
     */
    public function setResourceId(?OdooRelation $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("resource_id")
     */
    public function getResourceId(): ?OdooRelation
    {
        return $this->resource_id;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_to")
     */
    public function getDateTo(): DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_from")
     */
    public function getDateFrom(): DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @param OdooRelation|null $calendar_id
     */
    public function setCalendarId(?OdooRelation $calendar_id): void
    {
        $this->calendar_id = $calendar_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("calendar_id")
     */
    public function getCalendarId(): ?OdooRelation
    {
        return $this->calendar_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'resource.calendar.leaves';
    }
}
