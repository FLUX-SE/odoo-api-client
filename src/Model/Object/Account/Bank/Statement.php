<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Cashbox;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Line;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.bank.statement
 * Name : account.bank.statement
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
final class Statement extends Base
{
    /**
     * Reference
     *
     * @var null|string
     */
    private $name;

    /**
     * External Reference
     * Used to hold the reference of the external mean that created this statement (name of imported file, reference
     * of online synchronization...)
     *
     * @var null|string
     */
    private $reference;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Closed On
     *
     * @var null|DateTimeInterface
     */
    private $date_done;

    /**
     * Starting Balance
     *
     * @var null|float
     */
    private $balance_start;

    /**
     * Ending Balance
     *
     * @var null|float
     */
    private $balance_end_real;

    /**
     * Accounting Date
     * If set, the accounting entries created during the bank statement reconciliation process will be created at
     * this date.
     * This is useful if the accounting period in which the entries should normally be booked is already closed.
     *
     * @var null|DateTimeInterface
     */
    private $accounting_date;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Type
     * Technical field used for usability purposes
     *
     * @var null|array
     */
    private $journal_type;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Transactions Subtotal
     * Total of transaction lines.
     *
     * @var null|float
     */
    private $total_entry_encoding;

    /**
     * Computed Balance
     * Balance as calculated based on Opening Balance and transaction lines
     *
     * @var null|float
     */
    private $balance_end;

    /**
     * Difference
     * Difference between the computed ending balance and the specified ending balance.
     *
     * @var null|float
     */
    private $difference;

    /**
     * Statement lines
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Entry lines
     *
     * @var null|LineAlias[]
     */
    private $move_line_ids;

    /**
     * Move Line Count
     *
     * @var null|int
     */
    private $move_line_count;

    /**
     * All Lines Reconciled
     *
     * @var null|bool
     */
    private $all_lines_reconciled;

    /**
     * Responsible
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Starting Cashbox
     *
     * @var null|Cashbox
     */
    private $cashbox_start_id;

    /**
     * Ending Cashbox
     *
     * @var null|Cashbox
     */
    private $cashbox_end_id;

    /**
     * Is zero
     * Check if difference is zero.
     *
     * @var null|bool
     */
    private $is_difference_zero;

    /**
     * Attachments
     *
     * @var null|Attachment[]
     */
    private $attachment_ids;

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
     * @param DateTimeInterface $date Date
     * @param array $state Status
     * @param Journal $journal_id Journal
     */
    public function __construct(DateTimeInterface $date, array $state, Journal $journal_id)
    {
        $this->date = $date;
        $this->state = $state;
        $this->journal_id = $journal_id;
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
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
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
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
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
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|float
     */
    public function getDifference(): ?float
    {
        return $this->difference;
    }

    /**
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|DateTimeInterface $date_done
     */
    public function setDateDone(?DateTimeInterface $date_done): void
    {
        $this->date_done = $date_done;
    }

    /**
     * @param null|float $balance_start
     */
    public function setBalanceStart(?float $balance_start): void
    {
        $this->balance_start = $balance_start;
    }

    /**
     * @param null|float $balance_end_real
     */
    public function setBalanceEndReal(?float $balance_end_real): void
    {
        $this->balance_end_real = $balance_end_real;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getAccountingDate(): ?DateTimeInterface
    {
        return $this->accounting_date;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return null|array
     */
    public function getJournalType(): ?array
    {
        return $this->journal_type;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|float
     */
    public function getTotalEntryEncoding(): ?float
    {
        return $this->total_entry_encoding;
    }

    /**
     * @return null|float
     */
    public function getBalanceEnd(): ?float
    {
        return $this->balance_end;
    }

    /**
     * @param null|Line[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param null|Attachment[] $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addLineIds(Line $item): void
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
     * @param Line $item
     */
    public function removeLineIds(Line $item): void
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
     * @param null|LineAlias[] $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param LineAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMoveLineIds(LineAlias $item, bool $strict = true): bool
    {
        if (null === $this->move_line_ids) {
            return false;
        }

        return in_array($item, $this->move_line_ids, $strict);
    }

    /**
     * @param LineAlias $item
     */
    public function addMoveLineIds(LineAlias $item): void
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
     * @param LineAlias $item
     */
    public function removeMoveLineIds(LineAlias $item): void
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
     * @return null|int
     */
    public function getMoveLineCount(): ?int
    {
        return $this->move_line_count;
    }

    /**
     * @return null|bool
     */
    public function isAllLinesReconciled(): ?bool
    {
        return $this->all_lines_reconciled;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|Cashbox $cashbox_start_id
     */
    public function setCashboxStartId(?Cashbox $cashbox_start_id): void
    {
        $this->cashbox_start_id = $cashbox_start_id;
    }

    /**
     * @param null|Cashbox $cashbox_end_id
     */
    public function setCashboxEndId(?Cashbox $cashbox_end_id): void
    {
        $this->cashbox_end_id = $cashbox_end_id;
    }

    /**
     * @return null|bool
     */
    public function isIsDifferenceZero(): ?bool
    {
        return $this->is_difference_zero;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
