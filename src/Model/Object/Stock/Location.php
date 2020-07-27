<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.location
 * ---
 * Name : stock.location
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
final class Location extends Base
{
    /**
     * Location Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Full Location Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Active
     * ---
     * By unchecking the active field, you may hide a location without deleting it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Location Type
     * ---
     * * Vendor Location: Virtual location representing the source location for products coming from your vendors
     * * View: Virtual location used to create a hierarchical structures for your warehouse, aggregating its child
     * locations ; can't directly contain products
     * * Internal Location: Physical locations inside your own warehouses,
     * * Customer Location: Virtual location representing the destination location for products sent to your
     * customers
     * * Inventory Loss: Virtual location serving as counterpart for inventory operations used to correct stock
     * levels (Physical inventories)
     * * Production: Virtual counterpart location for production operations: this location consumes the components
     * and produces finished products
     * * Transit Location: Counterpart location that should be used in inter-company or inter-warehouses operations
     * ---
     * Selection : (default value, usually null)
     *     -> supplier (Vendor Location)
     *     -> view (View)
     *     -> internal (Internal Location)
     *     -> customer (Customer Location)
     *     -> inventory (Inventory Loss)
     *     -> production (Production)
     *     -> transit (Transit Location)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $usage;

    /**
     * Parent Location
     * ---
     * The parent location that includes this location. Example : The 'Dispatch Zone' is the 'Gate 1' parent
     * location.
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_id;

    /**
     * Contains
     * ---
     * Relation : one2many (stock.location -> location_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_ids;

    /**
     * Additional Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $comment;

    /**
     * Corridor (X)
     * ---
     * Optional localization details, for information purpose only
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $posx;

    /**
     * Shelves (Y)
     * ---
     * Optional localization details, for information purpose only
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $posy;

    /**
     * Height (Z)
     * ---
     * Optional localization details, for information purpose only
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $posz;

    /**
     * Parent Path
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_path;

    /**
     * Company
     * ---
     * Let this field empty if this location is shared between companies
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
     * Is a Scrap Location?
     * ---
     * Check this box to allow using this location to put scrapped/damaged goods.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $scrap_location;

    /**
     * Is a Return Location?
     * ---
     * Check this box to allow using this location as a return location.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $return_location;

    /**
     * Removal Strategy
     * ---
     * Defines the default method used for suggesting the exact location (shelf) where to take the products from,
     * which lot etc. for this location. This method can be enforced at the product category level, and a fallback is
     * made on the parent locations if none is set here.
     * ---
     * Relation : many2one (product.removal)
     * @see \Flux\OdooApiClient\Model\Object\Product\Removal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $removal_strategy_id;

    /**
     * Putaway Rules
     * ---
     * Relation : one2many (stock.putaway.rule -> location_in_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Putaway\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $putaway_rule_ids;

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
     * Quant
     * ---
     * Relation : one2many (stock.quant -> location_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $quant_ids;

    /**
     * Stock Valuation Account (Incoming)
     * ---
     * Used for real-time inventory valuation. When set on a virtual location (non internal type), this account will
     * be used to hold the value of products being moved from an internal location into this location, instead of the
     * generic Stock Output Account set on the product. This has no effect for internal locations.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $valuation_in_account_id;

    /**
     * Stock Valuation Account (Outgoing)
     * ---
     * Used for real-time inventory valuation. When set on a virtual location (non internal type), this account will
     * be used to hold the value of products being moved out of this location and into an internal location, instead
     * of the generic Stock Output Account set on the product. This has no effect for internal locations.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $valuation_out_account_id;

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
     * @param string $name Location Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $usage Location Type
     *        ---
     *        * Vendor Location: Virtual location representing the source location for products coming from your vendors
     *        * View: Virtual location used to create a hierarchical structures for your warehouse, aggregating its child
     *        locations ; can't directly contain products
     *        * Internal Location: Physical locations inside your own warehouses,
     *        * Customer Location: Virtual location representing the destination location for products sent to your
     *        customers
     *        * Inventory Loss: Virtual location serving as counterpart for inventory operations used to correct stock
     *        levels (Physical inventories)
     *        * Production: Virtual counterpart location for production operations: this location consumes the components
     *        and produces finished products
     *        * Transit Location: Counterpart location that should be used in inter-company or inter-warehouses operations
     *        ---
     *        Selection : (default value, usually null)
     *            -> supplier (Vendor Location)
     *            -> view (View)
     *            -> internal (Internal Location)
     *            -> customer (Customer Location)
     *            -> inventory (Inventory Loss)
     *            -> production (Production)
     *            -> transit (Transit Location)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $usage)
    {
        $this->name = $name;
        $this->usage = $usage;
    }

    /**
     * @param OdooRelation $item
     */
    public function addQuantIds(OdooRelation $item): void
    {
        if ($this->hasQuantIds($item)) {
            return;
        }

        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        $this->quant_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRemovalStrategyId(): ?OdooRelation
    {
        return $this->removal_strategy_id;
    }

    /**
     * @param OdooRelation|null $removal_strategy_id
     */
    public function setRemovalStrategyId(?OdooRelation $removal_strategy_id): void
    {
        $this->removal_strategy_id = $removal_strategy_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPutawayRuleIds(): ?array
    {
        return $this->putaway_rule_ids;
    }

    /**
     * @param OdooRelation[]|null $putaway_rule_ids
     */
    public function setPutawayRuleIds(?array $putaway_rule_ids): void
    {
        $this->putaway_rule_ids = $putaway_rule_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPutawayRuleIds(OdooRelation $item): bool
    {
        if (null === $this->putaway_rule_ids) {
            return false;
        }

        return in_array($item, $this->putaway_rule_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPutawayRuleIds(OdooRelation $item): void
    {
        if ($this->hasPutawayRuleIds($item)) {
            return;
        }

        if (null === $this->putaway_rule_ids) {
            $this->putaway_rule_ids = [];
        }

        $this->putaway_rule_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePutawayRuleIds(OdooRelation $item): void
    {
        if (null === $this->putaway_rule_ids) {
            $this->putaway_rule_ids = [];
        }

        if ($this->hasPutawayRuleIds($item)) {
            $index = array_search($item, $this->putaway_rule_ids);
            unset($this->putaway_rule_ids[$index]);
        }
    }

    /**
     * @return string|null
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
     * @return OdooRelation[]|null
     */
    public function getQuantIds(): ?array
    {
        return $this->quant_ids;
    }

    /**
     * @param OdooRelation[]|null $quant_ids
     */
    public function setQuantIds(?array $quant_ids): void
    {
        $this->quant_ids = $quant_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasQuantIds(OdooRelation $item): bool
    {
        if (null === $this->quant_ids) {
            return false;
        }

        return in_array($item, $this->quant_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeQuantIds(OdooRelation $item): void
    {
        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        if ($this->hasQuantIds($item)) {
            $index = array_search($item, $this->quant_ids);
            unset($this->quant_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isReturnLocation(): ?bool
    {
        return $this->return_location;
    }

    /**
     * @return OdooRelation|null
     */
    public function getValuationInAccountId(): ?OdooRelation
    {
        return $this->valuation_in_account_id;
    }

    /**
     * @param OdooRelation|null $valuation_in_account_id
     */
    public function setValuationInAccountId(?OdooRelation $valuation_in_account_id): void
    {
        $this->valuation_in_account_id = $valuation_in_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getValuationOutAccountId(): ?OdooRelation
    {
        return $this->valuation_out_account_id;
    }

    /**
     * @param OdooRelation|null $valuation_out_account_id
     */
    public function setValuationOutAccountId(?OdooRelation $valuation_out_account_id): void
    {
        $this->valuation_out_account_id = $valuation_out_account_id;
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
     * @param bool|null $return_location
     */
    public function setReturnLocation(?bool $return_location): void
    {
        $this->return_location = $return_location;
    }

    /**
     * @param bool|null $scrap_location
     */
    public function setScrapLocation(?bool $scrap_location): void
    {
        $this->scrap_location = $scrap_location;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
    }

    /**
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
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
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @param string $usage
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return OdooRelation|null
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
     * @return OdooRelation[]|null
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isScrapLocation(): ?bool
    {
        return $this->scrap_location;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int|null
     */
    public function getPosx(): ?int
    {
        return $this->posx;
    }

    /**
     * @param int|null $posx
     */
    public function setPosx(?int $posx): void
    {
        $this->posx = $posx;
    }

    /**
     * @return int|null
     */
    public function getPosy(): ?int
    {
        return $this->posy;
    }

    /**
     * @param int|null $posy
     */
    public function setPosy(?int $posy): void
    {
        $this->posy = $posy;
    }

    /**
     * @return int|null
     */
    public function getPosz(): ?int
    {
        return $this->posz;
    }

    /**
     * @param int|null $posz
     */
    public function setPosz(?int $posz): void
    {
        $this->posz = $posz;
    }

    /**
     * @return string|null
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.location';
    }
}
