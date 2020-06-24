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
 *
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
     * @var Activity
     */
    private $activity_ids;

    /**
     * Activity State
     *
     * @var array
     */
    private $activity_state;

    /**
     * Responsible User
     *
     * @var Users
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     *
     * @var Type
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     *
     * @var DateTimeInterface
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     *
     * @var string
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     *
     * @var array
     */
    private $activity_exception_decoration;

    /**
     * Icon
     *
     * @var string
     */
    private $activity_exception_icon;

    /**
     * @return Activity
     */
    public function getActivityIds(): Activity
    {
        return $this->activity_ids;
    }

    /**
     * @return array
     */
    public function getActivityState(): array
    {
        return $this->activity_state;
    }

    /**
     * @return Users
     */
    public function getActivityUserId(): Users
    {
        return $this->activity_user_id;
    }

    /**
     * @return Type
     */
    public function getActivityTypeId(): Type
    {
        return $this->activity_type_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActivityDateDeadline(): DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return string
     */
    public function getActivitySummary(): string
    {
        return $this->activity_summary;
    }

    /**
     * @return array
     */
    public function getActivityExceptionDecoration(): array
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return string
     */
    public function getActivityExceptionIcon(): string
    {
        return $this->activity_exception_icon;
    }
}
