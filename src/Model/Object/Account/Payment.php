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
final class Payment extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Payment Reference
     * Reference of the document used to issue this payment. Eg. check number, file name, etc.
     *
     * @var null|string
     */
    private $payment_reference;

    /**
     * Journal Entry Name
     * Technical field holding the number given to the journal entry, automatically set when the statement line is
     * reconciled then stored to set the same number again if the line is cancelled, set to draft and re-processed
     * again.
     *
     * @var null|string
     */
    private $move_name;

    /**
     * Destination Account
     *
     * @var null|Account
     */
    private $destination_account_id;

    /**
     * Transfer To
     *
     * @var null|Journal
     */
    private $destination_journal_id;

    /**
     * Invoices
     * Technical field containing the invoice for which the payment has been generated.
     * This does not especially correspond to the invoices reconciled with the payment,
     * as it can have been generated first, and reconciled later
     *
     * @var null|Move[]
     */
    private $invoice_ids;

    /**
     * Reconciled Invoices
     * Invoices whose journal items have been reconciled with these payments.
     *
     * @var null|Move[]
     */
    private $reconciled_invoice_ids;

    /**
     * Has Invoices
     * Technical field used for usability purposes
     *
     * @var null|bool
     */
    private $has_invoices;

    /**
     * Reconciled Invoices Count
     *
     * @var null|int
     */
    private $reconciled_invoices_count;

    /**
     * Move Line
     *
     * @var null|Line[]
     */
    private $move_line_ids;

    /**
     * Move Reconciled
     *
     * @var null|bool
     */
    private $move_reconciled;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Payment Type
     *
     * @var array
     */
    private $payment_type;

    /**
     * Payment Method
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Check: Pay bill by check and print it from Odoo.
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     * deposit.To enable batch deposit, module account_batch_payment must be installed.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     * transfer, module account_sepa must be installed
     *
     * @var Method
     */
    private $payment_method_id;

    /**
     * Code
     * Technical field used to adapt the interface to the payment type selected.
     *
     * @var null|string
     */
    private $payment_method_code;

    /**
     * Partner Type
     *
     * @var null|array
     */
    private $partner_type;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $payment_date;

    /**
     * Memo
     *
     * @var null|string
     */
    private $communication;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Hide Payment Method
     * Technical field used to hide the payment method if the selected journal has only one available which is
     * 'manual'
     *
     * @var null|bool
     */
    private $hide_payment_method;

    /**
     * Payment Difference
     *
     * @var null|float
     */
    private $payment_difference;

    /**
     * Payment Difference Handling
     *
     * @var null|array
     */
    private $payment_difference_handling;

    /**
     * Difference Account
     *
     * @var null|Account
     */
    private $writeoff_account_id;

    /**
     * Journal Item Label
     * Change label of the counterpart that will hold the payment difference
     *
     * @var null|string
     */
    private $writeoff_label;

    /**
     * Recipient Bank Account
     *
     * @var null|Bank
     */
    private $partner_bank_account_id;

    /**
     * Show Partner Bank Account
     * Technical field used to know whether the field `partner_bank_account_id` needs to be displayed or not in the
     * payments form views
     *
     * @var null|bool
     */
    private $show_partner_bank_account;

    /**
     * Require Partner Bank Account
     * Technical field used to know whether the field `partner_bank_account_id` needs to be required or not in the
     * payments form views
     *
     * @var null|bool
     */
    private $require_partner_bank_account;

    /**
     * Attachments
     *
     * @var null|Attachment[]
     */
    private $attachment_ids;

    /**
     * Payment Transaction
     *
     * @var null|Transaction
     */
    private $payment_transaction_id;

    /**
     * Saved payment token
     * Note that tokens from acquirers set to only authorize transactions (instead of capturing the amount) are not
     * available.
     *
     * @var null|Token
     */
    private $payment_token_id;

    /**
     * Activities
     *
     * @var null|Activity[]
     */
    private $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     *
     * @var null|array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var null|Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var null|Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var null|DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var null|string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     *
     * @var null|array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     *
     * @var null|string
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var null|bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var null|Followers[]
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var null|Partner[]
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|Channel[]
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var null|Message[]
     */
    private $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     *
     * @var null|int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     *
     * @var null|int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     *
     * @var null|int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var null|int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var null|Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     *
     * @var null|Message[]
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_sms_error;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param array $payment_type Payment Type
     * @param Method $payment_method_id Payment Method
     *        Manual: Get paid by cash, check or any other method outside of Odoo.
     *        Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     *        the customer when buying or subscribing online (payment token).
     *        Check: Pay bill by check and print it from Odoo.
     *        Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     *        When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     *        deposit.To enable batch deposit, module account_batch_payment must be installed.
     *        SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     *        transfer, module account_sepa must be installed
     * @param float $amount Amount
     * @param Currency $currency_id Currency
     * @param DateTimeInterface $payment_date Date
     * @param Journal $journal_id Journal
     */
    public function __construct(
        array $payment_type,
        Method $payment_method_id,
        float $amount,
        Currency $currency_id,
        DateTimeInterface $payment_date,
        Journal $journal_id
    ) {
        $this->payment_type = $payment_type;
        $this->payment_method_id = $payment_method_id;
        $this->amount = $amount;
        $this->currency_id = $currency_id;
        $this->payment_date = $payment_date;
        $this->journal_id = $journal_id;
    }

    /**
     * @return null|string
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
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
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return null|array
     */
    public function getActivityExceptionDecoration(): ?array
    {
        return $this->activity_exception_decoration;
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
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
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
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @param null|Activity[] $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
     * @param null|Token $payment_token_id
     */
    public function setPaymentTokenId(?Token $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|Line[]
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @return null|array
     */
    public function getPartnerType(): ?array
    {
        return $this->partner_type;
    }

    /**
     * @return null|string
     */
    public function getPaymentMethodCode(): ?string
    {
        return $this->payment_method_code;
    }

    /**
     * @return Method
     */
    public function getPaymentMethodId(): Method
    {
        return $this->payment_method_id;
    }

    /**
     * @return array
     */
    public function getPaymentType(): array
    {
        return $this->payment_type;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|bool
     */
    public function isMoveReconciled(): ?bool
    {
        return $this->move_reconciled;
    }

    /**
     * @return null|int
     */
    public function getReconciledInvoicesCount(): ?int
    {
        return $this->reconciled_invoices_count;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|bool
     */
    public function isHasInvoices(): ?bool
    {
        return $this->has_invoices;
    }

    /**
     * @return null|Move[]
     */
    public function getReconciledInvoiceIds(): ?array
    {
        return $this->reconciled_invoice_ids;
    }

    /**
     * @return null|Move[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @return null|Journal
     */
    public function getDestinationJournalId(): ?Journal
    {
        return $this->destination_journal_id;
    }

    /**
     * @return null|Account
     */
    public function getDestinationAccountId(): ?Account
    {
        return $this->destination_account_id;
    }

    /**
     * @return null|string
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @return null|string
     */
    public function getPaymentReference(): ?string
    {
        return $this->payment_reference;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getPaymentDate(): DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @return null|Transaction
     */
    public function getPaymentTransactionId(): ?Transaction
    {
        return $this->payment_transaction_id;
    }

    /**
     * @param null|string $writeoff_label
     */
    public function setWriteoffLabel(?string $writeoff_label): void
    {
        $this->writeoff_label = $writeoff_label;
    }

    /**
     * @param Attachment $item
     */
    public function removeAttachmentIds(Attachment $item): void
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
     * @param Attachment $item
     */
    public function addAttachmentIds(Attachment $item): void
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
     * @param Attachment $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAttachmentIds(Attachment $item, bool $strict = true): bool
    {
        if (null === $this->attachment_ids) {
            return false;
        }

        return in_array($item, $this->attachment_ids, $strict);
    }

    /**
     * @param null|Attachment[] $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @return null|bool
     */
    public function isRequirePartnerBankAccount(): ?bool
    {
        return $this->require_partner_bank_account;
    }

    /**
     * @return null|bool
     */
    public function isShowPartnerBankAccount(): ?bool
    {
        return $this->show_partner_bank_account;
    }

    /**
     * @return null|Bank
     */
    public function getPartnerBankAccountId(): ?Bank
    {
        return $this->partner_bank_account_id;
    }

    /**
     * @param null|Account $writeoff_account_id
     */
    public function setWriteoffAccountId(?Account $writeoff_account_id): void
    {
        $this->writeoff_account_id = $writeoff_account_id;
    }

    /**
     * @return null|string
     */
    public function getCommunication(): ?string
    {
        return $this->communication;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentDifferenceHandling($item): void
    {
        if (null === $this->payment_difference_handling) {
            $this->payment_difference_handling = [];
        }

        if ($this->hasPaymentDifferenceHandling($item)) {
            $index = array_search($item, $this->payment_difference_handling);
            unset($this->payment_difference_handling[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPaymentDifferenceHandling($item): void
    {
        if ($this->hasPaymentDifferenceHandling($item)) {
            return;
        }

        if (null === $this->payment_difference_handling) {
            $this->payment_difference_handling = [];
        }

        $this->payment_difference_handling[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentDifferenceHandling($item, bool $strict = true): bool
    {
        if (null === $this->payment_difference_handling) {
            return false;
        }

        return in_array($item, $this->payment_difference_handling, $strict);
    }

    /**
     * @param null|array $payment_difference_handling
     */
    public function setPaymentDifferenceHandling(?array $payment_difference_handling): void
    {
        $this->payment_difference_handling = $payment_difference_handling;
    }

    /**
     * @return null|float
     */
    public function getPaymentDifference(): ?float
    {
        return $this->payment_difference;
    }

    /**
     * @return null|bool
     */
    public function isHidePaymentMethod(): ?bool
    {
        return $this->hide_payment_method;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
