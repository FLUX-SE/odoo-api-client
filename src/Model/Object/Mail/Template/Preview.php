<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Template;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.template.preview
 * ---
 * Name : mail.template.preview
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Preview extends Base
{
    /**
     * Related Mail Template
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $mail_template_id;

    /**
     * Targeted model
     * ---
     * The type of document this template can be used with
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Record
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $resource_ref;

    /**
     * Template Preview Language
     * ---
     * Selection :
     *     -> en_GB (English (UK))
     *     -> en_US (English (US))
     *     -> fr_FR (French / Français)
     *     -> de_DE (German / Deutsch)
     *     -> ja_JP (Japanese / 日本語)
     *     -> es_ES (Spanish / Español)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lang;

    /**
     * No Record
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $no_record;

    /**
     * Error Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $error_msg;

    /**
     * Subject
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $subject;

    /**
     * From
     * ---
     * Sender address
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $email_from;

    /**
     * To
     * ---
     * Comma-separated recipient addresses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $email_to;

    /**
     * Cc
     * ---
     * Carbon copy recipients
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $email_cc;

    /**
     * Reply-To
     * ---
     * Preferred response address
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $reply_to;

    /**
     * Scheduled Date
     * ---
     * The queue manager will send the email after the date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $scheduled_date;

    /**
     * Body
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $body_html;

    /**
     * Attachment
     * ---
     * Relation : many2many (ir.attachment)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attachment_ids;

    /**
     * Recipients
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

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
     * @param OdooRelation $mail_template_id Related Mail Template
     *        ---
     *        Relation : many2one (mail.template)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $mail_template_id)
    {
        $this->mail_template_id = $mail_template_id;
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
     * @param string|null $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
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
     * @param string|null $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
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
     * @return string|null
     *
     * @SerializedName("body_html")
     */
    public function getBodyHtml(): ?string
    {
        return $this->body_html;
    }

    /**
     * @return string|null
     *
     * @SerializedName("scheduled_date")
     */
    public function getScheduledDate(): ?string
    {
        return $this->scheduled_date;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("mail_template_id")
     */
    public function getMailTemplateId(): OdooRelation
    {
        return $this->mail_template_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("error_msg")
     */
    public function getErrorMsg(): ?string
    {
        return $this->error_msg;
    }

    /**
     * @param OdooRelation $mail_template_id
     */
    public function setMailTemplateId(OdooRelation $mail_template_id): void
    {
        $this->mail_template_id = $mail_template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("resource_ref")
     */
    public function getResourceRef()
    {
        return $this->resource_ref;
    }

    /**
     * @param mixed|null $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("lang")
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("no_record")
     */
    public function isNoRecord(): ?bool
    {
        return $this->no_record;
    }

    /**
     * @param bool|null $no_record
     */
    public function setNoRecord(?bool $no_record): void
    {
        $this->no_record = $no_record;
    }

    /**
     * @param string|null $error_msg
     */
    public function setErrorMsg(?string $error_msg): void
    {
        $this->error_msg = $error_msg;
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
     * @SerializedName("subject")
     */
    public function getSubject(): ?string
    {
        return $this->subject;
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
     * @SerializedName("email_from")
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
     * @return string|null
     *
     * @SerializedName("email_to")
     */
    public function getEmailTo(): ?string
    {
        return $this->email_to;
    }

    /**
     * @param string|null $email_to
     */
    public function setEmailTo(?string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_cc")
     */
    public function getEmailCc(): ?string
    {
        return $this->email_cc;
    }

    /**
     * @param string|null $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.template.preview';
    }
}
