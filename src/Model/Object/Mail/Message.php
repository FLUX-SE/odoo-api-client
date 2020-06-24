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
 *
 * Override MailMessage class in order to add a new type: SMS messages.
 * Those messages comes with their own notification method, using SMS
 * gateway.
 */
class Message extends Base
{
    /**
     * Subject
     *
     * @var string
     */
    protected $subject;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    protected $date;

    /**
     * Contents
     *
     * @var string
     */
    protected $body;

    /**
     * Attachments
     *
     * @var Attachment
     */
    protected $attachment_ids;

    /**
     * Parent Message
     *
     * @var MessageAlias
     */
    protected $parent_id;

    /**
     * Child Messages
     *
     * @var MessageAlias
     */
    protected $child_ids;

    /**
     * Related Document Model
     *
     * @var string
     */
    protected $model;

    /**
     * Related Document ID
     *
     * @var int
     */
    protected $res_id;

    /**
     * Message Record Name
     *
     * @var string
     */
    protected $record_name;

    /**
     * Subtype
     *
     * @var Subtype
     */
    protected $subtype_id;

    /**
     * Mail Activity Type
     *
     * @var Type
     */
    protected $mail_activity_type_id;

    /**
     * From
     *
     * @var string
     */
    protected $email_from;

    /**
     * Author
     *
     * @var Partner
     */
    protected $author_id;

    /**
     * Author's avatar
     *
     * @var int
     */
    protected $author_avatar;

    /**
     * Recipients
     *
     * @var Partner
     */
    protected $partner_ids;

    /**
     * Partners with Need Action
     *
     * @var Partner
     */
    protected $notified_partner_ids;

    /**
     * Need Action
     *
     * @var bool
     */
    protected $needaction;

    /**
     * Has error
     *
     * @var bool
     */
    protected $has_error;

    /**
     * Channels
     *
     * @var Channel
     */
    protected $channel_ids;

    /**
     * Notifications
     *
     * @var Notification
     */
    protected $notification_ids;

    /**
     * Favorited By
     *
     * @var Partner
     */
    protected $starred_partner_ids;

    /**
     * Starred
     *
     * @var bool
     */
    protected $starred;

    /**
     * No threading for answers
     *
     * @var bool
     */
    protected $no_auto_thread;

    /**
     * Message-Id
     *
     * @var string
     */
    protected $message_id;

    /**
     * Reply-To
     *
     * @var string
     */
    protected $reply_to;

    /**
     * Outgoing mail server
     *
     * @var MailServer
     */
    protected $mail_server_id;

    /**
     * Moderation Status
     *
     * @var array
     */
    protected $moderation_status;

    /**
     * Moderated By
     *
     * @var Users
     */
    protected $moderator_id;

    /**
     * Need moderation
     *
     * @var bool
     */
    protected $need_moderation;

    /**
     * Layout
     *
     * @var string
     */
    protected $email_layout_xmlid;

    /**
     * Add Sign
     *
     * @var bool
     */
    protected $add_sign;

    /**
     * Mails
     *
     * @var Mail
     */
    protected $mail_ids;

    /**
     * Canned Responses
     *
     * @var Shortcode
     */
    protected $canned_response_ids;

    /**
     * Snailmail message in error
     *
     * @var bool
     */
    protected $snailmail_error;

    /**
     * Snailmail Status
     *
     * @var string
     */
    protected $snailmail_status;

    /**
     * Letter
     *
     * @var Letter
     */
    protected $letter_ids;

    /**
     * Type
     *
     * @var null|array
     */
    protected $message_type;

    /**
     * Has SMS error
     *
     * @var bool
     */
    protected $has_sms_error;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return bool
     */
    public function isSnailmailError(): bool
    {
        return $this->snailmail_error;
    }

    /**
     * @param array $moderation_status
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModerationStatus(array $moderation_status, bool $strict = true): bool
    {
        return in_array($moderation_status, $this->moderation_status, $strict);
    }

    /**
     * @param array $moderation_status
     */
    public function addModerationStatus(array $moderation_status): void
    {
        if ($this->hasModerationStatus($moderation_status)) {
            return;
        }

        $this->moderation_status[] = $moderation_status;
    }

    /**
     * @param array $moderation_status
     */
    public function removeModerationStatus(array $moderation_status): void
    {
        if ($this->hasModerationStatus($moderation_status)) {
            $index = array_search($moderation_status, $this->moderation_status);
            unset($this->moderation_status[$index]);
        }
    }

    /**
     * @param Users $moderator_id
     */
    public function setModeratorId(Users $moderator_id): void
    {
        $this->moderator_id = $moderator_id;
    }

    /**
     * @return bool
     */
    public function isNeedModeration(): bool
    {
        return $this->need_moderation;
    }

    /**
     * @param string $email_layout_xmlid
     */
    public function setEmailLayoutXmlid(string $email_layout_xmlid): void
    {
        $this->email_layout_xmlid = $email_layout_xmlid;
    }

    /**
     * @param bool $add_sign
     */
    public function setAddSign(bool $add_sign): void
    {
        $this->add_sign = $add_sign;
    }

    /**
     * @param Mail $mail_ids
     */
    public function setMailIds(Mail $mail_ids): void
    {
        $this->mail_ids = $mail_ids;
    }

    /**
     * @param Shortcode $canned_response_ids
     */
    public function setCannedResponseIds(Shortcode $canned_response_ids): void
    {
        $this->canned_response_ids = $canned_response_ids;
    }

    /**
     * @return string
     */
    public function getSnailmailStatus(): string
    {
        return $this->snailmail_status;
    }

    /**
     * @param MailServer $mail_server_id
     */
    public function setMailServerId(MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param Letter $letter_ids
     */
    public function setLetterIds(Letter $letter_ids): void
    {
        $this->letter_ids = $letter_ids;
    }

    /**
     * @param null|array $message_type
     */
    public function setMessageType(?array $message_type): void
    {
        $this->message_type = $message_type;
    }

    /**
     * @param ?array $message_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageType(?array $message_type, bool $strict = true): bool
    {
        if (null === $this->message_type) {
            return false;
        }

        return in_array($message_type, $this->message_type, $strict);
    }

    /**
     * @param ?array $message_type
     */
    public function addMessageType(?array $message_type): void
    {
        if ($this->hasMessageType($message_type)) {
            return;
        }

        if (null === $this->message_type) {
            $this->message_type = [];
        }

        $this->message_type[] = $message_type;
    }

    /**
     * @param ?array $message_type
     */
    public function removeMessageType(?array $message_type): void
    {
        if ($this->hasMessageType($message_type)) {
            $index = array_search($message_type, $this->message_type);
            unset($this->message_type[$index]);
        }
    }

    /**
     * @return bool
     */
    public function isHasSmsError(): bool
    {
        return $this->has_sms_error;
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
     * @param array $moderation_status
     */
    public function setModerationStatus(array $moderation_status): void
    {
        $this->moderation_status = $moderation_status;
    }

    /**
     * @param string $reply_to
     */
    public function setReplyTo(string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $email_from
     */
    public function setEmailFrom(string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param MessageAlias $parent_id
     */
    public function setParentId(MessageAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param MessageAlias $child_ids
     */
    public function setChildIds(MessageAlias $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string $record_name
     */
    public function setRecordName(string $record_name): void
    {
        $this->record_name = $record_name;
    }

    /**
     * @param Subtype $subtype_id
     */
    public function setSubtypeId(Subtype $subtype_id): void
    {
        $this->subtype_id = $subtype_id;
    }

    /**
     * @param Type $mail_activity_type_id
     */
    public function setMailActivityTypeId(Type $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
    }

    /**
     * @param Partner $author_id
     */
    public function setAuthorId(Partner $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->message_id;
    }

    /**
     * @param int $author_avatar
     */
    public function setAuthorAvatar(int $author_avatar): void
    {
        $this->author_avatar = $author_avatar;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Partner $notified_partner_ids
     */
    public function setNotifiedPartnerIds(Partner $notified_partner_ids): void
    {
        $this->notified_partner_ids = $notified_partner_ids;
    }

    /**
     * @return bool
     */
    public function isNeedaction(): bool
    {
        return $this->needaction;
    }

    /**
     * @return bool
     */
    public function isHasError(): bool
    {
        return $this->has_error;
    }

    /**
     * @param Channel $channel_ids
     */
    public function setChannelIds(Channel $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param Notification $notification_ids
     */
    public function setNotificationIds(Notification $notification_ids): void
    {
        $this->notification_ids = $notification_ids;
    }

    /**
     * @param Partner $starred_partner_ids
     */
    public function setStarredPartnerIds(Partner $starred_partner_ids): void
    {
        $this->starred_partner_ids = $starred_partner_ids;
    }

    /**
     * @return bool
     */
    public function isStarred(): bool
    {
        return $this->starred;
    }

    /**
     * @param bool $no_auto_thread
     */
    public function setNoAutoThread(bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
