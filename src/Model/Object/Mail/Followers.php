<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message\Subtype;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.followers
 * Name : mail.followers
 *
 * mail_followers holds the data related to the follow mechanism inside
 * Odoo. Partners can choose to follow documents (records) of any kind
 * that inherits from mail.thread. Following documents allow to receive
 * notifications for new messages. A subscription is characterized by:
 *
 * :param: res_model: model of the followed objects
 * :param: res_id: ID of resource (may be 0 for every objects)
 */
final class Followers extends Base
{
    /**
     * Related Document Model Name
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
     * Related Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Listener
     *
     * @var Channel
     */
    private $channel_id;

    /**
     * Subtype
     *
     * @var Subtype
     */
    private $subtype_ids;

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
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param Channel $channel_id
     */
    public function setChannelId(Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param Subtype $subtype_ids
     */
    public function setSubtypeIds(Subtype $subtype_ids): void
    {
        $this->subtype_ids = $subtype_ids;
    }
}
