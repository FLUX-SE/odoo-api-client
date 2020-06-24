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
 *
 * Wizard to invite partners (or channels) and make them followers.
 */
final class Invite extends Base
{
    /**
     * Related Document Model
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Related Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Recipients
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Channels
     *
     * @var Channel
     */
    private $channel_ids;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * Send Email
     *
     * @var bool
     */
    private $send_mail;

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
     * @param null|string $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Channel $channel_ids
     */
    public function setChannelIds(Channel $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param bool $send_mail
     */
    public function setSendMail(bool $send_mail): void
    {
        $this->send_mail = $send_mail;
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
