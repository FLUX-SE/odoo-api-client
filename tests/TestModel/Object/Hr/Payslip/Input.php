<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payslip.input
 * ---
 * Name : hr.payslip.input
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
final class Input extends Base
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
     * Description
     * ---
     * Relation : many2one (hr.payslip.input.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip\Input\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $input_type_id;

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
    private $_allowed_input_type_ids;

    /**
     * Code
     * ---
     * The code that can be used in the salary rules
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $code;

    /**
     * Amount
     * ---
     * It is used in computation. E.g. a rule for salesmen having 1%% commission of basic salary per product can
     * defined in expression like: result = inputs.SALEURO.amount * contract.wage * 0.01.
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
     * The contract for which apply this input
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $contract_id;

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
     * @param OdooRelation $input_type_id Description
     *        ---
     *        Relation : many2one (hr.payslip.input.type)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip\Input\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Code
     *        ---
     *        The code that can be used in the salary rules
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $contract_id Contract
     *        ---
     *        The contract for which apply this input
     *        ---
     *        Relation : many2one (hr.contract)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $payslip_id,
        int $sequence,
        OdooRelation $input_type_id,
        string $code,
        OdooRelation $contract_id
    ) {
        $this->payslip_id = $payslip_id;
        $this->sequence = $sequence;
        $this->input_type_id = $input_type_id;
        $this->code = $code;
        $this->contract_id = $contract_id;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
     * @param OdooRelation $contract_id
     */
    public function setContractId(OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
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
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
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
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
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
     * @param OdooRelation $item
     */
    public function removeAllowedInputTypeIds(OdooRelation $item): void
    {
        if (null === $this->_allowed_input_type_ids) {
            $this->_allowed_input_type_ids = [];
        }

        if ($this->hasAllowedInputTypeIds($item)) {
            $index = array_search($item, $this->_allowed_input_type_ids);
            unset($this->_allowed_input_type_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addAllowedInputTypeIds(OdooRelation $item): void
    {
        if ($this->hasAllowedInputTypeIds($item)) {
            return;
        }

        if (null === $this->_allowed_input_type_ids) {
            $this->_allowed_input_type_ids = [];
        }

        $this->_allowed_input_type_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAllowedInputTypeIds(OdooRelation $item): bool
    {
        if (null === $this->_allowed_input_type_ids) {
            return false;
        }

        return in_array($item, $this->_allowed_input_type_ids);
    }

    /**
     * @param OdooRelation[]|null $_allowed_input_type_ids
     */
    public function setAllowedInputTypeIds(?array $_allowed_input_type_ids): void
    {
        $this->_allowed_input_type_ids = $_allowed_input_type_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("_allowed_input_type_ids")
     */
    public function getAllowedInputTypeIds(): ?array
    {
        return $this->_allowed_input_type_ids;
    }

    /**
     * @param OdooRelation $input_type_id
     */
    public function setInputTypeId(OdooRelation $input_type_id): void
    {
        $this->input_type_id = $input_type_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("input_type_id")
     */
    public function getInputTypeId(): OdooRelation
    {
        return $this->input_type_id;
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
        return 'hr.payslip.input';
    }
}
