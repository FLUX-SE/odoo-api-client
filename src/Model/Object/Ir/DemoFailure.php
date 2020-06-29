<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\DemoFailure\Wizard;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.demo_failure
 * Name : ir.demo_failure
 * Info :
 * Stores modules for which we could not install demo data
 */
final class DemoFailure extends Base
{
    /**
     * Module
     *
     * @var Module
     */
    private $module_id;

    /**
     * Error
     *
     * @var null|string
     */
    private $error;

    /**
     * Wizard
     *
     * @var null|Wizard
     */
    private $wizard_id;

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
     * @param Module $module_id
     */
    public function setModuleId(Module $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @param null|string $error
     */
    public function setError(?string $error): void
    {
        $this->error = $error;
    }

    /**
     * @param null|Wizard $wizard_id
     */
    public function setWizardId(?Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
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
