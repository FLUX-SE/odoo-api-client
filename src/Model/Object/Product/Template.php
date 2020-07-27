<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.template
 * ---
 * Name : product.template
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
class Template extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $name;

    /**
     * Sequence
     * ---
     * Gives the sequence order when displaying a product list
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description;

    /**
     * Purchase Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description_purchase;

    /**
     * Sales Description
     * ---
     * A description of the Product that you want to communicate to your customers. This description will be copied
     * to every Sales Order, Delivery Order and Customer Invoice/Credit Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description_sale;

    /**
     * Can be Rent
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $rental;

    /**
     * Product Category
     * ---
     * Select category for the current product
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $categ_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $currency_id;

    /**
     * Cost Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $cost_currency_id;

    /**
     * Price
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $price;

    /**
     * Sales Price
     * ---
     * Price at which the product is sold to customers.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $list_price;

    /**
     * Public Price
     * ---
     * Price at which the product is sold to customers.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $lst_price;

    /**
     * Cost
     * ---
     * In Standard Price & AVCO: value of the product (automatically computed in AVCO).
     *                 In FIFO: value of the last unit that left the stock (automatically computed).
     *                 Used to value the product when the purchase cost is not known (e.g. inventory adjustment).
     *                 Used to compute margins on sale orders.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $standard_price;

    /**
     * Volume
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $volume;

    /**
     * Volume unit of measure label
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $volume_uom_name;

    /**
     * Weight
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $weight;

    /**
     * Weight unit of measure label
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $weight_uom_name;

    /**
     * Can be Sold
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $sale_ok;

    /**
     * Can be Purchased
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $purchase_ok;

    /**
     * Pricelist
     * ---
     * Technical field. Used for searching on pricelists, not stored in database.
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $pricelist_id;

    /**
     * Unit of Measure
     * ---
     * Default unit of measure used for all stock operations.
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $uom_id;

    /**
     * Unit of Measure Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $uom_name;

    /**
     * Purchase Unit of Measure
     * ---
     * Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     * measure.
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $uom_po_id;

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
    protected $company_id;

    /**
     * Product Packages
     * ---
     * Gives the different ways to package the same product.
     * ---
     * Relation : one2many (product.packaging)
     * @see \Flux\OdooApiClient\Model\Object\Product\Packaging
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $packaging_ids;

    /**
     * Vendors
     * ---
     * Define vendor pricelists.
     * ---
     * Relation : one2many (product.supplierinfo -> product_tmpl_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Supplierinfo
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $seller_ids;

    /**
     * Variant Seller
     * ---
     * Relation : one2many (product.supplierinfo -> product_tmpl_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Supplierinfo
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $variant_seller_ids;

    /**
     * Active
     * ---
     * If unchecked, it will allow you to hide the product without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $active;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $color;

    /**
     * Is a product variant
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $is_product_variant;

    /**
     * Product Attributes
     * ---
     * Relation : one2many (product.template.attribute.line -> product_tmpl_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $attribute_line_ids;

    /**
     * Valid Product Attribute Lines
     * ---
     * Technical compute
     * ---
     * Relation : many2many (product.template.attribute.line)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $valid_product_template_attribute_line_ids;

    /**
     * Products
     * ---
     * Relation : one2many (product.product -> product_tmpl_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    protected $product_variant_ids;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $product_variant_id;

    /**
     * # Product Variants
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $product_variant_count;

    /**
     * Barcode
     * ---
     * International Article Number used for product identification.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $barcode;

    /**
     * Internal Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $default_code;

    /**
     * Number of price rules
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $pricelist_item_count;

    /**
     * Can Image 1024 be zoomed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $can_image_1024_be_zoomed;

    /**
     * Is a configurable product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $has_configurable_attributes;

    /**
     * Customer Taxes
     * ---
     * Default taxes used when selling the product.
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $taxes_id;

    /**
     * Vendor Taxes
     * ---
     * Default taxes used when buying the product.
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $supplier_taxes_id;

    /**
     * Income Account
     * ---
     * Keep this field empty to use the default value from the product category.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_account_income_id;

    /**
     * Expense Account
     * ---
     * Keep this field empty to use the default value from the product category. If anglo-saxon accounting with
     * automated valuation method is configured, the expense account on the product category will be used.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_account_expense_id;

    /**
     * TaxCloud Category
     * ---
     * This refers to TIC (Taxability Information Codes), these are used by TaxCloud to compute specific tax rates
     * for each product type. The value set here prevails over the one set on the product category.
     * ---
     * Relation : many2one (product.tic.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Tic\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $tic_category_id;

    /**
     * Responsible
     * ---
     * This user will be responsible of the next activities related to logistic operations for this product.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $responsible_id;

    /**
     * Product Type
     * ---
     * A storable product is a product for which you manage stock. The Inventory app has to be installed.
     * A consumable product is a product for which stock is not managed.
     * A service is a non-material product you provide.
     * ---
     * Selection : (default value, usually null)
     *     -> consu (Consumable)
     *     -> service (Service)
     *     -> product (Storable Product)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $type;

    /**
     * Production Location
     * ---
     * This stock location will be used, instead of the default one, as the source location for stock moves generated
     * by manufacturing orders.
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_stock_production;

    /**
     * Inventory Location
     * ---
     * This stock location will be used, instead of the default one, as the source location for stock moves generated
     * when you do an inventory.
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_stock_inventory;

    /**
     * Customer Lead Time
     * ---
     * Delivery lead time, in days. It's the number of days, promised to the customer, between the confirmation of
     * the sales order and the delivery.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $sale_delay;

    /**
     * Tracking
     * ---
     * Ensure the traceability of a storable product in your warehouse.
     * ---
     * Selection : (default value, usually null)
     *     -> serial (By Unique Serial Number)
     *     -> lot (By Lots)
     *     -> none (No Tracking)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $tracking;

    /**
     * Description on Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description_picking;

    /**
     * Description on Delivery Orders
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description_pickingout;

    /**
     * Description on Receptions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $description_pickingin;

    /**
     * Quantity On Hand
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $qty_available;

    /**
     * Forecasted Quantity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $virtual_available;

    /**
     * Incoming
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $incoming_qty;

    /**
     * Outgoing
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $outgoing_qty;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $location_id;

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
    protected $warehouse_id;

    /**
     * Routes
     * ---
     * Depending on the modules installed, this will allow you to define the route of the product: whether it will be
     * bought, manufactured, replenished on order, etc.
     * ---
     * Relation : many2many (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $route_ids;

    /**
     * Reordering Rules
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $nbr_reordering_rules;

    /**
     * Reordering Min Qty
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $reordering_min_qty;

    /**
     * Reordering Max Qty
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $reordering_max_qty;

    /**
     * Category Routes
     * ---
     * Relation : many2many (stock.location.route)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location\Route
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $route_from_categ_ids;

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
     * @var string|null
     */
    protected $cost_method;

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
     * @var string|null
     */
    protected $valuation;

    /**
     * Available in POS
     * ---
     * Check if you want this product to appear in the Point of Sale.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $available_in_pos;

    /**
     * To Weigh With Scale
     * ---
     * Check if the product should be weighted using the hardware scale integration.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $to_weight;

    /**
     * Point of Sale Category
     * ---
     * Category used in the Point of Sale.
     * ---
     * Relation : many2one (pos.category)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $pos_categ_id;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_128;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $activity_ids;

    /**
     * Activity State
     * ---
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * ---
     * Selection : (default value, usually null)
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_state;

    /**
     * Responsible User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     * ---
     * Type of the exception activity on record.
     * ---
     * Selection : (default value, usually null)
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     * ---
     * Icon to indicate an exception activity.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_is_follower;

    /**
     * Followers
     * ---
     * Relation : one2many (mail.followers -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Followers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_channel_ids;

    /**
     * Messages
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_ids;

    /**
     * Unread Messages
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     * ---
     * Number of unread messages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_needaction;

    /**
     * Number of Actions
     * ---
     * Number of messages which requires an action
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_error;

    /**
     * Number of errors
     * ---
     * Number of messages with delivery error
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_sms_error;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
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
     *        Relation : one2many (product.product -> product_tmpl_id)
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
        string $name,
        OdooRelation $categ_id,
        OdooRelation $uom_id,
        OdooRelation $uom_po_id,
        array $product_variant_ids,
        string $type,
        string $tracking
    ) {
        $this->name = $name;
        $this->categ_id = $categ_id;
        $this->uom_id = $uom_id;
        $this->uom_po_id = $uom_po_id;
        $this->product_variant_ids = $product_variant_ids;
        $this->type = $type;
        $this->tracking = $tracking;
    }

    /**
     * @param string|null $image_1024
     */
    public function setImage1024(?string $image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @param string|null $cost_method
     */
    public function setCostMethod(?string $cost_method): void
    {
        $this->cost_method = $cost_method;
    }

    /**
     * @return string|null
     */
    public function getValuation(): ?string
    {
        return $this->valuation;
    }

    /**
     * @param string|null $valuation
     */
    public function setValuation(?string $valuation): void
    {
        $this->valuation = $valuation;
    }

    /**
     * @return bool|null
     */
    public function isAvailableInPos(): ?bool
    {
        return $this->available_in_pos;
    }

    /**
     * @param bool|null $available_in_pos
     */
    public function setAvailableInPos(?bool $available_in_pos): void
    {
        $this->available_in_pos = $available_in_pos;
    }

    /**
     * @return bool|null
     */
    public function isToWeight(): ?bool
    {
        return $this->to_weight;
    }

    /**
     * @param bool|null $to_weight
     */
    public function setToWeight(?bool $to_weight): void
    {
        $this->to_weight = $to_weight;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPosCategId(): ?OdooRelation
    {
        return $this->pos_categ_id;
    }

    /**
     * @param OdooRelation|null $pos_categ_id
     */
    public function setPosCategId(?OdooRelation $pos_categ_id): void
    {
        $this->pos_categ_id = $pos_categ_id;
    }

    /**
     * @return string|null
     */
    public function getImage1920(): ?string
    {
        return $this->image_1920;
    }

    /**
     * @param string|null $image_1920
     */
    public function setImage1920(?string $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return string|null
     */
    public function getImage1024(): ?string
    {
        return $this->image_1024;
    }

    /**
     * @return string|null
     */
    public function getImage512(): ?string
    {
        return $this->image_512;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRouteFromCategIds(OdooRelation $item): void
    {
        if (null === $this->route_from_categ_ids) {
            $this->route_from_categ_ids = [];
        }

        if ($this->hasRouteFromCategIds($item)) {
            $index = array_search($item, $this->route_from_categ_ids);
            unset($this->route_from_categ_ids[$index]);
        }
    }

    /**
     * @param string|null $image_512
     */
    public function setImage512(?string $image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return string|null
     */
    public function getImage256(): ?string
    {
        return $this->image_256;
    }

    /**
     * @param string|null $image_256
     */
    public function setImage256(?string $image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return string|null
     */
    public function getImage128(): ?string
    {
        return $this->image_128;
    }

    /**
     * @param string|null $image_128
     */
    public function setImage128(?string $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasActivityIds(OdooRelation $item): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addActivityIds(OdooRelation $item): void
    {
        if ($this->hasActivityIds($item)) {
            return;
        }

        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        $this->activity_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeActivityIds(OdooRelation $item): void
    {
        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        if ($this->hasActivityIds($item)) {
            $index = array_search($item, $this->activity_ids);
            unset($this->activity_ids[$index]);
        }
    }

    /**
     * @return string|null
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @return string|null
     */
    public function getCostMethod(): ?string
    {
        return $this->cost_method;
    }

    /**
     * @param OdooRelation $item
     */
    public function addRouteFromCategIds(OdooRelation $item): void
    {
        if ($this->hasRouteFromCategIds($item)) {
            return;
        }

        if (null === $this->route_from_categ_ids) {
            $this->route_from_categ_ids = [];
        }

        $this->route_from_categ_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWarehouseId(): ?OdooRelation
    {
        return $this->warehouse_id;
    }

    /**
     * @param string|null $description_pickingout
     */
    public function setDescriptionPickingout(?string $description_pickingout): void
    {
        $this->description_pickingout = $description_pickingout;
    }

    /**
     * @return string|null
     */
    public function getDescriptionPickingin(): ?string
    {
        return $this->description_pickingin;
    }

    /**
     * @param string|null $description_pickingin
     */
    public function setDescriptionPickingin(?string $description_pickingin): void
    {
        $this->description_pickingin = $description_pickingin;
    }

    /**
     * @return float|null
     */
    public function getQtyAvailable(): ?float
    {
        return $this->qty_available;
    }

    /**
     * @param float|null $qty_available
     */
    public function setQtyAvailable(?float $qty_available): void
    {
        $this->qty_available = $qty_available;
    }

    /**
     * @return float|null
     */
    public function getVirtualAvailable(): ?float
    {
        return $this->virtual_available;
    }

    /**
     * @param float|null $virtual_available
     */
    public function setVirtualAvailable(?float $virtual_available): void
    {
        $this->virtual_available = $virtual_available;
    }

    /**
     * @return float|null
     */
    public function getIncomingQty(): ?float
    {
        return $this->incoming_qty;
    }

    /**
     * @param float|null $incoming_qty
     */
    public function setIncomingQty(?float $incoming_qty): void
    {
        $this->incoming_qty = $incoming_qty;
    }

    /**
     * @return float|null
     */
    public function getOutgoingQty(): ?float
    {
        return $this->outgoing_qty;
    }

    /**
     * @param float|null $outgoing_qty
     */
    public function setOutgoingQty(?float $outgoing_qty): void
    {
        $this->outgoing_qty = $outgoing_qty;
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
     * @param OdooRelation|null $warehouse_id
     */
    public function setWarehouseId(?OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRouteFromCategIds(OdooRelation $item): bool
    {
        if (null === $this->route_from_categ_ids) {
            return false;
        }

        return in_array($item, $this->route_from_categ_ids);
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
     * @return int|null
     */
    public function getNbrReorderingRules(): ?int
    {
        return $this->nbr_reordering_rules;
    }

    /**
     * @param int|null $nbr_reordering_rules
     */
    public function setNbrReorderingRules(?int $nbr_reordering_rules): void
    {
        $this->nbr_reordering_rules = $nbr_reordering_rules;
    }

    /**
     * @return float|null
     */
    public function getReorderingMinQty(): ?float
    {
        return $this->reordering_min_qty;
    }

    /**
     * @param float|null $reordering_min_qty
     */
    public function setReorderingMinQty(?float $reordering_min_qty): void
    {
        $this->reordering_min_qty = $reordering_min_qty;
    }

    /**
     * @return float|null
     */
    public function getReorderingMaxQty(): ?float
    {
        return $this->reordering_max_qty;
    }

    /**
     * @param float|null $reordering_max_qty
     */
    public function setReorderingMaxQty(?float $reordering_max_qty): void
    {
        $this->reordering_max_qty = $reordering_max_qty;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRouteFromCategIds(): ?array
    {
        return $this->route_from_categ_ids;
    }

    /**
     * @param OdooRelation[]|null $route_from_categ_ids
     */
    public function setRouteFromCategIds(?array $route_from_categ_ids): void
    {
        $this->route_from_categ_ids = $route_from_categ_ids;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param string|null $description_picking
     */
    public function setDescriptionPicking(?string $description_picking): void
    {
        $this->description_picking = $description_picking;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return int|null
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @return int|null
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(OdooRelation $item): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addWebsiteMessageIds(OdooRelation $item): void
    {
        if ($this->hasWebsiteMessageIds($item)) {
            return;
        }

        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        $this->website_message_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWebsiteMessageIds(OdooRelation $item): void
    {
        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        if ($this->hasWebsiteMessageIds($item)) {
            $index = array_search($item, $this->website_message_ids);
            unset($this->website_message_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     * @return int|null
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return bool|null
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageFollowerIds(OdooRelation $item): void
    {
        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        if ($this->hasMessageFollowerIds($item)) {
            $index = array_search($item, $this->message_follower_ids);
            unset($this->message_follower_ids[$index]);
        }
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return string|null
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @return bool|null
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageFollowerIds(OdooRelation $item): void
    {
        if ($this->hasMessageFollowerIds($item)) {
            return;
        }

        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        $this->message_follower_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageIds(OdooRelation $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids);
            unset($this->message_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessagePartnerIds(OdooRelation $item): bool
    {
        if (null === $this->message_partner_ids) {
            return false;
        }

        return in_array($item, $this->message_partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessagePartnerIds(OdooRelation $item): void
    {
        if ($this->hasMessagePartnerIds($item)) {
            return;
        }

        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        $this->message_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessagePartnerIds(OdooRelation $item): void
    {
        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        if ($this->hasMessagePartnerIds($item)) {
            $index = array_search($item, $this->message_partner_ids);
            unset($this->message_partner_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageChannelIds(OdooRelation $item): void
    {
        if ($this->hasMessageChannelIds($item)) {
            return;
        }

        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        $this->message_channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageChannelIds(OdooRelation $item): void
    {
        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        if ($this->hasMessageChannelIds($item)) {
            $index = array_search($item, $this->message_channel_ids);
            unset($this->message_channel_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageIds(OdooRelation $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    /**
     * @return string|null
     */
    public function getDescriptionPickingout(): ?string
    {
        return $this->description_pickingout;
    }

    /**
     * @return string|null
     */
    public function getDescriptionPicking(): ?string
    {
        return $this->description_picking;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $weight_uom_name
     */
    public function setWeightUomName(?string $weight_uom_name): void
    {
        $this->weight_uom_name = $weight_uom_name;
    }

    /**
     * @return bool|null
     */
    public function isSaleOk(): ?bool
    {
        return $this->sale_ok;
    }

    /**
     * @param bool|null $sale_ok
     */
    public function setSaleOk(?bool $sale_ok): void
    {
        $this->sale_ok = $sale_ok;
    }

    /**
     * @return bool|null
     */
    public function isPurchaseOk(): ?bool
    {
        return $this->purchase_ok;
    }

    /**
     * @param bool|null $purchase_ok
     */
    public function setPurchaseOk(?bool $purchase_ok): void
    {
        $this->purchase_ok = $purchase_ok;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPricelistId(): ?OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param OdooRelation|null $pricelist_id
     */
    public function setPricelistId(?OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return OdooRelation
     */
    public function getUomId(): OdooRelation
    {
        return $this->uom_id;
    }

    /**
     * @param OdooRelation $uom_id
     */
    public function setUomId(OdooRelation $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @return string|null
     */
    public function getUomName(): ?string
    {
        return $this->uom_name;
    }

    /**
     * @param string|null $uom_name
     */
    public function setUomName(?string $uom_name): void
    {
        $this->uom_name = $uom_name;
    }

    /**
     * @return OdooRelation
     */
    public function getUomPoId(): OdooRelation
    {
        return $this->uom_po_id;
    }

    /**
     * @param OdooRelation $uom_po_id
     */
    public function setUomPoId(OdooRelation $uom_po_id): void
    {
        $this->uom_po_id = $uom_po_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPackagingIds(): ?array
    {
        return $this->packaging_ids;
    }

    /**
     * @param OdooRelation[]|null $packaging_ids
     */
    public function setPackagingIds(?array $packaging_ids): void
    {
        $this->packaging_ids = $packaging_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPackagingIds(OdooRelation $item): bool
    {
        if (null === $this->packaging_ids) {
            return false;
        }

        return in_array($item, $this->packaging_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPackagingIds(OdooRelation $item): void
    {
        if ($this->hasPackagingIds($item)) {
            return;
        }

        if (null === $this->packaging_ids) {
            $this->packaging_ids = [];
        }

        $this->packaging_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePackagingIds(OdooRelation $item): void
    {
        if (null === $this->packaging_ids) {
            $this->packaging_ids = [];
        }

        if ($this->hasPackagingIds($item)) {
            $index = array_search($item, $this->packaging_ids);
            unset($this->packaging_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSellerIds(): ?array
    {
        return $this->seller_ids;
    }

    /**
     * @param OdooRelation[]|null $seller_ids
     */
    public function setSellerIds(?array $seller_ids): void
    {
        $this->seller_ids = $seller_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSellerIds(OdooRelation $item): bool
    {
        if (null === $this->seller_ids) {
            return false;
        }

        return in_array($item, $this->seller_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSellerIds(OdooRelation $item): void
    {
        if ($this->hasSellerIds($item)) {
            return;
        }

        if (null === $this->seller_ids) {
            $this->seller_ids = [];
        }

        $this->seller_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSellerIds(OdooRelation $item): void
    {
        if (null === $this->seller_ids) {
            $this->seller_ids = [];
        }

        if ($this->hasSellerIds($item)) {
            $index = array_search($item, $this->seller_ids);
            unset($this->seller_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getVariantSellerIds(): ?array
    {
        return $this->variant_seller_ids;
    }

    /**
     * @param OdooRelation[]|null $variant_seller_ids
     */
    public function setVariantSellerIds(?array $variant_seller_ids): void
    {
        $this->variant_seller_ids = $variant_seller_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasVariantSellerIds(OdooRelation $item): bool
    {
        if (null === $this->variant_seller_ids) {
            return false;
        }

        return in_array($item, $this->variant_seller_ids);
    }

    /**
     * @return string|null
     */
    public function getWeightUomName(): ?string
    {
        return $this->weight_uom_name;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeVariantSellerIds(OdooRelation $item): void
    {
        if (null === $this->variant_seller_ids) {
            $this->variant_seller_ids = [];
        }

        if ($this->hasVariantSellerIds($item)) {
            $index = array_search($item, $this->variant_seller_ids);
            unset($this->variant_seller_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescriptionPurchase(): ?string
    {
        return $this->description_purchase;
    }

    /**
     * @param string|null $description_purchase
     */
    public function setDescriptionPurchase(?string $description_purchase): void
    {
        $this->description_purchase = $description_purchase;
    }

    /**
     * @return string|null
     */
    public function getDescriptionSale(): ?string
    {
        return $this->description_sale;
    }

    /**
     * @param string|null $description_sale
     */
    public function setDescriptionSale(?string $description_sale): void
    {
        $this->description_sale = $description_sale;
    }

    /**
     * @return bool|null
     */
    public function isRental(): ?bool
    {
        return $this->rental;
    }

    /**
     * @param bool|null $rental
     */
    public function setRental(?bool $rental): void
    {
        $this->rental = $rental;
    }

    /**
     * @return OdooRelation
     */
    public function getCategId(): OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation $categ_id
     */
    public function setCategId(OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param string|null $volume_uom_name
     */
    public function setVolumeUomName(?string $volume_uom_name): void
    {
        $this->volume_uom_name = $volume_uom_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCostCurrencyId(): ?OdooRelation
    {
        return $this->cost_currency_id;
    }

    /**
     * @param OdooRelation|null $cost_currency_id
     */
    public function setCostCurrencyId(?OdooRelation $cost_currency_id): void
    {
        $this->cost_currency_id = $cost_currency_id;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getListPrice(): ?float
    {
        return $this->list_price;
    }

    /**
     * @param float|null $list_price
     */
    public function setListPrice(?float $list_price): void
    {
        $this->list_price = $list_price;
    }

    /**
     * @return float|null
     */
    public function getLstPrice(): ?float
    {
        return $this->lst_price;
    }

    /**
     * @param float|null $lst_price
     */
    public function setLstPrice(?float $lst_price): void
    {
        $this->lst_price = $lst_price;
    }

    /**
     * @return float|null
     */
    public function getStandardPrice(): ?float
    {
        return $this->standard_price;
    }

    /**
     * @param float|null $standard_price
     */
    public function setStandardPrice(?float $standard_price): void
    {
        $this->standard_price = $standard_price;
    }

    /**
     * @return float|null
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @param float|null $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @return string|null
     */
    public function getVolumeUomName(): ?string
    {
        return $this->volume_uom_name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addVariantSellerIds(OdooRelation $item): void
    {
        if ($this->hasVariantSellerIds($item)) {
            return;
        }

        if (null === $this->variant_seller_ids) {
            $this->variant_seller_ids = [];
        }

        $this->variant_seller_ids[] = $item;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $tracking
     */
    public function setTracking(string $tracking): void
    {
        $this->tracking = $tracking;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountExpenseId(): ?OdooRelation
    {
        return $this->property_account_expense_id;
    }

    /**
     * @param bool|null $has_configurable_attributes
     */
    public function setHasConfigurableAttributes(?bool $has_configurable_attributes): void
    {
        $this->has_configurable_attributes = $has_configurable_attributes;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxesId(): ?array
    {
        return $this->taxes_id;
    }

    /**
     * @param OdooRelation[]|null $taxes_id
     */
    public function setTaxesId(?array $taxes_id): void
    {
        $this->taxes_id = $taxes_id;
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
     * @return OdooRelation[]|null
     */
    public function getSupplierTaxesId(): ?array
    {
        return $this->supplier_taxes_id;
    }

    /**
     * @param OdooRelation[]|null $supplier_taxes_id
     */
    public function setSupplierTaxesId(?array $supplier_taxes_id): void
    {
        $this->supplier_taxes_id = $supplier_taxes_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSupplierTaxesId(OdooRelation $item): bool
    {
        if (null === $this->supplier_taxes_id) {
            return false;
        }

        return in_array($item, $this->supplier_taxes_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSupplierTaxesId(OdooRelation $item): void
    {
        if ($this->hasSupplierTaxesId($item)) {
            return;
        }

        if (null === $this->supplier_taxes_id) {
            $this->supplier_taxes_id = [];
        }

        $this->supplier_taxes_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSupplierTaxesId(OdooRelation $item): void
    {
        if (null === $this->supplier_taxes_id) {
            $this->supplier_taxes_id = [];
        }

        if ($this->hasSupplierTaxesId($item)) {
            $index = array_search($item, $this->supplier_taxes_id);
            unset($this->supplier_taxes_id[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountIncomeId(): ?OdooRelation
    {
        return $this->property_account_income_id;
    }

    /**
     * @param OdooRelation|null $property_account_income_id
     */
    public function setPropertyAccountIncomeId(?OdooRelation $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @param OdooRelation|null $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(?OdooRelation $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @param bool|null $can_image_1024_be_zoomed
     */
    public function setCanImage1024BeZoomed(?bool $can_image_1024_be_zoomed): void
    {
        $this->can_image_1024_be_zoomed = $can_image_1024_be_zoomed;
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
     * @return OdooRelation|null
     */
    public function getResponsibleId(): ?OdooRelation
    {
        return $this->responsible_id;
    }

    /**
     * @param OdooRelation|null $responsible_id
     */
    public function setResponsibleId(?OdooRelation $responsible_id): void
    {
        $this->responsible_id = $responsible_id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockProduction(): ?OdooRelation
    {
        return $this->property_stock_production;
    }

    /**
     * @param OdooRelation|null $property_stock_production
     */
    public function setPropertyStockProduction(?OdooRelation $property_stock_production): void
    {
        $this->property_stock_production = $property_stock_production;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyStockInventory(): ?OdooRelation
    {
        return $this->property_stock_inventory;
    }

    /**
     * @param OdooRelation|null $property_stock_inventory
     */
    public function setPropertyStockInventory(?OdooRelation $property_stock_inventory): void
    {
        $this->property_stock_inventory = $property_stock_inventory;
    }

    /**
     * @return float|null
     */
    public function getSaleDelay(): ?float
    {
        return $this->sale_delay;
    }

    /**
     * @param float|null $sale_delay
     */
    public function setSaleDelay(?float $sale_delay): void
    {
        $this->sale_delay = $sale_delay;
    }

    /**
     * @return string
     */
    public function getTracking(): string
    {
        return $this->tracking;
    }

    /**
     * @return bool|null
     */
    public function isHasConfigurableAttributes(): ?bool
    {
        return $this->has_configurable_attributes;
    }

    /**
     * @return bool|null
     */
    public function isCanImage1024BeZoomed(): ?bool
    {
        return $this->can_image_1024_be_zoomed;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeValidProductTemplateAttributeLineIds(OdooRelation $item): void
    {
        if (null === $this->valid_product_template_attribute_line_ids) {
            $this->valid_product_template_attribute_line_ids = [];
        }

        if ($this->hasValidProductTemplateAttributeLineIds($item)) {
            $index = array_search($item, $this->valid_product_template_attribute_line_ids);
            unset($this->valid_product_template_attribute_line_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return bool|null
     */
    public function isIsProductVariant(): ?bool
    {
        return $this->is_product_variant;
    }

    /**
     * @param bool|null $is_product_variant
     */
    public function setIsProductVariant(?bool $is_product_variant): void
    {
        $this->is_product_variant = $is_product_variant;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttributeLineIds(): ?array
    {
        return $this->attribute_line_ids;
    }

    /**
     * @param OdooRelation[]|null $attribute_line_ids
     */
    public function setAttributeLineIds(?array $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttributeLineIds(OdooRelation $item): bool
    {
        if (null === $this->attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->attribute_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttributeLineIds(OdooRelation $item): void
    {
        if ($this->hasAttributeLineIds($item)) {
            return;
        }

        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        $this->attribute_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttributeLineIds(OdooRelation $item): void
    {
        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        if ($this->hasAttributeLineIds($item)) {
            $index = array_search($item, $this->attribute_line_ids);
            unset($this->attribute_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getValidProductTemplateAttributeLineIds(): ?array
    {
        return $this->valid_product_template_attribute_line_ids;
    }

    /**
     * @param OdooRelation[]|null $valid_product_template_attribute_line_ids
     */
    public function setValidProductTemplateAttributeLineIds(
        ?array $valid_product_template_attribute_line_ids
    ): void {
        $this->valid_product_template_attribute_line_ids = $valid_product_template_attribute_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasValidProductTemplateAttributeLineIds(OdooRelation $item): bool
    {
        if (null === $this->valid_product_template_attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->valid_product_template_attribute_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addValidProductTemplateAttributeLineIds(OdooRelation $item): void
    {
        if ($this->hasValidProductTemplateAttributeLineIds($item)) {
            return;
        }

        if (null === $this->valid_product_template_attribute_line_ids) {
            $this->valid_product_template_attribute_line_ids = [];
        }

        $this->valid_product_template_attribute_line_ids[] = $item;
    }

    /**
     * @return OdooRelation[]
     */
    public function getProductVariantIds(): array
    {
        return $this->product_variant_ids;
    }

    /**
     * @param int|null $pricelist_item_count
     */
    public function setPricelistItemCount(?int $pricelist_item_count): void
    {
        $this->pricelist_item_count = $pricelist_item_count;
    }

    /**
     * @param OdooRelation[] $product_variant_ids
     */
    public function setProductVariantIds(array $product_variant_ids): void
    {
        $this->product_variant_ids = $product_variant_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductVariantIds(OdooRelation $item): bool
    {
        return in_array($item, $this->product_variant_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductVariantIds(OdooRelation $item): void
    {
        if ($this->hasProductVariantIds($item)) {
            return;
        }

        $this->product_variant_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductVariantIds(OdooRelation $item): void
    {
        if ($this->hasProductVariantIds($item)) {
            $index = array_search($item, $this->product_variant_ids);
            unset($this->product_variant_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductVariantId(): ?OdooRelation
    {
        return $this->product_variant_id;
    }

    /**
     * @param OdooRelation|null $product_variant_id
     */
    public function setProductVariantId(?OdooRelation $product_variant_id): void
    {
        $this->product_variant_id = $product_variant_id;
    }

    /**
     * @return int|null
     */
    public function getProductVariantCount(): ?int
    {
        return $this->product_variant_count;
    }

    /**
     * @param int|null $product_variant_count
     */
    public function setProductVariantCount(?int $product_variant_count): void
    {
        $this->product_variant_count = $product_variant_count;
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
     * @return string|null
     */
    public function getDefaultCode(): ?string
    {
        return $this->default_code;
    }

    /**
     * @param string|null $default_code
     */
    public function setDefaultCode(?string $default_code): void
    {
        $this->default_code = $default_code;
    }

    /**
     * @return int|null
     */
    public function getPricelistItemCount(): ?int
    {
        return $this->pricelist_item_count;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.template';
    }
}
