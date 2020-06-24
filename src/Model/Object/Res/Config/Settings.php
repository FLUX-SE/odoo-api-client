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
 *
 * Inherit the base settings to add a counter of failed email + configure
 * the alias domain.
 */
final class Settings extends Base
{
    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Default Access Rights
     *
     * @var bool
     */
    private $user_default_rights;

    /**
     * External Email Servers
     *
     * @var bool
     */
    private $external_email_server_default;

    /**
     * Allow users to import data from CSV/XLS/XLSX/ODS files
     *
     * @var bool
     */
    private $module_base_import;

    /**
     * Allow the users to synchronize their calendar  with Google Calendar
     *
     * @var bool
     */
    private $module_google_calendar;

    /**
     * Attach Google documents to any record
     *
     * @var bool
     */
    private $module_google_drive;

    /**
     * Google Spreadsheet
     *
     * @var bool
     */
    private $module_google_spreadsheet;

    /**
     * Use external authentication providers (OAuth)
     *
     * @var bool
     */
    private $module_auth_oauth;

    /**
     * LDAP Authentication
     *
     * @var bool
     */
    private $module_auth_ldap;

    /**
     * Translate Your Website with Gengo
     *
     * @var bool
     */
    private $module_base_gengo;

    /**
     * Manage Inter Company
     *
     * @var bool
     */
    private $module_inter_company_rules;

    /**
     * Collaborative Pads
     *
     * @var bool
     */
    private $module_pad;

    /**
     * Asterisk (VoIP)
     *
     * @var bool
     */
    private $module_voip;

    /**
     * Unsplash Image Library
     *
     * @var bool
     */
    private $module_web_unsplash;

    /**
     * Partner Autocomplete
     *
     * @var bool
     */
    private $module_partner_autocomplete;

    /**
     * GeoLocalize
     *
     * @var bool
     */
    private $module_base_geolocalize;

    /**
     * Custom Report Footer
     *
     * @var string
     */
    private $report_footer;

    /**
     * Multi-Currencies
     *
     * @var bool
     */
    private $group_multi_currency;

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
     * Show Effect
     *
     * @var bool
     */
    private $show_effect;

    /**
     * Number of Companies
     *
     * @var int
     */
    private $company_count;

    /**
     * Number of Active Users
     *
     * @var int
     */
    private $active_user_count;

    /**
     * Number of Languages
     *
     * @var int
     */
    private $language_count;

    /**
     * Company Name
     *
     * @var string
     */
    private $company_name;

    /**
     * Company Informations
     *
     * @var string
     */
    private $company_informations;

    /**
     * Fail Mail
     *
     * @var int
     */
    private $fail_counter;

    /**
     * Alias Domain
     *
     * @var string
     */
    private $alias_domain;

    /**
     * Token Map Box
     *
     * @var string
     */
    private $map_box_token;

    /**
     * Push Notifications
     *
     * @var bool
     */
    private $module_ocn_client;

    /**
     * Access Key
     *
     * @var string
     */
    private $unsplash_access_key;

    /**
     * Enable password reset from Login page
     *
     * @var bool
     */
    private $auth_signup_reset_password;

    /**
     * Template user for new users created through signup
     *
     * @var Users
     */
    private $auth_signup_template_user_id;

    /**
     * Insufficient credit
     *
     * @var bool
     */
    private $partner_autocomplete_insufficient_credit;

    /**
     * Discounts
     *
     * @var bool
     */
    private $group_discount_per_so_line;

    /**
     * Units of Measure
     *
     * @var bool
     */
    private $group_uom;

    /**
     * Variants
     *
     * @var bool
     */
    private $group_product_variant;

    /**
     * Product Configurator
     *
     * @var bool
     */
    private $module_sale_product_configurator;

    /**
     * Sales Grid Entry
     *
     * @var bool
     */
    private $module_sale_product_matrix;

    /**
     * Product Packagings
     *
     * @var bool
     */
    private $group_stock_packaging;

    /**
     * Pricelists
     *
     * @var bool
     */
    private $group_product_pricelist;

    /**
     * Advanced Pricelists
     *
     * @var bool
     */
    private $group_sale_pricelist;

    /**
     * Pricelists Method
     *
     * @var array
     */
    private $product_pricelist_setting;

    /**
     * Weight unit of measure
     *
     * @var array
     */
    private $product_weight_in_lbs;

    /**
     * Volume unit of measure
     *
     * @var array
     */
    private $product_volume_volume_in_cubic_feet;

    /**
     * Print In Color
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
     * Print Both sides
     *
     * @var bool
     */
    private $snailmail_duplex;

    /**
     * Digest Emails
     *
     * @var bool
     */
    private $digest_emails;

    /**
     * Digest Email
     *
     * @var Digest
     */
    private $digest_id;

    /**
     * Has Accounting Entries
     *
     * @var bool
     */
    private $has_accounting_entries;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Exchange Gain or Loss Journal
     *
     * @var Journal
     */
    private $currency_exchange_journal_id;

    /**
     * Company has a chart of accounts
     *
     * @var bool
     */
    private $has_chart_of_accounts;

    /**
     * Template
     *
     * @var Template
     */
    private $chart_template_id;

    /**
     * Default Sale Tax
     *
     * @var Tax
     */
    private $sale_tax_id;

    /**
     * Default Purchase Tax
     *
     * @var Tax
     */
    private $purchase_tax_id;

    /**
     * Tax calculation rounding method
     *
     * @var array
     */
    private $tax_calculation_rounding_method;

    /**
     * Accounting
     *
     * @var bool
     */
    private $module_account_accountant;

    /**
     * Analytic Accounting
     *
     * @var bool
     */
    private $group_analytic_accounting;

    /**
     * Analytic Tags
     *
     * @var bool
     */
    private $group_analytic_tags;

    /**
     * Warnings in Invoices
     *
     * @var bool
     */
    private $group_warning_account;

    /**
     * Cash Rounding
     *
     * @var bool
     */
    private $group_cash_rounding;

    /**
     * Fiscal Years
     *
     * @var bool
     */
    private $group_fiscal_year;

    /**
     * Show line subtotals without taxes (B2B)
     *
     * @var bool
     */
    private $group_show_line_subtotals_tax_excluded;

    /**
     * Show line subtotals with taxes (B2C)
     *
     * @var bool
     */
    private $group_show_line_subtotals_tax_included;

    /**
     * Line Subtotals Tax Display
     *
     * @var null|array
     */
    private $show_line_subtotals_tax_selection;

    /**
     * Budget Management
     *
     * @var bool
     */
    private $module_account_budget;

    /**
     * Invoice Online Payment
     *
     * @var bool
     */
    private $module_account_payment;

    /**
     * Dynamic Reports
     *
     * @var bool
     */
    private $module_account_reports;

    /**
     * Allow check printing and deposits
     *
     * @var bool
     */
    private $module_account_check_printing;

    /**
     * Use batch payments
     *
     * @var bool
     */
    private $module_account_batch_payment;

    /**
     * SEPA Credit Transfer (SCT)
     *
     * @var bool
     */
    private $module_account_sepa;

    /**
     * Use SEPA Direct Debit
     *
     * @var bool
     */
    private $module_account_sepa_direct_debit;

    /**
     * Plaid Connector
     *
     * @var bool
     */
    private $module_account_plaid;

    /**
     * Bank Interface - Sync your bank feeds automatically
     *
     * @var bool
     */
    private $module_account_yodlee;

    /**
     * Import .qif files
     *
     * @var bool
     */
    private $module_account_bank_statement_import_qif;

    /**
     * Import in .ofx format
     *
     * @var bool
     */
    private $module_account_bank_statement_import_ofx;

    /**
     * Import in .csv format
     *
     * @var bool
     */
    private $module_account_bank_statement_import_csv;

    /**
     * Import in CAMT.053 format
     *
     * @var bool
     */
    private $module_account_bank_statement_import_camt;

    /**
     * Automatic Currency Rates
     *
     * @var bool
     */
    private $module_currency_rate_live;

    /**
     * Intrastat
     *
     * @var bool
     */
    private $module_account_intrastat;

    /**
     * Allow Product Margin
     *
     * @var bool
     */
    private $module_product_margin;

    /**
     * EU Digital Goods VAT
     *
     * @var bool
     */
    private $module_l10n_eu_service;

    /**
     * Account TaxCloud
     *
     * @var bool
     */
    private $module_account_taxcloud;

    /**
     * Bill Digitalization
     *
     * @var bool
     */
    private $module_account_invoice_extract;

    /**
     * Snailmail
     *
     * @var bool
     */
    private $module_snailmail_account;

    /**
     * Cash Basis
     *
     * @var bool
     */
    private $tax_exigibility;

    /**
     * Tax Cash Basis Journal
     *
     * @var Journal
     */
    private $tax_cash_basis_journal_id;

    /**
     * Bank Reconciliation Threshold
     *
     * @var DateTimeInterface
     */
    private $account_bank_reconciliation_start;

    /**
     * Display SEPA QR code
     *
     * @var bool
     */
    private $qr_code;

    /**
     * Print
     *
     * @var bool
     */
    private $invoice_is_print;

    /**
     * Send Email
     *
     * @var bool
     */
    private $invoice_is_email;

    /**
     * Default incoterm
     *
     * @var Incoterms
     */
    private $incoterm_id;

    /**
     * Terms & Conditions
     *
     * @var string
     */
    private $invoice_terms;

    /**
     * Default Terms & Conditions
     *
     * @var bool
     */
    private $use_invoice_terms;

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
     * Lock Date for All Users
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
     * Anglo-Saxon Accounting
     *
     * @var bool
     */
    private $use_anglo_saxon;

    /**
     * Account Predictive Bills
     *
     * @var bool
     */
    private $module_account_predictive_bills;

    /**
     * Transfer Account
     *
     * @var Account
     */
    private $transfer_account_id;

    /**
     * Processing Option
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
     * @var array
     */
    private $currency_interval_unit;

    /**
     * Service Provider
     *
     * @var array
     */
    private $currency_provider;

    /**
     * Next Execution Date
     *
     * @var DateTimeInterface
     */
    private $currency_next_execution_date;

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
     * Periodicity
     *
     * @var null|array
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     *
     * @var null|int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     *
     * @var Journal
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Lock Confirmed Sales
     *
     * @var bool
     */
    private $group_auto_done_setting;

    /**
     * Margins
     *
     * @var bool
     */
    private $module_sale_margin;

    /**
     * Default Quotation Validity (Days)
     *
     * @var int
     */
    private $quotation_validity_days;

    /**
     * Default Quotation Validity
     *
     * @var bool
     */
    private $use_quotation_validity_days;

    /**
     * Sale Order Warnings
     *
     * @var bool
     */
    private $group_warning_sale;

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
     * Customer Addresses
     *
     * @var bool
     */
    private $group_sale_delivery_address;

    /**
     * Pro-Forma Invoice
     *
     * @var bool
     */
    private $group_proforma_sales;

    /**
     * Invoicing Policy
     *
     * @var array
     */
    private $default_invoice_policy;

    /**
     * Deposit Product
     *
     * @var Product
     */
    private $deposit_default_product_id;

    /**
     * Digital Content
     *
     * @var bool
     */
    private $module_website_sale_digital;

    /**
     * Customer Account
     *
     * @var array
     */
    private $auth_signup_uninvited;

    /**
     * Shipping Costs
     *
     * @var bool
     */
    private $module_delivery;

    /**
     * DHL Connector
     *
     * @var bool
     */
    private $module_delivery_dhl;

    /**
     * FedEx Connector
     *
     * @var bool
     */
    private $module_delivery_fedex;

    /**
     * UPS Connector
     *
     * @var bool
     */
    private $module_delivery_ups;

    /**
     * USPS Connector
     *
     * @var bool
     */
    private $module_delivery_usps;

    /**
     * bpost Connector
     *
     * @var bool
     */
    private $module_delivery_bpost;

    /**
     * Easypost Connector
     *
     * @var bool
     */
    private $module_delivery_easypost;

    /**
     * Specific Email
     *
     * @var bool
     */
    private $module_product_email_template;

    /**
     * Coupons & Promotions
     *
     * @var bool
     */
    private $module_sale_coupon;

    /**
     * Amazon Sync
     *
     * @var bool
     */
    private $module_sale_amazon;

    /**
     * Automatic Invoice
     *
     * @var bool
     */
    private $automatic_invoice;

    /**
     * Email Template
     *
     * @var TemplateAlias
     */
    private $template_id;

    /**
     * Confirmation Email
     *
     * @var TemplateAlias
     */
    private $confirmation_template_id;

    /**
     * Quotation Templates
     *
     * @var bool
     */
    private $group_sale_order_template;

    /**
     * Default Template
     *
     * @var Template2
     */
    private $default_sale_order_template_id;

    /**
     * Quotation Builder
     *
     * @var bool
     */
    private $module_sale_quotation_builder;

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
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param array $extract_show_ocr_option_selection
     */
    public function removeExtractShowOcrOptionSelection(array $extract_show_ocr_option_selection): void
    {
        if ($this->hasExtractShowOcrOptionSelection($extract_show_ocr_option_selection)) {
            $index = array_search($extract_show_ocr_option_selection, $this->extract_show_ocr_option_selection);
            unset($this->extract_show_ocr_option_selection[$index]);
        }
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
     * @param bool $use_anglo_saxon
     */
    public function setUseAngloSaxon(bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @param bool $module_account_predictive_bills
     */
    public function setModuleAccountPredictiveBills(bool $module_account_predictive_bills): void
    {
        $this->module_account_predictive_bills = $module_account_predictive_bills;
    }

    /**
     * @param Account $transfer_account_id
     */
    public function setTransferAccountId(Account $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @param array $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(array $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @param array $extract_show_ocr_option_selection
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractShowOcrOptionSelection(
        array $extract_show_ocr_option_selection,
        bool $strict = true
    ): bool
    {
        return in_array($extract_show_ocr_option_selection, $this->extract_show_ocr_option_selection, $strict);
    }

    /**
     * @param array $extract_show_ocr_option_selection
     */
    public function addExtractShowOcrOptionSelection(array $extract_show_ocr_option_selection): void
    {
        if ($this->hasExtractShowOcrOptionSelection($extract_show_ocr_option_selection)) {
            return;
        }

        $this->extract_show_ocr_option_selection[] = $extract_show_ocr_option_selection;
    }

    /**
     * @param bool $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
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
     * @param array $currency_interval_unit
     */
    public function setCurrencyIntervalUnit(array $currency_interval_unit): void
    {
        $this->currency_interval_unit = $currency_interval_unit;
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
     * @param DateTimeInterface $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @param DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
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
     * @param bool $totals_below_sections
     */
    public function setTotalsBelowSections(bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
    }

    /**
     * @param bool $tax_exigibility
     */
    public function setTaxExigibility(bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param bool $module_account_bank_statement_import_camt
     */
    public function setModuleAccountBankStatementImportCamt(
        bool $module_account_bank_statement_import_camt
    ): void
    {
        $this->module_account_bank_statement_import_camt = $module_account_bank_statement_import_camt;
    }

    /**
     * @param bool $module_currency_rate_live
     */
    public function setModuleCurrencyRateLive(bool $module_currency_rate_live): void
    {
        $this->module_currency_rate_live = $module_currency_rate_live;
    }

    /**
     * @param bool $module_account_intrastat
     */
    public function setModuleAccountIntrastat(bool $module_account_intrastat): void
    {
        $this->module_account_intrastat = $module_account_intrastat;
    }

    /**
     * @param bool $module_product_margin
     */
    public function setModuleProductMargin(bool $module_product_margin): void
    {
        $this->module_product_margin = $module_product_margin;
    }

    /**
     * @param bool $module_l10n_eu_service
     */
    public function setModuleL10nEuService(bool $module_l10n_eu_service): void
    {
        $this->module_l10n_eu_service = $module_l10n_eu_service;
    }

    /**
     * @param bool $module_account_taxcloud
     */
    public function setModuleAccountTaxcloud(bool $module_account_taxcloud): void
    {
        $this->module_account_taxcloud = $module_account_taxcloud;
    }

    /**
     * @param bool $module_account_invoice_extract
     */
    public function setModuleAccountInvoiceExtract(bool $module_account_invoice_extract): void
    {
        $this->module_account_invoice_extract = $module_account_invoice_extract;
    }

    /**
     * @param bool $module_snailmail_account
     */
    public function setModuleSnailmailAccount(bool $module_snailmail_account): void
    {
        $this->module_snailmail_account = $module_snailmail_account;
    }

    /**
     * @param Journal $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(Journal $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
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
     * @param DateTimeInterface $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        DateTimeInterface $account_bank_reconciliation_start
    ): void
    {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
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
     * @param bool $invoice_is_email
     */
    public function setInvoiceIsEmail(bool $invoice_is_email): void
    {
        $this->invoice_is_email = $invoice_is_email;
    }

    /**
     * @param Incoterms $incoterm_id
     */
    public function setIncotermId(Incoterms $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @param string $invoice_terms
     */
    public function setInvoiceTerms(string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
    }

    /**
     * @param bool $use_invoice_terms
     */
    public function setUseInvoiceTerms(bool $use_invoice_terms): void
    {
        $this->use_invoice_terms = $use_invoice_terms;
    }

    /**
     * @param null|int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(?int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @param null|array $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(?array $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param bool $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(bool $invoice_is_snailmail): void
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
     * @param bool $module_account_bank_statement_import_ofx
     */
    public function setModuleAccountBankStatementImportOfx(
        bool $module_account_bank_statement_import_ofx
    ): void
    {
        $this->module_account_bank_statement_import_ofx = $module_account_bank_statement_import_ofx;
    }

    /**
     * @param bool $module_sale_coupon
     */
    public function setModuleSaleCoupon(bool $module_sale_coupon): void
    {
        $this->module_sale_coupon = $module_sale_coupon;
    }

    /**
     * @param bool $module_delivery
     */
    public function setModuleDelivery(bool $module_delivery): void
    {
        $this->module_delivery = $module_delivery;
    }

    /**
     * @param bool $module_delivery_dhl
     */
    public function setModuleDeliveryDhl(bool $module_delivery_dhl): void
    {
        $this->module_delivery_dhl = $module_delivery_dhl;
    }

    /**
     * @param bool $module_delivery_fedex
     */
    public function setModuleDeliveryFedex(bool $module_delivery_fedex): void
    {
        $this->module_delivery_fedex = $module_delivery_fedex;
    }

    /**
     * @param bool $module_delivery_ups
     */
    public function setModuleDeliveryUps(bool $module_delivery_ups): void
    {
        $this->module_delivery_ups = $module_delivery_ups;
    }

    /**
     * @param bool $module_delivery_usps
     */
    public function setModuleDeliveryUsps(bool $module_delivery_usps): void
    {
        $this->module_delivery_usps = $module_delivery_usps;
    }

    /**
     * @param bool $module_delivery_bpost
     */
    public function setModuleDeliveryBpost(bool $module_delivery_bpost): void
    {
        $this->module_delivery_bpost = $module_delivery_bpost;
    }

    /**
     * @param bool $module_delivery_easypost
     */
    public function setModuleDeliveryEasypost(bool $module_delivery_easypost): void
    {
        $this->module_delivery_easypost = $module_delivery_easypost;
    }

    /**
     * @param bool $module_product_email_template
     */
    public function setModuleProductEmailTemplate(bool $module_product_email_template): void
    {
        $this->module_product_email_template = $module_product_email_template;
    }

    /**
     * @param bool $module_sale_amazon
     */
    public function setModuleSaleAmazon(bool $module_sale_amazon): void
    {
        $this->module_sale_amazon = $module_sale_amazon;
    }

    /**
     * @param array $auth_signup_uninvited
     */
    public function addAuthSignupUninvited(array $auth_signup_uninvited): void
    {
        if ($this->hasAuthSignupUninvited($auth_signup_uninvited)) {
            return;
        }

        $this->auth_signup_uninvited[] = $auth_signup_uninvited;
    }

    /**
     * @param bool $automatic_invoice
     */
    public function setAutomaticInvoice(bool $automatic_invoice): void
    {
        $this->automatic_invoice = $automatic_invoice;
    }

    /**
     * @param TemplateAlias $template_id
     */
    public function setTemplateId(TemplateAlias $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param TemplateAlias $confirmation_template_id
     */
    public function setConfirmationTemplateId(TemplateAlias $confirmation_template_id): void
    {
        $this->confirmation_template_id = $confirmation_template_id;
    }

    /**
     * @param bool $group_sale_order_template
     */
    public function setGroupSaleOrderTemplate(bool $group_sale_order_template): void
    {
        $this->group_sale_order_template = $group_sale_order_template;
    }

    /**
     * @param Template2 $default_sale_order_template_id
     */
    public function setDefaultSaleOrderTemplateId(Template2 $default_sale_order_template_id): void
    {
        $this->default_sale_order_template_id = $default_sale_order_template_id;
    }

    /**
     * @param bool $module_sale_quotation_builder
     */
    public function setModuleSaleQuotationBuilder(bool $module_sale_quotation_builder): void
    {
        $this->module_sale_quotation_builder = $module_sale_quotation_builder;
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
     * @param array $auth_signup_uninvited
     */
    public function removeAuthSignupUninvited(array $auth_signup_uninvited): void
    {
        if ($this->hasAuthSignupUninvited($auth_signup_uninvited)) {
            $index = array_search($auth_signup_uninvited, $this->auth_signup_uninvited);
            unset($this->auth_signup_uninvited[$index]);
        }
    }

    /**
     * @param array $auth_signup_uninvited
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAuthSignupUninvited(array $auth_signup_uninvited, bool $strict = true): bool
    {
        return in_array($auth_signup_uninvited, $this->auth_signup_uninvited, $strict);
    }

    /**
     * @param ?array $account_tax_periodicity
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountTaxPeriodicity(?array $account_tax_periodicity, bool $strict = true): bool
    {
        if (null === $this->account_tax_periodicity) {
            return false;
        }

        return in_array($account_tax_periodicity, $this->account_tax_periodicity, $strict);
    }

    /**
     * @param bool $group_warning_sale
     */
    public function setGroupWarningSale(bool $group_warning_sale): void
    {
        $this->group_warning_sale = $group_warning_sale;
    }

    /**
     * @param ?array $account_tax_periodicity
     */
    public function addAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            return;
        }

        if (null === $this->account_tax_periodicity) {
            $this->account_tax_periodicity = [];
        }

        $this->account_tax_periodicity[] = $account_tax_periodicity;
    }

    /**
     * @param ?array $account_tax_periodicity
     */
    public function removeAccountTaxPeriodicity(?array $account_tax_periodicity): void
    {
        if ($this->hasAccountTaxPeriodicity($account_tax_periodicity)) {
            $index = array_search($account_tax_periodicity, $this->account_tax_periodicity);
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
     * @param Journal $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(Journal $account_tax_periodicity_journal_id): void
    {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param bool $group_auto_done_setting
     */
    public function setGroupAutoDoneSetting(bool $group_auto_done_setting): void
    {
        $this->group_auto_done_setting = $group_auto_done_setting;
    }

    /**
     * @param bool $module_sale_margin
     */
    public function setModuleSaleMargin(bool $module_sale_margin): void
    {
        $this->module_sale_margin = $module_sale_margin;
    }

    /**
     * @param int $quotation_validity_days
     */
    public function setQuotationValidityDays(int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @param bool $use_quotation_validity_days
     */
    public function setUseQuotationValidityDays(bool $use_quotation_validity_days): void
    {
        $this->use_quotation_validity_days = $use_quotation_validity_days;
    }

    /**
     * @param bool $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param array $auth_signup_uninvited
     */
    public function setAuthSignupUninvited(array $auth_signup_uninvited): void
    {
        $this->auth_signup_uninvited = $auth_signup_uninvited;
    }

    /**
     * @param bool $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @param bool $group_sale_delivery_address
     */
    public function setGroupSaleDeliveryAddress(bool $group_sale_delivery_address): void
    {
        $this->group_sale_delivery_address = $group_sale_delivery_address;
    }

    /**
     * @param bool $group_proforma_sales
     */
    public function setGroupProformaSales(bool $group_proforma_sales): void
    {
        $this->group_proforma_sales = $group_proforma_sales;
    }

    /**
     * @param array $default_invoice_policy
     */
    public function setDefaultInvoicePolicy(array $default_invoice_policy): void
    {
        $this->default_invoice_policy = $default_invoice_policy;
    }

    /**
     * @param array $default_invoice_policy
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDefaultInvoicePolicy(array $default_invoice_policy, bool $strict = true): bool
    {
        return in_array($default_invoice_policy, $this->default_invoice_policy, $strict);
    }

    /**
     * @param array $default_invoice_policy
     */
    public function addDefaultInvoicePolicy(array $default_invoice_policy): void
    {
        if ($this->hasDefaultInvoicePolicy($default_invoice_policy)) {
            return;
        }

        $this->default_invoice_policy[] = $default_invoice_policy;
    }

    /**
     * @param array $default_invoice_policy
     */
    public function removeDefaultInvoicePolicy(array $default_invoice_policy): void
    {
        if ($this->hasDefaultInvoicePolicy($default_invoice_policy)) {
            $index = array_search($default_invoice_policy, $this->default_invoice_policy);
            unset($this->default_invoice_policy[$index]);
        }
    }

    /**
     * @param Product $deposit_default_product_id
     */
    public function setDepositDefaultProductId(Product $deposit_default_product_id): void
    {
        $this->deposit_default_product_id = $deposit_default_product_id;
    }

    /**
     * @param bool $module_website_sale_digital
     */
    public function setModuleWebsiteSaleDigital(bool $module_website_sale_digital): void
    {
        $this->module_website_sale_digital = $module_website_sale_digital;
    }

    /**
     * @param bool $module_account_bank_statement_import_csv
     */
    public function setModuleAccountBankStatementImportCsv(
        bool $module_account_bank_statement_import_csv
    ): void
    {
        $this->module_account_bank_statement_import_csv = $module_account_bank_statement_import_csv;
    }

    /**
     * @param bool $module_account_bank_statement_import_qif
     */
    public function setModuleAccountBankStatementImportQif(
        bool $module_account_bank_statement_import_qif
    ): void
    {
        $this->module_account_bank_statement_import_qif = $module_account_bank_statement_import_qif;
    }

    /**
     * @param bool $user_default_rights
     */
    public function setUserDefaultRights(bool $user_default_rights): void
    {
        $this->user_default_rights = $user_default_rights;
    }

    /**
     * @return bool
     */
    public function isPartnerAutocompleteInsufficientCredit(): bool
    {
        return $this->partner_autocomplete_insufficient_credit;
    }

    /**
     * @return string
     */
    public function getCompanyInformations(): string
    {
        return $this->company_informations;
    }

    /**
     * @return int
     */
    public function getFailCounter(): int
    {
        return $this->fail_counter;
    }

    /**
     * @param string $alias_domain
     */
    public function setAliasDomain(string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
    }

    /**
     * @param string $map_box_token
     */
    public function setMapBoxToken(string $map_box_token): void
    {
        $this->map_box_token = $map_box_token;
    }

    /**
     * @param bool $module_ocn_client
     */
    public function setModuleOcnClient(bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
    }

    /**
     * @param string $unsplash_access_key
     */
    public function setUnsplashAccessKey(string $unsplash_access_key): void
    {
        $this->unsplash_access_key = $unsplash_access_key;
    }

    /**
     * @param bool $auth_signup_reset_password
     */
    public function setAuthSignupResetPassword(bool $auth_signup_reset_password): void
    {
        $this->auth_signup_reset_password = $auth_signup_reset_password;
    }

    /**
     * @param Users $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(Users $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
    }

    /**
     * @param bool $group_discount_per_so_line
     */
    public function setGroupDiscountPerSoLine(bool $group_discount_per_so_line): void
    {
        $this->group_discount_per_so_line = $group_discount_per_so_line;
    }

    /**
     * @return int
     */
    public function getLanguageCount(): int
    {
        return $this->language_count;
    }

    /**
     * @param bool $group_uom
     */
    public function setGroupUom(bool $group_uom): void
    {
        $this->group_uom = $group_uom;
    }

    /**
     * @param bool $group_product_variant
     */
    public function setGroupProductVariant(bool $group_product_variant): void
    {
        $this->group_product_variant = $group_product_variant;
    }

    /**
     * @param bool $module_sale_product_configurator
     */
    public function setModuleSaleProductConfigurator(bool $module_sale_product_configurator): void
    {
        $this->module_sale_product_configurator = $module_sale_product_configurator;
    }

    /**
     * @param bool $module_sale_product_matrix
     */
    public function setModuleSaleProductMatrix(bool $module_sale_product_matrix): void
    {
        $this->module_sale_product_matrix = $module_sale_product_matrix;
    }

    /**
     * @param bool $group_stock_packaging
     */
    public function setGroupStockPackaging(bool $group_stock_packaging): void
    {
        $this->group_stock_packaging = $group_stock_packaging;
    }

    /**
     * @param bool $group_product_pricelist
     */
    public function setGroupProductPricelist(bool $group_product_pricelist): void
    {
        $this->group_product_pricelist = $group_product_pricelist;
    }

    /**
     * @param bool $group_sale_pricelist
     */
    public function setGroupSalePricelist(bool $group_sale_pricelist): void
    {
        $this->group_sale_pricelist = $group_sale_pricelist;
    }

    /**
     * @param array $product_pricelist_setting
     */
    public function setProductPricelistSetting(array $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
    }

    /**
     * @param array $product_pricelist_setting
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductPricelistSetting(array $product_pricelist_setting, bool $strict = true): bool
    {
        return in_array($product_pricelist_setting, $this->product_pricelist_setting, $strict);
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    /**
     * @return int
     */
    public function getActiveUserCount(): int
    {
        return $this->active_user_count;
    }

    /**
     * @param array $product_pricelist_setting
     */
    public function removeProductPricelistSetting(array $product_pricelist_setting): void
    {
        if ($this->hasProductPricelistSetting($product_pricelist_setting)) {
            $index = array_search($product_pricelist_setting, $this->product_pricelist_setting);
            unset($this->product_pricelist_setting[$index]);
        }
    }

    /**
     * @param bool $module_inter_company_rules
     */
    public function setModuleInterCompanyRules(bool $module_inter_company_rules): void
    {
        $this->module_inter_company_rules = $module_inter_company_rules;
    }

    /**
     * @param bool $external_email_server_default
     */
    public function setExternalEmailServerDefault(bool $external_email_server_default): void
    {
        $this->external_email_server_default = $external_email_server_default;
    }

    /**
     * @param bool $module_base_import
     */
    public function setModuleBaseImport(bool $module_base_import): void
    {
        $this->module_base_import = $module_base_import;
    }

    /**
     * @param bool $module_google_calendar
     */
    public function setModuleGoogleCalendar(bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
    }

    /**
     * @param bool $module_google_drive
     */
    public function setModuleGoogleDrive(bool $module_google_drive): void
    {
        $this->module_google_drive = $module_google_drive;
    }

    /**
     * @param bool $module_google_spreadsheet
     */
    public function setModuleGoogleSpreadsheet(bool $module_google_spreadsheet): void
    {
        $this->module_google_spreadsheet = $module_google_spreadsheet;
    }

    /**
     * @param bool $module_auth_oauth
     */
    public function setModuleAuthOauth(bool $module_auth_oauth): void
    {
        $this->module_auth_oauth = $module_auth_oauth;
    }

    /**
     * @param bool $module_auth_ldap
     */
    public function setModuleAuthLdap(bool $module_auth_ldap): void
    {
        $this->module_auth_ldap = $module_auth_ldap;
    }

    /**
     * @param bool $module_base_gengo
     */
    public function setModuleBaseGengo(bool $module_base_gengo): void
    {
        $this->module_base_gengo = $module_base_gengo;
    }

    /**
     * @param bool $module_pad
     */
    public function setModulePad(bool $module_pad): void
    {
        $this->module_pad = $module_pad;
    }

    /**
     * @return int
     */
    public function getCompanyCount(): int
    {
        return $this->company_count;
    }

    /**
     * @param bool $module_voip
     */
    public function setModuleVoip(bool $module_voip): void
    {
        $this->module_voip = $module_voip;
    }

    /**
     * @param bool $module_web_unsplash
     */
    public function setModuleWebUnsplash(bool $module_web_unsplash): void
    {
        $this->module_web_unsplash = $module_web_unsplash;
    }

    /**
     * @param bool $module_partner_autocomplete
     */
    public function setModulePartnerAutocomplete(bool $module_partner_autocomplete): void
    {
        $this->module_partner_autocomplete = $module_partner_autocomplete;
    }

    /**
     * @param bool $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
    }

    /**
     * @param string $report_footer
     */
    public function setReportFooter(string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param bool $group_multi_currency
     */
    public function setGroupMultiCurrency(bool $group_multi_currency): void
    {
        $this->group_multi_currency = $group_multi_currency;
    }

    /**
     * @param Paperformat $paperformat_id
     */
    public function setPaperformatId(Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param View $external_report_layout_id
     */
    public function setExternalReportLayoutId(View $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param bool $show_effect
     */
    public function setShowEffect(bool $show_effect): void
    {
        $this->show_effect = $show_effect;
    }

    /**
     * @param array $product_pricelist_setting
     */
    public function addProductPricelistSetting(array $product_pricelist_setting): void
    {
        if ($this->hasProductPricelistSetting($product_pricelist_setting)) {
            return;
        }

        $this->product_pricelist_setting[] = $product_pricelist_setting;
    }

    /**
     * @param array $product_weight_in_lbs
     */
    public function setProductWeightInLbs(array $product_weight_in_lbs): void
    {
        $this->product_weight_in_lbs = $product_weight_in_lbs;
    }

    /**
     * @param bool $module_account_yodlee
     */
    public function setModuleAccountYodlee(bool $module_account_yodlee): void
    {
        $this->module_account_yodlee = $module_account_yodlee;
    }

    /**
     * @param ?array $show_line_subtotals_tax_selection
     * @param bool $strict
     *
     * @return bool
     */
    public function hasShowLineSubtotalsTaxSelection(
        ?array $show_line_subtotals_tax_selection,
        bool $strict = true
    ): bool
    {
        if (null === $this->show_line_subtotals_tax_selection) {
            return false;
        }

        return in_array($show_line_subtotals_tax_selection, $this->show_line_subtotals_tax_selection, $strict);
    }

    /**
     * @param bool $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
    }

    /**
     * @param bool $group_analytic_tags
     */
    public function setGroupAnalyticTags(bool $group_analytic_tags): void
    {
        $this->group_analytic_tags = $group_analytic_tags;
    }

    /**
     * @param bool $group_warning_account
     */
    public function setGroupWarningAccount(bool $group_warning_account): void
    {
        $this->group_warning_account = $group_warning_account;
    }

    /**
     * @param bool $group_cash_rounding
     */
    public function setGroupCashRounding(bool $group_cash_rounding): void
    {
        $this->group_cash_rounding = $group_cash_rounding;
    }

    /**
     * @param bool $group_fiscal_year
     */
    public function setGroupFiscalYear(bool $group_fiscal_year): void
    {
        $this->group_fiscal_year = $group_fiscal_year;
    }

    /**
     * @param bool $group_show_line_subtotals_tax_excluded
     */
    public function setGroupShowLineSubtotalsTaxExcluded(bool $group_show_line_subtotals_tax_excluded): void
    {
        $this->group_show_line_subtotals_tax_excluded = $group_show_line_subtotals_tax_excluded;
    }

    /**
     * @param bool $group_show_line_subtotals_tax_included
     */
    public function setGroupShowLineSubtotalsTaxIncluded(bool $group_show_line_subtotals_tax_included): void
    {
        $this->group_show_line_subtotals_tax_included = $group_show_line_subtotals_tax_included;
    }

    /**
     * @param null|array $show_line_subtotals_tax_selection
     */
    public function setShowLineSubtotalsTaxSelection(?array $show_line_subtotals_tax_selection): void
    {
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
    }

    /**
     * @param ?array $show_line_subtotals_tax_selection
     */
    public function addShowLineSubtotalsTaxSelection(?array $show_line_subtotals_tax_selection): void
    {
        if ($this->hasShowLineSubtotalsTaxSelection($show_line_subtotals_tax_selection)) {
            return;
        }

        if (null === $this->show_line_subtotals_tax_selection) {
            $this->show_line_subtotals_tax_selection = [];
        }

        $this->show_line_subtotals_tax_selection[] = $show_line_subtotals_tax_selection;
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
     * @param ?array $show_line_subtotals_tax_selection
     */
    public function removeShowLineSubtotalsTaxSelection(?array $show_line_subtotals_tax_selection): void
    {
        if ($this->hasShowLineSubtotalsTaxSelection($show_line_subtotals_tax_selection)) {
            $index = array_search($show_line_subtotals_tax_selection, $this->show_line_subtotals_tax_selection);
            unset($this->show_line_subtotals_tax_selection[$index]);
        }
    }

    /**
     * @param bool $module_account_budget
     */
    public function setModuleAccountBudget(bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
    }

    /**
     * @param bool $module_account_payment
     */
    public function setModuleAccountPayment(bool $module_account_payment): void
    {
        $this->module_account_payment = $module_account_payment;
    }

    /**
     * @param bool $module_account_reports
     */
    public function setModuleAccountReports(bool $module_account_reports): void
    {
        $this->module_account_reports = $module_account_reports;
    }

    /**
     * @param bool $module_account_check_printing
     */
    public function setModuleAccountCheckPrinting(bool $module_account_check_printing): void
    {
        $this->module_account_check_printing = $module_account_check_printing;
    }

    /**
     * @param bool $module_account_batch_payment
     */
    public function setModuleAccountBatchPayment(bool $module_account_batch_payment): void
    {
        $this->module_account_batch_payment = $module_account_batch_payment;
    }

    /**
     * @param bool $module_account_sepa
     */
    public function setModuleAccountSepa(bool $module_account_sepa): void
    {
        $this->module_account_sepa = $module_account_sepa;
    }

    /**
     * @param bool $module_account_sepa_direct_debit
     */
    public function setModuleAccountSepaDirectDebit(bool $module_account_sepa_direct_debit): void
    {
        $this->module_account_sepa_direct_debit = $module_account_sepa_direct_debit;
    }

    /**
     * @param bool $module_account_plaid
     */
    public function setModuleAccountPlaid(bool $module_account_plaid): void
    {
        $this->module_account_plaid = $module_account_plaid;
    }

    /**
     * @param bool $module_account_accountant
     */
    public function setModuleAccountAccountant(bool $module_account_accountant): void
    {
        $this->module_account_accountant = $module_account_accountant;
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
     * @param array $product_weight_in_lbs
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductWeightInLbs(array $product_weight_in_lbs, bool $strict = true): bool
    {
        return in_array($product_weight_in_lbs, $this->product_weight_in_lbs, $strict);
    }

    /**
     * @param bool $snailmail_duplex
     */
    public function setSnailmailDuplex(bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @param array $product_weight_in_lbs
     */
    public function addProductWeightInLbs(array $product_weight_in_lbs): void
    {
        if ($this->hasProductWeightInLbs($product_weight_in_lbs)) {
            return;
        }

        $this->product_weight_in_lbs[] = $product_weight_in_lbs;
    }

    /**
     * @param array $product_weight_in_lbs
     */
    public function removeProductWeightInLbs(array $product_weight_in_lbs): void
    {
        if ($this->hasProductWeightInLbs($product_weight_in_lbs)) {
            $index = array_search($product_weight_in_lbs, $this->product_weight_in_lbs);
            unset($this->product_weight_in_lbs[$index]);
        }
    }

    /**
     * @param array $product_volume_volume_in_cubic_feet
     */
    public function setProductVolumeVolumeInCubicFeet(array $product_volume_volume_in_cubic_feet): void
    {
        $this->product_volume_volume_in_cubic_feet = $product_volume_volume_in_cubic_feet;
    }

    /**
     * @param array $product_volume_volume_in_cubic_feet
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductVolumeVolumeInCubicFeet(
        array $product_volume_volume_in_cubic_feet,
        bool $strict = true
    ): bool
    {
        return in_array($product_volume_volume_in_cubic_feet, $this->product_volume_volume_in_cubic_feet, $strict);
    }

    /**
     * @param array $product_volume_volume_in_cubic_feet
     */
    public function addProductVolumeVolumeInCubicFeet(array $product_volume_volume_in_cubic_feet): void
    {
        if ($this->hasProductVolumeVolumeInCubicFeet($product_volume_volume_in_cubic_feet)) {
            return;
        }

        $this->product_volume_volume_in_cubic_feet[] = $product_volume_volume_in_cubic_feet;
    }

    /**
     * @param array $product_volume_volume_in_cubic_feet
     */
    public function removeProductVolumeVolumeInCubicFeet(array $product_volume_volume_in_cubic_feet): void
    {
        if ($this->hasProductVolumeVolumeInCubicFeet($product_volume_volume_in_cubic_feet)) {
            $index = array_search($product_volume_volume_in_cubic_feet, $this->product_volume_volume_in_cubic_feet);
            unset($this->product_volume_volume_in_cubic_feet[$index]);
        }
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
     * @param bool $digest_emails
     */
    public function setDigestEmails(bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
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
     * @param Digest $digest_id
     */
    public function setDigestId(Digest $digest_id): void
    {
        $this->digest_id = $digest_id;
    }

    /**
     * @return bool
     */
    public function isHasAccountingEntries(): bool
    {
        return $this->has_accounting_entries;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param Journal $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(Journal $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @return bool
     */
    public function isHasChartOfAccounts(): bool
    {
        return $this->has_chart_of_accounts;
    }

    /**
     * @param Template $chart_template_id
     */
    public function setChartTemplateId(Template $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param Tax $sale_tax_id
     */
    public function setSaleTaxId(Tax $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
    }

    /**
     * @param Tax $purchase_tax_id
     */
    public function setPurchaseTaxId(Tax $purchase_tax_id): void
    {
        $this->purchase_tax_id = $purchase_tax_id;
    }

    /**
     * @param array $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(array $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
