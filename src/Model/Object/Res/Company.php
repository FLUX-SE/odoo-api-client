<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @var array|null
     */
    private $logo;

    /**
     * Logo Web
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var array|null
     */
    private $logo_web;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $user_ids;

    /**
     * Account No.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_no;

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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country\State
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
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
     * @see \Flux\OdooApiClient\Model\Object\Report\Paperformat
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
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
     * @var array|null
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
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
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
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
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
    private $catchall;

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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Chart\Template
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_cash_difference_expense_account_id;

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
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_purchase_tax_id;

    /**
     * Cash Basis Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_cash_basis_journal_id;

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
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
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
     * It acts as a default account for credit amount
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $income_currency_exchange_account_id;

    /**
     * Loss Exchange Rate Account
     * ---
     * It acts as a default account for debit amount
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
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
     * Bank Reconciliation Threshold
     * ---
     * The bank reconciliation widget won't ask to reconcile payments older than this date.
     *
     * This is useful if you install accounting after having used invoicing for some time and
     *
     * don't want to reconcile all the past payments with bank statements.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $account_bank_reconciliation_start;

    /**
     * Default incoterm
     * ---
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * ---
     * Relation : many2one (account.incoterms)
     * @see \Flux\OdooApiClient\Model\Object\Account\Incoterms
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $incoterm_id;

    /**
     * Display SEPA QR code
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $account_opening_journal_id;

    /**
     * Opening Date
     * ---
     * Date at which the opening entry of this company's accounting has been posted.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
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
     * State of the onboarding sample invoice step
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
    private $account_onboarding_sample_invoice_state;

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
     * Default PoS Receivable Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $revenue_accrual_account_id;

    /**
     * Accrual Default Journal
     * ---
     * Journal used by default for moving the period of an entry
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $accrual_default_journal_id;

    /**
     * Check Layout
     * ---
     * Select the format corresponding to the check paper you will be printing your checks on.
     * In order to disable the printing feature, select 'None'.
     * ---
     * Selection :
     *     -> disabled (None)
     *     -> action_print_check_top (check on top)
     *     -> action_print_check_middle (check in middle)
     *     -> action_print_check_bottom (check on bottom)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $account_check_printing_layout;

    /**
     * Print Date Label
     * ---
     * This option allows you to print the date label on the check as per CPA. Disable this if your pre-printed check
     * includes the date label.
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
     * @var string
     */
    private $extract_show_ocr_option_selection;

    /**
     * OCR Single Invoice Line Per Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
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
     * Online Signature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $portal_confirmation_sign;

    /**
     * Online Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $portal_confirmation_pay;

    /**
     * Default Quotation Validity (Days)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $quotation_validity_days;

    /**
     * State of the sale onboarding panel
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
    private $sale_quotation_onboarding_state;

    /**
     * State of the onboarding confirmation order step
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
    private $sale_onboarding_order_confirmation_state;

    /**
     * State of the onboarding sample quotation step
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
    private $sale_onboarding_sample_quotation_state;

    /**
     * Sale onboarding selected payment method
     * ---
     * Selection :
     *     -> digital_signature (Sign online)
     *     -> paypal (PayPal)
     *     -> stripe (Stripe)
     *     -> other (Pay with another payment acquirer)
     *     -> manual (Manual Payment)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sale_onboarding_payment_method;

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
     * @param string $name Company Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Partner
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
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
     * @param string $account_check_printing_layout Check Layout
     *        ---
     *        Select the format corresponding to the check paper you will be printing your checks on.
     *        In order to disable the printing feature, select 'None'.
     *        ---
     *        Selection :
     *            -> disabled (None)
     *            -> action_print_check_top (check on top)
     *            -> action_print_check_middle (check in middle)
     *            -> action_print_check_bottom (check on bottom)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $extract_show_ocr_option_selection Send mode on invoices attachments
     *        ---
     *        Selection :
     *            -> no_send (Do not digitalize bills)
     *            -> manual_send (Digitalize bills on demand only)
     *            -> auto_send (Digitalize all bills automatically)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param bool $extract_single_line_per_tax OCR Single Invoice Line Per Tax
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
        string $account_check_printing_layout,
        string $extract_show_ocr_option_selection,
        bool $extract_single_line_per_tax
    ) {
        $this->name = $name;
        $this->partner_id = $partner_id;
        $this->currency_id = $currency_id;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
        $this->account_check_printing_layout = $account_check_printing_layout;
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
        $this->extract_single_line_per_tax = $extract_single_line_per_tax;
    }

    /**
     * @param string|null $account_onboarding_sale_tax_state
     */
    public function setAccountOnboardingSaleTaxState(?string $account_onboarding_sale_tax_state): void
    {
        $this->account_onboarding_sale_tax_state = $account_onboarding_sale_tax_state;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("account_opening_date")
     */
    public function getAccountOpeningDate(): ?DateTimeInterface
    {
        return $this->account_opening_date;
    }

    /**
     * @param DateTimeInterface|null $account_opening_date
     */
    public function setAccountOpeningDate(?DateTimeInterface $account_opening_date): void
    {
        $this->account_opening_date = $account_opening_date;
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
     * @SerializedName("account_onboarding_sample_invoice_state")
     */
    public function getAccountOnboardingSampleInvoiceState(): ?string
    {
        return $this->account_onboarding_sample_invoice_state;
    }

    /**
     * @param string|null $account_onboarding_sample_invoice_state
     */
    public function setAccountOnboardingSampleInvoiceState(
        ?string $account_onboarding_sample_invoice_state
    ): void {
        $this->account_onboarding_sample_invoice_state = $account_onboarding_sample_invoice_state;
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
     * @return string|null
     *
     * @SerializedName("account_invoice_onboarding_state")
     */
    public function getAccountInvoiceOnboardingState(): ?string
    {
        return $this->account_invoice_onboarding_state;
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
     * @param string|null $account_invoice_onboarding_state
     */
    public function setAccountInvoiceOnboardingState(?string $account_invoice_onboarding_state): void
    {
        $this->account_invoice_onboarding_state = $account_invoice_onboarding_state;
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
     * @param string|null $account_dashboard_onboarding_state
     */
    public function setAccountDashboardOnboardingState(?string $account_dashboard_onboarding_state): void
    {
        $this->account_dashboard_onboarding_state = $account_dashboard_onboarding_state;
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
     * @SerializedName("accrual_default_journal_id")
     */
    public function getAccrualDefaultJournalId(): ?OdooRelation
    {
        return $this->accrual_default_journal_id;
    }

    /**
     * @param OdooRelation|null $accrual_default_journal_id
     */
    public function setAccrualDefaultJournalId(?OdooRelation $accrual_default_journal_id): void
    {
        $this->accrual_default_journal_id = $accrual_default_journal_id;
    }

    /**
     * @param OdooRelation|null $account_opening_journal_id
     */
    public function setAccountOpeningJournalId(?OdooRelation $account_opening_journal_id): void
    {
        $this->account_opening_journal_id = $account_opening_journal_id;
    }

    /**
     * @param OdooRelation|null $account_opening_move_id
     */
    public function setAccountOpeningMoveId(?OdooRelation $account_opening_move_id): void
    {
        $this->account_opening_move_id = $account_opening_move_id;
    }

    /**
     * @param string $account_check_printing_layout
     */
    public function setAccountCheckPrintingLayout(string $account_check_printing_layout): void
    {
        $this->account_check_printing_layout = $account_check_printing_layout;
    }

    /**
     * @param OdooRelation[]|null $bank_journal_ids
     */
    public function setBankJournalIds(?array $bank_journal_ids): void
    {
        $this->bank_journal_ids = $bank_journal_ids;
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
     * @SerializedName("expense_currency_exchange_account_id")
     */
    public function getExpenseCurrencyExchangeAccountId(): ?OdooRelation
    {
        return $this->expense_currency_exchange_account_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("account_opening_move_id")
     */
    public function getAccountOpeningMoveId(): ?OdooRelation
    {
        return $this->account_opening_move_id;
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
     * @return string
     *
     * @SerializedName("account_check_printing_layout")
     */
    public function getAccountCheckPrintingLayout(): string
    {
        return $this->account_check_printing_layout;
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
     * @return OdooRelation|null
     *
     * @SerializedName("currency_exchange_journal_id")
     */
    public function getCurrencyExchangeJournalId(): ?OdooRelation
    {
        return $this->currency_exchange_journal_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sale_quotation_onboarding_state")
     */
    public function getSaleQuotationOnboardingState(): ?string
    {
        return $this->sale_quotation_onboarding_state;
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
     * @return bool|null
     *
     * @SerializedName("portal_confirmation_sign")
     */
    public function isPortalConfirmationSign(): ?bool
    {
        return $this->portal_confirmation_sign;
    }

    /**
     * @param bool|null $portal_confirmation_sign
     */
    public function setPortalConfirmationSign(?bool $portal_confirmation_sign): void
    {
        $this->portal_confirmation_sign = $portal_confirmation_sign;
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
     * @param bool|null $portal_confirmation_pay
     */
    public function setPortalConfirmationPay(?bool $portal_confirmation_pay): void
    {
        $this->portal_confirmation_pay = $portal_confirmation_pay;
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
     * @param int|null $quotation_validity_days
     */
    public function setQuotationValidityDays(?int $quotation_validity_days): void
    {
        $this->quotation_validity_days = $quotation_validity_days;
    }

    /**
     * @param string|null $sale_quotation_onboarding_state
     */
    public function setSaleQuotationOnboardingState(?string $sale_quotation_onboarding_state): void
    {
        $this->sale_quotation_onboarding_state = $sale_quotation_onboarding_state;
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
     * @SerializedName("sale_onboarding_order_confirmation_state")
     */
    public function getSaleOnboardingOrderConfirmationState(): ?string
    {
        return $this->sale_onboarding_order_confirmation_state;
    }

    /**
     * @param string|null $sale_onboarding_order_confirmation_state
     */
    public function setSaleOnboardingOrderConfirmationState(
        ?string $sale_onboarding_order_confirmation_state
    ): void {
        $this->sale_onboarding_order_confirmation_state = $sale_onboarding_order_confirmation_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sale_onboarding_sample_quotation_state")
     */
    public function getSaleOnboardingSampleQuotationState(): ?string
    {
        return $this->sale_onboarding_sample_quotation_state;
    }

    /**
     * @param string|null $sale_onboarding_sample_quotation_state
     */
    public function setSaleOnboardingSampleQuotationState(
        ?string $sale_onboarding_sample_quotation_state
    ): void {
        $this->sale_onboarding_sample_quotation_state = $sale_onboarding_sample_quotation_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sale_onboarding_payment_method")
     */
    public function getSaleOnboardingPaymentMethod(): ?string
    {
        return $this->sale_onboarding_payment_method;
    }

    /**
     * @param string|null $sale_onboarding_payment_method
     */
    public function setSaleOnboardingPaymentMethod(?string $sale_onboarding_payment_method): void
    {
        $this->sale_onboarding_payment_method = $sale_onboarding_payment_method;
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
     * @SerializedName("yodlee_user_access_token")
     */
    public function getYodleeUserAccessToken(): ?string
    {
        return $this->yodlee_user_access_token;
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
     * @param bool|null $account_check_printing_date_label
     */
    public function setAccountCheckPrintingDateLabel(?bool $account_check_printing_date_label): void
    {
        $this->account_check_printing_date_label = $account_check_printing_date_label;
    }

    /**
     * @param bool|null $vat_check_vies
     */
    public function setVatCheckVies(?bool $vat_check_vies): void
    {
        $this->vat_check_vies = $vat_check_vies;
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
     * @return string
     *
     * @SerializedName("extract_show_ocr_option_selection")
     */
    public function getExtractShowOcrOptionSelection(): string
    {
        return $this->extract_show_ocr_option_selection;
    }

    /**
     * @param string $extract_show_ocr_option_selection
     */
    public function setExtractShowOcrOptionSelection(string $extract_show_ocr_option_selection): void
    {
        $this->extract_show_ocr_option_selection = $extract_show_ocr_option_selection;
    }

    /**
     * @return bool
     *
     * @SerializedName("extract_single_line_per_tax")
     */
    public function isExtractSingleLinePerTax(): bool
    {
        return $this->extract_single_line_per_tax;
    }

    /**
     * @param bool $extract_single_line_per_tax
     */
    public function setExtractSingleLinePerTax(bool $extract_single_line_per_tax): void
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
     * @return string|null
     *
     * @SerializedName("currency_interval_unit")
     */
    public function getCurrencyIntervalUnit(): ?string
    {
        return $this->currency_interval_unit;
    }

    /**
     * @param string|null $yodlee_user_login
     */
    public function setYodleeUserLogin(?string $yodlee_user_login): void
    {
        $this->yodlee_user_login = $yodlee_user_login;
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
     * @param bool|null $invoice_is_snailmail
     */
    public function setInvoiceIsSnailmail(?bool $invoice_is_snailmail): void
    {
        $this->invoice_is_snailmail = $invoice_is_snailmail;
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
     * @param string|null $yodlee_access_token
     */
    public function setYodleeAccessToken(?string $yodlee_access_token): void
    {
        $this->yodlee_access_token = $yodlee_access_token;
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
     * @param OdooRelation|null $currency_exchange_journal_id
     */
    public function setCurrencyExchangeJournalId(?OdooRelation $currency_exchange_journal_id): void
    {
        $this->currency_exchange_journal_id = $currency_exchange_journal_id;
    }

    /**
     * @param string|null $tax_calculation_rounding_method
     */
    public function setTaxCalculationRoundingMethod(?string $tax_calculation_rounding_method): void
    {
        $this->tax_calculation_rounding_method = $tax_calculation_rounding_method;
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
     * @param OdooRelation[]|null $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_no")
     */
    public function getAccountNo(): ?string
    {
        return $this->account_no;
    }

    /**
     * @param string|null $account_no
     */
    public function setAccountNo(?string $account_no): void
    {
        $this->account_no = $account_no;
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
     * @SerializedName("street2")
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
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
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
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
     * @return string|null
     *
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
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
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
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
     * @param OdooRelation[]|null $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return array|null
     *
     * @SerializedName("logo")
     */
    public function getLogo(): ?array
    {
        return $this->logo;
    }

    /**
     * @param array|null $logo
     */
    public function setLogo(?array $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasLogo($item): bool
    {
        if (null === $this->logo) {
            return false;
        }

        return in_array($item, $this->logo);
    }

    /**
     * @param mixed $item
     */
    public function addLogo($item): void
    {
        if ($this->hasLogo($item)) {
            return;
        }

        if (null === $this->logo) {
            $this->logo = [];
        }

        $this->logo[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeLogo($item): void
    {
        if (null === $this->logo) {
            $this->logo = [];
        }

        if ($this->hasLogo($item)) {
            $index = array_search($item, $this->logo);
            unset($this->logo[$index]);
        }
    }

    /**
     * @return array|null
     *
     * @SerializedName("logo_web")
     */
    public function getLogoWeb(): ?array
    {
        return $this->logo_web;
    }

    /**
     * @param array|null $logo_web
     */
    public function setLogoWeb(?array $logo_web): void
    {
        $this->logo_web = $logo_web;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasLogoWeb($item): bool
    {
        if (null === $this->logo_web) {
            return false;
        }

        return in_array($item, $this->logo_web);
    }

    /**
     * @param mixed $item
     */
    public function addLogoWeb($item): void
    {
        if ($this->hasLogoWeb($item)) {
            return;
        }

        if (null === $this->logo_web) {
            $this->logo_web = [];
        }

        $this->logo_web[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeLogoWeb($item): void
    {
        if (null === $this->logo_web) {
            $this->logo_web = [];
        }

        if ($this->hasLogoWeb($item)) {
            $index = array_search($item, $this->logo_web);
            unset($this->logo_web[$index]);
        }
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
     * @return OdooRelation|null
     *
     * @SerializedName("paperformat_id")
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
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
     * @return string|null
     *
     * @SerializedName("tax_calculation_rounding_method")
     */
    public function getTaxCalculationRoundingMethod(): ?string
    {
        return $this->tax_calculation_rounding_method;
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
     * @param string $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(string $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
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
     * @param DateTimeInterface|null $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
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
     * @param string|null $bank_account_code_prefix
     */
    public function setBankAccountCodePrefix(?string $bank_account_code_prefix): void
    {
        $this->bank_account_code_prefix = $bank_account_code_prefix;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
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
     * @param string|null $cash_account_code_prefix
     */
    public function setCashAccountCodePrefix(?string $cash_account_code_prefix): void
    {
        $this->cash_account_code_prefix = $cash_account_code_prefix;
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
     * @return string
     *
     * @SerializedName("fiscalyear_last_month")
     */
    public function getFiscalyearLastMonth(): string
    {
        return $this->fiscalyear_last_month;
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
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
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
     * @return array|null
     *
     * @SerializedName("favicon")
     */
    public function getFavicon(): ?array
    {
        return $this->favicon;
    }

    /**
     * @param array|null $favicon
     */
    public function setFavicon(?array $favicon): void
    {
        $this->favicon = $favicon;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasFavicon($item): bool
    {
        if (null === $this->favicon) {
            return false;
        }

        return in_array($item, $this->favicon);
    }

    /**
     * @param mixed $item
     */
    public function addFavicon($item): void
    {
        if ($this->hasFavicon($item)) {
            return;
        }

        if (null === $this->favicon) {
            $this->favicon = [];
        }

        $this->favicon[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeFavicon($item): void
    {
        if (null === $this->favicon) {
            $this->favicon = [];
        }

        if ($this->hasFavicon($item)) {
            $index = array_search($item, $this->favicon);
            unset($this->favicon[$index]);
        }
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
     * @param string|null $font
     */
    public function setFont(?string $font): void
    {
        $this->font = $font;
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
     * @param string|null $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
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
     * @param OdooRelation[]|null $resource_calendar_ids
     */
    public function setResourceCalendarIds(?array $resource_calendar_ids): void
    {
        $this->resource_calendar_ids = $resource_calendar_ids;
    }

    /**
     * @param bool|null $snailmail_duplex
     */
    public function setSnailmailDuplex(?bool $snailmail_duplex): void
    {
        $this->snailmail_duplex = $snailmail_duplex;
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
     * @SerializedName("catchall")
     */
    public function getCatchall(): ?string
    {
        return $this->catchall;
    }

    /**
     * @param string|null $catchall
     */
    public function setCatchall(?string $catchall): void
    {
        $this->catchall = $catchall;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.company';
    }
}
