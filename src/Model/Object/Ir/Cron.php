<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.cron
 * Name : ir.cron
 * Info :
 * Model describing cron jobs (also called actions or tasks).
 */
final class Cron extends Server
{
    /**
     * Server action
     *
     * @var Server
     */
    private $ir_actions_server_id;

    /**
     * Name
     *
     * @var null|string
     */
    private $cron_name;

    /**
     * Scheduler User
     *
     * @var Users
     */
    private $user_id;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Interval Number
     * Repeat every x.
     *
     * @var null|int
     */
    private $interval_number;

    /**
     * Interval Unit
     *
     * @var null|array
     */
    private $interval_type;

    /**
     * Number of Calls
     * How many times the method is called,
     * a negative number indicates no limit.
     *
     * @var null|int
     */
    private $numbercall;

    /**
     * Repeat Missed
     * Specify if missed occurrences should be executed when the server restarts.
     *
     * @var null|bool
     */
    private $doall;

    /**
     * Next Execution Date
     * Next planned execution date for this job.
     *
     * @var DateTimeInterface
     */
    private $nextcall;

    /**
     * Last Execution Date
     * Previous time the cron ran successfully, provided to the job through the context on the `lastcall` key
     *
     * @var null|DateTimeInterface
     */
    private $lastcall;

    /**
     * Priority
     * The priority of the job, as an integer: 0 means higher priority, 10 means lower priority.
     *
     * @var null|int
     */
    private $priority;

    /**
     * @param Server $ir_actions_server_id Server action
     * @param Users $user_id Scheduler User
     * @param DateTimeInterface $nextcall Next Execution Date
     *        Next planned execution date for this job.
     * @param string $name Action Name
     * @param string $type Action Type
     * @param Model $model_id Model
     *        Model on which the server action runs.
     * @param array $activity_user_type Activity User Type
     *        Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     *        specify the field name of the user to choose on the record.
     * @param array $usage Usage
     * @param array $state Action To Do
     *        Type of server action. The following values are available:
     *        - 'Execute Python Code': a block of python code that will be executed
     *        - 'Create': create a new record with new values
     *        - 'Update a Record': update the values of a record
     *        - 'Execute several actions': define an action that triggers several other server actions
     *        - 'Send Email': automatically send an email (Discuss)
     *        - 'Add Followers': add followers to a record (Discuss)
     *        - 'Create Next Activity': create an activity (Discuss)
     * @param array $binding_type Binding Type
     */
    public function __construct(
        Server $ir_actions_server_id,
        Users $user_id,
        DateTimeInterface $nextcall,
        string $name,
        string $type,
        Model $model_id,
        array $activity_user_type,
        array $usage,
        array $state,
        array $binding_type
    ) {
        $this->ir_actions_server_id = $ir_actions_server_id;
        $this->user_id = $user_id;
        $this->nextcall = $nextcall;
        parent::__construct(
            $name, 
            $type, 
            $model_id, 
            $activity_user_type, 
            $usage, 
            $state, 
            $binding_type
        );
    }

    /**
     * @param Server $ir_actions_server_id
     */
    public function setIrActionsServerId(Server $ir_actions_server_id): void
    {
        $this->ir_actions_server_id = $ir_actions_server_id;
    }

    /**
     * @param null|string $cron_name
     */
    public function setCronName(?string $cron_name): void
    {
        $this->cron_name = $cron_name;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|int $interval_number
     */
    public function setIntervalNumber(?int $interval_number): void
    {
        $this->interval_number = $interval_number;
    }

    /**
     * @param null|array $interval_type
     */
    public function setIntervalType(?array $interval_type): void
    {
        $this->interval_type = $interval_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasIntervalType($item, bool $strict = true): bool
    {
        if (null === $this->interval_type) {
            return false;
        }

        return in_array($item, $this->interval_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addIntervalType($item): void
    {
        if ($this->hasIntervalType($item)) {
            return;
        }

        if (null === $this->interval_type) {
            $this->interval_type = [];
        }

        $this->interval_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeIntervalType($item): void
    {
        if (null === $this->interval_type) {
            $this->interval_type = [];
        }

        if ($this->hasIntervalType($item)) {
            $index = array_search($item, $this->interval_type);
            unset($this->interval_type[$index]);
        }
    }

    /**
     * @param null|int $numbercall
     */
    public function setNumbercall(?int $numbercall): void
    {
        $this->numbercall = $numbercall;
    }

    /**
     * @param null|bool $doall
     */
    public function setDoall(?bool $doall): void
    {
        $this->doall = $doall;
    }

    /**
     * @param DateTimeInterface $nextcall
     */
    public function setNextcall(DateTimeInterface $nextcall): void
    {
        $this->nextcall = $nextcall;
    }

    /**
     * @param null|DateTimeInterface $lastcall
     */
    public function setLastcall(?DateTimeInterface $lastcall): void
    {
        $this->lastcall = $lastcall;
    }

    /**
     * @param null|int $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }
}
