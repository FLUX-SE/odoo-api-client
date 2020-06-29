<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Reconcile\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as Template2;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Category;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.reconcile.model.template
 * Name : account.reconcile.model.template
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Template extends Base
{
    /**
     * Chart Template
     *
     * @var TemplateAlias
     */
    private $chart_template_id;

    /**
     * Button Label
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Type
     *
     * @var array
     */
    private $rule_type;

    /**
     * Auto-validate
     * Validate the statement line automatically (reconciliation based on your rule).
     *
     * @var null|bool
     */
    private $auto_reconcile;

    /**
     * To Check
     * This matching rule is used when the user is not certain of all the informations of the counterpart.
     *
     * @var null|bool
     */
    private $to_check;

    /**
     * Journals
     * The reconciliation model will only be available from the selected journals.
     *
     * @var null|Journal[]
     */
    private $match_journal_ids;

    /**
     * Amount Nature
     * The reconciliation model will only be applied to the selected transaction type:
     * * Amount Received: Only applied when receiving an amount.
     * * Amount Paid: Only applied when paying an amount.
     * * Amount Paid/Received: Applied in both cases.
     *
     * @var array
     */
    private $match_nature;

    /**
     * Amount
     * The reconciliation model will only be applied when the amount being lower than, greater than or between
     * specified amount(s).
     *
     * @var null|array
     */
    private $match_amount;

    /**
     * Amount Min Parameter
     *
     * @var null|float
     */
    private $match_amount_min;

    /**
     * Amount Max Parameter
     *
     * @var null|float
     */
    private $match_amount_max;

    /**
     * Label
     * The reconciliation model will only be applied when the label:
     * * Contains: The proposition label must contains this string (case insensitive).
     * * Not Contains: Negation of "Contains".
     * * Match Regex: Define your own regular expression.
     *
     * @var null|array
     */
    private $match_label;

    /**
     * Label Parameter
     *
     * @var null|string
     */
    private $match_label_param;

    /**
     * Note
     * The reconciliation model will only be applied when the note:
     * * Contains: The proposition note must contains this string (case insensitive).
     * * Not Contains: Negation of "Contains".
     * * Match Regex: Define your own regular expression.
     *
     * @var null|array
     */
    private $match_note;

    /**
     * Note Parameter
     *
     * @var null|string
     */
    private $match_note_param;

    /**
     * Transaction Type
     * The reconciliation model will only be applied when the transaction type:
     * * Contains: The proposition transaction type must contains this string (case insensitive).
     * * Not Contains: Negation of "Contains".
     * * Match Regex: Define your own regular expression.
     *
     * @var null|array
     */
    private $match_transaction_type;

    /**
     * Transaction Type Parameter
     *
     * @var null|string
     */
    private $match_transaction_type_param;

    /**
     * Same Currency Matching
     * Restrict to propositions having the same currency as the statement line.
     *
     * @var null|bool
     */
    private $match_same_currency;

    /**
     * Amount Matching
     * The sum of total residual amount propositions matches the statement line amount.
     *
     * @var null|bool
     */
    private $match_total_amount;

    /**
     * Amount Matching %
     * The sum of total residual amount propositions matches the statement line amount under this percentage.
     *
     * @var null|float
     */
    private $match_total_amount_param;

    /**
     * Partner Is Set
     * The reconciliation model will only be applied when a customer/vendor is set.
     *
     * @var null|bool
     */
    private $match_partner;

    /**
     * Restrict Partners to
     * The reconciliation model will only be applied to the selected customers/vendors.
     *
     * @var null|Partner[]
     */
    private $match_partner_ids;

    /**
     * Restrict Partner Categories to
     * The reconciliation model will only be applied to the selected customer/vendor categories.
     *
     * @var null|Category[]
     */
    private $match_partner_category_ids;

    /**
     * Account
     *
     * @var null|TemplateAliasAlias
     */
    private $account_id;

    /**
     * Journal Item Label
     *
     * @var null|string
     */
    private $label;

    /**
     * Amount Type
     *
     * @var array
     */
    private $amount_type;

    /**
     * Write-off Amount
     * Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     *
     * @var float
     */
    private $amount;

    /**
     * Amount from Label (regex)
     *
     * @var null|string
     */
    private $amount_from_label_regex;

    /**
     * Decimal Separator
     * Every character that is nor a digit nor this separator will be removed from the matching string
     *
     * @var null|string
     */
    private $decimal_separator;

    /**
     * Tax Included in Price
     * Force the tax to be managed as a price included tax.
     *
     * @var null|bool
     */
    private $force_tax_included;

    /**
     * Add a second line
     *
     * @var null|bool
     */
    private $has_second_line;

    /**
     * Taxes
     *
     * @var null|Template2[]
     */
    private $tax_ids;

    /**
     * Second Account
     *
     * @var null|TemplateAliasAlias
     */
    private $second_account_id;

    /**
     * Second Journal Item Label
     *
     * @var null|string
     */
    private $second_label;

    /**
     * Second Amount type
     *
     * @var array
     */
    private $second_amount_type;

    /**
     * Second Write-off Amount
     * Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     *
     * @var float
     */
    private $second_amount;

    /**
     * Second Amount from Label (regex)
     *
     * @var null|string
     */
    private $second_amount_from_label_regex;

    /**
     * Second Tax Included in Price
     * Force the second tax to be managed as a price included tax.
     *
     * @var null|bool
     */
    private $force_second_tax_included;

    /**
     * Second Taxes
     *
     * @var null|Template2[]
     */
    private $second_tax_ids;

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
     * @param TemplateAlias $chart_template_id Chart Template
     * @param string $name Button Label
     * @param int $sequence Sequence
     * @param array $rule_type Type
     * @param array $match_nature Amount Nature
     *        The reconciliation model will only be applied to the selected transaction type:
     *        * Amount Received: Only applied when receiving an amount.
     *        * Amount Paid: Only applied when paying an amount.
     *        * Amount Paid/Received: Applied in both cases.
     * @param array $amount_type Amount Type
     * @param float $amount Write-off Amount
     *        Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     * @param array $second_amount_type Second Amount type
     * @param float $second_amount Second Write-off Amount
     *        Fixed amount will count as a debit if it is negative, as a credit if it is positive.
     */
    public function __construct(
        TemplateAlias $chart_template_id,
        string $name,
        int $sequence,
        array $rule_type,
        array $match_nature,
        array $amount_type,
        float $amount,
        array $second_amount_type,
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
     * @param array $amount_type
     */
    public function setAmountType(array $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @param null|bool $force_tax_included
     */
    public function setForceTaxIncluded(?bool $force_tax_included): void
    {
        $this->force_tax_included = $force_tax_included;
    }

    /**
     * @param null|string $decimal_separator
     */
    public function setDecimalSeparator(?string $decimal_separator): void
    {
        $this->decimal_separator = $decimal_separator;
    }

    /**
     * @param null|string $amount_from_label_regex
     */
    public function setAmountFromLabelRegex(?string $amount_from_label_regex): void
    {
        $this->amount_from_label_regex = $amount_from_label_regex;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $item
     */
    public function removeAmountType($item): void
    {
        if ($this->hasAmountType($item)) {
            $index = array_search($item, $this->amount_type);
            unset($this->amount_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAmountType($item): void
    {
        if ($this->hasAmountType($item)) {
            return;
        }

        $this->amount_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAmountType($item, bool $strict = true): bool
    {
        return in_array($item, $this->amount_type, $strict);
    }

    /**
     * @param null|string $label
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * @param null|Template2[] $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param null|TemplateAliasAlias $account_id
     */
    public function setAccountId(?TemplateAliasAlias $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param Category $item
     */
    public function removeMatchPartnerCategoryIds(Category $item): void
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
     * @param Category $item
     */
    public function addMatchPartnerCategoryIds(Category $item): void
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
     * @param Category $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchPartnerCategoryIds(Category $item, bool $strict = true): bool
    {
        if (null === $this->match_partner_category_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_category_ids, $strict);
    }

    /**
     * @param null|Category[] $match_partner_category_ids
     */
    public function setMatchPartnerCategoryIds(?array $match_partner_category_ids): void
    {
        $this->match_partner_category_ids = $match_partner_category_ids;
    }

    /**
     * @param Partner $item
     */
    public function removeMatchPartnerIds(Partner $item): void
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
     * @param Partner $item
     */
    public function addMatchPartnerIds(Partner $item): void
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
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->match_partner_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_ids, $strict);
    }

    /**
     * @param null|bool $has_second_line
     */
    public function setHasSecondLine(?bool $has_second_line): void
    {
        $this->has_second_line = $has_second_line;
    }

    /**
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids, $strict);
    }

    /**
     * @param null|bool $match_partner
     */
    public function setMatchPartner(?bool $match_partner): void
    {
        $this->match_partner = $match_partner;
    }

    /**
     * @param null|bool $force_second_tax_included
     */
    public function setForceSecondTaxIncluded(?bool $force_second_tax_included): void
    {
        $this->force_second_tax_included = $force_second_tax_included;
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
     * @param Template2 $item
     */
    public function removeSecondTaxIds(Template2 $item): void
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
     * @param Template2 $item
     */
    public function addSecondTaxIds(Template2 $item): void
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
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSecondTaxIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->second_tax_ids) {
            return false;
        }

        return in_array($item, $this->second_tax_ids, $strict);
    }

    /**
     * @param null|Template2[] $second_tax_ids
     */
    public function setSecondTaxIds(?array $second_tax_ids): void
    {
        $this->second_tax_ids = $second_tax_ids;
    }

    /**
     * @param null|string $second_amount_from_label_regex
     */
    public function setSecondAmountFromLabelRegex(?string $second_amount_from_label_regex): void
    {
        $this->second_amount_from_label_regex = $second_amount_from_label_regex;
    }

    /**
     * @param Template2 $item
     */
    public function addTaxIds(Template2 $item): void
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
     * @param float $second_amount
     */
    public function setSecondAmount(float $second_amount): void
    {
        $this->second_amount = $second_amount;
    }

    /**
     * @param mixed $item
     */
    public function removeSecondAmountType($item): void
    {
        if ($this->hasSecondAmountType($item)) {
            $index = array_search($item, $this->second_amount_type);
            unset($this->second_amount_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSecondAmountType($item): void
    {
        if ($this->hasSecondAmountType($item)) {
            return;
        }

        $this->second_amount_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSecondAmountType($item, bool $strict = true): bool
    {
        return in_array($item, $this->second_amount_type, $strict);
    }

    /**
     * @param array $second_amount_type
     */
    public function setSecondAmountType(array $second_amount_type): void
    {
        $this->second_amount_type = $second_amount_type;
    }

    /**
     * @param null|string $second_label
     */
    public function setSecondLabel(?string $second_label): void
    {
        $this->second_label = $second_label;
    }

    /**
     * @param null|TemplateAliasAlias $second_account_id
     */
    public function setSecondAccountId(?TemplateAliasAlias $second_account_id): void
    {
        $this->second_account_id = $second_account_id;
    }

    /**
     * @param Template2 $item
     */
    public function removeTaxIds(Template2 $item): void
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
     * @param null|Partner[] $match_partner_ids
     */
    public function setMatchPartnerIds(?array $match_partner_ids): void
    {
        $this->match_partner_ids = $match_partner_ids;
    }

    /**
     * @param null|float $match_total_amount_param
     */
    public function setMatchTotalAmountParam(?float $match_total_amount_param): void
    {
        $this->match_total_amount_param = $match_total_amount_param;
    }

    /**
     * @param TemplateAlias $chart_template_id
     */
    public function setChartTemplateId(TemplateAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param Journal $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchJournalIds(Journal $item, bool $strict = true): bool
    {
        if (null === $this->match_journal_ids) {
            return false;
        }

        return in_array($item, $this->match_journal_ids, $strict);
    }

    /**
     * @param null|array $match_amount
     */
    public function setMatchAmount(?array $match_amount): void
    {
        $this->match_amount = $match_amount;
    }

    /**
     * @param mixed $item
     */
    public function removeMatchNature($item): void
    {
        if ($this->hasMatchNature($item)) {
            $index = array_search($item, $this->match_nature);
            unset($this->match_nature[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addMatchNature($item): void
    {
        if ($this->hasMatchNature($item)) {
            return;
        }

        $this->match_nature[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchNature($item, bool $strict = true): bool
    {
        return in_array($item, $this->match_nature, $strict);
    }

    /**
     * @param array $match_nature
     */
    public function setMatchNature(array $match_nature): void
    {
        $this->match_nature = $match_nature;
    }

    /**
     * @param Journal $item
     */
    public function removeMatchJournalIds(Journal $item): void
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
     * @param Journal $item
     */
    public function addMatchJournalIds(Journal $item): void
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
     * @param null|Journal[] $match_journal_ids
     */
    public function setMatchJournalIds(?array $match_journal_ids): void
    {
        $this->match_journal_ids = $match_journal_ids;
    }

    /**
     * @param mixed $item
     */
    public function addMatchAmount($item): void
    {
        if ($this->hasMatchAmount($item)) {
            return;
        }

        if (null === $this->match_amount) {
            $this->match_amount = [];
        }

        $this->match_amount[] = $item;
    }

    /**
     * @param null|bool $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @param null|bool $auto_reconcile
     */
    public function setAutoReconcile(?bool $auto_reconcile): void
    {
        $this->auto_reconcile = $auto_reconcile;
    }

    /**
     * @param mixed $item
     */
    public function removeRuleType($item): void
    {
        if ($this->hasRuleType($item)) {
            $index = array_search($item, $this->rule_type);
            unset($this->rule_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addRuleType($item): void
    {
        if ($this->hasRuleType($item)) {
            return;
        }

        $this->rule_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRuleType($item, bool $strict = true): bool
    {
        return in_array($item, $this->rule_type, $strict);
    }

    /**
     * @param array $rule_type
     */
    public function setRuleType(array $rule_type): void
    {
        $this->rule_type = $rule_type;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchAmount($item, bool $strict = true): bool
    {
        if (null === $this->match_amount) {
            return false;
        }

        return in_array($item, $this->match_amount, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeMatchAmount($item): void
    {
        if (null === $this->match_amount) {
            $this->match_amount = [];
        }

        if ($this->hasMatchAmount($item)) {
            $index = array_search($item, $this->match_amount);
            unset($this->match_amount[$index]);
        }
    }

    /**
     * @param null|bool $match_total_amount
     */
    public function setMatchTotalAmount(?bool $match_total_amount): void
    {
        $this->match_total_amount = $match_total_amount;
    }

    /**
     * @param mixed $item
     */
    public function removeMatchNote($item): void
    {
        if (null === $this->match_note) {
            $this->match_note = [];
        }

        if ($this->hasMatchNote($item)) {
            $index = array_search($item, $this->match_note);
            unset($this->match_note[$index]);
        }
    }

    /**
     * @param null|bool $match_same_currency
     */
    public function setMatchSameCurrency(?bool $match_same_currency): void
    {
        $this->match_same_currency = $match_same_currency;
    }

    /**
     * @param null|string $match_transaction_type_param
     */
    public function setMatchTransactionTypeParam(?string $match_transaction_type_param): void
    {
        $this->match_transaction_type_param = $match_transaction_type_param;
    }

    /**
     * @param mixed $item
     */
    public function removeMatchTransactionType($item): void
    {
        if (null === $this->match_transaction_type) {
            $this->match_transaction_type = [];
        }

        if ($this->hasMatchTransactionType($item)) {
            $index = array_search($item, $this->match_transaction_type);
            unset($this->match_transaction_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addMatchTransactionType($item): void
    {
        if ($this->hasMatchTransactionType($item)) {
            return;
        }

        if (null === $this->match_transaction_type) {
            $this->match_transaction_type = [];
        }

        $this->match_transaction_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchTransactionType($item, bool $strict = true): bool
    {
        if (null === $this->match_transaction_type) {
            return false;
        }

        return in_array($item, $this->match_transaction_type, $strict);
    }

    /**
     * @param null|array $match_transaction_type
     */
    public function setMatchTransactionType(?array $match_transaction_type): void
    {
        $this->match_transaction_type = $match_transaction_type;
    }

    /**
     * @param null|string $match_note_param
     */
    public function setMatchNoteParam(?string $match_note_param): void
    {
        $this->match_note_param = $match_note_param;
    }

    /**
     * @param mixed $item
     */
    public function addMatchNote($item): void
    {
        if ($this->hasMatchNote($item)) {
            return;
        }

        if (null === $this->match_note) {
            $this->match_note = [];
        }

        $this->match_note[] = $item;
    }

    /**
     * @param null|float $match_amount_min
     */
    public function setMatchAmountMin(?float $match_amount_min): void
    {
        $this->match_amount_min = $match_amount_min;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchNote($item, bool $strict = true): bool
    {
        if (null === $this->match_note) {
            return false;
        }

        return in_array($item, $this->match_note, $strict);
    }

    /**
     * @param null|array $match_note
     */
    public function setMatchNote(?array $match_note): void
    {
        $this->match_note = $match_note;
    }

    /**
     * @param null|string $match_label_param
     */
    public function setMatchLabelParam(?string $match_label_param): void
    {
        $this->match_label_param = $match_label_param;
    }

    /**
     * @param mixed $item
     */
    public function removeMatchLabel($item): void
    {
        if (null === $this->match_label) {
            $this->match_label = [];
        }

        if ($this->hasMatchLabel($item)) {
            $index = array_search($item, $this->match_label);
            unset($this->match_label[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addMatchLabel($item): void
    {
        if ($this->hasMatchLabel($item)) {
            return;
        }

        if (null === $this->match_label) {
            $this->match_label = [];
        }

        $this->match_label[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchLabel($item, bool $strict = true): bool
    {
        if (null === $this->match_label) {
            return false;
        }

        return in_array($item, $this->match_label, $strict);
    }

    /**
     * @param null|array $match_label
     */
    public function setMatchLabel(?array $match_label): void
    {
        $this->match_label = $match_label;
    }

    /**
     * @param null|float $match_amount_max
     */
    public function setMatchAmountMax(?float $match_amount_max): void
    {
        $this->match_amount_max = $match_amount_max;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
