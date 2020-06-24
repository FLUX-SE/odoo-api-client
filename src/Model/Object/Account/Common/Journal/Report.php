<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Common\Journal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.common.journal.report
 * Name : account.common.journal.report
 *
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
     * With Currency
     *
     * @var bool
     */
    private $amount_currency;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Journals
     *
     * @var null|Journal
     */
    private $journal_ids;

    /**
     * Start Date
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Target Moves
     *
     * @var null|array
     */
    private $target_move;

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
     * @param bool $amount_currency
     */
    public function setAmountCurrency(bool $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Journal $journal_ids
     */
    public function setJournalIds(Journal $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param null|array $target_move
     */
    public function setTargetMove(?array $target_move): void
    {
        $this->target_move = $target_move;
    }

    /**
     * @param ?array $target_move
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTargetMove(?array $target_move, bool $strict = true): bool
    {
        if (null === $this->target_move) {
            return false;
        }

        return in_array($target_move, $this->target_move, $strict);
    }

    /**
     * @param ?array $target_move
     */
    public function addTargetMove(?array $target_move): void
    {
        if ($this->hasTargetMove($target_move)) {
            return;
        }

        if (null === $this->target_move) {
            $this->target_move = [];
        }

        $this->target_move[] = $target_move;
    }

    /**
     * @param ?array $target_move
     */
    public function removeTargetMove(?array $target_move): void
    {
        if ($this->hasTargetMove($target_move)) {
            $index = array_search($target_move, $this->target_move);
            unset($this->target_move[$index]);
        }
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
