<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Snailmail\Letter\Missing\Required;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : snailmail.letter.missing.required.fields
 * ---
 * Name : snailmail.letter.missing.required.fields
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Fields extends Base
{
    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Letter
     * ---
     * Relation : many2one (snailmail.letter)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Snailmail\Letter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $letter_id;

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
     * State
     * ---
     * Relation : many2one (res.country.state)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country\State
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $state_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $state_id
     */
    public function setStateId(?OdooRelation $state_id): void
    {
        $this->state_id = $state_id;
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
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("state_id")
     */
    public function getStateId(): ?OdooRelation
    {
        return $this->state_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param OdooRelation|null $letter_id
     */
    public function setLetterId(?OdooRelation $letter_id): void
    {
        $this->letter_id = $letter_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("letter_id")
     */
    public function getLetterId(): ?OdooRelation
    {
        return $this->letter_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'snailmail.letter.missing.required.fields';
    }
}