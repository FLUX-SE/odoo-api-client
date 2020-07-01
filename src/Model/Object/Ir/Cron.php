<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.cron
 * Name : ir.cron
 * Info :
 * Model describing cron jobs (also called actions or tasks).
 */
final class Cron extends Server
{
    public const ODOO_MODEL_NAME = 'ir.cron';

    /**
     * Server action
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $ir_actions_server_id;

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $cron_name;

    /**
     * Scheduler User
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * Active
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Interval Number
     * Repeat every x.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $interval_number;

    /**
     * Interval Unit
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> minutes (Minutes)
     *     -> hours (Hours)
     *     -> days (Days)
     *     -> weeks (Weeks)
     *     -> months (Months)
     *
     *
     * @var string|null
     */
    private $interval_type;

    /**
     * Number of Calls
     * How many times the method is called,
     * a negative number indicates no limit.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $numbercall;

    /**
     * Repeat Missed
     * Specify if missed occurrences should be executed when the server restarts.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $doall;

    /**
     * Next Execution Date
     * Next planned execution date for this job.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $nextcall;

    /**
     * Last Execution Date
     * Previous time the cron ran successfully, provided to the job through the context on the `lastcall` key
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $lastcall;

    /**
     * Priority
     * The priority of the job, as an integer: 0 means higher priority, 10 means lower priority.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $priority;

    /**
     * @param OdooRelation $ir_actions_server_id Server action
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_id Scheduler User
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $nextcall Next Execution Date
     *        Next planned execution date for this job.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Action Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        Model on which the server action runs.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $activity_user_type Activity User Type
     *        Use 'Specific User' to always assign the same user on the next activity. Use 'Generic User From Record' to
     *        specify the field name of the user to choose on the record.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> specific (Specific User)
     *            -> generic (Generic User From Record)
     *
     * @param string $usage Usage
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> ir_actions_server (Server Action)
     *            -> ir_cron (Scheduled Action)
     *            -> base_automation (Automated Action)
     *
     * @param string $state Action To Do
     *        Type of server action. The following values are available:
     *        - 'Execute Python Code': a block of python code that will be executed
     *        - 'Create': create a new record with new values
     *        - 'Update a Record': update the values of a record
     *        - 'Execute several actions': define an action that triggers several other server actions
     *        - 'Send Email': automatically send an email (Discuss)
     *        - 'Add Followers': add followers to a record (Discuss)
     *        - 'Create Next Activity': create an activity (Discuss)
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> code (Execute Python Code)
     *            -> object_create (Create a new Record)
     *            -> object_write (Update the Record)
     *            -> multi (Execute several actions)
     *            -> email (Send Email)
     *            -> followers (Add Followers)
     *            -> next_activity (Create Next Activity)
     *            -> sms (Send SMS Text Message)
     *
     * @param string $binding_type Binding Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> action (Action)
     *            -> report (Report)
     *
     */
    public function __construct(
        OdooRelation $ir_actions_server_id,
        OdooRelation $user_id,
        DateTimeInterface $nextcall,
        string $name,
        string $type,
        OdooRelation $model_id,
        string $activity_user_type,
        string $usage,
        string $state,
        string $binding_type
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
     * @param string|null $interval_type
     */
    public function setIntervalType(?string $interval_type): void
    {
        $this->interval_type = $interval_type;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param DateTimeInterface|null $lastcall
     */
    public function setLastcall(?DateTimeInterface $lastcall): void
    {
        $this->lastcall = $lastcall;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getLastcall(): ?DateTimeInterface
    {
        return $this->lastcall;
    }

    /**
     * @param DateTimeInterface $nextcall
     */
    public function setNextcall(DateTimeInterface $nextcall): void
    {
        $this->nextcall = $nextcall;
    }

    /**
     * @return DateTimeInterface
     */
    public function getNextcall(): DateTimeInterface
    {
        return $this->nextcall;
    }

    /**
     * @param bool|null $doall
     */
    public function setDoall(?bool $doall): void
    {
        $this->doall = $doall;
    }

    /**
     * @return bool|null
     */
    public function isDoall(): ?bool
    {
        return $this->doall;
    }

    /**
     * @param int|null $numbercall
     */
    public function setNumbercall(?int $numbercall): void
    {
        $this->numbercall = $numbercall;
    }

    /**
     * @return int|null
     */
    public function getNumbercall(): ?int
    {
        return $this->numbercall;
    }

    /**
     * @return string|null
     */
    public function getIntervalType(): ?string
    {
        return $this->interval_type;
    }

    /**
     * @return OdooRelation
     */
    public function getIrActionsServerId(): OdooRelation
    {
        return $this->ir_actions_server_id;
    }

    /**
     * @param int|null $interval_number
     */
    public function setIntervalNumber(?int $interval_number): void
    {
        $this->interval_number = $interval_number;
    }

    /**
     * @return int|null
     */
    public function getIntervalNumber(): ?int
    {
        return $this->interval_number;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param string|null $cron_name
     */
    public function setCronName(?string $cron_name): void
    {
        $this->cron_name = $cron_name;
    }

    /**
     * @return string|null
     */
    public function getCronName(): ?string
    {
        return $this->cron_name;
    }

    /**
     * @param OdooRelation $ir_actions_server_id
     */
    public function setIrActionsServerId(OdooRelation $ir_actions_server_id): void
    {
        $this->ir_actions_server_id = $ir_actions_server_id;
    }

    /**
     * @param int|null $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }
}
