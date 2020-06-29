<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Uom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : uom.category
 * Name : uom.category
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
final class Category extends Base
{
    /**
     * Unit of Measure Category
     *
     * @var string
     */
    private $name;

    /**
     * Type of Measure
     *
     * @var null|array
     */
    private $measure_type;

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
     * @param string $name Unit of Measure Category
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $measure_type
     */
    public function setMeasureType(?array $measure_type): void
    {
        $this->measure_type = $measure_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMeasureType($item, bool $strict = true): bool
    {
        if (null === $this->measure_type) {
            return false;
        }

        return in_array($item, $this->measure_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addMeasureType($item): void
    {
        if ($this->hasMeasureType($item)) {
            return;
        }

        if (null === $this->measure_type) {
            $this->measure_type = [];
        }

        $this->measure_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeMeasureType($item): void
    {
        if (null === $this->measure_type) {
            $this->measure_type = [];
        }

        if ($this->hasMeasureType($item)) {
            $index = array_search($item, $this->measure_type);
            unset($this->measure_type[$index]);
        }
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
