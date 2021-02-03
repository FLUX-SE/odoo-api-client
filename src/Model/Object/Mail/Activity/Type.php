<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Activity;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.activity.type
 * ---
 * Name : mail.activity.type
 * ---
 * Info :
 * Activity Types are used to categorize activities. Each type is a different
 *         kind of activity e.g. call, mail, meeting. An activity can be generic i.e.
 *         available for all models using activities; or specific to a model in which
 *         case res_model_id field should be used.
 */
final class Type extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Default Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $summary;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

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
     * Create Uid
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
     * Scheduled Date
     * ---
     * Number of days/week/month before executing the action. It allows to plan the action deadline.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $delay_count;

    /**
     * Delay units
     * ---
     * Unit of delay
     * ---
     * Selection :
     *     -> days (days)
     *     -> weeks (weeks)
     *     -> months (months)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $delay_unit;

    /**
     * Delay Label
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $delay_label;

    /**
     * Delay Type
     * ---
     * Type of delay
     * ---
     * Selection :
     *     -> current_date (after validation date)
     *     -> previous_activity (after previous activity deadline)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $delay_from;

    /**
     * Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $icon;

    /**
     * Decoration Type
     * ---
     * Change the background color of the related activities of this type.
     * ---
     * Selection :
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $decoration_type;

    /**
     * Model
     * ---
     * Specify a model if the activity should be specific to a model and not available when managing activities for
     * other models.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $res_model_id;

    /**
     * Default Next Activity
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_next_type_id;

    /**
     * Trigger Next Activity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $force_next;

    /**
     * Recommended Next Activities
     * ---
     * Relation : many2many (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $next_type_ids;

    /**
     * Preceding Activities
     * ---
     * Relation : many2many (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $previous_type_ids;

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
     * Default Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $default_description;

    /**
     * Initial model
     * ---
     * Technical field to keep track of the model at the start of editing to support UX related behaviour
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $initial_res_model_id;

    /**
     * Model has change
     * ---
     * Technical field for UX related behaviour
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $res_model_change;

    /**
     * Tag
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Folder
     * ---
     * By defining a folder, the upload activities will generate a document
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $folder_id;

    /**
     * Default User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_user_id;

    /**
     * Action to Perform
     * ---
     * Actions may trigger specific behavior like opening calendar view or automatically mark as done when a document
     * is uploaded
     * ---
     * Selection :
     *     -> default (None)
     *     -> upload_file (Upload Document)
     *     -> meeting (Meeting)
     *     -> tax_report (Tax report)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $category;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $delay_unit Delay units
     *        ---
     *        Unit of delay
     *        ---
     *        Selection :
     *            -> days (days)
     *            -> weeks (weeks)
     *            -> months (months)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $delay_from Delay Type
     *        ---
     *        Type of delay
     *        ---
     *        Selection :
     *            -> current_date (after validation date)
     *            -> previous_activity (after previous activity deadline)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $delay_unit, string $delay_from)
    {
        $this->name = $name;
        $this->delay_unit = $delay_unit;
        $this->delay_from = $delay_from;
    }

    /**
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addPreviousTypeIds(OdooRelation $item): void
    {
        if ($this->hasPreviousTypeIds($item)) {
            return;
        }

        if (null === $this->previous_type_ids) {
            $this->previous_type_ids = [];
        }

        $this->previous_type_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePreviousTypeIds(OdooRelation $item): void
    {
        if (null === $this->previous_type_ids) {
            $this->previous_type_ids = [];
        }

        if ($this->hasPreviousTypeIds($item)) {
            $index = array_search($item, $this->previous_type_ids);
            unset($this->previous_type_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("mail_template_ids")
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
     * @return string|null
     *
     * @SerializedName("default_description")
     */
    public function getDefaultDescription(): ?string
    {
        return $this->default_description;
    }

    /**
     * @param string|null $default_description
     */
    public function setDefaultDescription(?string $default_description): void
    {
        $this->default_description = $default_description;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("initial_res_model_id")
     */
    public function getInitialResModelId(): ?OdooRelation
    {
        return $this->initial_res_model_id;
    }

    /**
     * @param OdooRelation|null $initial_res_model_id
     */
    public function setInitialResModelId(?OdooRelation $initial_res_model_id): void
    {
        $this->initial_res_model_id = $initial_res_model_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("res_model_change")
     */
    public function isResModelChange(): ?bool
    {
        return $this->res_model_change;
    }

    /**
     * @param bool|null $res_model_change
     */
    public function setResModelChange(?bool $res_model_change): void
    {
        $this->res_model_change = $res_model_change;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_ids")
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagIds(OdooRelation $item): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids);
    }

    /**
     * @param OdooRelation[]|null $previous_type_ids
     */
    public function setPreviousTypeIds(?array $previous_type_ids): void
    {
        $this->previous_type_ids = $previous_type_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagIds(OdooRelation $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTagIds(OdooRelation $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("folder_id")
     */
    public function getFolderId(): ?OdooRelation
    {
        return $this->folder_id;
    }

    /**
     * @param OdooRelation|null $folder_id
     */
    public function setFolderId(?OdooRelation $folder_id): void
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_user_id")
     */
    public function getDefaultUserId(): ?OdooRelation
    {
        return $this->default_user_id;
    }

    /**
     * @param OdooRelation|null $default_user_id
     */
    public function setDefaultUserId(?OdooRelation $default_user_id): void
    {
        $this->default_user_id = $default_user_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("category")
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     */
    public function setCategory(?string $category): void
    {
        $this->category = $category;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPreviousTypeIds(OdooRelation $item): bool
    {
        if (null === $this->previous_type_ids) {
            return false;
        }

        return in_array($item, $this->previous_type_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("previous_type_ids")
     */
    public function getPreviousTypeIds(): ?array
    {
        return $this->previous_type_ids;
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
     * @param string|null $delay_label
     */
    public function setDelayLabel(?string $delay_label): void
    {
        $this->delay_label = $delay_label;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("summary")
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
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @return int|null
     *
     * @SerializedName("delay_count")
     */
    public function getDelayCount(): ?int
    {
        return $this->delay_count;
    }

    /**
     * @param int|null $delay_count
     */
    public function setDelayCount(?int $delay_count): void
    {
        $this->delay_count = $delay_count;
    }

    /**
     * @return string
     *
     * @SerializedName("delay_unit")
     */
    public function getDelayUnit(): string
    {
        return $this->delay_unit;
    }

    /**
     * @param string $delay_unit
     */
    public function setDelayUnit(string $delay_unit): void
    {
        $this->delay_unit = $delay_unit;
    }

    /**
     * @return string|null
     *
     * @SerializedName("delay_label")
     */
    public function getDelayLabel(): ?string
    {
        return $this->delay_label;
    }

    /**
     * @return string
     *
     * @SerializedName("delay_from")
     */
    public function getDelayFrom(): string
    {
        return $this->delay_from;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNextTypeIds(OdooRelation $item): void
    {
        if (null === $this->next_type_ids) {
            $this->next_type_ids = [];
        }

        if ($this->hasNextTypeIds($item)) {
            $index = array_search($item, $this->next_type_ids);
            unset($this->next_type_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $default_next_type_id
     */
    public function setDefaultNextTypeId(?OdooRelation $default_next_type_id): void
    {
        $this->default_next_type_id = $default_next_type_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addNextTypeIds(OdooRelation $item): void
    {
        if ($this->hasNextTypeIds($item)) {
            return;
        }

        if (null === $this->next_type_ids) {
            $this->next_type_ids = [];
        }

        $this->next_type_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNextTypeIds(OdooRelation $item): bool
    {
        if (null === $this->next_type_ids) {
            return false;
        }

        return in_array($item, $this->next_type_ids);
    }

    /**
     * @param OdooRelation[]|null $next_type_ids
     */
    public function setNextTypeIds(?array $next_type_ids): void
    {
        $this->next_type_ids = $next_type_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("next_type_ids")
     */
    public function getNextTypeIds(): ?array
    {
        return $this->next_type_ids;
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
     *
     * @SerializedName("force_next")
     */
    public function isForceNext(): ?bool
    {
        return $this->force_next;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_next_type_id")
     */
    public function getDefaultNextTypeId(): ?OdooRelation
    {
        return $this->default_next_type_id;
    }

    /**
     * @param string $delay_from
     */
    public function setDelayFrom(string $delay_from): void
    {
        $this->delay_from = $delay_from;
    }

    /**
     * @param OdooRelation|null $res_model_id
     */
    public function setResModelId(?OdooRelation $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("res_model_id")
     */
    public function getResModelId(): ?OdooRelation
    {
        return $this->res_model_id;
    }

    /**
     * @param string|null $decoration_type
     */
    public function setDecorationType(?string $decoration_type): void
    {
        $this->decoration_type = $decoration_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("decoration_type")
     */
    public function getDecorationType(): ?string
    {
        return $this->decoration_type;
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
     *
     * @SerializedName("icon")
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.activity.type';
    }
}
