<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\EmailTemplate;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : email_template.preview
 * ---
 * Name : email_template.preview
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
     * Sample Document
     * ---
     * Selection : (default value, usually null)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_id;

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
    private $partner_ids;

    /**
     * Attachments
     * ---
     * You may attach files to this template, to be added to all emails created from this template
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
     * Template Preview Language
     * ---
     * Selection : (default value, usually null)
     *     -> en_US (English (US))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $preview_lang;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Applies to
     * ---
     * The type of document this template can be used with
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Related Document Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $model;

    /**
     * Language
     * ---
     * Optional translation language (ISO code) to select when sending out an email. If not set, the english version
     * will be used. This should usually be a placeholder expression that provides the appropriate language, e.g.
     * ${object.partner_id.lang}.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lang;

    /**
     * Add Signature
     * ---
     * If checked, the user's signature will be appended to the text version of the message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $user_signature;

    /**
     * Subject
     * ---
     * Subject (placeholders may be used here)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $subject;

    /**
     * From
     * ---
     * Sender address (placeholders may be used here). If not set, the default value will be the author's email alias
     * if configured, or email address.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_from;

    /**
     * Default recipients
     * ---
     * Default recipients of the record:
     * - partner (using id on a partner or the partner_id field) OR
     * - email (using email_from or email field)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_default_to;

    /**
     * To (Emails)
     * ---
     * Comma-separated recipient addresses (placeholders may be used here)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_to;

    /**
     * To (Partners)
     * ---
     * Comma-separated ids of recipient partners (placeholders may be used here)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_to;

    /**
     * Cc
     * ---
     * Carbon copy recipients (placeholders may be used here)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_cc;

    /**
     * Reply-To
     * ---
     * Preferred response address (placeholders may be used here)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reply_to;

    /**
     * Outgoing Mail Server
     * ---
     * Optional preferred server for outgoing mails. If not set, the highest priority one will be used.
     * ---
     * Relation : many2one (ir.mail_server)
     * @see \Flux\OdooApiClient\Model\Object\Ir\MailServer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_server_id;

    /**
     * Body
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $body_html;

    /**
     * Report Filename
     * ---
     * Name to use for the generated report file (may contain placeholders)
     * The extension can be omitted and will then come from the report type.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $report_name;

    /**
     * Optional report to print and attach
     * ---
     * Relation : many2one (ir.actions.report)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_template;

    /**
     * Sidebar action
     * ---
     * Sidebar action to make this template available on records of the related document model
     * ---
     * Relation : many2one (ir.actions.act_window)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $ref_ir_act_window;

    /**
     * Auto Delete
     * ---
     * Permanently delete this email after sending it, to save space
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_delete;

    /**
     * Field
     * ---
     * Select target field from the related document model.
     * If it is a relationship field you will be able to select a target field at the destination of the
     * relationship.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $model_object_field;

    /**
     * Sub-model
     * ---
     * When a relationship field is selected as first field, this field shows the document model the relationship
     * goes to.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sub_object;

    /**
     * Sub-field
     * ---
     * When a relationship field is selected as first field, this field lets you select the target field within the
     * destination document model (sub-model).
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sub_model_object_field;

    /**
     * Default Value
     * ---
     * Optional value to use if the target field is empty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $null_value;

    /**
     * Placeholder Expression
     * ---
     * Final placeholder expression, to be copy-pasted in the desired template field.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $copyvalue;

    /**
     * Scheduled Date
     * ---
     * If set, the queue manager will send the email after the date. If not set, the email will be send as soon as
     * possible. Jinja2 placeholders may be used.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $scheduled_date;

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
     * @return string|null
     */
    public function getResId(): ?string
    {
        return $this->res_id;
    }

    /**
     * @param OdooRelation|null $report_template
     */
    public function setReportTemplate(?OdooRelation $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @param OdooRelation|null $model_object_field
     */
    public function setModelObjectField(?OdooRelation $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @return OdooRelation|null
     */
    public function getModelObjectField(): ?OdooRelation
    {
        return $this->model_object_field;
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
    public function isAutoDelete(): ?bool
    {
        return $this->auto_delete;
    }

    /**
     * @param OdooRelation|null $ref_ir_act_window
     */
    public function setRefIrActWindow(?OdooRelation $ref_ir_act_window): void
    {
        $this->ref_ir_act_window = $ref_ir_act_window;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRefIrActWindow(): ?OdooRelation
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @return OdooRelation|null
     */
    public function getReportTemplate(): ?OdooRelation
    {
        return $this->report_template;
    }

    /**
     * @param OdooRelation|null $sub_object
     */
    public function setSubObject(?OdooRelation $sub_object): void
    {
        $this->sub_object = $sub_object;
    }

    /**
     * @param string|null $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @return string|null
     */
    public function getReportName(): ?string
    {
        return $this->report_name;
    }

    /**
     * @param string|null $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @return string|null
     */
    public function getBodyHtml(): ?string
    {
        return $this->body_html;
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
     */
    public function getMailServerId(): ?OdooRelation
    {
        return $this->mail_server_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSubObject(): ?OdooRelation
    {
        return $this->sub_object;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSubModelObjectField(): ?OdooRelation
    {
        return $this->sub_model_object_field;
    }

    /**
     * @return string|null
     */
    public function getReplyTo(): ?string
    {
        return $this->reply_to;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $sub_model_object_field
     */
    public function setSubModelObjectField(?OdooRelation $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param string|null $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return string|null
     */
    public function getScheduledDate(): ?string
    {
        return $this->scheduled_date;
    }

    /**
     * @param string|null $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @return string|null
     */
    public function getCopyvalue(): ?string
    {
        return $this->copyvalue;
    }

    /**
     * @param string|null $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @return string|null
     */
    public function getNullValue(): ?string
    {
        return $this->null_value;
    }

    /**
     * @param string|null $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param string|null $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param string|null $res_id
     */
    public function setResId(?string $res_id): void
    {
        $this->res_id = $res_id;
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
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $preview_lang
     */
    public function setPreviewLang(?string $preview_lang): void
    {
        $this->preview_lang = $preview_lang;
    }

    /**
     * @return string|null
     */
    public function getPreviewLang(): ?string
    {
        return $this->preview_lang;
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
     * @param OdooRelation[]|null $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachment_ids;
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
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @return string|null
     */
    public function getEmailCc(): ?string
    {
        return $this->email_cc;
    }

    /**
     * @param string|null $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param string|null $partner_to
     */
    public function setPartnerTo(?string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @return string|null
     */
    public function getPartnerTo(): ?string
    {
        return $this->partner_to;
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
     */
    public function getEmailTo(): ?string
    {
        return $this->email_to;
    }

    /**
     * @param bool|null $use_default_to
     */
    public function setUseDefaultTo(?bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
    }

    /**
     * @return bool|null
     */
    public function isUseDefaultTo(): ?bool
    {
        return $this->use_default_to;
    }

    /**
     * @return string|null
     */
    public function getEmailFrom(): ?string
    {
        return $this->email_from;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
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
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param bool|null $user_signature
     */
    public function setUserSignature(?bool $user_signature): void
    {
        $this->user_signature = $user_signature;
    }

    /**
     * @return bool|null
     */
    public function isUserSignature(): ?bool
    {
        return $this->user_signature;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string|null
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'email_template.preview';
    }
}
