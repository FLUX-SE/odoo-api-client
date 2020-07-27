<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.activity
 * ---
 * Name : mail.activity
 * ---
 * Info :
 * An actual activity to perform. Activities are linked to
 *         documents using res_id and res_model_id fields. Activities have a deadline
 *         that can be used in kanban view to display a status. Once done activities
 *         are unlinked and a message is posted. This message has a new activity_type_id
 *         field that indicates the activity linked to the message.
 */
final class Activity extends Base
{
    /**
     * Document Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $res_model_id;

    /**
     * Related Document Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Related Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $res_id;

    /**
     * Document Name
     * ---
     * Display name of the related document.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_name;

    /**
     * Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Action to Perform
     * ---
     * Actions may trigger specific behavior like opening calendar view or automatically mark as done when a document
     * is uploaded
     * ---
     * Selection : (default value, usually null)
     *     -> default (None)
     *     -> upload_file (Upload Document)
     *     -> tax_report (Tax report)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_category;

    /**
     * Decoration Type
     * ---
     * Change the background color of the related activities of this type.
     * ---
     * Selection : (default value, usually null)
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_decoration;

    /**
     * Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $icon;

    /**
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $summary;

    /**
     * Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Due Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_deadline;

    /**
     * Automated activity
     * ---
     * Indicates this activity has been created automatically and not by any user.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $automated;

    /**
     * Assigned to
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * State
     * ---
     * Selection : (default value, usually null)
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * Recommended Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $recommended_activity_type_id;

    /**
     * Previous Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $previous_activity_type_id;

    /**
     * Next activities available
     * ---
     * Technical field for UX purpose
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_recommended_activities;

    /**
     * Email templates
     * ---
     * Relation : many2many (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $mail_template_ids;

    /**
     * Trigger Next Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $force_next;

    /**
     * Can Write
     * ---
     * Technical field to hide buttons if the current user has no access.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $can_write;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param OdooRelation $res_model_id Document Model
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $res_id Related Document ID
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_deadline Due Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_id Assigned to
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $res_model_id,
        int $res_id,
        DateTimeInterface $date_deadline,
        OdooRelation $user_id
    ) {
        $this->res_model_id = $res_model_id;
        $this->res_id = $res_id;
        $this->date_deadline = $date_deadline;
        $this->user_id = $user_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMailTemplateIds(OdooRelation $item): void
    {
        if (null === $this->mail_template_ids) {
            $this->mail_template_ids = [];
        }

        if ($this->hasMailTemplateIds($item)) {
            $index = array_search($item, $this->mail_template_ids);
            unset($this->mail_template_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getRecommendedActivityTypeId(): ?OdooRelation
    {
        return $this->recommended_activity_type_id;
    }

    /**
     * @param OdooRelation|null $recommended_activity_type_id
     */
    public function setRecommendedActivityTypeId(?OdooRelation $recommended_activity_type_id): void
    {
        $this->recommended_activity_type_id = $recommended_activity_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPreviousActivityTypeId(): ?OdooRelation
    {
        return $this->previous_activity_type_id;
    }

    /**
     * @param OdooRelation|null $previous_activity_type_id
     */
    public function setPreviousActivityTypeId(?OdooRelation $previous_activity_type_id): void
    {
        $this->previous_activity_type_id = $previous_activity_type_id;
    }

    /**
     * @return bool|null
     */
    public function isHasRecommendedActivities(): ?bool
    {
        return $this->has_recommended_activities;
    }

    /**
     * @param bool|null $has_recommended_activities
     */
    public function setHasRecommendedActivities(?bool $has_recommended_activities): void
    {
        $this->has_recommended_activities = $has_recommended_activities;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMailTemplateIds(): ?array
    {
        return $this->mail_template_ids;
    }

    /**
     * @param OdooRelation[]|null $mail_template_ids
     */
    public function setMailTemplateIds(?array $mail_template_ids): void
    {
        $this->mail_template_ids = $mail_template_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMailTemplateIds(OdooRelation $item): bool
    {
        if (null === $this->mail_template_ids) {
            return false;
        }

        return in_array($item, $this->mail_template_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMailTemplateIds(OdooRelation $item): void
    {
        if ($this->hasMailTemplateIds($item)) {
            return;
        }

        if (null === $this->mail_template_ids) {
            $this->mail_template_ids = [];
        }

        $this->mail_template_ids[] = $item;
    }

    /**
     * @return bool|null
     */
    public function isForceNext(): ?bool
    {
        return $this->force_next;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param bool|null $force_next
     */
    public function setForceNext(?bool $force_next): void
    {
        $this->force_next = $force_next;
    }

    /**
     * @return bool|null
     */
    public function isCanWrite(): ?bool
    {
        return $this->can_write;
    }

    /**
     * @param bool|null $can_write
     */
    public function setCanWrite(?bool $can_write): void
    {
        $this->can_write = $can_write;
    }

    /**
     * @return OdooRelation|null
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
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     */
    public function getResModelId(): OdooRelation
    {
        return $this->res_model_id;
    }

    /**
     * @param string|null $activity_category
     */
    public function setActivityCategory(?string $activity_category): void
    {
        $this->activity_category = $activity_category;
    }

    /**
     * @param OdooRelation $res_model_id
     */
    public function setResModelId(OdooRelation $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @return string|null
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return int
     */
    public function getResId(): int
    {
        return $this->res_id;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return string|null
     */
    public function getResName(): ?string
    {
        return $this->res_name;
    }

    /**
     * @param string|null $res_name
     */
    public function setResName(?string $res_name): void
    {
        $this->res_name = $res_name;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getActivityCategory(): ?string
    {
        return $this->activity_category;
    }

    /**
     * @return string|null
     */
    public function getActivityDecoration(): ?string
    {
        return $this->activity_decoration;
    }

    /**
     * @return OdooRelation
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param string|null $activity_decoration
     */
    public function setActivityDecoration(?string $activity_decoration): void
    {
        $this->activity_decoration = $activity_decoration;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string|null $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateDeadline(): DateTimeInterface
    {
        return $this->date_deadline;
    }

    /**
     * @param DateTimeInterface $date_deadline
     */
    public function setDateDeadline(DateTimeInterface $date_deadline): void
    {
        $this->date_deadline = $date_deadline;
    }

    /**
     * @return bool|null
     */
    public function isAutomated(): ?bool
    {
        return $this->automated;
    }

    /**
     * @param bool|null $automated
     */
    public function setAutomated(?bool $automated): void
    {
        $this->automated = $automated;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.activity';
    }
}
