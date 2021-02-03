<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Immediate\Transfer;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.immediate.transfer.line
 * ---
 * Name : stock.immediate.transfer.line
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Line extends Base
{
    /**
     * Immediate Transfer
     * ---
     * Relation : many2one (stock.immediate.transfer)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Immediate\Transfer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $immediate_transfer_id;

    /**
     * Transfer
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
     * To Process
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_immediate;

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
     * @param OdooRelation $immediate_transfer_id Immediate Transfer
     *        ---
     *        Relation : many2one (stock.immediate.transfer)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Immediate\Transfer
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $picking_id Transfer
     *        ---
     *        Relation : many2one (stock.picking)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $immediate_transfer_id, OdooRelation $picking_id)
    {
        $this->immediate_transfer_id = $immediate_transfer_id;
        $this->picking_id = $picking_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("immediate_transfer_id")
     */
    public function getImmediateTransferId(): OdooRelation
    {
        return $this->immediate_transfer_id;
    }

    /**
     * @param OdooRelation $immediate_transfer_id
     */
    public function setImmediateTransferId(OdooRelation $immediate_transfer_id): void
    {
        $this->immediate_transfer_id = $immediate_transfer_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("picking_id")
     */
    public function getPickingId(): OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param OdooRelation $picking_id
     */
    public function setPickingId(OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_immediate")
     */
    public function isToImmediate(): ?bool
    {
        return $this->to_immediate;
    }

    /**
     * @param bool|null $to_immediate
     */
    public function setToImmediate(?bool $to_immediate): void
    {
        $this->to_immediate = $to_immediate;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.immediate.transfer.line';
    }
}
