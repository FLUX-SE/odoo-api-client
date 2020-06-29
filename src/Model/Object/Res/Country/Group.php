<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Country;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : res.country.group
 * Name : res.country.group
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
final class Group extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Countries
     *
     * @var null|Country[]
     */
    private $country_ids;

    /**
     * Pricelists
     *
     * @var null|Pricelist[]
     */
    private $pricelist_ids;

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
     * @param string $name Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Country[] $country_ids
     */
    public function setCountryIds(?array $country_ids): void
    {
        $this->country_ids = $country_ids;
    }

    /**
     * @param Country $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCountryIds(Country $item, bool $strict = true): bool
    {
        if (null === $this->country_ids) {
            return false;
        }

        return in_array($item, $this->country_ids, $strict);
    }

    /**
     * @param Country $item
     */
    public function addCountryIds(Country $item): void
    {
        if ($this->hasCountryIds($item)) {
            return;
        }

        if (null === $this->country_ids) {
            $this->country_ids = [];
        }

        $this->country_ids[] = $item;
    }

    /**
     * @param Country $item
     */
    public function removeCountryIds(Country $item): void
    {
        if (null === $this->country_ids) {
            $this->country_ids = [];
        }

        if ($this->hasCountryIds($item)) {
            $index = array_search($item, $this->country_ids);
            unset($this->country_ids[$index]);
        }
    }

    /**
     * @param null|Pricelist[] $pricelist_ids
     */
    public function setPricelistIds(?array $pricelist_ids): void
    {
        $this->pricelist_ids = $pricelist_ids;
    }

    /**
     * @param Pricelist $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPricelistIds(Pricelist $item, bool $strict = true): bool
    {
        if (null === $this->pricelist_ids) {
            return false;
        }

        return in_array($item, $this->pricelist_ids, $strict);
    }

    /**
     * @param Pricelist $item
     */
    public function addPricelistIds(Pricelist $item): void
    {
        if ($this->hasPricelistIds($item)) {
            return;
        }

        if (null === $this->pricelist_ids) {
            $this->pricelist_ids = [];
        }

        $this->pricelist_ids[] = $item;
    }

    /**
     * @param Pricelist $item
     */
    public function removePricelistIds(Pricelist $item): void
    {
        if (null === $this->pricelist_ids) {
            $this->pricelist_ids = [];
        }

        if ($this->hasPricelistIds($item)) {
            $index = array_search($item, $this->pricelist_ids);
            unset($this->pricelist_ids[$index]);
        }
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
