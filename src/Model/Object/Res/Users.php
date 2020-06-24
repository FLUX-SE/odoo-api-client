<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Actions;
use Flux\OdooApiClient\Model\Object\Mail\Alias;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Res\Users\Log;
use Flux\OdooApiClient\Model\Object\Resource\Calendar;
use Flux\OdooApiClient\Model\Object\Resource\Resource;

/**
 * Odoo model : res.users
 * Name : res.users
 *
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
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Login
     *
     * @var null|string
     */
    private $login;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Set Password
     *
     * @var string
     */
    private $new_password;

    /**
     * Email Signature
     *
     * @var string
     */
    private $signature;

    /**
     * Partner is Active
     *
     * @var bool
     */
    private $active_partner;

    /**
     * Home Action
     *
     * @var Actions
     */
    private $action_id;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups_id;

    /**
     * User log entries
     *
     * @var Log
     */
    private $log_ids;

    /**
     * Latest authentication
     *
     * @var DateTimeInterface
     */
    private $login_date;

    /**
     * Share User
     *
     * @var bool
     */
    private $share;

    /**
     * Number of Companies
     *
     * @var int
     */
    private $companies_count;

    /**
     * Companies
     *
     * @var Company
     */
    private $company_ids;

    /**
     * # Access Rights
     *
     * @var int
     */
    private $accesses_count;

    /**
     * # Record Rules
     *
     * @var int
     */
    private $rules_count;

    /**
     * # Groups
     *
     * @var int
     */
    private $groups_count;

    /**
     * Resources
     *
     * @var Resource
     */
    private $resource_ids;

    /**
     * Default Working Hours
     *
     * @var Calendar
     */
    private $resource_calendar_id;

    /**
     * Alias
     *
     * @var Alias
     */
    private $alias_id;

    /**
     * Alias Contact Security
     *
     * @var array
     */
    private $alias_contact;

    /**
     * Notification
     *
     * @var null|array
     */
    private $notification_type;

    /**
     * Is moderator
     *
     * @var bool
     */
    private $is_moderator;

    /**
     * Moderation count
     *
     * @var int
     */
    private $moderation_counter;

    /**
     * Moderated channels
     *
     * @var Channel
     */
    private $moderation_channel_ids;

    /**
     * Chat Status
     *
     * @var string
     */
    private $out_of_office_message;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * OdooBot Status
     *
     * @var null|array
     */
    private $odoobot_state;

    /**
     * User's Sales Team
     *
     * @var Team
     */
    private $sale_team_id;

    /**
     * A warning can be set on a partner (Account)
     *
     * @var bool
     */
    private $in_group_27;

    /**
     * A warning can be set on a product or a customer (Sale)
     *
     * @var bool
     */
    private $in_group_32;

    /**
     * Addresses in Sales Orders
     *
     * @var bool
     */
    private $in_group_31;

    /**
     * Advanced Pricelists
     *
     * @var bool
     */
    private $in_group_15;

    /**
     * Allow the cash rounding management
     *
     * @var bool
     */
    private $in_group_28;

    /**
     * Allow to define fiscal years of more or less than a year
     *
     * @var bool
     */
    private $in_group_29;

    /**
     * Analytic Accounting
     *
     * @var bool
     */
    private $in_group_12;

    /**
     * Analytic Accounting Tags
     *
     * @var bool
     */
    private $in_group_13;

    /**
     * Basic Pricelists
     *
     * @var bool
     */
    private $in_group_14;

    /**
     * Discount on lines
     *
     * @var bool
     */
    private $in_group_18;

    /**
     * Lock Confirmed Sales
     *
     * @var bool
     */
    private $in_group_30;

    /**
     * Manage Multiple Units of Measure
     *
     * @var bool
     */
    private $in_group_11;

    /**
     * Manage Product Packaging
     *
     * @var bool
     */
    private $in_group_16;

    /**
     * Manage Product Variants
     *
     * @var bool
     */
    private $in_group_17;

    /**
     * Pro-forma Invoices
     *
     * @var bool
     */
    private $in_group_33;

    /**
     * Quotation Templates
     *
     * @var bool
     */
    private $in_group_34;

    /**
     * Tax display B2B
     *
     * @var bool
     */
    private $in_group_23;

    /**
     * Tax display B2C
     *
     * @var bool
     */
    private $in_group_24;

    /**
     * Administration
     *
     * @var array
     */
    private $sel_groups_2_3;

    /**
     * Sales
     *
     * @var array
     */
    private $sel_groups_19_20_21;

    /**
     * Accounting
     *
     * @var array
     */
    private $sel_groups_22_25_26;

    /**
     * User types
     *
     * @var array
     */
    private $sel_groups_1_8_9;

    /**
     * Contact Creation
     *
     * @var bool
     */
    private $in_group_7;

    /**
     * Multi Companies
     *
     * @var bool
     */
    private $in_group_4;

    /**
     * Multi Currencies
     *
     * @var bool
     */
    private $in_group_5;

    /**
     * Technical Features
     *
     * @var bool
     */
    private $in_group_6;

    /**
     * Access to Private Addresses
     *
     * @var bool
     */
    private $in_group_10;

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param bool $in_group_16
     */
    public function setInGroup16(bool $in_group_16): void
    {
        $this->in_group_16 = $in_group_16;
    }

    /**
     * @param array $sel_groups_2_3
     */
    public function setSelGroups23(array $sel_groups_2_3): void
    {
        $this->sel_groups_2_3 = $sel_groups_2_3;
    }

    /**
     * @param bool $in_group_24
     */
    public function setInGroup24(bool $in_group_24): void
    {
        $this->in_group_24 = $in_group_24;
    }

    /**
     * @param bool $in_group_23
     */
    public function setInGroup23(bool $in_group_23): void
    {
        $this->in_group_23 = $in_group_23;
    }

    /**
     * @param bool $in_group_34
     */
    public function setInGroup34(bool $in_group_34): void
    {
        $this->in_group_34 = $in_group_34;
    }

    /**
     * @param bool $in_group_33
     */
    public function setInGroup33(bool $in_group_33): void
    {
        $this->in_group_33 = $in_group_33;
    }

    /**
     * @param bool $in_group_17
     */
    public function setInGroup17(bool $in_group_17): void
    {
        $this->in_group_17 = $in_group_17;
    }

    /**
     * @param bool $in_group_11
     */
    public function setInGroup11(bool $in_group_11): void
    {
        $this->in_group_11 = $in_group_11;
    }

    /**
     * @param array $sel_groups_2_3
     */
    public function addSelGroups23(array $sel_groups_2_3): void
    {
        if ($this->hasSelGroups23($sel_groups_2_3)) {
            return;
        }

        $this->sel_groups_2_3[] = $sel_groups_2_3;
    }

    /**
     * @param bool $in_group_30
     */
    public function setInGroup30(bool $in_group_30): void
    {
        $this->in_group_30 = $in_group_30;
    }

    /**
     * @param bool $in_group_18
     */
    public function setInGroup18(bool $in_group_18): void
    {
        $this->in_group_18 = $in_group_18;
    }

    /**
     * @param bool $in_group_14
     */
    public function setInGroup14(bool $in_group_14): void
    {
        $this->in_group_14 = $in_group_14;
    }

    /**
     * @param bool $in_group_13
     */
    public function setInGroup13(bool $in_group_13): void
    {
        $this->in_group_13 = $in_group_13;
    }

    /**
     * @param bool $in_group_12
     */
    public function setInGroup12(bool $in_group_12): void
    {
        $this->in_group_12 = $in_group_12;
    }

    /**
     * @param bool $in_group_29
     */
    public function setInGroup29(bool $in_group_29): void
    {
        $this->in_group_29 = $in_group_29;
    }

    /**
     * @param array $sel_groups_2_3
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups23(array $sel_groups_2_3, bool $strict = true): bool
    {
        return in_array($sel_groups_2_3, $this->sel_groups_2_3, $strict);
    }

    /**
     * @param array $sel_groups_2_3
     */
    public function removeSelGroups23(array $sel_groups_2_3): void
    {
        if ($this->hasSelGroups23($sel_groups_2_3)) {
            $index = array_search($sel_groups_2_3, $this->sel_groups_2_3);
            unset($this->sel_groups_2_3[$index]);
        }
    }

    /**
     * @param bool $in_group_15
     */
    public function setInGroup15(bool $in_group_15): void
    {
        $this->in_group_15 = $in_group_15;
    }

    /**
     * @param array $sel_groups_1_8_9
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups189(array $sel_groups_1_8_9, bool $strict = true): bool
    {
        return in_array($sel_groups_1_8_9, $this->sel_groups_1_8_9, $strict);
    }

    /**
     * @param bool $in_group_6
     */
    public function setInGroup6(bool $in_group_6): void
    {
        $this->in_group_6 = $in_group_6;
    }

    /**
     * @param bool $in_group_5
     */
    public function setInGroup5(bool $in_group_5): void
    {
        $this->in_group_5 = $in_group_5;
    }

    /**
     * @param bool $in_group_4
     */
    public function setInGroup4(bool $in_group_4): void
    {
        $this->in_group_4 = $in_group_4;
    }

    /**
     * @param bool $in_group_7
     */
    public function setInGroup7(bool $in_group_7): void
    {
        $this->in_group_7 = $in_group_7;
    }

    /**
     * @param array $sel_groups_1_8_9
     */
    public function removeSelGroups189(array $sel_groups_1_8_9): void
    {
        if ($this->hasSelGroups189($sel_groups_1_8_9)) {
            $index = array_search($sel_groups_1_8_9, $this->sel_groups_1_8_9);
            unset($this->sel_groups_1_8_9[$index]);
        }
    }

    /**
     * @param array $sel_groups_1_8_9
     */
    public function addSelGroups189(array $sel_groups_1_8_9): void
    {
        if ($this->hasSelGroups189($sel_groups_1_8_9)) {
            return;
        }

        $this->sel_groups_1_8_9[] = $sel_groups_1_8_9;
    }

    /**
     * @param array $sel_groups_1_8_9
     */
    public function setSelGroups189(array $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @param array $sel_groups_19_20_21
     */
    public function setSelGroups192021(array $sel_groups_19_20_21): void
    {
        $this->sel_groups_19_20_21 = $sel_groups_19_20_21;
    }

    /**
     * @param array $sel_groups_22_25_26
     */
    public function removeSelGroups222526(array $sel_groups_22_25_26): void
    {
        if ($this->hasSelGroups222526($sel_groups_22_25_26)) {
            $index = array_search($sel_groups_22_25_26, $this->sel_groups_22_25_26);
            unset($this->sel_groups_22_25_26[$index]);
        }
    }

    /**
     * @param array $sel_groups_22_25_26
     */
    public function addSelGroups222526(array $sel_groups_22_25_26): void
    {
        if ($this->hasSelGroups222526($sel_groups_22_25_26)) {
            return;
        }

        $this->sel_groups_22_25_26[] = $sel_groups_22_25_26;
    }

    /**
     * @param array $sel_groups_22_25_26
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups222526(array $sel_groups_22_25_26, bool $strict = true): bool
    {
        return in_array($sel_groups_22_25_26, $this->sel_groups_22_25_26, $strict);
    }

    /**
     * @param array $sel_groups_22_25_26
     */
    public function setSelGroups222526(array $sel_groups_22_25_26): void
    {
        $this->sel_groups_22_25_26 = $sel_groups_22_25_26;
    }

    /**
     * @param array $sel_groups_19_20_21
     */
    public function removeSelGroups192021(array $sel_groups_19_20_21): void
    {
        if ($this->hasSelGroups192021($sel_groups_19_20_21)) {
            $index = array_search($sel_groups_19_20_21, $this->sel_groups_19_20_21);
            unset($this->sel_groups_19_20_21[$index]);
        }
    }

    /**
     * @param array $sel_groups_19_20_21
     */
    public function addSelGroups192021(array $sel_groups_19_20_21): void
    {
        if ($this->hasSelGroups192021($sel_groups_19_20_21)) {
            return;
        }

        $this->sel_groups_19_20_21[] = $sel_groups_19_20_21;
    }

    /**
     * @param array $sel_groups_19_20_21
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelGroups192021(array $sel_groups_19_20_21, bool $strict = true): bool
    {
        return in_array($sel_groups_19_20_21, $this->sel_groups_19_20_21, $strict);
    }

    /**
     * @param bool $in_group_28
     */
    public function setInGroup28(bool $in_group_28): void
    {
        $this->in_group_28 = $in_group_28;
    }

    /**
     * @param bool $in_group_31
     */
    public function setInGroup31(bool $in_group_31): void
    {
        $this->in_group_31 = $in_group_31;
    }

    /**
     * @param null|string $login
     */
    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    /**
     * @param DateTimeInterface $login_date
     */
    public function setLoginDate(DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
    }

    /**
     * @return int
     */
    public function getGroupsCount(): int
    {
        return $this->groups_count;
    }

    /**
     * @return int
     */
    public function getRulesCount(): int
    {
        return $this->rules_count;
    }

    /**
     * @return int
     */
    public function getAccessesCount(): int
    {
        return $this->accesses_count;
    }

    /**
     * @param Company $company_ids
     */
    public function setCompanyIds(Company $company_ids): void
    {
        $this->company_ids = $company_ids;
    }

    /**
     * @return int
     */
    public function getCompaniesCount(): int
    {
        return $this->companies_count;
    }

    /**
     * @return bool
     */
    public function isShare(): bool
    {
        return $this->share;
    }

    /**
     * @param Log $log_ids
     */
    public function setLogIds(Log $log_ids): void
    {
        $this->log_ids = $log_ids;
    }

    /**
     * @param Calendar $resource_calendar_id
     */
    public function setResourceCalendarId(Calendar $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param Groups $groups_id
     */
    public function setGroupsId(Groups $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param Actions $action_id
     */
    public function setActionId(Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return bool
     */
    public function isActivePartner(): bool
    {
        return $this->active_partner;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @param string $new_password
     */
    public function setNewPassword(string $new_password): void
    {
        $this->new_password = $new_password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param Resource $resource_ids
     */
    public function setResourceIds(Resource $resource_ids): void
    {
        $this->resource_ids = $resource_ids;
    }

    /**
     * @param Alias $alias_id
     */
    public function setAliasId(Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @param bool $in_group_32
     */
    public function setInGroup32(bool $in_group_32): void
    {
        $this->in_group_32 = $in_group_32;
    }

    /**
     * @return int
     */
    public function getModerationCounter(): int
    {
        return $this->moderation_counter;
    }

    /**
     * @param bool $in_group_27
     */
    public function setInGroup27(bool $in_group_27): void
    {
        $this->in_group_27 = $in_group_27;
    }

    /**
     * @param Team $sale_team_id
     */
    public function setSaleTeamId(Team $sale_team_id): void
    {
        $this->sale_team_id = $sale_team_id;
    }

    /**
     * @return null|array
     */
    public function getOdoobotState(): ?array
    {
        return $this->odoobot_state;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param string $out_of_office_message
     */
    public function setOutOfOfficeMessage(string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
    }

    /**
     * @param Channel $moderation_channel_ids
     */
    public function setModerationChannelIds(Channel $moderation_channel_ids): void
    {
        $this->moderation_channel_ids = $moderation_channel_ids;
    }

    /**
     * @return bool
     */
    public function isIsModerator(): bool
    {
        return $this->is_moderator;
    }

    /**
     * @param array $alias_contact
     */
    public function setAliasContact(array $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @param ?array $notification_type
     */
    public function removeNotificationType(?array $notification_type): void
    {
        if ($this->hasNotificationType($notification_type)) {
            $index = array_search($notification_type, $this->notification_type);
            unset($this->notification_type[$index]);
        }
    }

    /**
     * @param ?array $notification_type
     */
    public function addNotificationType(?array $notification_type): void
    {
        if ($this->hasNotificationType($notification_type)) {
            return;
        }

        if (null === $this->notification_type) {
            $this->notification_type = [];
        }

        $this->notification_type[] = $notification_type;
    }

    /**
     * @param ?array $notification_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNotificationType(?array $notification_type, bool $strict = true): bool
    {
        if (null === $this->notification_type) {
            return false;
        }

        return in_array($notification_type, $this->notification_type, $strict);
    }

    /**
     * @param null|array $notification_type
     */
    public function setNotificationType(?array $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @param array $alias_contact
     */
    public function removeAliasContact(array $alias_contact): void
    {
        if ($this->hasAliasContact($alias_contact)) {
            $index = array_search($alias_contact, $this->alias_contact);
            unset($this->alias_contact[$index]);
        }
    }

    /**
     * @param array $alias_contact
     */
    public function addAliasContact(array $alias_contact): void
    {
        if ($this->hasAliasContact($alias_contact)) {
            return;
        }

        $this->alias_contact[] = $alias_contact;
    }

    /**
     * @param array $alias_contact
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAliasContact(array $alias_contact, bool $strict = true): bool
    {
        return in_array($alias_contact, $this->alias_contact, $strict);
    }

    /**
     * @param bool $in_group_10
     */
    public function setInGroup10(bool $in_group_10): void
    {
        $this->in_group_10 = $in_group_10;
    }
}
