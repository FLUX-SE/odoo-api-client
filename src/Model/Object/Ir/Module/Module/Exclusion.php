<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.module.module.exclusion
 * Name : ir.module.module.exclusion
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
final class Exclusion extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Module
     *
     * @var Module
     */
    private $module_id;

    /**
     * Exclusion Module
     *
     * @var Module
     */
    private $exclusion_id;

    /**
     * Status
     *
     * @var array
     */
    private $state;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Module $module_id
     */
    public function setModuleId(Module $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return Module
     */
    public function getExclusionId(): Module
    {
        return $this->exclusion_id;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
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
