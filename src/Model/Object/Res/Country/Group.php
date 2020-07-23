<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Country;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : res.country.group
 * Name : res.country.group
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
final class Group extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Countries
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $country_ids;

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
     * Pricelists
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $pricelist_ids;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePricelistIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addPricelistIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPricelistIds(OdooRelation $item): bool
    {
        if (null === $this->pricelist_ids) {
            return false;
        }

        return in_array($item, $this->pricelist_ids);
    }

    /**
     * @param OdooRelation[]|null $pricelist_ids
     */
    public function setPricelistIds(?array $pricelist_ids): void
    {
        $this->pricelist_ids = $pricelist_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPricelistIds(): ?array
    {
        return $this->pricelist_ids;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
     * @param OdooRelation $item
     */
    public function removeCountryIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addCountryIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCountryIds(OdooRelation $item): bool
    {
        if (null === $this->country_ids) {
            return false;
        }

        return in_array($item, $this->country_ids);
    }

    /**
     * @param OdooRelation[]|null $country_ids
     */
    public function setCountryIds(?array $country_ids): void
    {
        $this->country_ids = $country_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getCountryIds(): ?array
    {
        return $this->country_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.country.group';
    }
}
