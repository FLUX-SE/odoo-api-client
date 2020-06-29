<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Tax\Adjustments;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : tax.adjustments.wizard
 * Name : tax.adjustments.wizard
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
     * Justification
     *
     * @var string
     */
    private $reason;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Debit account
     *
     * @var Account
     */
    private $debit_account_id;

    /**
     * Credit account
     *
     * @var Account
     */
    private $credit_account_id;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Adjustment Type
     *
     * @var array
     */
    private $adjustment_type;

    /**
     * Report Line
     * The report line to make an adjustment for.
     *
     * @var Line
     */
    private $tax_report_line_id;

    /**
     * Company Currency
     *
     * @var null|Currency
     */
    private $company_currency_id;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

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
     * @param string $reason Justification
     * @param Journal $journal_id Journal
     * @param DateTimeInterface $date Date
     * @param Account $debit_account_id Debit account
     * @param Account $credit_account_id Credit account
     * @param float $amount Amount
     * @param array $adjustment_type Adjustment Type
     * @param Line $tax_report_line_id Report Line
     *        The report line to make an adjustment for.
     */
    public function __construct(
        string $reason,
        Journal $journal_id,
        DateTimeInterface $date,
        Account $debit_account_id,
        Account $credit_account_id,
        float $amount,
        array $adjustment_type,
        Line $tax_report_line_id
    ) {
        $this->reason = $reason;
        $this->journal_id = $journal_id;
        $this->date = $date;
        $this->debit_account_id = $debit_account_id;
        $this->credit_account_id = $credit_account_id;
        $this->amount = $amount;
        $this->adjustment_type = $adjustment_type;
        $this->tax_report_line_id = $tax_report_line_id;
    }

    /**
     * @param mixed $item
     */
    public function removeAdjustmentType($item): void
    {
        if ($this->hasAdjustmentType($item)) {
            $index = array_search($item, $this->adjustment_type);
            unset($this->adjustment_type[$index]);
        }
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
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    /**
     * @return null|Currency
     */
    public function getCompanyCurrencyId(): ?Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @param Line $tax_report_line_id
     */
    public function setTaxReportLineId(Line $tax_report_line_id): void
    {
        $this->tax_report_line_id = $tax_report_line_id;
    }

    /**
     * @param mixed $item
     */
    public function addAdjustmentType($item): void
    {
        if ($this->hasAdjustmentType($item)) {
            return;
        }

        $this->adjustment_type[] = $item;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAdjustmentType($item, bool $strict = true): bool
    {
        return in_array($item, $this->adjustment_type, $strict);
    }

    /**
     * @param array $adjustment_type
     */
    public function setAdjustmentType(array $adjustment_type): void
    {
        $this->adjustment_type = $adjustment_type;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param Account $credit_account_id
     */
    public function setCreditAccountId(Account $credit_account_id): void
    {
        $this->credit_account_id = $credit_account_id;
    }

    /**
     * @param Account $debit_account_id
     */
    public function setDebitAccountId(Account $debit_account_id): void
    {
        $this->debit_account_id = $debit_account_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
