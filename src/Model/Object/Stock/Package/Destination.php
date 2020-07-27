<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Package;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.package.destination
 * ---
 * Name : stock.package.destination
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Destination extends Base
{
    /**
     * Picking
     * ---
     * Relation : many2one (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $picking_id;

    /**
     * Move Line
     * ---
     * Relation : many2many (stock.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $move_line_ids;

    /**
     * Destination location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_dest_id;

    /**
     * Filtered Location
     * ---
     * Relation : one2many (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $filtered_location;

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
     * @param OdooRelation $picking_id Picking
     *        ---
     *        Relation : many2one (stock.picking)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $move_line_ids Move Line
     *        ---
     *        Relation : many2many (stock.move.line)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     *        ---
     *        Searchable : no
     *        Sortable : no
     * @param OdooRelation $location_dest_id Destination location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $picking_id,
        array $move_line_ids,
        OdooRelation $location_dest_id
    ) {
        $this->picking_id = $picking_id;
        $this->move_line_ids = $move_line_ids;
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addFilteredLocation(OdooRelation $item): void
    {
        if ($this->hasFilteredLocation($item)) {
            return;
        }

        if (null === $this->filtered_location) {
            $this->filtered_location = [];
        }

        $this->filtered_location[] = $item;
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
    public function removeFilteredLocation(OdooRelation $item): void
    {
        if (null === $this->filtered_location) {
            $this->filtered_location = [];
        }

        if ($this->hasFilteredLocation($item)) {
            $index = array_search($item, $this->filtered_location);
            unset($this->filtered_location[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFilteredLocation(OdooRelation $item): bool
    {
        if (null === $this->filtered_location) {
            return false;
        }

        return in_array($item, $this->filtered_location);
    }

    /**
     * @return OdooRelation
     */
    public function getPickingId(): OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param OdooRelation[]|null $filtered_location
     */
    public function setFilteredLocation(?array $filtered_location): void
    {
        $this->filtered_location = $filtered_location;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getFilteredLocation(): ?array
    {
        return $this->filtered_location;
    }

    /**
     * @param OdooRelation $location_dest_id
     */
    public function setLocationDestId(OdooRelation $location_dest_id): void
    {
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @return OdooRelation
     */
    public function getLocationDestId(): OdooRelation
    {
        return $this->location_dest_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            $index = array_search($item, $this->move_line_ids);
            unset($this->move_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            return;
        }

        $this->move_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIds(OdooRelation $item): bool
    {
        return in_array($item, $this->move_line_ids);
    }

    /**
     * @param OdooRelation[] $move_line_ids
     */
    public function setMoveLineIds(array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @return OdooRelation[]
     */
    public function getMoveLineIds(): array
    {
        return $this->move_line_ids;
    }

    /**
     * @param OdooRelation $picking_id
     */
    public function setPickingId(OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.package.destination';
    }
}
