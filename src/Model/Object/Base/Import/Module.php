<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Import;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.import.module
 * Name : base.import.module
 *
 * Import Module
 */
final class Module extends Base
{
    /**
     * Module .ZIP file
     *
     * @var null|int
     */
    private $module_file;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Import Message
     *
     * @var string
     */
    private $import_message;

    /**
     * Force init
     *
     * @var bool
     */
    private $force;

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
     * @param null|int $module_file
     */
    public function setModuleFile(?int $module_file): void
    {
        $this->module_file = $module_file;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param string $import_message
     */
    public function setImportMessage(string $import_message): void
    {
        $this->import_message = $import_message;
    }

    /**
     * @param bool $force
     */
    public function setForce(bool $force): void
    {
        $this->force = $force;
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
