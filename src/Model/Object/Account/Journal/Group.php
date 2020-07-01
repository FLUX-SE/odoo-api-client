<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Journal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.journal.group
 * Name : account.journal.group
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Group extends Base
{
    public const ODOO_MODEL_NAME = 'account.journal.group';

    /**
     * Journal Group
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Excluded Journals
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $excluded_journal_ids;

    /**
     * Sequence
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Journal Group
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $company_id)
    {
        $this->name = $name;
        $this->company_id = $company_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExcludedJournalIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addExcludedJournalIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExcludedJournalIds(OdooRelation $item): bool
    {
        if (null === $this->excluded_journal_ids) {
            return false;
        }

        return in_array($item, $this->excluded_journal_ids);
    }

    /**
     * @param OdooRelation[]|null $excluded_journal_ids
     */
    public function setExcludedJournalIds(?array $excluded_journal_ids): void
    {
        $this->excluded_journal_ids = $excluded_journal_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getExcludedJournalIds(): ?array
    {
        return $this->excluded_journal_ids;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
