<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Reconcile\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.reconcile.model.line
 * ---
 * Name : account.reconcile.model.line
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
final class Line extends Base
{
    /**
     * Model
     * ---
     * Relation : many2one (account.reconcile.model)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Reconcile\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Amount Matching
     * ---
     * The sum of total residual amount propositions matches the statement line amount.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $match_total_amount;

    /**
     * Amount Matching %
     * ---
     * The sum of total residual amount propositions matches the statement line amount under this percentage.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $match_total_amount_param;

    /**
     * Type
     * ---
     * Selection :
     *     -> writeoff_button (Manually create a write-off on clicked button)
     *     -> writeoff_suggestion (Suggest counterpart values)
     *     -> invoice_matching (Match existing invoices/bills)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $rule_type;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

    /**
     * Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_id;

    /**
     * Journal
     * ---
     * This field is ignored in a bank statement reconciliation.
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Journal Item Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $label;

    /**
     * Amount Type
     * ---
     * Selection :
     *     -> fixed (Fixed)
     *     -> percentage (Percentage of balance)
     *     -> regex (From label)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $amount_type;

    /**
     * Show Force Tax Included
     * ---
     * Technical field used to show the force tax included button
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_force_tax_included;

    /**
     * Tax Included in Price
     * ---
     * Force the tax to be managed as a price included tax.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $force_tax_included;

    /**
     * Float Amount
     * ---
     * Technical shortcut to parse the amount to a float
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Amount
     * ---
     * Value for the amount of the writeoff line
     *         * Percentage: Percentage of the balance, between 0 and 100.
     *         * Fixed: The fixed value of the writeoff. The amount will count as a debit if it is negative, as a
     * credit if it is positive.
     *         * From Label: There is no need for regex delimiter, only the regex is needed. For instance if you want
     * to extract the amount from
     * R:9672938 10/07 AX 9415126318 T:5L:NA BRT: 3358,07 C:
     * You could enter
     * BRT: ([\d,]+)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $amount_string;

    /**
     * Taxes
     * ---
     * Relation : many2many (account.tax)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Analytic Tags
     * ---
     * Relation : many2many (account.analytic.tag)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_tag_ids;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param int $sequence Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $account_id Account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $amount_type Amount Type
     *        ---
     *        Selection :
     *            -> fixed (Fixed)
     *            -> percentage (Percentage of balance)
     *            -> regex (From label)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $amount_string Amount
     *        ---
     *        Value for the amount of the writeoff line
     *                * Percentage: Percentage of the balance, between 0 and 100.
     *                * Fixed: The fixed value of the writeoff. The amount will count as a debit if it is negative, as a
     *        credit if it is positive.
     *                * From Label: There is no need for regex delimiter, only the regex is needed. For instance if you want
     *        to extract the amount from
     *        R:9672938 10/07 AX 9415126318 T:5L:NA BRT: 3358,07 C:
     *        You could enter
     *        BRT: ([\d,]+)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        int $sequence,
        OdooRelation $account_id,
        string $amount_type,
        string $amount_string
    ) {
        $this->sequence = $sequence;
        $this->account_id = $account_id;
        $this->amount_type = $amount_type;
        $this->amount_string = $amount_string;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param string $amount_string
     */
    public function setAmountString(string $amount_string): void
    {
        $this->amount_string = $amount_string;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tax_ids")
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIds(OdooRelation $item): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIds(OdooRelation $item): void
    {
        if ($this->hasTaxIds($item)) {
            return;
        }

        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        $this->tax_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxIds(OdooRelation $item): void
    {
        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        if ($this->hasTaxIds($item)) {
            $index = array_search($item, $this->tax_ids);
            unset($this->tax_ids[$index]);
        }
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
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     *
     * @SerializedName("amount_string")
     */
    public function getAmountString(): string
    {
        return $this->amount_string;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount")
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_total_amount")
     */
    public function isMatchTotalAmount(): ?bool
    {
        return $this->match_total_amount;
    }

    /**
     * @param bool|null $match_total_amount
     */
    public function setMatchTotalAmount(?bool $match_total_amount): void
    {
        $this->match_total_amount = $match_total_amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("match_total_amount_param")
     */
    public function getMatchTotalAmountParam(): ?float
    {
        return $this->match_total_amount_param;
    }

    /**
     * @param float|null $match_total_amount_param
     */
    public function setMatchTotalAmountParam(?float $match_total_amount_param): void
    {
        $this->match_total_amount_param = $match_total_amount_param;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rule_type")
     */
    public function getRuleType(): ?string
    {
        return $this->rule_type;
    }

    /**
     * @param string|null $rule_type
     */
    public function setRuleType(?string $rule_type): void
    {
        $this->rule_type = $rule_type;
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
     * @return int
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("account_id")
     */
    public function getAccountId(): OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param bool|null $force_tax_included
     */
    public function setForceTaxIncluded(?bool $force_tax_included): void
    {
        $this->force_tax_included = $force_tax_included;
    }

    /**
     * @param OdooRelation $account_id
     */
    public function setAccountId(OdooRelation $account_id): void
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
     * @return string|null
     *
     * @SerializedName("label")
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     *
     * @SerializedName("amount_type")
     */
    public function getAmountType(): string
    {
        return $this->amount_type;
    }

    /**
     * @param string $amount_type
     */
    public function setAmountType(string $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_force_tax_included")
     */
    public function isShowForceTaxIncluded(): ?bool
    {
        return $this->show_force_tax_included;
    }

    /**
     * @param bool|null $show_force_tax_included
     */
    public function setShowForceTaxIncluded(?bool $show_force_tax_included): void
    {
        $this->show_force_tax_included = $show_force_tax_included;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("force_tax_included")
     */
    public function isForceTaxIncluded(): ?bool
    {
        return $this->force_tax_included;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.reconcile.model.line';
    }
}
