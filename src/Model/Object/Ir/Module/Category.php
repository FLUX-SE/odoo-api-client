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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Parent Application
     *
     * @var null|CategoryAlias
     */
    private $parent_id;

    /**
     * Child Applications
     *
     * @var null|CategoryAlias[]
     */
    private $child_ids;

    /**
     * Number of Apps
     *
     * @var null|int
     */
    private $module_nr;

    /**
     * Modules
     *
     * @var null|Module[]
     */
    private $module_ids;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Visible
     *
     * @var null|bool
     */
    private $visible;

    /**
     * Exclusive
     *
     * @var null|bool
     */
    private $exclusive;

    /**
     * External ID
     *
     * @var null|string
     */
    private $xml_id;

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
     * @param string $name Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|CategoryAlias
     */
    public function getParentId(): ?CategoryAlias
    {
        return $this->parent_id;
    }

    /**
     * @return null|CategoryAlias[]
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @return null|int
     */
    public function getModuleNr(): ?int
    {
        return $this->module_nr;
    }

    /**
     * @return null|Module[]
     */
    public function getModuleIds(): ?array
    {
        return $this->module_ids;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return null|int
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return null|bool
     */
    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    /**
     * @return null|bool
     */
    public function isExclusive(): ?bool
    {
        return $this->exclusive;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
