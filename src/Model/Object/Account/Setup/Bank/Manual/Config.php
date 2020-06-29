<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Setup\Bank\Manual;

use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;

/**
 * Odoo model : account.setup.bank.manual.config
 * Name : account.setup.bank.manual.config
 * Info :
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
     * @var Bank
     */
    private $res_partner_bank_id;

    /**
     * New Journal Name
     * Will be used to name the Journal related to this bank account
     *
     * @var string
     */
    private $new_journal_name;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $linked_journal_id;

    /**
     * Code
     *
     * @var string
     */
    private $new_journal_code;

    /**
     * Num Journals Without Account
     *
     * @var null|int
     */
    private $num_journals_without_account;

    /**
     * Account Type
     *
     * @var null|array
     */
    private $related_acc_type;

    /**
     * @param Bank $res_partner_bank_id Res Partner Bank
     * @param string $new_journal_name New Journal Name
     *        Will be used to name the Journal related to this bank account
     * @param string $new_journal_code Code
     * @param string $acc_number Account Number
     * @param Partner $partner_id Account Holder
     */
    public function __construct(
        Bank $res_partner_bank_id,
        string $new_journal_name,
        string $new_journal_code,
        string $acc_number,
        Partner $partner_id
    ) {
        $this->res_partner_bank_id = $res_partner_bank_id;
        $this->new_journal_name = $new_journal_name;
        $this->new_journal_code = $new_journal_code;
        parent::__construct($acc_number, $partner_id);
    }

    /**
     * @param Bank $res_partner_bank_id
     */
    public function setResPartnerBankId(Bank $res_partner_bank_id): void
    {
        $this->res_partner_bank_id = $res_partner_bank_id;
    }

    /**
     * @param string $new_journal_name
     */
    public function setNewJournalName(string $new_journal_name): void
    {
        $this->new_journal_name = $new_journal_name;
    }

    /**
     * @param null|Journal $linked_journal_id
     */
    public function setLinkedJournalId(?Journal $linked_journal_id): void
    {
        $this->linked_journal_id = $linked_journal_id;
    }

    /**
     * @param string $new_journal_code
     */
    public function setNewJournalCode(string $new_journal_code): void
    {
        $this->new_journal_code = $new_journal_code;
    }

    /**
     * @param null|int $num_journals_without_account
     */
    public function setNumJournalsWithoutAccount(?int $num_journals_without_account): void
    {
        $this->num_journals_without_account = $num_journals_without_account;
    }

    /**
     * @return null|array
     */
    public function getRelatedAccType(): ?array
    {
        return $this->related_acc_type;
    }
}
