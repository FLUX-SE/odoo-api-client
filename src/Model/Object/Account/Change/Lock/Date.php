<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Change\Lock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.change.lock.date
 * Name : account.change.lock.date
 * Info :
 * This wizard is used to change the lock date
 */
final class Date extends Base
{
    public const ODOO_MODEL_NAME = 'account.change.lock.date';

    /**
     * Lock Date for Non-Advisers
     * Only users with the Adviser role can edit accounts prior to and inclusive of this date. Use it for period
     * locking inside an open fiscal year, for example.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $period_lock_date;

    /**
     * Lock Date for All Users
     * No users, including Advisers, can edit accounts prior to and inclusive of this date. Use it for fiscal year
     * locking for example.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $fiscalyear_lock_date;

    /**
     * Tax Lock Date
     * No users can edit journal entries related to a tax prior and inclusive of this date.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $tax_lock_date;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @return DateTimeInterface|null
     */
    public function getPeriodLockDate(): ?DateTimeInterface
    {
        return $this->period_lock_date;
    }

    /**
     * @param DateTimeInterface|null $period_lock_date
     */
    public function setPeriodLockDate(?DateTimeInterface $period_lock_date): void
    {
        $this->period_lock_date = $period_lock_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getFiscalyearLockDate(): ?DateTimeInterface
    {
        return $this->fiscalyear_lock_date;
    }

    /**
     * @param DateTimeInterface|null $fiscalyear_lock_date
     */
    public function setFiscalyearLockDate(?DateTimeInterface $fiscalyear_lock_date): void
    {
        $this->fiscalyear_lock_date = $fiscalyear_lock_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTaxLockDate(): ?DateTimeInterface
    {
        return $this->tax_lock_date;
    }

    /**
     * @param DateTimeInterface|null $tax_lock_date
     */
    public function setTaxLockDate(?DateTimeInterface $tax_lock_date): void
    {
        $this->tax_lock_date = $tax_lock_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
