<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Return_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.return.picking
 * ---
 * Name : stock.return.picking
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Picking extends Base
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
     * @var OdooRelation|null
     */
    private $picking_id;

    /**
     * Moves
     * ---
     * Relation : one2many (stock.return.picking.line -> wizard_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Return_\Picking\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_return_moves;

    /**
     * Chained Move Exists
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $move_dest_exists;

    /**
     * Original Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $original_location_id;

    /**
     * Parent Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_location_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Return Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_id;

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
     * @return OdooRelation|null
     *
     * @SerializedName("picking_id")
     */
    public function getPickingId(): ?OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param OdooRelation|null $location_id
     */
    public function setLocationId(?OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): ?OdooRelation
    {
        return $this->location_id;
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
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @param OdooRelation|null $parent_location_id
     */
    public function setParentLocationId(?OdooRelation $parent_location_id): void
    {
        $this->parent_location_id = $parent_location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_location_id")
     */
    public function getParentLocationId(): ?OdooRelation
    {
        return $this->parent_location_id;
    }

    /**
     * @param OdooRelation|null $original_location_id
     */
    public function setOriginalLocationId(?OdooRelation $original_location_id): void
    {
        $this->original_location_id = $original_location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("original_location_id")
     */
    public function getOriginalLocationId(): ?OdooRelation
    {
        return $this->original_location_id;
    }

    /**
     * @param bool|null $move_dest_exists
     */
    public function setMoveDestExists(?bool $move_dest_exists): void
    {
        $this->move_dest_exists = $move_dest_exists;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("move_dest_exists")
     */
    public function isMoveDestExists(): ?bool
    {
        return $this->move_dest_exists;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductReturnMoves(OdooRelation $item): void
    {
        if (null === $this->product_return_moves) {
            $this->product_return_moves = [];
        }

        if ($this->hasProductReturnMoves($item)) {
            $index = array_search($item, $this->product_return_moves);
            unset($this->product_return_moves[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductReturnMoves(OdooRelation $item): void
    {
        if ($this->hasProductReturnMoves($item)) {
            return;
        }

        if (null === $this->product_return_moves) {
            $this->product_return_moves = [];
        }

        $this->product_return_moves[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductReturnMoves(OdooRelation $item): bool
    {
        if (null === $this->product_return_moves) {
            return false;
        }

        return in_array($item, $this->product_return_moves);
    }

    /**
     * @param OdooRelation[]|null $product_return_moves
     */
    public function setProductReturnMoves(?array $product_return_moves): void
    {
        $this->product_return_moves = $product_return_moves;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_return_moves")
     */
    public function getProductReturnMoves(): ?array
    {
        return $this->product_return_moves;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.return.picking';
    }
}
