<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Resend;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.resend.message
 * ---
 * Name : mail.resend.message
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Message extends Base
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
     * @var OdooRelation|null
     */
    private $mail_message_id;

    /**
     * Recipients
     * ---
     * Relation : one2many (mail.resend.partner -> resend_wizard_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Resend\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Notifications
     * ---
     * Relation : many2many (mail.notification)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Notification
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $notification_ids;

    /**
     * Has Cancel
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_cancel;

    /**
     * Partner Readonly
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $partner_readonly;

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
     * @return OdooRelation|null
     */
    public function getMailMessageId(): ?OdooRelation
    {
        return $this->mail_message_id;
    }

    /**
     * @param bool|null $has_cancel
     */
    public function setHasCancel(?bool $has_cancel): void
    {
        $this->has_cancel = $has_cancel;
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $partner_readonly
     */
    public function setPartnerReadonly(?bool $partner_readonly): void
    {
        $this->partner_readonly = $partner_readonly;
    }

    /**
     * @return bool|null
     */
    public function isPartnerReadonly(): ?bool
    {
        return $this->partner_readonly;
    }

    /**
     * @return bool|null
     */
    public function isHasCancel(): ?bool
    {
        return $this->has_cancel;
    }

    /**
     * @param OdooRelation|null $mail_message_id
     */
    public function setMailMessageId(?OdooRelation $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNotificationIds(OdooRelation $item): void
    {
        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        if ($this->hasNotificationIds($item)) {
            $index = array_search($item, $this->notification_ids);
            unset($this->notification_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addNotificationIds(OdooRelation $item): void
    {
        if ($this->hasNotificationIds($item)) {
            return;
        }

        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        $this->notification_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNotificationIds(OdooRelation $item): bool
    {
        if (null === $this->notification_ids) {
            return false;
        }

        return in_array($item, $this->notification_ids);
    }

    /**
     * @param OdooRelation[]|null $notification_ids
     */
    public function setNotificationIds(?array $notification_ids): void
    {
        $this->notification_ids = $notification_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getNotificationIds(): ?array
    {
        return $this->notification_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.resend.message';
    }
}
