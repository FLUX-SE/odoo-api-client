<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Aged;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.aged.receivable
 * ---
 * Name : account.aged.receivable
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
final class Receivable extends Base
{
    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Partner Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_name;

    /**
     * Partner Trust
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_trust;

    /**
     * Payment
     * ---
     * Relation : many2one (account.payment)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_id;

    /**
     * Report Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $report_date;

    /**
     * Exp. Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $expected_pay_date;

    /**
     * Move Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_type;

    /**
     * Move Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_name;

    /**
     * Journal Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $journal_code;

    /**
     * Account Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_name;

    /**
     * Account Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_code;

    /**
     * Report Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_currency_id;

    /**
     * As of: 
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period0;

    /**
     * 1 - 30
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period1;

    /**
     * 31 - 60
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period2;

    /**
     * 61 - 90
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period3;

    /**
     * 91 - 120
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period4;

    /**
     * Older
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $period5;

    /**
     * Move
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Company
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
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Display Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Analytic Tag
     * ---
     * Relation : many2many (account.analytic.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_tag_ids;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Debit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $debit;

    /**
     * Credit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $credit;

    /**
     * Balance
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance;

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("move_id")
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_id")
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("analytic_account_id")
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_type")
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period5")
     */
    public function getPeriod5(): ?float
    {
        return $this->period5;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_tag_ids")
     */
    public function getAnalyticTagIds(): ?array
    {
        return $this->analytic_tag_ids;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticTagIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticTagIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticTagIds($item)) {
            return;
        }

        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        $this->analytic_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticTagIds(OdooRelation $item): void
    {
        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        if ($this->hasAnalyticTagIds($item)) {
            $index = array_search($item, $this->analytic_tag_ids);
            unset($this->analytic_tag_ids[$index]);
        }
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return float|null
     *
     * @SerializedName("debit")
     */
    public function getDebit(): ?float
    {
        return $this->debit;
    }

    /**
     * @param float|null $debit
     */
    public function setDebit(?float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("credit")
     */
    public function getCredit(): ?float
    {
        return $this->credit;
    }

    /**
     * @param float|null $credit
     */
    public function setCredit(?float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("balance")
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @param float|null $balance
     */
    public function setBalance(?float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @param float|null $period5
     */
    public function setPeriod5(?float $period5): void
    {
        $this->period5 = $period5;
    }

    /**
     * @param float|null $period4
     */
    public function setPeriod4(?float $period4): void
    {
        $this->period4 = $period4;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("journal_code")
     */
    public function getJournalCode(): ?string
    {
        return $this->journal_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_name")
     */
    public function getPartnerName(): ?string
    {
        return $this->partner_name;
    }

    /**
     * @param string|null $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_trust")
     */
    public function getPartnerTrust(): ?string
    {
        return $this->partner_trust;
    }

    /**
     * @param string|null $partner_trust
     */
    public function setPartnerTrust(?string $partner_trust): void
    {
        $this->partner_trust = $partner_trust;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_id")
     */
    public function getPaymentId(): ?OdooRelation
    {
        return $this->payment_id;
    }

    /**
     * @param OdooRelation|null $payment_id
     */
    public function setPaymentId(?OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("report_date")
     */
    public function getReportDate(): ?DateTimeInterface
    {
        return $this->report_date;
    }

    /**
     * @param DateTimeInterface|null $report_date
     */
    public function setReportDate(?DateTimeInterface $report_date): void
    {
        $this->report_date = $report_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("expected_pay_date")
     */
    public function getExpectedPayDate(): ?DateTimeInterface
    {
        return $this->expected_pay_date;
    }

    /**
     * @param DateTimeInterface|null $expected_pay_date
     */
    public function setExpectedPayDate(?DateTimeInterface $expected_pay_date): void
    {
        $this->expected_pay_date = $expected_pay_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): ?string
    {
        return $this->move_type;
    }

    /**
     * @param string|null $move_type
     */
    public function setMoveType(?string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_name")
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @param string|null $move_name
     */
    public function setMoveName(?string $move_name): void
    {
        $this->move_name = $move_name;
    }

    /**
     * @param string|null $journal_code
     */
    public function setJournalCode(?string $journal_code): void
    {
        $this->journal_code = $journal_code;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period4")
     */
    public function getPeriod4(): ?float
    {
        return $this->period4;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_name")
     */
    public function getAccountName(): ?string
    {
        return $this->account_name;
    }

    /**
     * @param string|null $account_name
     */
    public function setAccountName(?string $account_name): void
    {
        $this->account_name = $account_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_code")
     */
    public function getAccountCode(): ?string
    {
        return $this->account_code;
    }

    /**
     * @param string|null $account_code
     */
    public function setAccountCode(?string $account_code): void
    {
        $this->account_code = $account_code;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_currency_id")
     */
    public function getReportCurrencyId(): ?OdooRelation
    {
        return $this->report_currency_id;
    }

    /**
     * @param OdooRelation|null $report_currency_id
     */
    public function setReportCurrencyId(?OdooRelation $report_currency_id): void
    {
        $this->report_currency_id = $report_currency_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period0")
     */
    public function getPeriod0(): ?float
    {
        return $this->period0;
    }

    /**
     * @param float|null $period0
     */
    public function setPeriod0(?float $period0): void
    {
        $this->period0 = $period0;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period1")
     */
    public function getPeriod1(): ?float
    {
        return $this->period1;
    }

    /**
     * @param float|null $period1
     */
    public function setPeriod1(?float $period1): void
    {
        $this->period1 = $period1;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period2")
     */
    public function getPeriod2(): ?float
    {
        return $this->period2;
    }

    /**
     * @param float|null $period2
     */
    public function setPeriod2(?float $period2): void
    {
        $this->period2 = $period2;
    }

    /**
     * @return float|null
     *
     * @SerializedName("period3")
     */
    public function getPeriod3(): ?float
    {
        return $this->period3;
    }

    /**
     * @param float|null $period3
     */
    public function setPeriod3(?float $period3): void
    {
        $this->period3 = $period3;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.aged.receivable';
    }
}
