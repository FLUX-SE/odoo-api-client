<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Config;

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
     * @SerializedName("module_account_bank_statement_import_csv")
     */
    public function isModuleAccountBankStatementImportCsv(): ?bool
    {
        return $this->module_account_bank_statement_import_csv;
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
     * @param bool|null $module_account_bank_statement_import_csv
     */
    public function setModuleAccountBankStatementImportCsv(
        ?bool $module_account_bank_statement_import_csv
    ): void {
        $this->module_account_bank_statement_import_csv = $module_account_bank_statement_import_csv;
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
     * @return bool|null
     *
     * @SerializedName("module_currency_rate_live")
     */
    public function isModuleCurrencyRateLive(): ?bool
    {
        return $this->module_currency_rate_live;
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
     * @SerializedName("module_account_intrastat")
     */
    public function isModuleAccountIntrastat(): ?bool
    {
        return $this->module_account_intrastat;
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
     *
     * @SerializedName("module_product_margin")
     */
    public function isModuleProductMargin(): ?bool
    {
        return $this->module_product_margin;
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
     * @SerializedName("module_l10n_eu_service")
     */
    public function isModuleL10nEuService(): ?bool
    {
        return $this->module_l10n_eu_service;
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
     * @SerializedName("module_account_taxcloud")
     */
    public function isModuleAccountTaxcloud(): ?bool
    {
        return $this->module_account_taxcloud;
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
     * @SerializedName("module_account_sepa")
     */
    public function isModuleAccountSepa(): ?bool
    {
        return $this->module_account_sepa;
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
     * @param bool|null $module_account_invoice_extract
     */
    public function setModuleAccountInvoiceExtract(?bool $module_account_invoice_extract): void
    {
        $this->module_account_invoice_extract = $module_account_invoice_extract;
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
     *
     * @SerializedName("module_account_accountant")
     */
    public function isModuleAccountAccountant(): ?bool
    {
        return $this->module_account_accountant;
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
     * @SerializedName("group_analytic_accounting")
     */
    public function isGroupAnalyticAccounting(): ?bool
    {
        return $this->group_analytic_accounting;
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
     *
     * @SerializedName("group_analytic_tags")
     */
    public function isGroupAnalyticTags(): ?bool
    {
        return $this->group_analytic_tags;
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
     * @SerializedName("group_warning_account")
     */
    public function isGroupWarningAccount(): ?bool
    {
        return $this->group_warning_account;
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
     * @SerializedName("group_cash_rounding")
     */
    public function isGroupCashRounding(): ?bool
    {
        return $this->group_cash_rounding;
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
     * @SerializedName("group_fiscal_year")
     */
    public function isGroupFiscalYear(): ?bool
    {
        return $this->group_fiscal_year;
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
     * @param bool|null $module_account_check_printing
     */
    public function setModuleAccountCheckPrinting(?bool $module_account_check_printing): void
    {
        $this->module_account_check_printing = $module_account_check_printing;
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
     *
     * @SerializedName("group_show_line_subtotals_tax_included")
     */
    public function isGroupShowLineSubtotalsTaxIncluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_included;
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
     * @return string
     *
     * @SerializedName("show_line_subtotals_tax_selection")
     */
    public function getShowLineSubtotalsTaxSelection(): string
    {
        return $this->show_line_subtotals_tax_selection;
    }

    /**
     * @param string $show_line_subtotals_tax_selection
     */
    public function setShowLineSubtotalsTaxSelection(string $show_line_subtotals_tax_selection): void
    {
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
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
     * @param bool|null $module_account_budget
     */
    public function setModuleAccountBudget(?bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
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
     * @param bool|null $module_account_payment
     */
    public function setModuleAccountPayment(?bool $module_account_payment): void
    {
        $this->module_account_payment = $module_account_payment;
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
     * @param bool|null $module_account_reports
     */
    public function setModuleAccountReports(?bool $module_account_reports): void
    {
        $this->module_account_reports = $module_account_reports;
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
     * @return bool|null
     *
     * @SerializedName("module_account_invoice_extract")
     */
    public function isModuleAccountInvoiceExtract(): ?bool
    {
        return $this->module_account_invoice_extract;
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
     * @return string|null
     *
     * @SerializedName("tax_calculation_rounding_method")
     */
    public function getTaxCalculationRoundingMethod(): ?string
    {
        return $this->tax_calculation_rounding_method;
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
     * @return string|null
     *
     * @SerializedName("country_code")
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
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
     * @SerializedName("account_check_printing_layout")
     */
    public function getAccountCheckPrintingLayout(): ?string
    {
        return $this->account_check_printing_layout;
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
     * @SerializedName("account_check_printing_date_label")
     */
    public function isAccountCheckPrintingDateLabel(): ?bool
    {
        return $this->account_check_printing_date_label;
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
     *
     * @SerializedName("account_check_printing_multi_stub")
     */
    public function isAccountCheckPrintingMultiStub(): ?bool
    {
        return $this->account_check_printing_multi_stub;
    }

    /**
     * @param bool|null $account_check_printing_multi_stub
     */
    public function setAccountCheckPrintingMultiStub(?bool $account_check_printing_multi_stub): void
    {
        $this->account_check_printing_multi_stub = $account_check_printing_multi_stub;
    }

    /**
     * @param float|null $account_check_printing_margin_top
     */
    public function setAccountCheckPrintingMarginTop(?float $account_check_printing_margin_top): void
    {
        $this->account_check_printing_margin_top = $account_check_printing_margin_top;
    }

    /**
     * @param string|null $currency_provider
     */
    public function setCurrencyProvider(?string $currency_provider): void
    {
        $this->currency_provider = $currency_provider;
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
     * @param float|null $account_check_printing_margin_left
     */
    public function setAccountCheckPrintingMarginLeft(?float $account_check_printing_margin_left): void
    {
        $this->account_check_printing_margin_left = $account_check_printing_margin_left;
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
     * @param float|null $account_check_printing_margin_right
     */
    public function setAccountCheckPrintingMarginRight(?float $account_check_printing_margin_right): void
    {
        $this->account_check_printing_margin_right = $account_check_printing_margin_right;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @return string|null
     *
     * @SerializedName("currency_provider")
     */
    public function getCurrencyProvider(): ?string
    {
        return $this->currency_provider;
    }

    /**
     * @param bool|null $module_snailmail_account
     */
    public function setModuleSnailmailAccount(?bool $module_snailmail_account): void
    {
        $this->module_snailmail_account = $module_snailmail_account;
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
     * @SerializedName("tax_exigibility")
     */
    public function isTaxExigibility(): ?bool
    {
        return $this->tax_exigibility;
    }

    /**
     * @param bool|null $tax_exigibility
     */
    public function setTaxExigibility(?bool $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
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
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("account_bank_reconciliation_start")
     */
    public function getAccountBankReconciliationStart(): ?DateTimeInterface
    {
        return $this->account_bank_reconciliation_start;
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
     * @return bool|null
     *
     * @SerializedName("qr_code")
     */
    public function isQrCode(): ?bool
    {
        return $this->qr_code;
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
     *
     * @SerializedName("invoice_is_print")
     */
    public function isInvoiceIsPrint(): ?bool
    {
        return $this->invoice_is_print;
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
     * @SerializedName("invoice_is_email")
     */
    public function isInvoiceIsEmail(): ?bool
    {
        return $this->invoice_is_email;
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
     * @param string|null $currency_interval_unit
     */
    public function setCurrencyIntervalUnit(?string $currency_interval_unit): void
    {
        $this->currency_interval_unit = $currency_interval_unit;
    }

    /**
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
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
     * @param string|null $invoice_terms
     */
    public function setInvoiceTerms(?string $invoice_terms): void
    {
        $this->invoice_terms = $invoice_terms;
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
     * @param bool|null $use_invoice_terms
     */
    public function setUseInvoiceTerms(?bool $use_invoice_terms): void
    {
        $this->use_invoice_terms = $use_invoice_terms;
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
     * @param string|null $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?string $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
    }

    /**
     * @param OdooRelation|null $purchase_tax_id
     */
    public function setPurchaseTaxId(?OdooRelation $purchase_tax_id): void
    {
        $this->purchase_tax_id = $purchase_tax_id;
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
     * @param bool|null $show_effect
     */
    public function setShowEffect(?bool $show_effect): void
    {
        $this->show_effect = $show_effect;
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
     * @param bool|null $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(?bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
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
     * @return int|null
     *
     * @SerializedName("company_count")
     */
    public function getCompanyCount(): ?int
    {
        return $this->company_count;
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
     * @param int|null $language_count
     */
    public function setLanguageCount(?int $language_count): void
    {
        $this->language_count = $language_count;
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
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
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
     * @param string|null $company_informations
     */
    public function setCompanyInformations(?string $company_informations): void
    {
        $this->company_informations = $company_informations;
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
     * @param int|null $fail_counter
     */
    public function setFailCounter(?int $fail_counter): void
    {
        $this->fail_counter = $fail_counter;
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
     * @return string|null
     *
     * @SerializedName("map_box_token")
     */
    public function getMapBoxToken(): ?string
    {
        return $this->map_box_token;
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param bool|null $user_default_rights
     */
    public function setUserDefaultRights(?bool $user_default_rights): void
    {
        $this->user_default_rights = $user_default_rights;
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
     * @param bool|null $external_email_server_default
     */
    public function setExternalEmailServerDefault(?bool $external_email_server_default): void
    {
        $this->external_email_server_default = $external_email_server_default;
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
     * @param bool|null $module_base_import
     */
    public function setModuleBaseImport(?bool $module_base_import): void
    {
        $this->module_base_import = $module_base_import;
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
     * @param bool|null $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
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
     * @param bool|null $module_google_drive
     */
    public function setModuleGoogleDrive(?bool $module_google_drive): void
    {
        $this->module_google_drive = $module_google_drive;
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
     *
     * @SerializedName("module_web_unsplash")
     */
    public function isModuleWebUnsplash(): ?bool
    {
        return $this->module_web_unsplash;
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
     * @param bool|null $module_auth_oauth
     */
    public function setModuleAuthOauth(?bool $module_auth_oauth): void
    {
        $this->module_auth_oauth = $module_auth_oauth;
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
     * @param bool|null $module_auth_ldap
     */
    public function setModuleAuthLdap(?bool $module_auth_ldap): void
    {
        $this->module_auth_ldap = $module_auth_ldap;
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
     * @param bool|null $module_base_gengo
     */
    public function setModuleBaseGengo(?bool $module_base_gengo): void
    {
        $this->module_base_gengo = $module_base_gengo;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_inter_company_rules")
     */
    public function isModuleInterCompanyRules(): ?bool
    {
        return $this->module_inter_company_rules;
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
     *
     * @SerializedName("module_pad")
     */
    public function isModulePad(): ?bool
    {
        return $this->module_pad;
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
     * @SerializedName("module_voip")
     */
    public function isModuleVoip(): ?bool
    {
        return $this->module_voip;
    }

    /**
     * @param bool|null $module_voip
     */
    public function setModuleVoip(?bool $module_voip): void
    {
        $this->module_voip = $module_voip;
    }

    /**
     * @param string|null $alias_domain
     */
    public function setAliasDomain(?string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
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
     *
     * @SerializedName("purchase_tax_id")
     */
    public function getPurchaseTaxId(): ?OdooRelation
    {
        return $this->purchase_tax_id;
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
     * @param string|null $product_weight_in_lbs
     */
    public function setProductWeightInLbs(?string $product_weight_in_lbs): void
    {
        $this->product_weight_in_lbs = $product_weight_in_lbs;
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
     * @param string|null $product_volume_volume_in_cubic_feet
     */
    public function setProductVolumeVolumeInCubicFeet(?string $product_volume_volume_in_cubic_feet): void
    {
        $this->product_volume_volume_in_cubic_feet = $product_volume_volume_in_cubic_feet;
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
     * @param bool|null $snailmail_color
     */
    public function setSnailmailColor(?bool $snailmail_color): void
    {
        $this->snailmail_color = $snailmail_color;
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
     * @param bool|null $snailmail_cover
     */
    public function setSnailmailCover(?bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
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
     * @param bool|null $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
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
     * @param bool|null $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
    }

    /**
     * @param OdooRelation|null $digest_id
     */
    public function setDigestId(?OdooRelation $digest_id): void
    {
        $this->digest_id = $digest_id;
    }

    /**
     * @param string|null $product_pricelist_setting
     */
    public function setProductPricelistSetting(?string $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
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
     * @param bool|null $has_accounting_entries
     */
    public function setHasAccountingEntries(?bool $has_accounting_entries): void
    {
        $this->has_accounting_entries = $has_accounting_entries;
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
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
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
     * @param bool|null $has_chart_of_accounts
     */
    public function setHasChartOfAccounts(?bool $has_chart_of_accounts): void
    {
        $this->has_chart_of_accounts = $has_chart_of_accounts;
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
     * @param OdooRelation|null $chart_template_id
     */
    public function setChartTemplateId(?OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
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
     * @param OdooRelation|null $sale_tax_id
     */
    public function setSaleTaxId(?OdooRelation $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
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
     * @return string|null
     *
     * @SerializedName("product_pricelist_setting")
     */
    public function getProductPricelistSetting(): ?string
    {
        return $this->product_pricelist_setting;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_ocn_client")
     */
    public function isModuleOcnClient(): ?bool
    {
        return $this->module_ocn_client;
    }

    /**
     * @param bool|null $group_discount_per_so_line
     */
    public function setGroupDiscountPerSoLine(?bool $group_discount_per_so_line): void
    {
        $this->group_discount_per_so_line = $group_discount_per_so_line;
    }

    /**
     * @param bool|null $module_ocn_client
     */
    public function setModuleOcnClient(?bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
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
     * @param string|null $unsplash_access_key
     */
    public function setUnsplashAccessKey(?string $unsplash_access_key): void
    {
        $this->unsplash_access_key = $unsplash_access_key;
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
     * @param bool|null $auth_signup_reset_password
     */
    public function setAuthSignupResetPassword(?bool $auth_signup_reset_password): void
    {
        $this->auth_signup_reset_password = $auth_signup_reset_password;
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
     * @param string|null $auth_signup_uninvited
     */
    public function setAuthSignupUninvited(?string $auth_signup_uninvited): void
    {
        $this->auth_signup_uninvited = $auth_signup_uninvited;
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
     * @param OdooRelation|null $auth_signup_template_user_id
     */
    public function setAuthSignupTemplateUserId(?OdooRelation $auth_signup_template_user_id): void
    {
        $this->auth_signup_template_user_id = $auth_signup_template_user_id;
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
     * @SerializedName("group_discount_per_so_line")
     */
    public function isGroupDiscountPerSoLine(): ?bool
    {
        return $this->group_discount_per_so_line;
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
     * @param bool|null $group_sale_pricelist
     */
    public function setGroupSalePricelist(?bool $group_sale_pricelist): void
    {
        $this->group_sale_pricelist = $group_sale_pricelist;
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
     * @SerializedName("group_product_variant")
     */
    public function isGroupProductVariant(): ?bool
    {
        return $this->group_product_variant;
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
     * @SerializedName("module_sale_product_configurator")
     */
    public function isModuleSaleProductConfigurator(): ?bool
    {
        return $this->module_sale_product_configurator;
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
     *
     * @SerializedName("module_sale_product_matrix")
     */
    public function isModuleSaleProductMatrix(): ?bool
    {
        return $this->module_sale_product_matrix;
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
     * @SerializedName("group_stock_packaging")
     */
    public function isGroupStockPackaging(): ?bool
    {
        return $this->group_stock_packaging;
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
     * @SerializedName("group_product_pricelist")
     */
    public function isGroupProductPricelist(): ?bool
    {
        return $this->group_product_pricelist;
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
     * @SerializedName("group_sale_pricelist")
     */
    public function isGroupSalePricelist(): ?bool
    {
        return $this->group_sale_pricelist;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.settings';
    }
}
