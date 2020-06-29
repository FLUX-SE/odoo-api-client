<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Change\Lock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.change.lock.date
 * Name : account.change.lock.date
 * Info :
 * This wizard is used to change the lock date
 */
final class Date extends Base
{
    /**
     * Lock Date for Non-Advisers
     * Only users with the Adviser role can edit accounts prior to and inclusive of this date. Use it for period
     * locking inside an open fiscal year, for example.
     *
     * @var null|DateTimeInterface
     */
    private $period_lock_date;

    /**
     * Lock Date for All Users
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     *
     * @var null|DateTimeInterface
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     * No users can edit journal entries related to a tax prior and inclusive of this date.
     *
     * @var null|DateTimeInterface
     */
    private $tax_lock_date;

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
     * @param null|DateTimeInterface $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @param null|DateTimeInterface $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @param null|DateTimeInterface $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
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
