<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.price_list
 * Name : product.price_list
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class PriceList extends Base
{
    /**
     * PriceList
     *
     * @var null|PriceList
     */
    private $price_list;

    /**
     * Quantity-1
     *
     * @var int
     */
    private $qty1;

    /**
     * Quantity-2
     *
     * @var int
     */
    private $qty2;

    /**
     * Quantity-3
     *
     * @var int
     */
    private $qty3;

    /**
     * Quantity-4
     *
     * @var int
     */
    private $qty4;

    /**
     * Quantity-5
     *
     * @var int
     */
    private $qty5;

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
     * @param null|Pricelist $price_list
     */
    public function setPriceList(Pricelist $price_list): void
    {
        $this->price_list = $price_list;
    }

    /**
     * @param int $qty1
     */
    public function setQty1(int $qty1): void
    {
        $this->qty1 = $qty1;
    }

    /**
     * @param int $qty2
     */
    public function setQty2(int $qty2): void
    {
        $this->qty2 = $qty2;
    }

    /**
     * @param int $qty3
     */
    public function setQty3(int $qty3): void
    {
        $this->qty3 = $qty3;
    }

    /**
     * @param int $qty4
     */
    public function setQty4(int $qty4): void
    {
        $this->qty4 = $qty4;
    }

    /**
     * @param int $qty5
     */
    public function setQty5(int $qty5): void
    {
        $this->qty5 = $qty5;
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
