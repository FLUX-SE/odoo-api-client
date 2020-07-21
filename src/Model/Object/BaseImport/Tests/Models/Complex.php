<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base_import.tests.models.complex
 * Name : base_import.tests.models.complex
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
final class Complex extends Base
{
    /**
     * F
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $f;

    /**
     * M
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $m;

    /**
     * C
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $c;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * D
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $d;

    /**
     * Dt
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $dt;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @return float|null
     */
    public function getF(): ?float
    {
        return $this->f;
    }

    /**
     * @param DateTimeInterface|null $dt
     */
    public function setDt(?DateTimeInterface $dt): void
    {
        $this->dt = $dt;
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDt(): ?DateTimeInterface
    {
        return $this->dt;
    }

    /**
     * @param float|null $f
     */
    public function setF(?float $f): void
    {
        $this->f = $f;
    }

    /**
     * @param DateTimeInterface|null $d
     */
    public function setD(?DateTimeInterface $d): void
    {
        $this->d = $d;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getD(): ?DateTimeInterface
    {
        return $this->d;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param string|null $c
     */
    public function setC(?string $c): void
    {
        $this->c = $c;
    }

    /**
     * @return string|null
     */
    public function getC(): ?string
    {
        return $this->c;
    }

    /**
     * @param float|null $m
     */
    public function setM(?float $m): void
    {
        $this->m = $m;
    }

    /**
     * @return float|null
     */
    public function getM(): ?float
    {
        return $this->m;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base_import.tests.models.complex';
    }
}
