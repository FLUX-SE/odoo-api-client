<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Partial;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.partial.reconcile
 * ---
 * Name : account.partial.reconcile
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
final class Reconcile extends Base
{
    /**
     * Debit Move
     * ---
     * Relation : many2one (account.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $debit_move_id;

    /**
     * Credit Move
     * ---
     * Relation : many2one (account.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $credit_move_id;

    /**
     * Full Reconcile
     * ---
     * Relation : many2one (account.full.reconcile)
     * @see \Flux\OdooApiClient\Model\Object\Account\Full\Reconcile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $full_reconcile_id;

    /**
     * Company Currency
     * ---
     * Utility field to express amount currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Currency of the debit journal item.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $debit_currency_id;

    /**
     * Currency of the credit journal item.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $credit_currency_id;

    /**
     * Amount
     * ---
     * Always positive amount concerned by this matching expressed in the company currency.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Debit Amount Currency
     * ---
     * Always positive amount concerned by this matching expressed in the debit line foreign currency.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $debit_amount_currency;

    /**
     * Credit Amount Currency
     * ---
     * Always positive amount concerned by this matching expressed in the credit line foreign currency.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $credit_amount_currency;

    /**
     * Company
     * ---
     * Company related to this journal
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Max Date of Matched Lines
     * ---
     * Technical field used to determine at which date this reconciliation needs to be shown on the aged
     * receivable/payable reports.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $max_date;

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
     * @param OdooRelation $debit_move_id Debit Move
     *        ---
     *        Relation : many2one (account.move.line)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $credit_move_id Credit Move
     *        ---
     *        Relation : many2one (account.move.line)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $debit_move_id, OdooRelation $credit_move_id)
    {
        $this->debit_move_id = $debit_move_id;
        $this->credit_move_id = $credit_move_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("credit_amount_currency")
     */
    public function getCreditAmountCurrency(): ?float
    {
        return $this->credit_amount_currency;
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
     * @param DateTimeInterface|null $max_date
     */
    public function setMaxDate(?DateTimeInterface $max_date): void
    {
        $this->max_date = $max_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("max_date")
     */
    public function getMaxDate(): ?DateTimeInterface
    {
        return $this->max_date;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param float|null $credit_amount_currency
     */
    public function setCreditAmountCurrency(?float $credit_amount_currency): void
    {
        $this->credit_amount_currency = $credit_amount_currency;
    }

    /**
     * @param float|null $debit_amount_currency
     */
    public function setDebitAmountCurrency(?float $debit_amount_currency): void
    {
        $this->debit_amount_currency = $debit_amount_currency;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("debit_move_id")
     */
    public function getDebitMoveId(): OdooRelation
    {
        return $this->debit_move_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("debit_amount_currency")
     */
    public function getDebitAmountCurrency(): ?float
    {
        return $this->debit_amount_currency;
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
     * @param OdooRelation|null $credit_currency_id
     */
    public function setCreditCurrencyId(?OdooRelation $credit_currency_id): void
    {
        $this->credit_currency_id = $credit_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("credit_currency_id")
     */
    public function getCreditCurrencyId(): ?OdooRelation
    {
        return $this->credit_currency_id;
    }

    /**
     * @param OdooRelation|null $debit_currency_id
     */
    public function setDebitCurrencyId(?OdooRelation $debit_currency_id): void
    {
        $this->debit_currency_id = $debit_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("debit_currency_id")
     */
    public function getDebitCurrencyId(): ?OdooRelation
    {
        return $this->debit_currency_id;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_currency_id")
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @param OdooRelation|null $full_reconcile_id
     */
    public function setFullReconcileId(?OdooRelation $full_reconcile_id): void
    {
        $this->full_reconcile_id = $full_reconcile_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("full_reconcile_id")
     */
    public function getFullReconcileId(): ?OdooRelation
    {
        return $this->full_reconcile_id;
    }

    /**
     * @param OdooRelation $credit_move_id
     */
    public function setCreditMoveId(OdooRelation $credit_move_id): void
    {
        $this->credit_move_id = $credit_move_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("credit_move_id")
     */
    public function getCreditMoveId(): OdooRelation
    {
        return $this->credit_move_id;
    }

    /**
     * @param OdooRelation $debit_move_id
     */
    public function setDebitMoveId(OdooRelation $debit_move_id): void
    {
        $this->debit_move_id = $debit_move_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.partial.reconcile';
    }
}
