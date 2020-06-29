<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base_import.import
 * Name : base_import.import
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Import extends Base
{
    /**
     * Model
     *
     * @var null|string
     */
    private $res_model;

    /**
     * File
     * File to check and/or import, raw binary (not base64)
     *
     * @var null|int
     */
    private $file;

    /**
     * File Name
     *
     * @var null|string
     */
    private $file_name;

    /**
     * File Type
     *
     * @var null|string
     */
    private $file_type;

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
     * @param null|string $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param null|int $file
     */
    public function setFile(?int $file): void
    {
        $this->file = $file;
    }

    /**
     * @param null|string $file_name
     */
    public function setFileName(?string $file_name): void
    {
        $this->file_name = $file_name;
    }

    /**
     * @param null|string $file_type
     */
    public function setFileType(?string $file_type): void
    {
        $this->file_type = $file_type;
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
