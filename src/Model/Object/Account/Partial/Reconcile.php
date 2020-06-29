<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Partial;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Full\Reconcile as ReconcileAlias;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.partial.reconcile
 * Name : account.partial.reconcile
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Reconcile extends Base
{
    /**
     * Debit Move
     *
     * @var Line
     */
    private $debit_move_id;

    /**
     * Credit Move
     *
     * @var Line
     */
    private $credit_move_id;

    /**
     * Amount
     * Amount concerned by this matching. Assumed to be always positive
     *
     * @var null|float
     */
    private $amount;

    /**
     * Amount in Currency
     *
     * @var null|float
     */
    private $amount_currency;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Company Currency
     * Utility field to express amount currency
     *
     * @var null|Currency
     */
    private $company_currency_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Full Reconcile
     *
     * @var null|ReconcileAlias
     */
    private $full_reconcile_id;

    /**
     * Max Date of Matched Lines
     * Technical field used to determine at which date this reconciliation needs to be shown on the aged
     * receivable/payable reports.
     *
     * @var null|DateTimeInterface
     */
    private $max_date;

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
     * @param Line $debit_move_id Debit Move
     * @param Line $credit_move_id Credit Move
     */
    public function __construct(Line $debit_move_id, Line $credit_move_id)
    {
        $this->debit_move_id = $debit_move_id;
        $this->credit_move_id = $credit_move_id;
    }

    /**
     * @param Line $debit_move_id
     */
    public function setDebitMoveId(Line $debit_move_id): void
    {
        $this->debit_move_id = $debit_move_id;
    }

    /**
     * @param Line $credit_move_id
     */
    public function setCreditMoveId(Line $credit_move_id): void
    {
        $this->credit_move_id = $credit_move_id;
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param null|float $amount_currency
     */
    public function setAmountCurrency(?float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return null|Currency
     */
    public function getCompanyCurrencyId(): ?Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|ReconcileAlias $full_reconcile_id
     */
    public function setFullReconcileId(?ReconcileAlias $full_reconcile_id): void
    {
        $this->full_reconcile_id = $full_reconcile_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getMaxDate(): ?DateTimeInterface
    {
        return $this->max_date;
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
