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
 * Info :
 * Account move reversal wizard, it cancel an account move by reversing it.
 */
final class Reversal extends Base
{
    /**
     * Journal Entry
     *
     * @var null|Move
     */
    private $move_id;

    /**
     * Reversal date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reason
     *
     * @var null|string
     */
    private $reason;

    /**
     * Credit Method
     * Choose how you want to credit this invoice. You cannot "modify" nor "cancel" if the invoice is already
     * reconciled.
     *
     * @var array
     */
    private $refund_method;

    /**
     * Use Specific Journal
     * If empty, uses the journal of the journal entry to be reversed.
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Residual
     *
     * @var null|float
     */
    private $residual;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Move Type
     *
     * @var null|string
     */
    private $move_type;

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
     * @param DateTimeInterface $date Reversal date
     * @param array $refund_method Credit Method
     *        Choose how you want to credit this invoice. You cannot "modify" nor "cancel" if the invoice is already
     *        reconciled.
     */
    public function __construct(DateTimeInterface $date, array $refund_method)
    {
        $this->date = $date;
        $this->refund_method = $refund_method;
    }

    /**
     * @param null|Move $move_id
     */
    public function setMoveId(?Move $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|string $reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @param array $refund_method
     */
    public function setRefundMethod(array $refund_method): void
    {
        $this->refund_method = $refund_method;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRefundMethod($item, bool $strict = true): bool
    {
        return in_array($item, $this->refund_method, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addRefundMethod($item): void
    {
        if ($this->hasRefundMethod($item)) {
            return;
        }

        $this->refund_method[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeRefundMethod($item): void
    {
        if ($this->hasRefundMethod($item)) {
            $index = array_search($item, $this->refund_method);
            unset($this->refund_method[$index]);
        }
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(?Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return null|float
     */
    public function getResidual(): ?float
    {
        return $this->residual;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|string
     */
    public function getMoveType(): ?string
    {
        return $this->move_type;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
