<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.rule
 * Name : ir.rule
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Rule extends Base
{
    /**
     * Name
     *
     * @var string
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
     * Groups
     *
     * @var Groups
     */
    private $groups;

    /**
     * Domain
     *
     * @var string
     */
    private $domain_force;

    /**
     * Apply for Read
     *
     * @var bool
     */
    private $perm_read;

    /**
     * Apply for Write
     *
     * @var bool
     */
    private $perm_write;

    /**
     * Apply for Create
     *
     * @var bool
     */
    private $perm_create;

    /**
     * Apply for Delete
     *
     * @var bool
     */
    private $perm_unlink;

    /**
     * Global
     *
     * @var bool
     */
    private $global;

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
     * @param string $name
     */
    public function setName(string $name): void
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
     * @param Groups $groups
     */
    public function setGroups(Groups $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @param string $domain_force
     */
    public function setDomainForce(string $domain_force): void
    {
        $this->domain_force = $domain_force;
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
     * @return bool
     */
    public function isGlobal(): bool
    {
        return $this->global;
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
