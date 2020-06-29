<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement;
use Flux\OdooApiClient\Model\Object\Account\Cashbox\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.bank.statement.cashbox
 * Name : account.bank.statement.cashbox
 * Info :
 * Account Bank Statement popup that allows entering cash details.
 */
final class Cashbox extends Base
{
    /**
     * Cashbox Lines
     *
     * @var null|Line[]
     */
    private $cashbox_lines_ids;

    /**
     * Start Bank Stmt
     *
     * @var null|Statement[]
     */
    private $start_bank_stmt_ids;

    /**
     * End Bank Stmt
     *
     * @var null|Statement[]
     */
    private $end_bank_stmt_ids;

    /**
     * Total
     *
     * @var null|float
     */
    private $total;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|Line[] $cashbox_lines_ids
     */
    public function setCashboxLinesIds(?array $cashbox_lines_ids): void
    {
        $this->cashbox_lines_ids = $cashbox_lines_ids;
    }

    /**
     * @param Statement $item
     */
    public function addEndBankStmtIds(Statement $item): void
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
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|float
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param Statement $item
     */
    public function removeEndBankStmtIds(Statement $item): void
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
     * @param Statement $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasEndBankStmtIds(Statement $item, bool $strict = true): bool
    {
        if (null === $this->end_bank_stmt_ids) {
            return false;
        }

        return in_array($item, $this->end_bank_stmt_ids, $strict);
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCashboxLinesIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->cashbox_lines_ids) {
            return false;
        }

        return in_array($item, $this->cashbox_lines_ids, $strict);
    }

    /**
     * @param null|Statement[] $end_bank_stmt_ids
     */
    public function setEndBankStmtIds(?array $end_bank_stmt_ids): void
    {
        $this->end_bank_stmt_ids = $end_bank_stmt_ids;
    }

    /**
     * @param Statement $item
     */
    public function removeStartBankStmtIds(Statement $item): void
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
     * @param Statement $item
     */
    public function addStartBankStmtIds(Statement $item): void
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
     * @param Statement $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStartBankStmtIds(Statement $item, bool $strict = true): bool
    {
        if (null === $this->start_bank_stmt_ids) {
            return false;
        }

        return in_array($item, $this->start_bank_stmt_ids, $strict);
    }

    /**
     * @param null|Statement[] $start_bank_stmt_ids
     */
    public function setStartBankStmtIds(?array $start_bank_stmt_ids): void
    {
        $this->start_bank_stmt_ids = $start_bank_stmt_ids;
    }

    /**
     * @param Line $item
     */
    public function removeCashboxLinesIds(Line $item): void
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
     * @param Line $item
     */
    public function addCashboxLinesIds(Line $item): void
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
