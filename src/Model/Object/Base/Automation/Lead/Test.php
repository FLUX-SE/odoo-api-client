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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Responsible
     *
     * @var Users
     */
    private $user_id;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Last Action
     *
     * @var DateTimeInterface
     */
    private $date_action_last;

    /**
     * Employee
     *
     * @var bool
     */
    private $employee;

    /**
     * Line
     *
     * @var TestAlias
     */
    private $line_ids;

    /**
     * Priority
     *
     * @var bool
     */
    private $priority;

    /**
     * Deadline
     *
     * @var bool
     */
    private $deadline;

    /**
     * Assigned to admin user
     *
     * @var bool
     */
    private $is_assigned_to_admin;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateActionLast(): DateTimeInterface
    {
        return $this->date_action_last;
    }

    /**
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->employee;
    }

    /**
     * @param TestAlias $line_ids
     */
    public function setLineIds(TestAlias $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param bool $priority
     */
    public function setPriority(bool $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return bool
     */
    public function isDeadline(): bool
    {
        return $this->deadline;
    }

    /**
     * @param bool $is_assigned_to_admin
     */
    public function setIsAssignedToAdmin(bool $is_assigned_to_admin): void
    {
        $this->is_assigned_to_admin = $is_assigned_to_admin;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
