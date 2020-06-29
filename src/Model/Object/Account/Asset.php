<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Account\Type as TypeAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Tag;
use Flux\OdooApiClient\Model\Object\Account\Asset as AssetAlias;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
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
final class Asset extends Base
{
    /**
     * # Posted Depreciation Entries
     *
     * @var null|int
     */
    private $depreciation_entries_count;

    /**
     * # Gross Increases
     * Number of assets made to increase the value of the asset
     *
     * @var null|int
     */
    private $gross_increase_count;

    /**
     * # Depreciation Entries
     * Number of depreciation entries (posted or not)
     *
     * @var null|int
     */
    private $total_depreciation_entries_count;

    /**
     * Asset Name
     *
     * @var string
     */
    private $name;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Status
     * When an asset is created, the status is 'Draft'.
     * If the asset is confirmed, the status goes in 'Running' and the depreciation lines can be posted in the
     * accounting.
     * The 'On Hold' status can be set manually when you want to pause the depreciation of an asset for some time.
     * You can manually close an asset when the depreciation is over. If the last line of depreciation is posted, the
     * asset automatically goes in that status.
     *
     * @var null|array
     */
    private $state;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Asset Type
     *
     * @var null|array
     */
    private $asset_type;

    /**
     * Method
     * Choose the method to use to compute the amount of depreciation lines.
     * * Linear: Calculated on basis of: Gross Value / Number of Depreciations
     * * Degressive: Calculated on basis of: Residual Value * Degressive Factor
     * * Accelerated Degressive: Like Degressive but with a minimum depreciation value equal to the linear value.
     *
     * @var null|array
     */
    private $method;

    /**
     * Number of Depreciations
     * The number of depreciations needed to depreciate your asset
     *
     * @var null|int
     */
    private $method_number;

    /**
     * Number of Months in a Period
     * The amount of time between two depreciations
     *
     * @var null|array
     */
    private $method_period;

    /**
     * Degressive Factor
     *
     * @var null|float
     */
    private $method_progress_factor;

    /**
     * Prorata Temporis
     * Indicates that the first depreciation entry for this asset have to be done from the asset date (purchase date)
     * instead of the first January / Start date of fiscal year
     *
     * @var null|bool
     */
    private $prorata;

    /**
     * Prorata Date
     *
     * @var null|DateTimeInterface
     */
    private $prorata_date;

    /**
     * Fixed Asset Account
     * Account used to record the purchase of the asset at its original price.
     *
     * @var null|AccountAlias
     */
    private $account_asset_id;

    /**
     * Depreciation Account
     * Account used in the depreciation entries, to decrease the asset value.
     *
     * @var null|AccountAlias
     */
    private $account_depreciation_id;

    /**
     * Expense Account
     * Account used in the periodical entries, to record a part of the asset as expense.
     *
     * @var null|AccountAlias
     */
    private $account_depreciation_expense_id;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Original Value
     *
     * @var null|float
     */
    private $original_value;

    /**
     * Book Value
     * Sum of the depreciable value, the salvage value and the book value of all value increase items
     *
     * @var null|float
     */
    private $book_value;

    /**
     * Depreciable Value
     *
     * @var null|float
     */
    private $value_residual;

    /**
     * Not Depreciable Value
     * It is the amount you plan to have that you cannot depreciate.
     *
     * @var null|float
     */
    private $salvage_value;

    /**
     * Gross Increase Value
     *
     * @var null|float
     */
    private $gross_increase_value;

    /**
     * Depreciation Lines
     *
     * @var null|Move[]
     */
    private $depreciation_move_ids;

    /**
     * Journal Items
     *
     * @var null|Line[]
     */
    private $original_move_line_ids;

    /**
     * Analytic Account
     *
     * @var null|Account
     */
    private $account_analytic_id;

    /**
     * Analytic Tag
     *
     * @var null|Tag[]
     */
    private $analytic_tag_ids;

    /**
     * First Depreciation Date
     * Note that this date does not alter the computation of the first journal entry in case of prorata temporis
     * assets. It simply changes its accounting date
     *
     * @var DateTimeInterface
     */
    private $first_depreciation_date;

    /**
     * Acquisition Date
     *
     * @var null|DateTimeInterface
     */
    private $acquisition_date;

    /**
     * Disposal Date
     *
     * @var null|DateTimeInterface
     */
    private $disposal_date;

    /**
     * Model
     *
     * @var null|AssetAlias
     */
    private $model_id;

    /**
     * Type of the account
     * Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     * close a fiscal year and generate opening entries.
     *
     * @var null|TypeAlias
     */
    private $user_type_id;

    /**
     * Display Model Choice
     *
     * @var null|bool
     */
    private $display_model_choice;

    /**
     * Display Account Asset
     *
     * @var null|bool
     */
    private $display_account_asset_id;

    /**
     * Parent
     * An asset has a parent when it is the result of gaining value
     *
     * @var null|AssetAlias
     */
    private $parent_id;

    /**
     * Children
     * The children are the gains in value of this asset
     *
     * @var null|AssetAlias[]
     */
    private $children_ids;

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
     * @param string $name Asset Name
     * @param Currency $currency_id Currency
     * @param Company $company_id Company
     * @param DateTimeInterface $first_depreciation_date First Depreciation Date
     *        Note that this date does not alter the computation of the first journal entry in case of prorata temporis
     *        assets. It simply changes its accounting date
     */
    public function __construct(
        string $name,
        Currency $currency_id,
        Company $company_id,
        DateTimeInterface $first_depreciation_date
    ) {
        $this->name = $name;
        $this->currency_id = $currency_id;
        $this->company_id = $company_id;
        $this->first_depreciation_date = $first_depreciation_date;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
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
     * @param null|string $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param null|Users $activity_user_id
     */
    public function setActivityUserId(?Users $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
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
     * @param AssetAlias $item
     */
    public function removeChildrenIds(AssetAlias $item): void
    {
        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        if ($this->hasChildrenIds($item)) {
            $index = array_search($item, $this->children_ids);
            unset($this->children_ids[$index]);
        }
    }

    /**
     * @param AssetAlias $item
     */
    public function addChildrenIds(AssetAlias $item): void
    {
        if ($this->hasChildrenIds($item)) {
            return;
        }

        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        $this->children_ids[] = $item;
    }

    /**
     * @param AssetAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildrenIds(AssetAlias $item, bool $strict = true): bool
    {
        if (null === $this->children_ids) {
            return false;
        }

        return in_array($item, $this->children_ids, $strict);
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
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param null|AssetAlias $parent_id
     */
    public function setParentId(?AssetAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @param null|AssetAlias[] $children_ids
     */
    public function setChildrenIds(?array $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @return null|bool
     */
    public function isDisplayAccountAssetId(): ?bool
    {
        return $this->display_account_asset_id;
    }

    /**
     * @return null|int
     */
    public function getDepreciationEntriesCount(): ?int
    {
        return $this->depreciation_entries_count;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|float
     */
    public function getMethodProgressFactor(): ?float
    {
        return $this->method_progress_factor;
    }

    /**
     * @return null|array
     */
    public function getMethodPeriod(): ?array
    {
        return $this->method_period;
    }

    /**
     * @return null|int
     */
    public function getMethodNumber(): ?int
    {
        return $this->method_number;
    }

    /**
     * @return null|array
     */
    public function getMethod(): ?array
    {
        return $this->method;
    }

    /**
     * @param mixed $item
     */
    public function removeAssetType($item): void
    {
        if (null === $this->asset_type) {
            $this->asset_type = [];
        }

        if ($this->hasAssetType($item)) {
            $index = array_search($item, $this->asset_type);
            unset($this->asset_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAssetType($item): void
    {
        if ($this->hasAssetType($item)) {
            return;
        }

        if (null === $this->asset_type) {
            $this->asset_type = [];
        }

        $this->asset_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAssetType($item, bool $strict = true): bool
    {
        if (null === $this->asset_type) {
            return false;
        }

        return in_array($item, $this->asset_type, $strict);
    }

    /**
     * @param null|array $asset_type
     */
    public function setAssetType(?array $asset_type): void
    {
        $this->asset_type = $asset_type;
    }

    /**
     * @param mixed $item
     */
    public function removeState($item): void
    {
        if (null === $this->state) {
            $this->state = [];
        }

        if ($this->hasState($item)) {
            $index = array_search($item, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getProrataDate(): ?DateTimeInterface
    {
        return $this->prorata_date;
    }

    /**
     * @param mixed $item
     */
    public function addState($item): void
    {
        if ($this->hasState($item)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState($item, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($item, $this->state, $strict);
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|int
     */
    public function getTotalDepreciationEntriesCount(): ?int
    {
        return $this->total_depreciation_entries_count;
    }

    /**
     * @return null|int
     */
    public function getGrossIncreaseCount(): ?int
    {
        return $this->gross_increase_count;
    }

    /**
     * @return null|bool
     */
    public function isProrata(): ?bool
    {
        return $this->prorata;
    }

    /**
     * @return null|AccountAlias
     */
    public function getAccountAssetId(): ?AccountAlias
    {
        return $this->account_asset_id;
    }

    /**
     * @return null|bool
     */
    public function isDisplayModelChoice(): ?bool
    {
        return $this->display_model_choice;
    }

    /**
     * @param null|Tag[] $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @return null|TypeAlias
     */
    public function getUserTypeId(): ?TypeAlias
    {
        return $this->user_type_id;
    }

    /**
     * @return null|AssetAlias
     */
    public function getModelId(): ?AssetAlias
    {
        return $this->model_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDisposalDate(): ?DateTimeInterface
    {
        return $this->disposal_date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getAcquisitionDate(): ?DateTimeInterface
    {
        return $this->acquisition_date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getFirstDepreciationDate(): DateTimeInterface
    {
        return $this->first_depreciation_date;
    }

    /**
     * @param Tag $item
     */
    public function removeAnalyticTagIds(Tag $item): void
    {
        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        if ($this->hasAnalyticTagIds($item)) {
            $index = array_search($item, $this->analytic_tag_ids);
            unset($this->analytic_tag_ids[$index]);
        }
    }

    /**
     * @param Tag $item
     */
    public function addAnalyticTagIds(Tag $item): void
    {
        if ($this->hasAnalyticTagIds($item)) {
            return;
        }

        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        $this->analytic_tag_ids[] = $item;
    }

    /**
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids, $strict);
    }

    /**
     * @param null|Account $account_analytic_id
     */
    public function setAccountAnalyticId(?Account $account_analytic_id): void
    {
        $this->account_analytic_id = $account_analytic_id;
    }

    /**
     * @return null|AccountAlias
     */
    public function getAccountDepreciationId(): ?AccountAlias
    {
        return $this->account_depreciation_id;
    }

    /**
     * @return null|Line[]
     */
    public function getOriginalMoveLineIds(): ?array
    {
        return $this->original_move_line_ids;
    }

    /**
     * @return null|Move[]
     */
    public function getDepreciationMoveIds(): ?array
    {
        return $this->depreciation_move_ids;
    }

    /**
     * @return null|float
     */
    public function getGrossIncreaseValue(): ?float
    {
        return $this->gross_increase_value;
    }

    /**
     * @return null|float
     */
    public function getSalvageValue(): ?float
    {
        return $this->salvage_value;
    }

    /**
     * @return null|float
     */
    public function getValueResidual(): ?float
    {
        return $this->value_residual;
    }

    /**
     * @return null|float
     */
    public function getBookValue(): ?float
    {
        return $this->book_value;
    }

    /**
     * @return null|float
     */
    public function getOriginalValue(): ?float
    {
        return $this->original_value;
    }

    /**
     * @return null|Journal
     */
    public function getJournalId(): ?Journal
    {
        return $this->journal_id;
    }

    /**
     * @return null|AccountAlias
     */
    public function getAccountDepreciationExpenseId(): ?AccountAlias
    {
        return $this->account_depreciation_expense_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
