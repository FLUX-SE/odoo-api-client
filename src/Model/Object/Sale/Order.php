<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.order
 * ---
 * Name : sale.order
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
     * Source Document
     * ---
     * Reference of the document that generated this sales order request.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $origin;

    /**
     * Customer Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $client_order_ref;

    /**
     * Payment Ref.
     * ---
     * The payment communication of this sale order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reference;

    /**
     * Status
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
     * Order Date
     * ---
     * Creation date of draft/sent orders,
     * Confirmation date of confirmed orders.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_order;

    /**
     * Expiration
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $validity_date;

    /**
     * Is expired
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_expired;

    /**
     * Online Signature
     * ---
     * Request a online signature to the customer in order to confirm orders automatically.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_signature;

    /**
     * Online Payment
     * ---
     * Request an online payment to the customer in order to confirm orders automatically.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_payment;

    /**
     * Creation Date
     * ---
     * Date on which sales order is created.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

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
    private $user_id;

    /**
     * Customer
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
     * Invoice Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_invoice_id;

    /**
     * Delivery Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_shipping_id;

    /**
     * Pricelist
     * ---
     * If you change the pricelist, only newly added lines will be affected.
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pricelist_id;

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
     * Analytic Account
     * ---
     * The analytic account related to a sales order.
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Order Lines
     * ---
     * Relation : one2many (sale.order.line -> order_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $order_line;

    /**
     * Invoice Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invoice_count;

    /**
     * Invoices
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
     * Terms and conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

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
     * Tax amount by group
     * ---
     * type: [(name, amount, base, formated amount, formated base)]
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $amount_by_group;

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
     * Currency Rate
     * ---
     * The rate of the currency to the currency of rate 1 applicable at the date of the order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $currency_rate;

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
     * Fiscal Position
     * ---
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices.The
     * default value comes from the customer.
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
     * Sales Team
     * ---
     * Relation : many2one (crm.team)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Team
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * Signature
     * ---
     * Signature received through the portal.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $signature;

    /**
     * Signed By
     * ---
     * Name of the person that signed the SO.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $signed_by;

    /**
     * Signed On
     * ---
     * Date of the signature.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $signed_on;

    /**
     * Delivery Date
     * ---
     * This is the delivery date promised to the customer. If set, the delivery order will be scheduled based on this
     * date rather than product lead times.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $commitment_date;

    /**
     * Amount Before Discount
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $amount_undiscounted;

    /**
     * Type Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $type_name;

    /**
     * Transactions
     * ---
     * Relation : many2many (payment.transaction)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Transaction
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $transaction_ids;

    /**
     * Authorized Transactions
     * ---
     * Relation : many2many (payment.transaction)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Transaction
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $authorized_transaction_ids;

    /**
     * Has Pricelist Changed
     * ---
     * Technical Field, True if the pricelist was changed;
     *   this will then display a recomputation button
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_update_pricelist;

    /**
     * Tags
     * ---
     * Relation : many2many (crm.tag)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Applied Coupons
     * ---
     * Relation : one2many (coupon.coupon -> sales_order_id)
     * @see \Flux\OdooApiClient\Model\Object\Coupon\Coupon
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $applied_coupon_ids;

    /**
     * Offered Coupons
     * ---
     * Relation : one2many (coupon.coupon -> order_id)
     * @see \Flux\OdooApiClient\Model\Object\Coupon\Coupon
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $generated_coupon_ids;

    /**
     * Reward Amount
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $reward_amount;

    /**
     * Applied Immediate Promo Programs
     * ---
     * Relation : many2many (coupon.program)
     * @see \Flux\OdooApiClient\Model\Object\Coupon\Program
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $no_code_promo_program_ids;

    /**
     * Applied Promo Program
     * ---
     * Relation : many2one (coupon.program)
     * @see \Flux\OdooApiClient\Model\Object\Coupon\Program
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $code_promo_program_id;

    /**
     * Promotion Code
     * ---
     * Applied program code
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $promo_code;

    /**
     * Quotation Template
     * ---
     * Relation : many2one (sale.order.template)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_order_template_id;

    /**
     * Optional Products Lines
     * ---
     * Relation : one2many (sale.order.option -> order_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Option
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_option_ids;

    /**
     * Number of Purchase Order Generated
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $purchase_order_count;

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
    private $incoterm;

    /**
     * Shipping Policy
     * ---
     * If you deliver all products at once, the delivery order will be scheduled based on the greatest product lead
     * time. Otherwise, it will be based on the shortest.
     * ---
     * Selection :
     *     -> direct (As soon as possible)
     *     -> one (When all products are ready)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $picking_policy;

    /**
     * Warehouse
     * ---
     * Relation : many2one (stock.warehouse)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $warehouse_id;

    /**
     * Transfers
     * ---
     * Relation : one2many (stock.picking -> sale_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $picking_ids;

    /**
     * Delivery Orders
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $delivery_count;

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
    private $procurement_group_id;

    /**
     * Effective Date
     * ---
     * Completion date of the first delivery order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $effective_date;

    /**
     * Expected Date
     * ---
     * Delivery date you can promise to the customer, computed from the minimum lead time of the order lines in case
     * of Service products. In case of shipping, the shipping policy of the order will be taken into account to
     * either use the minimum or maximum lead time of the order lines.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $expected_date;

    /**
     * JSON data for the popover widget
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $json_popover;

    /**
     * Has late picking
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_json_popover;

    /**
     * Expenses
     * ---
     * Relation : one2many (hr.expense -> sale_order_id)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $expense_ids;

    /**
     * # of Expenses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $expense_count;

    /**
     * Auto Generated Sales Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_generated;

    /**
     * Source Purchase Order
     * ---
     * Relation : many2one (purchase.order)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $auto_purchase_order_id;

    /**
     * Campaign
     * ---
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     * ---
     * Relation : many2one (utm.campaign)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Campaign
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $campaign_id;

    /**
     * Source
     * ---
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     * ---
     * Relation : many2one (utm.source)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Source
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_id;

    /**
     * Medium
     * ---
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     * ---
     * Relation : many2one (utm.medium)
     * @see \Flux\OdooApiClient\Model\Object\Utm\Medium
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $medium_id;

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
     * @param DateTimeInterface $date_order Order Date
     *        ---
     *        Creation date of draft/sent orders,
     *        Confirmation date of confirmed orders.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Customer
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_invoice_id Invoice Address
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_shipping_id Delivery Address
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $pricelist_id Pricelist
     *        ---
     *        If you change the pricelist, only newly added lines will be affected.
     *        ---
     *        Relation : many2one (product.pricelist)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
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
     * @param string $picking_policy Shipping Policy
     *        ---
     *        If you deliver all products at once, the delivery order will be scheduled based on the greatest product lead
     *        time. Otherwise, it will be based on the shortest.
     *        ---
     *        Selection :
     *            -> direct (As soon as possible)
     *            -> one (When all products are ready)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $warehouse_id Warehouse
     *        ---
     *        Relation : many2one (stock.warehouse)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_order,
        OdooRelation $partner_id,
        OdooRelation $partner_invoice_id,
        OdooRelation $partner_shipping_id,
        OdooRelation $pricelist_id,
        OdooRelation $company_id,
        string $picking_policy,
        OdooRelation $warehouse_id
    ) {
        $this->name = $name;
        $this->date_order = $date_order;
        $this->partner_id = $partner_id;
        $this->partner_invoice_id = $partner_invoice_id;
        $this->partner_shipping_id = $partner_shipping_id;
        $this->pricelist_id = $pricelist_id;
        $this->company_id = $company_id;
        $this->picking_policy = $picking_policy;
        $this->warehouse_id = $warehouse_id;
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
     * @return int|null
     *
     * @SerializedName("expense_count")
     */
    public function getExpenseCount(): ?int
    {
        return $this->expense_count;
    }

    /**
     * @param int|null $expense_count
     */
    public function setExpenseCount(?int $expense_count): void
    {
        $this->expense_count = $expense_count;
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
     * @SerializedName("auto_purchase_order_id")
     */
    public function getAutoPurchaseOrderId(): ?OdooRelation
    {
        return $this->auto_purchase_order_id;
    }

    /**
     * @param OdooRelation|null $auto_purchase_order_id
     */
    public function setAutoPurchaseOrderId(?OdooRelation $auto_purchase_order_id): void
    {
        $this->auto_purchase_order_id = $auto_purchase_order_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("campaign_id")
     */
    public function getCampaignId(): ?OdooRelation
    {
        return $this->campaign_id;
    }

    /**
     * @param OdooRelation|null $campaign_id
     */
    public function setCampaignId(?OdooRelation $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("source_id")
     */
    public function getSourceId(): ?OdooRelation
    {
        return $this->source_id;
    }

    /**
     * @param OdooRelation|null $source_id
     */
    public function setSourceId(?OdooRelation $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("medium_id")
     */
    public function getMediumId(): ?OdooRelation
    {
        return $this->medium_id;
    }

    /**
     * @param OdooRelation|null $medium_id
     */
    public function setMediumId(?OdooRelation $medium_id): void
    {
        $this->medium_id = $medium_id;
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
     */
    public function addExpenseIds(OdooRelation $item): void
    {
        if ($this->hasExpenseIds($item)) {
            return;
        }

        if (null === $this->expense_ids) {
            $this->expense_ids = [];
        }

        $this->expense_ids[] = $item;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
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
     */
    public function removeExpenseIds(OdooRelation $item): void
    {
        if (null === $this->expense_ids) {
            $this->expense_ids = [];
        }

        if ($this->hasExpenseIds($item)) {
            $index = array_search($item, $this->expense_ids);
            unset($this->expense_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExpenseIds(OdooRelation $item): bool
    {
        if (null === $this->expense_ids) {
            return false;
        }

        return in_array($item, $this->expense_ids);
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @return int|null
     *
     * @SerializedName("purchase_order_count")
     */
    public function getPurchaseOrderCount(): ?int
    {
        return $this->purchase_order_count;
    }

    /**
     * @param int|null $purchase_order_count
     */
    public function setPurchaseOrderCount(?int $purchase_order_count): void
    {
        $this->purchase_order_count = $purchase_order_count;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("incoterm")
     */
    public function getIncoterm(): ?OdooRelation
    {
        return $this->incoterm;
    }

    /**
     * @param OdooRelation|null $incoterm
     */
    public function setIncoterm(?OdooRelation $incoterm): void
    {
        $this->incoterm = $incoterm;
    }

    /**
     * @return string
     *
     * @SerializedName("picking_policy")
     */
    public function getPickingPolicy(): string
    {
        return $this->picking_policy;
    }

    /**
     * @param string $picking_policy
     */
    public function setPickingPolicy(string $picking_policy): void
    {
        $this->picking_policy = $picking_policy;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("warehouse_id")
     */
    public function getWarehouseId(): OdooRelation
    {
        return $this->warehouse_id;
    }

    /**
     * @param OdooRelation $warehouse_id
     */
    public function setWarehouseId(OdooRelation $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
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
     * @param OdooRelation[]|null $expense_ids
     */
    public function setExpenseIds(?array $expense_ids): void
    {
        $this->expense_ids = $expense_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("delivery_count")
     */
    public function getDeliveryCount(): ?int
    {
        return $this->delivery_count;
    }

    /**
     * @param int|null $delivery_count
     */
    public function setDeliveryCount(?int $delivery_count): void
    {
        $this->delivery_count = $delivery_count;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("procurement_group_id")
     */
    public function getProcurementGroupId(): ?OdooRelation
    {
        return $this->procurement_group_id;
    }

    /**
     * @param OdooRelation|null $procurement_group_id
     */
    public function setProcurementGroupId(?OdooRelation $procurement_group_id): void
    {
        $this->procurement_group_id = $procurement_group_id;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("expected_date")
     */
    public function getExpectedDate(): ?DateTimeInterface
    {
        return $this->expected_date;
    }

    /**
     * @param DateTimeInterface|null $expected_date
     */
    public function setExpectedDate(?DateTimeInterface $expected_date): void
    {
        $this->expected_date = $expected_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("json_popover")
     */
    public function getJsonPopover(): ?string
    {
        return $this->json_popover;
    }

    /**
     * @param string|null $json_popover
     */
    public function setJsonPopover(?string $json_popover): void
    {
        $this->json_popover = $json_popover;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_json_popover")
     */
    public function isShowJsonPopover(): ?bool
    {
        return $this->show_json_popover;
    }

    /**
     * @param bool|null $show_json_popover
     */
    public function setShowJsonPopover(?bool $show_json_popover): void
    {
        $this->show_json_popover = $show_json_popover;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("expense_ids")
     */
    public function getExpenseIds(): ?array
    {
        return $this->expense_ids;
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
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return bool|null
     *
     * @SerializedName("message_has_sms_error")
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
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
     * @return string|null
     *
     * @SerializedName("access_warning")
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }

    /**
     * @param string|null $access_warning
     */
    public function setAccessWarning(?string $access_warning): void
    {
        $this->access_warning = $access_warning;
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
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     *
     * @SerializedName("message_ids")
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
     * @param OdooRelation[]|null $sale_order_option_ids
     */
    public function setSaleOrderOptionIds(?array $sale_order_option_ids): void
    {
        $this->sale_order_option_ids = $sale_order_option_ids;
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
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
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
     * @SerializedName("analytic_account_id")
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
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
     * @param OdooRelation[]|null $order_line
     */
    public function setOrderLine(?array $order_line): void
    {
        $this->order_line = $order_line;
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
     * @return OdooRelation
     *
     * @SerializedName("pricelist_id")
     */
    public function getPricelistId(): OdooRelation
    {
        return $this->pricelist_id;
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
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
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
     * @param float|null $amount_untaxed
     */
    public function setAmountUntaxed(?float $amount_untaxed): void
    {
        $this->amount_untaxed = $amount_untaxed;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("amount_by_group")
     */
    public function getAmountByGroup()
    {
        return $this->amount_by_group;
    }

    /**
     * @param mixed|null $amount_by_group
     */
    public function setAmountByGroup($amount_by_group): void
    {
        $this->amount_by_group = $amount_by_group;
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
     * @param float|null $amount_tax
     */
    public function setAmountTax(?float $amount_tax): void
    {
        $this->amount_tax = $amount_tax;
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
     * @param OdooRelation $pricelist_id
     */
    public function setPricelistId(OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param OdooRelation $partner_shipping_id
     */
    public function setPartnerShippingId(OdooRelation $partner_shipping_id): void
    {
        $this->partner_shipping_id = $partner_shipping_id;
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
     * @param DateTimeInterface|null $validity_date
     */
    public function setValidityDate(?DateTimeInterface $validity_date): void
    {
        $this->validity_date = $validity_date;
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
     * @SerializedName("client_order_ref")
     */
    public function getClientOrderRef(): ?string
    {
        return $this->client_order_ref;
    }

    /**
     * @param string|null $client_order_ref
     */
    public function setClientOrderRef(?string $client_order_ref): void
    {
        $this->client_order_ref = $client_order_ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reference")
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param DateTimeInterface $date_order
     */
    public function setDateOrder(DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("validity_date")
     */
    public function getValidityDate(): ?DateTimeInterface
    {
        return $this->validity_date;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_expired")
     */
    public function isIsExpired(): ?bool
    {
        return $this->is_expired;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_shipping_id")
     */
    public function getPartnerShippingId(): OdooRelation
    {
        return $this->partner_shipping_id;
    }

    /**
     * @param bool|null $is_expired
     */
    public function setIsExpired(?bool $is_expired): void
    {
        $this->is_expired = $is_expired;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("require_signature")
     */
    public function isRequireSignature(): ?bool
    {
        return $this->require_signature;
    }

    /**
     * @param bool|null $require_signature
     */
    public function setRequireSignature(?bool $require_signature): void
    {
        $this->require_signature = $require_signature;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("require_payment")
     */
    public function isRequirePayment(): ?bool
    {
        return $this->require_payment;
    }

    /**
     * @param bool|null $require_payment
     */
    public function setRequirePayment(?bool $require_payment): void
    {
        $this->require_payment = $require_payment;
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
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
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
     * @return OdooRelation
     *
     * @SerializedName("partner_invoice_id")
     */
    public function getPartnerInvoiceId(): OdooRelation
    {
        return $this->partner_invoice_id;
    }

    /**
     * @param OdooRelation $partner_invoice_id
     */
    public function setPartnerInvoiceId(OdooRelation $partner_invoice_id): void
    {
        $this->partner_invoice_id = $partner_invoice_id;
    }

    /**
     * @param float|null $amount_total
     */
    public function setAmountTotal(?float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @param float|null $currency_rate
     */
    public function setCurrencyRate(?float $currency_rate): void
    {
        $this->currency_rate = $currency_rate;
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
     * @param OdooRelation $item
     */
    public function addGeneratedCouponIds(OdooRelation $item): void
    {
        if ($this->hasGeneratedCouponIds($item)) {
            return;
        }

        if (null === $this->generated_coupon_ids) {
            $this->generated_coupon_ids = [];
        }

        $this->generated_coupon_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagIds(OdooRelation $item): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagIds(OdooRelation $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTagIds(OdooRelation $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("applied_coupon_ids")
     */
    public function getAppliedCouponIds(): ?array
    {
        return $this->applied_coupon_ids;
    }

    /**
     * @param OdooRelation[]|null $applied_coupon_ids
     */
    public function setAppliedCouponIds(?array $applied_coupon_ids): void
    {
        $this->applied_coupon_ids = $applied_coupon_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAppliedCouponIds(OdooRelation $item): bool
    {
        if (null === $this->applied_coupon_ids) {
            return false;
        }

        return in_array($item, $this->applied_coupon_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAppliedCouponIds(OdooRelation $item): void
    {
        if ($this->hasAppliedCouponIds($item)) {
            return;
        }

        if (null === $this->applied_coupon_ids) {
            $this->applied_coupon_ids = [];
        }

        $this->applied_coupon_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAppliedCouponIds(OdooRelation $item): void
    {
        if (null === $this->applied_coupon_ids) {
            $this->applied_coupon_ids = [];
        }

        if ($this->hasAppliedCouponIds($item)) {
            $index = array_search($item, $this->applied_coupon_ids);
            unset($this->applied_coupon_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("generated_coupon_ids")
     */
    public function getGeneratedCouponIds(): ?array
    {
        return $this->generated_coupon_ids;
    }

    /**
     * @param OdooRelation[]|null $generated_coupon_ids
     */
    public function setGeneratedCouponIds(?array $generated_coupon_ids): void
    {
        $this->generated_coupon_ids = $generated_coupon_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGeneratedCouponIds(OdooRelation $item): bool
    {
        if (null === $this->generated_coupon_ids) {
            return false;
        }

        return in_array($item, $this->generated_coupon_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGeneratedCouponIds(OdooRelation $item): void
    {
        if (null === $this->generated_coupon_ids) {
            $this->generated_coupon_ids = [];
        }

        if ($this->hasGeneratedCouponIds($item)) {
            $index = array_search($item, $this->generated_coupon_ids);
            unset($this->generated_coupon_ids[$index]);
        }
    }

    /**
     * @param bool|null $show_update_pricelist
     */
    public function setShowUpdatePricelist(?bool $show_update_pricelist): void
    {
        $this->show_update_pricelist = $show_update_pricelist;
    }

    /**
     * @return float|null
     *
     * @SerializedName("reward_amount")
     */
    public function getRewardAmount(): ?float
    {
        return $this->reward_amount;
    }

    /**
     * @param float|null $reward_amount
     */
    public function setRewardAmount(?float $reward_amount): void
    {
        $this->reward_amount = $reward_amount;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("no_code_promo_program_ids")
     */
    public function getNoCodePromoProgramIds(): ?array
    {
        return $this->no_code_promo_program_ids;
    }

    /**
     * @param OdooRelation[]|null $no_code_promo_program_ids
     */
    public function setNoCodePromoProgramIds(?array $no_code_promo_program_ids): void
    {
        $this->no_code_promo_program_ids = $no_code_promo_program_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNoCodePromoProgramIds(OdooRelation $item): bool
    {
        if (null === $this->no_code_promo_program_ids) {
            return false;
        }

        return in_array($item, $this->no_code_promo_program_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addNoCodePromoProgramIds(OdooRelation $item): void
    {
        if ($this->hasNoCodePromoProgramIds($item)) {
            return;
        }

        if (null === $this->no_code_promo_program_ids) {
            $this->no_code_promo_program_ids = [];
        }

        $this->no_code_promo_program_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNoCodePromoProgramIds(OdooRelation $item): void
    {
        if (null === $this->no_code_promo_program_ids) {
            $this->no_code_promo_program_ids = [];
        }

        if ($this->hasNoCodePromoProgramIds($item)) {
            $index = array_search($item, $this->no_code_promo_program_ids);
            unset($this->no_code_promo_program_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("code_promo_program_id")
     */
    public function getCodePromoProgramId(): ?OdooRelation
    {
        return $this->code_promo_program_id;
    }

    /**
     * @param OdooRelation|null $code_promo_program_id
     */
    public function setCodePromoProgramId(?OdooRelation $code_promo_program_id): void
    {
        $this->code_promo_program_id = $code_promo_program_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("promo_code")
     */
    public function getPromoCode(): ?string
    {
        return $this->promo_code;
    }

    /**
     * @param string|null $promo_code
     */
    public function setPromoCode(?string $promo_code): void
    {
        $this->promo_code = $promo_code;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_order_template_id")
     */
    public function getSaleOrderTemplateId(): ?OdooRelation
    {
        return $this->sale_order_template_id;
    }

    /**
     * @param OdooRelation|null $sale_order_template_id
     */
    public function setSaleOrderTemplateId(?OdooRelation $sale_order_template_id): void
    {
        $this->sale_order_template_id = $sale_order_template_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_ids")
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_update_pricelist")
     */
    public function isShowUpdatePricelist(): ?bool
    {
        return $this->show_update_pricelist;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("commitment_date")
     */
    public function getCommitmentDate(): ?DateTimeInterface
    {
        return $this->commitment_date;
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
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("team_id")
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("signature")
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed|null $signature
     */
    public function setSignature($signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signed_by")
     */
    public function getSignedBy(): ?string
    {
        return $this->signed_by;
    }

    /**
     * @param string|null $signed_by
     */
    public function setSignedBy(?string $signed_by): void
    {
        $this->signed_by = $signed_by;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("signed_on")
     */
    public function getSignedOn(): ?DateTimeInterface
    {
        return $this->signed_on;
    }

    /**
     * @param DateTimeInterface|null $signed_on
     */
    public function setSignedOn(?DateTimeInterface $signed_on): void
    {
        $this->signed_on = $signed_on;
    }

    /**
     * @param DateTimeInterface|null $commitment_date
     */
    public function setCommitmentDate(?DateTimeInterface $commitment_date): void
    {
        $this->commitment_date = $commitment_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAuthorizedTransactionIds(OdooRelation $item): void
    {
        if (null === $this->authorized_transaction_ids) {
            $this->authorized_transaction_ids = [];
        }

        if ($this->hasAuthorizedTransactionIds($item)) {
            $index = array_search($item, $this->authorized_transaction_ids);
            unset($this->authorized_transaction_ids[$index]);
        }
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_undiscounted")
     */
    public function getAmountUndiscounted(): ?float
    {
        return $this->amount_undiscounted;
    }

    /**
     * @param float|null $amount_undiscounted
     */
    public function setAmountUndiscounted(?float $amount_undiscounted): void
    {
        $this->amount_undiscounted = $amount_undiscounted;
    }

    /**
     * @return string|null
     *
     * @SerializedName("type_name")
     */
    public function getTypeName(): ?string
    {
        return $this->type_name;
    }

    /**
     * @param string|null $type_name
     */
    public function setTypeName(?string $type_name): void
    {
        $this->type_name = $type_name;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("transaction_ids")
     */
    public function getTransactionIds(): ?array
    {
        return $this->transaction_ids;
    }

    /**
     * @param OdooRelation[]|null $transaction_ids
     */
    public function setTransactionIds(?array $transaction_ids): void
    {
        $this->transaction_ids = $transaction_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTransactionIds(OdooRelation $item): bool
    {
        if (null === $this->transaction_ids) {
            return false;
        }

        return in_array($item, $this->transaction_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTransactionIds(OdooRelation $item): void
    {
        if ($this->hasTransactionIds($item)) {
            return;
        }

        if (null === $this->transaction_ids) {
            $this->transaction_ids = [];
        }

        $this->transaction_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTransactionIds(OdooRelation $item): void
    {
        if (null === $this->transaction_ids) {
            $this->transaction_ids = [];
        }

        if ($this->hasTransactionIds($item)) {
            $index = array_search($item, $this->transaction_ids);
            unset($this->transaction_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("authorized_transaction_ids")
     */
    public function getAuthorizedTransactionIds(): ?array
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param OdooRelation[]|null $authorized_transaction_ids
     */
    public function setAuthorizedTransactionIds(?array $authorized_transaction_ids): void
    {
        $this->authorized_transaction_ids = $authorized_transaction_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAuthorizedTransactionIds(OdooRelation $item): bool
    {
        if (null === $this->authorized_transaction_ids) {
            return false;
        }

        return in_array($item, $this->authorized_transaction_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAuthorizedTransactionIds(OdooRelation $item): void
    {
        if ($this->hasAuthorizedTransactionIds($item)) {
            return;
        }

        if (null === $this->authorized_transaction_ids) {
            $this->authorized_transaction_ids = [];
        }

        $this->authorized_transaction_ids[] = $item;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order';
    }
}
