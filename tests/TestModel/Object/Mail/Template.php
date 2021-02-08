<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.template
 * ---
 * Name : mail.template
 * ---
 * Info :
 * Templates for sending email
 */
final class Template extends Base
{
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Model
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
     * Body
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $body_html;

    /**
     * Attachments
     * ---
     * You may attach files to this template, to be added to all emails created from this template
     * ---
     * Relation : many2many (ir.attachment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attachment_ids;

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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Actions\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_template;

    /**
     * Outgoing Mail Server
     * ---
     * Optional preferred server for outgoing mails. If not set, the highest priority one will be used.
     * ---
     * Relation : many2one (ir.mail_server)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\MailServer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_server_id;

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
     * Auto Delete
     * ---
     * This option permanently removes any track of email after it's been sent, including from the Technical menu in
     * the Settings, in order to preserve storage space of your Odoo database.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_delete;

    /**
     * Sidebar action
     * ---
     * Sidebar action to make this template available on records of the related document model
     * ---
     * Relation : many2one (ir.actions.act_window)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Actions\ActWindow
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $ref_ir_act_window;

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
     * Field
     * ---
     * Select target field from the related document model.
     * If it is a relationship field you will be able to select a target field at the destination of the
     * relationship.
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Model\Fields
     * ---
     * Searchable : no
     * Sortable : no
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Model
     * ---
     * Searchable : no
     * Sortable : no
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Model\Fields
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $sub_model_object_field;

    /**
     * Default Value
     * ---
     * Optional value to use if the target field is empty
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $null_value;

    /**
     * Placeholder Expression
     * ---
     * Final placeholder expression, to be copy-pasted in the desired template field.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $copyvalue;

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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sub_model_object_field")
     */
    public function getSubModelObjectField(): ?OdooRelation
    {
        return $this->sub_model_object_field;
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
     * @param string|null $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("ref_ir_act_window")
     */
    public function getRefIrActWindow(): ?OdooRelation
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @param OdooRelation|null $ref_ir_act_window
     */
    public function setRefIrActWindow(?OdooRelation $ref_ir_act_window): void
    {
        $this->ref_ir_act_window = $ref_ir_act_window;
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
     * @return OdooRelation|null
     *
     * @SerializedName("model_object_field")
     */
    public function getModelObjectField(): ?OdooRelation
    {
        return $this->model_object_field;
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
     *
     * @SerializedName("sub_object")
     */
    public function getSubObject(): ?OdooRelation
    {
        return $this->sub_object;
    }

    /**
     * @param OdooRelation|null $sub_object
     */
    public function setSubObject(?OdooRelation $sub_object): void
    {
        $this->sub_object = $sub_object;
    }

    /**
     * @param OdooRelation|null $sub_model_object_field
     */
    public function setSubModelObjectField(?OdooRelation $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
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
     * @return string|null
     *
     * @SerializedName("null_value")
     */
    public function getNullValue(): ?string
    {
        return $this->null_value;
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
     *
     * @SerializedName("copyvalue")
     */
    public function getCopyvalue(): ?string
    {
        return $this->copyvalue;
    }

    /**
     * @param string|null $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
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
     * @param OdooRelation|null $mail_server_id
     */
    public function setMailServerId(?OdooRelation $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param OdooRelation|null $report_template
     */
    public function setReportTemplate(?OdooRelation $report_template): void
    {
        $this->report_template = $report_template;
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
     *
     * @SerializedName("partner_to")
     */
    public function getPartnerTo(): ?string
    {
        return $this->partner_to;
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
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
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
     * @return bool|null
     *
     * @SerializedName("use_default_to")
     */
    public function isUseDefaultTo(): ?bool
    {
        return $this->use_default_to;
    }

    /**
     * @param bool|null $use_default_to
     */
    public function setUseDefaultTo(?bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
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
     * @param string|null $partner_to
     */
    public function setPartnerTo(?string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_template")
     */
    public function getReportTemplate(): ?OdooRelation
    {
        return $this->report_template;
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
     * @param string|null $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
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
     * @return string|null
     *
     * @SerializedName("report_name")
     */
    public function getReportName(): ?string
    {
        return $this->report_name;
    }

    /**
     * @param string|null $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.template';
    }
}
