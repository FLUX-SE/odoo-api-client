<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Hr;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.employee
 * ---
 * Name : hr.employee
 * ---
 * Info :
 * NB: Any field only available on the model hr.employee (i.e. not on the
 *         hr.employee.public model) should have `groups="hr.group_hr_user"` on its
 *         definition to avoid being prefetched when the user hasn't access to the
 *         hr.employee model. Indeed, the prefetch loads the data for all the fields
 *         that are available according to the group defined on them.
 */
final class Employee extends Base
{
    /**
     * Employee Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * User
     * ---
     * Related user name for the resource to manage its access.
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * User's partner
     * ---
     * Partner-related data of the user
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $user_partner_id;

    /**
     * Active
     * ---
     * If the active field is set to False, it will allow you to hide the resource record without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Address
     * ---
     * Enter here the private address of the employee, not the one linked to your company.
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Nationality (Country)
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Gender
     * ---
     * Selection :
     *     -> male (Male)
     *     -> female (Female)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $gender;

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
     * Sortable : yes
     *
     * @var string|null
     */
    private $marital;

    /**
     * Spouse Complete Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $spouse_complete_name;

    /**
     * Spouse Birthdate
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $spouse_birthdate;

    /**
     * Number of Children
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $children;

    /**
     * Place of Birth
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $place_of_birth;

    /**
     * Country of Birth
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_of_birth;

    /**
     * Date of Birth
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $birthday;

    /**
     * SSN No
     * ---
     * Social Security Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ssnid;

    /**
     * SIN No
     * ---
     * Social Insurance Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sinid;

    /**
     * Identification No
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $identification_id;

    /**
     * Passport No
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $passport_id;

    /**
     * Bank Account Number
     * ---
     * Employee bank salary account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $bank_account_id;

    /**
     * Work Permit No
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $permit_no;

    /**
     * Visa No
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $visa_no;

    /**
     * Visa Expire Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $visa_expire;

    /**
     * Additional Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $additional_note;

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
     * Sortable : yes
     *
     * @var string|null
     */
    private $certificate;

    /**
     * Field of Study
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $study_field;

    /**
     * School
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $study_school;

    /**
     * Emergency Contact
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $emergency_contact;

    /**
     * Emergency Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $emergency_phone;

    /**
     * Home-Work Distance
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $km_home_work;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_1920;

    /**
     * Private Phone
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $phone;

    /**
     * Direct subordinates
     * ---
     * Relation : one2many (hr.employee -> parent_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_ids;

    /**
     * Tags
     * ---
     * Relation : many2many (hr.employee.category)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $category_ids;

    /**
     * Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $notes;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Badge ID
     * ---
     * ID used for employee identification.
     * ---
     * Searchable : yes
     * Sortable : yes
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
     * Sortable : yes
     *
     * @var string|null
     */
    private $pin;

    /**
     * Departure Reason
     * ---
     * Selection :
     *     -> fired (Fired)
     *     -> resigned (Resigned)
     *     -> retired (Retired)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $departure_reason;

    /**
     * Additional Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $departure_description;

    /**
     * Departure Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $departure_date;

    /**
     * Main Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $message_main_attachment_id;

    /**
     * Company Vehicle
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $vehicle;

    /**
     * Employee Contracts
     * ---
     * Relation : one2many (hr.contract -> employee_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $contract_ids;

    /**
     * Current Contract
     * ---
     * Current contract of the employee
     * ---
     * Relation : many2one (hr.contract)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $contract_id;

    /**
     * Calendar Mismatch
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $calendar_mismatch;

    /**
     * Contract Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $contracts_count;

    /**
     * Contract Warning
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $contract_warning;

    /**
     * First Contract Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $first_contract_date;

    /**
     * Subordinates
     * ---
     * Direct and indirect subordinates
     * ---
     * Relation : one2many (hr.employee)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $subordinate_ids;

    /**
     * Payslips
     * ---
     * Relation : one2many (hr.payslip -> employee_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Payslip
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $slip_ids;

    /**
     * Payslip Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $payslip_count;

    /**
     * Registration Number of the Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $registration_number;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_128;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity
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
     * Selection :
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Activity Type Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_type_icon;

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
     * Selection :
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Followers
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Channel
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
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
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
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
     * Department
     * ---
     * Relation : many2one (hr.department)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Department
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $department_id;

    /**
     * Job Position
     * ---
     * Relation : many2one (hr.job)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Job
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $job_id;

    /**
     * Job Title
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $job_title;

    /**
     * Work Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $address_id;

    /**
     * Work Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_phone;

    /**
     * Work Mobile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $mobile_phone;

    /**
     * Work Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_email;

    /**
     * Work Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_location;

    /**
     * Resource
     * ---
     * Relation : many2one (resource.resource)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Resource_\Resource_
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $resource_id;

    /**
     * Working Hours
     * ---
     * Define the schedule of resource
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Manager
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Coach
     * ---
     * Select the "Employee" who is the coach of this employee.
     * The "Coach" has no specific rights or responsibilities by default.
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $coach_id;

    /**
     * Timezone
     * ---
     * This field is used in order to define in which timezone the resources will work.
     * ---
     * Selection :
     *     -> Africa/Abidjan (Africa/Abidjan)
     *     -> Africa/Accra (Africa/Accra)
     *     -> Africa/Addis_Ababa (Africa/Addis_Ababa)
     *     -> Africa/Algiers (Africa/Algiers)
     *     -> Africa/Asmara (Africa/Asmara)
     *     -> Africa/Asmera (Africa/Asmera)
     *     -> Africa/Bamako (Africa/Bamako)
     *     -> Africa/Bangui (Africa/Bangui)
     *     -> Africa/Banjul (Africa/Banjul)
     *     -> Africa/Bissau (Africa/Bissau)
     *     -> Africa/Blantyre (Africa/Blantyre)
     *     -> Africa/Brazzaville (Africa/Brazzaville)
     *     -> Africa/Bujumbura (Africa/Bujumbura)
     *     -> Africa/Cairo (Africa/Cairo)
     *     -> Africa/Casablanca (Africa/Casablanca)
     *     -> Africa/Ceuta (Africa/Ceuta)
     *     -> Africa/Conakry (Africa/Conakry)
     *     -> Africa/Dakar (Africa/Dakar)
     *     -> Africa/Dar_es_Salaam (Africa/Dar_es_Salaam)
     *     -> Africa/Djibouti (Africa/Djibouti)
     *     -> Africa/Douala (Africa/Douala)
     *     -> Africa/El_Aaiun (Africa/El_Aaiun)
     *     -> Africa/Freetown (Africa/Freetown)
     *     -> Africa/Gaborone (Africa/Gaborone)
     *     -> Africa/Harare (Africa/Harare)
     *     -> Africa/Johannesburg (Africa/Johannesburg)
     *     -> Africa/Juba (Africa/Juba)
     *     -> Africa/Kampala (Africa/Kampala)
     *     -> Africa/Khartoum (Africa/Khartoum)
     *     -> Africa/Kigali (Africa/Kigali)
     *     -> Africa/Kinshasa (Africa/Kinshasa)
     *     -> Africa/Lagos (Africa/Lagos)
     *     -> Africa/Libreville (Africa/Libreville)
     *     -> Africa/Lome (Africa/Lome)
     *     -> Africa/Luanda (Africa/Luanda)
     *     -> Africa/Lubumbashi (Africa/Lubumbashi)
     *     -> Africa/Lusaka (Africa/Lusaka)
     *     -> Africa/Malabo (Africa/Malabo)
     *     -> Africa/Maputo (Africa/Maputo)
     *     -> Africa/Maseru (Africa/Maseru)
     *     -> Africa/Mbabane (Africa/Mbabane)
     *     -> Africa/Mogadishu (Africa/Mogadishu)
     *     -> Africa/Monrovia (Africa/Monrovia)
     *     -> Africa/Nairobi (Africa/Nairobi)
     *     -> Africa/Ndjamena (Africa/Ndjamena)
     *     -> Africa/Niamey (Africa/Niamey)
     *     -> Africa/Nouakchott (Africa/Nouakchott)
     *     -> Africa/Ouagadougou (Africa/Ouagadougou)
     *     -> Africa/Porto-Novo (Africa/Porto-Novo)
     *     -> Africa/Sao_Tome (Africa/Sao_Tome)
     *     -> Africa/Timbuktu (Africa/Timbuktu)
     *     -> Africa/Tripoli (Africa/Tripoli)
     *     -> Africa/Tunis (Africa/Tunis)
     *     -> Africa/Windhoek (Africa/Windhoek)
     *     -> America/Adak (America/Adak)
     *     -> America/Anchorage (America/Anchorage)
     *     -> America/Anguilla (America/Anguilla)
     *     -> America/Antigua (America/Antigua)
     *     -> America/Araguaina (America/Araguaina)
     *     -> America/Argentina/Buenos_Aires (America/Argentina/Buenos_Aires)
     *     -> America/Argentina/Catamarca (America/Argentina/Catamarca)
     *     -> America/Argentina/ComodRivadavia (America/Argentina/ComodRivadavia)
     *     -> America/Argentina/Cordoba (America/Argentina/Cordoba)
     *     -> America/Argentina/Jujuy (America/Argentina/Jujuy)
     *     -> America/Argentina/La_Rioja (America/Argentina/La_Rioja)
     *     -> America/Argentina/Mendoza (America/Argentina/Mendoza)
     *     -> America/Argentina/Rio_Gallegos (America/Argentina/Rio_Gallegos)
     *     -> America/Argentina/Salta (America/Argentina/Salta)
     *     -> America/Argentina/San_Juan (America/Argentina/San_Juan)
     *     -> America/Argentina/San_Luis (America/Argentina/San_Luis)
     *     -> America/Argentina/Tucuman (America/Argentina/Tucuman)
     *     -> America/Argentina/Ushuaia (America/Argentina/Ushuaia)
     *     -> America/Aruba (America/Aruba)
     *     -> America/Asuncion (America/Asuncion)
     *     -> America/Atikokan (America/Atikokan)
     *     -> America/Atka (America/Atka)
     *     -> America/Bahia (America/Bahia)
     *     -> America/Bahia_Banderas (America/Bahia_Banderas)
     *     -> America/Barbados (America/Barbados)
     *     -> America/Belem (America/Belem)
     *     -> America/Belize (America/Belize)
     *     -> America/Blanc-Sablon (America/Blanc-Sablon)
     *     -> America/Boa_Vista (America/Boa_Vista)
     *     -> America/Bogota (America/Bogota)
     *     -> America/Boise (America/Boise)
     *     -> America/Buenos_Aires (America/Buenos_Aires)
     *     -> America/Cambridge_Bay (America/Cambridge_Bay)
     *     -> America/Campo_Grande (America/Campo_Grande)
     *     -> America/Cancun (America/Cancun)
     *     -> America/Caracas (America/Caracas)
     *     -> America/Catamarca (America/Catamarca)
     *     -> America/Cayenne (America/Cayenne)
     *     -> America/Cayman (America/Cayman)
     *     -> America/Chicago (America/Chicago)
     *     -> America/Chihuahua (America/Chihuahua)
     *     -> America/Coral_Harbour (America/Coral_Harbour)
     *     -> America/Cordoba (America/Cordoba)
     *     -> America/Costa_Rica (America/Costa_Rica)
     *     -> America/Creston (America/Creston)
     *     -> America/Cuiaba (America/Cuiaba)
     *     -> America/Curacao (America/Curacao)
     *     -> America/Danmarkshavn (America/Danmarkshavn)
     *     -> America/Dawson (America/Dawson)
     *     -> America/Dawson_Creek (America/Dawson_Creek)
     *     -> America/Denver (America/Denver)
     *     -> America/Detroit (America/Detroit)
     *     -> America/Dominica (America/Dominica)
     *     -> America/Edmonton (America/Edmonton)
     *     -> America/Eirunepe (America/Eirunepe)
     *     -> America/El_Salvador (America/El_Salvador)
     *     -> America/Ensenada (America/Ensenada)
     *     -> America/Fort_Nelson (America/Fort_Nelson)
     *     -> America/Fort_Wayne (America/Fort_Wayne)
     *     -> America/Fortaleza (America/Fortaleza)
     *     -> America/Glace_Bay (America/Glace_Bay)
     *     -> America/Godthab (America/Godthab)
     *     -> America/Goose_Bay (America/Goose_Bay)
     *     -> America/Grand_Turk (America/Grand_Turk)
     *     -> America/Grenada (America/Grenada)
     *     -> America/Guadeloupe (America/Guadeloupe)
     *     -> America/Guatemala (America/Guatemala)
     *     -> America/Guayaquil (America/Guayaquil)
     *     -> America/Guyana (America/Guyana)
     *     -> America/Halifax (America/Halifax)
     *     -> America/Havana (America/Havana)
     *     -> America/Hermosillo (America/Hermosillo)
     *     -> America/Indiana/Indianapolis (America/Indiana/Indianapolis)
     *     -> America/Indiana/Knox (America/Indiana/Knox)
     *     -> America/Indiana/Marengo (America/Indiana/Marengo)
     *     -> America/Indiana/Petersburg (America/Indiana/Petersburg)
     *     -> America/Indiana/Tell_City (America/Indiana/Tell_City)
     *     -> America/Indiana/Vevay (America/Indiana/Vevay)
     *     -> America/Indiana/Vincennes (America/Indiana/Vincennes)
     *     -> America/Indiana/Winamac (America/Indiana/Winamac)
     *     -> America/Indianapolis (America/Indianapolis)
     *     -> America/Inuvik (America/Inuvik)
     *     -> America/Iqaluit (America/Iqaluit)
     *     -> America/Jamaica (America/Jamaica)
     *     -> America/Jujuy (America/Jujuy)
     *     -> America/Juneau (America/Juneau)
     *     -> America/Kentucky/Louisville (America/Kentucky/Louisville)
     *     -> America/Kentucky/Monticello (America/Kentucky/Monticello)
     *     -> America/Knox_IN (America/Knox_IN)
     *     -> America/Kralendijk (America/Kralendijk)
     *     -> America/La_Paz (America/La_Paz)
     *     -> America/Lima (America/Lima)
     *     -> America/Los_Angeles (America/Los_Angeles)
     *     -> America/Louisville (America/Louisville)
     *     -> America/Lower_Princes (America/Lower_Princes)
     *     -> America/Maceio (America/Maceio)
     *     -> America/Managua (America/Managua)
     *     -> America/Manaus (America/Manaus)
     *     -> America/Marigot (America/Marigot)
     *     -> America/Martinique (America/Martinique)
     *     -> America/Matamoros (America/Matamoros)
     *     -> America/Mazatlan (America/Mazatlan)
     *     -> America/Mendoza (America/Mendoza)
     *     -> America/Menominee (America/Menominee)
     *     -> America/Merida (America/Merida)
     *     -> America/Metlakatla (America/Metlakatla)
     *     -> America/Mexico_City (America/Mexico_City)
     *     -> America/Miquelon (America/Miquelon)
     *     -> America/Moncton (America/Moncton)
     *     -> America/Monterrey (America/Monterrey)
     *     -> America/Montevideo (America/Montevideo)
     *     -> America/Montreal (America/Montreal)
     *     -> America/Montserrat (America/Montserrat)
     *     -> America/Nassau (America/Nassau)
     *     -> America/New_York (America/New_York)
     *     -> America/Nipigon (America/Nipigon)
     *     -> America/Nome (America/Nome)
     *     -> America/Noronha (America/Noronha)
     *     -> America/North_Dakota/Beulah (America/North_Dakota/Beulah)
     *     -> America/North_Dakota/Center (America/North_Dakota/Center)
     *     -> America/North_Dakota/New_Salem (America/North_Dakota/New_Salem)
     *     -> America/Ojinaga (America/Ojinaga)
     *     -> America/Panama (America/Panama)
     *     -> America/Pangnirtung (America/Pangnirtung)
     *     -> America/Paramaribo (America/Paramaribo)
     *     -> America/Phoenix (America/Phoenix)
     *     -> America/Port-au-Prince (America/Port-au-Prince)
     *     -> America/Port_of_Spain (America/Port_of_Spain)
     *     -> America/Porto_Acre (America/Porto_Acre)
     *     -> America/Porto_Velho (America/Porto_Velho)
     *     -> America/Puerto_Rico (America/Puerto_Rico)
     *     -> America/Punta_Arenas (America/Punta_Arenas)
     *     -> America/Rainy_River (America/Rainy_River)
     *     -> America/Rankin_Inlet (America/Rankin_Inlet)
     *     -> America/Recife (America/Recife)
     *     -> America/Regina (America/Regina)
     *     -> America/Resolute (America/Resolute)
     *     -> America/Rio_Branco (America/Rio_Branco)
     *     -> America/Rosario (America/Rosario)
     *     -> America/Santa_Isabel (America/Santa_Isabel)
     *     -> America/Santarem (America/Santarem)
     *     -> America/Santiago (America/Santiago)
     *     -> America/Santo_Domingo (America/Santo_Domingo)
     *     -> America/Sao_Paulo (America/Sao_Paulo)
     *     -> America/Scoresbysund (America/Scoresbysund)
     *     -> America/Shiprock (America/Shiprock)
     *     -> America/Sitka (America/Sitka)
     *     -> America/St_Barthelemy (America/St_Barthelemy)
     *     -> America/St_Johns (America/St_Johns)
     *     -> America/St_Kitts (America/St_Kitts)
     *     -> America/St_Lucia (America/St_Lucia)
     *     -> America/St_Thomas (America/St_Thomas)
     *     -> America/St_Vincent (America/St_Vincent)
     *     -> America/Swift_Current (America/Swift_Current)
     *     -> America/Tegucigalpa (America/Tegucigalpa)
     *     -> America/Thule (America/Thule)
     *     -> America/Thunder_Bay (America/Thunder_Bay)
     *     -> America/Tijuana (America/Tijuana)
     *     -> America/Toronto (America/Toronto)
     *     -> America/Tortola (America/Tortola)
     *     -> America/Vancouver (America/Vancouver)
     *     -> America/Virgin (America/Virgin)
     *     -> America/Whitehorse (America/Whitehorse)
     *     -> America/Winnipeg (America/Winnipeg)
     *     -> America/Yakutat (America/Yakutat)
     *     -> America/Yellowknife (America/Yellowknife)
     *     -> Antarctica/Casey (Antarctica/Casey)
     *     -> Antarctica/Davis (Antarctica/Davis)
     *     -> Antarctica/DumontDUrville (Antarctica/DumontDUrville)
     *     -> Antarctica/Macquarie (Antarctica/Macquarie)
     *     -> Antarctica/Mawson (Antarctica/Mawson)
     *     -> Antarctica/McMurdo (Antarctica/McMurdo)
     *     -> Antarctica/Palmer (Antarctica/Palmer)
     *     -> Antarctica/Rothera (Antarctica/Rothera)
     *     -> Antarctica/South_Pole (Antarctica/South_Pole)
     *     -> Antarctica/Syowa (Antarctica/Syowa)
     *     -> Antarctica/Troll (Antarctica/Troll)
     *     -> Antarctica/Vostok (Antarctica/Vostok)
     *     -> Arctic/Longyearbyen (Arctic/Longyearbyen)
     *     -> Asia/Aden (Asia/Aden)
     *     -> Asia/Almaty (Asia/Almaty)
     *     -> Asia/Amman (Asia/Amman)
     *     -> Asia/Anadyr (Asia/Anadyr)
     *     -> Asia/Aqtau (Asia/Aqtau)
     *     -> Asia/Aqtobe (Asia/Aqtobe)
     *     -> Asia/Ashgabat (Asia/Ashgabat)
     *     -> Asia/Ashkhabad (Asia/Ashkhabad)
     *     -> Asia/Atyrau (Asia/Atyrau)
     *     -> Asia/Baghdad (Asia/Baghdad)
     *     -> Asia/Bahrain (Asia/Bahrain)
     *     -> Asia/Baku (Asia/Baku)
     *     -> Asia/Bangkok (Asia/Bangkok)
     *     -> Asia/Barnaul (Asia/Barnaul)
     *     -> Asia/Beirut (Asia/Beirut)
     *     -> Asia/Bishkek (Asia/Bishkek)
     *     -> Asia/Brunei (Asia/Brunei)
     *     -> Asia/Calcutta (Asia/Calcutta)
     *     -> Asia/Chita (Asia/Chita)
     *     -> Asia/Choibalsan (Asia/Choibalsan)
     *     -> Asia/Chongqing (Asia/Chongqing)
     *     -> Asia/Chungking (Asia/Chungking)
     *     -> Asia/Colombo (Asia/Colombo)
     *     -> Asia/Dacca (Asia/Dacca)
     *     -> Asia/Damascus (Asia/Damascus)
     *     -> Asia/Dhaka (Asia/Dhaka)
     *     -> Asia/Dili (Asia/Dili)
     *     -> Asia/Dubai (Asia/Dubai)
     *     -> Asia/Dushanbe (Asia/Dushanbe)
     *     -> Asia/Famagusta (Asia/Famagusta)
     *     -> Asia/Gaza (Asia/Gaza)
     *     -> Asia/Harbin (Asia/Harbin)
     *     -> Asia/Hebron (Asia/Hebron)
     *     -> Asia/Ho_Chi_Minh (Asia/Ho_Chi_Minh)
     *     -> Asia/Hong_Kong (Asia/Hong_Kong)
     *     -> Asia/Hovd (Asia/Hovd)
     *     -> Asia/Irkutsk (Asia/Irkutsk)
     *     -> Asia/Istanbul (Asia/Istanbul)
     *     -> Asia/Jakarta (Asia/Jakarta)
     *     -> Asia/Jayapura (Asia/Jayapura)
     *     -> Asia/Jerusalem (Asia/Jerusalem)
     *     -> Asia/Kabul (Asia/Kabul)
     *     -> Asia/Kamchatka (Asia/Kamchatka)
     *     -> Asia/Karachi (Asia/Karachi)
     *     -> Asia/Kashgar (Asia/Kashgar)
     *     -> Asia/Kathmandu (Asia/Kathmandu)
     *     -> Asia/Katmandu (Asia/Katmandu)
     *     -> Asia/Khandyga (Asia/Khandyga)
     *     -> Asia/Kolkata (Asia/Kolkata)
     *     -> Asia/Krasnoyarsk (Asia/Krasnoyarsk)
     *     -> Asia/Kuala_Lumpur (Asia/Kuala_Lumpur)
     *     -> Asia/Kuching (Asia/Kuching)
     *     -> Asia/Kuwait (Asia/Kuwait)
     *     -> Asia/Macao (Asia/Macao)
     *     -> Asia/Macau (Asia/Macau)
     *     -> Asia/Magadan (Asia/Magadan)
     *     -> Asia/Makassar (Asia/Makassar)
     *     -> Asia/Manila (Asia/Manila)
     *     -> Asia/Muscat (Asia/Muscat)
     *     -> Asia/Nicosia (Asia/Nicosia)
     *     -> Asia/Novokuznetsk (Asia/Novokuznetsk)
     *     -> Asia/Novosibirsk (Asia/Novosibirsk)
     *     -> Asia/Omsk (Asia/Omsk)
     *     -> Asia/Oral (Asia/Oral)
     *     -> Asia/Phnom_Penh (Asia/Phnom_Penh)
     *     -> Asia/Pontianak (Asia/Pontianak)
     *     -> Asia/Pyongyang (Asia/Pyongyang)
     *     -> Asia/Qatar (Asia/Qatar)
     *     -> Asia/Qostanay (Asia/Qostanay)
     *     -> Asia/Qyzylorda (Asia/Qyzylorda)
     *     -> Asia/Rangoon (Asia/Rangoon)
     *     -> Asia/Riyadh (Asia/Riyadh)
     *     -> Asia/Saigon (Asia/Saigon)
     *     -> Asia/Sakhalin (Asia/Sakhalin)
     *     -> Asia/Samarkand (Asia/Samarkand)
     *     -> Asia/Seoul (Asia/Seoul)
     *     -> Asia/Shanghai (Asia/Shanghai)
     *     -> Asia/Singapore (Asia/Singapore)
     *     -> Asia/Srednekolymsk (Asia/Srednekolymsk)
     *     -> Asia/Taipei (Asia/Taipei)
     *     -> Asia/Tashkent (Asia/Tashkent)
     *     -> Asia/Tbilisi (Asia/Tbilisi)
     *     -> Asia/Tehran (Asia/Tehran)
     *     -> Asia/Tel_Aviv (Asia/Tel_Aviv)
     *     -> Asia/Thimbu (Asia/Thimbu)
     *     -> Asia/Thimphu (Asia/Thimphu)
     *     -> Asia/Tokyo (Asia/Tokyo)
     *     -> Asia/Tomsk (Asia/Tomsk)
     *     -> Asia/Ujung_Pandang (Asia/Ujung_Pandang)
     *     -> Asia/Ulaanbaatar (Asia/Ulaanbaatar)
     *     -> Asia/Ulan_Bator (Asia/Ulan_Bator)
     *     -> Asia/Urumqi (Asia/Urumqi)
     *     -> Asia/Ust-Nera (Asia/Ust-Nera)
     *     -> Asia/Vientiane (Asia/Vientiane)
     *     -> Asia/Vladivostok (Asia/Vladivostok)
     *     -> Asia/Yakutsk (Asia/Yakutsk)
     *     -> Asia/Yangon (Asia/Yangon)
     *     -> Asia/Yekaterinburg (Asia/Yekaterinburg)
     *     -> Asia/Yerevan (Asia/Yerevan)
     *     -> Atlantic/Azores (Atlantic/Azores)
     *     -> Atlantic/Bermuda (Atlantic/Bermuda)
     *     -> Atlantic/Canary (Atlantic/Canary)
     *     -> Atlantic/Cape_Verde (Atlantic/Cape_Verde)
     *     -> Atlantic/Faeroe (Atlantic/Faeroe)
     *     -> Atlantic/Faroe (Atlantic/Faroe)
     *     -> Atlantic/Jan_Mayen (Atlantic/Jan_Mayen)
     *     -> Atlantic/Madeira (Atlantic/Madeira)
     *     -> Atlantic/Reykjavik (Atlantic/Reykjavik)
     *     -> Atlantic/South_Georgia (Atlantic/South_Georgia)
     *     -> Atlantic/St_Helena (Atlantic/St_Helena)
     *     -> Atlantic/Stanley (Atlantic/Stanley)
     *     -> Australia/ACT (Australia/ACT)
     *     -> Australia/Adelaide (Australia/Adelaide)
     *     -> Australia/Brisbane (Australia/Brisbane)
     *     -> Australia/Broken_Hill (Australia/Broken_Hill)
     *     -> Australia/Canberra (Australia/Canberra)
     *     -> Australia/Currie (Australia/Currie)
     *     -> Australia/Darwin (Australia/Darwin)
     *     -> Australia/Eucla (Australia/Eucla)
     *     -> Australia/Hobart (Australia/Hobart)
     *     -> Australia/LHI (Australia/LHI)
     *     -> Australia/Lindeman (Australia/Lindeman)
     *     -> Australia/Lord_Howe (Australia/Lord_Howe)
     *     -> Australia/Melbourne (Australia/Melbourne)
     *     -> Australia/NSW (Australia/NSW)
     *     -> Australia/North (Australia/North)
     *     -> Australia/Perth (Australia/Perth)
     *     -> Australia/Queensland (Australia/Queensland)
     *     -> Australia/South (Australia/South)
     *     -> Australia/Sydney (Australia/Sydney)
     *     -> Australia/Tasmania (Australia/Tasmania)
     *     -> Australia/Victoria (Australia/Victoria)
     *     -> Australia/West (Australia/West)
     *     -> Australia/Yancowinna (Australia/Yancowinna)
     *     -> Brazil/Acre (Brazil/Acre)
     *     -> Brazil/DeNoronha (Brazil/DeNoronha)
     *     -> Brazil/East (Brazil/East)
     *     -> Brazil/West (Brazil/West)
     *     -> CET (CET)
     *     -> CST6CDT (CST6CDT)
     *     -> Canada/Atlantic (Canada/Atlantic)
     *     -> Canada/Central (Canada/Central)
     *     -> Canada/Eastern (Canada/Eastern)
     *     -> Canada/Mountain (Canada/Mountain)
     *     -> Canada/Newfoundland (Canada/Newfoundland)
     *     -> Canada/Pacific (Canada/Pacific)
     *     -> Canada/Saskatchewan (Canada/Saskatchewan)
     *     -> Canada/Yukon (Canada/Yukon)
     *     -> Chile/Continental (Chile/Continental)
     *     -> Chile/EasterIsland (Chile/EasterIsland)
     *     -> Cuba (Cuba)
     *     -> EET (EET)
     *     -> EST (EST)
     *     -> EST5EDT (EST5EDT)
     *     -> Egypt (Egypt)
     *     -> Eire (Eire)
     *     -> Europe/Amsterdam (Europe/Amsterdam)
     *     -> Europe/Andorra (Europe/Andorra)
     *     -> Europe/Astrakhan (Europe/Astrakhan)
     *     -> Europe/Athens (Europe/Athens)
     *     -> Europe/Belfast (Europe/Belfast)
     *     -> Europe/Belgrade (Europe/Belgrade)
     *     -> Europe/Berlin (Europe/Berlin)
     *     -> Europe/Bratislava (Europe/Bratislava)
     *     -> Europe/Brussels (Europe/Brussels)
     *     -> Europe/Bucharest (Europe/Bucharest)
     *     -> Europe/Budapest (Europe/Budapest)
     *     -> Europe/Busingen (Europe/Busingen)
     *     -> Europe/Chisinau (Europe/Chisinau)
     *     -> Europe/Copenhagen (Europe/Copenhagen)
     *     -> Europe/Dublin (Europe/Dublin)
     *     -> Europe/Gibraltar (Europe/Gibraltar)
     *     -> Europe/Guernsey (Europe/Guernsey)
     *     -> Europe/Helsinki (Europe/Helsinki)
     *     -> Europe/Isle_of_Man (Europe/Isle_of_Man)
     *     -> Europe/Istanbul (Europe/Istanbul)
     *     -> Europe/Jersey (Europe/Jersey)
     *     -> Europe/Kaliningrad (Europe/Kaliningrad)
     *     -> Europe/Kiev (Europe/Kiev)
     *     -> Europe/Kirov (Europe/Kirov)
     *     -> Europe/Lisbon (Europe/Lisbon)
     *     -> Europe/Ljubljana (Europe/Ljubljana)
     *     -> Europe/London (Europe/London)
     *     -> Europe/Luxembourg (Europe/Luxembourg)
     *     -> Europe/Madrid (Europe/Madrid)
     *     -> Europe/Malta (Europe/Malta)
     *     -> Europe/Mariehamn (Europe/Mariehamn)
     *     -> Europe/Minsk (Europe/Minsk)
     *     -> Europe/Monaco (Europe/Monaco)
     *     -> Europe/Moscow (Europe/Moscow)
     *     -> Europe/Nicosia (Europe/Nicosia)
     *     -> Europe/Oslo (Europe/Oslo)
     *     -> Europe/Paris (Europe/Paris)
     *     -> Europe/Podgorica (Europe/Podgorica)
     *     -> Europe/Prague (Europe/Prague)
     *     -> Europe/Riga (Europe/Riga)
     *     -> Europe/Rome (Europe/Rome)
     *     -> Europe/Samara (Europe/Samara)
     *     -> Europe/San_Marino (Europe/San_Marino)
     *     -> Europe/Sarajevo (Europe/Sarajevo)
     *     -> Europe/Saratov (Europe/Saratov)
     *     -> Europe/Simferopol (Europe/Simferopol)
     *     -> Europe/Skopje (Europe/Skopje)
     *     -> Europe/Sofia (Europe/Sofia)
     *     -> Europe/Stockholm (Europe/Stockholm)
     *     -> Europe/Tallinn (Europe/Tallinn)
     *     -> Europe/Tirane (Europe/Tirane)
     *     -> Europe/Tiraspol (Europe/Tiraspol)
     *     -> Europe/Ulyanovsk (Europe/Ulyanovsk)
     *     -> Europe/Uzhgorod (Europe/Uzhgorod)
     *     -> Europe/Vaduz (Europe/Vaduz)
     *     -> Europe/Vatican (Europe/Vatican)
     *     -> Europe/Vienna (Europe/Vienna)
     *     -> Europe/Vilnius (Europe/Vilnius)
     *     -> Europe/Volgograd (Europe/Volgograd)
     *     -> Europe/Warsaw (Europe/Warsaw)
     *     -> Europe/Zagreb (Europe/Zagreb)
     *     -> Europe/Zaporozhye (Europe/Zaporozhye)
     *     -> Europe/Zurich (Europe/Zurich)
     *     -> GB (GB)
     *     -> GB-Eire (GB-Eire)
     *     -> GMT (GMT)
     *     -> GMT+0 (GMT+0)
     *     -> GMT-0 (GMT-0)
     *     -> GMT0 (GMT0)
     *     -> Greenwich (Greenwich)
     *     -> HST (HST)
     *     -> Hongkong (Hongkong)
     *     -> Iceland (Iceland)
     *     -> Indian/Antananarivo (Indian/Antananarivo)
     *     -> Indian/Chagos (Indian/Chagos)
     *     -> Indian/Christmas (Indian/Christmas)
     *     -> Indian/Cocos (Indian/Cocos)
     *     -> Indian/Comoro (Indian/Comoro)
     *     -> Indian/Kerguelen (Indian/Kerguelen)
     *     -> Indian/Mahe (Indian/Mahe)
     *     -> Indian/Maldives (Indian/Maldives)
     *     -> Indian/Mauritius (Indian/Mauritius)
     *     -> Indian/Mayotte (Indian/Mayotte)
     *     -> Indian/Reunion (Indian/Reunion)
     *     -> Iran (Iran)
     *     -> Israel (Israel)
     *     -> Jamaica (Jamaica)
     *     -> Japan (Japan)
     *     -> Kwajalein (Kwajalein)
     *     -> Libya (Libya)
     *     -> MET (MET)
     *     -> MST (MST)
     *     -> MST7MDT (MST7MDT)
     *     -> Mexico/BajaNorte (Mexico/BajaNorte)
     *     -> Mexico/BajaSur (Mexico/BajaSur)
     *     -> Mexico/General (Mexico/General)
     *     -> NZ (NZ)
     *     -> NZ-CHAT (NZ-CHAT)
     *     -> Navajo (Navajo)
     *     -> PRC (PRC)
     *     -> PST8PDT (PST8PDT)
     *     -> Pacific/Apia (Pacific/Apia)
     *     -> Pacific/Auckland (Pacific/Auckland)
     *     -> Pacific/Bougainville (Pacific/Bougainville)
     *     -> Pacific/Chatham (Pacific/Chatham)
     *     -> Pacific/Chuuk (Pacific/Chuuk)
     *     -> Pacific/Easter (Pacific/Easter)
     *     -> Pacific/Efate (Pacific/Efate)
     *     -> Pacific/Enderbury (Pacific/Enderbury)
     *     -> Pacific/Fakaofo (Pacific/Fakaofo)
     *     -> Pacific/Fiji (Pacific/Fiji)
     *     -> Pacific/Funafuti (Pacific/Funafuti)
     *     -> Pacific/Galapagos (Pacific/Galapagos)
     *     -> Pacific/Gambier (Pacific/Gambier)
     *     -> Pacific/Guadalcanal (Pacific/Guadalcanal)
     *     -> Pacific/Guam (Pacific/Guam)
     *     -> Pacific/Honolulu (Pacific/Honolulu)
     *     -> Pacific/Johnston (Pacific/Johnston)
     *     -> Pacific/Kiritimati (Pacific/Kiritimati)
     *     -> Pacific/Kosrae (Pacific/Kosrae)
     *     -> Pacific/Kwajalein (Pacific/Kwajalein)
     *     -> Pacific/Majuro (Pacific/Majuro)
     *     -> Pacific/Marquesas (Pacific/Marquesas)
     *     -> Pacific/Midway (Pacific/Midway)
     *     -> Pacific/Nauru (Pacific/Nauru)
     *     -> Pacific/Niue (Pacific/Niue)
     *     -> Pacific/Norfolk (Pacific/Norfolk)
     *     -> Pacific/Noumea (Pacific/Noumea)
     *     -> Pacific/Pago_Pago (Pacific/Pago_Pago)
     *     -> Pacific/Palau (Pacific/Palau)
     *     -> Pacific/Pitcairn (Pacific/Pitcairn)
     *     -> Pacific/Pohnpei (Pacific/Pohnpei)
     *     -> Pacific/Ponape (Pacific/Ponape)
     *     -> Pacific/Port_Moresby (Pacific/Port_Moresby)
     *     -> Pacific/Rarotonga (Pacific/Rarotonga)
     *     -> Pacific/Saipan (Pacific/Saipan)
     *     -> Pacific/Samoa (Pacific/Samoa)
     *     -> Pacific/Tahiti (Pacific/Tahiti)
     *     -> Pacific/Tarawa (Pacific/Tarawa)
     *     -> Pacific/Tongatapu (Pacific/Tongatapu)
     *     -> Pacific/Truk (Pacific/Truk)
     *     -> Pacific/Wake (Pacific/Wake)
     *     -> Pacific/Wallis (Pacific/Wallis)
     *     -> Pacific/Yap (Pacific/Yap)
     *     -> Poland (Poland)
     *     -> Portugal (Portugal)
     *     -> ROC (ROC)
     *     -> ROK (ROK)
     *     -> Singapore (Singapore)
     *     -> Turkey (Turkey)
     *     -> UCT (UCT)
     *     -> US/Alaska (US/Alaska)
     *     -> US/Aleutian (US/Aleutian)
     *     -> US/Arizona (US/Arizona)
     *     -> US/Central (US/Central)
     *     -> US/East-Indiana (US/East-Indiana)
     *     -> US/Eastern (US/Eastern)
     *     -> US/Hawaii (US/Hawaii)
     *     -> US/Indiana-Starke (US/Indiana-Starke)
     *     -> US/Michigan (US/Michigan)
     *     -> US/Mountain (US/Mountain)
     *     -> US/Pacific (US/Pacific)
     *     -> US/Samoa (US/Samoa)
     *     -> UTC (UTC)
     *     -> Universal (Universal)
     *     -> W-SU (W-SU)
     *     -> WET (WET)
     *     -> Zulu (Zulu)
     *     -> Etc/GMT (Etc/GMT)
     *     -> Etc/GMT+0 (Etc/GMT+0)
     *     -> Etc/GMT+1 (Etc/GMT+1)
     *     -> Etc/GMT+10 (Etc/GMT+10)
     *     -> Etc/GMT+11 (Etc/GMT+11)
     *     -> Etc/GMT+12 (Etc/GMT+12)
     *     -> Etc/GMT+2 (Etc/GMT+2)
     *     -> Etc/GMT+3 (Etc/GMT+3)
     *     -> Etc/GMT+4 (Etc/GMT+4)
     *     -> Etc/GMT+5 (Etc/GMT+5)
     *     -> Etc/GMT+6 (Etc/GMT+6)
     *     -> Etc/GMT+7 (Etc/GMT+7)
     *     -> Etc/GMT+8 (Etc/GMT+8)
     *     -> Etc/GMT+9 (Etc/GMT+9)
     *     -> Etc/GMT-0 (Etc/GMT-0)
     *     -> Etc/GMT-1 (Etc/GMT-1)
     *     -> Etc/GMT-10 (Etc/GMT-10)
     *     -> Etc/GMT-11 (Etc/GMT-11)
     *     -> Etc/GMT-12 (Etc/GMT-12)
     *     -> Etc/GMT-13 (Etc/GMT-13)
     *     -> Etc/GMT-14 (Etc/GMT-14)
     *     -> Etc/GMT-2 (Etc/GMT-2)
     *     -> Etc/GMT-3 (Etc/GMT-3)
     *     -> Etc/GMT-4 (Etc/GMT-4)
     *     -> Etc/GMT-5 (Etc/GMT-5)
     *     -> Etc/GMT-6 (Etc/GMT-6)
     *     -> Etc/GMT-7 (Etc/GMT-7)
     *     -> Etc/GMT-8 (Etc/GMT-8)
     *     -> Etc/GMT-9 (Etc/GMT-9)
     *     -> Etc/GMT0 (Etc/GMT0)
     *     -> Etc/Greenwich (Etc/Greenwich)
     *     -> Etc/UCT (Etc/UCT)
     *     -> Etc/UTC (Etc/UTC)
     *     -> Etc/Universal (Etc/Universal)
     *     -> Etc/Zulu (Etc/Zulu)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $tz;

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
     * Hr Icon Display
     * ---
     * Selection :
     *     -> presence_present (Present)
     *     -> presence_absent_active (Present but not active)
     *     -> presence_absent (Absent)
     *     -> presence_to_define (To define)
     *     -> presence_undetermined (Undetermined)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $hr_icon_display;

    /**
     * Indirect Subordinates Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $child_all_count;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $resource_id Resource
     *        ---
     *        Relation : many2one (resource.resource)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Resource_\Resource_
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $company_id, OdooRelation $resource_id)
    {
        $this->company_id = $company_id;
        $this->resource_id = $resource_id;
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
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
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
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @return string|null
     *
     * @SerializedName("registration_number")
     */
    public function getRegistrationNumber(): ?string
    {
        return $this->registration_number;
    }

    /**
     * @param string|null $registration_number
     */
    public function setRegistrationNumber(?string $registration_number): void
    {
        $this->registration_number = $registration_number;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024()
    {
        return $this->image_1024;
    }

    /**
     * @param mixed|null $image_1024
     */
    public function setImage1024($image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_512")
     */
    public function getImage512()
    {
        return $this->image_512;
    }

    /**
     * @param mixed|null $image_512
     */
    public function setImage512($image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_256")
     */
    public function getImage256()
    {
        return $this->image_256;
    }

    /**
     * @param mixed|null $image_256
     */
    public function setImage256($image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_128")
     */
    public function getImage128()
    {
        return $this->image_128;
    }

    /**
     * @param mixed|null $image_128
     */
    public function setImage128($image_128): void
    {
        $this->image_128 = $image_128;
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
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return string|null
     *
     * @SerializedName("activity_type_icon")
     */
    public function getActivityTypeIcon(): ?string
    {
        return $this->activity_type_icon;
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
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
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
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
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
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
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return int|null
     *
     * @SerializedName("payslip_count")
     */
    public function getPayslipCount(): ?int
    {
        return $this->payslip_count;
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
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
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
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
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
     * @param OdooRelation|null $coach_id
     */
    public function setCoachId(?OdooRelation $coach_id): void
    {
        $this->coach_id = $coach_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tz")
     */
    public function getTz(): ?string
    {
        return $this->tz;
    }

    /**
     * @param string|null $tz
     */
    public function setTz(?string $tz): void
    {
        $this->tz = $tz;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_activity")
     */
    public function getLastActivity(): ?DateTimeInterface
    {
        return $this->last_activity;
    }

    /**
     * @param DateTimeInterface|null $last_activity
     */
    public function setLastActivity(?DateTimeInterface $last_activity): void
    {
        $this->last_activity = $last_activity;
    }

    /**
     * @param string|null $last_activity_time
     */
    public function setLastActivityTime(?string $last_activity_time): void
    {
        $this->last_activity_time = $last_activity_time;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("resource_id")
     */
    public function getResourceId(): OdooRelation
    {
        return $this->resource_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("hr_icon_display")
     */
    public function getHrIconDisplay(): ?string
    {
        return $this->hr_icon_display;
    }

    /**
     * @param string|null $hr_icon_display
     */
    public function setHrIconDisplay(?string $hr_icon_display): void
    {
        $this->hr_icon_display = $hr_icon_display;
    }

    /**
     * @return int|null
     *
     * @SerializedName("child_all_count")
     */
    public function getChildAllCount(): ?int
    {
        return $this->child_all_count;
    }

    /**
     * @param int|null $child_all_count
     */
    public function setChildAllCount(?int $child_all_count): void
    {
        $this->child_all_count = $child_all_count;
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
     * @param OdooRelation $resource_id
     */
    public function setResourceId(OdooRelation $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @param string|null $work_location
     */
    public function setWorkLocation(?string $work_location): void
    {
        $this->work_location = $work_location;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
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
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
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
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("job_id")
     */
    public function getJobId(): ?OdooRelation
    {
        return $this->job_id;
    }

    /**
     * @param OdooRelation|null $job_id
     */
    public function setJobId(?OdooRelation $job_id): void
    {
        $this->job_id = $job_id;
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
     * @SerializedName("work_email")
     */
    public function getWorkEmail(): ?string
    {
        return $this->work_email;
    }

    /**
     * @param string|null $work_email
     */
    public function setWorkEmail(?string $work_email): void
    {
        $this->work_email = $work_email;
    }

    /**
     * @param int|null $payslip_count
     */
    public function setPayslipCount(?int $payslip_count): void
    {
        $this->payslip_count = $payslip_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSlipIds(OdooRelation $item): void
    {
        if (null === $this->slip_ids) {
            $this->slip_ids = [];
        }

        if ($this->hasSlipIds($item)) {
            $index = array_search($item, $this->slip_ids);
            unset($this->slip_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * @SerializedName("ssnid")
     */
    public function getSsnid(): ?string
    {
        return $this->ssnid;
    }

    /**
     * @param string|null $ssnid
     */
    public function setSsnid(?string $ssnid): void
    {
        $this->ssnid = $ssnid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sinid")
     */
    public function getSinid(): ?string
    {
        return $this->sinid;
    }

    /**
     * @param string|null $sinid
     */
    public function setSinid(?string $sinid): void
    {
        $this->sinid = $sinid;
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
     * @param string|null $identification_id
     */
    public function setIdentificationId(?string $identification_id): void
    {
        $this->identification_id = $identification_id;
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
     * @param string|null $passport_id
     */
    public function setPassportId(?string $passport_id): void
    {
        $this->passport_id = $passport_id;
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
     * @param OdooRelation|null $bank_account_id
     */
    public function setBankAccountId(?OdooRelation $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @param string|null $permit_no
     */
    public function setPermitNo(?string $permit_no): void
    {
        $this->permit_no = $permit_no;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("visa_expire")
     */
    public function getVisaExpire(): ?DateTimeInterface
    {
        return $this->visa_expire;
    }

    /**
     * @param DateTimeInterface|null $visa_expire
     */
    public function setVisaExpire(?DateTimeInterface $visa_expire): void
    {
        $this->visa_expire = $visa_expire;
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
     * @param string|null $additional_note
     */
    public function setAdditionalNote(?string $additional_note): void
    {
        $this->additional_note = $additional_note;
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
     * @param OdooRelation|null $country_of_birth
     */
    public function setCountryOfBirth(?OdooRelation $country_of_birth): void
    {
        $this->country_of_birth = $country_of_birth;
    }

    /**
     * @param string|null $place_of_birth
     */
    public function setPlaceOfBirth(?string $place_of_birth): void
    {
        $this->place_of_birth = $place_of_birth;
    }

    /**
     * @param string|null $emergency_contact
     */
    public function setEmergencyContact(?string $emergency_contact): void
    {
        $this->emergency_contact = $emergency_contact;
    }

    /**
     * @param bool|null $is_address_home_a_company
     */
    public function setIsAddressHomeACompany(?bool $is_address_home_a_company): void
    {
        $this->is_address_home_a_company = $is_address_home_a_company;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_partner_id")
     */
    public function getUserPartnerId(): ?OdooRelation
    {
        return $this->user_partner_id;
    }

    /**
     * @param OdooRelation|null $user_partner_id
     */
    public function setUserPartnerId(?OdooRelation $user_partner_id): void
    {
        $this->user_partner_id = $user_partner_id;
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
     * @return string|null
     *
     * @SerializedName("private_email")
     */
    public function getPrivateEmail(): ?string
    {
        return $this->private_email;
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
     * @param string|null $private_email
     */
    public function setPrivateEmail(?string $private_email): void
    {
        $this->private_email = $private_email;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
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
     * @param string|null $spouse_complete_name
     */
    public function setSpouseCompleteName(?string $spouse_complete_name): void
    {
        $this->spouse_complete_name = $spouse_complete_name;
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
     * @return string|null
     *
     * @SerializedName("emergency_phone")
     */
    public function getEmergencyPhone(): ?string
    {
        return $this->emergency_phone;
    }

    /**
     * @param OdooRelation $item
     */
    public function addSlipIds(OdooRelation $item): void
    {
        if ($this->hasSlipIds($item)) {
            return;
        }

        if (null === $this->slip_ids) {
            $this->slip_ids = [];
        }

        $this->slip_ids[] = $item;
    }

    /**
     * @return int|null
     *
     * @SerializedName("contracts_count")
     */
    public function getContractsCount(): ?int
    {
        return $this->contracts_count;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("contract_ids")
     */
    public function getContractIds(): ?array
    {
        return $this->contract_ids;
    }

    /**
     * @param OdooRelation[]|null $contract_ids
     */
    public function setContractIds(?array $contract_ids): void
    {
        $this->contract_ids = $contract_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasContractIds(OdooRelation $item): bool
    {
        if (null === $this->contract_ids) {
            return false;
        }

        return in_array($item, $this->contract_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addContractIds(OdooRelation $item): void
    {
        if ($this->hasContractIds($item)) {
            return;
        }

        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        $this->contract_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeContractIds(OdooRelation $item): void
    {
        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        if ($this->hasContractIds($item)) {
            $index = array_search($item, $this->contract_ids);
            unset($this->contract_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("contract_id")
     */
    public function getContractId(): ?OdooRelation
    {
        return $this->contract_id;
    }

    /**
     * @param OdooRelation|null $contract_id
     */
    public function setContractId(?OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("calendar_mismatch")
     */
    public function isCalendarMismatch(): ?bool
    {
        return $this->calendar_mismatch;
    }

    /**
     * @param bool|null $calendar_mismatch
     */
    public function setCalendarMismatch(?bool $calendar_mismatch): void
    {
        $this->calendar_mismatch = $calendar_mismatch;
    }

    /**
     * @param int|null $contracts_count
     */
    public function setContractsCount(?int $contracts_count): void
    {
        $this->contracts_count = $contracts_count;
    }

    /**
     * @param DateTimeInterface|null $departure_date
     */
    public function setDepartureDate(?DateTimeInterface $departure_date): void
    {
        $this->departure_date = $departure_date;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("contract_warning")
     */
    public function isContractWarning(): ?bool
    {
        return $this->contract_warning;
    }

    /**
     * @param bool|null $contract_warning
     */
    public function setContractWarning(?bool $contract_warning): void
    {
        $this->contract_warning = $contract_warning;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("first_contract_date")
     */
    public function getFirstContractDate(): ?DateTimeInterface
    {
        return $this->first_contract_date;
    }

    /**
     * @param DateTimeInterface|null $first_contract_date
     */
    public function setFirstContractDate(?DateTimeInterface $first_contract_date): void
    {
        $this->first_contract_date = $first_contract_date;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("subordinate_ids")
     */
    public function getSubordinateIds(): ?array
    {
        return $this->subordinate_ids;
    }

    /**
     * @param OdooRelation[]|null $subordinate_ids
     */
    public function setSubordinateIds(?array $subordinate_ids): void
    {
        $this->subordinate_ids = $subordinate_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSubordinateIds(OdooRelation $item): bool
    {
        if (null === $this->subordinate_ids) {
            return false;
        }

        return in_array($item, $this->subordinate_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSubordinateIds(OdooRelation $item): void
    {
        if ($this->hasSubordinateIds($item)) {
            return;
        }

        if (null === $this->subordinate_ids) {
            $this->subordinate_ids = [];
        }

        $this->subordinate_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSubordinateIds(OdooRelation $item): void
    {
        if (null === $this->subordinate_ids) {
            $this->subordinate_ids = [];
        }

        if ($this->hasSubordinateIds($item)) {
            $index = array_search($item, $this->subordinate_ids);
            unset($this->subordinate_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("slip_ids")
     */
    public function getSlipIds(): ?array
    {
        return $this->slip_ids;
    }

    /**
     * @param OdooRelation[]|null $slip_ids
     */
    public function setSlipIds(?array $slip_ids): void
    {
        $this->slip_ids = $slip_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSlipIds(OdooRelation $item): bool
    {
        if (null === $this->slip_ids) {
            return false;
        }

        return in_array($item, $this->slip_ids);
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("departure_date")
     */
    public function getDepartureDate(): ?DateTimeInterface
    {
        return $this->departure_date;
    }

    /**
     * @param string|null $emergency_phone
     */
    public function setEmergencyPhone(?string $emergency_phone): void
    {
        $this->emergency_phone = $emergency_phone;
    }

    /**
     * @param OdooRelation[]|null $category_ids
     */
    public function setCategoryIds(?array $category_ids): void
    {
        $this->category_ids = $category_ids;
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
     * @return mixed|null
     *
     * @SerializedName("image_1920")
     */
    public function getImage1920()
    {
        return $this->image_1920;
    }

    /**
     * @param mixed|null $image_1920
     */
    public function setImage1920($image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return string|null
     *
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_ids")
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
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
     * @param string|null $departure_description
     */
    public function setDepartureDescription(?string $departure_description): void
    {
        $this->departure_description = $departure_description;
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
     * @return string|null
     *
     * @SerializedName("notes")
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
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
     * @param string|null $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
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
     * @param string|null $pin
     */
    public function setPin(?string $pin): void
    {
        $this->pin = $pin;
    }

    /**
     * @return string|null
     *
     * @SerializedName("departure_reason")
     */
    public function getDepartureReason(): ?string
    {
        return $this->departure_reason;
    }

    /**
     * @param string|null $departure_reason
     */
    public function setDepartureReason(?string $departure_reason): void
    {
        $this->departure_reason = $departure_reason;
    }

    /**
     * @return string|null
     *
     * @SerializedName("departure_description")
     */
    public function getDepartureDescription(): ?string
    {
        return $this->departure_description;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.employee';
    }
}
