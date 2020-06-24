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
 *
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
     * @var null|Model
     */
    private $res_model_id;

    /**
     * Related Document Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Related Document ID
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Document Name
     *
     * @var string
     */
    private $res_name;

    /**
     * Activity Type
     *
     * @var Type
     */
    private $activity_type_id;

    /**
     * Action to Perform
     *
     * @var array
     */
    private $activity_category;

    /**
     * Decoration Type
     *
     * @var array
     */
    private $activity_decoration;

    /**
     * Icon
     *
     * @var string
     */
    private $icon;

    /**
     * Summary
     *
     * @var string
     */
    private $summary;

    /**
     * Note
     *
     * @var string
     */
    private $note;

    /**
     * Due Date
     *
     * @var null|DateTimeInterface
     */
    private $date_deadline;

    /**
     * Automated activity
     *
     * @var bool
     */
    private $automated;

    /**
     * Assigned to
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * State
     *
     * @var array
     */
    private $state;

    /**
     * Recommended Activity Type
     *
     * @var Type
     */
    private $recommended_activity_type_id;

    /**
     * Previous Activity Type
     *
     * @var Type
     */
    private $previous_activity_type_id;

    /**
     * Next activities available
     *
     * @var bool
     */
    private $has_recommended_activities;

    /**
     * Email templates
     *
     * @var Template
     */
    private $mail_template_ids;

    /**
     * Trigger Next Activity
     *
     * @var bool
     */
    private $force_next;

    /**
     * Can Write
     *
     * @var bool
     */
    private $can_write;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|Model $res_model_id
     */
    public function setResModelId(Model $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return bool
     */
    public function isCanWrite(): bool
    {
        return $this->can_write;
    }

    /**
     * @return bool
     */
    public function isForceNext(): bool
    {
        return $this->force_next;
    }

    /**
     * @return Template
     */
    public function getMailTemplateIds(): Template
    {
        return $this->mail_template_ids;
    }

    /**
     * @return bool
     */
    public function isHasRecommendedActivities(): bool
    {
        return $this->has_recommended_activities;
    }

    /**
     * @return Type
     */
    public function getPreviousActivityTypeId(): Type
    {
        return $this->previous_activity_type_id;
    }

    /**
     * @param Type $recommended_activity_type_id
     */
    public function setRecommendedActivityTypeId(Type $recommended_activity_type_id): void
    {
        $this->recommended_activity_type_id = $recommended_activity_type_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @return bool
     */
    public function isAutomated(): bool
    {
        return $this->automated;
    }

    /**
     * @param null|DateTimeInterface $date_deadline
     */
    public function setDateDeadline(?DateTimeInterface $date_deadline): void
    {
        $this->date_deadline = $date_deadline;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getActivityDecoration(): array
    {
        return $this->activity_decoration;
    }

    /**
     * @return array
     */
    public function getActivityCategory(): array
    {
        return $this->activity_category;
    }

    /**
     * @param Type $activity_type_id
     */
    public function setActivityTypeId(Type $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return string
     */
    public function getResName(): string
    {
        return $this->res_name;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
