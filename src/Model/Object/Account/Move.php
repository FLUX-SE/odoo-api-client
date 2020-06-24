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
final class Move extends Base
{
    /**
     * Number
     *
     * @var null|string
     */
    private $name;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Reference
     *
     * @var string
     */
    private $ref;

    /**
     * Internal Note
     *
     * @var string
     */
    private $narration;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Type Name
     *
     * @var string
     */
    private $type_name;

    /**
     * To Check
     *
     * @var bool
     */
    private $to_check;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Company Currency
     *
     * @var Currency
     */
    private $company_currency_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Journal Items
     *
     * @var Line
     */
    private $line_ids;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Commercial Entity
     *
     * @var Partner
     */
    private $commercial_partner_id;

    /**
     * Untaxed Amount
     *
     * @var float
     */
    private $amount_untaxed;

    /**
     * Tax
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
     * Amount Due
     *
     * @var float
     */
    private $amount_residual;

    /**
     * Untaxed Amount Signed
     *
     * @var float
     */
    private $amount_untaxed_signed;

    /**
     * Tax Signed
     *
     * @var float
     */
    private $amount_tax_signed;

    /**
     * Total Signed
     *
     * @var float
     */
    private $amount_total_signed;

    /**
     * Amount Due Signed
     *
     * @var float
     */
    private $amount_residual_signed;

    /**
     * Tax amount by group
     *
     * @var int
     */
    private $amount_by_group;

    /**
     * Tax Cash Basis Entry of
     *
     * @var Reconcile
     */
    private $tax_cash_basis_rec_id;

    /**
     * Post Automatically
     *
     * @var bool
     */
    private $auto_post;

    /**
     * Reversal of
     *
     * @var MoveAlias
     */
    private $reversed_entry_id;

    /**
     * Fiscal Position
     *
     * @var Position
     */
    private $fiscal_position_id;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $invoice_user_id;

    /**
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * Payment
     *
     * @var array
     */
    private $invoice_payment_state;

    /**
     * Invoice/Bill Date
     *
     * @var DateTimeInterface
     */
    private $invoice_date;

    /**
     * Due Date
     *
     * @var DateTimeInterface
     */
    private $invoice_date_due;

    /**
     * Payment Reference
     *
     * @var string
     */
    private $invoice_payment_ref;

    /**
     * Invoice Sent
     *
     * @var bool
     */
    private $invoice_sent;

    /**
     * Origin
     *
     * @var string
     */
    private $invoice_origin;

    /**
     * Payment Terms
     *
     * @var Term
     */
    private $invoice_payment_term_id;

    /**
     * Invoice lines
     *
     * @var Line
     */
    private $invoice_line_ids;

    /**
     * Bank Account
     *
     * @var Bank
     */
    private $invoice_partner_bank_id;

    /**
     * Incoterm
     *
     * @var Incoterms
     */
    private $invoice_incoterm_id;

    /**
     * Invoice Outstanding Credits Debits Widget
     *
     * @var string
     */
    private $invoice_outstanding_credits_debits_widget;

    /**
     * Invoice Payments Widget
     *
     * @var string
     */
    private $invoice_payments_widget;

    /**
     * Invoice Has Outstanding
     *
     * @var bool
     */
    private $invoice_has_outstanding;

    /**
     * Vendor Bill
     *
     * @var MoveAlias
     */
    private $invoice_vendor_bill_id;

    /**
     * Source Email
     *
     * @var string
     */
    private $invoice_source_email;

    /**
     * Invoice Partner Display Name
     *
     * @var string
     */
    private $invoice_partner_display_name;

    /**
     * Invoice Partner Icon
     *
     * @var string
     */
    private $invoice_partner_icon;

    /**
     * Cash Rounding Method
     *
     * @var Rounding
     */
    private $invoice_cash_rounding_id;

    /**
     * Next Number
     *
     * @var string
     */
    private $invoice_sequence_number_next;

    /**
     * Next Number Prefix
     *
     * @var string
     */
    private $invoice_sequence_number_next_prefix;

    /**
     * Invoice Filter Type Domain
     *
     * @var string
     */
    private $invoice_filter_type_domain;

    /**
     * Bank Partner
     *
     * @var Partner
     */
    private $bank_partner_id;

    /**
     * Invoice Has Matching Suspense Amount
     *
     * @var bool
     */
    private $invoice_has_matching_suspense_amount;

    /**
     * Tax Lock Date Message
     *
     * @var string
     */
    private $tax_lock_date_message;

    /**
     * Has Reconciled Entries
     *
     * @var bool
     */
    private $has_reconciled_entries;

    /**
     * Lock Posted Entries with Hash
     *
     * @var bool
     */
    private $restrict_mode_hash_table;

    /**
     * Inalteralbility No Gap Sequence #
     *
     * @var int
     */
    private $secure_sequence_number;

    /**
     * Inalterability Hash
     *
     * @var string
     */
    private $inalterable_hash;

    /**
     * String To Hash
     *
     * @var string
     */
    private $string_to_hash;

    /**
     * Attachments
     *
     * @var Attachment
     */
    private $attachment_ids;

    /**
     * Duplicated vendor reference
     *
     * @var string
     */
    private $duplicated_vendor_ref;

    /**
     * Extract state
     *
     * @var null|array
     */
    private $extract_state;

    /**
     * Status code
     *
     * @var int
     */
    private $extract_status_code;

    /**
     * Error message
     *
     * @var string
     */
    private $extract_error_message;

    /**
     * Id of the request to IAP-OCR
     *
     * @var int
     */
    private $extract_remote_id;

    /**
     * Extract Word
     *
     * @var Words
     */
    private $extract_word_ids;

    /**
     * Can show the ocr resend button
     *
     * @var bool
     */
    private $extract_can_show_resend_button;

    /**
     * Can show the ocr send button
     *
     * @var bool
     */
    private $extract_can_show_send_button;

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
     * Originating Model
     *
     * @var Model
     */
    private $transfer_model_id;

    /**
     * Is Tax Closing
     *
     * @var bool
     */
    private $is_tax_closing;

    /**
     * Tax Report Control Error
     *
     * @var bool
     */
    private $tax_report_control_error;

    /**
     * Sales Team
     *
     * @var Team
     */
    private $team_id;

    /**
     * Delivery Address
     *
     * @var Partner
     */
    private $partner_shipping_id;

    /**
     * Asset
     *
     * @var Asset
     */
    private $asset_id;

    /**
     * Asset Type
     *
     * @var array
     */
    private $asset_asset_type;

    /**
     * Depreciable Value
     *
     * @var float
     */
    private $asset_remaining_value;

    /**
     * Cumulative Depreciation
     *
     * @var float
     */
    private $asset_depreciated_value;

    /**
     * Asset Manually Modified
     *
     * @var bool
     */
    private $asset_manually_modified;

    /**
     * Asset Value Change
     *
     * @var bool
     */
    private $asset_value_change;

    /**
     * Assets
     *
     * @var Asset
     */
    private $asset_ids;

    /**
     * Asset Ids Display Name
     *
     * @var string
     */
    private $asset_ids_display_name;

    /**
     * Asset Id Display Name
     *
     * @var string
     */
    private $asset_id_display_name;

    /**
     * Number Asset
     *
     * @var int
     */
    private $number_asset_ids;

    /**
     * Draft Asset
     *
     * @var bool
     */
    private $draft_asset_ids;

    /**
     * Reversal Move
     *
     * @var MoveAlias
     */
    private $reversal_move_id;

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
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

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
     * @param Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @param Campaign $campaign_id
     */
    public function setCampaignId(Campaign $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @param MoveAlias $reversal_move_id
     */
    public function setReversalMoveId(MoveAlias $reversal_move_id): void
    {
        $this->reversal_move_id = $reversal_move_id;
    }

    /**
     * @return bool
     */
    public function isDraftAssetIds(): bool
    {
        return $this->draft_asset_ids;
    }

    /**
     * @return int
     */
    public function getNumberAssetIds(): int
    {
        return $this->number_asset_ids;
    }

    /**
     * @return string
     */
    public function getAssetIdDisplayName(): string
    {
        return $this->asset_id_display_name;
    }

    /**
     * @return string
     */
    public function getAssetIdsDisplayName(): string
    {
        return $this->asset_ids_display_name;
    }

    /**
     * @return Asset
     */
    public function getAssetIds(): Asset
    {
        return $this->asset_ids;
    }

    /**
     * @param bool $asset_value_change
     */
    public function setAssetValueChange(bool $asset_value_change): void
    {
        $this->asset_value_change = $asset_value_change;
    }

    /**
     * @param bool $asset_manually_modified
     */
    public function setAssetManuallyModified(bool $asset_manually_modified): void
    {
        $this->asset_manually_modified = $asset_manually_modified;
    }

    /**
     * @param float $asset_depreciated_value
     */
    public function setAssetDepreciatedValue(float $asset_depreciated_value): void
    {
        $this->asset_depreciated_value = $asset_depreciated_value;
    }

    /**
     * @param float $asset_remaining_value
     */
    public function setAssetRemainingValue(float $asset_remaining_value): void
    {
        $this->asset_remaining_value = $asset_remaining_value;
    }

    /**
     * @return array
     */
    public function getAssetAssetType(): array
    {
        return $this->asset_asset_type;
    }

    /**
     * @return Partner
     */
    public function getPartnerShippingId(): Partner
    {
        return $this->partner_shipping_id;
    }

    /**
     * @param Medium $medium_id
     */
    public function setMediumId(Medium $medium_id): void
    {
        $this->medium_id = $medium_id;
    }

    /**
     * @param Team $team_id
     */
    public function setTeamId(Team $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @param bool $tax_report_control_error
     */
    public function setTaxReportControlError(bool $tax_report_control_error): void
    {
        $this->tax_report_control_error = $tax_report_control_error;
    }

    /**
     * @param bool $is_tax_closing
     */
    public function setIsTaxClosing(bool $is_tax_closing): void
    {
        $this->is_tax_closing = $is_tax_closing;
    }

    /**
     * @param Model $transfer_model_id
     */
    public function setTransferModelId(Model $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @return Transaction
     */
    public function getAuthorizedTransactionIds(): Transaction
    {
        return $this->authorized_transaction_ids;
    }

    /**
     * @return Transaction
     */
    public function getTransactionIds(): Transaction
    {
        return $this->transaction_ids;
    }

    /**
     * @return bool
     */
    public function isExtractCanShowSendButton(): bool
    {
        return $this->extract_can_show_send_button;
    }

    /**
     * @return bool
     */
    public function isExtractCanShowResendButton(): bool
    {
        return $this->extract_can_show_resend_button;
    }

    /**
     * @param Words $extract_word_ids
     */
    public function setExtractWordIds(Words $extract_word_ids): void
    {
        $this->extract_word_ids = $extract_word_ids;
    }

    /**
     * @return int
     */
    public function getExtractRemoteId(): int
    {
        return $this->extract_remote_id;
    }

    /**
     * @return string
     */
    public function getExtractErrorMessage(): string
    {
        return $this->extract_error_message;
    }

    /**
     * @param int $extract_status_code
     */
    public function setExtractStatusCode(int $extract_status_code): void
    {
        $this->extract_status_code = $extract_status_code;
    }

    /**
     * @param ?array $extract_state
     */
    public function removeExtractState(?array $extract_state): void
    {
        if ($this->hasExtractState($extract_state)) {
            $index = array_search($extract_state, $this->extract_state);
            unset($this->extract_state[$index]);
        }
    }

    /**
     * @param Source $source_id
     */
    public function setSourceId(Source $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param ?array $extract_state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExtractState(?array $extract_state, bool $strict = true): bool
    {
        if (null === $this->extract_state) {
            return false;
        }

        return in_array($extract_state, $this->extract_state, $strict);
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
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
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
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param ?array $extract_state
     */
    public function addExtractState(?array $extract_state): void
    {
        if ($this->hasExtractState($extract_state)) {
            return;
        }

        if (null === $this->extract_state) {
            $this->extract_state = [];
        }

        $this->extract_state[] = $extract_state;
    }

    /**
     * @param null|array $extract_state
     */
    public function setExtractState(?array $extract_state): void
    {
        $this->extract_state = $extract_state;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getAmountTax(): float
    {
        return $this->amount_tax;
    }

    /**
     * @param Users $invoice_user_id
     */
    public function setInvoiceUserId(Users $invoice_user_id): void
    {
        $this->invoice_user_id = $invoice_user_id;
    }

    /**
     * @return Position
     */
    public function getFiscalPositionId(): Position
    {
        return $this->fiscal_position_id;
    }

    /**
     * @return MoveAlias
     */
    public function getReversedEntryId(): MoveAlias
    {
        return $this->reversed_entry_id;
    }

    /**
     * @param bool $auto_post
     */
    public function setAutoPost(bool $auto_post): void
    {
        $this->auto_post = $auto_post;
    }

    /**
     * @param Reconcile $tax_cash_basis_rec_id
     */
    public function setTaxCashBasisRecId(Reconcile $tax_cash_basis_rec_id): void
    {
        $this->tax_cash_basis_rec_id = $tax_cash_basis_rec_id;
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
    public function getAmountResidualSigned(): float
    {
        return $this->amount_residual_signed;
    }

    /**
     * @return float
     */
    public function getAmountTotalSigned(): float
    {
        return $this->amount_total_signed;
    }

    /**
     * @return float
     */
    public function getAmountTaxSigned(): float
    {
        return $this->amount_tax_signed;
    }

    /**
     * @return float
     */
    public function getAmountUntaxedSigned(): float
    {
        return $this->amount_untaxed_signed;
    }

    /**
     * @return float
     */
    public function getAmountResidual(): float
    {
        return $this->amount_residual;
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
    public function getAmountUntaxed(): float
    {
        return $this->amount_untaxed;
    }

    /**
     * @return array
     */
    public function getInvoicePaymentState(): array
    {
        return $this->invoice_payment_state;
    }

    /**
     * @return Partner
     */
    public function getCommercialPartnerId(): Partner
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return Line
     */
    public function getLineIds(): Line
    {
        return $this->line_ids;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Currency
     */
    public function getCompanyCurrencyId(): Currency
    {
        return $this->company_currency_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @param bool $to_check
     */
    public function setToCheck(bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @return null|array
     */
    public function getType(): ?array
    {
        return $this->type;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param string $narration
     */
    public function setNarration(string $narration): void
    {
        $this->narration = $narration;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return Users
     */
    public function getUserId(): Users
    {
        return $this->user_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getInvoiceDate(): DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @param string $duplicated_vendor_ref
     */
    public function setDuplicatedVendorRef(string $duplicated_vendor_ref): void
    {
        $this->duplicated_vendor_ref = $duplicated_vendor_ref;
    }

    /**
     * @return Rounding
     */
    public function getInvoiceCashRoundingId(): Rounding
    {
        return $this->invoice_cash_rounding_id;
    }

    /**
     * @param Attachment $attachment_ids
     */
    public function setAttachmentIds(Attachment $attachment_ids): void
    {
        $this->attachment_ids = $attachment_ids;
    }

    /**
     * @return string
     */
    public function getStringToHash(): string
    {
        return $this->string_to_hash;
    }

    /**
     * @return string
     */
    public function getInalterableHash(): string
    {
        return $this->inalterable_hash;
    }

    /**
     * @return int
     */
    public function getSecureSequenceNumber(): int
    {
        return $this->secure_sequence_number;
    }

    /**
     * @return bool
     */
    public function isRestrictModeHashTable(): bool
    {
        return $this->restrict_mode_hash_table;
    }

    /**
     * @return bool
     */
    public function isHasReconciledEntries(): bool
    {
        return $this->has_reconciled_entries;
    }

    /**
     * @return string
     */
    public function getTaxLockDateMessage(): string
    {
        return $this->tax_lock_date_message;
    }

    /**
     * @return bool
     */
    public function isInvoiceHasMatchingSuspenseAmount(): bool
    {
        return $this->invoice_has_matching_suspense_amount;
    }

    /**
     * @return Partner
     */
    public function getBankPartnerId(): Partner
    {
        return $this->bank_partner_id;
    }

    /**
     * @return string
     */
    public function getInvoiceFilterTypeDomain(): string
    {
        return $this->invoice_filter_type_domain;
    }

    /**
     * @return string
     */
    public function getInvoiceSequenceNumberNextPrefix(): string
    {
        return $this->invoice_sequence_number_next_prefix;
    }

    /**
     * @param string $invoice_sequence_number_next
     */
    public function setInvoiceSequenceNumberNext(string $invoice_sequence_number_next): void
    {
        $this->invoice_sequence_number_next = $invoice_sequence_number_next;
    }

    /**
     * @return string
     */
    public function getInvoicePartnerIcon(): string
    {
        return $this->invoice_partner_icon;
    }

    /**
     * @return DateTimeInterface
     */
    public function getInvoiceDateDue(): DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @return string
     */
    public function getInvoicePartnerDisplayName(): string
    {
        return $this->invoice_partner_display_name;
    }

    /**
     * @param string $invoice_source_email
     */
    public function setInvoiceSourceEmail(string $invoice_source_email): void
    {
        $this->invoice_source_email = $invoice_source_email;
    }

    /**
     * @param MoveAlias $invoice_vendor_bill_id
     */
    public function setInvoiceVendorBillId(MoveAlias $invoice_vendor_bill_id): void
    {
        $this->invoice_vendor_bill_id = $invoice_vendor_bill_id;
    }

    /**
     * @return bool
     */
    public function isInvoiceHasOutstanding(): bool
    {
        return $this->invoice_has_outstanding;
    }

    /**
     * @return string
     */
    public function getInvoicePaymentsWidget(): string
    {
        return $this->invoice_payments_widget;
    }

    /**
     * @return string
     */
    public function getInvoiceOutstandingCreditsDebitsWidget(): string
    {
        return $this->invoice_outstanding_credits_debits_widget;
    }

    /**
     * @param Incoterms $invoice_incoterm_id
     */
    public function setInvoiceIncotermId(Incoterms $invoice_incoterm_id): void
    {
        $this->invoice_incoterm_id = $invoice_incoterm_id;
    }

    /**
     * @param Bank $invoice_partner_bank_id
     */
    public function setInvoicePartnerBankId(Bank $invoice_partner_bank_id): void
    {
        $this->invoice_partner_bank_id = $invoice_partner_bank_id;
    }

    /**
     * @return Line
     */
    public function getInvoiceLineIds(): Line
    {
        return $this->invoice_line_ids;
    }

    /**
     * @return Term
     */
    public function getInvoicePaymentTermId(): Term
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @return string
     */
    public function getInvoiceOrigin(): string
    {
        return $this->invoice_origin;
    }

    /**
     * @return bool
     */
    public function isInvoiceSent(): bool
    {
        return $this->invoice_sent;
    }

    /**
     * @param string $invoice_payment_ref
     */
    public function setInvoicePaymentRef(string $invoice_payment_ref): void
    {
        $this->invoice_payment_ref = $invoice_payment_ref;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
