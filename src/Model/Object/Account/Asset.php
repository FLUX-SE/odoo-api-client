<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Type;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Tag;
use Flux\OdooApiClient\Model\Object\Account\Asset as AssetAlias;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type as TypeAlias;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.asset
 * Name : account.asset
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
final class Asset extends Base
{
    /**
     * # Posted Depreciation Entries
     *
     * @var int
     */
    private $depreciation_entries_count;

    /**
     * # Gross Increases
     *
     * @var int
     */
    private $gross_increase_count;

    /**
     * # Depreciation Entries
     *
     * @var int
     */
    private $total_depreciation_entries_count;

    /**
     * Asset Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Asset Type
     *
     * @var array
     */
    private $asset_type;

    /**
     * Method
     *
     * @var array
     */
    private $method;

    /**
     * Number of Depreciations
     *
     * @var int
     */
    private $method_number;

    /**
     * Number of Months in a Period
     *
     * @var array
     */
    private $method_period;

    /**
     * Degressive Factor
     *
     * @var float
     */
    private $method_progress_factor;

    /**
     * Prorata Temporis
     *
     * @var bool
     */
    private $prorata;

    /**
     * Prorata Date
     *
     * @var DateTimeInterface
     */
    private $prorata_date;

    /**
     * Fixed Asset Account
     *
     * @var Account
     */
    private $account_asset_id;

    /**
     * Depreciation Account
     *
     * @var Account
     */
    private $account_depreciation_id;

    /**
     * Expense Account
     *
     * @var Account
     */
    private $account_depreciation_expense_id;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Original Value
     *
     * @var float
     */
    private $original_value;

    /**
     * Book Value
     *
     * @var float
     */
    private $book_value;

    /**
     * Depreciable Value
     *
     * @var float
     */
    private $value_residual;

    /**
     * Not Depreciable Value
     *
     * @var float
     */
    private $salvage_value;

    /**
     * Gross Increase Value
     *
     * @var float
     */
    private $gross_increase_value;

    /**
     * Depreciation Lines
     *
     * @var Move
     */
    private $depreciation_move_ids;

    /**
     * Journal Items
     *
     * @var Line
     */
    private $original_move_line_ids;

    /**
     * Analytic Account
     *
     * @var AccountAlias
     */
    private $account_analytic_id;

    /**
     * Analytic Tag
     *
     * @var Tag
     */
    private $analytic_tag_ids;

    /**
     * First Depreciation Date
     *
     * @var null|DateTimeInterface
     */
    private $first_depreciation_date;

    /**
     * Acquisition Date
     *
     * @var DateTimeInterface
     */
    private $acquisition_date;

    /**
     * Disposal Date
     *
     * @var DateTimeInterface
     */
    private $disposal_date;

    /**
     * Model
     *
     * @var AssetAlias
     */
    private $model_id;

    /**
     * Type of the account
     *
     * @var Type
     */
    private $user_type_id;

    /**
     * Display Model Choice
     *
     * @var bool
     */
    private $display_model_choice;

    /**
     * Display Account Asset
     *
     * @var bool
     */
    private $display_account_asset_id;

    /**
     * Parent
     *
     * @var AssetAlias
     */
    private $parent_id;

    /**
     * Children
     *
     * @var AssetAlias
     */
    private $children_ids;

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
     * @var TypeAlias
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
     * @return int
     */
    public function getDepreciationEntriesCount(): int
    {
        return $this->depreciation_entries_count;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return Type
     */
    public function getUserTypeId(): Type
    {
        return $this->user_type_id;
    }

    /**
     * @return bool
     */
    public function isDisplayModelChoice(): bool
    {
        return $this->display_model_choice;
    }

    /**
     * @return bool
     */
    public function isDisplayAccountAssetId(): bool
    {
        return $this->display_account_asset_id;
    }

    /**
     * @param AssetAlias $parent_id
     */
    public function setParentId(AssetAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param AssetAlias $children_ids
     */
    public function setChildrenIds(AssetAlias $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @param Activity $activity_ids
     */
    public function setActivityIds(Activity $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @param Users $activity_user_id
     */
    public function setActivityUserId(Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param TypeAlias $activity_type_id
     */
    public function setActivityTypeId(TypeAlias $activity_type_id): void
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
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDisposalDate(): DateTimeInterface
    {
        return $this->disposal_date;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
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
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
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
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return AssetAlias
     */
    public function getModelId(): AssetAlias
    {
        return $this->model_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getAcquisitionDate(): DateTimeInterface
    {
        return $this->acquisition_date;
    }

    /**
     * @return int
     */
    public function getGrossIncreaseCount(): int
    {
        return $this->gross_increase_count;
    }

    /**
     * @param array $state
     */
    public function removeState(array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @return array
     */
    public function getMethod(): array
    {
        return $this->method;
    }

    /**
     * @param array $asset_type
     */
    public function removeAssetType(array $asset_type): void
    {
        if ($this->hasAssetType($asset_type)) {
            $index = array_search($asset_type, $this->asset_type);
            unset($this->asset_type[$index]);
        }
    }

    /**
     * @param array $asset_type
     */
    public function addAssetType(array $asset_type): void
    {
        if ($this->hasAssetType($asset_type)) {
            return;
        }

        $this->asset_type[] = $asset_type;
    }

    /**
     * @param array $asset_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAssetType(array $asset_type, bool $strict = true): bool
    {
        return in_array($asset_type, $this->asset_type, $strict);
    }

    /**
     * @param array $asset_type
     */
    public function setAssetType(array $asset_type): void
    {
        $this->asset_type = $asset_type;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param array $state
     */
    public function addState(array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        $this->state[] = $state;
    }

    /**
     * @return array
     */
    public function getMethodPeriod(): array
    {
        return $this->method_period;
    }

    /**
     * @param array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(array $state, bool $strict = true): bool
    {
        return in_array($state, $this->state, $strict);
    }

    /**
     * @param array $state
     */
    public function setState(array $state): void
    {
        $this->state = $state;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getTotalDepreciationEntriesCount(): int
    {
        return $this->total_depreciation_entries_count;
    }

    /**
     * @return int
     */
    public function getMethodNumber(): int
    {
        return $this->method_number;
    }

    /**
     * @return float
     */
    public function getMethodProgressFactor(): float
    {
        return $this->method_progress_factor;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getFirstDepreciationDate(): ?DateTimeInterface
    {
        return $this->first_depreciation_date;
    }

    /**
     * @return float
     */
    public function getValueResidual(): float
    {
        return $this->value_residual;
    }

    /**
     * @param Tag $analytic_tag_ids
     */
    public function setAnalyticTagIds(Tag $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param AccountAlias $account_analytic_id
     */
    public function setAccountAnalyticId(AccountAlias $account_analytic_id): void
    {
        $this->account_analytic_id = $account_analytic_id;
    }

    /**
     * @return Line
     */
    public function getOriginalMoveLineIds(): Line
    {
        return $this->original_move_line_ids;
    }

    /**
     * @return Move
     */
    public function getDepreciationMoveIds(): Move
    {
        return $this->depreciation_move_ids;
    }

    /**
     * @return float
     */
    public function getGrossIncreaseValue(): float
    {
        return $this->gross_increase_value;
    }

    /**
     * @return float
     */
    public function getSalvageValue(): float
    {
        return $this->salvage_value;
    }

    /**
     * @return float
     */
    public function getBookValue(): float
    {
        return $this->book_value;
    }

    /**
     * @return bool
     */
    public function isProrata(): bool
    {
        return $this->prorata;
    }

    /**
     * @return float
     */
    public function getOriginalValue(): float
    {
        return $this->original_value;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @return Account
     */
    public function getAccountDepreciationExpenseId(): Account
    {
        return $this->account_depreciation_expense_id;
    }

    /**
     * @return Account
     */
    public function getAccountDepreciationId(): Account
    {
        return $this->account_depreciation_id;
    }

    /**
     * @return Account
     */
    public function getAccountAssetId(): Account
    {
        return $this->account_asset_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getProrataDate(): DateTimeInterface
    {
        return $this->prorata_date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
