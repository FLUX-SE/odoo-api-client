<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.notification
 * ---
 * Name : mail.notification
 * ---
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $mail_message_id;

    /**
     * Mail
     * ---
     * Optional mail_mail ID. Used mainly to optimize searches.
     * ---
     * Relation : many2one (mail.mail)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Mail
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_id;

    /**
     * Recipient
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $res_partner_id;

    /**
     * Status
     * ---
     * Selection :
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
     * Is Read
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_read;

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
     * Failure reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $failure_reason;

    /**
     * SMS
     * ---
     * Relation : many2one (sms.sms)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Sms\Sms
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
     * Notification Type
     * ---
     * Selection :
     *     -> inbox (Inbox)
     *     -> email (Email)
     *     -> sms (SMS)
     *     -> snail (Snailmail)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $notification_type;

    /**
     * Snailmail Letter
     * ---
     * Relation : many2one (snailmail.letter)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Snailmail\Letter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $letter_id;

    /**
     * Failure type
     * ---
     * Selection :
     *     -> SMTP (Connection failed (outgoing mail server problem))
     *     -> RECIPIENT (Invalid email address)
     *     -> BOUNCE (Email address rejected by destination)
     *     -> UNKNOWN (Unknown error)
     *     -> sms_number_missing (Missing Number)
     *     -> sms_number_format (Wrong Number Format)
     *     -> sms_credit (Insufficient Credit)
     *     -> sms_server (Server Error)
     *     -> sms_acc (Unregistered Account)
     *     -> sn_credit (Snailmail Credit Error)
     *     -> sn_trial (Snailmail Trial Error)
     *     -> sn_price (Snailmail No Price Available)
     *     -> sn_fields (Snailmail Missing Required Fields)
     *     -> sn_format (Snailmail Format Error)
     *     -> sn_error (Snailmail Unknown Error)
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
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $notification_type Notification Type
     *        ---
     *        Selection :
     *            -> inbox (Inbox)
     *            -> email (Email)
     *            -> sms (SMS)
     *            -> snail (Snailmail)
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
     * @param string|null $failure_reason
     */
    public function setFailureReason(?string $failure_reason): void
    {
        $this->failure_reason = $failure_reason;
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
     *
     * @SerializedName("failure_type")
     */
    public function getFailureType(): ?string
    {
        return $this->failure_type;
    }

    /**
     * @param OdooRelation|null $letter_id
     */
    public function setLetterId(?OdooRelation $letter_id): void
    {
        $this->letter_id = $letter_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("letter_id")
     */
    public function getLetterId(): ?OdooRelation
    {
        return $this->letter_id;
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
     *
     * @SerializedName("notification_type")
     */
    public function getNotificationType(): string
    {
        return $this->notification_type;
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
     *
     * @SerializedName("sms_number")
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
     *
     * @SerializedName("sms_id")
     */
    public function getSmsId(): ?OdooRelation
    {
        return $this->sms_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("failure_reason")
     */
    public function getFailureReason(): ?string
    {
        return $this->failure_reason;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("mail_message_id")
     */
    public function getMailMessageId(): OdooRelation
    {
        return $this->mail_message_id;
    }

    /**
     * @param DateTimeInterface|null $read_date
     */
    public function setReadDate(?DateTimeInterface $read_date): void
    {
        $this->read_date = $read_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("read_date")
     */
    public function getReadDate(): ?DateTimeInterface
    {
        return $this->read_date;
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
     *
     * @SerializedName("is_read")
     */
    public function isIsRead(): ?bool
    {
        return $this->is_read;
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
     *
     * @SerializedName("notification_status")
     */
    public function getNotificationStatus(): ?string
    {
        return $this->notification_status;
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
     *
     * @SerializedName("res_partner_id")
     */
    public function getResPartnerId(): ?OdooRelation
    {
        return $this->res_partner_id;
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
     *
     * @SerializedName("mail_id")
     */
    public function getMailId(): ?OdooRelation
    {
        return $this->mail_id;
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
