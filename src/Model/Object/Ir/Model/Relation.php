<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.model.relation
 * Name : ir.model.relation
 * Info :
 * This model tracks PostgreSQL tables used to implement Odoo many2many
 *         relations.
 */
final class Relation extends Base
{
    public const ODOO_MODEL_NAME = 'ir.model.relation';

    /**
     * Relation Name
     * PostgreSQL table name implementing a many2many relation.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Model
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model;

    /**
     * Module
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $module;

    /**
     * Write Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * Create Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * @param string $name Relation Name
     *        PostgreSQL table name implementing a many2many relation.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model Model
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $module Module
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $model, OdooRelation $module)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     */
    public function getModel(): OdooRelation
    {
        return $this->model;
    }

    /**
     * @param OdooRelation $model
     */
    public function setModel(OdooRelation $model): void
    {
        $this->model = $model;
    }

    /**
     * @return OdooRelation
     */
    public function getModule(): OdooRelation
    {
        return $this->module;
    }

    /**
     * @param OdooRelation $module
     */
    public function setModule(OdooRelation $module): void
    {
        $this->module = $module;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }
}
