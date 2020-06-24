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
 *
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
     * Attachments
     *
     * @var Attachment
     */
    private $attachment_ids;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Report $report_template
     */
    public function setReportTemplate(Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param string $scheduled_date
     */
    public function setScheduledDate(string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @param string $copyvalue
     */
    public function setCopyvalue(string $copyvalue): void
    {
        $this->copyvalue = $copyvalue;
    }

    /**
     * @param string $null_value
     */
    public function setNullValue(string $null_value): void
    {
        $this->null_value = $null_value;
    }

    /**
     * @param Fields $sub_model_object_field
     */
    public function setSubModelObjectField(Fields $sub_model_object_field): void
    {
        $this->sub_model_object_field = $sub_model_object_field;
    }

    /**
     * @return Model
     */
    public function getSubObject(): Model
    {
        return $this->sub_object;
    }

    /**
     * @param Fields $model_object_field
     */
    public function setModelObjectField(Fields $model_object_field): void
    {
        $this->model_object_field = $model_object_field;
    }

    /**
     * @param bool $auto_delete
     */
    public function setAutoDelete(bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @return ActWindow
     */
    public function getRefIrActWindow(): ActWindow
    {
        return $this->ref_ir_act_window;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param string $body_html
     */
    public function setBodyHtml(string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @param MailServer $mail_server_id
     */
    public function setMailServerId(MailServer $mail_server_id): void
    {
        $this->mail_server_id = $mail_server_id;
    }

    /**
     * @param string $reply_to
     */
    public function setReplyTo(string $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    /**
     * @param string $email_cc
     */
    public function setEmailCc(string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param string $partner_to
     */
    public function setPartnerTo(string $partner_to): void
    {
        $this->partner_to = $partner_to;
    }

    /**
     * @param string $email_to
     */
    public function setEmailTo(string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param bool $use_default_to
     */
    public function setUseDefaultTo(bool $use_default_to): void
    {
        $this->use_default_to = $use_default_to;
    }

    /**
     * @param string $email_from
     */
    public function setEmailFrom(string $email_from): void
    {
        $this->email_from = $email_from;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param bool $user_signature
     */
    public function setUserSignature(bool $user_signature): void
    {
        $this->user_signature = $user_signature;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
