<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Compose;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.compose.message
 * ---
 * Name : mail.compose.message
 * ---
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
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $subject;

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
     * Parent Message
     * ---
     * Initial thread message.
     * ---
     * Relation : many2one (mail.message)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $parent_id;

    /**
     * Use template
     * ---
     * Relation : many2one (mail.template)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $template_id;

    /**
     * Attachments
     * ---
     * Relation : many2many (ir.attachment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $attachment_ids;

    /**
     * Layout
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $layout;

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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $author_id;

    /**
     * Composition mode
     * ---
     * Selection :
     *     -> comment (Post on a document)
     *     -> mass_mail (Email Mass Mailing)
     *     -> mass_post (Post on Multiple Documents)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $composition_mode;

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
     * Use active domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $use_active_domain;

    /**
     * Active domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $active_domain;

    /**
     * Type
     * ---
     * Message type: email for email message, notification for system message, comment for other messages such as
     * user replies
     * ---
     * Selection :
     *     -> comment (Comment)
     *     -> notification (System notification)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $message_type;

    /**
     * Subtype
     * ---
     * Relation : many2one (mail.message.subtype)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message\Subtype
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_activity_type_id;

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
     * Log an Internal Note
     * ---
     * Whether the message is an internal note (comment mode only)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $is_log;

    /**
     * Additional Contacts
     * ---
     * Relation : many2many (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $partner_ids;

    /**
     * Notify followers
     * ---
     * Notify followers of the document (mass post only)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $notify;

    /**
     * Delete Emails
     * ---
     * This option permanently removes any track of email after it's been sent, including from the Technical menu in
     * the Settings, in order to preserve storage space of your Odoo database.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $auto_delete;

    /**
     * Delete Message Copy
     * ---
     * Do not keep a copy of the email in the document communication history (mass mailing only)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $auto_delete_message;

    /**
     * Outgoing mail server
     * ---
     * Relation : many2one (ir.mail_server)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\MailServer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $mail_server_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     *            -> comment (Comment)
     *            -> notification (System notification)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("notify")
     */
    public function isNotify(): ?bool
    {
        return $this->notify;
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
     * @SerializedName("mail_activity_type_id")
     */
    public function getMailActivityTypeId(): ?OdooRelation
    {
        return $this->mail_activity_type_id;
    }

    /**
     * @param OdooRelation|null $mail_activity_type_id
     */
    public function setMailActivityTypeId(?OdooRelation $mail_activity_type_id): void
    {
        $this->mail_activity_type_id = $mail_activity_type_id;
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
     * @param string|null $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
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
     * @param bool|null $no_auto_thread
     */
    public function setNoAutoThread(?bool $no_auto_thread): void
    {
        $this->no_auto_thread = $no_auto_thread;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_log")
     */
    public function isIsLog(): ?bool
    {
        return $this->is_log;
    }

    /**
     * @param bool|null $is_log
     */
    public function setIsLog(?bool $is_log): void
    {
        $this->is_log = $is_log;
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
     * @param bool|null $notify
     */
    public function setNotify(?bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * @param string $message_type
     */
    public function setMessageType(string $message_type): void
    {
        $this->message_type = $message_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_delete")
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
     *
     * @SerializedName("auto_delete_message")
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
     * @return OdooRelation|null
     *
     * @SerializedName("mail_server_id")
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
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
     * @return OdooRelation|null
     *
     * @SerializedName("subtype_id")
     */
    public function getSubtypeId(): ?OdooRelation
    {
        return $this->subtype_id;
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
     * @return string|null
     *
     * @SerializedName("subject")
     */
    public function getSubject(): ?string
    {
        return $this->subject;
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
     * @param string|null $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
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
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
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
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
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
     *
     * @SerializedName("layout")
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
     * @param bool|null $add_sign
     */
    public function setAddSign(?bool $add_sign): void
    {
        $this->add_sign = $add_sign;
    }

    /**
     * @param string|null $active_domain
     */
    public function setActiveDomain(?string $active_domain): void
    {
        $this->active_domain = $active_domain;
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
     * @return string|null
     *
     * @SerializedName("active_domain")
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @param bool|null $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_active_domain")
     */
    public function isUseActiveDomain(): ?bool
    {
        return $this->use_active_domain;
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
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
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
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
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
     *
     * @SerializedName("composition_mode")
     */
    public function getCompositionMode(): ?string
    {
        return $this->composition_mode;
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
     * @param string|null $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.compose.message';
    }
}
