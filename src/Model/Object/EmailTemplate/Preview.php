<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\EmailTemplate;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Report;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\MailServer;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : email_template.preview
 * Name : email_template.preview
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Preview extends Base
{
    /**
     * Sample Document
     *
     * @var null|array
     */
    private $res_id;

    /**
     * Recipients
     *
     * @var null|Partner[]
     */
    private $partner_ids;

    /**
     * Attachments
     * You may attach files to this template, to be added to all emails created from this template
     *
     * @var null|Attachment[]
     */
    private $attachment_ids;

    /**
     * Template Preview Language
     *
     * @var null|array
     */
    private $preview_lang;

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
     * @param null|array $res_id
     */
    public function setResId(?array $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|bool $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @param null|string $partner_to
     */
    public function setPartnerTo(?string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @param null|string $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param null|string $reply_to
     */
    public function setReplyTo(?string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param null|MailServer $mail_server_id
     */
    public function setMailServerId(?MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param null|string $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @param null|string $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param null|Report $report_template
     */
    public function setReportTemplate(?Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return null|ActWindow
     */
    public function getRefIrActWindow(): ?ActWindow
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @param null|Fields $model_object_field
     */
    public function setModelObjectField(?Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param null|bool $use_default_to
     */
    public function setUseDefaultTo(?bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
    }

    /**
     * @return null|Model
     */
    public function getSubObject(): ?Model
    {
        return $this->sub_object;
    }

    /**
     * @param null|Fields $sub_model_object_field
     */
    public function setSubModelObjectField(?Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param null|string $null_value
     */
    public function setNullValue(?string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param null|string $copyvalue
     */
    public function setCopyvalue(?string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param null|string $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
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
     * @param null|string $email_to
     */
    public function setEmailTo(?string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param null|string $email_from
     */
    public function setEmailFrom(?string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResId($item, bool $strict = true): bool
    {
        if (null === $this->res_id) {
            return false;
        }

        return in_array($item, $this->res_id, $strict);
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
     * @param mixed $item
     */
    public function addResId($item): void
    {
        if ($this->hasResId($item)) {
            return;
        }

        if (null === $this->res_id) {
            $this->res_id = [];
        }

        $this->res_id[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeResId($item): void
    {
        if (null === $this->res_id) {
            $this->res_id = [];
        }

        if ($this->hasResId($item)) {
            $index = array_search($item, $this->res_id);
            unset($this->res_id[$index]);
        }
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
     * @param null|string $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param null|array $preview_lang
     */
    public function setPreviewLang(?array $preview_lang): void
    {
        $this->preview_lang = $preview_lang;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPreviewLang($item, bool $strict = true): bool
    {
        if (null === $this->preview_lang) {
            return false;
        }

        return in_array($item, $this->preview_lang, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPreviewLang($item): void
    {
        if ($this->hasPreviewLang($item)) {
            return;
        }

        if (null === $this->preview_lang) {
            $this->preview_lang = [];
        }

        $this->preview_lang[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePreviewLang($item): void
    {
        if (null === $this->preview_lang) {
            $this->preview_lang = [];
        }

        if ($this->hasPreviewLang($item)) {
            $index = array_search($item, $this->preview_lang);
            unset($this->preview_lang[$index]);
        }
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Model $model_id
     */
    public function setModelId(?Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return null|string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param null|string $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param null|bool $user_signature
     */
    public function setUserSignature(?bool $user_signature): void
    {
        $this->user_signature = $user_signature;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
