<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.warehouse
 * ---
 * Name : stock.warehouse
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
final class Warehouse extends Base
{
    /**
     * Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Company
     * ---
     * The company is automatically set from your user preferences.
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
     * Address
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
     * View Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $view_location_id;

    /**
     * Location Stock
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $lot_stock_id;

    /**
     * Short Name
     * ---
     * Short name used to identify your warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Routes
     * ---
     * Defaults routes through the warehouse
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
     * Incoming Shipments
     * ---
     * Default incoming route to follow
     * ---
     * Selection : (default value, usually null)
     *     -> one_step (Receive goods directly (1 step))
     *     -> two_steps (Receive goods in input and then stock (2 steps))
     *     -> three_steps (Receive goods in input, then quality and then stock (3 steps))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reception_steps;

    /**
     * Outgoing Shipments
     * ---
     * Default outgoing route to follow
     * ---
     * Selection : (default value, usually null)
     *     -> ship_only (Deliver goods directly (1 step))
     *     -> pick_ship (Send goods in output and then deliver (2 steps))
     *     -> pick_pack_ship (Pack goods, send goods in output and then deliver (3 steps))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $delivery_steps;

    /**
     * Input Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wh_input_stock_loc_id;

    /**
     * Quality Control Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wh_qc_stock_loc_id;

    /**
     * Output Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wh_output_stock_loc_id;

    /**
     * Packing Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wh_pack_stock_loc_id;

    /**
     * MTO rule
     * ---
     * Relation : many2one (stock.rule)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mto_pull_id;

    /**
     * Pick Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pick_type_id;

    /**
     * Pack Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pack_type_id;

    /**
     * Out Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $out_type_id;

    /**
     * In Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $in_type_id;

    /**
     * Internal Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $int_type_id;

    /**
     * Crossdock Route
     * ---
     * Relation : many2one (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $crossdock_route_id;

    /**
     * Receipt Route
     * ---
     * Relation : many2one (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $reception_route_id;

    /**
     * Delivery Route
     * ---
     * Relation : many2one (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $delivery_route_id;

    /**
     * Warehouse Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $warehouse_count;

    /**
     * Resupply From
     * ---
     * Routes will be created automatically to resupply this warehouse from the warehouses ticked
     * ---
     * Relation : many2many (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $resupply_wh_ids;

    /**
     * Resupply Routes
     * ---
     * Routes will be created for these resupply warehouses and you can select them on products and product
     * categories
     * ---
     * Relation : one2many (stock.location.route -> supplied_wh_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $resupply_route_ids;

    /**
     * Show Resupply
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_resupply;

    /**
     * Sequence
     * ---
     * Gives the sequence of this line when displaying the warehouses.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Point of Sale Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pos_type_id;

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
     * @param string $name Warehouse
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        The company is automatically set from your user preferences.
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $view_location_id View Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $lot_stock_id Location Stock
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Short Name
     *        ---
     *        Short name used to identify your warehouse
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $reception_steps Incoming Shipments
     *        ---
     *        Default incoming route to follow
     *        ---
     *        Selection : (default value, usually null)
     *            -> one_step (Receive goods directly (1 step))
     *            -> two_steps (Receive goods in input and then stock (2 steps))
     *            -> three_steps (Receive goods in input, then quality and then stock (3 steps))
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $delivery_steps Outgoing Shipments
     *        ---
     *        Default outgoing route to follow
     *        ---
     *        Selection : (default value, usually null)
     *            -> ship_only (Deliver goods directly (1 step))
     *            -> pick_ship (Send goods in output and then deliver (2 steps))
     *            -> pick_pack_ship (Pack goods, send goods in output and then deliver (3 steps))
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $company_id,
        OdooRelation $view_location_id,
        OdooRelation $lot_stock_id,
        string $code,
        string $reception_steps,
        string $delivery_steps
    ) {
        $this->name = $name;
        $this->company_id = $company_id;
        $this->view_location_id = $view_location_id;
        $this->lot_stock_id = $lot_stock_id;
        $this->code = $code;
        $this->reception_steps = $reception_steps;
        $this->delivery_steps = $delivery_steps;
    }

    /**
     * @param OdooRelation|null $delivery_route_id
     */
    public function setDeliveryRouteId(?OdooRelation $delivery_route_id): void
    {
        $this->delivery_route_id = $delivery_route_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addResupplyWhIds(OdooRelation $item): void
    {
        if ($this->hasResupplyWhIds($item)) {
            return;
        }

        if (null === $this->resupply_wh_ids) {
            $this->resupply_wh_ids = [];
        }

        $this->resupply_wh_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasResupplyWhIds(OdooRelation $item): bool
    {
        if (null === $this->resupply_wh_ids) {
            return false;
        }

        return in_array($item, $this->resupply_wh_ids);
    }

    /**
     * @param OdooRelation[]|null $resupply_wh_ids
     */
    public function setResupplyWhIds(?array $resupply_wh_ids): void
    {
        $this->resupply_wh_ids = $resupply_wh_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getResupplyWhIds(): ?array
    {
        return $this->resupply_wh_ids;
    }

    /**
     * @param int|null $warehouse_count
     */
    public function setWarehouseCount(?int $warehouse_count): void
    {
        $this->warehouse_count = $warehouse_count;
    }

    /**
     * @return int|null
     */
    public function getWarehouseCount(): ?int
    {
        return $this->warehouse_count;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDeliveryRouteId(): ?OdooRelation
    {
        return $this->delivery_route_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getResupplyRouteIds(): ?array
    {
        return $this->resupply_route_ids;
    }

    /**
     * @param OdooRelation|null $reception_route_id
     */
    public function setReceptionRouteId(?OdooRelation $reception_route_id): void
    {
        $this->reception_route_id = $reception_route_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getReceptionRouteId(): ?OdooRelation
    {
        return $this->reception_route_id;
    }

    /**
     * @param OdooRelation|null $crossdock_route_id
     */
    public function setCrossdockRouteId(?OdooRelation $crossdock_route_id): void
    {
        $this->crossdock_route_id = $crossdock_route_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCrossdockRouteId(): ?OdooRelation
    {
        return $this->crossdock_route_id;
    }

    /**
     * @param OdooRelation|null $int_type_id
     */
    public function setIntTypeId(?OdooRelation $int_type_id): void
    {
        $this->int_type_id = $int_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIntTypeId(): ?OdooRelation
    {
        return $this->int_type_id;
    }

    /**
     * @param OdooRelation|null $in_type_id
     */
    public function setInTypeId(?OdooRelation $in_type_id): void
    {
        $this->in_type_id = $in_type_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeResupplyWhIds(OdooRelation $item): void
    {
        if (null === $this->resupply_wh_ids) {
            $this->resupply_wh_ids = [];
        }

        if ($this->hasResupplyWhIds($item)) {
            $index = array_search($item, $this->resupply_wh_ids);
            unset($this->resupply_wh_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $resupply_route_ids
     */
    public function setResupplyRouteIds(?array $resupply_route_ids): void
    {
        $this->resupply_route_ids = $resupply_route_ids;
    }

    /**
     * @param OdooRelation|null $out_type_id
     */
    public function setOutTypeId(?OdooRelation $out_type_id): void
    {
        $this->out_type_id = $out_type_id;
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
     * @param OdooRelation|null $pos_type_id
     */
    public function setPosTypeId(?OdooRelation $pos_type_id): void
    {
        $this->pos_type_id = $pos_type_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasResupplyRouteIds(OdooRelation $item): bool
    {
        if (null === $this->resupply_route_ids) {
            return false;
        }

        return in_array($item, $this->resupply_route_ids);
    }

    /**
     * @return OdooRelation|null
     */
    public function getPosTypeId(): ?OdooRelation
    {
        return $this->pos_type_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param bool|null $show_resupply
     */
    public function setShowResupply(?bool $show_resupply): void
    {
        $this->show_resupply = $show_resupply;
    }

    /**
     * @return bool|null
     */
    public function isShowResupply(): ?bool
    {
        return $this->show_resupply;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeResupplyRouteIds(OdooRelation $item): void
    {
        if (null === $this->resupply_route_ids) {
            $this->resupply_route_ids = [];
        }

        if ($this->hasResupplyRouteIds($item)) {
            $index = array_search($item, $this->resupply_route_ids);
            unset($this->resupply_route_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addResupplyRouteIds(OdooRelation $item): void
    {
        if ($this->hasResupplyRouteIds($item)) {
            return;
        }

        if (null === $this->resupply_route_ids) {
            $this->resupply_route_ids = [];
        }

        $this->resupply_route_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInTypeId(): ?OdooRelation
    {
        return $this->in_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getOutTypeId(): ?OdooRelation
    {
        return $this->out_type_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $view_location_id
     */
    public function setViewLocationId(OdooRelation $view_location_id): void
    {
        $this->view_location_id = $view_location_id;
    }

    /**
     * @param OdooRelation[]|null $route_ids
     */
    public function setRouteIds(?array $route_ids): void
    {
        $this->route_ids = $route_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRouteIds(): ?array
    {
        return $this->route_ids;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param OdooRelation $lot_stock_id
     */
    public function setLotStockId(OdooRelation $lot_stock_id): void
    {
        $this->lot_stock_id = $lot_stock_id;
    }

    /**
     * @return OdooRelation
     */
    public function getLotStockId(): OdooRelation
    {
        return $this->lot_stock_id;
    }

    /**
     * @return OdooRelation
     */
    public function getViewLocationId(): OdooRelation
    {
        return $this->view_location_id;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @param OdooRelation|null $pack_type_id
     */
    public function setPackTypeId(?OdooRelation $pack_type_id): void
    {
        $this->pack_type_id = $pack_type_id;
    }

    /**
     * @param OdooRelation|null $wh_output_stock_loc_id
     */
    public function setWhOutputStockLocId(?OdooRelation $wh_output_stock_loc_id): void
    {
        $this->wh_output_stock_loc_id = $wh_output_stock_loc_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPackTypeId(): ?OdooRelation
    {
        return $this->pack_type_id;
    }

    /**
     * @param OdooRelation|null $pick_type_id
     */
    public function setPickTypeId(?OdooRelation $pick_type_id): void
    {
        $this->pick_type_id = $pick_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickTypeId(): ?OdooRelation
    {
        return $this->pick_type_id;
    }

    /**
     * @param OdooRelation|null $mto_pull_id
     */
    public function setMtoPullId(?OdooRelation $mto_pull_id): void
    {
        $this->mto_pull_id = $mto_pull_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMtoPullId(): ?OdooRelation
    {
        return $this->mto_pull_id;
    }

    /**
     * @param OdooRelation|null $wh_pack_stock_loc_id
     */
    public function setWhPackStockLocId(?OdooRelation $wh_pack_stock_loc_id): void
    {
        $this->wh_pack_stock_loc_id = $wh_pack_stock_loc_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWhPackStockLocId(): ?OdooRelation
    {
        return $this->wh_pack_stock_loc_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWhOutputStockLocId(): ?OdooRelation
    {
        return $this->wh_output_stock_loc_id;
    }

    /**
     * @return string
     */
    public function getReceptionSteps(): string
    {
        return $this->reception_steps;
    }

    /**
     * @param OdooRelation|null $wh_qc_stock_loc_id
     */
    public function setWhQcStockLocId(?OdooRelation $wh_qc_stock_loc_id): void
    {
        $this->wh_qc_stock_loc_id = $wh_qc_stock_loc_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWhQcStockLocId(): ?OdooRelation
    {
        return $this->wh_qc_stock_loc_id;
    }

    /**
     * @param OdooRelation|null $wh_input_stock_loc_id
     */
    public function setWhInputStockLocId(?OdooRelation $wh_input_stock_loc_id): void
    {
        $this->wh_input_stock_loc_id = $wh_input_stock_loc_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWhInputStockLocId(): ?OdooRelation
    {
        return $this->wh_input_stock_loc_id;
    }

    /**
     * @param string $delivery_steps
     */
    public function setDeliverySteps(string $delivery_steps): void
    {
        $this->delivery_steps = $delivery_steps;
    }

    /**
     * @return string
     */
    public function getDeliverySteps(): string
    {
        return $this->delivery_steps;
    }

    /**
     * @param string $reception_steps
     */
    public function setReceptionSteps(string $reception_steps): void
    {
        $this->reception_steps = $reception_steps;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.warehouse';
    }
}
