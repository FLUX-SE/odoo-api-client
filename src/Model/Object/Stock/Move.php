<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.move
 * ---
 * Name : stock.move
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
final class Move extends Base
{
    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Priority
     * ---
     * Selection :
     *     -> 0 (Not urgent)
     *     -> 1 (Normal)
     *     -> 2 (Urgent)
     *     -> 3 (Very Urgent)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $priority;

    /**
     * Creation Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Date
     * ---
     * Move date: scheduled date until move is done, then date of actual move processing
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

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
     * Expected Date
     * ---
     * Scheduled date for the processing of this move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_expected;

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
     * Description of Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description_picking;

    /**
     * Real Quantity
     * ---
     * Quantity in the default UoM of the product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_qty;

    /**
     * Initial Demand
     * ---
     * This is the quantity of products from an inventory point of view. For moves in the state 'done', this is the
     * quantity of products that were actually moved. For other moves, this is the quantity of product that is
     * planned to be moved. Lowering this quantity does not generate a backorder. Changing this quantity on assigned
     * moves affects the product reservation, and should be done with care.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $product_uom_qty;

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
    private $product_uom;

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
     * @var OdooRelation|null
     */
    private $product_uom_category_id;

    /**
     * Product Template
     * ---
     * Technical: used in views
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_tmpl_id;

    /**
     * Source Location
     * ---
     * Sets a location if you produce at a fixed location. This can be a partner location if you subcontract the
     * manufacturing operations.
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
     * Destination Location
     * ---
     * Location where the system will stock the finished products.
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
     * Destination Address
     * ---
     * Optional address where goods are to be delivered, specifically used for allotment
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
     * Destination Moves
     * ---
     * Optional: next stock move when chaining them
     * ---
     * Relation : many2many (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_dest_ids;

    /**
     * Original Move
     * ---
     * Optional: previous stock move when chaining them
     * ---
     * Relation : many2many (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_orig_ids;

    /**
     * Transfer Reference
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
     * Transfer Destination Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $picking_partner_id;

    /**
     * Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

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
     * Selection :
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
     * Unit Price
     * ---
     * Technical field used to record the product cost set by the user during a picking confirmation (when costing
     * method used is 'average price' or 'real'). Value given in company currency and in product uom.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_unit;

    /**
     * Back Order of
     * ---
     * If this shipment was split, then this field links to the shipment which contains the already processed part.
     * ---
     * Relation : many2one (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $backorder_id;

    /**
     * Source Document
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $origin;

    /**
     * Supply Method
     * ---
     * By default, the system will take from the stock in the source location and passively wait for availability.
     * The other possibility allows you to directly create a procurement on the source location (and thus ignore its
     * current stock) to gather products. If we want to chain moves and have this one to wait for the previous, this
     * second option should be chosen.
     * ---
     * Selection :
     *     -> make_to_stock (Default: Take From Stock)
     *     -> make_to_order (Advanced: Apply Procurement Rules)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $procure_method;

    /**
     * Scrapped
     * ---
     * Check this box to allow using this location to put scrapped/damaged goods.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $scrapped;

    /**
     * Scrap
     * ---
     * Relation : one2many (stock.scrap -> move_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Scrap
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $scrap_ids;

    /**
     * Procurement Group
     * ---
     * Relation : many2one (procurement.group)
     * @see \Flux\OdooApiClient\Model\Object\Procurement\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Stock Rule
     * ---
     * The stock rule that created this stock move
     * ---
     * Relation : many2one (stock.rule)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $rule_id;

    /**
     * Propagate cancel and split
     * ---
     * If checked, when this move is cancelled, cancel the linked move too
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $propagate_cancel;

    /**
     * Propagate Rescheduling
     * ---
     * The rescheduling is propagated to the next move.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $propagate_date;

    /**
     * Reschedule if Higher Than
     * ---
     * The change must be higher than this value to be propagated
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $propagate_date_minimum_delta;

    /**
     * Alert if Delay
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $delay_alert;

    /**
     * Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $picking_type_id;

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
     * Move Line
     * ---
     * Relation : one2many (stock.move.line -> move_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

    /**
     * Move Line Nosuggest
     * ---
     * Relation : one2many (stock.move.line -> move_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_nosuggest_ids;

    /**
     * Origin return move
     * ---
     * Move that created the return move
     * ---
     * Relation : many2one (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $origin_returned_move_id;

    /**
     * All returned moves
     * ---
     * Optional: all returned moves created from this move
     * ---
     * Relation : one2many (stock.move -> origin_returned_move_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $returned_move_ids;

    /**
     * Quantity Reserved
     * ---
     * Quantity that has already been reserved for this move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $reserved_availability;

    /**
     * Forecasted Quantity
     * ---
     * Quantity in stock that can still be reserved for this move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $availability;

    /**
     * Availability
     * ---
     * Show various information on stock availability for this move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $string_availability_info;

    /**
     * Owner
     * ---
     * Technical field used to depict a restriction on the ownership of quants to consider when marking this move as
     * 'done'
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $restrict_partner_id;

    /**
     * Destination route
     * ---
     * Preferred route
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
     * Warehouse
     * ---
     * Technical field depicting the warehouse to consider for the route selection on the next procurement (if any).
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $warehouse_id;

    /**
     * Product with Tracking
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
    private $has_tracking;

    /**
     * Quantity Done
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $quantity_done;

    /**
     * Show Detailed Operations
     * ---
     * If this checkbox is ticked, the pickings lines will represent detailed stock operations. If not, the picking
     * lines will represent an aggregate of detailed stock operations.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_operations;

    /**
     * Details Visible
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_details_visible;

    /**
     * From Supplier
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_reserved_availability;

    /**
     * Type of Operation
     * ---
     * Selection :
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
     * Product Type
     * ---
     * A storable product is a product for which you manage stock. The Inventory app has to be installed.
     * A consumable product is a product for which stock is not managed.
     * A service is a non-material product you provide.
     * ---
     * Selection :
     *     -> consu (Consumable)
     *     -> service (Service)
     *     -> product (Storable Product)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $product_type;

    /**
     * Whether the move was added after the picking's confirmation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $additional;

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
     * Is initial demand editable
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_initial_demand_editable;

    /**
     * Is quantity done editable
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_quantity_done_editable;

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
     * Has Move Lines
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_move_lines;

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
     * Display Assign Serial
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_assign_serial;

    /**
     * First SN
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $next_serial;

    /**
     * Number of SN
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $next_serial_count;

    /**
     * Update quantities on SO/PO
     * ---
     * Trigger a decrease of the delivered/received quantity in the associated Sale Order/Purchase Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_refund;

    /**
     * Account Move
     * ---
     * Relation : one2many (account.move -> stock_move_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $account_move_ids;

    /**
     * Stock Valuation Layer
     * ---
     * Relation : one2many (stock.valuation.layer -> stock_move_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Valuation\Layer
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_valuation_layer_ids;

    /**
     * Purchase Order Line
     * ---
     * Relation : many2one (purchase.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $purchase_line_id;

    /**
     * Created Purchase Order Line
     * ---
     * Relation : many2one (purchase.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $created_purchase_line_id;

    /**
     * Sale Line
     * ---
     * Relation : many2one (sale.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_line_id;

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
     * @param string $name Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Move date: scheduled date until move is done, then date of actual move processing
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_expected Expected Date
     *        ---
     *        Scheduled date for the processing of this move
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $product_uom_qty Initial Demand
     *        ---
     *        This is the quantity of products from an inventory point of view. For moves in the state 'done', this is the
     *        quantity of products that were actually moved. For other moves, this is the quantity of product that is
     *        planned to be moved. Lowering this quantity does not generate a backorder. Changing this quantity on assigned
     *        moves affects the product reservation, and should be done with care.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $product_uom Unit of Measure
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id Source Location
     *        ---
     *        Sets a location if you produce at a fixed location. This can be a partner location if you subcontract the
     *        manufacturing operations.
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_dest_id Destination Location
     *        ---
     *        Location where the system will stock the finished products.
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $procure_method Supply Method
     *        ---
     *        By default, the system will take from the stock in the source location and passively wait for availability.
     *        The other possibility allows you to directly create a procurement on the source location (and thus ignore its
     *        current stock) to gather products. If we want to chain moves and have this one to wait for the previous, this
     *        second option should be chosen.
     *        ---
     *        Selection :
     *            -> make_to_stock (Default: Take From Stock)
     *            -> make_to_order (Advanced: Apply Procurement Rules)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date,
        OdooRelation $company_id,
        DateTimeInterface $date_expected,
        OdooRelation $product_id,
        float $product_uom_qty,
        OdooRelation $product_uom,
        OdooRelation $location_id,
        OdooRelation $location_dest_id,
        string $procure_method
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->company_id = $company_id;
        $this->date_expected = $date_expected;
        $this->product_id = $product_id;
        $this->product_uom_qty = $product_uom_qty;
        $this->product_uom = $product_uom;
        $this->location_id = $location_id;
        $this->location_dest_id = $location_dest_id;
        $this->procure_method = $procure_method;
    }

    /**
     * @param bool|null $show_operations
     */
    public function setShowOperations(?bool $show_operations): void
    {
        $this->show_operations = $show_operations;
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
     * @return OdooRelation|null
     *
     * @SerializedName("warehouse_id")
     */
    public function getWarehouseId(): ?OdooRelation
    {
        return $this->warehouse_id;
    }

    /**
     * @param OdooRelation|null $warehouse_id
     */
    public function setWarehouseId(?OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("has_tracking")
     */
    public function getHasTracking(): ?string
    {
        return $this->has_tracking;
    }

    /**
     * @param string|null $has_tracking
     */
    public function setHasTracking(?string $has_tracking): void
    {
        $this->has_tracking = $has_tracking;
    }

    /**
     * @return float|null
     *
     * @SerializedName("quantity_done")
     */
    public function getQuantityDone(): ?float
    {
        return $this->quantity_done;
    }

    /**
     * @param float|null $quantity_done
     */
    public function setQuantityDone(?float $quantity_done): void
    {
        $this->quantity_done = $quantity_done;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_operations")
     */
    public function isShowOperations(): ?bool
    {
        return $this->show_operations;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_details_visible")
     */
    public function isShowDetailsVisible(): ?bool
    {
        return $this->show_details_visible;
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
     * @param bool|null $show_details_visible
     */
    public function setShowDetailsVisible(?bool $show_details_visible): void
    {
        $this->show_details_visible = $show_details_visible;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_reserved_availability")
     */
    public function isShowReservedAvailability(): ?bool
    {
        return $this->show_reserved_availability;
    }

    /**
     * @param bool|null $show_reserved_availability
     */
    public function setShowReservedAvailability(?bool $show_reserved_availability): void
    {
        $this->show_reserved_availability = $show_reserved_availability;
    }

    /**
     * @return string|null
     *
     * @SerializedName("picking_code")
     */
    public function getPickingCode(): ?string
    {
        return $this->picking_code;
    }

    /**
     * @param string|null $picking_code
     */
    public function setPickingCode(?string $picking_code): void
    {
        $this->picking_code = $picking_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_type")
     */
    public function getProductType(): ?string
    {
        return $this->product_type;
    }

    /**
     * @param string|null $product_type
     */
    public function setProductType(?string $product_type): void
    {
        $this->product_type = $product_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("additional")
     */
    public function isAdditional(): ?bool
    {
        return $this->additional;
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
     * @param OdooRelation[]|null $route_ids
     */
    public function setRouteIds(?array $route_ids): void
    {
        $this->route_ids = $route_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_locked")
     */
    public function isIsLocked(): ?bool
    {
        return $this->is_locked;
    }

    /**
     * @param OdooRelation $item
     */
    public function addReturnedMoveIds(OdooRelation $item): void
    {
        if ($this->hasReturnedMoveIds($item)) {
            return;
        }

        if (null === $this->returned_move_ids) {
            $this->returned_move_ids = [];
        }

        $this->returned_move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineNosuggestIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_nosuggest_ids) {
            return false;
        }

        return in_array($item, $this->move_line_nosuggest_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineNosuggestIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineNosuggestIds($item)) {
            return;
        }

        if (null === $this->move_line_nosuggest_ids) {
            $this->move_line_nosuggest_ids = [];
        }

        $this->move_line_nosuggest_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineNosuggestIds(OdooRelation $item): void
    {
        if (null === $this->move_line_nosuggest_ids) {
            $this->move_line_nosuggest_ids = [];
        }

        if ($this->hasMoveLineNosuggestIds($item)) {
            $index = array_search($item, $this->move_line_nosuggest_ids);
            unset($this->move_line_nosuggest_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("origin_returned_move_id")
     */
    public function getOriginReturnedMoveId(): ?OdooRelation
    {
        return $this->origin_returned_move_id;
    }

    /**
     * @param OdooRelation|null $origin_returned_move_id
     */
    public function setOriginReturnedMoveId(?OdooRelation $origin_returned_move_id): void
    {
        $this->origin_returned_move_id = $origin_returned_move_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("returned_move_ids")
     */
    public function getReturnedMoveIds(): ?array
    {
        return $this->returned_move_ids;
    }

    /**
     * @param OdooRelation[]|null $returned_move_ids
     */
    public function setReturnedMoveIds(?array $returned_move_ids): void
    {
        $this->returned_move_ids = $returned_move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReturnedMoveIds(OdooRelation $item): bool
    {
        if (null === $this->returned_move_ids) {
            return false;
        }

        return in_array($item, $this->returned_move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReturnedMoveIds(OdooRelation $item): void
    {
        if (null === $this->returned_move_ids) {
            $this->returned_move_ids = [];
        }

        if ($this->hasReturnedMoveIds($item)) {
            $index = array_search($item, $this->returned_move_ids);
            unset($this->returned_move_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("route_ids")
     */
    public function getRouteIds(): ?array
    {
        return $this->route_ids;
    }

    /**
     * @return float|null
     *
     * @SerializedName("reserved_availability")
     */
    public function getReservedAvailability(): ?float
    {
        return $this->reserved_availability;
    }

    /**
     * @param float|null $reserved_availability
     */
    public function setReservedAvailability(?float $reserved_availability): void
    {
        $this->reserved_availability = $reserved_availability;
    }

    /**
     * @return float|null
     *
     * @SerializedName("availability")
     */
    public function getAvailability(): ?float
    {
        return $this->availability;
    }

    /**
     * @param float|null $availability
     */
    public function setAvailability(?float $availability): void
    {
        $this->availability = $availability;
    }

    /**
     * @return string|null
     *
     * @SerializedName("string_availability_info")
     */
    public function getStringAvailabilityInfo(): ?string
    {
        return $this->string_availability_info;
    }

    /**
     * @param string|null $string_availability_info
     */
    public function setStringAvailabilityInfo(?string $string_availability_info): void
    {
        $this->string_availability_info = $string_availability_info;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("restrict_partner_id")
     */
    public function getRestrictPartnerId(): ?OdooRelation
    {
        return $this->restrict_partner_id;
    }

    /**
     * @param OdooRelation|null $restrict_partner_id
     */
    public function setRestrictPartnerId(?OdooRelation $restrict_partner_id): void
    {
        $this->restrict_partner_id = $restrict_partner_id;
    }

    /**
     * @param bool|null $additional
     */
    public function setAdditional(?bool $additional): void
    {
        $this->additional = $additional;
    }

    /**
     * @param bool|null $is_locked
     */
    public function setIsLocked(?bool $is_locked): void
    {
        $this->is_locked = $is_locked;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_nosuggest_ids")
     */
    public function getMoveLineNosuggestIds(): ?array
    {
        return $this->move_line_nosuggest_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("created_purchase_line_id")
     */
    public function getCreatedPurchaseLineId(): ?OdooRelation
    {
        return $this->created_purchase_line_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAccountMoveIds(OdooRelation $item): void
    {
        if (null === $this->account_move_ids) {
            $this->account_move_ids = [];
        }

        if ($this->hasAccountMoveIds($item)) {
            $index = array_search($item, $this->account_move_ids);
            unset($this->account_move_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_valuation_layer_ids")
     */
    public function getStockValuationLayerIds(): ?array
    {
        return $this->stock_valuation_layer_ids;
    }

    /**
     * @param OdooRelation[]|null $stock_valuation_layer_ids
     */
    public function setStockValuationLayerIds(?array $stock_valuation_layer_ids): void
    {
        $this->stock_valuation_layer_ids = $stock_valuation_layer_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStockValuationLayerIds(OdooRelation $item): bool
    {
        if (null === $this->stock_valuation_layer_ids) {
            return false;
        }

        return in_array($item, $this->stock_valuation_layer_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStockValuationLayerIds(OdooRelation $item): void
    {
        if ($this->hasStockValuationLayerIds($item)) {
            return;
        }

        if (null === $this->stock_valuation_layer_ids) {
            $this->stock_valuation_layer_ids = [];
        }

        $this->stock_valuation_layer_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStockValuationLayerIds(OdooRelation $item): void
    {
        if (null === $this->stock_valuation_layer_ids) {
            $this->stock_valuation_layer_ids = [];
        }

        if ($this->hasStockValuationLayerIds($item)) {
            $index = array_search($item, $this->stock_valuation_layer_ids);
            unset($this->stock_valuation_layer_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("purchase_line_id")
     */
    public function getPurchaseLineId(): ?OdooRelation
    {
        return $this->purchase_line_id;
    }

    /**
     * @param OdooRelation|null $purchase_line_id
     */
    public function setPurchaseLineId(?OdooRelation $purchase_line_id): void
    {
        $this->purchase_line_id = $purchase_line_id;
    }

    /**
     * @param OdooRelation|null $created_purchase_line_id
     */
    public function setCreatedPurchaseLineId(?OdooRelation $created_purchase_line_id): void
    {
        $this->created_purchase_line_id = $created_purchase_line_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountMoveIds(OdooRelation $item): bool
    {
        if (null === $this->account_move_ids) {
            return false;
        }

        return in_array($item, $this->account_move_ids);
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_line_id")
     */
    public function getSaleLineId(): ?OdooRelation
    {
        return $this->sale_line_id;
    }

    /**
     * @param OdooRelation|null $sale_line_id
     */
    public function setSaleLineId(?OdooRelation $sale_line_id): void
    {
        $this->sale_line_id = $sale_line_id;
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
     * @param OdooRelation $item
     */
    public function addAccountMoveIds(OdooRelation $item): void
    {
        if ($this->hasAccountMoveIds($item)) {
            return;
        }

        if (null === $this->account_move_ids) {
            $this->account_move_ids = [];
        }

        $this->account_move_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $account_move_ids
     */
    public function setAccountMoveIds(?array $account_move_ids): void
    {
        $this->account_move_ids = $account_move_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_initial_demand_editable")
     */
    public function isIsInitialDemandEditable(): ?bool
    {
        return $this->is_initial_demand_editable;
    }

    /**
     * @param OdooRelation|null $package_level_id
     */
    public function setPackageLevelId(?OdooRelation $package_level_id): void
    {
        $this->package_level_id = $package_level_id;
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
     *
     * @SerializedName("is_quantity_done_editable")
     */
    public function isIsQuantityDoneEditable(): ?bool
    {
        return $this->is_quantity_done_editable;
    }

    /**
     * @param bool|null $is_quantity_done_editable
     */
    public function setIsQuantityDoneEditable(?bool $is_quantity_done_editable): void
    {
        $this->is_quantity_done_editable = $is_quantity_done_editable;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reference")
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_move_lines")
     */
    public function isHasMoveLines(): ?bool
    {
        return $this->has_move_lines;
    }

    /**
     * @param bool|null $has_move_lines
     */
    public function setHasMoveLines(?bool $has_move_lines): void
    {
        $this->has_move_lines = $has_move_lines;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("package_level_id")
     */
    public function getPackageLevelId(): ?OdooRelation
    {
        return $this->package_level_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("picking_type_entire_packs")
     */
    public function isPickingTypeEntirePacks(): ?bool
    {
        return $this->picking_type_entire_packs;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("account_move_ids")
     */
    public function getAccountMoveIds(): ?array
    {
        return $this->account_move_ids;
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
     *
     * @SerializedName("display_assign_serial")
     */
    public function isDisplayAssignSerial(): ?bool
    {
        return $this->display_assign_serial;
    }

    /**
     * @param bool|null $display_assign_serial
     */
    public function setDisplayAssignSerial(?bool $display_assign_serial): void
    {
        $this->display_assign_serial = $display_assign_serial;
    }

    /**
     * @return string|null
     *
     * @SerializedName("next_serial")
     */
    public function getNextSerial(): ?string
    {
        return $this->next_serial;
    }

    /**
     * @param string|null $next_serial
     */
    public function setNextSerial(?string $next_serial): void
    {
        $this->next_serial = $next_serial;
    }

    /**
     * @return int|null
     *
     * @SerializedName("next_serial_count")
     */
    public function getNextSerialCount(): ?int
    {
        return $this->next_serial_count;
    }

    /**
     * @param int|null $next_serial_count
     */
    public function setNextSerialCount(?int $next_serial_count): void
    {
        $this->next_serial_count = $next_serial_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_refund")
     */
    public function isToRefund(): ?bool
    {
        return $this->to_refund;
    }

    /**
     * @param bool|null $to_refund
     */
    public function setToRefund(?bool $to_refund): void
    {
        $this->to_refund = $to_refund;
    }

    /**
     * @param OdooRelation[]|null $move_line_nosuggest_ids
     */
    public function setMoveLineNosuggestIds(?array $move_line_nosuggest_ids): void
    {
        $this->move_line_nosuggest_ids = $move_line_nosuggest_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        if ($this->hasMoveLineIds($item)) {
            $index = array_search($item, $this->move_line_ids);
            unset($this->move_line_ids[$index]);
        }
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $location_dest_id
     */
    public function setLocationDestId(OdooRelation $location_dest_id): void
    {
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @param OdooRelation $product_uom
     */
    public function setProductUom(OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_category_id")
     */
    public function getProductUomCategoryId(): ?OdooRelation
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
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
     * @return OdooRelation
     *
     * @SerializedName("location_dest_id")
     */
    public function getLocationDestId(): OdooRelation
    {
        return $this->location_dest_id;
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
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_dest_ids")
     */
    public function getMoveDestIds(): ?array
    {
        return $this->move_dest_ids;
    }

    /**
     * @param OdooRelation[]|null $move_dest_ids
     */
    public function setMoveDestIds(?array $move_dest_ids): void
    {
        $this->move_dest_ids = $move_dest_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveDestIds(OdooRelation $item): bool
    {
        if (null === $this->move_dest_ids) {
            return false;
        }

        return in_array($item, $this->move_dest_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveDestIds(OdooRelation $item): void
    {
        if ($this->hasMoveDestIds($item)) {
            return;
        }

        if (null === $this->move_dest_ids) {
            $this->move_dest_ids = [];
        }

        $this->move_dest_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveDestIds(OdooRelation $item): void
    {
        if (null === $this->move_dest_ids) {
            $this->move_dest_ids = [];
        }

        if ($this->hasMoveDestIds($item)) {
            $index = array_search($item, $this->move_dest_ids);
            unset($this->move_dest_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_orig_ids")
     */
    public function getMoveOrigIds(): ?array
    {
        return $this->move_orig_ids;
    }

    /**
     * @param OdooRelation[]|null $move_orig_ids
     */
    public function setMoveOrigIds(?array $move_orig_ids): void
    {
        $this->move_orig_ids = $move_orig_ids;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_uom")
     */
    public function getProductUom(): OdooRelation
    {
        return $this->product_uom;
    }

    /**
     * @return float
     *
     * @SerializedName("product_uom_qty")
     */
    public function getProductUomQty(): float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveOrigIds(OdooRelation $item): void
    {
        if ($this->hasMoveOrigIds($item)) {
            return;
        }

        if (null === $this->move_orig_ids) {
            $this->move_orig_ids = [];
        }

        $this->move_orig_ids[] = $item;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("priority")
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param string|null $priority
     */
    public function setPriority(?string $priority): void
    {
        $this->priority = $priority;
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
     * @return DateTimeInterface
     *
     * @SerializedName("date")
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_expected")
     */
    public function getDateExpected(): DateTimeInterface
    {
        return $this->date_expected;
    }

    /**
     * @param DateTimeInterface $date_expected
     */
    public function setDateExpected(DateTimeInterface $date_expected): void
    {
        $this->date_expected = $date_expected;
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
     * @return string|null
     *
     * @SerializedName("description_picking")
     */
    public function getDescriptionPicking(): ?string
    {
        return $this->description_picking;
    }

    /**
     * @param string|null $description_picking
     */
    public function setDescriptionPicking(?string $description_picking): void
    {
        $this->description_picking = $description_picking;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveOrigIds(OdooRelation $item): bool
    {
        if (null === $this->move_orig_ids) {
            return false;
        }

        return in_array($item, $this->move_orig_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveOrigIds(OdooRelation $item): void
    {
        if (null === $this->move_orig_ids) {
            $this->move_orig_ids = [];
        }

        if ($this->hasMoveOrigIds($item)) {
            $index = array_search($item, $this->move_orig_ids);
            unset($this->move_orig_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            return;
        }

        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        $this->move_line_ids[] = $item;
    }

    /**
     * @param int|null $propagate_date_minimum_delta
     */
    public function setPropagateDateMinimumDelta(?int $propagate_date_minimum_delta): void
    {
        $this->propagate_date_minimum_delta = $propagate_date_minimum_delta;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("rule_id")
     */
    public function getRuleId(): ?OdooRelation
    {
        return $this->rule_id;
    }

    /**
     * @param OdooRelation|null $rule_id
     */
    public function setRuleId(?OdooRelation $rule_id): void
    {
        $this->rule_id = $rule_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("propagate_cancel")
     */
    public function isPropagateCancel(): ?bool
    {
        return $this->propagate_cancel;
    }

    /**
     * @param bool|null $propagate_cancel
     */
    public function setPropagateCancel(?bool $propagate_cancel): void
    {
        $this->propagate_cancel = $propagate_cancel;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("propagate_date")
     */
    public function isPropagateDate(): ?bool
    {
        return $this->propagate_date;
    }

    /**
     * @param bool|null $propagate_date
     */
    public function setPropagateDate(?bool $propagate_date): void
    {
        $this->propagate_date = $propagate_date;
    }

    /**
     * @return int|null
     *
     * @SerializedName("propagate_date_minimum_delta")
     */
    public function getPropagateDateMinimumDelta(): ?int
    {
        return $this->propagate_date_minimum_delta;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("delay_alert")
     */
    public function isDelayAlert(): ?bool
    {
        return $this->delay_alert;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeScrapIds(OdooRelation $item): void
    {
        if (null === $this->scrap_ids) {
            $this->scrap_ids = [];
        }

        if ($this->hasScrapIds($item)) {
            $index = array_search($item, $this->scrap_ids);
            unset($this->scrap_ids[$index]);
        }
    }

    /**
     * @param bool|null $delay_alert
     */
    public function setDelayAlert(?bool $delay_alert): void
    {
        $this->delay_alert = $delay_alert;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("picking_type_id")
     */
    public function getPickingTypeId(): ?OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation|null $picking_type_id
     */
    public function setPickingTypeId(?OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_ids")
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
    }

    /**
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_ids) {
            return false;
        }

        return in_array($item, $this->move_line_ids);
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("group_id")
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addScrapIds(OdooRelation $item): void
    {
        if ($this->hasScrapIds($item)) {
            return;
        }

        if (null === $this->scrap_ids) {
            $this->scrap_ids = [];
        }

        $this->scrap_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("picking_id")
     */
    public function getPickingId(): ?OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param float|null $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("picking_partner_id")
     */
    public function getPickingPartnerId(): ?OdooRelation
    {
        return $this->picking_partner_id;
    }

    /**
     * @param OdooRelation|null $picking_partner_id
     */
    public function setPickingPartnerId(?OdooRelation $picking_partner_id): void
    {
        $this->picking_partner_id = $picking_partner_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_unit")
     */
    public function getPriceUnit(): ?float
    {
        return $this->price_unit;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("backorder_id")
     */
    public function getBackorderId(): ?OdooRelation
    {
        return $this->backorder_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasScrapIds(OdooRelation $item): bool
    {
        if (null === $this->scrap_ids) {
            return false;
        }

        return in_array($item, $this->scrap_ids);
    }

    /**
     * @param OdooRelation|null $backorder_id
     */
    public function setBackorderId(?OdooRelation $backorder_id): void
    {
        $this->backorder_id = $backorder_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("origin")
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string
     *
     * @SerializedName("procure_method")
     */
    public function getProcureMethod(): string
    {
        return $this->procure_method;
    }

    /**
     * @param string $procure_method
     */
    public function setProcureMethod(string $procure_method): void
    {
        $this->procure_method = $procure_method;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("scrapped")
     */
    public function isScrapped(): ?bool
    {
        return $this->scrapped;
    }

    /**
     * @param bool|null $scrapped
     */
    public function setScrapped(?bool $scrapped): void
    {
        $this->scrapped = $scrapped;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("scrap_ids")
     */
    public function getScrapIds(): ?array
    {
        return $this->scrap_ids;
    }

    /**
     * @param OdooRelation[]|null $scrap_ids
     */
    public function setScrapIds(?array $scrap_ids): void
    {
        $this->scrap_ids = $scrap_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.move';
    }
}
