<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Multicurrency;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.multicurrency.revaluation
 * ---
 * Name : account.multicurrency.revaluation
 * ---
 * Info :
 * Manage Unrealized Gains/Losses.
 *
 *         In multi-currencies environments, we need a way to control the risk related
 *         to currencies (in case some are higthly fluctuating) and, in some countries,
 *         some laws also require to create journal entries to record the provisionning
 *         of a probable future expense related to currencies. Hence, people need to
 *         create a journal entry at the beginning of a period, to make visible the
 *         probable expense in reports (and revert it at the end of the period, to
 *         recon the real gain/loss.
 */
final class Revaluation extends Base
{
    /**
     * Balance in foreign currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $report_amount_currency;

    /**
     * Balance at current rate
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $report_amount_currency_current;

    /**
     * Adjustment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $report_adjustment;

    /**
     * Balance at operation rate
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $report_balance;

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
     * Report Include
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $report_include;

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
     * Account Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_name;

    /**
     * Currency Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $currency_code;

    /**
     * Move Ref
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_ref;

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
     * @return float|null
     *
     * @SerializedName("report_amount_currency")
     */
    public function getReportAmountCurrency(): ?float
    {
        return $this->report_amount_currency;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
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
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
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
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
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
     * @param float|null $report_amount_currency
     */
    public function setReportAmountCurrency(?float $report_amount_currency): void
    {
        $this->report_amount_currency = $report_amount_currency;
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
     * @return float|null
     *
     * @SerializedName("report_amount_currency_current")
     */
    public function getReportAmountCurrencyCurrent(): ?float
    {
        return $this->report_amount_currency_current;
    }

    /**
     * @param float|null $report_amount_currency_current
     */
    public function setReportAmountCurrencyCurrent(?float $report_amount_currency_current): void
    {
        $this->report_amount_currency_current = $report_amount_currency_current;
    }

    /**
     * @return float|null
     *
     * @SerializedName("report_adjustment")
     */
    public function getReportAdjustment(): ?float
    {
        return $this->report_adjustment;
    }

    /**
     * @param float|null $report_adjustment
     */
    public function setReportAdjustment(?float $report_adjustment): void
    {
        $this->report_adjustment = $report_adjustment;
    }

    /**
     * @return float|null
     *
     * @SerializedName("report_balance")
     */
    public function getReportBalance(): ?float
    {
        return $this->report_balance;
    }

    /**
     * @param float|null $report_balance
     */
    public function setReportBalance(?float $report_balance): void
    {
        $this->report_balance = $report_balance;
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
     * @return bool|null
     *
     * @SerializedName("report_include")
     */
    public function isReportInclude(): ?bool
    {
        return $this->report_include;
    }

    /**
     * @param bool|null $report_include
     */
    public function setReportInclude(?bool $report_include): void
    {
        $this->report_include = $report_include;
    }

    /**
     * @param string|null $account_code
     */
    public function setAccountCode(?string $account_code): void
    {
        $this->account_code = $account_code;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     * @SerializedName("currency_code")
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currency_code;
    }

    /**
     * @param string|null $currency_code
     */
    public function setCurrencyCode(?string $currency_code): void
    {
        $this->currency_code = $currency_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_ref")
     */
    public function getMoveRef(): ?string
    {
        return $this->move_ref;
    }

    /**
     * @param string|null $move_ref
     */
    public function setMoveRef(?string $move_ref): void
    {
        $this->move_ref = $move_ref;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.multicurrency.revaluation';
    }
}
