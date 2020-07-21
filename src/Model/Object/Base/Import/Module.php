<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Import;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $module_file;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> init (init)
     *     -> done (done)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Import Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $import_message;

    /**
     * Force init
     * Force init mode even if installed. (will update `noupdate='1'` records)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $force;

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
     * @param int $module_file Module .ZIP file
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(int $module_file)
    {
        $this->module_file = $module_file;
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
     * @return int
     */
    public function getModuleFile(): int
    {
        return $this->module_file;
    }

    /**
     * @param bool|null $force
     */
    public function setForce(?bool $force): void
    {
        $this->force = $force;
    }

    /**
     * @return bool|null
     */
    public function isForce(): ?bool
    {
        return $this->force;
    }

    /**
     * @param string|null $import_message
     */
    public function setImportMessage(?string $import_message): void
    {
        $this->import_message = $import_message;
    }

    /**
     * @return string|null
     */
    public function getImportMessage(): ?string
    {
        return $this->import_message;
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
     * @param int $module_file
     */
    public function setModuleFile(int $module_file): void
    {
        $this->module_file = $module_file;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.import.module';
    }
}
