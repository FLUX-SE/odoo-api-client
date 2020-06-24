<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.access
 * Name : ir.model.access
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Access extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Object
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Group
     *
     * @var Groups
     */
    private $group_id;

    /**
     * Read Access
     *
     * @var bool
     */
    private $perm_read;

    /**
     * Write Access
     *
     * @var bool
     */
    private $perm_write;

    /**
     * Create Access
     *
     * @var bool
     */
    private $perm_create;

    /**
     * Delete Access
     *
     * @var bool
     */
    private $perm_unlink;

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
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param Groups $group_id
     */
    public function setGroupId(Groups $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param bool $perm_read
     */
    public function setPermRead(bool $perm_read): void
    {
        $this->perm_read = $perm_read;
    }

    /**
     * @param bool $perm_write
     */
    public function setPermWrite(bool $perm_write): void
    {
        $this->perm_write = $perm_write;
    }

    /**
     * @param bool $perm_create
     */
    public function setPermCreate(bool $perm_create): void
    {
        $this->perm_create = $perm_create;
    }

    /**
     * @param bool $perm_unlink
     */
    public function setPermUnlink(bool $perm_unlink): void
    {
        $this->perm_unlink = $perm_unlink;
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
