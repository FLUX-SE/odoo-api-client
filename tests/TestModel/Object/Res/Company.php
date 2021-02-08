<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Res;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.company
 * ---
 * Name : res.company
 * ---
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
final class Company extends Base
{
    /**
     * Company Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * ---
     * Used to order Companies in the company switcher
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Parent Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Child Companies
     * ---
     * Relation : one2many (res.company -> parent_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_ids;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Company Tagline
     * ---
     * Appears by default on the top right corner of your printed documents (report header).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $report_header;

    /**
     * Report Footer
     * ---
     * Footer text displayed at the bottom of all reports.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $report_footer;

    /**
     * Company Logo
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $logo;

    /**
     * Logo Web
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $logo_web;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Accepted Users
     * ---
     * Relation : many2many (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $user_ids;

    /**
     * Street
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $street;

    /**
     * Street2
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $street2;

    /**
     * Zip
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $zip;

    /**
     * City
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $city;

    /**
     * Fed. State
     * ---
     * Relation : many2one (res.country.state)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country\State
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $state_id;

    /**
     * Bank Accounts
     * ---
     * Bank accounts related to this company
     * ---
     * Relation : one2many (res.partner.bank -> company_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $bank_ids;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email;

    /**
     * Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $phone;

    /**
     * Website Link
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $website;

    /**
     * Tax ID
     * ---
     * The Tax Identification Number. Complete it if the contact is subjected to government taxes. Used in some legal
     * statements.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $vat;

    /**
     * Company Registry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $company_registry;

    /**
     * Paper format
     * ---
     * Relation : many2one (report.paperformat)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Report\Paperformat
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Document Template
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $external_report_layout_id;

    /**
     * State of the onboarding company step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $base_onboarding_company_state;

    /**
     * Company Favicon
     * ---
     * This field holds the image used to display a favicon for a given company.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $favicon;

    /**
     * Font
     * ---
     * Selection :
     *     -> Lato (Lato)
     *     -> Roboto (Roboto)
     *     -> Open_Sans (Open Sans)
     *     -> Montserrat (Montserrat)
     *     -> Oswald (Oswald)
     *     -> Raleway (Raleway)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $font;

    /**
     * Primary Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $primary_color;

    /**
     * Secondary Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $secondary_color;

    /**
     * Working Hours
     * ---
     * Relation : one2many (resource.calendar -> company_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $resource_calendar_ids;

    /**
     * Default Working Hours
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Catchall Email
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $catchall_email;

    /**
     * Catchall
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $catchall_formatted;

    /**
     * Formatted Email
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $email_formatted;

    /**
     * # emails to send
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $hr_presence_control_email_amount;

    /**
     * Valid IP addresses
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $hr_presence_control_ip_list;

    /**
     * Company database ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $partner_gid;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $snailmail_color;

    /**
     * Add a Cover Page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $snailmail_cover;

    /**
     * Both sides
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $snailmail_duplex;

    /**
     * Fiscalyear Last Day
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $period_lock_date;

    /**
     * Lock Date
     * ---
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $tax_lock_date;

    /**
     * Inter-Banks Transfer Account
     * ---
     * Intermediary account used when moving money from a liquidity account to another
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $transfer_account_id;

    /**
     * Expects a Chart of Accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $expects_chart_of_accounts;

    /**
     * Chart Template
     * ---
     * The chart template for the company (if any)
     * ---
     * Relation : many2one (account.chart.template)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Chart\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $chart_template_id;

    /**
     * Prefix of the bank accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $bank_account_code_prefix;

    /**
     * Prefix of the cash accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $cash_account_code_prefix;

    /**
     * Cash Difference Income Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_cash_difference_expense_account_id;

    /**
     * Journal Suspense Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_journal_suspense_account_id;

    /**
     * Prefix of the transfer accounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $transfer_account_code_prefix;

    /**
     * Default Sale Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_sale_tax_id;

    /**
     * Default Purchase Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_purchase_tax_id;

    /**
     * Tax Calculation Rounding Method
     * ---
     * Selection :
     *     -> round_per_line (Round per Line)
     *     -> round_globally (Round Globally)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $tax_calculation_rounding_method;

    /**
     * Exchange Gain or Loss Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_exchange_journal_id;

    /**
     * Gain Exchange Rate Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $expense_currency_exchange_account_id;

    /**
     * Use anglo-saxon accounting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $anglo_saxon_accounting;

    /**
     * Input Account for Stock Valuation
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $property_stock_valuation_account_id;

    /**
     * Bank Journals
     * ---
     * Relation : one2many (account.journal -> company_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $bank_journal_ids;

    /**
     * Use Cash Basis
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_exigibility;

    /**
     * Fiscal Country
     * ---
     * The country to use the tax reports from for this company
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_tax_fiscal_country_id;

    /**
     * Default incoterm
     * ---
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * ---
     * Relation : many2one (account.incoterms)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Incoterms
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $incoterm_id;

    /**
     * Display QR-code on invoices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $qr_code;

    /**
     * Email by default
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $invoice_is_email;

    /**
     * Print by default
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $invoice_is_print;

    /**
     * Opening Journal Entry
     * ---
     * The journal entry containing the initial balance of all this company's accounts.
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_opening_move_id;

    /**
     * Opening Journal
     * ---
     * Journal where the opening entry of this company's accounting has been posted.
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_opening_journal_id;

    /**
     * Opening Entry
     * ---
     * That is the date of the opening entry.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $account_opening_date;

    /**
     * State of the onboarding bank data step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_setup_bank_data_state;

    /**
     * State of the onboarding fiscal year step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_setup_fy_data_state;

    /**
     * State of the onboarding charts of account step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_setup_coa_state;

    /**
     * State of the onboarding invoice layout step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_onboarding_invoice_layout_state;

    /**
     * State of the onboarding create invoice step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_onboarding_create_invoice_state;

    /**
     * State of the onboarding sale tax step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_onboarding_sale_tax_state;

    /**
     * State of the account invoice onboarding panel
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     *     -> closed (Closed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_invoice_onboarding_state;

    /**
     * State of the account dashboard onboarding panel
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     *     -> closed (Closed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_dashboard_onboarding_state;

    /**
     * Default Terms and Conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_terms;

    /**
     * State of the onboarding bill step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_setup_bill_state;

    /**
     * Default PoS Receivable Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_default_pos_receivable_account_id;

    /**
     * Expense Accrual Account
     * ---
     * Account used to move the period of an expense
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $expense_accrual_account_id;

    /**
     * Revenue Accrual Account
     * ---
     * Account used to move the period of a revenue
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $revenue_accrual_account_id;

    /**
     * Automatic Entry Default Journal
     * ---
     * Journal used by default for moving the period of an entry
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $automatic_entry_default_journal_id;

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
     * Cash Basis Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_cash_basis_base_account_id;

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
     * Sortable : yes
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
     * Sortable : yes
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
     * Sortable : yes
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
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var float|null
     */
    private $account_check_printing_margin_left;

    /**
     * Right Margin
     * ---
     * Adjust the margins of generated checks to make it fit your printer's settings.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $account_check_printing_margin_right;

    /**
     * Send mode on invoices attachments
     * ---
     * Selection :
     *     -> no_send (Do not digitalize bills)
     *     -> manual_send (Digitalize bills on demand only)
     *     -> auto_send (Digitalize all bills automatically)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $extract_single_line_per_tax;

    /**
     * Verify VAT Numbers
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var string|null
     */
    private $currency_interval_unit;

    /**
     * Next Execution Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $currency_next_execution_date;

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
     * Sortable : yes
     *
     * @var string|null
     */
    private $currency_provider;

    /**
     * State of the onboarding payment acquirer step
     * ---
     * Selection :
     *     -> not_done (Not done)
     *     -> just_done (Just done)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_acquirer_onboarding_state;

    /**
     * Selected onboarding payment method
     * ---
     * Selection :
     *     -> paypal (PayPal)
     *     -> stripe (Stripe)
     *     -> manual (Manual)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_onboarding_payment_method;

    /**
     * Send by Post
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $invoice_is_snailmail;

    /**
     * access_token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $yodlee_access_token;

    /**
     * Yodlee login
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $yodlee_user_login;

    /**
     * Yodlee password
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $yodlee_user_password;

    /**
     * Yodlee access token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $yodlee_user_access_token;

    /**
     * Sequence to use to build sale closings
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $l10n_fr_closing_sequence_id;

    /**
     * SIRET
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $siret;

    /**
     * APE
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ape;

    /**
     * Plafond de la Securite Sociale
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $plafond_secu;

    /**
     * Nombre d'employes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nombre_employes;

    /**
     * Cotisation Patronale Prevoyance
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $cotisation_prevoyance;

    /**
     * Organisme de securite sociale
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $org_ss;

    /**
     * Convention collective
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $conv_coll;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Company Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Partner
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     *        ---
     *        Searchable : yes
     *        Sortable : yes
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
     *        Sortable : yes
     * @param DateTimeInterface $account_opening_date Opening Entry
     *        ---
     *        That is the date of the opening entry.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $partner_id,
        OdooRelation $currency_id,
        int $fiscalyear_last_day,
        string $fiscalyear_last_month,
        DateTimeInterface $account_opening_date
    ) {
        $this->name = $name;
        $this->partner_id = $partner_id;
        $this->currency_id = $currency_id;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->account_opening_date = $account_opening_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_dashboard_onboarding_state")
     */
    public function getAccountDashboardOnboardingState(): ?string
    {
        return $this->account_dashboard_onboarding_state;
    }

    /**
     * @param string|null $account_setup_bank_data_state
     */
    public function setAccountSetupBankDataState(?string $account_setup_bank_data_state): void
    {
        $this->account_setup_bank_data_state = $account_setup_bank_data_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_setup_fy_data_state")
     */
    public function getAccountSetupFyDataState(): ?string
    {
        return $this->account_setup_fy_data_state;
    }

    /**
     * @param string|null $account_setup_fy_data_state
     */
    public function setAccountSetupFyDataState(?string $account_setup_fy_data_state): void
    {
        $this->account_setup_fy_data_state = $account_setup_fy_data_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_setup_coa_state")
     */
    public function getAccountSetupCoaState(): ?string
    {
        return $this->account_setup_coa_state;
    }

    /**
     * @param string|null $account_setup_coa_state
     */
    public function setAccountSetupCoaState(?string $account_setup_coa_state): void
    {
        $this->account_setup_coa_state = $account_setup_coa_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_onboarding_invoice_layout_state")
     */
    public function getAccountOnboardingInvoiceLayoutState(): ?string
    {
        return $this->account_onboarding_invoice_layout_state;
    }

    /**
     * @param string|null $account_onboarding_invoice_layout_state
     */
    public function setAccountOnboardingInvoiceLayoutState(
        ?string $account_onboarding_invoice_layout_state
    ): void {
        $this->account_onboarding_invoice_layout_state = $account_onboarding_invoice_layout_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_onboarding_create_invoice_state")
     */
    public function getAccountOnboardingCreateInvoiceState(): ?string
    {
        return $this->account_onboarding_create_invoice_state;
    }

    /**
     * @param string|null $account_onboarding_create_invoice_state
     */
    public function setAccountOnboardingCreateInvoiceState(
        ?string $account_onboarding_create_invoice_state
    ): void {
        $this->account_onboarding_create_invoice_state = $account_onboarding_create_invoice_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_onboarding_sale_tax_state")
     */
    public function getAccountOnboardingSaleTaxState(): ?string
    {
        return $this->account_onboarding_sale_tax_state;
    }

    /**
     * @param string|null $account_onboarding_sale_tax_state
     */
    public function setAccountOnboardingSaleTaxState(?string $account_onboarding_sale_tax_state): void
    {
        $this->account_onboarding_sale_tax_state = $account_onboarding_sale_tax_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_invoice_onboarding_state")
     */
    public function getAccountInvoiceOnboardingState(): ?string
    {
        return $this->account_invoice_onboarding_state;
    }

    /**
     * @param string|null $account_invoice_onboarding_state
     */
    public function setAccountInvoiceOnboardingState(?string $account_invoice_onboarding_state): void
    {
        $this->account_invoice_onboarding_state = $account_invoice_onboarding_state;
    }

    /**
     * @param string|null $account_dashboard_onboarding_state
     */
    public function setAccountDashboardOnboardingState(?string $account_dashboard_onboarding_state): void
    {
        $this->account_dashboard_onboarding_state = $account_dashboard_onboarding_state;
    }

    /**
     * @param DateTimeInterface $account_opening_date
     */
    public function setAccountOpeningDate(DateTimeInterface $account_opening_date): void
    {
        $this->account_opening_date = $account_opening_date;
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
     * @return string|null
     *
     * @SerializedName("account_setup_bill_state")
     */
    public function getAccountSetupBillState(): ?string
    {
        return $this->account_setup_bill_state;
    }

    /**
     * @param string|null $account_setup_bill_state
     */
    public function setAccountSetupBillState(?string $account_setup_bill_state): void
    {
        $this->account_setup_bill_state = $account_setup_bill_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_default_pos_receivable_account_id")
     */
    public function getAccountDefaultPosReceivableAccountId(): ?OdooRelation
    {
        return $this->account_default_pos_receivable_account_id;
    }

    /**
     * @param OdooRelation|null $account_default_pos_receivable_account_id
     */
    public function setAccountDefaultPosReceivableAccountId(
        ?OdooRelation $account_default_pos_receivable_account_id
    ): void {
        $this->account_default_pos_receivable_account_id = $account_default_pos_receivable_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("expense_accrual_account_id")
     */
    public function getExpenseAccrualAccountId(): ?OdooRelation
    {
        return $this->expense_accrual_account_id;
    }

    /**
     * @param OdooRelation|null $expense_accrual_account_id
     */
    public function setExpenseAccrualAccountId(?OdooRelation $expense_accrual_account_id): void
    {
        $this->expense_accrual_account_id = $expense_accrual_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("revenue_accrual_account_id")
     */
    public function getRevenueAccrualAccountId(): ?OdooRelation
    {
        return $this->revenue_accrual_account_id;
    }

    /**
     * @param OdooRelation|null $revenue_accrual_account_id
     */
    public function setRevenueAccrualAccountId(?OdooRelation $revenue_accrual_account_id): void
    {
        $this->revenue_accrual_account_id = $revenue_accrual_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("automatic_entry_default_journal_id")
     */
    public function getAutomaticEntryDefaultJournalId(): ?OdooRelation
    {
        return $this->automatic_entry_default_journal_id;
    }

    /**
     * @param OdooRelation|null $automatic_entry_default_journal_id
     */
    public function setAutomaticEntryDefaultJournalId(
        ?OdooRelation $automatic_entry_default_journal_id
    ): void {
        $this->automatic_entry_default_journal_id = $automatic_entry_default_journal_id;
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
     * @SerializedName("account_setup_bank_data_state")
     */
    public function getAccountSetupBankDataState(): ?string
    {
        return $this->account_setup_bank_data_state;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("account_opening_date")
     */
    public function getAccountOpeningDate(): DateTimeInterface
    {
        return $this->account_opening_date;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_journal_id
     */
    public function setTaxCashBasisJournalId(?OdooRelation $tax_cash_basis_journal_id): void
    {
        $this->tax_cash_basis_journal_id = $tax_cash_basis_journal_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeBankJournalIds(OdooRelation $item): void
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
     * @param OdooRelation|null $expense_currency_exchange_account_id
     */
    public function setExpenseCurrencyExchangeAccountId(
        ?OdooRelation $expense_currency_exchange_account_id
    ): void {
        $this->expense_currency_exchange_account_id = $expense_currency_exchange_account_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("anglo_saxon_accounting")
     */
    public function isAngloSaxonAccounting(): ?bool
    {
        return $this->anglo_saxon_accounting;
    }

    /**
     * @param bool|null $anglo_saxon_accounting
     */
    public function setAngloSaxonAccounting(?bool $anglo_saxon_accounting): void
    {
        $this->anglo_saxon_accounting = $anglo_saxon_accounting;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_stock_account_input_categ_id")
     */
    public function getPropertyStockAccountInputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_input_categ_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("property_stock_account_output_categ_id")
     */
    public function getPropertyStockAccountOutputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_output_categ_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("property_stock_valuation_account_id")
     */
    public function getPropertyStockValuationAccountId(): ?OdooRelation
    {
        return $this->property_stock_valuation_account_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("bank_journal_ids")
     */
    public function getBankJournalIds(): ?array
    {
        return $this->bank_journal_ids;
    }

    /**
     * @param OdooRelation[]|null $bank_journal_ids
     */
    public function setBankJournalIds(?array $bank_journal_ids): void
    {
        $this->bank_journal_ids = $bank_journal_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasBankJournalIds(OdooRelation $item): bool
    {
        if (null === $this->bank_journal_ids) {
            return false;
        }

        return in_array($item, $this->bank_journal_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addBankJournalIds(OdooRelation $item): void
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
     * @return bool|null
     *
     * @SerializedName("tax_exigibility")
     */
    public function isTaxExigibility(): ?bool
    {
        return $this->tax_exigibility;
    }

    /**
     * @param OdooRelation|null $account_opening_journal_id
     */
    public function setAccountOpeningJournalId(?OdooRelation $account_opening_journal_id): void
    {
        $this->account_opening_journal_id = $account_opening_journal_id;
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
     * @SerializedName("account_tax_fiscal_country_id")
     */
    public function getAccountTaxFiscalCountryId(): ?OdooRelation
    {
        return $this->account_tax_fiscal_country_id;
    }

    /**
     * @param OdooRelation|null $account_tax_fiscal_country_id
     */
    public function setAccountTaxFiscalCountryId(?OdooRelation $account_tax_fiscal_country_id): void
    {
        $this->account_tax_fiscal_country_id = $account_tax_fiscal_country_id;
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
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
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
     * @SerializedName("invoice_is_email")
     */
    public function isInvoiceIsEmail(): ?bool
    {
        return $this->invoice_is_email;
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
     * @return OdooRelation|null
     *
     * @SerializedName("account_opening_move_id")
     */
    public function getAccountOpeningMoveId(): ?OdooRelation
    {
        return $this->account_opening_move_id;
    }

    /**
     * @param OdooRelation|null $account_opening_move_id
     */
    public function setAccountOpeningMoveId(?OdooRelation $account_opening_move_id): void
    {
        $this->account_opening_move_id = $account_opening_move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_opening_journal_id")
     */
    public function getAccountOpeningJournalId(): ?OdooRelation
    {
        return $this->account_opening_journal_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("account_cash_basis_base_account_id")
     */
    public function getAccountCashBasisBaseAccountId(): ?OdooRelation
    {
        return $this->account_cash_basis_base_account_id;
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
     * @return int|null
     *
     * @SerializedName("nombre_employes")
     */
    public function getNombreEmployes(): ?int
    {
        return $this->nombre_employes;
    }

    /**
     * @param string|null $yodlee_user_login
     */
    public function setYodleeUserLogin(?string $yodlee_user_login): void
    {
        $this->yodlee_user_login = $yodlee_user_login;
    }

    /**
     * @return string|null
     *
     * @SerializedName("yodlee_user_password")
     */
    public function getYodleeUserPassword(): ?string
    {
        return $this->yodlee_user_password;
    }

    /**
     * @param string|null $yodlee_user_password
     */
    public function setYodleeUserPassword(?string $yodlee_user_password): void
    {
        $this->yodlee_user_password = $yodlee_user_password;
    }

    /**
     * @return string|null
     *
     * @SerializedName("yodlee_user_access_token")
     */
    public function getYodleeUserAccessToken(): ?string
    {
        return $this->yodlee_user_access_token;
    }

    /**
     * @param string|null $yodlee_user_access_token
     */
    public function setYodleeUserAccessToken(?string $yodlee_user_access_token): void
    {
        $this->yodlee_user_access_token = $yodlee_user_access_token;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("l10n_fr_closing_sequence_id")
     */
    public function getL10nFrClosingSequenceId(): ?OdooRelation
    {
        return $this->l10n_fr_closing_sequence_id;
    }

    /**
     * @param OdooRelation|null $l10n_fr_closing_sequence_id
     */
    public function setL10nFrClosingSequenceId(?OdooRelation $l10n_fr_closing_sequence_id): void
    {
        $this->l10n_fr_closing_sequence_id = $l10n_fr_closing_sequence_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("siret")
     */
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * @param string|null $siret
     */
    public function setSiret(?string $siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ape")
     */
    public function getApe(): ?string
    {
        return $this->ape;
    }

    /**
     * @param string|null $ape
     */
    public function setApe(?string $ape): void
    {
        $this->ape = $ape;
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
     * @param float|null $plafond_secu
     */
    public function setPlafondSecu(?float $plafond_secu): void
    {
        $this->plafond_secu = $plafond_secu;
    }

    /**
     * @param int|null $nombre_employes
     */
    public function setNombreEmployes(?int $nombre_employes): void
    {
        $this->nombre_employes = $nombre_employes;
    }

    /**
     * @param string|null $yodlee_access_token
     */
    public function setYodleeAccessToken(?string $yodlee_access_token): void
    {
        $this->yodlee_access_token = $yodlee_access_token;
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
     * @param float|null $cotisation_prevoyance
     */
    public function setCotisationPrevoyance(?float $cotisation_prevoyance): void
    {
        $this->cotisation_prevoyance = $cotisation_prevoyance;
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
     * @param string|null $org_ss
     */
    public function setOrgSs(?string $org_ss): void
    {
        $this->org_ss = $org_ss;
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
     * @param string|null $conv_coll
     */
    public function setConvColl(?string $conv_coll): void
    {
        $this->conv_coll = $conv_coll;
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
     * @return string|null
     *
     * @SerializedName("yodlee_user_login")
     */
    public function getYodleeUserLogin(): ?string
    {
        return $this->yodlee_user_login;
    }

    /**
     * @return string|null
     *
     * @SerializedName("yodlee_access_token")
     */
    public function getYodleeAccessToken(): ?string
    {
        return $this->yodlee_access_token;
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
     * @param string|null $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(?string $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
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
     * @return float|null
     *
     * @SerializedName("account_check_printing_margin_top")
     */
    public function getAccountCheckPrintingMarginTop(): ?float
    {
        return $this->account_check_printing_margin_top;
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
     * @return string|null
     *
     * @SerializedName("extract_show_ocr_option_selection")
     */
    public function getExtractShowOcrOptionSelection(): ?string
    {
        return $this->extract_show_ocr_option_selection;
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
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
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
     * @return string|null
     *
     * @SerializedName("payment_acquirer_onboarding_state")
     */
    public function getPaymentAcquirerOnboardingState(): ?string
    {
        return $this->payment_acquirer_onboarding_state;
    }

    /**
     * @param string|null $payment_acquirer_onboarding_state
     */
    public function setPaymentAcquirerOnboardingState(?string $payment_acquirer_onboarding_state): void
    {
        $this->payment_acquirer_onboarding_state = $payment_acquirer_onboarding_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_onboarding_payment_method")
     */
    public function getPaymentOnboardingPaymentMethod(): ?string
    {
        return $this->payment_onboarding_payment_method;
    }

    /**
     * @param string|null $payment_onboarding_payment_method
     */
    public function setPaymentOnboardingPaymentMethod(?string $payment_onboarding_payment_method): void
    {
        $this->payment_onboarding_payment_method = $payment_onboarding_payment_method;
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
     * @return OdooRelation|null
     *
     * @SerializedName("expense_currency_exchange_account_id")
     */
    public function getExpenseCurrencyExchangeAccountId(): ?OdooRelation
    {
        return $this->expense_currency_exchange_account_id;
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("city")
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("state_id")
     */
    public function getStateId(): ?OdooRelation
    {
        return $this->state_id;
    }

    /**
     * @param OdooRelation|null $state_id
     */
    public function setStateId(?OdooRelation $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("bank_ids")
     */
    public function getBankIds(): ?array
    {
        return $this->bank_ids;
    }

    /**
     * @param OdooRelation[]|null $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasBankIds(OdooRelation $item): bool
    {
        if (null === $this->bank_ids) {
            return false;
        }

        return in_array($item, $this->bank_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addBankIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeBankIds(OdooRelation $item): void
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
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email")
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("zip")
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return string|null
     *
     * @SerializedName("website")
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     *
     * @SerializedName("vat")
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @param string|null $vat
     */
    public function setVat(?string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return string|null
     *
     * @SerializedName("company_registry")
     */
    public function getCompanyRegistry(): ?string
    {
        return $this->company_registry;
    }

    /**
     * @param string|null $company_registry
     */
    public function setCompanyRegistry(?string $company_registry): void
    {
        $this->company_registry = $company_registry;
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
     * @return string|null
     *
     * @SerializedName("base_onboarding_company_state")
     */
    public function getBaseOnboardingCompanyState(): ?string
    {
        return $this->base_onboarding_company_state;
    }

    /**
     * @param string|null $base_onboarding_company_state
     */
    public function setBaseOnboardingCompanyState(?string $base_onboarding_company_state): void
    {
        $this->base_onboarding_company_state = $base_onboarding_company_state;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("favicon")
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * @param mixed|null $favicon
     */
    public function setFavicon($favicon): void
    {
        $this->favicon = $favicon;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param string|null $font
     */
    public function setFont(?string $font): void
    {
        $this->font = $font;
    }

    /**
     * @param string|null $report_header
     */
    public function setReportHeader(?string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_ids")
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
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
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("report_header")
     */
    public function getReportHeader(): ?string
    {
        return $this->report_header;
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
     * @return string|null
     *
     * @SerializedName("street2")
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("logo")
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed|null $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("logo_web")
     */
    public function getLogoWeb()
    {
        return $this->logo_web;
    }

    /**
     * @param mixed|null $logo_web
     */
    public function setLogoWeb($logo_web): void
    {
        $this->logo_web = $logo_web;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("user_ids")
     */
    public function getUserIds(): ?array
    {
        return $this->user_ids;
    }

    /**
     * @param OdooRelation[]|null $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUserIds(OdooRelation $item): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addUserIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeUserIds(OdooRelation $item): void
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
     * @return string|null
     *
     * @SerializedName("street")
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     *
     * @SerializedName("font")
     */
    public function getFont(): ?string
    {
        return $this->font;
    }

    /**
     * @return string|null
     *
     * @SerializedName("primary_color")
     */
    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    /**
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @param string|null $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(?string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
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
     * @param DateTimeInterface|null $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
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
     * @param DateTimeInterface|null $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
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
     * @param OdooRelation|null $transfer_account_id
     */
    public function setTransferAccountId(?OdooRelation $transfer_account_id): void
    {
        $this->transfer_account_id = $transfer_account_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("expects_chart_of_accounts")
     */
    public function isExpectsChartOfAccounts(): ?bool
    {
        return $this->expects_chart_of_accounts;
    }

    /**
     * @param bool|null $expects_chart_of_accounts
     */
    public function setExpectsChartOfAccounts(?bool $expects_chart_of_accounts): void
    {
        $this->expects_chart_of_accounts = $expects_chart_of_accounts;
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
     * @return string|null
     *
     * @SerializedName("bank_account_code_prefix")
     */
    public function getBankAccountCodePrefix(): ?string
    {
        return $this->bank_account_code_prefix;
    }

    /**
     * @param string|null $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(?string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @return string|null
     *
     * @SerializedName("cash_account_code_prefix")
     */
    public function getCashAccountCodePrefix(): ?string
    {
        return $this->cash_account_code_prefix;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_cash_difference_income_account_id")
     */
    public function getDefaultCashDifferenceIncomeAccountId(): ?OdooRelation
    {
        return $this->default_cash_difference_income_account_id;
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
     * @param OdooRelation|null $default_cash_difference_income_account_id
     */
    public function setDefaultCashDifferenceIncomeAccountId(
        ?OdooRelation $default_cash_difference_income_account_id
    ): void {
        $this->default_cash_difference_income_account_id = $default_cash_difference_income_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_cash_difference_expense_account_id")
     */
    public function getDefaultCashDifferenceExpenseAccountId(): ?OdooRelation
    {
        return $this->default_cash_difference_expense_account_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("account_journal_suspense_account_id")
     */
    public function getAccountJournalSuspenseAccountId(): ?OdooRelation
    {
        return $this->account_journal_suspense_account_id;
    }

    /**
     * @param OdooRelation|null $account_journal_suspense_account_id
     */
    public function setAccountJournalSuspenseAccountId(
        ?OdooRelation $account_journal_suspense_account_id
    ): void {
        $this->account_journal_suspense_account_id = $account_journal_suspense_account_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("transfer_account_code_prefix")
     */
    public function getTransferAccountCodePrefix(): ?string
    {
        return $this->transfer_account_code_prefix;
    }

    /**
     * @param string|null $transfer_account_code_prefix
     */
    public function setTransferAccountCodePrefix(?string $transfer_account_code_prefix): void
    {
        $this->transfer_account_code_prefix = $transfer_account_code_prefix;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_sale_tax_id")
     */
    public function getAccountSaleTaxId(): ?OdooRelation
    {
        return $this->account_sale_tax_id;
    }

    /**
     * @param OdooRelation|null $account_sale_tax_id
     */
    public function setAccountSaleTaxId(?OdooRelation $account_sale_tax_id): void
    {
        $this->account_sale_tax_id = $account_sale_tax_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_purchase_tax_id")
     */
    public function getAccountPurchaseTaxId(): ?OdooRelation
    {
        return $this->account_purchase_tax_id;
    }

    /**
     * @param OdooRelation|null $account_purchase_tax_id
     */
    public function setAccountPurchaseTaxId(?OdooRelation $account_purchase_tax_id): void
    {
        $this->account_purchase_tax_id = $account_purchase_tax_id;
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
     * @param string|null $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?string $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
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
     * @param DateTimeInterface|null $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param string $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(string $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @param string|null $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_formatted")
     */
    public function getEmailFormatted(): ?string
    {
        return $this->email_formatted;
    }

    /**
     * @return string|null
     *
     * @SerializedName("secondary_color")
     */
    public function getSecondaryColor(): ?string
    {
        return $this->secondary_color;
    }

    /**
     * @param string|null $secondary_color
     */
    public function setSecondaryColor(?string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("resource_calendar_ids")
     */
    public function getResourceCalendarIds(): ?array
    {
        return $this->resource_calendar_ids;
    }

    /**
     * @param OdooRelation[]|null $resource_calendar_ids
     */
    public function setResourceCalendarIds(?array $resource_calendar_ids): void
    {
        $this->resource_calendar_ids = $resource_calendar_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasResourceCalendarIds(OdooRelation $item): bool
    {
        if (null === $this->resource_calendar_ids) {
            return false;
        }

        return in_array($item, $this->resource_calendar_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addResourceCalendarIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeResourceCalendarIds(OdooRelation $item): void
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
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("catchall_email")
     */
    public function getCatchallEmail(): ?string
    {
        return $this->catchall_email;
    }

    /**
     * @param string|null $catchall_email
     */
    public function setCatchallEmail(?string $catchall_email): void
    {
        $this->catchall_email = $catchall_email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("catchall_formatted")
     */
    public function getCatchallFormatted(): ?string
    {
        return $this->catchall_formatted;
    }

    /**
     * @param string|null $catchall_formatted
     */
    public function setCatchallFormatted(?string $catchall_formatted): void
    {
        $this->catchall_formatted = $catchall_formatted;
    }

    /**
     * @param string|null $email_formatted
     */
    public function setEmailFormatted(?string $email_formatted): void
    {
        $this->email_formatted = $email_formatted;
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
     * @return int|null
     *
     * @SerializedName("hr_presence_control_email_amount")
     */
    public function getHrPresenceControlEmailAmount(): ?int
    {
        return $this->hr_presence_control_email_amount;
    }

    /**
     * @param int|null $hr_presence_control_email_amount
     */
    public function setHrPresenceControlEmailAmount(?int $hr_presence_control_email_amount): void
    {
        $this->hr_presence_control_email_amount = $hr_presence_control_email_amount;
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
     * @param string|null $hr_presence_control_ip_list
     */
    public function setHrPresenceControlIpList(?string $hr_presence_control_ip_list): void
    {
        $this->hr_presence_control_ip_list = $hr_presence_control_ip_list;
    }

    /**
     * @return int|null
     *
     * @SerializedName("partner_gid")
     */
    public function getPartnerGid(): ?int
    {
        return $this->partner_gid;
    }

    /**
     * @param int|null $partner_gid
     */
    public function setPartnerGid(?int $partner_gid): void
    {
        $this->partner_gid = $partner_gid;
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
     * @return int
     *
     * @SerializedName("fiscalyear_last_day")
     */
    public function getFiscalyearLastDay(): int
    {
        return $this->fiscalyear_last_day;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.company';
    }
}
