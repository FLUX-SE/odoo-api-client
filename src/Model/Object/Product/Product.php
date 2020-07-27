<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.product
 * ---
 * Name : product.product
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
final class Product extends Template
{
    /**
     * Variant Price Extra
     * ---
     * This is the sum of the extra price of all attributes
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $price_extra;

    /**
     * Reference
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

    /**
     * Customer Ref
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $partner_ref;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     * ---
     * Relation : many2many (product.template.attribute.value)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_template_attribute_value_ids;

    /**
     * Combination Indices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $combination_indices;

    /**
     * Variant Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_variant_128;

    /**
     * Can Variant Image 1024 be zoomed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $can_image_variant_1024_be_zoomed;

    /**
     * Stock Quant
     * ---
     * Technical: used to compute quantities.
     * ---
     * Relation : one2many (stock.quant -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_quant_ids;

    /**
     * Stock Move
     * ---
     * Technical: used to compute quantities.
     * ---
     * Relation : one2many (stock.move -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_move_ids;

    /**
     * Free To Use Quantity 
     * ---
     * Forecast quantity (computed as Quantity On Hand - reserved quantity)
     * In a context with a single Stock Location, this includes goods stored in this location, or any of its
     * children.
     * In a context with a single Warehouse, this includes goods stored in the Stock Location of this Warehouse, or
     * any of its children.
     * Otherwise, this includes goods stored in any Stock Location with 'internal' type.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $free_qty;

    /**
     * Minimum Stock Rules
     * ---
     * Relation : one2many (stock.warehouse.orderpoint -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse\Orderpoint
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $orderpoint_ids;

    /**
     * Putaway Rules
     * ---
     * Relation : one2many (stock.putaway.rule -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Putaway\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $putaway_rule_ids;

    /**
     * Value Svl
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $value_svl;

    /**
     * Quantity Svl
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $quantity_svl;

    /**
     * Stock Valuation Layer
     * ---
     * Relation : one2many (stock.valuation.layer -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Valuation\Layer
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_valuation_layer_ids;

    /**
     * @param OdooRelation $product_tmpl_id Product Template
     *        ---
     *        Relation : many2one (product.template)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $categ_id Product Category
     *        ---
     *        Select category for the current product
     *        ---
     *        Relation : many2one (product.category)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Category
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        ---
     *        Default unit of measure used for all stock operations.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_po_id Purchase Unit of Measure
     *        ---
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $product_variant_ids Products
     *        ---
     *        Relation : one2many (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $type Product Type
     *        ---
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     *        ---
     *        Selection : (default value, usually null)
     *            -> consu (Consumable)
     *            -> service (Service)
     *            -> product (Storable Product)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $tracking Tracking
     *        ---
     *        Ensure the traceability of a storable product in your warehouse.
     *        ---
     *        Selection : (default value, usually null)
     *            -> serial (By Unique Serial Number)
     *            -> lot (By Lots)
     *            -> none (No Tracking)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_tmpl_id,
        string $name,
        OdooRelation $categ_id,
        OdooRelation $uom_id,
        OdooRelation $uom_po_id,
        array $product_variant_ids,
        string $type,
        string $tracking
    ) {
        $this->product_tmpl_id = $product_tmpl_id;
        parent::__construct(
            $name, 
            $categ_id, 
            $uom_id, 
            $uom_po_id, 
            $product_variant_ids, 
            $type, 
            $tracking
        );
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPutawayRuleIds(): ?array
    {
        return $this->putaway_rule_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getStockMoveIds(): ?array
    {
        return $this->stock_move_ids;
    }

    /**
     * @param OdooRelation[]|null $stock_move_ids
     */
    public function setStockMoveIds(?array $stock_move_ids): void
    {
        $this->stock_move_ids = $stock_move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStockMoveIds(OdooRelation $item): bool
    {
        if (null === $this->stock_move_ids) {
            return false;
        }

        return in_array($item, $this->stock_move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStockMoveIds(OdooRelation $item): void
    {
        if ($this->hasStockMoveIds($item)) {
            return;
        }

        if (null === $this->stock_move_ids) {
            $this->stock_move_ids = [];
        }

        $this->stock_move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStockMoveIds(OdooRelation $item): void
    {
        if (null === $this->stock_move_ids) {
            $this->stock_move_ids = [];
        }

        if ($this->hasStockMoveIds($item)) {
            $index = array_search($item, $this->stock_move_ids);
            unset($this->stock_move_ids[$index]);
        }
    }

    /**
     * @return float|null
     */
    public function getFreeQty(): ?float
    {
        return $this->free_qty;
    }

    /**
     * @param float|null $free_qty
     */
    public function setFreeQty(?float $free_qty): void
    {
        $this->free_qty = $free_qty;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getOrderpointIds(): ?array
    {
        return $this->orderpoint_ids;
    }

    /**
     * @param OdooRelation[]|null $orderpoint_ids
     */
    public function setOrderpointIds(?array $orderpoint_ids): void
    {
        $this->orderpoint_ids = $orderpoint_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOrderpointIds(OdooRelation $item): bool
    {
        if (null === $this->orderpoint_ids) {
            return false;
        }

        return in_array($item, $this->orderpoint_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOrderpointIds(OdooRelation $item): void
    {
        if ($this->hasOrderpointIds($item)) {
            return;
        }

        if (null === $this->orderpoint_ids) {
            $this->orderpoint_ids = [];
        }

        $this->orderpoint_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOrderpointIds(OdooRelation $item): void
    {
        if (null === $this->orderpoint_ids) {
            $this->orderpoint_ids = [];
        }

        if ($this->hasOrderpointIds($item)) {
            $index = array_search($item, $this->orderpoint_ids);
            unset($this->orderpoint_ids[$index]);
        }
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
     */
    public function addStockQuantIds(OdooRelation $item): void
    {
        if ($this->hasStockQuantIds($item)) {
            return;
        }

        if (null === $this->stock_quant_ids) {
            $this->stock_quant_ids = [];
        }

        $this->stock_quant_ids[] = $item;
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
     * @return float|null
     */
    public function getValueSvl(): ?float
    {
        return $this->value_svl;
    }

    /**
     * @param float|null $value_svl
     */
    public function setValueSvl(?float $value_svl): void
    {
        $this->value_svl = $value_svl;
    }

    /**
     * @return float|null
     */
    public function getQuantitySvl(): ?float
    {
        return $this->quantity_svl;
    }

    /**
     * @param float|null $quantity_svl
     */
    public function setQuantitySvl(?float $quantity_svl): void
    {
        $this->quantity_svl = $quantity_svl;
    }

    /**
     * @return OdooRelation[]|null
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
     * @param OdooRelation $item
     */
    public function removeStockQuantIds(OdooRelation $item): void
    {
        if (null === $this->stock_quant_ids) {
            $this->stock_quant_ids = [];
        }

        if ($this->hasStockQuantIds($item)) {
            $index = array_search($item, $this->stock_quant_ids);
            unset($this->stock_quant_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStockQuantIds(OdooRelation $item): bool
    {
        if (null === $this->stock_quant_ids) {
            return false;
        }

        return in_array($item, $this->stock_quant_ids);
    }

    /**
     * @return float|null
     */
    public function getPriceExtra(): ?float
    {
        return $this->price_extra;
    }

    /**
     * @return string|null
     */
    public function getCombinationIndices(): ?string
    {
        return $this->combination_indices;
    }

    /**
     * @param float|null $price_extra
     */
    public function setPriceExtra(?float $price_extra): void
    {
        $this->price_extra = $price_extra;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     */
    public function getPartnerRef(): ?string
    {
        return $this->partner_ref;
    }

    /**
     * @param string|null $partner_ref
     */
    public function setPartnerRef(?string $partner_ref): void
    {
        $this->partner_ref = $partner_ref;
    }

    /**
     * @return OdooRelation
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getProductTemplateAttributeValueIds(): ?array
    {
        return $this->product_template_attribute_value_ids;
    }

    /**
     * @param OdooRelation[]|null $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(?array $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTemplateAttributeValueIds(OdooRelation $item): bool
    {
        if (null === $this->product_template_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_template_attribute_value_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductTemplateAttributeValueIds(OdooRelation $item): void
    {
        if ($this->hasProductTemplateAttributeValueIds($item)) {
            return;
        }

        if (null === $this->product_template_attribute_value_ids) {
            $this->product_template_attribute_value_ids = [];
        }

        $this->product_template_attribute_value_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductTemplateAttributeValueIds(OdooRelation $item): void
    {
        if (null === $this->product_template_attribute_value_ids) {
            $this->product_template_attribute_value_ids = [];
        }

        if ($this->hasProductTemplateAttributeValueIds($item)) {
            $index = array_search($item, $this->product_template_attribute_value_ids);
            unset($this->product_template_attribute_value_ids[$index]);
        }
    }

    /**
     * @param string|null $combination_indices
     */
    public function setCombinationIndices(?string $combination_indices): void
    {
        $this->combination_indices = $combination_indices;
    }

    /**
     * @param OdooRelation[]|null $stock_quant_ids
     */
    public function setStockQuantIds(?array $stock_quant_ids): void
    {
        $this->stock_quant_ids = $stock_quant_ids;
    }

    /**
     * @return string|null
     */
    public function getImageVariant1920(): ?string
    {
        return $this->image_variant_1920;
    }

    /**
     * @param string|null $image_variant_1920
     */
    public function setImageVariant1920(?string $image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @return string|null
     */
    public function getImageVariant1024(): ?string
    {
        return $this->image_variant_1024;
    }

    /**
     * @param string|null $image_variant_1024
     */
    public function setImageVariant1024(?string $image_variant_1024): void
    {
        $this->image_variant_1024 = $image_variant_1024;
    }

    /**
     * @return string|null
     */
    public function getImageVariant512(): ?string
    {
        return $this->image_variant_512;
    }

    /**
     * @param string|null $image_variant_512
     */
    public function setImageVariant512(?string $image_variant_512): void
    {
        $this->image_variant_512 = $image_variant_512;
    }

    /**
     * @return string|null
     */
    public function getImageVariant256(): ?string
    {
        return $this->image_variant_256;
    }

    /**
     * @param string|null $image_variant_256
     */
    public function setImageVariant256(?string $image_variant_256): void
    {
        $this->image_variant_256 = $image_variant_256;
    }

    /**
     * @return string|null
     */
    public function getImageVariant128(): ?string
    {
        return $this->image_variant_128;
    }

    /**
     * @param string|null $image_variant_128
     */
    public function setImageVariant128(?string $image_variant_128): void
    {
        $this->image_variant_128 = $image_variant_128;
    }

    /**
     * @return bool|null
     */
    public function isCanImageVariant1024BeZoomed(): ?bool
    {
        return $this->can_image_variant_1024_be_zoomed;
    }

    /**
     * @param bool|null $can_image_variant_1024_be_zoomed
     */
    public function setCanImageVariant1024BeZoomed(?bool $can_image_variant_1024_be_zoomed): void
    {
        $this->can_image_variant_1024_be_zoomed = $can_image_variant_1024_be_zoomed;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getStockQuantIds(): ?array
    {
        return $this->stock_quant_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.product';
    }
}
