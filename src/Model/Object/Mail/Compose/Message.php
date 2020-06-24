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
 *
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
     * @var string
     */
    protected $subject;

    /**
     * Contents
     *
     * @var string
     */
    protected $body;

    /**
     * Parent Message
     *
     * @var MessageAlias
     */
    protected $parent_id;

    /**
     * Attachments
     *
     * @var Attachment
     */
    protected $attachment_ids;

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
     * Type
     *
     * @var null|array
     */
    protected $message_type;

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
     * Composition mode
     *
     * @var array
     */
    protected $composition_mode;

    /**
     * Reply-To
     *
     * @var string
     */
    protected $reply_to;

    /**
     * No threading for answers
     *
     * @var bool
     */
    protected $no_auto_thread;

    /**
     * Log an Internal Note
     *
     * @var bool
     */
    protected $is_log;

    /**
     * Additional Contacts
     *
     * @var Partner
     */
    protected $partner_ids;

    /**
     * Use active domain
     *
     * @var bool
     */
    protected $use_active_domain;

    /**
     * Active domain
     *
     * @var string
     */
    protected $active_domain;

    /**
     * Notify followers
     *
     * @var bool
     */
    protected $notify;

    /**
     * Delete Emails
     *
     * @var bool
     */
    protected $auto_delete;

    /**
     * Delete Message Copy
     *
     * @var bool
     */
    protected $auto_delete_message;

    /**
     * Use template
     *
     * @var Template
     */
    protected $template_id;

    /**
     * Outgoing mail server
     *
     * @var MailServer
     */
    protected $mail_server_id;

    /**
     * Layout
     *
     * @var string
     */
    protected $layout;

    /**
     * Add Sign
     *
     * @var bool
     */
    protected $add_sign;

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
     * @param bool $auto_delete_message
     */
    public function setAutoDeleteMessage(bool $auto_delete_message): void
    {
        $this->auto_delete_message = $auto_delete_message;
    }

    /**
     * @param bool $is_log
     */
    public function setIsLog(bool $is_log): void
    {
        $this->is_log = $is_log;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param bool $use_active_domain
     */
    public function setUseActiveDomain(bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return string
     */
    public function getActiveDomain(): string
    {
        return $this->active_domain;
    }

    /**
     * @param bool $notify
     */
    public function setNotify(bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * @param bool $auto_delete
     */
    public function setAutoDelete(bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @param Template $template_id
     */
    public function setTemplateId(Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param string $reply_to
     */
    public function setReplyTo(string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param MailServer $mail_server_id
     */
    public function setMailServerId(MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @param bool $add_sign
     */
    public function setAddSign(bool $add_sign): void
    {
        $this->add_sign = $add_sign;
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
     * @param bool $no_auto_thread
     */
    public function setNoAutoThread(bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @param array $composition_mode
     */
    public function removeCompositionMode(array $composition_mode): void
    {
        if ($this->hasCompositionMode($composition_mode)) {
            $index = array_search($composition_mode, $this->composition_mode);
            unset($this->composition_mode[$index]);
        }
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param string $record_name
     */
    public function setRecordName(string $record_name): void
    {
        $this->record_name = $record_name;
    }

    /**
     * @param MessageAlias $parent_id
     */
    public function setParentId(MessageAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param string $email_from
     */
    public function setEmailFrom(string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param Partner $author_id
     */
    public function setAuthorId(Partner $author_id): void
    {
        $this->author_id = $author_id;
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
     * @param null|array $message_type
     */
    public function setMessageType(?array $message_type): void
    {
        $this->message_type = $message_type;
    }

    /**
     * @param array $composition_mode
     */
    public function addCompositionMode(array $composition_mode): void
    {
        if ($this->hasCompositionMode($composition_mode)) {
            return;
        }

        $this->composition_mode[] = $composition_mode;
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
     * @param array $composition_mode
     */
    public function setCompositionMode(array $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @param array $composition_mode
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompositionMode(array $composition_mode, bool $strict = true): bool
    {
        return in_array($composition_mode, $this->composition_mode, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
