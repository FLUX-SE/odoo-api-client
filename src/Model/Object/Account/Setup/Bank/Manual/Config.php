<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Setup\Bank\Manual;

use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.setup.bank.manual.config
 * Name : account.setup.bank.manual.config
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Config extends Bank
{
    public const ODOO_MODEL_NAME = 'account.setup.bank.manual.config';

    /**
     * Res Partner Bank
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $res_partner_bank_id;

    /**
     * New Journal Name
     * Will be used to name the Journal related to this bank account
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $new_journal_name;

    /**
     * Journal
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $linked_journal_id;

    /**
     * Code
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $new_journal_code;

    /**
     * Num Journals Without Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $num_journals_without_account;

    /**
     * Account Type
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> bank (Normal)
     *     -> iban (IBAN)
     *
     *
     * @var string|null
     */
    private $related_acc_type;

    /**
     * @param OdooRelation $res_partner_bank_id Res Partner Bank
     *        Searchable : yes
     *        Sortable : yes
     * @param string $new_journal_name New Journal Name
     *        Will be used to name the Journal related to this bank account
     *        Searchable : yes
     *        Sortable : yes
     * @param string $new_journal_code Code
     *        Searchable : yes
     *        Sortable : yes
     * @param string $acc_number Account Number
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Account Holder
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $res_partner_bank_id,
        string $new_journal_name,
        string $new_journal_code,
        string $acc_number,
        OdooRelation $partner_id
    ) {
        $this->res_partner_bank_id = $res_partner_bank_id;
        $this->new_journal_name = $new_journal_name;
        $this->new_journal_code = $new_journal_code;
        parent::__construct($acc_number, $partner_id);
    }

    /**
     * @return OdooRelation
     */
    public function getResPartnerBankId(): OdooRelation
    {
        return $this->res_partner_bank_id;
    }

    /**
     * @param OdooRelation $res_partner_bank_id
     */
    public function setResPartnerBankId(OdooRelation $res_partner_bank_id): void
    {
        $this->res_partner_bank_id = $res_partner_bank_id;
    }

    /**
     * @return string
     */
    public function getNewJournalName(): string
    {
        return $this->new_journal_name;
    }

    /**
     * @param string $new_journal_name
     */
    public function setNewJournalName(string $new_journal_name): void
    {
        $this->new_journal_name = $new_journal_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLinkedJournalId(): ?OdooRelation
    {
        return $this->linked_journal_id;
    }

    /**
     * @param OdooRelation|null $linked_journal_id
     */
    public function setLinkedJournalId(?OdooRelation $linked_journal_id): void
    {
        $this->linked_journal_id = $linked_journal_id;
    }

    /**
     * @return string
     */
    public function getNewJournalCode(): string
    {
        return $this->new_journal_code;
    }

    /**
     * @param string $new_journal_code
     */
    public function setNewJournalCode(string $new_journal_code): void
    {
        $this->new_journal_code = $new_journal_code;
    }

    /**
     * @return int|null
     */
    public function getNumJournalsWithoutAccount(): ?int
    {
        return $this->num_journals_without_account;
    }

    /**
     * @param int|null $num_journals_without_account
     */
    public function setNumJournalsWithoutAccount(?int $num_journals_without_account): void
    {
        $this->num_journals_without_account = $num_journals_without_account;
    }

    /**
     * @return string|null
     */
    public function getRelatedAccType(): ?string
    {
        return $this->related_acc_type;
    }

    /**
     * @param string|null $related_acc_type
     */
    public function setRelatedAccType(?string $related_acc_type): void
    {
        $this->related_acc_type = $related_acc_type;
    }
}
