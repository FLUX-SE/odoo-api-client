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
     * Justification
     *
     * @var null|string
     */
    private $reason;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Debit account
     *
     * @var null|Account
     */
    private $debit_account_id;

    /**
     * Credit account
     *
     * @var null|Account
     */
    private $credit_account_id;

    /**
     * Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Adjustment Type
     *
     * @var null|array
     */
    private $adjustment_type;

    /**
     * Report Line
     *
     * @var null|Line
     */
    private $tax_report_line_id;

    /**
     * Company Currency
     *
     * @var Currency
     */
    private $company_currency_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

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
     * @param null|string $reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @param ?array $adjustment_type
     */
    public function removeAdjustmentType(?array $adjustment_type): void
    {
        if ($this->hasAdjustmentType($adjustment_type)) {
            $index = array_search($adjustment_type, $this->adjustment_type);
            unset($this->adjustment_type[$index]);
        }
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
     * @return Country
     */
    public function getCountryId(): Country
    {
        return $this->country_id;
    }

    /**
     * @return Currency
     */
    public function getCompanyCurrencyId(): Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @param null|Line $tax_report_line_id
     */
    public function setTaxReportLineId(Line $tax_report_line_id): void
    {
        $this->tax_report_line_id = $tax_report_line_id;
    }

    /**
     * @param ?array $adjustment_type
     */
    public function addAdjustmentType(?array $adjustment_type): void
    {
        if ($this->hasAdjustmentType($adjustment_type)) {
            return;
        }

        if (null === $this->adjustment_type) {
            $this->adjustment_type = [];
        }

        $this->adjustment_type[] = $adjustment_type;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param ?array $adjustment_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAdjustmentType(?array $adjustment_type, bool $strict = true): bool
    {
        if (null === $this->adjustment_type) {
            return false;
        }

        return in_array($adjustment_type, $this->adjustment_type, $strict);
    }

    /**
     * @param null|array $adjustment_type
     */
    public function setAdjustmentType(?array $adjustment_type): void
    {
        $this->adjustment_type = $adjustment_type;
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param null|Account $credit_account_id
     */
    public function setCreditAccountId(Account $credit_account_id): void
    {
        $this->credit_account_id = $credit_account_id;
    }

    /**
     * @param null|Account $debit_account_id
     */
    public function setDebitAccountId(Account $debit_account_id): void
    {
        $this->debit_account_id = $debit_account_id;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
