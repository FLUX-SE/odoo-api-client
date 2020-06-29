<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Country;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : res.country.state
 * Name : res.country.state
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
final class State extends Base
{
    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * State Name
     * Administrative divisions of a country. E.g. Fed. State, Departement, Canton
     *
     * @var string
     */
    private $name;

    /**
     * State Code
     * The state code.
     *
     * @var string
     */
    private $code;

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
     * @param Country $country_id Country
     * @param string $name State Name
     *        Administrative divisions of a country. E.g. Fed. State, Departement, Canton
     * @param string $code State Code
     *        The state code.
     */
    public function __construct(Country $country_id, string $name, string $code)
    {
        $this->country_id = $country_id;
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
