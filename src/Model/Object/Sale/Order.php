<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Payment\Transaction;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line;
use Flux\OdooApiClient\Model\Object\Sale\Order\Option;
use Flux\OdooApiClient\Model\Object\Sale\Order\Template;
use Flux\OdooApiClient\Model\Object\Utm\Campaign;
use Flux\OdooApiClient\Model\Object\Utm\Medium;
use Flux\OdooApiClient\Model\Object\Utm\Source;

/**
 * Odoo model : sale.order
 * Name : sale.order
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
final class Order extends Base
{
    /**
     * Order Reference
     *
     * @var string
     */
    private $name;

    /**
     * Source Document
     * Reference of the document that generated this sales order request.
     *
     * @var null|string
     */
    private $origin;

    /**
     * Customer Reference
     *
     * @var null|string
     */
    private $client_order_ref;

    /**
     * Payment Ref.
     * The payment communication of this sale order.
     *
     * @var null|string
     */
    private $reference;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Order Date
     * Creation date of draft/sent orders,
     * Confirmation date of confirmed orders.
     *
     * @var DateTimeInterface
     */
    private $date_order;

    /**
     * Expiration
     *
     * @var null|DateTimeInterface
     */
    private $validity_date;

    /**
     * Is expired
     *
     * @var null|bool
     */
    private $is_expired;

    /**
     * Online Signature
     * Request a online signature to the customer in order to confirm orders automatically.
     *
     * @var null|bool
     */
    private $require_signature;

    /**
     * Online Payment
     * Request an online payment to the customer in order to confirm orders automatically.
     *
     * @var null|bool
     */
    private $require_payment;

    /**
     * Remaining Days Before Expiration
     *
     * @var null|int
     */
    private $remaining_validity_days;

    /**
     * Creation Date
     * Date on which sales order is created.
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Customer
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Invoice Address
     *
     * @var Partner
     */
    private $partner_invoice_id;

    /**
     * Delivery Address
     *
     * @var Partner
     */
    private $partner_shipping_id;

    /**
     * Pricelist
     * If you change the pricelist, only newly added lines will be affected.
     *
     * @var Pricelist
     */
    private $pricelist_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Analytic Account
     * The analytic account related to a sales order.
     *
     * @var null|Account
     */
    private $analytic_account_id;

    /**
     * Order Lines
     *
     * @var null|Line[]
     */
    private $order_line;

    /**
     * Invoice Count
     *
     * @var null|int
     */
    private $invoice_count;

    /**
     * Invoices
     *
     * @var null|Move[]
     */
    private $invoice_ids;

    /**
     * Invoice Status
     *
     * @var null|array
     */
    private $invoice_status;

    /**
     * Terms and conditions
     *
     * @var null|string
     */
    private $note;

    /**
     * Untaxed Amount
     *
     * @var null|float
     */
    private $amount_untaxed;

    /**
     * Tax amount by group
     * type: [(name, amount, base, formated amount, formated base)]
     *
     * @var null|int
     */
    private $amount_by_group;

    /**
     * Taxes
     *
     * @var null|float
     */
    private $amount_tax;

    /**
     * Total
     *
     * @var null|float
     */
    private $amount_total;

    /**
     * Currency Rate
     * The rate of the currency to the currency of rate 1 applicable at the date of the order
     *
     * @var null|float
     */
    private $currency_rate;

    /**
     * Payment Terms
     *
     * @var null|Term
     */
    private $payment_term_id;

    /**
     * Fiscal Position
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices.The
     * default value comes from the customer.
     *
     * @var null|Position
     */
    private $fiscal_position_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Sales Team
     *
     * @var null|Team
     */
    private $team_id;

    /**
     * Signature
     * Signature received through the portal.
     *
     * @var null|int
     */
    private $signature;

    /**
     * Signed By
     * Name of the person that signed the SO.
     *
     * @var null|string
     */
    private $signed_by;

    /**
     * Signed On
     * Date of the signature.
     *
     * @var null|DateTimeInterface
     */
    private $signed_on;

    /**
     * Delivery Date
     * This is the delivery date promised to the customer. If set, the delivery order will be scheduled based on this
     * date rather than product lead times.
     *
     * @var null|DateTimeInterface
     */
    private $commitment_date;

    /**
     * Expected Date
     * Delivery date you can promise to the customer, computed from the minimum lead time of the order lines.
     *
     * @var null|DateTimeInterface
     */
    private $expected_date;

    /**
     * Amount Before Discount
     *
     * @var null|float
     */
    private $amount_undiscounted;

    /**
     * Type Name
     *
     * @var null|string
     */
    private $type_name;

    /**
     * Transactions
     *
     * @var null|Transaction[]
     */
    private $transaction_ids;

    /**
     * Authorized Transactions
     *
     * @var null|Transaction[]
     */
    private $authorized_transaction_ids;

    /**
     * Quotation Template
     *
     * @var null|Template
     */
    private $sale_order_template_id;

    /**
     * Optional Products Lines
     *
     * @var null|Option[]
     */
    private $sale_order_option_ids;

    /**
     * Campaign
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     *
     * @var null|Campaign
     */
    private $campaign_id;

    /**
     * Source
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     *
     * @var null|Source
     */
    private $source_id;

    /**
     * Medium
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     *
     * @var null|Medium
     */
    private $medium_id;

    /**
     * Activities
     *
     * @var null|Activity[]
     */
    private $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     *
     * @var null|array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var null|Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var null|Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var null|DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var null|string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     *
     * @var null|array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     *
     * @var null|string
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var null|bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var null|Followers[]
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var null|Partner[]
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|Channel[]
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var null|Message[]
     */
    private $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     *
     * @var null|int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     *
     * @var null|int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     *
     * @var null|int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var null|int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var null|Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     *
     * @var null|Message[]
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_sms_error;

    /**
     * Portal Access URL
     * Customer Portal URL
     *
     * @var null|string
     */
    private $access_url;

    /**
     * Security Token
     *
     * @var null|string
     */
    private $access_token;

    /**
     * Access warning
     *
     * @var null|string
     */
    private $access_warning;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

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
     * @param string $name Order Reference
     * @param DateTimeInterface $date_order Order Date
     *        Creation date of draft/sent orders,
     *        Confirmation date of confirmed orders.
     * @param Partner $partner_id Customer
     * @param Partner $partner_invoice_id Invoice Address
     * @param Partner $partner_shipping_id Delivery Address
     * @param Pricelist $pricelist_id Pricelist
     *        If you change the pricelist, only newly added lines will be affected.
     * @param Currency $currency_id Currency
     * @param Company $company_id Company
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_order,
        Partner $partner_id,
        Partner $partner_invoice_id,
        Partner $partner_shipping_id,
        Pricelist $pricelist_id,
        Currency $currency_id,
        Company $company_id
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
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return null|array
     */
    public function getActivityState(): ?array
    {
        return $this->activity_state;
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
     * @param null|Medium $medium_id
     */
    public function setMediumId(?Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param null|Source $source_id
     */
    public function setSourceId(?Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @return null|Option[]
     */
    public function getSaleOrderOptionIds(): ?array
    {
        return $this->sale_order_option_ids;
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
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|string
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }

    /**
     * @param null|string $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return null|string
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
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
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
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
     * @param null|Campaign $campaign_id
     */
    public function setCampaignId(?Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return null|Template
     */
    public function getSaleOrderTemplateId(): ?Template
    {
        return $this->sale_order_template_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param null|Line[] $order_line
     */
    public function setOrderLine(?array $order_line): void
    {
        $this->order_line = $order_line;
    }

    /**
     * @return null|Account
     */
    public function getAnalyticAccountId(): ?Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Pricelist
     */
    public function getPricelistId(): Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerShippingId(): Partner
    {
        return $this->partner_shipping_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerInvoiceId(): Partner
    {
        return $this->partner_invoice_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return null|int
     */
    public function getRemainingValidityDays(): ?int
    {
        return $this->remaining_validity_days;
    }

    /**
     * @param Line $item
     */
    public function addOrderLine(Line $item): void
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
     * @return null|bool
     */
    public function isRequirePayment(): ?bool
    {
        return $this->require_payment;
    }

    /**
     * @return null|bool
     */
    public function isRequireSignature(): ?bool
    {
        return $this->require_signature;
    }

    /**
     * @return null|bool
     */
    public function isIsExpired(): ?bool
    {
        return $this->is_expired;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getValidityDate(): ?DateTimeInterface
    {
        return $this->validity_date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateOrder(): DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|string $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param null|string $client_order_ref
     */
    public function setClientOrderRef(?string $client_order_ref): void
    {
        $this->client_order_ref = $client_order_ref;
    }

    /**
     * @param null|string $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOrderLine(Line $item, bool $strict = true): bool
    {
        if (null === $this->order_line) {
            return false;
        }

        return in_array($item, $this->order_line, $strict);
    }

    /**
     * @param Line $item
     */
    public function removeOrderLine(Line $item): void
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
     * @return null|Transaction[]
     */
    public function getAuthorizedTransactionIds(): ?array
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|Transaction[]
     */
    public function getTransactionIds(): ?array
    {
        return $this->transaction_ids;
    }

    /**
     * @return null|string
     */
    public function getTypeName(): ?string
    {
        return $this->type_name;
    }

    /**
     * @return null|float
     */
    public function getAmountUndiscounted(): ?float
    {
        return $this->amount_undiscounted;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getExpectedDate(): ?DateTimeInterface
    {
        return $this->expected_date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCommitmentDate(): ?DateTimeInterface
    {
        return $this->commitment_date;
    }

    /**
     * @param null|DateTimeInterface $signed_on
     */
    public function setSignedOn(?DateTimeInterface $signed_on): void
    {
        $this->signed_on = $signed_on;
    }

    /**
     * @param null|string $signed_by
     */
    public function setSignedBy(?string $signed_by): void
    {
        $this->signed_by = $signed_by;
    }

    /**
     * @param null|int $signature
     */
    public function setSignature(?int $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @param null|Team $team_id
     */
    public function setTeamId(?Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @param null|Position $fiscal_position_id
     */
    public function setFiscalPositionId(?Position $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return null|int
     */
    public function getInvoiceCount(): ?int
    {
        return $this->invoice_count;
    }

    /**
     * @param null|Term $payment_term_id
     */
    public function setPaymentTermId(?Term $payment_term_id): void
    {
        $this->payment_term_id = $payment_term_id;
    }

    /**
     * @return null|float
     */
    public function getCurrencyRate(): ?float
    {
        return $this->currency_rate;
    }

    /**
     * @return null|float
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @return null|float
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
    }

    /**
     * @return null|int
     */
    public function getAmountByGroup(): ?int
    {
        return $this->amount_by_group;
    }

    /**
     * @return null|float
     */
    public function getAmountUntaxed(): ?float
    {
        return $this->amount_untaxed;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return null|array
     */
    public function getInvoiceStatus(): ?array
    {
        return $this->invoice_status;
    }

    /**
     * @return null|Move[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
