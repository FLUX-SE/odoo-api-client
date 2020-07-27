<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * Selection : (default value, usually null)
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
     * Selection : (default value, usually null)
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
     * Selection : (default value, usually null)
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
     * A warning can be set on a partner (Stock)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_74;

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
     * Display Serial & Lot Number in Delivery Slips
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_70;

    /**
     * Manage Different Stock Owners
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_73;

    /**
     * Manage Lots / Serial Numbers
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_69;

    /**
     * Manage Multiple Stock Locations
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_65;

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
     * Manage Multiple Warehouses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_66;

    /**
     * Manage Packages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_71;

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
     * Manage Push and Pull inventory flows
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_72;

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
     * Selection : (default value, usually null)
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
     * Inventory
     * ---
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 67 (User)
     *     -> 68 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_67_68;

    /**
     * Accounting
     * ---
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 57 (Billing)
     *     -> 60 (Accountant)
     *     -> 61 (Advisor)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_57_60_61;

    /**
     * User types
     * ---
     * Portal: Portal members have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * Public: Public users have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * ---
     * Selection : (default value, usually null)
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
     * Point Of Sale
     * ---
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 75 (User)
     *     -> 76 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_75_76;

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
     *        Selection : (default value, usually null)
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
     * @param bool|null $in_group_52
     */
    public function setInGroup52(?bool $in_group_52): void
    {
        $this->in_group_52 = $in_group_52;
    }

    /**
     * @return bool|null
     */
    public function isInGroup66(): ?bool
    {
        return $this->in_group_66;
    }

    /**
     * @param bool|null $in_group_49
     */
    public function setInGroup49(?bool $in_group_49): void
    {
        $this->in_group_49 = $in_group_49;
    }

    /**
     * @return bool|null
     */
    public function isInGroup49(): ?bool
    {
        return $this->in_group_49;
    }

    /**
     * @param bool|null $in_group_65
     */
    public function setInGroup65(?bool $in_group_65): void
    {
        $this->in_group_65 = $in_group_65;
    }

    /**
     * @return bool|null
     */
    public function isInGroup65(): ?bool
    {
        return $this->in_group_65;
    }

    /**
     * @param bool|null $in_group_69
     */
    public function setInGroup69(?bool $in_group_69): void
    {
        $this->in_group_69 = $in_group_69;
    }

    /**
     * @return bool|null
     */
    public function isInGroup69(): ?bool
    {
        return $this->in_group_69;
    }

    /**
     * @param bool|null $in_group_73
     */
    public function setInGroup73(?bool $in_group_73): void
    {
        $this->in_group_73 = $in_group_73;
    }

    /**
     * @return bool|null
     */
    public function isInGroup73(): ?bool
    {
        return $this->in_group_73;
    }

    /**
     * @param bool|null $in_group_70
     */
    public function setInGroup70(?bool $in_group_70): void
    {
        $this->in_group_70 = $in_group_70;
    }

    /**
     * @return bool|null
     */
    public function isInGroup70(): ?bool
    {
        return $this->in_group_70;
    }

    /**
     * @param bool|null $in_group_56
     */
    public function setInGroup56(?bool $in_group_56): void
    {
        $this->in_group_56 = $in_group_56;
    }

    /**
     * @return bool|null
     */
    public function isInGroup56(): ?bool
    {
        return $this->in_group_56;
    }

    /**
     * @return bool|null
     */
    public function isInGroup52(): ?bool
    {
        return $this->in_group_52;
    }

    /**
     * @return bool|null
     */
    public function isInGroup71(): ?bool
    {
        return $this->in_group_71;
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
     */
    public function isInGroup63(): ?bool
    {
        return $this->in_group_63;
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
     */
    public function isInGroup53(): ?bool
    {
        return $this->in_group_53;
    }

    /**
     * @param bool|null $in_group_74
     */
    public function setInGroup74(?bool $in_group_74): void
    {
        $this->in_group_74 = $in_group_74;
    }

    /**
     * @return bool|null
     */
    public function isInGroup74(): ?bool
    {
        return $this->in_group_74;
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
     */
    public function isInGroup62(): ?bool
    {
        return $this->in_group_62;
    }

    /**
     * @param bool|null $in_group_66
     */
    public function setInGroup66(?bool $in_group_66): void
    {
        $this->in_group_66 = $in_group_66;
    }

    /**
     * @param bool|null $in_group_71
     */
    public function setInGroup71(?bool $in_group_71): void
    {
        $this->in_group_71 = $in_group_71;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string|null
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
     */
    public function isInGroup7(): ?bool
    {
        return $this->in_group_7;
    }

    /**
     * @param string|null $sel_groups_75_76
     */
    public function setSelGroups7576(?string $sel_groups_75_76): void
    {
        $this->sel_groups_75_76 = $sel_groups_75_76;
    }

    /**
     * @return string|null
     */
    public function getSelGroups7576(): ?string
    {
        return $this->sel_groups_75_76;
    }

    /**
     * @param string|null $sel_groups_1_8_9
     */
    public function setSelGroups189(?string $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @param string|null $sel_groups_57_60_61
     */
    public function setSelGroups576061(?string $sel_groups_57_60_61): void
    {
        $this->sel_groups_57_60_61 = $sel_groups_57_60_61;
    }

    /**
     * @return bool|null
     */
    public function isInGroup54(): ?bool
    {
        return $this->in_group_54;
    }

    /**
     * @return string|null
     */
    public function getSelGroups576061(): ?string
    {
        return $this->sel_groups_57_60_61;
    }

    /**
     * @param string|null $sel_groups_67_68
     */
    public function setSelGroups6768(?string $sel_groups_67_68): void
    {
        $this->sel_groups_67_68 = $sel_groups_67_68;
    }

    /**
     * @return string|null
     */
    public function getSelGroups6768(): ?string
    {
        return $this->sel_groups_67_68;
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
     */
    public function isInGroup58(): ?bool
    {
        return $this->in_group_58;
    }

    /**
     * @param bool|null $in_group_72
     */
    public function setInGroup72(?bool $in_group_72): void
    {
        $this->in_group_72 = $in_group_72;
    }

    /**
     * @return bool|null
     */
    public function isInGroup72(): ?bool
    {
        return $this->in_group_72;
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param string|null $out_of_office_message
     */
    public function setOutOfOfficeMessage(?string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
    }

    /**
     * @return OdooRelation
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
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
     * @param int|null $companies_count
     */
    public function setCompaniesCount(?int $companies_count): void
    {
        $this->companies_count = $companies_count;
    }

    /**
     * @return int|null
     */
    public function getCompaniesCount(): ?int
    {
        return $this->companies_count;
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
     */
    public function isShare(): ?bool
    {
        return $this->share;
    }

    /**
     * @param DateTimeInterface|null $login_date
     */
    public function setLoginDate(?DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
    }

    /**
     * @return DateTimeInterface|null
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
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
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
     * @return OdooRelation[]|null
     */
    public function getCompanyIds(): ?array
    {
        return $this->company_ids;
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
     * @return string|null
     */
    public function getOutOfOfficeMessage(): ?string
    {
        return $this->out_of_office_message;
    }

    /**
     * @param OdooRelation|null $alias_id
     */
    public function setAliasId(?OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
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
     */
    public function getModerationChannelIds(): ?array
    {
        return $this->moderation_channel_ids;
    }

    /**
     * @param int|null $moderation_counter
     */
    public function setModerationCounter(?int $moderation_counter): void
    {
        $this->moderation_counter = $moderation_counter;
    }

    /**
     * @return int|null
     */
    public function getModerationCounter(): ?int
    {
        return $this->moderation_counter;
    }

    /**
     * @param bool|null $is_moderator
     */
    public function setIsModerator(?bool $is_moderator): void
    {
        $this->is_moderator = $is_moderator;
    }

    /**
     * @return bool|null
     */
    public function isIsModerator(): ?bool
    {
        return $this->is_moderator;
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
     */
    public function getAliasContact(): ?string
    {
        return $this->alias_contact;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAliasId(): ?OdooRelation
    {
        return $this->alias_id;
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
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return OdooRelation|null
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
     * @param OdooRelation[]|null $resource_ids
     */
    public function setResourceIds(?array $resource_ids): void
    {
        $this->resource_ids = $resource_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getResourceIds(): ?array
    {
        return $this->resource_ids;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.users';
    }
}
