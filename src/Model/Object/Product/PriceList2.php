<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.price_list
 * ---
 * Name : product.price_list
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class PriceList2 extends Base
{
    /**
     * PriceList
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $price_list;

    /**
     * Quantity-1
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $qty1;

    /**
     * Quantity-2
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $qty2;

    /**
     * Quantity-3
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $qty3;

    /**
     * Quantity-4
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $qty4;

    /**
     * Quantity-5
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $qty5;

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
     * @param OdooRelation $price_list PriceList
     *        ---
     *        Relation : many2one (product.pricelist)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $price_list)
    {
        $this->price_list = $price_list;
    }

    /**
     * @param int|null $qty5
     */
    public function setQty5(?int $qty5): void
    {
        $this->qty5 = $qty5;
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
     * @return int|null
     *
     * @SerializedName("qty5")
     */
    public function getQty5(): ?int
    {
        return $this->qty5;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("price_list")
     */
    public function getPriceList(): OdooRelation
    {
        return $this->price_list;
    }

    /**
     * @param int|null $qty4
     */
    public function setQty4(?int $qty4): void
    {
        $this->qty4 = $qty4;
    }

    /**
     * @return int|null
     *
     * @SerializedName("qty4")
     */
    public function getQty4(): ?int
    {
        return $this->qty4;
    }

    /**
     * @param int|null $qty3
     */
    public function setQty3(?int $qty3): void
    {
        $this->qty3 = $qty3;
    }

    /**
     * @return int|null
     *
     * @SerializedName("qty3")
     */
    public function getQty3(): ?int
    {
        return $this->qty3;
    }

    /**
     * @param int|null $qty2
     */
    public function setQty2(?int $qty2): void
    {
        $this->qty2 = $qty2;
    }

    /**
     * @return int|null
     *
     * @SerializedName("qty2")
     */
    public function getQty2(): ?int
    {
        return $this->qty2;
    }

    /**
     * @param int|null $qty1
     */
    public function setQty1(?int $qty1): void
    {
        $this->qty1 = $qty1;
    }

    /**
     * @return int|null
     *
     * @SerializedName("qty1")
     */
    public function getQty1(): ?int
    {
        return $this->qty1;
    }

    /**
     * @param OdooRelation $price_list
     */
    public function setPriceList(OdooRelation $price_list): void
    {
        $this->price_list = $price_list;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.price_list';
    }
}