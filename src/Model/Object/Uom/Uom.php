<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Uom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : uom.uom
 * ---
 * Name : uom.uom
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
final class Uom extends Base
{
    /**
     * Unit of Measure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Category
     * ---
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     * ---
     * Relation : many2one (uom.category)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $category_id;

    /**
     * Ratio
     * ---
     * How much bigger or smaller this unit is compared to the reference Unit of Measure for this category: 1 *
     * (reference unit) = ratio * (this unit)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $factor;

    /**
     * Bigger Ratio
     * ---
     * How many times this Unit of Measure is bigger than the reference Unit of Measure in this category: 1 * (this
     * unit) = ratio * (reference unit)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float
     */
    private $factor_inv;

    /**
     * Rounding Precision
     * ---
     * The computed quantity will be a multiple of this value. Use 1.0 for a Unit of Measure that cannot be further
     * split, such as a piece.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $rounding;

    /**
     * Active
     * ---
     * Uncheck the active field to disable a unit of measure without deleting it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Type
     * ---
     * Selection :
     *     -> bigger (Bigger than the reference Unit of Measure)
     *     -> reference (Reference Unit of Measure for this category)
     *     -> smaller (Smaller than the reference Unit of Measure)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $uom_type;

    /**
     * Type of measurement category
     * ---
     * Selection :
     *     -> unit (Default Units)
     *     -> weight (Default Weight)
     *     -> working_time (Default Working Time)
     *     -> length (Default Length)
     *     -> volume (Default Volume)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $measure_type;

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
     * @param string $name Unit of Measure
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $category_id Category
     *        ---
     *        Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     *        made based on the ratios.
     *        ---
     *        Relation : many2one (uom.category)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Category
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $factor Ratio
     *        ---
     *        How much bigger or smaller this unit is compared to the reference Unit of Measure for this category: 1 *
     *        (reference unit) = ratio * (this unit)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $factor_inv Bigger Ratio
     *        ---
     *        How many times this Unit of Measure is bigger than the reference Unit of Measure in this category: 1 * (this
     *        unit) = ratio * (reference unit)
     *        ---
     *        Searchable : no
     *        Sortable : no
     * @param float $rounding Rounding Precision
     *        ---
     *        The computed quantity will be a multiple of this value. Use 1.0 for a Unit of Measure that cannot be further
     *        split, such as a piece.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $uom_type Type
     *        ---
     *        Selection :
     *            -> bigger (Bigger than the reference Unit of Measure)
     *            -> reference (Reference Unit of Measure for this category)
     *            -> smaller (Smaller than the reference Unit of Measure)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $category_id,
        float $factor,
        float $factor_inv,
        float $rounding,
        string $uom_type
    ) {
        $this->name = $name;
        $this->category_id = $category_id;
        $this->factor = $factor;
        $this->factor_inv = $factor_inv;
        $this->rounding = $rounding;
        $this->uom_type = $uom_type;
    }

    /**
     * @param string $uom_type
     */
    public function setUomType(string $uom_type): void
    {
        $this->uom_type = $uom_type;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $measure_type
     */
    public function setMeasureType(?string $measure_type): void
    {
        $this->measure_type = $measure_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("measure_type")
     */
    public function getMeasureType(): ?string
    {
        return $this->measure_type;
    }

    /**
     * @return string
     *
     * @SerializedName("uom_type")
     */
    public function getUomType(): string
    {
        return $this->uom_type;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param float $rounding
     */
    public function setRounding(float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @return float
     *
     * @SerializedName("rounding")
     */
    public function getRounding(): float
    {
        return $this->rounding;
    }

    /**
     * @param float $factor_inv
     */
    public function setFactorInv(float $factor_inv): void
    {
        $this->factor_inv = $factor_inv;
    }

    /**
     * @return float
     *
     * @SerializedName("factor_inv")
     */
    public function getFactorInv(): float
    {
        return $this->factor_inv;
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
     *
     * @SerializedName("factor")
     */
    public function getFactor(): float
    {
        return $this->factor;
    }

    /**
     * @param OdooRelation $category_id
     */
    public function setCategoryId(OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'uom.uom';
    }
}
