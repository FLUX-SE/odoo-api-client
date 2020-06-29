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
 * Info :
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
     * @var null|int
     */
    private $number_added;

    /**
     * Transactions
     *
     * @var null|string
     */
    private $transactions;

    /**
     * Status
     *
     * @var null|array
     */
    private $status;

    /**
     * Method
     *
     * @var null|array
     */
    private $method;

    /**
     * Message
     *
     * @var null|string
     */
    private $message;

    /**
     * Fetch transactions from
     *
     * @var null|DateTimeInterface
     */
    private $sync_date;

    /**
     * Synchronized accounts
     *
     * @var null|WizardAlias[]
     */
    private $account_ids;

    /**
     * Hide Table
     * Technical field to hide table in view
     *
     * @var null|bool
     */
    private $hide_table;

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
     * @return null|int
     */
    public function getNumberAdded(): ?int
    {
        return $this->number_added;
    }

    /**
     * @return null|string
     */
    public function getTransactions(): ?string
    {
        return $this->transactions;
    }

    /**
     * @return null|array
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @return null|array
     */
    public function getMethod(): ?array
    {
        return $this->method;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param null|DateTimeInterface $sync_date
     */
    public function setSyncDate(?DateTimeInterface $sync_date): void
    {
        $this->sync_date = $sync_date;
    }

    /**
     * @param null|WizardAlias[] $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param WizardAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountIds(WizardAlias $item, bool $strict = true): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids, $strict);
    }

    /**
     * @param WizardAlias $item
     */
    public function addAccountIds(WizardAlias $item): void
    {
        if ($this->hasAccountIds($item)) {
            return;
        }

        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        $this->account_ids[] = $item;
    }

    /**
     * @param WizardAlias $item
     */
    public function removeAccountIds(WizardAlias $item): void
    {
        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        if ($this->hasAccountIds($item)) {
            $index = array_search($item, $this->account_ids);
            unset($this->account_ids[$index]);
        }
    }

    /**
     * @param null|bool $hide_table
     */
    public function setHideTable(?bool $hide_table): void
    {
        $this->hide_table = $hide_table;
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
