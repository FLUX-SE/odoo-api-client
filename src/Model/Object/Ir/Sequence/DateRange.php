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
final class DateRange extends Base
{
    /**
     * From
     *
     * @var null|DateTimeInterface
     */
    private $date_from;

    /**
     * To
     *
     * @var null|DateTimeInterface
     */
    private $date_to;

    /**
     * Main Sequence
     *
     * @var null|Sequence
     */
    private $sequence_id;

    /**
     * Next Number
     *
     * @var null|int
     */
    private $number_next;

    /**
     * Actual Next Number
     *
     * @var int
     */
    private $number_next_actual;

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
     * @param null|DateTimeInterface $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param null|DateTimeInterface $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param null|Sequence $sequence_id
     */
    public function setSequenceId(Sequence $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @param null|int $number_next
     */
    public function setNumberNext(?int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @param int $number_next_actual
     */
    public function setNumberNextActual(int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
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
