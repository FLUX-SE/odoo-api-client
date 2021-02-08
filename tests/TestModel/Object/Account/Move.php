<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.move
 * ---
 * Name : account.move
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
class Move extends Base
{
    /**
     * Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $name;

    /**
     * Highest Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $highest_name;

    /**
     * Show Name Warning
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $show_name_warning;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    protected $date;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $ref;

    /**
     * Terms and Conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $narration;

    /**
     * Status
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> posted (Posted)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $state;

    /**
     * Posted Before
     * ---
     * Technical field for knowing if the move has been posted before
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $posted_before;

    /**
     * Type
     * ---
     * Selection :
     *     -> entry (Journal Entry)
     *     -> out_invoice (Customer Invoice)
     *     -> out_refund (Customer Credit Note)
     *     -> in_invoice (Vendor Bill)
     *     -> in_refund (Vendor Credit Note)
     *     -> out_receipt (Sales Receipt)
     *     -> in_receipt (Purchase Receipt)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $move_type;

    /**
     * Type Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $type_name;

    /**
     * To Check
     * ---
     * If this checkbox is ticked, it means that the user was not sure of all the related information at the time of
     * the creation of the move and that the move needs to be checked again.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $to_check;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $journal_id;

    /**
     * Suitable Journal
     * ---
     * Relation : many2many (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $suitable_journal_ids;

    /**
     * Company
     * ---
     * Company related to this journal
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $company_id;

    /**
     * Company Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $company_currency_id;

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
    protected $currency_id;

    /**
     * Journal Items
     * ---
     * Relation : one2many (account.move.line -> move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $line_ids;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $partner_id;

    /**
     * Commercial Entity
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $commercial_partner_id;

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
    protected $country_code;

    /**
     * User
     * ---
     * Technical field used to fit the generic behavior in mail templates.
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $user_id;

    /**
     * Is Move Sent
     * ---
     * It indicates that the invoice/payment has been sent.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $is_move_sent;

    /**
     * Recipient Bank
     * ---
     * Bank Account Number to which the invoice will be paid. A Company bank account if this is a Customer Invoice or
     * Vendor Credit Note, otherwise a Partner bank account number.
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $partner_bank_id;

    /**
     * Payment Reference
     * ---
     * The payment reference to set on journal items.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $payment_reference;

    /**
     * Payment
     * ---
     * Relation : many2one (account.payment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $payment_id;

    /**
     * Statement Line
     * ---
     * Relation : many2one (account.bank.statement.line)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $statement_line_id;

    /**
     * Untaxed Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_untaxed;

    /**
     * Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_tax;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_total;

    /**
     * Amount Due
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_residual;

    /**
     * Untaxed Amount Signed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_untaxed_signed;

    /**
     * Tax Signed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_tax_signed;

    /**
     * Total Signed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_total_signed;

    /**
     * Amount Due Signed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $amount_residual_signed;

    /**
     * Tax amount by group
     * ---
     * Edit Tax amounts if you encounter rounding issues.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $amount_by_group;

    /**
     * Payment Status
     * ---
     * Selection :
     *     -> not_paid (Not Paid)
     *     -> in_payment (In Payment)
     *     -> paid (Paid)
     *     -> partial (Partially Paid)
     *     -> reversed (Reversed)
     *     -> invoicing_legacy (Invoicing App Legacy)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $payment_state;

    /**
     * Tax Cash Basis Entry of
     * ---
     * Technical field used to keep track of the tax cash basis reconciliation. This is needed when cancelling the
     * source: it will post the inverse journal entry to cancel that part too.
     * ---
     * Relation : many2one (account.partial.reconcile)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Partial\Reconcile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $tax_cash_basis_rec_id;

    /**
     * Origin Tax Cash Basis Entry
     * ---
     * The journal entry from which this tax cash basis journal entry has been created.
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $tax_cash_basis_move_id;

    /**
     * Post Automatically
     * ---
     * If this checkbox is ticked, this entry will be automatically posted at its date.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $auto_post;

    /**
     * Reversal of
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $reversed_entry_id;

    /**
     * Reversal Move
     * ---
     * Relation : one2many (account.move -> reversed_entry_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $reversal_move_id;

    /**
     * Fiscal Position
     * ---
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices. The
     * default value comes from the customer.
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $fiscal_position_id;

    /**
     * Salesperson
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $invoice_user_id;

    /**
     * Invoice/Bill Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $invoice_date;

    /**
     * Due Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $invoice_date_due;

    /**
     * Origin
     * ---
     * The document(s) that generated the invoice.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $invoice_origin;

    /**
     * Payment Terms
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $invoice_payment_term_id;

    /**
     * Invoice lines
     * ---
     * Relation : one2many (account.move.line -> move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $invoice_line_ids;

    /**
     * Incoterm
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
    protected $invoice_incoterm_id;

    /**
     * Display QR-code
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $display_qr_code;

    /**
     * Payment QR-code
     * ---
     * Type of QR-code to be generated for the payment of this invoice, when printing it. If left blank, the first
     * available and usable method will be used.
     * ---
     * Selection :
     *     -> sct_qr (SEPA Credit Transfer QR)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $qr_code_method;

    /**
     * Invoice Outstanding Credits Debits Widget
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $invoice_outstanding_credits_debits_widget;

    /**
     * Invoice Has Outstanding
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $invoice_has_outstanding;

    /**
     * Invoice Payments Widget
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $invoice_payments_widget;

    /**
     * Vendor Bill
     * ---
     * Auto-complete from a past bill.
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $invoice_vendor_bill_id;

    /**
     * Source Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $invoice_source_email;

    /**
     * Invoice Partner Display Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $invoice_partner_display_name;

    /**
     * Cash Rounding Method
     * ---
     * Defines the smallest coinage of the currency that can be used to pay by cash.
     * ---
     * Relation : many2one (account.cash.rounding)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Cash\Rounding
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $invoice_cash_rounding_id;

    /**
     * Invoice Filter Type Domain
     * ---
     * Technical field used to have a dynamic domain on journal / taxes in the form view.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $invoice_filter_type_domain;

    /**
     * Bank Partner
     * ---
     * Technical field to get the domain on the bank
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $bank_partner_id;

    /**
     * Invoice Has Matching Suspense Amount
     * ---
     * Technical field used to display an alert on invoices if there is at least a matching amount in any supsense
     * account.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $invoice_has_matching_suspense_amount;

    /**
     * Tax Lock Date Message
     * ---
     * Technical field used to display a message when the invoice's accounting date is prior of the tax lock date.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $tax_lock_date_message;

    /**
     * Has Reconciled Entries
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $has_reconciled_entries;

    /**
     * Show Reset To Draft Button
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $show_reset_to_draft_button;

    /**
     * Lock Posted Entries with Hash
     * ---
     * If ticked, the accounting entry or invoice receives a hash as soon as it is posted and cannot be modified
     * anymore.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $restrict_mode_hash_table;

    /**
     * Inalteralbility No Gap Sequence #
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $secure_sequence_number;

    /**
     * Inalterability Hash
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $inalterable_hash;

    /**
     * String To Hash
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $string_to_hash;

    /**
     * Preferred Payment Method
     * ---
     * Relation : many2one (account.payment.method)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $preferred_payment_method_id;

    /**
     * Edi Document
     * ---
     * Relation : one2many (account.edi.document -> move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Edi\Document
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $edi_document_ids;

    /**
     * Electronic invoicing
     * ---
     * The aggregated state of all the EDIs of this move
     * ---
     * Selection :
     *     -> to_send (To Send)
     *     -> sent (Sent)
     *     -> to_cancel (To Cancel)
     *     -> cancelled (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $edi_state;

    /**
     * Edi Error Count
     * ---
     * How many EDIs are in error for this move ?
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $edi_error_count;

    /**
     * Edi Web Services To Process
     * ---
     * Technical field to display the documents that will be processed by the CRON
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $edi_web_services_to_process;

    /**
     * Edi Show Cancel Button
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $edi_show_cancel_button;

    /**
     * Duplicated vendor reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $duplicated_vendor_ref;

    /**
     * Extract state
     * ---
     * Selection :
     *     -> no_extract_requested (No extract requested)
     *     -> not_enough_credit (Not enough credit)
     *     -> error_status (An error occurred)
     *     -> waiting_extraction (Waiting extraction)
     *     -> extract_not_ready (waiting extraction, but it is not ready)
     *     -> waiting_validation (Waiting validation)
     *     -> done (Completed flow)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $extract_state;

    /**
     * Status code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $extract_status_code;

    /**
     * Error message
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $extract_error_message;

    /**
     * Id of the request to IAP-OCR
     * ---
     * Invoice extract id
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $extract_remote_id;

    /**
     * Extract Word
     * ---
     * Relation : one2many (account.invoice_extract.words -> invoice_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\InvoiceExtract\Words
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $extract_word_ids;

    /**
     * Can show the ocr resend button
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $extract_can_show_resend_button;

    /**
     * Can show the ocr send button
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $extract_can_show_send_button;

    /**
     * Transactions
     * ---
     * Relation : many2many (payment.transaction)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Payment\Transaction
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $transaction_ids;

    /**
     * Authorized Transactions
     * ---
     * Relation : many2many (payment.transaction)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Payment\Transaction
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $authorized_transaction_ids;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $activity_ids;

    /**
     * Activity State
     * ---
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * ---
     * Selection :
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_state;

    /**
     * Responsible User
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Activity Type Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_type_icon;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     * ---
     * Type of the exception activity on record.
     * ---
     * Selection :
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     * ---
     * Icon to indicate an exception activity.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_is_follower;

    /**
     * Followers
     * ---
     * Relation : one2many (mail.followers -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Followers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     * ---
     * Relation : many2many (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     * ---
     * Relation : many2many (mail.channel)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_channel_ids;

    /**
     * Messages
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_ids;

    /**
     * Unread Messages
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     * ---
     * Number of unread messages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_needaction;

    /**
     * Number of Actions
     * ---
     * Number of messages which requires an action
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_error;

    /**
     * Number of errors
     * ---
     * Number of messages with delivery error
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_sms_error;

    /**
     * Portal Access URL
     * ---
     * Customer Portal URL
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $access_url;

    /**
     * Security Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $access_token;

    /**
     * Access warning
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $access_warning;

    /**
     * Sequence Prefix
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sequence_prefix;

    /**
     * Sequence Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence_number;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        ---
     *        Selection :
     *            -> draft (Draft)
     *            -> posted (Posted)
     *            -> cancel (Cancelled)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $move_type Type
     *        ---
     *        Selection :
     *            -> entry (Journal Entry)
     *            -> out_invoice (Customer Invoice)
     *            -> out_refund (Customer Credit Note)
     *            -> in_invoice (Vendor Bill)
     *            -> in_refund (Vendor Credit Note)
     *            -> out_receipt (Sales Receipt)
     *            -> in_receipt (Purchase Receipt)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
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
     * @param string $extract_state Extract state
     *        ---
     *        Selection :
     *            -> no_extract_requested (No extract requested)
     *            -> not_enough_credit (Not enough credit)
     *            -> error_status (An error occurred)
     *            -> waiting_extraction (Waiting extraction)
     *            -> extract_not_ready (waiting extraction, but it is not ready)
     *            -> waiting_validation (Waiting validation)
     *            -> done (Completed flow)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        DateTimeInterface $date,
        string $state,
        string $move_type,
        OdooRelation $journal_id,
        OdooRelation $currency_id,
        string $extract_state
    ) {
        $this->date = $date;
        $this->state = $state;
        $this->move_type = $move_type;
        $this->journal_id = $journal_id;
        $this->currency_id = $currency_id;
        $this->extract_state = $extract_state;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAuthorizedTransactionIds(OdooRelation $item): void
    {
        if ($this->hasAuthorizedTransactionIds($item)) {
            return;
        }

        if (null === $this->authorized_transaction_ids) {
            $this->authorized_transaction_ids = [];
        }

        $this->authorized_transaction_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function addExtractWordIds(OdooRelation $item): void
    {
        if ($this->hasExtractWordIds($item)) {
            return;
        }

        if (null === $this->extract_word_ids) {
            $this->extract_word_ids = [];
        }

        $this->extract_word_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExtractWordIds(OdooRelation $item): void
    {
        if (null === $this->extract_word_ids) {
            $this->extract_word_ids = [];
        }

        if ($this->hasExtractWordIds($item)) {
            $index = array_search($item, $this->extract_word_ids);
            unset($this->extract_word_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("extract_can_show_resend_button")
     */
    public function isExtractCanShowResendButton(): ?bool
    {
        return $this->extract_can_show_resend_button;
    }

    /**
     * @param bool|null $extract_can_show_resend_button
     */
    public function setExtractCanShowResendButton(?bool $extract_can_show_resend_button): void
    {
        $this->extract_can_show_resend_button = $extract_can_show_resend_button;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("extract_can_show_send_button")
     */
    public function isExtractCanShowSendButton(): ?bool
    {
        return $this->extract_can_show_send_button;
    }

    /**
     * @param bool|null $extract_can_show_send_button
     */
    public function setExtractCanShowSendButton(?bool $extract_can_show_send_button): void
    {
        $this->extract_can_show_send_button = $extract_can_show_send_button;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("transaction_ids")
     */
    public function getTransactionIds(): ?array
    {
        return $this->transaction_ids;
    }

    /**
     * @param OdooRelation[]|null $transaction_ids
     */
    public function setTransactionIds(?array $transaction_ids): void
    {
        $this->transaction_ids = $transaction_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTransactionIds(OdooRelation $item): bool
    {
        if (null === $this->transaction_ids) {
            return false;
        }

        return in_array($item, $this->transaction_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTransactionIds(OdooRelation $item): void
    {
        if ($this->hasTransactionIds($item)) {
            return;
        }

        if (null === $this->transaction_ids) {
            $this->transaction_ids = [];
        }

        $this->transaction_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTransactionIds(OdooRelation $item): void
    {
        if (null === $this->transaction_ids) {
            $this->transaction_ids = [];
        }

        if ($this->hasTransactionIds($item)) {
            $index = array_search($item, $this->transaction_ids);
            unset($this->transaction_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("authorized_transaction_ids")
     */
    public function getAuthorizedTransactionIds(): ?array
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param OdooRelation[]|null $authorized_transaction_ids
     */
    public function setAuthorizedTransactionIds(?array $authorized_transaction_ids): void
    {
        $this->authorized_transaction_ids = $authorized_transaction_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAuthorizedTransactionIds(OdooRelation $item): bool
    {
        if (null === $this->authorized_transaction_ids) {
            return false;
        }

        return in_array($item, $this->authorized_transaction_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAuthorizedTransactionIds(OdooRelation $item): void
    {
        if (null === $this->authorized_transaction_ids) {
            $this->authorized_transaction_ids = [];
        }

        if ($this->hasAuthorizedTransactionIds($item)) {
            $index = array_search($item, $this->authorized_transaction_ids);
            unset($this->authorized_transaction_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $extract_word_ids
     */
    public function setExtractWordIds(?array $extract_word_ids): void
    {
        $this->extract_word_ids = $extract_word_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasActivityIds(OdooRelation $item): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addActivityIds(OdooRelation $item): void
    {
        if ($this->hasActivityIds($item)) {
            return;
        }

        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        $this->activity_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeActivityIds(OdooRelation $item): void
    {
        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        if ($this->hasActivityIds($item)) {
            $index = array_search($item, $this->activity_ids);
            unset($this->activity_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_state")
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_type_icon")
     */
    public function getActivityTypeIcon(): ?string
    {
        return $this->activity_type_icon;
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExtractWordIds(OdooRelation $item): bool
    {
        if (null === $this->extract_word_ids) {
            return false;
        }

        return in_array($item, $this->extract_word_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("extract_word_ids")
     */
    public function getExtractWordIds(): ?array
    {
        return $this->extract_word_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_summary")
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("edi_state")
     */
    public function getEdiState(): ?string
    {
        return $this->edi_state;
    }

    /**
     * @param bool|null $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(?bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
    }

    /**
     * @return int|null
     *
     * @SerializedName("secure_sequence_number")
     */
    public function getSecureSequenceNumber(): ?int
    {
        return $this->secure_sequence_number;
    }

    /**
     * @param int|null $secure_sequence_number
     */
    public function setSecureSequenceNumber(?int $secure_sequence_number): void
    {
        $this->secure_sequence_number = $secure_sequence_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("inalterable_hash")
     */
    public function getInalterableHash(): ?string
    {
        return $this->inalterable_hash;
    }

    /**
     * @param string|null $inalterable_hash
     */
    public function setInalterableHash(?string $inalterable_hash): void
    {
        $this->inalterable_hash = $inalterable_hash;
    }

    /**
     * @return string|null
     *
     * @SerializedName("string_to_hash")
     */
    public function getStringToHash(): ?string
    {
        return $this->string_to_hash;
    }

    /**
     * @param string|null $string_to_hash
     */
    public function setStringToHash(?string $string_to_hash): void
    {
        $this->string_to_hash = $string_to_hash;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("preferred_payment_method_id")
     */
    public function getPreferredPaymentMethodId(): ?OdooRelation
    {
        return $this->preferred_payment_method_id;
    }

    /**
     * @param OdooRelation|null $preferred_payment_method_id
     */
    public function setPreferredPaymentMethodId(?OdooRelation $preferred_payment_method_id): void
    {
        $this->preferred_payment_method_id = $preferred_payment_method_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("edi_document_ids")
     */
    public function getEdiDocumentIds(): ?array
    {
        return $this->edi_document_ids;
    }

    /**
     * @param OdooRelation[]|null $edi_document_ids
     */
    public function setEdiDocumentIds(?array $edi_document_ids): void
    {
        $this->edi_document_ids = $edi_document_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEdiDocumentIds(OdooRelation $item): bool
    {
        if (null === $this->edi_document_ids) {
            return false;
        }

        return in_array($item, $this->edi_document_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addEdiDocumentIds(OdooRelation $item): void
    {
        if ($this->hasEdiDocumentIds($item)) {
            return;
        }

        if (null === $this->edi_document_ids) {
            $this->edi_document_ids = [];
        }

        $this->edi_document_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEdiDocumentIds(OdooRelation $item): void
    {
        if (null === $this->edi_document_ids) {
            $this->edi_document_ids = [];
        }

        if ($this->hasEdiDocumentIds($item)) {
            $index = array_search($item, $this->edi_document_ids);
            unset($this->edi_document_ids[$index]);
        }
    }

    /**
     * @param string|null $edi_state
     */
    public function setEdiState(?string $edi_state): void
    {
        $this->edi_state = $edi_state;
    }

    /**
     * @param int|null $extract_remote_id
     */
    public function setExtractRemoteId(?int $extract_remote_id): void
    {
        $this->extract_remote_id = $extract_remote_id;
    }

    /**
     * @return string
     *
     * @SerializedName("extract_state")
     */
    public function getExtractState(): string
    {
        return $this->extract_state;
    }

    /**
     * @return int|null
     *
     * @SerializedName("extract_remote_id")
     */
    public function getExtractRemoteId(): ?int
    {
        return $this->extract_remote_id;
    }

    /**
     * @param string|null $extract_error_message
     */
    public function setExtractErrorMessage(?string $extract_error_message): void
    {
        $this->extract_error_message = $extract_error_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("extract_error_message")
     */
    public function getExtractErrorMessage(): ?string
    {
        return $this->extract_error_message;
    }

    /**
     * @param int|null $extract_status_code
     */
    public function setExtractStatusCode(?int $extract_status_code): void
    {
        $this->extract_status_code = $extract_status_code;
    }

    /**
     * @return int|null
     *
     * @SerializedName("extract_status_code")
     */
    public function getExtractStatusCode(): ?int
    {
        return $this->extract_status_code;
    }

    /**
     * @param string $extract_state
     */
    public function setExtractState(string $extract_state): void
    {
        $this->extract_state = $extract_state;
    }

    /**
     * @param string|null $duplicated_vendor_ref
     */
    public function setDuplicatedVendorRef(?string $duplicated_vendor_ref): void
    {
        $this->duplicated_vendor_ref = $duplicated_vendor_ref;
    }

    /**
     * @return int|null
     *
     * @SerializedName("edi_error_count")
     */
    public function getEdiErrorCount(): ?int
    {
        return $this->edi_error_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("duplicated_vendor_ref")
     */
    public function getDuplicatedVendorRef(): ?string
    {
        return $this->duplicated_vendor_ref;
    }

    /**
     * @param bool|null $edi_show_cancel_button
     */
    public function setEdiShowCancelButton(?bool $edi_show_cancel_button): void
    {
        $this->edi_show_cancel_button = $edi_show_cancel_button;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("edi_show_cancel_button")
     */
    public function isEdiShowCancelButton(): ?bool
    {
        return $this->edi_show_cancel_button;
    }

    /**
     * @param string|null $edi_web_services_to_process
     */
    public function setEdiWebServicesToProcess(?string $edi_web_services_to_process): void
    {
        $this->edi_web_services_to_process = $edi_web_services_to_process;
    }

    /**
     * @return string|null
     *
     * @SerializedName("edi_web_services_to_process")
     */
    public function getEdiWebServicesToProcess(): ?string
    {
        return $this->edi_web_services_to_process;
    }

    /**
     * @param int|null $edi_error_count
     */
    public function setEdiErrorCount(?int $edi_error_count): void
    {
        $this->edi_error_count = $edi_error_count;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param bool|null $show_reset_to_draft_button
     */
    public function setShowResetToDraftButton(?bool $show_reset_to_draft_button): void
    {
        $this->show_reset_to_draft_button = $show_reset_to_draft_button;
    }

    /**
     * @param string|null $access_url
     */
    public function setAccessUrl(?string $access_url): void
    {
        $this->access_url = $access_url;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_has_error_counter")
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_attachment_count")
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("message_main_attachment_id")
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(OdooRelation $item): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addWebsiteMessageIds(OdooRelation $item): void
    {
        if ($this->hasWebsiteMessageIds($item)) {
            return;
        }

        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        $this->website_message_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWebsiteMessageIds(OdooRelation $item): void
    {
        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        if ($this->hasWebsiteMessageIds($item)) {
            $index = array_search($item, $this->website_message_ids);
            unset($this->website_message_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_has_sms_error")
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_url")
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_has_error")
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
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
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @param int|null $sequence_number
     */
    public function setSequenceNumber(?int $sequence_number): void
    {
        $this->sequence_number = $sequence_number;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence_number")
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequence_number;
    }

    /**
     * @param string|null $sequence_prefix
     */
    public function setSequencePrefix(?string $sequence_prefix): void
    {
        $this->sequence_prefix = $sequence_prefix;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sequence_prefix")
     */
    public function getSequencePrefix(): ?string
    {
        return $this->sequence_prefix;
    }

    /**
     * @param string|null $access_warning
     */
    public function setAccessWarning(?string $access_warning): void
    {
        $this->access_warning = $access_warning;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_warning")
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessagePartnerIds(OdooRelation $item): void
    {
        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        if ($this->hasMessagePartnerIds($item)) {
            $index = array_search($item, $this->message_partner_ids);
            unset($this->message_partner_ids[$index]);
        }
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_icon")
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_is_follower")
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_follower_ids")
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageFollowerIds(OdooRelation $item): void
    {
        if ($this->hasMessageFollowerIds($item)) {
            return;
        }

        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        $this->message_follower_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageFollowerIds(OdooRelation $item): void
    {
        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        if ($this->hasMessageFollowerIds($item)) {
            $index = array_search($item, $this->message_follower_ids);
            unset($this->message_follower_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_partner_ids")
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessagePartnerIds(OdooRelation $item): bool
    {
        if (null === $this->message_partner_ids) {
            return false;
        }

        return in_array($item, $this->message_partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessagePartnerIds(OdooRelation $item): void
    {
        if ($this->hasMessagePartnerIds($item)) {
            return;
        }

        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        $this->message_partner_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageIds(OdooRelation $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids);
            unset($this->message_ids[$index]);
        }
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_needaction")
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_unread")
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageIds(OdooRelation $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids);
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageChannelIds(OdooRelation $item): void
    {
        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        if ($this->hasMessageChannelIds($item)) {
            $index = array_search($item, $this->message_channel_ids);
            unset($this->message_channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageChannelIds(OdooRelation $item): void
    {
        if ($this->hasMessageChannelIds($item)) {
            return;
        }

        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        $this->message_channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
    }

    /**
     * @return bool|null
     *
     * @SerializedName("restrict_mode_hash_table")
     */
    public function isRestrictModeHashTable(): ?bool
    {
        return $this->restrict_mode_hash_table;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_reset_to_draft_button")
     */
    public function isShowResetToDraftButton(): ?bool
    {
        return $this->show_reset_to_draft_button;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_bank_id")
     */
    public function getPartnerBankId(): ?OdooRelation
    {
        return $this->partner_bank_id;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("commercial_partner_id")
     */
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
    }

    /**
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_move_sent")
     */
    public function isIsMoveSent(): ?bool
    {
        return $this->is_move_sent;
    }

    /**
     * @param bool|null $is_move_sent
     */
    public function setIsMoveSent(?bool $is_move_sent): void
    {
        $this->is_move_sent = $is_move_sent;
    }

    /**
     * @param OdooRelation|null $partner_bank_id
     */
    public function setPartnerBankId(?OdooRelation $partner_bank_id): void
    {
        $this->partner_bank_id = $partner_bank_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_tax")
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_untaxed_signed")
     */
    public function getAmountUntaxedSigned(): ?float
    {
        return $this->amount_untaxed_signed;
    }

    /**
     * @param float|null $amount_residual
     */
    public function setAmountResidual(?float $amount_residual): void
    {
        $this->amount_residual = $amount_residual;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_residual")
     */
    public function getAmountResidual(): ?float
    {
        return $this->amount_residual;
    }

    /**
     * @param float|null $amount_total
     */
    public function setAmountTotal(?float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_total")
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @param float|null $amount_tax
     */
    public function setAmountTax(?float $amount_tax): void
    {
        $this->amount_tax = $amount_tax;
    }

    /**
     * @param float|null $amount_untaxed
     */
    public function setAmountUntaxed(?float $amount_untaxed): void
    {
        $this->amount_untaxed = $amount_untaxed;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_reference")
     */
    public function getPaymentReference(): ?string
    {
        return $this->payment_reference;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_untaxed")
     */
    public function getAmountUntaxed(): ?float
    {
        return $this->amount_untaxed;
    }

    /**
     * @param OdooRelation|null $statement_line_id
     */
    public function setStatementLineId(?OdooRelation $statement_line_id): void
    {
        $this->statement_line_id = $statement_line_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("statement_line_id")
     */
    public function getStatementLineId(): ?OdooRelation
    {
        return $this->statement_line_id;
    }

    /**
     * @param OdooRelation|null $payment_id
     */
    public function setPaymentId(?OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_id")
     */
    public function getPaymentId(): ?OdooRelation
    {
        return $this->payment_id;
    }

    /**
     * @param string|null $payment_reference
     */
    public function setPaymentReference(?string $payment_reference): void
    {
        $this->payment_reference = $payment_reference;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
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
     * @return float|null
     *
     * @SerializedName("amount_tax_signed")
     */
    public function getAmountTaxSigned(): ?float
    {
        return $this->amount_tax_signed;
    }

    /**
     * @param bool|null $posted_before
     */
    public function setPostedBefore(?bool $posted_before): void
    {
        $this->posted_before = $posted_before;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("highest_name")
     */
    public function getHighestName(): ?string
    {
        return $this->highest_name;
    }

    /**
     * @param string|null $highest_name
     */
    public function setHighestName(?string $highest_name): void
    {
        $this->highest_name = $highest_name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_name_warning")
     */
    public function isShowNameWarning(): ?bool
    {
        return $this->show_name_warning;
    }

    /**
     * @param bool|null $show_name_warning
     */
    public function setShowNameWarning(?bool $show_name_warning): void
    {
        $this->show_name_warning = $show_name_warning;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date")
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ref")
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("narration")
     */
    public function getNarration(): ?string
    {
        return $this->narration;
    }

    /**
     * @param string|null $narration
     */
    public function setNarration(?string $narration): void
    {
        $this->narration = $narration;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("posted_before")
     */
    public function isPostedBefore(): ?bool
    {
        return $this->posted_before;
    }

    /**
     * @return string
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): string
    {
        return $this->move_type;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @param OdooRelation[]|null $suitable_journal_ids
     */
    public function setSuitableJournalIds(?array $suitable_journal_ids): void
    {
        $this->suitable_journal_ids = $suitable_journal_ids;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSuitableJournalIds(OdooRelation $item): void
    {
        if (null === $this->suitable_journal_ids) {
            $this->suitable_journal_ids = [];
        }

        if ($this->hasSuitableJournalIds($item)) {
            $index = array_search($item, $this->suitable_journal_ids);
            unset($this->suitable_journal_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSuitableJournalIds(OdooRelation $item): void
    {
        if ($this->hasSuitableJournalIds($item)) {
            return;
        }

        if (null === $this->suitable_journal_ids) {
            $this->suitable_journal_ids = [];
        }

        $this->suitable_journal_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSuitableJournalIds(OdooRelation $item): bool
    {
        if (null === $this->suitable_journal_ids) {
            return false;
        }

        return in_array($item, $this->suitable_journal_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("suitable_journal_ids")
     */
    public function getSuitableJournalIds(): ?array
    {
        return $this->suitable_journal_ids;
    }

    /**
     * @param string $move_type
     */
    public function setMoveType(string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param bool|null $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_check")
     */
    public function isToCheck(): ?bool
    {
        return $this->to_check;
    }

    /**
     * @param string|null $type_name
     */
    public function setTypeName(?string $type_name): void
    {
        $this->type_name = $type_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("type_name")
     */
    public function getTypeName(): ?string
    {
        return $this->type_name;
    }

    /**
     * @param float|null $amount_untaxed_signed
     */
    public function setAmountUntaxedSigned(?float $amount_untaxed_signed): void
    {
        $this->amount_untaxed_signed = $amount_untaxed_signed;
    }

    /**
     * @param float|null $amount_tax_signed
     */
    public function setAmountTaxSigned(?float $amount_tax_signed): void
    {
        $this->amount_tax_signed = $amount_tax_signed;
    }

    /**
     * @param bool|null $has_reconciled_entries
     */
    public function setHasReconciledEntries(?bool $has_reconciled_entries): void
    {
        $this->has_reconciled_entries = $has_reconciled_entries;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_vendor_bill_id")
     */
    public function getInvoiceVendorBillId(): ?OdooRelation
    {
        return $this->invoice_vendor_bill_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceLineIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceLineIds($item)) {
            return;
        }

        if (null === $this->invoice_line_ids) {
            $this->invoice_line_ids = [];
        }

        $this->invoice_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceLineIds(OdooRelation $item): void
    {
        if (null === $this->invoice_line_ids) {
            $this->invoice_line_ids = [];
        }

        if ($this->hasInvoiceLineIds($item)) {
            $index = array_search($item, $this->invoice_line_ids);
            unset($this->invoice_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_incoterm_id")
     */
    public function getInvoiceIncotermId(): ?OdooRelation
    {
        return $this->invoice_incoterm_id;
    }

    /**
     * @param OdooRelation|null $invoice_incoterm_id
     */
    public function setInvoiceIncotermId(?OdooRelation $invoice_incoterm_id): void
    {
        $this->invoice_incoterm_id = $invoice_incoterm_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_qr_code")
     */
    public function isDisplayQrCode(): ?bool
    {
        return $this->display_qr_code;
    }

    /**
     * @param bool|null $display_qr_code
     */
    public function setDisplayQrCode(?bool $display_qr_code): void
    {
        $this->display_qr_code = $display_qr_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("qr_code_method")
     */
    public function getQrCodeMethod(): ?string
    {
        return $this->qr_code_method;
    }

    /**
     * @param string|null $qr_code_method
     */
    public function setQrCodeMethod(?string $qr_code_method): void
    {
        $this->qr_code_method = $qr_code_method;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_outstanding_credits_debits_widget")
     */
    public function getInvoiceOutstandingCreditsDebitsWidget(): ?string
    {
        return $this->invoice_outstanding_credits_debits_widget;
    }

    /**
     * @param string|null $invoice_outstanding_credits_debits_widget
     */
    public function setInvoiceOutstandingCreditsDebitsWidget(
        ?string $invoice_outstanding_credits_debits_widget
    ): void {
        $this->invoice_outstanding_credits_debits_widget = $invoice_outstanding_credits_debits_widget;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("invoice_has_outstanding")
     */
    public function isInvoiceHasOutstanding(): ?bool
    {
        return $this->invoice_has_outstanding;
    }

    /**
     * @param bool|null $invoice_has_outstanding
     */
    public function setInvoiceHasOutstanding(?bool $invoice_has_outstanding): void
    {
        $this->invoice_has_outstanding = $invoice_has_outstanding;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_payments_widget")
     */
    public function getInvoicePaymentsWidget(): ?string
    {
        return $this->invoice_payments_widget;
    }

    /**
     * @param string|null $invoice_payments_widget
     */
    public function setInvoicePaymentsWidget(?string $invoice_payments_widget): void
    {
        $this->invoice_payments_widget = $invoice_payments_widget;
    }

    /**
     * @param OdooRelation|null $invoice_vendor_bill_id
     */
    public function setInvoiceVendorBillId(?OdooRelation $invoice_vendor_bill_id): void
    {
        $this->invoice_vendor_bill_id = $invoice_vendor_bill_id;
    }

    /**
     * @param OdooRelation[]|null $invoice_line_ids
     */
    public function setInvoiceLineIds(?array $invoice_line_ids): void
    {
        $this->invoice_line_ids = $invoice_line_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("bank_partner_id")
     */
    public function getBankPartnerId(): ?OdooRelation
    {
        return $this->bank_partner_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_reconciled_entries")
     */
    public function isHasReconciledEntries(): ?bool
    {
        return $this->has_reconciled_entries;
    }

    /**
     * @param string|null $tax_lock_date_message
     */
    public function setTaxLockDateMessage(?string $tax_lock_date_message): void
    {
        $this->tax_lock_date_message = $tax_lock_date_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tax_lock_date_message")
     */
    public function getTaxLockDateMessage(): ?string
    {
        return $this->tax_lock_date_message;
    }

    /**
     * @param bool|null $invoice_has_matching_suspense_amount
     */
    public function setInvoiceHasMatchingSuspenseAmount(?bool $invoice_has_matching_suspense_amount): void
    {
        $this->invoice_has_matching_suspense_amount = $invoice_has_matching_suspense_amount;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("invoice_has_matching_suspense_amount")
     */
    public function isInvoiceHasMatchingSuspenseAmount(): ?bool
    {
        return $this->invoice_has_matching_suspense_amount;
    }

    /**
     * @param OdooRelation|null $bank_partner_id
     */
    public function setBankPartnerId(?OdooRelation $bank_partner_id): void
    {
        $this->bank_partner_id = $bank_partner_id;
    }

    /**
     * @param string|null $invoice_filter_type_domain
     */
    public function setInvoiceFilterTypeDomain(?string $invoice_filter_type_domain): void
    {
        $this->invoice_filter_type_domain = $invoice_filter_type_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_source_email")
     */
    public function getInvoiceSourceEmail(): ?string
    {
        return $this->invoice_source_email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_filter_type_domain")
     */
    public function getInvoiceFilterTypeDomain(): ?string
    {
        return $this->invoice_filter_type_domain;
    }

    /**
     * @param OdooRelation|null $invoice_cash_rounding_id
     */
    public function setInvoiceCashRoundingId(?OdooRelation $invoice_cash_rounding_id): void
    {
        $this->invoice_cash_rounding_id = $invoice_cash_rounding_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_cash_rounding_id")
     */
    public function getInvoiceCashRoundingId(): ?OdooRelation
    {
        return $this->invoice_cash_rounding_id;
    }

    /**
     * @param string|null $invoice_partner_display_name
     */
    public function setInvoicePartnerDisplayName(?string $invoice_partner_display_name): void
    {
        $this->invoice_partner_display_name = $invoice_partner_display_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_partner_display_name")
     */
    public function getInvoicePartnerDisplayName(): ?string
    {
        return $this->invoice_partner_display_name;
    }

    /**
     * @param string|null $invoice_source_email
     */
    public function setInvoiceSourceEmail(?string $invoice_source_email): void
    {
        $this->invoice_source_email = $invoice_source_email;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceLineIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_line_ids) {
            return false;
        }

        return in_array($item, $this->invoice_line_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_line_ids")
     */
    public function getInvoiceLineIds(): ?array
    {
        return $this->invoice_line_ids;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_total_signed")
     */
    public function getAmountTotalSigned(): ?float
    {
        return $this->amount_total_signed;
    }

    /**
     * @param OdooRelation|null $reversed_entry_id
     */
    public function setReversedEntryId(?OdooRelation $reversed_entry_id): void
    {
        $this->reversed_entry_id = $reversed_entry_id;
    }

    /**
     * @param float|null $amount_total_signed
     */
    public function setAmountTotalSigned(?float $amount_total_signed): void
    {
        $this->amount_total_signed = $amount_total_signed;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_residual_signed")
     */
    public function getAmountResidualSigned(): ?float
    {
        return $this->amount_residual_signed;
    }

    /**
     * @param float|null $amount_residual_signed
     */
    public function setAmountResidualSigned(?float $amount_residual_signed): void
    {
        $this->amount_residual_signed = $amount_residual_signed;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("amount_by_group")
     */
    public function getAmountByGroup()
    {
        return $this->amount_by_group;
    }

    /**
     * @param mixed|null $amount_by_group
     */
    public function setAmountByGroup($amount_by_group): void
    {
        $this->amount_by_group = $amount_by_group;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_state")
     */
    public function getPaymentState(): ?string
    {
        return $this->payment_state;
    }

    /**
     * @param string|null $payment_state
     */
    public function setPaymentState(?string $payment_state): void
    {
        $this->payment_state = $payment_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_cash_basis_rec_id")
     */
    public function getTaxCashBasisRecId(): ?OdooRelation
    {
        return $this->tax_cash_basis_rec_id;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_rec_id
     */
    public function setTaxCashBasisRecId(?OdooRelation $tax_cash_basis_rec_id): void
    {
        $this->tax_cash_basis_rec_id = $tax_cash_basis_rec_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_cash_basis_move_id")
     */
    public function getTaxCashBasisMoveId(): ?OdooRelation
    {
        return $this->tax_cash_basis_move_id;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_move_id
     */
    public function setTaxCashBasisMoveId(?OdooRelation $tax_cash_basis_move_id): void
    {
        $this->tax_cash_basis_move_id = $tax_cash_basis_move_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_post")
     */
    public function isAutoPost(): ?bool
    {
        return $this->auto_post;
    }

    /**
     * @param bool|null $auto_post
     */
    public function setAutoPost(?bool $auto_post): void
    {
        $this->auto_post = $auto_post;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("reversed_entry_id")
     */
    public function getReversedEntryId(): ?OdooRelation
    {
        return $this->reversed_entry_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("reversal_move_id")
     */
    public function getReversalMoveId(): ?array
    {
        return $this->reversal_move_id;
    }

    /**
     * @param OdooRelation|null $invoice_payment_term_id
     */
    public function setInvoicePaymentTermId(?OdooRelation $invoice_payment_term_id): void
    {
        $this->invoice_payment_term_id = $invoice_payment_term_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("invoice_date")
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_payment_term_id")
     */
    public function getInvoicePaymentTermId(): ?OdooRelation
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @param string|null $invoice_origin
     */
    public function setInvoiceOrigin(?string $invoice_origin): void
    {
        $this->invoice_origin = $invoice_origin;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_origin")
     */
    public function getInvoiceOrigin(): ?string
    {
        return $this->invoice_origin;
    }

    /**
     * @param DateTimeInterface|null $invoice_date_due
     */
    public function setInvoiceDateDue(?DateTimeInterface $invoice_date_due): void
    {
        $this->invoice_date_due = $invoice_date_due;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("invoice_date_due")
     */
    public function getInvoiceDateDue(): ?DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @param DateTimeInterface|null $invoice_date
     */
    public function setInvoiceDate(?DateTimeInterface $invoice_date): void
    {
        $this->invoice_date = $invoice_date;
    }

    /**
     * @param OdooRelation|null $invoice_user_id
     */
    public function setInvoiceUserId(?OdooRelation $invoice_user_id): void
    {
        $this->invoice_user_id = $invoice_user_id;
    }

    /**
     * @param OdooRelation[]|null $reversal_move_id
     */
    public function setReversalMoveId(?array $reversal_move_id): void
    {
        $this->reversal_move_id = $reversal_move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_user_id")
     */
    public function getInvoiceUserId(): ?OdooRelation
    {
        return $this->invoice_user_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("fiscal_position_id")
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReversalMoveId(OdooRelation $item): void
    {
        if (null === $this->reversal_move_id) {
            $this->reversal_move_id = [];
        }

        if ($this->hasReversalMoveId($item)) {
            $index = array_search($item, $this->reversal_move_id);
            unset($this->reversal_move_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addReversalMoveId(OdooRelation $item): void
    {
        if ($this->hasReversalMoveId($item)) {
            return;
        }

        if (null === $this->reversal_move_id) {
            $this->reversal_move_id = [];
        }

        $this->reversal_move_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReversalMoveId(OdooRelation $item): bool
    {
        if (null === $this->reversal_move_id) {
            return false;
        }

        return in_array($item, $this->reversal_move_id);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.move';
    }
}
