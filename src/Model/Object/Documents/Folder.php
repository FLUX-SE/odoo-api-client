<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Documents;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : documents.folder
 * ---
 * Name : documents.folder
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
final class Folder extends Base
{
    /**
     * Company
     * ---
     * This workspace will only be available to the selected company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Parent Workspace
     * ---
     * A workspace will inherit the tags of its parent workspace
     * ---
     * Relation : many2one (documents.folder)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_folder_id;

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
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Sub workspaces
     * ---
     * Relation : one2many (documents.folder -> parent_folder_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Folder
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_folder_ids;

    /**
     * Documents
     * ---
     * Relation : one2many (documents.document -> folder_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Document
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $document_ids;

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
     * Share Links
     * ---
     * Relation : one2many (documents.share -> folder_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Share
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $share_link_ids;

    /**
     * Tag Categories
     * ---
     * Tag categories defined for this workspace
     * ---
     * Relation : one2many (documents.facet -> folder_id)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Facet
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $facet_ids;

    /**
     * Write Groups
     * ---
     * Groups able to see the workspace and read/create/edit its documents.
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $group_ids;

    /**
     * Read Groups
     * ---
     * Groups able to see the workspace and read its documents without create/edit rights.
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $read_group_ids;

    /**
     * Own Documents Only
     * ---
     * Limit Read Groups to the documents of which they are owner.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $user_specific;

    /**
     * Action Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $action_count;

    /**
     * Document Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $document_count;

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
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param bool|null $user_specific
     */
    public function setUserSpecific(?bool $user_specific): void
    {
        $this->user_specific = $user_specific;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("group_ids")
     */
    public function getGroupIds(): ?array
    {
        return $this->group_ids;
    }

    /**
     * @param OdooRelation[]|null $group_ids
     */
    public function setGroupIds(?array $group_ids): void
    {
        $this->group_ids = $group_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroupIds(OdooRelation $item): bool
    {
        if (null === $this->group_ids) {
            return false;
        }

        return in_array($item, $this->group_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addGroupIds(OdooRelation $item): void
    {
        if ($this->hasGroupIds($item)) {
            return;
        }

        if (null === $this->group_ids) {
            $this->group_ids = [];
        }

        $this->group_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroupIds(OdooRelation $item): void
    {
        if (null === $this->group_ids) {
            $this->group_ids = [];
        }

        if ($this->hasGroupIds($item)) {
            $index = array_search($item, $this->group_ids);
            unset($this->group_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("read_group_ids")
     */
    public function getReadGroupIds(): ?array
    {
        return $this->read_group_ids;
    }

    /**
     * @param OdooRelation[]|null $read_group_ids
     */
    public function setReadGroupIds(?array $read_group_ids): void
    {
        $this->read_group_ids = $read_group_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReadGroupIds(OdooRelation $item): bool
    {
        if (null === $this->read_group_ids) {
            return false;
        }

        return in_array($item, $this->read_group_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addReadGroupIds(OdooRelation $item): void
    {
        if ($this->hasReadGroupIds($item)) {
            return;
        }

        if (null === $this->read_group_ids) {
            $this->read_group_ids = [];
        }

        $this->read_group_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReadGroupIds(OdooRelation $item): void
    {
        if (null === $this->read_group_ids) {
            $this->read_group_ids = [];
        }

        if ($this->hasReadGroupIds($item)) {
            $index = array_search($item, $this->read_group_ids);
            unset($this->read_group_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("user_specific")
     */
    public function isUserSpecific(): ?bool
    {
        return $this->user_specific;
    }

    /**
     * @return int|null
     *
     * @SerializedName("action_count")
     */
    public function getActionCount(): ?int
    {
        return $this->action_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function addFacetIds(OdooRelation $item): void
    {
        if ($this->hasFacetIds($item)) {
            return;
        }

        if (null === $this->facet_ids) {
            $this->facet_ids = [];
        }

        $this->facet_ids[] = $item;
    }

    /**
     * @param int|null $action_count
     */
    public function setActionCount(?int $action_count): void
    {
        $this->action_count = $action_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("document_count")
     */
    public function getDocumentCount(): ?int
    {
        return $this->document_count;
    }

    /**
     * @param int|null $document_count
     */
    public function setDocumentCount(?int $document_count): void
    {
        $this->document_count = $document_count;
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
     * @param OdooRelation $item
     */
    public function removeFacetIds(OdooRelation $item): void
    {
        if (null === $this->facet_ids) {
            $this->facet_ids = [];
        }

        if ($this->hasFacetIds($item)) {
            $index = array_search($item, $this->facet_ids);
            unset($this->facet_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFacetIds(OdooRelation $item): bool
    {
        if (null === $this->facet_ids) {
            return false;
        }

        return in_array($item, $this->facet_ids);
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildrenFolderIds(OdooRelation $item): void
    {
        if (null === $this->children_folder_ids) {
            $this->children_folder_ids = [];
        }

        if ($this->hasChildrenFolderIds($item)) {
            $index = array_search($item, $this->children_folder_ids);
            unset($this->children_folder_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_folder_id")
     */
    public function getParentFolderId(): ?OdooRelation
    {
        return $this->parent_folder_id;
    }

    /**
     * @param OdooRelation|null $parent_folder_id
     */
    public function setParentFolderId(?OdooRelation $parent_folder_id): void
    {
        $this->parent_folder_id = $parent_folder_id;
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
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("children_folder_ids")
     */
    public function getChildrenFolderIds(): ?array
    {
        return $this->children_folder_ids;
    }

    /**
     * @param OdooRelation[]|null $children_folder_ids
     */
    public function setChildrenFolderIds(?array $children_folder_ids): void
    {
        $this->children_folder_ids = $children_folder_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenFolderIds(OdooRelation $item): bool
    {
        if (null === $this->children_folder_ids) {
            return false;
        }

        return in_array($item, $this->children_folder_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildrenFolderIds(OdooRelation $item): void
    {
        if ($this->hasChildrenFolderIds($item)) {
            return;
        }

        if (null === $this->children_folder_ids) {
            $this->children_folder_ids = [];
        }

        $this->children_folder_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("document_ids")
     */
    public function getDocumentIds(): ?array
    {
        return $this->document_ids;
    }

    /**
     * @param OdooRelation[]|null $facet_ids
     */
    public function setFacetIds(?array $facet_ids): void
    {
        $this->facet_ids = $facet_ids;
    }

    /**
     * @param OdooRelation[]|null $document_ids
     */
    public function setDocumentIds(?array $document_ids): void
    {
        $this->document_ids = $document_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDocumentIds(OdooRelation $item): bool
    {
        if (null === $this->document_ids) {
            return false;
        }

        return in_array($item, $this->document_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addDocumentIds(OdooRelation $item): void
    {
        if ($this->hasDocumentIds($item)) {
            return;
        }

        if (null === $this->document_ids) {
            $this->document_ids = [];
        }

        $this->document_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDocumentIds(OdooRelation $item): void
    {
        if (null === $this->document_ids) {
            $this->document_ids = [];
        }

        if ($this->hasDocumentIds($item)) {
            $index = array_search($item, $this->document_ids);
            unset($this->document_ids[$index]);
        }
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("share_link_ids")
     */
    public function getShareLinkIds(): ?array
    {
        return $this->share_link_ids;
    }

    /**
     * @param OdooRelation[]|null $share_link_ids
     */
    public function setShareLinkIds(?array $share_link_ids): void
    {
        $this->share_link_ids = $share_link_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasShareLinkIds(OdooRelation $item): bool
    {
        if (null === $this->share_link_ids) {
            return false;
        }

        return in_array($item, $this->share_link_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addShareLinkIds(OdooRelation $item): void
    {
        if ($this->hasShareLinkIds($item)) {
            return;
        }

        if (null === $this->share_link_ids) {
            $this->share_link_ids = [];
        }

        $this->share_link_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeShareLinkIds(OdooRelation $item): void
    {
        if (null === $this->share_link_ids) {
            $this->share_link_ids = [];
        }

        if ($this->hasShareLinkIds($item)) {
            $index = array_search($item, $this->share_link_ids);
            unset($this->share_link_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("facet_ids")
     */
    public function getFacetIds(): ?array
    {
        return $this->facet_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'documents.folder';
    }
}
