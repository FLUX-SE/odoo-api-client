<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Uom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : uom.category
 * Name : uom.category
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
final class Category extends Base
{
    /**
     * Unit of Measure Category
     *
     * @var null|string
     */
    private $name;

    /**
     * Type of Measure
     *
     * @var array
     */
    private $measure_type;

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
     * @param array $measure_type
     */
    public function setMeasureType(array $measure_type): void
    {
        $this->measure_type = $measure_type;
    }

    /**
     * @param array $measure_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMeasureType(array $measure_type, bool $strict = true): bool
    {
        return in_array($measure_type, $this->measure_type, $strict);
    }

    /**
     * @param array $measure_type
     */
    public function addMeasureType(array $measure_type): void
    {
        if ($this->hasMeasureType($measure_type)) {
            return;
        }

        $this->measure_type[] = $measure_type;
    }

    /**
     * @param array $measure_type
     */
    public function removeMeasureType(array $measure_type): void
    {
        if ($this->hasMeasureType($measure_type)) {
            $index = array_search($measure_type, $this->measure_type);
            unset($this->measure_type[$index]);
        }
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
