<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Chart;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as Template2;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.chart.template
 * Name : account.chart.template
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
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Parent Chart Template
     *
     * @var null|TemplateAlias
     */
    private $parent_id;

    /**
     * # of Digits
     * No. of Digits to use for account code
     *
     * @var int
     */
    private $code_digits;

    /**
     * Can be Visible?
     * Set this to False if you don't want this template to be used actively in the wizard that generate Chart of
     * Accounts from templates, this is useful when you want to generate accounts of this template only when loading
     * its child template.
     *
     * @var null|bool
     */
    private $visible;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Use Anglo-Saxon accounting
     *
     * @var null|bool
     */
    private $use_anglo_saxon;

    /**
     * Complete Set of Taxes
     * This boolean helps you to choose if you want to propose to the user to encode the sale and purchase rates or
     * choose from list of taxes. This last choice assumes that the set of tax defined on this template is complete
     *
     * @var null|bool
     */
    private $complete_tax_set;

    /**
     * Associated Account Templates
     *
     * @var null|TemplateAliasAlias[]
     */
    private $account_ids;

    /**
     * Tax Template List
     * List of all the taxes that have to be installed by the wizard
     *
     * @var null|Template2[]
     */
    private $tax_template_ids;

    /**
     * Prefix of the bank accounts
     *
     * @var string
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the main cash accounts
     *
     * @var string
     */
    private $cash_account_code_prefix;

    /**
     * Prefix of the main transfer accounts
     *
     * @var string
     */
    private $transfer_account_code_prefix;

    /**
     * Gain Exchange Rate Account
     *
     * @var null|TemplateAliasAlias
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     *
     * @var null|TemplateAliasAlias
     */
    private $expense_currency_exchange_account_id;

    /**
     * Cash Difference Income Account
     *
     * @var null|TemplateAliasAlias
     */
    private $default_cash_difference_income_account_id;

    /**
     * Cash Difference Expense Account
     *
     * @var null|TemplateAliasAlias
     */
    private $default_cash_difference_expense_account_id;

    /**
     * PoS receivable account
     *
     * @var null|TemplateAliasAlias
     */
    private $default_pos_receivable_account_id;

    /**
     * Receivable Account
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_receivable_id;

    /**
     * Payable Account
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_payable_id;

    /**
     * Category of Expense Account
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_expense_categ_id;

    /**
     * Category of Income Account
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account on Product Template
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_expense_id;

    /**
     * Income Account on Product Template
     *
     * @var null|TemplateAliasAlias
     */
    private $property_account_income_id;

    /**
     * Input Account for Stock Valuation
     *
     * @var null|TemplateAliasAlias
     */
    private $property_stock_account_input_categ_id;

    /**
     * Output Account for Stock Valuation
     *
     * @var null|TemplateAliasAlias
     */
    private $property_stock_account_output_categ_id;

    /**
     * Account Template for Stock Valuation
     *
     * @var null|TemplateAliasAlias
     */
    private $property_stock_valuation_account_id;

    /**
     * Tax current account (payable)
     *
     * @var null|TemplateAliasAlias
     */
    private $property_tax_payable_account_id;

    /**
     * Tax current account (receivable)
     *
     * @var null|TemplateAliasAlias
     */
    private $property_tax_receivable_account_id;

    /**
     * Advance tax payment account
     *
     * @var null|TemplateAliasAlias
     */
    private $property_advance_tax_payment_account_id;

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
     * @param string $name Name
     * @param int $code_digits # of Digits
     *        No. of Digits to use for account code
     * @param Currency $currency_id Currency
     * @param string $bank_account_code_prefix Prefix of the bank accounts
     * @param string $cash_account_code_prefix Prefix of the main cash accounts
     * @param string $transfer_account_code_prefix Prefix of the main transfer accounts
     */
    public function __construct(
        string $name,
        int $code_digits,
        Currency $currency_id,
        string $bank_account_code_prefix,
        string $cash_account_code_prefix,
        string $transfer_account_code_prefix
    ) {
        $this->name = $name;
        $this->code_digits = $code_digits;
        $this->currency_id = $currency_id;
        $this->bank_account_code_prefix = $bank_account_code_prefix;
        $this->cash_account_code_prefix = $cash_account_code_prefix;
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @param null|TemplateAliasAlias $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(
        ?TemplateAliasAlias $property_stock_account_input_categ_id
    ): void {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param null|TemplateAliasAlias $default_pos_receivable_account_id
     */
    public function setDefaultPosReceivableAccountId(
        ?TemplateAliasAlias $default_pos_receivable_account_id
    ): void {
        $this->default_pos_receivable_account_id = $default_pos_receivable_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(
        ?TemplateAliasAlias $property_account_receivable_id
    ): void {
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_payable_id
     */
    public function setPropertyAccountPayableId(?TemplateAliasAlias $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(
        ?TemplateAliasAlias $property_account_expense_categ_id
    ): void {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(
        ?TemplateAliasAlias $property_account_income_categ_id
    ): void {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(?TemplateAliasAlias $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_account_income_id
     */
    public function setPropertyAccountIncomeId(?TemplateAliasAlias $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        ?TemplateAliasAlias $property_stock_account_output_categ_id
    ): void {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @param null|TemplateAliasAlias $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        ?TemplateAliasAlias $default_cash_difference_income_account_id
    ): void {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(
        ?TemplateAliasAlias $property_stock_valuation_account_id
    ): void {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_tax_payable_account_id
     */
    public function setPropertyTaxPayableAccountId(
        ?TemplateAliasAlias $property_tax_payable_account_id
    ): void {
        $this->property_tax_payable_account_id = $property_tax_payable_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_tax_receivable_account_id
     */
    public function setPropertyTaxReceivableAccountId(
        ?TemplateAliasAlias $property_tax_receivable_account_id
    ): void {
        $this->property_tax_receivable_account_id = $property_tax_receivable_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $property_advance_tax_payment_account_id
     */
    public function setPropertyAdvanceTaxPaymentAccountId(
        ?TemplateAliasAlias $property_advance_tax_payment_account_id
    ): void {
        $this->property_advance_tax_payment_account_id = $property_advance_tax_payment_account_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param null|TemplateAliasAlias $default_cash_difference_expense_account_id
     */
    public function setDefaultCashDifferenceExpenseAccountId(
        ?TemplateAliasAlias $default_cash_difference_expense_account_id
    ): void {
        $this->default_cash_difference_expense_account_id = $default_cash_difference_expense_account_id;
    }

    /**
     * @param null|TemplateAliasAlias $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(
        ?TemplateAliasAlias $expense_currency_exchange_account_id
    ): void {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param TemplateAliasAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountIds(TemplateAliasAlias $item, bool $strict = true): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids, $strict);
    }

    /**
     * @param null|TemplateAlias $parent_id
     */
    public function setParentId(?TemplateAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param int $code_digits
     */
    public function setCodeDigits(int $code_digits): void
    {
        $this->code_digits = $code_digits;
    }

    /**
     * @param null|bool $visible
     */
    public function setVisible(?bool $visible): void
    {
        $this->visible = $visible;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|bool $use_anglo_saxon
     */
    public function setUseAngloSaxon(?bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @param null|bool $complete_tax_set
     */
    public function setCompleteTaxSet(?bool $complete_tax_set): void
    {
        $this->complete_tax_set = $complete_tax_set;
    }

    /**
     * @param null|TemplateAliasAlias[] $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param TemplateAliasAlias $item
     */
    public function addAccountIds(TemplateAliasAlias $item): void
    {
        if ($this->hasAccountIds($item)) {
            return;
        }

        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        $this->account_ids[] = $item;
    }

    /**
     * @param null|TemplateAliasAlias $income_currency_exchange_account_id
     */
    public function setIncomeCurrencyExchangeAccountId(
        ?TemplateAliasAlias $income_currency_exchange_account_id
    ): void {
        $this->income_currency_exchange_account_id = $income_currency_exchange_account_id;
    }

    /**
     * @param TemplateAliasAlias $item
     */
    public function removeAccountIds(TemplateAliasAlias $item): void
    {
        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        if ($this->hasAccountIds($item)) {
            $index = array_search($item, $this->account_ids);
            unset($this->account_ids[$index]);
        }
    }

    /**
     * @param null|Template2[] $tax_template_ids
     */
    public function setTaxTemplateIds(?array $tax_template_ids): void
    {
        $this->tax_template_ids = $tax_template_ids;
    }

    /**
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxTemplateIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->tax_template_ids) {
            return false;
        }

        return in_array($item, $this->tax_template_ids, $strict);
    }

    /**
     * @param Template2 $item
     */
    public function addTaxTemplateIds(Template2 $item): void
    {
        if ($this->hasTaxTemplateIds($item)) {
            return;
        }

        if (null === $this->tax_template_ids) {
            $this->tax_template_ids = [];
        }

        $this->tax_template_ids[] = $item;
    }

    /**
     * @param Template2 $item
     */
    public function removeTaxTemplateIds(Template2 $item): void
    {
        if (null === $this->tax_template_ids) {
            $this->tax_template_ids = [];
        }

        if ($this->hasTaxTemplateIds($item)) {
            $index = array_search($item, $this->tax_template_ids);
            unset($this->tax_template_ids[$index]);
        }
    }

    /**
     * @param string $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @param string $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
    }

    /**
     * @param string $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(string $transfer_account_code_prefix): void
    {
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
