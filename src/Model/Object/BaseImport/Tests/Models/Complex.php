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
 *
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
     * @var float
     */
    private $f;

    /**
     * M
     *
     * @var float
     */
    private $m;

    /**
     * C
     *
     * @var string
     */
    private $c;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * D
     *
     * @var DateTimeInterface
     */
    private $d;

    /**
     * Dt
     *
     * @var DateTimeInterface
     */
    private $dt;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @return float
     */
    public function getF(): float
    {
        return $this->f;
    }

    /**
     * @return float
     */
    public function getM(): float
    {
        return $this->m;
    }

    /**
     * @return string
     */
    public function getC(): string
    {
        return $this->c;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getD(): DateTimeInterface
    {
        return $this->d;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDt(): DateTimeInterface
    {
        return $this->dt;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
