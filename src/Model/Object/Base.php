<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object;

use DateTimeInterface;

/**
 * Odoo model : base
 * Name : base
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
class Base
{
    /**
     * ID
     *
     * @var null|int
     */
    protected $id;

    /**
     * Display Name
     *
     * @var null|string
     */
    protected $display_name;

    /**
     * Last Modified on
     *
     * @var null|DateTimeInterface
     */
    protected $__last_update;

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getDisplayName(): ?string
    {
        return $this->display_name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLastUpdate(): ?DateTimeInterface
    {
        return $this->__last_update;
    }
}
