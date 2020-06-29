<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.module.uninstall
 * Name : base.module.uninstall
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Uninstall extends Base
{
    /**
     * Show All
     *
     * @var null|bool
     */
    private $show_all;

    /**
     * Module
     *
     * @var Module
     */
    private $module_id;

    /**
     * Impacted modules
     *
     * @var null|Module[]
     */
    private $module_ids;

    /**
     * Impacted data models
     *
     * @var null|Model[]
     */
    private $model_ids;

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
     * @param Module $module_id Module
     */
    public function __construct(Module $module_id)
    {
        $this->module_id = $module_id;
    }

    /**
     * @param null|bool $show_all
     */
    public function setShowAll(?bool $show_all): void
    {
        $this->show_all = $show_all;
    }

    /**
     * @return Module
     */
    public function getModuleId(): Module
    {
        return $this->module_id;
    }

    /**
     * @return null|Module[]
     */
    public function getModuleIds(): ?array
    {
        return $this->module_ids;
    }

    /**
     * @return null|Model[]
     */
    public function getModelIds(): ?array
    {
        return $this->model_ids;
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
