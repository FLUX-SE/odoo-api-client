<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payslip.employees
 * ---
 * Name : hr.payslip.employees
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Employees extends Base
{
    /**
     * Employees
     * ---
     * Relation : many2many (hr.employee)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $employee_ids;

    /**
     * Salary Structure
     * ---
     * Relation : many2one (hr.payroll.structure)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $structure_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation[] $employee_ids Employees
     *        ---
     *        Relation : many2many (hr.employee)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(array $employee_ids)
    {
        $this->employee_ids = $employee_ids;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation[]
     *
     * @SerializedName("employee_ids")
     */
    public function getEmployeeIds(): array
    {
        return $this->employee_ids;
    }

    /**
     * @param OdooRelation|null $structure_id
     */
    public function setStructureId(?OdooRelation $structure_id): void
    {
        $this->structure_id = $structure_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("structure_id")
     */
    public function getStructureId(): ?OdooRelation
    {
        return $this->structure_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEmployeeIds(OdooRelation $item): void
    {
        if ($this->hasEmployeeIds($item)) {
            $index = array_search($item, $this->employee_ids);
            unset($this->employee_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addEmployeeIds(OdooRelation $item): void
    {
        if ($this->hasEmployeeIds($item)) {
            return;
        }

        $this->employee_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEmployeeIds(OdooRelation $item): bool
    {
        return in_array($item, $this->employee_ids);
    }

    /**
     * @param OdooRelation[] $employee_ids
     */
    public function setEmployeeIds(array $employee_ids): void
    {
        $this->employee_ids = $employee_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payslip.employees';
    }
}
