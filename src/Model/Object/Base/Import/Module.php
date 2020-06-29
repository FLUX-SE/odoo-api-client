<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Import;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.import.module
 * Name : base.import.module
 * Info :
 * Import Module
 */
final class Module extends Base
{
    /**
     * Module .ZIP file
     *
     * @var int
     */
    private $module_file;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Import Message
     *
     * @var null|string
     */
    private $import_message;

    /**
     * Force init
     * Force init mode even if installed. (will update `noupdate='1'` records)
     *
     * @var null|bool
     */
    private $force;

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
     * @param int $module_file Module .ZIP file
     */
    public function __construct(int $module_file)
    {
        $this->module_file = $module_file;
    }

    /**
     * @param int $module_file
     */
    public function setModuleFile(int $module_file): void
    {
        $this->module_file = $module_file;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|string $import_message
     */
    public function setImportMessage(?string $import_message): void
    {
        $this->import_message = $import_message;
    }

    /**
     * @param null|bool $force
     */
    public function setForce(?bool $force): void
    {
        $this->force = $force;
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
