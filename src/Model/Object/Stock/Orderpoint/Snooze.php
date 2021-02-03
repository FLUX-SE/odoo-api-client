<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Orderpoint;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.orderpoint.snooze
 * ---
 * Name : stock.orderpoint.snooze
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Snooze extends Base
{
    /**
     * Orderpoint
     * ---
     * Relation : many2many (stock.warehouse.orderpoint)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Warehouse\Orderpoint
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $orderpoint_ids;

    /**
     * Snooze for
     * ---
     * Selection :
     *     -> day (1 Day)
     *     -> week (1 Week)
     *     -> month (1 Month)
     *     -> custom (Custom)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $predefined_date;

    /**
     * Snooze Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $snoozed_until;

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
     * @SerializedName("orderpoint_ids")
     */
    public function getOrderpointIds(): ?array
    {
        return $this->orderpoint_ids;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation[]|null $orderpoint_ids
     */
    public function setOrderpointIds(?array $orderpoint_ids): void
    {
        $this->orderpoint_ids = $orderpoint_ids;
    }

    /**
     * @param DateTimeInterface|null $snoozed_until
     */
    public function setSnoozedUntil(?DateTimeInterface $snoozed_until): void
    {
        $this->snoozed_until = $snoozed_until;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("snoozed_until")
     */
    public function getSnoozedUntil(): ?DateTimeInterface
    {
        return $this->snoozed_until;
    }

    /**
     * @param string|null $predefined_date
     */
    public function setPredefinedDate(?string $predefined_date): void
    {
        $this->predefined_date = $predefined_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("predefined_date")
     */
    public function getPredefinedDate(): ?string
    {
        return $this->predefined_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOrderpointIds(OdooRelation $item): void
    {
        if (null === $this->orderpoint_ids) {
            $this->orderpoint_ids = [];
        }

        if ($this->hasOrderpointIds($item)) {
            $index = array_search($item, $this->orderpoint_ids);
            unset($this->orderpoint_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addOrderpointIds(OdooRelation $item): void
    {
        if ($this->hasOrderpointIds($item)) {
            return;
        }

        if (null === $this->orderpoint_ids) {
            $this->orderpoint_ids = [];
        }

        $this->orderpoint_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOrderpointIds(OdooRelation $item): bool
    {
        if (null === $this->orderpoint_ids) {
            return false;
        }

        return in_array($item, $this->orderpoint_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.orderpoint.snooze';
    }
}
