<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term;
use Flux\OdooApiClient\Model\Object\AccountFollowup\Followup\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Payment\Token;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Partner as PartnerAlias;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Partner\Category;
use Flux\OdooApiClient\Model\Object\Res\Partner\Industry;
use Flux\OdooApiClient\Model\Object\Res\Partner\Title;
use Flux\OdooApiClient\Model\Object\Sale\Order;

/**
 * Odoo model : res.partner
 * Name : res.partner
 *
 * Update partner to add a field about notification preferences. Add a generic opt-out field that can be used
 * to restrict usage of automatic email templates.
 */
class Partner extends Base
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    protected $date;

    /**
     * Title
     *
     * @var Title
     */
    protected $title;

    /**
     * Related Company
     *
     * @var PartnerAlias
     */
    protected $parent_id;

    /**
     * Parent name
     *
     * @var string
     */
    protected $parent_name;

    /**
     * Contact
     *
     * @var PartnerAlias
     */
    protected $child_ids;

    /**
     * Reference
     *
     * @var string
     */
    protected $ref;

    /**
     * Language
     *
     * @var array
     */
    protected $lang;

    /**
     * Active Lang Count
     *
     * @var int
     */
    protected $active_lang_count;

    /**
     * Timezone
     *
     * @var array
     */
    protected $tz;

    /**
     * Timezone offset
     *
     * @var string
     */
    protected $tz_offset;

    /**
     * Tax ID
     *
     * @var string
     */
    protected $vat;

    /**
     * Partner with same Tax ID
     *
     * @var PartnerAlias
     */
    protected $same_vat_partner_id;

    /**
     * Banks
     *
     * @var Bank
     */
    protected $bank_ids;

    /**
     * Website Link
     *
     * @var string
     */
    protected $website;

    /**
     * Notes
     *
     * @var string
     */
    protected $comment;

    /**
     * Tags
     *
     * @var Category
     */
    protected $category_id;

    /**
     * Credit Limit
     *
     * @var float
     */
    protected $credit_limit;

    /**
     * Active
     *
     * @var bool
     */
    protected $active;

    /**
     * Employee
     *
     * @var bool
     */
    protected $employee;

    /**
     * Job Position
     *
     * @var string
     */
    protected $function;

    /**
     * Address Type
     *
     * @var array
     */
    protected $type;

    /**
     * Street
     *
     * @var string
     */
    protected $street;

    /**
     * Street2
     *
     * @var string
     */
    protected $street2;

    /**
     * Zip
     *
     * @var string
     */
    protected $zip;

    /**
     * City
     *
     * @var string
     */
    protected $city;

    /**
     * State
     *
     * @var State
     */
    protected $state_id;

    /**
     * Country
     *
     * @var Country
     */
    protected $country_id;

    /**
     * Geo Latitude
     *
     * @var float
     */
    protected $partner_latitude;

    /**
     * Geo Longitude
     *
     * @var float
     */
    protected $partner_longitude;

    /**
     * Email
     *
     * @var string
     */
    protected $email;

    /**
     * Formatted Email
     *
     * @var string
     */
    protected $email_formatted;

    /**
     * Phone
     *
     * @var string
     */
    protected $phone;

    /**
     * Mobile
     *
     * @var string
     */
    protected $mobile;

    /**
     * Is a Company
     *
     * @var bool
     */
    protected $is_company;

    /**
     * Industry
     *
     * @var Industry
     */
    protected $industry_id;

    /**
     * Company Type
     *
     * @var array
     */
    protected $company_type;

    /**
     * Company
     *
     * @var Company
     */
    protected $company_id;

    /**
     * Color Index
     *
     * @var int
     */
    protected $color;

    /**
     * Users
     *
     * @var Users
     */
    protected $user_ids;

    /**
     * Share Partner
     *
     * @var bool
     */
    protected $partner_share;

    /**
     * Complete Address
     *
     * @var string
     */
    protected $contact_address;

    /**
     * Commercial Entity
     *
     * @var PartnerAlias
     */
    protected $commercial_partner_id;

    /**
     * Company Name Entity
     *
     * @var string
     */
    protected $commercial_company_name;

    /**
     * Company Name
     *
     * @var string
     */
    protected $company_name;

    /**
     * Self
     *
     * @var PartnerAlias
     */
    protected $self;

    /**
     * IM Status
     *
     * @var string
     */
    protected $im_status;

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
     * @var PartnerAlias
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
     * Normalized Email
     *
     * @var string
     */
    protected $email_normalized;

    /**
     * Blacklist
     *
     * @var bool
     */
    protected $is_blacklisted;

    /**
     * Bounce
     *
     * @var int
     */
    protected $message_bounce;

    /**
     * Channels
     *
     * @var Channel
     */
    protected $channel_ids;

    /**
     * Salesperson
     *
     * @var Users
     */
    protected $user_id;

    /**
     * Contact Address Complete
     *
     * @var string
     */
    protected $contact_address_complete;

    /**
     * Medium-sized image
     *
     * @var int
     */
    protected $image_medium;

    /**
     * Signup Token
     *
     * @var string
     */
    protected $signup_token;

    /**
     * Signup Token Type
     *
     * @var string
     */
    protected $signup_type;

    /**
     * Signup Expiration
     *
     * @var DateTimeInterface
     */
    protected $signup_expiration;

    /**
     * Signup Token is Valid
     *
     * @var bool
     */
    protected $signup_valid;

    /**
     * Signup URL
     *
     * @var string
     */
    protected $signup_url;

    /**
     * Company database ID
     *
     * @var int
     */
    protected $partner_gid;

    /**
     * Additional info
     *
     * @var string
     */
    protected $additional_info;

    /**
     * Sanitized Number
     *
     * @var string
     */
    protected $phone_sanitized;

    /**
     * Phone Blacklisted
     *
     * @var bool
     */
    protected $phone_blacklisted;

    /**
     * Pricelist
     *
     * @var Pricelist
     */
    protected $property_product_pricelist;

    /**
     * Sales Team
     *
     * @var Team
     */
    protected $team_id;

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
     * Total Receivable
     *
     * @var float
     */
    protected $credit;

    /**
     * Total Payable
     *
     * @var float
     */
    protected $debit;

    /**
     * Payable Limit
     *
     * @var float
     */
    protected $debit_limit;

    /**
     * Total Invoiced
     *
     * @var float
     */
    protected $total_invoiced;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency_id;

    /**
     * Journal Items
     *
     * @var int
     */
    protected $journal_item_count;

    /**
     * Account Payable
     *
     * @var null|Account
     */
    protected $property_account_payable_id;

    /**
     * Account Receivable
     *
     * @var null|Account
     */
    protected $property_account_receivable_id;

    /**
     * Fiscal Position
     *
     * @var Position
     */
    protected $property_account_position_id;

    /**
     * Customer Payment Terms
     *
     * @var Term
     */
    protected $property_payment_term_id;

    /**
     * Vendor Payment Terms
     *
     * @var Term
     */
    protected $property_supplier_payment_term_id;

    /**
     * Companies that refers to partner
     *
     * @var Company
     */
    protected $ref_company_ids;

    /**
     * Has Unreconciled Entries
     *
     * @var bool
     */
    protected $has_unreconciled_entries;

    /**
     * Latest Invoices & Payments Matching Date
     *
     * @var DateTimeInterface
     */
    protected $last_time_entries_checked;

    /**
     * Invoices
     *
     * @var Move
     */
    protected $invoice_ids;

    /**
     * Partner Contracts
     *
     * @var AccountAlias
     */
    protected $contract_ids;

    /**
     * Bank
     *
     * @var int
     */
    protected $bank_account_count;

    /**
     * Degree of trust you have in this debtor
     *
     * @var array
     */
    protected $trust;

    /**
     * Invoice
     *
     * @var array
     */
    protected $invoice_warn;

    /**
     * Message for Invoice
     *
     * @var string
     */
    protected $invoice_warn_msg;

    /**
     * Supplier Rank
     *
     * @var int
     */
    protected $supplier_rank;

    /**
     * Customer Rank
     *
     * @var int
     */
    protected $customer_rank;

    /**
     * Online Partner Vendor Name
     *
     * @var string
     */
    protected $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     *
     * @var string
     */
    protected $online_partner_bank_account;

    /**
     * Payment Tokens
     *
     * @var Token
     */
    protected $payment_token_ids;

    /**
     * Count Payment Token
     *
     * @var int
     */
    protected $payment_token_count;

    /**
     * Sale Order Count
     *
     * @var int
     */
    protected $sale_order_count;

    /**
     * Sales Order
     *
     * @var Order
     */
    protected $sale_order_ids;

    /**
     * Sales Warnings
     *
     * @var array
     */
    protected $sale_warn;

    /**
     * Message for Sales Order
     *
     * @var string
     */
    protected $sale_warn_msg;

    /**
     * Next Action Date
     *
     * @var DateTimeInterface
     */
    protected $payment_next_action_date;

    /**
     * Unreconciled Aml
     *
     * @var Line
     */
    protected $unreconciled_aml_ids;

    /**
     * Unpaid Invoices
     *
     * @var Move
     */
    protected $unpaid_invoices;

    /**
     * Total Due
     *
     * @var float
     */
    protected $total_due;

    /**
     * Total Overdue
     *
     * @var float
     */
    protected $total_overdue;

    /**
     * Follow-up Status
     *
     * @var array
     */
    protected $followup_status;

    /**
     * Follow-up Level
     *
     * @var LineAlias
     */
    protected $followup_level;

    /**
     * Follow-up Responsible
     *
     * @var Users
     */
    protected $payment_responsible_id;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Account $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(Account $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @return float
     */
    public function getDebit(): float
    {
        return $this->debit;
    }

    /**
     * @param float $debit_limit
     */
    public function setDebitLimit(float $debit_limit): void
    {
        $this->debit_limit = $debit_limit;
    }

    /**
     * @return float
     */
    public function getTotalInvoiced(): float
    {
        return $this->total_invoiced;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return int
     */
    public function getJournalItemCount(): int
    {
        return $this->journal_item_count;
    }

    /**
     * @param null|Account $property_account_payable_id
     */
    public function setPropertyAccountPayableId(Account $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @param Position $property_account_position_id
     */
    public function setPropertyAccountPositionId(Position $property_account_position_id): void
    {
        $this->property_account_position_id = $property_account_position_id;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Term $property_payment_term_id
     */
    public function setPropertyPaymentTermId(Term $property_payment_term_id): void
    {
        $this->property_payment_term_id = $property_payment_term_id;
    }

    /**
     * @param Term $property_supplier_payment_term_id
     */
    public function setPropertySupplierPaymentTermId(Term $property_supplier_payment_term_id): void
    {
        $this->property_supplier_payment_term_id = $property_supplier_payment_term_id;
    }

    /**
     * @param Company $ref_company_ids
     */
    public function setRefCompanyIds(Company $ref_company_ids): void
    {
        $this->ref_company_ids = $ref_company_ids;
    }

    /**
     * @return bool
     */
    public function isHasUnreconciledEntries(): bool
    {
        return $this->has_unreconciled_entries;
    }

    /**
     * @return DateTimeInterface
     */
    public function getLastTimeEntriesChecked(): DateTimeInterface
    {
        return $this->last_time_entries_checked;
    }

    /**
     * @return Move
     */
    public function getInvoiceIds(): Move
    {
        return $this->invoice_ids;
    }

    /**
     * @return AccountAlias
     */
    public function getContractIds(): AccountAlias
    {
        return $this->contract_ids;
    }

    /**
     * @return float
     */
    public function getCredit(): float
    {
        return $this->credit;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param array $trust
     */
    public function setTrust(array $trust): void
    {
        $this->trust = $trust;
    }

    /**
     * @param string $signup_type
     */
    public function setSignupType(string $signup_type): void
    {
        $this->signup_type = $signup_type;
    }

    /**
     * @return bool
     */
    public function isIsBlacklisted(): bool
    {
        return $this->is_blacklisted;
    }

    /**
     * @param int $message_bounce
     */
    public function setMessageBounce(int $message_bounce): void
    {
        $this->message_bounce = $message_bounce;
    }

    /**
     * @param Channel $channel_ids
     */
    public function setChannelIds(Channel $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getContactAddressComplete(): string
    {
        return $this->contact_address_complete;
    }

    /**
     * @return int
     */
    public function getImageMedium(): int
    {
        return $this->image_medium;
    }

    /**
     * @param string $signup_token
     */
    public function setSignupToken(string $signup_token): void
    {
        $this->signup_token = $signup_token;
    }

    /**
     * @param DateTimeInterface $signup_expiration
     */
    public function setSignupExpiration(DateTimeInterface $signup_expiration): void
    {
        $this->signup_expiration = $signup_expiration;
    }

    /**
     * @param Team $team_id
     */
    public function setTeamId(Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return bool
     */
    public function isSignupValid(): bool
    {
        return $this->signup_valid;
    }

    /**
     * @return string
     */
    public function getSignupUrl(): string
    {
        return $this->signup_url;
    }

    /**
     * @param int $partner_gid
     */
    public function setPartnerGid(int $partner_gid): void
    {
        $this->partner_gid = $partner_gid;
    }

    /**
     * @param string $additional_info
     */
    public function setAdditionalInfo(string $additional_info): void
    {
        $this->additional_info = $additional_info;
    }

    /**
     * @return string
     */
    public function getPhoneSanitized(): string
    {
        return $this->phone_sanitized;
    }

    /**
     * @return bool
     */
    public function isPhoneBlacklisted(): bool
    {
        return $this->phone_blacklisted;
    }

    /**
     * @param Pricelist $property_product_pricelist
     */
    public function setPropertyProductPricelist(Pricelist $property_product_pricelist): void
    {
        $this->property_product_pricelist = $property_product_pricelist;
    }

    /**
     * @return int
     */
    public function getBankAccountCount(): int
    {
        return $this->bank_account_count;
    }

    /**
     * @param array $trust
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrust(array $trust, bool $strict = true): bool
    {
        return in_array($trust, $this->trust, $strict);
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param Users $payment_responsible_id
     */
    public function setPaymentResponsibleId(Users $payment_responsible_id): void
    {
        $this->payment_responsible_id = $payment_responsible_id;
    }

    /**
     * @param Line $unreconciled_aml_ids
     */
    public function setUnreconciledAmlIds(Line $unreconciled_aml_ids): void
    {
        $this->unreconciled_aml_ids = $unreconciled_aml_ids;
    }

    /**
     * @return Move
     */
    public function getUnpaidInvoices(): Move
    {
        return $this->unpaid_invoices;
    }

    /**
     * @return float
     */
    public function getTotalDue(): float
    {
        return $this->total_due;
    }

    /**
     * @return float
     */
    public function getTotalOverdue(): float
    {
        return $this->total_overdue;
    }

    /**
     * @return array
     */
    public function getFollowupStatus(): array
    {
        return $this->followup_status;
    }

    /**
     * @return LineAlias
     */
    public function getFollowupLevel(): LineAlias
    {
        return $this->followup_level;
    }

    /**
     * @param int $image_1920
     */
    public function setImage1920(int $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @param string $sale_warn_msg
     */
    public function setSaleWarnMsg(string $sale_warn_msg): void
    {
        $this->sale_warn_msg = $sale_warn_msg;
    }

    /**
     * @return int
     */
    public function getImage1024(): int
    {
        return $this->image_1024;
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
    public function getImage256(): int
    {
        return $this->image_256;
    }

    /**
     * @return int
     */
    public function getImage128(): int
    {
        return $this->image_128;
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
     * @param DateTimeInterface $payment_next_action_date
     */
    public function setPaymentNextActionDate(DateTimeInterface $payment_next_action_date): void
    {
        $this->payment_next_action_date = $payment_next_action_date;
    }

    /**
     * @param array $sale_warn
     */
    public function removeSaleWarn(array $sale_warn): void
    {
        if ($this->hasSaleWarn($sale_warn)) {
            $index = array_search($sale_warn, $this->sale_warn);
            unset($this->sale_warn[$index]);
        }
    }

    /**
     * @param array $trust
     */
    public function addTrust(array $trust): void
    {
        if ($this->hasTrust($trust)) {
            return;
        }

        $this->trust[] = $trust;
    }

    /**
     * @param int $customer_rank
     */
    public function setCustomerRank(int $customer_rank): void
    {
        $this->customer_rank = $customer_rank;
    }

    /**
     * @param array $trust
     */
    public function removeTrust(array $trust): void
    {
        if ($this->hasTrust($trust)) {
            $index = array_search($trust, $this->trust);
            unset($this->trust[$index]);
        }
    }

    /**
     * @param array $invoice_warn
     */
    public function setInvoiceWarn(array $invoice_warn): void
    {
        $this->invoice_warn = $invoice_warn;
    }

    /**
     * @param array $invoice_warn
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceWarn(array $invoice_warn, bool $strict = true): bool
    {
        return in_array($invoice_warn, $this->invoice_warn, $strict);
    }

    /**
     * @param array $invoice_warn
     */
    public function addInvoiceWarn(array $invoice_warn): void
    {
        if ($this->hasInvoiceWarn($invoice_warn)) {
            return;
        }

        $this->invoice_warn[] = $invoice_warn;
    }

    /**
     * @param array $invoice_warn
     */
    public function removeInvoiceWarn(array $invoice_warn): void
    {
        if ($this->hasInvoiceWarn($invoice_warn)) {
            $index = array_search($invoice_warn, $this->invoice_warn);
            unset($this->invoice_warn[$index]);
        }
    }

    /**
     * @param string $invoice_warn_msg
     */
    public function setInvoiceWarnMsg(string $invoice_warn_msg): void
    {
        $this->invoice_warn_msg = $invoice_warn_msg;
    }

    /**
     * @param int $supplier_rank
     */
    public function setSupplierRank(int $supplier_rank): void
    {
        $this->supplier_rank = $supplier_rank;
    }

    /**
     * @return string
     */
    public function getOnlinePartnerVendorName(): string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param array $sale_warn
     */
    public function addSaleWarn(array $sale_warn): void
    {
        if ($this->hasSaleWarn($sale_warn)) {
            return;
        }

        $this->sale_warn[] = $sale_warn;
    }

    /**
     * @return string
     */
    public function getOnlinePartnerBankAccount(): string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @param Token $payment_token_ids
     */
    public function setPaymentTokenIds(Token $payment_token_ids): void
    {
        $this->payment_token_ids = $payment_token_ids;
    }

    /**
     * @return int
     */
    public function getPaymentTokenCount(): int
    {
        return $this->payment_token_count;
    }

    /**
     * @return int
     */
    public function getSaleOrderCount(): int
    {
        return $this->sale_order_count;
    }

    /**
     * @param Order $sale_order_ids
     */
    public function setSaleOrderIds(Order $sale_order_ids): void
    {
        $this->sale_order_ids = $sale_order_ids;
    }

    /**
     * @param array $sale_warn
     */
    public function setSaleWarn(array $sale_warn): void
    {
        $this->sale_warn = $sale_warn;
    }

    /**
     * @param array $sale_warn
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleWarn(array $sale_warn, bool $strict = true): bool
    {
        return in_array($sale_warn, $this->sale_warn, $strict);
    }

    /**
     * @return string
     */
    public function getEmailNormalized(): string
    {
        return $this->email_normalized;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(array $type, bool $strict = true): bool
    {
        return in_array($type, $this->type, $strict);
    }

    /**
     * @param Category $category_id
     */
    public function setCategoryId(Category $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param float $credit_limit
     */
    public function setCreditLimit(float $credit_limit): void
    {
        $this->credit_limit = $credit_limit;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param bool $employee
     */
    public function setEmployee(bool $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @param string $function
     */
    public function setFunction(string $function): void
    {
        $this->function = $function;
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param array $type
     */
    public function addType(array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        $this->type[] = $type;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @param array $type
     */
    public function removeType(array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param string $street2
     */
    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param State $state_id
     */
    public function setStateId(State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param Bank $bank_ids
     */
    public function setBankIds(Bank $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param float $partner_longitude
     */
    public function setPartnerLongitude(float $partner_longitude): void
    {
        $this->partner_longitude = $partner_longitude;
    }

    /**
     * @param array $lang
     */
    public function addLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            return;
        }

        $this->lang[] = $lang;
    }

    /**
     * @param Title $title
     */
    public function setTitle(Title $title): void
    {
        $this->title = $title;
    }

    /**
     * @param PartnerAlias $parent_id
     */
    public function setParentId(PartnerAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return string
     */
    public function getParentName(): string
    {
        return $this->parent_name;
    }

    /**
     * @param PartnerAlias $child_ids
     */
    public function setChildIds(PartnerAlias $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param array $lang
     */
    public function setLang(array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param array $lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang(array $lang, bool $strict = true): bool
    {
        return in_array($lang, $this->lang, $strict);
    }

    /**
     * @param array $lang
     */
    public function removeLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            $index = array_search($lang, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @return PartnerAlias
     */
    public function getSameVatPartnerId(): PartnerAlias
    {
        return $this->same_vat_partner_id;
    }

    /**
     * @return int
     */
    public function getActiveLangCount(): int
    {
        return $this->active_lang_count;
    }

    /**
     * @param array $tz
     */
    public function setTz(array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param array $tz
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz(array $tz, bool $strict = true): bool
    {
        return in_array($tz, $this->tz, $strict);
    }

    /**
     * @param array $tz
     */
    public function addTz(array $tz): void
    {
        if ($this->hasTz($tz)) {
            return;
        }

        $this->tz[] = $tz;
    }

    /**
     * @param array $tz
     */
    public function removeTz(array $tz): void
    {
        if ($this->hasTz($tz)) {
            $index = array_search($tz, $this->tz);
            unset($this->tz[$index]);
        }
    }

    /**
     * @return string
     */
    public function getTzOffset(): string
    {
        return $this->tz_offset;
    }

    /**
     * @param string $vat
     */
    public function setVat(string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @param float $partner_latitude
     */
    public function setPartnerLatitude(float $partner_latitude): void
    {
        $this->partner_latitude = $partner_latitude;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param string $activity_summary
     */
    public function setActivitySummary(string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return array
     */
    public function getActivityExceptionDecoration(): array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return string
     */
    public function getActivityExceptionIcon(): string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return PartnerAlias
     */
    public function getMessagePartnerIds(): PartnerAlias
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
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
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
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
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
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @return string
     */
    public function getImStatus(): string
    {
        return $this->im_status;
    }

    /**
     * @return string
     */
    public function getEmailFormatted(): string
    {
        return $this->email_formatted;
    }

    /**
     * @param array $company_type
     */
    public function removeCompanyType(array $company_type): void
    {
        if ($this->hasCompanyType($company_type)) {
            $index = array_search($company_type, $this->company_type);
            unset($this->company_type[$index]);
        }
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @param bool $is_company
     */
    public function setIsCompany(bool $is_company): void
    {
        $this->is_company = $is_company;
    }

    /**
     * @param Industry $industry_id
     */
    public function setIndustryId(Industry $industry_id): void
    {
        $this->industry_id = $industry_id;
    }

    /**
     * @param array $company_type
     */
    public function setCompanyType(array $company_type): void
    {
        $this->company_type = $company_type;
    }

    /**
     * @param array $company_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompanyType(array $company_type, bool $strict = true): bool
    {
        return in_array($company_type, $this->company_type, $strict);
    }

    /**
     * @param array $company_type
     */
    public function addCompanyType(array $company_type): void
    {
        if ($this->hasCompanyType($company_type)) {
            return;
        }

        $this->company_type[] = $company_type;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return PartnerAlias
     */
    public function getSelf(): PartnerAlias
    {
        return $this->self;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param Users $user_ids
     */
    public function setUserIds(Users $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @return bool
     */
    public function isPartnerShare(): bool
    {
        return $this->partner_share;
    }

    /**
     * @return string
     */
    public function getContactAddress(): string
    {
        return $this->contact_address;
    }

    /**
     * @return PartnerAlias
     */
    public function getCommercialPartnerId(): PartnerAlias
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return string
     */
    public function getCommercialCompanyName(): string
    {
        return $this->commercial_company_name;
    }

    /**
     * @param string $company_name
     */
    public function setCompanyName(string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
