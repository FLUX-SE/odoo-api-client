<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Change\Lock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.change.lock.date
 * Name : account.change.lock.date
 *
 * This wizard is used to change the lock date
 */
final class Date extends Base
{
    /**
     * Lock Date for Non-Advisers
     *
     * @var DateTimeInterface
     */
    private $period_lock_date;

    /**
     * Lock Date for All Users
     *
     * @var DateTimeInterface
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     *
     * @var DateTimeInterface
     */
    private $tax_lock_date;

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
     * @param DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param DateTimeInterface $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @param DateTimeInterface $tax_lock_date
     */
    public function setTaxLockDate(DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
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
