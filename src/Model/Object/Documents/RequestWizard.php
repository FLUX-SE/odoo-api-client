<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Documents;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : documents.request_wizard
 * ---
 * Name : documents.request_wizard
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class RequestWizard extends Base
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
     * Owner
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $owner_id;

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
    private $partner_id;

    /**
     * Activity type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $activity_type_id;

    /**
     * Tags
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
    private $folder_id;

    /**
     * Resource Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Resource ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $activity_note;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $owner_id Owner
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $activity_type_id Activity type
     *        ---
     *        Relation : many2one (mail.activity.type)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $folder_id Workspace
     *        ---
     *        Relation : many2one (documents.folder)
     *        @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $owner_id,
        OdooRelation $activity_type_id,
        OdooRelation $folder_id
    ) {
        $this->name = $name;
        $this->owner_id = $owner_id;
        $this->activity_type_id = $activity_type_id;
        $this->folder_id = $folder_id;
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
     * @return string|null
     *
     * @SerializedName("activity_note")
     */
    public function getActivityNote(): ?string
    {
        return $this->activity_note;
    }

    /**
     * @param string|null $activity_note
     */
    public function setActivityNote(?string $activity_note): void
    {
        $this->activity_note = $activity_note;
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
     * @param string|null $activity_date_deadline_range_type
     */
    public function setActivityDateDeadlineRangeType(?string $activity_date_deadline_range_type): void
    {
        $this->activity_date_deadline_range_type = $activity_date_deadline_range_type;
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
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
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
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
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
     * @param OdooRelation $activity_type_id
     */
    public function setActivityTypeId(OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("owner_id")
     */
    public function getOwnerId(): OdooRelation
    {
        return $this->owner_id;
    }

    /**
     * @param OdooRelation $owner_id
     */
    public function setOwnerId(OdooRelation $owner_id): void
    {
        $this->owner_id = $owner_id;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): OdooRelation
    {
        return $this->activity_type_id;
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
     * @return string|null
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
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
     * @return OdooRelation
     *
     * @SerializedName("folder_id")
     */
    public function getFolderId(): OdooRelation
    {
        return $this->folder_id;
    }

    /**
     * @param OdooRelation $folder_id
     */
    public function setFolderId(OdooRelation $folder_id): void
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'documents.request_wizard';
    }
}
