<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.inventory
 * ---
 * Name : stock.inventory
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
final class Inventory extends Base
{
    /**
     * Inventory Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Inventory Date
     * ---
     * If the inventory adjustment is not validated, date at which the theoritical quantities have been checked.
     * If the inventory adjustment is validated, date at which the inventory adjustment has been validated.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Inventories
     * ---
     * Relation : one2many (stock.inventory.line -> inventory_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Inventory\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Created Moves
     * ---
     * Relation : one2many (stock.move -> inventory_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * Status
     * ---
     * Selection : (default value, usually null)
     *     -> draft (Draft)
     *     -> cancel (Cancelled)
     *     -> confirm (In Progress)
     *     -> done (Validated)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

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
     * Locations
     * ---
     * Relation : many2many (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $location_ids;

    /**
     * Products
     * ---
     * Specify Products to focus your inventory on particular Products.
     * ---
     * Relation : many2many (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_ids;

    /**
     * Empty Inventory
     * ---
     * Allows to start with an empty inventory.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $start_empty;

    /**
     * Counted Quantities
     * ---
     * Allows to start with prefill counted quantity for each lines or with all counted quantity set to zero.
     * ---
     * Selection : (default value, usually null)
     *     -> counted (Default to stock on hand)
     *     -> zero (Default to zero)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $prefill_counted_quantity;

    /**
     * Accounting Date
     * ---
     * Date at which the accounting entries will be created in case of automated inventory valuation. If empty, the
     * inventory date will be used.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $accounting_date;

    /**
     * Has Account Moves
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_account_moves;

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
     * @param string $name Inventory Reference
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Inventory Date
     *        ---
     *        If the inventory adjustment is not validated, date at which the theoritical quantities have been checked.
     *        If the inventory adjustment is validated, date at which the inventory adjustment has been validated.
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
    public function __construct(string $name, DateTimeInterface $date, OdooRelation $company_id)
    {
        $this->name = $name;
        $this->date = $date;
        $this->company_id = $company_id;
    }

    /**
     * @param DateTimeInterface|null $accounting_date
     */
    public function setAccountingDate(?DateTimeInterface $accounting_date): void
    {
        $this->accounting_date = $accounting_date;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductIds(OdooRelation $item): bool
    {
        if (null === $this->product_ids) {
            return false;
        }

        return in_array($item, $this->product_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductIds(OdooRelation $item): void
    {
        if ($this->hasProductIds($item)) {
            return;
        }

        if (null === $this->product_ids) {
            $this->product_ids = [];
        }

        $this->product_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductIds(OdooRelation $item): void
    {
        if (null === $this->product_ids) {
            $this->product_ids = [];
        }

        if ($this->hasProductIds($item)) {
            $index = array_search($item, $this->product_ids);
            unset($this->product_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isStartEmpty(): ?bool
    {
        return $this->start_empty;
    }

    /**
     * @param bool|null $start_empty
     */
    public function setStartEmpty(?bool $start_empty): void
    {
        $this->start_empty = $start_empty;
    }

    /**
     * @return string|null
     */
    public function getPrefillCountedQuantity(): ?string
    {
        return $this->prefill_counted_quantity;
    }

    /**
     * @param string|null $prefill_counted_quantity
     */
    public function setPrefillCountedQuantity(?string $prefill_counted_quantity): void
    {
        $this->prefill_counted_quantity = $prefill_counted_quantity;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getAccountingDate(): ?DateTimeInterface
    {
        return $this->accounting_date;
    }

    /**
     * @return bool|null
     */
    public function isHasAccountMoves(): ?bool
    {
        return $this->has_account_moves;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getProductIds(): ?array
    {
        return $this->product_ids;
    }

    /**
     * @param bool|null $has_account_moves
     */
    public function setHasAccountMoves(?bool $has_account_moves): void
    {
        $this->has_account_moves = $has_account_moves;
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
     * @param OdooRelation[]|null $product_ids
     */
    public function setProductIds(?array $product_ids): void
    {
        $this->product_ids = $product_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLocationIds(OdooRelation $item): void
    {
        if (null === $this->location_ids) {
            $this->location_ids = [];
        }

        if ($this->hasLocationIds($item)) {
            $index = array_search($item, $this->location_ids);
            unset($this->location_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMoveIds(): ?array
    {
        return $this->move_ids;
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
    public function addLocationIds(OdooRelation $item): void
    {
        if ($this->hasLocationIds($item)) {
            return;
        }

        if (null === $this->location_ids) {
            $this->location_ids = [];
        }

        $this->location_ids[] = $item;
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
     * @return OdooRelation
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
     * @return OdooRelation[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->location_ids;
    }

    /**
     * @param OdooRelation[]|null $location_ids
     */
    public function setLocationIds(?array $location_ids): void
    {
        $this->location_ids = $location_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLocationIds(OdooRelation $item): bool
    {
        if (null === $this->location_ids) {
            return false;
        }

        return in_array($item, $this->location_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.inventory';
    }
}
