<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.bank.statement
 * Name : account.bank.statement
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
final class Statement extends Base
{
    public const ODOO_MODEL_NAME = 'account.bank.statement';

    /**
     * Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * External Reference
     * Used to hold the reference of the external mean that created this statement (name of imported file, reference
     * of online synchronization...)
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reference;

    /**
     * Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Closed On
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_done;

    /**
     * Starting Balance
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance_start;

    /**
     * Ending Balance
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance_end_real;

    /**
     * Accounting Date
     * If set, the accounting entries created during the bank statement reconciliation process will be created at
     * this date.
     * This is useful if the accounting period in which the entries should normally be booked is already closed.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $accounting_date;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> open (New)
     *     -> confirm (Validated)
     *
     *
     * @var string
     */
    private $state;

    /**
     * Currency
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Type
     * Technical field used for usability purposes
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> sale (Sales)
     *     -> purchase (Purchase)
     *     -> cash (Cash)
     *     -> bank (Bank)
     *     -> general (Miscellaneous)
     *
     *
     * @var string|null
     */
    private $journal_type;

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
     * Transactions Subtotal
     * Total of transaction lines.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $total_entry_encoding;

    /**
     * Computed Balance
     * Balance as calculated based on Opening Balance and transaction lines
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance_end;

    /**
     * Difference
     * Difference between the computed ending balance and the specified ending balance.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $difference;

    /**
     * Statement lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Entry lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

    /**
     * Move Line Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $move_line_count;

    /**
     * All Lines Reconciled
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $all_lines_reconciled;

    /**
     * Responsible
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Starting Cashbox
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cashbox_start_id;

    /**
     * Ending Cashbox
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cashbox_end_id;

    /**
     * Is zero
     * Check if difference is zero.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_difference_zero;

    /**
     * Attachments
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attachment_ids;

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
     * @param DateTimeInterface $date Date
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> open (New)
     *            -> confirm (Validated)
     *
     * @param OdooRelation $journal_id Journal
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $date, string $state, OdooRelation $journal_id)
    {
        $this->date = $date;
        $this->state = $state;
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
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
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
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
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param DateTimeInterface|null $accounting_date
     */
    public function setAccountingDate(?DateTimeInterface $accounting_date): void
    {
        $this->accounting_date = $accounting_date;
    }

    /**
     * @return float|null
     */
    public function getTotalEntryEncoding(): ?float
    {
        return $this->total_entry_encoding;
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
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $journal_type
     */
    public function setJournalType(?string $journal_type): void
    {
        $this->journal_type = $journal_type;
    }

    /**
     * @return string|null
     */
    public function getJournalType(): ?string
    {
        return $this->journal_type;
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
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getAccountingDate(): ?DateTimeInterface
    {
        return $this->accounting_date;
    }

    /**
     * @return float|null
     */
    public function getBalanceEnd(): ?float
    {
        return $this->balance_end;
    }

    /**
     * @param float|null $balance_end_real
     */
    public function setBalanceEndReal(?float $balance_end_real): void
    {
        $this->balance_end_real = $balance_end_real;
    }

    /**
     * @return float|null
     */
    public function getBalanceEndReal(): ?float
    {
        return $this->balance_end_real;
    }

    /**
     * @param float|null $balance_start
     */
    public function setBalanceStart(?float $balance_start): void
    {
        $this->balance_start = $balance_start;
    }

    /**
     * @return float|null
     */
    public function getBalanceStart(): ?float
    {
        return $this->balance_start;
    }

    /**
     * @param DateTimeInterface|null $date_done
     */
    public function setDateDone(?DateTimeInterface $date_done): void
    {
        $this->date_done = $date_done;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateDone(): ?DateTimeInterface
    {
        return $this->date_done;
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
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param float|null $total_entry_encoding
     */
    public function setTotalEntryEncoding(?float $total_entry_encoding): void
    {
        $this->total_entry_encoding = $total_entry_encoding;
    }

    /**
     * @param float|null $balance_end
     */
    public function setBalanceEnd(?float $balance_end): void
    {
        $this->balance_end = $balance_end;
    }

    /**
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param int|null $move_line_count
     */
    public function setMoveLineCount(?int $move_line_count): void
    {
        $this->move_line_count = $move_line_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
    }

    /**
     * @param bool|null $is_difference_zero
     */
    public function setIsDifferenceZero(?bool $is_difference_zero): void
    {
        $this->is_difference_zero = $is_difference_zero;
    }

    /**
     * @return bool|null
     */
    public function isIsDifferenceZero(): ?bool
    {
        return $this->is_difference_zero;
    }

    /**
     * @param OdooRelation|null $cashbox_end_id
     */
    public function setCashboxEndId(?OdooRelation $cashbox_end_id): void
    {
        $this->cashbox_end_id = $cashbox_end_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashboxEndId(): ?OdooRelation
    {
        return $this->cashbox_end_id;
    }

    /**
     * @param OdooRelation|null $cashbox_start_id
     */
    public function setCashboxStartId(?OdooRelation $cashbox_start_id): void
    {
        $this->cashbox_start_id = $cashbox_start_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashboxStartId(): ?OdooRelation
    {
        return $this->cashbox_start_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param bool|null $all_lines_reconciled
     */
    public function setAllLinesReconciled(?bool $all_lines_reconciled): void
    {
        $this->all_lines_reconciled = $all_lines_reconciled;
    }

    /**
     * @return bool|null
     */
    public function isAllLinesReconciled(): ?bool
    {
        return $this->all_lines_reconciled;
    }

    /**
     * @return int|null
     */
    public function getMoveLineCount(): ?int
    {
        return $this->move_line_count;
    }

    /**
     * @return float|null
     */
    public function getDifference(): ?float
    {
        return $this->difference;
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
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
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
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param float|null $difference
     */
    public function setDifference(?float $difference): void
    {
        $this->difference = $difference;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
