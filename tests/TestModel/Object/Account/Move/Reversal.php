<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.move.reversal
 * ---
 * Name : account.move.reversal
 * ---
 * Info :
 * Account move reversal wizard, it cancel an account move by reversing it.
 */
final class Reversal extends Base
{
    /**
     * Move
     * ---
     * Relation : many2many (account.move)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * New Move
     * ---
     * Relation : many2many (account.move)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $new_move_ids;

    /**
     * Date Mode
     * ---
     * Selection :
     *     -> custom (Specific)
     *     -> entry (Journal Entry Date)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $date_mode;

    /**
     * Reversal date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
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
     * Selection :
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
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
     * @param string $date_mode Date Mode
     *        ---
     *        Selection :
     *            -> custom (Specific)
     *            -> entry (Journal Entry Date)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $refund_method Credit Method
     *        ---
     *        Choose how you want to credit this invoice. You cannot "modify" nor "cancel" if the invoice is already
     *        reconciled.
     *        ---
     *        Selection :
     *            -> refund (Partial Refund)
     *            -> cancel (Full Refund)
     *            -> modify (Full refund and new draft invoice)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $date_mode, string $refund_method, OdooRelation $company_id)
    {
        $this->date_mode = $date_mode;
        $this->refund_method = $refund_method;
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $move_type
     */
    public function setMoveType(?string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("residual")
     */
    public function getResidual(): ?float
    {
        return $this->residual;
    }

    /**
     * @param float|null $residual
     */
    public function setResidual(?float $residual): void
    {
        $this->residual = $residual;
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
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): ?string
    {
        return $this->move_type;
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
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_ids")
     */
    public function getMoveIds(): ?array
    {
        return $this->move_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addNewMoveIds(OdooRelation $item): void
    {
        if ($this->hasNewMoveIds($item)) {
            return;
        }

        if (null === $this->new_move_ids) {
            $this->new_move_ids = [];
        }

        $this->new_move_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveIds(OdooRelation $item): bool
    {
        if (null === $this->move_ids) {
            return false;
        }

        return in_array($item, $this->move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveIds(OdooRelation $item): void
    {
        if ($this->hasMoveIds($item)) {
            return;
        }

        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        $this->move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveIds(OdooRelation $item): void
    {
        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        if ($this->hasMoveIds($item)) {
            $index = array_search($item, $this->move_ids);
            unset($this->move_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("new_move_ids")
     */
    public function getNewMoveIds(): ?array
    {
        return $this->new_move_ids;
    }

    /**
     * @param OdooRelation[]|null $new_move_ids
     */
    public function setNewMoveIds(?array $new_move_ids): void
    {
        $this->new_move_ids = $new_move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNewMoveIds(OdooRelation $item): bool
    {
        if (null === $this->new_move_ids) {
            return false;
        }

        return in_array($item, $this->new_move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNewMoveIds(OdooRelation $item): void
    {
        if (null === $this->new_move_ids) {
            $this->new_move_ids = [];
        }

        if ($this->hasNewMoveIds($item)) {
            $index = array_search($item, $this->new_move_ids);
            unset($this->new_move_ids[$index]);
        }
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
     *
     * @SerializedName("date_mode")
     */
    public function getDateMode(): string
    {
        return $this->date_mode;
    }

    /**
     * @param string $date_mode
     */
    public function setDateMode(string $date_mode): void
    {
        $this->date_mode = $date_mode;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reason")
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string|null $reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     *
     * @SerializedName("refund_method")
     */
    public function getRefundMethod(): string
    {
        return $this->refund_method;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.move.reversal';
    }
}
