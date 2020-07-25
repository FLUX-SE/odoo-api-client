<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.notification
 * Name : mail.notification
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Notification extends Base
{
    /**
     * Message
     * ---
     * Relation : many2one (mail.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $mail_message_id;

    /**
     * Needaction Recipient
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $res_partner_id;

    /**
     * Is Read
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_read;

    /**
     * Email Status
     * ---
     * Selection : (default value, usually null)
     *     -> ready (Ready to Send)
     *     -> sent (Sent)
     *     -> bounce (Bounced)
     *     -> exception (Exception)
     *     -> canceled (Canceled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $notification_status;

    /**
     * Mail
     * ---
     * Relation : many2one (mail.mail)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Mail
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_id;

    /**
     * Failure reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $failure_reason;

    /**
     * Read Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $read_date;

    /**
     * Notification Type
     * ---
     * Selection : (default value, usually null)
     *     -> inbox (Inbox)
     *     -> email (Email)
     *     -> sms (SMS)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $notification_type;

    /**
     * SMS
     * ---
     * Relation : many2one (sms.sms)
     * @see \Flux\OdooApiClient\Model\Object\Sms\Sms
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sms_id;

    /**
     * SMS Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sms_number;

    /**
     * Failure type
     * ---
     * Selection : (default value, usually null)
     *     -> SMTP (Connection failed (outgoing mail server problem))
     *     -> RECIPIENT (Invalid email address)
     *     -> BOUNCE (Email address rejected by destination)
     *     -> UNKNOWN (Unknown error)
     *     -> sms_number_missing (Missing Number)
     *     -> sms_number_format (Wrong Number Format)
     *     -> sms_credit (Insufficient Credit)
     *     -> sms_server (Server Error)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $failure_type;

    /**
     * @param OdooRelation $mail_message_id Message
     *        ---
     *        Relation : many2one (mail.message)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Message
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $notification_type Notification Type
     *        ---
     *        Selection : (default value, usually null)
     *            -> inbox (Inbox)
     *            -> email (Email)
     *            -> sms (SMS)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $mail_message_id, string $notification_type)
    {
        $this->mail_message_id = $mail_message_id;
        $this->notification_type = $notification_type;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getReadDate(): ?DateTimeInterface
    {
        return $this->read_date;
    }

    /**
     * @param string|null $failure_type
     */
    public function setFailureType(?string $failure_type): void
    {
        $this->failure_type = $failure_type;
    }

    /**
     * @return string|null
     */
    public function getFailureType(): ?string
    {
        return $this->failure_type;
    }

    /**
     * @param string|null $sms_number
     */
    public function setSmsNumber(?string $sms_number): void
    {
        $this->sms_number = $sms_number;
    }

    /**
     * @return string|null
     */
    public function getSmsNumber(): ?string
    {
        return $this->sms_number;
    }

    /**
     * @param OdooRelation|null $sms_id
     */
    public function setSmsId(?OdooRelation $sms_id): void
    {
        $this->sms_id = $sms_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSmsId(): ?OdooRelation
    {
        return $this->sms_id;
    }

    /**
     * @param string $notification_type
     */
    public function setNotificationType(string $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @return string
     */
    public function getNotificationType(): string
    {
        return $this->notification_type;
    }

    /**
     * @param DateTimeInterface|null $read_date
     */
    public function setReadDate(?DateTimeInterface $read_date): void
    {
        $this->read_date = $read_date;
    }

    /**
     * @param string|null $failure_reason
     */
    public function setFailureReason(?string $failure_reason): void
    {
        $this->failure_reason = $failure_reason;
    }

    /**
     * @return OdooRelation
     */
    public function getMailMessageId(): OdooRelation
    {
        return $this->mail_message_id;
    }

    /**
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failure_reason;
    }

    /**
     * @param OdooRelation|null $mail_id
     */
    public function setMailId(?OdooRelation $mail_id): void
    {
        $this->mail_id = $mail_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMailId(): ?OdooRelation
    {
        return $this->mail_id;
    }

    /**
     * @param string|null $notification_status
     */
    public function setNotificationStatus(?string $notification_status): void
    {
        $this->notification_status = $notification_status;
    }

    /**
     * @return string|null
     */
    public function getNotificationStatus(): ?string
    {
        return $this->notification_status;
    }

    /**
     * @param bool|null $is_read
     */
    public function setIsRead(?bool $is_read): void
    {
        $this->is_read = $is_read;
    }

    /**
     * @return bool|null
     */
    public function isIsRead(): ?bool
    {
        return $this->is_read;
    }

    /**
     * @param OdooRelation|null $res_partner_id
     */
    public function setResPartnerId(?OdooRelation $res_partner_id): void
    {
        $this->res_partner_id = $res_partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getResPartnerId(): ?OdooRelation
    {
        return $this->res_partner_id;
    }

    /**
     * @param OdooRelation $mail_message_id
     */
    public function setMailMessageId(OdooRelation $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.notification';
    }
}
