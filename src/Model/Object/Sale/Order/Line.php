<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.order.line
 * ---
 * Name : sale.order.line
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
final class Line extends Base
{
    /**
     * Order Reference
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $order_id;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

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
     * Invoice Lines
     * ---
     * Relation : many2many (account.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_lines;

    /**
     * Invoice Status
     * ---
     * Selection :
     *     -> upselling (Upselling Opportunity)
     *     -> invoiced (Fully Invoiced)
     *     -> to invoice (To Invoice)
     *     -> no (Nothing to Invoice)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_status;

    /**
     * Unit Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price_unit;

    /**
     * Subtotal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_subtotal;

    /**
     * Total Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_tax;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Price Reduce
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_reduce;

    /**
     * Taxes
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_id;

    /**
     * Price Reduce Tax inc
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_reduce_taxinc;

    /**
     * Price Reduce Tax excl
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_reduce_taxexcl;

    /**
     * Discount (%)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

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
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_template_id;

    /**
     * Can Edit Product
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $product_updatable;

    /**
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_uom;

    /**
     * Category
     * ---
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     * ---
     * Relation : many2one (uom.category)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_uom_category_id;

    /**
     * Custom Values
     * ---
     * Relation : one2many (product.attribute.custom.value -> sale_order_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Attribute\Custom\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_custom_attribute_value_ids;

    /**
     * Extra Values
     * ---
     * Relation : many2many (product.template.attribute.value)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_no_variant_attribute_value_ids;

    /**
     * Delivered Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_delivered;

    /**
     * Delivered Manually
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_delivered_manual;

    /**
     * To Invoice Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_to_invoice;

    /**
     * Invoiced Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_invoiced;

    /**
     * Untaxed Invoiced Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $untaxed_amount_invoiced;

    /**
     * Untaxed Amount To Invoice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $untaxed_amount_to_invoice;

    /**
     * Salesperson
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $salesman_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * Customer
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_partner_id;

    /**
     * Analytic Tags
     * ---
     * Relation : many2many (account.analytic.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_tag_ids;

    /**
     * Analytic lines
     * ---
     * Relation : one2many (account.analytic.line -> so_line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_line_ids;

    /**
     * Is expense
     * ---
     * Is true if the sales order line comes from an expense or a vendor bills
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_expense;

    /**
     * Is a down payment
     * ---
     * Down payments are made when creating invoices from a sales order. They are not copied when duplicating a sales
     * order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_downpayment;

    /**
     * Order Status
     * ---
     * Selection :
     *     -> draft (Quotation)
     *     -> sent (Quotation Sent)
     *     -> sale (Sales Order)
     *     -> done (Locked)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Lead Time
     * ---
     * Number of days between the order confirmation and the shipping of the products to the customer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $customer_lead;

    /**
     * Display Type
     * ---
     * Technical field for UX purpose.
     * ---
     * Selection :
     *     -> line_section (Section)
     *     -> line_note (Note)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Optional Products Lines
     * ---
     * Relation : one2many (sale.order.option -> line_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Option
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_option_ids;

    /**
     * Generated Purchase Lines
     * ---
     * Purchase line generated by this Sales item on order confirmation, or when the quantity was increased.
     * ---
     * Relation : one2many (purchase.order.line -> sale_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $purchase_line_ids;

    /**
     * Number of generated purchase items
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $purchase_line_count;

    /**
     * Method to update delivered qty
     * ---
     * According to product configuration, the delivered quantity can be automatically computed by mechanism :
     *     - Manual: the quantity is set manually on the line
     *     - Analytic From expenses: the quantity is the quantity sum from posted expenses
     *     - Timesheet: the quantity is the sum of hours recorded on tasks linked to this sale line
     *     - Stock Moves: the quantity comes from confirmed pickings
     *
     * ---
     * Selection :
     *     -> manual (Manual)
     *     -> analytic (Analytic From Expenses)
     *     -> stock_move (Stock Moves)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $qty_delivered_method;

    /**
     * Package
     * ---
     * Relation : many2one (product.packaging)
     * @see \Flux\OdooApiClient\Model\Object\Product\Packaging
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_packaging;

    /**
     * Route
     * ---
     * Relation : many2one (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $route_id;

    /**
     * Stock Moves
     * ---
     * Relation : one2many (stock.move -> sale_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * Product Type
     * ---
     * A storable product is a product for which you manage stock. The Inventory app has to be installed.
     * A consumable product is a product for which stock is not managed.
     * A service is a non-material product you provide.
     * ---
     * Selection :
     *     -> consu (Consumable)
     *     -> service (Service)
     *     -> product (Storable Product)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $product_type;

    /**
     * Virtual Available At Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $virtual_available_at_date;

    /**
     * Scheduled Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $scheduled_date;

    /**
     * Free Qty Today
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $free_qty_today;

    /**
     * Qty Available Today
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $qty_available_today;

    /**
     * Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $warehouse_id;

    /**
     * Qty To Deliver
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $qty_to_deliver;

    /**
     * Is Mto
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_mto;

    /**
     * Display Qty Widget
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_qty_widget;

    /**
     * Is a program reward line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_reward_line;

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
     * @param OdooRelation $order_id Order Reference
     *        ---
     *        Relation : many2one (sale.order)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Order
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price_unit Unit Price
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $product_uom_qty Quantity
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $customer_lead Lead Time
     *        ---
     *        Number of days between the order confirmation and the shipping of the products to the customer
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $order_id,
        string $name,
        float $price_unit,
        float $product_uom_qty,
        float $customer_lead
    ) {
        $this->order_id = $order_id;
        $this->name = $name;
        $this->price_unit = $price_unit;
        $this->product_uom_qty = $product_uom_qty;
        $this->customer_lead = $customer_lead;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("purchase_line_ids")
     */
    public function getPurchaseLineIds(): ?array
    {
        return $this->purchase_line_ids;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sale_order_option_ids")
     */
    public function getSaleOrderOptionIds(): ?array
    {
        return $this->sale_order_option_ids;
    }

    /**
     * @param OdooRelation[]|null $sale_order_option_ids
     */
    public function setSaleOrderOptionIds(?array $sale_order_option_ids): void
    {
        $this->sale_order_option_ids = $sale_order_option_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSaleOrderOptionIds(OdooRelation $item): bool
    {
        if (null === $this->sale_order_option_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_option_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSaleOrderOptionIds(OdooRelation $item): void
    {
        if ($this->hasSaleOrderOptionIds($item)) {
            return;
        }

        if (null === $this->sale_order_option_ids) {
            $this->sale_order_option_ids = [];
        }

        $this->sale_order_option_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSaleOrderOptionIds(OdooRelation $item): void
    {
        if (null === $this->sale_order_option_ids) {
            $this->sale_order_option_ids = [];
        }

        if ($this->hasSaleOrderOptionIds($item)) {
            $index = array_search($item, $this->sale_order_option_ids);
            unset($this->sale_order_option_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $purchase_line_ids
     */
    public function setPurchaseLineIds(?array $purchase_line_ids): void
    {
        $this->purchase_line_ids = $purchase_line_ids;
    }

    /**
     * @param float $customer_lead
     */
    public function setCustomerLead(float $customer_lead): void
    {
        $this->customer_lead = $customer_lead;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPurchaseLineIds(OdooRelation $item): bool
    {
        if (null === $this->purchase_line_ids) {
            return false;
        }

        return in_array($item, $this->purchase_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPurchaseLineIds(OdooRelation $item): void
    {
        if ($this->hasPurchaseLineIds($item)) {
            return;
        }

        if (null === $this->purchase_line_ids) {
            $this->purchase_line_ids = [];
        }

        $this->purchase_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePurchaseLineIds(OdooRelation $item): void
    {
        if (null === $this->purchase_line_ids) {
            $this->purchase_line_ids = [];
        }

        if ($this->hasPurchaseLineIds($item)) {
            $index = array_search($item, $this->purchase_line_ids);
            unset($this->purchase_line_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("purchase_line_count")
     */
    public function getPurchaseLineCount(): ?int
    {
        return $this->purchase_line_count;
    }

    /**
     * @param int|null $purchase_line_count
     */
    public function setPurchaseLineCount(?int $purchase_line_count): void
    {
        $this->purchase_line_count = $purchase_line_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("qty_delivered_method")
     */
    public function getQtyDeliveredMethod(): ?string
    {
        return $this->qty_delivered_method;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_type")
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @return float
     *
     * @SerializedName("customer_lead")
     */
    public function getCustomerLead(): float
    {
        return $this->customer_lead;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_packaging")
     */
    public function getProductPackaging(): ?OdooRelation
    {
        return $this->product_packaging;
    }

    /**
     * @param OdooRelation[]|null $analytic_line_ids
     */
    public function setAnalyticLineIds(?array $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_tag_ids")
     */
    public function getAnalyticTagIds(): ?array
    {
        return $this->analytic_tag_ids;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticTagIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticTagIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticTagIds($item)) {
            return;
        }

        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        $this->analytic_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticTagIds(OdooRelation $item): void
    {
        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        if ($this->hasAnalyticTagIds($item)) {
            $index = array_search($item, $this->analytic_tag_ids);
            unset($this->analytic_tag_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_line_ids")
     */
    public function getAnalyticLineIds(): ?array
    {
        return $this->analytic_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticLineIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_line_ids) {
            return false;
        }

        return in_array($item, $this->analytic_line_ids);
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticLineIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticLineIds($item)) {
            return;
        }

        if (null === $this->analytic_line_ids) {
            $this->analytic_line_ids = [];
        }

        $this->analytic_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticLineIds(OdooRelation $item): void
    {
        if (null === $this->analytic_line_ids) {
            $this->analytic_line_ids = [];
        }

        if ($this->hasAnalyticLineIds($item)) {
            $index = array_search($item, $this->analytic_line_ids);
            unset($this->analytic_line_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_expense")
     */
    public function isIsExpense(): ?bool
    {
        return $this->is_expense;
    }

    /**
     * @param bool|null $is_expense
     */
    public function setIsExpense(?bool $is_expense): void
    {
        $this->is_expense = $is_expense;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_downpayment")
     */
    public function isIsDownpayment(): ?bool
    {
        return $this->is_downpayment;
    }

    /**
     * @param bool|null $is_downpayment
     */
    public function setIsDownpayment(?bool $is_downpayment): void
    {
        $this->is_downpayment = $is_downpayment;
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
     * @param string|null $qty_delivered_method
     */
    public function setQtyDeliveredMethod(?string $qty_delivered_method): void
    {
        $this->qty_delivered_method = $qty_delivered_method;
    }

    /**
     * @param OdooRelation|null $product_packaging
     */
    public function setProductPackaging(?OdooRelation $product_packaging): void
    {
        $this->product_packaging = $product_packaging;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("order_partner_id")
     */
    public function getOrderPartnerId(): ?OdooRelation
    {
        return $this->order_partner_id;
    }

    /**
     * @param bool|null $is_reward_line
     */
    public function setIsRewardLine(?bool $is_reward_line): void
    {
        $this->is_reward_line = $is_reward_line;
    }

    /**
     * @param float|null $qty_to_deliver
     */
    public function setQtyToDeliver(?float $qty_to_deliver): void
    {
        $this->qty_to_deliver = $qty_to_deliver;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_mto")
     */
    public function isIsMto(): ?bool
    {
        return $this->is_mto;
    }

    /**
     * @param bool|null $is_mto
     */
    public function setIsMto(?bool $is_mto): void
    {
        $this->is_mto = $is_mto;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_qty_widget")
     */
    public function isDisplayQtyWidget(): ?bool
    {
        return $this->display_qty_widget;
    }

    /**
     * @param bool|null $display_qty_widget
     */
    public function setDisplayQtyWidget(?bool $display_qty_widget): void
    {
        $this->display_qty_widget = $display_qty_widget;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_reward_line")
     */
    public function isIsRewardLine(): ?bool
    {
        return $this->is_reward_line;
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
     * @param OdooRelation|null $warehouse_id
     */
    public function setWarehouseId(?OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
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
     * @return float|null
     *
     * @SerializedName("qty_to_deliver")
     */
    public function getQtyToDeliver(): ?float
    {
        return $this->qty_to_deliver;
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
     * @return OdooRelation|null
     *
     * @SerializedName("route_id")
     */
    public function getRouteId(): ?OdooRelation
    {
        return $this->route_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_type")
     */
    public function getProductType(): ?string
    {
        return $this->product_type;
    }

    /**
     * @param OdooRelation|null $route_id
     */
    public function setRouteId(?OdooRelation $route_id): void
    {
        $this->route_id = $route_id;
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
     * @param string|null $product_type
     */
    public function setProductType(?string $product_type): void
    {
        $this->product_type = $product_type;
    }

    /**
     * @param float|null $qty_available_today
     */
    public function setQtyAvailableToday(?float $qty_available_today): void
    {
        $this->qty_available_today = $qty_available_today;
    }

    /**
     * @return float|null
     *
     * @SerializedName("virtual_available_at_date")
     */
    public function getVirtualAvailableAtDate(): ?float
    {
        return $this->virtual_available_at_date;
    }

    /**
     * @param float|null $virtual_available_at_date
     */
    public function setVirtualAvailableAtDate(?float $virtual_available_at_date): void
    {
        $this->virtual_available_at_date = $virtual_available_at_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("scheduled_date")
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
     *
     * @SerializedName("free_qty_today")
     */
    public function getFreeQtyToday(): ?float
    {
        return $this->free_qty_today;
    }

    /**
     * @param float|null $free_qty_today
     */
    public function setFreeQtyToday(?float $free_qty_today): void
    {
        $this->free_qty_today = $free_qty_today;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_available_today")
     */
    public function getQtyAvailableToday(): ?float
    {
        return $this->qty_available_today;
    }

    /**
     * @param OdooRelation|null $order_partner_id
     */
    public function setOrderPartnerId(?OdooRelation $order_partner_id): void
    {
        $this->order_partner_id = $order_partner_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("order_id")
     */
    public function getOrderId(): OdooRelation
    {
        return $this->order_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxId(OdooRelation $item): void
    {
        if ($this->hasTaxId($item)) {
            return;
        }

        if (null === $this->tax_id) {
            $this->tax_id = [];
        }

        $this->tax_id[] = $item;
    }

    /**
     * @param float|null $price_total
     */
    public function setPriceTotal(?float $price_total): void
    {
        $this->price_total = $price_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_reduce")
     */
    public function getPriceReduce(): ?float
    {
        return $this->price_reduce;
    }

    /**
     * @param float|null $price_reduce
     */
    public function setPriceReduce(?float $price_reduce): void
    {
        $this->price_reduce = $price_reduce;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tax_id")
     */
    public function getTaxId(): ?array
    {
        return $this->tax_id;
    }

    /**
     * @param OdooRelation[]|null $tax_id
     */
    public function setTaxId(?array $tax_id): void
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxId(OdooRelation $item): bool
    {
        if (null === $this->tax_id) {
            return false;
        }

        return in_array($item, $this->tax_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxId(OdooRelation $item): void
    {
        if (null === $this->tax_id) {
            $this->tax_id = [];
        }

        if ($this->hasTaxId($item)) {
            $index = array_search($item, $this->tax_id);
            unset($this->tax_id[$index]);
        }
    }

    /**
     * @param float|null $price_tax
     */
    public function setPriceTax(?float $price_tax): void
    {
        $this->price_tax = $price_tax;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_reduce_taxinc")
     */
    public function getPriceReduceTaxinc(): ?float
    {
        return $this->price_reduce_taxinc;
    }

    /**
     * @param float|null $price_reduce_taxinc
     */
    public function setPriceReduceTaxinc(?float $price_reduce_taxinc): void
    {
        $this->price_reduce_taxinc = $price_reduce_taxinc;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_reduce_taxexcl")
     */
    public function getPriceReduceTaxexcl(): ?float
    {
        return $this->price_reduce_taxexcl;
    }

    /**
     * @param float|null $price_reduce_taxexcl
     */
    public function setPriceReduceTaxexcl(?float $price_reduce_taxexcl): void
    {
        $this->price_reduce_taxexcl = $price_reduce_taxexcl;
    }

    /**
     * @return float|null
     *
     * @SerializedName("discount")
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_total")
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_tax")
     */
    public function getPriceTax(): ?float
    {
        return $this->price_tax;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param OdooRelation[]|null $invoice_lines
     */
    public function setInvoiceLines(?array $invoice_lines): void
    {
        $this->invoice_lines = $invoice_lines;
    }

    /**
     * @param OdooRelation $order_id
     */
    public function setOrderId(OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_lines")
     */
    public function getInvoiceLines(): ?array
    {
        return $this->invoice_lines;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceLines(OdooRelation $item): bool
    {
        if (null === $this->invoice_lines) {
            return false;
        }

        return in_array($item, $this->invoice_lines);
    }

    /**
     * @param float|null $price_subtotal
     */
    public function setPriceSubtotal(?float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceLines(OdooRelation $item): void
    {
        if ($this->hasInvoiceLines($item)) {
            return;
        }

        if (null === $this->invoice_lines) {
            $this->invoice_lines = [];
        }

        $this->invoice_lines[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceLines(OdooRelation $item): void
    {
        if (null === $this->invoice_lines) {
            $this->invoice_lines = [];
        }

        if ($this->hasInvoiceLines($item)) {
            $index = array_search($item, $this->invoice_lines);
            unset($this->invoice_lines[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_status")
     */
    public function getInvoiceStatus(): ?string
    {
        return $this->invoice_status;
    }

    /**
     * @param string|null $invoice_status
     */
    public function setInvoiceStatus(?string $invoice_status): void
    {
        $this->invoice_status = $invoice_status;
    }

    /**
     * @return float
     *
     * @SerializedName("price_unit")
     */
    public function getPriceUnit(): float
    {
        return $this->price_unit;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_subtotal")
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_template_id")
     */
    public function getProductTemplateId(): ?OdooRelation
    {
        return $this->product_template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param float|null $qty_invoiced
     */
    public function setQtyInvoiced(?float $qty_invoiced): void
    {
        $this->qty_invoiced = $qty_invoiced;
    }

    /**
     * @param float|null $qty_delivered
     */
    public function setQtyDelivered(?float $qty_delivered): void
    {
        $this->qty_delivered = $qty_delivered;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_delivered_manual")
     */
    public function getQtyDeliveredManual(): ?float
    {
        return $this->qty_delivered_manual;
    }

    /**
     * @param float|null $qty_delivered_manual
     */
    public function setQtyDeliveredManual(?float $qty_delivered_manual): void
    {
        $this->qty_delivered_manual = $qty_delivered_manual;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_to_invoice")
     */
    public function getQtyToInvoice(): ?float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @param float|null $qty_to_invoice
     */
    public function setQtyToInvoice(?float $qty_to_invoice): void
    {
        $this->qty_to_invoice = $qty_to_invoice;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_invoiced")
     */
    public function getQtyInvoiced(): ?float
    {
        return $this->qty_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("untaxed_amount_invoiced")
     */
    public function getUntaxedAmountInvoiced(): ?float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductNoVariantAttributeValueIds(OdooRelation $item): void
    {
        if (null === $this->product_no_variant_attribute_value_ids) {
            $this->product_no_variant_attribute_value_ids = [];
        }

        if ($this->hasProductNoVariantAttributeValueIds($item)) {
            $index = array_search($item, $this->product_no_variant_attribute_value_ids);
            unset($this->product_no_variant_attribute_value_ids[$index]);
        }
    }

    /**
     * @param float|null $untaxed_amount_invoiced
     */
    public function setUntaxedAmountInvoiced(?float $untaxed_amount_invoiced): void
    {
        $this->untaxed_amount_invoiced = $untaxed_amount_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("untaxed_amount_to_invoice")
     */
    public function getUntaxedAmountToInvoice(): ?float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @param float|null $untaxed_amount_to_invoice
     */
    public function setUntaxedAmountToInvoice(?float $untaxed_amount_to_invoice): void
    {
        $this->untaxed_amount_to_invoice = $untaxed_amount_to_invoice;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("salesman_id")
     */
    public function getSalesmanId(): ?OdooRelation
    {
        return $this->salesman_id;
    }

    /**
     * @param OdooRelation|null $salesman_id
     */
    public function setSalesmanId(?OdooRelation $salesman_id): void
    {
        $this->salesman_id = $salesman_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_delivered")
     */
    public function getQtyDelivered(): ?float
    {
        return $this->qty_delivered;
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductNoVariantAttributeValueIds(OdooRelation $item): void
    {
        if ($this->hasProductNoVariantAttributeValueIds($item)) {
            return;
        }

        if (null === $this->product_no_variant_attribute_value_ids) {
            $this->product_no_variant_attribute_value_ids = [];
        }

        $this->product_no_variant_attribute_value_ids[] = $item;
    }

    /**
     * @param OdooRelation|null $product_template_id
     */
    public function setProductTemplateId(?OdooRelation $product_template_id): void
    {
        $this->product_template_id = $product_template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_category_id")
     */
    public function getProductUomCategoryId(): ?OdooRelation
    {
        return $this->product_uom_category_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("product_updatable")
     */
    public function isProductUpdatable(): ?bool
    {
        return $this->product_updatable;
    }

    /**
     * @param bool|null $product_updatable
     */
    public function setProductUpdatable(?bool $product_updatable): void
    {
        $this->product_updatable = $product_updatable;
    }

    /**
     * @return float
     *
     * @SerializedName("product_uom_qty")
     */
    public function getProductUomQty(): float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom")
     */
    public function getProductUom(): ?OdooRelation
    {
        return $this->product_uom;
    }

    /**
     * @param OdooRelation|null $product_uom
     */
    public function setProductUom(?OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductNoVariantAttributeValueIds(OdooRelation $item): bool
    {
        if (null === $this->product_no_variant_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_no_variant_attribute_value_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_custom_attribute_value_ids")
     */
    public function getProductCustomAttributeValueIds(): ?array
    {
        return $this->product_custom_attribute_value_ids;
    }

    /**
     * @param OdooRelation[]|null $product_custom_attribute_value_ids
     */
    public function setProductCustomAttributeValueIds(?array $product_custom_attribute_value_ids): void
    {
        $this->product_custom_attribute_value_ids = $product_custom_attribute_value_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductCustomAttributeValueIds(OdooRelation $item): bool
    {
        if (null === $this->product_custom_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_custom_attribute_value_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductCustomAttributeValueIds(OdooRelation $item): void
    {
        if ($this->hasProductCustomAttributeValueIds($item)) {
            return;
        }

        if (null === $this->product_custom_attribute_value_ids) {
            $this->product_custom_attribute_value_ids = [];
        }

        $this->product_custom_attribute_value_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductCustomAttributeValueIds(OdooRelation $item): void
    {
        if (null === $this->product_custom_attribute_value_ids) {
            $this->product_custom_attribute_value_ids = [];
        }

        if ($this->hasProductCustomAttributeValueIds($item)) {
            $index = array_search($item, $this->product_custom_attribute_value_ids);
            unset($this->product_custom_attribute_value_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_no_variant_attribute_value_ids")
     */
    public function getProductNoVariantAttributeValueIds(): ?array
    {
        return $this->product_no_variant_attribute_value_ids;
    }

    /**
     * @param OdooRelation[]|null $product_no_variant_attribute_value_ids
     */
    public function setProductNoVariantAttributeValueIds(
        ?array $product_no_variant_attribute_value_ids
    ): void {
        $this->product_no_variant_attribute_value_ids = $product_no_variant_attribute_value_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order.line';
    }
}
