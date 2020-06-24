<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Resend;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message as MessageAlias;
use Flux\OdooApiClient\Model\Object\Mail\Notification;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.resend.message
 * Name : mail.resend.message
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Message extends Base
{
    /**
     * Message
     *
     * @var MessageAlias
     */
    private $mail_message_id;

    /**
     * Recipients
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Notifications
     *
     * @var Notification
     */
    private $notification_ids;

    /**
     * Has Cancel
     *
     * @var bool
     */
    private $has_cancel;

    /**
     * Partner Readonly
     *
     * @var bool
     */
    private $partner_readonly;

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
     * @return MessageAlias
     */
    public function getMailMessageId(): MessageAlias
    {
        return $this->mail_message_id;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return Notification
     */
    public function getNotificationIds(): Notification
    {
        return $this->notification_ids;
    }

    /**
     * @return bool
     */
    public function isHasCancel(): bool
    {
        return $this->has_cancel;
    }

    /**
     * @return bool
     */
    public function isPartnerReadonly(): bool
    {
        return $this->partner_readonly;
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
