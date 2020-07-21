<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.payment
 * Name : account.payment
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
final class Payment extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Payment Reference
     * Reference of the document used to issue this payment. Eg. check number, file name, etc.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_reference;

    /**
     * Journal Entry Name
     * Technical field holding the number given to the journal entry, automatically set when the statement line is
     * reconciled then stored to set the same number again if the line is cancelled, set to draft and re-processed
     * again.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_name;

    /**
     * Destination Account
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $destination_account_id;

    /**
     * Transfer To
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $destination_journal_id;

    /**
     * Invoices
     * Technical field containing the invoice for which the payment has been generated.
     *                                                                       This does not especially correspond to
     * the invoices reconciled with the payment,
     *                                                                       as it can have been generated first, and
     * reconciled later
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * Reconciled Invoices
     * Invoices whose journal items have been reconciled with these payments.
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reconciled_invoice_ids;

    /**
     * Has Invoices
     * Technical field used for usability purposes
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_invoices;

    /**
     * Reconciled Invoices Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $reconciled_invoices_count;

    /**
     * Move Line
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

    /**
     * Move Reconciled
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $move_reconciled;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (Draft)
     *     -> posted (Validated)
     *     -> sent (Sent)
     *     -> reconciled (Reconciled)
     *     -> cancelled (Cancelled)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Payment Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> outbound (Send Money)
     *     -> inbound (Receive Money)
     *     -> transfer (Internal Transfer)
     *
     *
     * @var string
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
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_method_id;

    /**
     * Code
     * Technical field used to adapt the interface to the payment type selected.
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $payment_method_code;

    /**
     * Partner Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> customer (Customer)
     *     -> supplier (Vendor)
     *
     *
     * @var string|null
     */
    private $partner_type;

    /**
     * Partner
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Amount
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $payment_date;

    /**
     * Memo
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $communication;

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
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Hide Payment Method
     * Technical field used to hide the payment method if the selected journal has only one available which is
     * 'manual'
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_payment_method;

    /**
     * Payment Difference
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $payment_difference;

    /**
     * Payment Difference Handling
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> open (Keep open)
     *     -> reconcile (Mark invoice as fully paid)
     *
     *
     * @var string|null
     */
    private $payment_difference_handling;

    /**
     * Difference Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $writeoff_account_id;

    /**
     * Journal Item Label
     * Change label of the counterpart that will hold the payment difference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $writeoff_label;

    /**
     * Recipient Bank Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_bank_account_id;

    /**
     * Show Partner Bank Account
     * Technical field used to know whether the field `partner_bank_account_id` needs to be displayed or not in the
     * payments form views
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_partner_bank_account;

    /**
     * Require Partner Bank Account
     * Technical field used to know whether the field `partner_bank_account_id` needs to be required or not in the
     * payments form views
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $require_partner_bank_account;

    /**
     * Attachments
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attachment_ids;

    /**
     * Batch Payment
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $batch_payment_id;

    /**
     * Payment Transaction
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_transaction_id;

    /**
     * Saved payment token
     * Note that tokens from acquirers set to only authorize transactions (instead of capturing the amount) are not
     * available.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_token_id;

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
     * @param string $payment_type Payment Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> outbound (Send Money)
     *            -> inbound (Receive Money)
     *            -> transfer (Internal Transfer)
     *       
     * @param OdooRelation $payment_method_id Payment Method
     *        Manual: Get paid by cash, check or any other method outside of Odoo.
     *        Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     *        the customer when buying or subscribing online (payment token).
     *        Check: Pay bill by check and print it from Odoo.
     *        Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     *        When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     *        deposit.To enable batch deposit, module account_batch_payment must be installed.
     *        SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     *        transfer, module account_sepa must be installed 
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Amount
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $payment_date Date
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $payment_type,
        OdooRelation $payment_method_id,
        float $amount,
        OdooRelation $currency_id,
        DateTimeInterface $payment_date,
        OdooRelation $journal_id
    ) {
        $this->payment_type = $payment_type;
        $this->payment_method_id = $payment_method_id;
        $this->amount = $amount;
        $this->currency_id = $currency_id;
        $this->payment_date = $payment_date;
        $this->journal_id = $journal_id;
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
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @return OdooRelation[]|null
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
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return string|null
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaymentTokenId(): ?OdooRelation
    {
        return $this->payment_token_id;
    }

    /**
     * @param OdooRelation|null $payment_token_id
     */
    public function setPaymentTokenId(?OdooRelation $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
    }

    /**
     * @return OdooRelation[]|null
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
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
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
     * @return OdooRelation|null
     */
    public function getPaymentTransactionId(): ?OdooRelation
    {
        return $this->payment_transaction_id;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
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
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
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
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @return int|null
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
     * @param OdooRelation|null $payment_transaction_id
     */
    public function setPaymentTransactionId(?OdooRelation $payment_transaction_id): void
    {
        $this->payment_transaction_id = $payment_transaction_id;
    }

    /**
     * @param OdooRelation|null $batch_payment_id
     */
    public function setBatchPaymentId(?OdooRelation $batch_payment_id): void
    {
        $this->batch_payment_id = $batch_payment_id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            return;
        }

        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        $this->move_line_ids[] = $item;
    }

    /**
     * @param bool|null $has_invoices
     */
    public function setHasInvoices(?bool $has_invoices): void
    {
        $this->has_invoices = $has_invoices;
    }

    /**
     * @return int|null
     */
    public function getReconciledInvoicesCount(): ?int
    {
        return $this->reconciled_invoices_count;
    }

    /**
     * @param int|null $reconciled_invoices_count
     */
    public function setReconciledInvoicesCount(?int $reconciled_invoices_count): void
    {
        $this->reconciled_invoices_count = $reconciled_invoices_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
    }

    /**
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_ids) {
            return false;
        }

        return in_array($item, $this->move_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        if ($this->hasMoveLineIds($item)) {
            $index = array_search($item, $this->move_line_ids);
            unset($this->move_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReconciledInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->reconciled_invoice_ids) {
            $this->reconciled_invoice_ids = [];
        }

        if ($this->hasReconciledInvoiceIds($item)) {
            $index = array_search($item, $this->reconciled_invoice_ids);
            unset($this->reconciled_invoice_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isMoveReconciled(): ?bool
    {
        return $this->move_reconciled;
    }

    /**
     * @param bool|null $move_reconciled
     */
    public function setMoveReconciled(?bool $move_reconciled): void
    {
        $this->move_reconciled = $move_reconciled;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->payment_type;
    }

    /**
     * @param string $payment_type
     */
    public function setPaymentType(string $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return OdooRelation
     */
    public function getPaymentMethodId(): OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @return bool|null
     */
    public function isHasInvoices(): ?bool
    {
        return $this->has_invoices;
    }

    /**
     * @param OdooRelation $item
     */
    public function addReconciledInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasReconciledInvoiceIds($item)) {
            return;
        }

        if (null === $this->reconciled_invoice_ids) {
            $this->reconciled_invoice_ids = [];
        }

        $this->reconciled_invoice_ids[] = $item;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethodCode(): ?string
    {
        return $this->payment_method_code;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDestinationJournalId(): ?OdooRelation
    {
        return $this->destination_journal_id;
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
     */
    public function getPaymentReference(): ?string
    {
        return $this->payment_reference;
    }

    /**
     * @param string|null $payment_reference
     */
    public function setPaymentReference(?string $payment_reference): void
    {
        $this->payment_reference = $payment_reference;
    }

    /**
     * @return string|null
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @param string|null $move_name
     */
    public function setMoveName(?string $move_name): void
    {
        $this->move_name = $move_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDestinationAccountId(): ?OdooRelation
    {
        return $this->destination_account_id;
    }

    /**
     * @param OdooRelation|null $destination_account_id
     */
    public function setDestinationAccountId(?OdooRelation $destination_account_id): void
    {
        $this->destination_account_id = $destination_account_id;
    }

    /**
     * @param OdooRelation|null $destination_journal_id
     */
    public function setDestinationJournalId(?OdooRelation $destination_journal_id): void
    {
        $this->destination_journal_id = $destination_journal_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReconciledInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->reconciled_invoice_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_invoice_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getReconciledInvoiceIds(): ?array
    {
        return $this->reconciled_invoice_ids;
    }

    /**
     * @param OdooRelation[]|null $reconciled_invoice_ids
     */
    public function setReconciledInvoiceIds(?array $reconciled_invoice_ids): void
    {
        $this->reconciled_invoice_ids = $reconciled_invoice_ids;
    }

    /**
     * @param OdooRelation $payment_method_id
     */
    public function setPaymentMethodId(OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @param string|null $payment_method_code
     */
    public function setPaymentMethodCode(?string $payment_method_code): void
    {
        $this->payment_method_code = $payment_method_code;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBatchPaymentId(): ?OdooRelation
    {
        return $this->batch_payment_id;
    }

    /**
     * @return bool|null
     */
    public function isShowPartnerBankAccount(): ?bool
    {
        return $this->show_partner_bank_account;
    }

    /**
     * @param string|null $payment_difference_handling
     */
    public function setPaymentDifferenceHandling(?string $payment_difference_handling): void
    {
        $this->payment_difference_handling = $payment_difference_handling;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteoffAccountId(): ?OdooRelation
    {
        return $this->writeoff_account_id;
    }

    /**
     * @param OdooRelation|null $writeoff_account_id
     */
    public function setWriteoffAccountId(?OdooRelation $writeoff_account_id): void
    {
        $this->writeoff_account_id = $writeoff_account_id;
    }

    /**
     * @return string|null
     */
    public function getWriteoffLabel(): ?string
    {
        return $this->writeoff_label;
    }

    /**
     * @param string|null $writeoff_label
     */
    public function setWriteoffLabel(?string $writeoff_label): void
    {
        $this->writeoff_label = $writeoff_label;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerBankAccountId(): ?OdooRelation
    {
        return $this->partner_bank_account_id;
    }

    /**
     * @param OdooRelation|null $partner_bank_account_id
     */
    public function setPartnerBankAccountId(?OdooRelation $partner_bank_account_id): void
    {
        $this->partner_bank_account_id = $partner_bank_account_id;
    }

    /**
     * @param bool|null $show_partner_bank_account
     */
    public function setShowPartnerBankAccount(?bool $show_partner_bank_account): void
    {
        $this->show_partner_bank_account = $show_partner_bank_account;
    }

    /**
     * @param float|null $payment_difference
     */
    public function setPaymentDifference(?float $payment_difference): void
    {
        $this->payment_difference = $payment_difference;
    }

    /**
     * @return bool|null
     */
    public function isRequirePartnerBankAccount(): ?bool
    {
        return $this->require_partner_bank_account;
    }

    /**
     * @param bool|null $require_partner_bank_account
     */
    public function setRequirePartnerBankAccount(?bool $require_partner_bank_account): void
    {
        $this->require_partner_bank_account = $require_partner_bank_account;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
    }

    /**
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
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
     * @return string|null
     */
    public function getPaymentDifferenceHandling(): ?string
    {
        return $this->payment_difference_handling;
    }

    /**
     * @return float|null
     */
    public function getPaymentDifference(): ?float
    {
        return $this->payment_difference;
    }

    /**
     * @return string|null
     */
    public function getPartnerType(): ?string
    {
        return $this->partner_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getPaymentDate(): DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @param string|null $partner_type
     */
    public function setPartnerType(?string $partner_type): void
    {
        $this->partner_type = $partner_type;
    }

    /**
     * @return OdooRelation|null
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
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return OdooRelation
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
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @param bool|null $hide_payment_method
     */
    public function setHidePaymentMethod(?bool $hide_payment_method): void
    {
        $this->hide_payment_method = $hide_payment_method;
    }

    /**
     * @return string|null
     */
    public function getCommunication(): ?string
    {
        return $this->communication;
    }

    /**
     * @param string|null $communication
     */
    public function setCommunication(?string $communication): void
    {
        $this->communication = $communication;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     */
    public function isHidePaymentMethod(): ?bool
    {
        return $this->hide_payment_method;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.payment';
    }
}
