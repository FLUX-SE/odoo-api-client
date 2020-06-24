<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Category as CategoryAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.module.category
 * Name : ir.module.category
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Category extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Parent Application
     *
     * @var CategoryAlias
     */
    private $parent_id;

    /**
     * Child Applications
     *
     * @var CategoryAlias
     */
    private $child_ids;

    /**
     * Number of Apps
     *
     * @var int
     */
    private $module_nr;

    /**
     * Modules
     *
     * @var Module
     */
    private $module_ids;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Visible
     *
     * @var bool
     */
    private $visible;

    /**
     * Exclusive
     *
     * @var bool
     */
    private $exclusive;

    /**
     * External ID
     *
     * @var string
     */
    private $xml_id;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return CategoryAlias
     */
    public function getParentId(): CategoryAlias
    {
        return $this->parent_id;
    }

    /**
     * @return CategoryAlias
     */
    public function getChildIds(): CategoryAlias
    {
        return $this->child_ids;
    }

    /**
     * @return int
     */
    public function getModuleNr(): int
    {
        return $this->module_nr;
    }

    /**
     * @return Module
     */
    public function getModuleIds(): Module
    {
        return $this->module_ids;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * @return bool
     */
    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
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
