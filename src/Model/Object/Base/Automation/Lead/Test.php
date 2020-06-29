<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Automation\Lead;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Base\Automation\Line\Test as TestAlias;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.automation.lead.test
 * Name : base.automation.lead.test
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Test extends Base
{
    /**
     * Subject
     *
     * @var string
     */
    private $name;

    /**
     * Responsible
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Last Action
     *
     * @var null|DateTimeInterface
     */
    private $date_action_last;

    /**
     * Employee
     *
     * @var null|bool
     */
    private $employee;

    /**
     * Line
     *
     * @var null|TestAlias[]
     */
    private $line_ids;

    /**
     * Priority
     *
     * @var null|bool
     */
    private $priority;

    /**
     * Deadline
     *
     * @var null|bool
     */
    private $deadline;

    /**
     * Assigned to admin user
     *
     * @var null|bool
     */
    private $is_assigned_to_admin;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Subject
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param TestAlias $item
     */
    public function addLineIds(TestAlias $item): void
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
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|bool $is_assigned_to_admin
     */
    public function setIsAssignedToAdmin(?bool $is_assigned_to_admin): void
    {
        $this->is_assigned_to_admin = $is_assigned_to_admin;
    }

    /**
     * @return null|bool
     */
    public function isDeadline(): ?bool
    {
        return $this->deadline;
    }

    /**
     * @param null|bool $priority
     */
    public function setPriority(?bool $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param TestAlias $item
     */
    public function removeLineIds(TestAlias $item): void
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
     * @param TestAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(TestAlias $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|TestAlias[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return null|bool
     */
    public function isEmployee(): ?bool
    {
        return $this->employee;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDateActionLast(): ?DateTimeInterface
    {
        return $this->date_action_last;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
