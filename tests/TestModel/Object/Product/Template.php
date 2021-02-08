<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Product;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * Product Type
     * ---
     * A storable product is a product for which you manage stock. The Inventory app has to be installed.
     * A consumable product is a product for which stock is not managed.
     * A service is a non-material product you provide.
     * ---
     * Selection :
     *     -> consu (Consumable)
     *     -> service (Service)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $type;

    /**
     * Product Category
     * ---
     * Select category for the current product
     * ---
     * Relation : many2one (product.category)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Category
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Pricelist
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Packaging
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Supplierinfo
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Supplierinfo
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute\Line
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute\Line
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_account_expense_id;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_128;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity
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
     * Selection :
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Activity Type Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_type_icon;

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
     * Selection :
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Followers
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Channel
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Attachment
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $type Product Type
     *        ---
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     *        ---
     *        Selection :
     *            -> consu (Consumable)
     *            -> service (Service)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $categ_id Product Category
     *        ---
     *        Select category for the current product
     *        ---
     *        Relation : many2one (product.category)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Category
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        ---
     *        Default unit of measure used for all stock operations.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_po_id Purchase Unit of Measure
     *        ---
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $product_variant_ids Products
     *        ---
     *        Relation : one2many (product.product -> product_tmpl_id)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        string $name,
        string $type,
        OdooRelation $categ_id,
        OdooRelation $uom_id,
        OdooRelation $uom_po_id,
        array $product_variant_ids
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->categ_id = $categ_id;
        $this->uom_id = $uom_id;
        $this->uom_po_id = $uom_po_id;
        $this->product_variant_ids = $product_variant_ids;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
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
     *
     * @SerializedName("activity_state")
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
     *
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_type_icon")
     */
    public function getActivityTypeIcon(): ?string
    {
        return $this->activity_type_icon;
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @return string|null
     *
     * @SerializedName("activity_summary")
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
     *
     * @SerializedName("activity_exception_decoration")
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
     *
     * @SerializedName("activity_exception_icon")
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
     *
     * @SerializedName("message_is_follower")
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
     *
     * @SerializedName("message_follower_ids")
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
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
    public function hasMessageFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids);
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_account_expense_id")
     */
    public function getPropertyAccountExpenseId(): ?OdooRelation
    {
        return $this->property_account_expense_id;
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
     *
     * @SerializedName("supplier_taxes_id")
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
     *
     * @SerializedName("property_account_income_id")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1920")
     */
    public function getImage1920()
    {
        return $this->image_1920;
    }

    /**
     * @param mixed|null $image_1920
     */
    public function setImage1920($image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024()
    {
        return $this->image_1024;
    }

    /**
     * @param mixed|null $image_1024
     */
    public function setImage1024($image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_512")
     */
    public function getImage512()
    {
        return $this->image_512;
    }

    /**
     * @param mixed|null $image_512
     */
    public function setImage512($image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_256")
     */
    public function getImage256()
    {
        return $this->image_256;
    }

    /**
     * @param mixed|null $image_256
     */
    public function setImage256($image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_128")
     */
    public function getImage128()
    {
        return $this->image_128;
    }

    /**
     * @param mixed|null $image_128
     */
    public function setImage128($image_128): void
    {
        $this->image_128 = $image_128;
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
     * @param OdooRelation[]|null $taxes_id
     */
    public function setTaxesId(?array $taxes_id): void
    {
        $this->taxes_id = $taxes_id;
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
     * @return int|null
     *
     * @SerializedName("message_has_error_counter")
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
     *
     * @SerializedName("message_attachment_count")
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
     *
     * @SerializedName("message_main_attachment_id")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     *
     * @SerializedName("message_has_error")
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_has_sms_error")
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
     *
     * @SerializedName("create_uid")
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
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
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
     *
     * @SerializedName("message_partner_ids")
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
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
     *
     * @SerializedName("message_channel_ids")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
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
     * @return bool|null
     *
     * @SerializedName("message_unread")
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
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
     *
     * @SerializedName("message_needaction")
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param bool|null $sale_ok
     */
    public function setSaleOk(?bool $sale_ok): void
    {
        $this->sale_ok = $sale_ok;
    }

    /**
     * @return float|null
     *
     * @SerializedName("volume")
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
     *
     * @SerializedName("volume_uom_name")
     */
    public function getVolumeUomName(): ?string
    {
        return $this->volume_uom_name;
    }

    /**
     * @param string|null $volume_uom_name
     */
    public function setVolumeUomName(?string $volume_uom_name): void
    {
        $this->volume_uom_name = $volume_uom_name;
    }

    /**
     * @return float|null
     *
     * @SerializedName("weight")
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string|null
     *
     * @SerializedName("weight_uom_name")
     */
    public function getWeightUomName(): ?string
    {
        return $this->weight_uom_name;
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
     *
     * @SerializedName("sale_ok")
     */
    public function isSaleOk(): ?bool
    {
        return $this->sale_ok;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("purchase_ok")
     */
    public function isPurchaseOk(): ?bool
    {
        return $this->purchase_ok;
    }

    /**
     * @return float|null
     *
     * @SerializedName("standard_price")
     */
    public function getStandardPrice(): ?float
    {
        return $this->standard_price;
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
     *
     * @SerializedName("pricelist_id")
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
     *
     * @SerializedName("uom_id")
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
     *
     * @SerializedName("uom_name")
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
     *
     * @SerializedName("uom_po_id")
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
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param float|null $standard_price
     */
    public function setStandardPrice(?float $standard_price): void
    {
        $this->standard_price = $standard_price;
    }

    /**
     * @param float|null $lst_price
     */
    public function setLstPrice(?float $lst_price): void
    {
        $this->lst_price = $lst_price;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("packaging_ids")
     */
    public function getPackagingIds(): ?array
    {
        return $this->packaging_ids;
    }

    /**
     * @return string
     *
     * @SerializedName("type")
     */
    public function getType(): string
    {
        return $this->type;
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
     * @return string|null
     *
     * @SerializedName("description")
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
     *
     * @SerializedName("description_purchase")
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
     *
     * @SerializedName("description_sale")
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
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float|null
     *
     * @SerializedName("lst_price")
     */
    public function getLstPrice(): ?float
    {
        return $this->lst_price;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("categ_id")
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
     * @return OdooRelation|null
     *
     * @SerializedName("cost_currency_id")
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
     *
     * @SerializedName("price")
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
     *
     * @SerializedName("list_price")
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param OdooRelation[]|null $packaging_ids
     */
    public function setPackagingIds(?array $packaging_ids): void
    {
        $this->packaging_ids = $packaging_ids;
    }

    /**
     * @param bool|null $has_configurable_attributes
     */
    public function setHasConfigurableAttributes(?bool $has_configurable_attributes): void
    {
        $this->has_configurable_attributes = $has_configurable_attributes;
    }

    /**
     * @param OdooRelation|null $product_variant_id
     */
    public function setProductVariantId(?OdooRelation $product_variant_id): void
    {
        $this->product_variant_id = $product_variant_id;
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
     * @return OdooRelation[]
     *
     * @SerializedName("product_variant_ids")
     */
    public function getProductVariantIds(): array
    {
        return $this->product_variant_ids;
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
     *
     * @SerializedName("product_variant_id")
     */
    public function getProductVariantId(): ?OdooRelation
    {
        return $this->product_variant_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("product_variant_count")
     */
    public function getProductVariantCount(): ?int
    {
        return $this->product_variant_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("valid_product_template_attribute_line_ids")
     */
    public function getValidProductTemplateAttributeLineIds(): ?array
    {
        return $this->valid_product_template_attribute_line_ids;
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
     *
     * @SerializedName("barcode")
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
     *
     * @SerializedName("default_code")
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
     *
     * @SerializedName("pricelist_item_count")
     */
    public function getPricelistItemCount(): ?int
    {
        return $this->pricelist_item_count;
    }

    /**
     * @param int|null $pricelist_item_count
     */
    public function setPricelistItemCount(?int $pricelist_item_count): void
    {
        $this->pricelist_item_count = $pricelist_item_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_image_1024_be_zoomed")
     */
    public function isCanImage1024BeZoomed(): ?bool
    {
        return $this->can_image_1024_be_zoomed;
    }

    /**
     * @param bool|null $can_image_1024_be_zoomed
     */
    public function setCanImage1024BeZoomed(?bool $can_image_1024_be_zoomed): void
    {
        $this->can_image_1024_be_zoomed = $can_image_1024_be_zoomed;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_configurable_attributes")
     */
    public function isHasConfigurableAttributes(): ?bool
    {
        return $this->has_configurable_attributes;
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
     *
     * @SerializedName("seller_ids")
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
     *
     * @SerializedName("variant_seller_ids")
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
     * @return bool|null
     *
     * @SerializedName("active")
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
     *
     * @SerializedName("color")
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
     *
     * @SerializedName("is_product_variant")
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
     *
     * @SerializedName("attribute_line_ids")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.template';
    }
}
