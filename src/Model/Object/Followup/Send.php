<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Followup;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : followup.send
 * Name : followup.send
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Send extends Base
{
    /**
     * Stamp(s)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $snailmail_cost;

    /**
     * Number of letters
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $letters_qty;

    /**
     * Recipients
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Invalid Addresses Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invalid_addresses;

    /**
     * Invalid Addresses
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invalid_partner_ids;

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
     * @return float|null
     */
    public function getSnailmailCost(): ?float
    {
        return $this->snailmail_cost;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvalidPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->invalid_partner_ids) {
            return false;
        }

        return in_array($item, $this->invalid_partner_ids);
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvalidPartnerIds(OdooRelation $item): void
    {
        if (null === $this->invalid_partner_ids) {
            $this->invalid_partner_ids = [];
        }

        if ($this->hasInvalidPartnerIds($item)) {
            $index = array_search($item, $this->invalid_partner_ids);
            unset($this->invalid_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvalidPartnerIds(OdooRelation $item): void
    {
        if ($this->hasInvalidPartnerIds($item)) {
            return;
        }

        if (null === $this->invalid_partner_ids) {
            $this->invalid_partner_ids = [];
        }

        $this->invalid_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $invalid_partner_ids
     */
    public function setInvalidPartnerIds(?array $invalid_partner_ids): void
    {
        $this->invalid_partner_ids = $invalid_partner_ids;
    }

    /**
     * @param float|null $snailmail_cost
     */
    public function setSnailmailCost(?float $snailmail_cost): void
    {
        $this->snailmail_cost = $snailmail_cost;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvalidPartnerIds(): ?array
    {
        return $this->invalid_partner_ids;
    }

    /**
     * @param int|null $invalid_addresses
     */
    public function setInvalidAddresses(?int $invalid_addresses): void
    {
        $this->invalid_addresses = $invalid_addresses;
    }

    /**
     * @return int|null
     */
    public function getInvalidAddresses(): ?int
    {
        return $this->invalid_addresses;
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
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param int|null $letters_qty
     */
    public function setLettersQty(?int $letters_qty): void
    {
        $this->letters_qty = $letters_qty;
    }

    /**
     * @return int|null
     */
    public function getLettersQty(): ?int
    {
        return $this->letters_qty;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'followup.send';
    }
}
