<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment.method
 * Name : account.payment.method
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
final class Method extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Payment Type
     *
     * @var array
     */
    private $payment_type;

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
     * @param string $code Code
     * @param array $payment_type Payment Type
     */
    public function __construct(string $name, string $code, array $payment_type)
    {
        $this->name = $name;
        $this->code = $code;
        $this->payment_type = $payment_type;
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
     * @param array $payment_type
     */
    public function setPaymentType(array $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentType($item, bool $strict = true): bool
    {
        return in_array($item, $this->payment_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPaymentType($item): void
    {
        if ($this->hasPaymentType($item)) {
            return;
        }

        $this->payment_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentType($item): void
    {
        if ($this->hasPaymentType($item)) {
            $index = array_search($item, $this->payment_type);
            unset($this->payment_type[$index]);
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
