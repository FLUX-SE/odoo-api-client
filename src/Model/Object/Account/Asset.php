<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.asset
 * ---
 * Name : account.asset
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
final class Asset extends Base
{
    /**
     * # Posted Depreciation Entries
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $depreciation_entries_count;

    /**
     * # Gross Increases
     * ---
     * Number of assets made to increase the value of the asset
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $gross_increase_count;

    /**
     * # Depreciation Entries
     * ---
     * Number of depreciation entries (posted or not)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $total_depreciation_entries_count;

    /**
     * Asset Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

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
     * Status
     * ---
     * When an asset is created, the status is 'Draft'.
     * If the asset is confirmed, the status goes in 'Running' and the depreciation lines can be posted in the
     * accounting.
     * The 'On Hold' status can be set manually when you want to pause the depreciation of an asset for some time.
     * You can manually close an asset when the depreciation is over. If the last line of depreciation is posted, the
     * asset automatically goes in that status.
     * ---
     * Selection : (default value, usually null)
     *     -> model (Model)
     *     -> draft (Draft)
     *     -> open (Running)
     *     -> paused (On Hold)
     *     -> close (Closed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Asset Type
     * ---
     * Selection : (default value, usually null)
     *     -> sale (Sale: Revenue Recognition)
     *     -> purchase (Purchase: Asset)
     *     -> expense (Deferred Expense)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $asset_type;

    /**
     * Method
     * ---
     * Choose the method to use to compute the amount of depreciation lines.
     *     * Linear: Calculated on basis of: Gross Value / Number of Depreciations
     *     * Degressive: Calculated on basis of: Residual Value * Degressive Factor
     *     * Accelerated Degressive: Like Degressive but with a minimum depreciation value equal to the linear value.
     * ---
     * Selection : (default value, usually null)
     *     -> linear (Linear)
     *     -> degressive (Degressive)
     *     -> degressive_then_linear (Accelerated Degressive)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $method;

    /**
     * Number of Depreciations
     * ---
     * The number of depreciations needed to depreciate your asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $method_number;

    /**
     * Number of Months in a Period
     * ---
     * The amount of time between two depreciations
     * ---
     * Selection : (default value, usually null)
     *     -> 1 (Months)
     *     -> 12 (Years)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $method_period;

    /**
     * Degressive Factor
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $method_progress_factor;

    /**
     * Prorata Temporis
     * ---
     * Indicates that the first depreciation entry for this asset have to be done from the asset date (purchase date)
     * instead of the first January / Start date of fiscal year
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $prorata;

    /**
     * Prorata Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $prorata_date;

    /**
     * Fixed Asset Account
     * ---
     * Account used to record the purchase of the asset at its original price.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_asset_id;

    /**
     * Depreciation Account
     * ---
     * Account used in the depreciation entries, to decrease the asset value.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_depreciation_id;

    /**
     * Expense Account
     * ---
     * Account used in the periodical entries, to record a part of the asset as expense.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_depreciation_expense_id;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Original Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $original_value;

    /**
     * Book Value
     * ---
     * Sum of the depreciable value, the salvage value and the book value of all value increase items
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $book_value;

    /**
     * Depreciable Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $value_residual;

    /**
     * Not Depreciable Value
     * ---
     * It is the amount you plan to have that you cannot depreciate.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $salvage_value;

    /**
     * Gross Increase Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $gross_increase_value;

    /**
     * Depreciation Lines
     * ---
     * Relation : one2many (account.move -> asset_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $depreciation_move_ids;

    /**
     * Journal Items
     * ---
     * Relation : one2many (account.move.line -> asset_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $original_move_line_ids;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_analytic_id;

    /**
     * Analytic Tag
     * ---
     * Relation : many2many (account.analytic.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_tag_ids;

    /**
     * First Depreciation Date
     * ---
     * Note that this date does not alter the computation of the first journal entry in case of prorata temporis
     * assets. It simply changes its accounting date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $first_depreciation_date;

    /**
     * Acquisition Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $acquisition_date;

    /**
     * Disposal Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $disposal_date;

    /**
     * Model
     * ---
     * Relation : many2one (account.asset)
     * @see \Flux\OdooApiClient\Model\Object\Account\Asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Type of the account
     * ---
     * Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     * close a fiscal year and generate opening entries.
     * ---
     * Relation : many2one (account.account.type)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $user_type_id;

    /**
     * Display Model Choice
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_model_choice;

    /**
     * Display Account Asset
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_account_asset_id;

    /**
     * Parent
     * ---
     * An asset has a parent when it is the result of gaining value
     * ---
     * Relation : many2one (account.asset)
     * @see \Flux\OdooApiClient\Model\Object\Account\Asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Children
     * ---
     * The children are the gains in value of this asset
     * ---
     * Relation : one2many (account.asset -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Asset
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_ids;

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
     * Selection : (default value, usually null)
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
     * Selection : (default value, usually null)
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
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

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
     * @param string $name Asset Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
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
     * @param DateTimeInterface $first_depreciation_date First Depreciation Date
     *        ---
     *        Note that this date does not alter the computation of the first journal entry in case of prorata temporis
     *        assets. It simply changes its accounting date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $currency_id,
        OdooRelation $company_id,
        DateTimeInterface $first_depreciation_date
    ) {
        $this->name = $name;
        $this->currency_id = $currency_id;
        $this->company_id = $company_id;
        $this->first_depreciation_date = $first_depreciation_date;
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
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @return string|null
     *
     * @SerializedName("activity_summary")
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
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
     * @param OdooRelation[]|null $children_ids
     */
    public function setChildrenIds(?array $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenIds(OdooRelation $item): bool
    {
        if (null === $this->children_ids) {
            return false;
        }

        return in_array($item, $this->children_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildrenIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeChildrenIds(OdooRelation $item): void
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("activity_ids")
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
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
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
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     * @SerializedName("message_has_sms_error")
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("message_main_attachment_id")
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
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
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
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
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
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
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("children_ids")
     */
    public function getChildrenIds(): ?array
    {
        return $this->children_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("depreciation_entries_count")
     */
    public function getDepreciationEntriesCount(): ?int
    {
        return $this->depreciation_entries_count;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("prorata_date")
     */
    public function getProrataDate(): ?DateTimeInterface
    {
        return $this->prorata_date;
    }

    /**
     * @param int|null $method_number
     */
    public function setMethodNumber(?int $method_number): void
    {
        $this->method_number = $method_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("method_period")
     */
    public function getMethodPeriod(): ?string
    {
        return $this->method_period;
    }

    /**
     * @param string|null $method_period
     */
    public function setMethodPeriod(?string $method_period): void
    {
        $this->method_period = $method_period;
    }

    /**
     * @return float|null
     *
     * @SerializedName("method_progress_factor")
     */
    public function getMethodProgressFactor(): ?float
    {
        return $this->method_progress_factor;
    }

    /**
     * @param float|null $method_progress_factor
     */
    public function setMethodProgressFactor(?float $method_progress_factor): void
    {
        $this->method_progress_factor = $method_progress_factor;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("prorata")
     */
    public function isProrata(): ?bool
    {
        return $this->prorata;
    }

    /**
     * @param bool|null $prorata
     */
    public function setProrata(?bool $prorata): void
    {
        $this->prorata = $prorata;
    }

    /**
     * @param DateTimeInterface|null $prorata_date
     */
    public function setProrataDate(?DateTimeInterface $prorata_date): void
    {
        $this->prorata_date = $prorata_date;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_asset_id")
     */
    public function getAccountAssetId(): ?OdooRelation
    {
        return $this->account_asset_id;
    }

    /**
     * @param OdooRelation|null $account_asset_id
     */
    public function setAccountAssetId(?OdooRelation $account_asset_id): void
    {
        $this->account_asset_id = $account_asset_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_depreciation_id")
     */
    public function getAccountDepreciationId(): ?OdooRelation
    {
        return $this->account_depreciation_id;
    }

    /**
     * @param OdooRelation|null $account_depreciation_id
     */
    public function setAccountDepreciationId(?OdooRelation $account_depreciation_id): void
    {
        $this->account_depreciation_id = $account_depreciation_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_depreciation_expense_id")
     */
    public function getAccountDepreciationExpenseId(): ?OdooRelation
    {
        return $this->account_depreciation_expense_id;
    }

    /**
     * @param OdooRelation|null $account_depreciation_expense_id
     */
    public function setAccountDepreciationExpenseId(?OdooRelation $account_depreciation_expense_id): void
    {
        $this->account_depreciation_expense_id = $account_depreciation_expense_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("method_number")
     */
    public function getMethodNumber(): ?int
    {
        return $this->method_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("method")
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @return float|null
     *
     * @SerializedName("original_value")
     */
    public function getOriginalValue(): ?float
    {
        return $this->original_value;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param int|null $depreciation_entries_count
     */
    public function setDepreciationEntriesCount(?int $depreciation_entries_count): void
    {
        $this->depreciation_entries_count = $depreciation_entries_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("gross_increase_count")
     */
    public function getGrossIncreaseCount(): ?int
    {
        return $this->gross_increase_count;
    }

    /**
     * @param int|null $gross_increase_count
     */
    public function setGrossIncreaseCount(?int $gross_increase_count): void
    {
        $this->gross_increase_count = $gross_increase_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("total_depreciation_entries_count")
     */
    public function getTotalDepreciationEntriesCount(): ?int
    {
        return $this->total_depreciation_entries_count;
    }

    /**
     * @param int|null $total_depreciation_entries_count
     */
    public function setTotalDepreciationEntriesCount(?int $total_depreciation_entries_count): void
    {
        $this->total_depreciation_entries_count = $total_depreciation_entries_count;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param string|null $asset_type
     */
    public function setAssetType(?string $asset_type): void
    {
        $this->asset_type = $asset_type;
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
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     *
     * @SerializedName("asset_type")
     */
    public function getAssetType(): ?string
    {
        return $this->asset_type;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param float|null $original_value
     */
    public function setOriginalValue(?float $original_value): void
    {
        $this->original_value = $original_value;
    }

    /**
     * @param bool|null $display_account_asset_id
     */
    public function setDisplayAccountAssetId(?bool $display_account_asset_id): void
    {
        $this->display_account_asset_id = $display_account_asset_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("disposal_date")
     */
    public function getDisposalDate(): ?DateTimeInterface
    {
        return $this->disposal_date;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticTagIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticTagIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeAnalyticTagIds(OdooRelation $item): void
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
     * @return DateTimeInterface
     *
     * @SerializedName("first_depreciation_date")
     */
    public function getFirstDepreciationDate(): DateTimeInterface
    {
        return $this->first_depreciation_date;
    }

    /**
     * @param DateTimeInterface $first_depreciation_date
     */
    public function setFirstDepreciationDate(DateTimeInterface $first_depreciation_date): void
    {
        $this->first_depreciation_date = $first_depreciation_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("acquisition_date")
     */
    public function getAcquisitionDate(): ?DateTimeInterface
    {
        return $this->acquisition_date;
    }

    /**
     * @param DateTimeInterface|null $acquisition_date
     */
    public function setAcquisitionDate(?DateTimeInterface $acquisition_date): void
    {
        $this->acquisition_date = $acquisition_date;
    }

    /**
     * @param DateTimeInterface|null $disposal_date
     */
    public function setDisposalDate(?DateTimeInterface $disposal_date): void
    {
        $this->disposal_date = $disposal_date;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_tag_ids")
     */
    public function getAnalyticTagIds(): ?array
    {
        return $this->analytic_tag_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_type_id")
     */
    public function getUserTypeId(): ?OdooRelation
    {
        return $this->user_type_id;
    }

    /**
     * @param OdooRelation|null $user_type_id
     */
    public function setUserTypeId(?OdooRelation $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_model_choice")
     */
    public function isDisplayModelChoice(): ?bool
    {
        return $this->display_model_choice;
    }

    /**
     * @param bool|null $display_model_choice
     */
    public function setDisplayModelChoice(?bool $display_model_choice): void
    {
        $this->display_model_choice = $display_model_choice;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_account_asset_id")
     */
    public function isDisplayAccountAssetId(): ?bool
    {
        return $this->display_account_asset_id;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param OdooRelation|null $account_analytic_id
     */
    public function setAccountAnalyticId(?OdooRelation $account_analytic_id): void
    {
        $this->account_analytic_id = $account_analytic_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("book_value")
     */
    public function getBookValue(): ?float
    {
        return $this->book_value;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("depreciation_move_ids")
     */
    public function getDepreciationMoveIds(): ?array
    {
        return $this->depreciation_move_ids;
    }

    /**
     * @param float|null $book_value
     */
    public function setBookValue(?float $book_value): void
    {
        $this->book_value = $book_value;
    }

    /**
     * @return float|null
     *
     * @SerializedName("value_residual")
     */
    public function getValueResidual(): ?float
    {
        return $this->value_residual;
    }

    /**
     * @param float|null $value_residual
     */
    public function setValueResidual(?float $value_residual): void
    {
        $this->value_residual = $value_residual;
    }

    /**
     * @return float|null
     *
     * @SerializedName("salvage_value")
     */
    public function getSalvageValue(): ?float
    {
        return $this->salvage_value;
    }

    /**
     * @param float|null $salvage_value
     */
    public function setSalvageValue(?float $salvage_value): void
    {
        $this->salvage_value = $salvage_value;
    }

    /**
     * @return float|null
     *
     * @SerializedName("gross_increase_value")
     */
    public function getGrossIncreaseValue(): ?float
    {
        return $this->gross_increase_value;
    }

    /**
     * @param float|null $gross_increase_value
     */
    public function setGrossIncreaseValue(?float $gross_increase_value): void
    {
        $this->gross_increase_value = $gross_increase_value;
    }

    /**
     * @param OdooRelation[]|null $depreciation_move_ids
     */
    public function setDepreciationMoveIds(?array $depreciation_move_ids): void
    {
        $this->depreciation_move_ids = $depreciation_move_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_analytic_id")
     */
    public function getAccountAnalyticId(): ?OdooRelation
    {
        return $this->account_analytic_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDepreciationMoveIds(OdooRelation $item): bool
    {
        if (null === $this->depreciation_move_ids) {
            return false;
        }

        return in_array($item, $this->depreciation_move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addDepreciationMoveIds(OdooRelation $item): void
    {
        if ($this->hasDepreciationMoveIds($item)) {
            return;
        }

        if (null === $this->depreciation_move_ids) {
            $this->depreciation_move_ids = [];
        }

        $this->depreciation_move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDepreciationMoveIds(OdooRelation $item): void
    {
        if (null === $this->depreciation_move_ids) {
            $this->depreciation_move_ids = [];
        }

        if ($this->hasDepreciationMoveIds($item)) {
            $index = array_search($item, $this->depreciation_move_ids);
            unset($this->depreciation_move_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("original_move_line_ids")
     */
    public function getOriginalMoveLineIds(): ?array
    {
        return $this->original_move_line_ids;
    }

    /**
     * @param OdooRelation[]|null $original_move_line_ids
     */
    public function setOriginalMoveLineIds(?array $original_move_line_ids): void
    {
        $this->original_move_line_ids = $original_move_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOriginalMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->original_move_line_ids) {
            return false;
        }

        return in_array($item, $this->original_move_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOriginalMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasOriginalMoveLineIds($item)) {
            return;
        }

        if (null === $this->original_move_line_ids) {
            $this->original_move_line_ids = [];
        }

        $this->original_move_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOriginalMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->original_move_line_ids) {
            $this->original_move_line_ids = [];
        }

        if ($this->hasOriginalMoveLineIds($item)) {
            $index = array_search($item, $this->original_move_line_ids);
            unset($this->original_move_line_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.asset';
    }
}
