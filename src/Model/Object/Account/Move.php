<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Cash\Rounding;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Account\InvoiceExtract\Words;
use Flux\OdooApiClient\Model\Object\Account\Move as MoveAlias;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Account\Partial\Reconcile;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term;
use Flux\OdooApiClient\Model\Object\Account\Transfer\Model;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Payment\Transaction;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Utm\Campaign;
use Flux\OdooApiClient\Model\Object\Utm\Medium;
use Flux\OdooApiClient\Model\Object\Utm\Source;

/**
 * Odoo model : account.move
 * Name : account.move
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
final class Move extends Base
{
    /**
     * Number
     *
     * @var string
     */
    private $name;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reference
     *
     * @var null|string
     */
    private $ref;

    /**
     * Terms and Conditions
     *
     * @var null|string
     */
    private $narration;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Type
     *
     * @var array
     */
    private $type;

    /**
     * Type Name
     *
     * @var null|string
     */
    private $type_name;

    /**
     * To Check
     * If this checkbox is ticked, it means that the user was not sure of all the related informations at the time of
     * the creation of the move and that the move needs to be checked again.
     *
     * @var null|bool
     */
    private $to_check;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Company Currency
     *
     * @var null|Currency
     */
    private $company_currency_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Journal Items
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Commercial Entity
     *
     * @var null|Partner
     */
    private $commercial_partner_id;

    /**
     * Untaxed Amount
     *
     * @var null|float
     */
    private $amount_untaxed;

    /**
     * Tax
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
     * Amount Due
     *
     * @var null|float
     */
    private $amount_residual;

    /**
     * Untaxed Amount Signed
     *
     * @var null|float
     */
    private $amount_untaxed_signed;

    /**
     * Tax Signed
     *
     * @var null|float
     */
    private $amount_tax_signed;

    /**
     * Total Signed
     *
     * @var null|float
     */
    private $amount_total_signed;

    /**
     * Amount Due Signed
     *
     * @var null|float
     */
    private $amount_residual_signed;

    /**
     * Tax amount by group
     *
     * @var null|int
     */
    private $amount_by_group;

    /**
     * Tax Cash Basis Entry of
     * Technical field used to keep track of the tax cash basis reconciliation. This is needed when cancelling the
     * source: it will post the inverse journal entry to cancel that part too.
     *
     * @var null|Reconcile
     */
    private $tax_cash_basis_rec_id;

    /**
     * Post Automatically
     * If this checkbox is ticked, this entry will be automatically posted at its date.
     *
     * @var null|bool
     */
    private $auto_post;

    /**
     * Reversal of
     *
     * @var null|MoveAlias
     */
    private $reversed_entry_id;

    /**
     * Fiscal Position
     * Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices. The
     * default value comes from the customer.
     *
     * @var null|Position
     */
    private $fiscal_position_id;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $invoice_user_id;

    /**
     * User
     * Technical field used to fit the generic behavior in mail templates.
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Payment
     *
     * @var null|array
     */
    private $invoice_payment_state;

    /**
     * Invoice/Bill Date
     *
     * @var null|DateTimeInterface
     */
    private $invoice_date;

    /**
     * Due Date
     *
     * @var null|DateTimeInterface
     */
    private $invoice_date_due;

    /**
     * Payment Reference
     * The payment reference to set on journal items.
     *
     * @var null|string
     */
    private $invoice_payment_ref;

    /**
     * Invoice Sent
     * It indicates that the invoice has been sent.
     *
     * @var null|bool
     */
    private $invoice_sent;

    /**
     * Origin
     * The document(s) that generated the invoice.
     *
     * @var null|string
     */
    private $invoice_origin;

    /**
     * Payment Terms
     *
     * @var null|Term
     */
    private $invoice_payment_term_id;

    /**
     * Invoice lines
     *
     * @var null|Line[]
     */
    private $invoice_line_ids;

    /**
     * Bank Account
     * Bank Account Number to which the invoice will be paid. A Company bank account if this is a Customer Invoice or
     * Vendor Credit Note, otherwise a Partner bank account number.
     *
     * @var null|Bank
     */
    private $invoice_partner_bank_id;

    /**
     * Incoterm
     * International Commercial Terms are a series of predefined commercial terms used in international transactions.
     *
     * @var null|Incoterms
     */
    private $invoice_incoterm_id;

    /**
     * Invoice Outstanding Credits Debits Widget
     *
     * @var null|string
     */
    private $invoice_outstanding_credits_debits_widget;

    /**
     * Invoice Payments Widget
     *
     * @var null|string
     */
    private $invoice_payments_widget;

    /**
     * Invoice Has Outstanding
     *
     * @var null|bool
     */
    private $invoice_has_outstanding;

    /**
     * Vendor Bill
     * Auto-complete from a past bill.
     *
     * @var null|MoveAlias
     */
    private $invoice_vendor_bill_id;

    /**
     * Source Email
     *
     * @var null|string
     */
    private $invoice_source_email;

    /**
     * Invoice Partner Display Name
     *
     * @var null|string
     */
    private $invoice_partner_display_name;

    /**
     * Invoice Partner Icon
     *
     * @var null|string
     */
    private $invoice_partner_icon;

    /**
     * Cash Rounding Method
     * Defines the smallest coinage of the currency that can be used to pay by cash.
     *
     * @var null|Rounding
     */
    private $invoice_cash_rounding_id;

    /**
     * Next Number
     *
     * @var null|string
     */
    private $invoice_sequence_number_next;

    /**
     * Next Number Prefix
     *
     * @var null|string
     */
    private $invoice_sequence_number_next_prefix;

    /**
     * Invoice Filter Type Domain
     * Technical field used to have a dynamic domain on journal / taxes in the form view.
     *
     * @var null|string
     */
    private $invoice_filter_type_domain;

    /**
     * Bank Partner
     * Technical field to get the domain on the bank
     *
     * @var null|Partner
     */
    private $bank_partner_id;

    /**
     * Invoice Has Matching Suspense Amount
     * Technical field used to display an alert on invoices if there is at least a matching amount in any supsense
     * account.
     *
     * @var null|bool
     */
    private $invoice_has_matching_suspense_amount;

    /**
     * Tax Lock Date Message
     * Technical field used to display a message when the invoice's accounting date is prior of the tax lock date.
     *
     * @var null|string
     */
    private $tax_lock_date_message;

    /**
     * Has Reconciled Entries
     *
     * @var null|bool
     */
    private $has_reconciled_entries;

    /**
     * Lock Posted Entries with Hash
     * If ticked, the accounting entry or invoice receives a hash as soon as it is posted and cannot be modified
     * anymore.
     *
     * @var null|bool
     */
    private $restrict_mode_hash_table;

    /**
     * Inalteralbility No Gap Sequence #
     *
     * @var null|int
     */
    private $secure_sequence_number;

    /**
     * Inalterability Hash
     *
     * @var null|string
     */
    private $inalterable_hash;

    /**
     * String To Hash
     *
     * @var null|string
     */
    private $string_to_hash;

    /**
     * Attachments
     *
     * @var null|Attachment[]
     */
    private $attachment_ids;

    /**
     * Duplicated vendor reference
     *
     * @var null|string
     */
    private $duplicated_vendor_ref;

    /**
     * Extract state
     *
     * @var array
     */
    private $extract_state;

    /**
     * Status code
     *
     * @var null|int
     */
    private $extract_status_code;

    /**
     * Error message
     *
     * @var null|string
     */
    private $extract_error_message;

    /**
     * Id of the request to IAP-OCR
     * Invoice extract id
     *
     * @var null|int
     */
    private $extract_remote_id;

    /**
     * Extract Word
     *
     * @var null|Words[]
     */
    private $extract_word_ids;

    /**
     * Can show the ocr resend button
     *
     * @var null|bool
     */
    private $extract_can_show_resend_button;

    /**
     * Can show the ocr send button
     *
     * @var null|bool
     */
    private $extract_can_show_send_button;

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
     * Originating Model
     *
     * @var null|Model
     */
    private $transfer_model_id;

    /**
     * Is Tax Closing
     * technical field used to know if this move is the vat closing move
     *
     * @var null|bool
     */
    private $is_tax_closing;

    /**
     * Tax Report Control Error
     * technical field used to know if there was a failed control check
     *
     * @var null|bool
     */
    private $tax_report_control_error;

    /**
     * Sales Team
     *
     * @var null|Team
     */
    private $team_id;

    /**
     * Delivery Address
     * Delivery address for current invoice.
     *
     * @var null|Partner
     */
    private $partner_shipping_id;

    /**
     * Asset
     *
     * @var null|Asset
     */
    private $asset_id;

    /**
     * Asset Type
     *
     * @var null|array
     */
    private $asset_asset_type;

    /**
     * Depreciable Value
     *
     * @var null|float
     */
    private $asset_remaining_value;

    /**
     * Cumulative Depreciation
     *
     * @var null|float
     */
    private $asset_depreciated_value;

    /**
     * Asset Manually Modified
     * This is a technical field stating that a depreciation line has been manually modified. It is used to recompute
     * the depreciation table of an asset/deferred revenue.
     *
     * @var null|bool
     */
    private $asset_manually_modified;

    /**
     * Asset Value Change
     * This is a technical field set to true when this move is the result of the changing of value of an asset
     *
     * @var null|bool
     */
    private $asset_value_change;

    /**
     * Assets
     *
     * @var null|Asset[]
     */
    private $asset_ids;

    /**
     * Asset Ids Display Name
     *
     * @var null|string
     */
    private $asset_ids_display_name;

    /**
     * Asset Id Display Name
     *
     * @var null|string
     */
    private $asset_id_display_name;

    /**
     * Number Asset
     *
     * @var null|int
     */
    private $number_asset_ids;

    /**
     * Draft Asset
     *
     * @var null|bool
     */
    private $draft_asset_ids;

    /**
     * Reversal Move
     *
     * @var null|MoveAlias[]
     */
    private $reversal_move_id;

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
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

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
     * @param string $name Number
     * @param DateTimeInterface $date Date
     * @param array $state Status
     * @param array $type Type
     * @param Journal $journal_id Journal
     * @param Currency $currency_id Currency
     * @param array $extract_state Extract state
     */
    public function __construct(
        string $name,
        DateTimeInterface $date,
        array $state,
        array $type,
        Journal $journal_id,
        Currency $currency_id,
        array $extract_state
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->state = $state;
        $this->type = $type;
        $this->journal_id = $journal_id;
        $this->currency_id = $currency_id;
        $this->extract_state = $extract_state;
    }

    /**
     * @param MoveAlias $item
     */
    public function removeReversalMoveId(MoveAlias $item): void
    {
        if (null === $this->reversal_move_id) {
            $this->reversal_move_id = [];
        }

        if ($this->hasReversalMoveId($item)) {
            $index = array_search($item, $this->reversal_move_id);
            unset($this->reversal_move_id[$index]);
        }
    }

    /**
     * @return null|string
     */
    public function getAssetIdDisplayName(): ?string
    {
        return $this->asset_id_display_name;
    }

    /**
     * @return null|int
     */
    public function getNumberAssetIds(): ?int
    {
        return $this->number_asset_ids;
    }

    /**
     * @return null|bool
     */
    public function isDraftAssetIds(): ?bool
    {
        return $this->draft_asset_ids;
    }

    /**
     * @param null|MoveAlias[] $reversal_move_id
     */
    public function setReversalMoveId(?array $reversal_move_id): void
    {
        $this->reversal_move_id = $reversal_move_id;
    }

    /**
     * @param MoveAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasReversalMoveId(MoveAlias $item, bool $strict = true): bool
    {
        if (null === $this->reversal_move_id) {
            return false;
        }

        return in_array($item, $this->reversal_move_id, $strict);
    }

    /**
     * @param MoveAlias $item
     */
    public function addReversalMoveId(MoveAlias $item): void
    {
        if ($this->hasReversalMoveId($item)) {
            return;
        }

        if (null === $this->reversal_move_id) {
            $this->reversal_move_id = [];
        }

        $this->reversal_move_id[] = $item;
    }

    /**
     * @param null|Campaign $campaign_id
     */
    public function setCampaignId(?Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return null|Asset[]
     */
    public function getAssetIds(): ?array
    {
        return $this->asset_ids;
    }

    /**
     * @param null|Source $source_id
     */
    public function setSourceId(?Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @param null|Medium $medium_id
     */
    public function setMediumId(?Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param null|Activity[] $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
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
     * @return null|string
     */
    public function getAssetIdsDisplayName(): ?string
    {
        return $this->asset_ids_display_name;
    }

    /**
     * @param null|bool $asset_value_change
     */
    public function setAssetValueChange(?bool $asset_value_change): void
    {
        $this->asset_value_change = $asset_value_change;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param null|bool $is_tax_closing
     */
    public function setIsTaxClosing(?bool $is_tax_closing): void
    {
        $this->is_tax_closing = $is_tax_closing;
    }

    /**
     * @param Words $item
     */
    public function removeExtractWordIds(Words $item): void
    {
        if (null === $this->extract_word_ids) {
            $this->extract_word_ids = [];
        }

        if ($this->hasExtractWordIds($item)) {
            $index = array_search($item, $this->extract_word_ids);
            unset($this->extract_word_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isExtractCanShowResendButton(): ?bool
    {
        return $this->extract_can_show_resend_button;
    }

    /**
     * @return null|bool
     */
    public function isExtractCanShowSendButton(): ?bool
    {
        return $this->extract_can_show_send_button;
    }

    /**
     * @return null|Transaction[]
     */
    public function getTransactionIds(): ?array
    {
        return $this->transaction_ids;
    }

    /**
     * @return null|Transaction[]
     */
    public function getAuthorizedTransactionIds(): ?array
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @param null|Model $transfer_model_id
     */
    public function setTransferModelId(?Model $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @param null|bool $tax_report_control_error
     */
    public function setTaxReportControlError(?bool $tax_report_control_error): void
    {
        $this->tax_report_control_error = $tax_report_control_error;
    }

    /**
     * @param null|bool $asset_manually_modified
     */
    public function setAssetManuallyModified(?bool $asset_manually_modified): void
    {
        $this->asset_manually_modified = $asset_manually_modified;
    }

    /**
     * @param null|Team $team_id
     */
    public function setTeamId(?Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerShippingId(): ?Partner
    {
        return $this->partner_shipping_id;
    }

    /**
     * @param null|Asset $asset_id
     */
    public function setAssetId(?Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return null|array
     */
    public function getAssetAssetType(): ?array
    {
        return $this->asset_asset_type;
    }

    /**
     * @param null|float $asset_remaining_value
     */
    public function setAssetRemainingValue(?float $asset_remaining_value): void
    {
        $this->asset_remaining_value = $asset_remaining_value;
    }

    /**
     * @param null|float $asset_depreciated_value
     */
    public function setAssetDepreciatedValue(?float $asset_depreciated_value): void
    {
        $this->asset_depreciated_value = $asset_depreciated_value;
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
     * @param Words $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractWordIds(Words $item, bool $strict = true): bool
    {
        if (null === $this->extract_word_ids) {
            return false;
        }

        return in_array($item, $this->extract_word_ids, $strict);
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
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|string
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
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
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
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
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
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
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return null|Partner[]
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
     * @param Words $item
     */
    public function addExtractWordIds(Words $item): void
    {
        if ($this->hasExtractWordIds($item)) {
            return;
        }

        if (null === $this->extract_word_ids) {
            $this->extract_word_ids = [];
        }

        $this->extract_word_ids[] = $item;
    }

    /**
     * @param null|Words[] $extract_word_ids
     */
    public function setExtractWordIds(?array $extract_word_ids): void
    {
        $this->extract_word_ids = $extract_word_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param null|bool $auto_post
     */
    public function setAutoPost(?bool $auto_post): void
    {
        $this->auto_post = $auto_post;
    }

    /**
     * @return null|float
     */
    public function getAmountUntaxedSigned(): ?float
    {
        return $this->amount_untaxed_signed;
    }

    /**
     * @return null|float
     */
    public function getAmountTaxSigned(): ?float
    {
        return $this->amount_tax_signed;
    }

    /**
     * @return null|float
     */
    public function getAmountTotalSigned(): ?float
    {
        return $this->amount_total_signed;
    }

    /**
     * @return null|float
     */
    public function getAmountResidualSigned(): ?float
    {
        return $this->amount_residual_signed;
    }

    /**
     * @return null|int
     */
    public function getAmountByGroup(): ?int
    {
        return $this->amount_by_group;
    }

    /**
     * @param null|Reconcile $tax_cash_basis_rec_id
     */
    public function setTaxCashBasisRecId(?Reconcile $tax_cash_basis_rec_id): void
    {
        $this->tax_cash_basis_rec_id = $tax_cash_basis_rec_id;
    }

    /**
     * @return null|MoveAlias
     */
    public function getReversedEntryId(): ?MoveAlias
    {
        return $this->reversed_entry_id;
    }

    /**
     * @return null|float
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @return null|Position
     */
    public function getFiscalPositionId(): ?Position
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param null|Users $invoice_user_id
     */
    public function setInvoiceUserId(?Users $invoice_user_id): void
    {
        $this->invoice_user_id = $invoice_user_id;
    }

    /**
     * @return null|Users
     */
    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    /**
     * @return null|array
     */
    public function getInvoicePaymentState(): ?array
    {
        return $this->invoice_payment_state;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getInvoiceDateDue(): ?DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @return null|float
     */
    public function getAmountResidual(): ?float
    {
        return $this->amount_residual;
    }

    /**
     * @return null|float
     */
    public function getAmountTax(): ?float
    {
        return $this->amount_tax;
    }

    /**
     * @return null|bool
     */
    public function isInvoiceSent(): ?bool
    {
        return $this->invoice_sent;
    }

    /**
     * @param null|bool $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param null|string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param null|string $narration
     */
    public function setNarration(?string $narration): void
    {
        $this->narration = $narration;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return null|string
     */
    public function getTypeName(): ?string
    {
        return $this->type_name;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @return null|float
     */
    public function getAmountUntaxed(): ?float
    {
        return $this->amount_untaxed;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Currency
     */
    public function getCompanyCurrencyId(): ?Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|Line[]
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @return null|Partner
     */
    public function getCommercialPartnerId(): ?Partner
    {
        return $this->commercial_partner_id;
    }

    /**
     * @param null|string $invoice_payment_ref
     */
    public function setInvoicePaymentRef(?string $invoice_payment_ref): void
    {
        $this->invoice_payment_ref = $invoice_payment_ref;
    }

    /**
     * @return null|string
     */
    public function getInvoiceOrigin(): ?string
    {
        return $this->invoice_origin;
    }

    /**
     * @return null|int
     */
    public function getExtractRemoteId(): ?int
    {
        return $this->extract_remote_id;
    }

    /**
     * @param Attachment $item
     */
    public function removeAttachmentIds(Attachment $item): void
    {
        if (null === $this->attachment_ids) {
            $this->attachment_ids = [];
        }

        if ($this->hasAttachmentIds($item)) {
            $index = array_search($item, $this->attachment_ids);
            unset($this->attachment_ids[$index]);
        }
    }

    /**
     * @return null|int
     */
    public function getSecureSequenceNumber(): ?int
    {
        return $this->secure_sequence_number;
    }

    /**
     * @return null|string
     */
    public function getInalterableHash(): ?string
    {
        return $this->inalterable_hash;
    }

    /**
     * @return null|string
     */
    public function getStringToHash(): ?string
    {
        return $this->string_to_hash;
    }

    /**
     * @param null|Attachment[] $attachment_ids
     */
    public function setAttachmentIds(?array $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @param Attachment $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAttachmentIds(Attachment $item, bool $strict = true): bool
    {
        if (null === $this->attachment_ids) {
            return false;
        }

        return in_array($item, $this->attachment_ids, $strict);
    }

    /**
     * @param Attachment $item
     */
    public function addAttachmentIds(Attachment $item): void
    {
        if ($this->hasAttachmentIds($item)) {
            return;
        }

        if (null === $this->attachment_ids) {
            $this->attachment_ids = [];
        }

        $this->attachment_ids[] = $item;
    }

    /**
     * @param null|string $duplicated_vendor_ref
     */
    public function setDuplicatedVendorRef(?string $duplicated_vendor_ref): void
    {
        $this->duplicated_vendor_ref = $duplicated_vendor_ref;
    }

    /**
     * @return null|bool
     */
    public function isHasReconciledEntries(): ?bool
    {
        return $this->has_reconciled_entries;
    }

    /**
     * @param array $extract_state
     */
    public function setExtractState(array $extract_state): void
    {
        $this->extract_state = $extract_state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractState($item, bool $strict = true): bool
    {
        return in_array($item, $this->extract_state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addExtractState($item): void
    {
        if ($this->hasExtractState($item)) {
            return;
        }

        $this->extract_state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeExtractState($item): void
    {
        if ($this->hasExtractState($item)) {
            $index = array_search($item, $this->extract_state);
            unset($this->extract_state[$index]);
        }
    }

    /**
     * @param null|int $extract_status_code
     */
    public function setExtractStatusCode(?int $extract_status_code): void
    {
        $this->extract_status_code = $extract_status_code;
    }

    /**
     * @return null|string
     */
    public function getExtractErrorMessage(): ?string
    {
        return $this->extract_error_message;
    }

    /**
     * @return null|bool
     */
    public function isRestrictModeHashTable(): ?bool
    {
        return $this->restrict_mode_hash_table;
    }

    /**
     * @return null|string
     */
    public function getTaxLockDateMessage(): ?string
    {
        return $this->tax_lock_date_message;
    }

    /**
     * @return null|Term
     */
    public function getInvoicePaymentTermId(): ?Term
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @param null|MoveAlias $invoice_vendor_bill_id
     */
    public function setInvoiceVendorBillId(?MoveAlias $invoice_vendor_bill_id): void
    {
        $this->invoice_vendor_bill_id = $invoice_vendor_bill_id;
    }

    /**
     * @return null|Line[]
     */
    public function getInvoiceLineIds(): ?array
    {
        return $this->invoice_line_ids;
    }

    /**
     * @param null|Bank $invoice_partner_bank_id
     */
    public function setInvoicePartnerBankId(?Bank $invoice_partner_bank_id): void
    {
        $this->invoice_partner_bank_id = $invoice_partner_bank_id;
    }

    /**
     * @param null|Incoterms $invoice_incoterm_id
     */
    public function setInvoiceIncotermId(?Incoterms $invoice_incoterm_id): void
    {
        $this->invoice_incoterm_id = $invoice_incoterm_id;
    }

    /**
     * @return null|string
     */
    public function getInvoiceOutstandingCreditsDebitsWidget(): ?string
    {
        return $this->invoice_outstanding_credits_debits_widget;
    }

    /**
     * @return null|string
     */
    public function getInvoicePaymentsWidget(): ?string
    {
        return $this->invoice_payments_widget;
    }

    /**
     * @return null|bool
     */
    public function isInvoiceHasOutstanding(): ?bool
    {
        return $this->invoice_has_outstanding;
    }

    /**
     * @param null|string $invoice_source_email
     */
    public function setInvoiceSourceEmail(?string $invoice_source_email): void
    {
        $this->invoice_source_email = $invoice_source_email;
    }

    /**
     * @return null|bool
     */
    public function isInvoiceHasMatchingSuspenseAmount(): ?bool
    {
        return $this->invoice_has_matching_suspense_amount;
    }

    /**
     * @return null|string
     */
    public function getInvoicePartnerDisplayName(): ?string
    {
        return $this->invoice_partner_display_name;
    }

    /**
     * @return null|string
     */
    public function getInvoicePartnerIcon(): ?string
    {
        return $this->invoice_partner_icon;
    }

    /**
     * @return null|Rounding
     */
    public function getInvoiceCashRoundingId(): ?Rounding
    {
        return $this->invoice_cash_rounding_id;
    }

    /**
     * @param null|string $invoice_sequence_number_next
     */
    public function setInvoiceSequenceNumberNext(?string $invoice_sequence_number_next): void
    {
        $this->invoice_sequence_number_next = $invoice_sequence_number_next;
    }

    /**
     * @return null|string
     */
    public function getInvoiceSequenceNumberNextPrefix(): ?string
    {
        return $this->invoice_sequence_number_next_prefix;
    }

    /**
     * @return null|string
     */
    public function getInvoiceFilterTypeDomain(): ?string
    {
        return $this->invoice_filter_type_domain;
    }

    /**
     * @return null|Partner
     */
    public function getBankPartnerId(): ?Partner
    {
        return $this->bank_partner_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
