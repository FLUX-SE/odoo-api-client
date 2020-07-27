<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.move.line
 * ---
 * Name : stock.move.line
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
     * Stock Picking
     * ---
     * The stock operation where the packing has been made
     * ---
     * Relation : many2one (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $picking_id;

    /**
     * Stock Move
     * ---
     * Change to a better name
     * ---
     * Relation : many2one (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Unit of Measure
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
     * Real Reserved Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_qty;

    /**
     * Reserved
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Done
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_done;

    /**
     * Source Package
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
     * Package Level
     * ---
     * Relation : many2one (stock.package_level)
     * @see \Flux\OdooApiClient\Model\Object\Stock\PackageLevel
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $package_level_id;

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
    private $lot_id;

    /**
     * Lot/Serial Number Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lot_name;

    /**
     * Destination Package
     * ---
     * If set, the operations are packed into this package
     * ---
     * Relation : many2one (stock.quant.package)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant\Package
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $result_package_id;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * From Owner
     * ---
     * When validating the transfer, the products will be taken from this owner.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $owner_id;

    /**
     * From
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
     * To
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_dest_id;

    /**
     * Lots Visible
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $lots_visible;

    /**
     * Type of Operation
     * ---
     * Selection : (default value, usually null)
     *     -> incoming (Receipt)
     *     -> outgoing (Delivery)
     *     -> internal (Internal Transfer)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $picking_code;

    /**
     * Create New Lots/Serial Numbers
     * ---
     * If this is checked only, it will suppose you want to create new Lots/Serial Numbers, so you can provide them
     * in a text field. 
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $picking_type_use_create_lots;

    /**
     * Use Existing Lots/Serial Numbers
     * ---
     * If this is checked, you will be able to choose the Lots/Serial Numbers. You can also decide to not put lots in
     * this operation type.  This means it will create stock with no lot or not put a restriction on the lot taken. 
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $picking_type_use_existing_lots;

    /**
     * Status
     * ---
     * * New: When the stock move is created and not yet confirmed.
     * * Waiting Another Move: This state can be seen when a move is waiting for another one, for example in a
     * chained flow.
     * * Waiting Availability: This state is reached when the procurement resolution is not straight forward. It may
     * need the scheduler to run, a component to be manufactured...
     * * Available: When products are reserved, it is set to 'Available'.
     * * Done: When the shipment is processed, the state is 'Done'.
     * ---
     * Selection : (default value, usually null)
     *     -> draft (New)
     *     -> cancel (Cancelled)
     *     -> waiting (Waiting Another Move)
     *     -> confirmed (Waiting Availability)
     *     -> partially_available (Partially Available)
     *     -> assigned (Available)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Is initial demand editable
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_initial_demand_editable;

    /**
     * Is Locked
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_locked;

    /**
     * Consume Line
     * ---
     * Technical link to see who consumed what. 
     * ---
     * Relation : many2many (stock.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $consume_line_ids;

    /**
     * Produce Line
     * ---
     * Technical link to see which line was produced with this. 
     * ---
     * Relation : many2many (stock.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $produce_line_ids;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reference;

    /**
     * Tracking
     * ---
     * Ensure the traceability of a storable product in your warehouse.
     * ---
     * Selection : (default value, usually null)
     *     -> serial (By Unique Serial Number)
     *     -> lot (By Lots)
     *     -> none (No Tracking)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $tracking;

    /**
     * Source
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $origin;

    /**
     * Move Entire Packages
     * ---
     * If ticked, you will be able to select entire packages to move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $picking_type_entire_packs;

    /**
     * Description picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description_picking;

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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $product_uom_id Unit of Measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $product_uom_qty Reserved
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id From
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_dest_id To
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $company_id,
        OdooRelation $product_uom_id,
        float $product_uom_qty,
        DateTimeInterface $date,
        OdooRelation $location_id,
        OdooRelation $location_dest_id
    ) {
        $this->company_id = $company_id;
        $this->product_uom_id = $product_uom_id;
        $this->product_uom_qty = $product_uom_qty;
        $this->date = $date;
        $this->location_id = $location_id;
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @param OdooRelation[]|null $consume_line_ids
     */
    public function setConsumeLineIds(?array $consume_line_ids): void
    {
        $this->consume_line_ids = $consume_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProduceLineIds(OdooRelation $item): bool
    {
        if (null === $this->produce_line_ids) {
            return false;
        }

        return in_array($item, $this->produce_line_ids);
    }

    /**
     * @param OdooRelation[]|null $produce_line_ids
     */
    public function setProduceLineIds(?array $produce_line_ids): void
    {
        $this->produce_line_ids = $produce_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getProduceLineIds(): ?array
    {
        return $this->produce_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeConsumeLineIds(OdooRelation $item): void
    {
        if (null === $this->consume_line_ids) {
            $this->consume_line_ids = [];
        }

        if ($this->hasConsumeLineIds($item)) {
            $index = array_search($item, $this->consume_line_ids);
            unset($this->consume_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addConsumeLineIds(OdooRelation $item): void
    {
        if ($this->hasConsumeLineIds($item)) {
            return;
        }

        if (null === $this->consume_line_ids) {
            $this->consume_line_ids = [];
        }

        $this->consume_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasConsumeLineIds(OdooRelation $item): bool
    {
        if (null === $this->consume_line_ids) {
            return false;
        }

        return in_array($item, $this->consume_line_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getConsumeLineIds(): ?array
    {
        return $this->consume_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProduceLineIds(OdooRelation $item): void
    {
        if (null === $this->produce_line_ids) {
            $this->produce_line_ids = [];
        }

        if ($this->hasProduceLineIds($item)) {
            $index = array_search($item, $this->produce_line_ids);
            unset($this->produce_line_ids[$index]);
        }
    }

    /**
     * @param bool|null $is_locked
     */
    public function setIsLocked(?bool $is_locked): void
    {
        $this->is_locked = $is_locked;
    }

    /**
     * @return bool|null
     */
    public function isIsLocked(): ?bool
    {
        return $this->is_locked;
    }

    /**
     * @param bool|null $is_initial_demand_editable
     */
    public function setIsInitialDemandEditable(?bool $is_initial_demand_editable): void
    {
        $this->is_initial_demand_editable = $is_initial_demand_editable;
    }

    /**
     * @return bool|null
     */
    public function isIsInitialDemandEditable(): ?bool
    {
        return $this->is_initial_demand_editable;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param bool|null $picking_type_use_existing_lots
     */
    public function setPickingTypeUseExistingLots(?bool $picking_type_use_existing_lots): void
    {
        $this->picking_type_use_existing_lots = $picking_type_use_existing_lots;
    }

    /**
     * @param OdooRelation $item
     */
    public function addProduceLineIds(OdooRelation $item): void
    {
        if ($this->hasProduceLineIds($item)) {
            return;
        }

        if (null === $this->produce_line_ids) {
            $this->produce_line_ids = [];
        }

        $this->produce_line_ids[] = $item;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param bool|null $picking_type_use_create_lots
     */
    public function setPickingTypeUseCreateLots(?bool $picking_type_use_create_lots): void
    {
        $this->picking_type_use_create_lots = $picking_type_use_create_lots;
    }

    /**
     * @return OdooRelation|null
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
     * @param string|null $description_picking
     */
    public function setDescriptionPicking(?string $description_picking): void
    {
        $this->description_picking = $description_picking;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getDescriptionPicking(): ?string
    {
        return $this->description_picking;
    }

    /**
     * @param bool|null $picking_type_entire_packs
     */
    public function setPickingTypeEntirePacks(?bool $picking_type_entire_packs): void
    {
        $this->picking_type_entire_packs = $picking_type_entire_packs;
    }

    /**
     * @return bool|null
     */
    public function isPickingTypeEntirePacks(): ?bool
    {
        return $this->picking_type_entire_packs;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $tracking
     */
    public function setTracking(?string $tracking): void
    {
        $this->tracking = $tracking;
    }

    /**
     * @return string|null
     */
    public function getTracking(): ?string
    {
        return $this->tracking;
    }

    /**
     * @return bool|null
     */
    public function isPickingTypeUseExistingLots(): ?bool
    {
        return $this->picking_type_use_existing_lots;
    }

    /**
     * @return bool|null
     */
    public function isPickingTypeUseCreateLots(): ?bool
    {
        return $this->picking_type_use_create_lots;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickingId(): ?OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param OdooRelation $product_uom_id
     */
    public function setProductUomId(OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPackageId(): ?OdooRelation
    {
        return $this->package_id;
    }

    /**
     * @param float|null $qty_done
     */
    public function setQtyDone(?float $qty_done): void
    {
        $this->qty_done = $qty_done;
    }

    /**
     * @return float|null
     */
    public function getQtyDone(): ?float
    {
        return $this->qty_done;
    }

    /**
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return float
     */
    public function getProductUomQty(): float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param float|null $product_qty
     */
    public function setProductQty(?float $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @return float|null
     */
    public function getProductQty(): ?float
    {
        return $this->product_qty;
    }

    /**
     * @return OdooRelation
     */
    public function getProductUomId(): OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPackageLevelId(): ?OdooRelation
    {
        return $this->package_level_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @param OdooRelation|null $package_id
     */
    public function setPackageId(?OdooRelation $package_id): void
    {
        $this->package_id = $package_id;
    }

    /**
     * @param OdooRelation|null $package_level_id
     */
    public function setPackageLevelId(?OdooRelation $package_level_id): void
    {
        $this->package_level_id = $package_level_id;
    }

    /**
     * @param string|null $picking_code
     */
    public function setPickingCode(?string $picking_code): void
    {
        $this->picking_code = $picking_code;
    }

    /**
     * @param OdooRelation|null $owner_id
     */
    public function setOwnerId(?OdooRelation $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return string|null
     */
    public function getPickingCode(): ?string
    {
        return $this->picking_code;
    }

    /**
     * @param bool|null $lots_visible
     */
    public function setLotsVisible(?bool $lots_visible): void
    {
        $this->lots_visible = $lots_visible;
    }

    /**
     * @return bool|null
     */
    public function isLotsVisible(): ?bool
    {
        return $this->lots_visible;
    }

    /**
     * @param OdooRelation $location_dest_id
     */
    public function setLocationDestId(OdooRelation $location_dest_id): void
    {
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @return OdooRelation
     */
    public function getLocationDestId(): OdooRelation
    {
        return $this->location_dest_id;
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
     */
    public function getLocationId(): OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getOwnerId(): ?OdooRelation
    {
        return $this->owner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLotId(): ?OdooRelation
    {
        return $this->lot_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation|null $result_package_id
     */
    public function setResultPackageId(?OdooRelation $result_package_id): void
    {
        $this->result_package_id = $result_package_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getResultPackageId(): ?OdooRelation
    {
        return $this->result_package_id;
    }

    /**
     * @param string|null $lot_name
     */
    public function setLotName(?string $lot_name): void
    {
        $this->lot_name = $lot_name;
    }

    /**
     * @return string|null
     */
    public function getLotName(): ?string
    {
        return $this->lot_name;
    }

    /**
     * @param OdooRelation|null $lot_id
     */
    public function setLotId(?OdooRelation $lot_id): void
    {
        $this->lot_id = $lot_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.move.line';
    }
}
