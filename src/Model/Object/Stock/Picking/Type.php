<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Picking;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.picking.type
 * ---
 * Name : stock.picking.type
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
final class Type extends Base
{
    /**
     * Operation Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Sequence
     * ---
     * Used to order the 'All Operations' kanban view
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Reference Sequence
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sequence_id;

    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $sequence_code;

    /**
     * Default Source Location
     * ---
     * This is the default source location when you create a picking manually with this operation type. It is
     * possible however to change it or that the routes put another location. If it is empty, it will check for the
     * supplier location on the partner.
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_location_src_id;

    /**
     * Default Destination Location
     * ---
     * This is the default destination location when you create a picking manually with this operation type. It is
     * possible however to change it or that the routes put another location. If it is empty, it will check for the
     * customer location on the partner.
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_location_dest_id;

    /**
     * Type of Operation
     * ---
     * Selection :
     *     -> incoming (Receipt)
     *     -> outgoing (Delivery)
     *     -> internal (Internal Transfer)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Operation Type for Returns
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $return_picking_type_id;

    /**
     * Move Entire Packages
     * ---
     * If ticked, you will be able to select entire packages to move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_entire_packs;

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
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Create New Lots/Serial Numbers
     * ---
     * If this is checked only, it will suppose you want to create new Lots/Serial Numbers, so you can provide them
     * in a text field.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_create_lots;

    /**
     * Use Existing Lots/Serial Numbers
     * ---
     * If this is checked, you will be able to choose the Lots/Serial Numbers. You can also decide to not put lots in
     * this operation type.  This means it will create stock with no lot or not put a restriction on the lot taken.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_existing_lots;

    /**
     * Show Detailed Operations
     * ---
     * If this checkbox is ticked, the pickings lines will represent detailed stock operations. If not, the picking
     * lines will represent an aggregate of detailed stock operations.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_operations;

    /**
     * Pre-fill Detailed Operations
     * ---
     * If this checkbox is ticked, Odoo will automatically pre-fill the detailed operations with the corresponding
     * products, locations and lot/serial numbers.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_reserved;

    /**
     * Count Picking Draft
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking_draft;

    /**
     * Count Picking Ready
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking_ready;

    /**
     * Count Picking
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking;

    /**
     * Count Picking Waiting
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking_waiting;

    /**
     * Count Picking Late
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking_late;

    /**
     * Count Picking Backorders
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count_picking_backorders;

    /**
     * Rate Picking Late
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $rate_picking_late;

    /**
     * Rate Picking Backorders
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $rate_picking_backorders;

    /**
     * Barcode
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $barcode;

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
     * @param string $name Operation Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $sequence_code Code
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Type of Operation
     *        ---
     *        Selection :
     *            -> incoming (Receipt)
     *            -> outgoing (Delivery)
     *            -> internal (Internal Transfer)
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
     */
    public function __construct(string $name, string $sequence_code, string $code, OdooRelation $company_id)
    {
        $this->name = $name;
        $this->sequence_code = $sequence_code;
        $this->code = $code;
        $this->company_id = $company_id;
    }

    /**
     * @param int|null $rate_picking_late
     */
    public function setRatePickingLate(?int $rate_picking_late): void
    {
        $this->rate_picking_late = $rate_picking_late;
    }

    /**
     * @param int|null $count_picking_draft
     */
    public function setCountPickingDraft(?int $count_picking_draft): void
    {
        $this->count_picking_draft = $count_picking_draft;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_picking_ready")
     */
    public function getCountPickingReady(): ?int
    {
        return $this->count_picking_ready;
    }

    /**
     * @param int|null $count_picking_ready
     */
    public function setCountPickingReady(?int $count_picking_ready): void
    {
        $this->count_picking_ready = $count_picking_ready;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_picking")
     */
    public function getCountPicking(): ?int
    {
        return $this->count_picking;
    }

    /**
     * @param int|null $count_picking
     */
    public function setCountPicking(?int $count_picking): void
    {
        $this->count_picking = $count_picking;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_picking_waiting")
     */
    public function getCountPickingWaiting(): ?int
    {
        return $this->count_picking_waiting;
    }

    /**
     * @param int|null $count_picking_waiting
     */
    public function setCountPickingWaiting(?int $count_picking_waiting): void
    {
        $this->count_picking_waiting = $count_picking_waiting;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_picking_late")
     */
    public function getCountPickingLate(): ?int
    {
        return $this->count_picking_late;
    }

    /**
     * @param int|null $count_picking_late
     */
    public function setCountPickingLate(?int $count_picking_late): void
    {
        $this->count_picking_late = $count_picking_late;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count_picking_backorders")
     */
    public function getCountPickingBackorders(): ?int
    {
        return $this->count_picking_backorders;
    }

    /**
     * @param int|null $count_picking_backorders
     */
    public function setCountPickingBackorders(?int $count_picking_backorders): void
    {
        $this->count_picking_backorders = $count_picking_backorders;
    }

    /**
     * @return int|null
     *
     * @SerializedName("rate_picking_late")
     */
    public function getRatePickingLate(): ?int
    {
        return $this->rate_picking_late;
    }

    /**
     * @return int|null
     *
     * @SerializedName("rate_picking_backorders")
     */
    public function getRatePickingBackorders(): ?int
    {
        return $this->rate_picking_backorders;
    }

    /**
     * @param bool|null $show_reserved
     */
    public function setShowReserved(?bool $show_reserved): void
    {
        $this->show_reserved = $show_reserved;
    }

    /**
     * @param int|null $rate_picking_backorders
     */
    public function setRatePickingBackorders(?int $rate_picking_backorders): void
    {
        $this->rate_picking_backorders = $rate_picking_backorders;
    }

    /**
     * @return string|null
     *
     * @SerializedName("barcode")
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * @param string|null $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @return int|null
     *
     * @SerializedName("count_picking_draft")
     */
    public function getCountPickingDraft(): ?int
    {
        return $this->count_picking_draft;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_reserved")
     */
    public function isShowReserved(): ?bool
    {
        return $this->show_reserved;
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
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
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
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sequence_id")
     */
    public function getSequenceId(): ?OdooRelation
    {
        return $this->sequence_id;
    }

    /**
     * @param OdooRelation|null $sequence_id
     */
    public function setSequenceId(?OdooRelation $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @return string
     *
     * @SerializedName("sequence_code")
     */
    public function getSequenceCode(): string
    {
        return $this->sequence_code;
    }

    /**
     * @param string $sequence_code
     */
    public function setSequenceCode(string $sequence_code): void
    {
        $this->sequence_code = $sequence_code;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_location_src_id")
     */
    public function getDefaultLocationSrcId(): ?OdooRelation
    {
        return $this->default_location_src_id;
    }

    /**
     * @param OdooRelation|null $default_location_src_id
     */
    public function setDefaultLocationSrcId(?OdooRelation $default_location_src_id): void
    {
        $this->default_location_src_id = $default_location_src_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_location_dest_id")
     */
    public function getDefaultLocationDestId(): ?OdooRelation
    {
        return $this->default_location_dest_id;
    }

    /**
     * @param OdooRelation|null $default_location_dest_id
     */
    public function setDefaultLocationDestId(?OdooRelation $default_location_dest_id): void
    {
        $this->default_location_dest_id = $default_location_dest_id;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param bool|null $show_operations
     */
    public function setShowOperations(?bool $show_operations): void
    {
        $this->show_operations = $show_operations;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("return_picking_type_id")
     */
    public function getReturnPickingTypeId(): ?OdooRelation
    {
        return $this->return_picking_type_id;
    }

    /**
     * @param OdooRelation|null $return_picking_type_id
     */
    public function setReturnPickingTypeId(?OdooRelation $return_picking_type_id): void
    {
        $this->return_picking_type_id = $return_picking_type_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_entire_packs")
     */
    public function isShowEntirePacks(): ?bool
    {
        return $this->show_entire_packs;
    }

    /**
     * @param bool|null $show_entire_packs
     */
    public function setShowEntirePacks(?bool $show_entire_packs): void
    {
        $this->show_entire_packs = $show_entire_packs;
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
     * @return bool|null
     *
     * @SerializedName("active")
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
     * @return bool|null
     *
     * @SerializedName("use_create_lots")
     */
    public function isUseCreateLots(): ?bool
    {
        return $this->use_create_lots;
    }

    /**
     * @param bool|null $use_create_lots
     */
    public function setUseCreateLots(?bool $use_create_lots): void
    {
        $this->use_create_lots = $use_create_lots;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_existing_lots")
     */
    public function isUseExistingLots(): ?bool
    {
        return $this->use_existing_lots;
    }

    /**
     * @param bool|null $use_existing_lots
     */
    public function setUseExistingLots(?bool $use_existing_lots): void
    {
        $this->use_existing_lots = $use_existing_lots;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.picking.type';
    }
}
