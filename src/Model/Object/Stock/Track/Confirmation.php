<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Track;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.track.confirmation
 * ---
 * Name : stock.track.confirmation
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Confirmation extends Base
{
    /**
     * Tracking Line
     * ---
     * Relation : one2many (stock.track.line -> wizard_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Track\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tracking_line_ids;

    /**
     * Inventory
     * ---
     * Relation : many2one (stock.inventory)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Inventory
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $inventory_id;

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
     * @return OdooRelation[]|null
     */
    public function getTrackingLineIds(): ?array
    {
        return $this->tracking_line_ids;
    }

    /**
     * @param OdooRelation[]|null $tracking_line_ids
     */
    public function setTrackingLineIds(?array $tracking_line_ids): void
    {
        $this->tracking_line_ids = $tracking_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTrackingLineIds(OdooRelation $item): bool
    {
        if (null === $this->tracking_line_ids) {
            return false;
        }

        return in_array($item, $this->tracking_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTrackingLineIds(OdooRelation $item): void
    {
        if ($this->hasTrackingLineIds($item)) {
            return;
        }

        if (null === $this->tracking_line_ids) {
            $this->tracking_line_ids = [];
        }

        $this->tracking_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTrackingLineIds(OdooRelation $item): void
    {
        if (null === $this->tracking_line_ids) {
            $this->tracking_line_ids = [];
        }

        if ($this->hasTrackingLineIds($item)) {
            $index = array_search($item, $this->tracking_line_ids);
            unset($this->tracking_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getInventoryId(): ?OdooRelation
    {
        return $this->inventory_id;
    }

    /**
     * @param OdooRelation|null $inventory_id
     */
    public function setInventoryId(?OdooRelation $inventory_id): void
    {
        $this->inventory_id = $inventory_id;
    }

    /**
     * @return OdooRelation|null
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.track.confirmation';
    }
}
