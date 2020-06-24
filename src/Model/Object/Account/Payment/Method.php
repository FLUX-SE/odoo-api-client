<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment.method
 * Name : account.payment.method
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
final class Method extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Payment Type
     *
     * @var null|array
     */
    private $payment_type;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|array $payment_type
     */
    public function setPaymentType(?array $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @param ?array $payment_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentType(?array $payment_type, bool $strict = true): bool
    {
        if (null === $this->payment_type) {
            return false;
        }

        return in_array($payment_type, $this->payment_type, $strict);
    }

    /**
     * @param ?array $payment_type
     */
    public function addPaymentType(?array $payment_type): void
    {
        if ($this->hasPaymentType($payment_type)) {
            return;
        }

        if (null === $this->payment_type) {
            $this->payment_type = [];
        }

        $this->payment_type[] = $payment_type;
    }

    /**
     * @param ?array $payment_type
     */
    public function removePaymentType(?array $payment_type): void
    {
        if ($this->hasPaymentType($payment_type)) {
            $index = array_search($payment_type, $this->payment_type);
            unset($this->payment_type[$index]);
        }
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
