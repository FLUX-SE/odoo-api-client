<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Bus;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : bus.presence
 * ---
 * Name : bus.presence
 * ---
 * Info :
 * User Presence
 *                 Its status is 'online', 'away' or 'offline'. This model should be a one2one, but is not
 *                 attached to res_users to avoid database concurrence errors. Since the 'update' method is
 * executed
 *                 at each poll, if the user have multiple opened tabs, concurrence errors can happend, but are
 * 'muted-logged'.
 */
final class Presence extends Base
{
    /**
     * Users
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * Last Poll
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $last_poll;

    /**
     * Last Presence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $last_presence;

    /**
     * IM Status
     * ---
     * Selection :
     *     -> online (Online)
     *     -> away (Away)
     *     -> offline (Offline)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $status;

    /**
     * @param OdooRelation $user_id Users
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_poll")
     */
    public function getLastPoll(): ?DateTimeInterface
    {
        return $this->last_poll;
    }

    /**
     * @param DateTimeInterface|null $last_poll
     */
    public function setLastPoll(?DateTimeInterface $last_poll): void
    {
        $this->last_poll = $last_poll;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_presence")
     */
    public function getLastPresence(): ?DateTimeInterface
    {
        return $this->last_presence;
    }

    /**
     * @param DateTimeInterface|null $last_presence
     */
    public function setLastPresence(?DateTimeInterface $last_presence): void
    {
        $this->last_presence = $last_presence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("status")
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'bus.presence';
    }
}
