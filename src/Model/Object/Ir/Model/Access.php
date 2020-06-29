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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Active
     * If you uncheck the active field, it will disable the ACL without deleting it (if you delete a native ACL, it
     * will be re-created when you reload the module).
     *
     * @var null|bool
     */
    private $active;

    /**
     * Object
     *
     * @var Model
     */
    private $model_id;

    /**
     * Group
     *
     * @var null|Groups
     */
    private $group_id;

    /**
     * Read Access
     *
     * @var null|bool
     */
    private $perm_read;

    /**
     * Write Access
     *
     * @var null|bool
     */
    private $perm_write;

    /**
     * Create Access
     *
     * @var null|bool
     */
    private $perm_create;

    /**
     * Delete Access
     *
     * @var null|bool
     */
    private $perm_unlink;

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
     * @param string $name Name
     * @param Model $model_id Object
     */
    public function __construct(string $name, Model $model_id)
    {
        $this->name = $name;
        $this->model_id = $model_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param null|Groups $group_id
     */
    public function setGroupId(?Groups $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param null|bool $perm_read
     */
    public function setPermRead(?bool $perm_read): void
    {
        $this->perm_read = $perm_read;
    }

    /**
     * @param null|bool $perm_write
     */
    public function setPermWrite(?bool $perm_write): void
    {
        $this->perm_write = $perm_write;
    }

    /**
     * @param null|bool $perm_create
     */
    public function setPermCreate(?bool $perm_create): void
    {
        $this->perm_create = $perm_create;
    }

    /**
     * @param null|bool $perm_unlink
     */
    public function setPermUnlink(?bool $perm_unlink): void
    {
        $this->perm_unlink = $perm_unlink;
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
