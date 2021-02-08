<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Bank\Statement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.bank.statement.cashbox
 * ---
 * Name : account.bank.statement.cashbox
 * ---
 * Info :
 * Account Bank Statement popup that allows entering cash details.
 */
final class Cashbox extends Base
{
    /**
     * Cashbox Lines
     * ---
     * Relation : one2many (account.cashbox.line -> cashbox_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Cashbox\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $cashbox_lines_ids;

    /**
     * Start Bank Stmt
     * ---
     * Relation : one2many (account.bank.statement -> cashbox_start_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $start_bank_stmt_ids;

    /**
     * End Bank Stmt
     * ---
     * Relation : one2many (account.bank.statement -> cashbox_end_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $end_bank_stmt_ids;

    /**
     * Total
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * @return OdooRelation[]|null
     *
     * @SerializedName("cashbox_lines_ids")
     */
    public function getCashboxLinesIds(): ?array
    {
        return $this->cashbox_lines_ids;
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
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEndBankStmtIds(OdooRelation $item): void
    {
        if (null === $this->end_bank_stmt_ids) {
            $this->end_bank_stmt_ids = [];
        }

        if ($this->hasEndBankStmtIds($item)) {
            $index = array_search($item, $this->end_bank_stmt_ids);
            unset($this->end_bank_stmt_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $cashbox_lines_ids
     */
    public function setCashboxLinesIds(?array $cashbox_lines_ids): void
    {
        $this->cashbox_lines_ids = $cashbox_lines_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addEndBankStmtIds(OdooRelation $item): void
    {
        if ($this->hasEndBankStmtIds($item)) {
            return;
        }

        if (null === $this->end_bank_stmt_ids) {
            $this->end_bank_stmt_ids = [];
        }

        $this->end_bank_stmt_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEndBankStmtIds(OdooRelation $item): bool
    {
        if (null === $this->end_bank_stmt_ids) {
            return false;
        }

        return in_array($item, $this->end_bank_stmt_ids);
    }

    /**
     * @param OdooRelation[]|null $end_bank_stmt_ids
     */
    public function setEndBankStmtIds(?array $end_bank_stmt_ids): void
    {
        $this->end_bank_stmt_ids = $end_bank_stmt_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("end_bank_stmt_ids")
     */
    public function getEndBankStmtIds(): ?array
    {
        return $this->end_bank_stmt_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStartBankStmtIds(OdooRelation $item): void
    {
        if (null === $this->start_bank_stmt_ids) {
            $this->start_bank_stmt_ids = [];
        }

        if ($this->hasStartBankStmtIds($item)) {
            $index = array_search($item, $this->start_bank_stmt_ids);
            unset($this->start_bank_stmt_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addStartBankStmtIds(OdooRelation $item): void
    {
        if ($this->hasStartBankStmtIds($item)) {
            return;
        }

        if (null === $this->start_bank_stmt_ids) {
            $this->start_bank_stmt_ids = [];
        }

        $this->start_bank_stmt_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStartBankStmtIds(OdooRelation $item): bool
    {
        if (null === $this->start_bank_stmt_ids) {
            return false;
        }

        return in_array($item, $this->start_bank_stmt_ids);
    }

    /**
     * @param OdooRelation[]|null $start_bank_stmt_ids
     */
    public function setStartBankStmtIds(?array $start_bank_stmt_ids): void
    {
        $this->start_bank_stmt_ids = $start_bank_stmt_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("start_bank_stmt_ids")
     */
    public function getStartBankStmtIds(): ?array
    {
        return $this->start_bank_stmt_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCashboxLinesIds(OdooRelation $item): void
    {
        if (null === $this->cashbox_lines_ids) {
            $this->cashbox_lines_ids = [];
        }

        if ($this->hasCashboxLinesIds($item)) {
            $index = array_search($item, $this->cashbox_lines_ids);
            unset($this->cashbox_lines_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCashboxLinesIds(OdooRelation $item): void
    {
        if ($this->hasCashboxLinesIds($item)) {
            return;
        }

        if (null === $this->cashbox_lines_ids) {
            $this->cashbox_lines_ids = [];
        }

        $this->cashbox_lines_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCashboxLinesIds(OdooRelation $item): bool
    {
        if (null === $this->cashbox_lines_ids) {
            return false;
        }

        return in_array($item, $this->cashbox_lines_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.bank.statement.cashbox';
    }
}
