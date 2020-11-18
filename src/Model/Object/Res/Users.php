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
     *     -> employees (Authenticated Employees)
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
     * @var string
     */
    private $odoobot_state;

    /**
     * User's Sales Team
     * ---
     * Sales Team the user is member of. Used to compute the members of a Sales Team through the inverse one2many
     * ---
     * Relation : many2one (crm.team)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Team
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_team_id;

    /**
     * OAuth Provider
     * ---
     * Relation : many2one (auth.oauth.provider)
     * @see \Flux\OdooApiClient\Model\Object\Auth\Oauth\Provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $oauth_provider_id;

    /**
     * OAuth User ID
     * ---
     * Oauth Provider user_id
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $oauth_uid;

    /**
     * OAuth Access Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $oauth_access_token;

    /**
     * Refresh Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $google_calendar_rtoken;

    /**
     * User token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $google_calendar_token;

    /**
     * Token Validity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $google_calendar_token_validity;

    /**
     * Last synchro date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $google_calendar_last_sync_date;

    /**
     * Calendar ID
     * ---
     * Last Calendar ID who has been synchronized. If it is changed, we remove all links between GoogleID and Odoo
     * Google Internal ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $google_calendar_cal_id;

    /**
     * Related employee
     * ---
     * Relation : one2many (hr.employee -> user_id)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
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
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
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
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee\Category
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
     * @see \Flux\OdooApiClient\Model\Object\Hr\Department
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
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
     * Relation : many2one (hr.employee)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * Km Home-Work
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
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
     * Badge ID
     * ---
     * ID used for employee identification.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $barcode;

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
     *     -> bachelor (Bachelor)
     *     -> master (Master)
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
     * Medical Examination Date
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $medic_exam;

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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $bank_account_id;

    /**
     * Digital Signature
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $sign_signature;

    /**
     * Digitial Initials
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $sign_initials;

    /**
     * Document
     * ---
     * Relation : one2many (documents.document -> owner_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Document
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $document_ids;

    /**
     * Sign Request Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $sign_request_count;

    /**
     * Expense
     * ---
     * User responsible of expense approval. Should be Expense approver.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $expense_manager_id;

    /**
     * A warning can be set on a partner (Account)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_24;

    /**
     * A warning can be set on a partner (Stock)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_55;

    /**
     * A warning can be set on a product or a customer (Purchase)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_58;

    /**
     * A warning can be set on a product or a customer (Sale)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_32;

    /**
     * Addresses in Sales Orders
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_31;

    /**
     * Advanced Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_15;

    /**
     * Allow the cash rounding management
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_25;

    /**
     * Allow to define fiscal years of more or less than a year
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_26;

    /**
     * Analytic Accounting
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_12;

    /**
     * Analytic Accounting Tags
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_13;

    /**
     * Basic Pricelists
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_14;

    /**
     * Discount on lines
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_18;

    /**
     * Display Serial & Lot Number in Delivery Slips
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_51;

    /**
     * Display Serial & Lot Number on Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_60;

    /**
     * Display incoterms on Sales Order and related invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_59;

    /**
     * Lock Confirmed Sales
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_30;

    /**
     * Manage Different Stock Owners
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_54;

    /**
     * Manage Lots / Serial Numbers
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_50;

    /**
     * Manage Multiple Stock Locations
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_46;

    /**
     * Manage Multiple Units of Measure
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_11;

    /**
     * Manage Multiple Warehouses
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_47;

    /**
     * Manage Packages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_52;

    /**
     * Manage Product Packaging
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_16;

    /**
     * Manage Product Variants
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_17;

    /**
     * Manage Push and Pull inventory flows
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_53;

    /**
     * Pro-forma Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_33;

    /**
     * Quotation Templates
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $in_group_34;

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
    private $in_group_20;

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
    private $in_group_21;

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
     * Documents
     * ---
     * Selection :
     *     ->  ()
     *     -> 44 (User)
     *     -> 45 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_44_45;

    /**
     * Sales
     * ---
     * User: Own Documents Only: the user will have access to his own data in the sales application.
     * User: All Documents: the user will have access to all records of everyone in the sales application.
     * Administrator: the user will have an access to the sales configuration as well as statistic reports.
     * ---
     * Selection :
     *     ->  ()
     *     -> 27 (User: Own Documents Only)
     *     -> 28 (User: All Documents)
     *     -> 29 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_27_28_29;

    /**
     * Inventory
     * ---
     * Selection :
     *     ->  ()
     *     -> 48 (User)
     *     -> 49 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_48_49;

    /**
     * Accounting
     * ---
     * Selection :
     *     ->  ()
     *     -> 19 (Billing)
     *     -> 22 (Accountant)
     *     -> 23 (Advisor)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_19_22_23;

    /**
     * Purchase
     * ---
     * Selection :
     *     ->  ()
     *     -> 56 (User)
     *     -> 57 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_56_57;

    /**
     * Employees
     * ---
     * Officer: The user will be able to approve document created by employees.
     * Administrator: The user will have access to the human resources configuration as well as statistic reports.
     * ---
     * Selection :
     *     ->  ()
     *     -> 35 (Officer)
     *     -> 36 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_35_36;

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
     * Contracts
     * ---
     * Selection :
     *     ->  ()
     *     -> 37 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_37;

    /**
     * Expenses
     * ---
     * Selection :
     *     ->  ()
     *     -> 38 (Team Approver)
     *     -> 39 (All Approver)
     *     -> 40 (Administrator)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_38_39_40;

    /**
     * Sign
     * ---
     * Selection :
     *     ->  ()
     *     -> 43 (Employee)
     *     -> 41 (User: Own and Shared Templates)
     *     -> 42 (Administrator: All Templates)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sel_groups_43_41_42;

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
     * @param string $odoobot_state OdooBot Status
     *        ---
     *        Selection :
     *            -> not_initialized (Not initialized)
     *            -> onboarding_emoji (Onboarding emoji)
     *            -> onboarding_attachement (Onboarding attachement)
     *            -> onboarding_command (Onboarding command)
     *            -> onboarding_ping (Onboarding ping)
     *            -> idle (Idle)
     *            -> disabled (Disabled)
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
        string $odoobot_state,
        OdooRelation $property_account_payable_id,
        OdooRelation $property_account_receivable_id
    ) {
        $this->partner_id = $partner_id;
        $this->login = $login;
        $this->company_id = $company_id;
        $this->notification_type = $notification_type;
        $this->odoobot_state = $odoobot_state;
        parent::__construct($property_account_payable_id, $property_account_receivable_id);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("document_ids")
     */
    public function getDocumentIds(): ?array
    {
        return $this->document_ids;
    }

    /**
     * @param int|null $sign_request_count
     */
    public function setSignRequestCount(?int $sign_request_count): void
    {
        $this->sign_request_count = $sign_request_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sign_request_count")
     */
    public function getSignRequestCount(): ?int
    {
        return $this->sign_request_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDocumentIds(OdooRelation $item): void
    {
        if (null === $this->document_ids) {
            $this->document_ids = [];
        }

        if ($this->hasDocumentIds($item)) {
            $index = array_search($item, $this->document_ids);
            unset($this->document_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addDocumentIds(OdooRelation $item): void
    {
        if ($this->hasDocumentIds($item)) {
            return;
        }

        if (null === $this->document_ids) {
            $this->document_ids = [];
        }

        $this->document_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDocumentIds(OdooRelation $item): bool
    {
        if (null === $this->document_ids) {
            return false;
        }

        return in_array($item, $this->document_ids);
    }

    /**
     * @param OdooRelation[]|null $document_ids
     */
    public function setDocumentIds(?array $document_ids): void
    {
        $this->document_ids = $document_ids;
    }

    /**
     * @param mixed|null $sign_initials
     */
    public function setSignInitials($sign_initials): void
    {
        $this->sign_initials = $sign_initials;
    }

    /**
     * @param OdooRelation|null $expense_manager_id
     */
    public function setExpenseManagerId(?OdooRelation $expense_manager_id): void
    {
        $this->expense_manager_id = $expense_manager_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("sign_initials")
     */
    public function getSignInitials()
    {
        return $this->sign_initials;
    }

    /**
     * @param mixed|null $sign_signature
     */
    public function setSignSignature($sign_signature): void
    {
        $this->sign_signature = $sign_signature;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("sign_signature")
     */
    public function getSignSignature()
    {
        return $this->sign_signature;
    }

    /**
     * @param OdooRelation|null $bank_account_id
     */
    public function setBankAccountId(?OdooRelation $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
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
     * @param string|null $vehicle
     */
    public function setVehicle(?string $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("expense_manager_id")
     */
    public function getExpenseManagerId(): ?OdooRelation
    {
        return $this->expense_manager_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_24")
     */
    public function isInGroup24(): ?bool
    {
        return $this->in_group_24;
    }

    /**
     * @param DateTimeInterface|null $medic_exam
     */
    public function setMedicExam(?DateTimeInterface $medic_exam): void
    {
        $this->medic_exam = $medic_exam;
    }

    /**
     * @param bool|null $in_group_31
     */
    public function setInGroup31(?bool $in_group_31): void
    {
        $this->in_group_31 = $in_group_31;
    }

    /**
     * @param bool|null $in_group_26
     */
    public function setInGroup26(?bool $in_group_26): void
    {
        $this->in_group_26 = $in_group_26;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_26")
     */
    public function isInGroup26(): ?bool
    {
        return $this->in_group_26;
    }

    /**
     * @param bool|null $in_group_25
     */
    public function setInGroup25(?bool $in_group_25): void
    {
        $this->in_group_25 = $in_group_25;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_25")
     */
    public function isInGroup25(): ?bool
    {
        return $this->in_group_25;
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
     *
     * @SerializedName("in_group_15")
     */
    public function isInGroup15(): ?bool
    {
        return $this->in_group_15;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_31")
     */
    public function isInGroup31(): ?bool
    {
        return $this->in_group_31;
    }

    /**
     * @param bool|null $in_group_24
     */
    public function setInGroup24(?bool $in_group_24): void
    {
        $this->in_group_24 = $in_group_24;
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
     *
     * @SerializedName("in_group_32")
     */
    public function isInGroup32(): ?bool
    {
        return $this->in_group_32;
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
     * @return string|null
     *
     * @SerializedName("vehicle")
     */
    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("medic_exam")
     */
    public function getMedicExam(): ?DateTimeInterface
    {
        return $this->medic_exam;
    }

    /**
     * @param bool|null $in_group_12
     */
    public function setInGroup12(?bool $in_group_12): void
    {
        $this->in_group_12 = $in_group_12;
    }

    /**
     * @param string|null $visa_no
     */
    public function setVisaNo(?string $visa_no): void
    {
        $this->visa_no = $visa_no;
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
     * @SerializedName("additional_note")
     */
    public function getAdditionalNote(): ?string
    {
        return $this->additional_note;
    }

    /**
     * @param DateTimeInterface|null $visa_expire
     */
    public function setVisaExpire(?DateTimeInterface $visa_expire): void
    {
        $this->visa_expire = $visa_expire;
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
     * @param string|null $permit_no
     */
    public function setPermitNo(?string $permit_no): void
    {
        $this->permit_no = $permit_no;
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
     * @return string|null
     *
     * @SerializedName("visa_no")
     */
    public function getVisaNo(): ?string
    {
        return $this->visa_no;
    }

    /**
     * @param string|null $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
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
     * @SerializedName("emergency_phone")
     */
    public function getEmergencyPhone(): ?string
    {
        return $this->emergency_phone;
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
     * @SerializedName("emergency_contact")
     */
    public function getEmergencyContact(): ?string
    {
        return $this->emergency_contact;
    }

    /**
     * @param int|null $children
     */
    public function setChildren(?int $children): void
    {
        $this->children = $children;
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
     * @return string|null
     *
     * @SerializedName("barcode")
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
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
     * @param bool|null $can_edit
     */
    public function setCanEdit(?bool $can_edit): void
    {
        $this->can_edit = $can_edit;
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
     * @return bool|null
     *
     * @SerializedName("can_edit")
     */
    public function isCanEdit(): ?bool
    {
        return $this->can_edit;
    }

    /**
     * @param string|null $last_activity_time
     */
    public function setLastActivityTime(?string $last_activity_time): void
    {
        $this->last_activity_time = $last_activity_time;
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
     * @param DateTimeInterface|null $last_activity
     */
    public function setLastActivity(?DateTimeInterface $last_activity): void
    {
        $this->last_activity = $last_activity;
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
     * @param string|null $hr_presence_state
     */
    public function setHrPresenceState(?string $hr_presence_state): void
    {
        $this->hr_presence_state = $hr_presence_state;
    }

    /**
     * @param int|null $employee_count
     */
    public function setEmployeeCount(?int $employee_count): void
    {
        $this->employee_count = $employee_count;
    }

    /**
     * @param string|null $pin
     */
    public function setPin(?string $pin): void
    {
        $this->pin = $pin;
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
     * @param string|null $study_school
     */
    public function setStudySchool(?string $study_school): void
    {
        $this->study_school = $study_school;
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
     * @param string|null $study_field
     */
    public function setStudyField(?string $study_field): void
    {
        $this->study_field = $study_field;
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
     * @param string|null $certificate
     */
    public function setCertificate(?string $certificate): void
    {
        $this->certificate = $certificate;
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
     * @return bool|null
     *
     * @SerializedName("in_group_12")
     */
    public function isInGroup12(): ?bool
    {
        return $this->in_group_12;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_13")
     */
    public function isInGroup13(): ?bool
    {
        return $this->in_group_13;
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
     * @return string|null
     *
     * @SerializedName("sel_groups_48_49")
     */
    public function getSelGroups4849(): ?string
    {
        return $this->sel_groups_48_49;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_35_36")
     */
    public function getSelGroups3536(): ?string
    {
        return $this->sel_groups_35_36;
    }

    /**
     * @param string|null $sel_groups_56_57
     */
    public function setSelGroups5657(?string $sel_groups_56_57): void
    {
        $this->sel_groups_56_57 = $sel_groups_56_57;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_56_57")
     */
    public function getSelGroups5657(): ?string
    {
        return $this->sel_groups_56_57;
    }

    /**
     * @param string|null $sel_groups_19_22_23
     */
    public function setSelGroups192223(?string $sel_groups_19_22_23): void
    {
        $this->sel_groups_19_22_23 = $sel_groups_19_22_23;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_19_22_23")
     */
    public function getSelGroups192223(): ?string
    {
        return $this->sel_groups_19_22_23;
    }

    /**
     * @param string|null $sel_groups_48_49
     */
    public function setSelGroups4849(?string $sel_groups_48_49): void
    {
        $this->sel_groups_48_49 = $sel_groups_48_49;
    }

    /**
     * @param string|null $sel_groups_27_28_29
     */
    public function setSelGroups272829(?string $sel_groups_27_28_29): void
    {
        $this->sel_groups_27_28_29 = $sel_groups_27_28_29;
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
     * @return string|null
     *
     * @SerializedName("sel_groups_27_28_29")
     */
    public function getSelGroups272829(): ?string
    {
        return $this->sel_groups_27_28_29;
    }

    /**
     * @param string|null $sel_groups_44_45
     */
    public function setSelGroups4445(?string $sel_groups_44_45): void
    {
        $this->sel_groups_44_45 = $sel_groups_44_45;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_44_45")
     */
    public function getSelGroups4445(): ?string
    {
        return $this->sel_groups_44_45;
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
     * @param bool|null $in_group_21
     */
    public function setInGroup21(?bool $in_group_21): void
    {
        $this->in_group_21 = $in_group_21;
    }

    /**
     * @param string|null $sel_groups_35_36
     */
    public function setSelGroups3536(?string $sel_groups_35_36): void
    {
        $this->sel_groups_35_36 = $sel_groups_35_36;
    }

    /**
     * @param string|null $sel_groups_1_8_9
     */
    public function setSelGroups189(?string $sel_groups_1_8_9): void
    {
        $this->sel_groups_1_8_9 = $sel_groups_1_8_9;
    }

    /**
     * @param bool|null $in_group_20
     */
    public function setInGroup20(?bool $in_group_20): void
    {
        $this->in_group_20 = $in_group_20;
    }

    /**
     * @param bool|null $in_group_4
     */
    public function setInGroup4(?bool $in_group_4): void
    {
        $this->in_group_4 = $in_group_4;
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
     * @return bool|null
     *
     * @SerializedName("in_group_4")
     */
    public function isInGroup4(): ?bool
    {
        return $this->in_group_4;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_37")
     */
    public function getSelGroups37(): ?string
    {
        return $this->sel_groups_37;
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
     * @param string|null $sel_groups_43_41_42
     */
    public function setSelGroups434142(?string $sel_groups_43_41_42): void
    {
        $this->sel_groups_43_41_42 = $sel_groups_43_41_42;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_43_41_42")
     */
    public function getSelGroups434142(): ?string
    {
        return $this->sel_groups_43_41_42;
    }

    /**
     * @param string|null $sel_groups_38_39_40
     */
    public function setSelGroups383940(?string $sel_groups_38_39_40): void
    {
        $this->sel_groups_38_39_40 = $sel_groups_38_39_40;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sel_groups_38_39_40")
     */
    public function getSelGroups383940(): ?string
    {
        return $this->sel_groups_38_39_40;
    }

    /**
     * @param string|null $sel_groups_37
     */
    public function setSelGroups37(?string $sel_groups_37): void
    {
        $this->sel_groups_37 = $sel_groups_37;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_21")
     */
    public function isInGroup21(): ?bool
    {
        return $this->in_group_21;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_20")
     */
    public function isInGroup20(): ?bool
    {
        return $this->in_group_20;
    }

    /**
     * @param bool|null $in_group_13
     */
    public function setInGroup13(?bool $in_group_13): void
    {
        $this->in_group_13 = $in_group_13;
    }

    /**
     * @param bool|null $in_group_60
     */
    public function setInGroup60(?bool $in_group_60): void
    {
        $this->in_group_60 = $in_group_60;
    }

    /**
     * @param bool|null $in_group_54
     */
    public function setInGroup54(?bool $in_group_54): void
    {
        $this->in_group_54 = $in_group_54;
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
     * @param bool|null $in_group_30
     */
    public function setInGroup30(?bool $in_group_30): void
    {
        $this->in_group_30 = $in_group_30;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_30")
     */
    public function isInGroup30(): ?bool
    {
        return $this->in_group_30;
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
     * @return bool|null
     *
     * @SerializedName("in_group_60")
     */
    public function isInGroup60(): ?bool
    {
        return $this->in_group_60;
    }

    /**
     * @param bool|null $in_group_50
     */
    public function setInGroup50(?bool $in_group_50): void
    {
        $this->in_group_50 = $in_group_50;
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
     * @param bool|null $in_group_18
     */
    public function setInGroup18(?bool $in_group_18): void
    {
        $this->in_group_18 = $in_group_18;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_18")
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
     *
     * @SerializedName("in_group_14")
     */
    public function isInGroup14(): ?bool
    {
        return $this->in_group_14;
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
     * @return bool|null
     *
     * @SerializedName("in_group_46")
     */
    public function isInGroup46(): ?bool
    {
        return $this->in_group_46;
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
     *
     * @SerializedName("in_group_17")
     */
    public function isInGroup17(): ?bool
    {
        return $this->in_group_17;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_34")
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
     *
     * @SerializedName("in_group_33")
     */
    public function isInGroup33(): ?bool
    {
        return $this->in_group_33;
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
     * @SerializedName("in_group_53")
     */
    public function isInGroup53(): ?bool
    {
        return $this->in_group_53;
    }

    /**
     * @param bool|null $in_group_17
     */
    public function setInGroup17(?bool $in_group_17): void
    {
        $this->in_group_17 = $in_group_17;
    }

    /**
     * @param bool|null $in_group_16
     */
    public function setInGroup16(?bool $in_group_16): void
    {
        $this->in_group_16 = $in_group_16;
    }

    /**
     * @param bool|null $in_group_46
     */
    public function setInGroup46(?bool $in_group_46): void
    {
        $this->in_group_46 = $in_group_46;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_16")
     */
    public function isInGroup16(): ?bool
    {
        return $this->in_group_16;
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
     * @param bool|null $in_group_47
     */
    public function setInGroup47(?bool $in_group_47): void
    {
        $this->in_group_47 = $in_group_47;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("in_group_47")
     */
    public function isInGroup47(): ?bool
    {
        return $this->in_group_47;
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
     * @SerializedName("in_group_11")
     */
    public function isInGroup11(): ?bool
    {
        return $this->in_group_11;
    }

    /**
     * @param DateTimeInterface|null $spouse_birthdate
     */
    public function setSpouseBirthdate(?DateTimeInterface $spouse_birthdate): void
    {
        $this->spouse_birthdate = $spouse_birthdate;
    }

    /**
     * @param string|null $spouse_complete_name
     */
    public function setSpouseCompleteName(?string $spouse_complete_name): void
    {
        $this->spouse_complete_name = $spouse_complete_name;
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
     * @param string $notification_type
     */
    public function setNotificationType(string $notification_type): void
    {
        $this->notification_type = $notification_type;
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
     *
     * @SerializedName("resource_ids")
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
     * @return string
     *
     * @SerializedName("notification_type")
     */
    public function getNotificationType(): string
    {
        return $this->notification_type;
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
     * @param int|null $accesses_count
     */
    public function setAccessesCount(?int $accesses_count): void
    {
        $this->accesses_count = $accesses_count;
    }

    /**
     * @param string|null $out_of_office_message
     */
    public function setOutOfOfficeMessage(?string $out_of_office_message): void
    {
        $this->out_of_office_message = $out_of_office_message;
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
     *
     * @SerializedName("sale_team_id")
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
     *
     * @SerializedName("odoobot_state")
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
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
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
     * @param bool|null $is_moderator
     */
    public function setIsModerator(?bool $is_moderator): void
    {
        $this->is_moderator = $is_moderator;
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
     * @param int|null $moderation_counter
     */
    public function setModerationCounter(?int $moderation_counter): void
    {
        $this->moderation_counter = $moderation_counter;
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
     * @return int|null
     *
     * @SerializedName("rules_count")
     */
    public function getRulesCount(): ?int
    {
        return $this->rules_count;
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
     * @param OdooRelation|null $oauth_provider_id
     */
    public function setOauthProviderId(?OdooRelation $oauth_provider_id): void
    {
        $this->oauth_provider_id = $oauth_provider_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups_id")
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
     *
     * @SerializedName("action_id")
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
     * @param string|null $new_password
     */
    public function setNewPassword(?string $new_password): void
    {
        $this->new_password = $new_password;
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
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     * @param bool|null $share
     */
    public function setShare(?bool $share): void
    {
        $this->share = $share;
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
     * @return int|null
     *
     * @SerializedName("companies_count")
     */
    public function getCompaniesCount(): ?int
    {
        return $this->companies_count;
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
     * @param DateTimeInterface|null $login_date
     */
    public function setLoginDate(?DateTimeInterface $login_date): void
    {
        $this->login_date = $login_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("oauth_provider_id")
     */
    public function getOauthProviderId(): ?OdooRelation
    {
        return $this->oauth_provider_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("oauth_uid")
     */
    public function getOauthUid(): ?string
    {
        return $this->oauth_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("address_home_id")
     */
    public function getAddressHomeId(): ?OdooRelation
    {
        return $this->address_home_id;
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
     * @param string|null $private_email
     */
    public function setPrivateEmail(?string $private_email): void
    {
        $this->private_email = $private_email;
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
     * @param bool|null $is_address_home_a_company
     */
    public function setIsAddressHomeACompany(?bool $is_address_home_a_company): void
    {
        $this->is_address_home_a_company = $is_address_home_a_company;
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
     * @param OdooRelation|null $address_home_id
     */
    public function setAddressHomeId(?OdooRelation $address_home_id): void
    {
        $this->address_home_id = $address_home_id;
    }

    /**
     * @param OdooRelation|null $coach_id
     */
    public function setCoachId(?OdooRelation $coach_id): void
    {
        $this->coach_id = $coach_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("coach_id")
     */
    public function getCoachId(): ?OdooRelation
    {
        return $this->coach_id;
    }

    /**
     * @param OdooRelation|null $employee_parent_id
     */
    public function setEmployeeParentId(?OdooRelation $employee_parent_id): void
    {
        $this->employee_parent_id = $employee_parent_id;
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
     * @param string|null $work_location
     */
    public function setWorkLocation(?string $work_location): void
    {
        $this->work_location = $work_location;
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
     * @param OdooRelation|null $address_id
     */
    public function setAddressId(?OdooRelation $address_id): void
    {
        $this->address_id = $address_id;
    }

    /**
     * @param int|null $km_home_work
     */
    public function setKmHomeWork(?int $km_home_work): void
    {
        $this->km_home_work = $km_home_work;
    }

    /**
     * @param OdooRelation|null $employee_bank_account_id
     */
    public function setEmployeeBankAccountId(?OdooRelation $employee_bank_account_id): void
    {
        $this->employee_bank_account_id = $employee_bank_account_id;
    }

    /**
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @param DateTimeInterface|null $birthday
     */
    public function setBirthday(?DateTimeInterface $birthday): void
    {
        $this->birthday = $birthday;
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
     * @SerializedName("marital")
     */
    public function getMarital(): ?string
    {
        return $this->marital;
    }

    /**
     * @param OdooRelation|null $country_of_birth
     */
    public function setCountryOfBirth(?OdooRelation $country_of_birth): void
    {
        $this->country_of_birth = $country_of_birth;
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
     * @param string|null $place_of_birth
     */
    public function setPlaceOfBirth(?string $place_of_birth): void
    {
        $this->place_of_birth = $place_of_birth;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("birthday")
     */
    public function getBirthday(): ?DateTimeInterface
    {
        return $this->birthday;
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
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
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
     * @param string|null $passport_id
     */
    public function setPassportId(?string $passport_id): void
    {
        $this->passport_id = $passport_id;
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
     * @param string|null $identification_id
     */
    public function setIdentificationId(?string $identification_id): void
    {
        $this->identification_id = $identification_id;
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
     * @param OdooRelation|null $employee_country_id
     */
    public function setEmployeeCountryId(?OdooRelation $employee_country_id): void
    {
        $this->employee_country_id = $employee_country_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
    }

    /**
     * @param string|null $oauth_uid
     */
    public function setOauthUid(?string $oauth_uid): void
    {
        $this->oauth_uid = $oauth_uid;
    }

    /**
     * @param DateTimeInterface|null $google_calendar_token_validity
     */
    public function setGoogleCalendarTokenValidity(?DateTimeInterface $google_calendar_token_validity): void
    {
        $this->google_calendar_token_validity = $google_calendar_token_validity;
    }

    /**
     * @param OdooRelation[]|null $employee_ids
     */
    public function setEmployeeIds(?array $employee_ids): void
    {
        $this->employee_ids = $employee_ids;
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
     * @param string|null $google_calendar_cal_id
     */
    public function setGoogleCalendarCalId(?string $google_calendar_cal_id): void
    {
        $this->google_calendar_cal_id = $google_calendar_cal_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_calendar_cal_id")
     */
    public function getGoogleCalendarCalId(): ?string
    {
        return $this->google_calendar_cal_id;
    }

    /**
     * @param DateTimeInterface|null $google_calendar_last_sync_date
     */
    public function setGoogleCalendarLastSyncDate(?DateTimeInterface $google_calendar_last_sync_date): void
    {
        $this->google_calendar_last_sync_date = $google_calendar_last_sync_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("google_calendar_last_sync_date")
     */
    public function getGoogleCalendarLastSyncDate(): ?DateTimeInterface
    {
        return $this->google_calendar_last_sync_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("google_calendar_token_validity")
     */
    public function getGoogleCalendarTokenValidity(): ?DateTimeInterface
    {
        return $this->google_calendar_token_validity;
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
     * @param string|null $google_calendar_token
     */
    public function setGoogleCalendarToken(?string $google_calendar_token): void
    {
        $this->google_calendar_token = $google_calendar_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_calendar_token")
     */
    public function getGoogleCalendarToken(): ?string
    {
        return $this->google_calendar_token;
    }

    /**
     * @param string|null $google_calendar_rtoken
     */
    public function setGoogleCalendarRtoken(?string $google_calendar_rtoken): void
    {
        $this->google_calendar_rtoken = $google_calendar_rtoken;
    }

    /**
     * @return string|null
     *
     * @SerializedName("google_calendar_rtoken")
     */
    public function getGoogleCalendarRtoken(): ?string
    {
        return $this->google_calendar_rtoken;
    }

    /**
     * @param string|null $oauth_access_token
     */
    public function setOauthAccessToken(?string $oauth_access_token): void
    {
        $this->oauth_access_token = $oauth_access_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("oauth_access_token")
     */
    public function getOauthAccessToken(): ?string
    {
        return $this->oauth_access_token;
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
     * @param string|null $employee_phone
     */
    public function setEmployeePhone(?string $employee_phone): void
    {
        $this->employee_phone = $employee_phone;
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
     * @param OdooRelation[]|null $category_ids
     */
    public function setCategoryIds(?array $category_ids): void
    {
        $this->category_ids = $category_ids;
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
     * @param string|null $work_email
     */
    public function setWorkEmail(?string $work_email): void
    {
        $this->work_email = $work_email;
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
     * @return string|null
     *
     * @SerializedName("employee_phone")
     */
    public function getEmployeePhone(): ?string
    {
        return $this->employee_phone;
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
     * @param string|null $mobile_phone
     */
    public function setMobilePhone(?string $mobile_phone): void
    {
        $this->mobile_phone = $mobile_phone;
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
     * @param string|null $work_phone
     */
    public function setWorkPhone(?string $work_phone): void
    {
        $this->work_phone = $work_phone;
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
     * @param string|null $job_title
     */
    public function setJobTitle(?string $job_title): void
    {
        $this->job_title = $job_title;
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
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.users';
    }
}
