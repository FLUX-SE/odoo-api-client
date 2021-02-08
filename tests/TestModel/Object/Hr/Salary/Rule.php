<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Salary;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.salary.rule
 * ---
 * Name : hr.salary.rule
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
final class Rule extends Base
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
     * Salary Structure
     * ---
     * Relation : many2one (hr.payroll.structure)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $struct_id;

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
     * Quantity
     * ---
     * It is used in computation for percentage and fixed amount. E.g. a rule for Meal Voucher having fixed amount of
     * 1€ per worked day can have its quantity defined in expression like worked_days.WORK100.number_of_days.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $quantity;

    /**
     * Category
     * ---
     * Relation : many2one (hr.salary.rule.category)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Salary\Rule\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $category_id;

    /**
     * Active
     * ---
     * If the active field is set to false, it will allow you to hide the salary rule without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Appears on Payslip
     * ---
     * Used to display the salary rule on payslip.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $appears_on_payslip;

    /**
     * Condition Based on
     * ---
     * Selection :
     *     -> none (Always True)
     *     -> range (Range)
     *     -> python (Python Expression)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $condition_select;

    /**
     * Range Based on
     * ---
     * This will be used to compute the % fields values; in general it is on basic, but you can also use categories
     * code fields in lowercase as a variable names (hra, ma, lta, etc.) and the variable basic.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $condition_range;

    /**
     * Python Condition
     * ---
     * Applied this rule for calculation if condition is true. You can specify condition like basic > 1000.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $condition_python;

    /**
     * Minimum Range
     * ---
     * The minimum amount, applied for this rule.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $condition_range_min;

    /**
     * Maximum Range
     * ---
     * The maximum amount, applied for this rule.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $condition_range_max;

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
     * Sortable : yes
     *
     * @var string
     */
    private $amount_select;

    /**
     * Fixed Amount
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_percentage;

    /**
     * Python Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $amount_python_compute;

    /**
     * Percentage based on
     * ---
     * result will be affected to a variable
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $amount_percentage_base;

    /**
     * Partner
     * ---
     * Eventual third party involved in the salary payment of the employees.
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

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
     * @param string $code Code
     *        ---
     *        The code of salary rules can be used as reference in computation of other rules. In that case, it is case
     *        sensitive.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $struct_id Salary Structure
     *        ---
     *        Relation : many2one (hr.payroll.structure)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        ---
     *        Use to arrange calculation sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $category_id Category
     *        ---
     *        Relation : many2one (hr.salary.rule.category)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Salary\Rule\Category
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $condition_select Condition Based on
     *        ---
     *        Selection :
     *            -> none (Always True)
     *            -> range (Range)
     *            -> python (Python Expression)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $condition_python Python Condition
     *        ---
     *        Applied this rule for calculation if condition is true. You can specify condition like basic > 1000.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $amount_select Amount Type
     *        ---
     *        The computation method for the rule amount.
     *        ---
     *        Selection :
     *            -> percentage (Percentage (%))
     *            -> fix (Fixed Amount)
     *            -> code (Python Code)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $code,
        OdooRelation $struct_id,
        int $sequence,
        OdooRelation $category_id,
        string $condition_select,
        string $condition_python,
        string $amount_select
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->struct_id = $struct_id;
        $this->sequence = $sequence;
        $this->category_id = $category_id;
        $this->condition_select = $condition_select;
        $this->condition_python = $condition_python;
        $this->amount_select = $amount_select;
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
     * @param string $amount_select
     */
    public function setAmountSelect(string $amount_select): void
    {
        $this->amount_select = $amount_select;
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
     * @param float|null $amount_fix
     */
    public function setAmountFix(?float $amount_fix): void
    {
        $this->amount_fix = $amount_fix;
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
     * @return string|null
     *
     * @SerializedName("amount_python_compute")
     */
    public function getAmountPythonCompute(): ?string
    {
        return $this->amount_python_compute;
    }

    /**
     * @param string|null $amount_python_compute
     */
    public function setAmountPythonCompute(?string $amount_python_compute): void
    {
        $this->amount_python_compute = $amount_python_compute;
    }

    /**
     * @return string|null
     *
     * @SerializedName("amount_percentage_base")
     */
    public function getAmountPercentageBase(): ?string
    {
        return $this->amount_percentage_base;
    }

    /**
     * @param string|null $amount_percentage_base
     */
    public function setAmountPercentageBase(?string $amount_percentage_base): void
    {
        $this->amount_percentage_base = $amount_percentage_base;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param float|null $condition_range_max
     */
    public function setConditionRangeMax(?float $condition_range_max): void
    {
        $this->condition_range_max = $condition_range_max;
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
     * @return string
     *
     * @SerializedName("amount_select")
     */
    public function getAmountSelect(): string
    {
        return $this->amount_select;
    }

    /**
     * @return float|null
     *
     * @SerializedName("condition_range_max")
     */
    public function getConditionRangeMax(): ?float
    {
        return $this->condition_range_max;
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
     * @param OdooRelation $category_id
     */
    public function setCategoryId(OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @SerializedName("struct_id")
     */
    public function getStructId(): OdooRelation
    {
        return $this->struct_id;
    }

    /**
     * @param OdooRelation $struct_id
     */
    public function setStructId(OdooRelation $struct_id): void
    {
        $this->struct_id = $struct_id;
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
     * @return string|null
     *
     * @SerializedName("quantity")
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param string|null $quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): OdooRelation
    {
        return $this->category_id;
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
     * @param float|null $condition_range_min
     */
    public function setConditionRangeMin(?float $condition_range_min): void
    {
        $this->condition_range_min = $condition_range_min;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
     * @return string
     *
     * @SerializedName("condition_select")
     */
    public function getConditionSelect(): string
    {
        return $this->condition_select;
    }

    /**
     * @param string $condition_select
     */
    public function setConditionSelect(string $condition_select): void
    {
        $this->condition_select = $condition_select;
    }

    /**
     * @return string|null
     *
     * @SerializedName("condition_range")
     */
    public function getConditionRange(): ?string
    {
        return $this->condition_range;
    }

    /**
     * @param string|null $condition_range
     */
    public function setConditionRange(?string $condition_range): void
    {
        $this->condition_range = $condition_range;
    }

    /**
     * @return string
     *
     * @SerializedName("condition_python")
     */
    public function getConditionPython(): string
    {
        return $this->condition_python;
    }

    /**
     * @param string $condition_python
     */
    public function setConditionPython(string $condition_python): void
    {
        $this->condition_python = $condition_python;
    }

    /**
     * @return float|null
     *
     * @SerializedName("condition_range_min")
     */
    public function getConditionRangeMin(): ?float
    {
        return $this->condition_range_min;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.salary.rule';
    }
}
