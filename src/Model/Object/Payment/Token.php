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
final class Token extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Short name
     *
     * @var string
     */
    private $short_name;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Acquirer Account
     *
     * @var null|Acquirer
     */
    private $acquirer_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Acquirer Ref.
     *
     * @var null|string
     */
    private $acquirer_ref;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Payment Transactions
     *
     * @var Transaction
     */
    private $payment_ids;

    /**
     * Verified
     *
     * @var bool
     */
    private $verified;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->short_name;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Acquirer $acquirer_id
     */
    public function setAcquirerId(Acquirer $acquirer_id): void
    {
        $this->acquirer_id = $acquirer_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param null|string $acquirer_ref
     */
    public function setAcquirerRef(?string $acquirer_ref): void
    {
        $this->acquirer_ref = $acquirer_ref;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Transaction $payment_ids
     */
    public function setPaymentIds(Transaction $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
    }

    /**
     * @param bool $verified
     */
    public function setVerified(bool $verified): void
    {
        $this->verified = $verified;
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
