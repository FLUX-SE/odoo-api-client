<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Channel;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.channel.partner
 * Name : mail.channel.partner
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
final class Partner extends Base
{
    public const ODOO_MODEL_NAME = 'mail.channel.partner';

    /**
     * Custom channel name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $custom_channel_name;

    /**
     * Recipient
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Email
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $partner_email;

    /**
     * Channel
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $channel_id;

    /**
     * Last Fetched
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fetched_message_id;

    /**
     * Last Seen
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $seen_message_id;

    /**
     * Conversation Fold State
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> open (Open)
     *     -> folded (Folded)
     *     -> closed (Closed)
     *
     *
     * @var string|null
     */
    private $fold_state;

    /**
     * Conversation is minimized
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_minimized;

    /**
     * Is pinned on the interface
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_pinned;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @return string|null
     */
    public function getCustomChannelName(): ?string
    {
        return $this->custom_channel_name;
    }

    /**
     * @return bool|null
     */
    public function isIsMinimized(): ?bool
    {
        return $this->is_minimized;
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
     * @param bool|null $is_pinned
     */
    public function setIsPinned(?bool $is_pinned): void
    {
        $this->is_pinned = $is_pinned;
    }

    /**
     * @return bool|null
     */
    public function isIsPinned(): ?bool
    {
        return $this->is_pinned;
    }

    /**
     * @param bool|null $is_minimized
     */
    public function setIsMinimized(?bool $is_minimized): void
    {
        $this->is_minimized = $is_minimized;
    }

    /**
     * @param string|null $fold_state
     */
    public function setFoldState(?string $fold_state): void
    {
        $this->fold_state = $fold_state;
    }

    /**
     * @param string|null $custom_channel_name
     */
    public function setCustomChannelName(?string $custom_channel_name): void
    {
        $this->custom_channel_name = $custom_channel_name;
    }

    /**
     * @return string|null
     */
    public function getFoldState(): ?string
    {
        return $this->fold_state;
    }

    /**
     * @param OdooRelation|null $seen_message_id
     */
    public function setSeenMessageId(?OdooRelation $seen_message_id): void
    {
        $this->seen_message_id = $seen_message_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSeenMessageId(): ?OdooRelation
    {
        return $this->seen_message_id;
    }

    /**
     * @param OdooRelation|null $fetched_message_id
     */
    public function setFetchedMessageId(?OdooRelation $fetched_message_id): void
    {
        $this->fetched_message_id = $fetched_message_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFetchedMessageId(): ?OdooRelation
    {
        return $this->fetched_message_id;
    }

    /**
     * @param OdooRelation|null $channel_id
     */
    public function setChannelId(?OdooRelation $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getChannelId(): ?OdooRelation
    {
        return $this->channel_id;
    }

    /**
     * @param string|null $partner_email
     */
    public function setPartnerEmail(?string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @return string|null
     */
    public function getPartnerEmail(): ?string
    {
        return $this->partner_email;
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
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
