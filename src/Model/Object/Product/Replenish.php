<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.replenish
 * ---
 * Name : product.replenish
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Replenish extends Base
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
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Has variants
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool
     */
    private $product_has_variants;

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
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $product_uom_category_id;

    /**
     * Unity of measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_uom_id;

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
     * Scheduled Date
     * ---
     * Date at which the replenishment should take place.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_planned;

    /**
     * Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $warehouse_id;

    /**
     * Preferred Routes
     * ---
     * Apply specific route(s) for the replenishment instead of product's default routes.
     * ---
     * Relation : many2many (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $route_ids;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
     * @param OdooRelation $product_tmpl_id Product Template
     *        ---
     *        Relation : many2one (product.template)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param bool $product_has_variants Has variants
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $product_uom_category_id Category
     *        ---
     *        Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     *        made based on the ratios.
     *        ---
     *        Relation : many2one (uom.category)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Category
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $product_uom_id Unity of measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $quantity Quantity
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_planned Scheduled Date
     *        ---
     *        Date at which the replenishment should take place.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $warehouse_id Warehouse
     *        ---
     *        Relation : many2one (stock.warehouse)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $product_tmpl_id,
        bool $product_has_variants,
        OdooRelation $product_uom_category_id,
        OdooRelation $product_uom_id,
        float $quantity,
        DateTimeInterface $date_planned,
        OdooRelation $warehouse_id
    ) {
        $this->product_id = $product_id;
        $this->product_tmpl_id = $product_tmpl_id;
        $this->product_has_variants = $product_has_variants;
        $this->product_uom_category_id = $product_uom_category_id;
        $this->product_uom_id = $product_uom_id;
        $this->quantity = $quantity;
        $this->date_planned = $date_planned;
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRouteIds(): ?array
    {
        return $this->route_ids;
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRouteIds(OdooRelation $item): void
    {
        if (null === $this->route_ids) {
            $this->route_ids = [];
        }

        if ($this->hasRouteIds($item)) {
            $index = array_search($item, $this->route_ids);
            unset($this->route_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addRouteIds(OdooRelation $item): void
    {
        if ($this->hasRouteIds($item)) {
            return;
        }

        if (null === $this->route_ids) {
            $this->route_ids = [];
        }

        $this->route_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRouteIds(OdooRelation $item): bool
    {
        if (null === $this->route_ids) {
            return false;
        }

        return in_array($item, $this->route_ids);
    }

    /**
     * @param OdooRelation[]|null $route_ids
     */
    public function setRouteIds(?array $route_ids): void
    {
        $this->route_ids = $route_ids;
    }

    /**
     * @param OdooRelation $warehouse_id
     */
    public function setWarehouseId(OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @return OdooRelation
     */
    public function getWarehouseId(): OdooRelation
    {
        return $this->warehouse_id;
    }

    /**
     * @param DateTimeInterface $date_planned
     */
    public function setDatePlanned(DateTimeInterface $date_planned): void
    {
        $this->date_planned = $date_planned;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDatePlanned(): DateTimeInterface
    {
        return $this->date_planned;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param OdooRelation $product_uom_id
     */
    public function setProductUomId(OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductUomId(): OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param OdooRelation $product_uom_category_id
     */
    public function setProductUomCategoryId(OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductUomCategoryId(): OdooRelation
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param bool $product_has_variants
     */
    public function setProductHasVariants(bool $product_has_variants): void
    {
        $this->product_has_variants = $product_has_variants;
    }

    /**
     * @return bool
     */
    public function isProductHasVariants(): bool
    {
        return $this->product_has_variants;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.replenish';
    }
}
