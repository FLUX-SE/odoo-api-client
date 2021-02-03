<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Backorder\Confirmation;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.backorder.confirmation.line
 * ---
 * Name : stock.backorder.confirmation.line
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
     * Relation : many2one (stock.backorder.confirmation)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Backorder\Confirmation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $backorder_confirmation_id;

    /**
     * Transfer
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
     * To Backorder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_backorder;

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
     * @SerializedName("backorder_confirmation_id")
     */
    public function getBackorderConfirmationId(): ?OdooRelation
    {
        return $this->backorder_confirmation_id;
    }

    /**
     * @param OdooRelation|null $backorder_confirmation_id
     */
    public function setBackorderConfirmationId(?OdooRelation $backorder_confirmation_id): void
    {
        $this->backorder_confirmation_id = $backorder_confirmation_id;
    }

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
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_backorder")
     */
    public function isToBackorder(): ?bool
    {
        return $this->to_backorder;
    }

    /**
     * @param bool|null $to_backorder
     */
    public function setToBackorder(?bool $to_backorder): void
    {
        $this->to_backorder = $to_backorder;
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
        return 'stock.backorder.confirmation.line';
    }
}
