<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : res.users
 * Name : res.users
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
    public const ODOO_MODEL_NAME = 'res.users';

    /**
     * Related Partner
     * Partner-related data of the user
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Login
     * Used to log into the system
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $login;

    /**
     * Password
     * Keep empty if you don't want the user to be able to connect on the system.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $password;

    /**
     * Set Password
     * Specify a value only when creating a user or if you're changing the user's password, otherwise leave empty.
     * After a change of password, the user has to login again.
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $new_password;

    /**
     * Email Signature
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $signature;

    /**
     * Partner is Active
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $active_partner;

    /**
     * Home Action
     * If specified, this action will be opened at log on for this user, in addition to the standard menu.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $action_id;

    /**
     * Groups
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups_id;

    /**
     * User log entries
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $log_ids;

    /**
     * Latest authentication
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $login_date;

    /**
     * Share User
     * External user with limited access, created only for the purpose of sharing data.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $share;

    /**
     * Number of Companies
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $companies_count;

    /**
     * Companies
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $company_ids;

    /**
     * # Access Rights
     * Number of access rights that apply to the current user
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $accesses_count;

    /**
     * # Record Rules
     * Number of record rules that apply to the current user
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $rules_count;

    /**
     * # Groups
     * Number of groups that apply to the current user
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $groups_count;

    /**
     * Resources
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $resource_ids;

    /**
     * Default Working Hours
     * Define the schedule of resource
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Alias
     * Email address internally associated with this user. Incoming emails will appear in the user's notifications.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $alias_id;

    /**
     * Alias Contact Security
     * Policy to post a message on the document using the mailgateway.
     * - everyone: everyone can post
     * - partners: only authenticated partners
     * - followers: only followers of the related document or members of following channels
     *
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> everyone (Everyone)
     *     -> partners (Authenticated Partners)
     *     -> followers (Followers only)
     *
     *
     * @var string|null
     */
    private $alias_contact;

    /**
     * Notification
     * Policy on how to handle Chatter notifications:
     * - Handle by Emails: notifications are sent to your email address
     * - Handle in Odoo: notifications appear in your Odoo Inbox
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> email (Handle by Emails)
     *     -> inbox (Handle in Odoo)
     *
     *
     * @var string
     */
    private $notification_type;

    /**
     * Is moderator
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_moderator;

    /**
     * Moderation count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $moderation_counter;

    /**
     * Moderated channels
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $moderation_channel_ids;

    /**
     * Chat Status
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $out_of_office_message;

    /**
     * Status
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> new (Never Connected)
     *     -> active (Confirmed)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * OdooBot Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> not_initialized (Not initialized)
     *     -> onboarding_emoji (Onboarding emoji)
     *     -> onboarding_attachement (Onboarding attachement)
     *     -> onboarding_command (Onboarding command)
     *     -> onboarding_ping (Onboarding ping)
     *     -> idle (Idle)
     *     -> disabled (Disabled)
     *
     *
     * @var string
     */
    private $odoobot_state;

    /**
     * User's Sales Team
     * Sales Team the user is member of. Used to compute the members of a Sales Team through the inverse one2many
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_team_id;

    /**
     * A warning can be set on a partner (Account)
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_27;

    /**
     * A warning can be set on a product or a customer (Sale)
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_32;

    /**
     * Addresses in Sales Orders
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_31;

    /**
     * Advanced Pricelists
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_15;

    /**
     * Allow the cash rounding management
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_28;

    /**
     * Allow to define fiscal years of more or less than a year
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_29;

    /**
     * Analytic Accounting
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_12;

    /**
     * Analytic Accounting Tags
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_13;

    /**
     * Basic Pricelists
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_14;

    /**
     * Discount on lines
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_18;

    /**
     * Lock Confirmed Sales
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_30;

    /**
     * Manage Multiple Units of Measure
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_11;

    /**
     * Manage Product Packaging
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_16;

    /**
     * Manage Product Variants
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_17;

    /**
     * Pro-forma Invoices
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_33;

    /**
     * Quotation Templates
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_34;

    /**
     * Tax display B2B
     * Show line subtotals without taxes (B2B)
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_23;

    /**
     * Tax display B2C
     * Show line subtotals with taxes included (B2C)
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_24;

    /**
     * Administration
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 2 (Access Rights)
     *     -> 3 (Settings)
     *
     *
     * @var string|null
     */
    private $sel_groups_2_3;

    /**
     * Sales
     * User: Own Documents Only: the user will have access to his own data in the sales application.
     * User: All Documents: the user will have access to all records of everyone in the sales application.
     * Administrator: the user will have an access to the sales configuration as well as statistic reports.
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 19 (User: Own Documents Only)
     *     -> 20 (User: All Documents)
     *     -> 21 (Administrator)
     *
     *
     * @var string|null
     */
    private $sel_groups_19_20_21;

    /**
     * Accounting
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     ->  ()
     *     -> 22 (Billing)
     *     -> 25 (Accountant)
     *     -> 26 (Advisor)
     *
     *
     * @var string|null
     */
    private $sel_groups_22_25_26;

    /**
     * User types
     * Portal: Portal members have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * Public: Public users have specific access rights (such as record rules and restricted menus).
     *                                 They usually do not belong to the usual Odoo groups.
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> 1 (Internal User)
     *     -> 8 (Portal)
     *     -> 9 (Public)
     *
     *
     * @var string|null
     */
    private $sel_groups_1_8_9;

    /**
     * Contact Creation
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_7;

    /**
     * Multi Companies
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_4;

    /**
     * Multi Currencies
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_5;

    /**
     * Technical Features
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_6;

    /**
     * Access to Private Addresses
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_10;

    /**
     * @param OdooRelation $partner_id Related Partner
     *        Partner-related data of the user
     *        Searchable : yes
     *        Sortable : yes
     * @param string $login Login
     *        Used to log into the system
     *        Searchable : yes
     *        Sortable : yes
     * @param string $notification_type Notification
     *        Policy on how to handle Chatter notifications:
     *        - Handle by Emails: notifications are sent to your email address
     *        - Handle in Odoo: notifications appear in your Odoo Inbox
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> email (Handle by Emails)
     *            -> inbox (Handle in Odoo)
     *
     * @param string $odoobot_state OdooBot Status
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> not_initialized (Not initialized)
     *            -> onboarding_emoji (Onboarding emoji)
     *            -> onboarding_attachement (Onboarding attachement)
     *            -> onboarding_command (Onboarding command)
     *            -> onboarding_ping (Onboarding ping)
     *            -> idle (Idle)
     *            -> disabled (Disabled)
     *
     * @param OdooRelation $property_account_payable_id Account Payable
     *        This account will be used instead of the default one as the payable account for the current partner
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $property_account_receivable_id Account Receivable
     *        This account will be used instead of the default one as the receivable account for the current partner
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $partner_id,
        string $login,
        string $notification_type,
        string $odoobot_state,
        OdooRelation $property_account_payable_id,
        OdooRelation $property_account_receivable_id
    ) {
        $this->partner_id = $partner_id;
        $this->login = $login;
        $this->notification_type = $notification_type;
        $this->odoobot_state = $odoobot_state;
        parent::__construct($property_account_payable_id, $property_account_receivable_id);
    }

    /**
     * @return bool|null
     */
    public function isInGroup28(): ?bool
    {
        return $this->in_group_28;
    }

    /**
     * @return bool|null
     */
    public function isInGroup30(): ?bool
    {
        return $this->in_group_30;
    }

    /**
     * @param bool|null $in_group_18
     */
    public function setInGroup18(?bool $in_group_18): void
    {
        $this->in_group_18 = $in_group_18;
    }

    /**
     * @return bool|null
     */
    public function isInGroup18(): ?bool
    {
        return $this->in_group_18;
    }

    /**
     * @param bool|null $in_group_14
     */
    public function setInGroup14(?bool $in_group_14): void
    {
        $this->in_group_14 = $in_group_14;
    }

    /**
     * @return bool|null
     */
    public function isInGroup14(): ?bool
    {
        return $this->in_group_14;
    }

    /**
     * @param bool|null $in_group_13
     */
    public function setInGroup13(?bool $in_group_13): void
    {
        $this->in_group_13 = $in_group_13;
    }

    /**
     * @return bool|null
     */
    public function isInGroup13(): ?bool
    {
        return $this->in_group_13;
    }

    /**
     * @param bool|null $in_group_12
     */
    public function setInGroup12(?bool $in_group_12): void
    {
        $this->in_group_12 = $in_group_12;
    }

    /**
     * @return bool|null
     */
    public function isInGroup12(): ?bool
    {
        return $this->in_group_12;
    }

    /**
     * @param bool|null $in_group_29
     */
    public function setInGroup29(?bool $in_group_29): void
    {
        $this->in_group_29 = $in_group_29;
    }

    /**
     * @return bool|null
     */
    public function isInGroup29(): ?bool
    {
        return $this->in_group_29;
    }

    /**
     * @param bool|null $in_group_28
     */
    public function setInGroup28(?bool $in_group_28): void
    {
        $this->in_group_28 = $in_group_28;
    }

    /**
     * @param bool|null $in_group_15
     */
    public function setInGroup15(?bool $in_group_15): void
    {
        $this->in_group_15 = $in_group_15;
    }

    /**
     * @return bool|null
     */
    public function isInGroup11(): ?bool
    {
        return $this->in_group_11;
    }

    /**
     * @return bool|null
     */
    public function isInGroup15(): ?bool
    {
        return $this->in_group_15;
    }

    /**
     * @param bool|null $in_group_31
     */
    public function setInGroup31(?bool $in_group_31): void
    {
        $this->in_group_31 = $in_group_31;
    }

    /**
     * @return bool|null
     */
    public function isInGroup31(): ?bool
    {
        return $this->in_group_31;
    }

    /**
     * @param bool|null $in_group_32
     */
    public function setInGroup32(?bool $in_group_32): void
    {
        $this->in_group_32 = $in_group_32;
    }

    /**
     * @return bool|null
     */
    public function isInGroup32(): ?bool
    {
        return $this->in_group_32;
    }

    /**
     * @param bool|null $in_group_27
     */
    public function setInGroup27(?bool $in_group_27): void
    {
        $this->in_group_27 = $in_group_27;
    }

    /**
     * @return bool|null
     */
    public function isInGroup27(): ?bool
    {
        return $this->in_group_27;
    }

    /**
     * @param OdooRelation|null $sale_team_id
     */
    public function setSaleTeamId(?OdooRelation $sale_team_id): void
    {
        $this->sale_team_id = $sale_team_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSaleTeamId(): ?OdooRelation
    {
        return $this->sale_team_id;
    }

    /**
     * @param string $odoobot_state
     */
    public function setOdoobotState(string $odoobot_state): void
    {
        $this->odoobot_state = $odoobot_state;
    }

    /**
     * @return string
     */
    public function getOdoobotState(): string
    {
        return $this->odoobot_state;
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
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param bool|null $in_group_30
     */
    public function setInGroup30(?bool $in_group_30): void
    {
        $this->in_group_30 = $in_group_30;
    }

    /**
     * @param bool|null $in_group_11
     */
    public function setInGroup11(?bool $in_group_11): void
    {
        $this->in_group_11 = $in_group_11;
    }

    /**
     * @return string|null
     */
    public function getOutOfOfficeMessage(): ?string
    {
        return $this->out_of_office_message;
    }

    /**
     * @param string|null $sel_groups_19_20_21
     */
    public function setSelGroups192021(?string $sel_groups_19_20_21): void
    {
        $this->sel_groups_19_20_21 = $sel_groups_19_20_21;
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
     * @param string|null $sel_groups_1_8_9
     */
    public function setSelGroups189(?string $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @return string|null
     */
    public function getSelGroups189(): ?string
    {
        return $this->sel_groups_1_8_9;
    }

    /**
     * @param string|null $sel_groups_22_25_26
     */
    public function setSelGroups222526(?string $sel_groups_22_25_26): void
    {
        $this->sel_groups_22_25_26 = $sel_groups_22_25_26;
    }

    /**
     * @return string|null
     */
    public function getSelGroups222526(): ?string
    {
        return $this->sel_groups_22_25_26;
    }

    /**
     * @return string|null
     */
    public function getSelGroups192021(): ?string
    {
        return $this->sel_groups_19_20_21;
    }

    /**
     * @return bool|null
     */
    public function isInGroup16(): ?bool
    {
        return $this->in_group_16;
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
     * @param bool|null $in_group_24
     */
    public function setInGroup24(?bool $in_group_24): void
    {
        $this->in_group_24 = $in_group_24;
    }

    /**
     * @return bool|null
     */
    public function isInGroup24(): ?bool
    {
        return $this->in_group_24;
    }

    /**
     * @param bool|null $in_group_23
     */
    public function setInGroup23(?bool $in_group_23): void
    {
        $this->in_group_23 = $in_group_23;
    }

    /**
     * @return bool|null
     */
    public function isInGroup23(): ?bool
    {
        return $this->in_group_23;
    }

    /**
     * @param bool|null $in_group_34
     */
    public function setInGroup34(?bool $in_group_34): void
    {
        $this->in_group_34 = $in_group_34;
    }

    /**
     * @return bool|null
     */
    public function isInGroup34(): ?bool
    {
        return $this->in_group_34;
    }

    /**
     * @param bool|null $in_group_33
     */
    public function setInGroup33(?bool $in_group_33): void
    {
        $this->in_group_33 = $in_group_33;
    }

    /**
     * @return bool|null
     */
    public function isInGroup33(): ?bool
    {
        return $this->in_group_33;
    }

    /**
     * @param bool|null $in_group_17
     */
    public function setInGroup17(?bool $in_group_17): void
    {
        $this->in_group_17 = $in_group_17;
    }

    /**
     * @return bool|null
     */
    public function isInGroup17(): ?bool
    {
        return $this->in_group_17;
    }

    /**
     * @param bool|null $in_group_16
     */
    public function setInGroup16(?bool $in_group_16): void
    {
        $this->in_group_16 = $in_group_16;
    }

    /**
     * @param string|null $out_of_office_message
     */
    public function setOutOfOfficeMessage(?string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
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
     * @return OdooRelation
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     * @return OdooRelation[]|null
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getCompanyIds(): ?array
    {
        return $this->company_ids;
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
     * @param int|null $companies_count
     */
    public function setCompaniesCount(?int $companies_count): void
    {
        $this->companies_count = $companies_count;
    }

    /**
     * @param OdooRelation[]|null $company_ids
     */
    public function setCompanyIds(?array $company_ids): void
    {
        $this->company_ids = $company_ids;
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
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
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
     * @param OdooRelation|null $alias_id
     */
    public function setAliasId(?OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAliasId(): ?OdooRelation
    {
        return $this->alias_id;
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
     * @param bool|null $in_group_10
     */
    public function setInGroup10(?bool $in_group_10): void
    {
        $this->in_group_10 = $in_group_10;
    }
}
