<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.package_level
 * ---
 * Name : stock.package_level
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
final class PackageLevel extends Base
{
    /**
     * Package
     * ---
     * Relation : many2one (stock.quant.package)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant\Package
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $package_id;

    /**
     * Picking
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
     * Move
     * ---
     * Relation : one2many (stock.move -> package_level_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * Move Line
     * ---
     * Relation : one2many (stock.move.line -> package_level_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

    /**
     * From
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
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
     * @var OdooRelation|null
     */
    private $location_dest_id;

    /**
     * Done
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_done;

    /**
     * State
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> confirmed (Confirmed)
     *     -> assigned (Reserved)
     *     -> new (New)
     *     -> done (Done)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * Is Fresh Package
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_fresh_package;

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
    private $picking_type_code;

    /**
     * Show Lots M2O
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_lots_m2o;

    /**
     * Show Lots Text
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_lots_text;

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
     * @param OdooRelation $package_id Package
     *        ---
     *        Relation : many2one (stock.quant.package)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Quant\Package
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
    public function __construct(OdooRelation $package_id, OdooRelation $company_id)
    {
        $this->package_id = $package_id;
        $this->company_id = $company_id;
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
     * @param bool|null $is_fresh_package
     */
    public function setIsFreshPackage(?bool $is_fresh_package): void
    {
        $this->is_fresh_package = $is_fresh_package;
    }

    /**
     * @return string|null
     *
     * @SerializedName("picking_type_code")
     */
    public function getPickingTypeCode(): ?string
    {
        return $this->picking_type_code;
    }

    /**
     * @param string|null $picking_type_code
     */
    public function setPickingTypeCode(?string $picking_type_code): void
    {
        $this->picking_type_code = $picking_type_code;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_lots_m2o")
     */
    public function isShowLotsM2o(): ?bool
    {
        return $this->show_lots_m2o;
    }

    /**
     * @param bool|null $show_lots_m2o
     */
    public function setShowLotsM2o(?bool $show_lots_m2o): void
    {
        $this->show_lots_m2o = $show_lots_m2o;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_lots_text")
     */
    public function isShowLotsText(): ?bool
    {
        return $this->show_lots_text;
    }

    /**
     * @param bool|null $show_lots_text
     */
    public function setShowLotsText(?bool $show_lots_text): void
    {
        $this->show_lots_text = $show_lots_text;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @return bool|null
     *
     * @SerializedName("is_fresh_package")
     */
    public function isIsFreshPackage(): ?bool
    {
        return $this->is_fresh_package;
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
     * @return OdooRelation
     *
     * @SerializedName("package_id")
     */
    public function getPackageId(): OdooRelation
    {
        return $this->package_id;
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
     * @param OdooRelation $package_id
     */
    public function setPackageId(OdooRelation $package_id): void
    {
        $this->package_id = $package_id;
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
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_ids")
     */
    public function getMoveIds(): ?array
    {
        return $this->move_ids;
    }

    /**
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveIds(OdooRelation $item): bool
    {
        if (null === $this->move_ids) {
            return false;
        }

        return in_array($item, $this->move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveIds(OdooRelation $item): void
    {
        if ($this->hasMoveIds($item)) {
            return;
        }

        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        $this->move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveIds(OdooRelation $item): void
    {
        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        if ($this->hasMoveIds($item)) {
            $index = array_search($item, $this->move_ids);
            unset($this->move_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param bool|null $is_done
     */
    public function setIsDone(?bool $is_done): void
    {
        $this->is_done = $is_done;
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
     * @return OdooRelation|null
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): ?OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation|null $location_id
     */
    public function setLocationId(?OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("location_dest_id")
     */
    public function getLocationDestId(): ?OdooRelation
    {
        return $this->location_dest_id;
    }

    /**
     * @param OdooRelation|null $location_dest_id
     */
    public function setLocationDestId(?OdooRelation $location_dest_id): void
    {
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_done")
     */
    public function isIsDone(): ?bool
    {
        return $this->is_done;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.package_level';
    }
}
