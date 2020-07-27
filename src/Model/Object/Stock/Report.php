<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.report
 * ---
 * Name : stock.report
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
final class Report extends Base
{
    /**
     * Transfer Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_done;

    /**
     * Creation Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $creation_date;

    /**
     * Expected Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $scheduled_date;

    /**
     * Delay (Days)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $delay;

    /**
     * Cycle Time (Days)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $cycle_time;

    /**
     * Type
     * ---
     * Selection : (default value, usually null)
     *     -> incoming (Vendors)
     *     -> outgoing (Customers)
     *     -> internal (Internal)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $picking_type_code;

    /**
     * Operation Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $operation_type;

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
     * Picking Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $picking_name;

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
     * Inventory Adjustment
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
     * Status
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
     * Partner
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
     * Is a Backorder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_backorder;

    /**
     * Product Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_qty;

    /**
     * Is Late
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_late;

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
     * Product Category
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
     * Valuation of Inventory using a Domain
     * ---
     * Note that you can only access this value in the read_group, only the sum operator is supported
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $valuation;

    /**
     * Total Valuation of Inventory
     * ---
     * Note that you can only access this value in the read_group, only the sum operator is supported and only
     * date_done is used from the domain
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $stock_value;

    /**
     * @return DateTimeInterface|null
     */
    public function getDateDone(): ?DateTimeInterface
    {
        return $this->date_done;
    }

    /**
     * @return bool|null
     */
    public function isIsLate(): ?bool
    {
        return $this->is_late;
    }

    /**
     * @return string|null
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
     * @return OdooRelation|null
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
     * @return bool|null
     */
    public function isIsBackorder(): ?bool
    {
        return $this->is_backorder;
    }

    /**
     * @param bool|null $is_backorder
     */
    public function setIsBackorder(?bool $is_backorder): void
    {
        $this->is_backorder = $is_backorder;
    }

    /**
     * @return float|null
     */
    public function getProductQty(): ?float
    {
        return $this->product_qty;
    }

    /**
     * @param float|null $product_qty
     */
    public function setProductQty(?float $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @param bool|null $is_late
     */
    public function setIsLate(?bool $is_late): void
    {
        $this->is_late = $is_late;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInventoryId(): ?OdooRelation
    {
        return $this->inventory_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
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
     * @return float|null
     */
    public function getValuation(): ?float
    {
        return $this->valuation;
    }

    /**
     * @param float|null $valuation
     */
    public function setValuation(?float $valuation): void
    {
        $this->valuation = $valuation;
    }

    /**
     * @return float|null
     */
    public function getStockValue(): ?float
    {
        return $this->stock_value;
    }

    /**
     * @param float|null $stock_value
     */
    public function setStockValue(?float $stock_value): void
    {
        $this->stock_value = $stock_value;
    }

    /**
     * @param OdooRelation|null $inventory_id
     */
    public function setInventoryId(?OdooRelation $inventory_id): void
    {
        $this->inventory_id = $inventory_id;
    }

    /**
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @param DateTimeInterface|null $date_done
     */
    public function setDateDone(?DateTimeInterface $date_done): void
    {
        $this->date_done = $date_done;
    }

    /**
     * @return string|null
     */
    public function getPickingTypeCode(): ?string
    {
        return $this->picking_type_code;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreationDate(): ?DateTimeInterface
    {
        return $this->creation_date;
    }

    /**
     * @param DateTimeInterface|null $creation_date
     */
    public function setCreationDate(?DateTimeInterface $creation_date): void
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getScheduledDate(): ?DateTimeInterface
    {
        return $this->scheduled_date;
    }

    /**
     * @param DateTimeInterface|null $scheduled_date
     */
    public function setScheduledDate(?DateTimeInterface $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return float|null
     */
    public function getDelay(): ?float
    {
        return $this->delay;
    }

    /**
     * @param float|null $delay
     */
    public function setDelay(?float $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return float|null
     */
    public function getCycleTime(): ?float
    {
        return $this->cycle_time;
    }

    /**
     * @param float|null $cycle_time
     */
    public function setCycleTime(?float $cycle_time): void
    {
        $this->cycle_time = $cycle_time;
    }

    /**
     * @param string|null $picking_type_code
     */
    public function setPickingTypeCode(?string $picking_type_code): void
    {
        $this->picking_type_code = $picking_type_code;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickingId(): ?OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @return string|null
     */
    public function getOperationType(): ?string
    {
        return $this->operation_type;
    }

    /**
     * @param string|null $operation_type
     */
    public function setOperationType(?string $operation_type): void
    {
        $this->operation_type = $operation_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string|null
     */
    public function getPickingName(): ?string
    {
        return $this->picking_name;
    }

    /**
     * @param string|null $picking_name
     */
    public function setPickingName(?string $picking_name): void
    {
        $this->picking_name = $picking_name;
    }

    /**
     * @return string|null
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.report';
    }
}
