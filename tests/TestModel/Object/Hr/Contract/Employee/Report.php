<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract\Employee;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.contract.employee.report
 * ---
 * Name : hr.contract.employee.report
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
final class Report extends Base
{
    /**
     * Contract
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $contract_id;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $employee_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Department
     * ---
     * Relation : many2one (hr.department)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Department
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $department_id;

    /**
     * # Departure Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_employee_exit;

    /**
     * # New Employees
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_new_employee;

    /**
     * Duration Contract
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $age_sum;

    /**
     * Wage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $wage;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Months of first date of this month since 01/01/1970
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $start_date_months;

    /**
     * Months of last date of this month since 01/01/1970
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $end_date_months;

    /**
     * Date Last Contract Ended
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_end_contract;

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
     * @return OdooRelation|null
     *
     * @SerializedName("contract_id")
     */
    public function getContractId(): ?OdooRelation
    {
        return $this->contract_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("wage")
     */
    public function getWage(): ?float
    {
        return $this->wage;
    }

    /**
     * @param string|null $departure_reason
     */
    public function setDepartureReason(?string $departure_reason): void
    {
        $this->departure_reason = $departure_reason;
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
     * @param DateTimeInterface|null $date_end_contract
     */
    public function setDateEndContract(?DateTimeInterface $date_end_contract): void
    {
        $this->date_end_contract = $date_end_contract;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_end_contract")
     */
    public function getDateEndContract(): ?DateTimeInterface
    {
        return $this->date_end_contract;
    }

    /**
     * @param int|null $end_date_months
     */
    public function setEndDateMonths(?int $end_date_months): void
    {
        $this->end_date_months = $end_date_months;
    }

    /**
     * @return int|null
     *
     * @SerializedName("end_date_months")
     */
    public function getEndDateMonths(): ?int
    {
        return $this->end_date_months;
    }

    /**
     * @param int|null $start_date_months
     */
    public function setStartDateMonths(?int $start_date_months): void
    {
        $this->start_date_months = $start_date_months;
    }

    /**
     * @return int|null
     *
     * @SerializedName("start_date_months")
     */
    public function getStartDateMonths(): ?int
    {
        return $this->start_date_months;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param float|null $wage
     */
    public function setWage(?float $wage): void
    {
        $this->wage = $wage;
    }

    /**
     * @param float|null $age_sum
     */
    public function setAgeSum(?float $age_sum): void
    {
        $this->age_sum = $age_sum;
    }

    /**
     * @param OdooRelation|null $contract_id
     */
    public function setContractId(?OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("age_sum")
     */
    public function getAgeSum(): ?float
    {
        return $this->age_sum;
    }

    /**
     * @param int|null $count_new_employee
     */
    public function setCountNewEmployee(?int $count_new_employee): void
    {
        $this->count_new_employee = $count_new_employee;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_new_employee")
     */
    public function getCountNewEmployee(): ?int
    {
        return $this->count_new_employee;
    }

    /**
     * @param int|null $count_employee_exit
     */
    public function setCountEmployeeExit(?int $count_employee_exit): void
    {
        $this->count_employee_exit = $count_employee_exit;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_employee_exit")
     */
    public function getCountEmployeeExit(): ?int
    {
        return $this->count_employee_exit;
    }

    /**
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
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
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): ?OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.contract.employee.report';
    }
}
