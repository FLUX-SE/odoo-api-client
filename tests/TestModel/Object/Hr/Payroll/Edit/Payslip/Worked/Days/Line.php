<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Worked\Days;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.edit.payslip.worked.days.line
 * ---
 * Name : hr.payroll.edit.payslip.worked.days.line
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
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * PaySlip
     * ---
     * Relation : many2one (hr.payslip)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $slip_id;

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
     * Code
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

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
     * Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Edit Payslip Lines Wizard
     * ---
     * Relation : many2one (hr.payroll.edit.payslip.lines.wizard)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Lines\Wizard
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
     * @param OdooRelation $edit_payslip_lines_wizard_id Edit Payslip Lines Wizard
     *        ---
     *        Relation : many2one (hr.payroll.edit.payslip.lines.wizard)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Lines\Wizard
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $edit_payslip_lines_wizard_id)
    {
        $this->edit_payslip_lines_wizard_id = $edit_payslip_lines_wizard_id;
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
     * @param OdooRelation $edit_payslip_lines_wizard_id
     */
    public function setEditPayslipLinesWizardId(OdooRelation $edit_payslip_lines_wizard_id): void
    {
        $this->edit_payslip_lines_wizard_id = $edit_payslip_lines_wizard_id;
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
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param float|null $number_of_hours
     */
    public function setNumberOfHours(?float $number_of_hours): void
    {
        $this->number_of_hours = $number_of_hours;
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
     * @return float|null
     *
     * @SerializedName("number_of_hours")
     */
    public function getNumberOfHours(): ?float
    {
        return $this->number_of_hours;
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
     * @SerializedName("number_of_days")
     */
    public function getNumberOfDays(): ?float
    {
        return $this->number_of_days;
    }

    /**
     * @param OdooRelation|null $work_entry_type_id
     */
    public function setWorkEntryTypeId(?OdooRelation $work_entry_type_id): void
    {
        $this->work_entry_type_id = $work_entry_type_id;
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
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
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
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @param OdooRelation|null $slip_id
     */
    public function setSlipId(?OdooRelation $slip_id): void
    {
        $this->slip_id = $slip_id;
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
        return 'hr.payroll.edit.payslip.worked.days.line';
    }
}
