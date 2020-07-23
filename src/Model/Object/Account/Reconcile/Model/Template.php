<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Reconcile\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.reconcile.model.template
 * Name : account.reconcile.model.template
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
final class Template extends Base
{
    /**
     * Chart Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $chart_template_id;

    /**
     * Button Label
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

    /**
     * Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> writeoff_button (Manually create a write-off on clicked button.)
     *     -> writeoff_suggestion (Suggest a write-off.)
     *     -> invoice_matching (Match existing invoices/bills.)
     *
     *
     * @var string
     */
    private $rule_type;

    /**
     * Auto-validate
     * Validate the statement line automatically (reconciliation based on your rule).
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_reconcile;

    /**
     * To Check
     * This matching rule is used when the user is not certain of all the informations of the counterpart.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_check;

    /**
     * Journals
     * The reconciliation model will only be available from the selected journals.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_journal_ids;

    /**
     * Amount Nature
     * The reconciliation model will only be applied to the selected transaction type:
     *                 * Amount Received: Only applied when receiving an amount.
     *                 * Amount Paid: Only applied when paying an amount.
     *                 * Amount Paid/Received: Applied in both cases.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> amount_received (Amount Received)
     *     -> amount_paid (Amount Paid)
     *     -> both (Amount Paid/Received)
     *
     *
     * @var string
     */
    private $match_nature;

    /**
     * Amount
     * The reconciliation model will only be applied when the amount being lower than, greater than or between
     * specified amount(s).
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> lower (Is Lower Than)
     *     -> greater (Is Greater Than)
     *     -> between (Is Between)
     *
     *
     * @var string|null
     */
    private $match_amount;

    /**
     * Amount Min Parameter
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_amount_min;

    /**
     * Amount Max Parameter
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_amount_max;

    /**
     * Label
     * The reconciliation model will only be applied when the label:
     *                 * Contains: The proposition label must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     *
     *
     * @var string|null
     */
    private $match_label;

    /**
     * Label Parameter
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_label_param;

    /**
     * Note
     * The reconciliation model will only be applied when the note:
     *                 * Contains: The proposition note must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     *
     *
     * @var string|null
     */
    private $match_note;

    /**
     * Note Parameter
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_note_param;

    /**
     * Transaction Type
     * The reconciliation model will only be applied when the transaction type:
     *                 * Contains: The proposition transaction type must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     *
     *
     * @var string|null
     */
    private $match_transaction_type;

    /**
     * Transaction Type Parameter
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_transaction_type_param;

    /**
     * Same Currency Matching
     * Restrict to propositions having the same currency as the statement line.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_same_currency;

    /**
     * Amount Matching
     * The sum of total residual amount propositions matches the statement line amount.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_total_amount;

    /**
     * Amount Matching %
     * The sum of total residual amount propositions matches the statement line amount under this percentage.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_total_amount_param;

    /**
     * Partner Is Set
     * The reconciliation model will only be applied when a customer/vendor is set.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_partner;

    /**
     * Restrict Partners to
     * The reconciliation model will only be applied to the selected customers/vendors.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_partner_ids;

    /**
     * Restrict Partner Categories to
     * The reconciliation model will only be applied to the selected customer/vendor categories.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_partner_category_ids;

    /**
     * Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Journal Item Label
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $label;

    /**
     * Amount Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> fixed (Fixed)
     *     -> percentage (Percentage of balance)
     *     -> regex (From label)
     *
     *
     * @var string
     */
    private $amount_type;

    /**
     * Write-off Amount
     * Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Amount from Label (regex)
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $amount_from_label_regex;

    /**
     * Decimal Separator
     * Every character that is nor a digit nor this separator will be removed from the matching string
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $decimal_separator;

    /**
     * Tax Included in Price
     * Force the tax to be managed as a price included tax.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $force_tax_included;

    /**
     * Add a second line
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $has_second_line;

    /**
     * Taxes
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Second Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $second_account_id;

    /**
     * Second Journal Item Label
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $second_label;

    /**
     * Second Amount type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> fixed (Fixed)
     *     -> percentage (Percentage of amount)
     *     -> regex (From label)
     *
     *
     * @var string
     */
    private $second_amount_type;

    /**
     * Second Write-off Amount
     * Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $second_amount;

    /**
     * Second Amount from Label (regex)
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $second_amount_from_label_regex;

    /**
     * Second Tax Included in Price
     * Force the second tax to be managed as a price included tax.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $force_second_tax_included;

    /**
     * Second Taxes
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $second_tax_ids;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $chart_template_id Chart Template
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Button Label
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        Searchable : yes
     *        Sortable : yes
     * @param string $rule_type Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> writeoff_button (Manually create a write-off on clicked button.)
     *            -> writeoff_suggestion (Suggest a write-off.)
     *            -> invoice_matching (Match existing invoices/bills.)
     *
     * @param string $match_nature Amount Nature
     *        The reconciliation model will only be applied to the selected transaction type:
     *                        * Amount Received: Only applied when receiving an amount.
     *                        * Amount Paid: Only applied when paying an amount.
     *                        * Amount Paid/Received: Applied in both cases.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> amount_received (Amount Received)
     *            -> amount_paid (Amount Paid)
     *            -> both (Amount Paid/Received)
     *
     * @param string $amount_type Amount Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> fixed (Fixed)
     *            -> percentage (Percentage of balance)
     *            -> regex (From label)
     *
     * @param float $amount Write-off Amount
     *        Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $second_amount_type Second Amount type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> fixed (Fixed)
     *            -> percentage (Percentage of amount)
     *            -> regex (From label)
     *
     * @param float $second_amount Second Write-off Amount
     *        Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $chart_template_id,
        string $name,
        int $sequence,
        string $rule_type,
        string $match_nature,
        string $amount_type,
        float $amount,
        string $second_amount_type,
        float $second_amount
    ) {
        $this->chart_template_id = $chart_template_id;
        $this->name = $name;
        $this->sequence = $sequence;
        $this->rule_type = $rule_type;
        $this->match_nature = $match_nature;
        $this->amount_type = $amount_type;
        $this->amount = $amount;
        $this->second_amount_type = $second_amount_type;
        $this->second_amount = $second_amount;
    }

    /**
     * @param string|null $amount_from_label_regex
     */
    public function setAmountFromLabelRegex(?string $amount_from_label_regex): void
    {
        $this->amount_from_label_regex = $amount_from_label_regex;
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
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param bool|null $has_second_line
     */
    public function setHasSecondLine(?bool $has_second_line): void
    {
        $this->has_second_line = $has_second_line;
    }

    /**
     * @return bool|null
     */
    public function isHasSecondLine(): ?bool
    {
        return $this->has_second_line;
    }

    /**
     * @param bool|null $force_tax_included
     */
    public function setForceTaxIncluded(?bool $force_tax_included): void
    {
        $this->force_tax_included = $force_tax_included;
    }

    /**
     * @return bool|null
     */
    public function isForceTaxIncluded(): ?bool
    {
        return $this->force_tax_included;
    }

    /**
     * @param string|null $decimal_separator
     */
    public function setDecimalSeparator(?string $decimal_separator): void
    {
        $this->decimal_separator = $decimal_separator;
    }

    /**
     * @return string|null
     */
    public function getDecimalSeparator(): ?string
    {
        return $this->decimal_separator;
    }

    /**
     * @return string|null
     */
    public function getAmountFromLabelRegex(): ?string
    {
        return $this->amount_from_label_regex;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSecondAccountId(): ?OdooRelation
    {
        return $this->second_account_id;
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
     * @param string $amount_type
     */
    public function setAmountType(string $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @return string
     */
    public function getAmountType(): string
    {
        return $this->amount_type;
    }

    /**
     * @param string|null $label
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
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
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchPartnerCategoryIds(OdooRelation $item): void
    {
        if (null === $this->match_partner_category_ids) {
            $this->match_partner_category_ids = [];
        }

        if ($this->hasMatchPartnerCategoryIds($item)) {
            $index = array_search($item, $this->match_partner_category_ids);
            unset($this->match_partner_category_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchPartnerCategoryIds(OdooRelation $item): void
    {
        if ($this->hasMatchPartnerCategoryIds($item)) {
            return;
        }

        if (null === $this->match_partner_category_ids) {
            $this->match_partner_category_ids = [];
        }

        $this->match_partner_category_ids[] = $item;
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
     * @param OdooRelation|null $second_account_id
     */
    public function setSecondAccountId(?OdooRelation $second_account_id): void
    {
        $this->second_account_id = $second_account_id;
    }

    /**
     * @param OdooRelation[]|null $match_partner_category_ids
     */
    public function setMatchPartnerCategoryIds(?array $match_partner_category_ids): void
    {
        $this->match_partner_category_ids = $match_partner_category_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSecondTaxIds(OdooRelation $item): bool
    {
        if (null === $this->second_tax_ids) {
            return false;
        }

        return in_array($item, $this->second_tax_ids);
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
     * @param OdooRelation $item
     */
    public function removeSecondTaxIds(OdooRelation $item): void
    {
        if (null === $this->second_tax_ids) {
            $this->second_tax_ids = [];
        }

        if ($this->hasSecondTaxIds($item)) {
            $index = array_search($item, $this->second_tax_ids);
            unset($this->second_tax_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSecondTaxIds(OdooRelation $item): void
    {
        if ($this->hasSecondTaxIds($item)) {
            return;
        }

        if (null === $this->second_tax_ids) {
            $this->second_tax_ids = [];
        }

        $this->second_tax_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $second_tax_ids
     */
    public function setSecondTaxIds(?array $second_tax_ids): void
    {
        $this->second_tax_ids = $second_tax_ids;
    }

    /**
     * @return string|null
     */
    public function getSecondLabel(): ?string
    {
        return $this->second_label;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSecondTaxIds(): ?array
    {
        return $this->second_tax_ids;
    }

    /**
     * @param bool|null $force_second_tax_included
     */
    public function setForceSecondTaxIncluded(?bool $force_second_tax_included): void
    {
        $this->force_second_tax_included = $force_second_tax_included;
    }

    /**
     * @return bool|null
     */
    public function isForceSecondTaxIncluded(): ?bool
    {
        return $this->force_second_tax_included;
    }

    /**
     * @param string|null $second_amount_from_label_regex
     */
    public function setSecondAmountFromLabelRegex(?string $second_amount_from_label_regex): void
    {
        $this->second_amount_from_label_regex = $second_amount_from_label_regex;
    }

    /**
     * @return string|null
     */
    public function getSecondAmountFromLabelRegex(): ?string
    {
        return $this->second_amount_from_label_regex;
    }

    /**
     * @param float $second_amount
     */
    public function setSecondAmount(float $second_amount): void
    {
        $this->second_amount = $second_amount;
    }

    /**
     * @return float
     */
    public function getSecondAmount(): float
    {
        return $this->second_amount;
    }

    /**
     * @param string $second_amount_type
     */
    public function setSecondAmountType(string $second_amount_type): void
    {
        $this->second_amount_type = $second_amount_type;
    }

    /**
     * @return string
     */
    public function getSecondAmountType(): string
    {
        return $this->second_amount_type;
    }

    /**
     * @param string|null $second_label
     */
    public function setSecondLabel(?string $second_label): void
    {
        $this->second_label = $second_label;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchPartnerCategoryIds(OdooRelation $item): bool
    {
        if (null === $this->match_partner_category_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_category_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMatchPartnerCategoryIds(): ?array
    {
        return $this->match_partner_category_ids;
    }

    /**
     * @return OdooRelation
     */
    public function getChartTemplateId(): OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMatchJournalIds(): ?array
    {
        return $this->match_journal_ids;
    }

    /**
     * @param float|null $match_amount_min
     */
    public function setMatchAmountMin(?float $match_amount_min): void
    {
        $this->match_amount_min = $match_amount_min;
    }

    /**
     * @return float|null
     */
    public function getMatchAmountMin(): ?float
    {
        return $this->match_amount_min;
    }

    /**
     * @param string|null $match_amount
     */
    public function setMatchAmount(?string $match_amount): void
    {
        $this->match_amount = $match_amount;
    }

    /**
     * @return string|null
     */
    public function getMatchAmount(): ?string
    {
        return $this->match_amount;
    }

    /**
     * @param string $match_nature
     */
    public function setMatchNature(string $match_nature): void
    {
        $this->match_nature = $match_nature;
    }

    /**
     * @return string
     */
    public function getMatchNature(): string
    {
        return $this->match_nature;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchJournalIds(OdooRelation $item): void
    {
        if (null === $this->match_journal_ids) {
            $this->match_journal_ids = [];
        }

        if ($this->hasMatchJournalIds($item)) {
            $index = array_search($item, $this->match_journal_ids);
            unset($this->match_journal_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchJournalIds(OdooRelation $item): void
    {
        if ($this->hasMatchJournalIds($item)) {
            return;
        }

        if (null === $this->match_journal_ids) {
            $this->match_journal_ids = [];
        }

        $this->match_journal_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchJournalIds(OdooRelation $item): bool
    {
        if (null === $this->match_journal_ids) {
            return false;
        }

        return in_array($item, $this->match_journal_ids);
    }

    /**
     * @param OdooRelation[]|null $match_journal_ids
     */
    public function setMatchJournalIds(?array $match_journal_ids): void
    {
        $this->match_journal_ids = $match_journal_ids;
    }

    /**
     * @param bool|null $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @param float|null $match_amount_max
     */
    public function setMatchAmountMax(?float $match_amount_max): void
    {
        $this->match_amount_max = $match_amount_max;
    }

    /**
     * @return bool|null
     */
    public function isToCheck(): ?bool
    {
        return $this->to_check;
    }

    /**
     * @param bool|null $auto_reconcile
     */
    public function setAutoReconcile(?bool $auto_reconcile): void
    {
        $this->auto_reconcile = $auto_reconcile;
    }

    /**
     * @return bool|null
     */
    public function isAutoReconcile(): ?bool
    {
        return $this->auto_reconcile;
    }

    /**
     * @param string $rule_type
     */
    public function setRuleType(string $rule_type): void
    {
        $this->rule_type = $rule_type;
    }

    /**
     * @return string
     */
    public function getRuleType(): string
    {
        return $this->rule_type;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $chart_template_id
     */
    public function setChartTemplateId(OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @return float|null
     */
    public function getMatchAmountMax(): ?float
    {
        return $this->match_amount_max;
    }

    /**
     * @return string|null
     */
    public function getMatchLabel(): ?string
    {
        return $this->match_label;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchPartnerIds(OdooRelation $item): void
    {
        if (null === $this->match_partner_ids) {
            $this->match_partner_ids = [];
        }

        if ($this->hasMatchPartnerIds($item)) {
            $index = array_search($item, $this->match_partner_ids);
            unset($this->match_partner_ids[$index]);
        }
    }

    /**
     * @param bool|null $match_same_currency
     */
    public function setMatchSameCurrency(?bool $match_same_currency): void
    {
        $this->match_same_currency = $match_same_currency;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchPartnerIds(OdooRelation $item): void
    {
        if ($this->hasMatchPartnerIds($item)) {
            return;
        }

        if (null === $this->match_partner_ids) {
            $this->match_partner_ids = [];
        }

        $this->match_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->match_partner_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_ids);
    }

    /**
     * @param OdooRelation[]|null $match_partner_ids
     */
    public function setMatchPartnerIds(?array $match_partner_ids): void
    {
        $this->match_partner_ids = $match_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMatchPartnerIds(): ?array
    {
        return $this->match_partner_ids;
    }

    /**
     * @param bool|null $match_partner
     */
    public function setMatchPartner(?bool $match_partner): void
    {
        $this->match_partner = $match_partner;
    }

    /**
     * @return bool|null
     */
    public function isMatchPartner(): ?bool
    {
        return $this->match_partner;
    }

    /**
     * @param float|null $match_total_amount_param
     */
    public function setMatchTotalAmountParam(?float $match_total_amount_param): void
    {
        $this->match_total_amount_param = $match_total_amount_param;
    }

    /**
     * @return float|null
     */
    public function getMatchTotalAmountParam(): ?float
    {
        return $this->match_total_amount_param;
    }

    /**
     * @param bool|null $match_total_amount
     */
    public function setMatchTotalAmount(?bool $match_total_amount): void
    {
        $this->match_total_amount = $match_total_amount;
    }

    /**
     * @return bool|null
     */
    public function isMatchTotalAmount(): ?bool
    {
        return $this->match_total_amount;
    }

    /**
     * @return bool|null
     */
    public function isMatchSameCurrency(): ?bool
    {
        return $this->match_same_currency;
    }

    /**
     * @param string|null $match_label
     */
    public function setMatchLabel(?string $match_label): void
    {
        $this->match_label = $match_label;
    }

    /**
     * @param string|null $match_transaction_type_param
     */
    public function setMatchTransactionTypeParam(?string $match_transaction_type_param): void
    {
        $this->match_transaction_type_param = $match_transaction_type_param;
    }

    /**
     * @return string|null
     */
    public function getMatchTransactionTypeParam(): ?string
    {
        return $this->match_transaction_type_param;
    }

    /**
     * @param string|null $match_transaction_type
     */
    public function setMatchTransactionType(?string $match_transaction_type): void
    {
        $this->match_transaction_type = $match_transaction_type;
    }

    /**
     * @return string|null
     */
    public function getMatchTransactionType(): ?string
    {
        return $this->match_transaction_type;
    }

    /**
     * @param string|null $match_note_param
     */
    public function setMatchNoteParam(?string $match_note_param): void
    {
        $this->match_note_param = $match_note_param;
    }

    /**
     * @return string|null
     */
    public function getMatchNoteParam(): ?string
    {
        return $this->match_note_param;
    }

    /**
     * @param string|null $match_note
     */
    public function setMatchNote(?string $match_note): void
    {
        $this->match_note = $match_note;
    }

    /**
     * @return string|null
     */
    public function getMatchNote(): ?string
    {
        return $this->match_note;
    }

    /**
     * @param string|null $match_label_param
     */
    public function setMatchLabelParam(?string $match_label_param): void
    {
        $this->match_label_param = $match_label_param;
    }

    /**
     * @return string|null
     */
    public function getMatchLabelParam(): ?string
    {
        return $this->match_label_param;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.reconcile.model.template';
    }
}
