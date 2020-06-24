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
final class Statement extends Base
{
    /**
     * Reference
     *
     * @var string
     */
    private $name;

    /**
     * External Reference
     *
     * @var string
     */
    private $reference;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Closed On
     *
     * @var DateTimeInterface
     */
    private $date_done;

    /**
     * Starting Balance
     *
     * @var float
     */
    private $balance_start;

    /**
     * Ending Balance
     *
     * @var float
     */
    private $balance_end_real;

    /**
     * Accounting Date
     *
     * @var DateTimeInterface
     */
    private $accounting_date;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Type
     *
     * @var array
     */
    private $journal_type;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Transactions Subtotal
     *
     * @var float
     */
    private $total_entry_encoding;

    /**
     * Computed Balance
     *
     * @var float
     */
    private $balance_end;

    /**
     * Difference
     *
     * @var float
     */
    private $difference;

    /**
     * Statement lines
     *
     * @var Line
     */
    private $line_ids;

    /**
     * Entry lines
     *
     * @var LineAlias
     */
    private $move_line_ids;

    /**
     * Move Line Count
     *
     * @var int
     */
    private $move_line_count;

    /**
     * All Lines Reconciled
     *
     * @var bool
     */
    private $all_lines_reconciled;

    /**
     * Responsible
     *
     * @var Users
     */
    private $user_id;

    /**
     * Starting Cashbox
     *
     * @var Cashbox
     */
    private $cashbox_start_id;

    /**
     * Ending Cashbox
     *
     * @var Cashbox
     */
    private $cashbox_end_id;

    /**
     * Is zero
     *
     * @var bool
     */
    private $is_difference_zero;

    /**
     * Attachments
     *
     * @var Attachment
     */
    private $attachment_ids;

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
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
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
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
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
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return bool
     */
    public function isIsDifferenceZero(): bool
    {
        return $this->is_difference_zero;
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
     * @param Cashbox $cashbox_end_id
     */
    public function setCashboxEndId(Cashbox $cashbox_end_id): void
    {
        $this->cashbox_end_id = $cashbox_end_id;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return array
     */
    public function getJournalType(): array
    {
        return $this->journal_type;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param DateTimeInterface $date_done
     */
    public function setDateDone(DateTimeInterface $date_done): void
    {
        $this->date_done = $date_done;
    }

    /**
     * @param float $balance_start
     */
    public function setBalanceStart(float $balance_start): void
    {
        $this->balance_start = $balance_start;
    }

    /**
     * @param float $balance_end_real
     */
    public function setBalanceEndReal(float $balance_end_real): void
    {
        $this->balance_end_real = $balance_end_real;
    }

    /**
     * @return DateTimeInterface
     */
    public function getAccountingDate(): DateTimeInterface
    {
        return $this->accounting_date;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param Cashbox $cashbox_start_id
     */
    public function setCashboxStartId(Cashbox $cashbox_start_id): void
    {
        $this->cashbox_start_id = $cashbox_start_id;
    }

    /**
     * @return float
     */
    public function getTotalEntryEncoding(): float
    {
        return $this->total_entry_encoding;
    }

    /**
     * @return float
     */
    public function getBalanceEnd(): float
    {
        return $this->balance_end;
    }

    /**
     * @return float
     */
    public function getDifference(): float
    {
        return $this->difference;
    }

    /**
     * @param Line $line_ids
     */
    public function setLineIds(Line $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param LineAlias $move_line_ids
     */
    public function setMoveLineIds(LineAlias $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @return int
     */
    public function getMoveLineCount(): int
    {
        return $this->move_line_count;
    }

    /**
     * @return bool
     */
    public function isAllLinesReconciled(): bool
    {
        return $this->all_lines_reconciled;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
