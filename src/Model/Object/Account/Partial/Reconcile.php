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
 *
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
     * @var null|Line
     */
    private $debit_move_id;

    /**
     * Credit Move
     *
     * @var null|Line
     */
    private $credit_move_id;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Amount in Currency
     *
     * @var float
     */
    private $amount_currency;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Company Currency
     *
     * @var Currency
     */
    private $company_currency_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Full Reconcile
     *
     * @var ReconcileAlias
     */
    private $full_reconcile_id;

    /**
     * Max Date of Matched Lines
     *
     * @var DateTimeInterface
     */
    private $max_date;

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
     * @param null|Line $debit_move_id
     */
    public function setDebitMoveId(Line $debit_move_id): void
    {
        $this->debit_move_id = $debit_move_id;
    }

    /**
     * @param null|Line $credit_move_id
     */
    public function setCreditMoveId(Line $credit_move_id): void
    {
        $this->credit_move_id = $credit_move_id;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param float $amount_currency
     */
    public function setAmountCurrency(float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return Currency
     */
    public function getCompanyCurrencyId(): Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param ReconcileAlias $full_reconcile_id
     */
    public function setFullReconcileId(ReconcileAlias $full_reconcile_id): void
    {
        $this->full_reconcile_id = $full_reconcile_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getMaxDate(): DateTimeInterface
    {
        return $this->max_date;
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
