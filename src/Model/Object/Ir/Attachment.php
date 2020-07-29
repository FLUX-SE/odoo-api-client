<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.attachment
 * ---
 * Name : ir.attachment
 * ---
 * Info :
 * Attachments are used to link binary files or url to any openerp document.
 *
 *         External attachment storage
 *         ---------------------------
 *
 *         The computed field ``datas`` is implemented using ``_file_read``,
 *         ``_file_write`` and ``_file_delete``, which can be overridden to implement
 *         other storage engines. Such methods should check for other location pseudo
 *         uri (example: hdfs://hadoopserver).
 *
 *         The default implementation is the file:dirname location that stores files
 *         on the local filesystem using name based on their sha1 hash
 */
final class Attachment extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Resource Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $res_name;

    /**
     * Resource Model
     * ---
     * The database object this attachment will be attached to.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Resource Field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_field;

    /**
     * Resource ID
     * ---
     * The record id this is attached to.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Type
     * ---
     * You can either upload a file from your computer or copy/paste an internet link to your file.
     * ---
     * Selection : (default value, usually null)
     *     -> url (URL)
     *     -> binary (File)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * Url
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $url;

    /**
     * Is public document
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $public;

    /**
     * Access Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $access_token;

    /**
     * File Content
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $datas;

    /**
     * Database Data
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $db_datas;

    /**
     * Stored Filename
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $store_fname;

    /**
     * File Size
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $file_size;

    /**
     * Checksum/SHA1
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $checksum;

    /**
     * Mime Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $mimetype;

    /**
     * Indexed Content
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $index_content;

    /**
     * Attachment URL
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $local_url;

    /**
     * Image Src
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $image_src;

    /**
     * Image Width
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $image_width;

    /**
     * Image Height
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $image_height;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        You can either upload a file from your computer or copy/paste an internet link to your file.
     *        ---
     *        Selection : (default value, usually null)
     *            -> url (URL)
     *            -> binary (File)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @param string|null $image_src
     */
    public function setImageSrc(?string $image_src): void
    {
        $this->image_src = $image_src;
    }

    /**
     * @param int|null $file_size
     */
    public function setFileSize(?int $file_size): void
    {
        $this->file_size = $file_size;
    }

    /**
     * @return string|null
     *
     * @SerializedName("checksum")
     */
    public function getChecksum(): ?string
    {
        return $this->checksum;
    }

    /**
     * @param string|null $checksum
     */
    public function setChecksum(?string $checksum): void
    {
        $this->checksum = $checksum;
    }

    /**
     * @return string|null
     *
     * @SerializedName("mimetype")
     */
    public function getMimetype(): ?string
    {
        return $this->mimetype;
    }

    /**
     * @param string|null $mimetype
     */
    public function setMimetype(?string $mimetype): void
    {
        $this->mimetype = $mimetype;
    }

    /**
     * @return string|null
     *
     * @SerializedName("index_content")
     */
    public function getIndexContent(): ?string
    {
        return $this->index_content;
    }

    /**
     * @param string|null $index_content
     */
    public function setIndexContent(?string $index_content): void
    {
        $this->index_content = $index_content;
    }

    /**
     * @return string|null
     *
     * @SerializedName("local_url")
     */
    public function getLocalUrl(): ?string
    {
        return $this->local_url;
    }

    /**
     * @param string|null $local_url
     */
    public function setLocalUrl(?string $local_url): void
    {
        $this->local_url = $local_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("image_src")
     */
    public function getImageSrc(): ?string
    {
        return $this->image_src;
    }

    /**
     * @return int|null
     *
     * @SerializedName("image_width")
     */
    public function getImageWidth(): ?int
    {
        return $this->image_width;
    }

    /**
     * @param string|null $store_fname
     */
    public function setStoreFname(?string $store_fname): void
    {
        $this->store_fname = $store_fname;
    }

    /**
     * @param int|null $image_width
     */
    public function setImageWidth(?int $image_width): void
    {
        $this->image_width = $image_width;
    }

    /**
     * @return int|null
     *
     * @SerializedName("image_height")
     */
    public function getImageHeight(): ?int
    {
        return $this->image_height;
    }

    /**
     * @param int|null $image_height
     */
    public function setImageHeight(?int $image_height): void
    {
        $this->image_height = $image_height;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
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

    /**
     * @return int|null
     *
     * @SerializedName("file_size")
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @return string|null
     *
     * @SerializedName("store_fname")
     */
    public function getStoreFname(): ?string
    {
        return $this->store_fname;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_name")
     */
    public function getResName(): ?string
    {
        return $this->res_name;
    }

    /**
     * @param string|null $res_name
     */
    public function setResName(?string $res_name): void
    {
        $this->res_name = $res_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_model")
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
     * @return string|null
     *
     * @SerializedName("res_field")
     */
    public function getResField(): ?string
    {
        return $this->res_field;
    }

    /**
     * @param string|null $res_field
     */
    public function setResField(?string $res_field): void
    {
        $this->res_field = $res_field;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $db_datas
     */
    public function setDbDatas(?string $db_datas): void
    {
        $this->db_datas = $db_datas;
    }

    /**
     * @return string
     *
     * @SerializedName("type")
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("url")
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("public")
     */
    public function isPublic(): ?bool
    {
        return $this->public;
    }

    /**
     * @param bool|null $public
     */
    public function setPublic(?bool $public): void
    {
        $this->public = $public;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("datas")
     */
    public function getDatas(): ?string
    {
        return $this->datas;
    }

    /**
     * @param string|null $datas
     */
    public function setDatas(?string $datas): void
    {
        $this->datas = $datas;
    }

    /**
     * @return string|null
     *
     * @SerializedName("db_datas")
     */
    public function getDbDatas(): ?string
    {
        return $this->db_datas;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.attachment';
    }
}
