<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : portal.share
 * ---
 * Name : portal.share
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Share extends Base
{
    /**
     * Related Document Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
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
     * Recipients
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $partner_ids;

    /**
     * Note
     * ---
     * Add extra content to display in the email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Link
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $share_link;

    /**
     * Access warning
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $access_warning;

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
     * @param string $res_model Related Document Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $res_id Related Document ID
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $partner_ids Recipients
     *        ---
     *        Relation : many2many (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(string $res_model, int $res_id, array $partner_ids)
    {
        $this->res_model = $res_model;
        $this->res_id = $res_id;
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param string|null $share_link
     */
    public function setShareLink(?string $share_link): void
    {
        $this->share_link = $share_link;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $access_warning
     */
    public function setAccessWarning(?string $access_warning): void
    {
        $this->access_warning = $access_warning;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_warning")
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
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
     * @return string
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
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
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation[] $partner_ids
     */
    public function setPartnerIds(array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return OdooRelation[]
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): array
    {
        return $this->partner_ids;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return int
     *
     * @SerializedName("res_id")
     */
    public function getResId(): int
    {
        return $this->res_id;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'portal.share';
    }
}
