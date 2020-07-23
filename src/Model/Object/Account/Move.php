<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.move
 * Name : account.move
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
final class Move extends Base
{
    /**
     * Number
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ref;

    /**
     * Terms and Conditions
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $narration;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (Draft)
     *     -> posted (Posted)
     *     -> cancel (Cancelled)
     *
     *
     * @var string
     */
    private $state;

    /**
     * Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> entry (Journal Entry)
     *     -> out_invoice (Customer Invoice)
     *     -> out_refund (Customer Credit Note)
     *     -> in_invoice (Vendor Bill)
     *     -> in_refund (Vendor Credit Note)
     *     -> out_receipt (Sales Receipt)
     *     -> in_receipt (Purchase Receipt)
     *
     *
     * @var string
     */
    private $type;

    /**
     * Type Name
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $type_name;

    /**
     * To Check
     * If this checkbox is ticked, it means that the user was not sure of all the related informations at the time of
     * the creation of the move and that the move needs to be checked again.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_check;

    /**
     * Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Company Currency
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Journal Items
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Partner
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Commercial Entity
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $commercial_partner_id;

    /**
     * Untaxed Amount
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_untaxed;

    /**
     * Tax
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_tax;

    /**
     * Total
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_total;

    /**
     * Amount Due
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_residual;

    /**
     * Untaxed Amount Signed
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_untaxed_signed;

    /**
     * Tax Signed
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_tax_signed;

    /**
     * Total Signed
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_total_signed;

    /**
     * Amount Due Signed
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_residual_signed;

    /**
     * Tax amount by group
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $amount_by_group;

    /**
     * Tax Cash Basis Entry of
     * Technical field used to keep track of the tax cash basis reconciliation. This is needed when cancelling the
     * source: it will post the inverse journal entry to cancel that part too.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_cash_basis_rec_id;

    /**
     * Post Automatically
     * If this checkbox is ticked, this entry will be automatically posted at its date.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_post;

    /**
     * Reversal of
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $reversed_entry_id;

    /**
     * Fiscal Position
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices. The
     * default value comes from the customer.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Salesperson
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_user_id;

    /**
     * User
     * Technical field used to fit the generic behavior in mail templates.
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Payment
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> not_paid (Not Paid)
     *     -> in_payment (In Payment)
     *     -> paid (Paid)
     *
     *
     * @var string|null
     */
    private $invoice_payment_state;

    /**
     * Invoice/Bill Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $invoice_date;

    /**
     * Due Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $invoice_date_due;

    /**
     * Payment Reference
     * The payment reference to set on journal items.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_payment_ref;

    /**
     * Invoice Sent
     * It indicates that the invoice has been sent.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $invoice_sent;

    /**
     * Origin
     * The document(s) that generated the invoice.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_origin;

    /**
     * Payment Terms
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_payment_term_id;

    /**
     * Invoice lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_line_ids;

    /**
     * Bank Account
     * Bank Account Number to which the invoice will be paid. A Company bank account if this is a Customer Invoice or
     * Vendor Credit Note, otherwise a Partner bank account number.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_partner_bank_id;

    /**
     * Incoterm
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_incoterm_id;

    /**
     * Invoice Outstanding Credits Debits Widget
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_outstanding_credits_debits_widget;

    /**
     * Invoice Payments Widget
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_payments_widget;

    /**
     * Invoice Has Outstanding
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_has_outstanding;

    /**
     * Vendor Bill
     * Auto-complete from a past bill.
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $invoice_vendor_bill_id;

    /**
     * Source Email
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_source_email;

    /**
     * Invoice Partner Display Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_partner_display_name;

    /**
     * Invoice Partner Icon
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_partner_icon;

    /**
     * Cash Rounding Method
     * Defines the smallest coinage of the currency that can be used to pay by cash.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_cash_rounding_id;

    /**
     * Next Number
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_sequence_number_next;

    /**
     * Next Number Prefix
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_sequence_number_next_prefix;

    /**
     * Invoice Filter Type Domain
     * Technical field used to have a dynamic domain on journal / taxes in the form view.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_filter_type_domain;

    /**
     * Bank Partner
     * Technical field to get the domain on the bank
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $bank_partner_id;

    /**
     * Invoice Has Matching Suspense Amount
     * Technical field used to display an alert on invoices if there is at least a matching amount in any supsense
     * account.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_has_matching_suspense_amount;

    /**
     * Tax Lock Date Message
     * Technical field used to display a message when the invoice's accounting date is prior of the tax lock date.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $tax_lock_date_message;

    /**
     * Has Reconciled Entries
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_reconciled_entries;

    /**
     * Lock Posted Entries with Hash
     * If ticked, the accounting entry or invoice receives a hash as soon as it is posted and cannot be modified
     * anymore.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $restrict_mode_hash_table;

    /**
     * Inalteralbility No Gap Sequence #
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $secure_sequence_number;

    /**
     * Inalterability Hash
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $inalterable_hash;

    /**
     * String To Hash
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $string_to_hash;

    /**
     * Attachments
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attachment_ids;

    /**
     * Duplicated vendor reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $duplicated_vendor_ref;

    /**
     * Extract state
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> no_extract_requested (No extract requested)
     *     -> not_enough_credit (Not enough credit)
     *     -> error_status (An error occurred)
     *     -> waiting_extraction (Waiting extraction)
     *     -> extract_not_ready (waiting extraction, but it is not ready)
     *     -> waiting_validation (Waiting validation)
     *     -> done (Completed flow)
     *
     *
     * @var string
     */
    private $extract_state;

    /**
     * Status code
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $extract_status_code;

    /**
     * Error message
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $extract_error_message;

    /**
     * Id of the request to IAP-OCR
     * Invoice extract id
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $extract_remote_id;

    /**
     * Extract Word
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $extract_word_ids;

    /**
     * Can show the ocr resend button
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $extract_can_show_resend_button;

    /**
     * Can show the ocr send button
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $extract_can_show_send_button;

    /**
     * Transactions
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $transaction_ids;

    /**
     * Authorized Transactions
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $authorized_transaction_ids;

    /**
     * Originating Model
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $transfer_model_id;

    /**
     * Is Tax Closing
     * technical field used to know if this move is the vat closing move
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_tax_closing;

    /**
     * Tax Report Control Error
     * technical field used to know if there was a failed control check
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_report_control_error;

    /**
     * Asset
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $asset_id;

    /**
     * Asset Type
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> sale (Sale: Revenue Recognition)
     *     -> purchase (Purchase: Asset)
     *     -> expense (Deferred Expense)
     *
     *
     * @var string|null
     */
    private $asset_asset_type;

    /**
     * Depreciable Value
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $asset_remaining_value;

    /**
     * Cumulative Depreciation
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $asset_depreciated_value;

    /**
     * Asset Manually Modified
     * This is a technical field stating that a depreciation line has been manually modified. It is used to recompute
     * the depreciation table of an asset/deferred revenue.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $asset_manually_modified;

    /**
     * Asset Value Change
     * This is a technical field set to true when this move is the result of the changing of value of an asset
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $asset_value_change;

    /**
     * Assets
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $asset_ids;

    /**
     * Asset Ids Display Name
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $asset_ids_display_name;

    /**
     * Asset Id Display Name
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $asset_id_display_name;

    /**
     * Number Asset
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $number_asset_ids;

    /**
     * Draft Asset
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $draft_asset_ids;

    /**
     * Reversal Move
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reversal_move_id;

    /**
     * Is Taxcloud Configured
     * Used to determine whether or not to warn the user to configure TaxCloud.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_taxcloud_configured;

    /**
     * Use TaxCloud API
     * Technical field to determine whether to hide taxes in views or not.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_taxcloud;

    /**
     * Sales Team
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * Delivery Address
     * Delivery address for current invoice.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_shipping_id;

    /**
     * Campaign
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $campaign_id;

    /**
     * Source
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_id;

    /**
     * Medium
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $medium_id;

    /**
     * Activities
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     *
     *
     * @var string|null
     */
    private $activity_state;

    /**
     * Responsible User
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> warning (Alert)
     *     -> danger (Error)
     *
     *
     * @var string|null
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

    /**
     * Followers
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_channel_ids;

    /**
     * Messages
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_sms_error;

    /**
     * Portal Access URL
     * Customer Portal URL
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_url;

    /**
     * Security Token
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $access_token;

    /**
     * Access warning
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_warning;

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
     * @param string $name Number
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> draft (Draft)
     *            -> posted (Posted)
     *            -> cancel (Cancelled)
     *
     * @param string $type Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> entry (Journal Entry)
     *            -> out_invoice (Customer Invoice)
     *            -> out_refund (Customer Credit Note)
     *            -> in_invoice (Vendor Bill)
     *            -> in_refund (Vendor Credit Note)
     *            -> out_receipt (Sales Receipt)
     *            -> in_receipt (Purchase Receipt)
     *
     * @param OdooRelation $journal_id Journal
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        Searchable : yes
     *        Sortable : yes
     * @param string $extract_state Extract state
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> no_extract_requested (No extract requested)
     *            -> not_enough_credit (Not enough credit)
     *            -> error_status (An error occurred)
     *            -> waiting_extraction (Waiting extraction)
     *            -> extract_not_ready (waiting extraction, but it is not ready)
     *            -> waiting_validation (Waiting validation)
     *            -> done (Completed flow)
     *
     */
    public function __construct(
        string $name,
        DateTimeInterface $date,
        string $state,
        string $type,
        OdooRelation $journal_id,
        OdooRelation $currency_id,
        string $extract_state
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->state = $state;
        $this->type = $type;
        $this->journal_id = $journal_id;
        $this->currency_id = $currency_id;
        $this->extract_state = $extract_state;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getReversalMoveId(): ?array
    {
        return $this->reversal_move_id;
    }

    /**
     * @param bool|null $is_taxcloud_configured
     */
    public function setIsTaxcloudConfigured(?bool $is_taxcloud_configured): void
    {
        $this->is_taxcloud_configured = $is_taxcloud_configured;
    }

    /**
     * @return bool|null
     */
    public function isIsTaxcloudConfigured(): ?bool
    {
        return $this->is_taxcloud_configured;
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
     * @param OdooRelation[]|null $reversal_move_id
     */
    public function setReversalMoveId(?array $reversal_move_id): void
    {
        $this->reversal_move_id = $reversal_move_id;
    }

    /**
     * @param bool|null $draft_asset_ids
     */
    public function setDraftAssetIds(?bool $draft_asset_ids): void
    {
        $this->draft_asset_ids = $draft_asset_ids;
    }

    /**
     * @param bool|null $is_taxcloud
     */
    public function setIsTaxcloud(?bool $is_taxcloud): void
    {
        $this->is_taxcloud = $is_taxcloud;
    }

    /**
     * @return bool|null
     */
    public function isDraftAssetIds(): ?bool
    {
        return $this->draft_asset_ids;
    }

    /**
     * @param int|null $number_asset_ids
     */
    public function setNumberAssetIds(?int $number_asset_ids): void
    {
        $this->number_asset_ids = $number_asset_ids;
    }

    /**
     * @return int|null
     */
    public function getNumberAssetIds(): ?int
    {
        return $this->number_asset_ids;
    }

    /**
     * @param string|null $asset_id_display_name
     */
    public function setAssetIdDisplayName(?string $asset_id_display_name): void
    {
        $this->asset_id_display_name = $asset_id_display_name;
    }

    /**
     * @return string|null
     */
    public function getAssetIdDisplayName(): ?string
    {
        return $this->asset_id_display_name;
    }

    /**
     * @param string|null $asset_ids_display_name
     */
    public function setAssetIdsDisplayName(?string $asset_ids_display_name): void
    {
        $this->asset_ids_display_name = $asset_ids_display_name;
    }

    /**
     * @return bool|null
     */
    public function isIsTaxcloud(): ?bool
    {
        return $this->is_taxcloud;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAssetIds(OdooRelation $item): void
    {
        if (null === $this->asset_ids) {
            $this->asset_ids = [];
        }

        if ($this->hasAssetIds($item)) {
            $index = array_search($item, $this->asset_ids);
            unset($this->asset_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $medium_id
     */
    public function setMediumId(?OdooRelation $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @return string|null
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
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
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMediumId(): ?OdooRelation
    {
        return $this->medium_id;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @param OdooRelation|null $source_id
     */
    public function setSourceId(?OdooRelation $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSourceId(): ?OdooRelation
    {
        return $this->source_id;
    }

    /**
     * @param OdooRelation|null $campaign_id
     */
    public function setCampaignId(?OdooRelation $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCampaignId(): ?OdooRelation
    {
        return $this->campaign_id;
    }

    /**
     * @param OdooRelation|null $partner_shipping_id
     */
    public function setPartnerShippingId(?OdooRelation $partner_shipping_id): void
    {
        $this->partner_shipping_id = $partner_shipping_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerShippingId(): ?OdooRelation
    {
        return $this->partner_shipping_id;
    }

    /**
     * @return string|null
     */
    public function getAssetIdsDisplayName(): ?string
    {
        return $this->asset_ids_display_name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAssetIds(OdooRelation $item): void
    {
        if ($this->hasAssetIds($item)) {
            return;
        }

        if (null === $this->asset_ids) {
            $this->asset_ids = [];
        }

        $this->asset_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAuthorizedTransactionIds(): ?array
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param OdooRelation|null $transfer_model_id
     */
    public function setTransferModelId(?OdooRelation $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTransferModelId(): ?OdooRelation
    {
        return $this->transfer_model_id;
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
     * @param OdooRelation[]|null $authorized_transaction_ids
     */
    public function setAuthorizedTransactionIds(?array $authorized_transaction_ids): void
    {
        $this->authorized_transaction_ids = $authorized_transaction_ids;
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
     * @param bool|null $is_tax_closing
     */
    public function setIsTaxClosing(?bool $is_tax_closing): void
    {
        $this->is_tax_closing = $is_tax_closing;
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
     * @param OdooRelation[]|null $transaction_ids
     */
    public function setTransactionIds(?array $transaction_ids): void
    {
        $this->transaction_ids = $transaction_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTransactionIds(): ?array
    {
        return $this->transaction_ids;
    }

    /**
     * @param bool|null $extract_can_show_send_button
     */
    public function setExtractCanShowSendButton(?bool $extract_can_show_send_button): void
    {
        $this->extract_can_show_send_button = $extract_can_show_send_button;
    }

    /**
     * @return bool|null
     */
    public function isExtractCanShowSendButton(): ?bool
    {
        return $this->extract_can_show_send_button;
    }

    /**
     * @return bool|null
     */
    public function isIsTaxClosing(): ?bool
    {
        return $this->is_tax_closing;
    }

    /**
     * @return bool|null
     */
    public function isTaxReportControlError(): ?bool
    {
        return $this->tax_report_control_error;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAssetIds(OdooRelation $item): bool
    {
        if (null === $this->asset_ids) {
            return false;
        }

        return in_array($item, $this->asset_ids);
    }

    /**
     * @param float|null $asset_depreciated_value
     */
    public function setAssetDepreciatedValue(?float $asset_depreciated_value): void
    {
        $this->asset_depreciated_value = $asset_depreciated_value;
    }

    /**
     * @param OdooRelation[]|null $asset_ids
     */
    public function setAssetIds(?array $asset_ids): void
    {
        $this->asset_ids = $asset_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAssetIds(): ?array
    {
        return $this->asset_ids;
    }

    /**
     * @param bool|null $asset_value_change
     */
    public function setAssetValueChange(?bool $asset_value_change): void
    {
        $this->asset_value_change = $asset_value_change;
    }

    /**
     * @return bool|null
     */
    public function isAssetValueChange(): ?bool
    {
        return $this->asset_value_change;
    }

    /**
     * @param bool|null $asset_manually_modified
     */
    public function setAssetManuallyModified(?bool $asset_manually_modified): void
    {
        $this->asset_manually_modified = $asset_manually_modified;
    }

    /**
     * @return bool|null
     */
    public function isAssetManuallyModified(): ?bool
    {
        return $this->asset_manually_modified;
    }

    /**
     * @return float|null
     */
    public function getAssetDepreciatedValue(): ?float
    {
        return $this->asset_depreciated_value;
    }

    /**
     * @param bool|null $tax_report_control_error
     */
    public function setTaxReportControlError(?bool $tax_report_control_error): void
    {
        $this->tax_report_control_error = $tax_report_control_error;
    }

    /**
     * @param float|null $asset_remaining_value
     */
    public function setAssetRemainingValue(?float $asset_remaining_value): void
    {
        $this->asset_remaining_value = $asset_remaining_value;
    }

    /**
     * @return float|null
     */
    public function getAssetRemainingValue(): ?float
    {
        return $this->asset_remaining_value;
    }

    /**
     * @param string|null $asset_asset_type
     */
    public function setAssetAssetType(?string $asset_asset_type): void
    {
        $this->asset_asset_type = $asset_asset_type;
    }

    /**
     * @return string|null
     */
    public function getAssetAssetType(): ?string
    {
        return $this->asset_asset_type;
    }

    /**
     * @param OdooRelation|null $asset_id
     */
    public function setAssetId(?OdooRelation $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAssetId(): ?OdooRelation
    {
        return $this->asset_id;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return bool|null
     */
    public function isExtractCanShowResendButton(): ?bool
    {
        return $this->extract_can_show_resend_button;
    }

    /**
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
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
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
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
     * @return int|null
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return int|null
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }

    /**
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @param string|null $access_url
     */
    public function setAccessUrl(?string $access_url): void
    {
        $this->access_url = $access_url;
    }

    /**
     * @return string|null
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return int|null
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
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
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @return bool|null
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
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
     * @return string|null
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
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
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
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
     * @return bool|null
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
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
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @param bool|null $extract_can_show_resend_button
     */
    public function setExtractCanShowResendButton(?bool $extract_can_show_resend_button): void
    {
        $this->extract_can_show_resend_button = $extract_can_show_resend_button;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float|null $amount_tax_signed
     */
    public function setAmountTaxSigned(?float $amount_tax_signed): void
    {
        $this->amount_tax_signed = $amount_tax_signed;
    }

    /**
     * @param int|null $amount_by_group
     */
    public function setAmountByGroup(?int $amount_by_group): void
    {
        $this->amount_by_group = $amount_by_group;
    }

    /**
     * @return int|null
     */
    public function getAmountByGroup(): ?int
    {
        return $this->amount_by_group;
    }

    /**
     * @param float|null $amount_residual_signed
     */
    public function setAmountResidualSigned(?float $amount_residual_signed): void
    {
        $this->amount_residual_signed = $amount_residual_signed;
    }

    /**
     * @return float|null
     */
    public function getAmountResidualSigned(): ?float
    {
        return $this->amount_residual_signed;
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
     */
    public function getAmountTotalSigned(): ?float
    {
        return $this->amount_total_signed;
    }

    /**
     * @return float|null
     */
    public function getAmountTaxSigned(): ?float
    {
        return $this->amount_tax_signed;
    }

    /**
     * @param OdooRelation|null $tax_cash_basis_rec_id
     */
    public function setTaxCashBasisRecId(?OdooRelation $tax_cash_basis_rec_id): void
    {
        $this->tax_cash_basis_rec_id = $tax_cash_basis_rec_id;
    }

    /**
     * @param float|null $amount_untaxed_signed
     */
    public function setAmountUntaxedSigned(?float $amount_untaxed_signed): void
    {
        $this->amount_untaxed_signed = $amount_untaxed_signed;
    }

    /**
     * @return float|null
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
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxCashBasisRecId(): ?OdooRelation
    {
        return $this->tax_cash_basis_rec_id;
    }

    /**
     * @return bool|null
     */
    public function isAutoPost(): ?bool
    {
        return $this->auto_post;
    }

    /**
     * @return float|null
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
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
     * @return DateTimeInterface|null
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @param string|null $invoice_payment_state
     */
    public function setInvoicePaymentState(?string $invoice_payment_state): void
    {
        $this->invoice_payment_state = $invoice_payment_state;
    }

    /**
     * @return string|null
     */
    public function getInvoicePaymentState(): ?string
    {
        return $this->invoice_payment_state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param bool|null $auto_post
     */
    public function setAutoPost(?bool $auto_post): void
    {
        $this->auto_post = $auto_post;
    }

    /**
     * @param OdooRelation|null $invoice_user_id
     */
    public function setInvoiceUserId(?OdooRelation $invoice_user_id): void
    {
        $this->invoice_user_id = $invoice_user_id;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation|null $reversed_entry_id
     */
    public function setReversedEntryId(?OdooRelation $reversed_entry_id): void
    {
        $this->reversed_entry_id = $reversed_entry_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getReversedEntryId(): ?OdooRelation
    {
        return $this->reversed_entry_id;
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
     * @param string|null $invoice_payment_ref
     */
    public function setInvoicePaymentRef(?string $invoice_payment_ref): void
    {
        $this->invoice_payment_ref = $invoice_payment_ref;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return bool|null
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
     */
    public function getTypeName(): ?string
    {
        return $this->type_name;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param string|null $narration
     */
    public function setNarration(?string $narration): void
    {
        $this->narration = $narration;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @return string|null
     */
    public function getNarration(): ?string
    {
        return $this->narration;
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
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool|null $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return float|null
     */
    public function getAmountUntaxed(): ?float
    {
        return $this->amount_untaxed;
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
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
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
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
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
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @return OdooRelation|null
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
     * @return string|null
     */
    public function getInvoicePaymentRef(): ?string
    {
        return $this->invoice_payment_ref;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceSent(): ?bool
    {
        return $this->invoice_sent;
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
     * @param bool|null $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(?bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
    }

    /**
     * @param string|null $string_to_hash
     */
    public function setStringToHash(?string $string_to_hash): void
    {
        $this->string_to_hash = $string_to_hash;
    }

    /**
     * @return string|null
     */
    public function getStringToHash(): ?string
    {
        return $this->string_to_hash;
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
     */
    public function getInalterableHash(): ?string
    {
        return $this->inalterable_hash;
    }

    /**
     * @param int|null $secure_sequence_number
     */
    public function setSecureSequenceNumber(?int $secure_sequence_number): void
    {
        $this->secure_sequence_number = $secure_sequence_number;
    }

    /**
     * @return int|null
     */
    public function getSecureSequenceNumber(): ?int
    {
        return $this->secure_sequence_number;
    }

    /**
     * @return bool|null
     */
    public function isRestrictModeHashTable(): ?bool
    {
        return $this->restrict_mode_hash_table;
    }

    /**
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param bool|null $has_reconciled_entries
     */
    public function setHasReconciledEntries(?bool $has_reconciled_entries): void
    {
        $this->has_reconciled_entries = $has_reconciled_entries;
    }

    /**
     * @return bool|null
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
     */
    public function isInvoiceHasMatchingSuspenseAmount(): ?bool
    {
        return $this->invoice_has_matching_suspense_amount;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttachmentIds(OdooRelation $item): bool
    {
        if (null === $this->attachment_ids) {
            return false;
        }

        return in_array($item, $this->attachment_ids);
    }

    /**
     * @return OdooRelation|null
     */
    public function getBankPartnerId(): ?OdooRelation
    {
        return $this->bank_partner_id;
    }

    /**
     * @return string|null
     */
    public function getExtractErrorMessage(): ?string
    {
        return $this->extract_error_message;
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
     * @param OdooRelation[]|null $extract_word_ids
     */
    public function setExtractWordIds(?array $extract_word_ids): void
    {
        $this->extract_word_ids = $extract_word_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getExtractWordIds(): ?array
    {
        return $this->extract_word_ids;
    }

    /**
     * @param int|null $extract_remote_id
     */
    public function setExtractRemoteId(?int $extract_remote_id): void
    {
        $this->extract_remote_id = $extract_remote_id;
    }

    /**
     * @return int|null
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
     * @param int|null $extract_status_code
     */
    public function setExtractStatusCode(?int $extract_status_code): void
    {
        $this->extract_status_code = $extract_status_code;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttachmentIds(OdooRelation $item): void
    {
        if ($this->hasAttachmentIds($item)) {
            return;
        }

        if (null === $this->attachment_ids) {
            $this->attachment_ids = [];
        }

        $this->attachment_ids[] = $item;
    }

    /**
     * @return int|null
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
     * @return string
     */
    public function getExtractState(): string
    {
        return $this->extract_state;
    }

    /**
     * @param string|null $duplicated_vendor_ref
     */
    public function setDuplicatedVendorRef(?string $duplicated_vendor_ref): void
    {
        $this->duplicated_vendor_ref = $duplicated_vendor_ref;
    }

    /**
     * @return string|null
     */
    public function getDuplicatedVendorRef(): ?string
    {
        return $this->duplicated_vendor_ref;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttachmentIds(OdooRelation $item): void
    {
        if (null === $this->attachment_ids) {
            $this->attachment_ids = [];
        }

        if ($this->hasAttachmentIds($item)) {
            $index = array_search($item, $this->attachment_ids);
            unset($this->attachment_ids[$index]);
        }
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
     * @param bool|null $invoice_sent
     */
    public function setInvoiceSent(?bool $invoice_sent): void
    {
        $this->invoice_sent = $invoice_sent;
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
     * @return string|null
     */
    public function getInvoiceOutstandingCreditsDebitsWidget(): ?string
    {
        return $this->invoice_outstanding_credits_debits_widget;
    }

    /**
     * @param OdooRelation|null $invoice_incoterm_id
     */
    public function setInvoiceIncotermId(?OdooRelation $invoice_incoterm_id): void
    {
        $this->invoice_incoterm_id = $invoice_incoterm_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceIncotermId(): ?OdooRelation
    {
        return $this->invoice_incoterm_id;
    }

    /**
     * @param OdooRelation|null $invoice_partner_bank_id
     */
    public function setInvoicePartnerBankId(?OdooRelation $invoice_partner_bank_id): void
    {
        $this->invoice_partner_bank_id = $invoice_partner_bank_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoicePartnerBankId(): ?OdooRelation
    {
        return $this->invoice_partner_bank_id;
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
     * @return string|null
     */
    public function getInvoicePaymentsWidget(): ?string
    {
        return $this->invoice_payments_widget;
    }

    /**
     * @param OdooRelation[]|null $invoice_line_ids
     */
    public function setInvoiceLineIds(?array $invoice_line_ids): void
    {
        $this->invoice_line_ids = $invoice_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceLineIds(): ?array
    {
        return $this->invoice_line_ids;
    }

    /**
     * @param OdooRelation|null $invoice_payment_term_id
     */
    public function setInvoicePaymentTermId(?OdooRelation $invoice_payment_term_id): void
    {
        $this->invoice_payment_term_id = $invoice_payment_term_id;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getInvoiceOrigin(): ?string
    {
        return $this->invoice_origin;
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
     * @param string|null $invoice_payments_widget
     */
    public function setInvoicePaymentsWidget(?string $invoice_payments_widget): void
    {
        $this->invoice_payments_widget = $invoice_payments_widget;
    }

    /**
     * @return string|null
     */
    public function getInvoiceFilterTypeDomain(): ?string
    {
        return $this->invoice_filter_type_domain;
    }

    /**
     * @param string|null $invoice_partner_icon
     */
    public function setInvoicePartnerIcon(?string $invoice_partner_icon): void
    {
        $this->invoice_partner_icon = $invoice_partner_icon;
    }

    /**
     * @param string|null $invoice_sequence_number_next_prefix
     */
    public function setInvoiceSequenceNumberNextPrefix(?string $invoice_sequence_number_next_prefix): void
    {
        $this->invoice_sequence_number_next_prefix = $invoice_sequence_number_next_prefix;
    }

    /**
     * @return string|null
     */
    public function getInvoiceSequenceNumberNextPrefix(): ?string
    {
        return $this->invoice_sequence_number_next_prefix;
    }

    /**
     * @param string|null $invoice_sequence_number_next
     */
    public function setInvoiceSequenceNumberNext(?string $invoice_sequence_number_next): void
    {
        $this->invoice_sequence_number_next = $invoice_sequence_number_next;
    }

    /**
     * @return string|null
     */
    public function getInvoiceSequenceNumberNext(): ?string
    {
        return $this->invoice_sequence_number_next;
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
     */
    public function getInvoiceCashRoundingId(): ?OdooRelation
    {
        return $this->invoice_cash_rounding_id;
    }

    /**
     * @return string|null
     */
    public function getInvoicePartnerIcon(): ?string
    {
        return $this->invoice_partner_icon;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceHasOutstanding(): ?bool
    {
        return $this->invoice_has_outstanding;
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
     * @return string|null
     */
    public function getInvoiceSourceEmail(): ?string
    {
        return $this->invoice_source_email;
    }

    /**
     * @param OdooRelation|null $invoice_vendor_bill_id
     */
    public function setInvoiceVendorBillId(?OdooRelation $invoice_vendor_bill_id): void
    {
        $this->invoice_vendor_bill_id = $invoice_vendor_bill_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceVendorBillId(): ?OdooRelation
    {
        return $this->invoice_vendor_bill_id;
    }

    /**
     * @param bool|null $invoice_has_outstanding
     */
    public function setInvoiceHasOutstanding(?bool $invoice_has_outstanding): void
    {
        $this->invoice_has_outstanding = $invoice_has_outstanding;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.move';
    }
}
