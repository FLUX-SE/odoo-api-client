<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Journal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.journal.group
 * Name : account.journal.group
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
final class Group extends Base
{
    /**
     * Journal Group
     *
     * @var string
     */
    private $name;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Excluded Journals
     *
     * @var null|Journal[]
     */
    private $excluded_journal_ids;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

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
     * @param string $name Journal Group
     * @param Company $company_id Company
     */
    public function __construct(string $name, Company $company_id)
    {
        $this->name = $name;
        $this->company_id = $company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Journal[] $excluded_journal_ids
     */
    public function setExcludedJournalIds(?array $excluded_journal_ids): void
    {
        $this->excluded_journal_ids = $excluded_journal_ids;
    }

    /**
     * @param Journal $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExcludedJournalIds(Journal $item, bool $strict = true): bool
    {
        if (null === $this->excluded_journal_ids) {
            return false;
        }

        return in_array($item, $this->excluded_journal_ids, $strict);
    }

    /**
     * @param Journal $item
     */
    public function addExcludedJournalIds(Journal $item): void
    {
        if ($this->hasExcludedJournalIds($item)) {
            return;
        }

        if (null === $this->excluded_journal_ids) {
            $this->excluded_journal_ids = [];
        }

        $this->excluded_journal_ids[] = $item;
    }

    /**
     * @param Journal $item
     */
    public function removeExcludedJournalIds(Journal $item): void
    {
        if (null === $this->excluded_journal_ids) {
            $this->excluded_journal_ids = [];
        }

        if ($this->hasExcludedJournalIds($item)) {
            $index = array_search($item, $this->excluded_journal_ids);
            unset($this->excluded_journal_ids[$index]);
        }
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
