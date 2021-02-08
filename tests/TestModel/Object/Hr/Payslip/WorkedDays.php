<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payslip.worked_days
 * ---
 * Name : hr.payslip.worked_days
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
final class WorkedDays extends Base
{
    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

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
    private $payslip_id;

    /**
     * Sequence
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
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

    /**
     * Type
     * ---
     * The code that can be used in the salary rules
     * ---
     * Relation : many2one (hr.work.entry.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
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
     * Is Paid
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_paid;

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
     * Contract
     * ---
     * The contract for which apply this worked days
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
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * @param OdooRelation $payslip_id Pay Slip
     *        ---
     *        Relation : many2one (hr.payslip)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $work_entry_type_id Type
     *        ---
     *        The code that can be used in the salary rules
     *        ---
     *        Relation : many2one (hr.work.entry.type)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $payslip_id, int $sequence, OdooRelation $work_entry_type_id)
    {
        $this->payslip_id = $payslip_id;
        $this->sequence = $sequence;
        $this->work_entry_type_id = $work_entry_type_id;
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
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
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
     * @SerializedName("contract_id")
     */
    public function getContractId(): ?OdooRelation
    {
        return $this->contract_id;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param bool|null $is_paid
     */
    public function setIsPaid(?bool $is_paid): void
    {
        $this->is_paid = $is_paid;
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
     * @return bool|null
     *
     * @SerializedName("is_paid")
     */
    public function isIsPaid(): ?bool
    {
        return $this->is_paid;
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
     * @param OdooRelation $work_entry_type_id
     */
    public function setWorkEntryTypeId(OdooRelation $work_entry_type_id): void
    {
        $this->work_entry_type_id = $work_entry_type_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("work_entry_type_id")
     */
    public function getWorkEntryTypeId(): OdooRelation
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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @param OdooRelation $payslip_id
     */
    public function setPayslipId(OdooRelation $payslip_id): void
    {
        $this->payslip_id = $payslip_id;
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
        return 'hr.payslip.worked_days';
    }
}
