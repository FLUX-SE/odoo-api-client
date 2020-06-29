<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Report;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\MailServer;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.template
 * Name : mail.template
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Template extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Applies to
     * The type of document this template can be used with
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Related Document Model
     *
     * @var null|string
     */
    private $model;

    /**
     * Language
     * Optional translation language (ISO code) to select when sending out an email. If not set, the english version
     * will be used. This should usually be a placeholder expression that provides the appropriate language, e.g.
     * ${object.partner_id.lang}.
     *
     * @var null|string
     */
    private $lang;

    /**
     * Add Signature
     * If checked, the user's signature will be appended to the text version of the message
     *
     * @var null|bool
     */
    private $user_signature;

    /**
     * Subject
     * Subject (placeholders may be used here)
     *
     * @var null|string
     */
    private $subject;

    /**
     * From
     * Sender address (placeholders may be used here). If not set, the default value will be the author's email alias
     * if configured, or email address.
     *
     * @var null|string
     */
    private $email_from;

    /**
     * Default recipients
     * Default recipients of the record:
     * - partner (using id on a partner or the partner_id field) OR
     * - email (using email_from or email field)
     *
     * @var null|bool
     */
    private $use_default_to;

    /**
     * To (Emails)
     * Comma-separated recipient addresses (placeholders may be used here)
     *
     * @var null|string
     */
    private $email_to;

    /**
     * To (Partners)
     * Comma-separated ids of recipient partners (placeholders may be used here)
     *
     * @var null|string
     */
    private $partner_to;

    /**
     * Cc
     * Carbon copy recipients (placeholders may be used here)
     *
     * @var null|string
     */
    private $email_cc;

    /**
     * Reply-To
     * Preferred response address (placeholders may be used here)
     *
     * @var null|string
     */
    private $reply_to;

    /**
     * Outgoing Mail Server
     * Optional preferred server for outgoing mails. If not set, the highest priority one will be used.
     *
     * @var null|MailServer
     */
    private $mail_server_id;

    /**
     * Body
     *
     * @var null|string
     */
    private $body_html;

    /**
     * Report Filename
     * Name to use for the generated report file (may contain placeholders)
     * The extension can be omitted and will then come from the report type.
     *
     * @var null|string
     */
    private $report_name;

    /**
     * Optional report to print and attach
     *
     * @var null|Report
     */
    private $report_template;

    /**
     * Sidebar action
     * Sidebar action to make this template available on records of the related document model
     *
     * @var null|ActWindow
     */
    private $ref_ir_act_window;

    /**
     * Attachments
     * You may attach files to this template, to be added to all emails created from this template
     *
     * @var null|Attachment[]
     */
    private $attachment_ids;

    /**
     * Auto Delete
     * Permanently delete this email after sending it, to save space
     *
     * @var null|bool
     */
    private $auto_delete;

    /**
     * Field
     * Select target field from the related document model.
     * If it is a relationship field you will be able to select a target field at the destination of the
     * relationship.
     *
     * @var null|Fields
     */
    private $model_object_field;

    /**
     * Sub-model
     * When a relationship field is selected as first field, this field shows the document model the relationship
     * goes to.
     *
     * @var null|Model
     */
    private $sub_object;

    /**
     * Sub-field
     * When a relationship field is selected as first field, this field lets you select the target field within the
     * destination document model (sub-model).
     *
     * @var null|Fields
     */
    private $sub_model_object_field;

    /**
     * Default Value
     * Optional value to use if the target field is empty
     *
     * @var null|string
     */
    private $null_value;

    /**
     * Placeholder Expression
     * Final placeholder expression, to be copy-pasted in the desired template field.
     *
     * @var null|string
     */
    private $copyvalue;

    /**
     * Scheduled Date
     * If set, the queue manager will send the email after the date. If not set, the email will be send as soon as
     * possible. Jinja2 placeholders may be used.
     *
     * @var null|string
     */
    private $scheduled_date;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Attachment[] $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
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
     * @param null|string $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @param null|string $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param null|string $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param null|Fields $sub_model_object_field
     */
    public function setSubModelObjectField(?Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @return null|Model
     */
    public function getSubObject(): ?Model
    {
        return $this->sub_object;
    }

    /**
     * @param null|Fields $model_object_field
     */
    public function setModelObjectField(?Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param null|bool $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
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
     * @return null|ActWindow
     */
    public function getRefIrActWindow(): ?ActWindow
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @param null|Model $model_id
     */
    public function setModelId(?Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param null|Report $report_template
     */
    public function setReportTemplate(?Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @param null|string $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param null|string $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
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
     * @param null|string $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param null|string $partner_to
     */
    public function setPartnerTo(?string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @param null|string $email_to
     */
    public function setEmailTo(?string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param null|bool $use_default_to
     */
    public function setUseDefaultTo(?bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
    }

    /**
     * @param null|string $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param null|string $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param null|bool $user_signature
     */
    public function setUserSignature(?bool $user_signature): void
    {
        $this->user_signature = $user_signature;
    }

    /**
     * @param null|string $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return null|string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
