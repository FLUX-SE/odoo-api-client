<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : res.lang
 * Name : res.lang
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
final class Lang extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Locale Code
     *
     * @var null|string
     */
    private $code;

    /**
     * ISO code
     *
     * @var string
     */
    private $iso_code;

    /**
     * URL Code
     *
     * @var null|string
     */
    private $url_code;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Direction
     *
     * @var null|array
     */
    private $direction;

    /**
     * Date Format
     *
     * @var null|string
     */
    private $date_format;

    /**
     * Time Format
     *
     * @var null|string
     */
    private $time_format;

    /**
     * First Day of Week
     *
     * @var null|array
     */
    private $week_start;

    /**
     * Separator Format
     *
     * @var null|string
     */
    private $grouping;

    /**
     * Decimal Separator
     *
     * @var null|string
     */
    private $decimal_point;

    /**
     * Thousands Separator
     *
     * @var string
     */
    private $thousands_sep;

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
     * @param ?array $week_start
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWeekStart(?array $week_start, bool $strict = true): bool
    {
        if (null === $this->week_start) {
            return false;
        }

        return in_array($week_start, $this->week_start, $strict);
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
     * @param string $thousands_sep
     */
    public function setThousandsSep(string $thousands_sep): void
    {
        $this->thousands_sep = $thousands_sep;
    }

    /**
     * @param null|string $decimal_point
     */
    public function setDecimalPoint(?string $decimal_point): void
    {
        $this->decimal_point = $decimal_point;
    }

    /**
     * @param null|string $grouping
     */
    public function setGrouping(?string $grouping): void
    {
        $this->grouping = $grouping;
    }

    /**
     * @param ?array $week_start
     */
    public function removeWeekStart(?array $week_start): void
    {
        if ($this->hasWeekStart($week_start)) {
            $index = array_search($week_start, $this->week_start);
            unset($this->week_start[$index]);
        }
    }

    /**
     * @param ?array $week_start
     */
    public function addWeekStart(?array $week_start): void
    {
        if ($this->hasWeekStart($week_start)) {
            return;
        }

        if (null === $this->week_start) {
            $this->week_start = [];
        }

        $this->week_start[] = $week_start;
    }

    /**
     * @param null|array $week_start
     */
    public function setWeekStart(?array $week_start): void
    {
        $this->week_start = $week_start;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|string $time_format
     */
    public function setTimeFormat(?string $time_format): void
    {
        $this->time_format = $time_format;
    }

    /**
     * @param null|string $date_format
     */
    public function setDateFormat(?string $date_format): void
    {
        $this->date_format = $date_format;
    }

    /**
     * @param ?array $direction
     */
    public function removeDirection(?array $direction): void
    {
        if ($this->hasDirection($direction)) {
            $index = array_search($direction, $this->direction);
            unset($this->direction[$index]);
        }
    }

    /**
     * @param ?array $direction
     */
    public function addDirection(?array $direction): void
    {
        if ($this->hasDirection($direction)) {
            return;
        }

        if (null === $this->direction) {
            $this->direction = [];
        }

        $this->direction[] = $direction;
    }

    /**
     * @param ?array $direction
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDirection(?array $direction, bool $strict = true): bool
    {
        if (null === $this->direction) {
            return false;
        }

        return in_array($direction, $this->direction, $strict);
    }

    /**
     * @param null|array $direction
     */
    public function setDirection(?array $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|string $url_code
     */
    public function setUrlCode(?string $url_code): void
    {
        $this->url_code = $url_code;
    }

    /**
     * @param string $iso_code
     */
    public function setIsoCode(string $iso_code): void
    {
        $this->iso_code = $iso_code;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
