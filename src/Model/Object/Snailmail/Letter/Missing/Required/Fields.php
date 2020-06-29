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
 * Info :
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
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Letter
     *
     * @var null|Letter
     */
    private $letter_id;

    /**
     * Street
     *
     * @var null|string
     */
    private $street;

    /**
     * Street2
     *
     * @var null|string
     */
    private $street2;

    /**
     * Zip
     *
     * @var null|string
     */
    private $zip;

    /**
     * City
     *
     * @var null|string
     */
    private $city;

    /**
     * State
     *
     * @var null|State
     */
    private $state_id;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

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
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Letter $letter_id
     */
    public function setLetterId(?Letter $letter_id): void
    {
        $this->letter_id = $letter_id;
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param null|string $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param null|State $state_id
     */
    public function setStateId(?State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
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
