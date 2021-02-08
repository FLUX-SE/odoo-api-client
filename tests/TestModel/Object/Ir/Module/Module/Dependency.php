<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Module\Module;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.module.module.dependency
 * ---
 * Name : ir.module.module.dependency
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
final class Dependency extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Module
     * ---
     * Relation : many2one (ir.module.module)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $module_id;

    /**
     * Dependency
     * ---
     * Relation : many2one (ir.module.module)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $depend_id;

    /**
     * Status
     * ---
     * Selection :
     *     -> uninstallable (Uninstallable)
     *     -> uninstalled (Not Installed)
     *     -> installed (Installed)
     *     -> to upgrade (To be upgraded)
     *     -> to remove (To be removed)
     *     -> to install (To be installed)
     *     -> unknown (Unknown)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * Auto Install Required
     * ---
     * Whether this dependency blocks automatic installation of the dependent
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_install_required;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * @param bool|null $auto_install_required
     */
    public function setAutoInstallRequired(?bool $auto_install_required): void
    {
        $this->auto_install_required = $auto_install_required;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_install_required")
     */
    public function isAutoInstallRequired(): ?bool
    {
        return $this->auto_install_required;
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
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation|null $depend_id
     */
    public function setDependId(?OdooRelation $depend_id): void
    {
        $this->depend_id = $depend_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("depend_id")
     */
    public function getDependId(): ?OdooRelation
    {
        return $this->depend_id;
    }

    /**
     * @param OdooRelation|null $module_id
     */
    public function setModuleId(?OdooRelation $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("module_id")
     */
    public function getModuleId(): ?OdooRelation
    {
        return $this->module_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.module.module.dependency';
    }
}
