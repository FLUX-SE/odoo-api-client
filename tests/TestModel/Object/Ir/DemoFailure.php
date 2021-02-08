<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.demo_failure
 * ---
 * Name : ir.demo_failure
 * ---
 * Info :
 * Stores modules for which we could not install demo data
 */
final class DemoFailure extends Base
{
    /**
     * Module
     * ---
     * Relation : many2one (ir.module.module)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $module_id;

    /**
     * Error
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $error;

    /**
     * Wizard
     * ---
     * Relation : many2one (ir.demo_failure.wizard)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\DemoFailure\Wizard
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wizard_id;

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
     * @param OdooRelation $module_id Module
     *        ---
     *        Relation : many2one (ir.module.module)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Module\Module
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $module_id)
    {
        $this->module_id = $module_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("module_id")
     */
    public function getModuleId(): OdooRelation
    {
        return $this->module_id;
    }

    /**
     * @param OdooRelation $module_id
     */
    public function setModuleId(OdooRelation $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("error")
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     */
    public function setError(?string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("wizard_id")
     */
    public function getWizardId(): ?OdooRelation
    {
        return $this->wizard_id;
    }

    /**
     * @param OdooRelation|null $wizard_id
     */
    public function setWizardId(?OdooRelation $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.demo_failure';
    }
}