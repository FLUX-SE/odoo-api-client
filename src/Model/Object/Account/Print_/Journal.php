<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Print_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal as JournalAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.print.journal
 * Name : account.print.journal
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Journal extends Base
{
    /**
     * Entries Sorted by
     *
     * @var array
     */
    private $sort_selection;

    /**
     * Journals
     *
     * @var JournalAlias[]
     */
    private $journal_ids;

    /**
     * With Currency
     * Print Report with the currency column if the currency differs from the company currency.
     *
     * @var null|bool
     */
    private $amount_currency;

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
    private $date_from;

    /**
     * End Date
     *
     * @var null|DateTimeInterface
     */
    private $date_to;

    /**
     * Target Moves
     *
     * @var array
     */
    private $target_move;

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
     * @param array $sort_selection Entries Sorted by
     * @param JournalAlias[] $journal_ids Journals
     * @param Company $company_id Company
     * @param array $target_move Target Moves
     */
    public function __construct(
        array $sort_selection,
        array $journal_ids,
        Company $company_id,
        array $target_move
    ) {
        $this->sort_selection = $sort_selection;
        $this->journal_ids = $journal_ids;
        $this->company_id = $company_id;
        $this->target_move = $target_move;
    }

    /**
     * @param null|DateTimeInterface $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
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
    public function removeTargetMove($item): void
    {
        if ($this->hasTargetMove($item)) {
            $index = array_search($item, $this->target_move);
            unset($this->target_move[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addTargetMove($item): void
    {
        if ($this->hasTargetMove($item)) {
            return;
        }

        $this->target_move[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTargetMove($item, bool $strict = true): bool
    {
        return in_array($item, $this->target_move, $strict);
    }

    /**
     * @param array $target_move
     */
    public function setTargetMove(array $target_move): void
    {
        $this->target_move = $target_move;
    }

    /**
     * @param null|DateTimeInterface $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param array $sort_selection
     */
    public function setSortSelection(array $sort_selection): void
    {
        $this->sort_selection = $sort_selection;
    }

    /**
     * @param null|bool $amount_currency
     */
    public function setAmountCurrency(?bool $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @param JournalAlias $item
     */
    public function removeJournalIds(JournalAlias $item): void
    {
        if ($this->hasJournalIds($item)) {
            $index = array_search($item, $this->journal_ids);
            unset($this->journal_ids[$index]);
        }
    }

    /**
     * @param JournalAlias $item
     */
    public function addJournalIds(JournalAlias $item): void
    {
        if ($this->hasJournalIds($item)) {
            return;
        }

        $this->journal_ids[] = $item;
    }

    /**
     * @param JournalAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalIds(JournalAlias $item, bool $strict = true): bool
    {
        return in_array($item, $this->journal_ids, $strict);
    }

    /**
     * @param JournalAlias[] $journal_ids
     */
    public function setJournalIds(array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @param mixed $item
     */
    public function removeSortSelection($item): void
    {
        if ($this->hasSortSelection($item)) {
            $index = array_search($item, $this->sort_selection);
            unset($this->sort_selection[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addSortSelection($item): void
    {
        if ($this->hasSortSelection($item)) {
            return;
        }

        $this->sort_selection[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSortSelection($item, bool $strict = true): bool
    {
        return in_array($item, $this->sort_selection, $strict);
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
