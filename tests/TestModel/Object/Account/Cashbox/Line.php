<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Cashbox;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.cashbox.line
 * ---
 * Name : account.cashbox.line
 * ---
 * Info :
 * Cash Box Details
 */
final class Line extends Base
{
    /**
     * Coin/Bill Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $coin_value;

    /**
     * #Coins/Bills
     * ---
     * Opening Unit Numbers
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $number;

    /**
     * Subtotal
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $subtotal;

    /**
     * Cashbox
     * ---
     * Relation : many2one (account.bank.statement.cashbox)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement\Cashbox
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cashbox_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * @param float $coin_value Coin/Bill Value
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(float $coin_value)
    {
        $this->coin_value = $coin_value;
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
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return float
     *
     * @SerializedName("coin_value")
     */
    public function getCoinValue(): float
    {
        return $this->coin_value;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $cashbox_id
     */
    public function setCashboxId(?OdooRelation $cashbox_id): void
    {
        $this->cashbox_id = $cashbox_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("cashbox_id")
     */
    public function getCashboxId(): ?OdooRelation
    {
        return $this->cashbox_id;
    }

    /**
     * @param float|null $subtotal
     */
    public function setSubtotal(?float $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return float|null
     *
     * @SerializedName("subtotal")
     */
    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return int|null
     *
     * @SerializedName("number")
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param float $coin_value
     */
    public function setCoinValue(float $coin_value): void
    {
        $this->coin_value = $coin_value;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.cashbox.line';
    }
}
