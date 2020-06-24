<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.move.reversal
 * Name : account.move.reversal
 *
 * Account move reversal wizard, it cancel an account move by reversing it.
 */
final class Reversal extends Base
{
    /**
     * Journal Entry
     *
     * @var Move
     */
    private $move_id;

    /**
     * Reversal date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Reason
     *
     * @var string
     */
    private $reason;

    /**
     * Credit Method
     *
     * @var null|array
     */
    private $refund_method;

    /**
     * Use Specific Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Residual
     *
     * @var float
     */
    private $residual;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Move Type
     *
     * @var string
     */
    private $move_type;

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
     * @param Move $move_id
     */
    public function setMoveId(Move $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @param null|array $refund_method
     */
    public function setRefundMethod(?array $refund_method): void
    {
        $this->refund_method = $refund_method;
    }

    /**
     * @param ?array $refund_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRefundMethod(?array $refund_method, bool $strict = true): bool
    {
        if (null === $this->refund_method) {
            return false;
        }

        return in_array($refund_method, $this->refund_method, $strict);
    }

    /**
     * @param ?array $refund_method
     */
    public function addRefundMethod(?array $refund_method): void
    {
        if ($this->hasRefundMethod($refund_method)) {
            return;
        }

        if (null === $this->refund_method) {
            $this->refund_method = [];
        }

        $this->refund_method[] = $refund_method;
    }

    /**
     * @param ?array $refund_method
     */
    public function removeRefundMethod(?array $refund_method): void
    {
        if ($this->hasRefundMethod($refund_method)) {
            $index = array_search($refund_method, $this->refund_method);
            unset($this->refund_method[$index]);
        }
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return float
     */
    public function getResidual(): float
    {
        return $this->residual;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return string
     */
    public function getMoveType(): string
    {
        return $this->move_type;
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
