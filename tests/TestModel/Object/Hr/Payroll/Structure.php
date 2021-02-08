<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.structure
 * ---
 * Name : hr.payroll.structure
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
final class Structure extends Base
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
     * Type
     * ---
     * Relation : many2one (hr.payroll.structure.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Structure\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $type_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

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
     * Salary Rules
     * ---
     * Relation : one2many (hr.salary.rule -> struct_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Salary\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rule_ids;

    /**
     * Report
     * ---
     * Relation : many2one (ir.actions.report)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Actions\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_id;

    /**
     * Payslip Name
     * ---
     * Name to be set on a payslip. Example: 'End of the year bonus'. If not set, the default value is 'Salary Slip'
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payslip_name;

    /**
     * Unpaid Work Entry Type
     * ---
     * Relation : many2many (hr.work.entry.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $unpaid_work_entry_type_ids;

    /**
     * Use Worked Day Lines
     * ---
     * Worked days won't be computed/displayed in payslips.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_worked_day_lines;

    /**
     * Scheduled Pay
     * ---
     * Defines the frequency of the wage payment.
     * ---
     * Selection :
     *     -> monthly (Monthly)
     *     -> quarterly (Quarterly)
     *     -> semi-annually (Semi-annually)
     *     -> annually (Annually)
     *     -> weekly (Weekly)
     *     -> bi-weekly (Bi-weekly)
     *     -> bi-monthly (Bi-monthly)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $schedule_pay;

    /**
     * Other Input Line
     * ---
     * Relation : many2many (hr.payslip.input.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip\Input\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $input_line_type_ids;

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
     * @param OdooRelation $type_id Type
     *        ---
     *        Relation : many2one (hr.payroll.structure.type)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payroll\Structure\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $type_id)
    {
        $this->name = $name;
        $this->type_id = $type_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInputLineTypeIds(OdooRelation $item): void
    {
        if ($this->hasInputLineTypeIds($item)) {
            return;
        }

        if (null === $this->input_line_type_ids) {
            $this->input_line_type_ids = [];
        }

        $this->input_line_type_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUnpaidWorkEntryTypeIds(OdooRelation $item): void
    {
        if (null === $this->unpaid_work_entry_type_ids) {
            $this->unpaid_work_entry_type_ids = [];
        }

        if ($this->hasUnpaidWorkEntryTypeIds($item)) {
            $index = array_search($item, $this->unpaid_work_entry_type_ids);
            unset($this->unpaid_work_entry_type_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_worked_day_lines")
     */
    public function isUseWorkedDayLines(): ?bool
    {
        return $this->use_worked_day_lines;
    }

    /**
     * @param bool|null $use_worked_day_lines
     */
    public function setUseWorkedDayLines(?bool $use_worked_day_lines): void
    {
        $this->use_worked_day_lines = $use_worked_day_lines;
    }

    /**
     * @return string|null
     *
     * @SerializedName("schedule_pay")
     */
    public function getSchedulePay(): ?string
    {
        return $this->schedule_pay;
    }

    /**
     * @param string|null $schedule_pay
     */
    public function setSchedulePay(?string $schedule_pay): void
    {
        $this->schedule_pay = $schedule_pay;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("input_line_type_ids")
     */
    public function getInputLineTypeIds(): ?array
    {
        return $this->input_line_type_ids;
    }

    /**
     * @param OdooRelation[]|null $input_line_type_ids
     */
    public function setInputLineTypeIds(?array $input_line_type_ids): void
    {
        $this->input_line_type_ids = $input_line_type_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInputLineTypeIds(OdooRelation $item): bool
    {
        if (null === $this->input_line_type_ids) {
            return false;
        }

        return in_array($item, $this->input_line_type_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInputLineTypeIds(OdooRelation $item): void
    {
        if (null === $this->input_line_type_ids) {
            $this->input_line_type_ids = [];
        }

        if ($this->hasInputLineTypeIds($item)) {
            $index = array_search($item, $this->input_line_type_ids);
            unset($this->input_line_type_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUnpaidWorkEntryTypeIds(OdooRelation $item): bool
    {
        if (null === $this->unpaid_work_entry_type_ids) {
            return false;
        }

        return in_array($item, $this->unpaid_work_entry_type_ids);
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
     * @param OdooRelation $item
     */
    public function addUnpaidWorkEntryTypeIds(OdooRelation $item): void
    {
        if ($this->hasUnpaidWorkEntryTypeIds($item)) {
            return;
        }

        if (null === $this->unpaid_work_entry_type_ids) {
            $this->unpaid_work_entry_type_ids = [];
        }

        $this->unpaid_work_entry_type_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $unpaid_work_entry_type_ids
     */
    public function setUnpaidWorkEntryTypeIds(?array $unpaid_work_entry_type_ids): void
    {
        $this->unpaid_work_entry_type_ids = $unpaid_work_entry_type_ids;
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
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
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
     * @return OdooRelation
     *
     * @SerializedName("type_id")
     */
    public function getTypeId(): OdooRelation
    {
        return $this->type_id;
    }

    /**
     * @param OdooRelation $type_id
     */
    public function setTypeId(OdooRelation $type_id): void
    {
        $this->type_id = $type_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("rule_ids")
     */
    public function getRuleIds(): ?array
    {
        return $this->rule_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("unpaid_work_entry_type_ids")
     */
    public function getUnpaidWorkEntryTypeIds(): ?array
    {
        return $this->unpaid_work_entry_type_ids;
    }

    /**
     * @param OdooRelation[]|null $rule_ids
     */
    public function setRuleIds(?array $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRuleIds(OdooRelation $item): bool
    {
        if (null === $this->rule_ids) {
            return false;
        }

        return in_array($item, $this->rule_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRuleIds(OdooRelation $item): void
    {
        if ($this->hasRuleIds($item)) {
            return;
        }

        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        $this->rule_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRuleIds(OdooRelation $item): void
    {
        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        if ($this->hasRuleIds($item)) {
            $index = array_search($item, $this->rule_ids);
            unset($this->rule_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_id")
     */
    public function getReportId(): ?OdooRelation
    {
        return $this->report_id;
    }

    /**
     * @param OdooRelation|null $report_id
     */
    public function setReportId(?OdooRelation $report_id): void
    {
        $this->report_id = $report_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payslip_name")
     */
    public function getPayslipName(): ?string
    {
        return $this->payslip_name;
    }

    /**
     * @param string|null $payslip_name
     */
    public function setPayslipName(?string $payslip_name): void
    {
        $this->payslip_name = $payslip_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.structure';
    }
}
