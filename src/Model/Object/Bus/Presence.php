<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Bus;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : bus.presence
 * Name : bus.presence
 *
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
     * @var null|Users
     */
    private $user_id;

    /**
     * Last Poll
     *
     * @var DateTimeInterface
     */
    private $last_poll;

    /**
     * Last Presence
     *
     * @var DateTimeInterface
     */
    private $last_presence;

    /**
     * IM Status
     *
     * @var array
     */
    private $status;

    /**
     * @param null|Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param DateTimeInterface $last_poll
     */
    public function setLastPoll(DateTimeInterface $last_poll): void
    {
        $this->last_poll = $last_poll;
    }

    /**
     * @param DateTimeInterface $last_presence
     */
    public function setLastPresence(DateTimeInterface $last_presence): void
    {
        $this->last_presence = $last_presence;
    }

    /**
     * @param array $status
     */
    public function setStatus(array $status): void
    {
        $this->status = $status;
    }

    /**
     * @param array $status
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStatus(array $status, bool $strict = true): bool
    {
        return in_array($status, $this->status, $strict);
    }

    /**
     * @param array $status
     */
    public function addStatus(array $status): void
    {
        if ($this->hasStatus($status)) {
            return;
        }

        $this->status[] = $status;
    }

    /**
     * @param array $status
     */
    public function removeStatus(array $status): void
    {
        if ($this->hasStatus($status)) {
            $index = array_search($status, $this->status);
            unset($this->status[$index]);
        }
    }
}
