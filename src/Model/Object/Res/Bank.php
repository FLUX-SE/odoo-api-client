<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country\State;

/**
 * Odoo model : res.bank
 * Name : res.bank
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
final class Bank extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

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
     * Fed. State
     *
     * @var null|State
     */
    private $state;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country;

    /**
     * Email
     *
     * @var null|string
     */
    private $email;

    /**
     * Phone
     *
     * @var null|string
     */
    private $phone;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Bank Identifier Code
     * Sometimes called BIC or Swift.
     *
     * @var null|string
     */
    private $bic;

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
     * @param null|State $state
     */
    public function setState(?State $state): void
    {
        $this->state = $state;
    }

    /**
     * @param null|Country $country
     */
    public function setCountry(?Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|string $bic
     */
    public function setBic(?string $bic): void
    {
        $this->bic = $bic;
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
