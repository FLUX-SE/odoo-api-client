<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Google\Drive;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : google.drive.config
 * ---
 * Name : google.drive.config
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Config extends Base
{
    /**
     * Template Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Related Model
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $model;

    /**
     * Filter
     * ---
     * Relation : many2one (ir.filters)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Filters
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $filter_id;

    /**
     * Template URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $google_drive_template_url;

    /**
     * Resource Id
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $google_drive_resource_id;

    /**
     * Google Client
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $google_drive_client_id;

    /**
     * Google Drive Name Pattern
     * ---
     * Choose how the new google drive will be named, on google side. Eg. gdoc_%(field_name)s
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name_template;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

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
     * @param string $name Template Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $google_drive_template_url Template URL
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name_template Google Drive Name Pattern
     *        ---
     *        Choose how the new google drive will be named, on google side. Eg. gdoc_%(field_name)s
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $model_id,
        string $google_drive_template_url,
        string $name_template
    ) {
        $this->name = $name;
        $this->model_id = $model_id;
        $this->google_drive_template_url = $google_drive_template_url;
        $this->name_template = $name_template;
    }

    /**
     * @return string
     *
     * @SerializedName("name_template")
     */
    public function getNameTemplate(): string
    {
        return $this->name_template;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $name_template
     */
    public function setNameTemplate(string $name_template): void
    {
        $this->name_template = $name_template;
    }

    /**
     * @param string|null $google_drive_client_id
     */
    public function setGoogleDriveClientId(?string $google_drive_client_id): void
    {
        $this->google_drive_client_id = $google_drive_client_id;
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
     * @return string|null
     *
     * @SerializedName("google_drive_client_id")
     */
    public function getGoogleDriveClientId(): ?string
    {
        return $this->google_drive_client_id;
    }

    /**
     * @param string|null $google_drive_resource_id
     */
    public function setGoogleDriveResourceId(?string $google_drive_resource_id): void
    {
        $this->google_drive_resource_id = $google_drive_resource_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_drive_resource_id")
     */
    public function getGoogleDriveResourceId(): ?string
    {
        return $this->google_drive_resource_id;
    }

    /**
     * @param string $google_drive_template_url
     */
    public function setGoogleDriveTemplateUrl(string $google_drive_template_url): void
    {
        $this->google_drive_template_url = $google_drive_template_url;
    }

    /**
     * @return string
     *
     * @SerializedName("google_drive_template_url")
     */
    public function getGoogleDriveTemplateUrl(): string
    {
        return $this->google_drive_template_url;
    }

    /**
     * @param OdooRelation|null $filter_id
     */
    public function setFilterId(?OdooRelation $filter_id): void
    {
        $this->filter_id = $filter_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("filter_id")
     */
    public function getFilterId(): ?OdooRelation
    {
        return $this->filter_id;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'google.drive.config';
    }
}
