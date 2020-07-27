<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Sequence;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.sequence.date_range
 * ---
 * Name : ir.sequence.date_range
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
final class DateRange extends Base
{
    /**
     * From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Main Sequence
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sequence_id;

    /**
     * Next Number
     * ---
     * Next number of this sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $number_next;

    /**
     * Actual Next Number
     * ---
     * Next number that will be used. This number can be incremented frequently so the displayed value might already
     * be obsolete
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $number_next_actual;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param DateTimeInterface $date_from From
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_to To
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sequence_id Main Sequence
     *        ---
     *        Relation : many2one (ir.sequence)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $number_next Next Number
     *        ---
     *        Next number of this sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        OdooRelation $sequence_id,
        int $number_next
    ) {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->sequence_id = $sequence_id;
        $this->number_next = $number_next;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param int|null $number_next_actual
     */
    public function setNumberNextActual(?int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateFrom(): DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @return int|null
     */
    public function getNumberNextActual(): ?int
    {
        return $this->number_next_actual;
    }

    /**
     * @param int $number_next
     */
    public function setNumberNext(int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @return int
     */
    public function getNumberNext(): int
    {
        return $this->number_next;
    }

    /**
     * @param OdooRelation $sequence_id
     */
    public function setSequenceId(OdooRelation $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @return OdooRelation
     */
    public function getSequenceId(): OdooRelation
    {
        return $this->sequence_id;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateTo(): DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.sequence.date_range';
    }
}
