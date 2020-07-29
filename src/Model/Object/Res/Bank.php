<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.bank
 * ---
 * Name : res.bank
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
final class Bank extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Street
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $street;

    /**
     * Street2
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $street2;

    /**
     * Zip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $zip;

    /**
     * City
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $city;

    /**
     * Fed. State
     * ---
     * Relation : many2one (res.country.state)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country\State
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $state;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email;

    /**
     * Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $phone;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Bank Identifier Code
     * ---
     * Sometimes called BIC or Swift.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $bic;

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
     * @param string $name Name
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
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
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
     *
     * @SerializedName("write_date")
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
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $bic
     */
    public function setBic(?string $bic): void
    {
        $this->bic = $bic;
    }

    /**
     * @return string|null
     *
     * @SerializedName("bic")
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
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
     * @return string|null
     *
     * @SerializedName("email")
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param OdooRelation|null $country
     */
    public function setCountry(?OdooRelation $country): void
    {
        $this->country = $country;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country")
     */
    public function getCountry(): ?OdooRelation
    {
        return $this->country;
    }

    /**
     * @param OdooRelation|null $state
     */
    public function setState(?OdooRelation $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?OdooRelation
    {
        return $this->state;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     *
     * @SerializedName("city")
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string|null
     *
     * @SerializedName("zip")
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @return string|null
     *
     * @SerializedName("street2")
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     *
     * @SerializedName("street")
     */
    public function getStreet(): ?string
    {
        return $this->street;
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
        return 'res.bank';
    }
}
