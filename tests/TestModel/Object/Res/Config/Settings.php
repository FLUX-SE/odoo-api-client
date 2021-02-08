<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Res\Config;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
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
     * Allow the users to synchronize their calendar with Outlook Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_microsoft_calendar;

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
    private $module_account_inter_company_rules;

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
     * reCAPTCHA: Easy on Humans, Hard on Bots
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_google_recaptcha;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Report\Paperformat
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Ui\View
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
     * Selection :
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $auth_signup_template_user_id;

    /**
     * Company Working Hours
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Advanced Presence Control
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_presence;

    /**
     * Skills Management
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_skills;

    /**
     * Based on user status in system
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hr_presence_control_login;

    /**
     * Based on number of emails sent
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hr_presence_control_email;

    /**
     * Based on IP Address
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hr_presence_control_ip;

    /**
     * Based on attendances
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_attendance;

    /**
     * # emails to send
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $hr_presence_control_email_amount;

    /**
     * Valid IP addresses
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $hr_presence_control_ip_list;

    /**
     * Employee Editing
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hr_employee_self_edit;

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
     * Selection :
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
     * Selection :
     *     -> 0 (Kilograms)
     *     -> 1 (Pounds)
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
     * Selection :
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
     * Disable link redirection to mobile app
     * ---
     * Check this if dynamic mobile-app detection links cause problems for your installation. This will stop the
     * automatic wrapping of links inside outbound emails. The links will always open in a normal browser, even for
     * users who have the Android/iOS app installed.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $disable_redirect_firebase_dynamic_link;

    /**
     * Push Notifications
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $enable_ocn;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Digest\Digest
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Currency Exchange Journal
     * ---
     * The accounting journal where automatic exchange differences will be registered
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_exchange_journal_id;

    /**
     * Gain Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $expense_currency_exchange_account_id;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Chart\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $chart_template_id;

    /**
     * Default Sale Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sale_tax_id;

    /**
     * Default Purchase Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Tax
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
     * Selection :
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
     * Sale Receipt
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_sale_receipts;

    /**
     * Purchase Receipt
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_show_purchase_receipts;

    /**
     * Line Subtotals Tax Display
     * ---
     * Selection :
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_cash_basis_journal_id;

    /**
     * Base Tax Received Account
     * ---
     * Account that will be set on lines created in cash basis journal entry and used to keep track of the tax base
     * amount.
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_cash_basis_base_account_id;

    /**
     * Display SEPA QR-code
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Incoterms
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
     * Country Code
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
     * French Payroll
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_l10n_fr_hr_payroll;

    /**
     * Belgium Payroll
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_l10n_be_hr_payroll;

    /**
     * Indian Payroll
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_l10n_in_hr_payroll;

    /**
     * Payroll with Accounting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_payroll_account;

    /**
     * Payroll with SEPA payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_payroll_account_sepa;

    /**
     * Check Layout
     * ---
     * Select the format corresponding to the check paper you will be printing your checks on.
     * In order to disable the printing feature, select 'None'.
     * ---
     * Selection :
     *     -> disabled (None)
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
     * This option allows you to print the date label on the check as per CPA.
     * Disable this if your pre-printed check includes the date label.
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
     * Processing Option
     * ---
     * Selection :
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
     * Verify VAT Numbers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $vat_check_vies;

    /**
     * Interval Unit
     * ---
     * Selection :
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
     * Selection :
     *     -> ecb (European Central Bank)
     *     -> fta (Federal Tax Administration (Switzerland))
     *     -> banxico (Mexican Bank)
     *     -> boc (Bank Of Canada)
     *     -> xe_com (xe.com)
     *     -> bnr (National Bank Of Romania)
     *     -> mindicador (Chilean mindicador.cl)
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
     * Plafond de la Securite Sociale
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $plafond_secu;

    /**
     * Nombre d'employes
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $nombre_employes;

    /**
     * Cotisation Patronale Prevoyance
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $cotisation_prevoyance;

    /**
     * Organisme de securite sociale
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $org_ss;

    /**
     * Convention collective
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $conv_coll;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Main currency of the company.
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $show_line_subtotals_tax_selection Line Subtotals Tax Display
     *        ---
     *        Selection :
     *            -> tax_excluded (Tax-Excluded)
     *            -> tax_included (Tax-Included)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $company_id,
        OdooRelation $currency_id,
        string $show_line_subtotals_tax_selection
    ) {
        $this->company_id = $company_id;
        $this->currency_id = $currency_id;
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_currency_rate_live")
     */
    public function isModuleCurrencyRateLive(): ?bool
    {
        return $this->module_currency_rate_live;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_sepa_direct_debit")
     */
    public function isModuleAccountSepaDirectDebit(): ?bool
    {
        return $this->module_account_sepa_direct_debit;
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
     *
     * @SerializedName("module_account_plaid")
     */
    public function isModuleAccountPlaid(): ?bool
    {
        return $this->module_account_plaid;
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
     *
     * @SerializedName("module_account_yodlee")
     */
    public function isModuleAccountYodlee(): ?bool
    {
        return $this->module_account_yodlee;
    }

    /**
     * @param bool|null $module_account_yodlee
     */
    public function setModuleAccountYodlee(?bool $module_account_yodlee): void
    {
        $this->module_account_yodlee = $module_account_yodlee;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_bank_statement_import_qif")
     */
    public function isModuleAccountBankStatementImportQif(): ?bool
    {
        return $this->module_account_bank_statement_import_qif;
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
     *
     * @SerializedName("module_account_bank_statement_import_ofx")
     */
    public function isModuleAccountBankStatementImportOfx(): ?bool
    {
        return $this->module_account_bank_statement_import_ofx;
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
     *
     * @SerializedName("module_account_bank_statement_import_csv")
     */
    public function isModuleAccountBankStatementImportCsv(): ?bool
    {
        return $this->module_account_bank_statement_import_csv;
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
     *
     * @SerializedName("module_account_bank_statement_import_camt")
     */
    public function isModuleAccountBankStatementImportCamt(): ?bool
    {
        return $this->module_account_bank_statement_import_camt;
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
     * @param bool|null $module_currency_rate_live
     */
    public function setModuleCurrencyRateLive(?bool $module_currency_rate_live): void
    {
        $this->module_currency_rate_live = $module_currency_rate_live;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_sepa")
     */
    public function isModuleAccountSepa(): ?bool
    {
        return $this->module_account_sepa;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_invoice_extract")
     */
    public function isModuleAccountInvoiceExtract(): ?bool
    {
        return $this->module_account_invoice_extract;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_cash_basis_journal_id")
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
     *
     * @SerializedName("tax_exigibility")
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
     *
     * @SerializedName("module_snailmail_account")
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
     * @param bool|null $module_account_taxcloud
     */
    public function setModuleAccountTaxcloud(?bool $module_account_taxcloud): void
    {
        $this->module_account_taxcloud = $module_account_taxcloud;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_intrastat")
     */
    public function isModuleAccountIntrastat(): ?bool
    {
        return $this->module_account_intrastat;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_taxcloud")
     */
    public function isModuleAccountTaxcloud(): ?bool
    {
        return $this->module_account_taxcloud;
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
     *
     * @SerializedName("module_l10n_eu_service")
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
     *
     * @SerializedName("module_product_margin")
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
     * @param bool|null $module_account_sepa
     */
    public function setModuleAccountSepa(?bool $module_account_sepa): void
    {
        $this->module_account_sepa = $module_account_sepa;
    }

    /**
     * @param bool|null $module_account_batch_payment
     */
    public function setModuleAccountBatchPayment(?bool $module_account_batch_payment): void
    {
        $this->module_account_batch_payment = $module_account_batch_payment;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_cash_basis_base_account_id")
     */
    public function getAccountCashBasisBaseAccountId(): ?OdooRelation
    {
        return $this->account_cash_basis_base_account_id;
    }

    /**
     * @param bool|null $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(?bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
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
     *
     * @SerializedName("group_cash_rounding")
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
     *
     * @SerializedName("group_warning_account")
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
     * @return bool|null
     *
     * @SerializedName("group_analytic_tags")
     */
    public function isGroupAnalyticTags(): ?bool
    {
        return $this->group_analytic_tags;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_analytic_accounting")
     */
    public function isGroupAnalyticAccounting(): ?bool
    {
        return $this->group_analytic_accounting;
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
     * @param bool|null $module_account_accountant
     */
    public function setModuleAccountAccountant(?bool $module_account_accountant): void
    {
        $this->module_account_accountant = $module_account_accountant;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_accountant")
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
     *
     * @SerializedName("tax_calculation_rounding_method")
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
     *
     * @SerializedName("purchase_tax_id")
     */
    public function getPurchaseTaxId(): ?OdooRelation
    {
        return $this->purchase_tax_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_show_line_subtotals_tax_excluded")
     */
    public function isGroupShowLineSubtotalsTaxExcluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_excluded;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_show_line_subtotals_tax_included")
     */
    public function isGroupShowLineSubtotalsTaxIncluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_included;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_batch_payment")
     */
    public function isModuleAccountBatchPayment(): ?bool
    {
        return $this->module_account_batch_payment;
    }

    /**
     * @param bool|null $module_account_budget
     */
    public function setModuleAccountBudget(?bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
    }

    /**
     * @param bool|null $module_account_check_printing
     */
    public function setModuleAccountCheckPrinting(?bool $module_account_check_printing): void
    {
        $this->module_account_check_printing = $module_account_check_printing;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_check_printing")
     */
    public function isModuleAccountCheckPrinting(): ?bool
    {
        return $this->module_account_check_printing;
    }

    /**
     * @param bool|null $module_account_reports
     */
    public function setModuleAccountReports(?bool $module_account_reports): void
    {
        $this->module_account_reports = $module_account_reports;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_reports")
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
     *
     * @SerializedName("module_account_payment")
     */
    public function isModuleAccountPayment(): ?bool
    {
        return $this->module_account_payment;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_budget")
     */
    public function isModuleAccountBudget(): ?bool
    {
        return $this->module_account_budget;
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
     * @param string $show_line_subtotals_tax_selection
     */
    public function setShowLineSubtotalsTaxSelection(string $show_line_subtotals_tax_selection): void
    {
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
    }

    /**
     * @return string
     *
     * @SerializedName("show_line_subtotals_tax_selection")
     */
    public function getShowLineSubtotalsTaxSelection(): string
    {
        return $this->show_line_subtotals_tax_selection;
    }

    /**
     * @param bool|null $group_show_purchase_receipts
     */
    public function setGroupShowPurchaseReceipts(?bool $group_show_purchase_receipts): void
    {
        $this->group_show_purchase_receipts = $group_show_purchase_receipts;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_show_purchase_receipts")
     */
    public function isGroupShowPurchaseReceipts(): ?bool
    {
        return $this->group_show_purchase_receipts;
    }

    /**
     * @param bool|null $group_show_sale_receipts
     */
    public function setGroupShowSaleReceipts(?bool $group_show_sale_receipts): void
    {
        $this->group_show_sale_receipts = $group_show_sale_receipts;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_show_sale_receipts")
     */
    public function isGroupShowSaleReceipts(): ?bool
    {
        return $this->group_show_sale_receipts;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @param OdooRelation|null $account_cash_basis_base_account_id
     */
    public function setAccountCashBasisBaseAccountId(
        ?OdooRelation $account_cash_basis_base_account_id
    ): void {
        $this->account_cash_basis_base_account_id = $account_cash_basis_base_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_tax_id")
     */
    public function getSaleTaxId(): ?OdooRelation
    {
        return $this->sale_tax_id;
    }

    /**
     * @param float|null $plafond_secu
     */
    public function setPlafondSecu(?float $plafond_secu): void
    {
        $this->plafond_secu = $plafond_secu;
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
     *
     * @SerializedName("extract_single_line_per_tax")
     */
    public function isExtractSingleLinePerTax(): ?bool
    {
        return $this->extract_single_line_per_tax;
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
     *
     * @SerializedName("vat_check_vies")
     */
    public function isVatCheckVies(): ?bool
    {
        return $this->vat_check_vies;
    }

    /**
     * @param bool|null $vat_check_vies
     */
    public function setVatCheckVies(?bool $vat_check_vies): void
    {
        $this->vat_check_vies = $vat_check_vies;
    }

    /**
     * @return string|null
     *
     * @SerializedName("currency_interval_unit")
     */
    public function getCurrencyIntervalUnit(): ?string
    {
        return $this->currency_interval_unit;
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
     *
     * @SerializedName("currency_provider")
     */
    public function getCurrencyProvider(): ?string
    {
        return $this->currency_provider;
    }

    /**
     * @param string|null $currency_provider
     */
    public function setCurrencyProvider(?string $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("currency_next_execution_date")
     */
    public function getCurrencyNextExecutionDate(): ?DateTimeInterface
    {
        return $this->currency_next_execution_date;
    }

    /**
     * @param DateTimeInterface|null $currency_next_execution_date
     */
    public function setCurrencyNextExecutionDate(?DateTimeInterface $currency_next_execution_date): void
    {
        $this->currency_next_execution_date = $currency_next_execution_date;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("invoice_is_snailmail")
     */
    public function isInvoiceIsSnailmail(): ?bool
    {
        return $this->invoice_is_snailmail;
    }

    /**
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
    }

    /**
     * @return float|null
     *
     * @SerializedName("plafond_secu")
     */
    public function getPlafondSecu(): ?float
    {
        return $this->plafond_secu;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nombre_employes")
     */
    public function getNombreEmployes(): ?int
    {
        return $this->nombre_employes;
    }

    /**
     * @param float|null $account_check_printing_margin_right
     */
    public function setAccountCheckPrintingMarginRight(?float $account_check_printing_margin_right): void
    {
        $this->account_check_printing_margin_right = $account_check_printing_margin_right;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param int|null $nombre_employes
     */
    public function setNombreEmployes(?int $nombre_employes): void
    {
        $this->nombre_employes = $nombre_employes;
    }

    /**
     * @param string|null $conv_coll
     */
    public function setConvColl(?string $conv_coll): void
    {
        $this->conv_coll = $conv_coll;
    }

    /**
     * @return string|null
     *
     * @SerializedName("conv_coll")
     */
    public function getConvColl(): ?string
    {
        return $this->conv_coll;
    }

    /**
     * @param string|null $org_ss
     */
    public function setOrgSs(?string $org_ss): void
    {
        $this->org_ss = $org_ss;
    }

    /**
     * @return string|null
     *
     * @SerializedName("org_ss")
     */
    public function getOrgSs(): ?string
    {
        return $this->org_ss;
    }

    /**
     * @param float|null $cotisation_prevoyance
     */
    public function setCotisationPrevoyance(?float $cotisation_prevoyance): void
    {
        $this->cotisation_prevoyance = $cotisation_prevoyance;
    }

    /**
     * @return float|null
     *
     * @SerializedName("cotisation_prevoyance")
     */
    public function getCotisationPrevoyance(): ?float
    {
        return $this->cotisation_prevoyance;
    }

    /**
     * @return string|null
     *
     * @SerializedName("extract_show_ocr_option_selection")
     */
    public function getExtractShowOcrOptionSelection(): ?string
    {
        return $this->extract_show_ocr_option_selection;
    }

    /**
     * @return float|null
     *
     * @SerializedName("account_check_printing_margin_right")
     */
    public function getAccountCheckPrintingMarginRight(): ?float
    {
        return $this->account_check_printing_margin_right;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("qr_code")
     */
    public function isQrCode(): ?bool
    {
        return $this->qr_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_terms")
     */
    public function getInvoiceTerms(): ?string
    {
        return $this->invoice_terms;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_l10n_fr_hr_payroll")
     */
    public function isModuleL10nFrHrPayroll(): ?bool
    {
        return $this->module_l10n_fr_hr_payroll;
    }

    /**
     * @param string|null $country_code
     */
    public function setCountryCode(?string $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("country_code")
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
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
     *
     * @SerializedName("use_invoice_terms")
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
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_l10n_be_hr_payroll")
     */
    public function isModuleL10nBeHrPayroll(): ?bool
    {
        return $this->module_l10n_be_hr_payroll;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("incoterm_id")
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
     *
     * @SerializedName("invoice_is_email")
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
     *
     * @SerializedName("invoice_is_print")
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
     * @param bool|null $module_l10n_fr_hr_payroll
     */
    public function setModuleL10nFrHrPayroll(?bool $module_l10n_fr_hr_payroll): void
    {
        $this->module_l10n_fr_hr_payroll = $module_l10n_fr_hr_payroll;
    }

    /**
     * @param bool|null $module_l10n_be_hr_payroll
     */
    public function setModuleL10nBeHrPayroll(?bool $module_l10n_be_hr_payroll): void
    {
        $this->module_l10n_be_hr_payroll = $module_l10n_be_hr_payroll;
    }

    /**
     * @param float|null $account_check_printing_margin_left
     */
    public function setAccountCheckPrintingMarginLeft(?float $account_check_printing_margin_left): void
    {
        $this->account_check_printing_margin_left = $account_check_printing_margin_left;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("account_check_printing_date_label")
     */
    public function isAccountCheckPrintingDateLabel(): ?bool
    {
        return $this->account_check_printing_date_label;
    }

    /**
     * @return float|null
     *
     * @SerializedName("account_check_printing_margin_left")
     */
    public function getAccountCheckPrintingMarginLeft(): ?float
    {
        return $this->account_check_printing_margin_left;
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
     *
     * @SerializedName("account_check_printing_margin_top")
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
     *
     * @SerializedName("account_check_printing_multi_stub")
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
     * @param string|null $account_check_printing_layout
     */
    public function setAccountCheckPrintingLayout(?string $account_check_printing_layout): void
    {
        $this->account_check_printing_layout = $account_check_printing_layout;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_l10n_in_hr_payroll")
     */
    public function isModuleL10nInHrPayroll(): ?bool
    {
        return $this->module_l10n_in_hr_payroll;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_check_printing_layout")
     */
    public function getAccountCheckPrintingLayout(): ?string
    {
        return $this->account_check_printing_layout;
    }

    /**
     * @param bool|null $module_hr_payroll_account_sepa
     */
    public function setModuleHrPayrollAccountSepa(?bool $module_hr_payroll_account_sepa): void
    {
        $this->module_hr_payroll_account_sepa = $module_hr_payroll_account_sepa;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_payroll_account_sepa")
     */
    public function isModuleHrPayrollAccountSepa(): ?bool
    {
        return $this->module_hr_payroll_account_sepa;
    }

    /**
     * @param bool|null $module_hr_payroll_account
     */
    public function setModuleHrPayrollAccount(?bool $module_hr_payroll_account): void
    {
        $this->module_hr_payroll_account = $module_hr_payroll_account;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_payroll_account")
     */
    public function isModuleHrPayrollAccount(): ?bool
    {
        return $this->module_hr_payroll_account;
    }

    /**
     * @param bool|null $module_l10n_in_hr_payroll
     */
    public function setModuleL10nInHrPayroll(?bool $module_l10n_in_hr_payroll): void
    {
        $this->module_l10n_in_hr_payroll = $module_l10n_in_hr_payroll;
    }

    /**
     * @param OdooRelation|null $sale_tax_id
     */
    public function setSaleTaxId(?OdooRelation $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
    }

    /**
     * @param OdooRelation|null $chart_template_id
     */
    public function setChartTemplateId(?OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param int|null $language_count
     */
    public function setLanguageCount(?int $language_count): void
    {
        $this->language_count = $language_count;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_multi_currency")
     */
    public function isGroupMultiCurrency(): ?bool
    {
        return $this->group_multi_currency;
    }

    /**
     * @param bool|null $group_multi_currency
     */
    public function setGroupMultiCurrency(?bool $group_multi_currency): void
    {
        $this->group_multi_currency = $group_multi_currency;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("paperformat_id")
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
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
     *
     * @SerializedName("external_report_layout_id")
     */
    public function getExternalReportLayoutId(): ?OdooRelation
    {
        return $this->external_report_layout_id;
    }

    /**
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_effect")
     */
    public function isShowEffect(): ?bool
    {
        return $this->show_effect;
    }

    /**
     * @param bool|null $show_effect
     */
    public function setShowEffect(?bool $show_effect): void
    {
        $this->show_effect = $show_effect;
    }

    /**
     * @return int|null
     *
     * @SerializedName("company_count")
     */
    public function getCompanyCount(): ?int
    {
        return $this->company_count;
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
     *
     * @SerializedName("active_user_count")
     */
    public function getActiveUserCount(): ?int
    {
        return $this->active_user_count;
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
     *
     * @SerializedName("language_count")
     */
    public function getLanguageCount(): ?int
    {
        return $this->language_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("company_name")
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param bool|null $module_google_recaptcha
     */
    public function setModuleGoogleRecaptcha(?bool $module_google_recaptcha): void
    {
        $this->module_google_recaptcha = $module_google_recaptcha;
    }

    /**
     * @param string|null $map_box_token
     */
    public function setMapBoxToken(?string $map_box_token): void
    {
        $this->map_box_token = $map_box_token;
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
     *
     * @SerializedName("auth_signup_uninvited")
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
     *
     * @SerializedName("auth_signup_reset_password")
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
     *
     * @SerializedName("unsplash_access_key")
     */
    public function getUnsplashAccessKey(): ?string
    {
        return $this->unsplash_access_key;
    }

    /**
     * @return string|null
     *
     * @SerializedName("map_box_token")
     */
    public function getMapBoxToken(): ?string
    {
        return $this->map_box_token;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
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
     *
     * @SerializedName("alias_domain")
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
     *
     * @SerializedName("fail_counter")
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
     *
     * @SerializedName("company_informations")
     */
    public function getCompanyInformations(): ?string
    {
        return $this->company_informations;
    }

    /**
     * @return string|null
     *
     * @SerializedName("report_footer")
     */
    public function getReportFooter(): ?string
    {
        return $this->report_footer;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_google_recaptcha")
     */
    public function isModuleGoogleRecaptcha(): ?bool
    {
        return $this->module_google_recaptcha;
    }

    /**
     * @param OdooRelation|null $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(?OdooRelation $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_google_calendar")
     */
    public function isModuleGoogleCalendar(): ?bool
    {
        return $this->module_google_calendar;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_google_spreadsheet")
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
     *
     * @SerializedName("module_google_drive")
     */
    public function isModuleGoogleDrive(): ?bool
    {
        return $this->module_google_drive;
    }

    /**
     * @param bool|null $module_microsoft_calendar
     */
    public function setModuleMicrosoftCalendar(?bool $module_microsoft_calendar): void
    {
        $this->module_microsoft_calendar = $module_microsoft_calendar;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_microsoft_calendar")
     */
    public function isModuleMicrosoftCalendar(): ?bool
    {
        return $this->module_microsoft_calendar;
    }

    /**
     * @param bool|null $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
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
     *
     * @SerializedName("module_auth_oauth")
     */
    public function isModuleAuthOauth(): ?bool
    {
        return $this->module_auth_oauth;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_base_import")
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
     *
     * @SerializedName("external_email_server_default")
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
     *
     * @SerializedName("user_default_rights")
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
     * @param bool|null $module_google_spreadsheet
     */
    public function setModuleGoogleSpreadsheet(?bool $module_google_spreadsheet): void
    {
        $this->module_google_spreadsheet = $module_google_spreadsheet;
    }

    /**
     * @param bool|null $module_auth_oauth
     */
    public function setModuleAuthOauth(?bool $module_auth_oauth): void
    {
        $this->module_auth_oauth = $module_auth_oauth;
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
     *
     * @SerializedName("module_voip")
     */
    public function isModuleVoip(): ?bool
    {
        return $this->module_voip;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_base_geolocalize")
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
     * @return bool|null
     *
     * @SerializedName("module_partner_autocomplete")
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
     *
     * @SerializedName("module_web_unsplash")
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
     * @param bool|null $module_pad
     */
    public function setModulePad(?bool $module_pad): void
    {
        $this->module_pad = $module_pad;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_auth_ldap")
     */
    public function isModuleAuthLdap(): ?bool
    {
        return $this->module_auth_ldap;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_pad")
     */
    public function isModulePad(): ?bool
    {
        return $this->module_pad;
    }

    /**
     * @param bool|null $module_account_inter_company_rules
     */
    public function setModuleAccountInterCompanyRules(?bool $module_account_inter_company_rules): void
    {
        $this->module_account_inter_company_rules = $module_account_inter_company_rules;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_inter_company_rules")
     */
    public function isModuleAccountInterCompanyRules(): ?bool
    {
        return $this->module_account_inter_company_rules;
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
     *
     * @SerializedName("module_base_gengo")
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
     * @return OdooRelation|null
     *
     * @SerializedName("auth_signup_template_user_id")
     */
    public function getAuthSignupTemplateUserId(): ?OdooRelation
    {
        return $this->auth_signup_template_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("chart_template_id")
     */
    public function getChartTemplateId(): ?OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @param bool|null $enable_ocn
     */
    public function setEnableOcn(?bool $enable_ocn): void
    {
        $this->enable_ocn = $enable_ocn;
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
     *
     * @SerializedName("snailmail_cover")
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
     *
     * @SerializedName("snailmail_color")
     */
    public function isSnailmailColor(): ?bool
    {
        return $this->snailmail_color;
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
     *
     * @SerializedName("partner_autocomplete_insufficient_credit")
     */
    public function isPartnerAutocompleteInsufficientCredit(): ?bool
    {
        return $this->partner_autocomplete_insufficient_credit;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("enable_ocn")
     */
    public function isEnableOcn(): ?bool
    {
        return $this->enable_ocn;
    }

    /**
     * @param bool|null $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
    }

    /**
     * @param bool|null $disable_redirect_firebase_dynamic_link
     */
    public function setDisableRedirectFirebaseDynamicLink(
        ?bool $disable_redirect_firebase_dynamic_link
    ): void {
        $this->disable_redirect_firebase_dynamic_link = $disable_redirect_firebase_dynamic_link;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("disable_redirect_firebase_dynamic_link")
     */
    public function isDisableRedirectFirebaseDynamicLink(): ?bool
    {
        return $this->disable_redirect_firebase_dynamic_link;
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
     *
     * @SerializedName("product_volume_volume_in_cubic_feet")
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
     *
     * @SerializedName("product_weight_in_lbs")
     */
    public function getProductWeightInLbs(): ?string
    {
        return $this->product_weight_in_lbs;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("snailmail_duplex")
     */
    public function isSnailmailDuplex(): ?bool
    {
        return $this->snailmail_duplex;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("digest_emails")
     */
    public function isDigestEmails(): ?bool
    {
        return $this->digest_emails;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_pricelist_setting")
     */
    public function getProductPricelistSetting(): ?string
    {
        return $this->product_pricelist_setting;
    }

    /**
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
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
     *
     * @SerializedName("has_chart_of_accounts")
     */
    public function isHasChartOfAccounts(): ?bool
    {
        return $this->has_chart_of_accounts;
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
     *
     * @SerializedName("expense_currency_exchange_account_id")
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
     *
     * @SerializedName("income_currency_exchange_account_id")
     */
    public function getIncomeCurrencyExchangeAccountId(): ?OdooRelation
    {
        return $this->income_currency_exchange_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_exchange_journal_id")
     */
    public function getCurrencyExchangeJournalId(): ?OdooRelation
    {
        return $this->currency_exchange_journal_id;
    }

    /**
     * @param bool|null $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
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
     *
     * @SerializedName("currency_id")
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
     *
     * @SerializedName("has_accounting_entries")
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
     *
     * @SerializedName("digest_id")
     */
    public function getDigestId(): ?OdooRelation
    {
        return $this->digest_id;
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
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param bool|null $hr_presence_control_email
     */
    public function setHrPresenceControlEmail(?bool $hr_presence_control_email): void
    {
        $this->hr_presence_control_email = $hr_presence_control_email;
    }

    /**
     * @param int|null $hr_presence_control_email_amount
     */
    public function setHrPresenceControlEmailAmount(?int $hr_presence_control_email_amount): void
    {
        $this->hr_presence_control_email_amount = $hr_presence_control_email_amount;
    }

    /**
     * @return int|null
     *
     * @SerializedName("hr_presence_control_email_amount")
     */
    public function getHrPresenceControlEmailAmount(): ?int
    {
        return $this->hr_presence_control_email_amount;
    }

    /**
     * @param bool|null $module_hr_attendance
     */
    public function setModuleHrAttendance(?bool $module_hr_attendance): void
    {
        $this->module_hr_attendance = $module_hr_attendance;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_attendance")
     */
    public function isModuleHrAttendance(): ?bool
    {
        return $this->module_hr_attendance;
    }

    /**
     * @param bool|null $hr_presence_control_ip
     */
    public function setHrPresenceControlIp(?bool $hr_presence_control_ip): void
    {
        $this->hr_presence_control_ip = $hr_presence_control_ip;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hr_presence_control_ip")
     */
    public function isHrPresenceControlIp(): ?bool
    {
        return $this->hr_presence_control_ip;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hr_presence_control_email")
     */
    public function isHrPresenceControlEmail(): ?bool
    {
        return $this->hr_presence_control_email;
    }

    /**
     * @param string|null $hr_presence_control_ip_list
     */
    public function setHrPresenceControlIpList(?string $hr_presence_control_ip_list): void
    {
        $this->hr_presence_control_ip_list = $hr_presence_control_ip_list;
    }

    /**
     * @param bool|null $hr_presence_control_login
     */
    public function setHrPresenceControlLogin(?bool $hr_presence_control_login): void
    {
        $this->hr_presence_control_login = $hr_presence_control_login;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hr_presence_control_login")
     */
    public function isHrPresenceControlLogin(): ?bool
    {
        return $this->hr_presence_control_login;
    }

    /**
     * @param bool|null $module_hr_skills
     */
    public function setModuleHrSkills(?bool $module_hr_skills): void
    {
        $this->module_hr_skills = $module_hr_skills;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_skills")
     */
    public function isModuleHrSkills(): ?bool
    {
        return $this->module_hr_skills;
    }

    /**
     * @param bool|null $module_hr_presence
     */
    public function setModuleHrPresence(?bool $module_hr_presence): void
    {
        $this->module_hr_presence = $module_hr_presence;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_presence")
     */
    public function isModuleHrPresence(): ?bool
    {
        return $this->module_hr_presence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("hr_presence_control_ip_list")
     */
    public function getHrPresenceControlIpList(): ?string
    {
        return $this->hr_presence_control_ip_list;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hr_employee_self_edit")
     */
    public function isHrEmployeeSelfEdit(): ?bool
    {
        return $this->hr_employee_self_edit;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_sale_pricelist")
     */
    public function isGroupSalePricelist(): ?bool
    {
        return $this->group_sale_pricelist;
    }

    /**
     * @param bool|null $module_sale_product_configurator
     */
    public function setModuleSaleProductConfigurator(?bool $module_sale_product_configurator): void
    {
        $this->module_sale_product_configurator = $module_sale_product_configurator;
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
     *
     * @SerializedName("group_product_pricelist")
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
     *
     * @SerializedName("group_stock_packaging")
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
     *
     * @SerializedName("module_sale_product_matrix")
     */
    public function isModuleSaleProductMatrix(): ?bool
    {
        return $this->module_sale_product_matrix;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_sale_product_configurator")
     */
    public function isModuleSaleProductConfigurator(): ?bool
    {
        return $this->module_sale_product_configurator;
    }

    /**
     * @param bool|null $hr_employee_self_edit
     */
    public function setHrEmployeeSelfEdit(?bool $hr_employee_self_edit): void
    {
        $this->hr_employee_self_edit = $hr_employee_self_edit;
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
     *
     * @SerializedName("group_product_variant")
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
     *
     * @SerializedName("group_uom")
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
     *
     * @SerializedName("group_discount_per_so_line")
     */
    public function isGroupDiscountPerSoLine(): ?bool
    {
        return $this->group_discount_per_so_line;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.settings';
    }
}
