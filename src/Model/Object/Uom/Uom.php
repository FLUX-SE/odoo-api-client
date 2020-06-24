<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Uom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : uom.uom
 * Name : uom.uom
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
final class Uom extends Base
{
    /**
     * Unit of Measure
     *
     * @var null|string
     */
    private $name;

    /**
     * Category
     *
     * @var null|Category
     */
    private $category_id;

    /**
     * Ratio
     *
     * @var null|float
     */
    private $factor;

    /**
     * Bigger Ratio
     *
     * @var null|float
     */
    private $factor_inv;

    /**
     * Rounding Precision
     *
     * @var null|float
     */
    private $rounding;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Type
     *
     * @var array
     */
    private $uom_type;

    /**
     * Type of measurement category
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
     * @param null|Category $category_id
     */
    public function setCategoryId(Category $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param null|float $factor
     */
    public function setFactor(?float $factor): void
    {
        $this->factor = $factor;
    }

    /**
     * @return null|float
     */
    public function getFactorInv(): ?float
    {
        return $this->factor_inv;
    }

    /**
     * @param null|float $rounding
     */
    public function setRounding(?float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param array $uom_type
     */
    public function setUomType(array $uom_type): void
    {
        $this->uom_type = $uom_type;
    }

    /**
     * @param array $uom_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUomType(array $uom_type, bool $strict = true): bool
    {
        return in_array($uom_type, $this->uom_type, $strict);
    }

    /**
     * @param array $uom_type
     */
    public function addUomType(array $uom_type): void
    {
        if ($this->hasUomType($uom_type)) {
            return;
        }

        $this->uom_type[] = $uom_type;
    }

    /**
     * @param array $uom_type
     */
    public function removeUomType(array $uom_type): void
    {
        if ($this->hasUomType($uom_type)) {
            $index = array_search($uom_type, $this->uom_type);
            unset($this->uom_type[$index]);
        }
    }

    /**
     * @return array
     */
    public function getMeasureType(): array
    {
        return $this->measure_type;
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
