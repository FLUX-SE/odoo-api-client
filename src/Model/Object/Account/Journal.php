<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * Short Code
     * ---
     * Shorter name used for display. The journal entries of this journal will also be named using this prefix by
     * default.
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
     * Selection :
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
     * Allowed account types
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
     * Allowed accounts
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
     * Default Account Type
     * ---
     * Relation : many2one (account.account.type)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Type
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $default_account_type;

    /**
     * Default Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $default_account_id;

    /**
     * Outstanding Receipts Account
     * ---
     * Incoming payments entries triggered by invoices/refunds will be posted on the Outstanding Receipts Account and
     * displayed as blue lines in the bank reconciliation widget. During the reconciliation process, concerned
     * transactions will be reconciled with entries on the Outstanding Receipts Account instead of the receivable
     * account.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $payment_debit_account_id;

    /**
     * Outstanding Payments Account
     * ---
     * Outgoing payments entries triggered by bills/credit notes will be posted on the Outstanding Payments Account
     * and displayed as blue lines in the bank reconciliation widget. During the reconciliation process, concerned
     * transactions will be reconciled with entries on the Outstanding Payments Account instead of the payable
     * account.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $payment_credit_account_id;

    /**
     * Suspense Account
     * ---
     * Bank statements transactions will be posted on the suspense account until the final reconciliation allowing
     * finding the right account.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $suspense_account_id;

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
     * Communication Type
     * ---
     * You can set here the default communication that will appear on customer invoices, once validated, to help the
     * customer to refer to that particular invoice when making the payment.
     * ---
     * Selection :
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
     * Selection :
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
     * Sequence Override Regex
     * ---
     * Technical field used to enforce complex sequence composition that the system would normally misunderstand.
     * This is a regex that can include all the following capture groups: prefix1, year, prefix2, month, prefix3,
     * seq, suffix.
     * The prefix* groups are the separators between the year, month and the actual increasing sequence number (seq).
     * e.g:
     * ^(?P<prefix1>.*?)(?P<year>\d{4})(?P<prefix2>\D*?)(?P<month>\d{2})(?P<prefix3>\D+?)(?P<seq>\d+)(?P<suffix>\D*?)$
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sequence_override_regex;

    /**
     * Inbound Payment Methods
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
     * Outbound Payment Methods
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
     * Selection :
     *     -> undefined (Undefined Yet)
     *     -> online_sync (Automated Bank Synchronization)
     *     -> file_import (Import(CAMT, CSV, OFX))
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
     * Schedule Activity
     * ---
     * Activity will be automatically scheduled on payment due date, improving collection process.
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $sale_activity_type_id;

    /**
     * Activity User
     * ---
     * Leave empty to assign the Salesperson of the invoice.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $sale_activity_user_id;

    /**
     * Activity Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sale_activity_note;

    /**
     * Email Alias
     * ---
     * Send one separate email for each invoice.
     *
     * Any file extension will be accepted.
     *
     * Only PDF and XML files will be interpreted by Odoo
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
     * Electronic invoicing
     * ---
     * Send XML/EDI invoices
     * ---
     * Relation : many2many (account.edi.format)
     * @see \Flux\OdooApiClient\Model\Object\Account\Edi\Format
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $edi_format_ids;

    /**
     * Compatible Edi
     * ---
     * EDI format that support moves in this journal
     * ---
     * Relation : many2many (account.edi.format)
     * @see \Flux\OdooApiClient\Model\Object\Account\Edi\Format
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $compatible_edi_ids;

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
     * Selection :
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
     * Journal Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $name;

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
     * @param string $code Short Code
     *        ---
     *        Shorter name used for display. The journal entries of this journal will also be named using this prefix by
     *        default.
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
     *        Selection :
     *            -> sale (Sales)
     *            -> purchase (Purchase)
     *            -> cash (Cash)
     *            -> bank (Bank)
     *            -> general (Miscellaneous)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_type Communication Type
     *        ---
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     *        ---
     *        Selection :
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
     *        Selection :
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
     * @param string $name Journal Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $code,
        string $type,
        string $invoice_reference_type,
        string $invoice_reference_model,
        OdooRelation $company_id,
        string $name
    ) {
        $this->code = $code;
        $this->type = $type;
        $this->invoice_reference_type = $invoice_reference_type;
        $this->invoice_reference_model = $invoice_reference_model;
        $this->company_id = $company_id;
        $this->name = $name;
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
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
    public function removeCompatibleEdiIds(OdooRelation $item): void
    {
        if (null === $this->compatible_edi_ids) {
            $this->compatible_edi_ids = [];
        }

        if ($this->hasCompatibleEdiIds($item)) {
            $index = array_search($item, $this->compatible_edi_ids);
            unset($this->compatible_edi_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("edi_format_ids")
     */
    public function getEdiFormatIds(): ?array
    {
        return $this->edi_format_ids;
    }

    /**
     * @param OdooRelation[]|null $edi_format_ids
     */
    public function setEdiFormatIds(?array $edi_format_ids): void
    {
        $this->edi_format_ids = $edi_format_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEdiFormatIds(OdooRelation $item): bool
    {
        if (null === $this->edi_format_ids) {
            return false;
        }

        return in_array($item, $this->edi_format_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addEdiFormatIds(OdooRelation $item): void
    {
        if ($this->hasEdiFormatIds($item)) {
            return;
        }

        if (null === $this->edi_format_ids) {
            $this->edi_format_ids = [];
        }

        $this->edi_format_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEdiFormatIds(OdooRelation $item): void
    {
        if (null === $this->edi_format_ids) {
            $this->edi_format_ids = [];
        }

        if ($this->hasEdiFormatIds($item)) {
            $index = array_search($item, $this->edi_format_ids);
            unset($this->edi_format_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("compatible_edi_ids")
     */
    public function getCompatibleEdiIds(): ?array
    {
        return $this->compatible_edi_ids;
    }

    /**
     * @param OdooRelation[]|null $compatible_edi_ids
     */
    public function setCompatibleEdiIds(?array $compatible_edi_ids): void
    {
        $this->compatible_edi_ids = $compatible_edi_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCompatibleEdiIds(OdooRelation $item): bool
    {
        if (null === $this->compatible_edi_ids) {
            return false;
        }

        return in_array($item, $this->compatible_edi_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addCompatibleEdiIds(OdooRelation $item): void
    {
        if ($this->hasCompatibleEdiIds($item)) {
            return;
        }

        if (null === $this->compatible_edi_ids) {
            $this->compatible_edi_ids = [];
        }

        $this->compatible_edi_ids[] = $item;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("next_synchronization")
     */
    public function getNextSynchronization(): ?DateTimeInterface
    {
        return $this->next_synchronization;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface|null $next_synchronization
     */
    public function setNextSynchronization(?DateTimeInterface $next_synchronization): void
    {
        $this->next_synchronization = $next_synchronization;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_online_journal_id")
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
     *
     * @SerializedName("account_online_provider_id")
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
     *
     * @SerializedName("synchronization_status")
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
     *
     * @SerializedName("bank_statement_creation")
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
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
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
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
     * @SerializedName("message_has_error")
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
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
     *
     * @SerializedName("message_channel_ids")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     *
     * @SerializedName("message_unread")
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
     *
     * @SerializedName("message_unread_counter")
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
     *
     * @SerializedName("message_needaction")
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
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param bool|null $show_on_dashboard
     */
    public function setShowOnDashboard(?bool $show_on_dashboard): void
    {
        $this->show_on_dashboard = $show_on_dashboard;
    }

    /**
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param bool|null $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(?bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
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
     * @return string
     *
     * @SerializedName("invoice_reference_type")
     */
    public function getInvoiceReferenceType(): string
    {
        return $this->invoice_reference_type;
    }

    /**
     * @param string $invoice_reference_type
     */
    public function setInvoiceReferenceType(string $invoice_reference_type): void
    {
        $this->invoice_reference_type = $invoice_reference_type;
    }

    /**
     * @return string
     *
     * @SerializedName("invoice_reference_model")
     */
    public function getInvoiceReferenceModel(): string
    {
        return $this->invoice_reference_model;
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
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("suspense_account_id")
     */
    public function getSuspenseAccountId(): ?OdooRelation
    {
        return $this->suspense_account_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @return bool|null
     *
     * @SerializedName("refund_sequence")
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
     * @return string|null
     *
     * @SerializedName("sequence_override_regex")
     */
    public function getSequenceOverrideRegex(): ?string
    {
        return $this->sequence_override_regex;
    }

    /**
     * @param string|null $sequence_override_regex
     */
    public function setSequenceOverrideRegex(?string $sequence_override_regex): void
    {
        $this->sequence_override_regex = $sequence_override_regex;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("inbound_payment_method_ids")
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
     * @param OdooRelation|null $suspense_account_id
     */
    public function setSuspenseAccountId(?OdooRelation $suspense_account_id): void
    {
        $this->suspense_account_id = $suspense_account_id;
    }

    /**
     * @param OdooRelation|null $payment_credit_account_id
     */
    public function setPaymentCreditAccountId(?OdooRelation $payment_credit_account_id): void
    {
        $this->payment_credit_account_id = $payment_credit_account_id;
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
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
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
     *
     * @SerializedName("type")
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
     *
     * @SerializedName("type_control_ids")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("account_control_ids")
     */
    public function getAccountControlIds(): ?array
    {
        return $this->account_control_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_credit_account_id")
     */
    public function getPaymentCreditAccountId(): ?OdooRelation
    {
        return $this->payment_credit_account_id;
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
     *
     * @SerializedName("default_account_type")
     */
    public function getDefaultAccountType(): ?OdooRelation
    {
        return $this->default_account_type;
    }

    /**
     * @param OdooRelation|null $default_account_type
     */
    public function setDefaultAccountType(?OdooRelation $default_account_type): void
    {
        $this->default_account_type = $default_account_type;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_account_id")
     */
    public function getDefaultAccountId(): ?OdooRelation
    {
        return $this->default_account_id;
    }

    /**
     * @param OdooRelation|null $default_account_id
     */
    public function setDefaultAccountId(?OdooRelation $default_account_id): void
    {
        $this->default_account_id = $default_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_debit_account_id")
     */
    public function getPaymentDebitAccountId(): ?OdooRelation
    {
        return $this->payment_debit_account_id;
    }

    /**
     * @param OdooRelation|null $payment_debit_account_id
     */
    public function setPaymentDebitAccountId(?OdooRelation $payment_debit_account_id): void
    {
        $this->payment_debit_account_id = $payment_debit_account_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("outbound_payment_method_ids")
     */
    public function getOutboundPaymentMethodIds(): ?array
    {
        return $this->outbound_payment_method_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_on_dashboard")
     */
    public function isShowOnDashboard(): ?bool
    {
        return $this->show_on_dashboard;
    }

    /**
     * @param OdooRelation[]|null $journal_group_ids
     */
    public function setJournalGroupIds(?array $journal_group_ids): void
    {
        $this->journal_group_ids = $journal_group_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sale_activity_note")
     */
    public function getSaleActivityNote(): ?string
    {
        return $this->sale_activity_note;
    }

    /**
     * @param string|null $sale_activity_note
     */
    public function setSaleActivityNote(?string $sale_activity_note): void
    {
        $this->sale_activity_note = $sale_activity_note;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("alias_id")
     */
    public function getAliasId(): ?OdooRelation
    {
        return $this->alias_id;
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
     *
     * @SerializedName("alias_domain")
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
     *
     * @SerializedName("alias_name")
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
     *
     * @SerializedName("journal_group_ids")
     */
    public function getJournalGroupIds(): ?array
    {
        return $this->journal_group_ids;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sale_activity_user_id")
     */
    public function getSaleActivityUserId(): ?OdooRelation
    {
        return $this->sale_activity_user_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("secure_sequence_id")
     */
    public function getSecureSequenceId(): ?OdooRelation
    {
        return $this->secure_sequence_id;
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
     *
     * @SerializedName("kanban_dashboard")
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
     *
     * @SerializedName("kanban_dashboard_graph")
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
     *
     * @SerializedName("json_activity_data")
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
     * @param OdooRelation|null $sale_activity_user_id
     */
    public function setSaleActivityUserId(?OdooRelation $sale_activity_user_id): void
    {
        $this->sale_activity_user_id = $sale_activity_user_id;
    }

    /**
     * @param OdooRelation|null $sale_activity_type_id
     */
    public function setSaleActivityTypeId(?OdooRelation $sale_activity_type_id): void
    {
        $this->sale_activity_type_id = $sale_activity_type_id;
    }

    /**
     * @param OdooRelation[]|null $outbound_payment_method_ids
     */
    public function setOutboundPaymentMethodIds(?array $outbound_payment_method_ids): void
    {
        $this->outbound_payment_method_ids = $outbound_payment_method_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("loss_account_id")
     */
    public function getLossAccountId(): ?OdooRelation
    {
        return $this->loss_account_id;
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
     *
     * @SerializedName("at_least_one_inbound")
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
     *
     * @SerializedName("at_least_one_outbound")
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
     *
     * @SerializedName("profit_account_id")
     */
    public function getProfitAccountId(): ?OdooRelation
    {
        return $this->profit_account_id;
    }

    /**
     * @param OdooRelation|null $profit_account_id
     */
    public function setProfitAccountId(?OdooRelation $profit_account_id): void
    {
        $this->profit_account_id = $profit_account_id;
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
     *
     * @SerializedName("sale_activity_type_id")
     */
    public function getSaleActivityTypeId(): ?OdooRelation
    {
        return $this->sale_activity_type_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_partner_id")
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
     *
     * @SerializedName("bank_account_id")
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
     *
     * @SerializedName("bank_statements_source")
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
     *
     * @SerializedName("bank_acc_number")
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
     *
     * @SerializedName("bank_id")
     */
    public function getBankId(): ?OdooRelation
    {
        return $this->bank_id;
    }

    /**
     * @param OdooRelation|null $bank_id
     */
    public function setBankId(?OdooRelation $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.journal';
    }
}
