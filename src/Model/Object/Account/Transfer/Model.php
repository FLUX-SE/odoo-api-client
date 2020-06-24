<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Transfer;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Transfer\Model\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.transfer.model
 * Name : account.transfer.model
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
final class Model extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Destination Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Start Date
     *
     * @var null|DateTimeInterface
     */
    private $date_start;

    /**
     * Stop Date
     *
     * @var DateTimeInterface
     */
    private $date_stop;

    /**
     * Frequency
     *
     * @var null|array
     */
    private $frequency;

    /**
     * Origin Accounts
     *
     * @var Account
     */
    private $account_ids;

    /**
     * Destination Accounts
     *
     * @var Line
     */
    private $line_ids;

    /**
     * Generated Moves
     *
     * @var Move
     */
    private $move_ids;

    /**
     * Move Ids Count
     *
     * @var int
     */
    private $move_ids_count;

    /**
     * Total Percent
     *
     * @var float
     */
    private $total_percent;

    /**
     * State
     *
     * @var null|array
     */
    private $state;

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
     * @return int
     */
    public function getMoveIdsCount(): int
    {
        return $this->move_ids_count;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param ?array $state
     */
    public function removeState(?array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param ?array $state
     */
    public function addState(?array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $state;
    }

    /**
     * @param ?array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(?array $state, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($state, $this->state, $strict);
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @return float
     */
    public function getTotalPercent(): float
    {
        return $this->total_percent;
    }

    /**
     * @param Move $move_ids
     */
    public function setMoveIds(Move $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param Line $line_ids
     */
    public function setLineIds(Line $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param Account $account_ids
     */
    public function setAccountIds(Account $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param ?array $frequency
     */
    public function removeFrequency(?array $frequency): void
    {
        if ($this->hasFrequency($frequency)) {
            $index = array_search($frequency, $this->frequency);
            unset($this->frequency[$index]);
        }
    }

    /**
     * @param ?array $frequency
     */
    public function addFrequency(?array $frequency): void
    {
        if ($this->hasFrequency($frequency)) {
            return;
        }

        if (null === $this->frequency) {
            $this->frequency = [];
        }

        $this->frequency[] = $frequency;
    }

    /**
     * @param ?array $frequency
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFrequency(?array $frequency, bool $strict = true): bool
    {
        if (null === $this->frequency) {
            return false;
        }

        return in_array($frequency, $this->frequency, $strict);
    }

    /**
     * @param null|array $frequency
     */
    public function setFrequency(?array $frequency): void
    {
        $this->frequency = $frequency;
    }

    /**
     * @param DateTimeInterface $date_stop
     */
    public function setDateStop(DateTimeInterface $date_stop): void
    {
        $this->date_stop = $date_stop;
    }

    /**
     * @param null|DateTimeInterface $date_start
     */
    public function setDateStart(?DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
