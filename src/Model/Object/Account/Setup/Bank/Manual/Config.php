<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Setup\Bank\Manual;

use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;

/**
 * Odoo model : account.setup.bank.manual.config
 * Name : account.setup.bank.manual.config
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Config extends Bank
{
    /**
     * Res Partner Bank
     *
     * @var null|Bank
     */
    private $res_partner_bank_id;

    /**
     * New Journal Name
     *
     * @var null|string
     */
    private $new_journal_name;

    /**
     * Journal
     *
     * @var Journal
     */
    private $linked_journal_id;

    /**
     * Code
     *
     * @var null|string
     */
    private $new_journal_code;

    /**
     * Num Journals Without Account
     *
     * @var int
     */
    private $num_journals_without_account;

    /**
     * Account Type
     *
     * @var array
     */
    private $related_acc_type;

    /**
     * @param null|Bank $res_partner_bank_id
     */
    public function setResPartnerBankId(Bank $res_partner_bank_id): void
    {
        $this->res_partner_bank_id = $res_partner_bank_id;
    }

    /**
     * @param null|string $new_journal_name
     */
    public function setNewJournalName(?string $new_journal_name): void
    {
        $this->new_journal_name = $new_journal_name;
    }

    /**
     * @param Journal $linked_journal_id
     */
    public function setLinkedJournalId(Journal $linked_journal_id): void
    {
        $this->linked_journal_id = $linked_journal_id;
    }

    /**
     * @param null|string $new_journal_code
     */
    public function setNewJournalCode(?string $new_journal_code): void
    {
        $this->new_journal_code = $new_journal_code;
    }

    /**
     * @param int $num_journals_without_account
     */
    public function setNumJournalsWithoutAccount(int $num_journals_without_account): void
    {
        $this->num_journals_without_account = $num_journals_without_account;
    }

    /**
     * @return array
     */
    public function getRelatedAccType(): array
    {
        return $this->related_acc_type;
    }
}
