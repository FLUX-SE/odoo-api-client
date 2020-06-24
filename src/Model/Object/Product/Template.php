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
class Template extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    protected $name;

    /**
     * Sequence
     *
     * @var int
     */
    protected $sequence;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Purchase Description
     *
     * @var string
     */
    protected $description_purchase;

    /**
     * Sales Description
     *
     * @var string
     */
    protected $description_sale;

    /**
     * Product Type
     *
     * @var null|array
     */
    protected $type;

    /**
     * Can be Rent
     *
     * @var bool
     */
    protected $rental;

    /**
     * Product Category
     *
     * @var null|Category
     */
    protected $categ_id;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency_id;

    /**
     * Cost Currency
     *
     * @var Currency
     */
    protected $cost_currency_id;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Sales Price
     *
     * @var float
     */
    protected $list_price;

    /**
     * Public Price
     *
     * @var float
     */
    protected $lst_price;

    /**
     * Cost
     *
     * @var float
     */
    protected $standard_price;

    /**
     * Volume
     *
     * @var float
     */
    protected $volume;

    /**
     * Volume unit of measure label
     *
     * @var string
     */
    protected $volume_uom_name;

    /**
     * Weight
     *
     * @var float
     */
    protected $weight;

    /**
     * Weight unit of measure label
     *
     * @var string
     */
    protected $weight_uom_name;

    /**
     * Can be Sold
     *
     * @var bool
     */
    protected $sale_ok;

    /**
     * Can be Purchased
     *
     * @var bool
     */
    protected $purchase_ok;

    /**
     * Pricelist
     *
     * @var Pricelist
     */
    protected $pricelist_id;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    protected $uom_id;

    /**
     * Unit of Measure Name
     *
     * @var string
     */
    protected $uom_name;

    /**
     * Purchase Unit of Measure
     *
     * @var null|Uom
     */
    protected $uom_po_id;

    /**
     * Company
     *
     * @var Company
     */
    protected $company_id;

    /**
     * Product Packages
     *
     * @var Packaging
     */
    protected $packaging_ids;

    /**
     * Vendors
     *
     * @var Supplierinfo
     */
    protected $seller_ids;

    /**
     * Variant Seller
     *
     * @var Supplierinfo
     */
    protected $variant_seller_ids;

    /**
     * Active
     *
     * @var bool
     */
    protected $active;

    /**
     * Color Index
     *
     * @var int
     */
    protected $color;

    /**
     * Is a product variant
     *
     * @var bool
     */
    protected $is_product_variant;

    /**
     * Product Attributes
     *
     * @var Line
     */
    protected $attribute_line_ids;

    /**
     * Valid Product Attribute Lines
     *
     * @var Line
     */
    protected $valid_product_template_attribute_line_ids;

    /**
     * Products
     *
     * @var null|Product
     */
    protected $product_variant_ids;

    /**
     * Product
     *
     * @var Product
     */
    protected $product_variant_id;

    /**
     * # Product Variants
     *
     * @var int
     */
    protected $product_variant_count;

    /**
     * Barcode
     *
     * @var string
     */
    protected $barcode;

    /**
     * Internal Reference
     *
     * @var string
     */
    protected $default_code;

    /**
     * Number of price rules
     *
     * @var int
     */
    protected $pricelist_item_count;

    /**
     * Can Image 1024 be zoomed
     *
     * @var bool
     */
    protected $can_image_1024_be_zoomed;

    /**
     * Is a configurable product
     *
     * @var bool
     */
    protected $has_configurable_attributes;

    /**
     * Customer Taxes
     *
     * @var Tax
     */
    protected $taxes_id;

    /**
     * Vendor Taxes
     *
     * @var Tax
     */
    protected $supplier_taxes_id;

    /**
     * Income Account
     *
     * @var Account
     */
    protected $property_account_income_id;

    /**
     * Expense Account
     *
     * @var Account
     */
    protected $property_account_expense_id;

    /**
     * Track Service
     *
     * @var array
     */
    protected $service_type;

    /**
     * Sales Order Line
     *
     * @var null|array
     */
    protected $sale_line_warn;

    /**
     * Message for Sales Order Line
     *
     * @var string
     */
    protected $sale_line_warn_msg;

    /**
     * Re-Invoice Expenses
     *
     * @var array
     */
    protected $expense_policy;

    /**
     * Re-Invoice Policy visible
     *
     * @var bool
     */
    protected $visible_expense_policy;

    /**
     * Sold
     *
     * @var float
     */
    protected $sales_count;

    /**
     * Invoicing Policy
     *
     * @var array
     */
    protected $invoice_policy;

    /**
     * Image
     *
     * @var int
     */
    protected $image_1920;

    /**
     * Image 1024
     *
     * @var int
     */
    protected $image_1024;

    /**
     * Image 512
     *
     * @var int
     */
    protected $image_512;

    /**
     * Image 256
     *
     * @var int
     */
    protected $image_256;

    /**
     * Image 128
     *
     * @var int
     */
    protected $image_128;

    /**
     * Activities
     *
     * @var Activity
     */
    protected $activity_ids;

    /**
     * Activity State
     *
     * @var array
     */
    protected $activity_state;

    /**
     * Responsible User
     *
     * @var Users
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var Type
     */
    protected $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var DateTimeInterface
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var string
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     *
     * @var array
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     *
     * @var string
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var bool
     */
    protected $message_is_follower;

    /**
     * Followers
     *
     * @var Followers
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var Partner
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var Channel
     */
    protected $message_channel_ids;

    /**
     * Messages
     *
     * @var Message
     */
    protected $message_ids;

    /**
     * Unread Messages
     *
     * @var bool
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     *
     * @var int
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     *
     * @var bool
     */
    protected $message_needaction;

    /**
     * Number of Actions
     *
     * @var int
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     *
     * @var bool
     */
    protected $message_has_error;

    /**
     * Number of errors
     *
     * @var int
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var int
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var Attachment
     */
    protected $message_main_attachment_id;

    /**
     * Website Messages
     *
     * @var Message
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     *
     * @var bool
     */
    protected $message_has_sms_error;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $invoice_policy
     */
    public function setInvoicePolicy(array $invoice_policy): void
    {
        $this->invoice_policy = $invoice_policy;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return int
     */
    public function getImage128(): int
    {
        return $this->image_128;
    }

    /**
     * @return int
     */
    public function getImage256(): int
    {
        return $this->image_256;
    }

    /**
     * @return int
     */
    public function getImage512(): int
    {
        return $this->image_512;
    }

    /**
     * @return int
     */
    public function getImage1024(): int
    {
        return $this->image_1024;
    }

    /**
     * @param int $image_1920
     */
    public function setImage1920(int $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @param array $invoice_policy
     */
    public function removeInvoicePolicy(array $invoice_policy): void
    {
        if ($this->hasInvoicePolicy($invoice_policy)) {
            $index = array_search($invoice_policy, $this->invoice_policy);
            unset($this->invoice_policy[$index]);
        }
    }

    /**
     * @param array $invoice_policy
     */
    public function addInvoicePolicy(array $invoice_policy): void
    {
        if ($this->hasInvoicePolicy($invoice_policy)) {
            return;
        }

        $this->invoice_policy[] = $invoice_policy;
    }

    /**
     * @param array $invoice_policy
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoicePolicy(array $invoice_policy, bool $strict = true): bool
    {
        return in_array($invoice_policy, $this->invoice_policy, $strict);
    }

    /**
     * @return float
     */
    public function getSalesCount(): float
    {
        return $this->sales_count;
    }

    /**
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return bool
     */
    public function isVisibleExpensePolicy(): bool
    {
        return $this->visible_expense_policy;
    }

    /**
     * @param array $expense_policy
     */
    public function removeExpensePolicy(array $expense_policy): void
    {
        if ($this->hasExpensePolicy($expense_policy)) {
            $index = array_search($expense_policy, $this->expense_policy);
            unset($this->expense_policy[$index]);
        }
    }

    /**
     * @param array $expense_policy
     */
    public function addExpensePolicy(array $expense_policy): void
    {
        if ($this->hasExpensePolicy($expense_policy)) {
            return;
        }

        $this->expense_policy[] = $expense_policy;
    }

    /**
     * @param array $expense_policy
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExpensePolicy(array $expense_policy, bool $strict = true): bool
    {
        return in_array($expense_policy, $this->expense_policy, $strict);
    }

    /**
     * @param array $expense_policy
     */
    public function setExpensePolicy(array $expense_policy): void
    {
        $this->expense_policy = $expense_policy;
    }

    /**
     * @param string $sale_line_warn_msg
     */
    public function setSaleLineWarnMsg(string $sale_line_warn_msg): void
    {
        $this->sale_line_warn_msg = $sale_line_warn_msg;
    }

    /**
     * @param ?array $sale_line_warn
     */
    public function removeSaleLineWarn(?array $sale_line_warn): void
    {
        if ($this->hasSaleLineWarn($sale_line_warn)) {
            $index = array_search($sale_line_warn, $this->sale_line_warn);
            unset($this->sale_line_warn[$index]);
        }
    }

    /**
     * @param ?array $sale_line_warn
     */
    public function addSaleLineWarn(?array $sale_line_warn): void
    {
        if ($this->hasSaleLineWarn($sale_line_warn)) {
            return;
        }

        if (null === $this->sale_line_warn) {
            $this->sale_line_warn = [];
        }

        $this->sale_line_warn[] = $sale_line_warn;
    }

    /**
     * @param ?array $sale_line_warn
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleLineWarn(?array $sale_line_warn, bool $strict = true): bool
    {
        if (null === $this->sale_line_warn) {
            return false;
        }

        return in_array($sale_line_warn, $this->sale_line_warn, $strict);
    }

    /**
     * @param null|array $sale_line_warn
     */
    public function setSaleLineWarn(?array $sale_line_warn): void
    {
        $this->sale_line_warn = $sale_line_warn;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param array $service_type
     */
    public function addServiceType(array $service_type): void
    {
        if ($this->hasServiceType($service_type)) {
            return;
        }

        $this->service_type[] = $service_type;
    }

    /**
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return int
     */
    public function getMessageUnreadCounter(): int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return string
     */
    public function getActivityExceptionIcon(): string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return array
     */
    public function getActivityExceptionDecoration(): array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param string $activity_summary
     */
    public function setActivitySummary(string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param array $service_type
     */
    public function removeServiceType(array $service_type): void
    {
        if ($this->hasServiceType($service_type)) {
            $index = array_search($service_type, $this->service_type);
            unset($this->service_type[$index]);
        }
    }

    /**
     * @param array $service_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasServiceType(array $service_type, bool $strict = true): bool
    {
        return in_array($service_type, $this->service_type, $strict);
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param bool $purchase_ok
     */
    public function setPurchaseOk(bool $purchase_ok): void
    {
        $this->purchase_ok = $purchase_ok;
    }

    /**
     * @param bool $sale_ok
     */
    public function setSaleOk(bool $sale_ok): void
    {
        $this->sale_ok = $sale_ok;
    }

    /**
     * @return string
     */
    public function getWeightUomName(): string
    {
        return $this->weight_uom_name;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getVolumeUomName(): string
    {
        return $this->volume_uom_name;
    }

    /**
     * @param float $volume
     */
    public function setVolume(float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @param float $standard_price
     */
    public function setStandardPrice(float $standard_price): void
    {
        $this->standard_price = $standard_price;
    }

    /**
     * @param float $lst_price
     */
    public function setLstPrice(float $lst_price): void
    {
        $this->lst_price = $lst_price;
    }

    /**
     * @param float $list_price
     */
    public function setListPrice(float $list_price): void
    {
        $this->list_price = $list_price;
    }

    /**
     * @return Currency
     */
    public function getCostCurrencyId(): Currency
    {
        return $this->cost_currency_id;
    }

    /**
     * @param null|Uom $uom_id
     */
    public function setUomId(Uom $uom_id): void
    {
        $this->uom_id = $uom_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param null|Category $categ_id
     */
    public function setCategId(Category $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @param bool $rental
     */
    public function setRental(bool $rental): void
    {
        $this->rental = $rental;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $description_sale
     */
    public function setDescriptionSale(string $description_sale): void
    {
        $this->description_sale = $description_sale;
    }

    /**
     * @param string $description_purchase
     */
    public function setDescriptionPurchase(string $description_purchase): void
    {
        $this->description_purchase = $description_purchase;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param Pricelist $pricelist_id
     */
    public function setPricelistId(Pricelist $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return string
     */
    public function getUomName(): string
    {
        return $this->uom_name;
    }

    /**
     * @param array $service_type
     */
    public function setServiceType(array $service_type): void
    {
        $this->service_type = $service_type;
    }

    /**
     * @return int
     */
    public function getProductVariantCount(): int
    {
        return $this->product_variant_count;
    }

    /**
     * @param Account $property_account_expense_id
     */
    public function setPropertyAccountExpenseId(Account $property_account_expense_id): void
    {
        $this->property_account_expense_id = $property_account_expense_id;
    }

    /**
     * @param Account $property_account_income_id
     */
    public function setPropertyAccountIncomeId(Account $property_account_income_id): void
    {
        $this->property_account_income_id = $property_account_income_id;
    }

    /**
     * @param Tax $supplier_taxes_id
     */
    public function setSupplierTaxesId(Tax $supplier_taxes_id): void
    {
        $this->supplier_taxes_id = $supplier_taxes_id;
    }

    /**
     * @param Tax $taxes_id
     */
    public function setTaxesId(Tax $taxes_id): void
    {
        $this->taxes_id = $taxes_id;
    }

    /**
     * @return bool
     */
    public function isHasConfigurableAttributes(): bool
    {
        return $this->has_configurable_attributes;
    }

    /**
     * @return bool
     */
    public function isCanImage1024BeZoomed(): bool
    {
        return $this->can_image_1024_be_zoomed;
    }

    /**
     * @return int
     */
    public function getPricelistItemCount(): int
    {
        return $this->pricelist_item_count;
    }

    /**
     * @param string $default_code
     */
    public function setDefaultCode(string $default_code): void
    {
        $this->default_code = $default_code;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode): void
    {
        $this->barcode = $barcode;
    }

    /**
     * @return Product
     */
    public function getProductVariantId(): Product
    {
        return $this->product_variant_id;
    }

    /**
     * @param null|Uom $uom_po_id
     */
    public function setUomPoId(Uom $uom_po_id): void
    {
        $this->uom_po_id = $uom_po_id;
    }

    /**
     * @param null|Product $product_variant_ids
     */
    public function setProductVariantIds(Product $product_variant_ids): void
    {
        $this->product_variant_ids = $product_variant_ids;
    }

    /**
     * @return Line
     */
    public function getValidProductTemplateAttributeLineIds(): Line
    {
        return $this->valid_product_template_attribute_line_ids;
    }

    /**
     * @param Line $attribute_line_ids
     */
    public function setAttributeLineIds(Line $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @return bool
     */
    public function isIsProductVariant(): bool
    {
        return $this->is_product_variant;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Supplierinfo $variant_seller_ids
     */
    public function setVariantSellerIds(Supplierinfo $variant_seller_ids): void
    {
        $this->variant_seller_ids = $variant_seller_ids;
    }

    /**
     * @param Supplierinfo $seller_ids
     */
    public function setSellerIds(Supplierinfo $seller_ids): void
    {
        $this->seller_ids = $seller_ids;
    }

    /**
     * @param Packaging $packaging_ids
     */
    public function setPackagingIds(Packaging $packaging_ids): void
    {
        $this->packaging_ids = $packaging_ids;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
