<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Actions;
use Flux\OdooApiClient\Model\Object\Mail\Alias;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Res\Users\Log;
use Flux\OdooApiClient\Model\Object\Resource_\Calendar;
use Flux\OdooApiClient\Model\Object\Resource_\Resource_;

/**
 * Odoo model : res.users
 * Name : res.users
 * Info :
 * Update of res.users class
 * - add a preference about sending emails about notifications
 * - make a new user follow itself
 * - add a welcome message
 * - add suggestion preference
 * - if adding groups to a user, check mail.channels linked to this user
 * group, and the user. This is done by overriding the write method.
 */
final class Users extends Partner
{
    /**
     * Related Partner
     * Partner-related data of the user
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Login
     * Used to log into the system
     *
     * @var string
     */
    private $login;

    /**
     * Password
     * Keep empty if you don't want the user to be able to connect on the system.
     *
     * @var null|string
     */
    private $password;

    /**
     * Set Password
     * Specify a value only when creating a user or if you're changing the user's password, otherwise leave empty.
     * After a change of password, the user has to login again.
     *
     * @var null|string
     */
    private $new_password;

    /**
     * Email Signature
     *
     * @var null|string
     */
    private $signature;

    /**
     * Partner is Active
     *
     * @var null|bool
     */
    private $active_partner;

    /**
     * Home Action
     * If specified, this action will be opened at log on for this user, in addition to the standard menu.
     *
     * @var null|Actions
     */
    private $action_id;

    /**
     * Groups
     *
     * @var null|Groups[]
     */
    private $groups_id;

    /**
     * User log entries
     *
     * @var null|Log[]
     */
    private $log_ids;

    /**
     * Latest authentication
     *
     * @var null|DateTimeInterface
     */
    private $login_date;

    /**
     * Share User
     * External user with limited access, created only for the purpose of sharing data.
     *
     * @var null|bool
     */
    private $share;

    /**
     * Number of Companies
     *
     * @var null|int
     */
    private $companies_count;

    /**
     * Companies
     *
     * @var null|Company[]
     */
    private $company_ids;

    /**
     * # Access Rights
     * Number of access rights that apply to the current user
     *
     * @var null|int
     */
    private $accesses_count;

    /**
     * # Record Rules
     * Number of record rules that apply to the current user
     *
     * @var null|int
     */
    private $rules_count;

    /**
     * # Groups
     * Number of groups that apply to the current user
     *
     * @var null|int
     */
    private $groups_count;

    /**
     * Resources
     *
     * @var null|Resource_[]
     */
    private $resource_ids;

    /**
     * Default Working Hours
     * Define the schedule of resource
     *
     * @var null|Calendar
     */
    private $resource_calendar_id;

    /**
     * Alias
     * Email address internally associated with this user. Incoming emails will appear in the user's notifications.
     *
     * @var null|Alias
     */
    private $alias_id;

    /**
     * Alias Contact Security
     * Policy to post a message on the document using the mailgateway.
     * - everyone: everyone can post
     * - partners: only authenticated partners
     * - followers: only followers of the related document or members of following channels
     *
     * @var null|array
     */
    private $alias_contact;

    /**
     * Notification
     * Policy on how to handle Chatter notifications:
     * - Handle by Emails: notifications are sent to your email address
     * - Handle in Odoo: notifications appear in your Odoo Inbox
     *
     * @var array
     */
    private $notification_type;

    /**
     * Is moderator
     *
     * @var null|bool
     */
    private $is_moderator;

    /**
     * Moderation count
     *
     * @var null|int
     */
    private $moderation_counter;

    /**
     * Moderated channels
     *
     * @var null|Channel[]
     */
    private $moderation_channel_ids;

    /**
     * Chat Status
     *
     * @var null|string
     */
    private $out_of_office_message;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * OdooBot Status
     *
     * @var array
     */
    private $odoobot_state;

    /**
     * User's Sales Team
     * Sales Team the user is member of. Used to compute the members of a Sales Team through the inverse one2many
     *
     * @var null|Team
     */
    private $sale_team_id;

    /**
     * A warning can be set on a partner (Account)
     *
     * @var null|bool
     */
    private $in_group_27;

    /**
     * A warning can be set on a product or a customer (Sale)
     *
     * @var null|bool
     */
    private $in_group_32;

    /**
     * Addresses in Sales Orders
     *
     * @var null|bool
     */
    private $in_group_31;

    /**
     * Advanced Pricelists
     *
     * @var null|bool
     */
    private $in_group_15;

    /**
     * Allow the cash rounding management
     *
     * @var null|bool
     */
    private $in_group_28;

    /**
     * Allow to define fiscal years of more or less than a year
     *
     * @var null|bool
     */
    private $in_group_29;

    /**
     * Analytic Accounting
     *
     * @var null|bool
     */
    private $in_group_12;

    /**
     * Analytic Accounting Tags
     *
     * @var null|bool
     */
    private $in_group_13;

    /**
     * Basic Pricelists
     *
     * @var null|bool
     */
    private $in_group_14;

    /**
     * Discount on lines
     *
     * @var null|bool
     */
    private $in_group_18;

    /**
     * Lock Confirmed Sales
     *
     * @var null|bool
     */
    private $in_group_30;

    /**
     * Manage Multiple Units of Measure
     *
     * @var null|bool
     */
    private $in_group_11;

    /**
     * Manage Product Packaging
     *
     * @var null|bool
     */
    private $in_group_16;

    /**
     * Manage Product Variants
     *
     * @var null|bool
     */
    private $in_group_17;

    /**
     * Pro-forma Invoices
     *
     * @var null|bool
     */
    private $in_group_33;

    /**
     * Quotation Templates
     *
     * @var null|bool
     */
    private $in_group_34;

    /**
     * Tax display B2B
     * Show line subtotals without taxes (B2B)
     *
     * @var null|bool
     */
    private $in_group_23;

    /**
     * Tax display B2C
     * Show line subtotals with taxes included (B2C)
     *
     * @var null|bool
     */
    private $in_group_24;

    /**
     * Administration
     *
     * @var null|array
     */
    private $sel_groups_2_3;

    /**
     * Sales
     * User: Own Documents Only: the user will have access to his own data in the sales application.
     * User: All Documents: the user will have access to all records of everyone in the sales application.
     * Administrator: the user will have an access to the sales configuration as well as statistic reports.
     *
     * @var null|array
     */
    private $sel_groups_19_20_21;

    /**
     * Accounting
     *
     * @var null|array
     */
    private $sel_groups_22_25_26;

    /**
     * User types
     * Portal: Portal members have specific access rights (such as record rules and restricted menus).
     * They usually do not belong to the usual Odoo groups.
     * Public: Public users have specific access rights (such as record rules and restricted menus).
     * They usually do not belong to the usual Odoo groups.
     *
     * @var null|array
     */
    private $sel_groups_1_8_9;

    /**
     * Contact Creation
     *
     * @var null|bool
     */
    private $in_group_7;

    /**
     * Multi Companies
     *
     * @var null|bool
     */
    private $in_group_4;

    /**
     * Multi Currencies
     *
     * @var null|bool
     */
    private $in_group_5;

    /**
     * Technical Features
     *
     * @var null|bool
     */
    private $in_group_6;

    /**
     * Access to Private Addresses
     *
     * @var null|bool
     */
    private $in_group_10;

    /**
     * @param Partner $partner_id Related Partner
     *        Partner-related data of the user
     * @param string $login Login
     *        Used to log into the system
     * @param array $notification_type Notification
     *        Policy on how to handle Chatter notifications:
     *        - Handle by Emails: notifications are sent to your email address
     *        - Handle in Odoo: notifications appear in your Odoo Inbox
     * @param array $odoobot_state OdooBot Status
     * @param Account $property_account_payable_id Account Payable
     *        This account will be used instead of the default one as the payable account for the current partner
     * @param Account $property_account_receivable_id Account Receivable
     *        This account will be used instead of the default one as the receivable account for the current partner
     */
    public function __construct(
        Partner $partner_id,
        string $login,
        array $notification_type,
        array $odoobot_state,
        Account $property_account_payable_id,
        Account $property_account_receivable_id
    ) {
        $this->partner_id = $partner_id;
        $this->login = $login;
        $this->notification_type = $notification_type;
        $this->odoobot_state = $odoobot_state;
        parent::__construct($property_account_payable_id, $property_account_receivable_id);
    }

    /**
     * @param null|bool $in_group_12
     */
    public function setInGroup12(?bool $in_group_12): void
    {
        $this->in_group_12 = $in_group_12;
    }

    /**
     * @param null|bool $in_group_33
     */
    public function setInGroup33(?bool $in_group_33): void
    {
        $this->in_group_33 = $in_group_33;
    }

    /**
     * @param null|bool $in_group_17
     */
    public function setInGroup17(?bool $in_group_17): void
    {
        $this->in_group_17 = $in_group_17;
    }

    /**
     * @param null|bool $in_group_16
     */
    public function setInGroup16(?bool $in_group_16): void
    {
        $this->in_group_16 = $in_group_16;
    }

    /**
     * @param null|bool $in_group_11
     */
    public function setInGroup11(?bool $in_group_11): void
    {
        $this->in_group_11 = $in_group_11;
    }

    /**
     * @param null|bool $in_group_30
     */
    public function setInGroup30(?bool $in_group_30): void
    {
        $this->in_group_30 = $in_group_30;
    }

    /**
     * @param null|bool $in_group_18
     */
    public function setInGroup18(?bool $in_group_18): void
    {
        $this->in_group_18 = $in_group_18;
    }

    /**
     * @param null|bool $in_group_14
     */
    public function setInGroup14(?bool $in_group_14): void
    {
        $this->in_group_14 = $in_group_14;
    }

    /**
     * @param null|bool $in_group_13
     */
    public function setInGroup13(?bool $in_group_13): void
    {
        $this->in_group_13 = $in_group_13;
    }

    /**
     * @param null|bool $in_group_29
     */
    public function setInGroup29(?bool $in_group_29): void
    {
        $this->in_group_29 = $in_group_29;
    }

    /**
     * @param null|bool $in_group_23
     */
    public function setInGroup23(?bool $in_group_23): void
    {
        $this->in_group_23 = $in_group_23;
    }

    /**
     * @param null|bool $in_group_28
     */
    public function setInGroup28(?bool $in_group_28): void
    {
        $this->in_group_28 = $in_group_28;
    }

    /**
     * @param null|bool $in_group_15
     */
    public function setInGroup15(?bool $in_group_15): void
    {
        $this->in_group_15 = $in_group_15;
    }

    /**
     * @param null|bool $in_group_31
     */
    public function setInGroup31(?bool $in_group_31): void
    {
        $this->in_group_31 = $in_group_31;
    }

    /**
     * @param null|bool $in_group_32
     */
    public function setInGroup32(?bool $in_group_32): void
    {
        $this->in_group_32 = $in_group_32;
    }

    /**
     * @param null|bool $in_group_27
     */
    public function setInGroup27(?bool $in_group_27): void
    {
        $this->in_group_27 = $in_group_27;
    }

    /**
     * @param null|Team $sale_team_id
     */
    public function setSaleTeamId(?Team $sale_team_id): void
    {
        $this->sale_team_id = $sale_team_id;
    }

    /**
     * @return array
     */
    public function getOdoobotState(): array
    {
        return $this->odoobot_state;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|bool $in_group_34
     */
    public function setInGroup34(?bool $in_group_34): void
    {
        $this->in_group_34 = $in_group_34;
    }

    /**
     * @param null|bool $in_group_24
     */
    public function setInGroup24(?bool $in_group_24): void
    {
        $this->in_group_24 = $in_group_24;
    }

    /**
     * @param Channel $item
     */
    public function removeModerationChannelIds(Channel $item): void
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
     * @param mixed $item
     */
    public function removeSelGroups222526($item): void
    {
        if (null === $this->sel_groups_22_25_26) {
            $this->sel_groups_22_25_26 = [];
        }

        if ($this->hasSelGroups222526($item)) {
            $index = array_search($item, $this->sel_groups_22_25_26);
            unset($this->sel_groups_22_25_26[$index]);
        }
    }

    /**
     * @param null|bool $in_group_6
     */
    public function setInGroup6(?bool $in_group_6): void
    {
        $this->in_group_6 = $in_group_6;
    }

    /**
     * @param null|bool $in_group_5
     */
    public function setInGroup5(?bool $in_group_5): void
    {
        $this->in_group_5 = $in_group_5;
    }

    /**
     * @param null|bool $in_group_4
     */
    public function setInGroup4(?bool $in_group_4): void
    {
        $this->in_group_4 = $in_group_4;
    }

    /**
     * @param null|bool $in_group_7
     */
    public function setInGroup7(?bool $in_group_7): void
    {
        $this->in_group_7 = $in_group_7;
    }

    /**
     * @param mixed $item
     */
    public function removeSelGroups189($item): void
    {
        if (null === $this->sel_groups_1_8_9) {
            $this->sel_groups_1_8_9 = [];
        }

        if ($this->hasSelGroups189($item)) {
            $index = array_search($item, $this->sel_groups_1_8_9);
            unset($this->sel_groups_1_8_9[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSelGroups189($item): void
    {
        if ($this->hasSelGroups189($item)) {
            return;
        }

        if (null === $this->sel_groups_1_8_9) {
            $this->sel_groups_1_8_9 = [];
        }

        $this->sel_groups_1_8_9[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups189($item, bool $strict = true): bool
    {
        if (null === $this->sel_groups_1_8_9) {
            return false;
        }

        return in_array($item, $this->sel_groups_1_8_9, $strict);
    }

    /**
     * @param null|array $sel_groups_1_8_9
     */
    public function setSelGroups189(?array $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @param mixed $item
     */
    public function addSelGroups222526($item): void
    {
        if ($this->hasSelGroups222526($item)) {
            return;
        }

        if (null === $this->sel_groups_22_25_26) {
            $this->sel_groups_22_25_26 = [];
        }

        $this->sel_groups_22_25_26[] = $item;
    }

    /**
     * @param null|array $sel_groups_2_3
     */
    public function setSelGroups23(?array $sel_groups_2_3): void
    {
        $this->sel_groups_2_3 = $sel_groups_2_3;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups222526($item, bool $strict = true): bool
    {
        if (null === $this->sel_groups_22_25_26) {
            return false;
        }

        return in_array($item, $this->sel_groups_22_25_26, $strict);
    }

    /**
     * @param null|array $sel_groups_22_25_26
     */
    public function setSelGroups222526(?array $sel_groups_22_25_26): void
    {
        $this->sel_groups_22_25_26 = $sel_groups_22_25_26;
    }

    /**
     * @param mixed $item
     */
    public function removeSelGroups192021($item): void
    {
        if (null === $this->sel_groups_19_20_21) {
            $this->sel_groups_19_20_21 = [];
        }

        if ($this->hasSelGroups192021($item)) {
            $index = array_search($item, $this->sel_groups_19_20_21);
            unset($this->sel_groups_19_20_21[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSelGroups192021($item): void
    {
        if ($this->hasSelGroups192021($item)) {
            return;
        }

        if (null === $this->sel_groups_19_20_21) {
            $this->sel_groups_19_20_21 = [];
        }

        $this->sel_groups_19_20_21[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups192021($item, bool $strict = true): bool
    {
        if (null === $this->sel_groups_19_20_21) {
            return false;
        }

        return in_array($item, $this->sel_groups_19_20_21, $strict);
    }

    /**
     * @param null|array $sel_groups_19_20_21
     */
    public function setSelGroups192021(?array $sel_groups_19_20_21): void
    {
        $this->sel_groups_19_20_21 = $sel_groups_19_20_21;
    }

    /**
     * @param mixed $item
     */
    public function removeSelGroups23($item): void
    {
        if (null === $this->sel_groups_2_3) {
            $this->sel_groups_2_3 = [];
        }

        if ($this->hasSelGroups23($item)) {
            $index = array_search($item, $this->sel_groups_2_3);
            unset($this->sel_groups_2_3[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSelGroups23($item): void
    {
        if ($this->hasSelGroups23($item)) {
            return;
        }

        if (null === $this->sel_groups_2_3) {
            $this->sel_groups_2_3 = [];
        }

        $this->sel_groups_2_3[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups23($item, bool $strict = true): bool
    {
        if (null === $this->sel_groups_2_3) {
            return false;
        }

        return in_array($item, $this->sel_groups_2_3, $strict);
    }

    /**
     * @param null|string $out_of_office_message
     */
    public function setOutOfOfficeMessage(?string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
    }

    /**
     * @param Channel $item
     */
    public function addModerationChannelIds(Channel $item): void
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
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param Groups $item
     */
    public function removeGroupsId(Groups $item): void
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
     * @param null|Company[] $company_ids
     */
    public function setCompanyIds(?array $company_ids): void
    {
        $this->company_ids = $company_ids;
    }

    /**
     * @return null|int
     */
    public function getCompaniesCount(): ?int
    {
        return $this->companies_count;
    }

    /**
     * @return null|bool
     */
    public function isShare(): ?bool
    {
        return $this->share;
    }

    /**
     * @param null|DateTimeInterface $login_date
     */
    public function setLoginDate(?DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
    }

    /**
     * @param Log $item
     */
    public function removeLogIds(Log $item): void
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
     * @param Log $item
     */
    public function addLogIds(Log $item): void
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
     * @param Log $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLogIds(Log $item, bool $strict = true): bool
    {
        if (null === $this->log_ids) {
            return false;
        }

        return in_array($item, $this->log_ids, $strict);
    }

    /**
     * @param null|Log[] $log_ids
     */
    public function setLogIds(?array $log_ids): void
    {
        $this->log_ids = $log_ids;
    }

    /**
     * @param Groups $item
     */
    public function addGroupsId(Groups $item): void
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
     * @param Company $item
     */
    public function addCompanyIds(Company $item): void
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
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroupsId(Groups $item, bool $strict = true): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id, $strict);
    }

    /**
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param null|Actions $action_id
     */
    public function setActionId(?Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return null|bool
     */
    public function isActivePartner(): ?bool
    {
        return $this->active_partner;
    }

    /**
     * @param null|string $signature
     */
    public function setSignature(?string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @param null|string $new_password
     */
    public function setNewPassword(?string $new_password): void
    {
        $this->new_password = $new_password;
    }

    /**
     * @param null|string $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @param Company $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompanyIds(Company $item, bool $strict = true): bool
    {
        if (null === $this->company_ids) {
            return false;
        }

        return in_array($item, $this->company_ids, $strict);
    }

    /**
     * @param Company $item
     */
    public function removeCompanyIds(Company $item): void
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
     * @param Channel $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModerationChannelIds(Channel $item, bool $strict = true): bool
    {
        if (null === $this->moderation_channel_ids) {
            return false;
        }

        return in_array($item, $this->moderation_channel_ids, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addAliasContact($item): void
    {
        if ($this->hasAliasContact($item)) {
            return;
        }

        if (null === $this->alias_contact) {
            $this->alias_contact = [];
        }

        $this->alias_contact[] = $item;
    }

    /**
     * @param null|Channel[] $moderation_channel_ids
     */
    public function setModerationChannelIds(?array $moderation_channel_ids): void
    {
        $this->moderation_channel_ids = $moderation_channel_ids;
    }

    /**
     * @return null|int
     */
    public function getModerationCounter(): ?int
    {
        return $this->moderation_counter;
    }

    /**
     * @return null|bool
     */
    public function isIsModerator(): ?bool
    {
        return $this->is_moderator;
    }

    /**
     * @param mixed $item
     */
    public function removeNotificationType($item): void
    {
        if ($this->hasNotificationType($item)) {
            $index = array_search($item, $this->notification_type);
            unset($this->notification_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addNotificationType($item): void
    {
        if ($this->hasNotificationType($item)) {
            return;
        }

        $this->notification_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationType($item, bool $strict = true): bool
    {
        return in_array($item, $this->notification_type, $strict);
    }

    /**
     * @param array $notification_type
     */
    public function setNotificationType(array $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @param mixed $item
     */
    public function removeAliasContact($item): void
    {
        if (null === $this->alias_contact) {
            $this->alias_contact = [];
        }

        if ($this->hasAliasContact($item)) {
            $index = array_search($item, $this->alias_contact);
            unset($this->alias_contact[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAliasContact($item, bool $strict = true): bool
    {
        if (null === $this->alias_contact) {
            return false;
        }

        return in_array($item, $this->alias_contact, $strict);
    }

    /**
     * @return null|int
     */
    public function getAccessesCount(): ?int
    {
        return $this->accesses_count;
    }

    /**
     * @param null|array $alias_contact
     */
    public function setAliasContact(?array $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @param null|Alias $alias_id
     */
    public function setAliasId(?Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @param null|Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(?Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param Resource_ $item
     */
    public function removeResourceIds(Resource_ $item): void
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
     * @param Resource_ $item
     */
    public function addResourceIds(Resource_ $item): void
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
     * @param Resource_ $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResourceIds(Resource_ $item, bool $strict = true): bool
    {
        if (null === $this->resource_ids) {
            return false;
        }

        return in_array($item, $this->resource_ids, $strict);
    }

    /**
     * @param null|Resource_[] $resource_ids
     */
    public function setResourceIds(?array $resource_ids): void
    {
        $this->resource_ids = $resource_ids;
    }

    /**
     * @return null|int
     */
    public function getGroupsCount(): ?int
    {
        return $this->groups_count;
    }

    /**
     * @return null|int
     */
    public function getRulesCount(): ?int
    {
        return $this->rules_count;
    }

    /**
     * @param null|bool $in_group_10
     */
    public function setInGroup10(?bool $in_group_10): void
    {
        $this->in_group_10 = $in_group_10;
    }
}
