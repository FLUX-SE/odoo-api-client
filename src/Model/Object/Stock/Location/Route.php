<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Location;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.location.route
 * ---
 * Name : stock.location.route
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
final class Route extends Base
{
    /**
     * Route
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
     * If the active field is set to False, it will allow you to hide the route without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

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
     * Rules
     * ---
     * Relation : one2many (stock.rule -> route_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rule_ids;

    /**
     * Applicable on Product
     * ---
     * When checked, the route will be selectable in the Inventory tab of the Product form.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $product_selectable;

    /**
     * Applicable on Product Category
     * ---
     * When checked, the route will be selectable on the Product Category.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $product_categ_selectable;

    /**
     * Applicable on Warehouse
     * ---
     * When a warehouse is selected for this route, this route should be seen as the default route when products pass
     * through this warehouse.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $warehouse_selectable;

    /**
     * Supplied Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $supplied_wh_id;

    /**
     * Supplying Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $supplier_wh_id;

    /**
     * Company
     * ---
     * Leave this field empty if this route is shared between all companies
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
     * Products
     * ---
     * Relation : many2many (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_ids;

    /**
     * Product Categories
     * ---
     * Relation : many2many (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $categ_ids;

    /**
     * Warehouse Domain
     * ---
     * Relation : one2many (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $warehouse_domain_ids;

    /**
     * Warehouses
     * ---
     * Relation : many2many (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $warehouse_ids;

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
     * @param string $name Route
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWarehouseIds(): ?array
    {
        return $this->warehouse_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getCategIds(): ?array
    {
        return $this->categ_ids;
    }

    /**
     * @param OdooRelation[]|null $categ_ids
     */
    public function setCategIds(?array $categ_ids): void
    {
        $this->categ_ids = $categ_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCategIds(OdooRelation $item): bool
    {
        if (null === $this->categ_ids) {
            return false;
        }

        return in_array($item, $this->categ_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addCategIds(OdooRelation $item): void
    {
        if ($this->hasCategIds($item)) {
            return;
        }

        if (null === $this->categ_ids) {
            $this->categ_ids = [];
        }

        $this->categ_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCategIds(OdooRelation $item): void
    {
        if (null === $this->categ_ids) {
            $this->categ_ids = [];
        }

        if ($this->hasCategIds($item)) {
            $index = array_search($item, $this->categ_ids);
            unset($this->categ_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWarehouseDomainIds(): ?array
    {
        return $this->warehouse_domain_ids;
    }

    /**
     * @param OdooRelation[]|null $warehouse_domain_ids
     */
    public function setWarehouseDomainIds(?array $warehouse_domain_ids): void
    {
        $this->warehouse_domain_ids = $warehouse_domain_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWarehouseDomainIds(OdooRelation $item): bool
    {
        if (null === $this->warehouse_domain_ids) {
            return false;
        }

        return in_array($item, $this->warehouse_domain_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addWarehouseDomainIds(OdooRelation $item): void
    {
        if ($this->hasWarehouseDomainIds($item)) {
            return;
        }

        if (null === $this->warehouse_domain_ids) {
            $this->warehouse_domain_ids = [];
        }

        $this->warehouse_domain_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWarehouseDomainIds(OdooRelation $item): void
    {
        if (null === $this->warehouse_domain_ids) {
            $this->warehouse_domain_ids = [];
        }

        if ($this->hasWarehouseDomainIds($item)) {
            $index = array_search($item, $this->warehouse_domain_ids);
            unset($this->warehouse_domain_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $warehouse_ids
     */
    public function setWarehouseIds(?array $warehouse_ids): void
    {
        $this->warehouse_ids = $warehouse_ids;
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
     *
     * @return bool
     */
    public function hasWarehouseIds(OdooRelation $item): bool
    {
        if (null === $this->warehouse_ids) {
            return false;
        }

        return in_array($item, $this->warehouse_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addWarehouseIds(OdooRelation $item): void
    {
        if ($this->hasWarehouseIds($item)) {
            return;
        }

        if (null === $this->warehouse_ids) {
            $this->warehouse_ids = [];
        }

        $this->warehouse_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWarehouseIds(OdooRelation $item): void
    {
        if (null === $this->warehouse_ids) {
            $this->warehouse_ids = [];
        }

        if ($this->hasWarehouseIds($item)) {
            $index = array_search($item, $this->warehouse_ids);
            unset($this->warehouse_ids[$index]);
        }
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool|null
     */
    public function isProductSelectable(): ?bool
    {
        return $this->product_selectable;
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
     * @return OdooRelation[]|null
     */
    public function getRuleIds(): ?array
    {
        return $this->rule_ids;
    }

    /**
     * @param OdooRelation[]|null $rule_ids
     */
    public function setRuleIds(?array $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRuleIds(OdooRelation $item): bool
    {
        if (null === $this->rule_ids) {
            return false;
        }

        return in_array($item, $this->rule_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRuleIds(OdooRelation $item): void
    {
        if ($this->hasRuleIds($item)) {
            return;
        }

        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        $this->rule_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRuleIds(OdooRelation $item): void
    {
        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        if ($this->hasRuleIds($item)) {
            $index = array_search($item, $this->rule_ids);
            unset($this->rule_ids[$index]);
        }
    }

    /**
     * @param bool|null $product_selectable
     */
    public function setProductSelectable(?bool $product_selectable): void
    {
        $this->product_selectable = $product_selectable;
    }

    /**
     * @param OdooRelation[]|null $product_ids
     */
    public function setProductIds(?array $product_ids): void
    {
        $this->product_ids = $product_ids;
    }

    /**
     * @return bool|null
     */
    public function isProductCategSelectable(): ?bool
    {
        return $this->product_categ_selectable;
    }

    /**
     * @param bool|null $product_categ_selectable
     */
    public function setProductCategSelectable(?bool $product_categ_selectable): void
    {
        $this->product_categ_selectable = $product_categ_selectable;
    }

    /**
     * @return bool|null
     */
    public function isWarehouseSelectable(): ?bool
    {
        return $this->warehouse_selectable;
    }

    /**
     * @param bool|null $warehouse_selectable
     */
    public function setWarehouseSelectable(?bool $warehouse_selectable): void
    {
        $this->warehouse_selectable = $warehouse_selectable;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSuppliedWhId(): ?OdooRelation
    {
        return $this->supplied_wh_id;
    }

    /**
     * @param OdooRelation|null $supplied_wh_id
     */
    public function setSuppliedWhId(?OdooRelation $supplied_wh_id): void
    {
        $this->supplied_wh_id = $supplied_wh_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSupplierWhId(): ?OdooRelation
    {
        return $this->supplier_wh_id;
    }

    /**
     * @param OdooRelation|null $supplier_wh_id
     */
    public function setSupplierWhId(?OdooRelation $supplier_wh_id): void
    {
        $this->supplier_wh_id = $supplier_wh_id;
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
     * @return OdooRelation[]|null
     */
    public function getProductIds(): ?array
    {
        return $this->product_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.location.route';
    }
}
