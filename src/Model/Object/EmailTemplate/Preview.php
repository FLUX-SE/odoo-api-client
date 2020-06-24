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
 *
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
     * @var array
     */
    private $res_id;

    /**
     * Recipients
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Attachments
     *
     * @var Attachment
     */
    private $attachment_ids;

    /**
     * Template Preview Language
     *
     * @var array
     */
    private $preview_lang;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Applies to
     *
     * @var Model
     */
    private $model_id;

    /**
     * Related Document Model
     *
     * @var string
     */
    private $model;

    /**
     * Language
     *
     * @var string
     */
    private $lang;

    /**
     * Add Signature
     *
     * @var bool
     */
    private $user_signature;

    /**
     * Subject
     *
     * @var string
     */
    private $subject;

    /**
     * From
     *
     * @var string
     */
    private $email_from;

    /**
     * Default recipients
     *
     * @var bool
     */
    private $use_default_to;

    /**
     * To (Emails)
     *
     * @var string
     */
    private $email_to;

    /**
     * To (Partners)
     *
     * @var string
     */
    private $partner_to;

    /**
     * Cc
     *
     * @var string
     */
    private $email_cc;

    /**
     * Reply-To
     *
     * @var string
     */
    private $reply_to;

    /**
     * Outgoing Mail Server
     *
     * @var MailServer
     */
    private $mail_server_id;

    /**
     * Body
     *
     * @var string
     */
    private $body_html;

    /**
     * Report Filename
     *
     * @var string
     */
    private $report_name;

    /**
     * Optional report to print and attach
     *
     * @var Report
     */
    private $report_template;

    /**
     * Sidebar action
     *
     * @var ActWindow
     */
    private $ref_ir_act_window;

    /**
     * Auto Delete
     *
     * @var bool
     */
    private $auto_delete;

    /**
     * Field
     *
     * @var Fields
     */
    private $model_object_field;

    /**
     * Sub-model
     *
     * @var Model
     */
    private $sub_object;

    /**
     * Sub-field
     *
     * @var Fields
     */
    private $sub_model_object_field;

    /**
     * Default Value
     *
     * @var string
     */
    private $null_value;

    /**
     * Placeholder Expression
     *
     * @var string
     */
    private $copyvalue;

    /**
     * Scheduled Date
     *
     * @var string
     */
    private $scheduled_date;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param array $res_id
     */
    public function setResId(array $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param Fields $model_object_field
     */
    public function setModelObjectField(Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param MailServer $mail_server_id
     */
    public function setMailServerId(MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param string $body_html
     */
    public function setBodyHtml(string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param Report $report_template
     */
    public function setReportTemplate(Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return ActWindow
     */
    public function getRefIrActWindow(): ActWindow
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @param bool $auto_delete
     */
    public function setAutoDelete(bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @return Model
     */
    public function getSubObject(): Model
    {
        return $this->sub_object;
    }

    /**
     * @param string $email_cc
     */
    public function setEmailCc(string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param Fields $sub_model_object_field
     */
    public function setSubModelObjectField(Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @param string $null_value
     */
    public function setNullValue(string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param string $copyvalue
     */
    public function setCopyvalue(string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param string $scheduled_date
     */
    public function setScheduledDate(string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
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
     * @param string $reply_to
     */
    public function setReplyTo(string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param string $partner_to
     */
    public function setPartnerTo(string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @param array $res_id
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResId(array $res_id, bool $strict = true): bool
    {
        return in_array($res_id, $this->res_id, $strict);
    }

    /**
     * @param array $preview_lang
     */
    public function removePreviewLang(array $preview_lang): void
    {
        if ($this->hasPreviewLang($preview_lang)) {
            $index = array_search($preview_lang, $this->preview_lang);
            unset($this->preview_lang[$index]);
        }
    }

    /**
     * @param array $res_id
     */
    public function addResId(array $res_id): void
    {
        if ($this->hasResId($res_id)) {
            return;
        }

        $this->res_id[] = $res_id;
    }

    /**
     * @param array $res_id
     */
    public function removeResId(array $res_id): void
    {
        if ($this->hasResId($res_id)) {
            $index = array_search($res_id, $this->res_id);
            unset($this->res_id[$index]);
        }
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param array $preview_lang
     */
    public function setPreviewLang(array $preview_lang): void
    {
        $this->preview_lang = $preview_lang;
    }

    /**
     * @param array $preview_lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPreviewLang(array $preview_lang, bool $strict = true): bool
    {
        return in_array($preview_lang, $this->preview_lang, $strict);
    }

    /**
     * @param array $preview_lang
     */
    public function addPreviewLang(array $preview_lang): void
    {
        if ($this->hasPreviewLang($preview_lang)) {
            return;
        }

        $this->preview_lang[] = $preview_lang;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email_to
     */
    public function setEmailTo(string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param bool $user_signature
     */
    public function setUserSignature(bool $user_signature): void
    {
        $this->user_signature = $user_signature;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param string $email_from
     */
    public function setEmailFrom(string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param bool $use_default_to
     */
    public function setUseDefaultTo(bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
