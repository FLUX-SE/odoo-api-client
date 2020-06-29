<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Sequence\DateRange;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.sequence
 * Name : ir.sequence
 * Info :
 * Sequence model.
 *
 * The sequence model allows to define and use so-called sequence objects.
 * Such objects are used to generate unique identifiers in a transaction-safe
 * way.
 */
final class Sequence extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Sequence Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Implementation
     * While assigning a sequence number to a record, the 'no gap' sequence implementation ensures that each previous
     * sequence number has been assigned already. While this sequence implementation will not skip any sequence
     * number upon assignation, there can still be gaps in the sequence if records are deleted. The 'no gap'
     * implementation is slower than the standard one.
     *
     * @var array
     */
    private $implementation;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Prefix
     * Prefix value of the record for the sequence
     *
     * @var null|string
     */
    private $prefix;

    /**
     * Suffix
     * Suffix value of the record for the sequence
     *
     * @var null|string
     */
    private $suffix;

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
     * Step
     * The next number of the sequence will be incremented by this number
     *
     * @var int
     */
    private $number_increment;

    /**
     * Sequence Size
     * Odoo will automatically adds some '0' on the left of the 'Next Number' to get the required padding size.
     *
     * @var int
     */
    private $padding;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Use subsequences per date_range
     *
     * @var null|bool
     */
    private $use_date_range;

    /**
     * Subsequences
     *
     * @var null|DateRange[]
     */
    private $date_range_ids;

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
     * @param array $implementation Implementation
     *        While assigning a sequence number to a record, the 'no gap' sequence implementation ensures that each previous
     *        sequence number has been assigned already. While this sequence implementation will not skip any sequence
     *        number upon assignation, there can still be gaps in the sequence if records are deleted. The 'no gap'
     *        implementation is slower than the standard one.
     * @param int $number_next Next Number
     *        Next number of this sequence
     * @param int $number_increment Step
     *        The next number of the sequence will be incremented by this number
     * @param int $padding Sequence Size
     *        Odoo will automatically adds some '0' on the left of the 'Next Number' to get the required padding size.
     */
    public function __construct(
        string $name,
        array $implementation,
        int $number_next,
        int $number_increment,
        int $padding
    ) {
        $this->name = $name;
        $this->implementation = $implementation;
        $this->number_next = $number_next;
        $this->number_increment = $number_increment;
        $this->padding = $padding;
    }

    /**
     * @param int $padding
     */
    public function setPadding(int $padding): void
    {
        $this->padding = $padding;
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
     * @param DateRange $item
     */
    public function removeDateRangeIds(DateRange $item): void
    {
        if (null === $this->date_range_ids) {
            $this->date_range_ids = [];
        }

        if ($this->hasDateRangeIds($item)) {
            $index = array_search($item, $this->date_range_ids);
            unset($this->date_range_ids[$index]);
        }
    }

    /**
     * @param DateRange $item
     */
    public function addDateRangeIds(DateRange $item): void
    {
        if ($this->hasDateRangeIds($item)) {
            return;
        }

        if (null === $this->date_range_ids) {
            $this->date_range_ids = [];
        }

        $this->date_range_ids[] = $item;
    }

    /**
     * @param DateRange $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDateRangeIds(DateRange $item, bool $strict = true): bool
    {
        if (null === $this->date_range_ids) {
            return false;
        }

        return in_array($item, $this->date_range_ids, $strict);
    }

    /**
     * @param null|DateRange[] $date_range_ids
     */
    public function setDateRangeIds(?array $date_range_ids): void
    {
        $this->date_range_ids = $date_range_ids;
    }

    /**
     * @param null|bool $use_date_range
     */
    public function setUseDateRange(?bool $use_date_range): void
    {
        $this->use_date_range = $use_date_range;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param int $number_increment
     */
    public function setNumberIncrement(int $number_increment): void
    {
        $this->number_increment = $number_increment;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $number_next_actual
     */
    public function setNumberNextActual(?int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
    }

    /**
     * @param int $number_next
     */
    public function setNumberNext(int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @param null|string $suffix
     */
    public function setSuffix(?string $suffix): void
    {
        $this->suffix = $suffix;
    }

    /**
     * @param null|string $prefix
     */
    public function setPrefix(?string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param mixed $item
     */
    public function removeImplementation($item): void
    {
        if ($this->hasImplementation($item)) {
            $index = array_search($item, $this->implementation);
            unset($this->implementation[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImplementation($item): void
    {
        if ($this->hasImplementation($item)) {
            return;
        }

        $this->implementation[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasImplementation($item, bool $strict = true): bool
    {
        return in_array($item, $this->implementation, $strict);
    }

    /**
     * @param array $implementation
     */
    public function setImplementation(array $implementation): void
    {
        $this->implementation = $implementation;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
