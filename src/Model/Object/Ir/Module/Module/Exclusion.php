<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.module.module.exclusion
 * Name : ir.module.module.exclusion
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
final class Exclusion extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Module
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $module_id;

    /**
     * Exclusion Module
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $exclusion_id;

    /**
     * Status
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> uninstallable (Uninstallable)
     *     -> uninstalled (Not Installed)
     *     -> installed (Installed)
     *     -> to upgrade (To be upgraded)
     *     -> to remove (To be removed)
     *     -> to install (To be installed)
     *     -> unknown (Unknown)
     *
     *
     * @var string|null
     */
    private $state;

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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation|null $exclusion_id
     */
    public function setExclusionId(?OdooRelation $exclusion_id): void
    {
        $this->exclusion_id = $exclusion_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExclusionId(): ?OdooRelation
    {
        return $this->exclusion_id;
    }

    /**
     * @param OdooRelation|null $module_id
     */
    public function setModuleId(?OdooRelation $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getModuleId(): ?OdooRelation
    {
        return $this->module_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.module.module.exclusion';
    }
}
