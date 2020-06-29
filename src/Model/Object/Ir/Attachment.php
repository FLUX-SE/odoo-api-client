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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Resource Name
     *
     * @var null|string
     */
    private $res_name;

    /**
     * Resource Model
     * The database object this attachment will be attached to.
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Resource Field
     *
     * @var null|string
     */
    private $res_field;

    /**
     * Resource ID
     * The record id this is attached to.
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Type
     * You can either upload a file from your computer or copy/paste an internet link to your file.
     *
     * @var array
     */
    private $type;

    /**
     * Url
     *
     * @var null|string
     */
    private $url;

    /**
     * Is public document
     *
     * @var null|bool
     */
    private $public;

    /**
     * Access Token
     *
     * @var null|string
     */
    private $access_token;

    /**
     * File Content
     *
     * @var null|int
     */
    private $datas;

    /**
     * Database Data
     *
     * @var null|int
     */
    private $db_datas;

    /**
     * Stored Filename
     *
     * @var null|string
     */
    private $store_fname;

    /**
     * File Size
     *
     * @var null|int
     */
    private $file_size;

    /**
     * Checksum/SHA1
     *
     * @var null|string
     */
    private $checksum;

    /**
     * Mime Type
     *
     * @var null|string
     */
    private $mimetype;

    /**
     * Indexed Content
     *
     * @var null|string
     */
    private $index_content;

    /**
     * Attachment URL
     *
     * @var null|string
     */
    private $local_url;

    /**
     * Image Src
     *
     * @var null|string
     */
    private $image_src;

    /**
     * Image Width
     *
     * @var null|int
     */
    private $image_width;

    /**
     * Image Height
     *
     * @var null|int
     */
    private $image_height;

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
     * @param string $name Name
     * @param array $type Type
     *        You can either upload a file from your computer or copy/paste an internet link to your file.
     */
    public function __construct(string $name, array $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @param null|int $db_datas
     */
    public function setDbDatas(?int $db_datas): void
    {
        $this->db_datas = $db_datas;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|int
     */
    public function getImageHeight(): ?int
    {
        return $this->image_height;
    }

    /**
     * @return null|int
     */
    public function getImageWidth(): ?int
    {
        return $this->image_width;
    }

    /**
     * @return null|string
     */
    public function getImageSrc(): ?string
    {
        return $this->image_src;
    }

    /**
     * @return null|string
     */
    public function getLocalUrl(): ?string
    {
        return $this->local_url;
    }

    /**
     * @return null|string
     */
    public function getIndexContent(): ?string
    {
        return $this->index_content;
    }

    /**
     * @return null|string
     */
    public function getMimetype(): ?string
    {
        return $this->mimetype;
    }

    /**
     * @return null|string
     */
    public function getChecksum(): ?string
    {
        return $this->checksum;
    }

    /**
     * @return null|int
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @param null|string $store_fname
     */
    public function setStoreFname(?string $store_fname): void
    {
        $this->store_fname = $store_fname;
    }

    /**
     * @param null|int $datas
     */
    public function setDatas(?int $datas): void
    {
        $this->datas = $datas;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @param null|bool $public
     */
    public function setPublic(?bool $public): void
    {
        $this->public = $public;
    }

    /**
     * @param null|string $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|int
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @return null|string
     */
    public function getResField(): ?string
    {
        return $this->res_field;
    }

    /**
     * @return null|string
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @return null|string
     */
    public function getResName(): ?string
    {
        return $this->res_name;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
