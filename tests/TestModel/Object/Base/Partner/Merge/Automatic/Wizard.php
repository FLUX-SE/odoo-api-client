<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Base\Partner\Merge\Automatic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : base.partner.merge.automatic.wizard
 * ---
 * Name : base.partner.merge.automatic.wizard
 * ---
 * Info :
 * The idea behind this wizard is to create a list of potential partners to
 *                 merge. We use two objects, the first one is the wizard for the end-user.
 *                 And the second will contain the partner list to merge.
 */
final class Wizard extends Base
{
    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_by_email;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_by_name;

    /**
     * Is Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_by_is_company;

    /**
     * VAT
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_by_vat;

    /**
     * Parent Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_by_parent_id;

    /**
     * State
     * ---
     * Selection :
     *     -> option (Option)
     *     -> selection (Selection)
     *     -> finished (Finished)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * Group of Contacts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $number_group;

    /**
     * Current Line
     * ---
     * Relation : many2one (base.partner.merge.line)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Base\Partner\Merge\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $current_line_id;

    /**
     * Lines
     * ---
     * Relation : one2many (base.partner.merge.line -> wizard_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Base\Partner\Merge\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Contacts
     * ---
     * Relation : many2many (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Destination Contact
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $dst_partner_id;

    /**
     * A user associated to the contact
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $exclude_contact;

    /**
     * Journal Items associated to the contact
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $exclude_journal_item;

    /**
     * Maximum of Group of Contacts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $maximum_group;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $state State
     *        ---
     *        Selection :
     *            -> option (Option)
     *            -> selection (Selection)
     *            -> finished (Finished)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $state)
    {
        $this->state = $state;
    }

    /**
     * @return int|null
     *
     * @SerializedName("maximum_group")
     */
    public function getMaximumGroup(): ?int
    {
        return $this->maximum_group;
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("dst_partner_id")
     */
    public function getDstPartnerId(): ?OdooRelation
    {
        return $this->dst_partner_id;
    }

    /**
     * @param OdooRelation|null $dst_partner_id
     */
    public function setDstPartnerId(?OdooRelation $dst_partner_id): void
    {
        $this->dst_partner_id = $dst_partner_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("exclude_contact")
     */
    public function isExcludeContact(): ?bool
    {
        return $this->exclude_contact;
    }

    /**
     * @param bool|null $exclude_contact
     */
    public function setExcludeContact(?bool $exclude_contact): void
    {
        $this->exclude_contact = $exclude_contact;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("exclude_journal_item")
     */
    public function isExcludeJournalItem(): ?bool
    {
        return $this->exclude_journal_item;
    }

    /**
     * @param bool|null $exclude_journal_item
     */
    public function setExcludeJournalItem(?bool $exclude_journal_item): void
    {
        $this->exclude_journal_item = $exclude_journal_item;
    }

    /**
     * @param int|null $maximum_group
     */
    public function setMaximumGroup(?int $maximum_group): void
    {
        $this->maximum_group = $maximum_group;
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
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
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_by_email")
     */
    public function isGroupByEmail(): ?bool
    {
        return $this->group_by_email;
    }

    /**
     * @param bool|null $group_by_parent_id
     */
    public function setGroupByParentId(?bool $group_by_parent_id): void
    {
        $this->group_by_parent_id = $group_by_parent_id;
    }

    /**
     * @param bool|null $group_by_email
     */
    public function setGroupByEmail(?bool $group_by_email): void
    {
        $this->group_by_email = $group_by_email;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_by_name")
     */
    public function isGroupByName(): ?bool
    {
        return $this->group_by_name;
    }

    /**
     * @param bool|null $group_by_name
     */
    public function setGroupByName(?bool $group_by_name): void
    {
        $this->group_by_name = $group_by_name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_by_is_company")
     */
    public function isGroupByIsCompany(): ?bool
    {
        return $this->group_by_is_company;
    }

    /**
     * @param bool|null $group_by_is_company
     */
    public function setGroupByIsCompany(?bool $group_by_is_company): void
    {
        $this->group_by_is_company = $group_by_is_company;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_by_vat")
     */
    public function isGroupByVat(): ?bool
    {
        return $this->group_by_vat;
    }

    /**
     * @param bool|null $group_by_vat
     */
    public function setGroupByVat(?bool $group_by_vat): void
    {
        $this->group_by_vat = $group_by_vat;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_by_parent_id")
     */
    public function isGroupByParentId(): ?bool
    {
        return $this->group_by_parent_id;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int|null
     *
     * @SerializedName("number_group")
     */
    public function getNumberGroup(): ?int
    {
        return $this->number_group;
    }

    /**
     * @param int|null $number_group
     */
    public function setNumberGroup(?int $number_group): void
    {
        $this->number_group = $number_group;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("current_line_id")
     */
    public function getCurrentLineId(): ?OdooRelation
    {
        return $this->current_line_id;
    }

    /**
     * @param OdooRelation|null $current_line_id
     */
    public function setCurrentLineId(?OdooRelation $current_line_id): void
    {
        $this->current_line_id = $current_line_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.partner.merge.automatic.wizard';
    }
}
