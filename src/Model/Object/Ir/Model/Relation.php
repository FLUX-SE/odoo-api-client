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
 *
 * This model tracks PostgreSQL tables used to implement Odoo many2many
 * relations.
 */
final class Relation extends Base
{
    /**
     * Relation Name
     *
     * @var null|string
     */
    private $name;

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
