<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Compose;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\MailServer;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Message as MessageAlias;
use Flux\OdooApiClient\Model\Object\Mail\Message\Subtype;
use Flux\OdooApiClient\Model\Object\Mail\Template;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.compose.message
 * Name : mail.compose.message
 * Info :
 * Generic message composition wizard. You may inherit from this wizard
 * at model and view levels to provide specific features.
 *
 * The behavior of the wizard depends on the composition_mode field:
 * - 'comment': post on a record. The wizard is pre-populated via ``get_record_data``
 * - 'mass_mail': wizard in mass mailing mode where the mail details can
 * contain template placeholders that will be merged with actual data
 * before being sent to each recipient.
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
     * Contents
     *
     * @var null|string
     */
    protected $body;

    /**
     * Parent Message
     * Initial thread message.
     *
     * @var null|MessageAlias
     */
    protected $parent_id;

    /**
     * Attachments
     *
     * @var null|Attachment[]
     */
    protected $attachment_ids;

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
     * Type
     * Message type: email for email message, notification for system message, comment for other messages such as
     * user replies
     *
     * @var array
     */
    protected $message_type;

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
     * Composition mode
     *
     * @var null|array
     */
    protected $composition_mode;

    /**
     * Reply-To
     * Reply email address. Setting the reply_to bypasses the automatic thread creation.
     *
     * @var null|string
     */
    protected $reply_to;

    /**
     * No threading for answers
     * Answers do not go in the original document discussion thread. This has an impact on the generated message-id.
     *
     * @var null|bool
     */
    protected $no_auto_thread;

    /**
     * Log an Internal Note
     * Whether the message is an internal note (comment mode only)
     *
     * @var null|bool
     */
    protected $is_log;

    /**
     * Additional Contacts
     *
     * @var null|Partner[]
     */
    protected $partner_ids;

    /**
     * Use active domain
     *
     * @var null|bool
     */
    protected $use_active_domain;

    /**
     * Active domain
     *
     * @var null|string
     */
    protected $active_domain;

    /**
     * Notify followers
     * Notify followers of the document (mass post only)
     *
     * @var null|bool
     */
    protected $notify;

    /**
     * Delete Emails
     * Delete sent emails (mass mailing only)
     *
     * @var null|bool
     */
    protected $auto_delete;

    /**
     * Delete Message Copy
     * Do not keep a copy of the email in the document communication history (mass mailing only)
     *
     * @var null|bool
     */
    protected $auto_delete_message;

    /**
     * Use template
     *
     * @var null|Template
     */
    protected $template_id;

    /**
     * Outgoing mail server
     *
     * @var null|MailServer
     */
    protected $mail_server_id;

    /**
     * Layout
     *
     * @var null|string
     */
    protected $layout;

    /**
     * Add Sign
     *
     * @var null|bool
     */
    protected $add_sign;

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
     * @param null|bool $notify
     */
    public function setNotify(?bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * @param null|bool $no_auto_thread
     */
    public function setNoAutoThread(?bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @param null|bool $is_log
     */
    public function setIsLog(?bool $is_log): void
    {
        $this->is_log = $is_log;
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
     * @param null|bool $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return null|string
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @param null|bool $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @param mixed $item
     */
    public function removeCompositionMode($item): void
    {
        if (null === $this->composition_mode) {
            $this->composition_mode = [];
        }

        if ($this->hasCompositionMode($item)) {
            $index = array_search($item, $this->composition_mode);
            unset($this->composition_mode[$index]);
        }
    }

    /**
     * @param null|bool $auto_delete_message
     */
    public function setAutoDeleteMessage(?bool $auto_delete_message): void
    {
        $this->auto_delete_message = $auto_delete_message;
    }

    /**
     * @param null|Template $template_id
     */
    public function setTemplateId(?Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param null|MailServer $mail_server_id
     */
    public function setMailServerId(?MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param null|string $layout
     */
    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @param null|bool $add_sign
     */
    public function setAddSign(?bool $add_sign): void
    {
        $this->add_sign = $add_sign;
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
     * @param null|string $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param mixed $item
     */
    public function addCompositionMode($item): void
    {
        if ($this->hasCompositionMode($item)) {
            return;
        }

        if (null === $this->composition_mode) {
            $this->composition_mode = [];
        }

        $this->composition_mode[] = $item;
    }

    /**
     * @param null|string $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|MessageAlias $parent_id
     */
    public function setParentId(?MessageAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|Attachment[] $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
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
     * @param null|string $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param null|Partner $author_id
     */
    public function setAuthorId(?Partner $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompositionMode($item, bool $strict = true): bool
    {
        if (null === $this->composition_mode) {
            return false;
        }

        return in_array($item, $this->composition_mode, $strict);
    }

    /**
     * @param null|string $record_name
     */
    public function setRecordName(?string $record_name): void
    {
        $this->record_name = $record_name;
    }

    /**
     * @param array $message_type
     */
    public function setMessageType(array $message_type): void
    {
        $this->message_type = $message_type;
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
     */
    public function removeMessageType($item): void
    {
        if ($this->hasMessageType($item)) {
            $index = array_search($item, $this->message_type);
            unset($this->message_type[$index]);
        }
    }

    /**
     * @param null|Subtype $subtype_id
     */
    public function setSubtypeId(?Subtype $subtype_id): void
    {
        $this->subtype_id = $subtype_id;
    }

    /**
     * @param null|Type $mail_activity_type_id
     */
    public function setMailActivityTypeId(?Type $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
    }

    /**
     * @param null|array $composition_mode
     */
    public function setCompositionMode(?array $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
