<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message\Subtype;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.followers
 * Name : mail.followers
 * Info :
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
     * Related Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Listener
     *
     * @var null|Channel
     */
    private $channel_id;

    /**
     * Subtype
     * Message subtypes followed, meaning subtypes that will be pushed onto the user's Wall.
     *
     * @var null|Subtype[]
     */
    private $subtype_ids;

    /**
     * @param string $res_model Related Document Model Name
     */
    public function __construct(string $res_model)
    {
        $this->res_model = $res_model;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Channel $channel_id
     */
    public function setChannelId(?Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param null|Subtype[] $subtype_ids
     */
    public function setSubtypeIds(?array $subtype_ids): void
    {
        $this->subtype_ids = $subtype_ids;
    }

    /**
     * @param Subtype $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSubtypeIds(Subtype $item, bool $strict = true): bool
    {
        if (null === $this->subtype_ids) {
            return false;
        }

        return in_array($item, $this->subtype_ids, $strict);
    }

    /**
     * @param Subtype $item
     */
    public function addSubtypeIds(Subtype $item): void
    {
        if ($this->hasSubtypeIds($item)) {
            return;
        }

        if (null === $this->subtype_ids) {
            $this->subtype_ids = [];
        }

        $this->subtype_ids[] = $item;
    }

    /**
     * @param Subtype $item
     */
    public function removeSubtypeIds(Subtype $item): void
    {
        if (null === $this->subtype_ids) {
            $this->subtype_ids = [];
        }

        if ($this->hasSubtypeIds($item)) {
            $index = array_search($item, $this->subtype_ids);
            unset($this->subtype_ids[$index]);
        }
    }
}
