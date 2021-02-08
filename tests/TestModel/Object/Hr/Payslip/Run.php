<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payslip.run
 * ---
 * Name : hr.payslip.run
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
final class Run extends Base
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
     * Payslips
     * ---
     * Relation : one2many (hr.payslip -> payslip_run_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $slip_ids;

    /**
     * Status
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> verify (Verify)
     *     -> close (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Date From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * Date To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_end;

    /**
     * Credit Note
     * ---
     * If its checked, indicates that all payslips generated from here are refund payslips.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $credit_note;

    /**
     * Payslip Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $payslip_count;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
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
     * @param DateTimeInterface $date_start Date From
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_end Date To
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_start,
        DateTimeInterface $date_end,
        OdooRelation $company_id
    ) {
        $this->name = $name;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->company_id = $company_id;
    }

    /**
     * @param bool|null $credit_note
     */
    public function setCreditNote(?bool $credit_note): void
    {
        $this->credit_note = $credit_note;
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param int|null $payslip_count
     */
    public function setPayslipCount(?int $payslip_count): void
    {
        $this->payslip_count = $payslip_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("payslip_count")
     */
    public function getPayslipCount(): ?int
    {
        return $this->payslip_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("credit_note")
     */
    public function isCreditNote(): ?bool
    {
        return $this->credit_note;
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
     * @param DateTimeInterface $date_end
     */
    public function setDateEnd(DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_end")
     */
    public function getDateEnd(): DateTimeInterface
    {
        return $this->date_end;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param OdooRelation $item
     */
    public function removeSlipIds(OdooRelation $item): void
    {
        if (null === $this->slip_ids) {
            $this->slip_ids = [];
        }

        if ($this->hasSlipIds($item)) {
            $index = array_search($item, $this->slip_ids);
            unset($this->slip_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSlipIds(OdooRelation $item): void
    {
        if ($this->hasSlipIds($item)) {
            return;
        }

        if (null === $this->slip_ids) {
            $this->slip_ids = [];
        }

        $this->slip_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSlipIds(OdooRelation $item): bool
    {
        if (null === $this->slip_ids) {
            return false;
        }

        return in_array($item, $this->slip_ids);
    }

    /**
     * @param OdooRelation[]|null $slip_ids
     */
    public function setSlipIds(?array $slip_ids): void
    {
        $this->slip_ids = $slip_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("slip_ids")
     */
    public function getSlipIds(): ?array
    {
        return $this->slip_ids;
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
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payslip.run';
    }
}
