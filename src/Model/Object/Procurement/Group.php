<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Procurement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * Selection : (default value, usually null)
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
     *        Selection : (default value, usually null)
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
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
    public function getName(): string
    {
        return $this->name;
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
     */
    public function getMoveType(): string
    {
        return $this->move_type;
    }

    /**
     * @param string $move_type
     */
    public function setMoveType(string $move_type): void
    {
        $this->move_type = $move_type;
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
        return 'procurement.group';
    }
}
