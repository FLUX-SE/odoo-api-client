<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.constraint
 * Name : ir.model.constraint
 * Info :
 * This model tracks PostgreSQL foreign keys and constraints used by Odoo
 * models.
 */
final class Constraint extends Base
{
    /**
     * Constraint
     * PostgreSQL constraint or foreign key name.
     *
     * @var string
     */
    private $name;

    /**
     * Definition
     * PostgreSQL constraint definition
     *
     * @var null|string
     */
    private $definition;

    /**
     * Message
     * Error message returned when the constraint is violated.
     *
     * @var null|string
     */
    private $message;

    /**
     * Model
     *
     * @var Model
     */
    private $model;

    /**
     * Module
     *
     * @var Module
     */
    private $module;

    /**
     * Constraint Type
     * Type of the constraint: `f` for a foreign key, `u` for other constraints.
     *
     * @var string
     */
    private $type;

    /**
     * Write Date
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * Create Date
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * @param string $name Constraint
     *        PostgreSQL constraint or foreign key name.
     * @param Model $model Model
     * @param Module $module Module
     * @param string $type Constraint Type
     *        Type of the constraint: `f` for a foreign key, `u` for other constraints.
     */
    public function __construct(string $name, Model $model, Module $module, string $type)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
        $this->type = $type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $definition
     */
    public function setDefinition(?string $definition): void
    {
        $this->definition = $definition;
    }

    /**
     * @param null|string $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    /**
     * @param Module $module
     */
    public function setModule(Module $module): void
    {
        $this->module = $module;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|DateTimeInterface $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param null|DateTimeInterface $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }
}
