<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.request
 * ---
 * Name : sign.request
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
final class Request extends Base
{
    /**
     * Template
     * ---
     * Relation : many2one (sign.template)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $template_id;

    /**
     * Document Name
     * ---
     * This is how the document will be named in the mail
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reference;

    /**
     * Security Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $access_token;

    /**
     * Signers
     * ---
     * Relation : one2many (sign.request.item -> sign_request_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request\Item
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $request_item_ids;

    /**
     * State
     * ---
     * Selection :
     *     -> sent (Sent)
     *     -> signed (Fully Signed)
     *     -> canceled (Canceled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Completed Document
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $completed_document;

    /**
     * Sent Requests
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nb_wait;

    /**
     * Completed Signatures
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nb_closed;

    /**
     * Requested Signatures
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nb_total;

    /**
     * Progress
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $progress;

    /**
     * Signature Started
     * ---
     * At least one signer has signed the document.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $start_sign;

    /**
     * Integrity of the Sign request
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $integrity;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Favorite of
     * ---
     * Relation : many2many (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $favorited_ids;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Request Item Infos
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $request_item_infos;

    /**
     * Last Action Date
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $last_action_date;

    /**
     * Completion Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $completion_date;

    /**
     * Logs
     * ---
     * Activity logs linked to this request
     * ---
     * Relation : one2many (sign.log -> sign_request_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Log
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sign_log_ids;

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
    private $activity_state;

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
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

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
     * @param OdooRelation $template_id Template
     *        ---
     *        Relation : many2one (sign.template)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $reference Document Name
     *        ---
     *        This is how the document will be named in the mail
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $access_token Security Token
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $template_id, string $reference, string $access_token)
    {
        $this->template_id = $template_id;
        $this->reference = $reference;
        $this->access_token = $access_token;
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
     *
     * @SerializedName("message_ids")
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
     *
     * @SerializedName("message_channel_ids")
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
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
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
     *
     * @SerializedName("message_follower_ids")
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
     *
     * @SerializedName("message_is_follower")
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
     *
     * @SerializedName("activity_exception_icon")
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
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
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
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
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
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
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
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @param mixed|null $completed_document
     */
    public function setCompletedDocument($completed_document): void
    {
        $this->completed_document = $completed_document;
    }

    /**
     * @param bool|null $integrity
     */
    public function setIntegrity(?bool $integrity): void
    {
        $this->integrity = $integrity;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("integrity")
     */
    public function isIntegrity(): ?bool
    {
        return $this->integrity;
    }

    /**
     * @param bool|null $start_sign
     */
    public function setStartSign(?bool $start_sign): void
    {
        $this->start_sign = $start_sign;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("start_sign")
     */
    public function isStartSign(): ?bool
    {
        return $this->start_sign;
    }

    /**
     * @param string|null $progress
     */
    public function setProgress(?string $progress): void
    {
        $this->progress = $progress;
    }

    /**
     * @return string|null
     *
     * @SerializedName("progress")
     */
    public function getProgress(): ?string
    {
        return $this->progress;
    }

    /**
     * @param int|null $nb_total
     */
    public function setNbTotal(?int $nb_total): void
    {
        $this->nb_total = $nb_total;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nb_total")
     */
    public function getNbTotal(): ?int
    {
        return $this->nb_total;
    }

    /**
     * @param int|null $nb_closed
     */
    public function setNbClosed(?int $nb_closed): void
    {
        $this->nb_closed = $nb_closed;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nb_closed")
     */
    public function getNbClosed(): ?int
    {
        return $this->nb_closed;
    }

    /**
     * @param int|null $nb_wait
     */
    public function setNbWait(?int $nb_wait): void
    {
        $this->nb_wait = $nb_wait;
    }

    /**
     * @return int|null
     *
     * @SerializedName("nb_wait")
     */
    public function getNbWait(): ?int
    {
        return $this->nb_wait;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("completed_document")
     */
    public function getCompletedDocument()
    {
        return $this->completed_document;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRequestItemIds(OdooRelation $item): void
    {
        if (null === $this->request_item_ids) {
            $this->request_item_ids = [];
        }

        if ($this->hasRequestItemIds($item)) {
            $index = array_search($item, $this->request_item_ids);
            unset($this->request_item_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addRequestItemIds(OdooRelation $item): void
    {
        if ($this->hasRequestItemIds($item)) {
            return;
        }

        if (null === $this->request_item_ids) {
            $this->request_item_ids = [];
        }

        $this->request_item_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRequestItemIds(OdooRelation $item): bool
    {
        if (null === $this->request_item_ids) {
            return false;
        }

        return in_array($item, $this->request_item_ids);
    }

    /**
     * @param OdooRelation[]|null $request_item_ids
     */
    public function setRequestItemIds(?array $request_item_ids): void
    {
        $this->request_item_ids = $request_item_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("request_item_ids")
     */
    public function getRequestItemIds(): ?array
    {
        return $this->request_item_ids;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     *
     * @SerializedName("reference")
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param OdooRelation $template_id
     */
    public function setTemplateId(OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("favorited_ids")
     */
    public function getFavoritedIds(): ?array
    {
        return $this->favorited_ids;
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
     * @param OdooRelation $item
     */
    public function addSignLogIds(OdooRelation $item): void
    {
        if ($this->hasSignLogIds($item)) {
            return;
        }

        if (null === $this->sign_log_ids) {
            $this->sign_log_ids = [];
        }

        $this->sign_log_ids[] = $item;
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
     *
     * @SerializedName("activity_type_id")
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
     *
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
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
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSignLogIds(OdooRelation $item): void
    {
        if (null === $this->sign_log_ids) {
            $this->sign_log_ids = [];
        }

        if ($this->hasSignLogIds($item)) {
            $index = array_search($item, $this->sign_log_ids);
            unset($this->sign_log_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSignLogIds(OdooRelation $item): bool
    {
        if (null === $this->sign_log_ids) {
            return false;
        }

        return in_array($item, $this->sign_log_ids);
    }

    /**
     * @param OdooRelation[]|null $favorited_ids
     */
    public function setFavoritedIds(?array $favorited_ids): void
    {
        $this->favorited_ids = $favorited_ids;
    }

    /**
     * @param OdooRelation[]|null $sign_log_ids
     */
    public function setSignLogIds(?array $sign_log_ids): void
    {
        $this->sign_log_ids = $sign_log_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sign_log_ids")
     */
    public function getSignLogIds(): ?array
    {
        return $this->sign_log_ids;
    }

    /**
     * @param DateTimeInterface|null $completion_date
     */
    public function setCompletionDate(?DateTimeInterface $completion_date): void
    {
        $this->completion_date = $completion_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("completion_date")
     */
    public function getCompletionDate(): ?DateTimeInterface
    {
        return $this->completion_date;
    }

    /**
     * @param DateTimeInterface|null $last_action_date
     */
    public function setLastActionDate(?DateTimeInterface $last_action_date): void
    {
        $this->last_action_date = $last_action_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_action_date")
     */
    public function getLastActionDate(): ?DateTimeInterface
    {
        return $this->last_action_date;
    }

    /**
     * @param mixed|null $request_item_infos
     */
    public function setRequestItemInfos($request_item_infos): void
    {
        $this->request_item_infos = $request_item_infos;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("request_item_infos")
     */
    public function getRequestItemInfos()
    {
        return $this->request_item_infos;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
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
    public function removeFavoritedIds(OdooRelation $item): void
    {
        if (null === $this->favorited_ids) {
            $this->favorited_ids = [];
        }

        if ($this->hasFavoritedIds($item)) {
            $index = array_search($item, $this->favorited_ids);
            unset($this->favorited_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addFavoritedIds(OdooRelation $item): void
    {
        if ($this->hasFavoritedIds($item)) {
            return;
        }

        if (null === $this->favorited_ids) {
            $this->favorited_ids = [];
        }

        $this->favorited_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFavoritedIds(OdooRelation $item): bool
    {
        if (null === $this->favorited_ids) {
            return false;
        }

        return in_array($item, $this->favorited_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.request';
    }
}
