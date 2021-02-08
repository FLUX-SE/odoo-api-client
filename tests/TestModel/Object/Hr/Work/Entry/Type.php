<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Work\Entry;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.work.entry.type
 * ---
 * Name : hr.work.entry.type
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
final class Type extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Active
     * ---
     * If the active field is set to false, it will allow you to hide the work entry type without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Time Off
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_leave;

    /**
     * Unforeseen Absence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_unforeseen;

    /**
     * Rounding
     * ---
     * Selection :
     *     -> NO (No Rounding)
     *     -> HALF (Half Day)
     *     -> FULL (Day)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $round_days;

    /**
     * Round Type
     * ---
     * Selection :
     *     -> HALF-UP (Closest)
     *     -> UP (Up)
     *     -> DOWN (Down)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $round_days_type;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Code
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $round_days Rounding
     *        ---
     *        Selection :
     *            -> NO (No Rounding)
     *            -> HALF (Half Day)
     *            -> FULL (Day)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $round_days_type Round Type
     *        ---
     *        Selection :
     *            -> HALF-UP (Closest)
     *            -> UP (Up)
     *            -> DOWN (Down)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $code, string $round_days, string $round_days_type)
    {
        $this->name = $name;
        $this->code = $code;
        $this->round_days = $round_days;
        $this->round_days_type = $round_days_type;
    }

    /**
     * @return string
     *
     * @SerializedName("round_days")
     */
    public function getRoundDays(): string
    {
        return $this->round_days;
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
     * @param string $round_days_type
     */
    public function setRoundDaysType(string $round_days_type): void
    {
        $this->round_days_type = $round_days_type;
    }

    /**
     * @return string
     *
     * @SerializedName("round_days_type")
     */
    public function getRoundDaysType(): string
    {
        return $this->round_days_type;
    }

    /**
     * @param string $round_days
     */
    public function setRoundDays(string $round_days): void
    {
        $this->round_days = $round_days;
    }

    /**
     * @param bool|null $is_unforeseen
     */
    public function setIsUnforeseen(?bool $is_unforeseen): void
    {
        $this->is_unforeseen = $is_unforeseen;
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
     * @return bool|null
     *
     * @SerializedName("is_unforeseen")
     */
    public function isIsUnforeseen(): ?bool
    {
        return $this->is_unforeseen;
    }

    /**
     * @param bool|null $is_leave
     */
    public function setIsLeave(?bool $is_leave): void
    {
        $this->is_leave = $is_leave;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_leave")
     */
    public function isIsLeave(): ?bool
    {
        return $this->is_leave;
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
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
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
        return 'hr.work.entry.type';
    }
}
