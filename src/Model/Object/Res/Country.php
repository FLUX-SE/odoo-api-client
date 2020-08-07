<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.country
 * ---
 * Name : res.country
 * ---
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
final class Country extends Base
{
    /**
     * Country Name
     * ---
     * The full name of the country.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Country Code
     * ---
     * The ISO country code in two chars. 
     * You can use this field for quick search.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $code;

    /**
     * Layout in Reports
     * ---
     * Display format to use for addresses belonging to this country.
     *
     * You can use python-style string pattern with all the fields of the address (for example, use '%(street)s' to
     * display the field 'street') plus
     * %(state_name)s: the name of the state
     * %(state_code)s: the code of the state
     * %(country_name)s: the name of the country
     * %(country_code)s: the code of the country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $address_format;

    /**
     * Input View
     * ---
     * Use this field if you want to replace the usual way to encode a complete address. Note that the address_format
     * field is used to modify the way to display addresses (in reports for example), while this field is used to
     * modify the input form for addresses.
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $address_view_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image;

    /**
     * Country Calling Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $phone_code;

    /**
     * Country Groups
     * ---
     * Relation : many2many (res.country.group)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country\Group
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $country_group_ids;

    /**
     * States
     * ---
     * Relation : one2many (res.country.state -> country_id)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country\State
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $state_ids;

    /**
     * Customer Name Position
     * ---
     * Determines where the customer/company name should be placed, i.e. after or before the address.
     * ---
     * Selection :
     *     -> before (Before Address)
     *     -> after (After Address)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name_position;

    /**
     * Vat Label
     * ---
     * Use this field if you want to change vat label.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $vat_label;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Country Name
     *        ---
     *        The full name of the country.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("vat_label")
     */
    public function getVatLabel(): ?string
    {
        return $this->vat_label;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("state_ids")
     */
    public function getStateIds(): ?array
    {
        return $this->state_ids;
    }

    /**
     * @param OdooRelation[]|null $state_ids
     */
    public function setStateIds(?array $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStateIds(OdooRelation $item): bool
    {
        if (null === $this->state_ids) {
            return false;
        }

        return in_array($item, $this->state_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStateIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeStateIds(OdooRelation $item): void
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
     * @return string|null
     *
     * @SerializedName("name_position")
     */
    public function getNamePosition(): ?string
    {
        return $this->name_position;
    }

    /**
     * @param string|null $name_position
     */
    public function setNamePosition(?string $name_position): void
    {
        $this->name_position = $name_position;
    }

    /**
     * @param string|null $vat_label
     */
    public function setVatLabel(?string $vat_label): void
    {
        $this->vat_label = $vat_label;
    }

    /**
     * @param OdooRelation $item
     */
    public function addCountryGroupIds(OdooRelation $item): void
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCountryGroupIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCountryGroupIds(OdooRelation $item): bool
    {
        if (null === $this->country_group_ids) {
            return false;
        }

        return in_array($item, $this->country_group_ids);
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("address_format")
     */
    public function getAddressFormat(): ?string
    {
        return $this->address_format;
    }

    /**
     * @param string|null $address_format
     */
    public function setAddressFormat(?string $address_format): void
    {
        $this->address_format = $address_format;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("address_view_id")
     */
    public function getAddressViewId(): ?OdooRelation
    {
        return $this->address_view_id;
    }

    /**
     * @param OdooRelation|null $address_view_id
     */
    public function setAddressViewId(?OdooRelation $address_view_id): void
    {
        $this->address_view_id = $address_view_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation[]|null $country_group_ids
     */
    public function setCountryGroupIds(?array $country_group_ids): void
    {
        $this->country_group_ids = $country_group_ids;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image")
     */
    public function getImage(): ?array
    {
        return $this->image;
    }

    /**
     * @param array|null $image
     */
    public function setImage(?array $image): void
    {
        $this->image = $image;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage($item): bool
    {
        if (null === $this->image) {
            return false;
        }

        return in_array($item, $this->image);
    }

    /**
     * @param mixed $item
     */
    public function addImage($item): void
    {
        if ($this->hasImage($item)) {
            return;
        }

        if (null === $this->image) {
            $this->image = [];
        }

        $this->image[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeImage($item): void
    {
        if (null === $this->image) {
            $this->image = [];
        }

        if ($this->hasImage($item)) {
            $index = array_search($item, $this->image);
            unset($this->image[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("phone_code")
     */
    public function getPhoneCode(): ?int
    {
        return $this->phone_code;
    }

    /**
     * @param int|null $phone_code
     */
    public function setPhoneCode(?int $phone_code): void
    {
        $this->phone_code = $phone_code;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("country_group_ids")
     */
    public function getCountryGroupIds(): ?array
    {
        return $this->country_group_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.country';
    }
}
