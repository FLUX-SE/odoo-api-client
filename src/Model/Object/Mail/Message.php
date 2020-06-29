<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\MailServer;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Message as MessageAlias;
use Flux\OdooApiClient\Model\Object\Mail\Message\Subtype;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Snailmail\Letter;

/**
 * Odoo model : mail.message
 * Name : mail.message
 * Info :
 * Override MailMessage class in order to add a new type: SMS messages.
 * Those messages comes with their own notification method, using SMS
 * gateway.
 */
class Message extends Base
{
    /**
     * Subject
     *
     * @var null|string
     */
    protected $subject;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    protected $date;

    /**
     * Contents
     *
     * @var null|string
     */
    protected $body;

    /**
     * Attachments
     * Attachments are linked to a document through model / res_id and to the message through this field.
     *
     * @var null|Attachment[]
     */
    protected $attachment_ids;

    /**
     * Parent Message
     * Initial thread message.
     *
     * @var null|MessageAlias
     */
    protected $parent_id;

    /**
     * Child Messages
     *
     * @var null|MessageAlias[]
     */
    protected $child_ids;

    /**
     * Related Document Model
     *
     * @var null|string
     */
    protected $model;

    /**
     * Related Document ID
     *
     * @var null|int
     */
    protected $res_id;

    /**
     * Message Record Name
     * Name get of the related document.
     *
     * @var null|string
     */
    protected $record_name;

    /**
     * Subtype
     *
     * @var null|Subtype
     */
    protected $subtype_id;

    /**
     * Mail Activity Type
     *
     * @var null|Type
     */
    protected $mail_activity_type_id;

    /**
     * From
     * Email address of the sender. This field is set when no matching partner is found and replaces the author_id
     * field in the chatter.
     *
     * @var null|string
     */
    protected $email_from;

    /**
     * Author
     * Author of the message. If not set, email_from may hold an email address that did not match any partner.
     *
     * @var null|Partner
     */
    protected $author_id;

    /**
     * Author's avatar
     *
     * @var null|int
     */
    protected $author_avatar;

    /**
     * Recipients
     *
     * @var null|Partner[]
     */
    protected $partner_ids;

    /**
     * Partners with Need Action
     *
     * @var null|Partner[]
     */
    protected $notified_partner_ids;

    /**
     * Need Action
     * Need Action
     *
     * @var null|bool
     */
    protected $needaction;

    /**
     * Has error
     * Has error
     *
     * @var null|bool
     */
    protected $has_error;

    /**
     * Channels
     *
     * @var null|Channel[]
     */
    protected $channel_ids;

    /**
     * Notifications
     *
     * @var null|Notification[]
     */
    protected $notification_ids;

    /**
     * Favorited By
     *
     * @var null|Partner[]
     */
    protected $starred_partner_ids;

    /**
     * Starred
     * Current user has a starred notification linked to this message
     *
     * @var null|bool
     */
    protected $starred;

    /**
     * No threading for answers
     * Answers do not go in the original document discussion thread. This has an impact on the generated message-id.
     *
     * @var null|bool
     */
    protected $no_auto_thread;

    /**
     * Message-Id
     * Message unique identifier
     *
     * @var null|string
     */
    protected $message_id;

    /**
     * Reply-To
     * Reply email address. Setting the reply_to bypasses the automatic thread creation.
     *
     * @var null|string
     */
    protected $reply_to;

    /**
     * Outgoing mail server
     *
     * @var null|MailServer
     */
    protected $mail_server_id;

    /**
     * Moderation Status
     *
     * @var null|array
     */
    protected $moderation_status;

    /**
     * Moderated By
     *
     * @var null|Users
     */
    protected $moderator_id;

    /**
     * Need moderation
     *
     * @var null|bool
     */
    protected $need_moderation;

    /**
     * Layout
     *
     * @var null|string
     */
    protected $email_layout_xmlid;

    /**
     * Add Sign
     *
     * @var null|bool
     */
    protected $add_sign;

    /**
     * Mails
     *
     * @var null|Mail[]
     */
    protected $mail_ids;

    /**
     * Canned Responses
     *
     * @var null|Shortcode[]
     */
    protected $canned_response_ids;

    /**
     * Snailmail message in error
     *
     * @var null|bool
     */
    protected $snailmail_error;

    /**
     * Snailmail Status
     *
     * @var null|string
     */
    protected $snailmail_status;

    /**
     * Letter
     *
     * @var null|Letter[]
     */
    protected $letter_ids;

    /**
     * Type
     * Message type: email for email message, notification for system message, comment for other messages such as
     * user replies
     *
     * @var array
     */
    protected $message_type;

    /**
     * Has SMS error
     * Has error
     *
     * @var null|bool
     */
    protected $has_sms_error;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
     * @param array $message_type Type
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     */
    public function __construct(array $message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * @param mixed $item
     */
    public function addModerationStatus($item): void
    {
        if ($this->hasModerationStatus($item)) {
            return;
        }

        if (null === $this->moderation_status) {
            $this->moderation_status = [];
        }

        $this->moderation_status[] = $item;
    }

    /**
     * @param Mail $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMailIds(Mail $item, bool $strict = true): bool
    {
        if (null === $this->mail_ids) {
            return false;
        }

        return in_array($item, $this->mail_ids, $strict);
    }

    /**
     * @param null|Mail[] $mail_ids
     */
    public function setMailIds(?array $mail_ids): void
    {
        $this->mail_ids = $mail_ids;
    }

    /**
     * @param null|bool $add_sign
     */
    public function setAddSign(?bool $add_sign): void
    {
        $this->add_sign = $add_sign;
    }

    /**
     * @param null|string $email_layout_xmlid
     */
    public function setEmailLayoutXmlid(?string $email_layout_xmlid): void
    {
        $this->email_layout_xmlid = $email_layout_xmlid;
    }

    /**
     * @return null|bool
     */
    public function isNeedModeration(): ?bool
    {
        return $this->need_moderation;
    }

    /**
     * @param null|Users $moderator_id
     */
    public function setModeratorId(?Users $moderator_id): void
    {
        $this->moderator_id = $moderator_id;
    }

    /**
     * @param mixed $item
     */
    public function removeModerationStatus($item): void
    {
        if (null === $this->moderation_status) {
            $this->moderation_status = [];
        }

        if ($this->hasModerationStatus($item)) {
            $index = array_search($item, $this->moderation_status);
            unset($this->moderation_status[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModerationStatus($item, bool $strict = true): bool
    {
        if (null === $this->moderation_status) {
            return false;
        }

        return in_array($item, $this->moderation_status, $strict);
    }

    /**
     * @param Mail $item
     */
    public function removeMailIds(Mail $item): void
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
     * @param null|array $moderation_status
     */
    public function setModerationStatus(?array $moderation_status): void
    {
        $this->moderation_status = $moderation_status;
    }

    /**
     * @param null|MailServer $mail_server_id
     */
    public function setMailServerId(?MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param null|string $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @return null|string
     */
    public function getMessageId(): ?string
    {
        return $this->message_id;
    }

    /**
     * @param null|bool $no_auto_thread
     */
    public function setNoAutoThread(?bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @return null|bool
     */
    public function isStarred(): ?bool
    {
        return $this->starred;
    }

    /**
     * @param Partner $item
     */
    public function removeStarredPartnerIds(Partner $item): void
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
     * @param Mail $item
     */
    public function addMailIds(Mail $item): void
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
     * @param null|Shortcode[] $canned_response_ids
     */
    public function setCannedResponseIds(?array $canned_response_ids): void
    {
        $this->canned_response_ids = $canned_response_ids;
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStarredPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->starred_partner_ids) {
            return false;
        }

        return in_array($item, $this->starred_partner_ids, $strict);
    }

    /**
     * @param array $message_type
     */
    public function setMessageType(array $message_type): void
    {
        $this->message_type = $message_type;
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
    public function isHasSmsError(): ?bool
    {
        return $this->has_sms_error;
    }

    /**
     * @param mixed $item
     */
    public function removeMessageType($item): void
    {
        if ($this->hasMessageType($item)) {
            $index = array_search($item, $this->message_type);
            unset($this->message_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addMessageType($item): void
    {
        if ($this->hasMessageType($item)) {
            return;
        }

        $this->message_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageType($item, bool $strict = true): bool
    {
        return in_array($item, $this->message_type, $strict);
    }

    /**
     * @param Letter $item
     */
    public function removeLetterIds(Letter $item): void
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
     * @param Shortcode $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCannedResponseIds(Shortcode $item, bool $strict = true): bool
    {
        if (null === $this->canned_response_ids) {
            return false;
        }

        return in_array($item, $this->canned_response_ids, $strict);
    }

    /**
     * @param Letter $item
     */
    public function addLetterIds(Letter $item): void
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
     * @param Letter $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLetterIds(Letter $item, bool $strict = true): bool
    {
        if (null === $this->letter_ids) {
            return false;
        }

        return in_array($item, $this->letter_ids, $strict);
    }

    /**
     * @param null|Letter[] $letter_ids
     */
    public function setLetterIds(?array $letter_ids): void
    {
        $this->letter_ids = $letter_ids;
    }

    /**
     * @return null|string
     */
    public function getSnailmailStatus(): ?string
    {
        return $this->snailmail_status;
    }

    /**
     * @return null|bool
     */
    public function isSnailmailError(): ?bool
    {
        return $this->snailmail_error;
    }

    /**
     * @param Shortcode $item
     */
    public function removeCannedResponseIds(Shortcode $item): void
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
     * @param Shortcode $item
     */
    public function addCannedResponseIds(Shortcode $item): void
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
     * @param Partner $item
     */
    public function addStarredPartnerIds(Partner $item): void
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
     * @param null|Partner[] $starred_partner_ids
     */
    public function setStarredPartnerIds(?array $starred_partner_ids): void
    {
        $this->starred_partner_ids = $starred_partner_ids;
    }

    /**
     * @param null|string $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param MessageAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildIds(MessageAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids, $strict);
    }

    /**
     * @param null|Type $mail_activity_type_id
     */
    public function setMailActivityTypeId(?Type $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
    }

    /**
     * @param null|Subtype $subtype_id
     */
    public function setSubtypeId(?Subtype $subtype_id): void
    {
        $this->subtype_id = $subtype_id;
    }

    /**
     * @param null|string $record_name
     */
    public function setRecordName(?string $record_name): void
    {
        $this->record_name = $record_name;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param MessageAlias $item
     */
    public function removeChildIds(MessageAlias $item): void
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
     * @param MessageAlias $item
     */
    public function addChildIds(MessageAlias $item): void
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
     * @param null|MessageAlias[] $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param null|Partner $author_id
     */
    public function setAuthorId(?Partner $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @param null|MessageAlias $parent_id
     */
    public function setParentId(?MessageAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
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
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|string $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param null|int $author_avatar
     */
    public function setAuthorAvatar(?int $author_avatar): void
    {
        $this->author_avatar = $author_avatar;
    }

    /**
     * @param Notification $item
     */
    public function removeNotificationIds(Notification $item): void
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
     * @return null|bool
     */
    public function isHasError(): ?bool
    {
        return $this->has_error;
    }

    /**
     * @param Notification $item
     */
    public function addNotificationIds(Notification $item): void
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
     * @param Notification $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationIds(Notification $item, bool $strict = true): bool
    {
        if (null === $this->notification_ids) {
            return false;
        }

        return in_array($item, $this->notification_ids, $strict);
    }

    /**
     * @param null|Notification[] $notification_ids
     */
    public function setNotificationIds(?array $notification_ids): void
    {
        $this->notification_ids = $notification_ids;
    }

    /**
     * @param Channel $item
     */
    public function removeChannelIds(Channel $item): void
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
     * @param Channel $item
     */
    public function addChannelIds(Channel $item): void
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
     * @param Channel $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelIds(Channel $item, bool $strict = true): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids, $strict);
    }

    /**
     * @param null|Channel[] $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @return null|bool
     */
    public function isNeedaction(): ?bool
    {
        return $this->needaction;
    }

    /**
     * @param null|Partner[] $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Partner $item
     */
    public function removeNotifiedPartnerIds(Partner $item): void
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
     * @param Partner $item
     */
    public function addNotifiedPartnerIds(Partner $item): void
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
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotifiedPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->notified_partner_ids) {
            return false;
        }

        return in_array($item, $this->notified_partner_ids, $strict);
    }

    /**
     * @param null|Partner[] $notified_partner_ids
     */
    public function setNotifiedPartnerIds(?array $notified_partner_ids): void
    {
        $this->notified_partner_ids = $notified_partner_ids;
    }

    /**
     * @param Partner $item
     */
    public function removePartnerIds(Partner $item): void
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
     * @param Partner $item
     */
    public function addPartnerIds(Partner $item): void
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
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids, $strict);
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
