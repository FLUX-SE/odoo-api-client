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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * User
     * The user this filter is private to. When left empty the filter is public and available to all users.
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Domain
     *
     * @var string
     */
    private $domain;

    /**
     * Context
     *
     * @var string
     */
    private $context;

    /**
     * Sort
     *
     * @var string
     */
    private $sort;

    /**
     * Model
     *
     * @var array
     */
    private $model_id;

    /**
     * Default Filter
     *
     * @var null|bool
     */
    private $is_default;

    /**
     * Action
     * The menu action this filter applies to. When left empty the filter applies to all menus for this model.
     *
     * @var null|Actions
     */
    private $action_id;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

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
     * @param string $name Filter Name
     * @param string $domain Domain
     * @param string $context Context
     * @param string $sort Sort
     * @param array $model_id Model
     */
    public function __construct(
        string $name,
        string $domain,
        string $context,
        string $sort,
        array $model_id
    ) {
        $this->name = $name;
        $this->domain = $domain;
        $this->context = $context;
        $this->sort = $sort;
        $this->model_id = $model_id;
    }

    /**
     * @param mixed $item
     */
    public function removeModelId($item): void
    {
        if ($this->hasModelId($item)) {
            $index = array_search($item, $this->model_id);
            unset($this->model_id[$index]);
        }
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
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|Actions $action_id
     */
    public function setActionId(?Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @param null|bool $is_default
     */
    public function setIsDefault(?bool $is_default): void
    {
        $this->is_default = $is_default;
    }

    /**
     * @param mixed $item
     */
    public function addModelId($item): void
    {
        if ($this->hasModelId($item)) {
            return;
        }

        $this->model_id[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModelId($item, bool $strict = true): bool
    {
        return in_array($item, $this->model_id, $strict);
    }

    /**
     * @param array $model_id
     */
    public function setModelId(array $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
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
