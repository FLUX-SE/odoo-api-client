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
final class Partner extends Base
{
    /**
     * Custom channel name
     *
     * @var string
     */
    private $custom_channel_name;

    /**
     * Recipient
     *
     * @var PartnerAlias
     */
    private $partner_id;

    /**
     * Email
     *
     * @var string
     */
    private $partner_email;

    /**
     * Channel
     *
     * @var Channel
     */
    private $channel_id;

    /**
     * Last Fetched
     *
     * @var Message
     */
    private $fetched_message_id;

    /**
     * Last Seen
     *
     * @var Message
     */
    private $seen_message_id;

    /**
     * Conversation Fold State
     *
     * @var array
     */
    private $fold_state;

    /**
     * Conversation is minimized
     *
     * @var bool
     */
    private $is_minimized;

    /**
     * Is pinned on the interface
     *
     * @var bool
     */
    private $is_pinned;

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
     * @param string $custom_channel_name
     */
    public function setCustomChannelName(string $custom_channel_name): void
    {
        $this->custom_channel_name = $custom_channel_name;
    }

    /**
     * @param PartnerAlias $partner_id
     */
    public function setPartnerId(PartnerAlias $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string $partner_email
     */
    public function setPartnerEmail(string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @param Channel $channel_id
     */
    public function setChannelId(Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param Message $fetched_message_id
     */
    public function setFetchedMessageId(Message $fetched_message_id): void
    {
        $this->fetched_message_id = $fetched_message_id;
    }

    /**
     * @param Message $seen_message_id
     */
    public function setSeenMessageId(Message $seen_message_id): void
    {
        $this->seen_message_id = $seen_message_id;
    }

    /**
     * @param array $fold_state
     */
    public function setFoldState(array $fold_state): void
    {
        $this->fold_state = $fold_state;
    }

    /**
     * @param array $fold_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFoldState(array $fold_state, bool $strict = true): bool
    {
        return in_array($fold_state, $this->fold_state, $strict);
    }

    /**
     * @param array $fold_state
     */
    public function addFoldState(array $fold_state): void
    {
        if ($this->hasFoldState($fold_state)) {
            return;
        }

        $this->fold_state[] = $fold_state;
    }

    /**
     * @param array $fold_state
     */
    public function removeFoldState(array $fold_state): void
    {
        if ($this->hasFoldState($fold_state)) {
            $index = array_search($fold_state, $this->fold_state);
            unset($this->fold_state[$index]);
        }
    }

    /**
     * @param bool $is_minimized
     */
    public function setIsMinimized(bool $is_minimized): void
    {
        $this->is_minimized = $is_minimized;
    }

    /**
     * @param bool $is_pinned
     */
    public function setIsPinned(bool $is_pinned): void
    {
        $this->is_pinned = $is_pinned;
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
