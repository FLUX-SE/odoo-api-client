<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template;
use Flux\OdooApiClient\Model\Object\Account\Incoterms;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Report\Paperformat;
use Flux\OdooApiClient\Model\Object\Res\Company as CompanyAlias;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Resource\Calendar;

/**
 * Odoo model : res.company
 * Name : res.company
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
final class Company extends Base
{
    /**
     * Company Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Parent Company
     *
     * @var CompanyAlias
     */
    private $parent_id;

    /**
     * Child Companies
     *
     * @var CompanyAlias
     */
    private $child_ids;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Company Tagline
     *
     * @var string
     */
    private $report_header;

    /**
     * Report Footer
     *
     * @var string
     */
    private $report_footer;

    /**
     * Company Logo
     *
     * @var int
     */
    private $logo;

    /**
     * Logo Web
     *
     * @var int
     */
    private $logo_web;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Accepted Users
     *
     * @var Users
     */
    private $user_ids;

    /**
     * Account No.
     *
     * @var string
     */
    private $account_no;

    /**
     * Street
     *
     * @var string
     */
    private $street;

    /**
     * Street2
     *
     * @var string
     */
    private $street2;

    /**
     * Zip
     *
     * @var string
     */
    private $zip;

    /**
     * City
     *
     * @var string
     */
    private $city;

    /**
     * Fed. State
     *
     * @var State
     */
    private $state_id;

    /**
     * Bank Accounts
     *
     * @var Bank
     */
    private $bank_ids;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Email
     *
     * @var string
     */
    private $email;

    /**
     * Phone
     *
     * @var string
     */
    private $phone;

    /**
     * Website Link
     *
     * @var string
     */
    private $website;

    /**
     * Tax ID
     *
     * @var string
     */
    private $vat;

    /**
     * Company Registry
     *
     * @var string
     */
    private $company_registry;

    /**
     * Paper format
     *
     * @var Paperformat
     */
    private $paperformat_id;

    /**
     * Document Template
     *
     * @var View
     */
    private $external_report_layout_id;

    /**
     * State of the onboarding company step
     *
     * @var array
     */
    private $base_onboarding_company_state;

    /**
     * Company Favicon
     *
     * @var int
     */
    private $favicon;

    /**
     * Font
     *
     * @var array
     */
    private $font;

    /**
     * Primary Color
     *
     * @var string
     */
    private $primary_color;

    /**
     * Secondary Color
     *
     * @var string
     */
    private $secondary_color;

    /**
     * Working Hours
     *
     * @var Calendar
     */
    private $resource_calendar_ids;

    /**
     * Default Working Hours
     *
     * @var Calendar
     */
    private $resource_calendar_id;

    /**
     * Catchall Email
     *
     * @var string
     */
    private $catchall;

    /**
     * Company database ID
     *
     * @var int
     */
    private $partner_gid;

    /**
     * Color
     *
     * @var bool
     */
    private $snailmail_color;

    /**
     * Add a Cover Page
     *
     * @var bool
     */
    private $snailmail_cover;

    /**
     * Both sides
     *
     * @var bool
     */
    private $snailmail_duplex;

    /**
     * Fiscalyear Last Day
     *
     * @var null|int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     *
     * @var null|array
     */
    private $fiscalyear_last_month;

    /**
     * Lock Date for Non-Advisers
     *
     * @var DateTimeInterface
     */
    private $period_lock_date;

    /**
     * Lock Date
     *
     * @var DateTimeInterface
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     *
     * @var DateTimeInterface
     */
    private $tax_lock_date;

    /**
     * Inter-Banks Transfer Account
     *
     * @var Account
     */
    private $transfer_account_id;

    /**
     * Expects a Chart of Accounts
     *
     * @var bool
     */
    private $expects_chart_of_accounts;

    /**
     * Chart Template
     *
     * @var Template
     */
    private $chart_template_id;

    /**
     * Prefix of the bank accounts
     *
     * @var string
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the cash accounts
     *
     * @var string
     */
    private $cash_account_code_prefix;

    /**
     * Cash Difference Income Account
     *
     * @var Account
     */
    private $default_cash_difference_income_account_id;

    /**
     * Cash Difference Expense Account
     *
     * @var Account
     */
    private $default_cash_difference_expense_account_id;

    /**
     * Prefix of the transfer accounts
     *
     * @var string
     */
    private $transfer_account_code_prefix;

    /**
     * Default Sale Tax
     *
     * @var Tax
     */
    private $account_sale_tax_id;

    /**
     * Default Purchase Tax
     *
     * @var Tax
     */
    private $account_purchase_tax_id;

    /**
     * Cash Basis Journal
     *
     * @var Journal
     */
    private $tax_cash_basis_journal_id;

    /**
     * Tax Calculation Rounding Method
     *
     * @var array
     */
    private $tax_calculation_rounding_method;

    /**
     * Exchange Gain or Loss Journal
     *
     * @var Journal
     */
    private $currency_exchange_journal_id;

    /**
     * Gain Exchange Rate Account
     *
     * @var Account
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     *
     * @var Account
     */
    private $expense_currency_exchange_account_id;

    /**
     * Use anglo-saxon accounting
     *
     * @var bool
     */
    private $anglo_saxon_accounting;

    /**
     * Input Account for Stock Valuation
     *
     * @var Account
     */
    private $property_stock_account_input_categ_id;

    /**
     * Output Account for Stock Valuation
     *
     * @var Account
     */
    private $property_stock_account_output_categ_id;

    /**
     * Account Template for Stock Valuation
     *
     * @var Account
     */
    private $property_stock_valuation_account_id;

    /**
     * Bank Journals
     *
     * @var Journal
     */
    private $bank_journal_ids;

    /**
     * Use Cash Basis
     *
     * @var bool
     */
    private $tax_exigibility;

    /**
     * Bank Reconciliation Threshold
     *
     * @var DateTimeInterface
     */
    private $account_bank_reconciliation_start;

    /**
     * Default incoterm
     *
     * @var Incoterms
     */
    private $incoterm_id;

    /**
     * Display SEPA QR code
     *
     * @var bool
     */
    private $qr_code;

    /**
     * Email by default
     *
     * @var bool
     */
    private $invoice_is_email;

    /**
     * Print by default
     *
     * @var bool
     */
    private $invoice_is_print;

    /**
     * Opening Journal Entry
     *
     * @var Move
     */
    private $account_opening_move_id;

    /**
     * Opening Journal
     *
     * @var Journal
     */
    private $account_opening_journal_id;

    /**
     * Opening Date
     *
     * @var DateTimeInterface
     */
    private $account_opening_date;

    /**
     * State of the onboarding bank data step
     *
     * @var array
     */
    private $account_setup_bank_data_state;

    /**
     * State of the onboarding fiscal year step
     *
     * @var array
     */
    private $account_setup_fy_data_state;

    /**
     * State of the onboarding charts of account step
     *
     * @var array
     */
    private $account_setup_coa_state;

    /**
     * State of the onboarding invoice layout step
     *
     * @var array
     */
    private $account_onboarding_invoice_layout_state;

    /**
     * State of the onboarding sample invoice step
     *
     * @var array
     */
    private $account_onboarding_sample_invoice_state;

    /**
     * State of the onboarding sale tax step
     *
     * @var array
     */
    private $account_onboarding_sale_tax_state;

    /**
     * State of the account invoice onboarding panel
     *
     * @var array
     */
    private $account_invoice_onboarding_state;

    /**
     * State of the account dashboard onboarding panel
     *
     * @var array
     */
    private $account_dashboard_onboarding_state;

    /**
     * Default Terms and Conditions
     *
     * @var string
     */
    private $invoice_terms;

    /**
     * Default PoS Receivable Account
     *
     * @var Account
     */
    private $account_default_pos_receivable_account_id;

    /**
     * Expense Accrual Account
     *
     * @var Account
     */
    private $expense_accrual_account_id;

    /**
     * Revenue Accrual Account
     *
     * @var Account
     */
    private $revenue_accrual_account_id;

    /**
     * Accrual Default Journal
     *
     * @var Journal
     */
    private $accrual_default_journal_id;

    /**
     * Send mode on invoices attachments
     *
     * @var null|array
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     *
     * @var null|bool
     */
    private $extract_single_line_per_tax;

    /**
     * Interval Unit
     *
     * @var array
     */
    private $currency_interval_unit;

    /**
     * Next Execution Date
     *
     * @var DateTimeInterface
     */
    private $currency_next_execution_date;

    /**
     * Service Provider
     *
     * @var array
     */
    private $currency_provider;

    /**
     * State of the onboarding payment acquirer step
     *
     * @var array
     */
    private $payment_acquirer_onboarding_state;

    /**
     * Selected onboarding payment method
     *
     * @var array
     */
    private $payment_onboarding_payment_method;

    /**
     * Send by Post
     *
     * @var bool
     */
    private $invoice_is_snailmail;

    /**
     * Add totals below sections
     *
     * @var bool
     */
    private $totals_below_sections;

    /**
     * Delay units
     *
     * @var array
     */
    private $account_tax_periodicity;

    /**
     * Start from
     *
     * @var int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Start from original
     *
     * @var int
     */
    private $account_tax_original_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var Journal
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Account Tax Next Activity Type
     *
     * @var Type
     */
    private $account_tax_next_activity_type;

    /**
     * access_token
     *
     * @var string
     */
    private $yodlee_access_token;

    /**
     * Yodlee login
     *
     * @var string
     */
    private $yodlee_user_login;

    /**
     * Yodlee password
     *
     * @var string
     */
    private $yodlee_user_password;

    /**
     * Yodlee access token
     *
     * @var string
     */
    private $yodlee_user_access_token;

    /**
     * Online Signature
     *
     * @var bool
     */
    private $portal_confirmation_sign;

    /**
     * Online Payment
     *
     * @var bool
     */
    private $portal_confirmation_pay;

    /**
     * Default Quotation Validity (Days)
     *
     * @var int
     */
    private $quotation_validity_days;

    /**
     * State of the sale onboarding panel
     *
     * @var array
     */
    private $sale_quotation_onboarding_state;

    /**
     * State of the onboarding confirmation order step
     *
     * @var array
     */
    private $sale_onboarding_order_confirmation_state;

    /**
     * State of the onboarding sample quotation step
     *
     * @var array
     */
    private $sale_onboarding_sample_quotation_state;

    /**
     * Sale onboarding selected payment method
     *
     * @var array
     */
    private $sale_onboarding_payment_method;

    /**
     * Gain Account
     *
     * @var Account
     */
    private $gain_account_id;

    /**
     * Loss Account
     *
     * @var Account
     */
    private $loss_account_id;

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
     * @param null|bool $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(?bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @param Account $account_default_pos_receivable_account_id
     */
    public function setAccountDefaultPosReceivableAccountId(
        Account $account_default_pos_receivable_account_id
    ): void
    {
        $this->account_default_pos_receivable_account_id = $account_default_pos_receivable_account_id;
    }

    /**
     * @param Account $expense_accrual_account_id
     */
    public function setExpenseAccrualAccountId(Account $expense_accrual_account_id): void
    {
        $this->expense_accrual_account_id = $expense_accrual_account_id;
    }

    /**
     * @param Account $revenue_accrual_account_id
     */
    public function setRevenueAccrualAccountId(Account $revenue_accrual_account_id): void
    {
        $this->revenue_accrual_account_id = $revenue_accrual_account_id;
    }

    /**
     * @param Journal $accrual_default_journal_id
     */
    public function setAccrualDefaultJournalId(Journal $accrual_default_journal_id): void
    {
        $this->accrual_default_journal_id = $accrual_default_journal_id;
    }

    /**
     * @param null|array $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?array $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @param ?array $extract_show_ocr_option_selection
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractShowOcrOptionSelection(
        ?array $extract_show_ocr_option_selection,
        bool $strict = true
    ): bool
    {
        if (null === $this->extract_show_ocr_option_selection) {
            return false;
        }

        return in_array($extract_show_ocr_option_selection, $this->extract_show_ocr_option_selection, $strict);
    }

    /**
     * @param ?array $extract_show_ocr_option_selection
     */
    public function addExtractShowOcrOptionSelection(?array $extract_show_ocr_option_selection): void
    {
        if ($this->hasExtractShowOcrOptionSelection($extract_show_ocr_option_selection)) {
            return;
        }

        if (null === $this->extract_show_ocr_option_selection) {
            $this->extract_show_ocr_option_selection = [];
        }

        $this->extract_show_ocr_option_selection[] = $extract_show_ocr_option_selection;
    }

    /**
     * @param ?array $extract_show_ocr_option_selection
     */
    public function removeExtractShowOcrOptionSelection(?array $extract_show_ocr_option_selection): void
    {
        if ($this->hasExtractShowOcrOptionSelection($extract_show_ocr_option_selection)) {
            $index = array_search($extract_show_ocr_option_selection, $this->extract_show_ocr_option_selection);
            unset($this->extract_show_ocr_option_selection[$index]);
        }
    }

    /**
     * @param array $currency_interval_unit
     */
    public function setCurrencyIntervalUnit(array $currency_interval_unit): void
    {
        $this->currency_interval_unit = $currency_interval_unit;
    }

    /**
     * @param array $account_dashboard_onboarding_state
     */
    public function removeAccountDashboardOnboardingState(array $account_dashboard_onboarding_state): void
    {
        if ($this->hasAccountDashboardOnboardingState($account_dashboard_onboarding_state)) {
            $index = array_search($account_dashboard_onboarding_state, $this->account_dashboard_onboarding_state);
            unset($this->account_dashboard_onboarding_state[$index]);
        }
    }

    /**
     * @param array $currency_interval_unit
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCurrencyIntervalUnit(array $currency_interval_unit, bool $strict = true): bool
    {
        return in_array($currency_interval_unit, $this->currency_interval_unit, $strict);
    }

    /**
     * @param array $currency_interval_unit
     */
    public function addCurrencyIntervalUnit(array $currency_interval_unit): void
    {
        if ($this->hasCurrencyIntervalUnit($currency_interval_unit)) {
            return;
        }

        $this->currency_interval_unit[] = $currency_interval_unit;
    }

    /**
     * @param array $currency_interval_unit
     */
    public function removeCurrencyIntervalUnit(array $currency_interval_unit): void
    {
        if ($this->hasCurrencyIntervalUnit($currency_interval_unit)) {
            $index = array_search($currency_interval_unit, $this->currency_interval_unit);
            unset($this->currency_interval_unit[$index]);
        }
    }

    /**
     * @param DateTimeInterface $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @param array $currency_provider
     */
    public function setCurrencyProvider(array $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
    }

    /**
     * @param array $currency_provider
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCurrencyProvider(array $currency_provider, bool $strict = true): bool
    {
        return in_array($currency_provider, $this->currency_provider, $strict);
    }

    /**
     * @param array $currency_provider
     */
    public function addCurrencyProvider(array $currency_provider): void
    {
        if ($this->hasCurrencyProvider($currency_provider)) {
            return;
        }

        $this->currency_provider[] = $currency_provider;
    }

    /**
     * @param array $currency_provider
     */
    public function removeCurrencyProvider(array $currency_provider): void
    {
        if ($this->hasCurrencyProvider($currency_provider)) {
            $index = array_search($currency_provider, $this->currency_provider);
            unset($this->currency_provider[$index]);
        }
    }

    /**
     * @param string $invoice_terms
     */
    public function setInvoiceTerms(string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
    }

    /**
     * @param array $account_dashboard_onboarding_state
     */
    public function addAccountDashboardOnboardingState(array $account_dashboard_onboarding_state): void
    {
        if ($this->hasAccountDashboardOnboardingState($account_dashboard_onboarding_state)) {
            return;
        }

        $this->account_dashboard_onboarding_state[] = $account_dashboard_onboarding_state;
    }

    /**
     * @param array $payment_acquirer_onboarding_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentAcquirerOnboardingState(
        array $payment_acquirer_onboarding_state,
        bool $strict = true
    ): bool
    {
        return in_array($payment_acquirer_onboarding_state, $this->payment_acquirer_onboarding_state, $strict);
    }

    /**
     * @param array $account_onboarding_sample_invoice_state
     */
    public function addAccountOnboardingSampleInvoiceState(
        array $account_onboarding_sample_invoice_state
    ): void
    {
        if ($this->hasAccountOnboardingSampleInvoiceState($account_onboarding_sample_invoice_state)) {
            return;
        }

        $this->account_onboarding_sample_invoice_state[] = $account_onboarding_sample_invoice_state;
    }

    /**
     * @param array $account_setup_coa_state
     */
    public function addAccountSetupCoaState(array $account_setup_coa_state): void
    {
        if ($this->hasAccountSetupCoaState($account_setup_coa_state)) {
            return;
        }

        $this->account_setup_coa_state[] = $account_setup_coa_state;
    }

    /**
     * @param array $account_setup_coa_state
     */
    public function removeAccountSetupCoaState(array $account_setup_coa_state): void
    {
        if ($this->hasAccountSetupCoaState($account_setup_coa_state)) {
            $index = array_search($account_setup_coa_state, $this->account_setup_coa_state);
            unset($this->account_setup_coa_state[$index]);
        }
    }

    /**
     * @param array $account_onboarding_invoice_layout_state
     */
    public function setAccountOnboardingInvoiceLayoutState(
        array $account_onboarding_invoice_layout_state
    ): void
    {
        $this->account_onboarding_invoice_layout_state = $account_onboarding_invoice_layout_state;
    }

    /**
     * @param array $account_onboarding_invoice_layout_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingInvoiceLayoutState(
        array $account_onboarding_invoice_layout_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_onboarding_invoice_layout_state, $this->account_onboarding_invoice_layout_state, $strict);
    }

    /**
     * @param array $account_onboarding_invoice_layout_state
     */
    public function addAccountOnboardingInvoiceLayoutState(
        array $account_onboarding_invoice_layout_state
    ): void
    {
        if ($this->hasAccountOnboardingInvoiceLayoutState($account_onboarding_invoice_layout_state)) {
            return;
        }

        $this->account_onboarding_invoice_layout_state[] = $account_onboarding_invoice_layout_state;
    }

    /**
     * @param array $account_onboarding_invoice_layout_state
     */
    public function removeAccountOnboardingInvoiceLayoutState(
        array $account_onboarding_invoice_layout_state
    ): void
    {
        if ($this->hasAccountOnboardingInvoiceLayoutState($account_onboarding_invoice_layout_state)) {
            $index = array_search($account_onboarding_invoice_layout_state, $this->account_onboarding_invoice_layout_state);
            unset($this->account_onboarding_invoice_layout_state[$index]);
        }
    }

    /**
     * @param array $account_onboarding_sample_invoice_state
     */
    public function setAccountOnboardingSampleInvoiceState(
        array $account_onboarding_sample_invoice_state
    ): void
    {
        $this->account_onboarding_sample_invoice_state = $account_onboarding_sample_invoice_state;
    }

    /**
     * @param array $account_onboarding_sample_invoice_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingSampleInvoiceState(
        array $account_onboarding_sample_invoice_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_onboarding_sample_invoice_state, $this->account_onboarding_sample_invoice_state, $strict);
    }

    /**
     * @param array $account_onboarding_sample_invoice_state
     */
    public function removeAccountOnboardingSampleInvoiceState(
        array $account_onboarding_sample_invoice_state
    ): void
    {
        if ($this->hasAccountOnboardingSampleInvoiceState($account_onboarding_sample_invoice_state)) {
            $index = array_search($account_onboarding_sample_invoice_state, $this->account_onboarding_sample_invoice_state);
            unset($this->account_onboarding_sample_invoice_state[$index]);
        }
    }

    /**
     * @param array $account_dashboard_onboarding_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountDashboardOnboardingState(
        array $account_dashboard_onboarding_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_dashboard_onboarding_state, $this->account_dashboard_onboarding_state, $strict);
    }

    /**
     * @param array $account_onboarding_sale_tax_state
     */
    public function setAccountOnboardingSaleTaxState(array $account_onboarding_sale_tax_state): void
    {
        $this->account_onboarding_sale_tax_state = $account_onboarding_sale_tax_state;
    }

    /**
     * @param array $account_onboarding_sale_tax_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingSaleTaxState(
        array $account_onboarding_sale_tax_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_onboarding_sale_tax_state, $this->account_onboarding_sale_tax_state, $strict);
    }

    /**
     * @param array $account_onboarding_sale_tax_state
     */
    public function addAccountOnboardingSaleTaxState(array $account_onboarding_sale_tax_state): void
    {
        if ($this->hasAccountOnboardingSaleTaxState($account_onboarding_sale_tax_state)) {
            return;
        }

        $this->account_onboarding_sale_tax_state[] = $account_onboarding_sale_tax_state;
    }

    /**
     * @param array $account_onboarding_sale_tax_state
     */
    public function removeAccountOnboardingSaleTaxState(array $account_onboarding_sale_tax_state): void
    {
        if ($this->hasAccountOnboardingSaleTaxState($account_onboarding_sale_tax_state)) {
            $index = array_search($account_onboarding_sale_tax_state, $this->account_onboarding_sale_tax_state);
            unset($this->account_onboarding_sale_tax_state[$index]);
        }
    }

    /**
     * @param array $account_invoice_onboarding_state
     */
    public function setAccountInvoiceOnboardingState(array $account_invoice_onboarding_state): void
    {
        $this->account_invoice_onboarding_state = $account_invoice_onboarding_state;
    }

    /**
     * @param array $account_invoice_onboarding_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountInvoiceOnboardingState(
        array $account_invoice_onboarding_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_invoice_onboarding_state, $this->account_invoice_onboarding_state, $strict);
    }

    /**
     * @param array $account_invoice_onboarding_state
     */
    public function addAccountInvoiceOnboardingState(array $account_invoice_onboarding_state): void
    {
        if ($this->hasAccountInvoiceOnboardingState($account_invoice_onboarding_state)) {
            return;
        }

        $this->account_invoice_onboarding_state[] = $account_invoice_onboarding_state;
    }

    /**
     * @param array $account_invoice_onboarding_state
     */
    public function removeAccountInvoiceOnboardingState(array $account_invoice_onboarding_state): void
    {
        if ($this->hasAccountInvoiceOnboardingState($account_invoice_onboarding_state)) {
            $index = array_search($account_invoice_onboarding_state, $this->account_invoice_onboarding_state);
            unset($this->account_invoice_onboarding_state[$index]);
        }
    }

    /**
     * @param array $account_dashboard_onboarding_state
     */
    public function setAccountDashboardOnboardingState(array $account_dashboard_onboarding_state): void
    {
        $this->account_dashboard_onboarding_state = $account_dashboard_onboarding_state;
    }

    /**
     * @param array $payment_acquirer_onboarding_state
     */
    public function setPaymentAcquirerOnboardingState(array $payment_acquirer_onboarding_state): void
    {
        $this->payment_acquirer_onboarding_state = $payment_acquirer_onboarding_state;
    }

    /**
     * @param array $payment_acquirer_onboarding_state
     */
    public function addPaymentAcquirerOnboardingState(array $payment_acquirer_onboarding_state): void
    {
        if ($this->hasPaymentAcquirerOnboardingState($payment_acquirer_onboarding_state)) {
            return;
        }

        $this->payment_acquirer_onboarding_state[] = $payment_acquirer_onboarding_state;
    }

    /**
     * @param array $account_setup_coa_state
     */
    public function setAccountSetupCoaState(array $account_setup_coa_state): void
    {
        $this->account_setup_coa_state = $account_setup_coa_state;
    }

    /**
     * @param array $sale_onboarding_sample_quotation_state
     */
    public function addSaleOnboardingSampleQuotationState(array $sale_onboarding_sample_quotation_state): void
    {
        if ($this->hasSaleOnboardingSampleQuotationState($sale_onboarding_sample_quotation_state)) {
            return;
        }

        $this->sale_onboarding_sample_quotation_state[] = $sale_onboarding_sample_quotation_state;
    }

    /**
     * @param array $sale_quotation_onboarding_state
     */
    public function addSaleQuotationOnboardingState(array $sale_quotation_onboarding_state): void
    {
        if ($this->hasSaleQuotationOnboardingState($sale_quotation_onboarding_state)) {
            return;
        }

        $this->sale_quotation_onboarding_state[] = $sale_quotation_onboarding_state;
    }

    /**
     * @param array $sale_quotation_onboarding_state
     */
    public function removeSaleQuotationOnboardingState(array $sale_quotation_onboarding_state): void
    {
        if ($this->hasSaleQuotationOnboardingState($sale_quotation_onboarding_state)) {
            $index = array_search($sale_quotation_onboarding_state, $this->sale_quotation_onboarding_state);
            unset($this->sale_quotation_onboarding_state[$index]);
        }
    }

    /**
     * @param array $sale_onboarding_order_confirmation_state
     */
    public function setSaleOnboardingOrderConfirmationState(
        array $sale_onboarding_order_confirmation_state
    ): void
    {
        $this->sale_onboarding_order_confirmation_state = $sale_onboarding_order_confirmation_state;
    }

    /**
     * @param array $sale_onboarding_order_confirmation_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingOrderConfirmationState(
        array $sale_onboarding_order_confirmation_state,
        bool $strict = true
    ): bool
    {
        return in_array($sale_onboarding_order_confirmation_state, $this->sale_onboarding_order_confirmation_state, $strict);
    }

    /**
     * @param array $sale_onboarding_order_confirmation_state
     */
    public function addSaleOnboardingOrderConfirmationState(
        array $sale_onboarding_order_confirmation_state
    ): void
    {
        if ($this->hasSaleOnboardingOrderConfirmationState($sale_onboarding_order_confirmation_state)) {
            return;
        }

        $this->sale_onboarding_order_confirmation_state[] = $sale_onboarding_order_confirmation_state;
    }

    /**
     * @param array $sale_onboarding_order_confirmation_state
     */
    public function removeSaleOnboardingOrderConfirmationState(
        array $sale_onboarding_order_confirmation_state
    ): void
    {
        if ($this->hasSaleOnboardingOrderConfirmationState($sale_onboarding_order_confirmation_state)) {
            $index = array_search($sale_onboarding_order_confirmation_state, $this->sale_onboarding_order_confirmation_state);
            unset($this->sale_onboarding_order_confirmation_state[$index]);
        }
    }

    /**
     * @param array $sale_onboarding_sample_quotation_state
     */
    public function setSaleOnboardingSampleQuotationState(array $sale_onboarding_sample_quotation_state): void
    {
        $this->sale_onboarding_sample_quotation_state = $sale_onboarding_sample_quotation_state;
    }

    /**
     * @param array $sale_onboarding_sample_quotation_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingSampleQuotationState(
        array $sale_onboarding_sample_quotation_state,
        bool $strict = true
    ): bool
    {
        return in_array($sale_onboarding_sample_quotation_state, $this->sale_onboarding_sample_quotation_state, $strict);
    }

    /**
     * @param array $sale_onboarding_sample_quotation_state
     */
    public function removeSaleOnboardingSampleQuotationState(
        array $sale_onboarding_sample_quotation_state
    ): void
    {
        if ($this->hasSaleOnboardingSampleQuotationState($sale_onboarding_sample_quotation_state)) {
            $index = array_search($sale_onboarding_sample_quotation_state, $this->sale_onboarding_sample_quotation_state);
            unset($this->sale_onboarding_sample_quotation_state[$index]);
        }
    }

    /**
     * @param array $sale_quotation_onboarding_state
     */
    public function setSaleQuotationOnboardingState(array $sale_quotation_onboarding_state): void
    {
        $this->sale_quotation_onboarding_state = $sale_quotation_onboarding_state;
    }

    /**
     * @param array $sale_onboarding_payment_method
     */
    public function setSaleOnboardingPaymentMethod(array $sale_onboarding_payment_method): void
    {
        $this->sale_onboarding_payment_method = $sale_onboarding_payment_method;
    }

    /**
     * @param array $sale_onboarding_payment_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingPaymentMethod(
        array $sale_onboarding_payment_method,
        bool $strict = true
    ): bool
    {
        return in_array($sale_onboarding_payment_method, $this->sale_onboarding_payment_method, $strict);
    }

    /**
     * @param array $sale_onboarding_payment_method
     */
    public function addSaleOnboardingPaymentMethod(array $sale_onboarding_payment_method): void
    {
        if ($this->hasSaleOnboardingPaymentMethod($sale_onboarding_payment_method)) {
            return;
        }

        $this->sale_onboarding_payment_method[] = $sale_onboarding_payment_method;
    }

    /**
     * @param array $sale_onboarding_payment_method
     */
    public function removeSaleOnboardingPaymentMethod(array $sale_onboarding_payment_method): void
    {
        if ($this->hasSaleOnboardingPaymentMethod($sale_onboarding_payment_method)) {
            $index = array_search($sale_onboarding_payment_method, $this->sale_onboarding_payment_method);
            unset($this->sale_onboarding_payment_method[$index]);
        }
    }

    /**
     * @param Account $gain_account_id
     */
    public function setGainAccountId(Account $gain_account_id): void
    {
        $this->gain_account_id = $gain_account_id;
    }

    /**
     * @param Account $loss_account_id
     */
    public function setLossAccountId(Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
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
     * @param array $sale_quotation_onboarding_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleQuotationOnboardingState(
        array $sale_quotation_onboarding_state,
        bool $strict = true
    ): bool
    {
        return in_array($sale_quotation_onboarding_state, $this->sale_quotation_onboarding_state, $strict);
    }

    /**
     * @param int $quotation_validity_days
     */
    public function setQuotationValidityDays(int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @param array $payment_acquirer_onboarding_state
     */
    public function removePaymentAcquirerOnboardingState(array $payment_acquirer_onboarding_state): void
    {
        if ($this->hasPaymentAcquirerOnboardingState($payment_acquirer_onboarding_state)) {
            $index = array_search($payment_acquirer_onboarding_state, $this->payment_acquirer_onboarding_state);
            unset($this->payment_acquirer_onboarding_state[$index]);
        }
    }

    /**
     * @param array $account_tax_periodicity
     */
    public function addAccountTaxPeriodicity(array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            return;
        }

        $this->account_tax_periodicity[] = $account_tax_periodicity;
    }

    /**
     * @param array $payment_onboarding_payment_method
     */
    public function setPaymentOnboardingPaymentMethod(array $payment_onboarding_payment_method): void
    {
        $this->payment_onboarding_payment_method = $payment_onboarding_payment_method;
    }

    /**
     * @param array $payment_onboarding_payment_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentOnboardingPaymentMethod(
        array $payment_onboarding_payment_method,
        bool $strict = true
    ): bool
    {
        return in_array($payment_onboarding_payment_method, $this->payment_onboarding_payment_method, $strict);
    }

    /**
     * @param array $payment_onboarding_payment_method
     */
    public function addPaymentOnboardingPaymentMethod(array $payment_onboarding_payment_method): void
    {
        if ($this->hasPaymentOnboardingPaymentMethod($payment_onboarding_payment_method)) {
            return;
        }

        $this->payment_onboarding_payment_method[] = $payment_onboarding_payment_method;
    }

    /**
     * @param array $payment_onboarding_payment_method
     */
    public function removePaymentOnboardingPaymentMethod(array $payment_onboarding_payment_method): void
    {
        if ($this->hasPaymentOnboardingPaymentMethod($payment_onboarding_payment_method)) {
            $index = array_search($payment_onboarding_payment_method, $this->payment_onboarding_payment_method);
            unset($this->payment_onboarding_payment_method[$index]);
        }
    }

    /**
     * @param bool $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
    }

    /**
     * @param bool $totals_below_sections
     */
    public function setTotalsBelowSections(bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
    }

    /**
     * @param array $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(array $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @param array $account_tax_periodicity
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity(array $account_tax_periodicity, bool $strict = true): bool
    {
        return in_array($account_tax_periodicity, $this->account_tax_periodicity, $strict);
    }

    /**
     * @param array $account_tax_periodicity
     */
    public function removeAccountTaxPeriodicity(array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            $index = array_search($account_tax_periodicity, $this->account_tax_periodicity);
            unset($this->account_tax_periodicity[$index]);
        }
    }

    /**
     * @param bool $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @param int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param int $account_tax_original_periodicity_reminder_day
     */
    public function setAccountTaxOriginalPeriodicityReminderDay(
        int $account_tax_original_periodicity_reminder_day
    ): void
    {
        $this->account_tax_original_periodicity_reminder_day = $account_tax_original_periodicity_reminder_day;
    }

    /**
     * @param Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param Type $account_tax_next_activity_type
     */
    public function setAccountTaxNextActivityType(Type $account_tax_next_activity_type): void
    {
        $this->account_tax_next_activity_type = $account_tax_next_activity_type;
    }

    /**
     * @param string $yodlee_access_token
     */
    public function setYodleeAccessToken(string $yodlee_access_token): void
    {
        $this->yodlee_access_token = $yodlee_access_token;
    }

    /**
     * @param string $yodlee_user_login
     */
    public function setYodleeUserLogin(string $yodlee_user_login): void
    {
        $this->yodlee_user_login = $yodlee_user_login;
    }

    /**
     * @param string $yodlee_user_password
     */
    public function setYodleeUserPassword(string $yodlee_user_password): void
    {
        $this->yodlee_user_password = $yodlee_user_password;
    }

    /**
     * @param string $yodlee_user_access_token
     */
    public function setYodleeUserAccessToken(string $yodlee_user_access_token): void
    {
        $this->yodlee_user_access_token = $yodlee_user_access_token;
    }

    /**
     * @param bool $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param array $account_setup_coa_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupCoaState(array $account_setup_coa_state, bool $strict = true): bool
    {
        return in_array($account_setup_coa_state, $this->account_setup_coa_state, $strict);
    }

    /**
     * @param array $account_setup_fy_data_state
     */
    public function removeAccountSetupFyDataState(array $account_setup_fy_data_state): void
    {
        if ($this->hasAccountSetupFyDataState($account_setup_fy_data_state)) {
            $index = array_search($account_setup_fy_data_state, $this->account_setup_fy_data_state);
            unset($this->account_setup_fy_data_state[$index]);
        }
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param array $font
     */
    public function addFont(array $font): void
    {
        if ($this->hasFont($font)) {
            return;
        }

        $this->font[] = $font;
    }

    /**
     * @param View $external_report_layout_id
     */
    public function setExternalReportLayoutId(View $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param array $base_onboarding_company_state
     */
    public function setBaseOnboardingCompanyState(array $base_onboarding_company_state): void
    {
        $this->base_onboarding_company_state = $base_onboarding_company_state;
    }

    /**
     * @param array $base_onboarding_company_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBaseOnboardingCompanyState(
        array $base_onboarding_company_state,
        bool $strict = true
    ): bool
    {
        return in_array($base_onboarding_company_state, $this->base_onboarding_company_state, $strict);
    }

    /**
     * @param array $base_onboarding_company_state
     */
    public function addBaseOnboardingCompanyState(array $base_onboarding_company_state): void
    {
        if ($this->hasBaseOnboardingCompanyState($base_onboarding_company_state)) {
            return;
        }

        $this->base_onboarding_company_state[] = $base_onboarding_company_state;
    }

    /**
     * @param array $base_onboarding_company_state
     */
    public function removeBaseOnboardingCompanyState(array $base_onboarding_company_state): void
    {
        if ($this->hasBaseOnboardingCompanyState($base_onboarding_company_state)) {
            $index = array_search($base_onboarding_company_state, $this->base_onboarding_company_state);
            unset($this->base_onboarding_company_state[$index]);
        }
    }

    /**
     * @param int $favicon
     */
    public function setFavicon(int $favicon): void
    {
        $this->favicon = $favicon;
    }

    /**
     * @param array $font
     */
    public function setFont(array $font): void
    {
        $this->font = $font;
    }

    /**
     * @param array $font
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFont(array $font, bool $strict = true): bool
    {
        return in_array($font, $this->font, $strict);
    }

    /**
     * @param array $font
     */
    public function removeFont(array $font): void
    {
        if ($this->hasFont($font)) {
            $index = array_search($font, $this->font);
            unset($this->font[$index]);
        }
    }

    /**
     * @param string $company_registry
     */
    public function setCompanyRegistry(string $company_registry): void
    {
        $this->company_registry = $company_registry;
    }

    /**
     * @param string $primary_color
     */
    public function setPrimaryColor(string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @param string $secondary_color
     */
    public function setSecondaryColor(string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @param Calendar $resource_calendar_ids
     */
    public function setResourceCalendarIds(Calendar $resource_calendar_ids): void
    {
        $this->resource_calendar_ids = $resource_calendar_ids;
    }

    /**
     * @param Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return string
     */
    public function getCatchall(): string
    {
        return $this->catchall;
    }

    /**
     * @return int
     */
    public function getPartnerGid(): int
    {
        return $this->partner_gid;
    }

    /**
     * @param bool $snailmail_color
     */
    public function setSnailmailColor(bool $snailmail_color): void
    {
        $this->snailmail_color = $snailmail_color;
    }

    /**
     * @param bool $snailmail_cover
     */
    public function setSnailmailCover(bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
    }

    /**
     * @param bool $snailmail_duplex
     */
    public function setSnailmailDuplex(bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @param Paperformat $paperformat_id
     */
    public function setPaperformatId(Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param string $vat
     */
    public function setVat(string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @param null|array $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param Users $user_ids
     */
    public function setUserIds(Users $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param CompanyAlias $parent_id
     */
    public function setParentId(CompanyAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param CompanyAlias $child_ids
     */
    public function setChildIds(CompanyAlias $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string $report_header
     */
    public function setReportHeader(string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @param string $report_footer
     */
    public function setReportFooter(string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param int $logo
     */
    public function setLogo(int $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return int
     */
    public function getLogoWeb(): int
    {
        return $this->logo_web;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param string $account_no
     */
    public function setAccountNo(string $account_no): void
    {
        $this->account_no = $account_no;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param string $street2
     */
    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param State $state_id
     */
    public function setStateId(State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param Bank $bank_ids
     */
    public function setBankIds(Bank $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param null|int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(?int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @param ?array $fiscalyear_last_month
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFiscalyearLastMonth(?array $fiscalyear_last_month, bool $strict = true): bool
    {
        if (null === $this->fiscalyear_last_month) {
            return false;
        }

        return in_array($fiscalyear_last_month, $this->fiscalyear_last_month, $strict);
    }

    /**
     * @param array $account_setup_fy_data_state
     */
    public function addAccountSetupFyDataState(array $account_setup_fy_data_state): void
    {
        if ($this->hasAccountSetupFyDataState($account_setup_fy_data_state)) {
            return;
        }

        $this->account_setup_fy_data_state[] = $account_setup_fy_data_state;
    }

    /**
     * @param bool $invoice_is_email
     */
    public function setInvoiceIsEmail(bool $invoice_is_email): void
    {
        $this->invoice_is_email = $invoice_is_email;
    }

    /**
     * @param Account $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(Account $property_stock_account_input_categ_id): void
    {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param Account $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        Account $property_stock_account_output_categ_id
    ): void
    {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @param Account $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(Account $property_stock_valuation_account_id): void
    {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
    }

    /**
     * @param Journal $bank_journal_ids
     */
    public function setBankJournalIds(Journal $bank_journal_ids): void
    {
        $this->bank_journal_ids = $bank_journal_ids;
    }

    /**
     * @param bool $tax_exigibility
     */
    public function setTaxExigibility(bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param DateTimeInterface $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        DateTimeInterface $account_bank_reconciliation_start
    ): void
    {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
    }

    /**
     * @param Incoterms $incoterm_id
     */
    public function setIncotermId(Incoterms $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @param bool $qr_code
     */
    public function setQrCode(bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param bool $invoice_is_print
     */
    public function setInvoiceIsPrint(bool $invoice_is_print): void
    {
        $this->invoice_is_print = $invoice_is_print;
    }

    /**
     * @param Account $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(Account $expense_currency_exchange_account_id): void
    {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @param Move $account_opening_move_id
     */
    public function setAccountOpeningMoveId(Move $account_opening_move_id): void
    {
        $this->account_opening_move_id = $account_opening_move_id;
    }

    /**
     * @param Journal $account_opening_journal_id
     */
    public function setAccountOpeningJournalId(Journal $account_opening_journal_id): void
    {
        $this->account_opening_journal_id = $account_opening_journal_id;
    }

    /**
     * @param DateTimeInterface $account_opening_date
     */
    public function setAccountOpeningDate(DateTimeInterface $account_opening_date): void
    {
        $this->account_opening_date = $account_opening_date;
    }

    /**
     * @param array $account_setup_bank_data_state
     */
    public function setAccountSetupBankDataState(array $account_setup_bank_data_state): void
    {
        $this->account_setup_bank_data_state = $account_setup_bank_data_state;
    }

    /**
     * @param array $account_setup_bank_data_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupBankDataState(
        array $account_setup_bank_data_state,
        bool $strict = true
    ): bool
    {
        return in_array($account_setup_bank_data_state, $this->account_setup_bank_data_state, $strict);
    }

    /**
     * @param array $account_setup_bank_data_state
     */
    public function addAccountSetupBankDataState(array $account_setup_bank_data_state): void
    {
        if ($this->hasAccountSetupBankDataState($account_setup_bank_data_state)) {
            return;
        }

        $this->account_setup_bank_data_state[] = $account_setup_bank_data_state;
    }

    /**
     * @param array $account_setup_bank_data_state
     */
    public function removeAccountSetupBankDataState(array $account_setup_bank_data_state): void
    {
        if ($this->hasAccountSetupBankDataState($account_setup_bank_data_state)) {
            $index = array_search($account_setup_bank_data_state, $this->account_setup_bank_data_state);
            unset($this->account_setup_bank_data_state[$index]);
        }
    }

    /**
     * @param array $account_setup_fy_data_state
     */
    public function setAccountSetupFyDataState(array $account_setup_fy_data_state): void
    {
        $this->account_setup_fy_data_state = $account_setup_fy_data_state;
    }

    /**
     * @param array $account_setup_fy_data_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupFyDataState(array $account_setup_fy_data_state, bool $strict = true): bool
    {
        return in_array($account_setup_fy_data_state, $this->account_setup_fy_data_state, $strict);
    }

    /**
     * @param bool $anglo_saxon_accounting
     */
    public function setAngloSaxonAccounting(bool $anglo_saxon_accounting): void
    {
        $this->anglo_saxon_accounting = $anglo_saxon_accounting;
    }

    /**
     * @param Account $income_currency_exchange_account_id
     */
    public function setIncomeCurrencyExchangeAccountId(Account $income_currency_exchange_account_id): void
    {
        $this->income_currency_exchange_account_id = $income_currency_exchange_account_id;
    }

    /**
     * @param ?array $fiscalyear_last_month
     */
    public function addFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        if ($this->hasFiscalyearLastMonth($fiscalyear_last_month)) {
            return;
        }

        if (null === $this->fiscalyear_last_month) {
            $this->fiscalyear_last_month = [];
        }

        $this->fiscalyear_last_month[] = $fiscalyear_last_month;
    }

    /**
     * @param string $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
    }

    /**
     * @param ?array $fiscalyear_last_month
     */
    public function removeFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        if ($this->hasFiscalyearLastMonth($fiscalyear_last_month)) {
            $index = array_search($fiscalyear_last_month, $this->fiscalyear_last_month);
            unset($this->fiscalyear_last_month[$index]);
        }
    }

    /**
     * @param DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param DateTimeInterface $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @param DateTimeInterface $tax_lock_date
     */
    public function setTaxLockDate(DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
    }

    /**
     * @param Account $transfer_account_id
     */
    public function setTransferAccountId(Account $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @param bool $expects_chart_of_accounts
     */
    public function setExpectsChartOfAccounts(bool $expects_chart_of_accounts): void
    {
        $this->expects_chart_of_accounts = $expects_chart_of_accounts;
    }

    /**
     * @param Template $chart_template_id
     */
    public function setChartTemplateId(Template $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param string $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @param Account $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        Account $default_cash_difference_income_account_id
    ): void
    {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @param Journal $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(Journal $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @param Account $default_cash_difference_expense_account_id
     */
    public function setDefaultCashDifferenceExpenseAccountId(
        Account $default_cash_difference_expense_account_id
    ): void
    {
        $this->default_cash_difference_expense_account_id = $default_cash_difference_expense_account_id;
    }

    /**
     * @param string $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(string $transfer_account_code_prefix): void
    {
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @param Tax $account_sale_tax_id
     */
    public function setAccountSaleTaxId(Tax $account_sale_tax_id): void
    {
        $this->account_sale_tax_id = $account_sale_tax_id;
    }

    /**
     * @param Tax $account_purchase_tax_id
     */
    public function setAccountPurchaseTaxId(Tax $account_purchase_tax_id): void
    {
        $this->account_purchase_tax_id = $account_purchase_tax_id;
    }

    /**
     * @param Journal $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(Journal $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @param array $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(array $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @param array $tax_calculation_rounding_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxCalculationRoundingMethod(
        array $tax_calculation_rounding_method,
        bool $strict = true
    ): bool
    {
        return in_array($tax_calculation_rounding_method, $this->tax_calculation_rounding_method, $strict);
    }

    /**
     * @param array $tax_calculation_rounding_method
     */
    public function addTaxCalculationRoundingMethod(array $tax_calculation_rounding_method): void
    {
        if ($this->hasTaxCalculationRoundingMethod($tax_calculation_rounding_method)) {
            return;
        }

        $this->tax_calculation_rounding_method[] = $tax_calculation_rounding_method;
    }

    /**
     * @param array $tax_calculation_rounding_method
     */
    public function removeTaxCalculationRoundingMethod(array $tax_calculation_rounding_method): void
    {
        if ($this->hasTaxCalculationRoundingMethod($tax_calculation_rounding_method)) {
            $index = array_search($tax_calculation_rounding_method, $this->tax_calculation_rounding_method);
            unset($this->tax_calculation_rounding_method[$index]);
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
