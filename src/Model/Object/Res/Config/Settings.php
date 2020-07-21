<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Config;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : res.config.settings
 * Name : res.config.settings
 * Info :
 * Inherit the base settings to add a counter of failed email + configure
 *         the alias domain.
 */
final class Settings extends Base
{
    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Default Access Rights
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $user_default_rights;

    /**
     * External Email Servers
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $external_email_server_default;

    /**
     * Allow users to import data from CSV/XLS/XLSX/ODS files
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_import;

    /**
     * Allow the users to synchronize their calendar  with Google Calendar
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_calendar;

    /**
     * Attach Google documents to any record
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_drive;

    /**
     * Google Spreadsheet
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_spreadsheet;

    /**
     * Use external authentication providers (OAuth)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_auth_oauth;

    /**
     * LDAP Authentication
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_auth_ldap;

    /**
     * Translate Your Website with Gengo
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_gengo;

    /**
     * Manage Inter Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_inter_company_rules;

    /**
     * Collaborative Pads
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pad;

    /**
     * Asterisk (VoIP)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_voip;

    /**
     * Unsplash Image Library
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_web_unsplash;

    /**
     * Partner Autocomplete
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_partner_autocomplete;

    /**
     * GeoLocalize
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_geolocalize;

    /**
     * Custom Report Footer
     * Footer text displayed at the bottom of all reports.
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_footer;

    /**
     * Multi-Currencies
     * Allows to work in a multi currency environment
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_multi_currency;

    /**
     * Paper format
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Document Template
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $external_report_layout_id;

    /**
     * Show Effect
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_effect;

    /**
     * Number of Companies
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $company_count;

    /**
     * Number of Active Users
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $active_user_count;

    /**
     * Number of Languages
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $language_count;

    /**
     * Company Name
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $company_name;

    /**
     * Company Informations
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $company_informations;

    /**
     * Fail Mail
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $fail_counter;

    /**
     * Alias Domain
     * If you have setup a catch-all email domain redirected to the Odoo server, enter the domain name here.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $alias_domain;

    /**
     * Token Map Box
     * Necessary for some functionalities in the map view
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $map_box_token;

    /**
     * Push Notifications
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_ocn_client;

    /**
     * Access Key
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $unsplash_access_key;

    /**
     * Enable password reset from Login page
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auth_signup_reset_password;

    /**
     * Template user for new users created through signup
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $auth_signup_template_user_id;

    /**
     * Insufficient credit
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $partner_autocomplete_insufficient_credit;

    /**
     * Discounts
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_discount_per_so_line;

    /**
     * Units of Measure
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_uom;

    /**
     * Variants
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_product_variant;

    /**
     * Product Configurator
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_product_configurator;

    /**
     * Sales Grid Entry
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_product_matrix;

    /**
     * Product Packagings
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_packaging;

    /**
     * Pricelists
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_product_pricelist;

    /**
     * Advanced Pricelists
     * Allows to manage different prices based on rules per category of customers.
     *                                 Example: 10% for retailers, promotion of 5 EUR on this product, etc.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_pricelist;

    /**
     * Pricelists Method
     * Multiple prices: Pricelists with fixed price rules by product,
     * Advanced rules: enables advanced price rules for pricelists.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> basic (Multiple prices per product)
     *     -> advanced (Advanced price rules (discounts, formulas))
     *
     *
     * @var string|null
     */
    private $product_pricelist_setting;

    /**
     * Weight unit of measure
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> 0 (Kilogram)
     *     -> 1 (Pound)
     *
     *
     * @var string|null
     */
    private $product_weight_in_lbs;

    /**
     * Volume unit of measure
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> 0 (Cubic Meters)
     *     -> 1 (Cubic Feet)
     *
     *
     * @var string|null
     */
    private $product_volume_volume_in_cubic_feet;

    /**
     * Print In Color
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_color;

    /**
     * Add a Cover Page
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_cover;

    /**
     * Print Both sides
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_duplex;

    /**
     * Digest Emails
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $digest_emails;

    /**
     * Digest Email
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $digest_id;

    /**
     * Has Accounting Entries
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_accounting_entries;

    /**
     * Currency
     * Main currency of the company.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Exchange Gain or Loss Journal
     * The accounting journal where automatic exchange differences will be registered
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_exchange_journal_id;

    /**
     * Company has a chart of accounts
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_chart_of_accounts;

    /**
     * Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $chart_template_id;

    /**
     * Default Sale Tax
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sale_tax_id;

    /**
     * Default Purchase Tax
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $purchase_tax_id;

    /**
     * Tax calculation rounding method
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> round_per_line (Round per Line)
     *     -> round_globally (Round Globally)
     *
     *
     * @var string|null
     */
    private $tax_calculation_rounding_method;

    /**
     * Accounting
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_accountant;

    /**
     * Analytic Accounting
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_analytic_accounting;

    /**
     * Analytic Tags
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_analytic_tags;

    /**
     * Warnings in Invoices
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_account;

    /**
     * Cash Rounding
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_cash_rounding;

    /**
     * Fiscal Years
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_fiscal_year;

    /**
     * Show line subtotals without taxes (B2B)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_line_subtotals_tax_excluded;

    /**
     * Show line subtotals with taxes (B2C)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_line_subtotals_tax_included;

    /**
     * Line Subtotals Tax Display
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> tax_excluded (Tax-Excluded)
     *     -> tax_included (Tax-Included)
     *
     *
     * @var string
     */
    private $show_line_subtotals_tax_selection;

    /**
     * Budget Management
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_budget;

    /**
     * Invoice Online Payment
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_payment;

    /**
     * Dynamic Reports
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_reports;

    /**
     * Allow check printing and deposits
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_check_printing;

    /**
     * Use batch payments
     * This allows you grouping payments into a single batch and eases the reconciliation process.
     * -This installs the account_batch_payment module.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_batch_payment;

    /**
     * SEPA Credit Transfer (SCT)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_sepa;

    /**
     * Use SEPA Direct Debit
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_sepa_direct_debit;

    /**
     * Plaid Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_plaid;

    /**
     * Bank Interface - Sync your bank feeds automatically
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_yodlee;

    /**
     * Import .qif files
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_qif;

    /**
     * Import in .ofx format
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_ofx;

    /**
     * Import in .csv format
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_csv;

    /**
     * Import in CAMT.053 format
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_camt;

    /**
     * Automatic Currency Rates
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_currency_rate_live;

    /**
     * Intrastat
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_intrastat;

    /**
     * Allow Product Margin
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_product_margin;

    /**
     * EU Digital Goods VAT
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_l10n_eu_service;

    /**
     * Account TaxCloud
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_taxcloud;

    /**
     * Bill Digitalization
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_invoice_extract;

    /**
     * Snailmail
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_snailmail_account;

    /**
     * Cash Basis
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $tax_exigibility;

    /**
     * Tax Cash Basis Journal
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_cash_basis_journal_id;

    /**
     * Bank Reconciliation Threshold
     * The bank reconciliation widget won't ask to reconcile payments older than this date.
     *                               This is useful if you install accounting after having used invoicing for some
     * time and
     *                               don't want to reconcile all the past payments with bank statements.
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $account_bank_reconciliation_start;

    /**
     * Display SEPA QR code
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $qr_code;

    /**
     * Print
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_print;

    /**
     * Send Email
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_email;

    /**
     * Default incoterm
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $incoterm_id;

    /**
     * Terms & Conditions
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_terms;

    /**
     * Default Terms & Conditions
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_invoice_terms;

    /**
     * Fiscalyear Last Day
     * Searchable : yes
     * Sortable : no
     *
     * @var int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> 1 (January)
     *     -> 2 (February)
     *     -> 3 (March)
     *     -> 4 (April)
     *     -> 5 (May)
     *     -> 6 (June)
     *     -> 7 (July)
     *     -> 8 (August)
     *     -> 9 (September)
     *     -> 10 (October)
     *     -> 11 (November)
     *     -> 12 (December)
     *
     *
     * @var string
     */
    private $fiscalyear_last_month;

    /**
     * Lock Date for Non-Advisers
     * Only users with the 'Adviser' role can edit accounts prior to and inclusive of this date. Use it for period
     * locking inside an open fiscal year, for example.
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $period_lock_date;

    /**
     * Lock Date for All Users
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     * No users can edit journal entries related to a tax prior and inclusive of this date.
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $tax_lock_date;

    /**
     * Anglo-Saxon Accounting
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $use_anglo_saxon;

    /**
     * Account Predictive Bills
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_predictive_bills;

    /**
     * Transfer Account
     * Intermediary account used when moving money from a liquidity account to another
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $transfer_account_id;

    /**
     * Processing Option
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> no_send (Do not digitalize bills)
     *     -> manual_send (Digitalize bills on demand only)
     *     -> auto_send (Digitalize all bills automatically)
     *
     *
     * @var string|null
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $extract_single_line_per_tax;

    /**
     * Verify VAT Numbers
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $vat_check_vies;

    /**
     * Interval Unit
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> manually (Manually)
     *     -> daily (Daily)
     *     -> weekly (Weekly)
     *     -> monthly (Monthly)
     *
     *
     * @var string|null
     */
    private $currency_interval_unit;

    /**
     * Service Provider
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> ecb (European Central Bank)
     *     -> fta (Federal Tax Administration (Switzerland))
     *     -> banxico (Mexican Bank)
     *     -> boc (Bank Of Canada)
     *     -> xe_com (xe.com)
     *
     *
     * @var string|null
     */
    private $currency_provider;

    /**
     * Next Execution Date
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $currency_next_execution_date;

    /**
     * Send by Post
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_snailmail;

    /**
     * Add totals below sections
     * When ticked, totals and subtotals appear below the sections of the report.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $totals_below_sections;

    /**
     * Periodicity
     * Periodicity
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> trimester (trimester)
     *     -> monthly (monthly)
     *
     *
     * @var string
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     * Searchable : yes
     * Sortable : no
     *
     * @var int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Lock Confirmed Sales
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_auto_done_setting;

    /**
     * Margins
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_margin;

    /**
     * Default Quotation Validity (Days)
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $quotation_validity_days;

    /**
     * Default Quotation Validity
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_quotation_validity_days;

    /**
     * Sale Order Warnings
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_sale;

    /**
     * Online Signature
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $portal_confirmation_sign;

    /**
     * Online Payment
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $portal_confirmation_pay;

    /**
     * Customer Addresses
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_delivery_address;

    /**
     * Pro-Forma Invoice
     * Allows you to send pro-forma invoice.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_proforma_sales;

    /**
     * Invoicing Policy
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> order (Invoice what is ordered)
     *     -> delivery (Invoice what is delivered)
     *
     *
     * @var string|null
     */
    private $default_invoice_policy;

    /**
     * Deposit Product
     * Default product used for payment advances
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $deposit_default_product_id;

    /**
     * Digital Content
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_website_sale_digital;

    /**
     * Customer Account
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> b2b (On invitation)
     *     -> b2c (Free sign up)
     *
     *
     * @var string|null
     */
    private $auth_signup_uninvited;

    /**
     * Shipping Costs
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery;

    /**
     * DHL Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_dhl;

    /**
     * FedEx Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_fedex;

    /**
     * UPS Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_ups;

    /**
     * USPS Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_usps;

    /**
     * bpost Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_bpost;

    /**
     * Easypost Connector
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_easypost;

    /**
     * Specific Email
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_product_email_template;

    /**
     * Coupons & Promotions
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_coupon;

    /**
     * Amazon Sync
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_amazon;

    /**
     * Automatic Invoice
     * The invoice is generated automatically and available in the customer portal when the transaction is confirmed
     * by the payment acquirer.
     * The invoice is marked as paid and the payment is registered in the payment journal defined in the
     * configuration of the payment acquirer.
     * This mode is advised if you issue the final invoice at the order and not after the delivery.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $automatic_invoice;

    /**
     * Email Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $template_id;

    /**
     * Confirmation Email
     * Email sent to the customer once the order is paid.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $confirmation_template_id;

    /**
     * Quotation Templates
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_order_template;

    /**
     * Default Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_sale_order_template_id;

    /**
     * Quotation Builder
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_quotation_builder;

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
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        Main currency of the company.
     *        Searchable : yes
     *        Sortable : no
     * @param string $show_line_subtotals_tax_selection Line Subtotals Tax Display
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> tax_excluded (Tax-Excluded)
     *            -> tax_included (Tax-Included)
     *       
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     *        Searchable : yes
     *        Sortable : no
     * @param string $fiscalyear_last_month Fiscalyear Last Month
     *        Searchable : yes
     *        Sortable : no
     *        Selection : (default value, usually null)
     *            -> 1 (January)
     *            -> 2 (February)
     *            -> 3 (March)
     *            -> 4 (April)
     *            -> 5 (May)
     *            -> 6 (June)
     *            -> 7 (July)
     *            -> 8 (August)
     *            -> 9 (September)
     *            -> 10 (October)
     *            -> 11 (November)
     *            -> 12 (December)
     *       
     * @param string $account_tax_periodicity Periodicity
     *        Periodicity
     *        Searchable : yes
     *        Sortable : no
     *        Selection : (default value, usually null)
     *            -> trimester (trimester)
     *            -> monthly (monthly)
     *       
     * @param int $account_tax_periodicity_reminder_day Reminder
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $company_id,
        OdooRelation $currency_id,
        string $show_line_subtotals_tax_selection,
        int $fiscalyear_last_day,
        string $fiscalyear_last_month,
        string $account_tax_periodicity,
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
     * @param string $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(string $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param DateTimeInterface|null $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTaxLockDate(): ?DateTimeInterface
    {
        return $this->tax_lock_date;
    }

    /**
     * @param DateTimeInterface|null $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getFiscalyearLockDate(): ?DateTimeInterface
    {
        return $this->fiscalyear_lock_date;
    }

    /**
     * @param DateTimeInterface|null $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPeriodLockDate(): ?DateTimeInterface
    {
        return $this->period_lock_date;
    }

    /**
     * @return string
     */
    public function getFiscalyearLastMonth(): string
    {
        return $this->fiscalyear_last_month;
    }

    /**
     * @param bool|null $use_anglo_saxon
     */
    public function setUseAngloSaxon(?bool $use_anglo_saxon): void
    {
        $this->use_anglo_saxon = $use_anglo_saxon;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @return int
     */
    public function getFiscalyearLastDay(): int
    {
        return $this->fiscalyear_last_day;
    }

    /**
     * @param bool|null $use_invoice_terms
     */
    public function setUseInvoiceTerms(?bool $use_invoice_terms): void
    {
        $this->use_invoice_terms = $use_invoice_terms;
    }

    /**
     * @return bool|null
     */
    public function isUseInvoiceTerms(): ?bool
    {
        return $this->use_invoice_terms;
    }

    /**
     * @param string|null $invoice_terms
     */
    public function setInvoiceTerms(?string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
    }

    /**
     * @return string|null
     */
    public function getInvoiceTerms(): ?string
    {
        return $this->invoice_terms;
    }

    /**
     * @return bool|null
     */
    public function isUseAngloSaxon(): ?bool
    {
        return $this->use_anglo_saxon;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountPredictiveBills(): ?bool
    {
        return $this->module_account_predictive_bills;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIncotermId(): ?OdooRelation
    {
        return $this->incoterm_id;
    }

    /**
     * @return string|null
     */
    public function getCurrencyIntervalUnit(): ?string
    {
        return $this->currency_interval_unit;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceIsSnailmail(): ?bool
    {
        return $this->invoice_is_snailmail;
    }

    /**
     * @param DateTimeInterface|null $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(?DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCurrencyNextExecutionDate(): ?DateTimeInterface
    {
        return $this->currency_next_execution_date;
    }

    /**
     * @param string|null $currency_provider
     */
    public function setCurrencyProvider(?string $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
    }

    /**
     * @return string|null
     */
    public function getCurrencyProvider(): ?string
    {
        return $this->currency_provider;
    }

    /**
     * @param string|null $currency_interval_unit
     */
    public function setCurrencyIntervalUnit(?string $currency_interval_unit): void
    {
        $this->currency_interval_unit = $currency_interval_unit;
    }

    /**
     * @param bool|null $vat_check_vies
     */
    public function setVatCheckVies(?bool $vat_check_vies): void
    {
        $this->vat_check_vies = $vat_check_vies;
    }

    /**
     * @param bool|null $module_account_predictive_bills
     */
    public function setModuleAccountPredictiveBills(?bool $module_account_predictive_bills): void
    {
        $this->module_account_predictive_bills = $module_account_predictive_bills;
    }

    /**
     * @return bool|null
     */
    public function isVatCheckVies(): ?bool
    {
        return $this->vat_check_vies;
    }

    /**
     * @param bool|null $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(?bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @return bool|null
     */
    public function isExtractSingleLinePerTax(): ?bool
    {
        return $this->extract_single_line_per_tax;
    }

    /**
     * @param string|null $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?string $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @return string|null
     */
    public function getExtractShowOcrOptionSelection(): ?string
    {
        return $this->extract_show_ocr_option_selection;
    }

    /**
     * @param OdooRelation|null $transfer_account_id
     */
    public function setTransferAccountId(?OdooRelation $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTransferAccountId(): ?OdooRelation
    {
        return $this->transfer_account_id;
    }

    /**
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @param bool|null $invoice_is_email
     */
    public function setInvoiceIsEmail(?bool $invoice_is_email): void
    {
        $this->invoice_is_email = $invoice_is_email;
    }

    /**
     * @return bool|null
     */
    public function isTotalsBelowSections(): ?bool
    {
        return $this->totals_below_sections;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBankStatementImportCamt(): ?bool
    {
        return $this->module_account_bank_statement_import_camt;
    }

    /**
     * @return bool|null
     */
    public function isModuleProductMargin(): ?bool
    {
        return $this->module_product_margin;
    }

    /**
     * @param bool|null $module_account_intrastat
     */
    public function setModuleAccountIntrastat(?bool $module_account_intrastat): void
    {
        $this->module_account_intrastat = $module_account_intrastat;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountIntrastat(): ?bool
    {
        return $this->module_account_intrastat;
    }

    /**
     * @param bool|null $module_currency_rate_live
     */
    public function setModuleCurrencyRateLive(?bool $module_currency_rate_live): void
    {
        $this->module_currency_rate_live = $module_currency_rate_live;
    }

    /**
     * @return bool|null
     */
    public function isModuleCurrencyRateLive(): ?bool
    {
        return $this->module_currency_rate_live;
    }

    /**
     * @param bool|null $module_account_bank_statement_import_camt
     */
    public function setModuleAccountBankStatementImportCamt(
        ?bool $module_account_bank_statement_import_camt
    ): void {
        $this->module_account_bank_statement_import_camt = $module_account_bank_statement_import_camt;
    }

    /**
     * @param bool|null $module_account_bank_statement_import_csv
     */
    public function setModuleAccountBankStatementImportCsv(
        ?bool $module_account_bank_statement_import_csv
    ): void {
        $this->module_account_bank_statement_import_csv = $module_account_bank_statement_import_csv;
    }

    /**
     * @return bool|null
     */
    public function isModuleL10nEuService(): ?bool
    {
        return $this->module_l10n_eu_service;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBankStatementImportCsv(): ?bool
    {
        return $this->module_account_bank_statement_import_csv;
    }

    /**
     * @param bool|null $module_account_bank_statement_import_ofx
     */
    public function setModuleAccountBankStatementImportOfx(
        ?bool $module_account_bank_statement_import_ofx
    ): void {
        $this->module_account_bank_statement_import_ofx = $module_account_bank_statement_import_ofx;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBankStatementImportOfx(): ?bool
    {
        return $this->module_account_bank_statement_import_ofx;
    }

    /**
     * @param bool|null $module_account_bank_statement_import_qif
     */
    public function setModuleAccountBankStatementImportQif(
        ?bool $module_account_bank_statement_import_qif
    ): void {
        $this->module_account_bank_statement_import_qif = $module_account_bank_statement_import_qif;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBankStatementImportQif(): ?bool
    {
        return $this->module_account_bank_statement_import_qif;
    }

    /**
     * @param bool|null $module_account_yodlee
     */
    public function setModuleAccountYodlee(?bool $module_account_yodlee): void
    {
        $this->module_account_yodlee = $module_account_yodlee;
    }

    /**
     * @param bool|null $module_product_margin
     */
    public function setModuleProductMargin(?bool $module_product_margin): void
    {
        $this->module_product_margin = $module_product_margin;
    }

    /**
     * @param bool|null $module_l10n_eu_service
     */
    public function setModuleL10nEuService(?bool $module_l10n_eu_service): void
    {
        $this->module_l10n_eu_service = $module_l10n_eu_service;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceIsEmail(): ?bool
    {
        return $this->invoice_is_email;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @param bool|null $invoice_is_print
     */
    public function setInvoiceIsPrint(?bool $invoice_is_print): void
    {
        $this->invoice_is_print = $invoice_is_print;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceIsPrint(): ?bool
    {
        return $this->invoice_is_print;
    }

    /**
     * @param bool|null $qr_code
     */
    public function setQrCode(?bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @return bool|null
     */
    public function isQrCode(): ?bool
    {
        return $this->qr_code;
    }

    /**
     * @param DateTimeInterface|null $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        ?DateTimeInterface $account_bank_reconciliation_start
    ): void {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getAccountBankReconciliationStart(): ?DateTimeInterface
    {
        return $this->account_bank_reconciliation_start;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxCashBasisJournalId(): ?OdooRelation
    {
        return $this->tax_cash_basis_journal_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountTaxcloud(): ?bool
    {
        return $this->module_account_taxcloud;
    }

    /**
     * @param bool|null $tax_exigibility
     */
    public function setTaxExigibility(?bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @return bool|null
     */
    public function isTaxExigibility(): ?bool
    {
        return $this->tax_exigibility;
    }

    /**
     * @param bool|null $module_snailmail_account
     */
    public function setModuleSnailmailAccount(?bool $module_snailmail_account): void
    {
        $this->module_snailmail_account = $module_snailmail_account;
    }

    /**
     * @return bool|null
     */
    public function isModuleSnailmailAccount(): ?bool
    {
        return $this->module_snailmail_account;
    }

    /**
     * @param bool|null $module_account_invoice_extract
     */
    public function setModuleAccountInvoiceExtract(?bool $module_account_invoice_extract): void
    {
        $this->module_account_invoice_extract = $module_account_invoice_extract;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountInvoiceExtract(): ?bool
    {
        return $this->module_account_invoice_extract;
    }

    /**
     * @param bool|null $module_account_taxcloud
     */
    public function setModuleAccountTaxcloud(?bool $module_account_taxcloud): void
    {
        $this->module_account_taxcloud = $module_account_taxcloud;
    }

    /**
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
    }

    /**
     * @param bool|null $totals_below_sections
     */
    public function setTotalsBelowSections(?bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
    }

    /**
     * @param bool|null $module_account_plaid
     */
    public function setModuleAccountPlaid(?bool $module_account_plaid): void
    {
        $this->module_account_plaid = $module_account_plaid;
    }

    /**
     * @return bool|null
     */
    public function isModuleProductEmailTemplate(): ?bool
    {
        return $this->module_product_email_template;
    }

    /**
     * @return bool|null
     */
    public function isAutomaticInvoice(): ?bool
    {
        return $this->automatic_invoice;
    }

    /**
     * @param bool|null $module_sale_amazon
     */
    public function setModuleSaleAmazon(?bool $module_sale_amazon): void
    {
        $this->module_sale_amazon = $module_sale_amazon;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleAmazon(): ?bool
    {
        return $this->module_sale_amazon;
    }

    /**
     * @param bool|null $module_sale_coupon
     */
    public function setModuleSaleCoupon(?bool $module_sale_coupon): void
    {
        $this->module_sale_coupon = $module_sale_coupon;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleCoupon(): ?bool
    {
        return $this->module_sale_coupon;
    }

    /**
     * @param bool|null $module_product_email_template
     */
    public function setModuleProductEmailTemplate(?bool $module_product_email_template): void
    {
        $this->module_product_email_template = $module_product_email_template;
    }

    /**
     * @param bool|null $module_delivery_easypost
     */
    public function setModuleDeliveryEasypost(?bool $module_delivery_easypost): void
    {
        $this->module_delivery_easypost = $module_delivery_easypost;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryEasypost(): ?bool
    {
        return $this->module_delivery_easypost;
    }

    /**
     * @param bool|null $module_delivery_bpost
     */
    public function setModuleDeliveryBpost(?bool $module_delivery_bpost): void
    {
        $this->module_delivery_bpost = $module_delivery_bpost;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryBpost(): ?bool
    {
        return $this->module_delivery_bpost;
    }

    /**
     * @param bool|null $module_delivery_usps
     */
    public function setModuleDeliveryUsps(?bool $module_delivery_usps): void
    {
        $this->module_delivery_usps = $module_delivery_usps;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryUsps(): ?bool
    {
        return $this->module_delivery_usps;
    }

    /**
     * @param bool|null $module_delivery_ups
     */
    public function setModuleDeliveryUps(?bool $module_delivery_ups): void
    {
        $this->module_delivery_ups = $module_delivery_ups;
    }

    /**
     * @param bool|null $automatic_invoice
     */
    public function setAutomaticInvoice(?bool $automatic_invoice): void
    {
        $this->automatic_invoice = $automatic_invoice;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param bool|null $module_delivery_fedex
     */
    public function setModuleDeliveryFedex(?bool $module_delivery_fedex): void
    {
        $this->module_delivery_fedex = $module_delivery_fedex;
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
    public function getConfirmationTemplateId(): ?OdooRelation
    {
        return $this->confirmation_template_id;
    }

    /**
     * @param bool|null $module_sale_quotation_builder
     */
    public function setModuleSaleQuotationBuilder(?bool $module_sale_quotation_builder): void
    {
        $this->module_sale_quotation_builder = $module_sale_quotation_builder;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleQuotationBuilder(): ?bool
    {
        return $this->module_sale_quotation_builder;
    }

    /**
     * @param OdooRelation|null $default_sale_order_template_id
     */
    public function setDefaultSaleOrderTemplateId(?OdooRelation $default_sale_order_template_id): void
    {
        $this->default_sale_order_template_id = $default_sale_order_template_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultSaleOrderTemplateId(): ?OdooRelation
    {
        return $this->default_sale_order_template_id;
    }

    /**
     * @param bool|null $group_sale_order_template
     */
    public function setGroupSaleOrderTemplate(?bool $group_sale_order_template): void
    {
        $this->group_sale_order_template = $group_sale_order_template;
    }

    /**
     * @return bool|null
     */
    public function isGroupSaleOrderTemplate(): ?bool
    {
        return $this->group_sale_order_template;
    }

    /**
     * @param OdooRelation|null $confirmation_template_id
     */
    public function setConfirmationTemplateId(?OdooRelation $confirmation_template_id): void
    {
        $this->confirmation_template_id = $confirmation_template_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryUps(): ?bool
    {
        return $this->module_delivery_ups;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryFedex(): ?bool
    {
        return $this->module_delivery_fedex;
    }

    /**
     * @return string
     */
    public function getAccountTaxPeriodicity(): string
    {
        return $this->account_tax_periodicity;
    }

    /**
     * @param bool|null $module_sale_margin
     */
    public function setModuleSaleMargin(?bool $module_sale_margin): void
    {
        $this->module_sale_margin = $module_sale_margin;
    }

    /**
     * @param bool|null $group_warning_sale
     */
    public function setGroupWarningSale(?bool $group_warning_sale): void
    {
        $this->group_warning_sale = $group_warning_sale;
    }

    /**
     * @return bool|null
     */
    public function isGroupWarningSale(): ?bool
    {
        return $this->group_warning_sale;
    }

    /**
     * @param bool|null $use_quotation_validity_days
     */
    public function setUseQuotationValidityDays(?bool $use_quotation_validity_days): void
    {
        $this->use_quotation_validity_days = $use_quotation_validity_days;
    }

    /**
     * @return bool|null
     */
    public function isUseQuotationValidityDays(): ?bool
    {
        return $this->use_quotation_validity_days;
    }

    /**
     * @param int|null $quotation_validity_days
     */
    public function setQuotationValidityDays(?int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @return int|null
     */
    public function getQuotationValidityDays(): ?int
    {
        return $this->quotation_validity_days;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleMargin(): ?bool
    {
        return $this->module_sale_margin;
    }

    /**
     * @param bool|null $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(?bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param bool|null $group_auto_done_setting
     */
    public function setGroupAutoDoneSetting(?bool $group_auto_done_setting): void
    {
        $this->group_auto_done_setting = $group_auto_done_setting;
    }

    /**
     * @return bool|null
     */
    public function isGroupAutoDoneSetting(): ?bool
    {
        return $this->group_auto_done_setting;
    }

    /**
     * @param OdooRelation|null $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(
        ?OdooRelation $account_tax_periodicity_journal_id
    ): void {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountTaxPeriodicityJournalId(): ?OdooRelation
    {
        return $this->account_tax_periodicity_journal_id;
    }

    /**
     * @param int $account_tax_periodicity_reminder_day
     */
    public function setAccountTaxPeriodicityReminderDay(int $account_tax_periodicity_reminder_day): void
    {
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
    }

    /**
     * @return int
     */
    public function getAccountTaxPeriodicityReminderDay(): int
    {
        return $this->account_tax_periodicity_reminder_day;
    }

    /**
     * @param string $account_tax_periodicity
     */
    public function setAccountTaxPeriodicity(string $account_tax_periodicity): void
    {
        $this->account_tax_periodicity = $account_tax_periodicity;
    }

    /**
     * @return bool|null
     */
    public function isPortalConfirmationSign(): ?bool
    {
        return $this->portal_confirmation_sign;
    }

    /**
     * @return bool|null
     */
    public function isPortalConfirmationPay(): ?bool
    {
        return $this->portal_confirmation_pay;
    }

    /**
     * @param bool|null $module_delivery_dhl
     */
    public function setModuleDeliveryDhl(?bool $module_delivery_dhl): void
    {
        $this->module_delivery_dhl = $module_delivery_dhl;
    }

    /**
     * @return bool|null
     */
    public function isModuleWebsiteSaleDigital(): ?bool
    {
        return $this->module_website_sale_digital;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryDhl(): ?bool
    {
        return $this->module_delivery_dhl;
    }

    /**
     * @param bool|null $module_delivery
     */
    public function setModuleDelivery(?bool $module_delivery): void
    {
        $this->module_delivery = $module_delivery;
    }

    /**
     * @return bool|null
     */
    public function isModuleDelivery(): ?bool
    {
        return $this->module_delivery;
    }

    /**
     * @param string|null $auth_signup_uninvited
     */
    public function setAuthSignupUninvited(?string $auth_signup_uninvited): void
    {
        $this->auth_signup_uninvited = $auth_signup_uninvited;
    }

    /**
     * @return string|null
     */
    public function getAuthSignupUninvited(): ?string
    {
        return $this->auth_signup_uninvited;
    }

    /**
     * @param bool|null $module_website_sale_digital
     */
    public function setModuleWebsiteSaleDigital(?bool $module_website_sale_digital): void
    {
        $this->module_website_sale_digital = $module_website_sale_digital;
    }

    /**
     * @param OdooRelation|null $deposit_default_product_id
     */
    public function setDepositDefaultProductId(?OdooRelation $deposit_default_product_id): void
    {
        $this->deposit_default_product_id = $deposit_default_product_id;
    }

    /**
     * @param bool|null $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(?bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDepositDefaultProductId(): ?OdooRelation
    {
        return $this->deposit_default_product_id;
    }

    /**
     * @param string|null $default_invoice_policy
     */
    public function setDefaultInvoicePolicy(?string $default_invoice_policy): void
    {
        $this->default_invoice_policy = $default_invoice_policy;
    }

    /**
     * @return string|null
     */
    public function getDefaultInvoicePolicy(): ?string
    {
        return $this->default_invoice_policy;
    }

    /**
     * @param bool|null $group_proforma_sales
     */
    public function setGroupProformaSales(?bool $group_proforma_sales): void
    {
        $this->group_proforma_sales = $group_proforma_sales;
    }

    /**
     * @return bool|null
     */
    public function isGroupProformaSales(): ?bool
    {
        return $this->group_proforma_sales;
    }

    /**
     * @param bool|null $group_sale_delivery_address
     */
    public function setGroupSaleDeliveryAddress(?bool $group_sale_delivery_address): void
    {
        $this->group_sale_delivery_address = $group_sale_delivery_address;
    }

    /**
     * @return bool|null
     */
    public function isGroupSaleDeliveryAddress(): ?bool
    {
        return $this->group_sale_delivery_address;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountYodlee(): ?bool
    {
        return $this->module_account_yodlee;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountPlaid(): ?bool
    {
        return $this->module_account_plaid;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return int|null
     */
    public function getLanguageCount(): ?int
    {
        return $this->language_count;
    }

    /**
     * @return int|null
     */
    public function getFailCounter(): ?int
    {
        return $this->fail_counter;
    }

    /**
     * @param string|null $company_informations
     */
    public function setCompanyInformations(?string $company_informations): void
    {
        $this->company_informations = $company_informations;
    }

    /**
     * @return string|null
     */
    public function getCompanyInformations(): ?string
    {
        return $this->company_informations;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param int|null $language_count
     */
    public function setLanguageCount(?int $language_count): void
    {
        $this->language_count = $language_count;
    }

    /**
     * @param int|null $active_user_count
     */
    public function setActiveUserCount(?int $active_user_count): void
    {
        $this->active_user_count = $active_user_count;
    }

    /**
     * @return string|null
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
    }

    /**
     * @return int|null
     */
    public function getActiveUserCount(): ?int
    {
        return $this->active_user_count;
    }

    /**
     * @param int|null $company_count
     */
    public function setCompanyCount(?int $company_count): void
    {
        $this->company_count = $company_count;
    }

    /**
     * @return int|null
     */
    public function getCompanyCount(): ?int
    {
        return $this->company_count;
    }

    /**
     * @param bool|null $show_effect
     */
    public function setShowEffect(?bool $show_effect): void
    {
        $this->show_effect = $show_effect;
    }

    /**
     * @return bool|null
     */
    public function isShowEffect(): ?bool
    {
        return $this->show_effect;
    }

    /**
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param int|null $fail_counter
     */
    public function setFailCounter(?int $fail_counter): void
    {
        $this->fail_counter = $fail_counter;
    }

    /**
     * @param string|null $alias_domain
     */
    public function setAliasDomain(?string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
    }

    /**
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param OdooRelation|null $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(?OdooRelation $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
    }

    /**
     * @param bool|null $group_uom
     */
    public function setGroupUom(?bool $group_uom): void
    {
        $this->group_uom = $group_uom;
    }

    /**
     * @return bool|null
     */
    public function isGroupUom(): ?bool
    {
        return $this->group_uom;
    }

    /**
     * @param bool|null $group_discount_per_so_line
     */
    public function setGroupDiscountPerSoLine(?bool $group_discount_per_so_line): void
    {
        $this->group_discount_per_so_line = $group_discount_per_so_line;
    }

    /**
     * @return bool|null
     */
    public function isGroupDiscountPerSoLine(): ?bool
    {
        return $this->group_discount_per_so_line;
    }

    /**
     * @param bool|null $partner_autocomplete_insufficient_credit
     */
    public function setPartnerAutocompleteInsufficientCredit(
        ?bool $partner_autocomplete_insufficient_credit
    ): void {
        $this->partner_autocomplete_insufficient_credit = $partner_autocomplete_insufficient_credit;
    }

    /**
     * @return bool|null
     */
    public function isPartnerAutocompleteInsufficientCredit(): ?bool
    {
        return $this->partner_autocomplete_insufficient_credit;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAuthSignupTemplateUserId(): ?OdooRelation
    {
        return $this->auth_signup_template_user_id;
    }

    /**
     * @return string|null
     */
    public function getMapBoxToken(): ?string
    {
        return $this->map_box_token;
    }

    /**
     * @param bool|null $auth_signup_reset_password
     */
    public function setAuthSignupResetPassword(?bool $auth_signup_reset_password): void
    {
        $this->auth_signup_reset_password = $auth_signup_reset_password;
    }

    /**
     * @return bool|null
     */
    public function isAuthSignupResetPassword(): ?bool
    {
        return $this->auth_signup_reset_password;
    }

    /**
     * @param string|null $unsplash_access_key
     */
    public function setUnsplashAccessKey(?string $unsplash_access_key): void
    {
        $this->unsplash_access_key = $unsplash_access_key;
    }

    /**
     * @return string|null
     */
    public function getUnsplashAccessKey(): ?string
    {
        return $this->unsplash_access_key;
    }

    /**
     * @param bool|null $module_ocn_client
     */
    public function setModuleOcnClient(?bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
    }

    /**
     * @return bool|null
     */
    public function isModuleOcnClient(): ?bool
    {
        return $this->module_ocn_client;
    }

    /**
     * @param string|null $map_box_token
     */
    public function setMapBoxToken(?string $map_box_token): void
    {
        $this->map_box_token = $map_box_token;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExternalReportLayoutId(): ?OdooRelation
    {
        return $this->external_report_layout_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
    }

    /**
     * @param bool|null $group_product_variant
     */
    public function setGroupProductVariant(?bool $group_product_variant): void
    {
        $this->group_product_variant = $group_product_variant;
    }

    /**
     * @param bool|null $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
    }

    /**
     * @param bool|null $module_auth_oauth
     */
    public function setModuleAuthOauth(?bool $module_auth_oauth): void
    {
        $this->module_auth_oauth = $module_auth_oauth;
    }

    /**
     * @return bool|null
     */
    public function isModuleAuthOauth(): ?bool
    {
        return $this->module_auth_oauth;
    }

    /**
     * @param bool|null $module_google_spreadsheet
     */
    public function setModuleGoogleSpreadsheet(?bool $module_google_spreadsheet): void
    {
        $this->module_google_spreadsheet = $module_google_spreadsheet;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleSpreadsheet(): ?bool
    {
        return $this->module_google_spreadsheet;
    }

    /**
     * @param bool|null $module_google_drive
     */
    public function setModuleGoogleDrive(?bool $module_google_drive): void
    {
        $this->module_google_drive = $module_google_drive;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleDrive(): ?bool
    {
        return $this->module_google_drive;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleCalendar(): ?bool
    {
        return $this->module_google_calendar;
    }

    /**
     * @param bool|null $module_auth_ldap
     */
    public function setModuleAuthLdap(?bool $module_auth_ldap): void
    {
        $this->module_auth_ldap = $module_auth_ldap;
    }

    /**
     * @param bool|null $module_base_import
     */
    public function setModuleBaseImport(?bool $module_base_import): void
    {
        $this->module_base_import = $module_base_import;
    }

    /**
     * @return bool|null
     */
    public function isModuleBaseImport(): ?bool
    {
        return $this->module_base_import;
    }

    /**
     * @param bool|null $external_email_server_default
     */
    public function setExternalEmailServerDefault(?bool $external_email_server_default): void
    {
        $this->external_email_server_default = $external_email_server_default;
    }

    /**
     * @return bool|null
     */
    public function isExternalEmailServerDefault(): ?bool
    {
        return $this->external_email_server_default;
    }

    /**
     * @param bool|null $user_default_rights
     */
    public function setUserDefaultRights(?bool $user_default_rights): void
    {
        $this->user_default_rights = $user_default_rights;
    }

    /**
     * @return bool|null
     */
    public function isUserDefaultRights(): ?bool
    {
        return $this->user_default_rights;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleAuthLdap(): ?bool
    {
        return $this->module_auth_ldap;
    }

    /**
     * @return bool|null
     */
    public function isModuleBaseGengo(): ?bool
    {
        return $this->module_base_gengo;
    }

    /**
     * @param bool|null $group_multi_currency
     */
    public function setGroupMultiCurrency(?bool $group_multi_currency): void
    {
        $this->group_multi_currency = $group_multi_currency;
    }

    /**
     * @return bool|null
     */
    public function isModulePartnerAutocomplete(): ?bool
    {
        return $this->module_partner_autocomplete;
    }

    /**
     * @return bool|null
     */
    public function isGroupMultiCurrency(): ?bool
    {
        return $this->group_multi_currency;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return string|null
     */
    public function getReportFooter(): ?string
    {
        return $this->report_footer;
    }

    /**
     * @param bool|null $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(?bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
    }

    /**
     * @return bool|null
     */
    public function isModuleBaseGeolocalize(): ?bool
    {
        return $this->module_base_geolocalize;
    }

    /**
     * @param bool|null $module_partner_autocomplete
     */
    public function setModulePartnerAutocomplete(?bool $module_partner_autocomplete): void
    {
        $this->module_partner_autocomplete = $module_partner_autocomplete;
    }

    /**
     * @param bool|null $module_web_unsplash
     */
    public function setModuleWebUnsplash(?bool $module_web_unsplash): void
    {
        $this->module_web_unsplash = $module_web_unsplash;
    }

    /**
     * @param bool|null $module_base_gengo
     */
    public function setModuleBaseGengo(?bool $module_base_gengo): void
    {
        $this->module_base_gengo = $module_base_gengo;
    }

    /**
     * @return bool|null
     */
    public function isModuleWebUnsplash(): ?bool
    {
        return $this->module_web_unsplash;
    }

    /**
     * @param bool|null $module_voip
     */
    public function setModuleVoip(?bool $module_voip): void
    {
        $this->module_voip = $module_voip;
    }

    /**
     * @return bool|null
     */
    public function isModuleVoip(): ?bool
    {
        return $this->module_voip;
    }

    /**
     * @param bool|null $module_pad
     */
    public function setModulePad(?bool $module_pad): void
    {
        $this->module_pad = $module_pad;
    }

    /**
     * @return bool|null
     */
    public function isModulePad(): ?bool
    {
        return $this->module_pad;
    }

    /**
     * @param bool|null $module_inter_company_rules
     */
    public function setModuleInterCompanyRules(?bool $module_inter_company_rules): void
    {
        $this->module_inter_company_rules = $module_inter_company_rules;
    }

    /**
     * @return bool|null
     */
    public function isModuleInterCompanyRules(): ?bool
    {
        return $this->module_inter_company_rules;
    }

    /**
     * @return bool|null
     */
    public function isGroupProductVariant(): ?bool
    {
        return $this->group_product_variant;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleProductConfigurator(): ?bool
    {
        return $this->module_sale_product_configurator;
    }

    /**
     * @param bool|null $module_account_sepa_direct_debit
     */
    public function setModuleAccountSepaDirectDebit(?bool $module_account_sepa_direct_debit): void
    {
        $this->module_account_sepa_direct_debit = $module_account_sepa_direct_debit;
    }

    /**
     * @param bool|null $group_analytic_tags
     */
    public function setGroupAnalyticTags(?bool $group_analytic_tags): void
    {
        $this->group_analytic_tags = $group_analytic_tags;
    }

    /**
     * @param bool|null $group_fiscal_year
     */
    public function setGroupFiscalYear(?bool $group_fiscal_year): void
    {
        $this->group_fiscal_year = $group_fiscal_year;
    }

    /**
     * @return bool|null
     */
    public function isGroupFiscalYear(): ?bool
    {
        return $this->group_fiscal_year;
    }

    /**
     * @param bool|null $group_cash_rounding
     */
    public function setGroupCashRounding(?bool $group_cash_rounding): void
    {
        $this->group_cash_rounding = $group_cash_rounding;
    }

    /**
     * @return bool|null
     */
    public function isGroupCashRounding(): ?bool
    {
        return $this->group_cash_rounding;
    }

    /**
     * @param bool|null $group_warning_account
     */
    public function setGroupWarningAccount(?bool $group_warning_account): void
    {
        $this->group_warning_account = $group_warning_account;
    }

    /**
     * @return bool|null
     */
    public function isGroupWarningAccount(): ?bool
    {
        return $this->group_warning_account;
    }

    /**
     * @return bool|null
     */
    public function isGroupAnalyticTags(): ?bool
    {
        return $this->group_analytic_tags;
    }

    /**
     * @param bool|null $group_show_line_subtotals_tax_excluded
     */
    public function setGroupShowLineSubtotalsTaxExcluded(
        ?bool $group_show_line_subtotals_tax_excluded
    ): void {
        $this->group_show_line_subtotals_tax_excluded = $group_show_line_subtotals_tax_excluded;
    }

    /**
     * @param bool|null $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(?bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
    }

    /**
     * @return bool|null
     */
    public function isGroupAnalyticAccounting(): ?bool
    {
        return $this->group_analytic_accounting;
    }

    /**
     * @param bool|null $module_account_accountant
     */
    public function setModuleAccountAccountant(?bool $module_account_accountant): void
    {
        $this->module_account_accountant = $module_account_accountant;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountAccountant(): ?bool
    {
        return $this->module_account_accountant;
    }

    /**
     * @param string|null $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?string $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @return string|null
     */
    public function getTaxCalculationRoundingMethod(): ?string
    {
        return $this->tax_calculation_rounding_method;
    }

    /**
     * @return bool|null
     */
    public function isGroupShowLineSubtotalsTaxExcluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_excluded;
    }

    /**
     * @return bool|null
     */
    public function isGroupShowLineSubtotalsTaxIncluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_included;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPurchaseTaxId(): ?OdooRelation
    {
        return $this->purchase_tax_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountCheckPrinting(): ?bool
    {
        return $this->module_account_check_printing;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountSepaDirectDebit(): ?bool
    {
        return $this->module_account_sepa_direct_debit;
    }

    /**
     * @param bool|null $module_account_sepa
     */
    public function setModuleAccountSepa(?bool $module_account_sepa): void
    {
        $this->module_account_sepa = $module_account_sepa;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountSepa(): ?bool
    {
        return $this->module_account_sepa;
    }

    /**
     * @param bool|null $module_account_batch_payment
     */
    public function setModuleAccountBatchPayment(?bool $module_account_batch_payment): void
    {
        $this->module_account_batch_payment = $module_account_batch_payment;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBatchPayment(): ?bool
    {
        return $this->module_account_batch_payment;
    }

    /**
     * @param bool|null $module_account_check_printing
     */
    public function setModuleAccountCheckPrinting(?bool $module_account_check_printing): void
    {
        $this->module_account_check_printing = $module_account_check_printing;
    }

    /**
     * @param bool|null $module_account_reports
     */
    public function setModuleAccountReports(?bool $module_account_reports): void
    {
        $this->module_account_reports = $module_account_reports;
    }

    /**
     * @param bool|null $group_show_line_subtotals_tax_included
     */
    public function setGroupShowLineSubtotalsTaxIncluded(
        ?bool $group_show_line_subtotals_tax_included
    ): void {
        $this->group_show_line_subtotals_tax_included = $group_show_line_subtotals_tax_included;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountReports(): ?bool
    {
        return $this->module_account_reports;
    }

    /**
     * @param bool|null $module_account_payment
     */
    public function setModuleAccountPayment(?bool $module_account_payment): void
    {
        $this->module_account_payment = $module_account_payment;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountPayment(): ?bool
    {
        return $this->module_account_payment;
    }

    /**
     * @param bool|null $module_account_budget
     */
    public function setModuleAccountBudget(?bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBudget(): ?bool
    {
        return $this->module_account_budget;
    }

    /**
     * @param string $show_line_subtotals_tax_selection
     */
    public function setShowLineSubtotalsTaxSelection(string $show_line_subtotals_tax_selection): void
    {
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
    }

    /**
     * @return string
     */
    public function getShowLineSubtotalsTaxSelection(): string
    {
        return $this->show_line_subtotals_tax_selection;
    }

    /**
     * @param OdooRelation|null $purchase_tax_id
     */
    public function setPurchaseTaxId(?OdooRelation $purchase_tax_id): void
    {
        $this->purchase_tax_id = $purchase_tax_id;
    }

    /**
     * @param OdooRelation|null $sale_tax_id
     */
    public function setSaleTaxId(?OdooRelation $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
    }

    /**
     * @param bool|null $module_sale_product_configurator
     */
    public function setModuleSaleProductConfigurator(?bool $module_sale_product_configurator): void
    {
        $this->module_sale_product_configurator = $module_sale_product_configurator;
    }

    /**
     * @return string|null
     */
    public function getProductPricelistSetting(): ?string
    {
        return $this->product_pricelist_setting;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailColor(): ?bool
    {
        return $this->snailmail_color;
    }

    /**
     * @param string|null $product_volume_volume_in_cubic_feet
     */
    public function setProductVolumeVolumeInCubicFeet(?string $product_volume_volume_in_cubic_feet): void
    {
        $this->product_volume_volume_in_cubic_feet = $product_volume_volume_in_cubic_feet;
    }

    /**
     * @return string|null
     */
    public function getProductVolumeVolumeInCubicFeet(): ?string
    {
        return $this->product_volume_volume_in_cubic_feet;
    }

    /**
     * @param string|null $product_weight_in_lbs
     */
    public function setProductWeightInLbs(?string $product_weight_in_lbs): void
    {
        $this->product_weight_in_lbs = $product_weight_in_lbs;
    }

    /**
     * @return string|null
     */
    public function getProductWeightInLbs(): ?string
    {
        return $this->product_weight_in_lbs;
    }

    /**
     * @param string|null $product_pricelist_setting
     */
    public function setProductPricelistSetting(?string $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
    }

    /**
     * @param bool|null $group_sale_pricelist
     */
    public function setGroupSalePricelist(?bool $group_sale_pricelist): void
    {
        $this->group_sale_pricelist = $group_sale_pricelist;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailCover(): ?bool
    {
        return $this->snailmail_cover;
    }

    /**
     * @return bool|null
     */
    public function isGroupSalePricelist(): ?bool
    {
        return $this->group_sale_pricelist;
    }

    /**
     * @param bool|null $group_product_pricelist
     */
    public function setGroupProductPricelist(?bool $group_product_pricelist): void
    {
        $this->group_product_pricelist = $group_product_pricelist;
    }

    /**
     * @return bool|null
     */
    public function isGroupProductPricelist(): ?bool
    {
        return $this->group_product_pricelist;
    }

    /**
     * @param bool|null $group_stock_packaging
     */
    public function setGroupStockPackaging(?bool $group_stock_packaging): void
    {
        $this->group_stock_packaging = $group_stock_packaging;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockPackaging(): ?bool
    {
        return $this->group_stock_packaging;
    }

    /**
     * @param bool|null $module_sale_product_matrix
     */
    public function setModuleSaleProductMatrix(?bool $module_sale_product_matrix): void
    {
        $this->module_sale_product_matrix = $module_sale_product_matrix;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleProductMatrix(): ?bool
    {
        return $this->module_sale_product_matrix;
    }

    /**
     * @param bool|null $snailmail_color
     */
    public function setSnailmailColor(?bool $snailmail_color): void
    {
        $this->snailmail_color = $snailmail_color;
    }

    /**
     * @param bool|null $snailmail_cover
     */
    public function setSnailmailCover(?bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSaleTaxId(): ?OdooRelation
    {
        return $this->sale_tax_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation|null $chart_template_id
     */
    public function setChartTemplateId(?OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getChartTemplateId(): ?OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @param bool|null $has_chart_of_accounts
     */
    public function setHasChartOfAccounts(?bool $has_chart_of_accounts): void
    {
        $this->has_chart_of_accounts = $has_chart_of_accounts;
    }

    /**
     * @return bool|null
     */
    public function isHasChartOfAccounts(): ?bool
    {
        return $this->has_chart_of_accounts;
    }

    /**
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyExchangeJournalId(): ?OdooRelation
    {
        return $this->currency_exchange_journal_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailDuplex(): ?bool
    {
        return $this->snailmail_duplex;
    }

    /**
     * @param bool|null $has_accounting_entries
     */
    public function setHasAccountingEntries(?bool $has_accounting_entries): void
    {
        $this->has_accounting_entries = $has_accounting_entries;
    }

    /**
     * @return bool|null
     */
    public function isHasAccountingEntries(): ?bool
    {
        return $this->has_accounting_entries;
    }

    /**
     * @param OdooRelation|null $digest_id
     */
    public function setDigestId(?OdooRelation $digest_id): void
    {
        $this->digest_id = $digest_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDigestId(): ?OdooRelation
    {
        return $this->digest_id;
    }

    /**
     * @param bool|null $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
    }

    /**
     * @return bool|null
     */
    public function isDigestEmails(): ?bool
    {
        return $this->digest_emails;
    }

    /**
     * @param bool|null $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.settings';
    }
}
