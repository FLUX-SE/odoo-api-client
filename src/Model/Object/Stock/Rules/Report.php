<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Rules;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.rules.report
 * ---
 * Name : stock.rules.report
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Report extends Base
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
     * Warehouses
     * ---
     * Show the routes that apply on selected warehouses.
     * ---
     * Relation : many2many (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $warehouse_ids;

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
     * @param OdooRelation[] $warehouse_ids Warehouses
     *        ---
     *        Show the routes that apply on selected warehouses.
     *        ---
     *        Relation : many2many (stock.warehouse)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param bool $product_has_variants Has variants
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $product_tmpl_id,
        array $warehouse_ids,
        bool $product_has_variants
    ) {
        $this->product_id = $product_id;
        $this->product_tmpl_id = $product_tmpl_id;
        $this->warehouse_ids = $warehouse_ids;
        $this->product_has_variants = $product_has_variants;
    }

    /**
     * @param bool $product_has_variants
     */
    public function setProductHasVariants(bool $product_has_variants): void
    {
        $this->product_has_variants = $product_has_variants;
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
     * @return bool
     */
    public function isProductHasVariants(): bool
    {
        return $this->product_has_variants;
    }

    /**
     * @return OdooRelation
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWarehouseIds(OdooRelation $item): void
    {
        if ($this->hasWarehouseIds($item)) {
            $index = array_search($item, $this->warehouse_ids);
            unset($this->warehouse_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addWarehouseIds(OdooRelation $item): void
    {
        if ($this->hasWarehouseIds($item)) {
            return;
        }

        $this->warehouse_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWarehouseIds(OdooRelation $item): bool
    {
        return in_array($item, $this->warehouse_ids);
    }

    /**
     * @param OdooRelation[] $warehouse_ids
     */
    public function setWarehouseIds(array $warehouse_ids): void
    {
        $this->warehouse_ids = $warehouse_ids;
    }

    /**
     * @return OdooRelation[]
     */
    public function getWarehouseIds(): array
    {
        return $this->warehouse_ids;
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
        return 'stock.rules.report';
    }
}
