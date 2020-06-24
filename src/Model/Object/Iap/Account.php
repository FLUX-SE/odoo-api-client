<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Iap;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : iap.account
 * Name : iap.account
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
final class Account extends Base
{
    /**
     * Service Name
     *
     * @var string
     */
    private $service_name;

    /**
     * Account Token
     *
     * @var string
     */
    private $account_token;

    /**
     * Company
     *
     * @var Company
     */
    private $company_ids;

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
     * @param string $service_name
     */
    public function setServiceName(string $service_name): void
    {
        $this->service_name = $service_name;
    }

    /**
     * @param string $account_token
     */
    public function setAccountToken(string $account_token): void
    {
        $this->account_token = $account_token;
    }

    /**
     * @param Company $company_ids
     */
    public function setCompanyIds(Company $company_ids): void
    {
        $this->company_ids = $company_ids;
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
