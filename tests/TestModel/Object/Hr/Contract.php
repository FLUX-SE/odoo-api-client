<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.contract
 * ---
 * Name : hr.contract
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
final class Contract extends Base
{
    /**
     * Contract Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

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
     * Salary Structure Type
     * ---
     * Relation : many2one (hr.payroll.structure.type)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $structure_type_id;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $employee_id;

    /**
     * Department
     * ---
     * Relation : many2one (hr.department)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Department
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Job
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $job_id;

    /**
     * Start Date
     * ---
     * Start date of the contract.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * End Date
     * ---
     * End date of the contract (if it's a fixed-term contract).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_end;

    /**
     * End of Trial Period
     * ---
     * End date of the trial period (if there is one).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $trial_date_end;

    /**
     * Wage
     * ---
     * Employee's monthly gross wage.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $wage;

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
     * Status
     * ---
     * Status of the contract
     * ---
     * Selection :
     *     -> draft (New)
     *     -> open (Running)
     *     -> close (Expired)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Company country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_country_id;

    /**
     * Kanban State
     * ---
     * Selection :
     *     -> normal (Grey)
     *     -> done (Green)
     *     -> blocked (Red)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $kanban_state;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * Visa No
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $visa_no;

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
     * HR Responsible
     * ---
     * Person responsible for validating the employee's contracts.
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $hr_responsible_id;

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
     * First Contract Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $first_contract_date;

    /**
     * Generated From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_generated_from;

    /**
     * Generated To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_generated_to;

    /**
     * Scheduled Pay
     * ---
     * Defines the frequency of the wage payment.
     * ---
     * Selection :
     *     -> monthly (Monthly)
     *     -> quarterly (Quarterly)
     *     -> semi-annually (Semi-annually)
     *     -> annually (Annually)
     *     -> weekly (Weekly)
     *     -> bi-weekly (Bi-weekly)
     *     -> bi-monthly (Bi-monthly)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $schedule_pay;

    /**
     * Working Schedule
     * ---
     * Employee's working schedule.
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $resource_calendar_id;

    /**
     * Hours per Week
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $hours_per_week;

    /**
     * Fulltime Hours
     * ---
     * Number of hours to work to be considered as fulltime.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $full_time_required_hours;

    /**
     * Is Full Time
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_fulltime;

    /**
     * Wage Type
     * ---
     * Selection :
     *     -> monthly (Monthly Fixed Wage)
     *     -> hourly (Hourly Wage)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $wage_type;

    /**
     * Hourly Wage
     * ---
     * Employee's hourly gross wage.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $hourly_wage;

    /**
     * Qualification
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $qualif;

    /**
     * Niveau
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $niveau;

    /**
     * Coefficient
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $coef;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Activity
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Activity\Type
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Followers
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Channel
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Attachment
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Contract Reference
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_start Start Date
     *        ---
     *        Start date of the contract.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $wage Wage
     *        ---
     *        Employee's monthly gross wage.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_generated_from Generated From
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_generated_to Generated To
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $resource_calendar_id Working Schedule
     *        ---
     *        Employee's working schedule.
     *        ---
     *        Relation : many2one (resource.calendar)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $hourly_wage Hourly Wage
     *        ---
     *        Employee's hourly gross wage.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_start,
        float $wage,
        OdooRelation $company_id,
        DateTimeInterface $date_generated_from,
        DateTimeInterface $date_generated_to,
        OdooRelation $resource_calendar_id,
        float $hourly_wage
    ) {
        $this->name = $name;
        $this->date_start = $date_start;
        $this->wage = $wage;
        $this->company_id = $company_id;
        $this->date_generated_from = $date_generated_from;
        $this->date_generated_to = $date_generated_to;
        $this->resource_calendar_id = $resource_calendar_id;
        $this->hourly_wage = $hourly_wage;
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
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
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
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
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
     * @SerializedName("message_follower_ids")
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
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
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
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
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
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
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @return string|null
     *
     * @SerializedName("activity_state")
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param float $wage
     */
    public function setWage(float $wage): void
    {
        $this->wage = $wage;
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
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_country_id")
     */
    public function getCompanyCountryId(): ?OdooRelation
    {
        return $this->company_country_id;
    }

    /**
     * @param DateTimeInterface|null $trial_date_end
     */
    public function setTrialDateEnd(?DateTimeInterface $trial_date_end): void
    {
        $this->trial_date_end = $trial_date_end;
    }

    /**
     * @param OdooRelation|null $company_country_id
     */
    public function setCompanyCountryId(?OdooRelation $company_country_id): void
    {
        $this->company_country_id = $company_country_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("kanban_state")
     */
    public function getKanbanState(): ?string
    {
        return $this->kanban_state;
    }

    /**
     * @param string|null $kanban_state
     */
    public function setKanbanState(?string $kanban_state): void
    {
        $this->kanban_state = $kanban_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @return float
     *
     * @SerializedName("wage")
     */
    public function getWage(): float
    {
        return $this->wage;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("trial_date_end")
     */
    public function getTrialDateEnd(): ?DateTimeInterface
    {
        return $this->trial_date_end;
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
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return OdooRelation|null
     *
     * @SerializedName("structure_type_id")
     */
    public function getStructureTypeId(): ?OdooRelation
    {
        return $this->structure_type_id;
    }

    /**
     * @param OdooRelation|null $structure_type_id
     */
    public function setStructureTypeId(?OdooRelation $structure_type_id): void
    {
        $this->structure_type_id = $structure_type_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
    }

    /**
     * @param DateTimeInterface|null $date_end
     */
    public function setDateEnd(?DateTimeInterface $date_end): void
    {
        $this->date_end = $date_end;
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
     * @return DateTimeInterface
     *
     * @SerializedName("date_start")
     */
    public function getDateStart(): DateTimeInterface
    {
        return $this->date_start;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_end")
     */
    public function getDateEnd(): ?DateTimeInterface
    {
        return $this->date_end;
    }

    /**
     * @param string|null $permit_no
     */
    public function setPermitNo(?string $permit_no): void
    {
        $this->permit_no = $permit_no;
    }

    /**
     * @param string|null $visa_no
     */
    public function setVisaNo(?string $visa_no): void
    {
        $this->visa_no = $visa_no;
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
     * @SerializedName("qualif")
     */
    public function getQualif(): ?string
    {
        return $this->qualif;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_fulltime")
     */
    public function isIsFulltime(): ?bool
    {
        return $this->is_fulltime;
    }

    /**
     * @param bool|null $is_fulltime
     */
    public function setIsFulltime(?bool $is_fulltime): void
    {
        $this->is_fulltime = $is_fulltime;
    }

    /**
     * @return string|null
     *
     * @SerializedName("wage_type")
     */
    public function getWageType(): ?string
    {
        return $this->wage_type;
    }

    /**
     * @param string|null $wage_type
     */
    public function setWageType(?string $wage_type): void
    {
        $this->wage_type = $wage_type;
    }

    /**
     * @return float
     *
     * @SerializedName("hourly_wage")
     */
    public function getHourlyWage(): float
    {
        return $this->hourly_wage;
    }

    /**
     * @param float $hourly_wage
     */
    public function setHourlyWage(float $hourly_wage): void
    {
        $this->hourly_wage = $hourly_wage;
    }

    /**
     * @param string|null $qualif
     */
    public function setQualif(?string $qualif): void
    {
        $this->qualif = $qualif;
    }

    /**
     * @return float|null
     *
     * @SerializedName("full_time_required_hours")
     */
    public function getFullTimeRequiredHours(): ?float
    {
        return $this->full_time_required_hours;
    }

    /**
     * @return string|null
     *
     * @SerializedName("niveau")
     */
    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    /**
     * @param string|null $niveau
     */
    public function setNiveau(?string $niveau): void
    {
        $this->niveau = $niveau;
    }

    /**
     * @return string|null
     *
     * @SerializedName("coef")
     */
    public function getCoef(): ?string
    {
        return $this->coef;
    }

    /**
     * @param string|null $coef
     */
    public function setCoef(?string $coef): void
    {
        $this->coef = $coef;
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
     * @param float|null $full_time_required_hours
     */
    public function setFullTimeRequiredHours(?float $full_time_required_hours): void
    {
        $this->full_time_required_hours = $full_time_required_hours;
    }

    /**
     * @param float|null $hours_per_week
     */
    public function setHoursPerWeek(?float $hours_per_week): void
    {
        $this->hours_per_week = $hours_per_week;
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
     * @param DateTimeInterface|null $first_contract_date
     */
    public function setFirstContractDate(?DateTimeInterface $first_contract_date): void
    {
        $this->first_contract_date = $first_contract_date;
    }

    /**
     * @param DateTimeInterface|null $visa_expire
     */
    public function setVisaExpire(?DateTimeInterface $visa_expire): void
    {
        $this->visa_expire = $visa_expire;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("hr_responsible_id")
     */
    public function getHrResponsibleId(): ?OdooRelation
    {
        return $this->hr_responsible_id;
    }

    /**
     * @param OdooRelation|null $hr_responsible_id
     */
    public function setHrResponsibleId(?OdooRelation $hr_responsible_id): void
    {
        $this->hr_responsible_id = $hr_responsible_id;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("first_contract_date")
     */
    public function getFirstContractDate(): ?DateTimeInterface
    {
        return $this->first_contract_date;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_generated_from")
     */
    public function getDateGeneratedFrom(): DateTimeInterface
    {
        return $this->date_generated_from;
    }

    /**
     * @return float|null
     *
     * @SerializedName("hours_per_week")
     */
    public function getHoursPerWeek(): ?float
    {
        return $this->hours_per_week;
    }

    /**
     * @param DateTimeInterface $date_generated_from
     */
    public function setDateGeneratedFrom(DateTimeInterface $date_generated_from): void
    {
        $this->date_generated_from = $date_generated_from;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date_generated_to")
     */
    public function getDateGeneratedTo(): DateTimeInterface
    {
        return $this->date_generated_to;
    }

    /**
     * @param DateTimeInterface $date_generated_to
     */
    public function setDateGeneratedTo(DateTimeInterface $date_generated_to): void
    {
        $this->date_generated_to = $date_generated_to;
    }

    /**
     * @return string|null
     *
     * @SerializedName("schedule_pay")
     */
    public function getSchedulePay(): ?string
    {
        return $this->schedule_pay;
    }

    /**
     * @param string|null $schedule_pay
     */
    public function setSchedulePay(?string $schedule_pay): void
    {
        $this->schedule_pay = $schedule_pay;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @param OdooRelation $resource_calendar_id
     */
    public function setResourceCalendarId(OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.contract';
    }
}
