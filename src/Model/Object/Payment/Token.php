<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.token
 * Name : payment.token
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
final class Token extends Base
{
    /**
     * Name
     * Name of the payment token
     *
     * @var null|string
     */
    private $name;

    /**
     * Short name
     *
     * @var null|string
     */
    private $short_name;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Acquirer Account
     *
     * @var Acquirer
     */
    private $acquirer_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Acquirer Ref.
     *
     * @var string
     */
    private $acquirer_ref;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Payment Transactions
     *
     * @var null|Transaction[]
     */
    private $payment_ids;

    /**
     * Verified
     *
     * @var null|bool
     */
    private $verified;

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
     * @param Partner $partner_id Partner
     * @param Acquirer $acquirer_id Acquirer Account
     * @param string $acquirer_ref Acquirer Ref.
     */
    public function __construct(Partner $partner_id, Acquirer $acquirer_id, string $acquirer_ref)
    {
        $this->partner_id = $partner_id;
        $this->acquirer_id = $acquirer_id;
        $this->acquirer_ref = $acquirer_ref;
    }

    /**
     * @param Transaction $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentIds(Transaction $item, bool $strict = true): bool
    {
        if (null === $this->payment_ids) {
            return false;
        }

        return in_array($item, $this->payment_ids, $strict);
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|bool $verified
     */
    public function setVerified(?bool $verified): void
    {
        $this->verified = $verified;
    }

    /**
     * @param Transaction $item
     */
    public function removePaymentIds(Transaction $item): void
    {
        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        if ($this->hasPaymentIds($item)) {
            $index = array_search($item, $this->payment_ids);
            unset($this->payment_ids[$index]);
        }
    }

    /**
     * @param Transaction $item
     */
    public function addPaymentIds(Transaction $item): void
    {
        if ($this->hasPaymentIds($item)) {
            return;
        }

        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        $this->payment_ids[] = $item;
    }

    /**
     * @param null|Transaction[] $payment_ids
     */
    public function setPaymentIds(?array $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $acquirer_ref
     */
    public function setAcquirerRef(string $acquirer_ref): void
    {
        $this->acquirer_ref = $acquirer_ref;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param Acquirer $acquirer_id
     */
    public function setAcquirerId(Acquirer $acquirer_id): void
    {
        $this->acquirer_id = $acquirer_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return null|string
     */
    public function getShortName(): ?string
    {
        return $this->short_name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
