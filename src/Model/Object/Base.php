<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object;

use DateTimeInterface;

/**
 * Odoo model : base
 * Name : base
 *
 * The base model, which is implicitly inherited by all models.
 */
class Base
{
    /**
     * ID
     *
     * @var int
     */
    protected $id;

    /**
     * Display Name
     *
     * @var string
     */
    protected $display_name;

    /**
     * Last Modified on
     *
     * @var DateTimeInterface
     */
    protected $__last_update;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->display_name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getLastUpdate(): DateTimeInterface
    {
        return $this->__last_update;
    }
}
