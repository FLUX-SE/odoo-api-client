<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Account\Payment\Method;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Payment\Token;
use Flux\OdooApiClient\Model\Object\Payment\Transaction;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment
 * Name : account.payment
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
final class Payment extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Payment Reference
     *
     * @var string
     */
    private $payment_reference;

    /**
     * Journal Entry Name
     *
     * @var string
     */
    private $move_name;

    /**
     * Destination Account
     *
     * @var Account
     */
    private $destination_account_id;

    /**
     * Transfer To
     *
     * @var Journal
     */
    private $destination_journal_id;

    /**
     * Invoices
     *
     * @var Move
     */
    private $invoice_ids;

    /**
     * Reconciled Invoices
     *
     * @var Move
     */
    private $reconciled_invoice_ids;

    /**
     * Has Invoices
     *
     * @var bool
     */
    private $has_invoices;

    /**
     * Reconciled Invoices Count
     *
     * @var int
     */
    private $reconciled_invoices_count;

    /**
     * Move Line
     *
     * @var Line
     */
    private $move_line_ids;

    /**
     * Move Reconciled
     *
     * @var bool
     */
    private $move_reconciled;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Payment Type
     *
     * @var null|array
     */
    private $payment_type;

    /**
     * Payment Method
     *
     * @var null|Method
     */
    private $payment_method_id;

    /**
     * Code
     *
     * @var string
     */
    private $payment_method_code;

    /**
     * Partner Type
     *
     * @var array
     */
    private $partner_type;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $payment_date;

    /**
     * Memo
     *
     * @var string
     */
    private $communication;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Hide Payment Method
     *
     * @var bool
     */
    private $hide_payment_method;

    /**
     * Payment Difference
     *
     * @var float
     */
    private $payment_difference;

    /**
     * Payment Difference Handling
     *
     * @var array
     */
    private $payment_difference_handling;

    /**
     * Difference Account
     *
     * @var Account
     */
    private $writeoff_account_id;

    /**
     * Journal Item Label
     *
     * @var string
     */
    private $writeoff_label;

    /**
     * Recipient Bank Account
     *
     * @var Bank
     */
    private $partner_bank_account_id;

    /**
     * Show Partner Bank Account
     *
     * @var bool
     */
    private $show_partner_bank_account;

    /**
     * Require Partner Bank Account
     *
     * @var bool
     */
    private $require_partner_bank_account;

    /**
     * Attachments
     *
     * @var Attachment
     */
    private $attachment_ids;

    /**
     * Payment Transaction
     *
     * @var Transaction
     */
    private $payment_transaction_id;

    /**
     * Saved payment token
     *
     * @var Token
     */
    private $payment_token_id;

    /**
     * Activities
     *
     * @var Activity
     */
    private $activity_ids;

    /**
     * Activity State
     *
     * @var array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     *
     * @var array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     *
     * @var string
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var Followers
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var Partner
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var Channel
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var Message
     */
    private $message_ids;

    /**
     * Unread Messages
     *
     * @var bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     *
     * @var int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     *
     * @var bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     *
     * @var int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     *
     * @var bool
     */
    private $message_has_error;

    /**
     * Number of errors
     *
     * @var int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     *
     * @var Message
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     *
     * @var bool
     */
    private $message_has_sms_error;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Transaction
     */
    public function getPaymentTransactionId(): Transaction
    {
        return $this->payment_transaction_id;
    }

    /**
     * @param Token $payment_token_id
     */
    public function setPaymentTokenId(Token $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param string $activity_summary
     */
    public function setActivitySummary(string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return array
     */
    public function getActivityExceptionDecoration(): array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return string
     */
    public function getActivityExceptionIcon(): string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return bool
     */
    public function isRequirePartnerBankAccount(): bool
    {
        return $this->require_partner_bank_account;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
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
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
    }

    /**
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
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
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @return bool
     */
    public function isShowPartnerBankAccount(): bool
    {
        return $this->show_partner_bank_account;
    }

    /**
     * @return string
     */
    public function getPaymentReference(): string
    {
        return $this->payment_reference;
    }

    /**
     * @return array
     */
    public function getPartnerType(): array
    {
        return $this->partner_type;
    }

    /**
     * @return string
     */
    public function getMoveName(): string
    {
        return $this->move_name;
    }

    /**
     * @return Account
     */
    public function getDestinationAccountId(): Account
    {
        return $this->destination_account_id;
    }

    /**
     * @return Journal
     */
    public function getDestinationJournalId(): Journal
    {
        return $this->destination_journal_id;
    }

    /**
     * @return Move
     */
    public function getInvoiceIds(): Move
    {
        return $this->invoice_ids;
    }

    /**
     * @return Move
     */
    public function getReconciledInvoiceIds(): Move
    {
        return $this->reconciled_invoice_ids;
    }

    /**
     * @return bool
     */
    public function isHasInvoices(): bool
    {
        return $this->has_invoices;
    }

    /**
     * @return int
     */
    public function getReconciledInvoicesCount(): int
    {
        return $this->reconciled_invoices_count;
    }

    /**
     * @return Line
     */
    public function getMoveLineIds(): Line
    {
        return $this->move_line_ids;
    }

    /**
     * @return bool
     */
    public function isMoveReconciled(): bool
    {
        return $this->move_reconciled;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return null|array
     */
    public function getPaymentType(): ?array
    {
        return $this->payment_type;
    }

    /**
     * @return null|Method
     */
    public function getPaymentMethodId(): Method
    {
        return $this->payment_method_id;
    }

    /**
     * @return string
     */
    public function getPaymentMethodCode(): string
    {
        return $this->payment_method_code;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return Bank
     */
    public function getPartnerBankAccountId(): Bank
    {
        return $this->partner_bank_account_id;
    }

    /**
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getPaymentDate(): ?DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @return string
     */
    public function getCommunication(): string
    {
        return $this->communication;
    }

    /**
     * @return null|Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return bool
     */
    public function isHidePaymentMethod(): bool
    {
        return $this->hide_payment_method;
    }

    /**
     * @return float
     */
    public function getPaymentDifference(): float
    {
        return $this->payment_difference;
    }

    /**
     * @param array $payment_difference_handling
     */
    public function setPaymentDifferenceHandling(array $payment_difference_handling): void
    {
        $this->payment_difference_handling = $payment_difference_handling;
    }

    /**
     * @param array $payment_difference_handling
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentDifferenceHandling(
        array $payment_difference_handling,
        bool $strict = true
    ): bool
    {
        return in_array($payment_difference_handling, $this->payment_difference_handling, $strict);
    }

    /**
     * @param array $payment_difference_handling
     */
    public function addPaymentDifferenceHandling(array $payment_difference_handling): void
    {
        if ($this->hasPaymentDifferenceHandling($payment_difference_handling)) {
            return;
        }

        $this->payment_difference_handling[] = $payment_difference_handling;
    }

    /**
     * @param array $payment_difference_handling
     */
    public function removePaymentDifferenceHandling(array $payment_difference_handling): void
    {
        if ($this->hasPaymentDifferenceHandling($payment_difference_handling)) {
            $index = array_search($payment_difference_handling, $this->payment_difference_handling);
            unset($this->payment_difference_handling[$index]);
        }
    }

    /**
     * @param Account $writeoff_account_id
     */
    public function setWriteoffAccountId(Account $writeoff_account_id): void
    {
        $this->writeoff_account_id = $writeoff_account_id;
    }

    /**
     * @param string $writeoff_label
     */
    public function setWriteoffLabel(string $writeoff_label): void
    {
        $this->writeoff_label = $writeoff_label;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
