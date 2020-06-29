<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Line as LineAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Tag;
use Flux\OdooApiClient\Model\Object\Account\Move\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Attribute\Custom\Value;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value as ValueAlias;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order;
use Flux\OdooApiClient\Model\Object\Uom\Category;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : sale.order.line
 * Name : sale.order.line
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Line extends Base
{
    /**
     * Order Reference
     *
     * @var Order
     */
    private $order_id;

    /**
     * Description
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Invoice Lines
     *
     * @var null|LineAlias[]
     */
    private $invoice_lines;

    /**
     * Invoice Status
     *
     * @var null|array
     */
    private $invoice_status;

    /**
     * Unit Price
     *
     * @var float
     */
    private $price_unit;

    /**
     * Subtotal
     *
     * @var null|float
     */
    private $price_subtotal;

    /**
     * Total Tax
     *
     * @var null|float
     */
    private $price_tax;

    /**
     * Total
     *
     * @var null|float
     */
    private $price_total;

    /**
     * Price Reduce
     *
     * @var null|float
     */
    private $price_reduce;

    /**
     * Taxes
     *
     * @var null|Tax[]
     */
    private $tax_id;

    /**
     * Price Reduce Tax inc
     *
     * @var null|float
     */
    private $price_reduce_taxinc;

    /**
     * Price Reduce Tax excl
     *
     * @var null|float
     */
    private $price_reduce_taxexcl;

    /**
     * Discount (%)
     *
     * @var null|float
     */
    private $discount;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_template_id;

    /**
     * Can Edit Product
     *
     * @var null|bool
     */
    private $product_updatable;

    /**
     * Quantity
     *
     * @var float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     *
     * @var null|Category
     */
    private $product_uom_category_id;

    /**
     * Custom Values
     *
     * @var null|Value[]
     */
    private $product_custom_attribute_value_ids;

    /**
     * Extra Values
     *
     * @var null|ValueAlias[]
     */
    private $product_no_variant_attribute_value_ids;

    /**
     * Method to update delivered qty
     * According to product configuration, the delivered quantity can be automatically computed by mechanism :
     * - Manual: the quantity is set manually on the line
     * - Analytic From expenses: the quantity is the quantity sum from posted expenses
     * - Timesheet: the quantity is the sum of hours recorded on tasks linked to this sale line
     * - Stock Moves: the quantity comes from confirmed pickings
     *
     * @var null|array
     */
    private $qty_delivered_method;

    /**
     * Delivered Quantity
     *
     * @var null|float
     */
    private $qty_delivered;

    /**
     * Delivered Manually
     *
     * @var null|float
     */
    private $qty_delivered_manual;

    /**
     * To Invoice Quantity
     *
     * @var null|float
     */
    private $qty_to_invoice;

    /**
     * Invoiced Quantity
     *
     * @var null|float
     */
    private $qty_invoiced;

    /**
     * Untaxed Invoiced Amount
     *
     * @var null|float
     */
    private $untaxed_amount_invoiced;

    /**
     * Untaxed Amount To Invoice
     *
     * @var null|float
     */
    private $untaxed_amount_to_invoice;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $salesman_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Customer
     *
     * @var null|Partner
     */
    private $order_partner_id;

    /**
     * Analytic Tags
     *
     * @var null|Tag[]
     */
    private $analytic_tag_ids;

    /**
     * Analytic lines
     *
     * @var null|LineAliasAlias[]
     */
    private $analytic_line_ids;

    /**
     * Is expense
     * Is true if the sales order line comes from an expense or a vendor bills
     *
     * @var null|bool
     */
    private $is_expense;

    /**
     * Is a down payment
     * Down payments are made when creating invoices from a sales order. They are not copied when duplicating a sales
     * order.
     *
     * @var null|bool
     */
    private $is_downpayment;

    /**
     * Order Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Lead Time
     * Number of days between the order confirmation and the shipping of the products to the customer
     *
     * @var float
     */
    private $customer_lead;

    /**
     * Display Type
     * Technical field for UX purpose.
     *
     * @var null|array
     */
    private $display_type;

    /**
     * Optional Products Lines
     *
     * @var null|Option[]
     */
    private $sale_order_option_ids;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param Order $order_id Order Reference
     * @param string $name Description
     * @param float $price_unit Unit Price
     * @param float $product_uom_qty Quantity
     * @param float $customer_lead Lead Time
     *        Number of days between the order confirmation and the shipping of the products to the customer
     */
    public function __construct(
        Order $order_id,
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
     * @param LineAliasAlias $item
     */
    public function addAnalyticLineIds(LineAliasAlias $item): void
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
     * @return null|float
     */
    public function getQtyToInvoice(): ?float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @return null|float
     */
    public function getQtyInvoiced(): ?float
    {
        return $this->qty_invoiced;
    }

    /**
     * @return null|float
     */
    public function getUntaxedAmountInvoiced(): ?float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @return null|float
     */
    public function getUntaxedAmountToInvoice(): ?float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @return null|Users
     */
    public function getSalesmanId(): ?Users
    {
        return $this->salesman_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param null|Partner $order_partner_id
     */
    public function setOrderPartnerId(?Partner $order_partner_id): void
    {
        $this->order_partner_id = $order_partner_id;
    }

    /**
     * @param null|Tag[] $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids, $strict);
    }

    /**
     * @param Tag $item
     */
    public function addAnalyticTagIds(Tag $item): void
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
     * @param Tag $item
     */
    public function removeAnalyticTagIds(Tag $item): void
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
     * @param null|LineAliasAlias[] $analytic_line_ids
     */
    public function setAnalyticLineIds(?array $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @param LineAliasAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticLineIds(LineAliasAlias $item, bool $strict = true): bool
    {
        if (null === $this->analytic_line_ids) {
            return false;
        }

        return in_array($item, $this->analytic_line_ids, $strict);
    }

    /**
     * @param LineAliasAlias $item
     */
    public function removeAnalyticLineIds(LineAliasAlias $item): void
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
     * @param null|float $qty_delivered
     */
    public function setQtyDelivered(?float $qty_delivered): void
    {
        $this->qty_delivered = $qty_delivered;
    }

    /**
     * @param null|Option[] $sale_order_option_ids
     */
    public function setSaleOrderOptionIds(?array $sale_order_option_ids): void
    {
        $this->sale_order_option_ids = $sale_order_option_ids;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param Option $item
     */
    public function removeSaleOrderOptionIds(Option $item): void
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
     * @param Option $item
     */
    public function addSaleOrderOptionIds(Option $item): void
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
     * @param Option $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOrderOptionIds(Option $item, bool $strict = true): bool
    {
        if (null === $this->sale_order_option_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_option_ids, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeDisplayType($item): void
    {
        if (null === $this->display_type) {
            $this->display_type = [];
        }

        if ($this->hasDisplayType($item)) {
            $index = array_search($item, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param null|bool $is_expense
     */
    public function setIsExpense(?bool $is_expense): void
    {
        $this->is_expense = $is_expense;
    }

    /**
     * @param mixed $item
     */
    public function addDisplayType($item): void
    {
        if ($this->hasDisplayType($item)) {
            return;
        }

        if (null === $this->display_type) {
            $this->display_type = [];
        }

        $this->display_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType($item, bool $strict = true): bool
    {
        if (null === $this->display_type) {
            return false;
        }

        return in_array($item, $this->display_type, $strict);
    }

    /**
     * @param null|array $display_type
     */
    public function setDisplayType(?array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @param float $customer_lead
     */
    public function setCustomerLead(float $customer_lead): void
    {
        $this->customer_lead = $customer_lead;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|bool $is_downpayment
     */
    public function setIsDownpayment(?bool $is_downpayment): void
    {
        $this->is_downpayment = $is_downpayment;
    }

    /**
     * @param null|float $qty_delivered_manual
     */
    public function setQtyDeliveredManual(?float $qty_delivered_manual): void
    {
        $this->qty_delivered_manual = $qty_delivered_manual;
    }

    /**
     * @return null|array
     */
    public function getQtyDeliveredMethod(): ?array
    {
        return $this->qty_delivered_method;
    }

    /**
     * @param Order $order_id
     */
    public function setOrderId(Order $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxId(Tax $item, bool $strict = true): bool
    {
        if (null === $this->tax_id) {
            return false;
        }

        return in_array($item, $this->tax_id, $strict);
    }

    /**
     * @param null|Tax[] $tax_id
     */
    public function setTaxId(?array $tax_id): void
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @return null|float
     */
    public function getPriceReduce(): ?float
    {
        return $this->price_reduce;
    }

    /**
     * @return null|float
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return null|float
     */
    public function getPriceTax(): ?float
    {
        return $this->price_tax;
    }

    /**
     * @return null|float
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @return null|array
     */
    public function getInvoiceStatus(): ?array
    {
        return $this->invoice_status;
    }

    /**
     * @param Tax $item
     */
    public function removeTaxId(Tax $item): void
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
     * @param LineAlias $item
     */
    public function removeInvoiceLines(LineAlias $item): void
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
     * @param LineAlias $item
     */
    public function addInvoiceLines(LineAlias $item): void
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
     * @param LineAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceLines(LineAlias $item, bool $strict = true): bool
    {
        if (null === $this->invoice_lines) {
            return false;
        }

        return in_array($item, $this->invoice_lines, $strict);
    }

    /**
     * @param null|LineAlias[] $invoice_lines
     */
    public function setInvoiceLines(?array $invoice_lines): void
    {
        $this->invoice_lines = $invoice_lines;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Tax $item
     */
    public function addTaxId(Tax $item): void
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
     * @return null|float
     */
    public function getPriceReduceTaxinc(): ?float
    {
        return $this->price_reduce_taxinc;
    }

    /**
     * @param ValueAlias $item
     */
    public function removeProductNoVariantAttributeValueIds(ValueAlias $item): void
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
     * @param null|Value[] $product_custom_attribute_value_ids
     */
    public function setProductCustomAttributeValueIds(?array $product_custom_attribute_value_ids): void
    {
        $this->product_custom_attribute_value_ids = $product_custom_attribute_value_ids;
    }

    /**
     * @param ValueAlias $item
     */
    public function addProductNoVariantAttributeValueIds(ValueAlias $item): void
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
     * @param ValueAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductNoVariantAttributeValueIds(ValueAlias $item, bool $strict = true): bool
    {
        if (null === $this->product_no_variant_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_no_variant_attribute_value_ids, $strict);
    }

    /**
     * @param null|ValueAlias[] $product_no_variant_attribute_value_ids
     */
    public function setProductNoVariantAttributeValueIds(
        ?array $product_no_variant_attribute_value_ids
    ): void {
        $this->product_no_variant_attribute_value_ids = $product_no_variant_attribute_value_ids;
    }

    /**
     * @param Value $item
     */
    public function removeProductCustomAttributeValueIds(Value $item): void
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
     * @param Value $item
     */
    public function addProductCustomAttributeValueIds(Value $item): void
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
     * @param Value $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductCustomAttributeValueIds(Value $item, bool $strict = true): bool
    {
        if (null === $this->product_custom_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_custom_attribute_value_ids, $strict);
    }

    /**
     * @return null|Category
     */
    public function getProductUomCategoryId(): ?Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @return null|float
     */
    public function getPriceReduceTaxexcl(): ?float
    {
        return $this->price_reduce_taxexcl;
    }

    /**
     * @param null|Uom $product_uom
     */
    public function setProductUom(?Uom $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @param float $product_uom_qty
     */
    public function setProductUomQty(float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @return null|bool
     */
    public function isProductUpdatable(): ?bool
    {
        return $this->product_updatable;
    }

    /**
     * @return null|Template
     */
    public function getProductTemplateId(): ?Template
    {
        return $this->product_template_id;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|float $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
