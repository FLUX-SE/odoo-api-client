<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.work.entry
 * ---
 * Name : hr.work.entry
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
final class Entry extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_stop;

    /**
     * Period
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $duration;

    /**
     * Work Entry Type
     * ---
     * Relation : many2one (hr.work.entry.type)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $work_entry_type_id;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $color;

    /**
     * State
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> validated (Validated)
     *     -> conflict (Conflict)
     *     -> cancelled (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Conflicts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $conflict;

    /**
     * Contract
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $contract_id;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_start From
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $contract_id Contract
     *        ---
     *        Relation : many2one (hr.contract)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Contract
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_id Employee
     *        ---
     *        Relation : many2one (hr.employee)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_start,
        OdooRelation $company_id,
        OdooRelation $contract_id,
        OdooRelation $employee_id
    ) {
        $this->name = $name;
        $this->date_start = $date_start;
        $this->company_id = $company_id;
        $this->contract_id = $contract_id;
        $this->employee_id = $employee_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param OdooRelation $contract_id
     */
    public function setContractId(OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("contract_id")
     */
    public function getContractId(): OdooRelation
    {
        return $this->contract_id;
    }

    /**
     * @param bool|null $conflict
     */
    public function setConflict(?bool $conflict): void
    {
        $this->conflict = $conflict;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("conflict")
     */
    public function isConflict(): ?bool
    {
        return $this->conflict;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param DateTimeInterface|null $date_stop
     */
    public function setDateStop(?DateTimeInterface $date_stop): void
    {
        $this->date_stop = $date_stop;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_start")
     */
    public function getDateStart(): DateTimeInterface
    {
        return $this->date_start;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_stop")
     */
    public function getDateStop(): ?DateTimeInterface
    {
        return $this->date_stop;
    }

    /**
     * @return float|null
     *
     * @SerializedName("duration")
     */
    public function getDuration(): ?float
    {
        return $this->duration;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param float|null $duration
     */
    public function setDuration(?float $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("work_entry_type_id")
     */
    public function getWorkEntryTypeId(): ?OdooRelation
    {
        return $this->work_entry_type_id;
    }

    /**
     * @param OdooRelation|null $work_entry_type_id
     */
    public function setWorkEntryTypeId(?OdooRelation $work_entry_type_id): void
    {
        $this->work_entry_type_id = $work_entry_type_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.work.entry';
    }
}
