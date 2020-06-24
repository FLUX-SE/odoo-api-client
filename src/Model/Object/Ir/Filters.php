<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Actions;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.filters
 * Name : ir.filters
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Filters extends Base
{
    /**
     * Filter Name
     *
     * @var null|string
     */
    private $name;

    /**
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * Domain
     *
     * @var null|string
     */
    private $domain;

    /**
     * Context
     *
     * @var null|string
     */
    private $context;

    /**
     * Sort
     *
     * @var null|string
     */
    private $sort;

    /**
     * Model
     *
     * @var null|array
     */
    private $model_id;

    /**
     * Default Filter
     *
     * @var bool
     */
    private $is_default;

    /**
     * Action
     *
     * @var Actions
     */
    private $action_id;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

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
     * @param null|string $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param null|string $context
     */
    public function setContext(?string $context): void
    {
        $this->context = $context;
    }

    /**
     * @param null|string $sort
     */
    public function setSort(?string $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * @param null|array $model_id
     */
    public function setModelId(?array $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param ?array $model_id
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModelId(?array $model_id, bool $strict = true): bool
    {
        if (null === $this->model_id) {
            return false;
        }

        return in_array($model_id, $this->model_id, $strict);
    }

    /**
     * @param ?array $model_id
     */
    public function addModelId(?array $model_id): void
    {
        if ($this->hasModelId($model_id)) {
            return;
        }

        if (null === $this->model_id) {
            $this->model_id = [];
        }

        $this->model_id[] = $model_id;
    }

    /**
     * @param ?array $model_id
     */
    public function removeModelId(?array $model_id): void
    {
        if ($this->hasModelId($model_id)) {
            $index = array_search($model_id, $this->model_id);
            unset($this->model_id[$index]);
        }
    }

    /**
     * @param bool $is_default
     */
    public function setIsDefault(bool $is_default): void
    {
        $this->is_default = $is_default;
    }

    /**
     * @param Actions $action_id
     */
    public function setActionId(Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
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
