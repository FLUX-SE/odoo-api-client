<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.rule
 * ---
 * Name : stock.rule
 * ---
 * Info :
 * A rule describe what a procurement should do; produce, buy, move, ...
 */
final class Rule extends Base
{
    /**
     * Name
     * ---
     * This field will fill the packing origin and the name of its moves
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
     * If unchecked, it will allow you to hide the rule without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Propagation of Procurement Group
     * ---
     * Selection : (default value, usually null)
     *     -> none (Leave Empty)
     *     -> propagate (Propagate)
     *     -> fixed (Fixed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $group_propagation_option;

    /**
     * Fixed Procurement Group
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
     * Action
     * ---
     * Selection : (default value, usually null)
     *     -> pull (Pull From)
     *     -> push (Push To)
     *     -> pull_push (Pull & Push)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $action;

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
     * Destination Location
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
     * Source Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_src_id;

    /**
     * Route
     * ---
     * Relation : many2one (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $route_id;

    /**
     * Supply Method
     * ---
     * Take From Stock: the products will be taken from the available stock of the source location.
     * Trigger Another Rule: the system will try to find a stock rule to bring the products in the source location.
     * The available stock will be ignored.
     * Take From Stock, if Unavailable, Trigger Another Rule: the products will be taken from the available stock of
     * the source location.If there is no stock available, the system will try to find a  rule to bring the products
     * in the source location.
     * ---
     * Selection : (default value, usually null)
     *     -> make_to_stock (Take From Stock)
     *     -> make_to_order (Trigger Another Rule)
     *     -> mts_else_mto (Take From Stock, if unavailable, Trigger Another Rule)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $procure_method;

    /**
     * Route Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $route_sequence;

    /**
     * Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $picking_type_id;

    /**
     * Delay
     * ---
     * The expected date of the created transfer will be computed based on this delay.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $delay;

    /**
     * Partner Address
     * ---
     * Address where goods should be delivered. Optional.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_address_id;

    /**
     * Cancel Next Move
     * ---
     * When ticked, if the move created by this rule is cancelled, the next move will be cancelled too.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $propagate_cancel;

    /**
     * Warehouse
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
     * Warehouse to Propagate
     * ---
     * The warehouse to propagate on the created move/procurement, which can be different of the warehouse this rule
     * is for (e.g for resupplying rules from another warehouse)
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $propagate_warehouse_id;

    /**
     * Automatic Move
     * ---
     * The 'Manual Operation' value will create a stock move after the current one. With 'Automatic No Step Added',
     * the location is replaced in the original move.
     * ---
     * Selection : (default value, usually null)
     *     -> manual (Manual Operation)
     *     -> transparent (Automatic No Step Added)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $auto;

    /**
     * Rule Message
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $rule_message;

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
     * Log an exception on the picking if this move has to be delayed (due to a change in the previous move scheduled
     * date).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $delay_alert;

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
     * @param string $name Name
     *        ---
     *        This field will fill the packing origin and the name of its moves
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $action Action
     *        ---
     *        Selection : (default value, usually null)
     *            -> pull (Pull From)
     *            -> push (Push To)
     *            -> pull_push (Pull & Push)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id Destination Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $route_id Route
     *        ---
     *        Relation : many2one (stock.location.route)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $procure_method Supply Method
     *        ---
     *        Take From Stock: the products will be taken from the available stock of the source location.
     *        Trigger Another Rule: the system will try to find a stock rule to bring the products in the source location.
     *        The available stock will be ignored.
     *        Take From Stock, if Unavailable, Trigger Another Rule: the products will be taken from the available stock of
     *        the source location.If there is no stock available, the system will try to find a  rule to bring the products
     *        in the source location.
     *        ---
     *        Selection : (default value, usually null)
     *            -> make_to_stock (Take From Stock)
     *            -> make_to_order (Trigger Another Rule)
     *            -> mts_else_mto (Take From Stock, if unavailable, Trigger Another Rule)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $picking_type_id Operation Type
     *        ---
     *        Relation : many2one (stock.picking.type)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $auto Automatic Move
     *        ---
     *        The 'Manual Operation' value will create a stock move after the current one. With 'Automatic No Step Added',
     *        the location is replaced in the original move.
     *        ---
     *        Selection : (default value, usually null)
     *            -> manual (Manual Operation)
     *            -> transparent (Automatic No Step Added)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $action,
        OdooRelation $location_id,
        OdooRelation $route_id,
        string $procure_method,
        OdooRelation $picking_type_id,
        string $auto
    ) {
        $this->name = $name;
        $this->action = $action;
        $this->location_id = $location_id;
        $this->route_id = $route_id;
        $this->procure_method = $procure_method;
        $this->picking_type_id = $picking_type_id;
        $this->auto = $auto;
    }

    /**
     * @param bool|null $propagate_date
     */
    public function setPropagateDate(?bool $propagate_date): void
    {
        $this->propagate_date = $propagate_date;
    }

    /**
     * @return bool|null
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
     * @return OdooRelation|null
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
     * @return OdooRelation|null
     */
    public function getPropagateWarehouseId(): ?OdooRelation
    {
        return $this->propagate_warehouse_id;
    }

    /**
     * @param OdooRelation|null $propagate_warehouse_id
     */
    public function setPropagateWarehouseId(?OdooRelation $propagate_warehouse_id): void
    {
        $this->propagate_warehouse_id = $propagate_warehouse_id;
    }

    /**
     * @return string
     */
    public function getAuto(): string
    {
        return $this->auto;
    }

    /**
     * @param string $auto
     */
    public function setAuto(string $auto): void
    {
        $this->auto = $auto;
    }

    /**
     * @return string|null
     */
    public function getRuleMessage(): ?string
    {
        return $this->rule_message;
    }

    /**
     * @param string|null $rule_message
     */
    public function setRuleMessage(?string $rule_message): void
    {
        $this->rule_message = $rule_message;
    }

    /**
     * @return bool|null
     */
    public function isPropagateDate(): ?bool
    {
        return $this->propagate_date;
    }

    /**
     * @return int|null
     */
    public function getPropagateDateMinimumDelta(): ?int
    {
        return $this->propagate_date_minimum_delta;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerAddressId(): ?OdooRelation
    {
        return $this->partner_address_id;
    }

    /**
     * @param int|null $propagate_date_minimum_delta
     */
    public function setPropagateDateMinimumDelta(?int $propagate_date_minimum_delta): void
    {
        $this->propagate_date_minimum_delta = $propagate_date_minimum_delta;
    }

    /**
     * @return bool|null
     */
    public function isDelayAlert(): ?bool
    {
        return $this->delay_alert;
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
     * @param OdooRelation|null $partner_address_id
     */
    public function setPartnerAddressId(?OdooRelation $partner_address_id): void
    {
        $this->partner_address_id = $partner_address_id;
    }

    /**
     * @param int|null $delay
     */
    public function setDelay(?int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     */
    public function getGroupPropagationOption(): ?string
    {
        return $this->group_propagation_option;
    }

    /**
     * @param string|null $group_propagation_option
     */
    public function setGroupPropagationOption(?string $group_propagation_option): void
    {
        $this->group_propagation_option = $group_propagation_option;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return int|null
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return int|null
     */
    public function getDelay(): ?int
    {
        return $this->delay;
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
     * @return OdooRelation|null
     */
    public function getLocationSrcId(): ?OdooRelation
    {
        return $this->location_src_id;
    }

    /**
     * @param OdooRelation|null $location_src_id
     */
    public function setLocationSrcId(?OdooRelation $location_src_id): void
    {
        $this->location_src_id = $location_src_id;
    }

    /**
     * @return OdooRelation
     */
    public function getRouteId(): OdooRelation
    {
        return $this->route_id;
    }

    /**
     * @param OdooRelation $route_id
     */
    public function setRouteId(OdooRelation $route_id): void
    {
        $this->route_id = $route_id;
    }

    /**
     * @return string
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
     * @return int|null
     */
    public function getRouteSequence(): ?int
    {
        return $this->route_sequence;
    }

    /**
     * @param int|null $route_sequence
     */
    public function setRouteSequence(?int $route_sequence): void
    {
        $this->route_sequence = $route_sequence;
    }

    /**
     * @return OdooRelation
     */
    public function getPickingTypeId(): OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation $picking_type_id
     */
    public function setPickingTypeId(OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.rule';
    }
}
