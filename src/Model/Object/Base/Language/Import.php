<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.language.import
 * Name : base.language.import
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
     * Language Name
     *
     * @var string
     */
    private $name;

    /**
     * ISO Code
     * ISO Language and Country code, e.g. en_US
     *
     * @var string
     */
    private $code;

    /**
     * File
     *
     * @var int
     */
    private $data;

    /**
     * File Name
     *
     * @var string
     */
    private $filename;

    /**
     * Overwrite Existing Terms
     * If you enable this option, existing translations (including custom ones) will be overwritten and replaced by
     * those in this file
     *
     * @var null|bool
     */
    private $overwrite;

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
     * @param string $name Language Name
     * @param string $code ISO Code
     *        ISO Language and Country code, e.g. en_US
     * @param int $data File
     * @param string $filename File Name
     */
    public function __construct(string $name, string $code, int $data, string $filename)
    {
        $this->name = $name;
        $this->code = $code;
        $this->data = $data;
        $this->filename = $filename;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param int $data
     */
    public function setData(int $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @param null|bool $overwrite
     */
    public function setOverwrite(?bool $overwrite): void
    {
        $this->overwrite = $overwrite;
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
