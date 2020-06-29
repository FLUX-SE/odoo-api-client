<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Import\Journal;

use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Ir\Sequence;
use Flux\OdooApiClient\Model\Object\Res\Company;

/**
 * Odoo model : account.bank.statement.import.journal.creation
 * Name : account.bank.statement.import.journal.creation
 * Info :
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
     * @var Journal
     */
    private $journal_id;

    /**
     * @param Journal $journal_id Journal
     * @param string $name Journal Name
     * @param string $code Short Code
     *        The journal entries of this journal will be named using this prefix.
     * @param array $type Type
     *        Select 'Sale' for customer invoices journals.
     *        Select 'Purchase' for vendor bills journals.
     *        Select 'Cash' or 'Bank' for journals that are used in customer or vendor payments.
     *        Select 'General' for miscellaneous operations journals.
     * @param Sequence $sequence_id Entry Sequence
     *        This field contains the information related to the numbering of the journal entries of this journal.
     * @param array $invoice_reference_type Communication Type
     *        You can set here the default communication that will appear on customer invoices, once validated, to help the
     *        customer to refer to that particular invoice when making the payment.
     * @param array $invoice_reference_model Communication Standard
     *        You can choose different models for each type of reference. The default one is the Odoo reference.
     * @param Company $company_id Company
     *        Company related to this journal
     */
    public function __construct(
        Journal $journal_id,
        string $name,
        string $code,
        array $type,
        Sequence $sequence_id,
        array $invoice_reference_type,
        array $invoice_reference_model,
        Company $company_id
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
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }
}
