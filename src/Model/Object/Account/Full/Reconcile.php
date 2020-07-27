<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Full;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.full.reconcile
 * ---
 * Name : account.full.reconcile
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Reconcile extends Base
{
    /**
     * Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Reconciliation Parts
     * ---
     * Relation : one2many (account.partial.reconcile -> full_reconcile_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Partial\Reconcile
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partial_reconcile_ids;

    /**
     * Matched Journal Items
     * ---
     * Relation : one2many (account.move.line -> full_reconcile_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reconciled_line_ids;

    /**
     * Exchange Move
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $exchange_move_id;

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
     * @param string $name Number
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExchangeMoveId(): ?OdooRelation
    {
        return $this->exchange_move_id;
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
     * @param OdooRelation|null $exchange_move_id
     */
    public function setExchangeMoveId(?OdooRelation $exchange_move_id): void
    {
        $this->exchange_move_id = $exchange_move_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReconciledLineIds(OdooRelation $item): void
    {
        if (null === $this->reconciled_line_ids) {
            $this->reconciled_line_ids = [];
        }

        if ($this->hasReconciledLineIds($item)) {
            $index = array_search($item, $this->reconciled_line_ids);
            unset($this->reconciled_line_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addReconciledLineIds(OdooRelation $item): void
    {
        if ($this->hasReconciledLineIds($item)) {
            return;
        }

        if (null === $this->reconciled_line_ids) {
            $this->reconciled_line_ids = [];
        }

        $this->reconciled_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReconciledLineIds(OdooRelation $item): bool
    {
        if (null === $this->reconciled_line_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_line_ids);
    }

    /**
     * @param OdooRelation[]|null $reconciled_line_ids
     */
    public function setReconciledLineIds(?array $reconciled_line_ids): void
    {
        $this->reconciled_line_ids = $reconciled_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getReconciledLineIds(): ?array
    {
        return $this->reconciled_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartialReconcileIds(OdooRelation $item): void
    {
        if (null === $this->partial_reconcile_ids) {
            $this->partial_reconcile_ids = [];
        }

        if ($this->hasPartialReconcileIds($item)) {
            $index = array_search($item, $this->partial_reconcile_ids);
            unset($this->partial_reconcile_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartialReconcileIds(OdooRelation $item): void
    {
        if ($this->hasPartialReconcileIds($item)) {
            return;
        }

        if (null === $this->partial_reconcile_ids) {
            $this->partial_reconcile_ids = [];
        }

        $this->partial_reconcile_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartialReconcileIds(OdooRelation $item): bool
    {
        if (null === $this->partial_reconcile_ids) {
            return false;
        }

        return in_array($item, $this->partial_reconcile_ids);
    }

    /**
     * @param OdooRelation[]|null $partial_reconcile_ids
     */
    public function setPartialReconcileIds(?array $partial_reconcile_ids): void
    {
        $this->partial_reconcile_ids = $partial_reconcile_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPartialReconcileIds(): ?array
    {
        return $this->partial_reconcile_ids;
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
    public static function getOdooModelName(): string
    {
        return 'account.full.reconcile';
    }
}
