<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Warn\Insufficient\Qty;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.warn.insufficient.qty.scrap
 * ---
 * Name : stock.warn.insufficient.qty.scrap
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Scrap extends Base
{
    /**
     * Scrap
     * ---
     * Relation : many2one (stock.scrap)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Scrap
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $scrap_id;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_id;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_id;

    /**
     * Quant
     * ---
     * Relation : many2many (stock.quant)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $quant_ids;

    /**
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $quantity;

    /**
     * Unit of Measure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $product_uom_name;

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
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $quantity Quantity
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $product_uom_name Unit of Measure
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $location_id,
        float $quantity,
        string $product_uom_name
    ) {
        $this->product_id = $product_id;
        $this->location_id = $location_id;
        $this->quantity = $quantity;
        $this->product_uom_name = $product_uom_name;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
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
     * @param string $product_uom_name
     */
    public function setProductUomName(string $product_uom_name): void
    {
        $this->product_uom_name = $product_uom_name;
    }

    /**
     * @return string
     *
     * @SerializedName("product_uom_name")
     */
    public function getProductUomName(): string
    {
        return $this->product_uom_name;
    }

    /**
     * @return float
     *
     * @SerializedName("quantity")
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("scrap_id")
     */
    public function getScrapId(): ?OdooRelation
    {
        return $this->scrap_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeQuantIds(OdooRelation $item): void
    {
        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        if ($this->hasQuantIds($item)) {
            $index = array_search($item, $this->quant_ids);
            unset($this->quant_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addQuantIds(OdooRelation $item): void
    {
        if ($this->hasQuantIds($item)) {
            return;
        }

        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        $this->quant_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasQuantIds(OdooRelation $item): bool
    {
        if (null === $this->quant_ids) {
            return false;
        }

        return in_array($item, $this->quant_ids);
    }

    /**
     * @param OdooRelation[]|null $quant_ids
     */
    public function setQuantIds(?array $quant_ids): void
    {
        $this->quant_ids = $quant_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("quant_ids")
     */
    public function getQuantIds(): ?array
    {
        return $this->quant_ids;
    }

    /**
     * @param OdooRelation $location_id
     */
    public function setLocationId(OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $scrap_id
     */
    public function setScrapId(?OdooRelation $scrap_id): void
    {
        $this->scrap_id = $scrap_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.warn.insufficient.qty.scrap';
    }
}
