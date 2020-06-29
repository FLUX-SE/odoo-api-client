<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.activity
 * Name : mail.activity
 * Info :
 * An actual activity to perform. Activities are linked to
 * documents using res_id and res_model_id fields. Activities have a deadline
 * that can be used in kanban view to display a status. Once done activities
 * are unlinked and a message is posted. This message has a new activity_type_id
 * field that indicates the activity linked to the message.
 */
final class Activity extends Base
{
    /**
     * Document Model
     *
     * @var Model
     */
    private $res_model_id;

    /**
     * Related Document Model
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Related Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Document Name
     * Display name of the related document.
     *
     * @var null|string
     */
    private $res_name;

    /**
     * Activity Type
     *
     * @var null|Type
     */
    private $activity_type_id;

    /**
     * Action to Perform
     * Actions may trigger specific behavior like opening calendar view or automatically mark as done when a document
     * is uploaded
     *
     * @var null|array
     */
    private $activity_category;

    /**
     * Decoration Type
     * Change the background color of the related activities of this type.
     *
     * @var null|array
     */
    private $activity_decoration;

    /**
     * Icon
     * Font awesome icon e.g. fa-tasks
     *
     * @var null|string
     */
    private $icon;

    /**
     * Summary
     *
     * @var null|string
     */
    private $summary;

    /**
     * Note
     *
     * @var null|string
     */
    private $note;

    /**
     * Due Date
     *
     * @var DateTimeInterface
     */
    private $date_deadline;

    /**
     * Automated activity
     * Indicates this activity has been created automatically and not by any user.
     *
     * @var null|bool
     */
    private $automated;

    /**
     * Assigned to
     *
     * @var Users
     */
    private $user_id;

    /**
     * State
     *
     * @var null|array
     */
    private $state;

    /**
     * Recommended Activity Type
     *
     * @var null|Type
     */
    private $recommended_activity_type_id;

    /**
     * Previous Activity Type
     *
     * @var null|Type
     */
    private $previous_activity_type_id;

    /**
     * Next activities available
     * Technical field for UX purpose
     *
     * @var null|bool
     */
    private $has_recommended_activities;

    /**
     * Email templates
     *
     * @var null|Template[]
     */
    private $mail_template_ids;

    /**
     * Trigger Next Activity
     *
     * @var null|bool
     */
    private $force_next;

    /**
     * Can Write
     * Technical field to hide buttons if the current user has no access.
     *
     * @var null|bool
     */
    private $can_write;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param Model $res_model_id Document Model
     * @param int $res_id Related Document ID
     * @param DateTimeInterface $date_deadline Due Date
     * @param Users $user_id Assigned to
     */
    public function __construct(
        Model $res_model_id,
        int $res_id,
        DateTimeInterface $date_deadline,
        Users $user_id
    ) {
        $this->res_model_id = $res_model_id;
        $this->res_id = $res_id;
        $this->date_deadline = $date_deadline;
        $this->user_id = $user_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|bool
     */
    public function isCanWrite(): ?bool
    {
        return $this->can_write;
    }

    /**
     * @return null|bool
     */
    public function isForceNext(): ?bool
    {
        return $this->force_next;
    }

    /**
     * @return null|Template[]
     */
    public function getMailTemplateIds(): ?array
    {
        return $this->mail_template_ids;
    }

    /**
     * @return null|bool
     */
    public function isHasRecommendedActivities(): ?bool
    {
        return $this->has_recommended_activities;
    }

    /**
     * @return null|Type
     */
    public function getPreviousActivityTypeId(): ?Type
    {
        return $this->previous_activity_type_id;
    }

    /**
     * @param null|Type $recommended_activity_type_id
     */
    public function setRecommendedActivityTypeId(?Type $recommended_activity_type_id): void
    {
        $this->recommended_activity_type_id = $recommended_activity_type_id;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|bool
     */
    public function isAutomated(): ?bool
    {
        return $this->automated;
    }

    /**
     * @param Model $res_model_id
     */
    public function setResModelId(Model $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @param DateTimeInterface $date_deadline
     */
    public function setDateDeadline(DateTimeInterface $date_deadline): void
    {
        $this->date_deadline = $date_deadline;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param null|string $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return null|array
     */
    public function getActivityDecoration(): ?array
    {
        return $this->activity_decoration;
    }

    /**
     * @return null|array
     */
    public function getActivityCategory(): ?array
    {
        return $this->activity_category;
    }

    /**
     * @param null|Type $activity_type_id
     */
    public function setActivityTypeId(?Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return null|string
     */
    public function getResName(): ?string
    {
        return $this->res_name;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return null|string
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
