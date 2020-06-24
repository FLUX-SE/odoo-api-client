<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.todo
 * Name : ir.actions.todo
 *
 * Configuration Wizards
 */
final class Todo extends Base
{
    /**
     * Action
     *
     * @var null|Actions
     */
    private $action_id;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Name
     *
     * @var string
     */
    private $name;

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
     * @param null|Actions $action_id
     */
    public function setActionId(Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param ?array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(?array $state, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($state, $this->state, $strict);
    }

    /**
     * @param ?array $state
     */
    public function addState(?array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $state;
    }

    /**
     * @param ?array $state
     */
    public function removeState(?array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
