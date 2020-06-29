<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Channel;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Partner as PartnerAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.channel.partner
 * Name : mail.channel.partner
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
final class Partner extends Base
{
    /**
     * Custom channel name
     *
     * @var null|string
     */
    private $custom_channel_name;

    /**
     * Recipient
     *
     * @var null|PartnerAlias
     */
    private $partner_id;

    /**
     * Email
     *
     * @var null|string
     */
    private $partner_email;

    /**
     * Channel
     *
     * @var null|Channel
     */
    private $channel_id;

    /**
     * Last Fetched
     *
     * @var null|Message
     */
    private $fetched_message_id;

    /**
     * Last Seen
     *
     * @var null|Message
     */
    private $seen_message_id;

    /**
     * Conversation Fold State
     *
     * @var null|array
     */
    private $fold_state;

    /**
     * Conversation is minimized
     *
     * @var null|bool
     */
    private $is_minimized;

    /**
     * Is pinned on the interface
     *
     * @var null|bool
     */
    private $is_pinned;

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
     * @param null|string $custom_channel_name
     */
    public function setCustomChannelName(?string $custom_channel_name): void
    {
        $this->custom_channel_name = $custom_channel_name;
    }

    /**
     * @param null|PartnerAlias $partner_id
     */
    public function setPartnerId(?PartnerAlias $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|string $partner_email
     */
    public function setPartnerEmail(?string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @param null|Channel $channel_id
     */
    public function setChannelId(?Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param null|Message $fetched_message_id
     */
    public function setFetchedMessageId(?Message $fetched_message_id): void
    {
        $this->fetched_message_id = $fetched_message_id;
    }

    /**
     * @param null|Message $seen_message_id
     */
    public function setSeenMessageId(?Message $seen_message_id): void
    {
        $this->seen_message_id = $seen_message_id;
    }

    /**
     * @param null|array $fold_state
     */
    public function setFoldState(?array $fold_state): void
    {
        $this->fold_state = $fold_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFoldState($item, bool $strict = true): bool
    {
        if (null === $this->fold_state) {
            return false;
        }

        return in_array($item, $this->fold_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addFoldState($item): void
    {
        if ($this->hasFoldState($item)) {
            return;
        }

        if (null === $this->fold_state) {
            $this->fold_state = [];
        }

        $this->fold_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeFoldState($item): void
    {
        if (null === $this->fold_state) {
            $this->fold_state = [];
        }

        if ($this->hasFoldState($item)) {
            $index = array_search($item, $this->fold_state);
            unset($this->fold_state[$index]);
        }
    }

    /**
     * @param null|bool $is_minimized
     */
    public function setIsMinimized(?bool $is_minimized): void
    {
        $this->is_minimized = $is_minimized;
    }

    /**
     * @param null|bool $is_pinned
     */
    public function setIsPinned(?bool $is_pinned): void
    {
        $this->is_pinned = $is_pinned;
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
