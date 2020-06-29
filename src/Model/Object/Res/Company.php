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
use Flux\OdooApiClient\Model\Object\Resource_\Calendar;

/**
 * Odoo model : res.company
 * Name : res.company
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
final class Company extends Base
{
    /**
     * Company Name
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * Used to order Companies in the company switcher
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Parent Company
     *
     * @var null|CompanyAlias
     */
    private $parent_id;

    /**
     * Child Companies
     *
     * @var null|CompanyAlias[]
     */
    private $child_ids;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Company Tagline
     * Appears by default on the top right corner of your printed documents (report header).
     *
     * @var null|string
     */
    private $report_header;

    /**
     * Report Footer
     * Footer text displayed at the bottom of all reports.
     *
     * @var null|string
     */
    private $report_footer;

    /**
     * Company Logo
     *
     * @var null|int
     */
    private $logo;

    /**
     * Logo Web
     *
     * @var null|int
     */
    private $logo_web;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Accepted Users
     *
     * @var null|Users[]
     */
    private $user_ids;

    /**
     * Account No.
     *
     * @var null|string
     */
    private $account_no;

    /**
     * Street
     *
     * @var null|string
     */
    private $street;

    /**
     * Street2
     *
     * @var null|string
     */
    private $street2;

    /**
     * Zip
     *
     * @var null|string
     */
    private $zip;

    /**
     * City
     *
     * @var null|string
     */
    private $city;

    /**
     * Fed. State
     *
     * @var null|State
     */
    private $state_id;

    /**
     * Bank Accounts
     * Bank accounts related to this company
     *
     * @var null|Bank[]
     */
    private $bank_ids;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Email
     *
     * @var null|string
     */
    private $email;

    /**
     * Phone
     *
     * @var null|string
     */
    private $phone;

    /**
     * Website Link
     *
     * @var null|string
     */
    private $website;

    /**
     * Tax ID
     * The Tax Identification Number. Complete it if the contact is subjected to government taxes. Used in some legal
     * statements.
     *
     * @var null|string
     */
    private $vat;

    /**
     * Company Registry
     *
     * @var null|string
     */
    private $company_registry;

    /**
     * Paper format
     *
     * @var null|Paperformat
     */
    private $paperformat_id;

    /**
     * Document Template
     *
     * @var null|View
     */
    private $external_report_layout_id;

    /**
     * State of the onboarding company step
     *
     * @var null|array
     */
    private $base_onboarding_company_state;

    /**
     * Company Favicon
     * This field holds the image used to display a favicon for a given company.
     *
     * @var null|int
     */
    private $favicon;

    /**
     * Font
     *
     * @var null|array
     */
    private $font;

    /**
     * Primary Color
     *
     * @var null|string
     */
    private $primary_color;

    /**
     * Secondary Color
     *
     * @var null|string
     */
    private $secondary_color;

    /**
     * Working Hours
     *
     * @var null|Calendar[]
     */
    private $resource_calendar_ids;

    /**
     * Default Working Hours
     *
     * @var null|Calendar
     */
    private $resource_calendar_id;

    /**
     * Catchall Email
     *
     * @var null|string
     */
    private $catchall;

    /**
     * Company database ID
     *
     * @var null|int
     */
    private $partner_gid;

    /**
     * Color
     *
     * @var null|bool
     */
    private $snailmail_color;

    /**
     * Add a Cover Page
     *
     * @var null|bool
     */
    private $snailmail_cover;

    /**
     * Both sides
     *
     * @var null|bool
     */
    private $snailmail_duplex;

    /**
     * Fiscalyear Last Day
     *
     * @var int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     *
     * @var array
     */
    private $fiscalyear_last_month;

    /**
     * Lock Date for Non-Advisers
     * Only users with the 'Adviser' role can edit accounts prior to and inclusive of this date. Use it for period
     * locking inside an open fiscal year, for example.
     *
     * @var null|DateTimeInterface
     */
    private $period_lock_date;

    /**
     * Lock Date
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     *
     * @var null|DateTimeInterface
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     * No users can edit journal entries related to a tax prior and inclusive of this date.
     *
     * @var null|DateTimeInterface
     */
    private $tax_lock_date;

    /**
     * Inter-Banks Transfer Account
     * Intermediary account used when moving money from a liquidity account to another
     *
     * @var null|Account
     */
    private $transfer_account_id;

    /**
     * Expects a Chart of Accounts
     *
     * @var null|bool
     */
    private $expects_chart_of_accounts;

    /**
     * Chart Template
     * The chart template for the company (if any)
     *
     * @var null|Template
     */
    private $chart_template_id;

    /**
     * Prefix of the bank accounts
     *
     * @var null|string
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the cash accounts
     *
     * @var null|string
     */
    private $cash_account_code_prefix;

    /**
     * Cash Difference Income Account
     *
     * @var null|Account
     */
    private $default_cash_difference_income_account_id;

    /**
     * Cash Difference Expense Account
     *
     * @var null|Account
     */
    private $default_cash_difference_expense_account_id;

    /**
     * Prefix of the transfer accounts
     *
     * @var null|string
     */
    private $transfer_account_code_prefix;

    /**
     * Default Sale Tax
     *
     * @var null|Tax
     */
    private $account_sale_tax_id;

    /**
     * Default Purchase Tax
     *
     * @var null|Tax
     */
    private $account_purchase_tax_id;

    /**
     * Cash Basis Journal
     *
     * @var null|Journal
     */
    private $tax_cash_basis_journal_id;

    /**
     * Tax Calculation Rounding Method
     *
     * @var null|array
     */
    private $tax_calculation_rounding_method;

    /**
     * Exchange Gain or Loss Journal
     *
     * @var null|Journal
     */
    private $currency_exchange_journal_id;

    /**
     * Gain Exchange Rate Account
     * It acts as a default account for credit amount
     *
     * @var null|Account
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     * It acts as a default account for debit amount
     *
     * @var null|Account
     */
    private $expense_currency_exchange_account_id;

    /**
     * Use anglo-saxon accounting
     *
     * @var null|bool
     */
    private $anglo_saxon_accounting;

    /**
     * Input Account for Stock Valuation
     *
     * @var null|Account
     */
    private $property_stock_account_input_categ_id;

    /**
     * Output Account for Stock Valuation
     *
     * @var null|Account
     */
    private $property_stock_account_output_categ_id;

    /**
     * Account Template for Stock Valuation
     *
     * @var null|Account
     */
    private $property_stock_valuation_account_id;

    /**
     * Bank Journals
     *
     * @var null|Journal[]
     */
    private $bank_journal_ids;

    /**
     * Use Cash Basis
     *
     * @var null|bool
     */
    private $tax_exigibility;

    /**
     * Bank Reconciliation Threshold
     * The bank reconciliation widget won't ask to reconcile payments older than this date.
     * This is useful if you install accounting after having used invoicing for some time and
     * don't want to reconcile all the past payments with bank statements.
     *
     * @var null|DateTimeInterface
     */
    private $account_bank_reconciliation_start;

    /**
     * Default incoterm
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     *
     * @var null|Incoterms
     */
    private $incoterm_id;

    /**
     * Display SEPA QR code
     *
     * @var null|bool
     */
    private $qr_code;

    /**
     * Email by default
     *
     * @var null|bool
     */
    private $invoice_is_email;

    /**
     * Print by default
     *
     * @var null|bool
     */
    private $invoice_is_print;

    /**
     * Opening Journal Entry
     * The journal entry containing the initial balance of all this company's accounts.
     *
     * @var null|Move
     */
    private $account_opening_move_id;

    /**
     * Opening Journal
     * Journal where the opening entry of this company's accounting has been posted.
     *
     * @var null|Journal
     */
    private $account_opening_journal_id;

    /**
     * Opening Date
     * Date at which the opening entry of this company's accounting has been posted.
     *
     * @var null|DateTimeInterface
     */
    private $account_opening_date;

    /**
     * State of the onboarding bank data step
     *
     * @var null|array
     */
    private $account_setup_bank_data_state;

    /**
     * State of the onboarding fiscal year step
     *
     * @var null|array
     */
    private $account_setup_fy_data_state;

    /**
     * State of the onboarding charts of account step
     *
     * @var null|array
     */
    private $account_setup_coa_state;

    /**
     * State of the onboarding invoice layout step
     *
     * @var null|array
     */
    private $account_onboarding_invoice_layout_state;

    /**
     * State of the onboarding sample invoice step
     *
     * @var null|array
     */
    private $account_onboarding_sample_invoice_state;

    /**
     * State of the onboarding sale tax step
     *
     * @var null|array
     */
    private $account_onboarding_sale_tax_state;

    /**
     * State of the account invoice onboarding panel
     *
     * @var null|array
     */
    private $account_invoice_onboarding_state;

    /**
     * State of the account dashboard onboarding panel
     *
     * @var null|array
     */
    private $account_dashboard_onboarding_state;

    /**
     * Default Terms and Conditions
     *
     * @var null|string
     */
    private $invoice_terms;

    /**
     * Default PoS Receivable Account
     *
     * @var null|Account
     */
    private $account_default_pos_receivable_account_id;

    /**
     * Expense Accrual Account
     * Account used to move the period of an expense
     *
     * @var null|Account
     */
    private $expense_accrual_account_id;

    /**
     * Revenue Accrual Account
     * Account used to move the period of a revenue
     *
     * @var null|Account
     */
    private $revenue_accrual_account_id;

    /**
     * Accrual Default Journal
     * Journal used by default for moving the period of an entry
     *
     * @var null|Journal
     */
    private $accrual_default_journal_id;

    /**
     * Send mode on invoices attachments
     *
     * @var array
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     *
     * @var bool
     */
    private $extract_single_line_per_tax;

    /**
     * Interval Unit
     *
     * @var null|array
     */
    private $currency_interval_unit;

    /**
     * Next Execution Date
     *
     * @var null|DateTimeInterface
     */
    private $currency_next_execution_date;

    /**
     * Service Provider
     *
     * @var null|array
     */
    private $currency_provider;

    /**
     * State of the onboarding payment acquirer step
     *
     * @var null|array
     */
    private $payment_acquirer_onboarding_state;

    /**
     * Selected onboarding payment method
     *
     * @var null|array
     */
    private $payment_onboarding_payment_method;

    /**
     * Send by Post
     *
     * @var null|bool
     */
    private $invoice_is_snailmail;

    /**
     * Add totals below sections
     * When ticked, totals and subtotals appear below the sections of the report.
     *
     * @var null|bool
     */
    private $totals_below_sections;

    /**
     * Delay units
     * Periodicity
     *
     * @var null|array
     */
    private $account_tax_periodicity;

    /**
     * Start from
     *
     * @var null|int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Start from original
     * technical helper to prevent rewriting activity date when saving settings
     *
     * @var null|int
     */
    private $account_tax_original_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Account Tax Next Activity Type
     *
     * @var null|Type
     */
    private $account_tax_next_activity_type;

    /**
     * access_token
     *
     * @var null|string
     */
    private $yodlee_access_token;

    /**
     * Yodlee login
     *
     * @var null|string
     */
    private $yodlee_user_login;

    /**
     * Yodlee password
     *
     * @var null|string
     */
    private $yodlee_user_password;

    /**
     * Yodlee access token
     *
     * @var null|string
     */
    private $yodlee_user_access_token;

    /**
     * Online Signature
     *
     * @var null|bool
     */
    private $portal_confirmation_sign;

    /**
     * Online Payment
     *
     * @var null|bool
     */
    private $portal_confirmation_pay;

    /**
     * Default Quotation Validity (Days)
     *
     * @var null|int
     */
    private $quotation_validity_days;

    /**
     * State of the sale onboarding panel
     *
     * @var null|array
     */
    private $sale_quotation_onboarding_state;

    /**
     * State of the onboarding confirmation order step
     *
     * @var null|array
     */
    private $sale_onboarding_order_confirmation_state;

    /**
     * State of the onboarding sample quotation step
     *
     * @var null|array
     */
    private $sale_onboarding_sample_quotation_state;

    /**
     * Sale onboarding selected payment method
     *
     * @var null|array
     */
    private $sale_onboarding_payment_method;

    /**
     * Gain Account
     * Account used to write the journal item in case of gain while selling an asset
     *
     * @var null|Account
     */
    private $gain_account_id;

    /**
     * Loss Account
     * Account used to write the journal item in case of loss while selling an asset
     *
     * @var null|Account
     */
    private $loss_account_id;

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
     * @param string $name Company Name
     * @param Partner $partner_id Partner
     * @param Currency $currency_id Currency
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     * @param array $fiscalyear_last_month Fiscalyear Last Month
     * @param array $extract_show_ocr_option_selection Send mode on invoices attachments
     * @param bool $extract_single_line_per_tax OCR Single Invoice Line Per Tax
     */
    public function __construct(
        string $name,
        Partner $partner_id,
        Currency $currency_id,
        int $fiscalyear_last_day,
        array $fiscalyear_last_month,
        array $extract_show_ocr_option_selection,
        bool $extract_single_line_per_tax
    ) {
        $this->name = $name;
        $this->partner_id = $partner_id;
        $this->currency_id = $currency_id;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @param null|Journal $accrual_default_journal_id
     */
    public function setAccrualDefaultJournalId(?Journal $accrual_default_journal_id): void
    {
        $this->accrual_default_journal_id = $accrual_default_journal_id;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountInvoiceOnboardingState($item): void
    {
        if (null === $this->account_invoice_onboarding_state) {
            $this->account_invoice_onboarding_state = [];
        }

        if ($this->hasAccountInvoiceOnboardingState($item)) {
            $index = array_search($item, $this->account_invoice_onboarding_state);
            unset($this->account_invoice_onboarding_state[$index]);
        }
    }

    /**
     * @param null|array $account_dashboard_onboarding_state
     */
    public function setAccountDashboardOnboardingState(?array $account_dashboard_onboarding_state): void
    {
        $this->account_dashboard_onboarding_state = $account_dashboard_onboarding_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountDashboardOnboardingState($item, bool $strict = true): bool
    {
        if (null === $this->account_dashboard_onboarding_state) {
            return false;
        }

        return in_array($item, $this->account_dashboard_onboarding_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountDashboardOnboardingState($item): void
    {
        if ($this->hasAccountDashboardOnboardingState($item)) {
            return;
        }

        if (null === $this->account_dashboard_onboarding_state) {
            $this->account_dashboard_onboarding_state = [];
        }

        $this->account_dashboard_onboarding_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountDashboardOnboardingState($item): void
    {
        if (null === $this->account_dashboard_onboarding_state) {
            $this->account_dashboard_onboarding_state = [];
        }

        if ($this->hasAccountDashboardOnboardingState($item)) {
            $index = array_search($item, $this->account_dashboard_onboarding_state);
            unset($this->account_dashboard_onboarding_state[$index]);
        }
    }

    /**
     * @param null|string $invoice_terms
     */
    public function setInvoiceTerms(?string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
    }

    /**
     * @param null|Account $account_default_pos_receivable_account_id
     */
    public function setAccountDefaultPosReceivableAccountId(
        ?Account $account_default_pos_receivable_account_id
    ): void {
        $this->account_default_pos_receivable_account_id = $account_default_pos_receivable_account_id;
    }

    /**
     * @param null|Account $expense_accrual_account_id
     */
    public function setExpenseAccrualAccountId(?Account $expense_accrual_account_id): void
    {
        $this->expense_accrual_account_id = $expense_accrual_account_id;
    }

    /**
     * @param null|Account $revenue_accrual_account_id
     */
    public function setRevenueAccrualAccountId(?Account $revenue_accrual_account_id): void
    {
        $this->revenue_accrual_account_id = $revenue_accrual_account_id;
    }

    /**
     * @param array $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(array $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountInvoiceOnboardingState($item, bool $strict = true): bool
    {
        if (null === $this->account_invoice_onboarding_state) {
            return false;
        }

        return in_array($item, $this->account_invoice_onboarding_state, $strict);
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractShowOcrOptionSelection($item, bool $strict = true): bool
    {
        return in_array($item, $this->extract_show_ocr_option_selection, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addExtractShowOcrOptionSelection($item): void
    {
        if ($this->hasExtractShowOcrOptionSelection($item)) {
            return;
        }

        $this->extract_show_ocr_option_selection[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeExtractShowOcrOptionSelection($item): void
    {
        if ($this->hasExtractShowOcrOptionSelection($item)) {
            $index = array_search($item, $this->extract_show_ocr_option_selection);
            unset($this->extract_show_ocr_option_selection[$index]);
        }
    }

    /**
     * @param bool $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @param null|array $currency_interval_unit
     */
    public function setCurrencyIntervalUnit(?array $currency_interval_unit): void
    {
        $this->currency_interval_unit = $currency_interval_unit;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCurrencyIntervalUnit($item, bool $strict = true): bool
    {
        if (null === $this->currency_interval_unit) {
            return false;
        }

        return in_array($item, $this->currency_interval_unit, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addCurrencyIntervalUnit($item): void
    {
        if ($this->hasCurrencyIntervalUnit($item)) {
            return;
        }

        if (null === $this->currency_interval_unit) {
            $this->currency_interval_unit = [];
        }

        $this->currency_interval_unit[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeCurrencyIntervalUnit($item): void
    {
        if (null === $this->currency_interval_unit) {
            $this->currency_interval_unit = [];
        }

        if ($this->hasCurrencyIntervalUnit($item)) {
            $index = array_search($item, $this->currency_interval_unit);
            unset($this->currency_interval_unit[$index]);
        }
    }

    /**
     * @param null|DateTimeInterface $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(?DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @param mixed $item
     */
    public function addAccountInvoiceOnboardingState($item): void
    {
        if ($this->hasAccountInvoiceOnboardingState($item)) {
            return;
        }

        if (null === $this->account_invoice_onboarding_state) {
            $this->account_invoice_onboarding_state = [];
        }

        $this->account_invoice_onboarding_state[] = $item;
    }

    /**
     * @param null|array $account_invoice_onboarding_state
     */
    public function setAccountInvoiceOnboardingState(?array $account_invoice_onboarding_state): void
    {
        $this->account_invoice_onboarding_state = $account_invoice_onboarding_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCurrencyProvider($item, bool $strict = true): bool
    {
        if (null === $this->currency_provider) {
            return false;
        }

        return in_array($item, $this->currency_provider, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeAccountSetupCoaState($item): void
    {
        if (null === $this->account_setup_coa_state) {
            $this->account_setup_coa_state = [];
        }

        if ($this->hasAccountSetupCoaState($item)) {
            $index = array_search($item, $this->account_setup_coa_state);
            unset($this->account_setup_coa_state[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAccountSetupBankDataState($item): void
    {
        if ($this->hasAccountSetupBankDataState($item)) {
            return;
        }

        if (null === $this->account_setup_bank_data_state) {
            $this->account_setup_bank_data_state = [];
        }

        $this->account_setup_bank_data_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountSetupBankDataState($item): void
    {
        if (null === $this->account_setup_bank_data_state) {
            $this->account_setup_bank_data_state = [];
        }

        if ($this->hasAccountSetupBankDataState($item)) {
            $index = array_search($item, $this->account_setup_bank_data_state);
            unset($this->account_setup_bank_data_state[$index]);
        }
    }

    /**
     * @param null|array $account_setup_fy_data_state
     */
    public function setAccountSetupFyDataState(?array $account_setup_fy_data_state): void
    {
        $this->account_setup_fy_data_state = $account_setup_fy_data_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupFyDataState($item, bool $strict = true): bool
    {
        if (null === $this->account_setup_fy_data_state) {
            return false;
        }

        return in_array($item, $this->account_setup_fy_data_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountSetupFyDataState($item): void
    {
        if ($this->hasAccountSetupFyDataState($item)) {
            return;
        }

        if (null === $this->account_setup_fy_data_state) {
            $this->account_setup_fy_data_state = [];
        }

        $this->account_setup_fy_data_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountSetupFyDataState($item): void
    {
        if (null === $this->account_setup_fy_data_state) {
            $this->account_setup_fy_data_state = [];
        }

        if ($this->hasAccountSetupFyDataState($item)) {
            $index = array_search($item, $this->account_setup_fy_data_state);
            unset($this->account_setup_fy_data_state[$index]);
        }
    }

    /**
     * @param null|array $account_setup_coa_state
     */
    public function setAccountSetupCoaState(?array $account_setup_coa_state): void
    {
        $this->account_setup_coa_state = $account_setup_coa_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupCoaState($item, bool $strict = true): bool
    {
        if (null === $this->account_setup_coa_state) {
            return false;
        }

        return in_array($item, $this->account_setup_coa_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountSetupCoaState($item): void
    {
        if ($this->hasAccountSetupCoaState($item)) {
            return;
        }

        if (null === $this->account_setup_coa_state) {
            $this->account_setup_coa_state = [];
        }

        $this->account_setup_coa_state[] = $item;
    }

    /**
     * @param null|array $account_onboarding_invoice_layout_state
     */
    public function setAccountOnboardingInvoiceLayoutState(
        ?array $account_onboarding_invoice_layout_state
    ): void {
        $this->account_onboarding_invoice_layout_state = $account_onboarding_invoice_layout_state;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountOnboardingSaleTaxState($item): void
    {
        if (null === $this->account_onboarding_sale_tax_state) {
            $this->account_onboarding_sale_tax_state = [];
        }

        if ($this->hasAccountOnboardingSaleTaxState($item)) {
            $index = array_search($item, $this->account_onboarding_sale_tax_state);
            unset($this->account_onboarding_sale_tax_state[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingInvoiceLayoutState($item, bool $strict = true): bool
    {
        if (null === $this->account_onboarding_invoice_layout_state) {
            return false;
        }

        return in_array($item, $this->account_onboarding_invoice_layout_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountOnboardingInvoiceLayoutState($item): void
    {
        if ($this->hasAccountOnboardingInvoiceLayoutState($item)) {
            return;
        }

        if (null === $this->account_onboarding_invoice_layout_state) {
            $this->account_onboarding_invoice_layout_state = [];
        }

        $this->account_onboarding_invoice_layout_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountOnboardingInvoiceLayoutState($item): void
    {
        if (null === $this->account_onboarding_invoice_layout_state) {
            $this->account_onboarding_invoice_layout_state = [];
        }

        if ($this->hasAccountOnboardingInvoiceLayoutState($item)) {
            $index = array_search($item, $this->account_onboarding_invoice_layout_state);
            unset($this->account_onboarding_invoice_layout_state[$index]);
        }
    }

    /**
     * @param null|array $account_onboarding_sample_invoice_state
     */
    public function setAccountOnboardingSampleInvoiceState(
        ?array $account_onboarding_sample_invoice_state
    ): void {
        $this->account_onboarding_sample_invoice_state = $account_onboarding_sample_invoice_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingSampleInvoiceState($item, bool $strict = true): bool
    {
        if (null === $this->account_onboarding_sample_invoice_state) {
            return false;
        }

        return in_array($item, $this->account_onboarding_sample_invoice_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountOnboardingSampleInvoiceState($item): void
    {
        if ($this->hasAccountOnboardingSampleInvoiceState($item)) {
            return;
        }

        if (null === $this->account_onboarding_sample_invoice_state) {
            $this->account_onboarding_sample_invoice_state = [];
        }

        $this->account_onboarding_sample_invoice_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountOnboardingSampleInvoiceState($item): void
    {
        if (null === $this->account_onboarding_sample_invoice_state) {
            $this->account_onboarding_sample_invoice_state = [];
        }

        if ($this->hasAccountOnboardingSampleInvoiceState($item)) {
            $index = array_search($item, $this->account_onboarding_sample_invoice_state);
            unset($this->account_onboarding_sample_invoice_state[$index]);
        }
    }

    /**
     * @param null|array $account_onboarding_sale_tax_state
     */
    public function setAccountOnboardingSaleTaxState(?array $account_onboarding_sale_tax_state): void
    {
        $this->account_onboarding_sale_tax_state = $account_onboarding_sale_tax_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnboardingSaleTaxState($item, bool $strict = true): bool
    {
        if (null === $this->account_onboarding_sale_tax_state) {
            return false;
        }

        return in_array($item, $this->account_onboarding_sale_tax_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountOnboardingSaleTaxState($item): void
    {
        if ($this->hasAccountOnboardingSaleTaxState($item)) {
            return;
        }

        if (null === $this->account_onboarding_sale_tax_state) {
            $this->account_onboarding_sale_tax_state = [];
        }

        $this->account_onboarding_sale_tax_state[] = $item;
    }

    /**
     * @param null|array $currency_provider
     */
    public function setCurrencyProvider(?array $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
    }

    /**
     * @param mixed $item
     */
    public function addCurrencyProvider($item): void
    {
        if ($this->hasCurrencyProvider($item)) {
            return;
        }

        if (null === $this->currency_provider) {
            $this->currency_provider = [];
        }

        $this->currency_provider[] = $item;
    }

    /**
     * @param null|array $account_setup_bank_data_state
     */
    public function setAccountSetupBankDataState(?array $account_setup_bank_data_state): void
    {
        $this->account_setup_bank_data_state = $account_setup_bank_data_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingSampleQuotationState($item, bool $strict = true): bool
    {
        if (null === $this->sale_onboarding_sample_quotation_state) {
            return false;
        }

        return in_array($item, $this->sale_onboarding_sample_quotation_state, $strict);
    }

    /**
     * @param null|array $sale_quotation_onboarding_state
     */
    public function setSaleQuotationOnboardingState(?array $sale_quotation_onboarding_state): void
    {
        $this->sale_quotation_onboarding_state = $sale_quotation_onboarding_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleQuotationOnboardingState($item, bool $strict = true): bool
    {
        if (null === $this->sale_quotation_onboarding_state) {
            return false;
        }

        return in_array($item, $this->sale_quotation_onboarding_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSaleQuotationOnboardingState($item): void
    {
        if ($this->hasSaleQuotationOnboardingState($item)) {
            return;
        }

        if (null === $this->sale_quotation_onboarding_state) {
            $this->sale_quotation_onboarding_state = [];
        }

        $this->sale_quotation_onboarding_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleQuotationOnboardingState($item): void
    {
        if (null === $this->sale_quotation_onboarding_state) {
            $this->sale_quotation_onboarding_state = [];
        }

        if ($this->hasSaleQuotationOnboardingState($item)) {
            $index = array_search($item, $this->sale_quotation_onboarding_state);
            unset($this->sale_quotation_onboarding_state[$index]);
        }
    }

    /**
     * @param null|array $sale_onboarding_order_confirmation_state
     */
    public function setSaleOnboardingOrderConfirmationState(
        ?array $sale_onboarding_order_confirmation_state
    ): void {
        $this->sale_onboarding_order_confirmation_state = $sale_onboarding_order_confirmation_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingOrderConfirmationState($item, bool $strict = true): bool
    {
        if (null === $this->sale_onboarding_order_confirmation_state) {
            return false;
        }

        return in_array($item, $this->sale_onboarding_order_confirmation_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSaleOnboardingOrderConfirmationState($item): void
    {
        if ($this->hasSaleOnboardingOrderConfirmationState($item)) {
            return;
        }

        if (null === $this->sale_onboarding_order_confirmation_state) {
            $this->sale_onboarding_order_confirmation_state = [];
        }

        $this->sale_onboarding_order_confirmation_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleOnboardingOrderConfirmationState($item): void
    {
        if (null === $this->sale_onboarding_order_confirmation_state) {
            $this->sale_onboarding_order_confirmation_state = [];
        }

        if ($this->hasSaleOnboardingOrderConfirmationState($item)) {
            $index = array_search($item, $this->sale_onboarding_order_confirmation_state);
            unset($this->sale_onboarding_order_confirmation_state[$index]);
        }
    }

    /**
     * @param null|array $sale_onboarding_sample_quotation_state
     */
    public function setSaleOnboardingSampleQuotationState(
        ?array $sale_onboarding_sample_quotation_state
    ): void {
        $this->sale_onboarding_sample_quotation_state = $sale_onboarding_sample_quotation_state;
    }

    /**
     * @param mixed $item
     */
    public function addSaleOnboardingSampleQuotationState($item): void
    {
        if ($this->hasSaleOnboardingSampleQuotationState($item)) {
            return;
        }

        if (null === $this->sale_onboarding_sample_quotation_state) {
            $this->sale_onboarding_sample_quotation_state = [];
        }

        $this->sale_onboarding_sample_quotation_state[] = $item;
    }

    /**
     * @param null|bool $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(?bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleOnboardingSampleQuotationState($item): void
    {
        if (null === $this->sale_onboarding_sample_quotation_state) {
            $this->sale_onboarding_sample_quotation_state = [];
        }

        if ($this->hasSaleOnboardingSampleQuotationState($item)) {
            $index = array_search($item, $this->sale_onboarding_sample_quotation_state);
            unset($this->sale_onboarding_sample_quotation_state[$index]);
        }
    }

    /**
     * @param null|array $sale_onboarding_payment_method
     */
    public function setSaleOnboardingPaymentMethod(?array $sale_onboarding_payment_method): void
    {
        $this->sale_onboarding_payment_method = $sale_onboarding_payment_method;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOnboardingPaymentMethod($item, bool $strict = true): bool
    {
        if (null === $this->sale_onboarding_payment_method) {
            return false;
        }

        return in_array($item, $this->sale_onboarding_payment_method, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSaleOnboardingPaymentMethod($item): void
    {
        if ($this->hasSaleOnboardingPaymentMethod($item)) {
            return;
        }

        if (null === $this->sale_onboarding_payment_method) {
            $this->sale_onboarding_payment_method = [];
        }

        $this->sale_onboarding_payment_method[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleOnboardingPaymentMethod($item): void
    {
        if (null === $this->sale_onboarding_payment_method) {
            $this->sale_onboarding_payment_method = [];
        }

        if ($this->hasSaleOnboardingPaymentMethod($item)) {
            $index = array_search($item, $this->sale_onboarding_payment_method);
            unset($this->sale_onboarding_payment_method[$index]);
        }
    }

    /**
     * @param null|Account $gain_account_id
     */
    public function setGainAccountId(?Account $gain_account_id): void
    {
        $this->gain_account_id = $gain_account_id;
    }

    /**
     * @param null|Account $loss_account_id
     */
    public function setLossAccountId(?Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
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
     * @param null|int $quotation_validity_days
     */
    public function setQuotationValidityDays(?int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @param null|bool $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(?bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param mixed $item
     */
    public function removeCurrencyProvider($item): void
    {
        if (null === $this->currency_provider) {
            $this->currency_provider = [];
        }

        if ($this->hasCurrencyProvider($item)) {
            $index = array_search($item, $this->currency_provider);
            unset($this->currency_provider[$index]);
        }
    }

    /**
     * @param null|bool $totals_below_sections
     */
    public function setTotalsBelowSections(?bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
    }

    /**
     * @param null|array $payment_acquirer_onboarding_state
     */
    public function setPaymentAcquirerOnboardingState(?array $payment_acquirer_onboarding_state): void
    {
        $this->payment_acquirer_onboarding_state = $payment_acquirer_onboarding_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentAcquirerOnboardingState($item, bool $strict = true): bool
    {
        if (null === $this->payment_acquirer_onboarding_state) {
            return false;
        }

        return in_array($item, $this->payment_acquirer_onboarding_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPaymentAcquirerOnboardingState($item): void
    {
        if ($this->hasPaymentAcquirerOnboardingState($item)) {
            return;
        }

        if (null === $this->payment_acquirer_onboarding_state) {
            $this->payment_acquirer_onboarding_state = [];
        }

        $this->payment_acquirer_onboarding_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentAcquirerOnboardingState($item): void
    {
        if (null === $this->payment_acquirer_onboarding_state) {
            $this->payment_acquirer_onboarding_state = [];
        }

        if ($this->hasPaymentAcquirerOnboardingState($item)) {
            $index = array_search($item, $this->payment_acquirer_onboarding_state);
            unset($this->payment_acquirer_onboarding_state[$index]);
        }
    }

    /**
     * @param null|array $payment_onboarding_payment_method
     */
    public function setPaymentOnboardingPaymentMethod(?array $payment_onboarding_payment_method): void
    {
        $this->payment_onboarding_payment_method = $payment_onboarding_payment_method;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentOnboardingPaymentMethod($item, bool $strict = true): bool
    {
        if (null === $this->payment_onboarding_payment_method) {
            return false;
        }

        return in_array($item, $this->payment_onboarding_payment_method, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPaymentOnboardingPaymentMethod($item): void
    {
        if ($this->hasPaymentOnboardingPaymentMethod($item)) {
            return;
        }

        if (null === $this->payment_onboarding_payment_method) {
            $this->payment_onboarding_payment_method = [];
        }

        $this->payment_onboarding_payment_method[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentOnboardingPaymentMethod($item): void
    {
        if (null === $this->payment_onboarding_payment_method) {
            $this->payment_onboarding_payment_method = [];
        }

        if ($this->hasPaymentOnboardingPaymentMethod($item)) {
            $index = array_search($item, $this->payment_onboarding_payment_method);
            unset($this->payment_onboarding_payment_method[$index]);
        }
    }

    /**
     * @param null|bool $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
    }

    /**
     * @param null|array $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @param null|string $yodlee_user_access_token
     */
    public function setYodleeUserAccessToken(?string $yodlee_user_access_token): void
    {
        $this->yodlee_user_access_token = $yodlee_user_access_token;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity($item, bool $strict = true): bool
    {
        if (null === $this->account_tax_periodicity) {
            return false;
        }

        return in_array($item, $this->account_tax_periodicity, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAccountTaxPeriodicity($item): void
    {
        if ($this->hasAccountTaxPeriodicity($item)) {
            return;
        }

        if (null === $this->account_tax_periodicity) {
            $this->account_tax_periodicity = [];
        }

        $this->account_tax_periodicity[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountTaxPeriodicity($item): void
    {
        if (null === $this->account_tax_periodicity) {
            $this->account_tax_periodicity = [];
        }

        if ($this->hasAccountTaxPeriodicity($item)) {
            $index = array_search($item, $this->account_tax_periodicity);
            unset($this->account_tax_periodicity[$index]);
        }
    }

    /**
     * @param null|int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(?int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param null|int $account_tax_original_periodicity_reminder_day
     */
    public function setAccountTaxOriginalPeriodicityReminderDay(
        ?int $account_tax_original_periodicity_reminder_day
    ): void {
        $this->account_tax_original_periodicity_reminder_day = $account_tax_original_periodicity_reminder_day;
    }

    /**
     * @param null|Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(?Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param null|Type $account_tax_next_activity_type
     */
    public function setAccountTaxNextActivityType(?Type $account_tax_next_activity_type): void
    {
        $this->account_tax_next_activity_type = $account_tax_next_activity_type;
    }

    /**
     * @param null|string $yodlee_access_token
     */
    public function setYodleeAccessToken(?string $yodlee_access_token): void
    {
        $this->yodlee_access_token = $yodlee_access_token;
    }

    /**
     * @param null|string $yodlee_user_login
     */
    public function setYodleeUserLogin(?string $yodlee_user_login): void
    {
        $this->yodlee_user_login = $yodlee_user_login;
    }

    /**
     * @param null|string $yodlee_user_password
     */
    public function setYodleeUserPassword(?string $yodlee_user_password): void
    {
        $this->yodlee_user_password = $yodlee_user_password;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountSetupBankDataState($item, bool $strict = true): bool
    {
        if (null === $this->account_setup_bank_data_state) {
            return false;
        }

        return in_array($item, $this->account_setup_bank_data_state, $strict);
    }

    /**
     * @param null|DateTimeInterface $account_opening_date
     */
    public function setAccountOpeningDate(?DateTimeInterface $account_opening_date): void
    {
        $this->account_opening_date = $account_opening_date;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $base_onboarding_company_state
     */
    public function setBaseOnboardingCompanyState(?array $base_onboarding_company_state): void
    {
        $this->base_onboarding_company_state = $base_onboarding_company_state;
    }

    /**
     * @param Bank $item
     */
    public function removeBankIds(Bank $item): void
    {
        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        if ($this->hasBankIds($item)) {
            $index = array_search($item, $this->bank_ids);
            unset($this->bank_ids[$index]);
        }
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param null|string $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @param null|string $vat
     */
    public function setVat(?string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @param null|string $company_registry
     */
    public function setCompanyRegistry(?string $company_registry): void
    {
        $this->company_registry = $company_registry;
    }

    /**
     * @param null|Paperformat $paperformat_id
     */
    public function setPaperformatId(?Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param null|View $external_report_layout_id
     */
    public function setExternalReportLayoutId(?View $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBaseOnboardingCompanyState($item, bool $strict = true): bool
    {
        if (null === $this->base_onboarding_company_state) {
            return false;
        }

        return in_array($item, $this->base_onboarding_company_state, $strict);
    }

    /**
     * @param Bank $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankIds(Bank $item, bool $strict = true): bool
    {
        if (null === $this->bank_ids) {
            return false;
        }

        return in_array($item, $this->bank_ids, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addBaseOnboardingCompanyState($item): void
    {
        if ($this->hasBaseOnboardingCompanyState($item)) {
            return;
        }

        if (null === $this->base_onboarding_company_state) {
            $this->base_onboarding_company_state = [];
        }

        $this->base_onboarding_company_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeBaseOnboardingCompanyState($item): void
    {
        if (null === $this->base_onboarding_company_state) {
            $this->base_onboarding_company_state = [];
        }

        if ($this->hasBaseOnboardingCompanyState($item)) {
            $index = array_search($item, $this->base_onboarding_company_state);
            unset($this->base_onboarding_company_state[$index]);
        }
    }

    /**
     * @param null|int $favicon
     */
    public function setFavicon(?int $favicon): void
    {
        $this->favicon = $favicon;
    }

    /**
     * @param null|array $font
     */
    public function setFont(?array $font): void
    {
        $this->font = $font;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFont($item, bool $strict = true): bool
    {
        if (null === $this->font) {
            return false;
        }

        return in_array($item, $this->font, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addFont($item): void
    {
        if ($this->hasFont($item)) {
            return;
        }

        if (null === $this->font) {
            $this->font = [];
        }

        $this->font[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeFont($item): void
    {
        if (null === $this->font) {
            $this->font = [];
        }

        if ($this->hasFont($item)) {
            $index = array_search($item, $this->font);
            unset($this->font[$index]);
        }
    }

    /**
     * @param null|string $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @param null|string $secondary_color
     */
    public function setSecondaryColor(?string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @param null|Calendar[] $resource_calendar_ids
     */
    public function setResourceCalendarIds(?array $resource_calendar_ids): void
    {
        $this->resource_calendar_ids = $resource_calendar_ids;
    }

    /**
     * @param Bank $item
     */
    public function addBankIds(Bank $item): void
    {
        if ($this->hasBankIds($item)) {
            return;
        }

        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        $this->bank_ids[] = $item;
    }

    /**
     * @param null|Bank[] $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param Calendar $item
     */
    public function addResourceCalendarIds(Calendar $item): void
    {
        if ($this->hasResourceCalendarIds($item)) {
            return;
        }

        if (null === $this->resource_calendar_ids) {
            $this->resource_calendar_ids = [];
        }

        $this->resource_calendar_ids[] = $item;
    }

    /**
     * @param null|int $logo
     */
    public function setLogo(?int $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|CompanyAlias $parent_id
     */
    public function setParentId(?CompanyAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|CompanyAlias[] $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param CompanyAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildIds(CompanyAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids, $strict);
    }

    /**
     * @param CompanyAlias $item
     */
    public function addChildIds(CompanyAlias $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param CompanyAlias $item
     */
    public function removeChildIds(CompanyAlias $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|string $report_header
     */
    public function setReportHeader(?string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @param null|string $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return null|int
     */
    public function getLogoWeb(): ?int
    {
        return $this->logo_web;
    }

    /**
     * @param null|State $state_id
     */
    public function setStateId(?State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|Users[] $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUserIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids, $strict);
    }

    /**
     * @param Users $item
     */
    public function addUserIds(Users $item): void
    {
        if ($this->hasUserIds($item)) {
            return;
        }

        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        $this->user_ids[] = $item;
    }

    /**
     * @param Users $item
     */
    public function removeUserIds(Users $item): void
    {
        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        if ($this->hasUserIds($item)) {
            $index = array_search($item, $this->user_ids);
            unset($this->user_ids[$index]);
        }
    }

    /**
     * @param null|string $account_no
     */
    public function setAccountNo(?string $account_no): void
    {
        $this->account_no = $account_no;
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param null|string $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param Calendar $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResourceCalendarIds(Calendar $item, bool $strict = true): bool
    {
        if (null === $this->resource_calendar_ids) {
            return false;
        }

        return in_array($item, $this->resource_calendar_ids, $strict);
    }

    /**
     * @param Calendar $item
     */
    public function removeResourceCalendarIds(Calendar $item): void
    {
        if (null === $this->resource_calendar_ids) {
            $this->resource_calendar_ids = [];
        }

        if ($this->hasResourceCalendarIds($item)) {
            $index = array_search($item, $this->resource_calendar_ids);
            unset($this->resource_calendar_ids[$index]);
        }
    }

    /**
     * @param null|Journal $account_opening_journal_id
     */
    public function setAccountOpeningJournalId(?Journal $account_opening_journal_id): void
    {
        $this->account_opening_journal_id = $account_opening_journal_id;
    }

    /**
     * @param null|Account $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(?Account $property_stock_valuation_account_id): void
    {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxCalculationRoundingMethod($item, bool $strict = true): bool
    {
        if (null === $this->tax_calculation_rounding_method) {
            return false;
        }

        return in_array($item, $this->tax_calculation_rounding_method, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTaxCalculationRoundingMethod($item): void
    {
        if ($this->hasTaxCalculationRoundingMethod($item)) {
            return;
        }

        if (null === $this->tax_calculation_rounding_method) {
            $this->tax_calculation_rounding_method = [];
        }

        $this->tax_calculation_rounding_method[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTaxCalculationRoundingMethod($item): void
    {
        if (null === $this->tax_calculation_rounding_method) {
            $this->tax_calculation_rounding_method = [];
        }

        if ($this->hasTaxCalculationRoundingMethod($item)) {
            $index = array_search($item, $this->tax_calculation_rounding_method);
            unset($this->tax_calculation_rounding_method[$index]);
        }
    }

    /**
     * @param null|Journal $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?Journal $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @param null|Account $income_currency_exchange_account_id
     */
    public function setIncomeCurrencyExchangeAccountId(?Account $income_currency_exchange_account_id): void
    {
        $this->income_currency_exchange_account_id = $income_currency_exchange_account_id;
    }

    /**
     * @param null|Account $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(
        ?Account $expense_currency_exchange_account_id
    ): void {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @param null|bool $anglo_saxon_accounting
     */
    public function setAngloSaxonAccounting(?bool $anglo_saxon_accounting): void
    {
        $this->anglo_saxon_accounting = $anglo_saxon_accounting;
    }

    /**
     * @param null|Account $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(
        ?Account $property_stock_account_input_categ_id
    ): void {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param null|Account $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        ?Account $property_stock_account_output_categ_id
    ): void {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @param null|Journal[] $bank_journal_ids
     */
    public function setBankJournalIds(?array $bank_journal_ids): void
    {
        $this->bank_journal_ids = $bank_journal_ids;
    }

    /**
     * @param null|Journal $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?Journal $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @param Journal $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankJournalIds(Journal $item, bool $strict = true): bool
    {
        if (null === $this->bank_journal_ids) {
            return false;
        }

        return in_array($item, $this->bank_journal_ids, $strict);
    }

    /**
     * @param Journal $item
     */
    public function addBankJournalIds(Journal $item): void
    {
        if ($this->hasBankJournalIds($item)) {
            return;
        }

        if (null === $this->bank_journal_ids) {
            $this->bank_journal_ids = [];
        }

        $this->bank_journal_ids[] = $item;
    }

    /**
     * @param Journal $item
     */
    public function removeBankJournalIds(Journal $item): void
    {
        if (null === $this->bank_journal_ids) {
            $this->bank_journal_ids = [];
        }

        if ($this->hasBankJournalIds($item)) {
            $index = array_search($item, $this->bank_journal_ids);
            unset($this->bank_journal_ids[$index]);
        }
    }

    /**
     * @param null|bool $tax_exigibility
     */
    public function setTaxExigibility(?bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param null|DateTimeInterface $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        ?DateTimeInterface $account_bank_reconciliation_start
    ): void {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
    }

    /**
     * @param null|Incoterms $incoterm_id
     */
    public function setIncotermId(?Incoterms $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @param null|bool $qr_code
     */
    public function setQrCode(?bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param null|bool $invoice_is_email
     */
    public function setInvoiceIsEmail(?bool $invoice_is_email): void
    {
        $this->invoice_is_email = $invoice_is_email;
    }

    /**
     * @param null|bool $invoice_is_print
     */
    public function setInvoiceIsPrint(?bool $invoice_is_print): void
    {
        $this->invoice_is_print = $invoice_is_print;
    }

    /**
     * @param null|Move $account_opening_move_id
     */
    public function setAccountOpeningMoveId(?Move $account_opening_move_id): void
    {
        $this->account_opening_move_id = $account_opening_move_id;
    }

    /**
     * @param null|array $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?array $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @param null|Tax $account_purchase_tax_id
     */
    public function setAccountPurchaseTaxId(?Tax $account_purchase_tax_id): void
    {
        $this->account_purchase_tax_id = $account_purchase_tax_id;
    }

    /**
     * @param null|Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(?Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param mixed $item
     */
    public function removeFiscalyearLastMonth($item): void
    {
        if ($this->hasFiscalyearLastMonth($item)) {
            $index = array_search($item, $this->fiscalyear_last_month);
            unset($this->fiscalyear_last_month[$index]);
        }
    }

    /**
     * @return null|string
     */
    public function getCatchall(): ?string
    {
        return $this->catchall;
    }

    /**
     * @return null|int
     */
    public function getPartnerGid(): ?int
    {
        return $this->partner_gid;
    }

    /**
     * @param null|bool $snailmail_color
     */
    public function setSnailmailColor(?bool $snailmail_color): void
    {
        $this->snailmail_color = $snailmail_color;
    }

    /**
     * @param null|bool $snailmail_cover
     */
    public function setSnailmailCover(?bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
    }

    /**
     * @param null|bool $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @param array $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(array $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFiscalyearLastMonth($item, bool $strict = true): bool
    {
        return in_array($item, $this->fiscalyear_last_month, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addFiscalyearLastMonth($item): void
    {
        if ($this->hasFiscalyearLastMonth($item)) {
            return;
        }

        $this->fiscalyear_last_month[] = $item;
    }

    /**
     * @param null|DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param null|Tax $account_sale_tax_id
     */
    public function setAccountSaleTaxId(?Tax $account_sale_tax_id): void
    {
        $this->account_sale_tax_id = $account_sale_tax_id;
    }

    /**
     * @param null|DateTimeInterface $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @param null|DateTimeInterface $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
    }

    /**
     * @param null|Account $transfer_account_id
     */
    public function setTransferAccountId(?Account $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @param null|bool $expects_chart_of_accounts
     */
    public function setExpectsChartOfAccounts(?bool $expects_chart_of_accounts): void
    {
        $this->expects_chart_of_accounts = $expects_chart_of_accounts;
    }

    /**
     * @param null|Template $chart_template_id
     */
    public function setChartTemplateId(?Template $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param null|string $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(?string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @param null|string $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(?string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
    }

    /**
     * @param null|Account $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        ?Account $default_cash_difference_income_account_id
    ): void {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @param null|Account $default_cash_difference_expense_account_id
     */
    public function setDefaultCashDifferenceExpenseAccountId(
        ?Account $default_cash_difference_expense_account_id
    ): void {
        $this->default_cash_difference_expense_account_id = $default_cash_difference_expense_account_id;
    }

    /**
     * @param null|string $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(?string $transfer_account_code_prefix): void
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
