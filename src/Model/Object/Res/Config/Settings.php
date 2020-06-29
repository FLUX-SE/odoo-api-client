<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Config;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template;
use Flux\OdooApiClient\Model\Object\Account\Incoterms;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Digest\Digest;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Mail\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Report\Paperformat;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Template as Template2;

/**
 * Odoo model : res.config.settings
 * Name : res.config.settings
 * Info :
 * Inherit the base settings to add a counter of failed email + configure
 * the alias domain.
 */
final class Settings extends Base
{
    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Default Access Rights
     *
     * @var null|bool
     */
    private $user_default_rights;

    /**
     * External Email Servers
     *
     * @var null|bool
     */
    private $external_email_server_default;

    /**
     * Allow users to import data from CSV/XLS/XLSX/ODS files
     *
     * @var null|bool
     */
    private $module_base_import;

    /**
     * Allow the users to synchronize their calendar  with Google Calendar
     *
     * @var null|bool
     */
    private $module_google_calendar;

    /**
     * Attach Google documents to any record
     *
     * @var null|bool
     */
    private $module_google_drive;

    /**
     * Google Spreadsheet
     *
     * @var null|bool
     */
    private $module_google_spreadsheet;

    /**
     * Use external authentication providers (OAuth)
     *
     * @var null|bool
     */
    private $module_auth_oauth;

    /**
     * LDAP Authentication
     *
     * @var null|bool
     */
    private $module_auth_ldap;

    /**
     * Translate Your Website with Gengo
     *
     * @var null|bool
     */
    private $module_base_gengo;

    /**
     * Manage Inter Company
     *
     * @var null|bool
     */
    private $module_inter_company_rules;

    /**
     * Collaborative Pads
     *
     * @var null|bool
     */
    private $module_pad;

    /**
     * Asterisk (VoIP)
     *
     * @var null|bool
     */
    private $module_voip;

    /**
     * Unsplash Image Library
     *
     * @var null|bool
     */
    private $module_web_unsplash;

    /**
     * Partner Autocomplete
     *
     * @var null|bool
     */
    private $module_partner_autocomplete;

    /**
     * GeoLocalize
     *
     * @var null|bool
     */
    private $module_base_geolocalize;

    /**
     * Custom Report Footer
     * Footer text displayed at the bottom of all reports.
     *
     * @var null|string
     */
    private $report_footer;

    /**
     * Multi-Currencies
     * Allows to work in a multi currency environment
     *
     * @var null|bool
     */
    private $group_multi_currency;

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
     * Show Effect
     *
     * @var null|bool
     */
    private $show_effect;

    /**
     * Number of Companies
     *
     * @var null|int
     */
    private $company_count;

    /**
     * Number of Active Users
     *
     * @var null|int
     */
    private $active_user_count;

    /**
     * Number of Languages
     *
     * @var null|int
     */
    private $language_count;

    /**
     * Company Name
     *
     * @var null|string
     */
    private $company_name;

    /**
     * Company Informations
     *
     * @var null|string
     */
    private $company_informations;

    /**
     * Fail Mail
     *
     * @var null|int
     */
    private $fail_counter;

    /**
     * Alias Domain
     * If you have setup a catch-all email domain redirected to the Odoo server, enter the domain name here.
     *
     * @var null|string
     */
    private $alias_domain;

    /**
     * Token Map Box
     * Necessary for some functionalities in the map view
     *
     * @var null|string
     */
    private $map_box_token;

    /**
     * Push Notifications
     *
     * @var null|bool
     */
    private $module_ocn_client;

    /**
     * Access Key
     *
     * @var null|string
     */
    private $unsplash_access_key;

    /**
     * Enable password reset from Login page
     *
     * @var null|bool
     */
    private $auth_signup_reset_password;

    /**
     * Template user for new users created through signup
     *
     * @var null|Users
     */
    private $auth_signup_template_user_id;

    /**
     * Insufficient credit
     *
     * @var null|bool
     */
    private $partner_autocomplete_insufficient_credit;

    /**
     * Discounts
     *
     * @var null|bool
     */
    private $group_discount_per_so_line;

    /**
     * Units of Measure
     *
     * @var null|bool
     */
    private $group_uom;

    /**
     * Variants
     *
     * @var null|bool
     */
    private $group_product_variant;

    /**
     * Product Configurator
     *
     * @var null|bool
     */
    private $module_sale_product_configurator;

    /**
     * Sales Grid Entry
     *
     * @var null|bool
     */
    private $module_sale_product_matrix;

    /**
     * Product Packagings
     *
     * @var null|bool
     */
    private $group_stock_packaging;

    /**
     * Pricelists
     *
     * @var null|bool
     */
    private $group_product_pricelist;

    /**
     * Advanced Pricelists
     * Allows to manage different prices based on rules per category of customers.
     * Example: 10% for retailers, promotion of 5 EUR on this product, etc.
     *
     * @var null|bool
     */
    private $group_sale_pricelist;

    /**
     * Pricelists Method
     * Multiple prices: Pricelists with fixed price rules by product,
     * Advanced rules: enables advanced price rules for pricelists.
     *
     * @var null|array
     */
    private $product_pricelist_setting;

    /**
     * Weight unit of measure
     *
     * @var null|array
     */
    private $product_weight_in_lbs;

    /**
     * Volume unit of measure
     *
     * @var null|array
     */
    private $product_volume_volume_in_cubic_feet;

    /**
     * Print In Color
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
     * Print Both sides
     *
     * @var null|bool
     */
    private $snailmail_duplex;

    /**
     * Digest Emails
     *
     * @var null|bool
     */
    private $digest_emails;

    /**
     * Digest Email
     *
     * @var null|Digest
     */
    private $digest_id;

    /**
     * Has Accounting Entries
     *
     * @var null|bool
     */
    private $has_accounting_entries;

    /**
     * Currency
     * Main currency of the company.
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Exchange Gain or Loss Journal
     * The accounting journal where automatic exchange differences will be registered
     *
     * @var null|Journal
     */
    private $currency_exchange_journal_id;

    /**
     * Company has a chart of accounts
     *
     * @var null|bool
     */
    private $has_chart_of_accounts;

    /**
     * Template
     *
     * @var null|Template
     */
    private $chart_template_id;

    /**
     * Default Sale Tax
     *
     * @var null|Tax
     */
    private $sale_tax_id;

    /**
     * Default Purchase Tax
     *
     * @var null|Tax
     */
    private $purchase_tax_id;

    /**
     * Tax calculation rounding method
     *
     * @var null|array
     */
    private $tax_calculation_rounding_method;

    /**
     * Accounting
     *
     * @var null|bool
     */
    private $module_account_accountant;

    /**
     * Analytic Accounting
     *
     * @var null|bool
     */
    private $group_analytic_accounting;

    /**
     * Analytic Tags
     *
     * @var null|bool
     */
    private $group_analytic_tags;

    /**
     * Warnings in Invoices
     *
     * @var null|bool
     */
    private $group_warning_account;

    /**
     * Cash Rounding
     *
     * @var null|bool
     */
    private $group_cash_rounding;

    /**
     * Fiscal Years
     *
     * @var null|bool
     */
    private $group_fiscal_year;

    /**
     * Show line subtotals without taxes (B2B)
     *
     * @var null|bool
     */
    private $group_show_line_subtotals_tax_excluded;

    /**
     * Show line subtotals with taxes (B2C)
     *
     * @var null|bool
     */
    private $group_show_line_subtotals_tax_included;

    /**
     * Line Subtotals Tax Display
     *
     * @var array
     */
    private $show_line_subtotals_tax_selection;

    /**
     * Budget Management
     *
     * @var null|bool
     */
    private $module_account_budget;

    /**
     * Invoice Online Payment
     *
     * @var null|bool
     */
    private $module_account_payment;

    /**
     * Dynamic Reports
     *
     * @var null|bool
     */
    private $module_account_reports;

    /**
     * Allow check printing and deposits
     *
     * @var null|bool
     */
    private $module_account_check_printing;

    /**
     * Use batch payments
     * This allows you grouping payments into a single batch and eases the reconciliation process.
     * -This installs the account_batch_payment module.
     *
     * @var null|bool
     */
    private $module_account_batch_payment;

    /**
     * SEPA Credit Transfer (SCT)
     *
     * @var null|bool
     */
    private $module_account_sepa;

    /**
     * Use SEPA Direct Debit
     *
     * @var null|bool
     */
    private $module_account_sepa_direct_debit;

    /**
     * Plaid Connector
     *
     * @var null|bool
     */
    private $module_account_plaid;

    /**
     * Bank Interface - Sync your bank feeds automatically
     *
     * @var null|bool
     */
    private $module_account_yodlee;

    /**
     * Import .qif files
     *
     * @var null|bool
     */
    private $module_account_bank_statement_import_qif;

    /**
     * Import in .ofx format
     *
     * @var null|bool
     */
    private $module_account_bank_statement_import_ofx;

    /**
     * Import in .csv format
     *
     * @var null|bool
     */
    private $module_account_bank_statement_import_csv;

    /**
     * Import in CAMT.053 format
     *
     * @var null|bool
     */
    private $module_account_bank_statement_import_camt;

    /**
     * Automatic Currency Rates
     *
     * @var null|bool
     */
    private $module_currency_rate_live;

    /**
     * Intrastat
     *
     * @var null|bool
     */
    private $module_account_intrastat;

    /**
     * Allow Product Margin
     *
     * @var null|bool
     */
    private $module_product_margin;

    /**
     * EU Digital Goods VAT
     *
     * @var null|bool
     */
    private $module_l10n_eu_service;

    /**
     * Account TaxCloud
     *
     * @var null|bool
     */
    private $module_account_taxcloud;

    /**
     * Bill Digitalization
     *
     * @var null|bool
     */
    private $module_account_invoice_extract;

    /**
     * Snailmail
     *
     * @var null|bool
     */
    private $module_snailmail_account;

    /**
     * Cash Basis
     *
     * @var null|bool
     */
    private $tax_exigibility;

    /**
     * Tax Cash Basis Journal
     *
     * @var null|Journal
     */
    private $tax_cash_basis_journal_id;

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
     * Display SEPA QR code
     *
     * @var null|bool
     */
    private $qr_code;

    /**
     * Print
     *
     * @var null|bool
     */
    private $invoice_is_print;

    /**
     * Send Email
     *
     * @var null|bool
     */
    private $invoice_is_email;

    /**
     * Default incoterm
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     *
     * @var null|Incoterms
     */
    private $incoterm_id;

    /**
     * Terms & Conditions
     *
     * @var null|string
     */
    private $invoice_terms;

    /**
     * Default Terms & Conditions
     *
     * @var null|bool
     */
    private $use_invoice_terms;

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
     * Lock Date for All Users
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
     * Anglo-Saxon Accounting
     *
     * @var null|bool
     */
    private $use_anglo_saxon;

    /**
     * Account Predictive Bills
     *
     * @var null|bool
     */
    private $module_account_predictive_bills;

    /**
     * Transfer Account
     * Intermediary account used when moving money from a liquidity account to another
     *
     * @var null|Account
     */
    private $transfer_account_id;

    /**
     * Processing Option
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
     * @var null|array
     */
    private $currency_interval_unit;

    /**
     * Service Provider
     *
     * @var null|array
     */
    private $currency_provider;

    /**
     * Next Execution Date
     *
     * @var null|DateTimeInterface
     */
    private $currency_next_execution_date;

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
     * Periodicity
     * Periodicity
     *
     * @var array
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     *
     * @var int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Lock Confirmed Sales
     *
     * @var null|bool
     */
    private $group_auto_done_setting;

    /**
     * Margins
     *
     * @var null|bool
     */
    private $module_sale_margin;

    /**
     * Default Quotation Validity (Days)
     *
     * @var null|int
     */
    private $quotation_validity_days;

    /**
     * Default Quotation Validity
     *
     * @var null|bool
     */
    private $use_quotation_validity_days;

    /**
     * Sale Order Warnings
     *
     * @var null|bool
     */
    private $group_warning_sale;

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
     * Customer Addresses
     *
     * @var null|bool
     */
    private $group_sale_delivery_address;

    /**
     * Pro-Forma Invoice
     * Allows you to send pro-forma invoice.
     *
     * @var null|bool
     */
    private $group_proforma_sales;

    /**
     * Invoicing Policy
     *
     * @var null|array
     */
    private $default_invoice_policy;

    /**
     * Deposit Product
     * Default product used for payment advances
     *
     * @var null|Product
     */
    private $deposit_default_product_id;

    /**
     * Digital Content
     *
     * @var null|bool
     */
    private $module_website_sale_digital;

    /**
     * Customer Account
     *
     * @var null|array
     */
    private $auth_signup_uninvited;

    /**
     * Shipping Costs
     *
     * @var null|bool
     */
    private $module_delivery;

    /**
     * DHL Connector
     *
     * @var null|bool
     */
    private $module_delivery_dhl;

    /**
     * FedEx Connector
     *
     * @var null|bool
     */
    private $module_delivery_fedex;

    /**
     * UPS Connector
     *
     * @var null|bool
     */
    private $module_delivery_ups;

    /**
     * USPS Connector
     *
     * @var null|bool
     */
    private $module_delivery_usps;

    /**
     * bpost Connector
     *
     * @var null|bool
     */
    private $module_delivery_bpost;

    /**
     * Easypost Connector
     *
     * @var null|bool
     */
    private $module_delivery_easypost;

    /**
     * Specific Email
     *
     * @var null|bool
     */
    private $module_product_email_template;

    /**
     * Coupons & Promotions
     *
     * @var null|bool
     */
    private $module_sale_coupon;

    /**
     * Amazon Sync
     *
     * @var null|bool
     */
    private $module_sale_amazon;

    /**
     * Automatic Invoice
     * The invoice is generated automatically and available in the customer portal when the transaction is confirmed
     * by the payment acquirer.
     * The invoice is marked as paid and the payment is registered in the payment journal defined in the
     * configuration of the payment acquirer.
     * This mode is advised if you issue the final invoice at the order and not after the delivery.
     *
     * @var null|bool
     */
    private $automatic_invoice;

    /**
     * Email Template
     *
     * @var null|TemplateAlias
     */
    private $template_id;

    /**
     * Confirmation Email
     * Email sent to the customer once the order is paid.
     *
     * @var null|TemplateAlias
     */
    private $confirmation_template_id;

    /**
     * Quotation Templates
     *
     * @var null|bool
     */
    private $group_sale_order_template;

    /**
     * Default Template
     *
     * @var null|Template2
     */
    private $default_sale_order_template_id;

    /**
     * Quotation Builder
     *
     * @var null|bool
     */
    private $module_sale_quotation_builder;

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
     * @param Company $company_id Company
     * @param Currency $currency_id Currency
     *        Main currency of the company.
     * @param array $show_line_subtotals_tax_selection Line Subtotals Tax Display
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     * @param array $fiscalyear_last_month Fiscalyear Last Month
     * @param array $account_tax_periodicity Periodicity
     *        Periodicity
     * @param int $account_tax_periodicity_reminder_day Reminder
     */
    public function __construct(
        Company $company_id,
        Currency $currency_id,
        array $show_line_subtotals_tax_selection,
        int $fiscalyear_last_day,
        array $fiscalyear_last_month,
        array $account_tax_periodicity,
        int $account_tax_periodicity_reminder_day
    ) {
        $this->company_id = $company_id;
        $this->currency_id = $currency_id;
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->account_tax_periodicity = $account_tax_periodicity;
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param mixed $item
     */
    public function removeExtractShowOcrOptionSelection($item): void
    {
        if (null === $this->extract_show_ocr_option_selection) {
            $this->extract_show_ocr_option_selection = [];
        }

        if ($this->hasExtractShowOcrOptionSelection($item)) {
            $index = array_search($item, $this->extract_show_ocr_option_selection);
            unset($this->extract_show_ocr_option_selection[$index]);
        }
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
     * @param null|bool $use_anglo_saxon
     */
    public function setUseAngloSaxon(?bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @param null|bool $module_account_predictive_bills
     */
    public function setModuleAccountPredictiveBills(?bool $module_account_predictive_bills): void
    {
        $this->module_account_predictive_bills = $module_account_predictive_bills;
    }

    /**
     * @param null|Account $transfer_account_id
     */
    public function setTransferAccountId(?Account $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @param null|array $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?array $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractShowOcrOptionSelection($item, bool $strict = true): bool
    {
        if (null === $this->extract_show_ocr_option_selection) {
            return false;
        }

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

        if (null === $this->extract_show_ocr_option_selection) {
            $this->extract_show_ocr_option_selection = [];
        }

        $this->extract_show_ocr_option_selection[] = $item;
    }

    /**
     * @param null|bool $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(?bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
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
     * @param null|array $currency_provider
     */
    public function setCurrencyProvider(?array $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
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
     * @param null|DateTimeInterface $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(?DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @param null|DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
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
     * @param null|bool $totals_below_sections
     */
    public function setTotalsBelowSections(?bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
    }

    /**
     * @param null|bool $tax_exigibility
     */
    public function setTaxExigibility(?bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param null|bool $module_account_bank_statement_import_camt
     */
    public function setModuleAccountBankStatementImportCamt(
        ?bool $module_account_bank_statement_import_camt
    ): void {
        $this->module_account_bank_statement_import_camt = $module_account_bank_statement_import_camt;
    }

    /**
     * @param null|bool $module_currency_rate_live
     */
    public function setModuleCurrencyRateLive(?bool $module_currency_rate_live): void
    {
        $this->module_currency_rate_live = $module_currency_rate_live;
    }

    /**
     * @param null|bool $module_account_intrastat
     */
    public function setModuleAccountIntrastat(?bool $module_account_intrastat): void
    {
        $this->module_account_intrastat = $module_account_intrastat;
    }

    /**
     * @param null|bool $module_product_margin
     */
    public function setModuleProductMargin(?bool $module_product_margin): void
    {
        $this->module_product_margin = $module_product_margin;
    }

    /**
     * @param null|bool $module_l10n_eu_service
     */
    public function setModuleL10nEuService(?bool $module_l10n_eu_service): void
    {
        $this->module_l10n_eu_service = $module_l10n_eu_service;
    }

    /**
     * @param null|bool $module_account_taxcloud
     */
    public function setModuleAccountTaxcloud(?bool $module_account_taxcloud): void
    {
        $this->module_account_taxcloud = $module_account_taxcloud;
    }

    /**
     * @param null|bool $module_account_invoice_extract
     */
    public function setModuleAccountInvoiceExtract(?bool $module_account_invoice_extract): void
    {
        $this->module_account_invoice_extract = $module_account_invoice_extract;
    }

    /**
     * @param null|bool $module_snailmail_account
     */
    public function setModuleSnailmailAccount(?bool $module_snailmail_account): void
    {
        $this->module_snailmail_account = $module_snailmail_account;
    }

    /**
     * @param null|Journal $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?Journal $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
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
     * @param null|DateTimeInterface $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        ?DateTimeInterface $account_bank_reconciliation_start
    ): void {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
    }

    /**
     * @param null|bool $qr_code
     */
    public function setQrCode(?bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param null|bool $invoice_is_print
     */
    public function setInvoiceIsPrint(?bool $invoice_is_print): void
    {
        $this->invoice_is_print = $invoice_is_print;
    }

    /**
     * @param null|bool $invoice_is_email
     */
    public function setInvoiceIsEmail(?bool $invoice_is_email): void
    {
        $this->invoice_is_email = $invoice_is_email;
    }

    /**
     * @param null|Incoterms $incoterm_id
     */
    public function setIncotermId(?Incoterms $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @param null|string $invoice_terms
     */
    public function setInvoiceTerms(?string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
    }

    /**
     * @param null|bool $use_invoice_terms
     */
    public function setUseInvoiceTerms(?bool $use_invoice_terms): void
    {
        $this->use_invoice_terms = $use_invoice_terms;
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
     * @param null|bool $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
    }

    /**
     * @param array $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(array $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @param null|bool $module_account_bank_statement_import_ofx
     */
    public function setModuleAccountBankStatementImportOfx(
        ?bool $module_account_bank_statement_import_ofx
    ): void {
        $this->module_account_bank_statement_import_ofx = $module_account_bank_statement_import_ofx;
    }

    /**
     * @param null|bool $module_sale_coupon
     */
    public function setModuleSaleCoupon(?bool $module_sale_coupon): void
    {
        $this->module_sale_coupon = $module_sale_coupon;
    }

    /**
     * @param null|bool $module_delivery
     */
    public function setModuleDelivery(?bool $module_delivery): void
    {
        $this->module_delivery = $module_delivery;
    }

    /**
     * @param null|bool $module_delivery_dhl
     */
    public function setModuleDeliveryDhl(?bool $module_delivery_dhl): void
    {
        $this->module_delivery_dhl = $module_delivery_dhl;
    }

    /**
     * @param null|bool $module_delivery_fedex
     */
    public function setModuleDeliveryFedex(?bool $module_delivery_fedex): void
    {
        $this->module_delivery_fedex = $module_delivery_fedex;
    }

    /**
     * @param null|bool $module_delivery_ups
     */
    public function setModuleDeliveryUps(?bool $module_delivery_ups): void
    {
        $this->module_delivery_ups = $module_delivery_ups;
    }

    /**
     * @param null|bool $module_delivery_usps
     */
    public function setModuleDeliveryUsps(?bool $module_delivery_usps): void
    {
        $this->module_delivery_usps = $module_delivery_usps;
    }

    /**
     * @param null|bool $module_delivery_bpost
     */
    public function setModuleDeliveryBpost(?bool $module_delivery_bpost): void
    {
        $this->module_delivery_bpost = $module_delivery_bpost;
    }

    /**
     * @param null|bool $module_delivery_easypost
     */
    public function setModuleDeliveryEasypost(?bool $module_delivery_easypost): void
    {
        $this->module_delivery_easypost = $module_delivery_easypost;
    }

    /**
     * @param null|bool $module_product_email_template
     */
    public function setModuleProductEmailTemplate(?bool $module_product_email_template): void
    {
        $this->module_product_email_template = $module_product_email_template;
    }

    /**
     * @param null|bool $module_sale_amazon
     */
    public function setModuleSaleAmazon(?bool $module_sale_amazon): void
    {
        $this->module_sale_amazon = $module_sale_amazon;
    }

    /**
     * @param mixed $item
     */
    public function addAuthSignupUninvited($item): void
    {
        if ($this->hasAuthSignupUninvited($item)) {
            return;
        }

        if (null === $this->auth_signup_uninvited) {
            $this->auth_signup_uninvited = [];
        }

        $this->auth_signup_uninvited[] = $item;
    }

    /**
     * @param null|bool $automatic_invoice
     */
    public function setAutomaticInvoice(?bool $automatic_invoice): void
    {
        $this->automatic_invoice = $automatic_invoice;
    }

    /**
     * @param null|TemplateAlias $template_id
     */
    public function setTemplateId(?TemplateAlias $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param null|TemplateAlias $confirmation_template_id
     */
    public function setConfirmationTemplateId(?TemplateAlias $confirmation_template_id): void
    {
        $this->confirmation_template_id = $confirmation_template_id;
    }

    /**
     * @param null|bool $group_sale_order_template
     */
    public function setGroupSaleOrderTemplate(?bool $group_sale_order_template): void
    {
        $this->group_sale_order_template = $group_sale_order_template;
    }

    /**
     * @param null|Template2 $default_sale_order_template_id
     */
    public function setDefaultSaleOrderTemplateId(?Template2 $default_sale_order_template_id): void
    {
        $this->default_sale_order_template_id = $default_sale_order_template_id;
    }

    /**
     * @param null|bool $module_sale_quotation_builder
     */
    public function setModuleSaleQuotationBuilder(?bool $module_sale_quotation_builder): void
    {
        $this->module_sale_quotation_builder = $module_sale_quotation_builder;
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
     * @param mixed $item
     */
    public function removeAuthSignupUninvited($item): void
    {
        if (null === $this->auth_signup_uninvited) {
            $this->auth_signup_uninvited = [];
        }

        if ($this->hasAuthSignupUninvited($item)) {
            $index = array_search($item, $this->auth_signup_uninvited);
            unset($this->auth_signup_uninvited[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAuthSignupUninvited($item, bool $strict = true): bool
    {
        if (null === $this->auth_signup_uninvited) {
            return false;
        }

        return in_array($item, $this->auth_signup_uninvited, $strict);
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity($item, bool $strict = true): bool
    {
        return in_array($item, $this->account_tax_periodicity, $strict);
    }

    /**
     * @param null|bool $group_warning_sale
     */
    public function setGroupWarningSale(?bool $group_warning_sale): void
    {
        $this->group_warning_sale = $group_warning_sale;
    }

    /**
     * @param mixed $item
     */
    public function addAccountTaxPeriodicity($item): void
    {
        if ($this->hasAccountTaxPeriodicity($item)) {
            return;
        }

        $this->account_tax_periodicity[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeAccountTaxPeriodicity($item): void
    {
        if ($this->hasAccountTaxPeriodicity($item)) {
            $index = array_search($item, $this->account_tax_periodicity);
            unset($this->account_tax_periodicity[$index]);
        }
    }

    /**
     * @param int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @param null|Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(?Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param null|bool $group_auto_done_setting
     */
    public function setGroupAutoDoneSetting(?bool $group_auto_done_setting): void
    {
        $this->group_auto_done_setting = $group_auto_done_setting;
    }

    /**
     * @param null|bool $module_sale_margin
     */
    public function setModuleSaleMargin(?bool $module_sale_margin): void
    {
        $this->module_sale_margin = $module_sale_margin;
    }

    /**
     * @param null|int $quotation_validity_days
     */
    public function setQuotationValidityDays(?int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @param null|bool $use_quotation_validity_days
     */
    public function setUseQuotationValidityDays(?bool $use_quotation_validity_days): void
    {
        $this->use_quotation_validity_days = $use_quotation_validity_days;
    }

    /**
     * @param null|bool $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(?bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param null|array $auth_signup_uninvited
     */
    public function setAuthSignupUninvited(?array $auth_signup_uninvited): void
    {
        $this->auth_signup_uninvited = $auth_signup_uninvited;
    }

    /**
     * @param null|bool $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(?bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @param null|bool $group_sale_delivery_address
     */
    public function setGroupSaleDeliveryAddress(?bool $group_sale_delivery_address): void
    {
        $this->group_sale_delivery_address = $group_sale_delivery_address;
    }

    /**
     * @param null|bool $group_proforma_sales
     */
    public function setGroupProformaSales(?bool $group_proforma_sales): void
    {
        $this->group_proforma_sales = $group_proforma_sales;
    }

    /**
     * @param null|array $default_invoice_policy
     */
    public function setDefaultInvoicePolicy(?array $default_invoice_policy): void
    {
        $this->default_invoice_policy = $default_invoice_policy;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDefaultInvoicePolicy($item, bool $strict = true): bool
    {
        if (null === $this->default_invoice_policy) {
            return false;
        }

        return in_array($item, $this->default_invoice_policy, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addDefaultInvoicePolicy($item): void
    {
        if ($this->hasDefaultInvoicePolicy($item)) {
            return;
        }

        if (null === $this->default_invoice_policy) {
            $this->default_invoice_policy = [];
        }

        $this->default_invoice_policy[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeDefaultInvoicePolicy($item): void
    {
        if (null === $this->default_invoice_policy) {
            $this->default_invoice_policy = [];
        }

        if ($this->hasDefaultInvoicePolicy($item)) {
            $index = array_search($item, $this->default_invoice_policy);
            unset($this->default_invoice_policy[$index]);
        }
    }

    /**
     * @param null|Product $deposit_default_product_id
     */
    public function setDepositDefaultProductId(?Product $deposit_default_product_id): void
    {
        $this->deposit_default_product_id = $deposit_default_product_id;
    }

    /**
     * @param null|bool $module_website_sale_digital
     */
    public function setModuleWebsiteSaleDigital(?bool $module_website_sale_digital): void
    {
        $this->module_website_sale_digital = $module_website_sale_digital;
    }

    /**
     * @param null|bool $module_account_bank_statement_import_csv
     */
    public function setModuleAccountBankStatementImportCsv(
        ?bool $module_account_bank_statement_import_csv
    ): void {
        $this->module_account_bank_statement_import_csv = $module_account_bank_statement_import_csv;
    }

    /**
     * @param null|bool $module_account_bank_statement_import_qif
     */
    public function setModuleAccountBankStatementImportQif(
        ?bool $module_account_bank_statement_import_qif
    ): void {
        $this->module_account_bank_statement_import_qif = $module_account_bank_statement_import_qif;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Users $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(?Users $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
    }

    /**
     * @return null|string
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @return null|string
     */
    public function getCompanyInformations(): ?string
    {
        return $this->company_informations;
    }

    /**
     * @return null|int
     */
    public function getFailCounter(): ?int
    {
        return $this->fail_counter;
    }

    /**
     * @param null|string $alias_domain
     */
    public function setAliasDomain(?string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
    }

    /**
     * @param null|string $map_box_token
     */
    public function setMapBoxToken(?string $map_box_token): void
    {
        $this->map_box_token = $map_box_token;
    }

    /**
     * @param null|bool $module_ocn_client
     */
    public function setModuleOcnClient(?bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
    }

    /**
     * @param null|string $unsplash_access_key
     */
    public function setUnsplashAccessKey(?string $unsplash_access_key): void
    {
        $this->unsplash_access_key = $unsplash_access_key;
    }

    /**
     * @param null|bool $auth_signup_reset_password
     */
    public function setAuthSignupResetPassword(?bool $auth_signup_reset_password): void
    {
        $this->auth_signup_reset_password = $auth_signup_reset_password;
    }

    /**
     * @return null|bool
     */
    public function isPartnerAutocompleteInsufficientCredit(): ?bool
    {
        return $this->partner_autocomplete_insufficient_credit;
    }

    /**
     * @return null|int
     */
    public function getActiveUserCount(): ?int
    {
        return $this->active_user_count;
    }

    /**
     * @param null|bool $group_discount_per_so_line
     */
    public function setGroupDiscountPerSoLine(?bool $group_discount_per_so_line): void
    {
        $this->group_discount_per_so_line = $group_discount_per_so_line;
    }

    /**
     * @param null|bool $group_uom
     */
    public function setGroupUom(?bool $group_uom): void
    {
        $this->group_uom = $group_uom;
    }

    /**
     * @param null|bool $group_product_variant
     */
    public function setGroupProductVariant(?bool $group_product_variant): void
    {
        $this->group_product_variant = $group_product_variant;
    }

    /**
     * @param null|bool $module_sale_product_configurator
     */
    public function setModuleSaleProductConfigurator(?bool $module_sale_product_configurator): void
    {
        $this->module_sale_product_configurator = $module_sale_product_configurator;
    }

    /**
     * @param null|bool $module_sale_product_matrix
     */
    public function setModuleSaleProductMatrix(?bool $module_sale_product_matrix): void
    {
        $this->module_sale_product_matrix = $module_sale_product_matrix;
    }

    /**
     * @param null|bool $group_stock_packaging
     */
    public function setGroupStockPackaging(?bool $group_stock_packaging): void
    {
        $this->group_stock_packaging = $group_stock_packaging;
    }

    /**
     * @param null|bool $group_product_pricelist
     */
    public function setGroupProductPricelist(?bool $group_product_pricelist): void
    {
        $this->group_product_pricelist = $group_product_pricelist;
    }

    /**
     * @param null|bool $group_sale_pricelist
     */
    public function setGroupSalePricelist(?bool $group_sale_pricelist): void
    {
        $this->group_sale_pricelist = $group_sale_pricelist;
    }

    /**
     * @param null|array $product_pricelist_setting
     */
    public function setProductPricelistSetting(?array $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
    }

    /**
     * @return null|int
     */
    public function getLanguageCount(): ?int
    {
        return $this->language_count;
    }

    /**
     * @return null|int
     */
    public function getCompanyCount(): ?int
    {
        return $this->company_count;
    }

    /**
     * @param mixed $item
     */
    public function addProductPricelistSetting($item): void
    {
        if ($this->hasProductPricelistSetting($item)) {
            return;
        }

        if (null === $this->product_pricelist_setting) {
            $this->product_pricelist_setting = [];
        }

        $this->product_pricelist_setting[] = $item;
    }

    /**
     * @param null|bool $module_base_gengo
     */
    public function setModuleBaseGengo(?bool $module_base_gengo): void
    {
        $this->module_base_gengo = $module_base_gengo;
    }

    /**
     * @param null|bool $user_default_rights
     */
    public function setUserDefaultRights(?bool $user_default_rights): void
    {
        $this->user_default_rights = $user_default_rights;
    }

    /**
     * @param null|bool $external_email_server_default
     */
    public function setExternalEmailServerDefault(?bool $external_email_server_default): void
    {
        $this->external_email_server_default = $external_email_server_default;
    }

    /**
     * @param null|bool $module_base_import
     */
    public function setModuleBaseImport(?bool $module_base_import): void
    {
        $this->module_base_import = $module_base_import;
    }

    /**
     * @param null|bool $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
    }

    /**
     * @param null|bool $module_google_drive
     */
    public function setModuleGoogleDrive(?bool $module_google_drive): void
    {
        $this->module_google_drive = $module_google_drive;
    }

    /**
     * @param null|bool $module_google_spreadsheet
     */
    public function setModuleGoogleSpreadsheet(?bool $module_google_spreadsheet): void
    {
        $this->module_google_spreadsheet = $module_google_spreadsheet;
    }

    /**
     * @param null|bool $module_auth_oauth
     */
    public function setModuleAuthOauth(?bool $module_auth_oauth): void
    {
        $this->module_auth_oauth = $module_auth_oauth;
    }

    /**
     * @param null|bool $module_auth_ldap
     */
    public function setModuleAuthLdap(?bool $module_auth_ldap): void
    {
        $this->module_auth_ldap = $module_auth_ldap;
    }

    /**
     * @param null|bool $module_inter_company_rules
     */
    public function setModuleInterCompanyRules(?bool $module_inter_company_rules): void
    {
        $this->module_inter_company_rules = $module_inter_company_rules;
    }

    /**
     * @param null|bool $show_effect
     */
    public function setShowEffect(?bool $show_effect): void
    {
        $this->show_effect = $show_effect;
    }

    /**
     * @param null|bool $module_pad
     */
    public function setModulePad(?bool $module_pad): void
    {
        $this->module_pad = $module_pad;
    }

    /**
     * @param null|bool $module_voip
     */
    public function setModuleVoip(?bool $module_voip): void
    {
        $this->module_voip = $module_voip;
    }

    /**
     * @param null|bool $module_web_unsplash
     */
    public function setModuleWebUnsplash(?bool $module_web_unsplash): void
    {
        $this->module_web_unsplash = $module_web_unsplash;
    }

    /**
     * @param null|bool $module_partner_autocomplete
     */
    public function setModulePartnerAutocomplete(?bool $module_partner_autocomplete): void
    {
        $this->module_partner_autocomplete = $module_partner_autocomplete;
    }

    /**
     * @param null|bool $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(?bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
    }

    /**
     * @param null|string $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param null|bool $group_multi_currency
     */
    public function setGroupMultiCurrency(?bool $group_multi_currency): void
    {
        $this->group_multi_currency = $group_multi_currency;
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
    public function hasProductPricelistSetting($item, bool $strict = true): bool
    {
        if (null === $this->product_pricelist_setting) {
            return false;
        }

        return in_array($item, $this->product_pricelist_setting, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeProductPricelistSetting($item): void
    {
        if (null === $this->product_pricelist_setting) {
            $this->product_pricelist_setting = [];
        }

        if ($this->hasProductPricelistSetting($item)) {
            $index = array_search($item, $this->product_pricelist_setting);
            unset($this->product_pricelist_setting[$index]);
        }
    }

    /**
     * @param null|bool $module_account_yodlee
     */
    public function setModuleAccountYodlee(?bool $module_account_yodlee): void
    {
        $this->module_account_yodlee = $module_account_yodlee;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasShowLineSubtotalsTaxSelection($item, bool $strict = true): bool
    {
        return in_array($item, $this->show_line_subtotals_tax_selection, $strict);
    }

    /**
     * @param null|bool $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(?bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
    }

    /**
     * @param null|bool $group_analytic_tags
     */
    public function setGroupAnalyticTags(?bool $group_analytic_tags): void
    {
        $this->group_analytic_tags = $group_analytic_tags;
    }

    /**
     * @param null|bool $group_warning_account
     */
    public function setGroupWarningAccount(?bool $group_warning_account): void
    {
        $this->group_warning_account = $group_warning_account;
    }

    /**
     * @param null|bool $group_cash_rounding
     */
    public function setGroupCashRounding(?bool $group_cash_rounding): void
    {
        $this->group_cash_rounding = $group_cash_rounding;
    }

    /**
     * @param null|bool $group_fiscal_year
     */
    public function setGroupFiscalYear(?bool $group_fiscal_year): void
    {
        $this->group_fiscal_year = $group_fiscal_year;
    }

    /**
     * @param null|bool $group_show_line_subtotals_tax_excluded
     */
    public function setGroupShowLineSubtotalsTaxExcluded(
        ?bool $group_show_line_subtotals_tax_excluded
    ): void {
        $this->group_show_line_subtotals_tax_excluded = $group_show_line_subtotals_tax_excluded;
    }

    /**
     * @param null|bool $group_show_line_subtotals_tax_included
     */
    public function setGroupShowLineSubtotalsTaxIncluded(
        ?bool $group_show_line_subtotals_tax_included
    ): void {
        $this->group_show_line_subtotals_tax_included = $group_show_line_subtotals_tax_included;
    }

    /**
     * @param array $show_line_subtotals_tax_selection
     */
    public function setShowLineSubtotalsTaxSelection(array $show_line_subtotals_tax_selection): void
    {
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
    }

    /**
     * @param mixed $item
     */
    public function addShowLineSubtotalsTaxSelection($item): void
    {
        if ($this->hasShowLineSubtotalsTaxSelection($item)) {
            return;
        }

        $this->show_line_subtotals_tax_selection[] = $item;
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
     * @param mixed $item
     */
    public function removeShowLineSubtotalsTaxSelection($item): void
    {
        if ($this->hasShowLineSubtotalsTaxSelection($item)) {
            $index = array_search($item, $this->show_line_subtotals_tax_selection);
            unset($this->show_line_subtotals_tax_selection[$index]);
        }
    }

    /**
     * @param null|bool $module_account_budget
     */
    public function setModuleAccountBudget(?bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
    }

    /**
     * @param null|bool $module_account_payment
     */
    public function setModuleAccountPayment(?bool $module_account_payment): void
    {
        $this->module_account_payment = $module_account_payment;
    }

    /**
     * @param null|bool $module_account_reports
     */
    public function setModuleAccountReports(?bool $module_account_reports): void
    {
        $this->module_account_reports = $module_account_reports;
    }

    /**
     * @param null|bool $module_account_check_printing
     */
    public function setModuleAccountCheckPrinting(?bool $module_account_check_printing): void
    {
        $this->module_account_check_printing = $module_account_check_printing;
    }

    /**
     * @param null|bool $module_account_batch_payment
     */
    public function setModuleAccountBatchPayment(?bool $module_account_batch_payment): void
    {
        $this->module_account_batch_payment = $module_account_batch_payment;
    }

    /**
     * @param null|bool $module_account_sepa
     */
    public function setModuleAccountSepa(?bool $module_account_sepa): void
    {
        $this->module_account_sepa = $module_account_sepa;
    }

    /**
     * @param null|bool $module_account_sepa_direct_debit
     */
    public function setModuleAccountSepaDirectDebit(?bool $module_account_sepa_direct_debit): void
    {
        $this->module_account_sepa_direct_debit = $module_account_sepa_direct_debit;
    }

    /**
     * @param null|bool $module_account_plaid
     */
    public function setModuleAccountPlaid(?bool $module_account_plaid): void
    {
        $this->module_account_plaid = $module_account_plaid;
    }

    /**
     * @param null|bool $module_account_accountant
     */
    public function setModuleAccountAccountant(?bool $module_account_accountant): void
    {
        $this->module_account_accountant = $module_account_accountant;
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
     * @param null|array $product_weight_in_lbs
     */
    public function setProductWeightInLbs(?array $product_weight_in_lbs): void
    {
        $this->product_weight_in_lbs = $product_weight_in_lbs;
    }

    /**
     * @param null|bool $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductWeightInLbs($item, bool $strict = true): bool
    {
        if (null === $this->product_weight_in_lbs) {
            return false;
        }

        return in_array($item, $this->product_weight_in_lbs, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addProductWeightInLbs($item): void
    {
        if ($this->hasProductWeightInLbs($item)) {
            return;
        }

        if (null === $this->product_weight_in_lbs) {
            $this->product_weight_in_lbs = [];
        }

        $this->product_weight_in_lbs[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeProductWeightInLbs($item): void
    {
        if (null === $this->product_weight_in_lbs) {
            $this->product_weight_in_lbs = [];
        }

        if ($this->hasProductWeightInLbs($item)) {
            $index = array_search($item, $this->product_weight_in_lbs);
            unset($this->product_weight_in_lbs[$index]);
        }
    }

    /**
     * @param null|array $product_volume_volume_in_cubic_feet
     */
    public function setProductVolumeVolumeInCubicFeet(?array $product_volume_volume_in_cubic_feet): void
    {
        $this->product_volume_volume_in_cubic_feet = $product_volume_volume_in_cubic_feet;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductVolumeVolumeInCubicFeet($item, bool $strict = true): bool
    {
        if (null === $this->product_volume_volume_in_cubic_feet) {
            return false;
        }

        return in_array($item, $this->product_volume_volume_in_cubic_feet, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addProductVolumeVolumeInCubicFeet($item): void
    {
        if ($this->hasProductVolumeVolumeInCubicFeet($item)) {
            return;
        }

        if (null === $this->product_volume_volume_in_cubic_feet) {
            $this->product_volume_volume_in_cubic_feet = [];
        }

        $this->product_volume_volume_in_cubic_feet[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeProductVolumeVolumeInCubicFeet($item): void
    {
        if (null === $this->product_volume_volume_in_cubic_feet) {
            $this->product_volume_volume_in_cubic_feet = [];
        }

        if ($this->hasProductVolumeVolumeInCubicFeet($item)) {
            $index = array_search($item, $this->product_volume_volume_in_cubic_feet);
            unset($this->product_volume_volume_in_cubic_feet[$index]);
        }
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
     * @param null|bool $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
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
     * @param null|Digest $digest_id
     */
    public function setDigestId(?Digest $digest_id): void
    {
        $this->digest_id = $digest_id;
    }

    /**
     * @return null|bool
     */
    public function isHasAccountingEntries(): ?bool
    {
        return $this->has_accounting_entries;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|Journal $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?Journal $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @return null|bool
     */
    public function isHasChartOfAccounts(): ?bool
    {
        return $this->has_chart_of_accounts;
    }

    /**
     * @param null|Template $chart_template_id
     */
    public function setChartTemplateId(?Template $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param null|Tax $sale_tax_id
     */
    public function setSaleTaxId(?Tax $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
    }

    /**
     * @param null|Tax $purchase_tax_id
     */
    public function setPurchaseTaxId(?Tax $purchase_tax_id): void
    {
        $this->purchase_tax_id = $purchase_tax_id;
    }

    /**
     * @param null|array $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?array $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
