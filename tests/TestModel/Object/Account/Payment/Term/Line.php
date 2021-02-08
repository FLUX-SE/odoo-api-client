<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Term;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.payment.term.line
 * ---
 * Name : account.payment.term.line
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Line extends Base
{
    /**
     * Type
     * ---
     * Select here the kind of valuation related to this payment terms line.
     * ---
     * Selection :
     *     -> balance (Balance)
     *     -> percent (Percent)
     *     -> fixed (Fixed Amount)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $value;

    /**
     * Value
     * ---
     * For percent enter a ratio between 0-100.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $value_amount;

    /**
     * Number of Days
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $days;

    /**
     * Day of the month
     * ---
     * Day of the month on which the invoice must come to its term. If zero or negative, this value will be ignored,
     * and no specific day will be set. If greater than the last day of a month, this number will instead select the
     * last day of this month.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $day_of_the_month;

    /**
     * Options
     * ---
     * Selection :
     *     -> day_after_invoice_date (days after the invoice date)
     *     -> after_invoice_month (days after the end of the invoice month)
     *     -> day_following_month (of the following month)
     *     -> day_current_month (of the current month)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $option;

    /**
     * Payment Terms
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_id;

    /**
     * Sequence
     * ---
     * Gives the sequence order when displaying a list of payment terms lines.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $value Type
     *        ---
     *        Select here the kind of valuation related to this payment terms line.
     *        ---
     *        Selection :
     *            -> balance (Balance)
     *            -> percent (Percent)
     *            -> fixed (Fixed Amount)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $days Number of Days
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $option Options
     *        ---
     *        Selection :
     *            -> day_after_invoice_date (days after the invoice date)
     *            -> after_invoice_month (days after the end of the invoice month)
     *            -> day_following_month (of the following month)
     *            -> day_current_month (of the current month)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $payment_id Payment Terms
     *        ---
     *        Relation : many2one (account.payment.term)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment\Term
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $value, int $days, string $option, OdooRelation $payment_id)
    {
        $this->value = $value;
        $this->days = $days;
        $this->option = $option;
        $this->payment_id = $payment_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param OdooRelation $payment_id
     */
    public function setPaymentId(OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return string
     *
     * @SerializedName("value")
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("payment_id")
     */
    public function getPaymentId(): OdooRelation
    {
        return $this->payment_id;
    }

    /**
     * @param string $option
     */
    public function setOption(string $option): void
    {
        $this->option = $option;
    }

    /**
     * @return string
     *
     * @SerializedName("option")
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param int|null $day_of_the_month
     */
    public function setDayOfTheMonth(?int $day_of_the_month): void
    {
        $this->day_of_the_month = $day_of_the_month;
    }

    /**
     * @return int|null
     *
     * @SerializedName("day_of_the_month")
     */
    public function getDayOfTheMonth(): ?int
    {
        return $this->day_of_the_month;
    }

    /**
     * @param int $days
     */
    public function setDays(int $days): void
    {
        $this->days = $days;
    }

    /**
     * @return int
     *
     * @SerializedName("days")
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @param float|null $value_amount
     */
    public function setValueAmount(?float $value_amount): void
    {
        $this->value_amount = $value_amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("value_amount")
     */
    public function getValueAmount(): ?float
    {
        return $this->value_amount;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.payment.term.line';
    }
}
