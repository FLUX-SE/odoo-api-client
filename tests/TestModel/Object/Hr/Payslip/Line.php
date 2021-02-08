<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payslip.line
 * ---
 * Name : hr.payslip.line
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
final class Line extends Base
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
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Sequence
     * ---
     * Use to arrange calculation sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

    /**
     * Code
     * ---
     * The code of salary rules can be used as reference in computation of other rules. In that case, it is case
     * sensitive.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Pay Slip
     * ---
     * Relation : many2one (hr.payslip)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $slip_id;

    /**
     * Rule
     * ---
     * Relation : many2one (hr.salary.rule)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Salary\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $salary_rule_id;

    /**
     * Contract
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_id;

    /**
     * Rate (%)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $rate;

    /**
     * Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $quantity;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $total;

    /**
     * Amount Type
     * ---
     * The computation method for the rule amount.
     * ---
     * Selection :
     *     -> percentage (Percentage (%))
     *     -> fix (Fixed Amount)
     *     -> code (Python Code)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $amount_select;

    /**
     * Fixed Amount
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $amount_fix;

    /**
     * Percentage (%)
     * ---
     * For example, enter 50.0 to apply a percentage of 50%
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $amount_percentage;

    /**
     * Appears on Payslip
     * ---
     * Used to display the salary rule on payslip.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $appears_on_payslip;

    /**
     * Category
     * ---
     * Relation : many2one (hr.salary.rule.category)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Salary\Rule\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $category_id;

    /**
     * Partner
     * ---
     * Eventual third party involved in the salary payment of the employees.
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_from;

    /**
     * To
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
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        ---
     *        Use to arrange calculation sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Code
     *        ---
     *        The code of salary rules can be used as reference in computation of other rules. In that case, it is case
     *        sensitive.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $slip_id Pay Slip
     *        ---
     *        Relation : many2one (hr.payslip)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $salary_rule_id Rule
     *        ---
     *        Relation : many2one (hr.salary.rule)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Salary\Rule
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $contract_id Contract
     *        ---
     *        Relation : many2one (hr.contract)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_id Employee
     *        ---
     *        Relation : many2one (hr.employee)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        int $sequence,
        string $code,
        OdooRelation $slip_id,
        OdooRelation $salary_rule_id,
        OdooRelation $contract_id,
        OdooRelation $employee_id
    ) {
        $this->name = $name;
        $this->sequence = $sequence;
        $this->code = $code;
        $this->slip_id = $slip_id;
        $this->salary_rule_id = $salary_rule_id;
        $this->contract_id = $contract_id;
        $this->employee_id = $employee_id;
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
     * @return float|null
     *
     * @SerializedName("amount_percentage")
     */
    public function getAmountPercentage(): ?float
    {
        return $this->amount_percentage;
    }

    /**
     * @param float|null $amount_percentage
     */
    public function setAmountPercentage(?float $amount_percentage): void
    {
        $this->amount_percentage = $amount_percentage;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("appears_on_payslip")
     */
    public function isAppearsOnPayslip(): ?bool
    {
        return $this->appears_on_payslip;
    }

    /**
     * @param bool|null $appears_on_payslip
     */
    public function setAppearsOnPayslip(?bool $appears_on_payslip): void
    {
        $this->appears_on_payslip = $appears_on_payslip;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @param OdooRelation|null $category_id
     */
    public function setCategoryId(?OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param DateTimeInterface|null $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_fix")
     */
    public function getAmountFix(): ?float
    {
        return $this->amount_fix;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param float|null $amount_fix
     */
    public function setAmountFix(?float $amount_fix): void
    {
        $this->amount_fix = $amount_fix;
    }

    /**
     * @param string|null $amount_select
     */
    public function setAmountSelect(?string $amount_select): void
    {
        $this->amount_select = $amount_select;
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
     * @param OdooRelation $salary_rule_id
     */
    public function setSalaryRuleId(OdooRelation $salary_rule_id): void
    {
        $this->salary_rule_id = $salary_rule_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return int
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("slip_id")
     */
    public function getSlipId(): OdooRelation
    {
        return $this->slip_id;
    }

    /**
     * @param OdooRelation $slip_id
     */
    public function setSlipId(OdooRelation $slip_id): void
    {
        $this->slip_id = $slip_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("salary_rule_id")
     */
    public function getSalaryRuleId(): OdooRelation
    {
        return $this->salary_rule_id;
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
     * @return string|null
     *
     * @SerializedName("amount_select")
     */
    public function getAmountSelect(): ?string
    {
        return $this->amount_select;
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
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @param OdooRelation $employee_id
     */
    public function setEmployeeId(OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("rate")
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param float|null $rate
     */
    public function setRate(?float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount")
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("quantity")
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total")
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payslip.line';
    }
}
