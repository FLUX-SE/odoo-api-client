<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.users
 * ---
 * Name : res.users
 * ---
 * Info :
 * Update of res.users class
 *                 - add a preference about sending emails about notifications
 *                 - make a new user follow itself
 *                 - add a welcome message
 *                 - add suggestion preference
 *                 - if adding groups to a user, check mail.channels linked to this user
 *                     group, and the user. This is done by overriding the write method.
 */
final class Users extends Partner
{
    /**
     * Related Partner
     * ---
     * Partner-related data of the user
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Login
     * ---
     * Used to log into the system
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $login;

    /**
     * Password
     * ---
     * Keep empty if you don't want the user to be able to connect on the system.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $password;

    /**
     * Set Password
     * ---
     * Specify a value only when creating a user or if you're changing the user's password, otherwise leave empty.
     * After a change of password, the user has to login again.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $new_password;

    /**
     * Email Signature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $signature;

    /**
     * Partner is Active
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $active_partner;

    /**
     * Home Action
     * ---
     * If specified, this action will be opened at log on for this user, in addition to the standard menu.
     * ---
     * Relation : many2one (ir.actions.actions)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Actions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $action_id;

    /**
     * Groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups_id;

    /**
     * User log entries
     * ---
     * Relation : one2many (res.users.log -> create_uid)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users\Log
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $log_ids;

    /**
     * Latest authentication
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $login_date;

    /**
     * Share User
     * ---
     * External user with limited access, created only for the purpose of sharing data.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $share;

    /**
     * Number of Companies
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $companies_count;

    /**
     * Companies
     * ---
     * Relation : many2many (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $company_ids;

    /**
     * # Access Rights
     * ---
     * Number of access rights that apply to the current user
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $accesses_count;

    /**
     * # Record Rules
     * ---
     * Number of record rules that apply to the current user
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $rules_count;

    /**
     * # Groups
     * ---
     * Number of groups that apply to the current user
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $groups_count;

    /**
     * Resources
     * ---
     * Relation : one2many (resource.resource -> user_id)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Resource_
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $resource_ids;

    /**
     * Default Working Hours
     * ---
     * Define the schedule of resource
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Flux\OdooApiClient\Model\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Alias
     * ---
     * Email address internally associated with this user. Incoming emails will appear in the user's notifications.
     * ---
     * Relation : many2one (mail.alias)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Alias
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $alias_id;

    /**
     * Alias Contact Security
     * ---
     * Policy to post a message on the document using the mailgateway.
     * - everyone: everyone can post
     * - partners: only authenticated partners
     * - followers: only followers of the related document or members of following channels
     *
     * ---
     * Selection :
     *     -> everyone (Everyone)
     *     -> partners (Authenticated Partners)
     *     -> followers (Followers only)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $alias_contact;

    /**
     * Notification
     * ---
     * Policy on how to handle Chatter notifications:
     * - Handle by Emails: notifications are sent to your email address
     * - Handle in Odoo: notifications appear in your Odoo Inbox
     * ---
     * Selection :
     *     -> email (Handle by Emails)
     *     -> inbox (Handle in Odoo)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $notification_type;

    /**
     * Is moderator
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_moderator;

    /**
     * Moderation count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $moderation_counter;

    /**
     * Moderated channels
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $moderation_channel_ids;

    /**
     * Chat Status
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $out_of_office_message;

    /**
     * Status
     * ---
     * Selection :
     *     -> new (Never Connected)
     *     -> active (Confirmed)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * A warning can be set on a partner (Account)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_62;

    /**
     * Advanced Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_53;

    /**
     * Allow the cash rounding management
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_63;

    /**
     * Allow to define fiscal years of more or less than a year
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_64;

    /**
     * Analytic Accounting
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_50;

    /**
     * Analytic Accounting Tags
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_51;

    /**
     * Basic Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_52;

    /**
     * Discount on lines
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_56;

    /**
     * Manage Multiple Units of Measure
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_49;

    /**
     * Manage Product Packaging
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_54;

    /**
     * Manage Product Variants
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_55;

    /**
     * Show Full Accounting Features
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_60;

    /**
     * Tax display B2B
     * ---
     * Show line subtotals without taxes (B2B)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_58;

    /**
     * Tax display B2C
     * ---
     * Show line subtotals with taxes included (B2C)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_59;

    /**
     * Administration
     * ---
     * Selection :
     *     ->  ()
     *     -> 2 (Access Rights)
     *     -> 3 (Settings)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_2_3;

    /**
     * Invoicing
     * ---
     * Selection :
     *     ->  ()
     *     -> 57 (Billing)
     *     -> 61 (Billing Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_57_61;

    /**
     * User types
     * ---
     * Portal: Portal members have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * Public: Public users have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * ---
     * Selection :
     *     -> 1 (Internal User)
     *     -> 8 (Portal)
     *     -> 9 (Public)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_1_8_9;

    /**
     * Contact Creation
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_7;

    /**
     * Multi Companies
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_4;

    /**
     * Multi Currencies
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_5;

    /**
     * Technical Features
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_6;

    /**
     * Access to Private Addresses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_10;

    /**
     * @param OdooRelation $partner_id Related Partner
     *        ---
     *        Partner-related data of the user
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $login Login
     *        ---
     *        Used to log into the system
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        The default company for this user.
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $notification_type Notification
     *        ---
     *        Policy on how to handle Chatter notifications:
     *        - Handle by Emails: notifications are sent to your email address
     *        - Handle in Odoo: notifications appear in your Odoo Inbox
     *        ---
     *        Selection :
     *            -> email (Handle by Emails)
     *            -> inbox (Handle in Odoo)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $property_account_payable_id Account Payable
     *        ---
     *        This account will be used instead of the default one as the payable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $property_account_receivable_id Account Receivable
     *        ---
     *        This account will be used instead of the default one as the receivable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $partner_id,
        string $login,
        OdooRelation $company_id,
        string $notification_type,
        OdooRelation $property_account_payable_id,
        OdooRelation $property_account_receivable_id
    ) {
        $this->partner_id = $partner_id;
        $this->login = $login;
        $this->company_id = $company_id;
        $this->notification_type = $notification_type;
        parent::__construct($property_account_payable_id, $property_account_receivable_id);
    }

    /**
     * @param bool|null $in_group_53
     */
    public function setInGroup53(?bool $in_group_53): void
    {
        $this->in_group_53 = $in_group_53;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_56")
     */
    public function isInGroup56(): ?bool
    {
        return $this->in_group_56;
    }

    /**
     * @param bool|null $in_group_52
     */
    public function setInGroup52(?bool $in_group_52): void
    {
        $this->in_group_52 = $in_group_52;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_52")
     */
    public function isInGroup52(): ?bool
    {
        return $this->in_group_52;
    }

    /**
     * @param bool|null $in_group_51
     */
    public function setInGroup51(?bool $in_group_51): void
    {
        $this->in_group_51 = $in_group_51;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_51")
     */
    public function isInGroup51(): ?bool
    {
        return $this->in_group_51;
    }

    /**
     * @param bool|null $in_group_50
     */
    public function setInGroup50(?bool $in_group_50): void
    {
        $this->in_group_50 = $in_group_50;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_50")
     */
    public function isInGroup50(): ?bool
    {
        return $this->in_group_50;
    }

    /**
     * @param bool|null $in_group_64
     */
    public function setInGroup64(?bool $in_group_64): void
    {
        $this->in_group_64 = $in_group_64;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_64")
     */
    public function isInGroup64(): ?bool
    {
        return $this->in_group_64;
    }

    /**
     * @param bool|null $in_group_63
     */
    public function setInGroup63(?bool $in_group_63): void
    {
        $this->in_group_63 = $in_group_63;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_63")
     */
    public function isInGroup63(): ?bool
    {
        return $this->in_group_63;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_53")
     */
    public function isInGroup53(): ?bool
    {
        return $this->in_group_53;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_49")
     */
    public function isInGroup49(): ?bool
    {
        return $this->in_group_49;
    }

    /**
     * @param bool|null $in_group_62
     */
    public function setInGroup62(?bool $in_group_62): void
    {
        $this->in_group_62 = $in_group_62;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_62")
     */
    public function isInGroup62(): ?bool
    {
        return $this->in_group_62;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param string|null $out_of_office_message
     */
    public function setOutOfOfficeMessage(?string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("out_of_office_message")
     */
    public function getOutOfOfficeMessage(): ?string
    {
        return $this->out_of_office_message;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModerationChannelIds(OdooRelation $item): void
    {
        if (null === $this->moderation_channel_ids) {
            $this->moderation_channel_ids = [];
        }

        if ($this->hasModerationChannelIds($item)) {
            $index = array_search($item, $this->moderation_channel_ids);
            unset($this->moderation_channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addModerationChannelIds(OdooRelation $item): void
    {
        if ($this->hasModerationChannelIds($item)) {
            return;
        }

        if (null === $this->moderation_channel_ids) {
            $this->moderation_channel_ids = [];
        }

        $this->moderation_channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModerationChannelIds(OdooRelation $item): bool
    {
        if (null === $this->moderation_channel_ids) {
            return false;
        }

        return in_array($item, $this->moderation_channel_ids);
    }

    /**
     * @param OdooRelation[]|null $moderation_channel_ids
     */
    public function setModerationChannelIds(?array $moderation_channel_ids): void
    {
        $this->moderation_channel_ids = $moderation_channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("moderation_channel_ids")
     */
    public function getModerationChannelIds(): ?array
    {
        return $this->moderation_channel_ids;
    }

    /**
     * @param bool|null $in_group_56
     */
    public function setInGroup56(?bool $in_group_56): void
    {
        $this->in_group_56 = $in_group_56;
    }

    /**
     * @param bool|null $in_group_49
     */
    public function setInGroup49(?bool $in_group_49): void
    {
        $this->in_group_49 = $in_group_49;
    }

    /**
     * @return int|null
     *
     * @SerializedName("moderation_counter")
     */
    public function getModerationCounter(): ?int
    {
        return $this->moderation_counter;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_1_8_9")
     */
    public function getSelGroups189(): ?string
    {
        return $this->sel_groups_1_8_9;
    }

    /**
     * @param bool|null $in_group_10
     */
    public function setInGroup10(?bool $in_group_10): void
    {
        $this->in_group_10 = $in_group_10;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_10")
     */
    public function isInGroup10(): ?bool
    {
        return $this->in_group_10;
    }

    /**
     * @param bool|null $in_group_6
     */
    public function setInGroup6(?bool $in_group_6): void
    {
        $this->in_group_6 = $in_group_6;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_6")
     */
    public function isInGroup6(): ?bool
    {
        return $this->in_group_6;
    }

    /**
     * @param bool|null $in_group_5
     */
    public function setInGroup5(?bool $in_group_5): void
    {
        $this->in_group_5 = $in_group_5;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_5")
     */
    public function isInGroup5(): ?bool
    {
        return $this->in_group_5;
    }

    /**
     * @param bool|null $in_group_4
     */
    public function setInGroup4(?bool $in_group_4): void
    {
        $this->in_group_4 = $in_group_4;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_4")
     */
    public function isInGroup4(): ?bool
    {
        return $this->in_group_4;
    }

    /**
     * @param bool|null $in_group_7
     */
    public function setInGroup7(?bool $in_group_7): void
    {
        $this->in_group_7 = $in_group_7;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_7")
     */
    public function isInGroup7(): ?bool
    {
        return $this->in_group_7;
    }

    /**
     * @param string|null $sel_groups_1_8_9
     */
    public function setSelGroups189(?string $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @param string|null $sel_groups_57_61
     */
    public function setSelGroups5761(?string $sel_groups_57_61): void
    {
        $this->sel_groups_57_61 = $sel_groups_57_61;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_54")
     */
    public function isInGroup54(): ?bool
    {
        return $this->in_group_54;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_57_61")
     */
    public function getSelGroups5761(): ?string
    {
        return $this->sel_groups_57_61;
    }

    /**
     * @param string|null $sel_groups_2_3
     */
    public function setSelGroups23(?string $sel_groups_2_3): void
    {
        $this->sel_groups_2_3 = $sel_groups_2_3;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_2_3")
     */
    public function getSelGroups23(): ?string
    {
        return $this->sel_groups_2_3;
    }

    /**
     * @param bool|null $in_group_59
     */
    public function setInGroup59(?bool $in_group_59): void
    {
        $this->in_group_59 = $in_group_59;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_59")
     */
    public function isInGroup59(): ?bool
    {
        return $this->in_group_59;
    }

    /**
     * @param bool|null $in_group_58
     */
    public function setInGroup58(?bool $in_group_58): void
    {
        $this->in_group_58 = $in_group_58;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_58")
     */
    public function isInGroup58(): ?bool
    {
        return $this->in_group_58;
    }

    /**
     * @param bool|null $in_group_60
     */
    public function setInGroup60(?bool $in_group_60): void
    {
        $this->in_group_60 = $in_group_60;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_60")
     */
    public function isInGroup60(): ?bool
    {
        return $this->in_group_60;
    }

    /**
     * @param bool|null $in_group_55
     */
    public function setInGroup55(?bool $in_group_55): void
    {
        $this->in_group_55 = $in_group_55;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_55")
     */
    public function isInGroup55(): ?bool
    {
        return $this->in_group_55;
    }

    /**
     * @param bool|null $in_group_54
     */
    public function setInGroup54(?bool $in_group_54): void
    {
        $this->in_group_54 = $in_group_54;
    }

    /**
     * @param int|null $moderation_counter
     */
    public function setModerationCounter(?int $moderation_counter): void
    {
        $this->moderation_counter = $moderation_counter;
    }

    /**
     * @param bool|null $is_moderator
     */
    public function setIsModerator(?bool $is_moderator): void
    {
        $this->is_moderator = $is_moderator;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("login_date")
     */
    public function getLoginDate(): ?DateTimeInterface
    {
        return $this->login_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLogIds(OdooRelation $item): void
    {
        if (null === $this->log_ids) {
            $this->log_ids = [];
        }

        if ($this->hasLogIds($item)) {
            $index = array_search($item, $this->log_ids);
            unset($this->log_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addLogIds(OdooRelation $item): void
    {
        if ($this->hasLogIds($item)) {
            return;
        }

        if (null === $this->log_ids) {
            $this->log_ids = [];
        }

        $this->log_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLogIds(OdooRelation $item): bool
    {
        if (null === $this->log_ids) {
            return false;
        }

        return in_array($item, $this->log_ids);
    }

    /**
     * @param OdooRelation[]|null $log_ids
     */
    public function setLogIds(?array $log_ids): void
    {
        $this->log_ids = $log_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("log_ids")
     */
    public function getLogIds(): ?array
    {
        return $this->log_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroupsId(OdooRelation $item): void
    {
        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        if ($this->hasGroupsId($item)) {
            $index = array_search($item, $this->groups_id);
            unset($this->groups_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addGroupsId(OdooRelation $item): void
    {
        if ($this->hasGroupsId($item)) {
            return;
        }

        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        $this->groups_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroupsId(OdooRelation $item): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id);
    }

    /**
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups_id")
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("action_id")
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("share")
     */
    public function isShare(): ?bool
    {
        return $this->share;
    }

    /**
     * @param bool|null $active_partner
     */
    public function setActivePartner(?bool $active_partner): void
    {
        $this->active_partner = $active_partner;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active_partner")
     */
    public function isActivePartner(): ?bool
    {
        return $this->active_partner;
    }

    /**
     * @param string|null $signature
     */
    public function setSignature(?string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signature")
     */
    public function getSignature(): ?string
    {
        return $this->signature;
    }

    /**
     * @param string|null $new_password
     */
    public function setNewPassword(?string $new_password): void
    {
        $this->new_password = $new_password;
    }

    /**
     * @return string|null
     *
     * @SerializedName("new_password")
     */
    public function getNewPassword(): ?string
    {
        return $this->new_password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     *
     * @SerializedName("password")
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     *
     * @SerializedName("login")
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param DateTimeInterface|null $login_date
     */
    public function setLoginDate(?DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
    }

    /**
     * @param bool|null $share
     */
    public function setShare(?bool $share): void
    {
        $this->share = $share;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_moderator")
     */
    public function isIsModerator(): ?bool
    {
        return $this->is_moderator;
    }

    /**
     * @param OdooRelation[]|null $resource_ids
     */
    public function setResourceIds(?array $resource_ids): void
    {
        $this->resource_ids = $resource_ids;
    }

    /**
     * @param string $notification_type
     */
    public function setNotificationType(string $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @return string
     *
     * @SerializedName("notification_type")
     */
    public function getNotificationType(): string
    {
        return $this->notification_type;
    }

    /**
     * @param string|null $alias_contact
     */
    public function setAliasContact(?string $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @return string|null
     *
     * @SerializedName("alias_contact")
     */
    public function getAliasContact(): ?string
    {
        return $this->alias_contact;
    }

    /**
     * @param OdooRelation|null $alias_id
     */
    public function setAliasId(?OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("alias_id")
     */
    public function getAliasId(): ?OdooRelation
    {
        return $this->alias_id;
    }

    /**
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeResourceIds(OdooRelation $item): void
    {
        if (null === $this->resource_ids) {
            $this->resource_ids = [];
        }

        if ($this->hasResourceIds($item)) {
            $index = array_search($item, $this->resource_ids);
            unset($this->resource_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addResourceIds(OdooRelation $item): void
    {
        if ($this->hasResourceIds($item)) {
            return;
        }

        if (null === $this->resource_ids) {
            $this->resource_ids = [];
        }

        $this->resource_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasResourceIds(OdooRelation $item): bool
    {
        if (null === $this->resource_ids) {
            return false;
        }

        return in_array($item, $this->resource_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("resource_ids")
     */
    public function getResourceIds(): ?array
    {
        return $this->resource_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("companies_count")
     */
    public function getCompaniesCount(): ?int
    {
        return $this->companies_count;
    }

    /**
     * @param int|null $groups_count
     */
    public function setGroupsCount(?int $groups_count): void
    {
        $this->groups_count = $groups_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("groups_count")
     */
    public function getGroupsCount(): ?int
    {
        return $this->groups_count;
    }

    /**
     * @param int|null $rules_count
     */
    public function setRulesCount(?int $rules_count): void
    {
        $this->rules_count = $rules_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("rules_count")
     */
    public function getRulesCount(): ?int
    {
        return $this->rules_count;
    }

    /**
     * @param int|null $accesses_count
     */
    public function setAccessesCount(?int $accesses_count): void
    {
        $this->accesses_count = $accesses_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("accesses_count")
     */
    public function getAccessesCount(): ?int
    {
        return $this->accesses_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCompanyIds(OdooRelation $item): void
    {
        if (null === $this->company_ids) {
            $this->company_ids = [];
        }

        if ($this->hasCompanyIds($item)) {
            $index = array_search($item, $this->company_ids);
            unset($this->company_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCompanyIds(OdooRelation $item): void
    {
        if ($this->hasCompanyIds($item)) {
            return;
        }

        if (null === $this->company_ids) {
            $this->company_ids = [];
        }

        $this->company_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCompanyIds(OdooRelation $item): bool
    {
        if (null === $this->company_ids) {
            return false;
        }

        return in_array($item, $this->company_ids);
    }

    /**
     * @param OdooRelation[]|null $company_ids
     */
    public function setCompanyIds(?array $company_ids): void
    {
        $this->company_ids = $company_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("company_ids")
     */
    public function getCompanyIds(): ?array
    {
        return $this->company_ids;
    }

    /**
     * @param int|null $companies_count
     */
    public function setCompaniesCount(?int $companies_count): void
    {
        $this->companies_count = $companies_count;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.users';
    }
}