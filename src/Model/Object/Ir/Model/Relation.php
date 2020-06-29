<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.relation
 * Name : ir.model.relation
 * Info :
 * This model tracks PostgreSQL tables used to implement Odoo many2many
 * relations.
 */
final class Relation extends Base
{
    /**
     * Relation Name
     * PostgreSQL table name implementing a many2many relation.
     *
     * @var string
     */
    private $name;

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
     * @param string $name Relation Name
     *        PostgreSQL table name implementing a many2many relation.
     * @param Model $model Model
     * @param Module $module Module
     */
    public function __construct(string $name, Model $model, Module $module)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
