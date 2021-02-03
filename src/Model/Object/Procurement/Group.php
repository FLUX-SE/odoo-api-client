<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Procurement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : procurement.group
 * ---
 * Name : procurement.group
 * ---
 * Info :
 * The procurement group class is used to group products together
 *         when computing procurements. (tasks, physical products, ...)
 *
 *         The goal is that when you have one sales order of several products
 *         and the products are pulled from the same or several location(s), to keep
 *         having the moves grouped into pickings that represent the sales order.
 *
 *         Used in: sales order (to group delivery order lines like the so), pull/push
 *         rules (to pack like the delivery order), on orderpoints (e.g. for wave picking
 *         all the similar products together).
 *
 *         Grouping is made only if the source and the destination is the same.
 *         Suppose you have 4 lines on a picking from Output where 2 lines will need
 *         to come from Input (crossdock) and 2 lines coming from Stock -> Output As
 *         the four will have the same group ids from the SO, the move from input will
 *         have a stock.picking with 2 grouped lines and the move from stock will have
 *         2 grouped lines also.
 *
 *         The name is usually the name of the original document (sales order) or a
 *         sequence computed if created manually.
 */
final class Group extends Base
{
    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Delivery Type
     * ---
     * Selection :
     *     -> direct (Partial)
     *     -> one (All at once)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $move_type;

    /**
     * Related Stock Moves
     * ---
     * Relation : one2many (stock.move -> group_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_move_ids;

    /**
     * Sale Order
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_id;

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
     * @param string $name Reference
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $move_type Delivery Type
     *        ---
     *        Selection :
     *            -> direct (Partial)
     *            -> one (All at once)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $move_type)
    {
        $this->name = $name;
        $this->move_type = $move_type;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_id")
     */
    public function getSaleId(): ?OdooRelation
    {
        return $this->sale_id;
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
     * @param OdooRelation|null $sale_id
     */
    public function setSaleId(?OdooRelation $sale_id): void
    {
        $this->sale_id = $sale_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStockMoveIds(OdooRelation $item): void
    {
        if (null === $this->stock_move_ids) {
            $this->stock_move_ids = [];
        }

        if ($this->hasStockMoveIds($item)) {
            $index = array_search($item, $this->stock_move_ids);
            unset($this->stock_move_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addStockMoveIds(OdooRelation $item): void
    {
        if ($this->hasStockMoveIds($item)) {
            return;
        }

        if (null === $this->stock_move_ids) {
            $this->stock_move_ids = [];
        }

        $this->stock_move_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStockMoveIds(OdooRelation $item): bool
    {
        if (null === $this->stock_move_ids) {
            return false;
        }

        return in_array($item, $this->stock_move_ids);
    }

    /**
     * @param OdooRelation[]|null $stock_move_ids
     */
    public function setStockMoveIds(?array $stock_move_ids): void
    {
        $this->stock_move_ids = $stock_move_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_move_ids")
     */
    public function getStockMoveIds(): ?array
    {
        return $this->stock_move_ids;
    }

    /**
     * @param string $move_type
     */
    public function setMoveType(string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @return string
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): string
    {
        return $this->move_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'procurement.group';
    }
}
