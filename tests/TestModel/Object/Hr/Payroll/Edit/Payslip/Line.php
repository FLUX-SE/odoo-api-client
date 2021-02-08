<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.edit.payslip.line
 * ---
 * Name : hr.payroll.edit.payslip.line
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Line extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
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
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Rule
     * ---
     * Relation : many2one (hr.salary.rule)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Salary\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $salary_rule_id;

    /**
     * Code
     * ---
     * The code of salary rules can be used as reference in computation of other rules. In that case, it is case
     * sensitive.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

    /**
     * Contract
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : no
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
     * Sortable : no
     *
     * @var OdooRelation|null
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
     * Pay Slip
     * ---
     * Relation : many2one (hr.payslip)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $slip_id;

    /**
     * Structure
     * ---
     * Defines the rules that have to be applied to this payslip, according to the contract chosen. If the contract
     * is empty, this field isn't mandatory anymore and all the valid rules of the structures of the employee's
     * contracts will be applied.
     * ---
     * Relation : many2one (hr.payroll.structure)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $struct_id;

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
     * Edit Payslip Lines Wizard
     * ---
     * Relation : many2one (hr.payroll.edit.payslip.lines.wizard)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Lines\Wizard
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $edit_payslip_lines_wizard_id;

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
     * @param OdooRelation $edit_payslip_lines_wizard_id Edit Payslip Lines Wizard
     *        ---
     *        Relation : many2one (hr.payroll.edit.payslip.lines.wizard)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Lines\Wizard
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $edit_payslip_lines_wizard_id)
    {
        $this->edit_payslip_lines_wizard_id = $edit_payslip_lines_wizard_id;
    }

    /**
     * @param OdooRelation $edit_payslip_lines_wizard_id
     */
    public function setEditPayslipLinesWizardId(OdooRelation $edit_payslip_lines_wizard_id): void
    {
        $this->edit_payslip_lines_wizard_id = $edit_payslip_lines_wizard_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("slip_id")
     */
    public function getSlipId(): ?OdooRelation
    {
        return $this->slip_id;
    }

    /**
     * @param OdooRelation|null $slip_id
     */
    public function setSlipId(?OdooRelation $slip_id): void
    {
        $this->slip_id = $slip_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("struct_id")
     */
    public function getStructId(): ?OdooRelation
    {
        return $this->struct_id;
    }

    /**
     * @param OdooRelation|null $struct_id
     */
    public function setStructId(?OdooRelation $struct_id): void
    {
        $this->struct_id = $struct_id;
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
     * @return OdooRelation
     *
     * @SerializedName("edit_payslip_lines_wizard_id")
     */
    public function getEditPayslipLinesWizardId(): OdooRelation
    {
        return $this->edit_payslip_lines_wizard_id;
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
     * @return float|null
     *
     * @SerializedName("total")
     */
    public function getTotal(): ?float
    {
        return $this->total;
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
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
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
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("salary_rule_id")
     */
    public function getSalaryRuleId(): ?OdooRelation
    {
        return $this->salary_rule_id;
    }

    /**
     * @param OdooRelation|null $salary_rule_id
     */
    public function setSalaryRuleId(?OdooRelation $salary_rule_id): void
    {
        $this->salary_rule_id = $salary_rule_id;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
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
     * @return OdooRelation|null
     *
     * @SerializedName("contract_id")
     */
    public function getContractId(): ?OdooRelation
    {
        return $this->contract_id;
    }

    /**
     * @param OdooRelation|null $contract_id
     */
    public function setContractId(?OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
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
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.edit.payslip.line';
    }
}
