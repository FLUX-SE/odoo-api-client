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
final class Order extends Base
{
    /**
     * Order Reference
     *
     * @var null|string
     */
    private $name;

    /**
     * Source Document
     *
     * @var string
     */
    private $origin;

    /**
     * Customer Reference
     *
     * @var string
     */
    private $client_order_ref;

    /**
     * Payment Ref.
     *
     * @var string
     */
    private $reference;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Order Date
     *
     * @var null|DateTimeInterface
     */
    private $date_order;

    /**
     * Expiration
     *
     * @var DateTimeInterface
     */
    private $validity_date;

    /**
     * Is expired
     *
     * @var bool
     */
    private $is_expired;

    /**
     * Online Signature
     *
     * @var bool
     */
    private $require_signature;

    /**
     * Online Payment
     *
     * @var bool
     */
    private $require_payment;

    /**
     * Remaining Days Before Expiration
     *
     * @var int
     */
    private $remaining_validity_days;

    /**
     * Creation Date
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $user_id;

    /**
     * Customer
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Invoice Address
     *
     * @var null|Partner
     */
    private $partner_invoice_id;

    /**
     * Delivery Address
     *
     * @var null|Partner
     */
    private $partner_shipping_id;

    /**
     * Pricelist
     *
     * @var null|Pricelist
     */
    private $pricelist_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Analytic Account
     *
     * @var Account
     */
    private $analytic_account_id;

    /**
     * Order Lines
     *
     * @var Line
     */
    private $order_line;

    /**
     * Invoice Count
     *
     * @var int
     */
    private $invoice_count;

    /**
     * Invoices
     *
     * @var Move
     */
    private $invoice_ids;

    /**
     * Invoice Status
     *
     * @var array
     */
    private $invoice_status;

    /**
     * Terms and conditions
     *
     * @var string
     */
    private $note;

    /**
     * Untaxed Amount
     *
     * @var float
     */
    private $amount_untaxed;

    /**
     * Tax amount by group
     *
     * @var int
     */
    private $amount_by_group;

    /**
     * Taxes
     *
     * @var float
     */
    private $amount_tax;

    /**
     * Total
     *
     * @var float
     */
    private $amount_total;

    /**
     * Currency Rate
     *
     * @var float
     */
    private $currency_rate;

    /**
     * Payment Terms
     *
     * @var Term
     */
    private $payment_term_id;

    /**
     * Fiscal Position
     *
     * @var Position
     */
    private $fiscal_position_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Sales Team
     *
     * @var Team
     */
    private $team_id;

    /**
     * Signature
     *
     * @var int
     */
    private $signature;

    /**
     * Signed By
     *
     * @var string
     */
    private $signed_by;

    /**
     * Signed On
     *
     * @var DateTimeInterface
     */
    private $signed_on;

    /**
     * Delivery Date
     *
     * @var DateTimeInterface
     */
    private $commitment_date;

    /**
     * Expected Date
     *
     * @var DateTimeInterface
     */
    private $expected_date;

    /**
     * Amount Before Discount
     *
     * @var float
     */
    private $amount_undiscounted;

    /**
     * Type Name
     *
     * @var string
     */
    private $type_name;

    /**
     * Transactions
     *
     * @var Transaction
     */
    private $transaction_ids;

    /**
     * Authorized Transactions
     *
     * @var Transaction
     */
    private $authorized_transaction_ids;

    /**
     * Quotation Template
     *
     * @var Template
     */
    private $sale_order_template_id;

    /**
     * Optional Products Lines
     *
     * @var Option
     */
    private $sale_order_option_ids;

    /**
     * Campaign
     *
     * @var Campaign
     */
    private $campaign_id;

    /**
     * Source
     *
     * @var Source
     */
    private $source_id;

    /**
     * Medium
     *
     * @var Medium
     */
    private $medium_id;

    /**
     * Activities
     *
     * @var Activity
     */
    private $activity_ids;

    /**
     * Activity State
     *
     * @var array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     *
     * @var array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     *
     * @var string
     */
    private $activity_exception_icon;

    /**
     * Is Follower
     *
     * @var bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var Followers
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var Partner
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var Channel
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var Message
     */
    private $message_ids;

    /**
     * Unread Messages
     *
     * @var bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     *
     * @var int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     *
     * @var bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     *
     * @var int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     *
     * @var bool
     */
    private $message_has_error;

    /**
     * Number of errors
     *
     * @var int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     *
     * @var Message
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     *
     * @var bool
     */
    private $message_has_sms_error;

    /**
     * Portal Access URL
     *
     * @var string
     */
    private $access_url;

    /**
     * Security Token
     *
     * @var string
     */
    private $access_token;

    /**
     * Access warning
     *
     * @var string
     */
    private $access_warning;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param Medium $medium_id
     */
    public function setMediumId(Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param Source $source_id
     */
    public function setSourceId(Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @param Campaign $campaign_id
     */
    public function setCampaignId(Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return Option
     */
    public function getSaleOrderOptionIds(): Option
    {
        return $this->sale_order_option_ids;
    }

    /**
     * @return Template
     */
    public function getSaleOrderTemplateId(): Template
    {
        return $this->sale_order_template_id;
    }

    /**
     * @return Transaction
     */
    public function getAuthorizedTransactionIds(): Transaction
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getAccessWarning(): string
    {
        return $this->access_warning;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getAccessUrl(): string
    {
        return $this->access_url;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
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
     * @return Transaction
     */
    public function getTransactionIds(): Transaction
    {
        return $this->transaction_ids;
    }

    /**
     * @return float
     */
    public function getAmountUndiscounted(): float
    {
        return $this->amount_undiscounted;
    }

    /**
     * @param string $origin
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return int
     */
    public function getRemainingValidityDays(): int
    {
        return $this->remaining_validity_days;
    }

    /**
     * @return null|Pricelist
     */
    public function getPricelistId(): Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerShippingId(): Partner
    {
        return $this->partner_shipping_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerInvoiceId(): Partner
    {
        return $this->partner_invoice_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return bool
     */
    public function isRequirePayment(): bool
    {
        return $this->require_payment;
    }

    /**
     * @return Account
     */
    public function getAnalyticAccountId(): Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return bool
     */
    public function isRequireSignature(): bool
    {
        return $this->require_signature;
    }

    /**
     * @return bool
     */
    public function isIsExpired(): bool
    {
        return $this->is_expired;
    }

    /**
     * @return DateTimeInterface
     */
    public function getValidityDate(): DateTimeInterface
    {
        return $this->validity_date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param string $client_order_ref
     */
    public function setClientOrderRef(string $client_order_ref): void
    {
        $this->client_order_ref = $client_order_ref;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param Line $order_line
     */
    public function setOrderLine(Line $order_line): void
    {
        $this->order_line = $order_line;
    }

    /**
     * @return DateTimeInterface
     */
    public function getExpectedDate(): DateTimeInterface
    {
        return $this->expected_date;
    }

    /**
     * @param Term $payment_term_id
     */
    public function setPaymentTermId(Term $payment_term_id): void
    {
        $this->payment_term_id = $payment_term_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCommitmentDate(): DateTimeInterface
    {
        return $this->commitment_date;
    }

    /**
     * @param DateTimeInterface $signed_on
     */
    public function setSignedOn(DateTimeInterface $signed_on): void
    {
        $this->signed_on = $signed_on;
    }

    /**
     * @param string $signed_by
     */
    public function setSignedBy(string $signed_by): void
    {
        $this->signed_by = $signed_by;
    }

    /**
     * @param int $signature
     */
    public function setSignature(int $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @param Team $team_id
     */
    public function setTeamId(Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Position $fiscal_position_id
     */
    public function setFiscalPositionId(Position $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return float
     */
    public function getCurrencyRate(): float
    {
        return $this->currency_rate;
    }

    /**
     * @return int
     */
    public function getInvoiceCount(): int
    {
        return $this->invoice_count;
    }

    /**
     * @return float
     */
    public function getAmountTotal(): float
    {
        return $this->amount_total;
    }

    /**
     * @return float
     */
    public function getAmountTax(): float
    {
        return $this->amount_tax;
    }

    /**
     * @return int
     */
    public function getAmountByGroup(): int
    {
        return $this->amount_by_group;
    }

    /**
     * @return float
     */
    public function getAmountUntaxed(): float
    {
        return $this->amount_untaxed;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return array
     */
    public function getInvoiceStatus(): array
    {
        return $this->invoice_status;
    }

    /**
     * @return Move
     */
    public function getInvoiceIds(): Move
    {
        return $this->invoice_ids;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
