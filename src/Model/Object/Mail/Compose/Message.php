<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Compose;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.compose.message
 * Name : mail.compose.message
 * Info :
 * Generic message composition wizard. You may inherit from this wizard
 *                 at model and view levels to provide specific features.
 *
 *                 The behavior of the wizard depends on the composition_mode field:
 *                 - 'comment': post on a record. The wizard is pre-populated via ``get_record_data``
 *                 - 'mass_mail': wizard in mass mailing mode where the mail details can
 *                         contain template placeholders that will be merged with actual data
 *                         before being sent to each recipient.
 */
class Message extends Base
{
    /**
     * Subject
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $subject;

    /**
     * Contents
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $body;

    /**
     * Parent Message
     * Initial thread message.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $parent_id;

    /**
     * Attachments
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $attachment_ids;

    /**
     * From
     * Email address of the sender. This field is set when no matching partner is found and replaces the author_id
     * field in the chatter.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email_from;

    /**
     * Author
     * Author of the message. If not set, email_from may hold an email address that did not match any partner.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $author_id;

    /**
     * Related Document Model
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $model;

    /**
     * Related Document ID
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $res_id;

    /**
     * Message Record Name
     * Name get of the related document.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $record_name;

    /**
     * Type
     * Message type: email for email message, notification for system message, comment for other messages such as
     * user replies
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> comment (Comment)
     *     -> notification (System notification)
     *
     *
     * @var string
     */
    protected $message_type;

    /**
     * Subtype
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $subtype_id;

    /**
     * Mail Activity Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_activity_type_id;

    /**
     * Composition mode
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> comment (Post on a document)
     *     -> mass_mail (Email Mass Mailing)
     *     -> mass_post (Post on Multiple Documents)
     *
     *
     * @var string|null
     */
    protected $composition_mode;

    /**
     * Reply-To
     * Reply email address. Setting the reply_to bypasses the automatic thread creation.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $reply_to;

    /**
     * No threading for answers
     * Answers do not go in the original document discussion thread. This has an impact on the generated message-id.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $no_auto_thread;

    /**
     * Log an Internal Note
     * Whether the message is an internal note (comment mode only)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $is_log;

    /**
     * Additional Contacts
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $partner_ids;

    /**
     * Use active domain
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $use_active_domain;

    /**
     * Active domain
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $active_domain;

    /**
     * Notify followers
     * Notify followers of the document (mass post only)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $notify;

    /**
     * Delete Emails
     * Delete sent emails (mass mailing only)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $auto_delete;

    /**
     * Delete Message Copy
     * Do not keep a copy of the email in the document communication history (mass mailing only)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $auto_delete_message;

    /**
     * Use template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $template_id;

    /**
     * Outgoing mail server
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_server_id;

    /**
     * Layout
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $layout;

    /**
     * Add Sign
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $add_sign;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param string $message_type Type
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> comment (Comment)
     *            -> notification (System notification)
     *       
     */
    public function __construct(string $message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
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
     * @return bool|null
     */
    public function isUseActiveDomain(): ?bool
    {
        return $this->use_active_domain;
    }

    /**
     * @param bool|null $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return string|null
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @param string|null $active_domain
     */
    public function setActiveDomain(?string $active_domain): void
    {
        $this->active_domain = $active_domain;
    }

    /**
     * @return bool|null
     */
    public function isNotify(): ?bool
    {
        return $this->notify;
    }

    /**
     * @param bool|null $notify
     */
    public function setNotify(?bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * @return bool|null
     */
    public function isAutoDelete(): ?bool
    {
        return $this->auto_delete;
    }

    /**
     * @param bool|null $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @return bool|null
     */
    public function isAutoDeleteMessage(): ?bool
    {
        return $this->auto_delete_message;
    }

    /**
     * @param bool|null $auto_delete_message
     */
    public function setAutoDeleteMessage(?bool $auto_delete_message): void
    {
        $this->auto_delete_message = $auto_delete_message;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param bool|null $is_log
     */
    public function setIsLog(?bool $is_log): void
    {
        $this->is_log = $is_log;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMailServerId(): ?OdooRelation
    {
        return $this->mail_server_id;
    }

    /**
     * @param OdooRelation|null $mail_server_id
     */
    public function setMailServerId(?OdooRelation $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @return string|null
     */
    public function getLayout(): ?string
    {
        return $this->layout;
    }

    /**
     * @param string|null $layout
     */
    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @return bool|null
     */
    public function isAddSign(): ?bool
    {
        return $this->add_sign;
    }

    /**
     * @param bool|null $add_sign
     */
    public function setAddSign(?bool $add_sign): void
    {
        $this->add_sign = $add_sign;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @return bool|null
     */
    public function isIsLog(): ?bool
    {
        return $this->is_log;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return OdooRelation|null
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
    }

    /**
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
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
     * @return string|null
     */
    public function getEmailFrom(): ?string
    {
        return $this->email_from;
    }

    /**
     * @param string|null $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAuthorId(): ?OdooRelation
    {
        return $this->author_id;
    }

    /**
     * @param OdooRelation|null $author_id
     */
    public function setAuthorId(?OdooRelation $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param bool|null $no_auto_thread
     */
    public function setNoAutoThread(?bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMailActivityTypeId(): ?OdooRelation
    {
        return $this->mail_activity_type_id;
    }

    /**
     * @return bool|null
     */
    public function isNoAutoThread(): ?bool
    {
        return $this->no_auto_thread;
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
     */
    public function getReplyTo(): ?string
    {
        return $this->reply_to;
    }

    /**
     * @param string|null $composition_mode
     */
    public function setCompositionMode(?string $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @return string|null
     */
    public function getCompositionMode(): ?string
    {
        return $this->composition_mode;
    }

    /**
     * @param OdooRelation|null $mail_activity_type_id
     */
    public function setMailActivityTypeId(?OdooRelation $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
    }

    /**
     * @param OdooRelation|null $subtype_id
     */
    public function setSubtypeId(?OdooRelation $subtype_id): void
    {
        $this->subtype_id = $subtype_id;
    }

    /**
     * @return int|null
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSubtypeId(): ?OdooRelation
    {
        return $this->subtype_id;
    }

    /**
     * @param string $message_type
     */
    public function setMessageType(string $message_type): void
    {
        $this->message_type = $message_type;
    }

    /**
     * @return string
     */
    public function getMessageType(): string
    {
        return $this->message_type;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.compose.message';
    }
}
