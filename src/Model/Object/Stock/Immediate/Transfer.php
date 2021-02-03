<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Immediate;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.immediate.transfer
 * ---
 * Name : stock.immediate.transfer
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Transfer extends Base
{
    /**
     * Pick
     * ---
     * Relation : many2many (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $pick_ids;

    /**
     * Show Transfers
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_transfers;

    /**
     * Immediate Transfer Lines
     * ---
     * Relation : one2many (stock.immediate.transfer.line -> immediate_transfer_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Immediate\Transfer\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $immediate_transfer_line_ids;

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
     *
     * @SerializedName("pick_ids")
     */
    public function getPickIds(): ?array
    {
        return $this->pick_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeImmediateTransferLineIds(OdooRelation $item): void
    {
        if (null === $this->immediate_transfer_line_ids) {
            $this->immediate_transfer_line_ids = [];
        }

        if ($this->hasImmediateTransferLineIds($item)) {
            $index = array_search($item, $this->immediate_transfer_line_ids);
            unset($this->immediate_transfer_line_ids[$index]);
        }
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
     * @param OdooRelation $item
     */
    public function addImmediateTransferLineIds(OdooRelation $item): void
    {
        if ($this->hasImmediateTransferLineIds($item)) {
            return;
        }

        if (null === $this->immediate_transfer_line_ids) {
            $this->immediate_transfer_line_ids = [];
        }

        $this->immediate_transfer_line_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $pick_ids
     */
    public function setPickIds(?array $pick_ids): void
    {
        $this->pick_ids = $pick_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasImmediateTransferLineIds(OdooRelation $item): bool
    {
        if (null === $this->immediate_transfer_line_ids) {
            return false;
        }

        return in_array($item, $this->immediate_transfer_line_ids);
    }

    /**
     * @param OdooRelation[]|null $immediate_transfer_line_ids
     */
    public function setImmediateTransferLineIds(?array $immediate_transfer_line_ids): void
    {
        $this->immediate_transfer_line_ids = $immediate_transfer_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("immediate_transfer_line_ids")
     */
    public function getImmediateTransferLineIds(): ?array
    {
        return $this->immediate_transfer_line_ids;
    }

    /**
     * @param bool|null $show_transfers
     */
    public function setShowTransfers(?bool $show_transfers): void
    {
        $this->show_transfers = $show_transfers;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_transfers")
     */
    public function isShowTransfers(): ?bool
    {
        return $this->show_transfers;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePickIds(OdooRelation $item): void
    {
        if (null === $this->pick_ids) {
            $this->pick_ids = [];
        }

        if ($this->hasPickIds($item)) {
            $index = array_search($item, $this->pick_ids);
            unset($this->pick_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPickIds(OdooRelation $item): void
    {
        if ($this->hasPickIds($item)) {
            return;
        }

        if (null === $this->pick_ids) {
            $this->pick_ids = [];
        }

        $this->pick_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPickIds(OdooRelation $item): bool
    {
        if (null === $this->pick_ids) {
            return false;
        }

        return in_array($item, $this->pick_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.immediate.transfer';
    }
}
