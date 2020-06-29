<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Full;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Account\Partial\Reconcile as ReconcileAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.full.reconcile
 * Name : account.full.reconcile
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Reconcile extends Base
{
    /**
     * Number
     *
     * @var string
     */
    private $name;

    /**
     * Reconciliation Parts
     *
     * @var null|ReconcileAlias[]
     */
    private $partial_reconcile_ids;

    /**
     * Matched Journal Items
     *
     * @var null|Line[]
     */
    private $reconciled_line_ids;

    /**
     * Exchange Move
     *
     * @var null|Move
     */
    private $exchange_move_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Number
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|ReconcileAlias[] $partial_reconcile_ids
     */
    public function setPartialReconcileIds(?array $partial_reconcile_ids): void
    {
        $this->partial_reconcile_ids = $partial_reconcile_ids;
    }

    /**
     * @param ReconcileAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartialReconcileIds(ReconcileAlias $item, bool $strict = true): bool
    {
        if (null === $this->partial_reconcile_ids) {
            return false;
        }

        return in_array($item, $this->partial_reconcile_ids, $strict);
    }

    /**
     * @param ReconcileAlias $item
     */
    public function addPartialReconcileIds(ReconcileAlias $item): void
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
     * @param ReconcileAlias $item
     */
    public function removePartialReconcileIds(ReconcileAlias $item): void
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
     * @param null|Line[] $reconciled_line_ids
     */
    public function setReconciledLineIds(?array $reconciled_line_ids): void
    {
        $this->reconciled_line_ids = $reconciled_line_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasReconciledLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->reconciled_line_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addReconciledLineIds(Line $item): void
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
     * @param Line $item
     */
    public function removeReconciledLineIds(Line $item): void
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
     * @param null|Move $exchange_move_id
     */
    public function setExchangeMoveId(?Move $exchange_move_id): void
    {
        $this->exchange_move_id = $exchange_move_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
