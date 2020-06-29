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
final class Account extends Base
{
    /**
     * Service Name
     *
     * @var null|string
     */
    private $service_name;

    /**
     * Account Token
     *
     * @var null|string
     */
    private $account_token;

    /**
     * Company
     *
     * @var null|Company[]
     */
    private $company_ids;

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
     * @param null|string $service_name
     */
    public function setServiceName(?string $service_name): void
    {
        $this->service_name = $service_name;
    }

    /**
     * @param null|string $account_token
     */
    public function setAccountToken(?string $account_token): void
    {
        $this->account_token = $account_token;
    }

    /**
     * @param null|Company[] $company_ids
     */
    public function setCompanyIds(?array $company_ids): void
    {
        $this->company_ids = $company_ids;
    }

    /**
     * @param Company $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompanyIds(Company $item, bool $strict = true): bool
    {
        if (null === $this->company_ids) {
            return false;
        }

        return in_array($item, $this->company_ids, $strict);
    }

    /**
     * @param Company $item
     */
    public function addCompanyIds(Company $item): void
    {
        if ($this->hasCompanyIds($item)) {
            return;
        }

        if (null === $this->company_ids) {
            $this->company_ids = [];
        }

        $this->company_ids[] = $item;
    }

    /**
     * @param Company $item
     */
    public function removeCompanyIds(Company $item): void
    {
        if (null === $this->company_ids) {
            $this->company_ids = [];
        }

        if ($this->hasCompanyIds($item)) {
            $index = array_search($item, $this->company_ids);
            unset($this->company_ids[$index]);
        }
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
