<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Import\Journal;

use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.bank.statement.import.journal.creation
 * Name : account.bank.statement.import.journal.creation
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
    public const ODOO_MODEL_NAME = 'account.bank.statement.import.journal.creation';

    /**
     * Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * @param OdooRelation $journal_id Journal
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Journal Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Short Code
     *        The journal entries of this journal will be named using this prefix.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        Select 'Sale' for customer invoices journals.
     *        Select 'Purchase' for vendor bills journals.
     *        Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     *        Select 'General' for miscellaneous operations journals.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> sale (Sales)
     *            -> purchase (Purchase)
     *            -> cash (Cash)
     *            -> bank (Bank)
     *            -> general (Miscellaneous)
     *
     * @param OdooRelation $sequence_id Entry Sequence
     *        This field contains the information related to the numbering of the journal entries of this journal.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $invoice_reference_type Communication Type
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> none (Free)
     *            -> partner (Based on Customer)
     *            -> invoice (Based on Invoice)
     *
     * @param string $invoice_reference_model Communication Standard
     *        You can choose different models for each type of reference. The default one is the Odoo reference.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> odoo (Odoo)
     *            -> euro (European)
     *
     * @param OdooRelation $company_id Company
     *        Company related to this journal
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $journal_id,
        string $name,
        string $code,
        string $type,
        OdooRelation $sequence_id,
        string $invoice_reference_type,
        string $invoice_reference_model,
        OdooRelation $company_id
    ) {
        $this->journal_id = $journal_id;
        parent::__construct(
            $name,
            $code,
            $type,
            $sequence_id,
            $invoice_reference_type,
            $invoice_reference_model,
            $company_id
        );
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
}
