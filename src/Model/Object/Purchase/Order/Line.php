<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Purchase\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : purchase.order.line
 * ---
 * Name : purchase.order.line
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
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $product_qty;

    /**
     * Total Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_uom_qty;

    /**
     * Delivery Date
     * ---
     * Delivery date expected from vendor. This date respectively defaults to vendor pricelist lead time then today's
     * date.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_planned;

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
    private $taxes_id;

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
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_tax;

    /**
     * Order Reference
     * ---
     * Relation : many2one (purchase.order)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $order_id;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_analytic_id;

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
     * Status
     * ---
     * Selection :
     *     -> draft (RFQ)
     *     -> sent (RFQ Sent)
     *     -> to approve (To Approve)
     *     -> purchase (Purchase Order)
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
     * Bill Lines
     * ---
     * Relation : one2many (account.move.line -> purchase_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_lines;

    /**
     * Billed Qty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_invoiced;

    /**
     * Received Qty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_received;

    /**
     * Manual Received Qty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_received_manual;

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
     * Partner
     * ---
     * You can find a vendor by its Name, TIN, Email or Internal Reference.
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
     * Order Date
     * ---
     * Depicts the date within which the Quotation should be confirmed and converted into a purchase order.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $date_order;

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
     * Received Qty Method
     * ---
     * According to product configuration, the received quantity can be automatically computed by mechanism :
     *     - Manual: the quantity is set manually on the line
     *     - Stock Moves: the quantity comes from confirmed pickings
     *
     * ---
     * Selection :
     *     -> manual (Manual)
     *     -> stock_moves (Stock Moves)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $qty_received_method;

    /**
     * Reservation
     * ---
     * Relation : one2many (stock.move -> purchase_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * Orderpoint
     * ---
     * Relation : many2one (stock.warehouse.orderpoint)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse\Orderpoint
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $orderpoint_id;

    /**
     * Downstream Moves
     * ---
     * Relation : one2many (stock.move -> created_purchase_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_dest_ids;

    /**
     * Custom Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $product_description_variants;

    /**
     * Propagate cancellation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $propagate_cancel;

    /**
     * Sale Order
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_order_id;

    /**
     * Origin Sale Item
     * ---
     * Relation : many2one (sale.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_line_id;

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
     * @param string $name Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $product_qty Quantity
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price_unit Unit Price
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $order_id Order Reference
     *        ---
     *        Relation : many2one (purchase.order)
     *        @see \Flux\OdooApiClient\Model\Object\Purchase\Order
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, float $product_qty, float $price_unit, OdooRelation $order_id)
    {
        $this->name = $name;
        $this->product_qty = $product_qty;
        $this->price_unit = $price_unit;
        $this->order_id = $order_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
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
     * @param string|null $qty_received_method
     */
    public function setQtyReceivedMethod(?string $qty_received_method): void
    {
        $this->qty_received_method = $qty_received_method;
    }

    /**
     * @return string|null
     *
     * @SerializedName("qty_received_method")
     */
    public function getQtyReceivedMethod(): ?string
    {
        return $this->qty_received_method;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
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
     * @param DateTimeInterface|null $date_order
     */
    public function setDateOrder(?DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_order")
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
     * @SerializedName("qty_to_invoice")
     */
    public function getQtyToInvoice(): ?float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @param float|null $qty_received_manual
     */
    public function setQtyReceivedManual(?float $qty_received_manual): void
    {
        $this->qty_received_manual = $qty_received_manual;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_received_manual")
     */
    public function getQtyReceivedManual(): ?float
    {
        return $this->qty_received_manual;
    }

    /**
     * @param float|null $qty_received
     */
    public function setQtyReceived(?float $qty_received): void
    {
        $this->qty_received = $qty_received;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_received")
     */
    public function getQtyReceived(): ?float
    {
        return $this->qty_received;
    }

    /**
     * @param float|null $qty_invoiced
     */
    public function setQtyInvoiced(?float $qty_invoiced): void
    {
        $this->qty_invoiced = $qty_invoiced;
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
     * @return OdooRelation|null
     *
     * @SerializedName("orderpoint_id")
     */
    public function getOrderpointId(): ?OdooRelation
    {
        return $this->orderpoint_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sale_line_id")
     */
    public function getSaleLineId(): ?OdooRelation
    {
        return $this->sale_line_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param OdooRelation|null $sale_line_id
     */
    public function setSaleLineId(?OdooRelation $sale_line_id): void
    {
        $this->sale_line_id = $sale_line_id;
    }

    /**
     * @param OdooRelation|null $sale_order_id
     */
    public function setSaleOrderId(?OdooRelation $sale_order_id): void
    {
        $this->sale_order_id = $sale_order_id;
    }

    /**
     * @param OdooRelation|null $orderpoint_id
     */
    public function setOrderpointId(?OdooRelation $orderpoint_id): void
    {
        $this->orderpoint_id = $orderpoint_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_order_id")
     */
    public function getSaleOrderId(): ?OdooRelation
    {
        return $this->sale_order_id;
    }

    /**
     * @param bool|null $propagate_cancel
     */
    public function setPropagateCancel(?bool $propagate_cancel): void
    {
        $this->propagate_cancel = $propagate_cancel;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("propagate_cancel")
     */
    public function isPropagateCancel(): ?bool
    {
        return $this->propagate_cancel;
    }

    /**
     * @param string|null $product_description_variants
     */
    public function setProductDescriptionVariants(?string $product_description_variants): void
    {
        $this->product_description_variants = $product_description_variants;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_description_variants")
     */
    public function getProductDescriptionVariants(): ?string
    {
        return $this->product_description_variants;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveDestIds(OdooRelation $item): void
    {
        if (null === $this->move_dest_ids) {
            $this->move_dest_ids = [];
        }

        if ($this->hasMoveDestIds($item)) {
            $index = array_search($item, $this->move_dest_ids);
            unset($this->move_dest_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveDestIds(OdooRelation $item): void
    {
        if ($this->hasMoveDestIds($item)) {
            return;
        }

        if (null === $this->move_dest_ids) {
            $this->move_dest_ids = [];
        }

        $this->move_dest_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveDestIds(OdooRelation $item): bool
    {
        if (null === $this->move_dest_ids) {
            return false;
        }

        return in_array($item, $this->move_dest_ids);
    }

    /**
     * @param OdooRelation[]|null $move_dest_ids
     */
    public function setMoveDestIds(?array $move_dest_ids): void
    {
        $this->move_dest_ids = $move_dest_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_dest_ids")
     */
    public function getMoveDestIds(): ?array
    {
        return $this->move_dest_ids;
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation[]|null $taxes_id
     */
    public function setTaxesId(?array $taxes_id): void
    {
        $this->taxes_id = $taxes_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
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
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
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
     * @param OdooRelation|null $product_uom
     */
    public function setProductUom(?OdooRelation $product_uom): void
    {
        $this->product_uom = $product_uom;
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
     * @param OdooRelation $item
     */
    public function removeTaxesId(OdooRelation $item): void
    {
        if (null === $this->taxes_id) {
            $this->taxes_id = [];
        }

        if ($this->hasTaxesId($item)) {
            $index = array_search($item, $this->taxes_id);
            unset($this->taxes_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxesId(OdooRelation $item): void
    {
        if ($this->hasTaxesId($item)) {
            return;
        }

        if (null === $this->taxes_id) {
            $this->taxes_id = [];
        }

        $this->taxes_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxesId(OdooRelation $item): bool
    {
        if (null === $this->taxes_id) {
            return false;
        }

        return in_array($item, $this->taxes_id);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("taxes_id")
     */
    public function getTaxesId(): ?array
    {
        return $this->taxes_id;
    }

    /**
     * @param string|null $product_type
     */
    public function setProductType(?string $product_type): void
    {
        $this->product_type = $product_type;
    }

    /**
     * @param DateTimeInterface|null $date_planned
     */
    public function setDatePlanned(?DateTimeInterface $date_planned): void
    {
        $this->date_planned = $date_planned;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_planned")
     */
    public function getDatePlanned(): ?DateTimeInterface
    {
        return $this->date_planned;
    }

    /**
     * @param float|null $product_uom_qty
     */
    public function setProductUomQty(?float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return float|null
     *
     * @SerializedName("product_uom_qty")
     */
    public function getProductUomQty(): ?float
    {
        return $this->product_uom_qty;
    }

    /**
     * @param float $product_qty
     */
    public function setProductQty(float $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @return float
     *
     * @SerializedName("product_qty")
     */
    public function getProductQty(): float
    {
        return $this->product_qty;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return float
     *
     * @SerializedName("price_unit")
     */
    public function getPriceUnit(): float
    {
        return $this->price_unit;
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
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param OdooRelation[]|null $invoice_lines
     */
    public function setInvoiceLines(?array $invoice_lines): void
    {
        $this->invoice_lines = $invoice_lines;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_tag_ids")
     */
    public function getAnalyticTagIds(): ?array
    {
        return $this->analytic_tag_ids;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param OdooRelation|null $account_analytic_id
     */
    public function setAccountAnalyticId(?OdooRelation $account_analytic_id): void
    {
        $this->account_analytic_id = $account_analytic_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_analytic_id")
     */
    public function getAccountAnalyticId(): ?OdooRelation
    {
        return $this->account_analytic_id;
    }

    /**
     * @param OdooRelation $order_id
     */
    public function setOrderId(OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
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
     * @param float|null $price_tax
     */
    public function setPriceTax(?float $price_tax): void
    {
        $this->price_tax = $price_tax;
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
     * @param float|null $price_total
     */
    public function setPriceTotal(?float $price_total): void
    {
        $this->price_total = $price_total;
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
     * @param float|null $price_subtotal
     */
    public function setPriceSubtotal(?float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'purchase.order.line';
    }
}
