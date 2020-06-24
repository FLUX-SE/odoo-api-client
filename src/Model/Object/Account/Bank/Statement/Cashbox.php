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
 *
 * Account Bank Statement popup that allows entering cash details.
 */
final class Cashbox extends Base
{
    /**
     * Cashbox Lines
     *
     * @var Line
     */
    private $cashbox_lines_ids;

    /**
     * Start Bank Stmt
     *
     * @var Statement
     */
    private $start_bank_stmt_ids;

    /**
     * End Bank Stmt
     *
     * @var Statement
     */
    private $end_bank_stmt_ids;

    /**
     * Total
     *
     * @var float
     */
    private $total;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param Line $cashbox_lines_ids
     */
    public function setCashboxLinesIds(Line $cashbox_lines_ids): void
    {
        $this->cashbox_lines_ids = $cashbox_lines_ids;
    }

    /**
     * @param Statement $start_bank_stmt_ids
     */
    public function setStartBankStmtIds(Statement $start_bank_stmt_ids): void
    {
        $this->start_bank_stmt_ids = $start_bank_stmt_ids;
    }

    /**
     * @param Statement $end_bank_stmt_ids
     */
    public function setEndBankStmtIds(Statement $end_bank_stmt_ids): void
    {
        $this->end_bank_stmt_ids = $end_bank_stmt_ids;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
