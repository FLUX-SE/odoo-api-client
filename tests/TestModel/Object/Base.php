<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : base
 * ---
 * Name : base
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
class Base implements BaseInterface
{
    /**
     * ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null|false
     */
    protected $id;

    /**
     * Display Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $display_name;

    /**
     * Last Modified on
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $__last_update;

    /**
     * @return int|null|false
     *
     * @SerializedName("id")
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null|false $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_name")
     */
    public function getDisplayName(): ?string
    {
        return $this->display_name;
    }

    /**
     * @param string|null $display_name
     */
    public function setDisplayName(?string $display_name): void
    {
        $this->display_name = $display_name;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("__last_update")
     */
    public function getLastUpdate(): ?DateTimeInterface
    {
        return $this->__last_update;
    }

    /**
     * @param DateTimeInterface|null $__last_update
     */
    public function setLastUpdate(?DateTimeInterface $__last_update): void
    {
        $this->__last_update = $__last_update;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base';
    }
}
