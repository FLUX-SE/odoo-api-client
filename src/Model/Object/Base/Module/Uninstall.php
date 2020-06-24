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
 *
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
     * @var bool
     */
    private $show_all;

    /**
     * Module
     *
     * @var null|Module
     */
    private $module_id;

    /**
     * Impacted modules
     *
     * @var Module
     */
    private $module_ids;

    /**
     * Impacted data models
     *
     * @var Model
     */
    private $model_ids;

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
     * @param bool $show_all
     */
    public function setShowAll(bool $show_all): void
    {
        $this->show_all = $show_all;
    }

    /**
     * @return null|Module
     */
    public function getModuleId(): Module
    {
        return $this->module_id;
    }

    /**
     * @return Module
     */
    public function getModuleIds(): Module
    {
        return $this->module_ids;
    }

    /**
     * @return Model
     */
    public function getModelIds(): Model
    {
        return $this->model_ids;
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
