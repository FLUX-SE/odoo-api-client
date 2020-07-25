<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object;

use DateTimeInterface;
use Flux\OdooApiClient\Model\BaseInterface;

/**
 * Odoo model : base
 * Name : base
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
class Base implements BaseInterface
{
    /**
     * ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
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
