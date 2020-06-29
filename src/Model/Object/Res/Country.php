<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Country\Group;
use Flux\OdooApiClient\Model\Object\Res\Country\State;

/**
 * Odoo model : res.country
 * Name : res.country
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
final class Country extends Base
{
    /**
     * Country Name
     * The full name of the country.
     *
     * @var string
     */
    private $name;

    /**
     * Country Code
     * The ISO country code in two chars. 
     * You can use this field for quick search.
     *
     * @var null|string
     */
    private $code;

    /**
     * Layout in Reports
     * Display format to use for addresses belonging to this country.
     *
     * You can use python-style string pattern with all the fields of the address (for example, use '%(street)s' to
     * display the field 'street') plus
     * %(state_name)s: the name of the state
     * %(state_code)s: the code of the state
     * %(country_name)s: the name of the country
     * %(country_code)s: the code of the country
     *
     * @var null|string
     */
    private $address_format;

    /**
     * Input View
     * Use this field if you want to replace the usual way to encode a complete address. Note that the address_format
     * field is used to modify the way to display addresses (in reports for example), while this field is used to
     * modify the input form for addresses.
     *
     * @var null|View
     */
    private $address_view_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Image
     *
     * @var null|int
     */
    private $image;

    /**
     * Country Calling Code
     *
     * @var null|int
     */
    private $phone_code;

    /**
     * Country Groups
     *
     * @var null|Group[]
     */
    private $country_group_ids;

    /**
     * States
     *
     * @var null|State[]
     */
    private $state_ids;

    /**
     * Customer Name Position
     * Determines where the customer/company name should be placed, i.e. after or before the address.
     *
     * @var null|array
     */
    private $name_position;

    /**
     * Vat Label
     * Use this field if you want to change vat label.
     *
     * @var null|string
     */
    private $vat_label;

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
     * @param string $name Country Name
     *        The full name of the country.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param State $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStateIds(State $item, bool $strict = true): bool
    {
        if (null === $this->state_ids) {
            return false;
        }

        return in_array($item, $this->state_ids, $strict);
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
     * @param null|string $vat_label
     */
    public function setVatLabel(?string $vat_label): void
    {
        $this->vat_label = $vat_label;
    }

    /**
     * @param mixed $item
     */
    public function removeNamePosition($item): void
    {
        if (null === $this->name_position) {
            $this->name_position = [];
        }

        if ($this->hasNamePosition($item)) {
            $index = array_search($item, $this->name_position);
            unset($this->name_position[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addNamePosition($item): void
    {
        if ($this->hasNamePosition($item)) {
            return;
        }

        if (null === $this->name_position) {
            $this->name_position = [];
        }

        $this->name_position[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNamePosition($item, bool $strict = true): bool
    {
        if (null === $this->name_position) {
            return false;
        }

        return in_array($item, $this->name_position, $strict);
    }

    /**
     * @param null|array $name_position
     */
    public function setNamePosition(?array $name_position): void
    {
        $this->name_position = $name_position;
    }

    /**
     * @param State $item
     */
    public function removeStateIds(State $item): void
    {
        if (null === $this->state_ids) {
            $this->state_ids = [];
        }

        if ($this->hasStateIds($item)) {
            $index = array_search($item, $this->state_ids);
            unset($this->state_ids[$index]);
        }
    }

    /**
     * @param State $item
     */
    public function addStateIds(State $item): void
    {
        if ($this->hasStateIds($item)) {
            return;
        }

        if (null === $this->state_ids) {
            $this->state_ids = [];
        }

        $this->state_ids[] = $item;
    }

    /**
     * @param null|State[] $state_ids
     */
    public function setStateIds(?array $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @param null|Group[] $country_group_ids
     */
    public function setCountryGroupIds(?array $country_group_ids): void
    {
        $this->country_group_ids = $country_group_ids;
    }

    /**
     * @param null|int $phone_code
     */
    public function setPhoneCode(?int $phone_code): void
    {
        $this->phone_code = $phone_code;
    }

    /**
     * @param null|int $image
     */
    public function setImage(?int $image): void
    {
        $this->image = $image;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|View $address_view_id
     */
    public function setAddressViewId(?View $address_view_id): void
    {
        $this->address_view_id = $address_view_id;
    }

    /**
     * @param null|string $address_format
     */
    public function setAddressFormat(?string $address_format): void
    {
        $this->address_format = $address_format;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
