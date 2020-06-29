<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : res.lang
 * Name : res.lang
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
final class Lang extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Locale Code
     * This field is used to set/get locales for user
     *
     * @var string
     */
    private $code;

    /**
     * ISO code
     * This ISO code is the name of po files to use for translations
     *
     * @var null|string
     */
    private $iso_code;

    /**
     * URL Code
     * The Lang Code displayed in the URL
     *
     * @var string
     */
    private $url_code;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Direction
     *
     * @var array
     */
    private $direction;

    /**
     * Date Format
     *
     * @var string
     */
    private $date_format;

    /**
     * Time Format
     *
     * @var string
     */
    private $time_format;

    /**
     * First Day of Week
     *
     * @var array
     */
    private $week_start;

    /**
     * Separator Format
     * The Separator Format should be like [,n] where 0 < n :starting from Unit digit. -1 will end the separation.
     * e.g. [3,2,-1] will represent 106500 to be 1,06,500; [1,2,-1] will represent it to be 106,50,0;[3] will
     * represent it as 106,500. Provided ',' as the thousand separator in each case.
     *
     * @var string
     */
    private $grouping;

    /**
     * Decimal Separator
     *
     * @var string
     */
    private $decimal_point;

    /**
     * Thousands Separator
     *
     * @var null|string
     */
    private $thousands_sep;

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
     * @param string $code Locale Code
     *        This field is used to set/get locales for user
     * @param string $url_code URL Code
     *        The Lang Code displayed in the URL
     * @param array $direction Direction
     * @param string $date_format Date Format
     * @param string $time_format Time Format
     * @param array $week_start First Day of Week
     * @param string $grouping Separator Format
     *        The Separator Format should be like [,n] where 0 < n :starting from Unit digit. -1 will end the separation.
     *        e.g. [3,2,-1] will represent 106500 to be 1,06,500; [1,2,-1] will represent it to be 106,50,0;[3] will
     *        represent it as 106,500. Provided ',' as the thousand separator in each case.
     * @param string $decimal_point Decimal Separator
     */
    public function __construct(
        string $name,
        string $code,
        string $url_code,
        array $direction,
        string $date_format,
        string $time_format,
        array $week_start,
        string $grouping,
        string $decimal_point
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->url_code = $url_code;
        $this->direction = $direction;
        $this->date_format = $date_format;
        $this->time_format = $time_format;
        $this->week_start = $week_start;
        $this->grouping = $grouping;
        $this->decimal_point = $decimal_point;
    }

    /**
     * @param array $week_start
     */
    public function setWeekStart(array $week_start): void
    {
        $this->week_start = $week_start;
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
     * @param null|string $thousands_sep
     */
    public function setThousandsSep(?string $thousands_sep): void
    {
        $this->thousands_sep = $thousands_sep;
    }

    /**
     * @param string $decimal_point
     */
    public function setDecimalPoint(string $decimal_point): void
    {
        $this->decimal_point = $decimal_point;
    }

    /**
     * @param string $grouping
     */
    public function setGrouping(string $grouping): void
    {
        $this->grouping = $grouping;
    }

    /**
     * @param mixed $item
     */
    public function removeWeekStart($item): void
    {
        if ($this->hasWeekStart($item)) {
            $index = array_search($item, $this->week_start);
            unset($this->week_start[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addWeekStart($item): void
    {
        if ($this->hasWeekStart($item)) {
            return;
        }

        $this->week_start[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWeekStart($item, bool $strict = true): bool
    {
        return in_array($item, $this->week_start, $strict);
    }

    /**
     * @param string $time_format
     */
    public function setTimeFormat(string $time_format): void
    {
        $this->time_format = $time_format;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $date_format
     */
    public function setDateFormat(string $date_format): void
    {
        $this->date_format = $date_format;
    }

    /**
     * @param mixed $item
     */
    public function removeDirection($item): void
    {
        if ($this->hasDirection($item)) {
            $index = array_search($item, $this->direction);
            unset($this->direction[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDirection($item): void
    {
        if ($this->hasDirection($item)) {
            return;
        }

        $this->direction[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDirection($item, bool $strict = true): bool
    {
        return in_array($item, $this->direction, $strict);
    }

    /**
     * @param array $direction
     */
    public function setDirection(array $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $url_code
     */
    public function setUrlCode(string $url_code): void
    {
        $this->url_code = $url_code;
    }

    /**
     * @param null|string $iso_code
     */
    public function setIsoCode(?string $iso_code): void
    {
        $this->iso_code = $iso_code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
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
