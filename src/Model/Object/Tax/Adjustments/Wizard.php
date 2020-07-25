<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Tax\Adjustments;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : tax.adjustments.wizard
 * Name : tax.adjustments.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Justification
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reason;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Debit account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $debit_account_id;

    /**
     * Credit account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $credit_account_id;

    /**
     * Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Adjustment Type
     * ---
     * Selection : (default value, usually null)
     *     -> debit (Applied on debit journal item)
     *     -> credit (Applied on credit journal item)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $adjustment_type;

    /**
     * Report Line
     * ---
     * The report line to make an adjustment for.
     * ---
     * Relation : many2one (account.tax.report.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $tax_report_line_id;

    /**
     * Company Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

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
     * @param string $reason Justification
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $debit_account_id Debit account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $credit_account_id Credit account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Amount
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $adjustment_type Adjustment Type
     *        ---
     *        Selection : (default value, usually null)
     *            -> debit (Applied on debit journal item)
     *            -> credit (Applied on credit journal item)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $tax_report_line_id Report Line
     *        ---
     *        The report line to make an adjustment for.
     *        ---
     *        Relation : many2one (account.tax.report.line)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $reason,
        OdooRelation $journal_id,
        DateTimeInterface $date,
        OdooRelation $debit_account_id,
        OdooRelation $credit_account_id,
        float $amount,
        string $adjustment_type,
        OdooRelation $tax_report_line_id
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
     * @param OdooRelation $tax_report_line_id
     */
    public function setTaxReportLineId(OdooRelation $tax_report_line_id): void
    {
        $this->tax_report_line_id = $tax_report_line_id;
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
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
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @return OdooRelation
     */
    public function getTaxReportLineId(): OdooRelation
    {
        return $this->tax_report_line_id;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $adjustment_type
     */
    public function setAdjustmentType(string $adjustment_type): void
    {
        $this->adjustment_type = $adjustment_type;
    }

    /**
     * @return string
     */
    public function getAdjustmentType(): string
    {
        return $this->adjustment_type;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param OdooRelation $credit_account_id
     */
    public function setCreditAccountId(OdooRelation $credit_account_id): void
    {
        $this->credit_account_id = $credit_account_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCreditAccountId(): OdooRelation
    {
        return $this->credit_account_id;
    }

    /**
     * @param OdooRelation $debit_account_id
     */
    public function setDebitAccountId(OdooRelation $debit_account_id): void
    {
        $this->debit_account_id = $debit_account_id;
    }

    /**
     * @return OdooRelation
     */
    public function getDebitAccountId(): OdooRelation
    {
        return $this->debit_account_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'tax.adjustments.wizard';
    }
}
