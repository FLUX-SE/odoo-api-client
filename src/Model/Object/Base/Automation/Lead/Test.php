<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Automation\Lead;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.automation.lead.test
 * Name : base.automation.lead.test
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Test extends Base
{
    /**
     * Subject
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Responsible
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (New)
     *     -> cancel (Cancelled)
     *     -> open (In Progress)
     *     -> pending (Pending)
     *     -> done (Closed)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Active
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Partner
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Last Action
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_action_last;

    /**
     * Employee
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $employee;

    /**
     * Line
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Priority
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $priority;

    /**
     * Deadline
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $deadline;

    /**
     * Assigned to admin user
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_assigned_to_admin;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Subject
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return bool|null
     */
    public function isPriority(): ?bool
    {
        return $this->priority;
    }

    /**
     * @param bool|null $priority
     */
    public function setPriority(?bool $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return bool|null
     */
    public function isDeadline(): ?bool
    {
        return $this->deadline;
    }

    /**
     * @param bool|null $deadline
     */
    public function setDeadline(?bool $deadline): void
    {
        $this->deadline = $deadline;
    }

    /**
     * @return bool|null
     */
    public function isIsAssignedToAdmin(): ?bool
    {
        return $this->is_assigned_to_admin;
    }

    /**
     * @param bool|null $is_assigned_to_admin
     */
    public function setIsAssignedToAdmin(?bool $is_assigned_to_admin): void
    {
        $this->is_assigned_to_admin = $is_assigned_to_admin;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateActionLast(): ?DateTimeInterface
    {
        return $this->date_action_last;
    }

    /**
     * @param DateTimeInterface|null $date_action_last
     */
    public function setDateActionLast(?DateTimeInterface $date_action_last): void
    {
        $this->date_action_last = $date_action_last;
    }

    /**
     * @return bool|null
     */
    public function isEmployee(): ?bool
    {
        return $this->employee;
    }

    /**
     * @param bool|null $employee
     */
    public function setEmployee(?bool $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.automation.lead.test';
    }
}
