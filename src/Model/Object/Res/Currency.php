<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.currency
 * ---
 * Name : res.currency
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
final class Currency extends Base
{
    /**
     * Currency
     * ---
     * Currency Code (ISO 4217)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Symbol
     * ---
     * Currency sign, to be used when printing amounts.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $symbol;

    /**
     * Current Rate
     * ---
     * The rate of the currency to the currency of rate 1.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $rate;

    /**
     * Rates
     * ---
     * Relation : one2many (res.currency.rate -> currency_id)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency\Rate
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rate_ids;

    /**
     * Rounding Factor
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $rounding;

    /**
     * Decimal Places
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $decimal_places;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Symbol Position
     * ---
     * Determines where the currency symbol should be placed after or before the amount.
     * ---
     * Selection : (default value, usually null)
     *     -> after (After Amount)
     *     -> before (Before Amount)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $position;

    /**
     * Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Currency Unit
     * ---
     * Currency Unit Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $currency_unit_label;

    /**
     * Currency Subunit
     * ---
     * Currency Subunit Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $currency_subunit_label;

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
     * @param string $name Currency
     *        ---
     *        Currency Code (ISO 4217)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $symbol Symbol
     *        ---
     *        Currency sign, to be used when printing amounts.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $symbol)
    {
        $this->name = $name;
        $this->symbol = $symbol;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("currency_unit_label")
     */
    public function getCurrencyUnitLabel(): ?string
    {
        return $this->currency_unit_label;
    }

    /**
     * @param string|null $currency_unit_label
     */
    public function setCurrencyUnitLabel(?string $currency_unit_label): void
    {
        $this->currency_unit_label = $currency_unit_label;
    }

    /**
     * @return string|null
     *
     * @SerializedName("currency_subunit_label")
     */
    public function getCurrencySubunitLabel(): ?string
    {
        return $this->currency_subunit_label;
    }

    /**
     * @param string|null $currency_subunit_label
     */
    public function setCurrencySubunitLabel(?string $currency_subunit_label): void
    {
        $this->currency_subunit_label = $currency_subunit_label;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("position")
     */
    public function getPosition(): ?string
    {
        return $this->position;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param string|null $position
     */
    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
     * @param OdooRelation[]|null $rate_ids
     */
    public function setRateIds(?array $rate_ids): void
    {
        $this->rate_ids = $rate_ids;
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
     *
     * @SerializedName("symbol")
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return float|null
     *
     * @SerializedName("rate")
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param float|null $rate
     */
    public function setRate(?float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("rate_ids")
     */
    public function getRateIds(): ?array
    {
        return $this->rate_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRateIds(OdooRelation $item): bool
    {
        if (null === $this->rate_ids) {
            return false;
        }

        return in_array($item, $this->rate_ids);
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
     * @param OdooRelation $item
     */
    public function addRateIds(OdooRelation $item): void
    {
        if ($this->hasRateIds($item)) {
            return;
        }

        if (null === $this->rate_ids) {
            $this->rate_ids = [];
        }

        $this->rate_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRateIds(OdooRelation $item): void
    {
        if (null === $this->rate_ids) {
            $this->rate_ids = [];
        }

        if ($this->hasRateIds($item)) {
            $index = array_search($item, $this->rate_ids);
            unset($this->rate_ids[$index]);
        }
    }

    /**
     * @return float|null
     *
     * @SerializedName("rounding")
     */
    public function getRounding(): ?float
    {
        return $this->rounding;
    }

    /**
     * @param float|null $rounding
     */
    public function setRounding(?float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @return int|null
     *
     * @SerializedName("decimal_places")
     */
    public function getDecimalPlaces(): ?int
    {
        return $this->decimal_places;
    }

    /**
     * @param int|null $decimal_places
     */
    public function setDecimalPlaces(?int $decimal_places): void
    {
        $this->decimal_places = $decimal_places;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.currency';
    }
}
