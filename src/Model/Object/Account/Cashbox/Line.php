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
 *
 * Cash Box Details
 */
final class Line extends Base
{
    /**
     * Coin/Bill Value
     *
     * @var null|float
     */
    private $coin_value;

    /**
     * #Coins/Bills
     *
     * @var int
     */
    private $number;

    /**
     * Subtotal
     *
     * @var float
     */
    private $subtotal;

    /**
     * Cashbox
     *
     * @var Cashbox
     */
    private $cashbox_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

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
     * @param null|float $coin_value
     */
    public function setCoinValue(?float $coin_value): void
    {
        $this->coin_value = $coin_value;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @param Cashbox $cashbox_id
     */
    public function setCashboxId(Cashbox $cashbox_id): void
    {
        $this->cashbox_id = $cashbox_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
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
