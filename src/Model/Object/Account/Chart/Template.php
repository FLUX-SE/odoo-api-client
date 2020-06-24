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
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Parent Chart Template
     *
     * @var TemplateAlias
     */
    private $parent_id;

    /**
     * # of Digits
     *
     * @var null|int
     */
    private $code_digits;

    /**
     * Can be Visible?
     *
     * @var bool
     */
    private $visible;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Use Anglo-Saxon accounting
     *
     * @var bool
     */
    private $use_anglo_saxon;

    /**
     * Complete Set of Taxes
     *
     * @var bool
     */
    private $complete_tax_set;

    /**
     * Associated Account Templates
     *
     * @var TemplateAliasAlias
     */
    private $account_ids;

    /**
     * Tax Template List
     *
     * @var Template2
     */
    private $tax_template_ids;

    /**
     * Prefix of the bank accounts
     *
     * @var null|string
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the main cash accounts
     *
     * @var null|string
     */
    private $cash_account_code_prefix;

    /**
     * Prefix of the main transfer accounts
     *
     * @var null|string
     */
    private $transfer_account_code_prefix;

    /**
     * Gain Exchange Rate Account
     *
     * @var TemplateAliasAlias
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     *
     * @var TemplateAliasAlias
     */
    private $expense_currency_exchange_account_id;

    /**
     * Cash Difference Income Account
     *
     * @var TemplateAliasAlias
     */
    private $default_cash_difference_income_account_id;

    /**
     * Cash Difference Expense Account
     *
     * @var TemplateAliasAlias
     */
    private $default_cash_difference_expense_account_id;

    /**
     * PoS receivable account
     *
     * @var TemplateAliasAlias
     */
    private $default_pos_receivable_account_id;

    /**
     * Receivable Account
     *
     * @var TemplateAliasAlias
     */
    private $property_account_receivable_id;

    /**
     * Payable Account
     *
     * @var TemplateAliasAlias
     */
    private $property_account_payable_id;

    /**
     * Category of Expense Account
     *
     * @var TemplateAliasAlias
     */
    private $property_account_expense_categ_id;

    /**
     * Category of Income Account
     *
     * @var TemplateAliasAlias
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account on Product Template
     *
     * @var TemplateAliasAlias
     */
    private $property_account_expense_id;

    /**
     * Income Account on Product Template
     *
     * @var TemplateAliasAlias
     */
    private $property_account_income_id;

    /**
     * Input Account for Stock Valuation
     *
     * @var TemplateAliasAlias
     */
    private $property_stock_account_input_categ_id;

    /**
     * Output Account for Stock Valuation
     *
     * @var TemplateAliasAlias
     */
    private $property_stock_account_output_categ_id;

    /**
     * Account Template for Stock Valuation
     *
     * @var TemplateAliasAlias
     */
    private $property_stock_valuation_account_id;

    /**
     * Tax current account (payable)
     *
     * @var TemplateAliasAlias
     */
    private $property_tax_payable_account_id;

    /**
     * Tax current account (receivable)
     *
     * @var TemplateAliasAlias
     */
    private $property_tax_receivable_account_id;

    /**
     * Advance tax payment account
     *
     * @var TemplateAliasAlias
     */
    private $property_advance_tax_payment_account_id;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param TemplateAliasAlias $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(TemplateAliasAlias $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
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
     * @param TemplateAliasAlias $property_advance_tax_payment_account_id
     */
    public function setPropertyAdvanceTaxPaymentAccountId(
        TemplateAliasAlias $property_advance_tax_payment_account_id
    ): void
    {
        $this->property_advance_tax_payment_account_id = $property_advance_tax_payment_account_id;
    }

    /**
     * @param TemplateAliasAlias $property_tax_receivable_account_id
     */
    public function setPropertyTaxReceivableAccountId(
        TemplateAliasAlias $property_tax_receivable_account_id
    ): void
    {
        $this->property_tax_receivable_account_id = $property_tax_receivable_account_id;
    }

    /**
     * @param TemplateAliasAlias $property_tax_payable_account_id
     */
    public function setPropertyTaxPayableAccountId(TemplateAliasAlias $property_tax_payable_account_id): void
    {
        $this->property_tax_payable_account_id = $property_tax_payable_account_id;
    }

    /**
     * @param TemplateAliasAlias $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(
        TemplateAliasAlias $property_stock_valuation_account_id
    ): void
    {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
    }

    /**
     * @param TemplateAliasAlias $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        TemplateAliasAlias $property_stock_account_output_categ_id
    ): void
    {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @param TemplateAliasAlias $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(
        TemplateAliasAlias $property_stock_account_input_categ_id
    ): void
    {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param TemplateAliasAlias $property_account_income_id
     */
    public function setPropertyAccountIncomeId(TemplateAliasAlias $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @param TemplateAliasAlias $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(TemplateAliasAlias $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @param TemplateAliasAlias $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(
        TemplateAliasAlias $property_account_income_categ_id
    ): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @param TemplateAliasAlias $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(
        TemplateAliasAlias $property_account_expense_categ_id
    ): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @param TemplateAliasAlias $property_account_payable_id
     */
    public function setPropertyAccountPayableId(TemplateAliasAlias $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @param TemplateAliasAlias $default_pos_receivable_account_id
     */
    public function setDefaultPosReceivableAccountId(
        TemplateAliasAlias $default_pos_receivable_account_id
    ): void
    {
        $this->default_pos_receivable_account_id = $default_pos_receivable_account_id;
    }

    /**
     * @param TemplateAlias $parent_id
     */
    public function setParentId(TemplateAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param TemplateAliasAlias $default_cash_difference_expense_account_id
     */
    public function setDefaultCashDifferenceExpenseAccountId(
        TemplateAliasAlias $default_cash_difference_expense_account_id
    ): void
    {
        $this->default_cash_difference_expense_account_id = $default_cash_difference_expense_account_id;
    }

    /**
     * @param TemplateAliasAlias $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        TemplateAliasAlias $default_cash_difference_income_account_id
    ): void
    {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @param TemplateAliasAlias $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(
        TemplateAliasAlias $expense_currency_exchange_account_id
    ): void
    {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @param TemplateAliasAlias $income_currency_exchange_account_id
     */
    public function setIncomeCurrencyExchangeAccountId(
        TemplateAliasAlias $income_currency_exchange_account_id
    ): void
    {
        $this->income_currency_exchange_account_id = $income_currency_exchange_account_id;
    }

    /**
     * @param null|string $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(?string $transfer_account_code_prefix): void
    {
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @param null|string $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(?string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
    }

    /**
     * @param null|string $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(?string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @param Template2 $tax_template_ids
     */
    public function setTaxTemplateIds(Template2 $tax_template_ids): void
    {
        $this->tax_template_ids = $tax_template_ids;
    }

    /**
     * @param TemplateAliasAlias $account_ids
     */
    public function setAccountIds(TemplateAliasAlias $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param bool $complete_tax_set
     */
    public function setCompleteTaxSet(bool $complete_tax_set): void
    {
        $this->complete_tax_set = $complete_tax_set;
    }

    /**
     * @param bool $use_anglo_saxon
     */
    public function setUseAngloSaxon(bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param bool $visible
     */
    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    /**
     * @param null|int $code_digits
     */
    public function setCodeDigits(?int $code_digits): void
    {
        $this->code_digits = $code_digits;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
