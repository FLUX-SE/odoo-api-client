<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Reversal date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reason;

    /**
     * Credit Method
     * ---
     * Choose how you want to credit this invoice. You cannot "modify" nor "cancel" if the invoice is already
     * reconciled.
     * ---
     * Selection : (default value, usually null)
     *     -> refund (Partial Refund)
     *     -> cancel (Full Refund)
     *     -> modify (Full refund and new draft invoice)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $refund_method;

    /**
     * Use Specific Journal
     * ---
     * If empty, uses the journal of the journal entry to be reversed.
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Residual
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $residual;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Move Type
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $move_type;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param DateTimeInterface $date Reversal date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $refund_method Credit Method
     *        ---
     *        Choose how you want to credit this invoice. You cannot "modify" nor "cancel" if the invoice is already
     *        reconciled.
     *        ---
     *        Selection : (default value, usually null)
     *            -> refund (Partial Refund)
     *            -> cancel (Full Refund)
     *            -> modify (Full refund and new draft invoice)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $date, string $refund_method)
    {
        $this->date = $date;
        $this->refund_method = $refund_method;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $move_type
     */
    public function setMoveType(?string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @return string|null
     */
    public function getMoveType(): ?string
    {
        return $this->move_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param float|null $residual
     */
    public function setResidual(?float $residual): void
    {
        $this->residual = $residual;
    }

    /**
     * @return float|null
     */
    public function getResidual(): ?float
    {
        return $this->residual;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param string $refund_method
     */
    public function setRefundMethod(string $refund_method): void
    {
        $this->refund_method = $refund_method;
    }

    /**
     * @return string
     */
    public function getRefundMethod(): string
    {
        return $this->refund_method;
    }

    /**
     * @param string|null $reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.move.reversal';
    }
}
