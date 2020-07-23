<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : sale.order
 * Name : sale.order
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
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Source Document
     * Reference of the document that generated this sales order request.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $origin;

    /**
     * Customer Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $client_order_ref;

    /**
     * Payment Ref.
     * The payment communication of this sale order.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reference;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (Quotation)
     *     -> sent (Quotation Sent)
     *     -> sale (Sales Order)
     *     -> done (Locked)
     *     -> cancel (Cancelled)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Order Date
     * Creation date of draft/sent orders,
     * Confirmation date of confirmed orders.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_order;

    /**
     * Expiration
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $validity_date;

    /**
     * Is expired
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_expired;

    /**
     * Online Signature
     * Request a online signature to the customer in order to confirm orders automatically.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_signature;

    /**
     * Online Payment
     * Request an online payment to the customer in order to confirm orders automatically.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_payment;

    /**
     * Remaining Days Before Expiration
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $remaining_validity_days;

    /**
     * Creation Date
     * Date on which sales order is created.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Salesperson
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Customer
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Invoice Address
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_invoice_id;

    /**
     * Delivery Address
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_shipping_id;

    /**
     * Pricelist
     * If you change the pricelist, only newly added lines will be affected.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pricelist_id;

    /**
     * Currency
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Analytic Account
     * The analytic account related to a sales order.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Order Lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $order_line;

    /**
     * Invoice Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invoice_count;

    /**
     * Invoices
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * Invoice Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> upselling (Upselling Opportunity)
     *     -> invoiced (Fully Invoiced)
     *     -> to invoice (To Invoice)
     *     -> no (Nothing to Invoice)
     *
     *
     * @var string|null
     */
    private $invoice_status;

    /**
     * Terms and conditions
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Untaxed Amount
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_untaxed;

    /**
     * Tax amount by group
     * type: [(name, amount, base, formated amount, formated base)]
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $amount_by_group;

    /**
     * Taxes
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_tax;

    /**
     * Total
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_total;

    /**
     * Currency Rate
     * The rate of the currency to the currency of rate 1 applicable at the date of the order
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $currency_rate;

    /**
     * Payment Terms
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_term_id;

    /**
     * Fiscal Position
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices.The
     * default value comes from the customer.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Sales Team
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * Signature
     * Signature received through the portal.
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $signature;

    /**
     * Signed By
     * Name of the person that signed the SO.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $signed_by;

    /**
     * Signed On
     * Date of the signature.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $signed_on;

    /**
     * Delivery Date
     * This is the delivery date promised to the customer. If set, the delivery order will be scheduled based on this
     * date rather than product lead times.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $commitment_date;

    /**
     * Expected Date
     * Delivery date you can promise to the customer, computed from the minimum lead time of the order lines.
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $expected_date;

    /**
     * Amount Before Discount
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $amount_undiscounted;

    /**
     * Type Name
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $type_name;

    /**
     * Transactions
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $transaction_ids;

    /**
     * Authorized Transactions
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $authorized_transaction_ids;

    /**
     * Quotation Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_order_template_id;

    /**
     * Optional Products Lines
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_option_ids;

    /**
     * Is Taxcloud Configured
     * Used to determine whether or not to warn the user to configure TaxCloud.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_taxcloud_configured;

    /**
     * Use TaxCloud API
     * Technical field to determine whether to hide taxes in views or not.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_taxcloud;

    /**
     * Campaign
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $campaign_id;

    /**
     * Source
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_id;

    /**
     * Medium
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $medium_id;

    /**
     * Activities
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     *
     *
     * @var string|null
     */
    private $activity_state;

    /**
     * Responsible User
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> warning (Alert)
     *     -> danger (Error)
     *
     *
     * @var string|null
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

    /**
     * Followers
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_channel_ids;

    /**
     * Messages
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_sms_error;

    /**
     * Portal Access URL
     * Customer Portal URL
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_url;

    /**
     * Security Token
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $access_token;

    /**
     * Access warning
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_warning;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Order Reference
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_order Order Date
     *        Creation date of draft/sent orders,
     *        Confirmation date of confirmed orders.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Customer
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_invoice_id Invoice Address
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_shipping_id Delivery Address
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $pricelist_id Pricelist
     *        If you change the pricelist, only newly added lines will be affected.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $company_id Company
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
        OdooRelation $currency_id,
        OdooRelation $company_id
    ) {
        $this->name = $name;
        $this->date_order = $date_order;
        $this->partner_id = $partner_id;
        $this->partner_invoice_id = $partner_invoice_id;
        $this->partner_shipping_id = $partner_shipping_id;
        $this->pricelist_id = $pricelist_id;
        $this->currency_id = $currency_id;
        $this->company_id = $company_id;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
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
     * @return DateTimeInterface|null
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
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
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
     * @return OdooRelation|null
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @return string|null
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
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
     * @param bool|null $is_taxcloud
     */
    public function setIsTaxcloud(?bool $is_taxcloud): void
    {
        $this->is_taxcloud = $is_taxcloud;
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
     * @return bool|null
     */
    public function isIsTaxcloudConfigured(): ?bool
    {
        return $this->is_taxcloud_configured;
    }

    /**
     * @param bool|null $is_taxcloud_configured
     */
    public function setIsTaxcloudConfigured(?bool $is_taxcloud_configured): void
    {
        $this->is_taxcloud_configured = $is_taxcloud_configured;
    }

    /**
     * @return bool|null
     */
    public function isIsTaxcloud(): ?bool
    {
        return $this->is_taxcloud;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCampaignId(): ?OdooRelation
    {
        return $this->campaign_id;
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
     * @param OdooRelation|null $campaign_id
     */
    public function setCampaignId(?OdooRelation $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return OdooRelation|null
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
     * @param string|null $access_url
     */
    public function setAccessUrl(?string $access_url): void
    {
        $this->access_url = $access_url;
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
     * @return string|null
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @return OdooRelation|null
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @return bool|null
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
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
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
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
     * @return OdooRelation|null
     */
    public function getSaleOrderTemplateId(): ?OdooRelation
    {
        return $this->sale_order_template_id;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
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
     * @return OdooRelation
     */
    public function getPartnerShippingId(): OdooRelation
    {
        return $this->partner_shipping_id;
    }

    /**
     * @param OdooRelation $partner_shipping_id
     */
    public function setPartnerShippingId(OdooRelation $partner_shipping_id): void
    {
        $this->partner_shipping_id = $partner_shipping_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPricelistId(): OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param OdooRelation $pricelist_id
     */
    public function setPricelistId(OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateOrder(): DateTimeInterface
    {
        return $this->date_order;
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
     * @param DateTimeInterface $date_order
     */
    public function setDateOrder(DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @param int|null $remaining_validity_days
     */
    public function setRemainingValidityDays(?int $remaining_validity_days): void
    {
        $this->remaining_validity_days = $remaining_validity_days;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getValidityDate(): ?DateTimeInterface
    {
        return $this->validity_date;
    }

    /**
     * @param DateTimeInterface|null $validity_date
     */
    public function setValidityDate(?DateTimeInterface $validity_date): void
    {
        $this->validity_date = $validity_date;
    }

    /**
     * @return bool|null
     */
    public function isIsExpired(): ?bool
    {
        return $this->is_expired;
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
     * @return int|null
     */
    public function getRemainingValidityDays(): ?int
    {
        return $this->remaining_validity_days;
    }

    /**
     * @return OdooRelation[]|null
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
     * @return float|null
     */
    public function getAmountUndiscounted(): ?float
    {
        return $this->amount_undiscounted;
    }

    /**
     * @param int|null $signature
     */
    public function setSignature(?int $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return string|null
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
     * @return DateTimeInterface|null
     */
    public function getCommitmentDate(): ?DateTimeInterface
    {
        return $this->commitment_date;
    }

    /**
     * @param DateTimeInterface|null $commitment_date
     */
    public function setCommitmentDate(?DateTimeInterface $commitment_date): void
    {
        $this->commitment_date = $commitment_date;
    }

    /**
     * @return DateTimeInterface|null
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
     * @param float|null $amount_undiscounted
     */
    public function setAmountUndiscounted(?float $amount_undiscounted): void
    {
        $this->amount_undiscounted = $amount_undiscounted;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return string|null
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
     * @return int|null
     */
    public function getSignature(): ?int
    {
        return $this->signature;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
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
     * @return float|null
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
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
     * @return int|null
     */
    public function getAmountByGroup(): ?int
    {
        return $this->amount_by_group;
    }

    /**
     * @param int|null $amount_by_group
     */
    public function setAmountByGroup(?int $amount_by_group): void
    {
        $this->amount_by_group = $amount_by_group;
    }

    /**
     * @param float|null $amount_tax
     */
    public function setAmountTax(?float $amount_tax): void
    {
        $this->amount_tax = $amount_tax;
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
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @param float|null $amount_total
     */
    public function setAmountTotal(?float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @return float|null
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
     * @return OdooRelation|null
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
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order';
    }
}
