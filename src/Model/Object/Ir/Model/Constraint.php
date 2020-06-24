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
 *
 * This model tracks PostgreSQL foreign keys and constraints used by Odoo
 * models.
 */
final class Constraint extends Base
{
    /**
     * Constraint
     *
     * @var null|string
     */
    private $name;

    /**
     * Definition
     *
     * @var string
     */
    private $definition;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * Model
     *
     * @var null|Model
     */
    private $model;

    /**
     * Module
     *
     * @var null|Module
     */
    private $module;

    /**
     * Constraint Type
     *
     * @var null|string
     */
    private $type;

    /**
     * Write Date
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * Create Date
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $definition
     */
    public function setDefinition(string $definition): void
    {
        $this->definition = $definition;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param null|Model $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    /**
     * @param null|Module $module
     */
    public function setModule(Module $module): void
    {
        $this->module = $module;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param DateTimeInterface $write_date
     */
    public function setWriteDate(DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param DateTimeInterface $create_date
     */
    public function setCreateDate(DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }
}
