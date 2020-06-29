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
 * Info :
 * Update partner to add a field about notification preferences. Add a generic opt-out field that can be used
 * to restrict usage of automatic email templates.
 */
class Partner extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    protected $name;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    protected $date;

    /**
     * Title
     *
     * @var null|Title
     */
    protected $title;

    /**
     * Related Company
     *
     * @var null|PartnerAlias
     */
    protected $parent_id;

    /**
     * Parent name
     *
     * @var null|string
     */
    protected $parent_name;

    /**
     * Contact
     *
     * @var null|PartnerAlias[]
     */
    protected $child_ids;

    /**
     * Reference
     *
     * @var null|string
     */
    protected $ref;

    /**
     * Language
     * All the emails and documents sent to this contact will be translated in this language.
     *
     * @var null|array
     */
    protected $lang;

    /**
     * Active Lang Count
     *
     * @var null|int
     */
    protected $active_lang_count;

    /**
     * Timezone
     * When printing documents and exporting/importing data, time values are computed according to this timezone.
     * If the timezone is not set, UTC (Coordinated Universal Time) is used.
     * Anywhere else, time values are computed according to the time offset of your web client.
     *
     * @var null|array
     */
    protected $tz;

    /**
     * Timezone offset
     *
     * @var null|string
     */
    protected $tz_offset;

    /**
     * Tax ID
     * The Tax Identification Number. Complete it if the contact is subjected to government taxes. Used in some legal
     * statements.
     *
     * @var null|string
     */
    protected $vat;

    /**
     * Partner with same Tax ID
     *
     * @var null|PartnerAlias
     */
    protected $same_vat_partner_id;

    /**
     * Banks
     *
     * @var null|Bank[]
     */
    protected $bank_ids;

    /**
     * Website Link
     *
     * @var null|string
     */
    protected $website;

    /**
     * Notes
     *
     * @var null|string
     */
    protected $comment;

    /**
     * Tags
     *
     * @var null|Category[]
     */
    protected $category_id;

    /**
     * Credit Limit
     *
     * @var null|float
     */
    protected $credit_limit;

    /**
     * Active
     *
     * @var null|bool
     */
    protected $active;

    /**
     * Employee
     * Check this box if this contact is an Employee.
     *
     * @var null|bool
     */
    protected $employee;

    /**
     * Job Position
     *
     * @var null|string
     */
    protected $function;

    /**
     * Address Type
     * Invoice & Delivery addresses are used in sales orders. Private addresses are only visible by authorized users.
     *
     * @var null|array
     */
    protected $type;

    /**
     * Street
     *
     * @var null|string
     */
    protected $street;

    /**
     * Street2
     *
     * @var null|string
     */
    protected $street2;

    /**
     * Zip
     *
     * @var null|string
     */
    protected $zip;

    /**
     * City
     *
     * @var null|string
     */
    protected $city;

    /**
     * State
     *
     * @var null|State
     */
    protected $state_id;

    /**
     * Country
     *
     * @var null|Country
     */
    protected $country_id;

    /**
     * Geo Latitude
     *
     * @var null|float
     */
    protected $partner_latitude;

    /**
     * Geo Longitude
     *
     * @var null|float
     */
    protected $partner_longitude;

    /**
     * Email
     *
     * @var null|string
     */
    protected $email;

    /**
     * Formatted Email
     * Format email address "Name <email@domain>"
     *
     * @var null|string
     */
    protected $email_formatted;

    /**
     * Phone
     *
     * @var null|string
     */
    protected $phone;

    /**
     * Mobile
     *
     * @var null|string
     */
    protected $mobile;

    /**
     * Is a Company
     * Check if the contact is a company, otherwise it is a person
     *
     * @var null|bool
     */
    protected $is_company;

    /**
     * Industry
     *
     * @var null|Industry
     */
    protected $industry_id;

    /**
     * Company Type
     *
     * @var null|array
     */
    protected $company_type;

    /**
     * Company
     *
     * @var null|Company
     */
    protected $company_id;

    /**
     * Color Index
     *
     * @var null|int
     */
    protected $color;

    /**
     * Users
     *
     * @var null|Users[]
     */
    protected $user_ids;

    /**
     * Share Partner
     * Either customer (not a user), either shared user. Indicated the current partner is a customer without access
     * or with a limited access created for sharing data.
     *
     * @var null|bool
     */
    protected $partner_share;

    /**
     * Complete Address
     *
     * @var null|string
     */
    protected $contact_address;

    /**
     * Commercial Entity
     *
     * @var null|PartnerAlias
     */
    protected $commercial_partner_id;

    /**
     * Company Name Entity
     *
     * @var null|string
     */
    protected $commercial_company_name;

    /**
     * Company Name
     *
     * @var null|string
     */
    protected $company_name;

    /**
     * Self
     *
     * @var null|PartnerAlias
     */
    protected $self;

    /**
     * IM Status
     *
     * @var null|string
     */
    protected $im_status;

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
     * @var null|PartnerAlias[]
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
     * Normalized Email
     * This field is used to search on email address as the primary email field can contain more than strictly an
     * email address.
     *
     * @var null|string
     */
    protected $email_normalized;

    /**
     * Blacklist
     * If the email address is on the blacklist, the contact won't receive mass mailing anymore, from any list
     *
     * @var null|bool
     */
    protected $is_blacklisted;

    /**
     * Bounce
     * Counter of the number of bounced emails for this contact
     *
     * @var null|int
     */
    protected $message_bounce;

    /**
     * Channels
     *
     * @var null|Channel[]
     */
    protected $channel_ids;

    /**
     * Salesperson
     * The internal user in charge of this contact.
     *
     * @var null|Users
     */
    protected $user_id;

    /**
     * Contact Address Complete
     *
     * @var null|string
     */
    protected $contact_address_complete;

    /**
     * Medium-sized image
     *
     * @var null|int
     */
    protected $image_medium;

    /**
     * Signup Token
     *
     * @var null|string
     */
    protected $signup_token;

    /**
     * Signup Token Type
     *
     * @var null|string
     */
    protected $signup_type;

    /**
     * Signup Expiration
     *
     * @var null|DateTimeInterface
     */
    protected $signup_expiration;

    /**
     * Signup Token is Valid
     *
     * @var null|bool
     */
    protected $signup_valid;

    /**
     * Signup URL
     *
     * @var null|string
     */
    protected $signup_url;

    /**
     * Company database ID
     *
     * @var null|int
     */
    protected $partner_gid;

    /**
     * Additional info
     *
     * @var null|string
     */
    protected $additional_info;

    /**
     * Sanitized Number
     * Field used to store sanitized phone number. Helps speeding up searches and comparisons.
     *
     * @var null|string
     */
    protected $phone_sanitized;

    /**
     * Phone Blacklisted
     * If the email address is on the blacklist, the contact won't receive mass mailing anymore, from any list
     *
     * @var null|bool
     */
    protected $phone_blacklisted;

    /**
     * Pricelist
     * This pricelist will be used, instead of the default one, for sales to the current partner
     *
     * @var null|Pricelist
     */
    protected $property_product_pricelist;

    /**
     * Sales Team
     * If set, this Sales Team will be used for sales and assignations related to this partner
     *
     * @var null|Team
     */
    protected $team_id;

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
     * Total Receivable
     * Total amount this customer owes you.
     *
     * @var null|float
     */
    protected $credit;

    /**
     * Total Payable
     * Total amount you have to pay to this vendor.
     *
     * @var null|float
     */
    protected $debit;

    /**
     * Payable Limit
     *
     * @var null|float
     */
    protected $debit_limit;

    /**
     * Total Invoiced
     *
     * @var null|float
     */
    protected $total_invoiced;

    /**
     * Currency
     * Utility field to express amount currency
     *
     * @var null|Currency
     */
    protected $currency_id;

    /**
     * Journal Items
     *
     * @var null|int
     */
    protected $journal_item_count;

    /**
     * Account Payable
     * This account will be used instead of the default one as the payable account for the current partner
     *
     * @var Account
     */
    protected $property_account_payable_id;

    /**
     * Account Receivable
     * This account will be used instead of the default one as the receivable account for the current partner
     *
     * @var Account
     */
    protected $property_account_receivable_id;

    /**
     * Fiscal Position
     * The fiscal position determines the taxes/accounts used for this contact.
     *
     * @var null|Position
     */
    protected $property_account_position_id;

    /**
     * Customer Payment Terms
     * This payment term will be used instead of the default one for sales orders and customer invoices
     *
     * @var null|Term
     */
    protected $property_payment_term_id;

    /**
     * Vendor Payment Terms
     * This payment term will be used instead of the default one for purchase orders and vendor bills
     *
     * @var null|Term
     */
    protected $property_supplier_payment_term_id;

    /**
     * Companies that refers to partner
     *
     * @var null|Company[]
     */
    protected $ref_company_ids;

    /**
     * Has Unreconciled Entries
     * The partner has at least one unreconciled debit and credit since last time the invoices & payments matching
     * was performed.
     *
     * @var null|bool
     */
    protected $has_unreconciled_entries;

    /**
     * Latest Invoices & Payments Matching Date
     * Last time the invoices & payments matching was performed for this partner. It is set either if there's not at
     * least an unreconciled debit and an unreconciled credit or if you click the "Done" button.
     *
     * @var null|DateTimeInterface
     */
    protected $last_time_entries_checked;

    /**
     * Invoices
     *
     * @var null|Move[]
     */
    protected $invoice_ids;

    /**
     * Partner Contracts
     *
     * @var null|AccountAlias[]
     */
    protected $contract_ids;

    /**
     * Bank
     *
     * @var null|int
     */
    protected $bank_account_count;

    /**
     * Degree of trust you have in this debtor
     *
     * @var null|array
     */
    protected $trust;

    /**
     * Invoice
     * Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     * exception with the message and block the flow. The Message has to be written in the next field.
     *
     * @var null|array
     */
    protected $invoice_warn;

    /**
     * Message for Invoice
     *
     * @var null|string
     */
    protected $invoice_warn_msg;

    /**
     * Supplier Rank
     *
     * @var null|int
     */
    protected $supplier_rank;

    /**
     * Customer Rank
     *
     * @var null|int
     */
    protected $customer_rank;

    /**
     * Online Partner Vendor Name
     * Technical field used to store information from plaid/yodlee to match partner (used when a purchase is made)
     *
     * @var null|string
     */
    protected $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     * Technical field used to store information from plaid/yodlee to match partner
     *
     * @var null|string
     */
    protected $online_partner_bank_account;

    /**
     * Payment Tokens
     *
     * @var null|Token[]
     */
    protected $payment_token_ids;

    /**
     * Count Payment Token
     *
     * @var null|int
     */
    protected $payment_token_count;

    /**
     * Sale Order Count
     *
     * @var null|int
     */
    protected $sale_order_count;

    /**
     * Sales Order
     *
     * @var null|Order[]
     */
    protected $sale_order_ids;

    /**
     * Sales Warnings
     * Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     * exception with the message and block the flow. The Message has to be written in the next field.
     *
     * @var null|array
     */
    protected $sale_warn;

    /**
     * Message for Sales Order
     *
     * @var null|string
     */
    protected $sale_warn_msg;

    /**
     * Next Action Date
     * The date before which no action should be taken.
     *
     * @var null|DateTimeInterface
     */
    protected $payment_next_action_date;

    /**
     * Unreconciled Aml
     *
     * @var null|Line[]
     */
    protected $unreconciled_aml_ids;

    /**
     * Unpaid Invoices
     *
     * @var null|Move[]
     */
    protected $unpaid_invoices;

    /**
     * Total Due
     *
     * @var null|float
     */
    protected $total_due;

    /**
     * Total Overdue
     *
     * @var null|float
     */
    protected $total_overdue;

    /**
     * Follow-up Status
     *
     * @var null|array
     */
    protected $followup_status;

    /**
     * Follow-up Level
     *
     * @var null|LineAlias
     */
    protected $followup_level;

    /**
     * Follow-up Responsible
     * Optionally you can assign a user to this field, which will make him responsible for the action.
     *
     * @var null|Users
     */
    protected $payment_responsible_id;

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
     * @param Account $property_account_payable_id Account Payable
     *        This account will be used instead of the default one as the payable account for the current partner
     * @param Account $property_account_receivable_id Account Receivable
     *        This account will be used instead of the default one as the receivable account for the current partner
     */
    public function __construct(
        Account $property_account_payable_id,
        Account $property_account_receivable_id
    ) {
        $this->property_account_payable_id = $property_account_payable_id;
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @param Account $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(Account $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
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
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return null|float
     */
    public function getCredit(): ?float
    {
        return $this->credit;
    }

    /**
     * @return null|float
     */
    public function getDebit(): ?float
    {
        return $this->debit;
    }

    /**
     * @param null|float $debit_limit
     */
    public function setDebitLimit(?float $debit_limit): void
    {
        $this->debit_limit = $debit_limit;
    }

    /**
     * @return null|float
     */
    public function getTotalInvoiced(): ?float
    {
        return $this->total_invoiced;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|int
     */
    public function getJournalItemCount(): ?int
    {
        return $this->journal_item_count;
    }

    /**
     * @param Account $property_account_payable_id
     */
    public function setPropertyAccountPayableId(Account $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @param null|Position $property_account_position_id
     */
    public function setPropertyAccountPositionId(?Position $property_account_position_id): void
    {
        $this->property_account_position_id = $property_account_position_id;
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
     * @param null|Term $property_payment_term_id
     */
    public function setPropertyPaymentTermId(?Term $property_payment_term_id): void
    {
        $this->property_payment_term_id = $property_payment_term_id;
    }

    /**
     * @param null|Term $property_supplier_payment_term_id
     */
    public function setPropertySupplierPaymentTermId(?Term $property_supplier_payment_term_id): void
    {
        $this->property_supplier_payment_term_id = $property_supplier_payment_term_id;
    }

    /**
     * @param null|Company[] $ref_company_ids
     */
    public function setRefCompanyIds(?array $ref_company_ids): void
    {
        $this->ref_company_ids = $ref_company_ids;
    }

    /**
     * @param Company $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRefCompanyIds(Company $item, bool $strict = true): bool
    {
        if (null === $this->ref_company_ids) {
            return false;
        }

        return in_array($item, $this->ref_company_ids, $strict);
    }

    /**
     * @param Company $item
     */
    public function addRefCompanyIds(Company $item): void
    {
        if ($this->hasRefCompanyIds($item)) {
            return;
        }

        if (null === $this->ref_company_ids) {
            $this->ref_company_ids = [];
        }

        $this->ref_company_ids[] = $item;
    }

    /**
     * @param Company $item
     */
    public function removeRefCompanyIds(Company $item): void
    {
        if (null === $this->ref_company_ids) {
            $this->ref_company_ids = [];
        }

        if ($this->hasRefCompanyIds($item)) {
            $index = array_search($item, $this->ref_company_ids);
            unset($this->ref_company_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isHasUnreconciledEntries(): ?bool
    {
        return $this->has_unreconciled_entries;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLastTimeEntriesChecked(): ?DateTimeInterface
    {
        return $this->last_time_entries_checked;
    }

    /**
     * @return null|Move[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
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
     * @return null|int
     */
    public function getBankAccountCount(): ?int
    {
        return $this->bank_account_count;
    }

    /**
     * @return null|string
     */
    public function getContactAddressComplete(): ?string
    {
        return $this->contact_address_complete;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return null|string
     */
    public function getEmailNormalized(): ?string
    {
        return $this->email_normalized;
    }

    /**
     * @return null|bool
     */
    public function isIsBlacklisted(): ?bool
    {
        return $this->is_blacklisted;
    }

    /**
     * @param null|int $message_bounce
     */
    public function setMessageBounce(?int $message_bounce): void
    {
        $this->message_bounce = $message_bounce;
    }

    /**
     * @param null|Channel[] $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param Channel $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelIds(Channel $item, bool $strict = true): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids, $strict);
    }

    /**
     * @param Channel $item
     */
    public function addChannelIds(Channel $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
    }

    /**
     * @param Channel $item
     */
    public function removeChannelIds(Channel $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
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
    public function getImageMedium(): ?int
    {
        return $this->image_medium;
    }

    /**
     * @param null|Team $team_id
     */
    public function setTeamId(?Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @param null|string $signup_token
     */
    public function setSignupToken(?string $signup_token): void
    {
        $this->signup_token = $signup_token;
    }

    /**
     * @param null|string $signup_type
     */
    public function setSignupType(?string $signup_type): void
    {
        $this->signup_type = $signup_type;
    }

    /**
     * @param null|DateTimeInterface $signup_expiration
     */
    public function setSignupExpiration(?DateTimeInterface $signup_expiration): void
    {
        $this->signup_expiration = $signup_expiration;
    }

    /**
     * @return null|bool
     */
    public function isSignupValid(): ?bool
    {
        return $this->signup_valid;
    }

    /**
     * @return null|string
     */
    public function getSignupUrl(): ?string
    {
        return $this->signup_url;
    }

    /**
     * @param null|int $partner_gid
     */
    public function setPartnerGid(?int $partner_gid): void
    {
        $this->partner_gid = $partner_gid;
    }

    /**
     * @param null|string $additional_info
     */
    public function setAdditionalInfo(?string $additional_info): void
    {
        $this->additional_info = $additional_info;
    }

    /**
     * @return null|string
     */
    public function getPhoneSanitized(): ?string
    {
        return $this->phone_sanitized;
    }

    /**
     * @return null|bool
     */
    public function isPhoneBlacklisted(): ?bool
    {
        return $this->phone_blacklisted;
    }

    /**
     * @param null|Pricelist $property_product_pricelist
     */
    public function setPropertyProductPricelist(?Pricelist $property_product_pricelist): void
    {
        $this->property_product_pricelist = $property_product_pricelist;
    }

    /**
     * @return null|AccountAlias[]
     */
    public function getContractIds(): ?array
    {
        return $this->contract_ids;
    }

    /**
     * @param null|array $trust
     */
    public function setTrust(?array $trust): void
    {
        $this->trust = $trust;
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|array
     */
    public function getFollowupStatus(): ?array
    {
        return $this->followup_status;
    }

    /**
     * @param null|string $sale_warn_msg
     */
    public function setSaleWarnMsg(?string $sale_warn_msg): void
    {
        $this->sale_warn_msg = $sale_warn_msg;
    }

    /**
     * @param null|DateTimeInterface $payment_next_action_date
     */
    public function setPaymentNextActionDate(?DateTimeInterface $payment_next_action_date): void
    {
        $this->payment_next_action_date = $payment_next_action_date;
    }

    /**
     * @param null|Line[] $unreconciled_aml_ids
     */
    public function setUnreconciledAmlIds(?array $unreconciled_aml_ids): void
    {
        $this->unreconciled_aml_ids = $unreconciled_aml_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUnreconciledAmlIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->unreconciled_aml_ids) {
            return false;
        }

        return in_array($item, $this->unreconciled_aml_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addUnreconciledAmlIds(Line $item): void
    {
        if ($this->hasUnreconciledAmlIds($item)) {
            return;
        }

        if (null === $this->unreconciled_aml_ids) {
            $this->unreconciled_aml_ids = [];
        }

        $this->unreconciled_aml_ids[] = $item;
    }

    /**
     * @param Line $item
     */
    public function removeUnreconciledAmlIds(Line $item): void
    {
        if (null === $this->unreconciled_aml_ids) {
            $this->unreconciled_aml_ids = [];
        }

        if ($this->hasUnreconciledAmlIds($item)) {
            $index = array_search($item, $this->unreconciled_aml_ids);
            unset($this->unreconciled_aml_ids[$index]);
        }
    }

    /**
     * @return null|Move[]
     */
    public function getUnpaidInvoices(): ?array
    {
        return $this->unpaid_invoices;
    }

    /**
     * @return null|float
     */
    public function getTotalDue(): ?float
    {
        return $this->total_due;
    }

    /**
     * @return null|float
     */
    public function getTotalOverdue(): ?float
    {
        return $this->total_overdue;
    }

    /**
     * @return null|LineAlias
     */
    public function getFollowupLevel(): ?LineAlias
    {
        return $this->followup_level;
    }

    /**
     * @param mixed $item
     */
    public function addSaleWarn($item): void
    {
        if ($this->hasSaleWarn($item)) {
            return;
        }

        if (null === $this->sale_warn) {
            $this->sale_warn = [];
        }

        $this->sale_warn[] = $item;
    }

    /**
     * @param null|Users $payment_responsible_id
     */
    public function setPaymentResponsibleId(?Users $payment_responsible_id): void
    {
        $this->payment_responsible_id = $payment_responsible_id;
    }

    /**
     * @param null|int $image_1920
     */
    public function setImage1920(?int $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return null|int
     */
    public function getImage1024(): ?int
    {
        return $this->image_1024;
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
    public function getImage256(): ?int
    {
        return $this->image_256;
    }

    /**
     * @return null|int
     */
    public function getImage128(): ?int
    {
        return $this->image_128;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param mixed $item
     */
    public function removeSaleWarn($item): void
    {
        if (null === $this->sale_warn) {
            $this->sale_warn = [];
        }

        if ($this->hasSaleWarn($item)) {
            $index = array_search($item, $this->sale_warn);
            unset($this->sale_warn[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleWarn($item, bool $strict = true): bool
    {
        if (null === $this->sale_warn) {
            return false;
        }

        return in_array($item, $this->sale_warn, $strict);
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTrust($item, bool $strict = true): bool
    {
        if (null === $this->trust) {
            return false;
        }

        return in_array($item, $this->trust, $strict);
    }

    /**
     * @return null|string
     */
    public function getOnlinePartnerVendorName(): ?string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param mixed $item
     */
    public function addTrust($item): void
    {
        if ($this->hasTrust($item)) {
            return;
        }

        if (null === $this->trust) {
            $this->trust = [];
        }

        $this->trust[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTrust($item): void
    {
        if (null === $this->trust) {
            $this->trust = [];
        }

        if ($this->hasTrust($item)) {
            $index = array_search($item, $this->trust);
            unset($this->trust[$index]);
        }
    }

    /**
     * @param null|array $invoice_warn
     */
    public function setInvoiceWarn(?array $invoice_warn): void
    {
        $this->invoice_warn = $invoice_warn;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceWarn($item, bool $strict = true): bool
    {
        if (null === $this->invoice_warn) {
            return false;
        }

        return in_array($item, $this->invoice_warn, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addInvoiceWarn($item): void
    {
        if ($this->hasInvoiceWarn($item)) {
            return;
        }

        if (null === $this->invoice_warn) {
            $this->invoice_warn = [];
        }

        $this->invoice_warn[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeInvoiceWarn($item): void
    {
        if (null === $this->invoice_warn) {
            $this->invoice_warn = [];
        }

        if ($this->hasInvoiceWarn($item)) {
            $index = array_search($item, $this->invoice_warn);
            unset($this->invoice_warn[$index]);
        }
    }

    /**
     * @param null|string $invoice_warn_msg
     */
    public function setInvoiceWarnMsg(?string $invoice_warn_msg): void
    {
        $this->invoice_warn_msg = $invoice_warn_msg;
    }

    /**
     * @param null|int $supplier_rank
     */
    public function setSupplierRank(?int $supplier_rank): void
    {
        $this->supplier_rank = $supplier_rank;
    }

    /**
     * @param null|int $customer_rank
     */
    public function setCustomerRank(?int $customer_rank): void
    {
        $this->customer_rank = $customer_rank;
    }

    /**
     * @return null|string
     */
    public function getOnlinePartnerBankAccount(): ?string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @param null|array $sale_warn
     */
    public function setSaleWarn(?array $sale_warn): void
    {
        $this->sale_warn = $sale_warn;
    }

    /**
     * @param null|Token[] $payment_token_ids
     */
    public function setPaymentTokenIds(?array $payment_token_ids): void
    {
        $this->payment_token_ids = $payment_token_ids;
    }

    /**
     * @param Token $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentTokenIds(Token $item, bool $strict = true): bool
    {
        if (null === $this->payment_token_ids) {
            return false;
        }

        return in_array($item, $this->payment_token_ids, $strict);
    }

    /**
     * @param Token $item
     */
    public function addPaymentTokenIds(Token $item): void
    {
        if ($this->hasPaymentTokenIds($item)) {
            return;
        }

        if (null === $this->payment_token_ids) {
            $this->payment_token_ids = [];
        }

        $this->payment_token_ids[] = $item;
    }

    /**
     * @param Token $item
     */
    public function removePaymentTokenIds(Token $item): void
    {
        if (null === $this->payment_token_ids) {
            $this->payment_token_ids = [];
        }

        if ($this->hasPaymentTokenIds($item)) {
            $index = array_search($item, $this->payment_token_ids);
            unset($this->payment_token_ids[$index]);
        }
    }

    /**
     * @return null|int
     */
    public function getPaymentTokenCount(): ?int
    {
        return $this->payment_token_count;
    }

    /**
     * @return null|int
     */
    public function getSaleOrderCount(): ?int
    {
        return $this->sale_order_count;
    }

    /**
     * @param null|Order[] $sale_order_ids
     */
    public function setSaleOrderIds(?array $sale_order_ids): void
    {
        $this->sale_order_ids = $sale_order_ids;
    }

    /**
     * @param Order $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOrderIds(Order $item, bool $strict = true): bool
    {
        if (null === $this->sale_order_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_ids, $strict);
    }

    /**
     * @param Order $item
     */
    public function addSaleOrderIds(Order $item): void
    {
        if ($this->hasSaleOrderIds($item)) {
            return;
        }

        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        $this->sale_order_ids[] = $item;
    }

    /**
     * @param Order $item
     */
    public function removeSaleOrderIds(Order $item): void
    {
        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        if ($this->hasSaleOrderIds($item)) {
            $index = array_search($item, $this->sale_order_ids);
            unset($this->sale_order_ids[$index]);
        }
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $function
     */
    public function setFunction(?string $function): void
    {
        $this->function = $function;
    }

    /**
     * @param null|string $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @param null|string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param null|Category[] $category_id
     */
    public function setCategoryId(?array $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param Category $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCategoryId(Category $item, bool $strict = true): bool
    {
        if (null === $this->category_id) {
            return false;
        }

        return in_array($item, $this->category_id, $strict);
    }

    /**
     * @param Category $item
     */
    public function addCategoryId(Category $item): void
    {
        if ($this->hasCategoryId($item)) {
            return;
        }

        if (null === $this->category_id) {
            $this->category_id = [];
        }

        $this->category_id[] = $item;
    }

    /**
     * @param Category $item
     */
    public function removeCategoryId(Category $item): void
    {
        if (null === $this->category_id) {
            $this->category_id = [];
        }

        if ($this->hasCategoryId($item)) {
            $index = array_search($item, $this->category_id);
            unset($this->category_id[$index]);
        }
    }

    /**
     * @param null|float $credit_limit
     */
    public function setCreditLimit(?float $credit_limit): void
    {
        $this->credit_limit = $credit_limit;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|bool $employee
     */
    public function setEmployee(?bool $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param Bank $item
     */
    public function addBankIds(Bank $item): void
    {
        if ($this->hasBankIds($item)) {
            return;
        }

        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        $this->bank_ids[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($item, $this->type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if (null === $this->type) {
            $this->type = [];
        }

        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param null|string $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param null|State $state_id
     */
    public function setStateId(?State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param Bank $item
     */
    public function removeBankIds(Bank $item): void
    {
        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        if ($this->hasBankIds($item)) {
            $index = array_search($item, $this->bank_ids);
            unset($this->bank_ids[$index]);
        }
    }

    /**
     * @param Bank $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBankIds(Bank $item, bool $strict = true): bool
    {
        if (null === $this->bank_ids) {
            return false;
        }

        return in_array($item, $this->bank_ids, $strict);
    }

    /**
     * @param null|float $partner_longitude
     */
    public function setPartnerLongitude(?float $partner_longitude): void
    {
        $this->partner_longitude = $partner_longitude;
    }

    /**
     * @param null|array $lang
     */
    public function setLang(?array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|Title $title
     */
    public function setTitle(?Title $title): void
    {
        $this->title = $title;
    }

    /**
     * @param null|PartnerAlias $parent_id
     */
    public function setParentId(?PartnerAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return null|string
     */
    public function getParentName(): ?string
    {
        return $this->parent_name;
    }

    /**
     * @param null|PartnerAlias[] $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param PartnerAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildIds(PartnerAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids, $strict);
    }

    /**
     * @param PartnerAlias $item
     */
    public function addChildIds(PartnerAlias $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param PartnerAlias $item
     */
    public function removeChildIds(PartnerAlias $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param null|string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang($item, bool $strict = true): bool
    {
        if (null === $this->lang) {
            return false;
        }

        return in_array($item, $this->lang, $strict);
    }

    /**
     * @param null|Bank[] $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param mixed $item
     */
    public function addLang($item): void
    {
        if ($this->hasLang($item)) {
            return;
        }

        if (null === $this->lang) {
            $this->lang = [];
        }

        $this->lang[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeLang($item): void
    {
        if (null === $this->lang) {
            $this->lang = [];
        }

        if ($this->hasLang($item)) {
            $index = array_search($item, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @return null|int
     */
    public function getActiveLangCount(): ?int
    {
        return $this->active_lang_count;
    }

    /**
     * @param null|array $tz
     */
    public function setTz(?array $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTz($item, bool $strict = true): bool
    {
        if (null === $this->tz) {
            return false;
        }

        return in_array($item, $this->tz, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTz($item): void
    {
        if ($this->hasTz($item)) {
            return;
        }

        if (null === $this->tz) {
            $this->tz = [];
        }

        $this->tz[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTz($item): void
    {
        if (null === $this->tz) {
            $this->tz = [];
        }

        if ($this->hasTz($item)) {
            $index = array_search($item, $this->tz);
            unset($this->tz[$index]);
        }
    }

    /**
     * @return null|string
     */
    public function getTzOffset(): ?string
    {
        return $this->tz_offset;
    }

    /**
     * @param null|string $vat
     */
    public function setVat(?string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return null|PartnerAlias
     */
    public function getSameVatPartnerId(): ?PartnerAlias
    {
        return $this->same_vat_partner_id;
    }

    /**
     * @param null|float $partner_latitude
     */
    public function setPartnerLatitude(?float $partner_latitude): void
    {
        $this->partner_latitude = $partner_latitude;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
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
     * @return null|array
     */
    public function getActivityState(): ?array
    {
        return $this->activity_state;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return null|array
     */
    public function getActivityExceptionDecoration(): ?array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return null|string
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
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
     * @return null|PartnerAlias[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
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
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
     * @return null|string
     */
    public function getEmailFormatted(): ?string
    {
        return $this->email_formatted;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param null|string $mobile
     */
    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @param null|bool $is_company
     */
    public function setIsCompany(?bool $is_company): void
    {
        $this->is_company = $is_company;
    }

    /**
     * @param null|Industry $industry_id
     */
    public function setIndustryId(?Industry $industry_id): void
    {
        $this->industry_id = $industry_id;
    }

    /**
     * @param null|array $company_type
     */
    public function setCompanyType(?array $company_type): void
    {
        $this->company_type = $company_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompanyType($item, bool $strict = true): bool
    {
        if (null === $this->company_type) {
            return false;
        }

        return in_array($item, $this->company_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addCompanyType($item): void
    {
        if ($this->hasCompanyType($item)) {
            return;
        }

        if (null === $this->company_type) {
            $this->company_type = [];
        }

        $this->company_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeCompanyType($item): void
    {
        if (null === $this->company_type) {
            $this->company_type = [];
        }

        if ($this->hasCompanyType($item)) {
            $index = array_search($item, $this->company_type);
            unset($this->company_type[$index]);
        }
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Users[] $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param null|Activity[] $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUserIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids, $strict);
    }

    /**
     * @param Users $item
     */
    public function addUserIds(Users $item): void
    {
        if ($this->hasUserIds($item)) {
            return;
        }

        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        $this->user_ids[] = $item;
    }

    /**
     * @param Users $item
     */
    public function removeUserIds(Users $item): void
    {
        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        if ($this->hasUserIds($item)) {
            $index = array_search($item, $this->user_ids);
            unset($this->user_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isPartnerShare(): ?bool
    {
        return $this->partner_share;
    }

    /**
     * @return null|string
     */
    public function getContactAddress(): ?string
    {
        return $this->contact_address;
    }

    /**
     * @return null|PartnerAlias
     */
    public function getCommercialPartnerId(): ?PartnerAlias
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return null|string
     */
    public function getCommercialCompanyName(): ?string
    {
        return $this->commercial_company_name;
    }

    /**
     * @param null|string $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return null|PartnerAlias
     */
    public function getSelf(): ?PartnerAlias
    {
        return $this->self;
    }

    /**
     * @return null|string
     */
    public function getImStatus(): ?string
    {
        return $this->im_status;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
