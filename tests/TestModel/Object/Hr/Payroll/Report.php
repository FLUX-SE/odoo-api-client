<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.report
 * ---
 * Name : hr.payroll.report
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
     * # Payslip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count;

    /**
     * Work Days
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_work;

    /**
     * Work Hours
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_work_hours;

    /**
     * Days of Paid Time Off
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_leave;

    /**
     * Days of Unpaid Time Off
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_leave_unpaid;

    /**
     * Days of Unforeseen Absence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count_unforeseen_absence;

    /**
     * Payslip Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Start Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_from;

    /**
     * End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_to;

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
     * Job Position
     * ---
     * Relation : many2one (hr.job)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Job
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $job_id;

    /**
     * Number of Days
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $number_of_days;

    /**
     * Number of Hours
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $number_of_hours;

    /**
     * Net Wage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $net_wage;

    /**
     * Basic Wage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $basic_wage;

    /**
     * Gross Wage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $gross_wage;

    /**
     * Basic Wage for Time Off
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $leave_basic_wage;

    /**
     * Work type
     * ---
     * Relation : many2one (hr.work.entry.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $work_code;

    /**
     * Work, (un)paid Time Off
     * ---
     * Selection :
     *     -> 1 (Regular Working Day)
     *     -> 2 (Paid Time Off)
     *     -> 3 (Unpaid Time Off)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_type;

    /**
     * @return int|null
     *
     * @SerializedName("count")
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @return float|null
     *
     * @SerializedName("basic_wage")
     */
    public function getBasicWage(): ?float
    {
        return $this->basic_wage;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("job_id")
     */
    public function getJobId(): ?OdooRelation
    {
        return $this->job_id;
    }

    /**
     * @param OdooRelation|null $job_id
     */
    public function setJobId(?OdooRelation $job_id): void
    {
        $this->job_id = $job_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("number_of_days")
     */
    public function getNumberOfDays(): ?float
    {
        return $this->number_of_days;
    }

    /**
     * @param float|null $number_of_days
     */
    public function setNumberOfDays(?float $number_of_days): void
    {
        $this->number_of_days = $number_of_days;
    }

    /**
     * @return float|null
     *
     * @SerializedName("number_of_hours")
     */
    public function getNumberOfHours(): ?float
    {
        return $this->number_of_hours;
    }

    /**
     * @param float|null $number_of_hours
     */
    public function setNumberOfHours(?float $number_of_hours): void
    {
        $this->number_of_hours = $number_of_hours;
    }

    /**
     * @return float|null
     *
     * @SerializedName("net_wage")
     */
    public function getNetWage(): ?float
    {
        return $this->net_wage;
    }

    /**
     * @param float|null $net_wage
     */
    public function setNetWage(?float $net_wage): void
    {
        $this->net_wage = $net_wage;
    }

    /**
     * @param float|null $basic_wage
     */
    public function setBasicWage(?float $basic_wage): void
    {
        $this->basic_wage = $basic_wage;
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
     * @return float|null
     *
     * @SerializedName("gross_wage")
     */
    public function getGrossWage(): ?float
    {
        return $this->gross_wage;
    }

    /**
     * @param float|null $gross_wage
     */
    public function setGrossWage(?float $gross_wage): void
    {
        $this->gross_wage = $gross_wage;
    }

    /**
     * @return float|null
     *
     * @SerializedName("leave_basic_wage")
     */
    public function getLeaveBasicWage(): ?float
    {
        return $this->leave_basic_wage;
    }

    /**
     * @param float|null $leave_basic_wage
     */
    public function setLeaveBasicWage(?float $leave_basic_wage): void
    {
        $this->leave_basic_wage = $leave_basic_wage;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("work_code")
     */
    public function getWorkCode(): ?OdooRelation
    {
        return $this->work_code;
    }

    /**
     * @param OdooRelation|null $work_code
     */
    public function setWorkCode(?OdooRelation $work_code): void
    {
        $this->work_code = $work_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_type")
     */
    public function getWorkType(): ?string
    {
        return $this->work_type;
    }

    /**
     * @param string|null $work_type
     */
    public function setWorkType(?string $work_type): void
    {
        $this->work_type = $work_type;
    }

    /**
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @param int|null $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_unforeseen_absence")
     */
    public function getCountUnforeseenAbsence(): ?int
    {
        return $this->count_unforeseen_absence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_work")
     */
    public function getCountWork(): ?int
    {
        return $this->count_work;
    }

    /**
     * @param int|null $count_work
     */
    public function setCountWork(?int $count_work): void
    {
        $this->count_work = $count_work;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_work_hours")
     */
    public function getCountWorkHours(): ?int
    {
        return $this->count_work_hours;
    }

    /**
     * @param int|null $count_work_hours
     */
    public function setCountWorkHours(?int $count_work_hours): void
    {
        $this->count_work_hours = $count_work_hours;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_leave")
     */
    public function getCountLeave(): ?int
    {
        return $this->count_leave;
    }

    /**
     * @param int|null $count_leave
     */
    public function setCountLeave(?int $count_leave): void
    {
        $this->count_leave = $count_leave;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_leave_unpaid")
     */
    public function getCountLeaveUnpaid(): ?int
    {
        return $this->count_leave_unpaid;
    }

    /**
     * @param int|null $count_leave_unpaid
     */
    public function setCountLeaveUnpaid(?int $count_leave_unpaid): void
    {
        $this->count_leave_unpaid = $count_leave_unpaid;
    }

    /**
     * @param int|null $count_unforeseen_absence
     */
    public function setCountUnforeseenAbsence(?int $count_unforeseen_absence): void
    {
        $this->count_unforeseen_absence = $count_unforeseen_absence;
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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_from")
     */
    public function getDateFrom(): ?DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @param DateTimeInterface|null $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_to")
     */
    public function getDateTo(): ?DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface|null $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.report';
    }
}
