<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Import\Journal;

use Flux\OdooApiClient\Model\Object\Account\Journal;

/**
 * Odoo model : account.bank.statement.import.journal.creation
 * Name : account.bank.statement.import.journal.creation
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Creation extends Journal
{
    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }
}
