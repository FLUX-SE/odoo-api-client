<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Type;
use Flux\OdooApiClient\Model\Object\Account\Journal\Group;
use Flux\OdooApiClient\Model\Object\Account\Online\Journal as JournalAlias;
use Flux\OdooApiClient\Model\Object\Account\Online\Provider;
use Flux\OdooApiClient\Model\Object\Account\Payment\Method;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\Sequence;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type as TypeAlias;
use Flux\OdooApiClient\Model\Object\Mail\Alias;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Bank as BankAlias;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.journal
 * Name : account.journal
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
class Journal extends Base
{
    /**
     * Journal Name
     *
     * @var string
     */
    protected $name;

    /**
     * Short Code
     * The journal entries of this journal will be named using this prefix.
     *
     * @var string
     */
    protected $code;

    /**
     * Active
     * Set active to false to hide the Journal without removing it.
     *
     * @var null|bool
     */
    protected $active;

    /**
     * Type
     * Select 'Sale' for customer invoices journals.
     * Select 'Purchase' for vendor bills journals.
     * Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     * Select 'General' for miscellaneous operations journals.
     *
     * @var array
     */
    protected $type;

    /**
     * Account Types Allowed
     *
     * @var null|Type[]
     */
    protected $type_control_ids;

    /**
     * Accounts Allowed
     *
     * @var null|Account[]
     */
    protected $account_control_ids;

    /**
     * Default Credit Account
     * It acts as a default account for credit amount
     *
     * @var null|Account
     */
    protected $default_credit_account_id;

    /**
     * Default Debit Account
     * It acts as a default account for debit amount
     *
     * @var null|Account
     */
    protected $default_debit_account_id;

    /**
     * Lock Posted Entries with Hash
     * If ticked, the accounting entry or invoice receives a hash as soon as it is posted and cannot be modified
     * anymore.
     *
     * @var null|bool
     */
    protected $restrict_mode_hash_table;

    /**
     * Entry Sequence
     * This field contains the information related to the numbering of the journal entries of this journal.
     *
     * @var Sequence
     */
    protected $sequence_id;

    /**
     * Credit Note Entry Sequence
     * This field contains the information related to the numbering of the credit note entries of this journal.
     *
     * @var null|Sequence
     */
    protected $refund_sequence_id;

    /**
     * Sequence
     * Used to order Journals in the dashboard view
     *
     * @var null|int
     */
    protected $sequence;

    /**
     * Next Number
     * The next sequence number will be used for the next invoice.
     *
     * @var null|int
     */
    protected $sequence_number_next;

    /**
     * Credit Notes Next Number
     * The next sequence number will be used for the next credit note.
     *
     * @var null|int
     */
    protected $refund_sequence_number_next;

    /**
     * Communication Type
     * You can set here the default communication that will appear on customer invoices, once validated, to help the
     * customer to refer to that particular invoice when making the payment.
     *
     * @var array
     */
    protected $invoice_reference_type;

    /**
     * Communication Standard
     * You can choose different models for each type of reference. The default one is the Odoo reference.
     *
     * @var array
     */
    protected $invoice_reference_model;

    /**
     * Currency
     * The currency used to enter statement
     *
     * @var null|Currency
     */
    protected $currency_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var Company
     */
    protected $company_id;

    /**
     * Dedicated Credit Note Sequence
     * Check this box if you don't want to share the same sequence for invoices and credit notes made from this
     * journal
     *
     * @var null|bool
     */
    protected $refund_sequence;

    /**
     * For Incoming Payments
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo,you are suggested to reconcile the transaction with the batch
     * deposit. Enable this option from the settings.
     *
     * @var null|Method[]
     */
    protected $inbound_payment_method_ids;

    /**
     * For Outgoing Payments
     * Manual:Pay bill by cash or any other method outside of Odoo.
     * Check:Pay bill by check and print it from Odoo.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. Enable this option
     * from the settings.
     *
     * @var null|Method[]
     */
    protected $outbound_payment_method_ids;

    /**
     * At Least One Inbound
     *
     * @var null|bool
     */
    protected $at_least_one_inbound;

    /**
     * At Least One Outbound
     *
     * @var null|bool
     */
    protected $at_least_one_outbound;

    /**
     * Profit Account
     * Used to register a profit when the ending balance of a cash register differs from what the system computes
     *
     * @var null|Account
     */
    protected $profit_account_id;

    /**
     * Loss Account
     * Used to register a loss when the ending balance of a cash register differs from what the system computes
     *
     * @var null|Account
     */
    protected $loss_account_id;

    /**
     * Account Holder
     *
     * @var null|Partner
     */
    protected $company_partner_id;

    /**
     * Bank Account
     *
     * @var null|Bank
     */
    protected $bank_account_id;

    /**
     * Bank Feeds
     * Defines how the bank statements will be registered
     *
     * @var null|array
     */
    protected $bank_statements_source;

    /**
     * Account Number
     *
     * @var null|string
     */
    protected $bank_acc_number;

    /**
     * Bank
     *
     * @var null|BankAlias
     */
    protected $bank_id;

    /**
     * Post At
     *
     * @var null|array
     */
    protected $post_at;

    /**
     * Alias
     *
     * @var null|Alias
     */
    protected $alias_id;

    /**
     * Alias domain
     *
     * @var null|string
     */
    protected $alias_domain;

    /**
     * Alias Name
     * It creates draft invoices and bills by sending an email.
     *
     * @var null|string
     */
    protected $alias_name;

    /**
     * Journal Groups
     *
     * @var null|Group[]
     */
    protected $journal_group_ids;

    /**
     * Secure Sequence
     * Sequence to use to ensure the securisation of data
     *
     * @var null|Sequence
     */
    protected $secure_sequence_id;

    /**
     * Kanban Dashboard
     *
     * @var null|string
     */
    protected $kanban_dashboard;

    /**
     * Kanban Dashboard Graph
     *
     * @var null|string
     */
    protected $kanban_dashboard_graph;

    /**
     * Json Activity Data
     *
     * @var null|string
     */
    protected $json_activity_data;

    /**
     * Show journal on dashboard
     * Whether this journal should be displayed on the dashboard or not
     *
     * @var null|bool
     */
    protected $show_on_dashboard;

    /**
     * Color Index
     *
     * @var null|int
     */
    protected $color;

    /**
     * Next synchronization
     *
     * @var null|DateTimeInterface
     */
    protected $next_synchronization;

    /**
     * Account Online Journal
     *
     * @var null|JournalAlias
     */
    protected $account_online_journal_id;

    /**
     * Account Online Provider
     *
     * @var null|Provider
     */
    protected $account_online_provider_id;

    /**
     * Synchronization status
     * Update status of provider account
     *
     * @var null|string
     */
    protected $synchronization_status;

    /**
     * Creation of Bank Statements
     * Defines when a new bank statement
     * will be created when fetching new transactions
     * from your bank account.
     *
     * @var null|array
     */
    protected $bank_statement_creation;

    /**
     * Activities
     *
     * @var null|Activity[]
     */
    protected $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     *
     * @var null|array
     */
    protected $activity_state;

    /**
     * Responsible User
     *
     * @var null|Users
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var null|TypeAlias
     */
    protected $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var null|DateTimeInterface
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var null|string
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     *
     * @var null|array
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     *
     * @var null|string
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var null|bool
     */
    protected $message_is_follower;

    /**
     * Followers
     *
     * @var null|Followers[]
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var null|Partner[]
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|Channel[]
     */
    protected $message_channel_ids;

    /**
     * Messages
     *
     * @var null|Message[]
     */
    protected $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     *
     * @var null|int
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    protected $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     *
     * @var null|int
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    protected $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     *
     * @var null|int
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var null|int
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var null|Attachment
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     *
     * @var null|Message[]
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    protected $message_has_sms_error;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $name Journal Name
     * @param string $code Short Code
     *        The journal entries of this journal will be named using this prefix.
     * @param array $type Type
     *        Select 'Sale' for customer invoices journals.
     *        Select 'Purchase' for vendor bills journals.
     *        Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     *        Select 'General' for miscellaneous operations journals.
     * @param Sequence $sequence_id Entry Sequence
     *        This field contains the information related to the numbering of the journal entries of this journal.
     * @param array $invoice_reference_type Communication Type
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     * @param array $invoice_reference_model Communication Standard
     *        You can choose different models for each type of reference. The default one is the Odoo reference.
     * @param Company $company_id Company
     *        Company related to this journal
     */
    public function __construct(
        string $name,
        string $code,
        array $type,
        Sequence $sequence_id,
        array $invoice_reference_type,
        array $invoice_reference_model,
        Company $company_id
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
     * @param null|string $synchronization_status
     */
    public function setSynchronizationStatus(?string $synchronization_status): void
    {
        $this->synchronization_status = $synchronization_status;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param null|TypeAlias $activity_type_id
     */
    public function setActivityTypeId(?TypeAlias $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return null|array
     */
    public function getActivityState(): ?array
    {
        return $this->activity_state;
    }

    /**
     * @param Activity $item
     */
    public function removeActivityIds(Activity $item): void
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
     * @param Activity $item
     */
    public function addActivityIds(Activity $item): void
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
     * @param Activity $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityIds(Activity $item, bool $strict = true): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids, $strict);
    }

    /**
     * @param null|Activity[] $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param mixed $item
     */
    public function removeBankStatementCreation($item): void
    {
        if (null === $this->bank_statement_creation) {
            $this->bank_statement_creation = [];
        }

        if ($this->hasBankStatementCreation($item)) {
            $index = array_search($item, $this->bank_statement_creation);
            unset($this->bank_statement_creation[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addBankStatementCreation($item): void
    {
        if ($this->hasBankStatementCreation($item)) {
            return;
        }

        if (null === $this->bank_statement_creation) {
            $this->bank_statement_creation = [];
        }

        $this->bank_statement_creation[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankStatementCreation($item, bool $strict = true): bool
    {
        if (null === $this->bank_statement_creation) {
            return false;
        }

        return in_array($item, $this->bank_statement_creation, $strict);
    }

    /**
     * @param null|array $bank_statement_creation
     */
    public function setBankStatementCreation(?array $bank_statement_creation): void
    {
        $this->bank_statement_creation = $bank_statement_creation;
    }

    /**
     * @param null|Provider $account_online_provider_id
     */
    public function setAccountOnlineProviderId(?Provider $account_online_provider_id): void
    {
        $this->account_online_provider_id = $account_online_provider_id;
    }

    /**
     * @return null|array
     */
    public function getActivityExceptionDecoration(): ?array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param null|JournalAlias $account_online_journal_id
     */
    public function setAccountOnlineJournalId(?JournalAlias $account_online_journal_id): void
    {
        $this->account_online_journal_id = $account_online_journal_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNextSynchronization(): ?DateTimeInterface
    {
        return $this->next_synchronization;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param null|bool $show_on_dashboard
     */
    public function setShowOnDashboard(?bool $show_on_dashboard): void
    {
        $this->show_on_dashboard = $show_on_dashboard;
    }

    /**
     * @return null|string
     */
    public function getJsonActivityData(): ?string
    {
        return $this->json_activity_data;
    }

    /**
     * @return null|string
     */
    public function getKanbanDashboardGraph(): ?string
    {
        return $this->kanban_dashboard_graph;
    }

    /**
     * @return null|string
     */
    public function getKanbanDashboard(): ?string
    {
        return $this->kanban_dashboard;
    }

    /**
     * @return null|Sequence
     */
    public function getSecureSequenceId(): ?Sequence
    {
        return $this->secure_sequence_id;
    }

    /**
     * @param Group $item
     */
    public function removeJournalGroupIds(Group $item): void
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
     * @param Group $item
     */
    public function addJournalGroupIds(Group $item): void
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
     * @param Group $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalGroupIds(Group $item, bool $strict = true): bool
    {
        if (null === $this->journal_group_ids) {
            return false;
        }

        return in_array($item, $this->journal_group_ids, $strict);
    }

    /**
     * @param null|Group[] $journal_group_ids
     */
    public function setJournalGroupIds(?array $journal_group_ids): void
    {
        $this->journal_group_ids = $journal_group_ids;
    }

    /**
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return null|string
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return null|string
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Message $item
     */
    public function removeWebsiteMessageIds(Message $item): void
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
     * @param Message $item
     */
    public function addWebsiteMessageIds(Message $item): void
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
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids, $strict);
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param Message $item
     */
    public function removeMessageIds(Message $item): void
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
     * @param Message $item
     */
    public function addMessageIds(Message $item): void
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
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids, $strict);
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Followers $item
     */
    public function removeMessageFollowerIds(Followers $item): void
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
     * @param Followers $item
     */
    public function addMessageFollowerIds(Followers $item): void
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
     * @param Followers $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageFollowerIds(Followers $item, bool $strict = true): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids, $strict);
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @param null|string $alias_name
     */
    public function setAliasName(?string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @param null|Alias $alias_id
     */
    public function setAliasId(?Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Account $item
     */
    public function removeAccountControlIds(Account $item): void
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
     * @param mixed $item
     */
    public function removeInvoiceReferenceType($item): void
    {
        if ($this->hasInvoiceReferenceType($item)) {
            $index = array_search($item, $this->invoice_reference_type);
            unset($this->invoice_reference_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addInvoiceReferenceType($item): void
    {
        if ($this->hasInvoiceReferenceType($item)) {
            return;
        }

        $this->invoice_reference_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceReferenceType($item, bool $strict = true): bool
    {
        return in_array($item, $this->invoice_reference_type, $strict);
    }

    /**
     * @param array $invoice_reference_type
     */
    public function setInvoiceReferenceType(array $invoice_reference_type): void
    {
        $this->invoice_reference_type = $invoice_reference_type;
    }

    /**
     * @param null|int $refund_sequence_number_next
     */
    public function setRefundSequenceNumberNext(?int $refund_sequence_number_next): void
    {
        $this->refund_sequence_number_next = $refund_sequence_number_next;
    }

    /**
     * @param null|int $sequence_number_next
     */
    public function setSequenceNumberNext(?int $sequence_number_next): void
    {
        $this->sequence_number_next = $sequence_number_next;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Sequence $refund_sequence_id
     */
    public function setRefundSequenceId(?Sequence $refund_sequence_id): void
    {
        $this->refund_sequence_id = $refund_sequence_id;
    }

    /**
     * @param Sequence $sequence_id
     */
    public function setSequenceId(Sequence $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @param null|bool $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(?bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
    }

    /**
     * @param null|Account $default_debit_account_id
     */
    public function setDefaultDebitAccountId(?Account $default_debit_account_id): void
    {
        $this->default_debit_account_id = $default_debit_account_id;
    }

    /**
     * @param null|Account $default_credit_account_id
     */
    public function setDefaultCreditAccountId(?Account $default_credit_account_id): void
    {
        $this->default_credit_account_id = $default_credit_account_id;
    }

    /**
     * @param Account $item
     */
    public function addAccountControlIds(Account $item): void
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
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceReferenceModel($item, bool $strict = true): bool
    {
        return in_array($item, $this->invoice_reference_model, $strict);
    }

    /**
     * @param Account $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountControlIds(Account $item, bool $strict = true): bool
    {
        if (null === $this->account_control_ids) {
            return false;
        }

        return in_array($item, $this->account_control_ids, $strict);
    }

    /**
     * @param null|Account[] $account_control_ids
     */
    public function setAccountControlIds(?array $account_control_ids): void
    {
        $this->account_control_ids = $account_control_ids;
    }

    /**
     * @param Type $item
     */
    public function removeTypeControlIds(Type $item): void
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
     * @param Type $item
     */
    public function addTypeControlIds(Type $item): void
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
     * @param Type $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTypeControlIds(Type $item, bool $strict = true): bool
    {
        if (null === $this->type_control_ids) {
            return false;
        }

        return in_array($item, $this->type_control_ids, $strict);
    }

    /**
     * @param null|Type[] $type_control_ids
     */
    public function setTypeControlIds(?array $type_control_ids): void
    {
        $this->type_control_ids = $type_control_ids;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param array $invoice_reference_model
     */
    public function setInvoiceReferenceModel(array $invoice_reference_model): void
    {
        $this->invoice_reference_model = $invoice_reference_model;
    }

    /**
     * @param mixed $item
     */
    public function addInvoiceReferenceModel($item): void
    {
        if ($this->hasInvoiceReferenceModel($item)) {
            return;
        }

        $this->invoice_reference_model[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePostAt($item): void
    {
        if (null === $this->post_at) {
            $this->post_at = [];
        }

        if ($this->hasPostAt($item)) {
            $index = array_search($item, $this->post_at);
            unset($this->post_at[$index]);
        }
    }

    /**
     * @param null|Account $profit_account_id
     */
    public function setProfitAccountId(?Account $profit_account_id): void
    {
        $this->profit_account_id = $profit_account_id;
    }

    /**
     * @param mixed $item
     */
    public function addPostAt($item): void
    {
        if ($this->hasPostAt($item)) {
            return;
        }

        if (null === $this->post_at) {
            $this->post_at = [];
        }

        $this->post_at[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPostAt($item, bool $strict = true): bool
    {
        if (null === $this->post_at) {
            return false;
        }

        return in_array($item, $this->post_at, $strict);
    }

    /**
     * @param null|array $post_at
     */
    public function setPostAt(?array $post_at): void
    {
        $this->post_at = $post_at;
    }

    /**
     * @param null|BankAlias $bank_id
     */
    public function setBankId(?BankAlias $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @param null|string $bank_acc_number
     */
    public function setBankAccNumber(?string $bank_acc_number): void
    {
        $this->bank_acc_number = $bank_acc_number;
    }

    /**
     * @param mixed $item
     */
    public function removeBankStatementsSource($item): void
    {
        if (null === $this->bank_statements_source) {
            $this->bank_statements_source = [];
        }

        if ($this->hasBankStatementsSource($item)) {
            $index = array_search($item, $this->bank_statements_source);
            unset($this->bank_statements_source[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addBankStatementsSource($item): void
    {
        if ($this->hasBankStatementsSource($item)) {
            return;
        }

        if (null === $this->bank_statements_source) {
            $this->bank_statements_source = [];
        }

        $this->bank_statements_source[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankStatementsSource($item, bool $strict = true): bool
    {
        if (null === $this->bank_statements_source) {
            return false;
        }

        return in_array($item, $this->bank_statements_source, $strict);
    }

    /**
     * @param null|array $bank_statements_source
     */
    public function setBankStatementsSource(?array $bank_statements_source): void
    {
        $this->bank_statements_source = $bank_statements_source;
    }

    /**
     * @param null|Bank $bank_account_id
     */
    public function setBankAccountId(?Bank $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @return null|Partner
     */
    public function getCompanyPartnerId(): ?Partner
    {
        return $this->company_partner_id;
    }

    /**
     * @param null|Account $loss_account_id
     */
    public function setLossAccountId(?Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @return null|bool
     */
    public function isAtLeastOneOutbound(): ?bool
    {
        return $this->at_least_one_outbound;
    }

    /**
     * @param mixed $item
     */
    public function removeInvoiceReferenceModel($item): void
    {
        if ($this->hasInvoiceReferenceModel($item)) {
            $index = array_search($item, $this->invoice_reference_model);
            unset($this->invoice_reference_model[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isAtLeastOneInbound(): ?bool
    {
        return $this->at_least_one_inbound;
    }

    /**
     * @param Method $item
     */
    public function removeOutboundPaymentMethodIds(Method $item): void
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
     * @param Method $item
     */
    public function addOutboundPaymentMethodIds(Method $item): void
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
     * @param Method $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOutboundPaymentMethodIds(Method $item, bool $strict = true): bool
    {
        if (null === $this->outbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->outbound_payment_method_ids, $strict);
    }

    /**
     * @param null|Method[] $outbound_payment_method_ids
     */
    public function setOutboundPaymentMethodIds(?array $outbound_payment_method_ids): void
    {
        $this->outbound_payment_method_ids = $outbound_payment_method_ids;
    }

    /**
     * @param Method $item
     */
    public function removeInboundPaymentMethodIds(Method $item): void
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
     * @param Method $item
     */
    public function addInboundPaymentMethodIds(Method $item): void
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
     * @param Method $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInboundPaymentMethodIds(Method $item, bool $strict = true): bool
    {
        if (null === $this->inbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->inbound_payment_method_ids, $strict);
    }

    /**
     * @param null|Method[] $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(?array $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @param null|bool $refund_sequence
     */
    public function setRefundSequence(?bool $refund_sequence): void
    {
        $this->refund_sequence = $refund_sequence;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
