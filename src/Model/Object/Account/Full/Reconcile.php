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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Reconciliation Parts
     *
     * @var ReconcileAlias
     */
    private $partial_reconcile_ids;

    /**
     * Matched Journal Items
     *
     * @var Line
     */
    private $reconciled_line_ids;

    /**
     * Exchange Move
     *
     * @var Move
     */
    private $exchange_move_id;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param ReconcileAlias $partial_reconcile_ids
     */
    public function setPartialReconcileIds(ReconcileAlias $partial_reconcile_ids): void
    {
        $this->partial_reconcile_ids = $partial_reconcile_ids;
    }

    /**
     * @param Line $reconciled_line_ids
     */
    public function setReconciledLineIds(Line $reconciled_line_ids): void
    {
        $this->reconciled_line_ids = $reconciled_line_ids;
    }

    /**
     * @param Move $exchange_move_id
     */
    public function setExchangeMoveId(Move $exchange_move_id): void
    {
        $this->exchange_move_id = $exchange_move_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
