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
 * Info :
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
     * @var null|MessageAlias
     */
    private $mail_message_id;

    /**
     * Recipients
     *
     * @var null|Partner[]
     */
    private $partner_ids;

    /**
     * Notifications
     *
     * @var null|Notification[]
     */
    private $notification_ids;

    /**
     * Has Cancel
     *
     * @var null|bool
     */
    private $has_cancel;

    /**
     * Partner Readonly
     *
     * @var null|bool
     */
    private $partner_readonly;

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
     * @return null|MessageAlias
     */
    public function getMailMessageId(): ?MessageAlias
    {
        return $this->mail_message_id;
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
     * @return null|Notification[]
     */
    public function getNotificationIds(): ?array
    {
        return $this->notification_ids;
    }

    /**
     * @return null|bool
     */
    public function isHasCancel(): ?bool
    {
        return $this->has_cancel;
    }

    /**
     * @return null|bool
     */
    public function isPartnerReadonly(): ?bool
    {
        return $this->partner_readonly;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
