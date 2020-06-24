<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.attachment
 * Name : ir.attachment
 *
 * Attachments are used to link binary files or url to any openerp document.
 *
 * External attachment storage
 * ---------------------------
 *
 * The computed field ``datas`` is implemented using ``_file_read``,
 * ``_file_write`` and ``_file_delete``, which can be overridden to implement
 * other storage engines. Such methods should check for other location pseudo
 * uri (example: hdfs://hadoopserver).
 *
 * The default implementation is the file:dirname location that stores files
 * on the local filesystem using name based on their sha1 hash
 */
final class Attachment extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Resource Name
     *
     * @var string
     */
    private $res_name;

    /**
     * Resource Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Resource Field
     *
     * @var string
     */
    private $res_field;

    /**
     * Resource ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Url
     *
     * @var string
     */
    private $url;

    /**
     * Is public document
     *
     * @var bool
     */
    private $public;

    /**
     * Access Token
     *
     * @var string
     */
    private $access_token;

    /**
     * File Content
     *
     * @var int
     */
    private $datas;

    /**
     * Database Data
     *
     * @var int
     */
    private $db_datas;

    /**
     * Stored Filename
     *
     * @var string
     */
    private $store_fname;

    /**
     * File Size
     *
     * @var int
     */
    private $file_size;

    /**
     * Checksum/SHA1
     *
     * @var string
     */
    private $checksum;

    /**
     * Mime Type
     *
     * @var string
     */
    private $mimetype;

    /**
     * Indexed Content
     *
     * @var string
     */
    private $index_content;

    /**
     * Attachment URL
     *
     * @var string
     */
    private $local_url;

    /**
     * Image Src
     *
     * @var string
     */
    private $image_src;

    /**
     * Image Width
     *
     * @var int
     */
    private $image_width;

    /**
     * Image Height
     *
     * @var int
     */
    private $image_height;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $db_datas
     */
    public function setDbDatas(int $db_datas): void
    {
        $this->db_datas = $db_datas;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return int
     */
    public function getImageHeight(): int
    {
        return $this->image_height;
    }

    /**
     * @return int
     */
    public function getImageWidth(): int
    {
        return $this->image_width;
    }

    /**
     * @return string
     */
    public function getImageSrc(): string
    {
        return $this->image_src;
    }

    /**
     * @return string
     */
    public function getLocalUrl(): string
    {
        return $this->local_url;
    }

    /**
     * @return string
     */
    public function getIndexContent(): string
    {
        return $this->index_content;
    }

    /**
     * @return string
     */
    public function getMimetype(): string
    {
        return $this->mimetype;
    }

    /**
     * @return string
     */
    public function getChecksum(): string
    {
        return $this->checksum;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->file_size;
    }

    /**
     * @param string $store_fname
     */
    public function setStoreFname(string $store_fname): void
    {
        $this->store_fname = $store_fname;
    }

    /**
     * @param int $datas
     */
    public function setDatas(int $datas): void
    {
        $this->datas = $datas;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @param bool $public
     */
    public function setPublic(bool $public): void
    {
        $this->public = $public;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return int
     */
    public function getResId(): int
    {
        return $this->res_id;
    }

    /**
     * @return string
     */
    public function getResField(): string
    {
        return $this->res_field;
    }

    /**
     * @return string
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @return string
     */
    public function getResName(): string
    {
        return $this->res_name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
