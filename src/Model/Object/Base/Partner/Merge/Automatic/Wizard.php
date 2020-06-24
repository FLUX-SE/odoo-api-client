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
 *
 * The idea behind this wizard is to create a list of potential partners to
 * merge. We use two objects, the first one is the wizard for the end-user.
 * And the second will contain the partner list to merge.
 */
final class Wizard extends Base
{
    /**
     * Email
     *
     * @var bool
     */
    private $group_by_email;

    /**
     * Name
     *
     * @var bool
     */
    private $group_by_name;

    /**
     * Is Company
     *
     * @var bool
     */
    private $group_by_is_company;

    /**
     * VAT
     *
     * @var bool
     */
    private $group_by_vat;

    /**
     * Parent Company
     *
     * @var bool
     */
    private $group_by_parent_id;

    /**
     * State
     *
     * @var null|array
     */
    private $state;

    /**
     * Group of Contacts
     *
     * @var int
     */
    private $number_group;

    /**
     * Current Line
     *
     * @var Line
     */
    private $current_line_id;

    /**
     * Lines
     *
     * @var Line
     */
    private $line_ids;

    /**
     * Contacts
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Destination Contact
     *
     * @var Partner
     */
    private $dst_partner_id;

    /**
     * A user associated to the contact
     *
     * @var bool
     */
    private $exclude_contact;

    /**
     * Journal Items associated to the contact
     *
     * @var bool
     */
    private $exclude_journal_item;

    /**
     * Maximum of Group of Contacts
     *
     * @var int
     */
    private $maximum_group;

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
     * @param bool $group_by_email
     */
    public function setGroupByEmail(bool $group_by_email): void
    {
        $this->group_by_email = $group_by_email;
    }

    /**
     * @param Partner $dst_partner_id
     */
    public function setDstPartnerId(Partner $dst_partner_id): void
    {
        $this->dst_partner_id = $dst_partner_id;
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
     * @param int $maximum_group
     */
    public function setMaximumGroup(int $maximum_group): void
    {
        $this->maximum_group = $maximum_group;
    }

    /**
     * @param bool $exclude_journal_item
     */
    public function setExcludeJournalItem(bool $exclude_journal_item): void
    {
        $this->exclude_journal_item = $exclude_journal_item;
    }

    /**
     * @param bool $exclude_contact
     */
    public function setExcludeContact(bool $exclude_contact): void
    {
        $this->exclude_contact = $exclude_contact;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param bool $group_by_name
     */
    public function setGroupByName(bool $group_by_name): void
    {
        $this->group_by_name = $group_by_name;
    }

    /**
     * @param Line $line_ids
     */
    public function setLineIds(Line $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param Line $current_line_id
     */
    public function setCurrentLineId(Line $current_line_id): void
    {
        $this->current_line_id = $current_line_id;
    }

    /**
     * @return int
     */
    public function getNumberGroup(): int
    {
        return $this->number_group;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param bool $group_by_parent_id
     */
    public function setGroupByParentId(bool $group_by_parent_id): void
    {
        $this->group_by_parent_id = $group_by_parent_id;
    }

    /**
     * @param bool $group_by_vat
     */
    public function setGroupByVat(bool $group_by_vat): void
    {
        $this->group_by_vat = $group_by_vat;
    }

    /**
     * @param bool $group_by_is_company
     */
    public function setGroupByIsCompany(bool $group_by_is_company): void
    {
        $this->group_by_is_company = $group_by_is_company;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
