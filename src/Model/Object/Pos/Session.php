<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.session
 * ---
 * Name : pos.session
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
final class Session extends Base
{
    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Point of Sale
     * ---
     * The physical point of sale you will use.
     * ---
     * Relation : many2one (pos.config)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Config
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $config_id;

    /**
     * Session ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Opening Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $start_at;

    /**
     * Closing Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $stop_at;

    /**
     * Status
     * ---
     * Selection : (default value, usually null)
     *     -> new_session (New Session)
     *     -> opening_control (Opening Control)
     *     -> opened (In Progress)
     *     -> closing_control (Closing Control)
     *     -> closed (Closed & Posted)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * Order Sequence Number
     * ---
     * A sequence number that is incremented with each order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence_number;

    /**
     * Login Sequence Number
     * ---
     * A sequence number that is incremented each time a user resumes the pos session
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $login_number;

    /**
     * Has Cash Control
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $cash_control;

    /**
     * Cash Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_journal_id;

    /**
     * Cash Register
     * ---
     * Relation : many2one (account.bank.statement)
     * @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_register_id;

    /**
     * Ending Balance
     * ---
     * Total of closing cash control lines.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $cash_register_balance_end_real;

    /**
     * Starting Balance
     * ---
     * Total of opening cash control lines.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $cash_register_balance_start;

    /**
     * Total Cash Transaction
     * ---
     * Total of all paid sales orders
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $cash_register_total_entry_encoding;

    /**
     * Theoretical Closing Balance
     * ---
     * Sum of opening balance and transactions.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $cash_register_balance_end;

    /**
     * Difference
     * ---
     * Difference between the theoretical closing balance and the real closing balance.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $cash_register_difference;

    /**
     * Orders
     * ---
     * Relation : one2many (pos.order -> session_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Order
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $order_ids;

    /**
     * Order Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $order_count;

    /**
     * Cash Statements
     * ---
     * Relation : one2many (account.bank.statement -> pos_session_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $statement_ids;

    /**
     * Picking Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $picking_count;

    /**
     * Recovery Session
     * ---
     * Auto-generated session for orphan orders, ignored in constraints
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $rescue;

    /**
     * Journal Entry
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Payment Methods
     * ---
     * Relation : many2many (pos.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_method_ids;

    /**
     * Total Payments Amount
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_payments_amount;

    /**
     * Is Using Company Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_in_company_currency;

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
    private $activity_ids;

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
    private $activity_state;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

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
    private $activity_exception_decoration;

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
    private $activity_exception_icon;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

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
    private $message_follower_ids;

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
    private $message_partner_ids;

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
    private $message_channel_ids;

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
    private $message_ids;

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
    private $message_unread;

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
    private $message_unread_counter;

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
    private $message_needaction;

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
    private $message_needaction_counter;

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
    private $message_has_error;

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
    private $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

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
    private $message_main_attachment_id;

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
    private $website_message_ids;

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
    private $message_has_sms_error;

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
    private $activity_user_id;

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
    private $activity_type_id;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_summary;

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
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

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
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $config_id Point of Sale
     *        ---
     *        The physical point of sale you will use.
     *        ---
     *        Relation : many2one (pos.config)
     *        @see \Flux\OdooApiClient\Model\Object\Pos\Config
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Session ID
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_id Responsible
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        ---
     *        Selection : (default value, usually null)
     *            -> new_session (New Session)
     *            -> opening_control (Opening Control)
     *            -> opened (In Progress)
     *            -> closing_control (Closing Control)
     *            -> closed (Closed & Posted)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $config_id, string $name, OdooRelation $user_id, string $state)
    {
        $this->config_id = $config_id;
        $this->name = $name;
        $this->user_id = $user_id;
        $this->state = $state;
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
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
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
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
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
     * @return string|null
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
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
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
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
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
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
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return int|null
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequence_number;
    }

    /**
     * @return float|null
     */
    public function getCashRegisterTotalEntryEncoding(): ?float
    {
        return $this->cash_register_total_entry_encoding;
    }

    /**
     * @param float|null $cash_register_balance_start
     */
    public function setCashRegisterBalanceStart(?float $cash_register_balance_start): void
    {
        $this->cash_register_balance_start = $cash_register_balance_start;
    }

    /**
     * @return float|null
     */
    public function getCashRegisterBalanceStart(): ?float
    {
        return $this->cash_register_balance_start;
    }

    /**
     * @param float|null $cash_register_balance_end_real
     */
    public function setCashRegisterBalanceEndReal(?float $cash_register_balance_end_real): void
    {
        $this->cash_register_balance_end_real = $cash_register_balance_end_real;
    }

    /**
     * @return float|null
     */
    public function getCashRegisterBalanceEndReal(): ?float
    {
        return $this->cash_register_balance_end_real;
    }

    /**
     * @param OdooRelation|null $cash_register_id
     */
    public function setCashRegisterId(?OdooRelation $cash_register_id): void
    {
        $this->cash_register_id = $cash_register_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashRegisterId(): ?OdooRelation
    {
        return $this->cash_register_id;
    }

    /**
     * @param OdooRelation|null $cash_journal_id
     */
    public function setCashJournalId(?OdooRelation $cash_journal_id): void
    {
        $this->cash_journal_id = $cash_journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashJournalId(): ?OdooRelation
    {
        return $this->cash_journal_id;
    }

    /**
     * @param bool|null $cash_control
     */
    public function setCashControl(?bool $cash_control): void
    {
        $this->cash_control = $cash_control;
    }

    /**
     * @return bool|null
     */
    public function isCashControl(): ?bool
    {
        return $this->cash_control;
    }

    /**
     * @param int|null $login_number
     */
    public function setLoginNumber(?int $login_number): void
    {
        $this->login_number = $login_number;
    }

    /**
     * @return int|null
     */
    public function getLoginNumber(): ?int
    {
        return $this->login_number;
    }

    /**
     * @param int|null $sequence_number
     */
    public function setSequenceNumber(?int $sequence_number): void
    {
        $this->sequence_number = $sequence_number;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return float|null
     */
    public function getCashRegisterBalanceEnd(): ?float
    {
        return $this->cash_register_balance_end;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param DateTimeInterface|null $stop_at
     */
    public function setStopAt(?DateTimeInterface $stop_at): void
    {
        $this->stop_at = $stop_at;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStopAt(): ?DateTimeInterface
    {
        return $this->stop_at;
    }

    /**
     * @param DateTimeInterface|null $start_at
     */
    public function setStartAt(?DateTimeInterface $start_at): void
    {
        $this->start_at = $start_at;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartAt(): ?DateTimeInterface
    {
        return $this->start_at;
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
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $config_id
     */
    public function setConfigId(OdooRelation $config_id): void
    {
        $this->config_id = $config_id;
    }

    /**
     * @return OdooRelation
     */
    public function getConfigId(): OdooRelation
    {
        return $this->config_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param float|null $cash_register_total_entry_encoding
     */
    public function setCashRegisterTotalEntryEncoding(?float $cash_register_total_entry_encoding): void
    {
        $this->cash_register_total_entry_encoding = $cash_register_total_entry_encoding;
    }

    /**
     * @param float|null $cash_register_balance_end
     */
    public function setCashRegisterBalanceEnd(?float $cash_register_balance_end): void
    {
        $this->cash_register_balance_end = $cash_register_balance_end;
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
     * @param bool|null $rescue
     */
    public function setRescue(?bool $rescue): void
    {
        $this->rescue = $rescue;
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
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @param bool|null $is_in_company_currency
     */
    public function setIsInCompanyCurrency(?bool $is_in_company_currency): void
    {
        $this->is_in_company_currency = $is_in_company_currency;
    }

    /**
     * @return bool|null
     */
    public function isIsInCompanyCurrency(): ?bool
    {
        return $this->is_in_company_currency;
    }

    /**
     * @param float|null $total_payments_amount
     */
    public function setTotalPaymentsAmount(?float $total_payments_amount): void
    {
        $this->total_payments_amount = $total_payments_amount;
    }

    /**
     * @return float|null
     */
    public function getTotalPaymentsAmount(): ?float
    {
        return $this->total_payments_amount;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        if ($this->hasPaymentMethodIds($item)) {
            $index = array_search($item, $this->payment_method_ids);
            unset($this->payment_method_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        $this->payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->payment_method_ids) {
            return false;
        }

        return in_array($item, $this->payment_method_ids);
    }

    /**
     * @param OdooRelation[]|null $payment_method_ids
     */
    public function setPaymentMethodIds(?array $payment_method_ids): void
    {
        $this->payment_method_ids = $payment_method_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPaymentMethodIds(): ?array
    {
        return $this->payment_method_ids;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @return bool|null
     */
    public function isRescue(): ?bool
    {
        return $this->rescue;
    }

    /**
     * @return float|null
     */
    public function getCashRegisterDifference(): ?float
    {
        return $this->cash_register_difference;
    }

    /**
     * @return int|null
     */
    public function getOrderCount(): ?int
    {
        return $this->order_count;
    }

    /**
     * @param float|null $cash_register_difference
     */
    public function setCashRegisterDifference(?float $cash_register_difference): void
    {
        $this->cash_register_difference = $cash_register_difference;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getOrderIds(): ?array
    {
        return $this->order_ids;
    }

    /**
     * @param OdooRelation[]|null $order_ids
     */
    public function setOrderIds(?array $order_ids): void
    {
        $this->order_ids = $order_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOrderIds(OdooRelation $item): bool
    {
        if (null === $this->order_ids) {
            return false;
        }

        return in_array($item, $this->order_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOrderIds(OdooRelation $item): void
    {
        if ($this->hasOrderIds($item)) {
            return;
        }

        if (null === $this->order_ids) {
            $this->order_ids = [];
        }

        $this->order_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOrderIds(OdooRelation $item): void
    {
        if (null === $this->order_ids) {
            $this->order_ids = [];
        }

        if ($this->hasOrderIds($item)) {
            $index = array_search($item, $this->order_ids);
            unset($this->order_ids[$index]);
        }
    }

    /**
     * @param int|null $order_count
     */
    public function setOrderCount(?int $order_count): void
    {
        $this->order_count = $order_count;
    }

    /**
     * @param int|null $picking_count
     */
    public function setPickingCount(?int $picking_count): void
    {
        $this->picking_count = $picking_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getStatementIds(): ?array
    {
        return $this->statement_ids;
    }

    /**
     * @param OdooRelation[]|null $statement_ids
     */
    public function setStatementIds(?array $statement_ids): void
    {
        $this->statement_ids = $statement_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStatementIds(OdooRelation $item): bool
    {
        if (null === $this->statement_ids) {
            return false;
        }

        return in_array($item, $this->statement_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStatementIds(OdooRelation $item): void
    {
        if ($this->hasStatementIds($item)) {
            return;
        }

        if (null === $this->statement_ids) {
            $this->statement_ids = [];
        }

        $this->statement_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStatementIds(OdooRelation $item): void
    {
        if (null === $this->statement_ids) {
            $this->statement_ids = [];
        }

        if ($this->hasStatementIds($item)) {
            $index = array_search($item, $this->statement_ids);
            unset($this->statement_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getPickingCount(): ?int
    {
        return $this->picking_count;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.session';
    }
}
