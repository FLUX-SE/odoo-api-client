<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Automation\Line;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Base\Automation\Lead\Test as TestAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.automation.line.test
 * Name : base.automation.line.test
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
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Lead
     *
     * @var null|TestAlias
     */
    private $lead_id;

    /**
     * User
     *
     * @var null|Users
     */
    private $user_id;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|TestAlias $lead_id
     */
    public function setLeadId(?TestAlias $lead_id): void
    {
        $this->lead_id = $lead_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
