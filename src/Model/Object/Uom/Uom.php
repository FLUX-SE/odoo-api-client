<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Uom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : uom.uom
 * Name : uom.uom
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
final class Uom extends Base
{
    /**
     * Unit of Measure
     *
     * @var string
     */
    private $name;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     *
     * @var Category
     */
    private $category_id;

    /**
     * Ratio
     * How much bigger or smaller this unit is compared to the reference Unit of Measure for this category: 1 *
     * (reference unit) = ratio * (this unit)
     *
     * @var float
     */
    private $factor;

    /**
     * Bigger Ratio
     * How many times this Unit of Measure is bigger than the reference Unit of Measure in this category: 1 * (this
     * unit) = ratio * (reference unit)
     *
     * @var float
     */
    private $factor_inv;

    /**
     * Rounding Precision
     * The computed quantity will be a multiple of this value. Use 1.0 for a Unit of Measure that cannot be further
     * split, such as a piece.
     *
     * @var float
     */
    private $rounding;

    /**
     * Active
     * Uncheck the active field to disable a unit of measure without deleting it.
     *
     * @var null|bool
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
     * @param string $name Unit of Measure
     * @param Category $category_id Category
     *        Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     *        made based on the ratios.
     * @param float $factor Ratio
     *        How much bigger or smaller this unit is compared to the reference Unit of Measure for this category: 1 *
     *        (reference unit) = ratio * (this unit)
     * @param float $factor_inv Bigger Ratio
     *        How many times this Unit of Measure is bigger than the reference Unit of Measure in this category: 1 * (this
     *        unit) = ratio * (reference unit)
     * @param float $rounding Rounding Precision
     *        The computed quantity will be a multiple of this value. Use 1.0 for a Unit of Measure that cannot be further
     *        split, such as a piece.
     * @param array $uom_type Type
     */
    public function __construct(
        string $name,
        Category $category_id,
        float $factor,
        float $factor_inv,
        float $rounding,
        array $uom_type
    ) {
        $this->name = $name;
        $this->category_id = $category_id;
        $this->factor = $factor;
        $this->factor_inv = $factor_inv;
        $this->rounding = $rounding;
        $this->uom_type = $uom_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Category $category_id
     */
    public function setCategoryId(Category $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param float $factor
     */
    public function setFactor(float $factor): void
    {
        $this->factor = $factor;
    }

    /**
     * @return float
     */
    public function getFactorInv(): float
    {
        return $this->factor_inv;
    }

    /**
     * @param float $rounding
     */
    public function setRounding(float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
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
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUomType($item, bool $strict = true): bool
    {
        return in_array($item, $this->uom_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addUomType($item): void
    {
        if ($this->hasUomType($item)) {
            return;
        }

        $this->uom_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeUomType($item): void
    {
        if ($this->hasUomType($item)) {
            $index = array_search($item, $this->uom_type);
            unset($this->uom_type[$index]);
        }
    }

    /**
     * @return null|array
     */
    public function getMeasureType(): ?array
    {
        return $this->measure_type;
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
