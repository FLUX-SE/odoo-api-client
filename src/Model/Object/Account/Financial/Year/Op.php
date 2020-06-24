<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Financial\Year;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.financial.year.op
 * Name : account.financial.year.op
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Op extends Base
{
    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Opening Move Posted
     *
     * @var bool
     */
    private $opening_move_posted;

    /**
     * Opening Date
     *
     * @var null|DateTimeInterface
     */
    private $opening_date;

    /**
     * Fiscalyear Last Day
     *
     * @var null|int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     *
     * @var null|array
     */
    private $fiscalyear_last_month;

    /**
     * Periodicity
     *
     * @var null|array
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     *
     * @var null|int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var Journal
     */
    private $account_tax_periodicity_journal_id;

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
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param ?array $account_tax_periodicity
     */
    public function addAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            return;
        }

        if (null === $this->account_tax_periodicity) {
            $this->account_tax_periodicity = [];
        }

        $this->account_tax_periodicity[] = $account_tax_periodicity;
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
     * @param Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param null|int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(?int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param ?array $account_tax_periodicity
     */
    public function removeAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            $index = array_search($account_tax_periodicity, $this->account_tax_periodicity);
            unset($this->account_tax_periodicity[$index]);
        }
    }

    /**
     * @param ?array $account_tax_periodicity
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity(?array $account_tax_periodicity, bool $strict = true): bool
    {
        if (null === $this->account_tax_periodicity) {
            return false;
        }

        return in_array($account_tax_periodicity, $this->account_tax_periodicity, $strict);
    }

    /**
     * @return bool
     */
    public function isOpeningMovePosted(): bool
    {
        return $this->opening_move_posted;
    }

    /**
     * @param null|array $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @param ?array $fiscalyear_last_month
     */
    public function removeFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        if ($this->hasFiscalyearLastMonth($fiscalyear_last_month)) {
            $index = array_search($fiscalyear_last_month, $this->fiscalyear_last_month);
            unset($this->fiscalyear_last_month[$index]);
        }
    }

    /**
     * @param ?array $fiscalyear_last_month
     */
    public function addFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        if ($this->hasFiscalyearLastMonth($fiscalyear_last_month)) {
            return;
        }

        if (null === $this->fiscalyear_last_month) {
            $this->fiscalyear_last_month = [];
        }

        $this->fiscalyear_last_month[] = $fiscalyear_last_month;
    }

    /**
     * @param ?array $fiscalyear_last_month
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFiscalyearLastMonth(?array $fiscalyear_last_month, bool $strict = true): bool
    {
        if (null === $this->fiscalyear_last_month) {
            return false;
        }

        return in_array($fiscalyear_last_month, $this->fiscalyear_last_month, $strict);
    }

    /**
     * @param null|array $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param null|int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(?int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @param null|DateTimeInterface $opening_date
     */
    public function setOpeningDate(?DateTimeInterface $opening_date): void
    {
        $this->opening_date = $opening_date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
