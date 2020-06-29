<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Partner\Merge\Automatic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Base\Partner\Merge\Line;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.partner.merge.automatic.wizard
 * Name : base.partner.merge.automatic.wizard
 * Info :
 * The idea behind this wizard is to create a list of potential partners to
 * merge. We use two objects, the first one is the wizard for the end-user.
 * And the second will contain the partner list to merge.
 */
final class Wizard extends Base
{
    /**
     * Email
     *
     * @var null|bool
     */
    private $group_by_email;

    /**
     * Name
     *
     * @var null|bool
     */
    private $group_by_name;

    /**
     * Is Company
     *
     * @var null|bool
     */
    private $group_by_is_company;

    /**
     * VAT
     *
     * @var null|bool
     */
    private $group_by_vat;

    /**
     * Parent Company
     *
     * @var null|bool
     */
    private $group_by_parent_id;

    /**
     * State
     *
     * @var array
     */
    private $state;

    /**
     * Group of Contacts
     *
     * @var null|int
     */
    private $number_group;

    /**
     * Current Line
     *
     * @var null|Line
     */
    private $current_line_id;

    /**
     * Lines
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Contacts
     *
     * @var null|Partner[]
     */
    private $partner_ids;

    /**
     * Destination Contact
     *
     * @var null|Partner
     */
    private $dst_partner_id;

    /**
     * A user associated to the contact
     *
     * @var null|bool
     */
    private $exclude_contact;

    /**
     * Journal Items associated to the contact
     *
     * @var null|bool
     */
    private $exclude_journal_item;

    /**
     * Maximum of Group of Contacts
     *
     * @var null|int
     */
    private $maximum_group;

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
     * @param array $state State
     */
    public function __construct(array $state)
    {
        $this->state = $state;
    }

    /**
     * @param null|Partner[] $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
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
     * @param null|int $maximum_group
     */
    public function setMaximumGroup(?int $maximum_group): void
    {
        $this->maximum_group = $maximum_group;
    }

    /**
     * @param null|bool $exclude_journal_item
     */
    public function setExcludeJournalItem(?bool $exclude_journal_item): void
    {
        $this->exclude_journal_item = $exclude_journal_item;
    }

    /**
     * @param null|bool $exclude_contact
     */
    public function setExcludeContact(?bool $exclude_contact): void
    {
        $this->exclude_contact = $exclude_contact;
    }

    /**
     * @param null|Partner $dst_partner_id
     */
    public function setDstPartnerId(?Partner $dst_partner_id): void
    {
        $this->dst_partner_id = $dst_partner_id;
    }

    /**
     * @param Partner $item
     */
    public function removePartnerIds(Partner $item): void
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
     * @param Partner $item
     */
    public function addPartnerIds(Partner $item): void
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
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function removeLineIds(Line $item): void
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
     * @param null|bool $group_by_email
     */
    public function setGroupByEmail(?bool $group_by_email): void
    {
        $this->group_by_email = $group_by_email;
    }

    /**
     * @param Line $item
     */
    public function addLineIds(Line $item): void
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
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param null|Line[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param null|Line $current_line_id
     */
    public function setCurrentLineId(?Line $current_line_id): void
    {
        $this->current_line_id = $current_line_id;
    }

    /**
     * @return null|int
     */
    public function getNumberGroup(): ?int
    {
        return $this->number_group;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param null|bool $group_by_parent_id
     */
    public function setGroupByParentId(?bool $group_by_parent_id): void
    {
        $this->group_by_parent_id = $group_by_parent_id;
    }

    /**
     * @param null|bool $group_by_vat
     */
    public function setGroupByVat(?bool $group_by_vat): void
    {
        $this->group_by_vat = $group_by_vat;
    }

    /**
     * @param null|bool $group_by_is_company
     */
    public function setGroupByIsCompany(?bool $group_by_is_company): void
    {
        $this->group_by_is_company = $group_by_is_company;
    }

    /**
     * @param null|bool $group_by_name
     */
    public function setGroupByName(?bool $group_by_name): void
    {
        $this->group_by_name = $group_by_name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
