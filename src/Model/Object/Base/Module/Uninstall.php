<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.module.uninstall
 * Name : base.module.uninstall
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Uninstall extends Base
{
    /**
     * Show All
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_all;

    /**
     * Module
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $module_id;

    /**
     * Impacted modules
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $module_ids;

    /**
     * Impacted data models
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $model_ids;

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
     * @param OdooRelation $module_id Module
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $module_id)
    {
        $this->module_id = $module_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addModelIds(OdooRelation $item): void
    {
        if ($this->hasModelIds($item)) {
            return;
        }

        if (null === $this->model_ids) {
            $this->model_ids = [];
        }

        $this->model_ids[] = $item;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModelIds(OdooRelation $item): void
    {
        if (null === $this->model_ids) {
            $this->model_ids = [];
        }

        if ($this->hasModelIds($item)) {
            $index = array_search($item, $this->model_ids);
            unset($this->model_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModelIds(OdooRelation $item): bool
    {
        if (null === $this->model_ids) {
            return false;
        }

        return in_array($item, $this->model_ids);
    }

    /**
     * @return bool|null
     */
    public function isShowAll(): ?bool
    {
        return $this->show_all;
    }

    /**
     * @param OdooRelation[]|null $model_ids
     */
    public function setModelIds(?array $model_ids): void
    {
        $this->model_ids = $model_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModelIds(): ?array
    {
        return $this->model_ids;
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
     * @param OdooRelation[]|null $module_ids
     */
    public function setModuleIds(?array $module_ids): void
    {
        $this->module_ids = $module_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModuleIds(): ?array
    {
        return $this->module_ids;
    }

    /**
     * @param OdooRelation $module_id
     */
    public function setModuleId(OdooRelation $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return OdooRelation
     */
    public function getModuleId(): OdooRelation
    {
        return $this->module_id;
    }

    /**
     * @param bool|null $show_all
     */
    public function setShowAll(?bool $show_all): void
    {
        $this->show_all = $show_all;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.module.uninstall';
    }
}
