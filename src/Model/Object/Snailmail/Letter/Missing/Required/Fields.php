<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Snailmail\Letter\Missing\Required;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Snailmail\Letter;

/**
 * Odoo model : snailmail.letter.missing.required.fields
 * Name : snailmail.letter.missing.required.fields
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Fields extends Base
{
    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Letter
     *
     * @var Letter
     */
    private $letter_id;

    /**
     * Street
     *
     * @var string
     */
    private $street;

    /**
     * Street2
     *
     * @var string
     */
    private $street2;

    /**
     * Zip
     *
     * @var string
     */
    private $zip;

    /**
     * City
     *
     * @var string
     */
    private $city;

    /**
     * State
     *
     * @var State
     */
    private $state_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

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
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param Letter $letter_id
     */
    public function setLetterId(Letter $letter_id): void
    {
        $this->letter_id = $letter_id;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param string $street2
     */
    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param State $state_id
     */
    public function setStateId(State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
