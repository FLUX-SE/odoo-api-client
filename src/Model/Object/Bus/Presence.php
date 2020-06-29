<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Bus;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : bus.presence
 * Name : bus.presence
 * Info :
 * User Presence
 * Its status is 'online', 'away' or 'offline'. This model should be a one2one, but is not
 * attached to res_users to avoid database concurrence errors. Since the 'update' method is executed
 * at each poll, if the user have multiple opened tabs, concurrence errors can happend, but are 'muted-logged'.
 */
final class Presence extends Base
{
    /**
     * Users
     *
     * @var Users
     */
    private $user_id;

    /**
     * Last Poll
     *
     * @var null|DateTimeInterface
     */
    private $last_poll;

    /**
     * Last Presence
     *
     * @var null|DateTimeInterface
     */
    private $last_presence;

    /**
     * IM Status
     *
     * @var null|array
     */
    private $status;

    /**
     * @param Users $user_id Users
     */
    public function __construct(Users $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|DateTimeInterface $last_poll
     */
    public function setLastPoll(?DateTimeInterface $last_poll): void
    {
        $this->last_poll = $last_poll;
    }

    /**
     * @param null|DateTimeInterface $last_presence
     */
    public function setLastPresence(?DateTimeInterface $last_presence): void
    {
        $this->last_presence = $last_presence;
    }

    /**
     * @param null|array $status
     */
    public function setStatus(?array $status): void
    {
        $this->status = $status;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStatus($item, bool $strict = true): bool
    {
        if (null === $this->status) {
            return false;
        }

        return in_array($item, $this->status, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addStatus($item): void
    {
        if ($this->hasStatus($item)) {
            return;
        }

        if (null === $this->status) {
            $this->status = [];
        }

        $this->status[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeStatus($item): void
    {
        if (null === $this->status) {
            $this->status = [];
        }

        if ($this->hasStatus($item)) {
            $index = array_search($item, $this->status);
            unset($this->status[$index]);
        }
    }
}
