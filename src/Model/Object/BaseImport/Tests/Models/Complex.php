<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base_import.tests.models.complex
 * Name : base_import.tests.models.complex
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Complex extends Base
{
    /**
     * F
     *
     * @var null|float
     */
    private $f;

    /**
     * M
     *
     * @var null|float
     */
    private $m;

    /**
     * C
     *
     * @var null|string
     */
    private $c;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * D
     *
     * @var null|DateTimeInterface
     */
    private $d;

    /**
     * Dt
     *
     * @var null|DateTimeInterface
     */
    private $dt;

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
     * @return null|float
     */
    public function getF(): ?float
    {
        return $this->f;
    }

    /**
     * @return null|float
     */
    public function getM(): ?float
    {
        return $this->m;
    }

    /**
     * @return null|string
     */
    public function getC(): ?string
    {
        return $this->c;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getD(): ?DateTimeInterface
    {
        return $this->d;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDt(): ?DateTimeInterface
    {
        return $this->dt;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
