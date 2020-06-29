<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Sequence;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Sequence;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.sequence.date_range
 * Name : ir.sequence.date_range
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
final class DateRange extends Base
{
    /**
     * From
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * To
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Main Sequence
     *
     * @var Sequence
     */
    private $sequence_id;

    /**
     * Next Number
     * Next number of this sequence
     *
     * @var int
     */
    private $number_next;

    /**
     * Actual Next Number
     * Next number that will be used. This number can be incremented frequently so the displayed value might already
     * be obsolete
     *
     * @var null|int
     */
    private $number_next_actual;

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
     * @param DateTimeInterface $date_from From
     * @param DateTimeInterface $date_to To
     * @param Sequence $sequence_id Main Sequence
     * @param int $number_next Next Number
     *        Next number of this sequence
     */
    public function __construct(
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        Sequence $sequence_id,
        int $number_next
    ) {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->sequence_id = $sequence_id;
        $this->number_next = $number_next;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param Sequence $sequence_id
     */
    public function setSequenceId(Sequence $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @param int $number_next
     */
    public function setNumberNext(int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @param null|int $number_next_actual
     */
    public function setNumberNextActual(?int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
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
