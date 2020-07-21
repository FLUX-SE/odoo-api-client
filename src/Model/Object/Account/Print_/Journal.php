<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Print_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.print.journal
 * Name : account.print.journal
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Journal extends Base
{
    /**
     * Entries Sorted by
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> date (Date)
     *     -> move_name (Journal Entry Number)
     *
     *
     * @var string
     */
    private $sort_selection;

    /**
     * Journals
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $journal_ids;

    /**
     * With Currency
     * Print Report with the currency column if the currency differs from the company currency.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $amount_currency;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Start Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_from;

    /**
     * End Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_to;

    /**
     * Target Moves
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> posted (All Posted Entries)
     *     -> all (All Entries)
     *
     *
     * @var string
     */
    private $target_move;

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
     * @param string $sort_selection Entries Sorted by
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> date (Date)
     *            -> move_name (Journal Entry Number)
     *       
     * @param OdooRelation[] $journal_ids Journals
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     * @param string $target_move Target Moves
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> posted (All Posted Entries)
     *            -> all (All Entries)
     *       
     */
    public function __construct(
        string $sort_selection,
        array $journal_ids,
        OdooRelation $company_id,
        string $target_move
    ) {
        $this->sort_selection = $sort_selection;
        $this->journal_ids = $journal_ids;
        $this->company_id = $company_id;
        $this->target_move = $target_move;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateTo(): ?DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param string $target_move
     */
    public function setTargetMove(string $target_move): void
    {
        $this->target_move = $target_move;
    }

    /**
     * @return string
     */
    public function getTargetMove(): string
    {
        return $this->target_move;
    }

    /**
     * @param DateTimeInterface|null $date_to
     */
    public function setDateTo(?DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param DateTimeInterface|null $date_from
     */
    public function setDateFrom(?DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return string
     */
    public function getSortSelection(): string
    {
        return $this->sort_selection;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateFrom(): ?DateTimeInterface
    {
        return $this->date_from;
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
     * @param bool|null $amount_currency
     */
    public function setAmountCurrency(?bool $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return bool|null
     */
    public function isAmountCurrency(): ?bool
    {
        return $this->amount_currency;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeJournalIds(OdooRelation $item): void
    {
        if ($this->hasJournalIds($item)) {
            $index = array_search($item, $this->journal_ids);
            unset($this->journal_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addJournalIds(OdooRelation $item): void
    {
        if ($this->hasJournalIds($item)) {
            return;
        }

        $this->journal_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasJournalIds(OdooRelation $item): bool
    {
        return in_array($item, $this->journal_ids);
    }

    /**
     * @param OdooRelation[] $journal_ids
     */
    public function setJournalIds(array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @return OdooRelation[]
     */
    public function getJournalIds(): array
    {
        return $this->journal_ids;
    }

    /**
     * @param string $sort_selection
     */
    public function setSortSelection(string $sort_selection): void
    {
        $this->sort_selection = $sort_selection;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.print.journal';
    }
}
