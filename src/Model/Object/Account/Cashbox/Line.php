<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Cashbox;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Cashbox;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.cashbox.line
 * Name : account.cashbox.line
 * Info :
 * Cash Box Details
 */
final class Line extends Base
{
    /**
     * Coin/Bill Value
     *
     * @var float
     */
    private $coin_value;

    /**
     * #Coins/Bills
     * Opening Unit Numbers
     *
     * @var null|int
     */
    private $number;

    /**
     * Subtotal
     *
     * @var null|float
     */
    private $subtotal;

    /**
     * Cashbox
     *
     * @var null|Cashbox
     */
    private $cashbox_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

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
     * @param float $coin_value Coin/Bill Value
     */
    public function __construct(float $coin_value)
    {
        $this->coin_value = $coin_value;
    }

    /**
     * @param float $coin_value
     */
    public function setCoinValue(float $coin_value): void
    {
        $this->coin_value = $coin_value;
    }

    /**
     * @param null|int $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return null|float
     */
    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    /**
     * @param null|Cashbox $cashbox_id
     */
    public function setCashboxId(?Cashbox $cashbox_id): void
    {
        $this->cashbox_id = $cashbox_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
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
