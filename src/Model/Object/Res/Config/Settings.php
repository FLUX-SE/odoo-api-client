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
     * Authorization Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $google_drive_authorization_code;

    /**
     * URI
     * ---
     * The URL to generate the authorization code from Google
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $google_drive_uri;

    /**
     * Refresh Token Generated
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_google_drive_token_generated;

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
     * Allow users to sign in with Google
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auth_oauth_google_enabled;

    /**
     * Client ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $auth_oauth_google_client_id;

    /**
     * Server uri
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $server_uri_google;

    /**
     * Client_id
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $cal_client_id;

    /**
     * Client_key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $cal_client_secret;

    /**
     * URI for tuto
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $server_uri;

    /**
     * Company Working Hours
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Organizational Chart
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_org_chart;

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
     * Employee Edition
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hr_employee_self_edit;

    /**
     * Reservation
     * ---
     * Reserving products manually in delivery orders or by running the scheduler is advised to better manage
     * priorities in case of long customer lead times or/and frequent stock-outs.
     * ---
     * Selection :
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
     * Human Resources
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $documents_hr_settings;

    /**
     * hr default workspace
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $documents_hr_folder;

    /**
     * Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $documents_product_settings;

    /**
     * product default workspace
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_folder;

    /**
     * Product Tags
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_tags;

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
     * Selection :
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
     * Contracts
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $documents_hr_contracts_tags;

    /**
     * Default Alias Name for Expenses
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $expense_alias_prefix;

    /**
     * Let your employees record expenses by email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_mailgateway;

    /**
     * Reimburse Expenses in Payslip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_hr_payroll_expense;

    /**
     * Lock Confirmed Orders
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $lock_confirmed_po;

    /**
     * Purchase Order Modification *
     * ---
     * Purchase Order Modification used when you want to purchase order editable after confirm
     * ---
     * Selection :
     *     -> edit (Allow to edit purchase orders)
     *     -> lock (Confirmed purchase orders are not editable)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $po_lock;

    /**
     * Purchase Order Approval
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $po_order_approval;

    /**
     * Levels of Approvals *
     * ---
     * Provide a double validation mechanism for purchases
     * ---
     * Selection :
     *     -> one_step (Confirm purchase orders in one step)
     *     -> two_step (Get 2 levels of approvals to confirm a purchase order)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $po_double_validation;

    /**
     * Minimum Amount
     * ---
     * Minimum amount for which a double validation is required
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $po_double_validation_amount;

    /**
     * Company Currency
     * ---
     * Utility field to express amount currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Bill Control
     * ---
     * This default value is applied to any new product created. This can be changed in the product detail form.
     * ---
     * Selection :
     *     -> purchase (Ordered quantities)
     *     -> receive (Received quantities)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $default_purchase_method;

    /**
     * Purchase Warnings
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_purchase;

    /**
     * 3-way matching: purchases, receptions and bills
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account_3way_match;

    /**
     * Purchase Agreements
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_purchase_requisition;

    /**
     * Purchase Grid Entry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_purchase_product_matrix;

    /**
     * Purchase Lead Time
     * ---
     * Margin of error for vendor lead times. When the system generates Purchase Orders for procuring products, they
     * will be scheduled that many days earlier to cope with unexpected vendor delays.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $po_lead;

    /**
     * Security Lead Time for Purchase
     * ---
     * Margin of error for vendor lead times. When the system generates Purchase Orders for reordering products,they
     * will be scheduled that many days earlier to cope with unexpected vendor delays.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_po_lead;

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
     * Selection :
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
     * Dropshipping
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_stock_dropshipping;

    /**
     * Is the Sale Module Installed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_installed_sale;

    /**
     * Lock Confirmed Sales
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_auto_done_setting;

    /**
     * Margins
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_margin;

    /**
     * Default Quotation Validity (Days)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $quotation_validity_days;

    /**
     * Default Quotation Validity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_quotation_validity_days;

    /**
     * Sale Order Warnings
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_warning_sale;

    /**
     * Online Signature
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $portal_confirmation_sign;

    /**
     * Online Payment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $portal_confirmation_pay;

    /**
     * Customer Addresses
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_delivery_address;

    /**
     * Pro-Forma Invoice
     * ---
     * Allows you to send pro-forma invoice.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_proforma_sales;

    /**
     * Invoicing Policy
     * ---
     * Selection :
     *     -> order (Invoice what is ordered)
     *     -> delivery (Invoice what is delivered)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $default_invoice_policy;

    /**
     * Deposit Product
     * ---
     * Default product used for payment advances
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $deposit_default_product_id;

    /**
     * Digital Content
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_website_sale_digital;

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
     * Shipping Costs
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery;

    /**
     * DHL Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_dhl;

    /**
     * FedEx Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_fedex;

    /**
     * UPS Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_ups;

    /**
     * USPS Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_usps;

    /**
     * bpost Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_bpost;

    /**
     * Easypost Connector
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_delivery_easypost;

    /**
     * Specific Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_product_email_template;

    /**
     * Coupons & Promotions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_coupon;

    /**
     * Amazon Sync
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_amazon;

    /**
     * Automatic Invoice
     * ---
     * The invoice is generated automatically and available in the customer portal when the transaction is confirmed
     * by the payment acquirer.
     * The invoice is marked as paid and the payment is registered in the payment journal defined in the
     * configuration of the payment acquirer.
     * This mode is advised if you issue the final invoice at the order and not after the delivery.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $automatic_invoice;

    /**
     * Email Template
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $template_id;

    /**
     * Confirmation Email
     * ---
     * Email sent to the customer once the order is paid.
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $confirmation_template_id;

    /**
     * Accounting
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $documents_account_settings;

    /**
     * account default folder
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_folder;

    /**
     * Quotation Templates
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_sale_order_template;

    /**
     * Default Template
     * ---
     * Relation : many2one (sale.order.template)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_sale_order_template_id;

    /**
     * Quotation Builder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_sale_quotation_builder;

    /**
     * Security Lead Time
     * ---
     * Margin of error for dates promised to customers. Products will be scheduled for procurement and delivery that
     * many days earlier than the actual promised date, to cope with unexpected delays in the supply chain.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $security_lead;

    /**
     * Incoterms
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_display_incoterm;

    /**
     * Display Lots & Serial Numbers on Invoices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_lot_on_invoice;

    /**
     * Security Lead Time for Sales
     * ---
     * Margin of error for dates promised to customers. Products will be scheduled for delivery that many days
     * earlier than the actual promised date, to cope with unexpected delays in the supply chain.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_security_lead;

    /**
     * Picking Policy
     * ---
     * Selection :
     *     -> direct (Ship products as soon as available, with back orders)
     *     -> one (Ship all products at once)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $default_picking_policy;

    /**
     * Rule
     * ---
     * Select the type to setup inter company rules in selected company.
     * ---
     * Selection :
     *     -> not_synchronize (Do not synchronize)
     *     -> invoice_and_refund (Synchronize invoices/bills)
     *     -> so_and_po (Synchronize sales/purchase orders)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $rule_type;

    /**
     * Apply on
     * ---
     * Selection :
     *     -> sale (Sales Order)
     *     -> purchase (Purchase Order)
     *     -> sale_purchase (Sales and Purchase Order)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $applicable_on;

    /**
     * Automatic Validation
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $auto_validation;

    /**
     * Assign to
     * ---
     * Responsible user for creation of documents triggered by intercompany rules.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $intercompany_user_id;

    /**
     * Select Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $rules_company_id;

    /**
     * Warehouse For Purchase Orders
     * ---
     * Default value to set on Purchase(Sales) Orders that will be created based on Sale(Purchase) Orders made to
     * this company
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $warehouse_id;

    /**
     * Intercompany Transaction Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $intercompany_transaction_message;

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
     *        Selection :
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
     *        Selection :
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
     *        Selection :
     *            -> trimester (trimester)
     *            -> monthly (monthly)
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param int $account_tax_periodicity_reminder_day Reminder
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $default_picking_policy Picking Policy
     *        ---
     *        Selection :
     *            -> direct (Ship products as soon as available, with back orders)
     *            -> one (Ship all products at once)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $intercompany_user_id Assign to
     *        ---
     *        Responsible user for creation of documents triggered by intercompany rules.
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
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
        int $account_tax_periodicity_reminder_day,
        string $default_picking_policy,
        OdooRelation $intercompany_user_id
    ) {
        $this->company_id = $company_id;
        $this->currency_id = $currency_id;
        $this->show_line_subtotals_tax_selection = $show_line_subtotals_tax_selection;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->account_tax_periodicity = $account_tax_periodicity;
        $this->account_tax_periodicity_reminder_day = $account_tax_periodicity_reminder_day;
        $this->default_picking_policy = $default_picking_policy;
        $this->intercompany_user_id = $intercompany_user_id;
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
     * @param OdooRelation $item
     */
    public function addDocumentsHrContractsTags(OdooRelation $item): void
    {
        if ($this->hasDocumentsHrContractsTags($item)) {
            return;
        }

        if (null === $this->documents_hr_contracts_tags) {
            $this->documents_hr_contracts_tags = [];
        }

        $this->documents_hr_contracts_tags[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDocumentsHrContractsTags(OdooRelation $item): bool
    {
        if (null === $this->documents_hr_contracts_tags) {
            return false;
        }

        return in_array($item, $this->documents_hr_contracts_tags);
    }

    /**
     * @param OdooRelation[]|null $documents_hr_contracts_tags
     */
    public function setDocumentsHrContractsTags(?array $documents_hr_contracts_tags): void
    {
        $this->documents_hr_contracts_tags = $documents_hr_contracts_tags;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("documents_hr_contracts_tags")
     */
    public function getDocumentsHrContractsTags(): ?array
    {
        return $this->documents_hr_contracts_tags;
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
     *
     * @SerializedName("currency_next_execution_date")
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
     *
     * @SerializedName("currency_provider")
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
     *
     * @SerializedName("currency_interval_unit")
     */
    public function getCurrencyIntervalUnit(): ?string
    {
        return $this->currency_interval_unit;
    }

    /**
     * @param bool|null $vat_check_vies
     */
    public function setVatCheckVies(?bool $vat_check_vies): void
    {
        $this->vat_check_vies = $vat_check_vies;
    }

    /**
     * @param bool|null $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(?bool $extract_single_line_per_tax): void
    {
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @return string|null
     *
     * @SerializedName("expense_alias_prefix")
     */
    public function getExpenseAliasPrefix(): ?string
    {
        return $this->expense_alias_prefix;
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
     * @param string|null $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?string $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
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
     * @param OdooRelation|null $transfer_account_id
     */
    public function setTransferAccountId(?OdooRelation $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("transfer_account_id")
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
     *
     * @SerializedName("module_account_predictive_bills")
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
     *
     * @SerializedName("use_anglo_saxon")
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("tax_lock_date")
     */
    public function getTaxLockDate(): ?DateTimeInterface
    {
        return $this->tax_lock_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDocumentsHrContractsTags(OdooRelation $item): void
    {
        if (null === $this->documents_hr_contracts_tags) {
            $this->documents_hr_contracts_tags = [];
        }

        if ($this->hasDocumentsHrContractsTags($item)) {
            $index = array_search($item, $this->documents_hr_contracts_tags);
            unset($this->documents_hr_contracts_tags[$index]);
        }
    }

    /**
     * @param string|null $expense_alias_prefix
     */
    public function setExpenseAliasPrefix(?string $expense_alias_prefix): void
    {
        $this->expense_alias_prefix = $expense_alias_prefix;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("fiscalyear_lock_date")
     */
    public function getFiscalyearLockDate(): ?DateTimeInterface
    {
        return $this->fiscalyear_lock_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_currency_id")
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @param bool|null $module_purchase_product_matrix
     */
    public function setModulePurchaseProductMatrix(?bool $module_purchase_product_matrix): void
    {
        $this->module_purchase_product_matrix = $module_purchase_product_matrix;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_purchase_product_matrix")
     */
    public function isModulePurchaseProductMatrix(): ?bool
    {
        return $this->module_purchase_product_matrix;
    }

    /**
     * @param bool|null $module_purchase_requisition
     */
    public function setModulePurchaseRequisition(?bool $module_purchase_requisition): void
    {
        $this->module_purchase_requisition = $module_purchase_requisition;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_purchase_requisition")
     */
    public function isModulePurchaseRequisition(): ?bool
    {
        return $this->module_purchase_requisition;
    }

    /**
     * @param bool|null $module_account_3way_match
     */
    public function setModuleAccount3wayMatch(?bool $module_account_3way_match): void
    {
        $this->module_account_3way_match = $module_account_3way_match;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_account_3way_match")
     */
    public function isModuleAccount3wayMatch(): ?bool
    {
        return $this->module_account_3way_match;
    }

    /**
     * @param bool|null $group_warning_purchase
     */
    public function setGroupWarningPurchase(?bool $group_warning_purchase): void
    {
        $this->group_warning_purchase = $group_warning_purchase;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_warning_purchase")
     */
    public function isGroupWarningPurchase(): ?bool
    {
        return $this->group_warning_purchase;
    }

    /**
     * @param string|null $default_purchase_method
     */
    public function setDefaultPurchaseMethod(?string $default_purchase_method): void
    {
        $this->default_purchase_method = $default_purchase_method;
    }

    /**
     * @return string|null
     *
     * @SerializedName("default_purchase_method")
     */
    public function getDefaultPurchaseMethod(): ?string
    {
        return $this->default_purchase_method;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @param float|null $po_double_validation_amount
     */
    public function setPoDoubleValidationAmount(?float $po_double_validation_amount): void
    {
        $this->po_double_validation_amount = $po_double_validation_amount;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_mailgateway")
     */
    public function isUseMailgateway(): ?bool
    {
        return $this->use_mailgateway;
    }

    /**
     * @return float|null
     *
     * @SerializedName("po_double_validation_amount")
     */
    public function getPoDoubleValidationAmount(): ?float
    {
        return $this->po_double_validation_amount;
    }

    /**
     * @param string|null $po_double_validation
     */
    public function setPoDoubleValidation(?string $po_double_validation): void
    {
        $this->po_double_validation = $po_double_validation;
    }

    /**
     * @return string|null
     *
     * @SerializedName("po_double_validation")
     */
    public function getPoDoubleValidation(): ?string
    {
        return $this->po_double_validation;
    }

    /**
     * @param bool|null $po_order_approval
     */
    public function setPoOrderApproval(?bool $po_order_approval): void
    {
        $this->po_order_approval = $po_order_approval;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("po_order_approval")
     */
    public function isPoOrderApproval(): ?bool
    {
        return $this->po_order_approval;
    }

    /**
     * @param string|null $po_lock
     */
    public function setPoLock(?string $po_lock): void
    {
        $this->po_lock = $po_lock;
    }

    /**
     * @return string|null
     *
     * @SerializedName("po_lock")
     */
    public function getPoLock(): ?string
    {
        return $this->po_lock;
    }

    /**
     * @param bool|null $lock_confirmed_po
     */
    public function setLockConfirmedPo(?bool $lock_confirmed_po): void
    {
        $this->lock_confirmed_po = $lock_confirmed_po;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("lock_confirmed_po")
     */
    public function isLockConfirmedPo(): ?bool
    {
        return $this->lock_confirmed_po;
    }

    /**
     * @param bool|null $module_hr_payroll_expense
     */
    public function setModuleHrPayrollExpense(?bool $module_hr_payroll_expense): void
    {
        $this->module_hr_payroll_expense = $module_hr_payroll_expense;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_payroll_expense")
     */
    public function isModuleHrPayrollExpense(): ?bool
    {
        return $this->module_hr_payroll_expense;
    }

    /**
     * @param bool|null $use_mailgateway
     */
    public function setUseMailgateway(?bool $use_mailgateway): void
    {
        $this->use_mailgateway = $use_mailgateway;
    }

    /**
     * @param DateTimeInterface|null $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @param DateTimeInterface|null $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param float|null $po_lead
     */
    public function setPoLead(?float $po_lead): void
    {
        $this->po_lead = $po_lead;
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
     * @param DateTimeInterface|null $account_bank_reconciliation_start
     */
    public function setAccountBankReconciliationStart(
        ?DateTimeInterface $account_bank_reconciliation_start
    ): void {
        $this->account_bank_reconciliation_start = $account_bank_reconciliation_start;
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
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
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
     * @return bool|null
     *
     * @SerializedName("module_account_invoice_extract")
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
     * @param bool|null $module_l10n_eu_service
     */
    public function setModuleL10nEuService(?bool $module_l10n_eu_service): void
    {
        $this->module_l10n_eu_service = $module_l10n_eu_service;
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
     * @return bool|null
     *
     * @SerializedName("module_account_intrastat")
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
     *
     * @SerializedName("module_currency_rate_live")
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
     * @return bool|null
     *
     * @SerializedName("module_account_bank_statement_import_camt")
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
     *
     * @SerializedName("module_account_bank_statement_import_csv")
     */
    public function isModuleAccountBankStatementImportCsv(): ?bool
    {
        return $this->module_account_bank_statement_import_csv;
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
     * @return bool|null
     *
     * @SerializedName("invoice_is_print")
     */
    public function isInvoiceIsPrint(): ?bool
    {
        return $this->invoice_is_print;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("period_lock_date")
     */
    public function getPeriodLockDate(): ?DateTimeInterface
    {
        return $this->period_lock_date;
    }

    /**
     * @param bool|null $documents_product_settings
     */
    public function setDocumentsProductSettings(?bool $documents_product_settings): void
    {
        $this->documents_product_settings = $documents_product_settings;
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
     *
     * @SerializedName("fiscalyear_last_month")
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
     *
     * @SerializedName("fiscalyear_last_day")
     */
    public function getFiscalyearLastDay(): int
    {
        return $this->fiscalyear_last_day;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductTags(OdooRelation $item): void
    {
        if (null === $this->product_tags) {
            $this->product_tags = [];
        }

        if ($this->hasProductTags($item)) {
            $index = array_search($item, $this->product_tags);
            unset($this->product_tags[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductTags(OdooRelation $item): void
    {
        if ($this->hasProductTags($item)) {
            return;
        }

        if (null === $this->product_tags) {
            $this->product_tags = [];
        }

        $this->product_tags[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTags(OdooRelation $item): bool
    {
        if (null === $this->product_tags) {
            return false;
        }

        return in_array($item, $this->product_tags);
    }

    /**
     * @param OdooRelation[]|null $product_tags
     */
    public function setProductTags(?array $product_tags): void
    {
        $this->product_tags = $product_tags;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_tags")
     */
    public function getProductTags(): ?array
    {
        return $this->product_tags;
    }

    /**
     * @param OdooRelation|null $product_folder
     */
    public function setProductFolder(?OdooRelation $product_folder): void
    {
        $this->product_folder = $product_folder;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_folder")
     */
    public function getProductFolder(): ?OdooRelation
    {
        return $this->product_folder;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("documents_product_settings")
     */
    public function isDocumentsProductSettings(): ?bool
    {
        return $this->documents_product_settings;
    }

    /**
     * @param bool|null $invoice_is_print
     */
    public function setInvoiceIsPrint(?bool $invoice_is_print): void
    {
        $this->invoice_is_print = $invoice_is_print;
    }

    /**
     * @param OdooRelation|null $documents_hr_folder
     */
    public function setDocumentsHrFolder(?OdooRelation $documents_hr_folder): void
    {
        $this->documents_hr_folder = $documents_hr_folder;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("documents_hr_folder")
     */
    public function getDocumentsHrFolder(): ?OdooRelation
    {
        return $this->documents_hr_folder;
    }

    /**
     * @param bool|null $documents_hr_settings
     */
    public function setDocumentsHrSettings(?bool $documents_hr_settings): void
    {
        $this->documents_hr_settings = $documents_hr_settings;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("documents_hr_settings")
     */
    public function isDocumentsHrSettings(): ?bool
    {
        return $this->documents_hr_settings;
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
     * @return string|null
     *
     * @SerializedName("invoice_terms")
     */
    public function getInvoiceTerms(): ?string
    {
        return $this->invoice_terms;
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
     * @return float|null
     *
     * @SerializedName("po_lead")
     */
    public function getPoLead(): ?float
    {
        return $this->po_lead;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_po_lead")
     */
    public function isUsePoLead(): ?bool
    {
        return $this->use_po_lead;
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
     * @param bool|null $documents_account_settings
     */
    public function setDocumentsAccountSettings(?bool $documents_account_settings): void
    {
        $this->documents_account_settings = $documents_account_settings;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_display_incoterm")
     */
    public function isGroupDisplayIncoterm(): ?bool
    {
        return $this->group_display_incoterm;
    }

    /**
     * @param float|null $security_lead
     */
    public function setSecurityLead(?float $security_lead): void
    {
        $this->security_lead = $security_lead;
    }

    /**
     * @return float|null
     *
     * @SerializedName("security_lead")
     */
    public function getSecurityLead(): ?float
    {
        return $this->security_lead;
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
     *
     * @SerializedName("module_sale_quotation_builder")
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
     *
     * @SerializedName("default_sale_order_template_id")
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
     *
     * @SerializedName("group_sale_order_template")
     */
    public function isGroupSaleOrderTemplate(): ?bool
    {
        return $this->group_sale_order_template;
    }

    /**
     * @param OdooRelation|null $account_folder
     */
    public function setAccountFolder(?OdooRelation $account_folder): void
    {
        $this->account_folder = $account_folder;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_folder")
     */
    public function getAccountFolder(): ?OdooRelation
    {
        return $this->account_folder;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("documents_account_settings")
     */
    public function isDocumentsAccountSettings(): ?bool
    {
        return $this->documents_account_settings;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_lot_on_invoice")
     */
    public function isGroupLotOnInvoice(): ?bool
    {
        return $this->group_lot_on_invoice;
    }

    /**
     * @param OdooRelation|null $confirmation_template_id
     */
    public function setConfirmationTemplateId(?OdooRelation $confirmation_template_id): void
    {
        $this->confirmation_template_id = $confirmation_template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("confirmation_template_id")
     */
    public function getConfirmationTemplateId(): ?OdooRelation
    {
        return $this->confirmation_template_id;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @param bool|null $automatic_invoice
     */
    public function setAutomaticInvoice(?bool $automatic_invoice): void
    {
        $this->automatic_invoice = $automatic_invoice;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("automatic_invoice")
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
     *
     * @SerializedName("module_sale_amazon")
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
     *
     * @SerializedName("module_sale_coupon")
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
     * @param bool|null $group_display_incoterm
     */
    public function setGroupDisplayIncoterm(?bool $group_display_incoterm): void
    {
        $this->group_display_incoterm = $group_display_incoterm;
    }

    /**
     * @param bool|null $group_lot_on_invoice
     */
    public function setGroupLotOnInvoice(?bool $group_lot_on_invoice): void
    {
        $this->group_lot_on_invoice = $group_lot_on_invoice;
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
     *
     * @SerializedName("warehouse_id")
     */
    public function getWarehouseId(): ?OdooRelation
    {
        return $this->warehouse_id;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $intercompany_transaction_message
     */
    public function setIntercompanyTransactionMessage(?string $intercompany_transaction_message): void
    {
        $this->intercompany_transaction_message = $intercompany_transaction_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("intercompany_transaction_message")
     */
    public function getIntercompanyTransactionMessage(): ?string
    {
        return $this->intercompany_transaction_message;
    }

    /**
     * @param OdooRelation|null $warehouse_id
     */
    public function setWarehouseId(?OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @param OdooRelation|null $rules_company_id
     */
    public function setRulesCompanyId(?OdooRelation $rules_company_id): void
    {
        $this->rules_company_id = $rules_company_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_security_lead")
     */
    public function isUseSecurityLead(): ?bool
    {
        return $this->use_security_lead;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("rules_company_id")
     */
    public function getRulesCompanyId(): ?OdooRelation
    {
        return $this->rules_company_id;
    }

    /**
     * @param OdooRelation $intercompany_user_id
     */
    public function setIntercompanyUserId(OdooRelation $intercompany_user_id): void
    {
        $this->intercompany_user_id = $intercompany_user_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("intercompany_user_id")
     */
    public function getIntercompanyUserId(): OdooRelation
    {
        return $this->intercompany_user_id;
    }

    /**
     * @param bool|null $auto_validation
     */
    public function setAutoValidation(?bool $auto_validation): void
    {
        $this->auto_validation = $auto_validation;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_validation")
     */
    public function isAutoValidation(): ?bool
    {
        return $this->auto_validation;
    }

    /**
     * @param string|null $applicable_on
     */
    public function setApplicableOn(?string $applicable_on): void
    {
        $this->applicable_on = $applicable_on;
    }

    /**
     * @return string|null
     *
     * @SerializedName("applicable_on")
     */
    public function getApplicableOn(): ?string
    {
        return $this->applicable_on;
    }

    /**
     * @param string|null $rule_type
     */
    public function setRuleType(?string $rule_type): void
    {
        $this->rule_type = $rule_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rule_type")
     */
    public function getRuleType(): ?string
    {
        return $this->rule_type;
    }

    /**
     * @param string $default_picking_policy
     */
    public function setDefaultPickingPolicy(string $default_picking_policy): void
    {
        $this->default_picking_policy = $default_picking_policy;
    }

    /**
     * @return string
     *
     * @SerializedName("default_picking_policy")
     */
    public function getDefaultPickingPolicy(): string
    {
        return $this->default_picking_policy;
    }

    /**
     * @param bool|null $use_security_lead
     */
    public function setUseSecurityLead(?bool $use_security_lead): void
    {
        $this->use_security_lead = $use_security_lead;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_product_email_template")
     */
    public function isModuleProductEmailTemplate(): ?bool
    {
        return $this->module_product_email_template;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_delivery_easypost")
     */
    public function isModuleDeliveryEasypost(): ?bool
    {
        return $this->module_delivery_easypost;
    }

    /**
     * @param bool|null $use_po_lead
     */
    public function setUsePoLead(?bool $use_po_lead): void
    {
        $this->use_po_lead = $use_po_lead;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_stock_dropshipping")
     */
    public function isModuleStockDropshipping(): ?bool
    {
        return $this->module_stock_dropshipping;
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
     *
     * @SerializedName("use_quotation_validity_days")
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
     *
     * @SerializedName("quotation_validity_days")
     */
    public function getQuotationValidityDays(): ?int
    {
        return $this->quotation_validity_days;
    }

    /**
     * @param bool|null $module_sale_margin
     */
    public function setModuleSaleMargin(?bool $module_sale_margin): void
    {
        $this->module_sale_margin = $module_sale_margin;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_sale_margin")
     */
    public function isModuleSaleMargin(): ?bool
    {
        return $this->module_sale_margin;
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
     *
     * @SerializedName("group_auto_done_setting")
     */
    public function isGroupAutoDoneSetting(): ?bool
    {
        return $this->group_auto_done_setting;
    }

    /**
     * @param bool|null $is_installed_sale
     */
    public function setIsInstalledSale(?bool $is_installed_sale): void
    {
        $this->is_installed_sale = $is_installed_sale;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_installed_sale")
     */
    public function isIsInstalledSale(): ?bool
    {
        return $this->is_installed_sale;
    }

    /**
     * @param bool|null $module_stock_dropshipping
     */
    public function setModuleStockDropshipping(?bool $module_stock_dropshipping): void
    {
        $this->module_stock_dropshipping = $module_stock_dropshipping;
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
     * @param bool|null $group_warning_sale
     */
    public function setGroupWarningSale(?bool $group_warning_sale): void
    {
        $this->group_warning_sale = $group_warning_sale;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_tax_periodicity_journal_id")
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
     *
     * @SerializedName("account_tax_periodicity_reminder_day")
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
     *
     * @SerializedName("account_tax_periodicity")
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
     *
     * @SerializedName("totals_below_sections")
     */
    public function isTotalsBelowSections(): ?bool
    {
        return $this->totals_below_sections;
    }

    /**
     * @param bool|null $module_stock_landed_costs
     */
    public function setModuleStockLandedCosts(?bool $module_stock_landed_costs): void
    {
        $this->module_stock_landed_costs = $module_stock_landed_costs;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_stock_landed_costs")
     */
    public function isModuleStockLandedCosts(): ?bool
    {
        return $this->module_stock_landed_costs;
    }

    /**
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
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
     * @return bool|null
     *
     * @SerializedName("group_warning_sale")
     */
    public function isGroupWarningSale(): ?bool
    {
        return $this->group_warning_sale;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("portal_confirmation_sign")
     */
    public function isPortalConfirmationSign(): ?bool
    {
        return $this->portal_confirmation_sign;
    }

    /**
     * @param bool|null $module_delivery_bpost
     */
    public function setModuleDeliveryBpost(?bool $module_delivery_bpost): void
    {
        $this->module_delivery_bpost = $module_delivery_bpost;
    }

    /**
     * @param string|null $auth_signup_uninvited
     */
    public function setAuthSignupUninvited(?string $auth_signup_uninvited): void
    {
        $this->auth_signup_uninvited = $auth_signup_uninvited;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_delivery_bpost")
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
     *
     * @SerializedName("module_delivery_usps")
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
     *
     * @SerializedName("module_delivery_ups")
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
     *
     * @SerializedName("module_delivery_fedex")
     */
    public function isModuleDeliveryFedex(): ?bool
    {
        return $this->module_delivery_fedex;
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
     *
     * @SerializedName("module_delivery_dhl")
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
     *
     * @SerializedName("module_delivery")
     */
    public function isModuleDelivery(): ?bool
    {
        return $this->module_delivery;
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
     * @param bool|null $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(?bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
    }

    /**
     * @param bool|null $module_website_sale_digital
     */
    public function setModuleWebsiteSaleDigital(?bool $module_website_sale_digital): void
    {
        $this->module_website_sale_digital = $module_website_sale_digital;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_website_sale_digital")
     */
    public function isModuleWebsiteSaleDigital(): ?bool
    {
        return $this->module_website_sale_digital;
    }

    /**
     * @param OdooRelation|null $deposit_default_product_id
     */
    public function setDepositDefaultProductId(?OdooRelation $deposit_default_product_id): void
    {
        $this->deposit_default_product_id = $deposit_default_product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("deposit_default_product_id")
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
     *
     * @SerializedName("default_invoice_policy")
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
     *
     * @SerializedName("group_proforma_sales")
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
     *
     * @SerializedName("group_sale_delivery_address")
     */
    public function isGroupSaleDeliveryAddress(): ?bool
    {
        return $this->group_sale_delivery_address;
    }

    /**
     * @param bool|null $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(?bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("portal_confirmation_pay")
     */
    public function isPortalConfirmationPay(): ?bool
    {
        return $this->portal_confirmation_pay;
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
     * @param bool|null $module_account_bank_statement_import_qif
     */
    public function setModuleAccountBankStatementImportQif(
        ?bool $module_account_bank_statement_import_qif
    ): void {
        $this->module_account_bank_statement_import_qif = $module_account_bank_statement_import_qif;
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
     * @return bool|null
     *
     * @SerializedName("is_google_drive_token_generated")
     */
    public function isIsGoogleDriveTokenGenerated(): ?bool
    {
        return $this->is_google_drive_token_generated;
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
     * @SerializedName("module_sale_product_configurator")
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
     * @param bool|null $is_google_drive_token_generated
     */
    public function setIsGoogleDriveTokenGenerated(?bool $is_google_drive_token_generated): void
    {
        $this->is_google_drive_token_generated = $is_google_drive_token_generated;
    }

    /**
     * @param string|null $google_drive_uri
     */
    public function setGoogleDriveUri(?string $google_drive_uri): void
    {
        $this->google_drive_uri = $google_drive_uri;
    }

    /**
     * @param bool|null $module_sale_product_matrix
     */
    public function setModuleSaleProductMatrix(?bool $module_sale_product_matrix): void
    {
        $this->module_sale_product_matrix = $module_sale_product_matrix;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_drive_uri")
     */
    public function getGoogleDriveUri(): ?string
    {
        return $this->google_drive_uri;
    }

    /**
     * @param string|null $google_drive_authorization_code
     */
    public function setGoogleDriveAuthorizationCode(?string $google_drive_authorization_code): void
    {
        $this->google_drive_authorization_code = $google_drive_authorization_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_drive_authorization_code")
     */
    public function getGoogleDriveAuthorizationCode(): ?string
    {
        return $this->google_drive_authorization_code;
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
     *
     * @SerializedName("auth_signup_template_user_id")
     */
    public function getAuthSignupTemplateUserId(): ?OdooRelation
    {
        return $this->auth_signup_template_user_id;
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
     * @param bool|null $module_ocn_client
     */
    public function setModuleOcnClient(?bool $module_ocn_client): void
    {
        $this->module_ocn_client = $module_ocn_client;
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
     * @SerializedName("group_stock_packaging")
     */
    public function isGroupStockPackaging(): ?bool
    {
        return $this->group_stock_packaging;
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
     * @param bool|null $snailmail_cover
     */
    public function setSnailmailCover(?bool $snailmail_cover): void
    {
        $this->snailmail_cover = $snailmail_cover;
    }

    /**
     * @return string|null
     *
     * @SerializedName("cal_client_secret")
     */
    public function getCalClientSecret(): ?string
    {
        return $this->cal_client_secret;
    }

    /**
     * @param string|null $cal_client_id
     */
    public function setCalClientId(?string $cal_client_id): void
    {
        $this->cal_client_id = $cal_client_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("cal_client_id")
     */
    public function getCalClientId(): ?string
    {
        return $this->cal_client_id;
    }

    /**
     * @param string|null $server_uri_google
     */
    public function setServerUriGoogle(?string $server_uri_google): void
    {
        $this->server_uri_google = $server_uri_google;
    }

    /**
     * @return string|null
     *
     * @SerializedName("server_uri_google")
     */
    public function getServerUriGoogle(): ?string
    {
        return $this->server_uri_google;
    }

    /**
     * @param string|null $auth_oauth_google_client_id
     */
    public function setAuthOauthGoogleClientId(?string $auth_oauth_google_client_id): void
    {
        $this->auth_oauth_google_client_id = $auth_oauth_google_client_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("auth_oauth_google_client_id")
     */
    public function getAuthOauthGoogleClientId(): ?string
    {
        return $this->auth_oauth_google_client_id;
    }

    /**
     * @param bool|null $auth_oauth_google_enabled
     */
    public function setAuthOauthGoogleEnabled(?bool $auth_oauth_google_enabled): void
    {
        $this->auth_oauth_google_enabled = $auth_oauth_google_enabled;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auth_oauth_google_enabled")
     */
    public function isAuthOauthGoogleEnabled(): ?bool
    {
        return $this->auth_oauth_google_enabled;
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
     * @SerializedName("snailmail_duplex")
     */
    public function isSnailmailDuplex(): ?bool
    {
        return $this->snailmail_duplex;
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
     * @param bool|null $group_stock_packaging
     */
    public function setGroupStockPackaging(?bool $group_stock_packaging): void
    {
        $this->group_stock_packaging = $group_stock_packaging;
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
     * @param string|null $product_pricelist_setting
     */
    public function setProductPricelistSetting(?string $product_pricelist_setting): void
    {
        $this->product_pricelist_setting = $product_pricelist_setting;
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
     * @param bool|null $group_sale_pricelist
     */
    public function setGroupSalePricelist(?bool $group_sale_pricelist): void
    {
        $this->group_sale_pricelist = $group_sale_pricelist;
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
     * @param string|null $map_box_token
     */
    public function setMapBoxToken(?string $map_box_token): void
    {
        $this->map_box_token = $map_box_token;
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
     * @SerializedName("server_uri")
     */
    public function getServerUri(): ?string
    {
        return $this->server_uri;
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
     * @SerializedName("module_voip")
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
     *
     * @SerializedName("module_pad")
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
     *
     * @SerializedName("module_inter_company_rules")
     */
    public function isModuleInterCompanyRules(): ?bool
    {
        return $this->module_inter_company_rules;
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
     * @return bool|null
     *
     * @SerializedName("module_auth_ldap")
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
     * @SerializedName("module_google_spreadsheet")
     */
    public function isModuleGoogleSpreadsheet(): ?bool
    {
        return $this->module_google_spreadsheet;
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
     * @param bool|null $module_google_calendar
     */
    public function setModuleGoogleCalendar(?bool $module_google_calendar): void
    {
        $this->module_google_calendar = $module_google_calendar;
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
     * @param bool|null $module_base_import
     */
    public function setModuleBaseImport(?bool $module_base_import): void
    {
        $this->module_base_import = $module_base_import;
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
     * @param bool|null $module_voip
     */
    public function setModuleVoip(?bool $module_voip): void
    {
        $this->module_voip = $module_voip;
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
     * @SerializedName("alias_domain")
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
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
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
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
     * @param int|null $language_count
     */
    public function setLanguageCount(?int $language_count): void
    {
        $this->language_count = $language_count;
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
     * @param int|null $active_user_count
     */
    public function setActiveUserCount(?int $active_user_count): void
    {
        $this->active_user_count = $active_user_count;
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
     * @param int|null $company_count
     */
    public function setCompanyCount(?int $company_count): void
    {
        $this->company_count = $company_count;
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
     * @SerializedName("module_partner_autocomplete")
     */
    public function isModulePartnerAutocomplete(): ?bool
    {
        return $this->module_partner_autocomplete;
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
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
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
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
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
     * @param bool|null $group_multi_currency
     */
    public function setGroupMultiCurrency(?bool $group_multi_currency): void
    {
        $this->group_multi_currency = $group_multi_currency;
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
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
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
     * @param bool|null $module_base_geolocalize
     */
    public function setModuleBaseGeolocalize(?bool $module_base_geolocalize): void
    {
        $this->module_base_geolocalize = $module_base_geolocalize;
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
     * @param string|null $cal_client_secret
     */
    public function setCalClientSecret(?string $cal_client_secret): void
    {
        $this->cal_client_secret = $cal_client_secret;
    }

    /**
     * @param string|null $server_uri
     */
    public function setServerUri(?string $server_uri): void
    {
        $this->server_uri = $server_uri;
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
     * @param OdooRelation|null $sale_tax_id
     */
    public function setSaleTaxId(?OdooRelation $sale_tax_id): void
    {
        $this->sale_tax_id = $sale_tax_id;
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
     * @param bool|null $group_analytic_accounting
     */
    public function setGroupAnalyticAccounting(?bool $group_analytic_accounting): void
    {
        $this->group_analytic_accounting = $group_analytic_accounting;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sale_tax_id")
     */
    public function getSaleTaxId(): ?OdooRelation
    {
        return $this->sale_tax_id;
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
     * @param OdooRelation|null $chart_template_id
     */
    public function setChartTemplateId(?OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
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
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
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
     * @param OdooRelation|null $stock_sms_confirmation_template_id
     */
    public function setStockSmsConfirmationTemplateId(
        ?OdooRelation $stock_sms_confirmation_template_id
    ): void {
        $this->stock_sms_confirmation_template_id = $stock_sms_confirmation_template_id;
    }

    /**
     * @param bool|null $group_warning_account
     */
    public function setGroupWarningAccount(?bool $group_warning_account): void
    {
        $this->group_warning_account = $group_warning_account;
    }

    /**
     * @param bool|null $group_cash_rounding
     */
    public function setGroupCashRounding(?bool $group_cash_rounding): void
    {
        $this->group_cash_rounding = $group_cash_rounding;
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
     *
     * @SerializedName("module_account_check_printing")
     */
    public function isModuleAccountCheckPrinting(): ?bool
    {
        return $this->module_account_check_printing;
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
     * @SerializedName("module_account_yodlee")
     */
    public function isModuleAccountYodlee(): ?bool
    {
        return $this->module_account_yodlee;
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
     * @SerializedName("module_account_plaid")
     */
    public function isModuleAccountPlaid(): ?bool
    {
        return $this->module_account_plaid;
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
     * @SerializedName("module_account_sepa_direct_debit")
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
     *
     * @SerializedName("module_account_sepa")
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
     *
     * @SerializedName("module_account_batch_payment")
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
     * @param bool|null $module_account_budget
     */
    public function setModuleAccountBudget(?bool $module_account_budget): void
    {
        $this->module_account_budget = $module_account_budget;
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
     * @param bool|null $group_show_line_subtotals_tax_included
     */
    public function setGroupShowLineSubtotalsTaxIncluded(
        ?bool $group_show_line_subtotals_tax_included
    ): void {
        $this->group_show_line_subtotals_tax_included = $group_show_line_subtotals_tax_included;
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
     * @SerializedName("group_show_line_subtotals_tax_excluded")
     */
    public function isGroupShowLineSubtotalsTaxExcluded(): ?bool
    {
        return $this->group_show_line_subtotals_tax_excluded;
    }

    /**
     * @param bool|null $group_fiscal_year
     */
    public function setGroupFiscalYear(?bool $group_fiscal_year): void
    {
        $this->group_fiscal_year = $group_fiscal_year;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("stock_sms_confirmation_template_id")
     */
    public function getStockSmsConfirmationTemplateId(): ?OdooRelation
    {
        return $this->stock_sms_confirmation_template_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("stock_move_sms_validation")
     */
    public function isStockMoveSmsValidation(): ?bool
    {
        return $this->stock_move_sms_validation;
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
     * @return bool|null
     *
     * @SerializedName("module_hr_attendance")
     */
    public function isModuleHrAttendance(): ?bool
    {
        return $this->module_hr_attendance;
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
     *
     * @SerializedName("module_product_expiry")
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
     * @return string|null
     *
     * @SerializedName("module_procurement_jit")
     */
    public function getModuleProcurementJit(): ?string
    {
        return $this->module_procurement_jit;
    }

    /**
     * @param bool|null $hr_employee_self_edit
     */
    public function setHrEmployeeSelfEdit(?bool $hr_employee_self_edit): void
    {
        $this->hr_employee_self_edit = $hr_employee_self_edit;
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
     * @param string|null $hr_presence_control_ip_list
     */
    public function setHrPresenceControlIpList(?string $hr_presence_control_ip_list): void
    {
        $this->hr_presence_control_ip_list = $hr_presence_control_ip_list;
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
     * @param bool|null $hr_presence_control_ip
     */
    public function setHrPresenceControlIp(?bool $hr_presence_control_ip): void
    {
        $this->hr_presence_control_ip = $hr_presence_control_ip;
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
     *
     * @SerializedName("hr_presence_control_ip")
     */
    public function isHrPresenceControlIp(): ?bool
    {
        return $this->hr_presence_control_ip;
    }

    /**
     * @param bool|null $hr_presence_control_email
     */
    public function setHrPresenceControlEmail(?bool $hr_presence_control_email): void
    {
        $this->hr_presence_control_email = $hr_presence_control_email;
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
     * @param bool|null $module_hr_org_chart
     */
    public function setModuleHrOrgChart(?bool $module_hr_org_chart): void
    {
        $this->module_hr_org_chart = $module_hr_org_chart;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_hr_org_chart")
     */
    public function isModuleHrOrgChart(): ?bool
    {
        return $this->module_hr_org_chart;
    }

    /**
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_stock_production_lot")
     */
    public function isGroupStockProductionLot(): ?bool
    {
        return $this->group_stock_production_lot;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_lot_on_delivery_slip")
     */
    public function isGroupLotOnDeliverySlip(): ?bool
    {
        return $this->group_lot_on_delivery_slip;
    }

    /**
     * @param OdooRelation|null $digest_id
     */
    public function setDigestId(?OdooRelation $digest_id): void
    {
        $this->digest_id = $digest_id;
    }

    /**
     * @param bool|null $stock_move_email_validation
     */
    public function setStockMoveEmailValidation(?bool $stock_move_email_validation): void
    {
        $this->stock_move_email_validation = $stock_move_email_validation;
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
     * @param bool|null $digest_emails
     */
    public function setDigestEmails(?bool $digest_emails): void
    {
        $this->digest_emails = $digest_emails;
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
     * @param bool|null $group_stock_multi_warehouses
     */
    public function setGroupStockMultiWarehouses(?bool $group_stock_multi_warehouses): void
    {
        $this->group_stock_multi_warehouses = $group_stock_multi_warehouses;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_stock_multi_warehouses")
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
     *
     * @SerializedName("group_stock_multi_locations")
     */
    public function isGroupStockMultiLocations(): ?bool
    {
        return $this->group_stock_multi_locations;
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
     *
     * @SerializedName("module_stock_sms")
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
     *
     * @SerializedName("stock_mail_confirmation_template_id")
     */
    public function getStockMailConfirmationTemplateId(): ?OdooRelation
    {
        return $this->stock_mail_confirmation_template_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("stock_move_email_validation")
     */
    public function isStockMoveEmailValidation(): ?bool
    {
        return $this->stock_move_email_validation;
    }

    /**
     * @param bool|null $group_lot_on_delivery_slip
     */
    public function setGroupLotOnDeliverySlip(?bool $group_lot_on_delivery_slip): void
    {
        $this->group_lot_on_delivery_slip = $group_lot_on_delivery_slip;
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
     *
     * @SerializedName("module_stock_barcode")
     */
    public function isModuleStockBarcode(): ?bool
    {
        return $this->module_stock_barcode;
    }

    /**
     * @param bool|null $module_stock_picking_batch
     */
    public function setModuleStockPickingBatch(?bool $module_stock_picking_batch): void
    {
        $this->module_stock_picking_batch = $module_stock_picking_batch;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("module_stock_picking_batch")
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
     *
     * @SerializedName("group_warning_stock")
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
     *
     * @SerializedName("group_stock_adv_location")
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
     *
     * @SerializedName("group_stock_tracking_owner")
     */
    public function isGroupStockTrackingOwner(): ?bool
    {
        return $this->group_stock_tracking_owner;
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
     *
     * @SerializedName("group_stock_tracking_lot")
     */
    public function isGroupStockTrackingLot(): ?bool
    {
        return $this->group_stock_tracking_lot;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.settings';
    }
}
