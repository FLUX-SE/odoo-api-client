<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment\Term;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment.term.line
 * Name : account.payment.term.line
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
final class Line extends Base
{
    /**
     * Type
     *
     * @var null|array
     */
    private $value;

    /**
     * Value
     *
     * @var float
     */
    private $value_amount;

    /**
     * Number of Days
     *
     * @var null|int
     */
    private $days;

    /**
     * Day of the month
     *
     * @var int
     */
    private $day_of_the_month;

    /**
     * Options
     *
     * @var null|array
     */
    private $option;

    /**
     * Payment Terms
     *
     * @var null|Term
     */
    private $payment_id;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @param null|array $value
     */
    public function setValue(?array $value): void
    {
        $this->value = $value;
    }

    /**
     * @param ?array $option
     */
    public function addOption(?array $option): void
    {
        if ($this->hasOption($option)) {
            return;
        }

        if (null === $this->option) {
            $this->option = [];
        }

        $this->option[] = $option;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Term $payment_id
     */
    public function setPaymentId(Term $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @param ?array $option
     */
    public function removeOption(?array $option): void
    {
        if ($this->hasOption($option)) {
            $index = array_search($option, $this->option);
            unset($this->option[$index]);
        }
    }

    /**
     * @param ?array $option
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOption(?array $option, bool $strict = true): bool
    {
        if (null === $this->option) {
            return false;
        }

        return in_array($option, $this->option, $strict);
    }

    /**
     * @param ?array $value
     * @param bool $strict
     *
     * @return bool
     */
    public function hasValue(?array $value, bool $strict = true): bool
    {
        if (null === $this->value) {
            return false;
        }

        return in_array($value, $this->value, $strict);
    }

    /**
     * @param null|array $option
     */
    public function setOption(?array $option): void
    {
        $this->option = $option;
    }

    /**
     * @param int $day_of_the_month
     */
    public function setDayOfTheMonth(int $day_of_the_month): void
    {
        $this->day_of_the_month = $day_of_the_month;
    }

    /**
     * @param null|int $days
     */
    public function setDays(?int $days): void
    {
        $this->days = $days;
    }

    /**
     * @param float $value_amount
     */
    public function setValueAmount(float $value_amount): void
    {
        $this->value_amount = $value_amount;
    }

    /**
     * @param ?array $value
     */
    public function removeValue(?array $value): void
    {
        if ($this->hasValue($value)) {
            $index = array_search($value, $this->value);
            unset($this->value[$index]);
        }
    }

    /**
     * @param ?array $value
     */
    public function addValue(?array $value): void
    {
        if ($this->hasValue($value)) {
            return;
        }

        if (null === $this->value) {
            $this->value = [];
        }

        $this->value[] = $value;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
