<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Import\Journal;

use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.bank.statement.import.journal.creation
 * ---
 * Name : account.bank.statement.import.journal.creation
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Creation extends Journal
{
    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Short Code
     *        ---
     *        The journal entries of this journal will be named using this prefix.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        Select 'Sale' for customer invoices journals.
     *        Select 'Purchase' for vendor bills journals.
     *        Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     *        Select 'General' for miscellaneous operations journals.
     *        ---
     *        Selection :
     *            -> sale (Sales)
     *            -> purchase (Purchase)
     *            -> cash (Cash)
     *            -> bank (Bank)
     *            -> general (Miscellaneous)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sequence_id Entry Sequence
     *        ---
     *        This field contains the information related to the numbering of the journal entries of this journal.
     *        ---
     *        Relation : many2one (ir.sequence)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_type Communication Type
     *        ---
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     *        ---
     *        Selection :
     *            -> none (Free)
     *            -> partner (Based on Customer)
     *            -> invoice (Based on Invoice)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_model Communication Standard
     *        ---
     *        You can choose different models for each type of reference. The default one is the Odoo reference.
     *        ---
     *        Selection :
     *            -> odoo (Odoo)
     *            -> euro (European)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Company related to this journal
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Journal Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $journal_id,
        string $code,
        string $type,
        OdooRelation $sequence_id,
        string $invoice_reference_type,
        string $invoice_reference_model,
        OdooRelation $company_id,
        string $name
    ) {
        $this->journal_id = $journal_id;
        parent::__construct(
            $code,
            $type,
            $sequence_id,
            $invoice_reference_type,
            $invoice_reference_model,
            $company_id,
            $name
        );
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("journal_id")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.bank.statement.import.journal.creation';
    }
}
