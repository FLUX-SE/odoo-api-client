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
 *
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
     * @var null|string
     */
    protected $name;

    /**
     * Short Code
     *
     * @var null|string
     */
    protected $code;

    /**
     * Active
     *
     * @var bool
     */
    protected $active;

    /**
     * Type
     *
     * @var null|array
     */
    protected $type;

    /**
     * Account Types Allowed
     *
     * @var Type
     */
    protected $type_control_ids;

    /**
     * Accounts Allowed
     *
     * @var Account
     */
    protected $account_control_ids;

    /**
     * Default Credit Account
     *
     * @var Account
     */
    protected $default_credit_account_id;

    /**
     * Default Debit Account
     *
     * @var Account
     */
    protected $default_debit_account_id;

    /**
     * Lock Posted Entries with Hash
     *
     * @var bool
     */
    protected $restrict_mode_hash_table;

    /**
     * Entry Sequence
     *
     * @var null|Sequence
     */
    protected $sequence_id;

    /**
     * Credit Note Entry Sequence
     *
     * @var Sequence
     */
    protected $refund_sequence_id;

    /**
     * Sequence
     *
     * @var int
     */
    protected $sequence;

    /**
     * Next Number
     *
     * @var int
     */
    protected $sequence_number_next;

    /**
     * Credit Notes Next Number
     *
     * @var int
     */
    protected $refund_sequence_number_next;

    /**
     * Communication Type
     *
     * @var null|array
     */
    protected $invoice_reference_type;

    /**
     * Communication Standard
     *
     * @var null|array
     */
    protected $invoice_reference_model;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    protected $company_id;

    /**
     * Dedicated Credit Note Sequence
     *
     * @var bool
     */
    protected $refund_sequence;

    /**
     * For Incoming Payments
     *
     * @var Method
     */
    protected $inbound_payment_method_ids;

    /**
     * For Outgoing Payments
     *
     * @var Method
     */
    protected $outbound_payment_method_ids;

    /**
     * At Least One Inbound
     *
     * @var bool
     */
    protected $at_least_one_inbound;

    /**
     * At Least One Outbound
     *
     * @var bool
     */
    protected $at_least_one_outbound;

    /**
     * Profit Account
     *
     * @var Account
     */
    protected $profit_account_id;

    /**
     * Loss Account
     *
     * @var Account
     */
    protected $loss_account_id;

    /**
     * Account Holder
     *
     * @var Partner
     */
    protected $company_partner_id;

    /**
     * Bank Account
     *
     * @var Bank
     */
    protected $bank_account_id;

    /**
     * Bank Feeds
     *
     * @var array
     */
    protected $bank_statements_source;

    /**
     * Account Number
     *
     * @var string
     */
    protected $bank_acc_number;

    /**
     * Bank
     *
     * @var BankAlias
     */
    protected $bank_id;

    /**
     * Post At
     *
     * @var array
     */
    protected $post_at;

    /**
     * Alias
     *
     * @var Alias
     */
    protected $alias_id;

    /**
     * Alias domain
     *
     * @var string
     */
    protected $alias_domain;

    /**
     * Alias Name
     *
     * @var string
     */
    protected $alias_name;

    /**
     * Journal Groups
     *
     * @var Group
     */
    protected $journal_group_ids;

    /**
     * Secure Sequence
     *
     * @var Sequence
     */
    protected $secure_sequence_id;

    /**
     * Kanban Dashboard
     *
     * @var string
     */
    protected $kanban_dashboard;

    /**
     * Kanban Dashboard Graph
     *
     * @var string
     */
    protected $kanban_dashboard_graph;

    /**
     * Json Activity Data
     *
     * @var string
     */
    protected $json_activity_data;

    /**
     * Show journal on dashboard
     *
     * @var bool
     */
    protected $show_on_dashboard;

    /**
     * Color Index
     *
     * @var int
     */
    protected $color;

    /**
     * Next synchronization
     *
     * @var DateTimeInterface
     */
    protected $next_synchronization;

    /**
     * Account Online Journal
     *
     * @var JournalAlias
     */
    protected $account_online_journal_id;

    /**
     * Account Online Provider
     *
     * @var Provider
     */
    protected $account_online_provider_id;

    /**
     * Synchronization status
     *
     * @var string
     */
    protected $synchronization_status;

    /**
     * Creation of Bank Statements
     *
     * @var array
     */
    protected $bank_statement_creation;

    /**
     * Activities
     *
     * @var Activity
     */
    protected $activity_ids;

    /**
     * Activity State
     *
     * @var array
     */
    protected $activity_state;

    /**
     * Responsible User
     *
     * @var Users
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var TypeAlias
     */
    protected $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var DateTimeInterface
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var string
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     *
     * @var array
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     *
     * @var string
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var bool
     */
    protected $message_is_follower;

    /**
     * Followers
     *
     * @var Followers
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var Partner
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var Channel
     */
    protected $message_channel_ids;

    /**
     * Messages
     *
     * @var Message
     */
    protected $message_ids;

    /**
     * Unread Messages
     *
     * @var bool
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     *
     * @var int
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     *
     * @var bool
     */
    protected $message_needaction;

    /**
     * Number of Actions
     *
     * @var int
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     *
     * @var bool
     */
    protected $message_has_error;

    /**
     * Number of errors
     *
     * @var int
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var int
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var Attachment
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     *
     * @var Message
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     *
     * @var bool
     */
    protected $message_has_sms_error;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Provider $account_online_provider_id
     */
    public function setAccountOnlineProviderId(Provider $account_online_provider_id): void
    {
        $this->account_online_provider_id = $account_online_provider_id;
    }

    /**
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param array $bank_statement_creation
     */
    public function removeBankStatementCreation(array $bank_statement_creation): void
    {
        if ($this->hasBankStatementCreation($bank_statement_creation)) {
            $index = array_search($bank_statement_creation, $this->bank_statement_creation);
            unset($this->bank_statement_creation[$index]);
        }
    }

    /**
     * @param array $bank_statement_creation
     */
    public function addBankStatementCreation(array $bank_statement_creation): void
    {
        if ($this->hasBankStatementCreation($bank_statement_creation)) {
            return;
        }

        $this->bank_statement_creation[] = $bank_statement_creation;
    }

    /**
     * @param array $bank_statement_creation
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankStatementCreation(array $bank_statement_creation, bool $strict = true): bool
    {
        return in_array($bank_statement_creation, $this->bank_statement_creation, $strict);
    }

    /**
     * @param array $bank_statement_creation
     */
    public function setBankStatementCreation(array $bank_statement_creation): void
    {
        $this->bank_statement_creation = $bank_statement_creation;
    }

    /**
     * @param string $synchronization_status
     */
    public function setSynchronizationStatus(string $synchronization_status): void
    {
        $this->synchronization_status = $synchronization_status;
    }

    /**
     * @param JournalAlias $account_online_journal_id
     */
    public function setAccountOnlineJournalId(JournalAlias $account_online_journal_id): void
    {
        $this->account_online_journal_id = $account_online_journal_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return DateTimeInterface
     */
    public function getNextSynchronization(): DateTimeInterface
    {
        return $this->next_synchronization;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param bool $show_on_dashboard
     */
    public function setShowOnDashboard(bool $show_on_dashboard): void
    {
        $this->show_on_dashboard = $show_on_dashboard;
    }

    /**
     * @return string
     */
    public function getJsonActivityData(): string
    {
        return $this->json_activity_data;
    }

    /**
     * @return string
     */
    public function getKanbanDashboardGraph(): string
    {
        return $this->kanban_dashboard_graph;
    }

    /**
     * @return string
     */
    public function getKanbanDashboard(): string
    {
        return $this->kanban_dashboard;
    }

    /**
     * @return Sequence
     */
    public function getSecureSequenceId(): Sequence
    {
        return $this->secure_sequence_id;
    }

    /**
     * @param Group $journal_group_ids
     */
    public function setJournalGroupIds(Group $journal_group_ids): void
    {
        $this->journal_group_ids = $journal_group_ids;
    }

    /**
     * @param string $alias_name
     */
    public function setAliasName(string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @param TypeAlias $activity_type_id
     */
    public function setActivityTypeId(TypeAlias $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param string $activity_summary
     */
    public function setActivitySummary(string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param Alias $alias_id
     */
    public function setAliasId(Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return array
     */
    public function getActivityExceptionDecoration(): array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
    }

    /**
     * @return int
     */
    public function getMessageUnreadCounter(): int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return string
     */
    public function getActivityExceptionIcon(): string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return string
     */
    public function getAliasDomain(): string
    {
        return $this->alias_domain;
    }

    /**
     * @param array $post_at
     */
    public function removePostAt(array $post_at): void
    {
        if ($this->hasPostAt($post_at)) {
            $index = array_search($post_at, $this->post_at);
            unset($this->post_at[$index]);
        }
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|Sequence $sequence_id
     */
    public function setSequenceId(Sequence $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @param ?array $invoice_reference_type
     */
    public function removeInvoiceReferenceType(?array $invoice_reference_type): void
    {
        if ($this->hasInvoiceReferenceType($invoice_reference_type)) {
            $index = array_search($invoice_reference_type, $this->invoice_reference_type);
            unset($this->invoice_reference_type[$index]);
        }
    }

    /**
     * @param ?array $invoice_reference_type
     */
    public function addInvoiceReferenceType(?array $invoice_reference_type): void
    {
        if ($this->hasInvoiceReferenceType($invoice_reference_type)) {
            return;
        }

        if (null === $this->invoice_reference_type) {
            $this->invoice_reference_type = [];
        }

        $this->invoice_reference_type[] = $invoice_reference_type;
    }

    /**
     * @param ?array $invoice_reference_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceReferenceType(?array $invoice_reference_type, bool $strict = true): bool
    {
        if (null === $this->invoice_reference_type) {
            return false;
        }

        return in_array($invoice_reference_type, $this->invoice_reference_type, $strict);
    }

    /**
     * @param null|array $invoice_reference_type
     */
    public function setInvoiceReferenceType(?array $invoice_reference_type): void
    {
        $this->invoice_reference_type = $invoice_reference_type;
    }

    /**
     * @param int $refund_sequence_number_next
     */
    public function setRefundSequenceNumberNext(int $refund_sequence_number_next): void
    {
        $this->refund_sequence_number_next = $refund_sequence_number_next;
    }

    /**
     * @param int $sequence_number_next
     */
    public function setSequenceNumberNext(int $sequence_number_next): void
    {
        $this->sequence_number_next = $sequence_number_next;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Sequence $refund_sequence_id
     */
    public function setRefundSequenceId(Sequence $refund_sequence_id): void
    {
        $this->refund_sequence_id = $refund_sequence_id;
    }

    /**
     * @param bool $restrict_mode_hash_table
     */
    public function setRestrictModeHashTable(bool $restrict_mode_hash_table): void
    {
        $this->restrict_mode_hash_table = $restrict_mode_hash_table;
    }

    /**
     * @param ?array $invoice_reference_model
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceReferenceModel(?array $invoice_reference_model, bool $strict = true): bool
    {
        if (null === $this->invoice_reference_model) {
            return false;
        }

        return in_array($invoice_reference_model, $this->invoice_reference_model, $strict);
    }

    /**
     * @param Account $default_debit_account_id
     */
    public function setDefaultDebitAccountId(Account $default_debit_account_id): void
    {
        $this->default_debit_account_id = $default_debit_account_id;
    }

    /**
     * @param Account $default_credit_account_id
     */
    public function setDefaultCreditAccountId(Account $default_credit_account_id): void
    {
        $this->default_credit_account_id = $default_credit_account_id;
    }

    /**
     * @param Account $account_control_ids
     */
    public function setAccountControlIds(Account $account_control_ids): void
    {
        $this->account_control_ids = $account_control_ids;
    }

    /**
     * @param Type $type_control_ids
     */
    public function setTypeControlIds(Type $type_control_ids): void
    {
        $this->type_control_ids = $type_control_ids;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|array $invoice_reference_model
     */
    public function setInvoiceReferenceModel(?array $invoice_reference_model): void
    {
        $this->invoice_reference_model = $invoice_reference_model;
    }

    /**
     * @param ?array $invoice_reference_model
     */
    public function addInvoiceReferenceModel(?array $invoice_reference_model): void
    {
        if ($this->hasInvoiceReferenceModel($invoice_reference_model)) {
            return;
        }

        if (null === $this->invoice_reference_model) {
            $this->invoice_reference_model = [];
        }

        $this->invoice_reference_model[] = $invoice_reference_model;
    }

    /**
     * @param array $post_at
     */
    public function addPostAt(array $post_at): void
    {
        if ($this->hasPostAt($post_at)) {
            return;
        }

        $this->post_at[] = $post_at;
    }

    /**
     * @param Bank $bank_account_id
     */
    public function setBankAccountId(Bank $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @param array $post_at
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPostAt(array $post_at, bool $strict = true): bool
    {
        return in_array($post_at, $this->post_at, $strict);
    }

    /**
     * @param array $post_at
     */
    public function setPostAt(array $post_at): void
    {
        $this->post_at = $post_at;
    }

    /**
     * @param BankAlias $bank_id
     */
    public function setBankId(BankAlias $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @param string $bank_acc_number
     */
    public function setBankAccNumber(string $bank_acc_number): void
    {
        $this->bank_acc_number = $bank_acc_number;
    }

    /**
     * @param array $bank_statements_source
     */
    public function removeBankStatementsSource(array $bank_statements_source): void
    {
        if ($this->hasBankStatementsSource($bank_statements_source)) {
            $index = array_search($bank_statements_source, $this->bank_statements_source);
            unset($this->bank_statements_source[$index]);
        }
    }

    /**
     * @param array $bank_statements_source
     */
    public function addBankStatementsSource(array $bank_statements_source): void
    {
        if ($this->hasBankStatementsSource($bank_statements_source)) {
            return;
        }

        $this->bank_statements_source[] = $bank_statements_source;
    }

    /**
     * @param array $bank_statements_source
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankStatementsSource(array $bank_statements_source, bool $strict = true): bool
    {
        return in_array($bank_statements_source, $this->bank_statements_source, $strict);
    }

    /**
     * @param array $bank_statements_source
     */
    public function setBankStatementsSource(array $bank_statements_source): void
    {
        $this->bank_statements_source = $bank_statements_source;
    }

    /**
     * @return Partner
     */
    public function getCompanyPartnerId(): Partner
    {
        return $this->company_partner_id;
    }

    /**
     * @param ?array $invoice_reference_model
     */
    public function removeInvoiceReferenceModel(?array $invoice_reference_model): void
    {
        if ($this->hasInvoiceReferenceModel($invoice_reference_model)) {
            $index = array_search($invoice_reference_model, $this->invoice_reference_model);
            unset($this->invoice_reference_model[$index]);
        }
    }

    /**
     * @param Account $loss_account_id
     */
    public function setLossAccountId(Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @param Account $profit_account_id
     */
    public function setProfitAccountId(Account $profit_account_id): void
    {
        $this->profit_account_id = $profit_account_id;
    }

    /**
     * @return bool
     */
    public function isAtLeastOneOutbound(): bool
    {
        return $this->at_least_one_outbound;
    }

    /**
     * @return bool
     */
    public function isAtLeastOneInbound(): bool
    {
        return $this->at_least_one_inbound;
    }

    /**
     * @param Method $outbound_payment_method_ids
     */
    public function setOutboundPaymentMethodIds(Method $outbound_payment_method_ids): void
    {
        $this->outbound_payment_method_ids = $outbound_payment_method_ids;
    }

    /**
     * @param Method $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(Method $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @param bool $refund_sequence
     */
    public function setRefundSequence(bool $refund_sequence): void
    {
        $this->refund_sequence = $refund_sequence;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
