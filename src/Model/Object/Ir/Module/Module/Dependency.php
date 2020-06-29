<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.module.module.dependency
 * Name : ir.module.module.dependency
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
final class Dependency extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Module
     *
     * @var null|Module
     */
    private $module_id;

    /**
     * Dependency
     *
     * @var null|Module
     */
    private $depend_id;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Auto Install Required
     * Whether this dependency blocks automatic installation of the dependent
     *
     * @var null|bool
     */
    private $auto_install_required;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Module $module_id
     */
    public function setModuleId(?Module $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return null|Module
     */
    public function getDependId(): ?Module
    {
        return $this->depend_id;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|bool $auto_install_required
     */
    public function setAutoInstallRequired(?bool $auto_install_required): void
    {
        $this->auto_install_required = $auto_install_required;
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
