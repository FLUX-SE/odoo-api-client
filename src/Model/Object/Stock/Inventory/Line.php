<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Inventory;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.inventory.line
 * ---
 * Name : stock.inventory.line
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
final class Line extends Base
{
    /**
     * Is Editable
     * ---
     * Technical field to restrict editing.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_editable;

    /**
     * Inventory
     * ---
     * Relation : many2one (stock.inventory)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Inventory
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $inventory_id;

    /**
     * Owner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

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
     * Product Unit of Measure
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
     * Counted Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_qty;

    /**
     * Product Category
     * ---
     * Select category for the current product
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $categ_id;

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
     * Pack
     * ---
     * Relation : many2one (stock.quant.package)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant\Package
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $package_id;

    /**
     * Lot/Serial Number
     * ---
     * Relation : many2one (stock.production.lot)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Production\Lot
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $prod_lot_id;

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
     * Status
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> cancel (Cancelled)
     *     -> confirm (In Progress)
     *     -> done (Validated)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * Theoretical Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $theoretical_qty;

    /**
     * Difference
     * ---
     * Indicates the gap between the product's theoretical quantity and its newest quantity.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $difference_qty;

    /**
     * Inventory Date
     * ---
     * Last date at which the On Hand Quantity has been computed.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $inventory_date;

    /**
     * Quantity outdated
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $outdated;

    /**
     * Tracking
     * ---
     * Ensure the traceability of a storable product in your warehouse.
     * ---
     * Selection :
     *     -> serial (By Unique Serial Number)
     *     -> lot (By Lots)
     *     -> none (No Tracking)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $product_tracking;

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
     * @param OdooRelation $product_uom_id Product Unit of Measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
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
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $product_uom_id,
        OdooRelation $location_id
    ) {
        $this->product_id = $product_id;
        $this->product_uom_id = $product_uom_id;
        $this->location_id = $location_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_tracking")
     */
    public function getProductTracking(): ?string
    {
        return $this->product_tracking;
    }

    /**
     * @return float|null
     *
     * @SerializedName("theoretical_qty")
     */
    public function getTheoreticalQty(): ?float
    {
        return $this->theoretical_qty;
    }

    /**
     * @param float|null $theoretical_qty
     */
    public function setTheoreticalQty(?float $theoretical_qty): void
    {
        $this->theoretical_qty = $theoretical_qty;
    }

    /**
     * @return float|null
     *
     * @SerializedName("difference_qty")
     */
    public function getDifferenceQty(): ?float
    {
        return $this->difference_qty;
    }

    /**
     * @param float|null $difference_qty
     */
    public function setDifferenceQty(?float $difference_qty): void
    {
        $this->difference_qty = $difference_qty;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("inventory_date")
     */
    public function getInventoryDate(): ?DateTimeInterface
    {
        return $this->inventory_date;
    }

    /**
     * @param DateTimeInterface|null $inventory_date
     */
    public function setInventoryDate(?DateTimeInterface $inventory_date): void
    {
        $this->inventory_date = $inventory_date;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("outdated")
     */
    public function isOutdated(): ?bool
    {
        return $this->outdated;
    }

    /**
     * @param bool|null $outdated
     */
    public function setOutdated(?bool $outdated): void
    {
        $this->outdated = $outdated;
    }

    /**
     * @param string|null $product_tracking
     */
    public function setProductTracking(?string $product_tracking): void
    {
        $this->product_tracking = $product_tracking;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_editable")
     */
    public function isIsEditable(): ?bool
    {
        return $this->is_editable;
    }

    /**
     * @param OdooRelation $product_uom_id
     */
    public function setProductUomId(OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param bool|null $is_editable
     */
    public function setIsEditable(?bool $is_editable): void
    {
        $this->is_editable = $is_editable;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("inventory_id")
     */
    public function getInventoryId(): ?OdooRelation
    {
        return $this->inventory_id;
    }

    /**
     * @param OdooRelation|null $inventory_id
     */
    public function setInventoryId(?OdooRelation $inventory_id): void
    {
        $this->inventory_id = $inventory_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_uom_id")
     */
    public function getProductUomId(): OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("product_qty")
     */
    public function getProductQty(): ?float
    {
        return $this->product_qty;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param float|null $product_qty
     */
    public function setProductQty(?float $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("categ_id")
     */
    public function getCategId(): ?OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation|null $categ_id
     */
    public function setCategId(?OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
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
     * @param OdooRelation $location_id
     */
    public function setLocationId(OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("package_id")
     */
    public function getPackageId(): ?OdooRelation
    {
        return $this->package_id;
    }

    /**
     * @param OdooRelation|null $package_id
     */
    public function setPackageId(?OdooRelation $package_id): void
    {
        $this->package_id = $package_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("prod_lot_id")
     */
    public function getProdLotId(): ?OdooRelation
    {
        return $this->prod_lot_id;
    }

    /**
     * @param OdooRelation|null $prod_lot_id
     */
    public function setProdLotId(?OdooRelation $prod_lot_id): void
    {
        $this->prod_lot_id = $prod_lot_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.inventory.line';
    }
}
