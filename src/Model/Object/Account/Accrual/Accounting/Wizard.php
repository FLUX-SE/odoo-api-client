<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Accrual\Accounting;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.accrual.accounting.wizard
 * Name : account.accrual.accounting.wizard
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Account Type
     *
     * @var array
     */
    private $account_type;

    /**
     * Active Move Line
     *
     * @var Line
     */
    private $active_move_line_ids;

    /**
     * Accrual Default Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Expense Accrual Account
     *
     * @var Account
     */
    private $expense_accrual_account;

    /**
     * Revenue Accrual Account
     *
     * @var Account
     */
    private $revenue_accrual_account;

    /**
     * Percentage
     *
     * @var float
     */
    private $percentage;

    /**
     * Total Amount
     *
     * @var float
     */
    private $total_amount;

    /**
     * Currency
     *
     * @var Currency
     */
    private $company_currency_id;

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
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param Account $revenue_accrual_account
     */
    public function setRevenueAccrualAccount(Account $revenue_accrual_account): void
    {
        $this->revenue_accrual_account = $revenue_accrual_account;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return Currency
     */
    public function getCompanyCurrencyId(): Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->total_amount;
    }

    /**
     * @param float $percentage
     */
    public function setPercentage(float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @param Account $expense_accrual_account
     */
    public function setExpenseAccrualAccount(Account $expense_accrual_account): void
    {
        $this->expense_accrual_account = $expense_accrual_account;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param Line $active_move_line_ids
     */
    public function setActiveMoveLineIds(Line $active_move_line_ids): void
    {
        $this->active_move_line_ids = $active_move_line_ids;
    }

    /**
     * @param array $account_type
     */
    public function removeAccountType(array $account_type): void
    {
        if ($this->hasAccountType($account_type)) {
            $index = array_search($account_type, $this->account_type);
            unset($this->account_type[$index]);
        }
    }

    /**
     * @param array $account_type
     */
    public function addAccountType(array $account_type): void
    {
        if ($this->hasAccountType($account_type)) {
            return;
        }

        $this->account_type[] = $account_type;
    }

    /**
     * @param array $account_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountType(array $account_type, bool $strict = true): bool
    {
        return in_array($account_type, $this->account_type, $strict);
    }

    /**
     * @param array $account_type
     */
    public function setAccountType(array $account_type): void
    {
        $this->account_type = $account_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
