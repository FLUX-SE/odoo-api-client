<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : product.template
 * Name : product.template
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
class Template extends Base
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Sequence
     * Gives the sequence order when displaying a product list
     *
     * @var null|int
     */
    protected $sequence;

    /**
     * Description
     *
     * @var null|string
     */
    protected $description;

    /**
     * Purchase Description
     *
     * @var null|string
     */
    protected $description_purchase;

    /**
     * Sales Description
     * A description of the Product that you want to communicate to your customers. This description will be copied
     * to every Sales Order, Delivery Order and Customer Invoice/Credit Note
     *
     * @var null|string
     */
    protected $description_sale;

    /**
     * Product Type
     * A storable product is a product for which you manage stock. The Inventory app has to be installed.
     * A consumable product is a product for which stock is not managed.
     * A service is a non-material product you provide.
     *
     * @var array
     */
    protected $type;

    /**
     * Can be Rent
     *
     * @var null|bool
     */
    protected $rental;

    /**
     * Product Category
     * Select category for the current product
     *
     * @var Category
     */
    protected $categ_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    protected $currency_id;

    /**
     * Cost Currency
     *
     * @var null|Currency
     */
    protected $cost_currency_id;

    /**
     * Price
     *
     * @var null|float
     */
    protected $price;

    /**
     * Sales Price
     * Price at which the product is sold to customers.
     *
     * @var null|float
     */
    protected $list_price;

    /**
     * Public Price
     * Price at which the product is sold to customers.
     *
     * @var null|float
     */
    protected $lst_price;

    /**
     * Cost
     * In Standard Price & AVCO: value of the product (automatically computed in AVCO).
     * In FIFO: value of the last unit that left the stock (automatically computed).
     * Used to value the product when the purchase cost is not known (e.g. inventory adjustment).
     * Used to compute margins on sale orders.
     *
     * @var null|float
     */
    protected $standard_price;

    /**
     * Volume
     *
     * @var null|float
     */
    protected $volume;

    /**
     * Volume unit of measure label
     *
     * @var null|string
     */
    protected $volume_uom_name;

    /**
     * Weight
     *
     * @var null|float
     */
    protected $weight;

    /**
     * Weight unit of measure label
     *
     * @var null|string
     */
    protected $weight_uom_name;

    /**
     * Can be Sold
     *
     * @var null|bool
     */
    protected $sale_ok;

    /**
     * Can be Purchased
     *
     * @var null|bool
     */
    protected $purchase_ok;

    /**
     * Pricelist
     * Technical field. Used for searching on pricelists, not stored in database.
     *
     * @var null|Pricelist
     */
    protected $pricelist_id;

    /**
     * Unit of Measure
     * Default unit of measure used for all stock operations.
     *
     * @var Uom
     */
    protected $uom_id;

    /**
     * Unit of Measure Name
     *
     * @var null|string
     */
    protected $uom_name;

    /**
     * Purchase Unit of Measure
     * Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     * measure.
     *
     * @var Uom
     */
    protected $uom_po_id;

    /**
     * Company
     *
     * @var null|Company
     */
    protected $company_id;

    /**
     * Product Packages
     * Gives the different ways to package the same product.
     *
     * @var null|Packaging[]
     */
    protected $packaging_ids;

    /**
     * Vendors
     * Define vendor pricelists.
     *
     * @var null|Supplierinfo[]
     */
    protected $seller_ids;

    /**
     * Variant Seller
     *
     * @var null|Supplierinfo[]
     */
    protected $variant_seller_ids;

    /**
     * Active
     * If unchecked, it will allow you to hide the product without removing it.
     *
     * @var null|bool
     */
    protected $active;

    /**
     * Color Index
     *
     * @var null|int
     */
    protected $color;

    /**
     * Is a product variant
     *
     * @var null|bool
     */
    protected $is_product_variant;

    /**
     * Product Attributes
     *
     * @var null|Line[]
     */
    protected $attribute_line_ids;

    /**
     * Valid Product Attribute Lines
     * Technical compute
     *
     * @var null|Line[]
     */
    protected $valid_product_template_attribute_line_ids;

    /**
     * Products
     *
     * @var Product[]
     */
    protected $product_variant_ids;

    /**
     * Product
     *
     * @var null|Product
     */
    protected $product_variant_id;

    /**
     * # Product Variants
     *
     * @var null|int
     */
    protected $product_variant_count;

    /**
     * Barcode
     * International Article Number used for product identification.
     *
     * @var null|string
     */
    protected $barcode;

    /**
     * Internal Reference
     *
     * @var null|string
     */
    protected $default_code;

    /**
     * Number of price rules
     *
     * @var null|int
     */
    protected $pricelist_item_count;

    /**
     * Can Image 1024 be zoomed
     *
     * @var null|bool
     */
    protected $can_image_1024_be_zoomed;

    /**
     * Is a configurable product
     *
     * @var null|bool
     */
    protected $has_configurable_attributes;

    /**
     * Customer Taxes
     * Default taxes used when selling the product.
     *
     * @var null|Tax[]
     */
    protected $taxes_id;

    /**
     * Vendor Taxes
     * Default taxes used when buying the product.
     *
     * @var null|Tax[]
     */
    protected $supplier_taxes_id;

    /**
     * Income Account
     * Keep this field empty to use the default value from the product category.
     *
     * @var null|Account
     */
    protected $property_account_income_id;

    /**
     * Expense Account
     * Keep this field empty to use the default value from the product category. If anglo-saxon accounting with
     * automated valuation method is configured, the expense account on the product category will be used.
     *
     * @var null|Account
     */
    protected $property_account_expense_id;

    /**
     * Track Service
     * Manually set quantities on order: Invoice based on the manually entered quantity, without creating an analytic
     * account.
     * Timesheets on contract: Invoice based on the tracked hours on the related timesheet.
     * Create a task and track hours: Create a task on the sales order validation and track the work hours.
     *
     * @var null|array
     */
    protected $service_type;

    /**
     * Sales Order Line
     * Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     * exception with the message and block the flow. The Message has to be written in the next field.
     *
     * @var array
     */
    protected $sale_line_warn;

    /**
     * Message for Sales Order Line
     *
     * @var null|string
     */
    protected $sale_line_warn_msg;

    /**
     * Re-Invoice Expenses
     * Expenses and vendor bills can be re-invoiced to a customer.With this option, a validated expense can be
     * re-invoice to a customer at its cost or sales price.
     *
     * @var null|array
     */
    protected $expense_policy;

    /**
     * Re-Invoice Policy visible
     *
     * @var null|bool
     */
    protected $visible_expense_policy;

    /**
     * Sold
     *
     * @var null|float
     */
    protected $sales_count;

    /**
     * Invoicing Policy
     * Ordered Quantity: Invoice quantities ordered by the customer.
     * Delivered Quantity: Invoice quantities delivered to the customer.
     *
     * @var null|array
     */
    protected $invoice_policy;

    /**
     * Image
     *
     * @var null|int
     */
    protected $image_1920;

    /**
     * Image 1024
     *
     * @var null|int
     */
    protected $image_1024;

    /**
     * Image 512
     *
     * @var null|int
     */
    protected $image_512;

    /**
     * Image 256
     *
     * @var null|int
     */
    protected $image_256;

    /**
     * Image 128
     *
     * @var null|int
     */
    protected $image_128;

    /**
     * Activities
     *
     * @var null|Activity[]
     */
    protected $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     *
     * @var null|array
     */
    protected $activity_state;

    /**
     * Responsible User
     *
     * @var null|Users
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var null|Type
     */
    protected $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var null|DateTimeInterface
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var null|string
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     *
     * @var null|array
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     *
     * @var null|string
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var null|bool
     */
    protected $message_is_follower;

    /**
     * Followers
     *
     * @var null|Followers[]
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var null|Partner[]
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|Channel[]
     */
    protected $message_channel_ids;

    /**
     * Messages
     *
     * @var null|Message[]
     */
    protected $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     *
     * @var null|int
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    protected $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     *
     * @var null|int
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    protected $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     *
     * @var null|int
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var null|int
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var null|Attachment
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     *
     * @var null|Message[]
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    protected $message_has_sms_error;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $name Name
     * @param array $type Product Type
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     * @param Category $categ_id Product Category
     *        Select category for the current product
     * @param Uom $uom_id Unit of Measure
     *        Default unit of measure used for all stock operations.
     * @param Uom $uom_po_id Purchase Unit of Measure
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     * @param Product[] $product_variant_ids Products
     * @param array $sale_line_warn Sales Order Line
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     */
    public function __construct(
        string $name,
        array $type,
        Category $categ_id,
        Uom $uom_id,
        Uom $uom_po_id,
        array $product_variant_ids,
        array $sale_line_warn
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->categ_id = $categ_id;
        $this->uom_id = $uom_id;
        $this->uom_po_id = $uom_po_id;
        $this->product_variant_ids = $product_variant_ids;
        $this->sale_line_warn = $sale_line_warn;
    }

    /**
     * @return null|float
     */
    public function getSalesCount(): ?float
    {
        return $this->sales_count;
    }

    /**
     * @param Activity $item
     */
    public function removeActivityIds(Activity $item): void
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
     * @param Activity $item
     */
    public function addActivityIds(Activity $item): void
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
     * @param Activity $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasActivityIds(Activity $item, bool $strict = true): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids, $strict);
    }

    /**
     * @param null|Activity[] $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return null|int
     */
    public function getImage128(): ?int
    {
        return $this->image_128;
    }

    /**
     * @return null|int
     */
    public function getImage256(): ?int
    {
        return $this->image_256;
    }

    /**
     * @return null|int
     */
    public function getImage512(): ?int
    {
        return $this->image_512;
    }

    /**
     * @return null|int
     */
    public function getImage1024(): ?int
    {
        return $this->image_1024;
    }

    /**
     * @param null|int $image_1920
     */
    public function setImage1920(?int $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @param mixed $item
     */
    public function removeInvoicePolicy($item): void
    {
        if (null === $this->invoice_policy) {
            $this->invoice_policy = [];
        }

        if ($this->hasInvoicePolicy($item)) {
            $index = array_search($item, $this->invoice_policy);
            unset($this->invoice_policy[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addInvoicePolicy($item): void
    {
        if ($this->hasInvoicePolicy($item)) {
            return;
        }

        if (null === $this->invoice_policy) {
            $this->invoice_policy = [];
        }

        $this->invoice_policy[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoicePolicy($item, bool $strict = true): bool
    {
        if (null === $this->invoice_policy) {
            return false;
        }

        return in_array($item, $this->invoice_policy, $strict);
    }

    /**
     * @param null|array $invoice_policy
     */
    public function setInvoicePolicy(?array $invoice_policy): void
    {
        $this->invoice_policy = $invoice_policy;
    }

    /**
     * @return null|bool
     */
    public function isVisibleExpensePolicy(): ?bool
    {
        return $this->visible_expense_policy;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param mixed $item
     */
    public function removeExpensePolicy($item): void
    {
        if (null === $this->expense_policy) {
            $this->expense_policy = [];
        }

        if ($this->hasExpensePolicy($item)) {
            $index = array_search($item, $this->expense_policy);
            unset($this->expense_policy[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addExpensePolicy($item): void
    {
        if ($this->hasExpensePolicy($item)) {
            return;
        }

        if (null === $this->expense_policy) {
            $this->expense_policy = [];
        }

        $this->expense_policy[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExpensePolicy($item, bool $strict = true): bool
    {
        if (null === $this->expense_policy) {
            return false;
        }

        return in_array($item, $this->expense_policy, $strict);
    }

    /**
     * @param null|array $expense_policy
     */
    public function setExpensePolicy(?array $expense_policy): void
    {
        $this->expense_policy = $expense_policy;
    }

    /**
     * @param null|string $sale_line_warn_msg
     */
    public function setSaleLineWarnMsg(?string $sale_line_warn_msg): void
    {
        $this->sale_line_warn_msg = $sale_line_warn_msg;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleLineWarn($item): void
    {
        if ($this->hasSaleLineWarn($item)) {
            $index = array_search($item, $this->sale_line_warn);
            unset($this->sale_line_warn[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSaleLineWarn($item): void
    {
        if ($this->hasSaleLineWarn($item)) {
            return;
        }

        $this->sale_line_warn[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleLineWarn($item, bool $strict = true): bool
    {
        return in_array($item, $this->sale_line_warn, $strict);
    }

    /**
     * @param array $sale_line_warn
     */
    public function setSaleLineWarn(array $sale_line_warn): void
    {
        $this->sale_line_warn = $sale_line_warn;
    }

    /**
     * @param mixed $item
     */
    public function removeServiceType($item): void
    {
        if (null === $this->service_type) {
            $this->service_type = [];
        }

        if ($this->hasServiceType($item)) {
            $index = array_search($item, $this->service_type);
            unset($this->service_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addServiceType($item): void
    {
        if ($this->hasServiceType($item)) {
            return;
        }

        if (null === $this->service_type) {
            $this->service_type = [];
        }

        $this->service_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasServiceType($item, bool $strict = true): bool
    {
        if (null === $this->service_type) {
            return false;
        }

        return in_array($item, $this->service_type, $strict);
    }

    /**
     * @param null|array $service_type
     */
    public function setServiceType(?array $service_type): void
    {
        $this->service_type = $service_type;
    }

    /**
     * @param null|Account $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(?Account $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @return null|array
     */
    public function getActivityState(): ?array
    {
        return $this->activity_state;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param Tax $item
     */
    public function removeSupplierTaxesId(Tax $item): void
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
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
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
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Message $item
     */
    public function removeWebsiteMessageIds(Message $item): void
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
     * @param Message $item
     */
    public function addWebsiteMessageIds(Message $item): void
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
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids, $strict);
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param Message $item
     */
    public function removeMessageIds(Message $item): void
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
     * @param Message $item
     */
    public function addMessageIds(Message $item): void
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
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids, $strict);
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Followers $item
     */
    public function removeMessageFollowerIds(Followers $item): void
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
     * @param Followers $item
     */
    public function addMessageFollowerIds(Followers $item): void
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
     * @param Followers $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageFollowerIds(Followers $item, bool $strict = true): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids, $strict);
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return null|string
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return null|array
     */
    public function getActivityExceptionDecoration(): ?array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param null|Account $property_account_income_id
     */
    public function setPropertyAccountIncomeId(?Account $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @param Tax $item
     */
    public function addSupplierTaxesId(Tax $item): void
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|float $standard_price
     */
    public function setStandardPrice(?float $standard_price): void
    {
        $this->standard_price = $standard_price;
    }

    /**
     * @param Packaging $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPackagingIds(Packaging $item, bool $strict = true): bool
    {
        if (null === $this->packaging_ids) {
            return false;
        }

        return in_array($item, $this->packaging_ids, $strict);
    }

    /**
     * @param null|Packaging[] $packaging_ids
     */
    public function setPackagingIds(?array $packaging_ids): void
    {
        $this->packaging_ids = $packaging_ids;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Uom $uom_po_id
     */
    public function setUomPoId(Uom $uom_po_id): void
    {
        $this->uom_po_id = $uom_po_id;
    }

    /**
     * @return null|string
     */
    public function getUomName(): ?string
    {
        return $this->uom_name;
    }

    /**
     * @param Uom $uom_id
     */
    public function setUomId(Uom $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @param null|Pricelist $pricelist_id
     */
    public function setPricelistId(?Pricelist $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param null|bool $purchase_ok
     */
    public function setPurchaseOk(?bool $purchase_ok): void
    {
        $this->purchase_ok = $purchase_ok;
    }

    /**
     * @param null|bool $sale_ok
     */
    public function setSaleOk(?bool $sale_ok): void
    {
        $this->sale_ok = $sale_ok;
    }

    /**
     * @return null|string
     */
    public function getWeightUomName(): ?string
    {
        return $this->weight_uom_name;
    }

    /**
     * @param null|float $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return null|string
     */
    public function getVolumeUomName(): ?string
    {
        return $this->volume_uom_name;
    }

    /**
     * @param null|float $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @param null|float $lst_price
     */
    public function setLstPrice(?float $lst_price): void
    {
        $this->lst_price = $lst_price;
    }

    /**
     * @param Packaging $item
     */
    public function removePackagingIds(Packaging $item): void
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
     * @param null|float $list_price
     */
    public function setListPrice(?float $list_price): void
    {
        $this->list_price = $list_price;
    }

    /**
     * @param null|float $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return null|Currency
     */
    public function getCostCurrencyId(): ?Currency
    {
        return $this->cost_currency_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @param Category $categ_id
     */
    public function setCategId(Category $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @param null|bool $rental
     */
    public function setRental(?bool $rental): void
    {
        $this->rental = $rental;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|string $description_sale
     */
    public function setDescriptionSale(?string $description_sale): void
    {
        $this->description_sale = $description_sale;
    }

    /**
     * @param null|string $description_purchase
     */
    public function setDescriptionPurchase(?string $description_purchase): void
    {
        $this->description_purchase = $description_purchase;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Packaging $item
     */
    public function addPackagingIds(Packaging $item): void
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
     * @param null|Supplierinfo[] $seller_ids
     */
    public function setSellerIds(?array $seller_ids): void
    {
        $this->seller_ids = $seller_ids;
    }

    /**
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSupplierTaxesId(Tax $item, bool $strict = true): bool
    {
        if (null === $this->supplier_taxes_id) {
            return false;
        }

        return in_array($item, $this->supplier_taxes_id, $strict);
    }

    /**
     * @param Product $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductVariantIds(Product $item, bool $strict = true): bool
    {
        return in_array($item, $this->product_variant_ids, $strict);
    }

    /**
     * @param null|Tax[] $supplier_taxes_id
     */
    public function setSupplierTaxesId(?array $supplier_taxes_id): void
    {
        $this->supplier_taxes_id = $supplier_taxes_id;
    }

    /**
     * @param Tax $item
     */
    public function removeTaxesId(Tax $item): void
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
     * @param Tax $item
     */
    public function addTaxesId(Tax $item): void
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
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxesId(Tax $item, bool $strict = true): bool
    {
        if (null === $this->taxes_id) {
            return false;
        }

        return in_array($item, $this->taxes_id, $strict);
    }

    /**
     * @param null|Tax[] $taxes_id
     */
    public function setTaxesId(?array $taxes_id): void
    {
        $this->taxes_id = $taxes_id;
    }

    /**
     * @return null|bool
     */
    public function isHasConfigurableAttributes(): ?bool
    {
        return $this->has_configurable_attributes;
    }

    /**
     * @return null|bool
     */
    public function isCanImage1024BeZoomed(): ?bool
    {
        return $this->can_image_1024_be_zoomed;
    }

    /**
     * @return null|int
     */
    public function getPricelistItemCount(): ?int
    {
        return $this->pricelist_item_count;
    }

    /**
     * @param null|string $default_code
     */
    public function setDefaultCode(?string $default_code): void
    {
        $this->default_code = $default_code;
    }

    /**
     * @param null|string $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    /**
     * @return null|int
     */
    public function getProductVariantCount(): ?int
    {
        return $this->product_variant_count;
    }

    /**
     * @return null|Product
     */
    public function getProductVariantId(): ?Product
    {
        return $this->product_variant_id;
    }

    /**
     * @param Product $item
     */
    public function removeProductVariantIds(Product $item): void
    {
        if ($this->hasProductVariantIds($item)) {
            $index = array_search($item, $this->product_variant_ids);
            unset($this->product_variant_ids[$index]);
        }
    }

    /**
     * @param Product $item
     */
    public function addProductVariantIds(Product $item): void
    {
        if ($this->hasProductVariantIds($item)) {
            return;
        }

        $this->product_variant_ids[] = $item;
    }

    /**
     * @param Product[] $product_variant_ids
     */
    public function setProductVariantIds(array $product_variant_ids): void
    {
        $this->product_variant_ids = $product_variant_ids;
    }

    /**
     * @param Supplierinfo $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSellerIds(Supplierinfo $item, bool $strict = true): bool
    {
        if (null === $this->seller_ids) {
            return false;
        }

        return in_array($item, $this->seller_ids, $strict);
    }

    /**
     * @return null|Line[]
     */
    public function getValidProductTemplateAttributeLineIds(): ?array
    {
        return $this->valid_product_template_attribute_line_ids;
    }

    /**
     * @param Line $item
     */
    public function removeAttributeLineIds(Line $item): void
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
     * @param Line $item
     */
    public function addAttributeLineIds(Line $item): void
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
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAttributeLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->attribute_line_ids, $strict);
    }

    /**
     * @param null|Line[] $attribute_line_ids
     */
    public function setAttributeLineIds(?array $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @return null|bool
     */
    public function isIsProductVariant(): ?bool
    {
        return $this->is_product_variant;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Supplierinfo $item
     */
    public function removeVariantSellerIds(Supplierinfo $item): void
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
     * @param Supplierinfo $item
     */
    public function addVariantSellerIds(Supplierinfo $item): void
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
     * @param Supplierinfo $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasVariantSellerIds(Supplierinfo $item, bool $strict = true): bool
    {
        if (null === $this->variant_seller_ids) {
            return false;
        }

        return in_array($item, $this->variant_seller_ids, $strict);
    }

    /**
     * @param null|Supplierinfo[] $variant_seller_ids
     */
    public function setVariantSellerIds(?array $variant_seller_ids): void
    {
        $this->variant_seller_ids = $variant_seller_ids;
    }

    /**
     * @param Supplierinfo $item
     */
    public function removeSellerIds(Supplierinfo $item): void
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
     * @param Supplierinfo $item
     */
    public function addSellerIds(Supplierinfo $item): void
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
