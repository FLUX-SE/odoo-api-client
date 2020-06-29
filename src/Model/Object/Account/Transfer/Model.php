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
final class Model extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Destination Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Start Date
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * Stop Date
     *
     * @var null|DateTimeInterface
     */
    private $date_stop;

    /**
     * Frequency
     *
     * @var array
     */
    private $frequency;

    /**
     * Origin Accounts
     *
     * @var null|Account[]
     */
    private $account_ids;

    /**
     * Destination Accounts
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Generated Moves
     *
     * @var null|Move[]
     */
    private $move_ids;

    /**
     * Move Ids Count
     *
     * @var null|int
     */
    private $move_ids_count;

    /**
     * Total Percent
     *
     * @var null|float
     */
    private $total_percent;

    /**
     * State
     *
     * @var array
     */
    private $state;

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
     * @param string $name Name
     * @param Journal $journal_id Destination Journal
     * @param DateTimeInterface $date_start Start Date
     * @param array $frequency Frequency
     * @param array $state State
     */
    public function __construct(
        string $name,
        Journal $journal_id,
        DateTimeInterface $date_start,
        array $frequency,
        array $state
    ) {
        $this->name = $name;
        $this->journal_id = $journal_id;
        $this->date_start = $date_start;
        $this->frequency = $frequency;
        $this->state = $state;
    }

    /**
     * @param Line $item
     */
    public function removeLineIds(Line $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param mixed $item
     */
    public function removeState($item): void
    {
        if ($this->hasState($item)) {
            $index = array_search($item, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addState($item): void
    {
        if ($this->hasState($item)) {
            return;
        }

        $this->state[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState($item, bool $strict = true): bool
    {
        return in_array($item, $this->state, $strict);
    }

    /**
     * @param array $state
     */
    public function setState(array $state): void
    {
        $this->state = $state;
    }

    /**
     * @return null|float
     */
    public function getTotalPercent(): ?float
    {
        return $this->total_percent;
    }

    /**
     * @return null|int
     */
    public function getMoveIdsCount(): ?int
    {
        return $this->move_ids_count;
    }

    /**
     * @param Move $item
     */
    public function removeMoveIds(Move $item): void
    {
        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        if ($this->hasMoveIds($item)) {
            $index = array_search($item, $this->move_ids);
            unset($this->move_ids[$index]);
        }
    }

    /**
     * @param Move $item
     */
    public function addMoveIds(Move $item): void
    {
        if ($this->hasMoveIds($item)) {
            return;
        }

        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        $this->move_ids[] = $item;
    }

    /**
     * @param Move $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMoveIds(Move $item, bool $strict = true): bool
    {
        if (null === $this->move_ids) {
            return false;
        }

        return in_array($item, $this->move_ids, $strict);
    }

    /**
     * @param null|Move[] $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param Line $item
     */
    public function addLineIds(Line $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param null|Line[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param Account $item
     */
    public function removeAccountIds(Account $item): void
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
     * @param Account $item
     */
    public function addAccountIds(Account $item): void
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
     * @param Account $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountIds(Account $item, bool $strict = true): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids, $strict);
    }

    /**
     * @param null|Account[] $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param mixed $item
     */
    public function removeFrequency($item): void
    {
        if ($this->hasFrequency($item)) {
            $index = array_search($item, $this->frequency);
            unset($this->frequency[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addFrequency($item): void
    {
        if ($this->hasFrequency($item)) {
            return;
        }

        $this->frequency[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFrequency($item, bool $strict = true): bool
    {
        return in_array($item, $this->frequency, $strict);
    }

    /**
     * @param array $frequency
     */
    public function setFrequency(array $frequency): void
    {
        $this->frequency = $frequency;
    }

    /**
     * @param null|DateTimeInterface $date_stop
     */
    public function setDateStop(?DateTimeInterface $date_stop): void
    {
        $this->date_stop = $date_stop;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
