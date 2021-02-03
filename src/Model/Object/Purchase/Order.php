<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Purchase;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : purchase.order
 * ---
 * Name : purchase.order
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
final class Order extends Base
{
    /**
     * Order Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Priority
     * ---
     * Selection :
     *     -> 0 (Normal)
     *     -> 1 (Urgent)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $priority;

    /**
     * Source Document
     * ---
     * Reference of the document that generated this purchase order request (e.g. a sales order)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $origin;

    /**
     * Vendor Reference
     * ---
     * Reference of the sales order or bid sent by the vendor. It's used to do the matching when you receive the
     * products as this reference is usually written on the delivery order sent by your vendor.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_ref;

    /**
     * Order Deadline
     * ---
     * Depicts the date within which the Quotation should be confirmed and converted into a purchase order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_order;

    /**
     * Confirmation Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_approve;

    /**
     * Vendor
     * ---
     * You can find a vendor by its Name, TIN, Email or Internal Reference.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Drop Ship Address
     * ---
     * Put an address if you want to deliver directly from the vendor to the customer. Otherwise, keep empty to
     * deliver to your own company.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $dest_address_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

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
     * Order Lines
     * ---
     * Relation : one2many (purchase.order.line -> order_id)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $order_line;

    /**
     * Terms and Conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $notes;

    /**
     * Bill Count
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $invoice_count;

    /**
     * Bills
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * Billing Status
     * ---
     * Selection :
     *     -> no (Nothing to Bill)
     *     -> to invoice (Waiting Bills)
     *     -> invoiced (Fully Billed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_status;

    /**
     * Receipt Date
     * ---
     * Delivery date promised by vendor. This date is used to determine expected arrival of products.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_planned;

    /**
     * Date Calendar Start
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_calendar_start;

    /**
     * Untaxed Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_untaxed;

    /**
     * Taxes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_tax;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_total;

    /**
     * Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Payment Terms
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_term_id;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Purchase Representative
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Currency Rate
     * ---
     * Ratio between the purchase order currency and the company currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $currency_rate;

    /**
     * Reminder Confirmed
     * ---
     * True if the reminder email is confirmed by the vendor.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mail_reminder_confirmed;

    /**
     * Reception Confirmed
     * ---
     * True if PO reception is confirmed by the vendor.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mail_reception_confirmed;

    /**
     * Receipt Reminder Email
     * ---
     * Automatically send a confirmation email to the vendor X days before the expected receipt date, asking him to
     * confirm the exact date.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $receipt_reminder_email;

    /**
     * Days Before Receipt
     * ---
     * Number of days to send reminder email before the promised receipt date
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $reminder_date_before_receipt;

    /**
     * Incoterm
     * ---
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     * ---
     * Relation : many2one (account.incoterms)
     * @see \Flux\OdooApiClient\Model\Object\Account\Incoterms
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $incoterm_id;

    /**
     * Picking count
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $picking_count;

    /**
     * Receptions
     * ---
     * Relation : many2many (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $picking_ids;

    /**
     * Deliver To
     * ---
     * This will determine operation type of incoming shipment
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $picking_type_id;

    /**
     * Destination Location Type
     * ---
     * Technical field used to display the Drop Ship Address
     * ---
     * Selection :
     *     -> supplier (Vendor Location)
     *     -> view (View)
     *     -> internal (Internal Location)
     *     -> customer (Customer Location)
     *     -> inventory (Inventory Loss)
     *     -> production (Production)
     *     -> transit (Transit Location)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $default_location_dest_id_usage;

    /**
     * Procurement Group
     * ---
     * Relation : many2one (procurement.group)
     * @see \Flux\OdooApiClient\Model\Object\Procurement\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Is Shipped
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_shipped;

    /**
     * Effective Date
     * ---
     * Completion date of the first receipt order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $effective_date;

    /**
     * On-Time Delivery Rate
     * ---
     * Over the past 12 months; the number of products received on time divided by the number of ordered products.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $on_time_rate;

    /**
     * Number of Source Sale
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $sale_order_count;

    /**
     * Auto Generated Purchase Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_generated;

    /**
     * Source Sales Order
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $auto_sale_order_id;

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
    private $activity_ids;

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
    private $activity_state;

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
    private $activity_user_id;

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
    private $activity_type_id;

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
    private $activity_type_icon;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_summary;

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
    private $activity_exception_decoration;

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
    private $activity_exception_icon;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

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
    private $message_follower_ids;

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
    private $message_partner_ids;

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
    private $message_channel_ids;

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
    private $message_ids;

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
    private $message_unread;

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
    private $message_unread_counter;

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
    private $message_needaction;

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
    private $message_needaction_counter;

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
    private $message_has_error;

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
    private $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

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
    private $message_main_attachment_id;

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
    private $website_message_ids;

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
    private $message_has_sms_error;

    /**
     * Portal Access URL
     * ---
     * Customer Portal URL
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_url;

    /**
     * Security Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $access_token;

    /**
     * Access warning
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_warning;

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
     * @param string $name Order Reference
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_order Order Deadline
     *        ---
     *        Depicts the date within which the Quotation should be confirmed and converted into a purchase order.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Vendor
     *        ---
     *        You can find a vendor by its Name, TIN, Email or Internal Reference.
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $picking_type_id Deliver To
     *        ---
     *        This will determine operation type of incoming shipment
     *        ---
     *        Relation : many2one (stock.picking.type)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_order,
        OdooRelation $partner_id,
        OdooRelation $currency_id,
        OdooRelation $company_id,
        OdooRelation $picking_type_id
    ) {
        $this->name = $name;
        $this->date_order = $date_order;
        $this->partner_id = $partner_id;
        $this->currency_id = $currency_id;
        $this->company_id = $company_id;
        $this->picking_type_id = $picking_type_id;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return bool|null
     *
     * @SerializedName("auto_generated")
     */
    public function isAutoGenerated(): ?bool
    {
        return $this->auto_generated;
    }

    /**
     * @param bool|null $auto_generated
     */
    public function setAutoGenerated(?bool $auto_generated): void
    {
        $this->auto_generated = $auto_generated;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("auto_sale_order_id")
     */
    public function getAutoSaleOrderId(): ?OdooRelation
    {
        return $this->auto_sale_order_id;
    }

    /**
     * @param OdooRelation|null $auto_sale_order_id
     */
    public function setAutoSaleOrderId(?OdooRelation $auto_sale_order_id): void
    {
        $this->auto_sale_order_id = $auto_sale_order_id;
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
     * @return string|null
     *
     * @SerializedName("activity_state")
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @SerializedName("sale_order_count")
     */
    public function getSaleOrderCount(): ?int
    {
        return $this->sale_order_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_warning")
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
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
     * @return string|null
     *
     * @SerializedName("access_url")
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @param string|null $access_url
     */
    public function setAccessUrl(?string $access_url): void
    {
        $this->access_url = $access_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @param string|null $access_warning
     */
    public function setAccessWarning(?string $access_warning): void
    {
        $this->access_warning = $access_warning;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     *
     * @SerializedName("message_has_error")
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
     * @param int|null $sale_order_count
     */
    public function setSaleOrderCount(?int $sale_order_count): void
    {
        $this->sale_order_count = $sale_order_count;
    }

    /**
     * @param float|null $on_time_rate
     */
    public function setOnTimeRate(?float $on_time_rate): void
    {
        $this->on_time_rate = $on_time_rate;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOrderLine(OdooRelation $item): void
    {
        if ($this->hasOrderLine($item)) {
            return;
        }

        if (null === $this->order_line) {
            $this->order_line = [];
        }

        $this->order_line[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOrderLine(OdooRelation $item): void
    {
        if (null === $this->order_line) {
            $this->order_line = [];
        }

        if ($this->hasOrderLine($item)) {
            $index = array_search($item, $this->order_line);
            unset($this->order_line[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("notes")
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return int|null
     *
     * @SerializedName("invoice_count")
     */
    public function getInvoiceCount(): ?int
    {
        return $this->invoice_count;
    }

    /**
     * @param int|null $invoice_count
     */
    public function setInvoiceCount(?int $invoice_count): void
    {
        $this->invoice_count = $invoice_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_ids")
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $order_line
     */
    public function setOrderLine(?array $order_line): void
    {
        $this->order_line = $order_line;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_planned")
     */
    public function getDatePlanned(): ?DateTimeInterface
    {
        return $this->date_planned;
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
     * @SerializedName("date_calendar_start")
     */
    public function getDateCalendarStart(): ?DateTimeInterface
    {
        return $this->date_calendar_start;
    }

    /**
     * @param DateTimeInterface|null $date_calendar_start
     */
    public function setDateCalendarStart(?DateTimeInterface $date_calendar_start): void
    {
        $this->date_calendar_start = $date_calendar_start;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_untaxed")
     */
    public function getAmountUntaxed(): ?float
    {
        return $this->amount_untaxed;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOrderLine(OdooRelation $item): bool
    {
        if (null === $this->order_line) {
            return false;
        }

        return in_array($item, $this->order_line);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("order_line")
     */
    public function getOrderLine(): ?array
    {
        return $this->order_line;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_tax")
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
    }

    /**
     * @param DateTimeInterface $date_order
     */
    public function setDateOrder(DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
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
     * @SerializedName("priority")
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param string|null $priority
     */
    public function setPriority(?string $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return string|null
     *
     * @SerializedName("origin")
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
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
     * @param string|null $partner_ref
     */
    public function setPartnerRef(?string $partner_ref): void
    {
        $this->partner_ref = $partner_ref;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_order")
     */
    public function getDateOrder(): DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_approve")
     */
    public function getDateApprove(): ?DateTimeInterface
    {
        return $this->date_approve;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param DateTimeInterface|null $date_approve
     */
    public function setDateApprove(?DateTimeInterface $date_approve): void
    {
        $this->date_approve = $date_approve;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("dest_address_id")
     */
    public function getDestAddressId(): ?OdooRelation
    {
        return $this->dest_address_id;
    }

    /**
     * @param OdooRelation|null $dest_address_id
     */
    public function setDestAddressId(?OdooRelation $dest_address_id): void
    {
        $this->dest_address_id = $dest_address_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param float|null $amount_untaxed
     */
    public function setAmountUntaxed(?float $amount_untaxed): void
    {
        $this->amount_untaxed = $amount_untaxed;
    }

    /**
     * @param float|null $amount_tax
     */
    public function setAmountTax(?float $amount_tax): void
    {
        $this->amount_tax = $amount_tax;
    }

    /**
     * @return float|null
     *
     * @SerializedName("on_time_rate")
     */
    public function getOnTimeRate(): ?float
    {
        return $this->on_time_rate;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("picking_type_id")
     */
    public function getPickingTypeId(): OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation|null $incoterm_id
     */
    public function setIncotermId(?OdooRelation $incoterm_id): void
    {
        $this->incoterm_id = $incoterm_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("picking_count")
     */
    public function getPickingCount(): ?int
    {
        return $this->picking_count;
    }

    /**
     * @param int|null $picking_count
     */
    public function setPickingCount(?int $picking_count): void
    {
        $this->picking_count = $picking_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("picking_ids")
     */
    public function getPickingIds(): ?array
    {
        return $this->picking_ids;
    }

    /**
     * @param OdooRelation[]|null $picking_ids
     */
    public function setPickingIds(?array $picking_ids): void
    {
        $this->picking_ids = $picking_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPickingIds(OdooRelation $item): bool
    {
        if (null === $this->picking_ids) {
            return false;
        }

        return in_array($item, $this->picking_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPickingIds(OdooRelation $item): void
    {
        if ($this->hasPickingIds($item)) {
            return;
        }

        if (null === $this->picking_ids) {
            $this->picking_ids = [];
        }

        $this->picking_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePickingIds(OdooRelation $item): void
    {
        if (null === $this->picking_ids) {
            $this->picking_ids = [];
        }

        if ($this->hasPickingIds($item)) {
            $index = array_search($item, $this->picking_ids);
            unset($this->picking_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $picking_type_id
     */
    public function setPickingTypeId(OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @param int|null $reminder_date_before_receipt
     */
    public function setReminderDateBeforeReceipt(?int $reminder_date_before_receipt): void
    {
        $this->reminder_date_before_receipt = $reminder_date_before_receipt;
    }

    /**
     * @return string|null
     *
     * @SerializedName("default_location_dest_id_usage")
     */
    public function getDefaultLocationDestIdUsage(): ?string
    {
        return $this->default_location_dest_id_usage;
    }

    /**
     * @param string|null $default_location_dest_id_usage
     */
    public function setDefaultLocationDestIdUsage(?string $default_location_dest_id_usage): void
    {
        $this->default_location_dest_id_usage = $default_location_dest_id_usage;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("group_id")
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_shipped")
     */
    public function isIsShipped(): ?bool
    {
        return $this->is_shipped;
    }

    /**
     * @param bool|null $is_shipped
     */
    public function setIsShipped(?bool $is_shipped): void
    {
        $this->is_shipped = $is_shipped;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("effective_date")
     */
    public function getEffectiveDate(): ?DateTimeInterface
    {
        return $this->effective_date;
    }

    /**
     * @param DateTimeInterface|null $effective_date
     */
    public function setEffectiveDate(?DateTimeInterface $effective_date): void
    {
        $this->effective_date = $effective_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("incoterm_id")
     */
    public function getIncotermId(): ?OdooRelation
    {
        return $this->incoterm_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("reminder_date_before_receipt")
     */
    public function getReminderDateBeforeReceipt(): ?int
    {
        return $this->reminder_date_before_receipt;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_total")
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param float|null $amount_total
     */
    public function setAmountTotal(?float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("fiscal_position_id")
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_term_id")
     */
    public function getPaymentTermId(): ?OdooRelation
    {
        return $this->payment_term_id;
    }

    /**
     * @param OdooRelation|null $payment_term_id
     */
    public function setPaymentTermId(?OdooRelation $payment_term_id): void
    {
        $this->payment_term_id = $payment_term_id;
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
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param bool|null $receipt_reminder_email
     */
    public function setReceiptReminderEmail(?bool $receipt_reminder_email): void
    {
        $this->receipt_reminder_email = $receipt_reminder_email;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("currency_rate")
     */
    public function getCurrencyRate(): ?float
    {
        return $this->currency_rate;
    }

    /**
     * @param float|null $currency_rate
     */
    public function setCurrencyRate(?float $currency_rate): void
    {
        $this->currency_rate = $currency_rate;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mail_reminder_confirmed")
     */
    public function isMailReminderConfirmed(): ?bool
    {
        return $this->mail_reminder_confirmed;
    }

    /**
     * @param bool|null $mail_reminder_confirmed
     */
    public function setMailReminderConfirmed(?bool $mail_reminder_confirmed): void
    {
        $this->mail_reminder_confirmed = $mail_reminder_confirmed;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mail_reception_confirmed")
     */
    public function isMailReceptionConfirmed(): ?bool
    {
        return $this->mail_reception_confirmed;
    }

    /**
     * @param bool|null $mail_reception_confirmed
     */
    public function setMailReceptionConfirmed(?bool $mail_reception_confirmed): void
    {
        $this->mail_reception_confirmed = $mail_reception_confirmed;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("receipt_reminder_email")
     */
    public function isReceiptReminderEmail(): ?bool
    {
        return $this->receipt_reminder_email;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'purchase.order';
    }
}
