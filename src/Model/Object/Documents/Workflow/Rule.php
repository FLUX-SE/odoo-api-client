<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Documents\Workflow;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : documents.workflow.rule
 * ---
 * Name : documents.workflow.rule
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
final class Rule extends Base
{
    /**
     * Workspace
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $domain_folder_id;

    /**
     * Rule name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Tooltip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

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
     * Condition type
     * ---
     * Selection :
     *     -> criteria (Criteria)
     *     -> domain (Domain)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $condition_type;

    /**
     * Domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain;

    /**
     * Contact
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $criteria_partner_id;

    /**
     * Owner
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $criteria_owner_id;

    /**
     * Required Tags
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $required_tag_ids;

    /**
     * Excluded Tags
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $excluded_tag_ids;

    /**
     * One record limit
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $limited_to_single_record;

    /**
     * Set Contact
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Set Owner
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Set Tags
     * ---
     * Relation : one2many (documents.workflow.action -> workflow_rule_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Workflow\Action
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_action_ids;

    /**
     * Move to Workspace
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
     * Mark all as Done
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $remove_activities;

    /**
     * Schedule Activity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $activity_option;

    /**
     * Activity type
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
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $activity_summary;

    /**
     * Due Date In
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $activity_date_deadline_range;

    /**
     * Due type
     * ---
     * Selection :
     *     -> days (Days)
     *     -> weeks (Weeks)
     *     -> months (Months)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $activity_date_deadline_range_type;

    /**
     * Activity Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $activity_note;

    /**
     * Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $activity_user_id;

    /**
     * Has Business Option
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_business_option;

    /**
     * Create
     * ---
     * Selection :
     *     -> product.template (Product template)
     *     -> sign.template.new (Create signature request)
     *     -> sign.template.direct (Sign directly)
     *     -> account.move.in_invoice (Vendor bill)
     *     -> account.move.out_invoice (Customer invoice)
     *     -> account.move.in_refund (Vendor Credit Note)
     *     -> account.move.out_refund (Credit note)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $create_model;

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
     * @param OdooRelation $domain_folder_id Workspace
     *        ---
     *        Relation : many2one (documents.folder)
     *        @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Rule name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $domain_folder_id, string $name)
    {
        $this->domain_folder_id = $domain_folder_id;
        $this->name = $name;
    }

    /**
     * @param string|null $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(?string $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTagActionIds(OdooRelation $item): void
    {
        if (null === $this->tag_action_ids) {
            $this->tag_action_ids = [];
        }

        if ($this->hasTagActionIds($item)) {
            $index = array_search($item, $this->tag_action_ids);
            unset($this->tag_action_ids[$index]);
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
     * @return bool|null
     *
     * @SerializedName("remove_activities")
     */
    public function isRemoveActivities(): ?bool
    {
        return $this->remove_activities;
    }

    /**
     * @param bool|null $remove_activities
     */
    public function setRemoveActivities(?bool $remove_activities): void
    {
        $this->remove_activities = $remove_activities;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("activity_option")
     */
    public function isActivityOption(): ?bool
    {
        return $this->activity_option;
    }

    /**
     * @param bool|null $activity_option
     */
    public function setActivityOption(?bool $activity_option): void
    {
        $this->activity_option = $activity_option;
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
     * @return int|null
     *
     * @SerializedName("activity_date_deadline_range")
     */
    public function getActivityDateDeadlineRange(): ?int
    {
        return $this->activity_date_deadline_range;
    }

    /**
     * @param int|null $activity_date_deadline_range
     */
    public function setActivityDateDeadlineRange(?int $activity_date_deadline_range): void
    {
        $this->activity_date_deadline_range = $activity_date_deadline_range;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_date_deadline_range_type")
     */
    public function getActivityDateDeadlineRangeType(): ?string
    {
        return $this->activity_date_deadline_range_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_note")
     */
    public function getActivityNote(): ?string
    {
        return $this->activity_note;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagActionIds(OdooRelation $item): bool
    {
        if (null === $this->tag_action_ids) {
            return false;
        }

        return in_array($item, $this->tag_action_ids);
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $activity_note
     */
    public function setActivityNote(?string $activity_note): void
    {
        $this->activity_note = $activity_note;
    }

    /**
     * @param string|null $create_model
     */
    public function setCreateModel(?string $create_model): void
    {
        $this->create_model = $create_model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("create_model")
     */
    public function getCreateModel(): ?string
    {
        return $this->create_model;
    }

    /**
     * @param bool|null $has_business_option
     */
    public function setHasBusinessOption(?bool $has_business_option): void
    {
        $this->has_business_option = $has_business_option;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_business_option")
     */
    public function isHasBusinessOption(): ?bool
    {
        return $this->has_business_option;
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
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagActionIds(OdooRelation $item): void
    {
        if ($this->hasTagActionIds($item)) {
            return;
        }

        if (null === $this->tag_action_ids) {
            $this->tag_action_ids = [];
        }

        $this->tag_action_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $tag_action_ids
     */
    public function setTagActionIds(?array $tag_action_ids): void
    {
        $this->tag_action_ids = $tag_action_ids;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("domain_folder_id")
     */
    public function getDomainFolderId(): OdooRelation
    {
        return $this->domain_folder_id;
    }

    /**
     * @param OdooRelation|null $criteria_owner_id
     */
    public function setCriteriaOwnerId(?OdooRelation $criteria_owner_id): void
    {
        $this->criteria_owner_id = $criteria_owner_id;
    }

    /**
     * @param OdooRelation $domain_folder_id
     */
    public function setDomainFolderId(OdooRelation $domain_folder_id): void
    {
        $this->domain_folder_id = $domain_folder_id;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
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
     * @return string|null
     *
     * @SerializedName("condition_type")
     */
    public function getConditionType(): ?string
    {
        return $this->condition_type;
    }

    /**
     * @param string|null $condition_type
     */
    public function setConditionType(?string $condition_type): void
    {
        $this->condition_type = $condition_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("domain")
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("criteria_partner_id")
     */
    public function getCriteriaPartnerId(): ?OdooRelation
    {
        return $this->criteria_partner_id;
    }

    /**
     * @param OdooRelation|null $criteria_partner_id
     */
    public function setCriteriaPartnerId(?OdooRelation $criteria_partner_id): void
    {
        $this->criteria_partner_id = $criteria_partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("criteria_owner_id")
     */
    public function getCriteriaOwnerId(): ?OdooRelation
    {
        return $this->criteria_owner_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("required_tag_ids")
     */
    public function getRequiredTagIds(): ?array
    {
        return $this->required_tag_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_action_ids")
     */
    public function getTagActionIds(): ?array
    {
        return $this->tag_action_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExcludedTagIds(OdooRelation $item): void
    {
        if (null === $this->excluded_tag_ids) {
            $this->excluded_tag_ids = [];
        }

        if ($this->hasExcludedTagIds($item)) {
            $index = array_search($item, $this->excluded_tag_ids);
            unset($this->excluded_tag_ids[$index]);
        }
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
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param bool|null $limited_to_single_record
     */
    public function setLimitedToSingleRecord(?bool $limited_to_single_record): void
    {
        $this->limited_to_single_record = $limited_to_single_record;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("limited_to_single_record")
     */
    public function isLimitedToSingleRecord(): ?bool
    {
        return $this->limited_to_single_record;
    }

    /**
     * @param OdooRelation $item
     */
    public function addExcludedTagIds(OdooRelation $item): void
    {
        if ($this->hasExcludedTagIds($item)) {
            return;
        }

        if (null === $this->excluded_tag_ids) {
            $this->excluded_tag_ids = [];
        }

        $this->excluded_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $required_tag_ids
     */
    public function setRequiredTagIds(?array $required_tag_ids): void
    {
        $this->required_tag_ids = $required_tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExcludedTagIds(OdooRelation $item): bool
    {
        if (null === $this->excluded_tag_ids) {
            return false;
        }

        return in_array($item, $this->excluded_tag_ids);
    }

    /**
     * @param OdooRelation[]|null $excluded_tag_ids
     */
    public function setExcludedTagIds(?array $excluded_tag_ids): void
    {
        $this->excluded_tag_ids = $excluded_tag_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("excluded_tag_ids")
     */
    public function getExcludedTagIds(): ?array
    {
        return $this->excluded_tag_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRequiredTagIds(OdooRelation $item): void
    {
        if (null === $this->required_tag_ids) {
            $this->required_tag_ids = [];
        }

        if ($this->hasRequiredTagIds($item)) {
            $index = array_search($item, $this->required_tag_ids);
            unset($this->required_tag_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addRequiredTagIds(OdooRelation $item): void
    {
        if ($this->hasRequiredTagIds($item)) {
            return;
        }

        if (null === $this->required_tag_ids) {
            $this->required_tag_ids = [];
        }

        $this->required_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRequiredTagIds(OdooRelation $item): bool
    {
        if (null === $this->required_tag_ids) {
            return false;
        }

        return in_array($item, $this->required_tag_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'documents.workflow.rule';
    }
}
