<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * @var mixed|null
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
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
     * Margin Date From
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $date_from;

    /**
     * Margin Date To
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $date_to;

    /**
     * Invoice State
     * ---
     * Selection :
     *     -> paid (Paid)
     *     -> open_paid (Open and Paid)
     *     -> draft_open_paid (Draft, Open and Paid)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_state;

    /**
     * Avg. Sale Unit Price
     * ---
     * Avg. Price in Customer Invoices.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $sale_avg_price;

    /**
     * Avg. Purchase Unit Price
     * ---
     * Avg. Price in Vendor Bills 
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $purchase_avg_price;

    /**
     * # Invoiced in Sale
     * ---
     * Sum of Quantity in Customer Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $sale_num_invoiced;

    /**
     * # Invoiced in Purchase
     * ---
     * Sum of Quantity in Vendor Bills
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $purchase_num_invoiced;

    /**
     * Sales Gap
     * ---
     * Expected Sale - Turn Over
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $sales_gap;

    /**
     * Purchase Gap
     * ---
     * Normal Cost - Total Cost
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $purchase_gap;

    /**
     * Turnover
     * ---
     * Sum of Multiplication of Invoice price and quantity of Customer Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $turnover;

    /**
     * Total Cost
     * ---
     * Sum of Multiplication of Invoice price and quantity of Vendor Bills 
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_cost;

    /**
     * Expected Sale
     * ---
     * Sum of Multiplication of Sale Catalog price and quantity of Customer Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $sale_expected;

    /**
     * Normal Cost
     * ---
     * Sum of Multiplication of Cost price and quantity of Vendor Bills
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $normal_cost;

    /**
     * Total Margin
     * ---
     * Turnover - Standard price
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_margin;

    /**
     * Expected Margin
     * ---
     * Expected Sale - Normal Cost
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $expected_margin;

    /**
     * Total Margin Rate(%)
     * ---
     * Total margin * 100 / Turnover
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_margin_rate;

    /**
     * Expected Margin (%)
     * ---
     * Expected margin * 100 / Expected Sale
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $expected_margin_rate;

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
     * Purchase Order Line
     * ---
     * Technical: used to compute quantities.
     * ---
     * Relation : one2many (purchase.order.line -> product_id)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $purchase_order_line_ids;

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
     *        Selection :
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
     *        Selection :
     *            -> serial (By Unique Serial Number)
     *            -> lot (By Lots)
     *            -> none (No Tracking)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $purchase_line_warn Purchase Order Line Warning
     *        ---
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     *        ---
     *        Selection :
     *            -> no-message (No Message)
     *            -> warning (Warning)
     *            -> block (Blocking Message)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $sale_line_warn Sales Order Line
     *        ---
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     *        ---
     *        Selection :
     *            -> no-message (No Message)
     *            -> warning (Warning)
     *            -> block (Blocking Message)
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
        string $tracking,
        string $purchase_line_warn,
        string $sale_line_warn
    ) {
        $this->product_tmpl_id = $product_tmpl_id;
        parent::__construct( 
            $name, 
            $categ_id, 
            $uom_id, 
            $uom_po_id, 
            $product_variant_ids, 
            $type, 
            $tracking, 
            $purchase_line_warn, 
            $sale_line_warn
        );
    }

    /**
     * @param float|null $purchase_num_invoiced
     */
    public function setPurchaseNumInvoiced(?float $purchase_num_invoiced): void
    {
        $this->purchase_num_invoiced = $purchase_num_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("sale_expected")
     */
    public function getSaleExpected(): ?float
    {
        return $this->sale_expected;
    }

    /**
     * @param float|null $total_cost
     */
    public function setTotalCost(?float $total_cost): void
    {
        $this->total_cost = $total_cost;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total_cost")
     */
    public function getTotalCost(): ?float
    {
        return $this->total_cost;
    }

    /**
     * @param float|null $turnover
     */
    public function setTurnover(?float $turnover): void
    {
        $this->turnover = $turnover;
    }

    /**
     * @return float|null
     *
     * @SerializedName("turnover")
     */
    public function getTurnover(): ?float
    {
        return $this->turnover;
    }

    /**
     * @param float|null $purchase_gap
     */
    public function setPurchaseGap(?float $purchase_gap): void
    {
        $this->purchase_gap = $purchase_gap;
    }

    /**
     * @return float|null
     *
     * @SerializedName("purchase_gap")
     */
    public function getPurchaseGap(): ?float
    {
        return $this->purchase_gap;
    }

    /**
     * @param float|null $sales_gap
     */
    public function setSalesGap(?float $sales_gap): void
    {
        $this->sales_gap = $sales_gap;
    }

    /**
     * @return float|null
     *
     * @SerializedName("sales_gap")
     */
    public function getSalesGap(): ?float
    {
        return $this->sales_gap;
    }

    /**
     * @return float|null
     *
     * @SerializedName("purchase_num_invoiced")
     */
    public function getPurchaseNumInvoiced(): ?float
    {
        return $this->purchase_num_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("normal_cost")
     */
    public function getNormalCost(): ?float
    {
        return $this->normal_cost;
    }

    /**
     * @param float|null $sale_num_invoiced
     */
    public function setSaleNumInvoiced(?float $sale_num_invoiced): void
    {
        $this->sale_num_invoiced = $sale_num_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("sale_num_invoiced")
     */
    public function getSaleNumInvoiced(): ?float
    {
        return $this->sale_num_invoiced;
    }

    /**
     * @param float|null $purchase_avg_price
     */
    public function setPurchaseAvgPrice(?float $purchase_avg_price): void
    {
        $this->purchase_avg_price = $purchase_avg_price;
    }

    /**
     * @return float|null
     *
     * @SerializedName("purchase_avg_price")
     */
    public function getPurchaseAvgPrice(): ?float
    {
        return $this->purchase_avg_price;
    }

    /**
     * @param float|null $sale_avg_price
     */
    public function setSaleAvgPrice(?float $sale_avg_price): void
    {
        $this->sale_avg_price = $sale_avg_price;
    }

    /**
     * @return float|null
     *
     * @SerializedName("sale_avg_price")
     */
    public function getSaleAvgPrice(): ?float
    {
        return $this->sale_avg_price;
    }

    /**
     * @param string|null $invoice_state
     */
    public function setInvoiceState(?string $invoice_state): void
    {
        $this->invoice_state = $invoice_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_state")
     */
    public function getInvoiceState(): ?string
    {
        return $this->invoice_state;
    }

    /**
     * @param DateTimeInterface|null $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_to")
     */
    public function getDateTo(): ?DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param float|null $sale_expected
     */
    public function setSaleExpected(?float $sale_expected): void
    {
        $this->sale_expected = $sale_expected;
    }

    /**
     * @param float|null $normal_cost
     */
    public function setNormalCost(?float $normal_cost): void
    {
        $this->normal_cost = $normal_cost;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_from")
     */
    public function getDateFrom(): ?DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_valuation_layer_ids")
     */
    public function getStockValuationLayerIds(): ?array
    {
        return $this->stock_valuation_layer_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePurchaseOrderLineIds(OdooRelation $item): void
    {
        if (null === $this->purchase_order_line_ids) {
            $this->purchase_order_line_ids = [];
        }

        if ($this->hasPurchaseOrderLineIds($item)) {
            $index = array_search($item, $this->purchase_order_line_ids);
            unset($this->purchase_order_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPurchaseOrderLineIds(OdooRelation $item): void
    {
        if ($this->hasPurchaseOrderLineIds($item)) {
            return;
        }

        if (null === $this->purchase_order_line_ids) {
            $this->purchase_order_line_ids = [];
        }

        $this->purchase_order_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPurchaseOrderLineIds(OdooRelation $item): bool
    {
        if (null === $this->purchase_order_line_ids) {
            return false;
        }

        return in_array($item, $this->purchase_order_line_ids);
    }

    /**
     * @param OdooRelation[]|null $purchase_order_line_ids
     */
    public function setPurchaseOrderLineIds(?array $purchase_order_line_ids): void
    {
        $this->purchase_order_line_ids = $purchase_order_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("purchase_order_line_ids")
     */
    public function getPurchaseOrderLineIds(): ?array
    {
        return $this->purchase_order_line_ids;
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
     * @param OdooRelation[]|null $stock_valuation_layer_ids
     */
    public function setStockValuationLayerIds(?array $stock_valuation_layer_ids): void
    {
        $this->stock_valuation_layer_ids = $stock_valuation_layer_ids;
    }

    /**
     * @param float|null $quantity_svl
     */
    public function setQuantitySvl(?float $quantity_svl): void
    {
        $this->quantity_svl = $quantity_svl;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total_margin")
     */
    public function getTotalMargin(): ?float
    {
        return $this->total_margin;
    }

    /**
     * @return float|null
     *
     * @SerializedName("quantity_svl")
     */
    public function getQuantitySvl(): ?float
    {
        return $this->quantity_svl;
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
     *
     * @SerializedName("value_svl")
     */
    public function getValueSvl(): ?float
    {
        return $this->value_svl;
    }

    /**
     * @param float|null $expected_margin_rate
     */
    public function setExpectedMarginRate(?float $expected_margin_rate): void
    {
        $this->expected_margin_rate = $expected_margin_rate;
    }

    /**
     * @return float|null
     *
     * @SerializedName("expected_margin_rate")
     */
    public function getExpectedMarginRate(): ?float
    {
        return $this->expected_margin_rate;
    }

    /**
     * @param float|null $total_margin_rate
     */
    public function setTotalMarginRate(?float $total_margin_rate): void
    {
        $this->total_margin_rate = $total_margin_rate;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total_margin_rate")
     */
    public function getTotalMarginRate(): ?float
    {
        return $this->total_margin_rate;
    }

    /**
     * @param float|null $expected_margin
     */
    public function setExpectedMargin(?float $expected_margin): void
    {
        $this->expected_margin = $expected_margin;
    }

    /**
     * @return float|null
     *
     * @SerializedName("expected_margin")
     */
    public function getExpectedMargin(): ?float
    {
        return $this->expected_margin;
    }

    /**
     * @param float|null $total_margin
     */
    public function setTotalMargin(?float $total_margin): void
    {
        $this->total_margin = $total_margin;
    }

    /**
     * @param DateTimeInterface|null $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
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
     *
     * @SerializedName("price_extra")
     */
    public function getPriceExtra(): ?float
    {
        return $this->price_extra;
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
     * @return mixed|null
     *
     * @SerializedName("image_variant_256")
     */
    public function getImageVariant256()
    {
        return $this->image_variant_256;
    }

    /**
     * @param mixed|null $image_variant_512
     */
    public function setImageVariant512($image_variant_512): void
    {
        $this->image_variant_512 = $image_variant_512;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_variant_512")
     */
    public function getImageVariant512()
    {
        return $this->image_variant_512;
    }

    /**
     * @param mixed|null $image_variant_1024
     */
    public function setImageVariant1024($image_variant_1024): void
    {
        $this->image_variant_1024 = $image_variant_1024;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_variant_1024")
     */
    public function getImageVariant1024()
    {
        return $this->image_variant_1024;
    }

    /**
     * @param mixed|null $image_variant_1920
     */
    public function setImageVariant1920($image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_variant_1920")
     */
    public function getImageVariant1920()
    {
        return $this->image_variant_1920;
    }

    /**
     * @param string|null $combination_indices
     */
    public function setCombinationIndices(?string $combination_indices): void
    {
        $this->combination_indices = $combination_indices;
    }

    /**
     * @return string|null
     *
     * @SerializedName("combination_indices")
     */
    public function getCombinationIndices(): ?string
    {
        return $this->combination_indices;
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
     * @return mixed|null
     *
     * @SerializedName("image_variant_128")
     */
    public function getImageVariant128()
    {
        return $this->image_variant_128;
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
     * @param OdooRelation[]|null $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(?array $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_template_attribute_value_ids")
     */
    public function getProductTemplateAttributeValueIds(): ?array
    {
        return $this->product_template_attribute_value_ids;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param string|null $partner_ref
     */
    public function setPartnerRef(?string $partner_ref): void
    {
        $this->partner_ref = $partner_ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_ref")
     */
    public function getPartnerRef(): ?string
    {
        return $this->partner_ref;
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
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param float|null $price_extra
     */
    public function setPriceExtra(?float $price_extra): void
    {
        $this->price_extra = $price_extra;
    }

    /**
     * @param mixed|null $image_variant_256
     */
    public function setImageVariant256($image_variant_256): void
    {
        $this->image_variant_256 = $image_variant_256;
    }

    /**
     * @param mixed|null $image_variant_128
     */
    public function setImageVariant128($image_variant_128): void
    {
        $this->image_variant_128 = $image_variant_128;
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
     * @return float|null
     *
     * @SerializedName("free_qty")
     */
    public function getFreeQty(): ?float
    {
        return $this->free_qty;
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
     * @param OdooRelation[]|null $putaway_rule_ids
     */
    public function setPutawayRuleIds(?array $putaway_rule_ids): void
    {
        $this->putaway_rule_ids = $putaway_rule_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("putaway_rule_ids")
     */
    public function getPutawayRuleIds(): ?array
    {
        return $this->putaway_rule_ids;
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
     * @param OdooRelation[]|null $orderpoint_ids
     */
    public function setOrderpointIds(?array $orderpoint_ids): void
    {
        $this->orderpoint_ids = $orderpoint_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("orderpoint_ids")
     */
    public function getOrderpointIds(): ?array
    {
        return $this->orderpoint_ids;
    }

    /**
     * @param float|null $free_qty
     */
    public function setFreeQty(?float $free_qty): void
    {
        $this->free_qty = $free_qty;
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
     * @return bool|null
     *
     * @SerializedName("can_image_variant_1024_be_zoomed")
     */
    public function isCanImageVariant1024BeZoomed(): ?bool
    {
        return $this->can_image_variant_1024_be_zoomed;
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
     * @param OdooRelation[]|null $stock_move_ids
     */
    public function setStockMoveIds(?array $stock_move_ids): void
    {
        $this->stock_move_ids = $stock_move_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_move_ids")
     */
    public function getStockMoveIds(): ?array
    {
        return $this->stock_move_ids;
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
    public function hasStockQuantIds(OdooRelation $item): bool
    {
        if (null === $this->stock_quant_ids) {
            return false;
        }

        return in_array($item, $this->stock_quant_ids);
    }

    /**
     * @param OdooRelation[]|null $stock_quant_ids
     */
    public function setStockQuantIds(?array $stock_quant_ids): void
    {
        $this->stock_quant_ids = $stock_quant_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_quant_ids")
     */
    public function getStockQuantIds(): ?array
    {
        return $this->stock_quant_ids;
    }

    /**
     * @param bool|null $can_image_variant_1024_be_zoomed
     */
    public function setCanImageVariant1024BeZoomed(?bool $can_image_variant_1024_be_zoomed): void
    {
        $this->can_image_variant_1024_be_zoomed = $can_image_variant_1024_be_zoomed;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.product';
    }
}
