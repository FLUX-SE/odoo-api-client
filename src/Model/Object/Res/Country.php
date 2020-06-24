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
final class Country extends Base
{
    /**
     * Country Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Country Code
     *
     * @var string
     */
    private $code;

    /**
     * Layout in Reports
     *
     * @var string
     */
    private $address_format;

    /**
     * Input View
     *
     * @var View
     */
    private $address_view_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Image
     *
     * @var int
     */
    private $image;

    /**
     * Country Calling Code
     *
     * @var int
     */
    private $phone_code;

    /**
     * Country Groups
     *
     * @var Group
     */
    private $country_group_ids;

    /**
     * States
     *
     * @var State
     */
    private $state_ids;

    /**
     * Customer Name Position
     *
     * @var array
     */
    private $name_position;

    /**
     * Vat Label
     *
     * @var string
     */
    private $vat_label;

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
     * @param array $name_position
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNamePosition(array $name_position, bool $strict = true): bool
    {
        return in_array($name_position, $this->name_position, $strict);
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
     * @param string $vat_label
     */
    public function setVatLabel(string $vat_label): void
    {
        $this->vat_label = $vat_label;
    }

    /**
     * @param array $name_position
     */
    public function removeNamePosition(array $name_position): void
    {
        if ($this->hasNamePosition($name_position)) {
            $index = array_search($name_position, $this->name_position);
            unset($this->name_position[$index]);
        }
    }

    /**
     * @param array $name_position
     */
    public function addNamePosition(array $name_position): void
    {
        if ($this->hasNamePosition($name_position)) {
            return;
        }

        $this->name_position[] = $name_position;
    }

    /**
     * @param array $name_position
     */
    public function setNamePosition(array $name_position): void
    {
        $this->name_position = $name_position;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param State $state_ids
     */
    public function setStateIds(State $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param Group $country_group_ids
     */
    public function setCountryGroupIds(Group $country_group_ids): void
    {
        $this->country_group_ids = $country_group_ids;
    }

    /**
     * @param int $phone_code
     */
    public function setPhoneCode(int $phone_code): void
    {
        $this->phone_code = $phone_code;
    }

    /**
     * @param int $image
     */
    public function setImage(int $image): void
    {
        $this->image = $image;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param View $address_view_id
     */
    public function setAddressViewId(View $address_view_id): void
    {
        $this->address_view_id = $address_view_id;
    }

    /**
     * @param string $address_format
     */
    public function setAddressFormat(string $address_format): void
    {
        $this->address_format = $address_format;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
