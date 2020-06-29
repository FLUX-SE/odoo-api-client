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
 * Info :
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
     * @var Company
     */
    private $company_id;

    /**
     * Opening Move Posted
     *
     * @var null|bool
     */
    private $opening_move_posted;

    /**
     * Opening Date
     * Date from which the accounting is managed in Odoo. It is the date of the opening entry.
     *
     * @var DateTimeInterface
     */
    private $opening_date;

    /**
     * Fiscalyear Last Day
     * The last day of the month will be used if the chosen day doesn't exist.
     *
     * @var int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     * The last day of the month will be used if the chosen day doesn't exist.
     *
     * @var array
     */
    private $fiscalyear_last_month;

    /**
     * Periodicity
     * Periodicity
     *
     * @var array
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     *
     * @var int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $account_tax_periodicity_journal_id;

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
     * @param Company $company_id Company
     * @param DateTimeInterface $opening_date Opening Date
     *        Date from which the accounting is managed in Odoo. It is the date of the opening entry.
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     *        The last day of the month will be used if the chosen day doesn't exist.
     * @param array $fiscalyear_last_month Fiscalyear Last Month
     *        The last day of the month will be used if the chosen day doesn't exist.
     * @param array $account_tax_periodicity Periodicity
     *        Periodicity
     * @param int $account_tax_periodicity_reminder_day Reminder
     */
    public function __construct(
        Company $company_id,
        DateTimeInterface $opening_date,
        int $fiscalyear_last_day,
        array $fiscalyear_last_month,
        array $account_tax_periodicity,
        int $account_tax_periodicity_reminder_day
    ) {
        $this->company_id = $company_id;
        $this->opening_date = $opening_date;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->account_tax_periodicity = $account_tax_periodicity;
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity($item, bool $strict = true): bool
    {
        return in_array($item, $this->account_tax_periodicity, $strict);
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
     * @param null|Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(?Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountTaxPeriodicity($item): void
    {
        if ($this->hasAccountTaxPeriodicity($item)) {
            $index = array_search($item, $this->account_tax_periodicity);
            unset($this->account_tax_periodicity[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAccountTaxPeriodicity($item): void
    {
        if ($this->hasAccountTaxPeriodicity($item)) {
            return;
        }

        $this->account_tax_periodicity[] = $item;
    }

    /**
     * @param array $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(array $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param mixed $item
     */
    public function removeFiscalyearLastMonth($item): void
    {
        if ($this->hasFiscalyearLastMonth($item)) {
            $index = array_search($item, $this->fiscalyear_last_month);
            unset($this->fiscalyear_last_month[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addFiscalyearLastMonth($item): void
    {
        if ($this->hasFiscalyearLastMonth($item)) {
            return;
        }

        $this->fiscalyear_last_month[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFiscalyearLastMonth($item, bool $strict = true): bool
    {
        return in_array($item, $this->fiscalyear_last_month, $strict);
    }

    /**
     * @param array $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(array $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @param DateTimeInterface $opening_date
     */
    public function setOpeningDate(DateTimeInterface $opening_date): void
    {
        $this->opening_date = $opening_date;
    }

    /**
     * @return null|bool
     */
    public function isOpeningMovePosted(): ?bool
    {
        return $this->opening_move_posted;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
