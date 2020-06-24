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
 *
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
     * @var null|TemplateAlias
     */
    private $chart_template_id;

    /**
     * Button Label
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Type
     *
     * @var null|array
     */
    private $rule_type;

    /**
     * Auto-validate
     *
     * @var bool
     */
    private $auto_reconcile;

    /**
     * To Check
     *
     * @var bool
     */
    private $to_check;

    /**
     * Journals
     *
     * @var Journal
     */
    private $match_journal_ids;

    /**
     * Amount Nature
     *
     * @var null|array
     */
    private $match_nature;

    /**
     * Amount
     *
     * @var array
     */
    private $match_amount;

    /**
     * Amount Min Parameter
     *
     * @var float
     */
    private $match_amount_min;

    /**
     * Amount Max Parameter
     *
     * @var float
     */
    private $match_amount_max;

    /**
     * Label
     *
     * @var array
     */
    private $match_label;

    /**
     * Label Parameter
     *
     * @var string
     */
    private $match_label_param;

    /**
     * Note
     *
     * @var array
     */
    private $match_note;

    /**
     * Note Parameter
     *
     * @var string
     */
    private $match_note_param;

    /**
     * Transaction Type
     *
     * @var array
     */
    private $match_transaction_type;

    /**
     * Transaction Type Parameter
     *
     * @var string
     */
    private $match_transaction_type_param;

    /**
     * Same Currency Matching
     *
     * @var bool
     */
    private $match_same_currency;

    /**
     * Amount Matching
     *
     * @var bool
     */
    private $match_total_amount;

    /**
     * Amount Matching %
     *
     * @var float
     */
    private $match_total_amount_param;

    /**
     * Partner Is Set
     *
     * @var bool
     */
    private $match_partner;

    /**
     * Restrict Partners to
     *
     * @var Partner
     */
    private $match_partner_ids;

    /**
     * Restrict Partner Categories to
     *
     * @var Category
     */
    private $match_partner_category_ids;

    /**
     * Account
     *
     * @var TemplateAliasAlias
     */
    private $account_id;

    /**
     * Journal Item Label
     *
     * @var string
     */
    private $label;

    /**
     * Amount Type
     *
     * @var null|array
     */
    private $amount_type;

    /**
     * Write-off Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Amount from Label (regex)
     *
     * @var string
     */
    private $amount_from_label_regex;

    /**
     * Decimal Separator
     *
     * @var string
     */
    private $decimal_separator;

    /**
     * Tax Included in Price
     *
     * @var bool
     */
    private $force_tax_included;

    /**
     * Add a second line
     *
     * @var bool
     */
    private $has_second_line;

    /**
     * Taxes
     *
     * @var Template2
     */
    private $tax_ids;

    /**
     * Second Account
     *
     * @var TemplateAliasAlias
     */
    private $second_account_id;

    /**
     * Second Journal Item Label
     *
     * @var string
     */
    private $second_label;

    /**
     * Second Amount type
     *
     * @var null|array
     */
    private $second_amount_type;

    /**
     * Second Write-off Amount
     *
     * @var null|float
     */
    private $second_amount;

    /**
     * Second Amount from Label (regex)
     *
     * @var string
     */
    private $second_amount_from_label_regex;

    /**
     * Second Tax Included in Price
     *
     * @var bool
     */
    private $force_second_tax_included;

    /**
     * Second Taxes
     *
     * @var Template2
     */
    private $second_tax_ids;

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
     * @param null|TemplateAlias $chart_template_id
     */
    public function setChartTemplateId(TemplateAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param bool $force_tax_included
     */
    public function setForceTaxIncluded(bool $force_tax_included): void
    {
        $this->force_tax_included = $force_tax_included;
    }

    /**
     * @param bool $match_total_amount
     */
    public function setMatchTotalAmount(bool $match_total_amount): void
    {
        $this->match_total_amount = $match_total_amount;
    }

    /**
     * @param float $match_total_amount_param
     */
    public function setMatchTotalAmountParam(float $match_total_amount_param): void
    {
        $this->match_total_amount_param = $match_total_amount_param;
    }

    /**
     * @param bool $match_partner
     */
    public function setMatchPartner(bool $match_partner): void
    {
        $this->match_partner = $match_partner;
    }

    /**
     * @param Partner $match_partner_ids
     */
    public function setMatchPartnerIds(Partner $match_partner_ids): void
    {
        $this->match_partner_ids = $match_partner_ids;
    }

    /**
     * @param Category $match_partner_category_ids
     */
    public function setMatchPartnerCategoryIds(Category $match_partner_category_ids): void
    {
        $this->match_partner_category_ids = $match_partner_category_ids;
    }

    /**
     * @param TemplateAliasAlias $account_id
     */
    public function setAccountId(TemplateAliasAlias $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @param null|array $amount_type
     */
    public function setAmountType(?array $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @param ?array $amount_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAmountType(?array $amount_type, bool $strict = true): bool
    {
        if (null === $this->amount_type) {
            return false;
        }

        return in_array($amount_type, $this->amount_type, $strict);
    }

    /**
     * @param ?array $amount_type
     */
    public function addAmountType(?array $amount_type): void
    {
        if ($this->hasAmountType($amount_type)) {
            return;
        }

        if (null === $this->amount_type) {
            $this->amount_type = [];
        }

        $this->amount_type[] = $amount_type;
    }

    /**
     * @param ?array $amount_type
     */
    public function removeAmountType(?array $amount_type): void
    {
        if ($this->hasAmountType($amount_type)) {
            $index = array_search($amount_type, $this->amount_type);
            unset($this->amount_type[$index]);
        }
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param string $amount_from_label_regex
     */
    public function setAmountFromLabelRegex(string $amount_from_label_regex): void
    {
        $this->amount_from_label_regex = $amount_from_label_regex;
    }

    /**
     * @param string $decimal_separator
     */
    public function setDecimalSeparator(string $decimal_separator): void
    {
        $this->decimal_separator = $decimal_separator;
    }

    /**
     * @param bool $has_second_line
     */
    public function setHasSecondLine(bool $has_second_line): void
    {
        $this->has_second_line = $has_second_line;
    }

    /**
     * @param string $match_transaction_type_param
     */
    public function setMatchTransactionTypeParam(string $match_transaction_type_param): void
    {
        $this->match_transaction_type_param = $match_transaction_type_param;
    }

    /**
     * @param Template2 $tax_ids
     */
    public function setTaxIds(Template2 $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param TemplateAliasAlias $second_account_id
     */
    public function setSecondAccountId(TemplateAliasAlias $second_account_id): void
    {
        $this->second_account_id = $second_account_id;
    }

    /**
     * @param string $second_label
     */
    public function setSecondLabel(string $second_label): void
    {
        $this->second_label = $second_label;
    }

    /**
     * @param null|array $second_amount_type
     */
    public function setSecondAmountType(?array $second_amount_type): void
    {
        $this->second_amount_type = $second_amount_type;
    }

    /**
     * @param ?array $second_amount_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSecondAmountType(?array $second_amount_type, bool $strict = true): bool
    {
        if (null === $this->second_amount_type) {
            return false;
        }

        return in_array($second_amount_type, $this->second_amount_type, $strict);
    }

    /**
     * @param ?array $second_amount_type
     */
    public function addSecondAmountType(?array $second_amount_type): void
    {
        if ($this->hasSecondAmountType($second_amount_type)) {
            return;
        }

        if (null === $this->second_amount_type) {
            $this->second_amount_type = [];
        }

        $this->second_amount_type[] = $second_amount_type;
    }

    /**
     * @param ?array $second_amount_type
     */
    public function removeSecondAmountType(?array $second_amount_type): void
    {
        if ($this->hasSecondAmountType($second_amount_type)) {
            $index = array_search($second_amount_type, $this->second_amount_type);
            unset($this->second_amount_type[$index]);
        }
    }

    /**
     * @param null|float $second_amount
     */
    public function setSecondAmount(?float $second_amount): void
    {
        $this->second_amount = $second_amount;
    }

    /**
     * @param string $second_amount_from_label_regex
     */
    public function setSecondAmountFromLabelRegex(string $second_amount_from_label_regex): void
    {
        $this->second_amount_from_label_regex = $second_amount_from_label_regex;
    }

    /**
     * @param bool $force_second_tax_included
     */
    public function setForceSecondTaxIncluded(bool $force_second_tax_included): void
    {
        $this->force_second_tax_included = $force_second_tax_included;
    }

    /**
     * @param Template2 $second_tax_ids
     */
    public function setSecondTaxIds(Template2 $second_tax_ids): void
    {
        $this->second_tax_ids = $second_tax_ids;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @param bool $match_same_currency
     */
    public function setMatchSameCurrency(bool $match_same_currency): void
    {
        $this->match_same_currency = $match_same_currency;
    }

    /**
     * @param array $match_transaction_type
     */
    public function removeMatchTransactionType(array $match_transaction_type): void
    {
        if ($this->hasMatchTransactionType($match_transaction_type)) {
            $index = array_search($match_transaction_type, $this->match_transaction_type);
            unset($this->match_transaction_type[$index]);
        }
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $match_amount
     */
    public function addMatchAmount(array $match_amount): void
    {
        if ($this->hasMatchAmount($match_amount)) {
            return;
        }

        $this->match_amount[] = $match_amount;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|array $rule_type
     */
    public function setRuleType(?array $rule_type): void
    {
        $this->rule_type = $rule_type;
    }

    /**
     * @param ?array $rule_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRuleType(?array $rule_type, bool $strict = true): bool
    {
        if (null === $this->rule_type) {
            return false;
        }

        return in_array($rule_type, $this->rule_type, $strict);
    }

    /**
     * @param ?array $rule_type
     */
    public function addRuleType(?array $rule_type): void
    {
        if ($this->hasRuleType($rule_type)) {
            return;
        }

        if (null === $this->rule_type) {
            $this->rule_type = [];
        }

        $this->rule_type[] = $rule_type;
    }

    /**
     * @param ?array $rule_type
     */
    public function removeRuleType(?array $rule_type): void
    {
        if ($this->hasRuleType($rule_type)) {
            $index = array_search($rule_type, $this->rule_type);
            unset($this->rule_type[$index]);
        }
    }

    /**
     * @param bool $auto_reconcile
     */
    public function setAutoReconcile(bool $auto_reconcile): void
    {
        $this->auto_reconcile = $auto_reconcile;
    }

    /**
     * @param bool $to_check
     */
    public function setToCheck(bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @param Journal $match_journal_ids
     */
    public function setMatchJournalIds(Journal $match_journal_ids): void
    {
        $this->match_journal_ids = $match_journal_ids;
    }

    /**
     * @param null|array $match_nature
     */
    public function setMatchNature(?array $match_nature): void
    {
        $this->match_nature = $match_nature;
    }

    /**
     * @param ?array $match_nature
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchNature(?array $match_nature, bool $strict = true): bool
    {
        if (null === $this->match_nature) {
            return false;
        }

        return in_array($match_nature, $this->match_nature, $strict);
    }

    /**
     * @param ?array $match_nature
     */
    public function addMatchNature(?array $match_nature): void
    {
        if ($this->hasMatchNature($match_nature)) {
            return;
        }

        if (null === $this->match_nature) {
            $this->match_nature = [];
        }

        $this->match_nature[] = $match_nature;
    }

    /**
     * @param ?array $match_nature
     */
    public function removeMatchNature(?array $match_nature): void
    {
        if ($this->hasMatchNature($match_nature)) {
            $index = array_search($match_nature, $this->match_nature);
            unset($this->match_nature[$index]);
        }
    }

    /**
     * @param array $match_amount
     */
    public function setMatchAmount(array $match_amount): void
    {
        $this->match_amount = $match_amount;
    }

    /**
     * @param array $match_amount
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchAmount(array $match_amount, bool $strict = true): bool
    {
        return in_array($match_amount, $this->match_amount, $strict);
    }

    /**
     * @param array $match_amount
     */
    public function removeMatchAmount(array $match_amount): void
    {
        if ($this->hasMatchAmount($match_amount)) {
            $index = array_search($match_amount, $this->match_amount);
            unset($this->match_amount[$index]);
        }
    }

    /**
     * @param array $match_transaction_type
     */
    public function addMatchTransactionType(array $match_transaction_type): void
    {
        if ($this->hasMatchTransactionType($match_transaction_type)) {
            return;
        }

        $this->match_transaction_type[] = $match_transaction_type;
    }

    /**
     * @param float $match_amount_min
     */
    public function setMatchAmountMin(float $match_amount_min): void
    {
        $this->match_amount_min = $match_amount_min;
    }

    /**
     * @param float $match_amount_max
     */
    public function setMatchAmountMax(float $match_amount_max): void
    {
        $this->match_amount_max = $match_amount_max;
    }

    /**
     * @param array $match_label
     */
    public function setMatchLabel(array $match_label): void
    {
        $this->match_label = $match_label;
    }

    /**
     * @param array $match_label
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchLabel(array $match_label, bool $strict = true): bool
    {
        return in_array($match_label, $this->match_label, $strict);
    }

    /**
     * @param array $match_label
     */
    public function addMatchLabel(array $match_label): void
    {
        if ($this->hasMatchLabel($match_label)) {
            return;
        }

        $this->match_label[] = $match_label;
    }

    /**
     * @param array $match_label
     */
    public function removeMatchLabel(array $match_label): void
    {
        if ($this->hasMatchLabel($match_label)) {
            $index = array_search($match_label, $this->match_label);
            unset($this->match_label[$index]);
        }
    }

    /**
     * @param string $match_label_param
     */
    public function setMatchLabelParam(string $match_label_param): void
    {
        $this->match_label_param = $match_label_param;
    }

    /**
     * @param array $match_note
     */
    public function setMatchNote(array $match_note): void
    {
        $this->match_note = $match_note;
    }

    /**
     * @param array $match_note
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchNote(array $match_note, bool $strict = true): bool
    {
        return in_array($match_note, $this->match_note, $strict);
    }

    /**
     * @param array $match_note
     */
    public function addMatchNote(array $match_note): void
    {
        if ($this->hasMatchNote($match_note)) {
            return;
        }

        $this->match_note[] = $match_note;
    }

    /**
     * @param array $match_note
     */
    public function removeMatchNote(array $match_note): void
    {
        if ($this->hasMatchNote($match_note)) {
            $index = array_search($match_note, $this->match_note);
            unset($this->match_note[$index]);
        }
    }

    /**
     * @param string $match_note_param
     */
    public function setMatchNoteParam(string $match_note_param): void
    {
        $this->match_note_param = $match_note_param;
    }

    /**
     * @param array $match_transaction_type
     */
    public function setMatchTransactionType(array $match_transaction_type): void
    {
        $this->match_transaction_type = $match_transaction_type;
    }

    /**
     * @param array $match_transaction_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMatchTransactionType(array $match_transaction_type, bool $strict = true): bool
    {
        return in_array($match_transaction_type, $this->match_transaction_type, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
