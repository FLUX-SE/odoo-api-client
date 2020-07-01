<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base_import.import
 * Name : base_import.import
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Import extends Base
{
    public const ODOO_MODEL_NAME = 'base_import.import';

    /**
     * Model
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * File
     * File to check and/or import, raw binary (not base64)
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $file;

    /**
     * File Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $file_name;

    /**
     * File Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $file_type;

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
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return int|null
     */
    public function getFile(): ?int
    {
        return $this->file;
    }

    /**
     * @param int|null $file
     */
    public function setFile(?int $file): void
    {
        $this->file = $file;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    /**
     * @param string|null $file_name
     */
    public function setFileName(?string $file_name): void
    {
        $this->file_name = $file_name;
    }

    /**
     * @return string|null
     */
    public function getFileType(): ?string
    {
        return $this->file_type;
    }

    /**
     * @param string|null $file_type
     */
    public function setFileType(?string $file_type): void
    {
        $this->file_type = $file_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
