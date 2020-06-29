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
final class Line extends Base
{
    /**
     * Type
     * Select here the kind of valuation related to this payment terms line.
     *
     * @var array
     */
    private $value;

    /**
     * Value
     * For percent enter a ratio between 0-100.
     *
     * @var null|float
     */
    private $value_amount;

    /**
     * Number of Days
     *
     * @var int
     */
    private $days;

    /**
     * Day of the month
     * Day of the month on which the invoice must come to its term. If zero or negative, this value will be ignored,
     * and no specific day will be set. If greater than the last day of a month, this number will instead select the
     * last day of this month.
     *
     * @var null|int
     */
    private $day_of_the_month;

    /**
     * Options
     *
     * @var array
     */
    private $option;

    /**
     * Payment Terms
     *
     * @var Term
     */
    private $payment_id;

    /**
     * Sequence
     * Gives the sequence order when displaying a list of payment terms lines.
     *
     * @var null|int
     */
    private $sequence;

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
     * @param array $value Type
     *        Select here the kind of valuation related to this payment terms line.
     * @param int $days Number of Days
     * @param array $option Options
     * @param Term $payment_id Payment Terms
     */
    public function __construct(array $value, int $days, array $option, Term $payment_id)
    {
        $this->value = $value;
        $this->days = $days;
        $this->option = $option;
        $this->payment_id = $payment_id;
    }

    /**
     * @param mixed $item
     */
    public function addOption($item): void
    {
        if ($this->hasOption($item)) {
            return;
        }

        $this->option[] = $item;
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
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Term $payment_id
     */
    public function setPaymentId(Term $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @param mixed $item
     */
    public function removeOption($item): void
    {
        if ($this->hasOption($item)) {
            $index = array_search($item, $this->option);
            unset($this->option[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOption($item, bool $strict = true): bool
    {
        return in_array($item, $this->option, $strict);
    }

    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
        $this->value = $value;
    }

    /**
     * @param array $option
     */
    public function setOption(array $option): void
    {
        $this->option = $option;
    }

    /**
     * @param null|int $day_of_the_month
     */
    public function setDayOfTheMonth(?int $day_of_the_month): void
    {
        $this->day_of_the_month = $day_of_the_month;
    }

    /**
     * @param int $days
     */
    public function setDays(int $days): void
    {
        $this->days = $days;
    }

    /**
     * @param null|float $value_amount
     */
    public function setValueAmount(?float $value_amount): void
    {
        $this->value_amount = $value_amount;
    }

    /**
     * @param mixed $item
     */
    public function removeValue($item): void
    {
        if ($this->hasValue($item)) {
            $index = array_search($item, $this->value);
            unset($this->value[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addValue($item): void
    {
        if ($this->hasValue($item)) {
            return;
        }

        $this->value[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasValue($item, bool $strict = true): bool
    {
        return in_array($item, $this->value, $strict);
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
