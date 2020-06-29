<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Activity;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Activity;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.activity.mixin
 * Name : mail.activity.mixin
 * Info :
 * Mail Activity Mixin is a mixin class to use if you want to add activities
 * management on a model. It works like the mail.thread mixin. It defines
 * an activity_ids one2many field toward activities using res_id and res_model_id.
 * Various related / computed fields are also added to have a global status of
 * activities on documents.
 *
 * Activities come with a new JS widget for the form view. It is integrated in the
 * Chatter widget although it is a separate widget. It displays activities linked
 * to the current record and allow to schedule, edit and mark done activities.
 * Use widget="mail_activity" on activity_ids field in form view to use it.
 *
 * There is also a kanban widget defined. It defines a small widget to integrate
 * in kanban vignettes. It allow to manage activities directly from the kanban
 * view. Use widget="kanban_activity" on activitiy_ids field in kanban view to
 * use it.
 *
 * Some context keys allow to control the mixin behavior. Use those in some
 * specific cases like import
 *
 * * ``mail_activity_automation_skip``: skip activities automation; it means
 * no automated activities will be generated, updated or unlinked, allowing
 * to save computation and avoid generating unwanted activities;
 */
final class Mixin extends Base
{
    /**
     * Activities
     *
     * @var null|Activity[]
     */
    private $activity_ids;

    /**
     * Activity State
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     *
     * @var null|array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var null|Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var null|Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var null|DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var null|string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * Type of the exception activity on record.
     *
     * @var null|array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * Icon to indicate an exception activity.
     *
     * @var null|string
     */
    private $activity_exception_icon;

    /**
     * @return null|Activity[]
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @return null|array
     */
    public function getActivityState(): ?array
    {
        return $this->activity_state;
    }

    /**
     * @return null|Users
     */
    public function getActivityUserId(): ?Users
    {
        return $this->activity_user_id;
    }

    /**
     * @return null|Type
     */
    public function getActivityTypeId(): ?Type
    {
        return $this->activity_type_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return null|string
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @return null|array
     */
    public function getActivityExceptionDecoration(): ?array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return null|string
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }
}
