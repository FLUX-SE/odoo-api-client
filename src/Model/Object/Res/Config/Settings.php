<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Config;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : res.config.settings
 * ---
 * Name : res.config.settings
 * ---
 * Info :
 * Inherit the base settings to add a counter of failed email + configure
 *         the alias domain.
 */
final class Settings extends Base
{
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
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Default Access Rights
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $user_default_rights;

    /**
     * External Email Servers
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $external_email_server_default;

    /**
     * Allow users to import data from CSV/XLS/XLSX/ODS files
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_import;

    /**
     * Allow the users to synchronize their calendar  with Google Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_calendar;

    /**
     * Attach Google documents to any record
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_drive;

    /**
     * Google Spreadsheet
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_spreadsheet;

    /**
     * Use external authentication providers (OAuth)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_auth_oauth;

    /**
     * LDAP Authentication
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_auth_ldap;

    /**
     * Translate Your Website with Gengo
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_gengo;

    /**
     * Manage Inter Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_inter_company_rules;

    /**
     * Collaborative Pads
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pad;

    /**
     * Asterisk (VoIP)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_voip;

    /**
     * Unsplash Image Library
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_web_unsplash;

    /**
     * Partner Autocomplete
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_partner_autocomplete;

    /**
     * GeoLocalize
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_base_geolocalize;

    /**
     * Custom Report Footer
     * ---
     * Footer text displayed at the bottom of all reports.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_footer;

    /**
     * Multi-Currencies
     * ---
     * Allows to work in a multi currency environment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_multi_currency;

    /**
     * Paper format
     * ---
     * Relation : many2one (report.paperformat)
     * @see \Flux\OdooApiClient\Model\Object\Report\Paperformat
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Document Template
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $external_report_layout_id;

    /**
     * Show Effect
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_effect;

    /**
     * Number of Companies
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $company_count;

    /**
     * Number of Active Users
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $active_user_count;

    /**
     * Number of Languages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $language_count;

    /**
     * Company Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $company_name;

    /**
     * Company Informations
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $company_informations;

    /**
     * Fail Mail
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $fail_counter;

    /**
     * Alias Domain
     * ---
     * If you have setup a catch-all email domain redirected to the Odoo server, enter the domain name here.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $alias_domain;

    /**
     * Token Map Box
     * ---
     * Necessary for some functionalities in the map view
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $map_box_token;

    /**
     * Push Notifications
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_ocn_client;

    /**
     * Access Key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $unsplash_access_key;

    /**
     * Enable password reset from Login page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auth_signup_reset_password;

    /**
     * Customer Account
     * ---
     * Selection : (default value, usually null)
     *     -> b2b (On invitation)
     *     -> b2c (Free sign up)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $auth_signup_uninvited;

    /**
     * Template user for new users created through signup
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $auth_signup_template_user_id;

    /**
     * Insufficient credit
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $partner_autocomplete_insufficient_credit;

    /**
     * Discounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_discount_per_so_line;

    /**
     * Units of Measure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_uom;

    /**
     * Variants
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_product_variant;

    /**
     * Product Configurator
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_product_configurator;

    /**
     * Sales Grid Entry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_product_matrix;

    /**
     * Product Packagings
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_packaging;

    /**
     * Pricelists
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_product_pricelist;

    /**
     * Advanced Pricelists
     * ---
     * Allows to manage different prices based on rules per category of customers.
     *                                 Example: 10% for retailers, promotion of 5 EUR on this product, etc.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_pricelist;

    /**
     * Pricelists Method
     * ---
     * Multiple prices: Pricelists with fixed price rules by product,
     * Advanced rules: enables advanced price rules for pricelists.
     * ---
     * Selection : (default value, usually null)
     *     -> basic (Multiple prices per product)
     *     -> advanced (Advanced price rules (discounts, formulas))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_pricelist_setting;

    /**
     * Weight unit of measure
     * ---
     * Selection : (default value, usually null)
     *     -> 0 (Kilogram)
     *     -> 1 (Pound)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_weight_in_lbs;

    /**
     * Volume unit of measure
     * ---
     * Selection : (default value, usually null)
     *     -> 0 (Cubic Meters)
     *     -> 1 (Cubic Feet)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_volume_volume_in_cubic_feet;

    /**
     * Print In Color
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_color;

    /**
     * Add a Cover Page
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_cover;

    /**
     * Print Both sides
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $snailmail_duplex;

    /**
     * Digest Emails
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $digest_emails;

    /**
     * Digest Email
     * ---
     * Relation : many2one (digest.digest)
     * @see \Flux\OdooApiClient\Model\Object\Digest\Digest
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $digest_id;

    /**
     * Has Accounting Entries
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_accounting_entries;

    /**
     * Currency
     * ---
     * Main currency of the company.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Exchange Gain or Loss Journal
     * ---
     * The accounting journal where automatic exchange differences will be registered
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_exchange_journal_id;

    /**
     * Company has a chart of accounts
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_chart_of_accounts;

    /**
     * Template
     * ---
     * Relation : many2one (account.chart.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Chart\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $chart_template_id;

    /**
     * Default Purchase Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $purchase_tax_id;

    /**
     * Tax calculation rounding method
     * ---
     * Selection : (default value, usually null)
     *     -> round_per_line (Round per Line)
     *     -> round_globally (Round Globally)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $tax_calculation_rounding_method;

    /**
     * Accounting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_accountant;

    /**
     * Analytic Accounting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_analytic_accounting;

    /**
     * Analytic Tags
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_analytic_tags;

    /**
     * Warnings in Invoices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_account;

    /**
     * Cash Rounding
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_cash_rounding;

    /**
     * Fiscal Years
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_fiscal_year;

    /**
     * Show line subtotals without taxes (B2B)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_line_subtotals_tax_excluded;

    /**
     * Show line subtotals with taxes (B2C)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_line_subtotals_tax_included;

    /**
     * Line Subtotals Tax Display
     * ---
     * Selection : (default value, usually null)
     *     -> tax_excluded (Tax-Excluded)
     *     -> tax_included (Tax-Included)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $show_line_subtotals_tax_selection;

    /**
     * Budget Management
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_budget;

    /**
     * Invoice Online Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_payment;

    /**
     * Dynamic Reports
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_reports;

    /**
     * Allow check printing and deposits
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_check_printing;

    /**
     * Use batch payments
     * ---
     * This allows you grouping payments into a single batch and eases the reconciliation process.
     * -This installs the account_batch_payment module.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_batch_payment;

    /**
     * SEPA Credit Transfer (SCT)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_sepa;

    /**
     * Use SEPA Direct Debit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_sepa_direct_debit;

    /**
     * Plaid Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_plaid;

    /**
     * Bank Interface - Sync your bank feeds automatically
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_yodlee;

    /**
     * Import .qif files
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_qif;

    /**
     * Import in .ofx format
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_ofx;

    /**
     * Import in .csv format
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_csv;

    /**
     * Import in CAMT.053 format
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_bank_statement_import_camt;

    /**
     * Automatic Currency Rates
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_currency_rate_live;

    /**
     * Intrastat
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_intrastat;

    /**
     * Allow Product Margin
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_product_margin;

    /**
     * EU Digital Goods VAT
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_l10n_eu_service;

    /**
     * Account TaxCloud
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_taxcloud;

    /**
     * Bill Digitalization
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_invoice_extract;

    /**
     * Snailmail
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_snailmail_account;

    /**
     * Cash Basis
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $tax_exigibility;

    /**
     * Tax Cash Basis Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_cash_basis_journal_id;

    /**
     * Bank Reconciliation Threshold
     * ---
     * The bank reconciliation widget won't ask to reconcile payments older than this date.
     *                               This is useful if you install accounting after having used invoicing for some
     * time and
     *                               don't want to reconcile all the past payments with bank statements.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $account_bank_reconciliation_start;

    /**
     * Display SEPA QR code
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $qr_code;

    /**
     * Print
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_print;

    /**
     * Send Email
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_email;

    /**
     * Default incoterm
     * ---
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * ---
     * Relation : many2one (account.incoterms)
     * @see \Flux\OdooApiClient\Model\Object\Account\Incoterms
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $incoterm_id;

    /**
     * Terms & Conditions
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_terms;

    /**
     * Default Terms & Conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_invoice_terms;

    /**
     * Fiscalyear Last Day
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     * ---
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
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $fiscalyear_last_month;

    /**
     * Lock Date for Non-Advisers
     * ---
     * Only users with the 'Adviser' role can edit accounts prior to and inclusive of this date. Use it for period
     * locking inside an open fiscal year, for example.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $period_lock_date;

    /**
     * Lock Date for All Users
     * ---
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     * ---
     * No users can edit journal entries related to a tax prior and inclusive of this date.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $tax_lock_date;

    /**
     * Anglo-Saxon Accounting
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $use_anglo_saxon;

    /**
     * Account Predictive Bills
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_predictive_bills;

    /**
     * Transfer Account
     * ---
     * Intermediary account used when moving money from a liquidity account to another
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $transfer_account_id;

    /**
     * Processing Option
     * ---
     * Selection : (default value, usually null)
     *     -> no_send (Do not digitalize bills)
     *     -> manual_send (Digitalize bills on demand only)
     *     -> auto_send (Digitalize all bills automatically)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $extract_single_line_per_tax;

    /**
     * Interval Unit
     * ---
     * Selection : (default value, usually null)
     *     -> manually (Manually)
     *     -> daily (Daily)
     *     -> weekly (Weekly)
     *     -> monthly (Monthly)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $currency_interval_unit;

    /**
     * Service Provider
     * ---
     * Selection : (default value, usually null)
     *     -> ecb (European Central Bank)
     *     -> fta (Federal Tax Administration (Switzerland))
     *     -> banxico (Mexican Bank)
     *     -> boc (Bank Of Canada)
     *     -> xe_com (xe.com)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $currency_provider;

    /**
     * Next Execution Date
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $currency_next_execution_date;

    /**
     * Send by Post
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_is_snailmail;

    /**
     * Add totals below sections
     * ---
     * When ticked, totals and subtotals appear below the sections of the report.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $totals_below_sections;

    /**
     * Periodicity
     * ---
     * Periodicity
     * ---
     * Selection : (default value, usually null)
     *     -> trimester (trimester)
     *     -> monthly (monthly)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $account_tax_periodicity;

    /**
     * Reminder
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int
     */
    private $account_tax_periodicity_reminder_day;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_tax_periodicity_journal_id;

    /**
     * Company Country code
     * ---
     * The ISO country code in two chars. 
     * You can use this field for quick search.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $country_code;

    /**
     * Check Layout
     * ---
     * Select the format corresponding to the check paper you will be printing your checks on.
     * In order to disable the printing feature, select 'None'.
     * ---
     * Selection : (default value, usually null)
     *     -> disabled (None)
     *     -> action_print_check_top (check on top)
     *     -> action_print_check_middle (check in middle)
     *     -> action_print_check_bottom (check on bottom)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $account_check_printing_layout;

    /**
     * Print Date Label
     * ---
     * This option allows you to print the date label on the check as per CPA. Disable this if your pre-printed check
     * includes the date label.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $account_check_printing_date_label;

    /**
     * Multi-Pages Check Stub
     * ---
     * This option allows you to print check details (stub) on multiple pages if they don't fit on a single page.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $account_check_printing_multi_stub;

    /**
     * Check Top Margin
     * ---
     * Adjust the margins of generated checks to make it fit your printer's settings.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $account_check_printing_margin_top;

    /**
     * Check Left Margin
     * ---
     * Adjust the margins of generated checks to make it fit your printer's settings.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $account_check_printing_margin_left;

    /**
     * Check Right Margin
     * ---
     * Adjust the margins of generated checks to make it fit your printer's settings.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $account_check_printing_margin_right;

    /**
     * TaxCloud API ID
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $taxcloud_api_id;

    /**
     * TaxCloud API KEY
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $taxcloud_api_key;

    /**
     * Default TIC Code
     * ---
     * TIC (Taxability Information Codes) allow to get specific tax rates for each product type. This default value
     * applies if no product is used in the order/invoice, or if no TIC is set on the product or its product
     * category. By default, TaxCloud relies on the TIC *[0] Uncategorized* default referring to general goods and
     * services.
     * ---
     * Relation : many2one (product.tic.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Tic\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tic_category_id;

    /**
     * Verify VAT Numbers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $vat_check_vies;

    /**
     * Reservation
     * ---
     * Reserving products manually in delivery orders or by running the scheduler is advised to better manage
     * priorities in case of long customer lead times or/and frequent stock-outs.
     * ---
     * Selection : (default value, usually null)
     *     -> 1 (Immediately after sales order confirmation)
     *     -> 0 (Manually or based on automatic scheduler)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $module_procurement_jit;

    /**
     * Expiration Dates
     * ---
     * Track following dates on lots & serial numbers: best before, removal, end of life, alert. 
     *   Such dates are set automatically at lot/serial number creation based on values set on the product (in days).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_product_expiry;

    /**
     * Lots & Serial Numbers
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_production_lot;

    /**
     * Display Lots & Serial Numbers on Delivery Slips
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_lot_on_delivery_slip;

    /**
     * Delivery Packages
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_tracking_lot;

    /**
     * Consignment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_tracking_owner;

    /**
     * Multi-Step Routes
     * ---
     * Add and customize route operations to process product moves in your warehouse(s): e.g. unload > quality
     * control > stock for incoming products, pick > pack > ship for outgoing products. 
     *   You can also set putaway strategies on warehouse locations in order to send incoming products into specific
     * child locations straight away (e.g. specific bins, racks).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_adv_location;

    /**
     * Warnings for Stock
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_stock;

    /**
     * Batch Pickings
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_stock_picking_batch;

    /**
     * Barcode Scanner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_stock_barcode;

    /**
     * Email Confirmation picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $stock_move_email_validation;

    /**
     * Email Template confirmation picking
     * ---
     * Email sent to the customer once the order is done.
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $stock_mail_confirmation_template_id;

    /**
     * SMS Confirmation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_stock_sms;

    /**
     * Delivery Methods
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery;

    /**
     * DHL USA
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_dhl;

    /**
     * FedEx
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_fedex;

    /**
     * UPS
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_ups;

    /**
     * USPS
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_usps;

    /**
     * bpost
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_bpost;

    /**
     * Easypost
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_easypost;

    /**
     * Storage Locations
     * ---
     * Store products in specific locations of your warehouse (e.g. bins, racks) and to track inventory accordingly.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_multi_locations;

    /**
     * Multi-Warehouses
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_stock_multi_warehouses;

    /**
     * SMS Validation with stock move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $stock_move_sms_validation;

    /**
     * SMS Template
     * ---
     * SMS sent to the customer once the order is done.
     * ---
     * Relation : many2one (sms.template)
     * @see \Flux\OdooApiClient\Model\Object\Sms\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $stock_sms_confirmation_template_id;

    /**
     * Landed Costs
     * ---
     * Affect landed costs on reception operations and split them among products to update their cost price.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_stock_landed_costs;

    /**
     * Default Sale Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sale_tax_id;

    /**
     * Vantiv Payment Terminal
     * ---
     * The transactions are processed by Vantiv. Set your Vantiv credentials on the related payment method.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_mercury;

    /**
     * Adyen Payment Terminal
     * ---
     * The transactions are processed by Adyen. Set your Adyen credentials on the related payment method.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_adyen;

    /**
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Main currency of the company.
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $show_line_subtotals_tax_selection Line Subtotals Tax Display
     *        ---
     *        Selection : (default value, usually null)
     *            -> tax_excluded (Tax-Excluded)
     *            -> tax_included (Tax-Included)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $fiscalyear_last_month Fiscalyear Last Month
     *        ---
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
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $account_tax_periodicity Periodicity
     *        ---
     *        Periodicity
     *        ---
     *        Selection : (default value, usually null)
     *            -> trimester (trimester)
     *            -> monthly (monthly)
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param int $account_tax_periodicity_reminder_day Reminder
     *        ---
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
     * @return DateTimeInterface|null
     */
    public function getTaxLockDate(): ?DateTimeInterface
    {
        return $this->tax_lock_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTransferAccountId(): ?OdooRelation
    {
        return $this->transfer_account_id;
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
    public function isModuleAccountPredictiveBills(): ?bool
    {
        return $this->module_account_predictive_bills;
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
     * @param DateTimeInterface|null $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
    }

    /**
     * @param DateTimeInterface|null $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @return string|null
     */
    public function getExtractShowOcrOptionSelection(): ?string
    {
        return $this->extract_show_ocr_option_selection;
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
     * @param string $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(string $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @return string
     */
    public function getFiscalyearLastMonth(): string
    {
        return $this->fiscalyear_last_month;
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
     * @param OdooRelation|null $transfer_account_id
     */
    public function setTransferAccountId(?OdooRelation $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @param string|null $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?string $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @return bool|null
     */
    public function isUseInvoiceTerms(): ?bool
    {
        return $this->use_invoice_terms;
    }

    /**
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
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
     * @return string
     */
    public function getAccountTaxPeriodicity(): string
    {
        return $this->account_tax_periodicity;
    }

    /**
     * @param bool|null $totals_below_sections
     */
    public function setTotalsBelowSections(?bool $totals_below_sections): void
    {
        $this->totals_below_sections = $totals_below_sections;
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
    public function isInvoiceIsSnailmail(): ?bool
    {
        return $this->invoice_is_snailmail;
    }

    /**
     * @return bool|null
     */
    public function isExtractSingleLinePerTax(): ?bool
    {
        return $this->extract_single_line_per_tax;
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
     * @return string|null
     */
    public function getCurrencyIntervalUnit(): ?string
    {
        return $this->currency_interval_unit;
    }

    /**
     * @param bool|null $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(?bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @param bool|null $use_invoice_terms
     */
    public function setUseInvoiceTerms(?bool $use_invoice_terms): void
    {
        $this->use_invoice_terms = $use_invoice_terms;
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
    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    /**
     * @return bool|null
     */
    public function isModuleCurrencyRateLive(): ?bool
    {
        return $this->module_currency_rate_live;
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
    public function isModuleL10nEuService(): ?bool
    {
        return $this->module_l10n_eu_service;
    }

    /**
     * @param bool|null $module_product_margin
     */
    public function setModuleProductMargin(?bool $module_product_margin): void
    {
        $this->module_product_margin = $module_product_margin;
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
     * @param bool|null $module_account_bank_statement_import_camt
     */
    public function setModuleAccountBankStatementImportCamt(
        ?bool $module_account_bank_statement_import_camt
    ): void {
        $this->module_account_bank_statement_import_camt = $module_account_bank_statement_import_camt;
    }

    /**
     * @param bool|null $module_account_taxcloud
     */
    public function setModuleAccountTaxcloud(?bool $module_account_taxcloud): void
    {
        $this->module_account_taxcloud = $module_account_taxcloud;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountBankStatementImportCamt(): ?bool
    {
        return $this->module_account_bank_statement_import_camt;
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
     * @return bool|null
     */
    public function isModuleAccountTaxcloud(): ?bool
    {
        return $this->module_account_taxcloud;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountInvoiceExtract(): ?bool
    {
        return $this->module_account_invoice_extract;
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
    public function isQrCode(): ?bool
    {
        return $this->qr_code;
    }

    /**
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIncotermId(): ?OdooRelation
    {
        return $this->incoterm_id;
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
    public function isInvoiceIsEmail(): ?bool
    {
        return $this->invoice_is_email;
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
     * @param DateTimeInterface|null $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        ?DateTimeInterface $account_bank_reconciliation_start
    ): void {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
    }

    /**
     * @param bool|null $module_account_invoice_extract
     */
    public function setModuleAccountInvoiceExtract(?bool $module_account_invoice_extract): void
    {
        $this->module_account_invoice_extract = $module_account_invoice_extract;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getAccountBankReconciliationStart(): ?DateTimeInterface
    {
        return $this->account_bank_reconciliation_start;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxCashBasisJournalId(): ?OdooRelation
    {
        return $this->tax_cash_basis_journal_id;
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
     * @param OdooRelation|null $account_tax_periodicity_journal_id
     */
    public function setAccountTaxPeriodicityJournalId(
        ?OdooRelation $account_tax_periodicity_journal_id
    ): void {
        $this->account_tax_periodicity_journal_id = $account_tax_periodicity_journal_id;
    }

    /**
     * @param string|null $country_code
     */
    public function setCountryCode(?string $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountYodlee(): ?bool
    {
        return $this->module_account_yodlee;
    }

    /**
     * @param bool|null $module_delivery_dhl
     */
    public function setModuleDeliveryDhl(?bool $module_delivery_dhl): void
    {
        $this->module_delivery_dhl = $module_delivery_dhl;
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
     * @return bool|null
     */
    public function isModuleDeliveryUps(): ?bool
    {
        return $this->module_delivery_ups;
    }

    /**
     * @param bool|null $module_delivery_fedex
     */
    public function setModuleDeliveryFedex(?bool $module_delivery_fedex): void
    {
        $this->module_delivery_fedex = $module_delivery_fedex;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryFedex(): ?bool
    {
        return $this->module_delivery_fedex;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryDhl(): ?bool
    {
        return $this->module_delivery_dhl;
    }

    /**
     * @param bool|null $module_delivery_bpost
     */
    public function setModuleDeliveryBpost(?bool $module_delivery_bpost): void
    {
        $this->module_delivery_bpost = $module_delivery_bpost;
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
     * @param bool|null $module_stock_sms
     */
    public function setModuleStockSms(?bool $module_stock_sms): void
    {
        $this->module_stock_sms = $module_stock_sms;
    }

    /**
     * @return bool|null
     */
    public function isModuleStockSms(): ?bool
    {
        return $this->module_stock_sms;
    }

    /**
     * @param OdooRelation|null $stock_mail_confirmation_template_id
     */
    public function setStockMailConfirmationTemplateId(
        ?OdooRelation $stock_mail_confirmation_template_id
    ): void {
        $this->stock_mail_confirmation_template_id = $stock_mail_confirmation_template_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getStockMailConfirmationTemplateId(): ?OdooRelation
    {
        return $this->stock_mail_confirmation_template_id;
    }

    /**
     * @param bool|null $stock_move_email_validation
     */
    public function setStockMoveEmailValidation(?bool $stock_move_email_validation): void
    {
        $this->stock_move_email_validation = $stock_move_email_validation;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryBpost(): ?bool
    {
        return $this->module_delivery_bpost;
    }

    /**
     * @return bool|null
     */
    public function isModuleDeliveryEasypost(): ?bool
    {
        return $this->module_delivery_easypost;
    }

    /**
     * @param bool|null $module_stock_barcode
     */
    public function setModuleStockBarcode(?bool $module_stock_barcode): void
    {
        $this->module_stock_barcode = $module_stock_barcode;
    }

    /**
     * @return bool|null
     */
    public function isModuleStockLandedCosts(): ?bool
    {
        return $this->module_stock_landed_costs;
    }

    /**
     * @param bool|null $module_pos_adyen
     */
    public function setModulePosAdyen(?bool $module_pos_adyen): void
    {
        $this->module_pos_adyen = $module_pos_adyen;
    }

    /**
     * @return bool|null
     */
    public function isModulePosAdyen(): ?bool
    {
        return $this->module_pos_adyen;
    }

    /**
     * @param bool|null $module_pos_mercury
     */
    public function setModulePosMercury(?bool $module_pos_mercury): void
    {
        $this->module_pos_mercury = $module_pos_mercury;
    }

    /**
     * @return bool|null
     */
    public function isModulePosMercury(): ?bool
    {
        return $this->module_pos_mercury;
    }

    /**
     * @param OdooRelation|null $sale_tax_id
     */
    public function setSaleTaxId(?OdooRelation $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSaleTaxId(): ?OdooRelation
    {
        return $this->sale_tax_id;
    }

    /**
     * @param bool|null $module_stock_landed_costs
     */
    public function setModuleStockLandedCosts(?bool $module_stock_landed_costs): void
    {
        $this->module_stock_landed_costs = $module_stock_landed_costs;
    }

    /**
     * @param OdooRelation|null $stock_sms_confirmation_template_id
     */
    public function setStockSmsConfirmationTemplateId(
        ?OdooRelation $stock_sms_confirmation_template_id
    ): void {
        $this->stock_sms_confirmation_template_id = $stock_sms_confirmation_template_id;
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
    public function getStockSmsConfirmationTemplateId(): ?OdooRelation
    {
        return $this->stock_sms_confirmation_template_id;
    }

    /**
     * @param bool|null $stock_move_sms_validation
     */
    public function setStockMoveSmsValidation(?bool $stock_move_sms_validation): void
    {
        $this->stock_move_sms_validation = $stock_move_sms_validation;
    }

    /**
     * @return bool|null
     */
    public function isStockMoveSmsValidation(): ?bool
    {
        return $this->stock_move_sms_validation;
    }

    /**
     * @param bool|null $group_stock_multi_warehouses
     */
    public function setGroupStockMultiWarehouses(?bool $group_stock_multi_warehouses): void
    {
        $this->group_stock_multi_warehouses = $group_stock_multi_warehouses;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockMultiWarehouses(): ?bool
    {
        return $this->group_stock_multi_warehouses;
    }

    /**
     * @param bool|null $group_stock_multi_locations
     */
    public function setGroupStockMultiLocations(?bool $group_stock_multi_locations): void
    {
        $this->group_stock_multi_locations = $group_stock_multi_locations;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockMultiLocations(): ?bool
    {
        return $this->group_stock_multi_locations;
    }

    /**
     * @return bool|null
     */
    public function isStockMoveEmailValidation(): ?bool
    {
        return $this->stock_move_email_validation;
    }

    /**
     * @return bool|null
     */
    public function isModuleStockBarcode(): ?bool
    {
        return $this->module_stock_barcode;
    }

    /**
     * @return string|null
     */
    public function getAccountCheckPrintingLayout(): ?string
    {
        return $this->account_check_printing_layout;
    }

    /**
     * @param float|null $account_check_printing_margin_left
     */
    public function setAccountCheckPrintingMarginLeft(?float $account_check_printing_margin_left): void
    {
        $this->account_check_printing_margin_left = $account_check_printing_margin_left;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTicCategoryId(): ?OdooRelation
    {
        return $this->tic_category_id;
    }

    /**
     * @param string|null $taxcloud_api_key
     */
    public function setTaxcloudApiKey(?string $taxcloud_api_key): void
    {
        $this->taxcloud_api_key = $taxcloud_api_key;
    }

    /**
     * @return string|null
     */
    public function getTaxcloudApiKey(): ?string
    {
        return $this->taxcloud_api_key;
    }

    /**
     * @param string|null $taxcloud_api_id
     */
    public function setTaxcloudApiId(?string $taxcloud_api_id): void
    {
        $this->taxcloud_api_id = $taxcloud_api_id;
    }

    /**
     * @return string|null
     */
    public function getTaxcloudApiId(): ?string
    {
        return $this->taxcloud_api_id;
    }

    /**
     * @param float|null $account_check_printing_margin_right
     */
    public function setAccountCheckPrintingMarginRight(?float $account_check_printing_margin_right): void
    {
        $this->account_check_printing_margin_right = $account_check_printing_margin_right;
    }

    /**
     * @return float|null
     */
    public function getAccountCheckPrintingMarginRight(): ?float
    {
        return $this->account_check_printing_margin_right;
    }

    /**
     * @return float|null
     */
    public function getAccountCheckPrintingMarginLeft(): ?float
    {
        return $this->account_check_printing_margin_left;
    }

    /**
     * @return bool|null
     */
    public function isVatCheckVies(): ?bool
    {
        return $this->vat_check_vies;
    }

    /**
     * @param float|null $account_check_printing_margin_top
     */
    public function setAccountCheckPrintingMarginTop(?float $account_check_printing_margin_top): void
    {
        $this->account_check_printing_margin_top = $account_check_printing_margin_top;
    }

    /**
     * @return float|null
     */
    public function getAccountCheckPrintingMarginTop(): ?float
    {
        return $this->account_check_printing_margin_top;
    }

    /**
     * @param bool|null $account_check_printing_multi_stub
     */
    public function setAccountCheckPrintingMultiStub(?bool $account_check_printing_multi_stub): void
    {
        $this->account_check_printing_multi_stub = $account_check_printing_multi_stub;
    }

    /**
     * @return bool|null
     */
    public function isAccountCheckPrintingMultiStub(): ?bool
    {
        return $this->account_check_printing_multi_stub;
    }

    /**
     * @param bool|null $account_check_printing_date_label
     */
    public function setAccountCheckPrintingDateLabel(?bool $account_check_printing_date_label): void
    {
        $this->account_check_printing_date_label = $account_check_printing_date_label;
    }

    /**
     * @return bool|null
     */
    public function isAccountCheckPrintingDateLabel(): ?bool
    {
        return $this->account_check_printing_date_label;
    }

    /**
     * @param string|null $account_check_printing_layout
     */
    public function setAccountCheckPrintingLayout(?string $account_check_printing_layout): void
    {
        $this->account_check_printing_layout = $account_check_printing_layout;
    }

    /**
     * @param OdooRelation|null $tic_category_id
     */
    public function setTicCategoryId(?OdooRelation $tic_category_id): void
    {
        $this->tic_category_id = $tic_category_id;
    }

    /**
     * @param bool|null $vat_check_vies
     */
    public function setVatCheckVies(?bool $vat_check_vies): void
    {
        $this->vat_check_vies = $vat_check_vies;
    }

    /**
     * @param bool|null $module_stock_picking_batch
     */
    public function setModuleStockPickingBatch(?bool $module_stock_picking_batch): void
    {
        $this->module_stock_picking_batch = $module_stock_picking_batch;
    }

    /**
     * @param bool|null $group_stock_tracking_lot
     */
    public function setGroupStockTrackingLot(?bool $group_stock_tracking_lot): void
    {
        $this->group_stock_tracking_lot = $group_stock_tracking_lot;
    }

    /**
     * @return bool|null
     */
    public function isModuleStockPickingBatch(): ?bool
    {
        return $this->module_stock_picking_batch;
    }

    /**
     * @param bool|null $group_warning_stock
     */
    public function setGroupWarningStock(?bool $group_warning_stock): void
    {
        $this->group_warning_stock = $group_warning_stock;
    }

    /**
     * @return bool|null
     */
    public function isGroupWarningStock(): ?bool
    {
        return $this->group_warning_stock;
    }

    /**
     * @param bool|null $group_stock_adv_location
     */
    public function setGroupStockAdvLocation(?bool $group_stock_adv_location): void
    {
        $this->group_stock_adv_location = $group_stock_adv_location;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockAdvLocation(): ?bool
    {
        return $this->group_stock_adv_location;
    }

    /**
     * @param bool|null $group_stock_tracking_owner
     */
    public function setGroupStockTrackingOwner(?bool $group_stock_tracking_owner): void
    {
        $this->group_stock_tracking_owner = $group_stock_tracking_owner;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockTrackingOwner(): ?bool
    {
        return $this->group_stock_tracking_owner;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockTrackingLot(): ?bool
    {
        return $this->group_stock_tracking_lot;
    }

    /**
     * @return string|null
     */
    public function getModuleProcurementJit(): ?string
    {
        return $this->module_procurement_jit;
    }

    /**
     * @param bool|null $group_lot_on_delivery_slip
     */
    public function setGroupLotOnDeliverySlip(?bool $group_lot_on_delivery_slip): void
    {
        $this->group_lot_on_delivery_slip = $group_lot_on_delivery_slip;
    }

    /**
     * @return bool|null
     */
    public function isGroupLotOnDeliverySlip(): ?bool
    {
        return $this->group_lot_on_delivery_slip;
    }

    /**
     * @param bool|null $group_stock_production_lot
     */
    public function setGroupStockProductionLot(?bool $group_stock_production_lot): void
    {
        $this->group_stock_production_lot = $group_stock_production_lot;
    }

    /**
     * @return bool|null
     */
    public function isGroupStockProductionLot(): ?bool
    {
        return $this->group_stock_production_lot;
    }

    /**
     * @param bool|null $module_product_expiry
     */
    public function setModuleProductExpiry(?bool $module_product_expiry): void
    {
        $this->module_product_expiry = $module_product_expiry;
    }

    /**
     * @return bool|null
     */
    public function isModuleProductExpiry(): ?bool
    {
        return $this->module_product_expiry;
    }

    /**
     * @param string|null $module_procurement_jit
     */
    public function setModuleProcurementJit(?string $module_procurement_jit): void
    {
        $this->module_procurement_jit = $module_procurement_jit;
    }

    /**
     * @param bool|null $module_account_yodlee
     */
    public function setModuleAccountYodlee(?bool $module_account_yodlee): void
    {
        $this->module_account_yodlee = $module_account_yodlee;
    }

    /**
     * @param bool|null $module_account_plaid
     */
    public function setModuleAccountPlaid(?bool $module_account_plaid): void
    {
        $this->module_account_plaid = $module_account_plaid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $show_effect
     */
    public function setShowEffect(?bool $show_effect): void
    {
        $this->show_effect = $show_effect;
    }

    /**
     * @param int|null $language_count
     */
    public function setLanguageCount(?int $language_count): void
    {
        $this->language_count = $language_count;
    }

    /**
     * @return int|null
     */
    public function getLanguageCount(): ?int
    {
        return $this->language_count;
    }

    /**
     * @param int|null $active_user_count
     */
    public function setActiveUserCount(?int $active_user_count): void
    {
        $this->active_user_count = $active_user_count;
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
     * @return bool|null
     */
    public function isShowEffect(): ?bool
    {
        return $this->show_effect;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExternalReportLayoutId(): ?OdooRelation
    {
        return $this->external_report_layout_id;
    }

    /**
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
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
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @return string|null
     */
    public function getCompanyInformations(): ?string
    {
        return $this->company_informations;
    }

    /**
     * @param bool|null $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(?bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
    }

    /**
     * @return string|null
     */
    public function getUnsplashAccessKey(): ?string
    {
        return $this->unsplash_access_key;
    }

    /**
     * @param OdooRelation|null $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(?OdooRelation $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAuthSignupTemplateUserId(): ?OdooRelation
    {
        return $this->auth_signup_template_user_id;
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
     * @param bool|null $module_ocn_client
     */
    public function setModuleOcnClient(?bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
    }

    /**
     * @param string|null $company_informations
     */
    public function setCompanyInformations(?string $company_informations): void
    {
        $this->company_informations = $company_informations;
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
     * @return string|null
     */
    public function getMapBoxToken(): ?string
    {
        return $this->map_box_token;
    }

    /**
     * @param string|null $alias_domain
     */
    public function setAliasDomain(?string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
    }

    /**
     * @return string|null
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
    }

    /**
     * @param int|null $fail_counter
     */
    public function setFailCounter(?int $fail_counter): void
    {
        $this->fail_counter = $fail_counter;
    }

    /**
     * @return int|null
     */
    public function getFailCounter(): ?int
    {
        return $this->fail_counter;
    }

    /**
     * @return string|null
     */
    public function getReportFooter(): ?string
    {
        return $this->report_footer;
    }

    /**
     * @return bool|null
     */
    public function isModuleBaseGeolocalize(): ?bool
    {
        return $this->module_base_geolocalize;
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleCalendar(): ?bool
    {
        return $this->module_google_calendar;
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
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleDrive(): ?bool
    {
        return $this->module_google_drive;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param bool|null $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
    }

    /**
     * @param bool|null $module_google_drive
     */
    public function setModuleGoogleDrive(?bool $module_google_drive): void
    {
        $this->module_google_drive = $module_google_drive;
    }

    /**
     * @param bool|null $module_partner_autocomplete
     */
    public function setModulePartnerAutocomplete(?bool $module_partner_autocomplete): void
    {
        $this->module_partner_autocomplete = $module_partner_autocomplete;
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
    public function isModulePartnerAutocomplete(): ?bool
    {
        return $this->module_partner_autocomplete;
    }

    /**
     * @param bool|null $module_web_unsplash
     */
    public function setModuleWebUnsplash(?bool $module_web_unsplash): void
    {
        $this->module_web_unsplash = $module_web_unsplash;
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
     * @return bool|null
     */
    public function isModuleInterCompanyRules(): ?bool
    {
        return $this->module_inter_company_rules;
    }

    /**
     * @return bool|null
     */
    public function isModuleGoogleSpreadsheet(): ?bool
    {
        return $this->module_google_spreadsheet;
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
    public function isModuleBaseGengo(): ?bool
    {
        return $this->module_base_gengo;
    }

    /**
     * @param bool|null $module_auth_ldap
     */
    public function setModuleAuthLdap(?bool $module_auth_ldap): void
    {
        $this->module_auth_ldap = $module_auth_ldap;
    }

    /**
     * @return bool|null
     */
    public function isModuleAuthLdap(): ?bool
    {
        return $this->module_auth_ldap;
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
    public function isPartnerAutocompleteInsufficientCredit(): ?bool
    {
        return $this->partner_autocomplete_insufficient_credit;
    }

    /**
     * @return bool|null
     */
    public function isGroupDiscountPerSoLine(): ?bool
    {
        return $this->group_discount_per_so_line;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountPlaid(): ?bool
    {
        return $this->module_account_plaid;
    }

    /**
     * @return bool|null
     */
    public function isGroupAnalyticTags(): ?bool
    {
        return $this->group_analytic_tags;
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
     * @param bool|null $group_analytic_tags
     */
    public function setGroupAnalyticTags(?bool $group_analytic_tags): void
    {
        $this->group_analytic_tags = $group_analytic_tags;
    }

    /**
     * @param bool|null $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(?bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
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
     * @param OdooRelation|null $purchase_tax_id
     */
    public function setPurchaseTaxId(?OdooRelation $purchase_tax_id): void
    {
        $this->purchase_tax_id = $purchase_tax_id;
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
    public function getChartTemplateId(): ?OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccountCheckPrinting(): ?bool
    {
        return $this->module_account_check_printing;
    }

    /**
     * @param bool|null $module_account_sepa_direct_debit
     */
    public function setModuleAccountSepaDirectDebit(?bool $module_account_sepa_direct_debit): void
    {
        $this->module_account_sepa_direct_debit = $module_account_sepa_direct_debit;
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
     * @param OdooRelation|null $chart_template_id
     */
    public function setChartTemplateId(?OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param bool|null $has_chart_of_accounts
     */
    public function setHasChartOfAccounts(?bool $has_chart_of_accounts): void
    {
        $this->has_chart_of_accounts = $has_chart_of_accounts;
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
    public function isGroupStockPackaging(): ?bool
    {
        return $this->group_stock_packaging;
    }

    /**
     * @param string|null $product_pricelist_setting
     */
    public function setProductPricelistSetting(?string $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
    }

    /**
     * @return string|null
     */
    public function getProductPricelistSetting(): ?string
    {
        return $this->product_pricelist_setting;
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
     * @param bool|null $module_sale_product_matrix
     */
    public function setModuleSaleProductMatrix(?bool $module_sale_product_matrix): void
    {
        $this->module_sale_product_matrix = $module_sale_product_matrix;
    }

    /**
     * @param string|null $product_weight_in_lbs
     */
    public function setProductWeightInLbs(?string $product_weight_in_lbs): void
    {
        $this->product_weight_in_lbs = $product_weight_in_lbs;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleProductMatrix(): ?bool
    {
        return $this->module_sale_product_matrix;
    }

    /**
     * @param bool|null $module_sale_product_configurator
     */
    public function setModuleSaleProductConfigurator(?bool $module_sale_product_configurator): void
    {
        $this->module_sale_product_configurator = $module_sale_product_configurator;
    }

    /**
     * @return bool|null
     */
    public function isModuleSaleProductConfigurator(): ?bool
    {
        return $this->module_sale_product_configurator;
    }

    /**
     * @param bool|null $group_product_variant
     */
    public function setGroupProductVariant(?bool $group_product_variant): void
    {
        $this->group_product_variant = $group_product_variant;
    }

    /**
     * @return bool|null
     */
    public function isGroupProductVariant(): ?bool
    {
        return $this->group_product_variant;
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
     * @return string|null
     */
    public function getProductWeightInLbs(): ?string
    {
        return $this->product_weight_in_lbs;
    }

    /**
     * @return string|null
     */
    public function getProductVolumeVolumeInCubicFeet(): ?string
    {
        return $this->product_volume_volume_in_cubic_feet;
    }

    /**
     * @return bool|null
     */
    public function isHasChartOfAccounts(): ?bool
    {
        return $this->has_chart_of_accounts;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDigestId(): ?OdooRelation
    {
        return $this->digest_id;
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
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
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
     * @param bool|null $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
    }

    /**
     * @param string|null $product_volume_volume_in_cubic_feet
     */
    public function setProductVolumeVolumeInCubicFeet(?string $product_volume_volume_in_cubic_feet): void
    {
        $this->product_volume_volume_in_cubic_feet = $product_volume_volume_in_cubic_feet;
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
     * @return bool|null
     */
    public function isSnailmailDuplex(): ?bool
    {
        return $this->snailmail_duplex;
    }

    /**
     * @param bool|null $snailmail_cover
     */
    public function setSnailmailCover(?bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailCover(): ?bool
    {
        return $this->snailmail_cover;
    }

    /**
     * @param bool|null $snailmail_color
     */
    public function setSnailmailColor(?bool $snailmail_color): void
    {
        $this->snailmail_color = $snailmail_color;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailColor(): ?bool
    {
        return $this->snailmail_color;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.settings';
    }
}
