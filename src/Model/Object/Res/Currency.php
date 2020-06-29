<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency\Rate;

/**
 * Odoo model : res.currency
 * Name : res.currency
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
final class Currency extends Base
{
    /**
     * Currency
     * Currency Code (ISO 4217)
     *
     * @var string
     */
    private $name;

    /**
     * Symbol
     * Currency sign, to be used when printing amounts.
     *
     * @var string
     */
    private $symbol;

    /**
     * Current Rate
     * The rate of the currency to the currency of rate 1.
     *
     * @var null|float
     */
    private $rate;

    /**
     * Rates
     *
     * @var null|Rate[]
     */
    private $rate_ids;

    /**
     * Rounding Factor
     *
     * @var null|float
     */
    private $rounding;

    /**
     * Decimal Places
     *
     * @var null|int
     */
    private $decimal_places;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Symbol Position
     * Determines where the currency symbol should be placed after or before the amount.
     *
     * @var null|array
     */
    private $position;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Currency Unit
     * Currency Unit Name
     *
     * @var null|string
     */
    private $currency_unit_label;

    /**
     * Currency Subunit
     * Currency Subunit Name
     *
     * @var null|string
     */
    private $currency_subunit_label;

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
     * @param string $name Currency
     *        Currency Code (ISO 4217)
     * @param string $symbol Symbol
     *        Currency sign, to be used when printing amounts.
     */
    public function __construct(string $name, string $symbol)
    {
        $this->name = $name;
        $this->symbol = $symbol;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPosition($item, bool $strict = true): bool
    {
        if (null === $this->position) {
            return false;
        }

        return in_array($item, $this->position, $strict);
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|string $currency_subunit_label
     */
    public function setCurrencySubunitLabel(?string $currency_subunit_label): void
    {
        $this->currency_subunit_label = $currency_subunit_label;
    }

    /**
     * @param null|string $currency_unit_label
     */
    public function setCurrencyUnitLabel(?string $currency_unit_label): void
    {
        $this->currency_unit_label = $currency_unit_label;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param mixed $item
     */
    public function removePosition($item): void
    {
        if (null === $this->position) {
            $this->position = [];
        }

        if ($this->hasPosition($item)) {
            $index = array_search($item, $this->position);
            unset($this->position[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPosition($item): void
    {
        if ($this->hasPosition($item)) {
            return;
        }

        if (null === $this->position) {
            $this->position = [];
        }

        $this->position[] = $item;
    }

    /**
     * @param null|array $position
     */
    public function setPosition(?array $position): void
    {
        $this->position = $position;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|int
     */
    public function getDecimalPlaces(): ?int
    {
        return $this->decimal_places;
    }

    /**
     * @param null|float $rounding
     */
    public function setRounding(?float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @param Rate $item
     */
    public function removeRateIds(Rate $item): void
    {
        if (null === $this->rate_ids) {
            $this->rate_ids = [];
        }

        if ($this->hasRateIds($item)) {
            $index = array_search($item, $this->rate_ids);
            unset($this->rate_ids[$index]);
        }
    }

    /**
     * @param Rate $item
     */
    public function addRateIds(Rate $item): void
    {
        if ($this->hasRateIds($item)) {
            return;
        }

        if (null === $this->rate_ids) {
            $this->rate_ids = [];
        }

        $this->rate_ids[] = $item;
    }

    /**
     * @param Rate $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRateIds(Rate $item, bool $strict = true): bool
    {
        if (null === $this->rate_ids) {
            return false;
        }

        return in_array($item, $this->rate_ids, $strict);
    }

    /**
     * @param null|Rate[] $rate_ids
     */
    public function setRateIds(?array $rate_ids): void
    {
        $this->rate_ids = $rate_ids;
    }

    /**
     * @return null|float
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
