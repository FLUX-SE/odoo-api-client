<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.module.category
 * Name : ir.module.category
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Category extends Base
{
    public const ODOO_MODEL_NAME = 'ir.module.category';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Parent Application
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Child Applications
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_ids;

    /**
     * Number of Apps
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $module_nr;

    /**
     * Modules
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $module_ids;

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Sequence
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Visible
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $visible;

    /**
     * Exclusive
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $exclusive;

    /**
     * External ID
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $xml_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string|null $xml_id
     */
    public function setXmlId(?string $xml_id): void
    {
        $this->xml_id = $xml_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return bool|null
     */
    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    /**
     * @param bool|null $visible
     */
    public function setVisible(?bool $visible): void
    {
        $this->visible = $visible;
    }

    /**
     * @return bool|null
     */
    public function isExclusive(): ?bool
    {
        return $this->exclusive;
    }

    /**
     * @param bool|null $exclusive
     */
    public function setExclusive(?bool $exclusive): void
    {
        $this->exclusive = $exclusive;
    }

    /**
     * @return string|null
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModuleIds(OdooRelation $item): void
    {
        if (null === $this->module_ids) {
            $this->module_ids = [];
        }

        if ($this->hasModuleIds($item)) {
            $index = array_search($item, $this->module_ids);
            unset($this->module_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getModuleNr(): ?int
    {
        return $this->module_nr;
    }

    /**
     * @param int|null $module_nr
     */
    public function setModuleNr(?int $module_nr): void
    {
        $this->module_nr = $module_nr;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModuleIds(): ?array
    {
        return $this->module_ids;
    }

    /**
     * @param OdooRelation[]|null $module_ids
     */
    public function setModuleIds(?array $module_ids): void
    {
        $this->module_ids = $module_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModuleIds(OdooRelation $item): bool
    {
        if (null === $this->module_ids) {
            return false;
        }

        return in_array($item, $this->module_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addModuleIds(OdooRelation $item): void
    {
        if ($this->hasModuleIds($item)) {
            return;
        }

        if (null === $this->module_ids) {
            $this->module_ids = [];
        }

        $this->module_ids[] = $item;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
