<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Sms\Sms;

/**
 * Odoo model : mail.notification
 * Name : mail.notification
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Notification extends Base
{
    /**
     * Message
     *
     * @var null|Message
     */
    private $mail_message_id;

    /**
     * Needaction Recipient
     *
     * @var Partner
     */
    private $res_partner_id;

    /**
     * Is Read
     *
     * @var bool
     */
    private $is_read;

    /**
     * Email Status
     *
     * @var array
     */
    private $notification_status;

    /**
     * Mail
     *
     * @var Mail
     */
    private $mail_id;

    /**
     * Failure reason
     *
     * @var string
     */
    private $failure_reason;

    /**
     * Read Date
     *
     * @var DateTimeInterface
     */
    private $read_date;

    /**
     * Notification Type
     *
     * @var null|array
     */
    private $notification_type;

    /**
     * SMS
     *
     * @var Sms
     */
    private $sms_id;

    /**
     * SMS Number
     *
     * @var string
     */
    private $sms_number;

    /**
     * Failure type
     *
     * @var array
     */
    private $failure_type;

    /**
     * @param null|Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @param ?array $notification_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationType(?array $notification_type, bool $strict = true): bool
    {
        if (null === $this->notification_type) {
            return false;
        }

        return in_array($notification_type, $this->notification_type, $strict);
    }

    /**
     * @param array $failure_type
     */
    public function addFailureType(array $failure_type): void
    {
        if ($this->hasFailureType($failure_type)) {
            return;
        }

        $this->failure_type[] = $failure_type;
    }

    /**
     * @param array $failure_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFailureType(array $failure_type, bool $strict = true): bool
    {
        return in_array($failure_type, $this->failure_type, $strict);
    }

    /**
     * @param array $failure_type
     */
    public function setFailureType(array $failure_type): void
    {
        $this->failure_type = $failure_type;
    }

    /**
     * @param string $sms_number
     */
    public function setSmsNumber(string $sms_number): void
    {
        $this->sms_number = $sms_number;
    }

    /**
     * @param Sms $sms_id
     */
    public function setSmsId(Sms $sms_id): void
    {
        $this->sms_id = $sms_id;
    }

    /**
     * @param ?array $notification_type
     */
    public function removeNotificationType(?array $notification_type): void
    {
        if ($this->hasNotificationType($notification_type)) {
            $index = array_search($notification_type, $this->notification_type);
            unset($this->notification_type[$index]);
        }
    }

    /**
     * @param ?array $notification_type
     */
    public function addNotificationType(?array $notification_type): void
    {
        if ($this->hasNotificationType($notification_type)) {
            return;
        }

        if (null === $this->notification_type) {
            $this->notification_type = [];
        }

        $this->notification_type[] = $notification_type;
    }

    /**
     * @param null|array $notification_type
     */
    public function setNotificationType(?array $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @param Partner $res_partner_id
     */
    public function setResPartnerId(Partner $res_partner_id): void
    {
        $this->res_partner_id = $res_partner_id;
    }

    /**
     * @param DateTimeInterface $read_date
     */
    public function setReadDate(DateTimeInterface $read_date): void
    {
        $this->read_date = $read_date;
    }

    /**
     * @param string $failure_reason
     */
    public function setFailureReason(string $failure_reason): void
    {
        $this->failure_reason = $failure_reason;
    }

    /**
     * @param Mail $mail_id
     */
    public function setMailId(Mail $mail_id): void
    {
        $this->mail_id = $mail_id;
    }

    /**
     * @param array $notification_status
     */
    public function removeNotificationStatus(array $notification_status): void
    {
        if ($this->hasNotificationStatus($notification_status)) {
            $index = array_search($notification_status, $this->notification_status);
            unset($this->notification_status[$index]);
        }
    }

    /**
     * @param array $notification_status
     */
    public function addNotificationStatus(array $notification_status): void
    {
        if ($this->hasNotificationStatus($notification_status)) {
            return;
        }

        $this->notification_status[] = $notification_status;
    }

    /**
     * @param array $notification_status
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationStatus(array $notification_status, bool $strict = true): bool
    {
        return in_array($notification_status, $this->notification_status, $strict);
    }

    /**
     * @param array $notification_status
     */
    public function setNotificationStatus(array $notification_status): void
    {
        $this->notification_status = $notification_status;
    }

    /**
     * @param bool $is_read
     */
    public function setIsRead(bool $is_read): void
    {
        $this->is_read = $is_read;
    }

    /**
     * @param array $failure_type
     */
    public function removeFailureType(array $failure_type): void
    {
        if ($this->hasFailureType($failure_type)) {
            $index = array_search($failure_type, $this->failure_type);
            unset($this->failure_type[$index]);
        }
    }
}
