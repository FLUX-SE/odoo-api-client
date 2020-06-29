<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Common;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.common.report
 * Name : account.common.report
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Report extends Base
{
    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Journals
     *
     * @var Journal[]
     */
    private $journal_ids;

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
     * @param Company $company_id Company
     * @param Journal[] $journal_ids Journals
     * @param array $target_move Target Moves
     */
    public function __construct(Company $company_id, array $journal_ids, array $target_move)
    {
        $this->company_id = $company_id;
        $this->journal_ids = $journal_ids;
        $this->target_move = $target_move;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Journal[] $journal_ids
     */
    public function setJournalIds(array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @param Journal $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalIds(Journal $item, bool $strict = true): bool
    {
        return in_array($item, $this->journal_ids, $strict);
    }

    /**
     * @param Journal $item
     */
    public function addJournalIds(Journal $item): void
    {
        if ($this->hasJournalIds($item)) {
            return;
        }

        $this->journal_ids[] = $item;
    }

    /**
     * @param Journal $item
     */
    public function removeJournalIds(Journal $item): void
    {
        if ($this->hasJournalIds($item)) {
            $index = array_search($item, $this->journal_ids);
            unset($this->journal_ids[$index]);
        }
    }

    /**
     * @param null|DateTimeInterface $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param null|DateTimeInterface $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param array $target_move
     */
    public function setTargetMove(array $target_move): void
    {
        $this->target_move = $target_move;
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
     */
    public function removeTargetMove($item): void
    {
        if ($this->hasTargetMove($item)) {
            $index = array_search($item, $this->target_move);
            unset($this->target_move[$index]);
        }
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
