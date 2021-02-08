<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Lines;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.edit.payslip.lines.wizard
 * ---
 * Name : hr.payroll.edit.payslip.lines.wizard
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
     * Payslip
     * ---
     * Relation : many2one (hr.payslip)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payslip_id;

    /**
     * Payslip Lines
     * ---
     * Relation : one2many (hr.payroll.edit.payslip.line -> edit_payslip_lines_wizard_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Worked Days Lines
     * ---
     * Relation : one2many (hr.payroll.edit.payslip.worked.days.line -> edit_payslip_lines_wizard_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Edit\Payslip\Worked\Days\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $worked_days_line_ids;

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
     * @param OdooRelation $payslip_id Payslip
     *        ---
     *        Relation : many2one (hr.payslip)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payslip
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $payslip_id)
    {
        $this->payslip_id = $payslip_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWorkedDaysLineIds(OdooRelation $item): void
    {
        if (null === $this->worked_days_line_ids) {
            $this->worked_days_line_ids = [];
        }

        if ($this->hasWorkedDaysLineIds($item)) {
            $index = array_search($item, $this->worked_days_line_ids);
            unset($this->worked_days_line_ids[$index]);
        }
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
     * @param OdooRelation $item
     */
    public function addWorkedDaysLineIds(OdooRelation $item): void
    {
        if ($this->hasWorkedDaysLineIds($item)) {
            return;
        }

        if (null === $this->worked_days_line_ids) {
            $this->worked_days_line_ids = [];
        }

        $this->worked_days_line_ids[] = $item;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("payslip_id")
     */
    public function getPayslipId(): OdooRelation
    {
        return $this->payslip_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWorkedDaysLineIds(OdooRelation $item): bool
    {
        if (null === $this->worked_days_line_ids) {
            return false;
        }

        return in_array($item, $this->worked_days_line_ids);
    }

    /**
     * @param OdooRelation[]|null $worked_days_line_ids
     */
    public function setWorkedDaysLineIds(?array $worked_days_line_ids): void
    {
        $this->worked_days_line_ids = $worked_days_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("worked_days_line_ids")
     */
    public function getWorkedDaysLineIds(): ?array
    {
        return $this->worked_days_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation $payslip_id
     */
    public function setPayslipId(OdooRelation $payslip_id): void
    {
        $this->payslip_id = $payslip_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.edit.payslip.lines.wizard';
    }
}
