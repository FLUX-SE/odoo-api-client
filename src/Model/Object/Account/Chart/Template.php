<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Chart;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.chart.template
 * Name : account.chart.template
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
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Parent Chart Template
     * ---
     * Relation : many2one (account.chart.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Chart\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * # of Digits
     * ---
     * No. of Digits to use for account code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $code_digits;

    /**
     * Can be Visible?
     * ---
     * Set this to False if you don't want this template to be used actively in the wizard that generate Chart of
     * Accounts from templates, this is useful when you want to generate accounts of this template only when loading
     * its child template.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $visible;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Use Anglo-Saxon accounting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_anglo_saxon;

    /**
     * Complete Set of Taxes
     * ---
     * This boolean helps you to choose if you want to propose to the user to encode the sale and purchase rates or
     * choose from list of taxes. This last choice assumes that the set of tax defined on this template is complete
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $complete_tax_set;

    /**
     * Associated Account Templates
     * ---
     * Relation : one2many (account.account.template -> chart_template_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $account_ids;

    /**
     * Tax Template List
     * ---
     * List of all the taxes that have to be installed by the wizard
     * ---
     * Relation : one2many (account.tax.template -> chart_template_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_template_ids;

    /**
     * Prefix of the bank accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the main cash accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $cash_account_code_prefix;

    /**
     * Prefix of the main transfer accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $transfer_account_code_prefix;

    /**
     * Gain Exchange Rate Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $expense_currency_exchange_account_id;

    /**
     * Cash Difference Income Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_cash_difference_income_account_id;

    /**
     * Cash Difference Expense Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_cash_difference_expense_account_id;

    /**
     * PoS receivable account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_pos_receivable_account_id;

    /**
     * Receivable Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_receivable_id;

    /**
     * Payable Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_payable_id;

    /**
     * Category of Expense Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_expense_categ_id;

    /**
     * Category of Income Account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account on Product Template
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_expense_id;

    /**
     * Income Account on Product Template
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_account_income_id;

    /**
     * Input Account for Stock Valuation
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_stock_account_input_categ_id;

    /**
     * Output Account for Stock Valuation
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_stock_account_output_categ_id;

    /**
     * Account Template for Stock Valuation
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_stock_valuation_account_id;

    /**
     * Tax current account (payable)
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_tax_payable_account_id;

    /**
     * Tax current account (receivable)
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_tax_receivable_account_id;

    /**
     * Advance tax payment account
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_advance_tax_payment_account_id;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $code_digits # of Digits
     *        ---
     *        No. of Digits to use for account code
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $bank_account_code_prefix Prefix of the bank accounts
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $cash_account_code_prefix Prefix of the main cash accounts
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $transfer_account_code_prefix Prefix of the main transfer accounts
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        int $code_digits,
        OdooRelation $currency_id,
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
     * @return OdooRelation|null
     */
    public function getPropertyAccountIncomeCategId(): ?OdooRelation
    {
        return $this->property_account_income_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockAccountInputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_input_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_income_id
     */
    public function setPropertyAccountIncomeId(?OdooRelation $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountIncomeId(): ?OdooRelation
    {
        return $this->property_account_income_id;
    }

    /**
     * @param OdooRelation|null $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(?OdooRelation $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountExpenseId(): ?OdooRelation
    {
        return $this->property_account_expense_id;
    }

    /**
     * @param OdooRelation|null $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(?OdooRelation $property_account_income_categ_id): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(?OdooRelation $property_account_expense_categ_id): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockAccountOutputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_output_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountExpenseCategId(): ?OdooRelation
    {
        return $this->property_account_expense_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_payable_id
     */
    public function setPropertyAccountPayableId(?OdooRelation $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountPayableId(): ?OdooRelation
    {
        return $this->property_account_payable_id;
    }

    /**
     * @param OdooRelation|null $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(?OdooRelation $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountReceivableId(): ?OdooRelation
    {
        return $this->property_account_receivable_id;
    }

    /**
     * @param OdooRelation|null $default_pos_receivable_account_id
     */
    public function setDefaultPosReceivableAccountId(?OdooRelation $default_pos_receivable_account_id): void
    {
        $this->default_pos_receivable_account_id = $default_pos_receivable_account_id;
    }

    /**
     * @param OdooRelation|null $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(
        ?OdooRelation $property_stock_account_input_categ_id
    ): void {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param OdooRelation|null $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        ?OdooRelation $property_stock_account_output_categ_id
    ): void {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @param OdooRelation|null $default_cash_difference_expense_account_id
     */
    public function setDefaultCashDifferenceExpenseAccountId(
        ?OdooRelation $default_cash_difference_expense_account_id
    ): void {
        $this->default_cash_difference_expense_account_id = $default_cash_difference_expense_account_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockValuationAccountId(): ?OdooRelation
    {
        return $this->property_stock_valuation_account_id;
    }

    /**
     * @param OdooRelation|null $property_advance_tax_payment_account_id
     */
    public function setPropertyAdvanceTaxPaymentAccountId(
        ?OdooRelation $property_advance_tax_payment_account_id
    ): void {
        $this->property_advance_tax_payment_account_id = $property_advance_tax_payment_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAdvanceTaxPaymentAccountId(): ?OdooRelation
    {
        return $this->property_advance_tax_payment_account_id;
    }

    /**
     * @param OdooRelation|null $property_tax_receivable_account_id
     */
    public function setPropertyTaxReceivableAccountId(
        ?OdooRelation $property_tax_receivable_account_id
    ): void {
        $this->property_tax_receivable_account_id = $property_tax_receivable_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyTaxReceivableAccountId(): ?OdooRelation
    {
        return $this->property_tax_receivable_account_id;
    }

    /**
     * @param OdooRelation|null $property_tax_payable_account_id
     */
    public function setPropertyTaxPayableAccountId(?OdooRelation $property_tax_payable_account_id): void
    {
        $this->property_tax_payable_account_id = $property_tax_payable_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyTaxPayableAccountId(): ?OdooRelation
    {
        return $this->property_tax_payable_account_id;
    }

    /**
     * @param OdooRelation|null $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(
        ?OdooRelation $property_stock_valuation_account_id
    ): void {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultPosReceivableAccountId(): ?OdooRelation
    {
        return $this->default_pos_receivable_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultCashDifferenceExpenseAccountId(): ?OdooRelation
    {
        return $this->default_cash_difference_expense_account_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation[]|null $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAccountIds(): ?array
    {
        return $this->account_ids;
    }

    /**
     * @param bool|null $complete_tax_set
     */
    public function setCompleteTaxSet(?bool $complete_tax_set): void
    {
        $this->complete_tax_set = $complete_tax_set;
    }

    /**
     * @return bool|null
     */
    public function isCompleteTaxSet(): ?bool
    {
        return $this->complete_tax_set;
    }

    /**
     * @param bool|null $use_anglo_saxon
     */
    public function setUseAngloSaxon(?bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @return bool|null
     */
    public function isUseAngloSaxon(): ?bool
    {
        return $this->use_anglo_saxon;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccountIds(OdooRelation $item): void
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
     * @param bool|null $visible
     */
    public function setVisible(?bool $visible): void
    {
        $this->visible = $visible;
    }

    /**
     * @return bool|null
     */
    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    /**
     * @param int $code_digits
     */
    public function setCodeDigits(int $code_digits): void
    {
        $this->code_digits = $code_digits;
    }

    /**
     * @return int
     */
    public function getCodeDigits(): int
    {
        return $this->code_digits;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountIds(OdooRelation $item): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAccountIds(OdooRelation $item): void
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
     * @param OdooRelation|null $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        ?OdooRelation $default_cash_difference_income_account_id
    ): void {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @return string
     */
    public function getTransferAccountCodePrefix(): string
    {
        return $this->transfer_account_code_prefix;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultCashDifferenceIncomeAccountId(): ?OdooRelation
    {
        return $this->default_cash_difference_income_account_id;
    }

    /**
     * @param OdooRelation|null $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(
        ?OdooRelation $expense_currency_exchange_account_id
    ): void {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExpenseCurrencyExchangeAccountId(): ?OdooRelation
    {
        return $this->expense_currency_exchange_account_id;
    }

    /**
     * @param OdooRelation|null $income_currency_exchange_account_id
     */
    public function setIncomeCurrencyExchangeAccountId(
        ?OdooRelation $income_currency_exchange_account_id
    ): void {
        $this->income_currency_exchange_account_id = $income_currency_exchange_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIncomeCurrencyExchangeAccountId(): ?OdooRelation
    {
        return $this->income_currency_exchange_account_id;
    }

    /**
     * @param string $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(string $transfer_account_code_prefix): void
    {
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @param string $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxTemplateIds(): ?array
    {
        return $this->tax_template_ids;
    }

    /**
     * @return string
     */
    public function getCashAccountCodePrefix(): string
    {
        return $this->cash_account_code_prefix;
    }

    /**
     * @param string $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @return string
     */
    public function getBankAccountCodePrefix(): string
    {
        return $this->bank_account_code_prefix;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxTemplateIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addTaxTemplateIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxTemplateIds(OdooRelation $item): bool
    {
        if (null === $this->tax_template_ids) {
            return false;
        }

        return in_array($item, $this->tax_template_ids);
    }

    /**
     * @param OdooRelation[]|null $tax_template_ids
     */
    public function setTaxTemplateIds(?array $tax_template_ids): void
    {
        $this->tax_template_ids = $tax_template_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.chart.template';
    }
}
