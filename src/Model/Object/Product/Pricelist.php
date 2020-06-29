<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Pricelist\Item;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country\Group;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.pricelist
 * Name : product.pricelist
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
final class Pricelist extends Base
{
    /**
     * Pricelist Name
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * If unchecked, it will allow you to hide the pricelist without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Pricelist Items
     *
     * @var null|Item[]
     */
    private $item_ids;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Country Groups
     *
     * @var null|Group[]
     */
    private $country_group_ids;

    /**
     * Discount Policy
     *
     * @var null|array
     */
    private $discount_policy;

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
     * @param string $name Pricelist Name
     * @param Currency $currency_id Currency
     */
    public function __construct(string $name, Currency $currency_id)
    {
        $this->name = $name;
        $this->currency_id = $currency_id;
    }

    /**
     * @param Group $item
     */
    public function addCountryGroupIds(Group $item): void
    {
        if ($this->hasCountryGroupIds($item)) {
            return;
        }

        if (null === $this->country_group_ids) {
            $this->country_group_ids = [];
        }

        $this->country_group_ids[] = $item;
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
     * @param mixed $item
     */
    public function removeDiscountPolicy($item): void
    {
        if (null === $this->discount_policy) {
            $this->discount_policy = [];
        }

        if ($this->hasDiscountPolicy($item)) {
            $index = array_search($item, $this->discount_policy);
            unset($this->discount_policy[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDiscountPolicy($item): void
    {
        if ($this->hasDiscountPolicy($item)) {
            return;
        }

        if (null === $this->discount_policy) {
            $this->discount_policy = [];
        }

        $this->discount_policy[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDiscountPolicy($item, bool $strict = true): bool
    {
        if (null === $this->discount_policy) {
            return false;
        }

        return in_array($item, $this->discount_policy, $strict);
    }

    /**
     * @param null|array $discount_policy
     */
    public function setDiscountPolicy(?array $discount_policy): void
    {
        $this->discount_policy = $discount_policy;
    }

    /**
     * @param Group $item
     */
    public function removeCountryGroupIds(Group $item): void
    {
        if (null === $this->country_group_ids) {
            $this->country_group_ids = [];
        }

        if ($this->hasCountryGroupIds($item)) {
            $index = array_search($item, $this->country_group_ids);
            unset($this->country_group_ids[$index]);
        }
    }

    /**
     * @param Group $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCountryGroupIds(Group $item, bool $strict = true): bool
    {
        if (null === $this->country_group_ids) {
            return false;
        }

        return in_array($item, $this->country_group_ids, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Group[] $country_group_ids
     */
    public function setCountryGroupIds(?array $country_group_ids): void
    {
        $this->country_group_ids = $country_group_ids;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param Item $item
     */
    public function removeItemIds(Item $item): void
    {
        if (null === $this->item_ids) {
            $this->item_ids = [];
        }

        if ($this->hasItemIds($item)) {
            $index = array_search($item, $this->item_ids);
            unset($this->item_ids[$index]);
        }
    }

    /**
     * @param Item $item
     */
    public function addItemIds(Item $item): void
    {
        if ($this->hasItemIds($item)) {
            return;
        }

        if (null === $this->item_ids) {
            $this->item_ids = [];
        }

        $this->item_ids[] = $item;
    }

    /**
     * @param Item $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasItemIds(Item $item, bool $strict = true): bool
    {
        if (null === $this->item_ids) {
            return false;
        }

        return in_array($item, $this->item_ids, $strict);
    }

    /**
     * @param null|Item[] $item_ids
     */
    public function setItemIds(?array $item_ids): void
    {
        $this->item_ids = $item_ids;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
