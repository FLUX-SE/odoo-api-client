<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.message
 * ---
 * Name : mail.message
 * ---
 * Info :
 * Override MailMessage class in order to add a new type: SMS messages.
 *         Those messages comes with their own notification method, using SMS
 *         gateway.
 */
class Message extends Base
{
    /**
     * Subject
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $subject;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $date;

    /**
     * Contents
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $body;

    /**
     * Attachments
     * ---
     * Attachments are linked to a document through model / res_id and to the message through this field.
     * ---
     * Relation : many2many (ir.attachment)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $attachment_ids;

    /**
     * Parent Message
     * ---
     * Initial thread message.
     * ---
     * Relation : many2one (mail.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $parent_id;

    /**
     * Child Messages
     * ---
     * Relation : one2many (mail.message -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $child_ids;

    /**
     * Related Document Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $model;

    /**
     * Related Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $res_id;

    /**
     * Message Record Name
     * ---
     * Name get of the related document.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $record_name;

    /**
     * Subtype
     * ---
     * Relation : many2one (mail.message.subtype)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message\Subtype
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $subtype_id;

    /**
     * Mail Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_activity_type_id;

    /**
     * From
     * ---
     * Email address of the sender. This field is set when no matching partner is found and replaces the author_id
     * field in the chatter.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email_from;

    /**
     * Author
     * ---
     * Author of the message. If not set, email_from may hold an email address that did not match any partner.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $author_id;

    /**
     * Author's avatar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $author_avatar;

    /**
     * Recipients
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $partner_ids;

    /**
     * Partners with Need Action
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $notified_partner_ids;

    /**
     * Need Action
     * ---
     * Need Action
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $needaction;

    /**
     * Has error
     * ---
     * Has error
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $has_error;

    /**
     * Channels
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $channel_ids;

    /**
     * Notifications
     * ---
     * Relation : one2many (mail.notification -> mail_message_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Notification
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $notification_ids;

    /**
     * Favorited By
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $starred_partner_ids;

    /**
     * Starred
     * ---
     * Current user has a starred notification linked to this message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $starred;

    /**
     * No threading for answers
     * ---
     * Answers do not go in the original document discussion thread. This has an impact on the generated message-id.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $no_auto_thread;

    /**
     * Message-Id
     * ---
     * Message unique identifier
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $message_id;

    /**
     * Reply-To
     * ---
     * Reply email address. Setting the reply_to bypasses the automatic thread creation.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $reply_to;

    /**
     * Outgoing mail server
     * ---
     * Relation : many2one (ir.mail_server)
     * @see \Flux\OdooApiClient\Model\Object\Ir\MailServer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_server_id;

    /**
     * Moderation Status
     * ---
     * Selection :
     *     -> pending_moderation (Pending Moderation)
     *     -> accepted (Accepted)
     *     -> rejected (Rejected)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $moderation_status;

    /**
     * Moderated By
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $moderator_id;

    /**
     * Need moderation
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $need_moderation;

    /**
     * Layout
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email_layout_xmlid;

    /**
     * Add Sign
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $add_sign;

    /**
     * Mails
     * ---
     * Relation : one2many (mail.mail -> mail_message_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Mail
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $mail_ids;

    /**
     * Canned Responses
     * ---
     * Relation : one2many (mail.shortcode -> message_ids)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Shortcode
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $canned_response_ids;

    /**
     * Snailmail message in error
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $snailmail_error;

    /**
     * Snailmail Status
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $snailmail_status;

    /**
     * Letter
     * ---
     * Relation : one2many (snailmail.letter -> message_id)
     * @see \Flux\OdooApiClient\Model\Object\Snailmail\Letter
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $letter_ids;

    /**
     * Type
     * ---
     * Message type: email for email message, notification for system message, comment for other messages such as
     * user replies
     * ---
     * Selection :
     *     -> email (Email)
     *     -> comment (Comment)
     *     -> notification (System notification)
     *     -> user_notification (User Specific Notification)
     *     -> snailmail (Snailmail)
     *     -> sms (SMS)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $message_type;

    /**
     * Has SMS error
     * ---
     * Has error
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $has_sms_error;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param string $message_type Type
     *        ---
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     *        ---
     *        Selection :
     *            -> email (Email)
     *            -> comment (Comment)
     *            -> notification (System notification)
     *            -> user_notification (User Specific Notification)
     *            -> snailmail (Snailmail)
     *            -> sms (SMS)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("moderation_status")
     */
    public function getModerationStatus(): ?string
    {
        return $this->moderation_status;
    }

    /**
     * @param OdooRelation[]|null $mail_ids
     */
    public function setMailIds(?array $mail_ids): void
    {
        $this->mail_ids = $mail_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("mail_ids")
     */
    public function getMailIds(): ?array
    {
        return $this->mail_ids;
    }

    /**
     * @param bool|null $add_sign
     */
    public function setAddSign(?bool $add_sign): void
    {
        $this->add_sign = $add_sign;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("add_sign")
     */
    public function isAddSign(): ?bool
    {
        return $this->add_sign;
    }

    /**
     * @param string|null $email_layout_xmlid
     */
    public function setEmailLayoutXmlid(?string $email_layout_xmlid): void
    {
        $this->email_layout_xmlid = $email_layout_xmlid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_layout_xmlid")
     */
    public function getEmailLayoutXmlid(): ?string
    {
        return $this->email_layout_xmlid;
    }

    /**
     * @param bool|null $need_moderation
     */
    public function setNeedModeration(?bool $need_moderation): void
    {
        $this->need_moderation = $need_moderation;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("need_moderation")
     */
    public function isNeedModeration(): ?bool
    {
        return $this->need_moderation;
    }

    /**
     * @param OdooRelation|null $moderator_id
     */
    public function setModeratorId(?OdooRelation $moderator_id): void
    {
        $this->moderator_id = $moderator_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("moderator_id")
     */
    public function getModeratorId(): ?OdooRelation
    {
        return $this->moderator_id;
    }

    /**
     * @param string|null $moderation_status
     */
    public function setModerationStatus(?string $moderation_status): void
    {
        $this->moderation_status = $moderation_status;
    }

    /**
     * @param OdooRelation|null $mail_server_id
     */
    public function setMailServerId(?OdooRelation $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMailIds(OdooRelation $item): void
    {
        if ($this->hasMailIds($item)) {
            return;
        }

        if (null === $this->mail_ids) {
            $this->mail_ids = [];
        }

        $this->mail_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("mail_server_id")
     */
    public function getMailServerId(): ?OdooRelation
    {
        return $this->mail_server_id;
    }

    /**
     * @param string|null $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reply_to")
     */
    public function getReplyTo(): ?string
    {
        return $this->reply_to;
    }

    /**
     * @param string|null $message_id
     */
    public function setMessageId(?string $message_id): void
    {
        $this->message_id = $message_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message_id")
     */
    public function getMessageId(): ?string
    {
        return $this->message_id;
    }

    /**
     * @param bool|null $no_auto_thread
     */
    public function setNoAutoThread(?bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("no_auto_thread")
     */
    public function isNoAutoThread(): ?bool
    {
        return $this->no_auto_thread;
    }

    /**
     * @param bool|null $starred
     */
    public function setStarred(?bool $starred): void
    {
        $this->starred = $starred;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("starred")
     */
    public function isStarred(): ?bool
    {
        return $this->starred;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStarredPartnerIds(OdooRelation $item): void
    {
        if (null === $this->starred_partner_ids) {
            $this->starred_partner_ids = [];
        }

        if ($this->hasStarredPartnerIds($item)) {
            $index = array_search($item, $this->starred_partner_ids);
            unset($this->starred_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addStarredPartnerIds(OdooRelation $item): void
    {
        if ($this->hasStarredPartnerIds($item)) {
            return;
        }

        if (null === $this->starred_partner_ids) {
            $this->starred_partner_ids = [];
        }

        $this->starred_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStarredPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->starred_partner_ids) {
            return false;
        }

        return in_array($item, $this->starred_partner_ids);
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMailIds(OdooRelation $item): bool
    {
        if (null === $this->mail_ids) {
            return false;
        }

        return in_array($item, $this->mail_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMailIds(OdooRelation $item): void
    {
        if (null === $this->mail_ids) {
            $this->mail_ids = [];
        }

        if ($this->hasMailIds($item)) {
            $index = array_search($item, $this->mail_ids);
            unset($this->mail_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("starred_partner_ids")
     */
    public function getStarredPartnerIds(): ?array
    {
        return $this->starred_partner_ids;
    }

    /**
     * @return string
     *
     * @SerializedName("message_type")
     */
    public function getMessageType(): string
    {
        return $this->message_type;
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
     * @param bool|null $has_sms_error
     */
    public function setHasSmsError(?bool $has_sms_error): void
    {
        $this->has_sms_error = $has_sms_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_sms_error")
     */
    public function isHasSmsError(): ?bool
    {
        return $this->has_sms_error;
    }

    /**
     * @param string $message_type
     */
    public function setMessageType(string $message_type): void
    {
        $this->message_type = $message_type;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLetterIds(OdooRelation $item): void
    {
        if (null === $this->letter_ids) {
            $this->letter_ids = [];
        }

        if ($this->hasLetterIds($item)) {
            $index = array_search($item, $this->letter_ids);
            unset($this->letter_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("canned_response_ids")
     */
    public function getCannedResponseIds(): ?array
    {
        return $this->canned_response_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addLetterIds(OdooRelation $item): void
    {
        if ($this->hasLetterIds($item)) {
            return;
        }

        if (null === $this->letter_ids) {
            $this->letter_ids = [];
        }

        $this->letter_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLetterIds(OdooRelation $item): bool
    {
        if (null === $this->letter_ids) {
            return false;
        }

        return in_array($item, $this->letter_ids);
    }

    /**
     * @param OdooRelation[]|null $letter_ids
     */
    public function setLetterIds(?array $letter_ids): void
    {
        $this->letter_ids = $letter_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("letter_ids")
     */
    public function getLetterIds(): ?array
    {
        return $this->letter_ids;
    }

    /**
     * @param string|null $snailmail_status
     */
    public function setSnailmailStatus(?string $snailmail_status): void
    {
        $this->snailmail_status = $snailmail_status;
    }

    /**
     * @return string|null
     *
     * @SerializedName("snailmail_status")
     */
    public function getSnailmailStatus(): ?string
    {
        return $this->snailmail_status;
    }

    /**
     * @param bool|null $snailmail_error
     */
    public function setSnailmailError(?bool $snailmail_error): void
    {
        $this->snailmail_error = $snailmail_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("snailmail_error")
     */
    public function isSnailmailError(): ?bool
    {
        return $this->snailmail_error;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCannedResponseIds(OdooRelation $item): void
    {
        if (null === $this->canned_response_ids) {
            $this->canned_response_ids = [];
        }

        if ($this->hasCannedResponseIds($item)) {
            $index = array_search($item, $this->canned_response_ids);
            unset($this->canned_response_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCannedResponseIds(OdooRelation $item): void
    {
        if ($this->hasCannedResponseIds($item)) {
            return;
        }

        if (null === $this->canned_response_ids) {
            $this->canned_response_ids = [];
        }

        $this->canned_response_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCannedResponseIds(OdooRelation $item): bool
    {
        if (null === $this->canned_response_ids) {
            return false;
        }

        return in_array($item, $this->canned_response_ids);
    }

    /**
     * @param OdooRelation[]|null $canned_response_ids
     */
    public function setCannedResponseIds(?array $canned_response_ids): void
    {
        $this->canned_response_ids = $canned_response_ids;
    }

    /**
     * @param OdooRelation[]|null $starred_partner_ids
     */
    public function setStarredPartnerIds(?array $starred_partner_ids): void
    {
        $this->starred_partner_ids = $starred_partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNotificationIds(OdooRelation $item): void
    {
        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        if ($this->hasNotificationIds($item)) {
            $index = array_search($item, $this->notification_ids);
            unset($this->notification_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("subject")
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param OdooRelation|null $subtype_id
     */
    public function setSubtypeId(?OdooRelation $subtype_id): void
    {
        $this->subtype_id = $subtype_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("subtype_id")
     */
    public function getSubtypeId(): ?OdooRelation
    {
        return $this->subtype_id;
    }

    /**
     * @param string|null $record_name
     */
    public function setRecordName(?string $record_name): void
    {
        $this->record_name = $record_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("record_name")
     */
    public function getRecordName(): ?string
    {
        return $this->record_name;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_ids")
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param OdooRelation|null $mail_activity_type_id
     */
    public function setMailActivityTypeId(?OdooRelation $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
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
    public function hasAttachmentIds(OdooRelation $item): bool
    {
        if (null === $this->attachment_ids) {
            return false;
        }

        return in_array($item, $this->attachment_ids);
    }

    /**
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("attachment_ids")
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
    }

    /**
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string|null
     *
     * @SerializedName("body")
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string|null $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("mail_activity_type_id")
     */
    public function getMailActivityTypeId(): ?OdooRelation
    {
        return $this->mail_activity_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_from")
     */
    public function getEmailFrom(): ?string
    {
        return $this->email_from;
    }

    /**
     * @param OdooRelation $item
     */
    public function addNotificationIds(OdooRelation $item): void
    {
        if ($this->hasNotificationIds($item)) {
            return;
        }

        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        $this->notification_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNotifiedPartnerIds(OdooRelation $item): void
    {
        if (null === $this->notified_partner_ids) {
            $this->notified_partner_ids = [];
        }

        if ($this->hasNotifiedPartnerIds($item)) {
            $index = array_search($item, $this->notified_partner_ids);
            unset($this->notified_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNotificationIds(OdooRelation $item): bool
    {
        if (null === $this->notification_ids) {
            return false;
        }

        return in_array($item, $this->notification_ids);
    }

    /**
     * @param OdooRelation[]|null $notification_ids
     */
    public function setNotificationIds(?array $notification_ids): void
    {
        $this->notification_ids = $notification_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("notification_ids")
     */
    public function getNotificationIds(): ?array
    {
        return $this->notification_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelIds(OdooRelation $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addChannelIds(OdooRelation $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelIds(OdooRelation $item): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("channel_ids")
     */
    public function getChannelIds(): ?array
    {
        return $this->channel_ids;
    }

    /**
     * @param bool|null $has_error
     */
    public function setHasError(?bool $has_error): void
    {
        $this->has_error = $has_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_error")
     */
    public function isHasError(): ?bool
    {
        return $this->has_error;
    }

    /**
     * @param bool|null $needaction
     */
    public function setNeedaction(?bool $needaction): void
    {
        $this->needaction = $needaction;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("needaction")
     */
    public function isNeedaction(): ?bool
    {
        return $this->needaction;
    }

    /**
     * @param OdooRelation $item
     */
    public function addNotifiedPartnerIds(OdooRelation $item): void
    {
        if ($this->hasNotifiedPartnerIds($item)) {
            return;
        }

        if (null === $this->notified_partner_ids) {
            $this->notified_partner_ids = [];
        }

        $this->notified_partner_ids[] = $item;
    }

    /**
     * @param string|null $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNotifiedPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->notified_partner_ids) {
            return false;
        }

        return in_array($item, $this->notified_partner_ids);
    }

    /**
     * @param OdooRelation[]|null $notified_partner_ids
     */
    public function setNotifiedPartnerIds(?array $notified_partner_ids): void
    {
        $this->notified_partner_ids = $notified_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("notified_partner_ids")
     */
    public function getNotifiedPartnerIds(): ?array
    {
        return $this->notified_partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param string|null $author_avatar
     */
    public function setAuthorAvatar(?string $author_avatar): void
    {
        $this->author_avatar = $author_avatar;
    }

    /**
     * @return string|null
     *
     * @SerializedName("author_avatar")
     */
    public function getAuthorAvatar(): ?string
    {
        return $this->author_avatar;
    }

    /**
     * @param OdooRelation|null $author_id
     */
    public function setAuthorId(?OdooRelation $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("author_id")
     */
    public function getAuthorId(): ?OdooRelation
    {
        return $this->author_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.message';
    }
}