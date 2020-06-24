<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Digest;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : digest.tip
 * Name : digest.tip
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
final class Tip extends Base
{
    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Recipients
     *
     * @var Users
     */
    private $user_ids;

    /**
     * Tip description
     *
     * @var string
     */
    private $tip_description;

    /**
     * Authorized Group
     *
     * @var Groups
     */
    private $group_id;

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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Users $user_ids
     */
    public function setUserIds(Users $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param string $tip_description
     */
    public function setTipDescription(string $tip_description): void
    {
        $this->tip_description = $tip_description;
    }

    /**
     * @param Groups $group_id
     */
    public function setGroupId(Groups $group_id): void
    {
        $this->group_id = $group_id;
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
