<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms\Resend;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Notification;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sms\Resend;

/**
 * Odoo model : sms.resend.recipient
 * Name : sms.resend.recipient
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Recipient extends Base
{
    /**
     * Sms Resend
     *
     * @var null|Resend
     */
    private $sms_resend_id;

    /**
     * Notification
     *
     * @var null|Notification
     */
    private $notification_id;

    /**
     * Resend
     *
     * @var bool
     */
    private $resend;

    /**
     * Failure type
     *
     * @var array
     */
    private $failure_type;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Recipient
     *
     * @var string
     */
    private $partner_name;

    /**
     * Number
     *
     * @var string
     */
    private $sms_number;

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
     * @param null|Resend $sms_resend_id
     */
    public function setSmsResendId(Resend $sms_resend_id): void
    {
        $this->sms_resend_id = $sms_resend_id;
    }

    /**
     * @param null|Notification $notification_id
     */
    public function setNotificationId(Notification $notification_id): void
    {
        $this->notification_id = $notification_id;
    }

    /**
     * @param bool $resend
     */
    public function setResend(bool $resend): void
    {
        $this->resend = $resend;
    }

    /**
     * @return array
     */
    public function getFailureType(): array
    {
        return $this->failure_type;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return string
     */
    public function getPartnerName(): string
    {
        return $this->partner_name;
    }

    /**
     * @param string $sms_number
     */
    public function setSmsNumber(string $sms_number): void
    {
        $this->sms_number = $sms_number;
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
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
