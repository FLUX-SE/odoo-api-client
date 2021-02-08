<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Res;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Actions\Actions
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Groups
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users\Log
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
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
     * API Keys
     * ---
     * Relation : one2many (res.users.apikeys -> user_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users\Apikeys
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $api_key_ids;

    /**
     * Two-factor authentication
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $totp_enabled;

    /**
     * Resources
     * ---
     * Relation : one2many (resource.resource -> user_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Resource_
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $moderation_channel_ids;

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
     * Related employee
     * ---
     * Relation : one2many (hr.employee -> user_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $employee_ids;

    /**
     * Company employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $employee_id;

    /**
     * Job Title
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $job_title;

    /**
     * Work Phone
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $work_phone;

    /**
     * Work Mobile
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $mobile_phone;

    /**
     * Private Phone
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $employee_phone;

    /**
     * Work Email
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $work_email;

    /**
     * Employee Tags
     * ---
     * Relation : many2many (hr.employee.category)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $category_ids;

    /**
     * Department
     * ---
     * Relation : many2one (hr.department)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Department
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $department_id;

    /**
     * Work Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $address_id;

    /**
     * Work Location
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $work_location;

    /**
     * Manager
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $employee_parent_id;

    /**
     * Coach
     * ---
     * Select the "Employee" who is the coach of this employee.
     * The "Coach" has no specific rights or responsibilities by default.
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $coach_id;

    /**
     * Address
     * ---
     * Enter here the private address of the employee, not the one linked to your company.
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $address_home_id;

    /**
     * The employee address has a company linked
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_address_home_a_company;

    /**
     * Private Email
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $private_email;

    /**
     * Home-Work Distance
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $km_home_work;

    /**
     * Employee's Bank Account Number
     * ---
     * Employee bank salary account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $employee_bank_account_id;

    /**
     * Employee's Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $employee_country_id;

    /**
     * Identification No
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $identification_id;

    /**
     * Passport No
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $passport_id;

    /**
     * Gender
     * ---
     * Selection :
     *     -> male (Male)
     *     -> female (Female)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $gender;

    /**
     * Date of Birth
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $birthday;

    /**
     * Place of Birth
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $place_of_birth;

    /**
     * Country of Birth
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $country_of_birth;

    /**
     * Marital Status
     * ---
     * Selection :
     *     -> single (Single)
     *     -> married (Married)
     *     -> cohabitant (Legal Cohabitant)
     *     -> widower (Widower)
     *     -> divorced (Divorced)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $marital;

    /**
     * Spouse Complete Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $spouse_complete_name;

    /**
     * Spouse Birthdate
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $spouse_birthdate;

    /**
     * Number of Children
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $children;

    /**
     * Emergency Contact
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $emergency_contact;

    /**
     * Emergency Phone
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $emergency_phone;

    /**
     * Visa No
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $visa_no;

    /**
     * Work Permit No
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $permit_no;

    /**
     * Visa Expire Date
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $visa_expire;

    /**
     * Additional Note
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $additional_note;

    /**
     * PIN
     * ---
     * PIN used to Check In/Out in Kiosk Mode (if enabled in Configuration).
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $pin;

    /**
     * Certificate Level
     * ---
     * Selection :
     *     -> graduate (Graduate)
     *     -> bachelor (Bachelor)
     *     -> master (Master)
     *     -> doctor (Doctor)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $certificate;

    /**
     * Field of Study
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $study_field;

    /**
     * School
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $study_school;

    /**
     * Employee Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $employee_count;

    /**
     * Hr Presence State
     * ---
     * Selection :
     *     -> present (Present)
     *     -> absent (Absent)
     *     -> to_define (To Define)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $hr_presence_state;

    /**
     * Last Activity
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $last_activity;

    /**
     * Last Activity Time
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $last_activity_time;

    /**
     * Can Edit
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $can_edit;

    /**
     * OdooBot Status
     * ---
     * Selection :
     *     -> not_initialized (Not initialized)
     *     -> onboarding_emoji (Onboarding emoji)
     *     -> onboarding_attachement (Onboarding attachement)
     *     -> onboarding_command (Onboarding command)
     *     -> onboarding_ping (Onboarding ping)
     *     -> idle (Idle)
     *     -> disabled (Disabled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $odoobot_state;

    /**
     * Odoobot Failed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $odoobot_failed;

    /**
     * Company Vehicle
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $vehicle;

    /**
     * Bank Account Number
     * ---
     * Employee bank salary account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $bank_account_id;

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
     *     -> 64 (Billing)
     *     -> 66 (Billing Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_64_66;

    /**
     * Employees
     * ---
     * Officer: The user will be able to approve document created by employees.
     * Administrator: The user will have access to the human resources configuration as well as statistic reports.
     * ---
     * Selection :
     *     ->  ()
     *     -> 53 (Officer)
     *     -> 54 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_53_54;

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
     *     -> 9 (Portal)
     *     -> 10 (Public)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_1_9_10;

    /**
     * Contracts
     * ---
     * Selection :
     *     ->  ()
     *     -> 60 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_60;

    /**
     * Payroll
     * ---
     * Selection :
     *     ->  ()
     *     -> 71 (Officer)
     *     -> 72 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_71_72;

    /**
     * A warning can be set on a partner (Account)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_67;

    /**
     * Access to Private Addresses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_11;

    /**
     * Access to export feature
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_7;

    /**
     * Advanced Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_56;

    /**
     * Allow the cash rounding management
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_68;

    /**
     * Analytic Accounting
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_51;

    /**
     * Analytic Accounting Tags
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_52;

    /**
     * Basic Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_55;

    /**
     * Discount on lines
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_59;

    /**
     * Manage Multiple Units of Measure
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_50;

    /**
     * Manage Product Packaging
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_57;

    /**
     * Manage Product Variants
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_58;

    /**
     * Purchase Receipt
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_70;

    /**
     * Sale Receipt
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_69;

    /**
     * Show Accounting Features - Readonly
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_63;

    /**
     * Show Full Accounting Features
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_65;

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
    private $in_group_61;

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
    private $in_group_62;

    /**
     * Contact Creation
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_8;

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
     * @param OdooRelation $partner_id Related Partner
     *        ---
     *        Partner-related data of the user
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
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
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
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
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $property_account_receivable_id Account Receivable
     *        ---
     *        This account will be used instead of the default one as the receivable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
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
        parent::__construct($property_account_payable_id,$property_account_receivable_id);
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_activity")
     */
    public function getLastActivity(): ?DateTimeInterface
    {
        return $this->last_activity;
    }

    /**
     * @param string|null $pin
     */
    public function setPin(?string $pin): void
    {
        $this->pin = $pin;
    }

    /**
     * @return string|null
     *
     * @SerializedName("certificate")
     */
    public function getCertificate(): ?string
    {
        return $this->certificate;
    }

    /**
     * @param string|null $certificate
     */
    public function setCertificate(?string $certificate): void
    {
        $this->certificate = $certificate;
    }

    /**
     * @return string|null
     *
     * @SerializedName("study_field")
     */
    public function getStudyField(): ?string
    {
        return $this->study_field;
    }

    /**
     * @param string|null $study_field
     */
    public function setStudyField(?string $study_field): void
    {
        $this->study_field = $study_field;
    }

    /**
     * @return string|null
     *
     * @SerializedName("study_school")
     */
    public function getStudySchool(): ?string
    {
        return $this->study_school;
    }

    /**
     * @param string|null $study_school
     */
    public function setStudySchool(?string $study_school): void
    {
        $this->study_school = $study_school;
    }

    /**
     * @return int|null
     *
     * @SerializedName("employee_count")
     */
    public function getEmployeeCount(): ?int
    {
        return $this->employee_count;
    }

    /**
     * @param int|null $employee_count
     */
    public function setEmployeeCount(?int $employee_count): void
    {
        $this->employee_count = $employee_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("hr_presence_state")
     */
    public function getHrPresenceState(): ?string
    {
        return $this->hr_presence_state;
    }

    /**
     * @param string|null $hr_presence_state
     */
    public function setHrPresenceState(?string $hr_presence_state): void
    {
        $this->hr_presence_state = $hr_presence_state;
    }

    /**
     * @param DateTimeInterface|null $last_activity
     */
    public function setLastActivity(?DateTimeInterface $last_activity): void
    {
        $this->last_activity = $last_activity;
    }

    /**
     * @param string|null $additional_note
     */
    public function setAdditionalNote(?string $additional_note): void
    {
        $this->additional_note = $additional_note;
    }

    /**
     * @return string|null
     *
     * @SerializedName("last_activity_time")
     */
    public function getLastActivityTime(): ?string
    {
        return $this->last_activity_time;
    }

    /**
     * @param string|null $last_activity_time
     */
    public function setLastActivityTime(?string $last_activity_time): void
    {
        $this->last_activity_time = $last_activity_time;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_edit")
     */
    public function isCanEdit(): ?bool
    {
        return $this->can_edit;
    }

    /**
     * @param bool|null $can_edit
     */
    public function setCanEdit(?bool $can_edit): void
    {
        $this->can_edit = $can_edit;
    }

    /**
     * @return string|null
     *
     * @SerializedName("odoobot_state")
     */
    public function getOdoobotState(): ?string
    {
        return $this->odoobot_state;
    }

    /**
     * @param string|null $odoobot_state
     */
    public function setOdoobotState(?string $odoobot_state): void
    {
        $this->odoobot_state = $odoobot_state;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("odoobot_failed")
     */
    public function isOdoobotFailed(): ?bool
    {
        return $this->odoobot_failed;
    }

    /**
     * @param bool|null $odoobot_failed
     */
    public function setOdoobotFailed(?bool $odoobot_failed): void
    {
        $this->odoobot_failed = $odoobot_failed;
    }

    /**
     * @return string|null
     *
     * @SerializedName("vehicle")
     */
    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    /**
     * @param string|null $vehicle
     */
    public function setVehicle(?string $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("bank_account_id")
     */
    public function getBankAccountId(): ?OdooRelation
    {
        return $this->bank_account_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("pin")
     */
    public function getPin(): ?string
    {
        return $this->pin;
    }

    /**
     * @return string|null
     *
     * @SerializedName("additional_note")
     */
    public function getAdditionalNote(): ?string
    {
        return $this->additional_note;
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
     * @param string|null $spouse_complete_name
     */
    public function setSpouseCompleteName(?string $spouse_complete_name): void
    {
        $this->spouse_complete_name = $spouse_complete_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("gender")
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("birthday")
     */
    public function getBirthday(): ?DateTimeInterface
    {
        return $this->birthday;
    }

    /**
     * @param DateTimeInterface|null $birthday
     */
    public function setBirthday(?DateTimeInterface $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string|null
     *
     * @SerializedName("place_of_birth")
     */
    public function getPlaceOfBirth(): ?string
    {
        return $this->place_of_birth;
    }

    /**
     * @param string|null $place_of_birth
     */
    public function setPlaceOfBirth(?string $place_of_birth): void
    {
        $this->place_of_birth = $place_of_birth;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_of_birth")
     */
    public function getCountryOfBirth(): ?OdooRelation
    {
        return $this->country_of_birth;
    }

    /**
     * @param OdooRelation|null $country_of_birth
     */
    public function setCountryOfBirth(?OdooRelation $country_of_birth): void
    {
        $this->country_of_birth = $country_of_birth;
    }

    /**
     * @return string|null
     *
     * @SerializedName("marital")
     */
    public function getMarital(): ?string
    {
        return $this->marital;
    }

    /**
     * @param string|null $marital
     */
    public function setMarital(?string $marital): void
    {
        $this->marital = $marital;
    }

    /**
     * @return string|null
     *
     * @SerializedName("spouse_complete_name")
     */
    public function getSpouseCompleteName(): ?string
    {
        return $this->spouse_complete_name;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("spouse_birthdate")
     */
    public function getSpouseBirthdate(): ?DateTimeInterface
    {
        return $this->spouse_birthdate;
    }

    /**
     * @param DateTimeInterface|null $visa_expire
     */
    public function setVisaExpire(?DateTimeInterface $visa_expire): void
    {
        $this->visa_expire = $visa_expire;
    }

    /**
     * @param DateTimeInterface|null $spouse_birthdate
     */
    public function setSpouseBirthdate(?DateTimeInterface $spouse_birthdate): void
    {
        $this->spouse_birthdate = $spouse_birthdate;
    }

    /**
     * @return int|null
     *
     * @SerializedName("children")
     */
    public function getChildren(): ?int
    {
        return $this->children;
    }

    /**
     * @param int|null $children
     */
    public function setChildren(?int $children): void
    {
        $this->children = $children;
    }

    /**
     * @return string|null
     *
     * @SerializedName("emergency_contact")
     */
    public function getEmergencyContact(): ?string
    {
        return $this->emergency_contact;
    }

    /**
     * @param string|null $emergency_contact
     */
    public function setEmergencyContact(?string $emergency_contact): void
    {
        $this->emergency_contact = $emergency_contact;
    }

    /**
     * @return string|null
     *
     * @SerializedName("emergency_phone")
     */
    public function getEmergencyPhone(): ?string
    {
        return $this->emergency_phone;
    }

    /**
     * @param string|null $emergency_phone
     */
    public function setEmergencyPhone(?string $emergency_phone): void
    {
        $this->emergency_phone = $emergency_phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("visa_no")
     */
    public function getVisaNo(): ?string
    {
        return $this->visa_no;
    }

    /**
     * @param string|null $visa_no
     */
    public function setVisaNo(?string $visa_no): void
    {
        $this->visa_no = $visa_no;
    }

    /**
     * @return string|null
     *
     * @SerializedName("permit_no")
     */
    public function getPermitNo(): ?string
    {
        return $this->permit_no;
    }

    /**
     * @param string|null $permit_no
     */
    public function setPermitNo(?string $permit_no): void
    {
        $this->permit_no = $permit_no;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("visa_expire")
     */
    public function getVisaExpire(): ?DateTimeInterface
    {
        return $this->visa_expire;
    }

    /**
     * @param OdooRelation|null $bank_account_id
     */
    public function setBankAccountId(?OdooRelation $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
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
     * @SerializedName("passport_id")
     */
    public function getPassportId(): ?string
    {
        return $this->passport_id;
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
     *
     * @SerializedName("in_group_57")
     */
    public function isInGroup57(): ?bool
    {
        return $this->in_group_57;
    }

    /**
     * @param bool|null $in_group_57
     */
    public function setInGroup57(?bool $in_group_57): void
    {
        $this->in_group_57 = $in_group_57;
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
     * @param bool|null $in_group_58
     */
    public function setInGroup58(?bool $in_group_58): void
    {
        $this->in_group_58 = $in_group_58;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_70")
     */
    public function isInGroup70(): ?bool
    {
        return $this->in_group_70;
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
     *
     * @SerializedName("in_group_69")
     */
    public function isInGroup69(): ?bool
    {
        return $this->in_group_69;
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
     *
     * @SerializedName("in_group_63")
     */
    public function isInGroup63(): ?bool
    {
        return $this->in_group_63;
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
     * @SerializedName("in_group_65")
     */
    public function isInGroup65(): ?bool
    {
        return $this->in_group_65;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_61")
     */
    public function isInGroup61(): ?bool
    {
        return $this->in_group_61;
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
     * @param bool|null $in_group_61
     */
    public function setInGroup61(?bool $in_group_61): void
    {
        $this->in_group_61 = $in_group_61;
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
     * @param bool|null $in_group_62
     */
    public function setInGroup62(?bool $in_group_62): void
    {
        $this->in_group_62 = $in_group_62;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_8")
     */
    public function isInGroup8(): ?bool
    {
        return $this->in_group_8;
    }

    /**
     * @param bool|null $in_group_8
     */
    public function setInGroup8(?bool $in_group_8): void
    {
        $this->in_group_8 = $in_group_8;
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
     * @param bool|null $in_group_4
     */
    public function setInGroup4(?bool $in_group_4): void
    {
        $this->in_group_4 = $in_group_4;
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
     * @param bool|null $in_group_5
     */
    public function setInGroup5(?bool $in_group_5): void
    {
        $this->in_group_5 = $in_group_5;
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
     * @param bool|null $in_group_6
     */
    public function setInGroup6(?bool $in_group_6): void
    {
        $this->in_group_6 = $in_group_6;
    }

    /**
     * @param bool|null $in_group_50
     */
    public function setInGroup50(?bool $in_group_50): void
    {
        $this->in_group_50 = $in_group_50;
    }

    /**
     * @param bool|null $in_group_59
     */
    public function setInGroup59(?bool $in_group_59): void
    {
        $this->in_group_59 = $in_group_59;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_64_66")
     */
    public function getSelGroups6466(): ?string
    {
        return $this->sel_groups_64_66;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_11")
     */
    public function isInGroup11(): ?bool
    {
        return $this->in_group_11;
    }

    /**
     * @param string|null $sel_groups_64_66
     */
    public function setSelGroups6466(?string $sel_groups_64_66): void
    {
        $this->sel_groups_64_66 = $sel_groups_64_66;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_53_54")
     */
    public function getSelGroups5354(): ?string
    {
        return $this->sel_groups_53_54;
    }

    /**
     * @param string|null $sel_groups_53_54
     */
    public function setSelGroups5354(?string $sel_groups_53_54): void
    {
        $this->sel_groups_53_54 = $sel_groups_53_54;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_1_9_10")
     */
    public function getSelGroups1910(): ?string
    {
        return $this->sel_groups_1_9_10;
    }

    /**
     * @param string|null $sel_groups_1_9_10
     */
    public function setSelGroups1910(?string $sel_groups_1_9_10): void
    {
        $this->sel_groups_1_9_10 = $sel_groups_1_9_10;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_60")
     */
    public function getSelGroups60(): ?string
    {
        return $this->sel_groups_60;
    }

    /**
     * @param string|null $sel_groups_60
     */
    public function setSelGroups60(?string $sel_groups_60): void
    {
        $this->sel_groups_60 = $sel_groups_60;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_71_72")
     */
    public function getSelGroups7172(): ?string
    {
        return $this->sel_groups_71_72;
    }

    /**
     * @param string|null $sel_groups_71_72
     */
    public function setSelGroups7172(?string $sel_groups_71_72): void
    {
        $this->sel_groups_71_72 = $sel_groups_71_72;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_67")
     */
    public function isInGroup67(): ?bool
    {
        return $this->in_group_67;
    }

    /**
     * @param bool|null $in_group_67
     */
    public function setInGroup67(?bool $in_group_67): void
    {
        $this->in_group_67 = $in_group_67;
    }

    /**
     * @param bool|null $in_group_11
     */
    public function setInGroup11(?bool $in_group_11): void
    {
        $this->in_group_11 = $in_group_11;
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
     * @return bool|null
     *
     * @SerializedName("in_group_7")
     */
    public function isInGroup7(): ?bool
    {
        return $this->in_group_7;
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
     * @SerializedName("in_group_56")
     */
    public function isInGroup56(): ?bool
    {
        return $this->in_group_56;
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
     *
     * @SerializedName("in_group_68")
     */
    public function isInGroup68(): ?bool
    {
        return $this->in_group_68;
    }

    /**
     * @param bool|null $in_group_68
     */
    public function setInGroup68(?bool $in_group_68): void
    {
        $this->in_group_68 = $in_group_68;
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
     * @param bool|null $in_group_51
     */
    public function setInGroup51(?bool $in_group_51): void
    {
        $this->in_group_51 = $in_group_51;
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
     * @param bool|null $in_group_52
     */
    public function setInGroup52(?bool $in_group_52): void
    {
        $this->in_group_52 = $in_group_52;
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
     * @param bool|null $in_group_55
     */
    public function setInGroup55(?bool $in_group_55): void
    {
        $this->in_group_55 = $in_group_55;
    }

    /**
     * @param string|null $passport_id
     */
    public function setPassportId(?string $passport_id): void
    {
        $this->passport_id = $passport_id;
    }

    /**
     * @param string|null $identification_id
     */
    public function setIdentificationId(?string $identification_id): void
    {
        $this->identification_id = $identification_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("api_key_ids")
     */
    public function getApiKeyIds(): ?array
    {
        return $this->api_key_ids;
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
     * @param OdooRelation[]|null $company_ids
     */
    public function setCompanyIds(?array $company_ids): void
    {
        $this->company_ids = $company_ids;
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
     * @return int|null
     *
     * @SerializedName("accesses_count")
     */
    public function getAccessesCount(): ?int
    {
        return $this->accesses_count;
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
     * @SerializedName("rules_count")
     */
    public function getRulesCount(): ?int
    {
        return $this->rules_count;
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
     * @SerializedName("groups_count")
     */
    public function getGroupsCount(): ?int
    {
        return $this->groups_count;
    }

    /**
     * @param int|null $groups_count
     */
    public function setGroupsCount(?int $groups_count): void
    {
        $this->groups_count = $groups_count;
    }

    /**
     * @param OdooRelation[]|null $api_key_ids
     */
    public function setApiKeyIds(?array $api_key_ids): void
    {
        $this->api_key_ids = $api_key_ids;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasApiKeyIds(OdooRelation $item): bool
    {
        if (null === $this->api_key_ids) {
            return false;
        }

        return in_array($item, $this->api_key_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addApiKeyIds(OdooRelation $item): void
    {
        if ($this->hasApiKeyIds($item)) {
            return;
        }

        if (null === $this->api_key_ids) {
            $this->api_key_ids = [];
        }

        $this->api_key_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeApiKeyIds(OdooRelation $item): void
    {
        if (null === $this->api_key_ids) {
            $this->api_key_ids = [];
        }

        if ($this->hasApiKeyIds($item)) {
            $index = array_search($item, $this->api_key_ids);
            unset($this->api_key_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("totp_enabled")
     */
    public function isTotpEnabled(): ?bool
    {
        return $this->totp_enabled;
    }

    /**
     * @param bool|null $totp_enabled
     */
    public function setTotpEnabled(?bool $totp_enabled): void
    {
        $this->totp_enabled = $totp_enabled;
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
     * @param OdooRelation[]|null $resource_ids
     */
    public function setResourceIds(?array $resource_ids): void
    {
        $this->resource_ids = $resource_ids;
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
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @param int|null $companies_count
     */
    public function setCompaniesCount(?int $companies_count): void
    {
        $this->companies_count = $companies_count;
    }

    /**
     * @param bool|null $share
     */
    public function setShare(?bool $share): void
    {
        $this->share = $share;
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
     * @return OdooRelation|null
     *
     * @SerializedName("action_id")
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
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
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
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
     * @param string|null $new_password
     */
    public function setNewPassword(?string $new_password): void
    {
        $this->new_password = $new_password;
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
     * @param string|null $signature
     */
    public function setSignature(?string $signature): void
    {
        $this->signature = $signature;
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
     * @param bool|null $active_partner
     */
    public function setActivePartner(?bool $active_partner): void
    {
        $this->active_partner = $active_partner;
    }

    /**
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups_id")
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("log_ids")
     */
    public function getLogIds(): ?array
    {
        return $this->log_ids;
    }

    /**
     * @param OdooRelation[]|null $log_ids
     */
    public function setLogIds(?array $log_ids): void
    {
        $this->log_ids = $log_ids;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("login_date")
     */
    public function getLoginDate(): ?DateTimeInterface
    {
        return $this->login_date;
    }

    /**
     * @param DateTimeInterface|null $login_date
     */
    public function setLoginDate(?DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
    }

    /**
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @param string $notification_type
     */
    public function setNotificationType(string $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("identification_id")
     */
    public function getIdentificationId(): ?string
    {
        return $this->identification_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("coach_id")
     */
    public function getCoachId(): ?OdooRelation
    {
        return $this->coach_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCategoryIds(OdooRelation $item): bool
    {
        if (null === $this->category_ids) {
            return false;
        }

        return in_array($item, $this->category_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addCategoryIds(OdooRelation $item): void
    {
        if ($this->hasCategoryIds($item)) {
            return;
        }

        if (null === $this->category_ids) {
            $this->category_ids = [];
        }

        $this->category_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCategoryIds(OdooRelation $item): void
    {
        if (null === $this->category_ids) {
            $this->category_ids = [];
        }

        if ($this->hasCategoryIds($item)) {
            $index = array_search($item, $this->category_ids);
            unset($this->category_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
    }

    /**
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("address_id")
     */
    public function getAddressId(): ?OdooRelation
    {
        return $this->address_id;
    }

    /**
     * @param OdooRelation|null $address_id
     */
    public function setAddressId(?OdooRelation $address_id): void
    {
        $this->address_id = $address_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_location")
     */
    public function getWorkLocation(): ?string
    {
        return $this->work_location;
    }

    /**
     * @param string|null $work_location
     */
    public function setWorkLocation(?string $work_location): void
    {
        $this->work_location = $work_location;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_parent_id")
     */
    public function getEmployeeParentId(): ?OdooRelation
    {
        return $this->employee_parent_id;
    }

    /**
     * @param OdooRelation|null $employee_parent_id
     */
    public function setEmployeeParentId(?OdooRelation $employee_parent_id): void
    {
        $this->employee_parent_id = $employee_parent_id;
    }

    /**
     * @param OdooRelation|null $coach_id
     */
    public function setCoachId(?OdooRelation $coach_id): void
    {
        $this->coach_id = $coach_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("category_ids")
     */
    public function getCategoryIds(): ?array
    {
        return $this->category_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("address_home_id")
     */
    public function getAddressHomeId(): ?OdooRelation
    {
        return $this->address_home_id;
    }

    /**
     * @param OdooRelation|null $address_home_id
     */
    public function setAddressHomeId(?OdooRelation $address_home_id): void
    {
        $this->address_home_id = $address_home_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_address_home_a_company")
     */
    public function isIsAddressHomeACompany(): ?bool
    {
        return $this->is_address_home_a_company;
    }

    /**
     * @param bool|null $is_address_home_a_company
     */
    public function setIsAddressHomeACompany(?bool $is_address_home_a_company): void
    {
        $this->is_address_home_a_company = $is_address_home_a_company;
    }

    /**
     * @return string|null
     *
     * @SerializedName("private_email")
     */
    public function getPrivateEmail(): ?string
    {
        return $this->private_email;
    }

    /**
     * @param string|null $private_email
     */
    public function setPrivateEmail(?string $private_email): void
    {
        $this->private_email = $private_email;
    }

    /**
     * @return int|null
     *
     * @SerializedName("km_home_work")
     */
    public function getKmHomeWork(): ?int
    {
        return $this->km_home_work;
    }

    /**
     * @param int|null $km_home_work
     */
    public function setKmHomeWork(?int $km_home_work): void
    {
        $this->km_home_work = $km_home_work;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_bank_account_id")
     */
    public function getEmployeeBankAccountId(): ?OdooRelation
    {
        return $this->employee_bank_account_id;
    }

    /**
     * @param OdooRelation|null $employee_bank_account_id
     */
    public function setEmployeeBankAccountId(?OdooRelation $employee_bank_account_id): void
    {
        $this->employee_bank_account_id = $employee_bank_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_country_id")
     */
    public function getEmployeeCountryId(): ?OdooRelation
    {
        return $this->employee_country_id;
    }

    /**
     * @param OdooRelation|null $employee_country_id
     */
    public function setEmployeeCountryId(?OdooRelation $employee_country_id): void
    {
        $this->employee_country_id = $employee_country_id;
    }

    /**
     * @param OdooRelation[]|null $category_ids
     */
    public function setCategoryIds(?array $category_ids): void
    {
        $this->category_ids = $category_ids;
    }

    /**
     * @param string|null $work_email
     */
    public function setWorkEmail(?string $work_email): void
    {
        $this->work_email = $work_email;
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
     * @param OdooRelation[]|null $employee_ids
     */
    public function setEmployeeIds(?array $employee_ids): void
    {
        $this->employee_ids = $employee_ids;
    }

    /**
     * @param bool|null $is_moderator
     */
    public function setIsModerator(?bool $is_moderator): void
    {
        $this->is_moderator = $is_moderator;
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
     * @param int|null $moderation_counter
     */
    public function setModerationCounter(?int $moderation_counter): void
    {
        $this->moderation_counter = $moderation_counter;
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
     * @param OdooRelation[]|null $moderation_channel_ids
     */
    public function setModerationChannelIds(?array $moderation_channel_ids): void
    {
        $this->moderation_channel_ids = $moderation_channel_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("employee_ids")
     */
    public function getEmployeeIds(): ?array
    {
        return $this->employee_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEmployeeIds(OdooRelation $item): bool
    {
        if (null === $this->employee_ids) {
            return false;
        }

        return in_array($item, $this->employee_ids);
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_email")
     */
    public function getWorkEmail(): ?string
    {
        return $this->work_email;
    }

    /**
     * @param OdooRelation $item
     */
    public function addEmployeeIds(OdooRelation $item): void
    {
        if ($this->hasEmployeeIds($item)) {
            return;
        }

        if (null === $this->employee_ids) {
            $this->employee_ids = [];
        }

        $this->employee_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEmployeeIds(OdooRelation $item): void
    {
        if (null === $this->employee_ids) {
            $this->employee_ids = [];
        }

        if ($this->hasEmployeeIds($item)) {
            $index = array_search($item, $this->employee_ids);
            unset($this->employee_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): ?OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("job_title")
     */
    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    /**
     * @param string|null $job_title
     */
    public function setJobTitle(?string $job_title): void
    {
        $this->job_title = $job_title;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_phone")
     */
    public function getWorkPhone(): ?string
    {
        return $this->work_phone;
    }

    /**
     * @param string|null $work_phone
     */
    public function setWorkPhone(?string $work_phone): void
    {
        $this->work_phone = $work_phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("mobile_phone")
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone;
    }

    /**
     * @param string|null $mobile_phone
     */
    public function setMobilePhone(?string $mobile_phone): void
    {
        $this->mobile_phone = $mobile_phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("employee_phone")
     */
    public function getEmployeePhone(): ?string
    {
        return $this->employee_phone;
    }

    /**
     * @param string|null $employee_phone
     */
    public function setEmployeePhone(?string $employee_phone): void
    {
        $this->employee_phone = $employee_phone;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.users';
    }
}
