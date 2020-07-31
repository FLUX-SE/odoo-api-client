<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms\Resend;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sms.resend.recipient
 * ---
 * Name : sms.resend.recipient
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Recipient extends Base
{
    /**
     * Sms Resend
     * ---
     * Relation : many2one (sms.resend)
     * @see \Flux\OdooApiClient\Model\Object\Sms\Resend
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sms_resend_id;

    /**
     * Notification
     * ---
     * Relation : many2one (mail.notification)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Notification
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $notification_id;

    /**
     * Resend
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $resend;

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
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $failure_type;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Recipient
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_name;

    /**
     * Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sms_number;

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
     * @param OdooRelation $sms_resend_id Sms Resend
     *        ---
     *        Relation : many2one (sms.resend)
     *        @see \Flux\OdooApiClient\Model\Object\Sms\Resend
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $notification_id Notification
     *        ---
     *        Relation : many2one (mail.notification)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Notification
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $sms_resend_id, OdooRelation $notification_id)
    {
        $this->sms_resend_id = $sms_resend_id;
        $this->notification_id = $notification_id;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $sms_number
     */
    public function setSmsNumber(?string $sms_number): void
    {
        $this->sms_number = $sms_number;
    }

    /**
     * @param string|null $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sms_resend_id")
     */
    public function getSmsResendId(): OdooRelation
    {
        return $this->sms_resend_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_name")
     */
    public function getPartnerName(): ?string
    {
        return $this->partner_name;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
     * @param bool|null $resend
     */
    public function setResend(?bool $resend): void
    {
        $this->resend = $resend;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("resend")
     */
    public function isResend(): ?bool
    {
        return $this->resend;
    }

    /**
     * @param OdooRelation $notification_id
     */
    public function setNotificationId(OdooRelation $notification_id): void
    {
        $this->notification_id = $notification_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("notification_id")
     */
    public function getNotificationId(): OdooRelation
    {
        return $this->notification_id;
    }

    /**
     * @param OdooRelation $sms_resend_id
     */
    public function setSmsResendId(OdooRelation $sms_resend_id): void
    {
        $this->sms_resend_id = $sms_resend_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.resend.recipient';
    }
}
