<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Online\Link\Wizard as WizardAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.online.wizard
 * Name : account.online.wizard
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Number Added
     *
     * @var int
     */
    private $number_added;

    /**
     * Transactions
     *
     * @var string
     */
    private $transactions;

    /**
     * Status
     *
     * @var array
     */
    private $status;

    /**
     * Method
     *
     * @var array
     */
    private $method;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * Fetch transactions from
     *
     * @var DateTimeInterface
     */
    private $sync_date;

    /**
     * Synchronized accounts
     *
     * @var WizardAlias
     */
    private $account_ids;

    /**
     * Hide Table
     *
     * @var bool
     */
    private $hide_table;

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
     * @return int
     */
    public function getNumberAdded(): int
    {
        return $this->number_added;
    }

    /**
     * @return string
     */
    public function getTransactions(): string
    {
        return $this->transactions;
    }

    /**
     * @return array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getMethod(): array
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param DateTimeInterface $sync_date
     */
    public function setSyncDate(DateTimeInterface $sync_date): void
    {
        $this->sync_date = $sync_date;
    }

    /**
     * @param WizardAlias $account_ids
     */
    public function setAccountIds(WizardAlias $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param bool $hide_table
     */
    public function setHideTable(bool $hide_table): void
    {
        $this->hide_table = $hide_table;
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
