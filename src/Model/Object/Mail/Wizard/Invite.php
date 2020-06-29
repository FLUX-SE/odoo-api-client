<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.wizard.invite
 * Name : mail.wizard.invite
 * Info :
 * Wizard to invite partners (or channels) and make them followers.
 */
final class Invite extends Base
{
    /**
     * Related Document Model
     * Model of the followed resource
     *
     * @var string
     */
    private $res_model;

    /**
     * Related Document ID
     * Id of the followed resource
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Recipients
     * List of partners that will be added as follower of the current document.
     *
     * @var null|Partner[]
     */
    private $partner_ids;

    /**
     * Channels
     * List of channels that will be added as listeners of the current document.
     *
     * @var null|Channel[]
     */
    private $channel_ids;

    /**
     * Message
     *
     * @var null|string
     */
    private $message;

    /**
     * Send Email
     * If checked, the partners will receive an email warning they have been added in the document's followers.
     *
     * @var null|bool
     */
    private $send_mail;

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
     * @param string $res_model Related Document Model
     *        Model of the followed resource
     */
    public function __construct(string $res_model)
    {
        $this->res_model = $res_model;
    }

    /**
     * @param Channel $item
     */
    public function addChannelIds(Channel $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|bool $send_mail
     */
    public function setSendMail(?bool $send_mail): void
    {
        $this->send_mail = $send_mail;
    }

    /**
     * @param null|string $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param Channel $item
     */
    public function removeChannelIds(Channel $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
    }

    /**
     * @param Channel $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelIds(Channel $item, bool $strict = true): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids, $strict);
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param null|Channel[] $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
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
     * @param null|Partner[] $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
