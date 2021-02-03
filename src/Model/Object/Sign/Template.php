<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.template
 * ---
 * Name : sign.template
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
final class Template extends Base
{
    /**
     * Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $attachment_id;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * File Content (base64)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $datas;

    /**
     * Signature Items
     * ---
     * Relation : one2many (sign.item -> template_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sign_item_ids;

    /**
     * Responsible Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $responsible_count;

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
     * Who can Sign
     * ---
     * Set who can use this template:
     * - All Users: all users of the Sign application can view and use the template
     * - On Invitation: only invited users can view and use the template
     * Invited users can always edit the document template.
     * Existing requests based on this template will not be affected by changes.
     * ---
     * Selection :
     *     -> employee (All Users)
     *     -> invite (On Invitation)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $privacy;

    /**
     * Invited Users
     * ---
     * Relation : many2many (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $favorited_ids;

    /**
     * Share Link
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $share_link;

    /**
     * Signature Requests
     * ---
     * Relation : one2many (sign.request -> template_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sign_request_ids;

    /**
     * Tags
     * ---
     * Relation : many2many (sign.template.tag)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Template\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Redirect Link
     * ---
     * Optional link for redirection after signature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $redirect_url;

    /**
     * Link Label
     * ---
     * Optional text to display on the button link
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $redirect_url_text;

    /**
     * Signed Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $signed_count;

    /**
     * In Progress Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $in_progress_count;

    /**
     * Template Access Group
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
     * Signed Document Workspace
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
     * Signed Document Tags
     * ---
     * Relation : many2many (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $documents_tag_ids;

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
     * @param OdooRelation $attachment_id Attachment
     *        ---
     *        Relation : many2one (ir.attachment)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $attachment_id)
    {
        $this->attachment_id = $attachment_id;
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
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("redirect_url")
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirect_url;
    }

    /**
     * @param string|null $redirect_url
     */
    public function setRedirectUrl(?string $redirect_url): void
    {
        $this->redirect_url = $redirect_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("redirect_url_text")
     */
    public function getRedirectUrlText(): ?string
    {
        return $this->redirect_url_text;
    }

    /**
     * @param string|null $redirect_url_text
     */
    public function setRedirectUrlText(?string $redirect_url_text): void
    {
        $this->redirect_url_text = $redirect_url_text;
    }

    /**
     * @return int|null
     *
     * @SerializedName("signed_count")
     */
    public function getSignedCount(): ?int
    {
        return $this->signed_count;
    }

    /**
     * @param int|null $signed_count
     */
    public function setSignedCount(?int $signed_count): void
    {
        $this->signed_count = $signed_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("in_progress_count")
     */
    public function getInProgressCount(): ?int
    {
        return $this->in_progress_count;
    }

    /**
     * @param int|null $in_progress_count
     */
    public function setInProgressCount(?int $in_progress_count): void
    {
        $this->in_progress_count = $in_progress_count;
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
     * @return OdooRelation|null
     *
     * @SerializedName("folder_id")
     */
    public function getFolderId(): ?OdooRelation
    {
        return $this->folder_id;
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
     * @param OdooRelation|null $folder_id
     */
    public function setFolderId(?OdooRelation $folder_id): void
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("documents_tag_ids")
     */
    public function getDocumentsTagIds(): ?array
    {
        return $this->documents_tag_ids;
    }

    /**
     * @param OdooRelation[]|null $documents_tag_ids
     */
    public function setDocumentsTagIds(?array $documents_tag_ids): void
    {
        $this->documents_tag_ids = $documents_tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDocumentsTagIds(OdooRelation $item): bool
    {
        if (null === $this->documents_tag_ids) {
            return false;
        }

        return in_array($item, $this->documents_tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addDocumentsTagIds(OdooRelation $item): void
    {
        if ($this->hasDocumentsTagIds($item)) {
            return;
        }

        if (null === $this->documents_tag_ids) {
            $this->documents_tag_ids = [];
        }

        $this->documents_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDocumentsTagIds(OdooRelation $item): void
    {
        if (null === $this->documents_tag_ids) {
            $this->documents_tag_ids = [];
        }

        if ($this->hasDocumentsTagIds($item)) {
            $index = array_search($item, $this->documents_tag_ids);
            unset($this->documents_tag_ids[$index]);
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
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
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
     * @return OdooRelation
     *
     * @SerializedName("attachment_id")
     */
    public function getAttachmentId(): OdooRelation
    {
        return $this->attachment_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("privacy")
     */
    public function getPrivacy(): ?string
    {
        return $this->privacy;
    }

    /**
     * @param OdooRelation $attachment_id
     */
    public function setAttachmentId(OdooRelation $attachment_id): void
    {
        $this->attachment_id = $attachment_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("datas")
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * @param mixed|null $datas
     */
    public function setDatas($datas): void
    {
        $this->datas = $datas;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sign_item_ids")
     */
    public function getSignItemIds(): ?array
    {
        return $this->sign_item_ids;
    }

    /**
     * @param OdooRelation[]|null $sign_item_ids
     */
    public function setSignItemIds(?array $sign_item_ids): void
    {
        $this->sign_item_ids = $sign_item_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSignItemIds(OdooRelation $item): bool
    {
        if (null === $this->sign_item_ids) {
            return false;
        }

        return in_array($item, $this->sign_item_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSignItemIds(OdooRelation $item): void
    {
        if ($this->hasSignItemIds($item)) {
            return;
        }

        if (null === $this->sign_item_ids) {
            $this->sign_item_ids = [];
        }

        $this->sign_item_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSignItemIds(OdooRelation $item): void
    {
        if (null === $this->sign_item_ids) {
            $this->sign_item_ids = [];
        }

        if ($this->hasSignItemIds($item)) {
            $index = array_search($item, $this->sign_item_ids);
            unset($this->sign_item_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("responsible_count")
     */
    public function getResponsibleCount(): ?int
    {
        return $this->responsible_count;
    }

    /**
     * @param int|null $responsible_count
     */
    public function setResponsibleCount(?int $responsible_count): void
    {
        $this->responsible_count = $responsible_count;
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
     * @param string|null $privacy
     */
    public function setPrivacy(?string $privacy): void
    {
        $this->privacy = $privacy;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("favorited_ids")
     */
    public function getFavoritedIds(): ?array
    {
        return $this->favorited_ids;
    }

    /**
     * @param OdooRelation[]|null $favorited_ids
     */
    public function setFavoritedIds(?array $favorited_ids): void
    {
        $this->favorited_ids = $favorited_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFavoritedIds(OdooRelation $item): bool
    {
        if (null === $this->favorited_ids) {
            return false;
        }

        return in_array($item, $this->favorited_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addFavoritedIds(OdooRelation $item): void
    {
        if ($this->hasFavoritedIds($item)) {
            return;
        }

        if (null === $this->favorited_ids) {
            $this->favorited_ids = [];
        }

        $this->favorited_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFavoritedIds(OdooRelation $item): void
    {
        if (null === $this->favorited_ids) {
            $this->favorited_ids = [];
        }

        if ($this->hasFavoritedIds($item)) {
            $index = array_search($item, $this->favorited_ids);
            unset($this->favorited_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("share_link")
     */
    public function getShareLink(): ?string
    {
        return $this->share_link;
    }

    /**
     * @param string|null $share_link
     */
    public function setShareLink(?string $share_link): void
    {
        $this->share_link = $share_link;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sign_request_ids")
     */
    public function getSignRequestIds(): ?array
    {
        return $this->sign_request_ids;
    }

    /**
     * @param OdooRelation[]|null $sign_request_ids
     */
    public function setSignRequestIds(?array $sign_request_ids): void
    {
        $this->sign_request_ids = $sign_request_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSignRequestIds(OdooRelation $item): bool
    {
        if (null === $this->sign_request_ids) {
            return false;
        }

        return in_array($item, $this->sign_request_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSignRequestIds(OdooRelation $item): void
    {
        if ($this->hasSignRequestIds($item)) {
            return;
        }

        if (null === $this->sign_request_ids) {
            $this->sign_request_ids = [];
        }

        $this->sign_request_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSignRequestIds(OdooRelation $item): void
    {
        if (null === $this->sign_request_ids) {
            $this->sign_request_ids = [];
        }

        if ($this->hasSignRequestIds($item)) {
            $index = array_search($item, $this->sign_request_ids);
            unset($this->sign_request_ids[$index]);
        }
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
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.template';
    }
}
