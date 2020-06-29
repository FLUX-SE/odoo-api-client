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
 * Info :
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
     * @var Message
     */
    private $mail_message_id;

    /**
     * Needaction Recipient
     *
     * @var null|Partner
     */
    private $res_partner_id;

    /**
     * Is Read
     *
     * @var null|bool
     */
    private $is_read;

    /**
     * Email Status
     *
     * @var null|array
     */
    private $notification_status;

    /**
     * Mail
     *
     * @var null|Mail
     */
    private $mail_id;

    /**
     * Failure reason
     *
     * @var null|string
     */
    private $failure_reason;

    /**
     * Read Date
     *
     * @var null|DateTimeInterface
     */
    private $read_date;

    /**
     * Notification Type
     *
     * @var array
     */
    private $notification_type;

    /**
     * SMS
     *
     * @var null|Sms
     */
    private $sms_id;

    /**
     * SMS Number
     *
     * @var null|string
     */
    private $sms_number;

    /**
     * Failure type
     *
     * @var null|array
     */
    private $failure_type;

    /**
     * @param Message $mail_message_id Message
     * @param array $notification_type Notification Type
     */
    public function __construct(Message $mail_message_id, array $notification_type)
    {
        $this->mail_message_id = $mail_message_id;
        $this->notification_type = $notification_type;
    }

    /**
     * @param array $notification_type
     */
    public function setNotificationType(array $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @param mixed $item
     */
    public function addFailureType($item): void
    {
        if ($this->hasFailureType($item)) {
            return;
        }

        if (null === $this->failure_type) {
            $this->failure_type = [];
        }

        $this->failure_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFailureType($item, bool $strict = true): bool
    {
        if (null === $this->failure_type) {
            return false;
        }

        return in_array($item, $this->failure_type, $strict);
    }

    /**
     * @param null|array $failure_type
     */
    public function setFailureType(?array $failure_type): void
    {
        $this->failure_type = $failure_type;
    }

    /**
     * @param null|string $sms_number
     */
    public function setSmsNumber(?string $sms_number): void
    {
        $this->sms_number = $sms_number;
    }

    /**
     * @param null|Sms $sms_id
     */
    public function setSmsId(?Sms $sms_id): void
    {
        $this->sms_id = $sms_id;
    }

    /**
     * @param mixed $item
     */
    public function removeNotificationType($item): void
    {
        if ($this->hasNotificationType($item)) {
            $index = array_search($item, $this->notification_type);
            unset($this->notification_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addNotificationType($item): void
    {
        if ($this->hasNotificationType($item)) {
            return;
        }

        $this->notification_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationType($item, bool $strict = true): bool
    {
        return in_array($item, $this->notification_type, $strict);
    }

    /**
     * @param null|DateTimeInterface $read_date
     */
    public function setReadDate(?DateTimeInterface $read_date): void
    {
        $this->read_date = $read_date;
    }

    /**
     * @param Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @param null|string $failure_reason
     */
    public function setFailureReason(?string $failure_reason): void
    {
        $this->failure_reason = $failure_reason;
    }

    /**
     * @param null|Mail $mail_id
     */
    public function setMailId(?Mail $mail_id): void
    {
        $this->mail_id = $mail_id;
    }

    /**
     * @param mixed $item
     */
    public function removeNotificationStatus($item): void
    {
        if (null === $this->notification_status) {
            $this->notification_status = [];
        }

        if ($this->hasNotificationStatus($item)) {
            $index = array_search($item, $this->notification_status);
            unset($this->notification_status[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addNotificationStatus($item): void
    {
        if ($this->hasNotificationStatus($item)) {
            return;
        }

        if (null === $this->notification_status) {
            $this->notification_status = [];
        }

        $this->notification_status[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationStatus($item, bool $strict = true): bool
    {
        if (null === $this->notification_status) {
            return false;
        }

        return in_array($item, $this->notification_status, $strict);
    }

    /**
     * @param null|array $notification_status
     */
    public function setNotificationStatus(?array $notification_status): void
    {
        $this->notification_status = $notification_status;
    }

    /**
     * @param null|bool $is_read
     */
    public function setIsRead(?bool $is_read): void
    {
        $this->is_read = $is_read;
    }

    /**
     * @param null|Partner $res_partner_id
     */
    public function setResPartnerId(?Partner $res_partner_id): void
    {
        $this->res_partner_id = $res_partner_id;
    }

    /**
     * @param mixed $item
     */
    public function removeFailureType($item): void
    {
        if (null === $this->failure_type) {
            $this->failure_type = [];
        }

        if ($this->hasFailureType($item)) {
            $index = array_search($item, $this->failure_type);
            unset($this->failure_type[$index]);
        }
    }
}
