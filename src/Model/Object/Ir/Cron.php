<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.cron
 * Name : ir.cron
 *
 * Model describing cron jobs (also called actions or tasks).
 */
final class Cron extends Server
{
    /**
     * Server action
     *
     * @var null|Server
     */
    private $ir_actions_server_id;

    /**
     * Name
     *
     * @var string
     */
    private $cron_name;

    /**
     * Scheduler User
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Interval Number
     *
     * @var int
     */
    private $interval_number;

    /**
     * Interval Unit
     *
     * @var array
     */
    private $interval_type;

    /**
     * Number of Calls
     *
     * @var int
     */
    private $numbercall;

    /**
     * Repeat Missed
     *
     * @var bool
     */
    private $doall;

    /**
     * Next Execution Date
     *
     * @var null|DateTimeInterface
     */
    private $nextcall;

    /**
     * Last Execution Date
     *
     * @var DateTimeInterface
     */
    private $lastcall;

    /**
     * Priority
     *
     * @var int
     */
    private $priority;

    /**
     * @param null|Server $ir_actions_server_id
     */
    public function setIrActionsServerId(Server $ir_actions_server_id): void
    {
        $this->ir_actions_server_id = $ir_actions_server_id;
    }

    /**
     * @param string $cron_name
     */
    public function setCronName(string $cron_name): void
    {
        $this->cron_name = $cron_name;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param int $interval_number
     */
    public function setIntervalNumber(int $interval_number): void
    {
        $this->interval_number = $interval_number;
    }

    /**
     * @param array $interval_type
     */
    public function setIntervalType(array $interval_type): void
    {
        $this->interval_type = $interval_type;
    }

    /**
     * @param array $interval_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasIntervalType(array $interval_type, bool $strict = true): bool
    {
        return in_array($interval_type, $this->interval_type, $strict);
    }

    /**
     * @param array $interval_type
     */
    public function addIntervalType(array $interval_type): void
    {
        if ($this->hasIntervalType($interval_type)) {
            return;
        }

        $this->interval_type[] = $interval_type;
    }

    /**
     * @param array $interval_type
     */
    public function removeIntervalType(array $interval_type): void
    {
        if ($this->hasIntervalType($interval_type)) {
            $index = array_search($interval_type, $this->interval_type);
            unset($this->interval_type[$index]);
        }
    }

    /**
     * @param int $numbercall
     */
    public function setNumbercall(int $numbercall): void
    {
        $this->numbercall = $numbercall;
    }

    /**
     * @param bool $doall
     */
    public function setDoall(bool $doall): void
    {
        $this->doall = $doall;
    }

    /**
     * @param null|DateTimeInterface $nextcall
     */
    public function setNextcall(?DateTimeInterface $nextcall): void
    {
        $this->nextcall = $nextcall;
    }

    /**
     * @param DateTimeInterface $lastcall
     */
    public function setLastcall(DateTimeInterface $lastcall): void
    {
        $this->lastcall = $lastcall;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }
}
