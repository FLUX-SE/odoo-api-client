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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Sequence Code
     *
     * @var string
     */
    private $code;

    /**
     * Implementation
     *
     * @var null|array
     */
    private $implementation;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Prefix
     *
     * @var string
     */
    private $prefix;

    /**
     * Suffix
     *
     * @var string
     */
    private $suffix;

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
     * Step
     *
     * @var null|int
     */
    private $number_increment;

    /**
     * Sequence Size
     *
     * @var null|int
     */
    private $padding;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Use subsequences per date_range
     *
     * @var bool
     */
    private $use_date_range;

    /**
     * Subsequences
     *
     * @var DateRange
     */
    private $date_range_ids;

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
     * @param null|int $number_increment
     */
    public function setNumberIncrement(?int $number_increment): void
    {
        $this->number_increment = $number_increment;
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
     * @param DateRange $date_range_ids
     */
    public function setDateRangeIds(DateRange $date_range_ids): void
    {
        $this->date_range_ids = $date_range_ids;
    }

    /**
     * @param bool $use_date_range
     */
    public function setUseDateRange(bool $use_date_range): void
    {
        $this->use_date_range = $use_date_range;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|int $padding
     */
    public function setPadding(?int $padding): void
    {
        $this->padding = $padding;
    }

    /**
     * @param int $number_next_actual
     */
    public function setNumberNextActual(int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|int $number_next
     */
    public function setNumberNext(?int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix(string $suffix): void
    {
        $this->suffix = $suffix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param ?array $implementation
     */
    public function removeImplementation(?array $implementation): void
    {
        if ($this->hasImplementation($implementation)) {
            $index = array_search($implementation, $this->implementation);
            unset($this->implementation[$index]);
        }
    }

    /**
     * @param ?array $implementation
     */
    public function addImplementation(?array $implementation): void
    {
        if ($this->hasImplementation($implementation)) {
            return;
        }

        if (null === $this->implementation) {
            $this->implementation = [];
        }

        $this->implementation[] = $implementation;
    }

    /**
     * @param ?array $implementation
     * @param bool $strict
     *
     * @return bool
     */
    public function hasImplementation(?array $implementation, bool $strict = true): bool
    {
        if (null === $this->implementation) {
            return false;
        }

        return in_array($implementation, $this->implementation, $strict);
    }

    /**
     * @param null|array $implementation
     */
    public function setImplementation(?array $implementation): void
    {
        $this->implementation = $implementation;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
