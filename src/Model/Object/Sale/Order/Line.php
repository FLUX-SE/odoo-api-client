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
 *
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
     * @var null|Order
     */
    private $order_id;

    /**
     * Description
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Invoice Lines
     *
     * @var LineAlias
     */
    private $invoice_lines;

    /**
     * Invoice Status
     *
     * @var array
     */
    private $invoice_status;

    /**
     * Unit Price
     *
     * @var null|float
     */
    private $price_unit;

    /**
     * Subtotal
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Total Tax
     *
     * @var float
     */
    private $price_tax;

    /**
     * Total
     *
     * @var float
     */
    private $price_total;

    /**
     * Price Reduce
     *
     * @var float
     */
    private $price_reduce;

    /**
     * Taxes
     *
     * @var Tax
     */
    private $tax_id;

    /**
     * Price Reduce Tax inc
     *
     * @var float
     */
    private $price_reduce_taxinc;

    /**
     * Price Reduce Tax excl
     *
     * @var float
     */
    private $price_reduce_taxexcl;

    /**
     * Discount (%)
     *
     * @var float
     */
    private $discount;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_template_id;

    /**
     * Can Edit Product
     *
     * @var bool
     */
    private $product_updatable;

    /**
     * Quantity
     *
     * @var null|float
     */
    private $product_uom_qty;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom;

    /**
     * Category
     *
     * @var Category
     */
    private $product_uom_category_id;

    /**
     * Custom Values
     *
     * @var Value
     */
    private $product_custom_attribute_value_ids;

    /**
     * Extra Values
     *
     * @var ValueAlias
     */
    private $product_no_variant_attribute_value_ids;

    /**
     * Method to update delivered qty
     *
     * @var array
     */
    private $qty_delivered_method;

    /**
     * Delivered Quantity
     *
     * @var float
     */
    private $qty_delivered;

    /**
     * Delivered Manually
     *
     * @var float
     */
    private $qty_delivered_manual;

    /**
     * To Invoice Quantity
     *
     * @var float
     */
    private $qty_to_invoice;

    /**
     * Invoiced Quantity
     *
     * @var float
     */
    private $qty_invoiced;

    /**
     * Untaxed Invoiced Amount
     *
     * @var float
     */
    private $untaxed_amount_invoiced;

    /**
     * Untaxed Amount To Invoice
     *
     * @var float
     */
    private $untaxed_amount_to_invoice;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $salesman_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Customer
     *
     * @var Partner
     */
    private $order_partner_id;

    /**
     * Analytic Tags
     *
     * @var Tag
     */
    private $analytic_tag_ids;

    /**
     * Analytic lines
     *
     * @var LineAliasAlias
     */
    private $analytic_line_ids;

    /**
     * Is expense
     *
     * @var bool
     */
    private $is_expense;

    /**
     * Is a down payment
     *
     * @var bool
     */
    private $is_downpayment;

    /**
     * Order Status
     *
     * @var array
     */
    private $state;

    /**
     * Lead Time
     *
     * @var null|float
     */
    private $customer_lead;

    /**
     * Display Type
     *
     * @var array
     */
    private $display_type;

    /**
     * Optional Products Lines
     *
     * @var Option
     */
    private $sale_order_option_ids;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|Order $order_id
     */
    public function setOrderId(Order $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @param bool $is_downpayment
     */
    public function setIsDownpayment(bool $is_downpayment): void
    {
        $this->is_downpayment = $is_downpayment;
    }

    /**
     * @return float
     */
    public function getUntaxedAmountInvoiced(): float
    {
        return $this->untaxed_amount_invoiced;
    }

    /**
     * @return float
     */
    public function getUntaxedAmountToInvoice(): float
    {
        return $this->untaxed_amount_to_invoice;
    }

    /**
     * @return Users
     */
    public function getSalesmanId(): Users
    {
        return $this->salesman_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param Partner $order_partner_id
     */
    public function setOrderPartnerId(Partner $order_partner_id): void
    {
        $this->order_partner_id = $order_partner_id;
    }

    /**
     * @param Tag $analytic_tag_ids
     */
    public function setAnalyticTagIds(Tag $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param LineAliasAlias $analytic_line_ids
     */
    public function setAnalyticLineIds(LineAliasAlias $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @param bool $is_expense
     */
    public function setIsExpense(bool $is_expense): void
    {
        $this->is_expense = $is_expense;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return float
     */
    public function getQtyToInvoice(): float
    {
        return $this->qty_to_invoice;
    }

    /**
     * @param null|float $customer_lead
     */
    public function setCustomerLead(?float $customer_lead): void
    {
        $this->customer_lead = $customer_lead;
    }

    /**
     * @param array $display_type
     */
    public function setDisplayType(array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @param array $display_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType(array $display_type, bool $strict = true): bool
    {
        return in_array($display_type, $this->display_type, $strict);
    }

    /**
     * @param array $display_type
     */
    public function addDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            return;
        }

        $this->display_type[] = $display_type;
    }

    /**
     * @param array $display_type
     */
    public function removeDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            $index = array_search($display_type, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param Option $sale_order_option_ids
     */
    public function setSaleOrderOptionIds(Option $sale_order_option_ids): void
    {
        $this->sale_order_option_ids = $sale_order_option_ids;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return float
     */
    public function getQtyInvoiced(): float
    {
        return $this->qty_invoiced;
    }

    /**
     * @param float $qty_delivered_manual
     */
    public function setQtyDeliveredManual(float $qty_delivered_manual): void
    {
        $this->qty_delivered_manual = $qty_delivered_manual;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPriceReduceTaxinc(): float
    {
        return $this->price_reduce_taxinc;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param LineAlias $invoice_lines
     */
    public function setInvoiceLines(LineAlias $invoice_lines): void
    {
        $this->invoice_lines = $invoice_lines;
    }

    /**
     * @return array
     */
    public function getInvoiceStatus(): array
    {
        return $this->invoice_status;
    }

    /**
     * @param null|float $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @return float
     */
    public function getPriceTax(): float
    {
        return $this->price_tax;
    }

    /**
     * @return float
     */
    public function getPriceTotal(): float
    {
        return $this->price_total;
    }

    /**
     * @return float
     */
    public function getPriceReduce(): float
    {
        return $this->price_reduce;
    }

    /**
     * @param Tax $tax_id
     */
    public function setTaxId(Tax $tax_id): void
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @return float
     */
    public function getPriceReduceTaxexcl(): float
    {
        return $this->price_reduce_taxexcl;
    }

    /**
     * @param float $qty_delivered
     */
    public function setQtyDelivered(float $qty_delivered): void
    {
        $this->qty_delivered = $qty_delivered;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return Template
     */
    public function getProductTemplateId(): Template
    {
        return $this->product_template_id;
    }

    /**
     * @return bool
     */
    public function isProductUpdatable(): bool
    {
        return $this->product_updatable;
    }

    /**
     * @param null|float $product_uom_qty
     */
    public function setProductUomQty(?float $product_uom_qty): void
    {
        $this->product_uom_qty = $product_uom_qty;
    }

    /**
     * @param Uom $product_uom
     */
    public function setProductUom(Uom $product_uom): void
    {
        $this->product_uom = $product_uom;
    }

    /**
     * @return Category
     */
    public function getProductUomCategoryId(): Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param Value $product_custom_attribute_value_ids
     */
    public function setProductCustomAttributeValueIds(Value $product_custom_attribute_value_ids): void
    {
        $this->product_custom_attribute_value_ids = $product_custom_attribute_value_ids;
    }

    /**
     * @param ValueAlias $product_no_variant_attribute_value_ids
     */
    public function setProductNoVariantAttributeValueIds(
        ValueAlias $product_no_variant_attribute_value_ids
    ): void
    {
        $this->product_no_variant_attribute_value_ids = $product_no_variant_attribute_value_ids;
    }

    /**
     * @return array
     */
    public function getQtyDeliveredMethod(): array
    {
        return $this->qty_delivered_method;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
