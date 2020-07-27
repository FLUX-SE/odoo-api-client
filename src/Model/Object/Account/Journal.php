<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.journal
 * ---
 * Name : account.journal
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
class Journal extends Base
{
    /**
     * Journal Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $name;

    /**
     * Short Code
     * ---
     * The journal entries of this journal will be named using this prefix.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $code;

    /**
     * Active
     * ---
     * Set active to false to hide the Journal without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $active;

    /**
     * Type
     * ---
     * Select 'Sale' for customer invoices journals.
     * Select 'Purchase' for vendor bills journals.
     * Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     * Select 'General' for miscellaneous operations journals.
     * ---
     * Selection : (default value, usually null)
     *     -> sale (Sales)
     *     -> purchase (Purchase)
     *     -> cash (Cash)
     *     -> bank (Bank)
     *     -> general (Miscellaneous)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $type;

    /**
     * Account Types Allowed
     * ---
     * Relation : many2many (account.account.type)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $type_control_ids;

    /**
     * Accounts Allowed
     * ---
     * Relation : many2many (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $account_control_ids;

    /**
     * Default Credit Account
     * ---
     * It acts as a default account for credit amount
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $default_credit_account_id;

    /**
     * Default Debit Account
     * ---
     * It acts as a default account for debit amount
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $default_debit_account_id;

    /**
     * Lock Posted Entries with Hash
     * ---
     * If ticked, the accounting entry or invoice receives a hash as soon as it is posted and cannot be modified
     * anymore.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $restrict_mode_hash_table;

    /**
     * Entry Sequence
     * ---
     * This field contains the information related to the numbering of the journal entries of this journal.
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $sequence_id;

    /**
     * Credit Note Entry Sequence
     * ---
     * This field contains the information related to the numbering of the credit note entries of this journal.
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $refund_sequence_id;

    /**
     * Sequence
     * ---
     * Used to order Journals in the dashboard view
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence;

    /**
     * Next Number
     * ---
     * The next sequence number will be used for the next invoice.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $sequence_number_next;

    /**
     * Credit Notes Next Number
     * ---
     * The next sequence number will be used for the next credit note.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $refund_sequence_number_next;

    /**
     * Communication Type
     * ---
     * You can set here the default communication that will appear on customer invoices, once validated, to help the
     * customer to refer to that particular invoice when making the payment.
     * ---
     * Selection : (default value, usually null)
     *     -> none (Free)
     *     -> partner (Based on Customer)
     *     -> invoice (Based on Invoice)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $invoice_reference_type;

    /**
     * Communication Standard
     * ---
     * You can choose different models for each type of reference. The default one is the Odoo reference.
     * ---
     * Selection : (default value, usually null)
     *     -> odoo (Odoo)
     *     -> euro (European)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $invoice_reference_model;

    /**
     * Currency
     * ---
     * The currency used to enter statement
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $currency_id;

    /**
     * Company
     * ---
     * Company related to this journal
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $company_id;

    /**
     * Dedicated Credit Note Sequence
     * ---
     * Check this box if you don't want to share the same sequence for invoices and credit notes made from this
     * journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $refund_sequence;

    /**
     * For Incoming Payments
     * ---
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo,you are suggested to reconcile the transaction with the batch
     * deposit. Enable this option from the settings.
     * ---
     * Relation : many2many (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $inbound_payment_method_ids;

    /**
     * For Outgoing Payments
     * ---
     * Manual:Pay bill by cash or any other method outside of Odoo.
     * Check:Pay bill by check and print it from Odoo.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. Enable this option
     * from the settings.
     * ---
     * Relation : many2many (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $outbound_payment_method_ids;

    /**
     * At Least One Inbound
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $at_least_one_inbound;

    /**
     * At Least One Outbound
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $at_least_one_outbound;

    /**
     * Profit Account
     * ---
     * Used to register a profit when the ending balance of a cash register differs from what the system computes
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $profit_account_id;

    /**
     * Loss Account
     * ---
     * Used to register a loss when the ending balance of a cash register differs from what the system computes
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $loss_account_id;

    /**
     * Account Holder
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $company_partner_id;

    /**
     * Bank Account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $bank_account_id;

    /**
     * Bank Feeds
     * ---
     * Defines how the bank statements will be registered
     * ---
     * Selection : (default value, usually null)
     *     -> undefined (Undefined Yet)
     *     -> file_import (Import(CAMT, CSV, OFX))
     *     -> online_sync (Automated Bank Synchronization)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $bank_statements_source;

    /**
     * Account Number
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $bank_acc_number;

    /**
     * Bank
     * ---
     * Relation : many2one (res.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $bank_id;

    /**
     * Post At
     * ---
     * Selection : (default value, usually null)
     *     -> pay_val (Payment Validation)
     *     -> bank_rec (Bank Reconciliation)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $post_at;

    /**
     * Alias
     * ---
     * Relation : many2one (mail.alias)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Alias
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $alias_id;

    /**
     * Alias domain
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $alias_domain;

    /**
     * Alias Name
     * ---
     * It creates draft invoices and bills by sending an email.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $alias_name;

    /**
     * Journal Groups
     * ---
     * Relation : many2many (account.journal.group)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal\Group
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $journal_group_ids;

    /**
     * Secure Sequence
     * ---
     * Sequence to use to ensure the securisation of data
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $secure_sequence_id;

    /**
     * Kanban Dashboard
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $kanban_dashboard;

    /**
     * Kanban Dashboard Graph
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $kanban_dashboard_graph;

    /**
     * Json Activity Data
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $json_activity_data;

    /**
     * Show journal on dashboard
     * ---
     * Whether this journal should be displayed on the dashboard or not
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $show_on_dashboard;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $color;

    /**
     * Next synchronization
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $next_synchronization;

    /**
     * Account Online Journal
     * ---
     * Relation : many2one (account.online.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Online\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $account_online_journal_id;

    /**
     * Account Online Provider
     * ---
     * Relation : many2one (account.online.provider)
     * @see \Flux\OdooApiClient\Model\Object\Account\Online\Provider
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $account_online_provider_id;

    /**
     * Synchronization status
     * ---
     * Update status of provider account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $synchronization_status;

    /**
     * Creation of Bank Statements
     * ---
     * Defines when a new bank statement
     *                                                                                               will be created
     * when fetching new transactions
     *                                                                                               from your bank
     * account.
     * ---
     * Selection : (default value, usually null)
     *     -> none (Create one statement per synchronization)
     *     -> day (Create daily statements)
     *     -> week (Create weekly statements)
     *     -> bimonthly (Create bi-monthly statements)
     *     -> month (Create monthly statements)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $bank_statement_creation;

    /**
     * Manual Numbering
     * ---
     * Check this option if your pre-printed checks are not numbered.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $check_manual_sequencing;

    /**
     * Check Sequence
     * ---
     * Checks numbering sequence.
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $check_sequence_id;

    /**
     * Next Check Number
     * ---
     * Sequence number of the next printed check.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $check_next_number;

    /**
     * Check Printing Payment Method Selected
     * ---
     * Technical feature used to know whether check printing was enabled as payment method.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $check_printing_payment_method_selected;

    /**
     * Point of Sale Payment Methods
     * ---
     * Relation : one2many (pos.payment.method -> cash_journal_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $pos_payment_method_ids;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Followers
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param string $name Journal Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Short Code
     *        ---
     *        The journal entries of this journal will be named using this prefix.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        Select 'Sale' for customer invoices journals.
     *        Select 'Purchase' for vendor bills journals.
     *        Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     *        Select 'General' for miscellaneous operations journals.
     *        ---
     *        Selection : (default value, usually null)
     *            -> sale (Sales)
     *            -> purchase (Purchase)
     *            -> cash (Cash)
     *            -> bank (Bank)
     *            -> general (Miscellaneous)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sequence_id Entry Sequence
     *        ---
     *        This field contains the information related to the numbering of the journal entries of this journal.
     *        ---
     *        Relation : many2one (ir.sequence)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_type Communication Type
     *        ---
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     *        ---
     *        Selection : (default value, usually null)
     *            -> none (Free)
     *            -> partner (Based on Customer)
     *            -> invoice (Based on Invoice)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_model Communication Standard
     *        ---
     *        You can choose different models for each type of reference. The default one is the Odoo reference.
     *        ---
     *        Selection : (default value, usually null)
     *            -> odoo (Odoo)
     *            -> euro (European)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Company related to this journal
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $code,
        string $type,
        OdooRelation $sequence_id,
        string $invoice_reference_type,
        string $invoice_reference_model,
        OdooRelation $company_id
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
        $this->sequence_id = $sequence_id;
        $this->invoice_reference_type = $invoice_reference_type;
        $this->invoice_reference_model = $invoice_reference_model;
        $this->company_id = $company_id;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @return DateTimeInterface|null
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
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
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
    public function hasActivityIds(OdooRelation $item): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
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
     * @param bool|null $check_manual_sequencing
     */
    public function setCheckManualSequencing(?bool $check_manual_sequencing): void
    {
        $this->check_manual_sequencing = $check_manual_sequencing;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountOnlineJournalId(): ?OdooRelation
    {
        return $this->account_online_journal_id;
    }

    /**
     * @param OdooRelation|null $account_online_journal_id
     */
    public function setAccountOnlineJournalId(?OdooRelation $account_online_journal_id): void
    {
        $this->account_online_journal_id = $account_online_journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountOnlineProviderId(): ?OdooRelation
    {
        return $this->account_online_provider_id;
    }

    /**
     * @param OdooRelation|null $account_online_provider_id
     */
    public function setAccountOnlineProviderId(?OdooRelation $account_online_provider_id): void
    {
        $this->account_online_provider_id = $account_online_provider_id;
    }

    /**
     * @return string|null
     */
    public function getSynchronizationStatus(): ?string
    {
        return $this->synchronization_status;
    }

    /**
     * @param string|null $synchronization_status
     */
    public function setSynchronizationStatus(?string $synchronization_status): void
    {
        $this->synchronization_status = $synchronization_status;
    }

    /**
     * @return string|null
     */
    public function getBankStatementCreation(): ?string
    {
        return $this->bank_statement_creation;
    }

    /**
     * @param string|null $bank_statement_creation
     */
    public function setBankStatementCreation(?string $bank_statement_creation): void
    {
        $this->bank_statement_creation = $bank_statement_creation;
    }

    /**
     * @return bool|null
     */
    public function isCheckManualSequencing(): ?bool
    {
        return $this->check_manual_sequencing;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCheckSequenceId(): ?OdooRelation
    {
        return $this->check_sequence_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePosPaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->pos_payment_method_ids) {
            $this->pos_payment_method_ids = [];
        }

        if ($this->hasPosPaymentMethodIds($item)) {
            $index = array_search($item, $this->pos_payment_method_ids);
            unset($this->pos_payment_method_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $check_sequence_id
     */
    public function setCheckSequenceId(?OdooRelation $check_sequence_id): void
    {
        $this->check_sequence_id = $check_sequence_id;
    }

    /**
     * @return string|null
     */
    public function getCheckNextNumber(): ?string
    {
        return $this->check_next_number;
    }

    /**
     * @param string|null $check_next_number
     */
    public function setCheckNextNumber(?string $check_next_number): void
    {
        $this->check_next_number = $check_next_number;
    }

    /**
     * @return bool|null
     */
    public function isCheckPrintingPaymentMethodSelected(): ?bool
    {
        return $this->check_printing_payment_method_selected;
    }

    /**
     * @param bool|null $check_printing_payment_method_selected
     */
    public function setCheckPrintingPaymentMethodSelected(
        ?bool $check_printing_payment_method_selected
    ): void {
        $this->check_printing_payment_method_selected = $check_printing_payment_method_selected;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPosPaymentMethodIds(): ?array
    {
        return $this->pos_payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $pos_payment_method_ids
     */
    public function setPosPaymentMethodIds(?array $pos_payment_method_ids): void
    {
        $this->pos_payment_method_ids = $pos_payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPosPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->pos_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->pos_payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPosPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasPosPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->pos_payment_method_ids) {
            $this->pos_payment_method_ids = [];
        }

        $this->pos_payment_method_ids[] = $item;
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
     * @return DateTimeInterface|null
     */
    public function getNextSynchronization(): ?DateTimeInterface
    {
        return $this->next_synchronization;
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
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @return int|null
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
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @return OdooRelation|null
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
     * @return int|null
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
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
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
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
     * @return bool|null
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return int|null
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return int|null
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param DateTimeInterface|null $next_synchronization
     */
    public function setNextSynchronization(?DateTimeInterface $next_synchronization): void
    {
        $this->next_synchronization = $next_synchronization;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $invoice_reference_type
     */
    public function setInvoiceReferenceType(string $invoice_reference_type): void
    {
        $this->invoice_reference_type = $invoice_reference_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRefundSequenceId(): ?OdooRelation
    {
        return $this->refund_sequence_id;
    }

    /**
     * @param OdooRelation|null $refund_sequence_id
     */
    public function setRefundSequenceId(?OdooRelation $refund_sequence_id): void
    {
        $this->refund_sequence_id = $refund_sequence_id;
    }

    /**
     * @return int|null
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
     * @return int|null
     */
    public function getSequenceNumberNext(): ?int
    {
        return $this->sequence_number_next;
    }

    /**
     * @param int|null $sequence_number_next
     */
    public function setSequenceNumberNext(?int $sequence_number_next): void
    {
        $this->sequence_number_next = $sequence_number_next;
    }

    /**
     * @return int|null
     */
    public function getRefundSequenceNumberNext(): ?int
    {
        return $this->refund_sequence_number_next;
    }

    /**
     * @param int|null $refund_sequence_number_next
     */
    public function setRefundSequenceNumberNext(?int $refund_sequence_number_next): void
    {
        $this->refund_sequence_number_next = $refund_sequence_number_next;
    }

    /**
     * @return string
     */
    public function getInvoiceReferenceType(): string
    {
        return $this->invoice_reference_type;
    }

    /**
     * @return string
     */
    public function getInvoiceReferenceModel(): string
    {
        return $this->invoice_reference_model;
    }

    /**
     * @return OdooRelation
     */
    public function getSequenceId(): OdooRelation
    {
        return $this->sequence_id;
    }

    /**
     * @param string $invoice_reference_model
     */
    public function setInvoiceReferenceModel(string $invoice_reference_model): void
    {
        $this->invoice_reference_model = $invoice_reference_model;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
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
    public function isRefundSequence(): ?bool
    {
        return $this->refund_sequence;
    }

    /**
     * @param bool|null $refund_sequence
     */
    public function setRefundSequence(?bool $refund_sequence): void
    {
        $this->refund_sequence = $refund_sequence;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInboundPaymentMethodIds(): ?array
    {
        return $this->inbound_payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(?array $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @param OdooRelation $sequence_id
     */
    public function setSequenceId(OdooRelation $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @param bool|null $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(?bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInboundPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasInboundPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->inbound_payment_method_ids) {
            $this->inbound_payment_method_ids = [];
        }

        $this->inbound_payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTypeControlIds(OdooRelation $item): bool
    {
        if (null === $this->type_control_ids) {
            return false;
        }

        return in_array($item, $this->type_control_ids);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTypeControlIds(): ?array
    {
        return $this->type_control_ids;
    }

    /**
     * @param OdooRelation[]|null $type_control_ids
     */
    public function setTypeControlIds(?array $type_control_ids): void
    {
        $this->type_control_ids = $type_control_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTypeControlIds(OdooRelation $item): void
    {
        if ($this->hasTypeControlIds($item)) {
            return;
        }

        if (null === $this->type_control_ids) {
            $this->type_control_ids = [];
        }

        $this->type_control_ids[] = $item;
    }

    /**
     * @return bool|null
     */
    public function isRestrictModeHashTable(): ?bool
    {
        return $this->restrict_mode_hash_table;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTypeControlIds(OdooRelation $item): void
    {
        if (null === $this->type_control_ids) {
            $this->type_control_ids = [];
        }

        if ($this->hasTypeControlIds($item)) {
            $index = array_search($item, $this->type_control_ids);
            unset($this->type_control_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAccountControlIds(): ?array
    {
        return $this->account_control_ids;
    }

    /**
     * @param OdooRelation[]|null $account_control_ids
     */
    public function setAccountControlIds(?array $account_control_ids): void
    {
        $this->account_control_ids = $account_control_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountControlIds(OdooRelation $item): bool
    {
        if (null === $this->account_control_ids) {
            return false;
        }

        return in_array($item, $this->account_control_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccountControlIds(OdooRelation $item): void
    {
        if ($this->hasAccountControlIds($item)) {
            return;
        }

        if (null === $this->account_control_ids) {
            $this->account_control_ids = [];
        }

        $this->account_control_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAccountControlIds(OdooRelation $item): void
    {
        if (null === $this->account_control_ids) {
            $this->account_control_ids = [];
        }

        if ($this->hasAccountControlIds($item)) {
            $index = array_search($item, $this->account_control_ids);
            unset($this->account_control_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultCreditAccountId(): ?OdooRelation
    {
        return $this->default_credit_account_id;
    }

    /**
     * @param OdooRelation|null $default_credit_account_id
     */
    public function setDefaultCreditAccountId(?OdooRelation $default_credit_account_id): void
    {
        $this->default_credit_account_id = $default_credit_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultDebitAccountId(): ?OdooRelation
    {
        return $this->default_debit_account_id;
    }

    /**
     * @param OdooRelation|null $default_debit_account_id
     */
    public function setDefaultDebitAccountId(?OdooRelation $default_debit_account_id): void
    {
        $this->default_debit_account_id = $default_debit_account_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInboundPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->inbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->inbound_payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInboundPaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->inbound_payment_method_ids) {
            $this->inbound_payment_method_ids = [];
        }

        if ($this->hasInboundPaymentMethodIds($item)) {
            $index = array_search($item, $this->inbound_payment_method_ids);
            unset($this->inbound_payment_method_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeJournalGroupIds(OdooRelation $item): void
    {
        if (null === $this->journal_group_ids) {
            $this->journal_group_ids = [];
        }

        if ($this->hasJournalGroupIds($item)) {
            $index = array_search($item, $this->journal_group_ids);
            unset($this->journal_group_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $alias_id
     */
    public function setAliasId(?OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return string|null
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
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
    public function getAliasName(): ?string
    {
        return $this->alias_name;
    }

    /**
     * @param string|null $alias_name
     */
    public function setAliasName(?string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getJournalGroupIds(): ?array
    {
        return $this->journal_group_ids;
    }

    /**
     * @param OdooRelation[]|null $journal_group_ids
     */
    public function setJournalGroupIds(?array $journal_group_ids): void
    {
        $this->journal_group_ids = $journal_group_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasJournalGroupIds(OdooRelation $item): bool
    {
        if (null === $this->journal_group_ids) {
            return false;
        }

        return in_array($item, $this->journal_group_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addJournalGroupIds(OdooRelation $item): void
    {
        if ($this->hasJournalGroupIds($item)) {
            return;
        }

        if (null === $this->journal_group_ids) {
            $this->journal_group_ids = [];
        }

        $this->journal_group_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSecureSequenceId(): ?OdooRelation
    {
        return $this->secure_sequence_id;
    }

    /**
     * @param string|null $post_at
     */
    public function setPostAt(?string $post_at): void
    {
        $this->post_at = $post_at;
    }

    /**
     * @param OdooRelation|null $secure_sequence_id
     */
    public function setSecureSequenceId(?OdooRelation $secure_sequence_id): void
    {
        $this->secure_sequence_id = $secure_sequence_id;
    }

    /**
     * @return string|null
     */
    public function getKanbanDashboard(): ?string
    {
        return $this->kanban_dashboard;
    }

    /**
     * @param string|null $kanban_dashboard
     */
    public function setKanbanDashboard(?string $kanban_dashboard): void
    {
        $this->kanban_dashboard = $kanban_dashboard;
    }

    /**
     * @return string|null
     */
    public function getKanbanDashboardGraph(): ?string
    {
        return $this->kanban_dashboard_graph;
    }

    /**
     * @param string|null $kanban_dashboard_graph
     */
    public function setKanbanDashboardGraph(?string $kanban_dashboard_graph): void
    {
        $this->kanban_dashboard_graph = $kanban_dashboard_graph;
    }

    /**
     * @return string|null
     */
    public function getJsonActivityData(): ?string
    {
        return $this->json_activity_data;
    }

    /**
     * @param string|null $json_activity_data
     */
    public function setJsonActivityData(?string $json_activity_data): void
    {
        $this->json_activity_data = $json_activity_data;
    }

    /**
     * @return bool|null
     */
    public function isShowOnDashboard(): ?bool
    {
        return $this->show_on_dashboard;
    }

    /**
     * @param bool|null $show_on_dashboard
     */
    public function setShowOnDashboard(?bool $show_on_dashboard): void
    {
        $this->show_on_dashboard = $show_on_dashboard;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAliasId(): ?OdooRelation
    {
        return $this->alias_id;
    }

    /**
     * @return string|null
     */
    public function getPostAt(): ?string
    {
        return $this->post_at;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getOutboundPaymentMethodIds(): ?array
    {
        return $this->outbound_payment_method_ids;
    }

    /**
     * @param OdooRelation|null $profit_account_id
     */
    public function setProfitAccountId(?OdooRelation $profit_account_id): void
    {
        $this->profit_account_id = $profit_account_id;
    }

    /**
     * @param OdooRelation[]|null $outbound_payment_method_ids
     */
    public function setOutboundPaymentMethodIds(?array $outbound_payment_method_ids): void
    {
        $this->outbound_payment_method_ids = $outbound_payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOutboundPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->outbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->outbound_payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOutboundPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasOutboundPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->outbound_payment_method_ids) {
            $this->outbound_payment_method_ids = [];
        }

        $this->outbound_payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOutboundPaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->outbound_payment_method_ids) {
            $this->outbound_payment_method_ids = [];
        }

        if ($this->hasOutboundPaymentMethodIds($item)) {
            $index = array_search($item, $this->outbound_payment_method_ids);
            unset($this->outbound_payment_method_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isAtLeastOneInbound(): ?bool
    {
        return $this->at_least_one_inbound;
    }

    /**
     * @param bool|null $at_least_one_inbound
     */
    public function setAtLeastOneInbound(?bool $at_least_one_inbound): void
    {
        $this->at_least_one_inbound = $at_least_one_inbound;
    }

    /**
     * @return bool|null
     */
    public function isAtLeastOneOutbound(): ?bool
    {
        return $this->at_least_one_outbound;
    }

    /**
     * @param bool|null $at_least_one_outbound
     */
    public function setAtLeastOneOutbound(?bool $at_least_one_outbound): void
    {
        $this->at_least_one_outbound = $at_least_one_outbound;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProfitAccountId(): ?OdooRelation
    {
        return $this->profit_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLossAccountId(): ?OdooRelation
    {
        return $this->loss_account_id;
    }

    /**
     * @param OdooRelation|null $bank_id
     */
    public function setBankId(?OdooRelation $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @param OdooRelation|null $loss_account_id
     */
    public function setLossAccountId(?OdooRelation $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyPartnerId(): ?OdooRelation
    {
        return $this->company_partner_id;
    }

    /**
     * @param OdooRelation|null $company_partner_id
     */
    public function setCompanyPartnerId(?OdooRelation $company_partner_id): void
    {
        $this->company_partner_id = $company_partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBankAccountId(): ?OdooRelation
    {
        return $this->bank_account_id;
    }

    /**
     * @param OdooRelation|null $bank_account_id
     */
    public function setBankAccountId(?OdooRelation $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @return string|null
     */
    public function getBankStatementsSource(): ?string
    {
        return $this->bank_statements_source;
    }

    /**
     * @param string|null $bank_statements_source
     */
    public function setBankStatementsSource(?string $bank_statements_source): void
    {
        $this->bank_statements_source = $bank_statements_source;
    }

    /**
     * @return string|null
     */
    public function getBankAccNumber(): ?string
    {
        return $this->bank_acc_number;
    }

    /**
     * @param string|null $bank_acc_number
     */
    public function setBankAccNumber(?string $bank_acc_number): void
    {
        $this->bank_acc_number = $bank_acc_number;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBankId(): ?OdooRelation
    {
        return $this->bank_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.journal';
    }
}
