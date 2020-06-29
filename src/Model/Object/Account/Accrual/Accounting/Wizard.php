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
 * Info :
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
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Account Type
     *
     * @var null|array
     */
    private $account_type;

    /**
     * Active Move Line
     *
     * @var null|Line[]
     */
    private $active_move_line_ids;

    /**
     * Accrual Default Journal
     * Journal used by default for moving the period of an entry
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Expense Accrual Account
     * Account used to move the period of an expense
     *
     * @var null|Account
     */
    private $expense_accrual_account;

    /**
     * Revenue Accrual Account
     * Account used to move the period of a revenue
     *
     * @var null|Account
     */
    private $revenue_accrual_account;

    /**
     * Percentage
     *
     * @var null|float
     */
    private $percentage;

    /**
     * Total Amount
     *
     * @var null|float
     */
    private $total_amount;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $company_currency_id;

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
     * @param DateTimeInterface $date Date
     * @param Company $company_id Company
     * @param Journal $journal_id Accrual Default Journal
     *        Journal used by default for moving the period of an entry
     */
    public function __construct(DateTimeInterface $date, Company $company_id, Journal $journal_id)
    {
        $this->date = $date;
        $this->company_id = $company_id;
        $this->journal_id = $journal_id;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
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
    public function getCompanyCurrencyId(): ?Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @return null|float
     */
    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    /**
     * @param null|float $percentage
     */
    public function setPercentage(?float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @param null|Account $revenue_accrual_account
     */
    public function setRevenueAccrualAccount(?Account $revenue_accrual_account): void
    {
        $this->revenue_accrual_account = $revenue_accrual_account;
    }

    /**
     * @param null|Account $expense_accrual_account
     */
    public function setExpenseAccrualAccount(?Account $expense_accrual_account): void
    {
        $this->expense_accrual_account = $expense_accrual_account;
    }

    /**
     * @param Line $item
     */
    public function removeActiveMoveLineIds(Line $item): void
    {
        if (null === $this->active_move_line_ids) {
            $this->active_move_line_ids = [];
        }

        if ($this->hasActiveMoveLineIds($item)) {
            $index = array_search($item, $this->active_move_line_ids);
            unset($this->active_move_line_ids[$index]);
        }
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param Line $item
     */
    public function addActiveMoveLineIds(Line $item): void
    {
        if ($this->hasActiveMoveLineIds($item)) {
            return;
        }

        if (null === $this->active_move_line_ids) {
            $this->active_move_line_ids = [];
        }

        $this->active_move_line_ids[] = $item;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActiveMoveLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->active_move_line_ids) {
            return false;
        }

        return in_array($item, $this->active_move_line_ids, $strict);
    }

    /**
     * @param null|Line[] $active_move_line_ids
     */
    public function setActiveMoveLineIds(?array $active_move_line_ids): void
    {
        $this->active_move_line_ids = $active_move_line_ids;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountType($item): void
    {
        if (null === $this->account_type) {
            $this->account_type = [];
        }

        if ($this->hasAccountType($item)) {
            $index = array_search($item, $this->account_type);
            unset($this->account_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAccountType($item): void
    {
        if ($this->hasAccountType($item)) {
            return;
        }

        if (null === $this->account_type) {
            $this->account_type = [];
        }

        $this->account_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountType($item, bool $strict = true): bool
    {
        if (null === $this->account_type) {
            return false;
        }

        return in_array($item, $this->account_type, $strict);
    }

    /**
     * @param null|array $account_type
     */
    public function setAccountType(?array $account_type): void
    {
        $this->account_type = $account_type;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
