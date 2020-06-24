<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency\Rate;

/**
 * Odoo model : res.currency
 * Name : res.currency
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
final class Currency extends Base
{
    /**
     * Currency
     *
     * @var null|string
     */
    private $name;

    /**
     * Symbol
     *
     * @var null|string
     */
    private $symbol;

    /**
     * Current Rate
     *
     * @var float
     */
    private $rate;

    /**
     * Rates
     *
     * @var Rate
     */
    private $rate_ids;

    /**
     * Rounding Factor
     *
     * @var float
     */
    private $rounding;

    /**
     * Decimal Places
     *
     * @var int
     */
    private $decimal_places;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Symbol Position
     *
     * @var array
     */
    private $position;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Currency Unit
     *
     * @var string
     */
    private $currency_unit_label;

    /**
     * Currency Subunit
     *
     * @var string
     */
    private $currency_subunit_label;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $position
     */
    public function removePosition(array $position): void
    {
        if ($this->hasPosition($position)) {
            $index = array_search($position, $this->position);
            unset($this->position[$index]);
        }
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param string $currency_subunit_label
     */
    public function setCurrencySubunitLabel(string $currency_subunit_label): void
    {
        $this->currency_subunit_label = $currency_subunit_label;
    }

    /**
     * @param string $currency_unit_label
     */
    public function setCurrencyUnitLabel(string $currency_unit_label): void
    {
        $this->currency_unit_label = $currency_unit_label;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param array $position
     */
    public function addPosition(array $position): void
    {
        if ($this->hasPosition($position)) {
            return;
        }

        $this->position[] = $position;
    }

    /**
     * @param null|string $symbol
     */
    public function setSymbol(?string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @param array $position
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPosition(array $position, bool $strict = true): bool
    {
        return in_array($position, $this->position, $strict);
    }

    /**
     * @param array $position
     */
    public function setPosition(array $position): void
    {
        $this->position = $position;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getDecimalPlaces(): int
    {
        return $this->decimal_places;
    }

    /**
     * @param float $rounding
     */
    public function setRounding(float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @param Rate $rate_ids
     */
    public function setRateIds(Rate $rate_ids): void
    {
        $this->rate_ids = $rate_ids;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
