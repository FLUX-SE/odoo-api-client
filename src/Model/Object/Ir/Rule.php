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
 * Info :
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
     * @var null|string
     */
    private $name;

    /**
     * Active
     * If you uncheck the active field, it will disable the record rule without deleting it (if you delete a native
     * record rule, it may be re-created when you reload the module).
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
     * Groups
     *
     * @var null|Groups[]
     */
    private $groups;

    /**
     * Domain
     *
     * @var null|string
     */
    private $domain_force;

    /**
     * Apply for Read
     *
     * @var null|bool
     */
    private $perm_read;

    /**
     * Apply for Write
     *
     * @var null|bool
     */
    private $perm_write;

    /**
     * Apply for Create
     *
     * @var null|bool
     */
    private $perm_create;

    /**
     * Apply for Delete
     *
     * @var null|bool
     */
    private $perm_unlink;

    /**
     * Global
     * If no group is specified the rule is global and applied to everyone
     *
     * @var null|bool
     */
    private $global;

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
     * @param Model $model_id Object
     */
    public function __construct(Model $model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * @param null|bool $perm_write
     */
    public function setPermWrite(?bool $perm_write): void
    {
        $this->perm_write = $perm_write;
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
     * @return null|bool
     */
    public function isGlobal(): ?bool
    {
        return $this->global;
    }

    /**
     * @param null|bool $perm_unlink
     */
    public function setPermUnlink(?bool $perm_unlink): void
    {
        $this->perm_unlink = $perm_unlink;
    }

    /**
     * @param null|bool $perm_create
     */
    public function setPermCreate(?bool $perm_create): void
    {
        $this->perm_create = $perm_create;
    }

    /**
     * @param null|bool $perm_read
     */
    public function setPermRead(?bool $perm_read): void
    {
        $this->perm_read = $perm_read;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $domain_force
     */
    public function setDomainForce(?string $domain_force): void
    {
        $this->domain_force = $domain_force;
    }

    /**
     * @param Groups $item
     */
    public function removeGroups(Groups $item): void
    {
        if (null === $this->groups) {
            $this->groups = [];
        }

        if ($this->hasGroups($item)) {
            $index = array_search($item, $this->groups);
            unset($this->groups[$index]);
        }
    }

    /**
     * @param Groups $item
     */
    public function addGroups(Groups $item): void
    {
        if ($this->hasGroups($item)) {
            return;
        }

        if (null === $this->groups) {
            $this->groups = [];
        }

        $this->groups[] = $item;
    }

    /**
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroups(Groups $item, bool $strict = true): bool
    {
        if (null === $this->groups) {
            return false;
        }

        return in_array($item, $this->groups, $strict);
    }

    /**
     * @param null|Groups[] $groups
     */
    public function setGroups(?array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
