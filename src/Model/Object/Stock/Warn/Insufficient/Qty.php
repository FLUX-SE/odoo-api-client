<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Warn\Insufficient;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.warn.insufficient.qty
 * ---
 * Name : stock.warn.insufficient.qty
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Qty extends Base
{
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
     */
    public function __construct(OdooRelation $product_id, OdooRelation $location_id)
    {
        $this->product_id = $product_id;
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
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
     */
    public function getLocationId(): OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation $location_id
     */
    public function setLocationId(OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getQuantIds(): ?array
    {
        return $this->quant_ids;
    }

    /**
     * @param OdooRelation[]|null $quant_ids
     */
    public function setQuantIds(?array $quant_ids): void
    {
        $this->quant_ids = $quant_ids;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.warn.insufficient.qty';
    }
}
