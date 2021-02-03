<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Departure;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.departure.wizard
 * ---
 * Name : hr.departure.wizard
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Departure Reason
     * ---
     * Selection :
     *     -> fired (Fired)
     *     -> resigned (Resigned)
     *     -> retired (Retired)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $departure_reason;

    /**
     * Additional Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $departure_description;

    /**
     * Departure Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $departure_date;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_id;

    /**
     * Archive Private Address
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $archive_private_address;

    /**
     * Set Contract End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $set_date_end;

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
     * @param DateTimeInterface $departure_date Departure Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_id Employee
     *        ---
     *        Relation : many2one (hr.employee)
     *        @see \Flux\OdooApiClient\Model\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $departure_date, OdooRelation $employee_id)
    {
        $this->departure_date = $departure_date;
        $this->employee_id = $employee_id;
    }

    /**
     * @param bool|null $set_date_end
     */
    public function setSetDateEnd(?bool $set_date_end): void
    {
        $this->set_date_end = $set_date_end;
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
     * @return bool|null
     *
     * @SerializedName("set_date_end")
     */
    public function isSetDateEnd(): ?bool
    {
        return $this->set_date_end;
    }

    /**
     * @return string|null
     *
     * @SerializedName("departure_reason")
     */
    public function getDepartureReason(): ?string
    {
        return $this->departure_reason;
    }

    /**
     * @param bool|null $archive_private_address
     */
    public function setArchivePrivateAddress(?bool $archive_private_address): void
    {
        $this->archive_private_address = $archive_private_address;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("archive_private_address")
     */
    public function isArchivePrivateAddress(): ?bool
    {
        return $this->archive_private_address;
    }

    /**
     * @param OdooRelation $employee_id
     */
    public function setEmployeeId(OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @param DateTimeInterface $departure_date
     */
    public function setDepartureDate(DateTimeInterface $departure_date): void
    {
        $this->departure_date = $departure_date;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("departure_date")
     */
    public function getDepartureDate(): DateTimeInterface
    {
        return $this->departure_date;
    }

    /**
     * @param string|null $departure_description
     */
    public function setDepartureDescription(?string $departure_description): void
    {
        $this->departure_description = $departure_description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("departure_description")
     */
    public function getDepartureDescription(): ?string
    {
        return $this->departure_description;
    }

    /**
     * @param string|null $departure_reason
     */
    public function setDepartureReason(?string $departure_reason): void
    {
        $this->departure_reason = $departure_reason;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.departure.wizard';
    }
}
