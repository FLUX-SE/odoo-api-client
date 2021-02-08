<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Setup\Bank\Manual;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank;

/**
 * Odoo model : account.setup.bank.manual.config
 * ---
 * Name : account.setup.bank.manual.config
 * ---
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
    /**
     * Res Partner Bank
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $res_partner_bank_id;

    /**
     * New Journal Name
     * ---
     * Will be used to name the Journal related to this bank account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $new_journal_name;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $linked_journal_id;

    /**
     * Num Journals Without Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $num_journals_without_account;

    /**
     * @param OdooRelation $res_partner_bank_id Res Partner Bank
     *        ---
     *        Relation : many2one (res.partner.bank)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $new_journal_name New Journal Name
     *        ---
     *        Will be used to name the Journal related to this bank account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $acc_number Account Number
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Account Holder
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $res_partner_bank_id,
        string $new_journal_name,
        string $acc_number,
        OdooRelation $partner_id
    ) {
        $this->res_partner_bank_id = $res_partner_bank_id;
        $this->new_journal_name = $new_journal_name;
        parent::__construct($acc_number,$partner_id);
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("res_partner_bank_id")
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
     *
     * @SerializedName("new_journal_name")
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
     *
     * @SerializedName("linked_journal_id")
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
     * @return int|null
     *
     * @SerializedName("num_journals_without_account")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.setup.bank.manual.config';
    }
}
