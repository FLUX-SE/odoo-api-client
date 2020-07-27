<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.category
 * ---
 * Name : product.category
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
final class Category extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Complete Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Parent Category
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

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
     * Child Categories
     * ---
     * Relation : one2many (product.category -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_id;

    /**
     * # Products
     * ---
     * The number of products under this category (Does not consider the children categories)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $product_count;

    /**
     * Income Account
     * ---
     * This account will be used when validating a customer invoice.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account
     * ---
     * The expense is accounted for when a vendor bill is validated, except in anglo-saxon accounting with perpetual
     * inventory valuation in which case the expense (Cost of Goods Sold account) is recognized at the customer
     * invoice validation.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_account_expense_categ_id;

    /**
     * TIC Code
     * ---
     * This refers to TIC (Taxability Information Codes), these are used by TaxCloud to compute specific tax rates
     * for each product type. This value is used when no TIC is set on the product. If no value is set here, the
     * default value set in Invoicing settings is used.
     * ---
     * Relation : many2one (product.tic.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Tic\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tic_category_id;

    /**
     * Routes
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
     * Force Removal Strategy
     * ---
     * Set a specific removal strategy that will be used regardless of the source location for this product category
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
     * Total routes
     * ---
     * Relation : many2many (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $total_route_ids;

    /**
     * Putaway Rules
     * ---
     * Relation : one2many (stock.putaway.rule -> category_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Putaway\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $putaway_rule_ids;

    /**
     * Inventory Valuation
     * ---
     * Manual: The accounting entries to value the inventory are not posted automatically.
     *                 Automated: An accounting entry is automatically created to value the inventory when a product
     * enters or leaves the company.
     *                 
     * ---
     * Selection : (default value, usually null)
     *     -> manual_periodic (Manual)
     *     -> real_time (Automated)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $property_valuation;

    /**
     * Costing Method
     * ---
     * Standard Price: The products are valued at their standard cost defined on the product.
     *                 Average Cost (AVCO): The products are valued at weighted average cost.
     *                 First In First Out (FIFO): The products are valued supposing those that enter the company
     * first will also leave it first.
     *                 
     * ---
     * Selection : (default value, usually null)
     *     -> standard (Standard Price)
     *     -> fifo (First In First Out (FIFO))
     *     -> average (Average Cost (AVCO))
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $property_cost_method;

    /**
     * Stock Journal
     * ---
     * When doing automated inventory valuation, this is the Accounting Journal in which entries will be
     * automatically posted when stock moves are processed.
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_stock_journal;

    /**
     * Stock Input Account
     * ---
     * When doing automated inventory valuation, counterpart journal items for all incoming stock moves will be
     * posted in this account,
     *                                 unless there is a specific valuation account set on the source location. This
     * is the default value for all products in this category.
     *                                 It can also directly be set on each product.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_stock_account_input_categ_id;

    /**
     * Stock Output Account
     * ---
     * When doing automated inventory valuation, counterpart journal items for all outgoing stock moves will be
     * posted in this account,
     *                                 unless there is a specific valuation account set on the destination location.
     * This is the default value for all products in this category.
     *                                 It can also directly be set on each product.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_stock_account_output_categ_id;

    /**
     * Stock Valuation Account
     * ---
     * When automated inventory valuation is enabled on a product, this account will hold the current value of the
     * products.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_stock_valuation_account_id;

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
     *        Searchable : yes
     *        Sortable : yes
     * @param string $property_valuation Inventory Valuation
     *        ---
     *        Manual: The accounting entries to value the inventory are not posted automatically.
     *                        Automated: An accounting entry is automatically created to value the inventory when a product
     *        enters or leaves the company.
     *                        
     *        ---
     *        Selection : (default value, usually null)
     *            -> manual_periodic (Manual)
     *            -> real_time (Automated)
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $property_cost_method Costing Method
     *        ---
     *        Standard Price: The products are valued at their standard cost defined on the product.
     *                        Average Cost (AVCO): The products are valued at weighted average cost.
     *                        First In First Out (FIFO): The products are valued supposing those that enter the company
     *        first will also leave it first.
     *                        
     *        ---
     *        Selection : (default value, usually null)
     *            -> standard (Standard Price)
     *            -> fifo (First In First Out (FIFO))
     *            -> average (Average Cost (AVCO))
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(string $name, string $property_valuation, string $property_cost_method)
    {
        $this->name = $name;
        $this->property_valuation = $property_valuation;
        $this->property_cost_method = $property_cost_method;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockAccountInputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_input_categ_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTotalRouteIds(OdooRelation $item): void
    {
        if (null === $this->total_route_ids) {
            $this->total_route_ids = [];
        }

        if ($this->hasTotalRouteIds($item)) {
            $index = array_search($item, $this->total_route_ids);
            unset($this->total_route_ids[$index]);
        }
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
     * @return string
     */
    public function getPropertyValuation(): string
    {
        return $this->property_valuation;
    }

    /**
     * @param string $property_valuation
     */
    public function setPropertyValuation(string $property_valuation): void
    {
        $this->property_valuation = $property_valuation;
    }

    /**
     * @return string
     */
    public function getPropertyCostMethod(): string
    {
        return $this->property_cost_method;
    }

    /**
     * @param string $property_cost_method
     */
    public function setPropertyCostMethod(string $property_cost_method): void
    {
        $this->property_cost_method = $property_cost_method;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockJournal(): ?OdooRelation
    {
        return $this->property_stock_journal;
    }

    /**
     * @param OdooRelation|null $property_stock_journal
     */
    public function setPropertyStockJournal(?OdooRelation $property_stock_journal): void
    {
        $this->property_stock_journal = $property_stock_journal;
    }

    /**
     * @param OdooRelation|null $property_stock_account_input_categ_id
     */
    public function setPropertyStockAccountInputCategId(
        ?OdooRelation $property_stock_account_input_categ_id
    ): void {
        $this->property_stock_account_input_categ_id = $property_stock_account_input_categ_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTotalRouteIds(OdooRelation $item): bool
    {
        if (null === $this->total_route_ids) {
            return false;
        }

        return in_array($item, $this->total_route_ids);
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockAccountOutputCategId(): ?OdooRelation
    {
        return $this->property_stock_account_output_categ_id;
    }

    /**
     * @param OdooRelation|null $property_stock_account_output_categ_id
     */
    public function setPropertyStockAccountOutputCategId(
        ?OdooRelation $property_stock_account_output_categ_id
    ): void {
        $this->property_stock_account_output_categ_id = $property_stock_account_output_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockValuationAccountId(): ?OdooRelation
    {
        return $this->property_stock_valuation_account_id;
    }

    /**
     * @param OdooRelation|null $property_stock_valuation_account_id
     */
    public function setPropertyStockValuationAccountId(
        ?OdooRelation $property_stock_valuation_account_id
    ): void {
        $this->property_stock_valuation_account_id = $property_stock_valuation_account_id;
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
    public function addTotalRouteIds(OdooRelation $item): void
    {
        if ($this->hasTotalRouteIds($item)) {
            return;
        }

        if (null === $this->total_route_ids) {
            $this->total_route_ids = [];
        }

        $this->total_route_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $total_route_ids
     */
    public function setTotalRouteIds(?array $total_route_ids): void
    {
        $this->total_route_ids = $total_route_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getProductCount(): ?int
    {
        return $this->product_count;
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
     * @return OdooRelation|null
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
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
     * @return OdooRelation[]|null
     */
    public function getChildId(): ?array
    {
        return $this->child_id;
    }

    /**
     * @param OdooRelation[]|null $child_id
     */
    public function setChildId(?array $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildId(OdooRelation $item): bool
    {
        if (null === $this->child_id) {
            return false;
        }

        return in_array($item, $this->child_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildId(OdooRelation $item): void
    {
        if ($this->hasChildId($item)) {
            return;
        }

        if (null === $this->child_id) {
            $this->child_id = [];
        }

        $this->child_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildId(OdooRelation $item): void
    {
        if (null === $this->child_id) {
            $this->child_id = [];
        }

        if ($this->hasChildId($item)) {
            $index = array_search($item, $this->child_id);
            unset($this->child_id[$index]);
        }
    }

    /**
     * @param int|null $product_count
     */
    public function setProductCount(?int $product_count): void
    {
        $this->product_count = $product_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTotalRouteIds(): ?array
    {
        return $this->total_route_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountIncomeCategId(): ?OdooRelation
    {
        return $this->property_account_income_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(?OdooRelation $property_account_income_categ_id): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountExpenseCategId(): ?OdooRelation
    {
        return $this->property_account_expense_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(?OdooRelation $property_account_expense_categ_id): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTicCategoryId(): ?OdooRelation
    {
        return $this->tic_category_id;
    }

    /**
     * @param OdooRelation|null $tic_category_id
     */
    public function setTicCategoryId(?OdooRelation $tic_category_id): void
    {
        $this->tic_category_id = $tic_category_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRouteIds(): ?array
    {
        return $this->route_ids;
    }

    /**
     * @param OdooRelation[]|null $route_ids
     */
    public function setRouteIds(?array $route_ids): void
    {
        $this->route_ids = $route_ids;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.category';
    }
}
