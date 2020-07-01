<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Transfer;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.transfer.model
 * Name : account.transfer.model
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
final class Model extends Base
{
    public const ODOO_MODEL_NAME = 'account.transfer.model';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Destination Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Start Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_start;

    /**
     * Stop Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_stop;

    /**
     * Frequency
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> month (Monthly)
     *     -> quarter (Quarterly)
     *     -> year (Yearly)
     *
     *
     * @var string
     */
    private $frequency;

    /**
     * Origin Accounts
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $account_ids;

    /**
     * Destination Accounts
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Generated Moves
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * Move Ids Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $move_ids_count;

    /**
     * Total Percent
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_percent;

    /**
     * State
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> disabled (Disabled)
     *     -> in_progress (Running)
     *
     *
     * @var string
     */
    private $state;

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
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Destination Journal
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_start Start Date
     *        Searchable : yes
     *        Sortable : yes
     * @param string $frequency Frequency
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> month (Monthly)
     *            -> quarter (Quarterly)
     *            -> year (Yearly)
     *
     * @param string $state State
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> disabled (Disabled)
     *            -> in_progress (Running)
     *
     */
    public function __construct(
        string $name,
        OdooRelation $journal_id,
        DateTimeInterface $date_start,
        string $frequency,
        string $state
    ) {
        $this->name = $name;
        $this->journal_id = $journal_id;
        $this->date_start = $date_start;
        $this->frequency = $frequency;
        $this->state = $state;
    }

    /**
     * @param float|null $total_percent
     */
    public function setTotalPercent(?float $total_percent): void
    {
        $this->total_percent = $total_percent;
    }

    /**
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveIds(OdooRelation $item): bool
    {
        if (null === $this->move_ids) {
            return false;
        }

        return in_array($item, $this->move_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeMoveIds(OdooRelation $item): void
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
     * @return int|null
     */
    public function getMoveIdsCount(): ?int
    {
        return $this->move_ids_count;
    }

    /**
     * @param int|null $move_ids_count
     */
    public function setMoveIdsCount(?int $move_ids_count): void
    {
        $this->move_ids_count = $move_ids_count;
    }

    /**
     * @return float|null
     */
    public function getTotalPercent(): ?float
    {
        return $this->total_percent;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
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
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMoveIds(): ?array
    {
        return $this->move_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param DateTimeInterface|null $date_stop
     */
    public function setDateStop(?DateTimeInterface $date_stop): void
    {
        $this->date_stop = $date_stop;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateStart(): DateTimeInterface
    {
        return $this->date_start;
    }

    /**
     * @param DateTimeInterface $date_start
     */
    public function setDateStart(DateTimeInterface $date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateStop(): ?DateTimeInterface
    {
        return $this->date_stop;
    }

    /**
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param string $frequency
     */
    public function setFrequency(string $frequency): void
    {
        $this->frequency = $frequency;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAccountIds(): ?array
    {
        return $this->account_ids;
    }

    /**
     * @param OdooRelation[]|null $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountIds(OdooRelation $item): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccountIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeAccountIds(OdooRelation $item): void
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
     * @return OdooRelation[]|null
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
