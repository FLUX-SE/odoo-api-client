<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.bank.statement.line
 * Name : account.bank.statement.line
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Line extends Base
{
    /**
     * Label
     *
     * @var string
     */
    private $name;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Journal's Currency
     * Utility field to express amount currency
     *
     * @var null|Currency
     */
    private $journal_currency_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Bank Account Number
     * Technical field used to store the bank account number before its creation, upon the line's processing
     *
     * @var null|string
     */
    private $account_number;

    /**
     * Bank Account
     * Bank account that was used in this transaction.
     *
     * @var null|Bank
     */
    private $bank_account_id;

    /**
     * Counterpart Account
     * This technical field can be used at the statement line creation/import time in order to avoid the
     * reconciliation process on it later on. The statement line will simply create a counterpart on this account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Statement
     *
     * @var Statement
     */
    private $statement_id;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Partner Name
     * This field is used to record the third party name when importing bank statement in electronic format, when the
     * partner doesn't exist yet in the database (or cannot be found).
     *
     * @var null|string
     */
    private $partner_name;

    /**
     * Reference
     *
     * @var null|string
     */
    private $ref;

    /**
     * Notes
     *
     * @var null|string
     */
    private $note;

    /**
     * Transaction Type
     *
     * @var null|string
     */
    private $transaction_type;

    /**
     * Sequence
     * Gives the sequence order when displaying a list of bank statement lines.
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Journal Items
     *
     * @var null|LineAlias[]
     */
    private $journal_entry_ids;

    /**
     * Amount Currency
     * The amount expressed in an optional other currency if it is a multi-currency entry.
     *
     * @var null|float
     */
    private $amount_currency;

    /**
     * Currency
     * The optional other currency if it is a multi-currency entry.
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Journal Entry Name
     * Technical field holding the number given to the journal entry, automatically set when the statement line is
     * reconciled then stored to set the same number again if the line is cancelled, set to draft and re-processed
     * again.
     *
     * @var null|string
     */
    private $move_name;

    /**
     * Import ID
     *
     * @var null|string
     */
    private $unique_import_id;

    /**
     * Online Identifier
     *
     * @var null|string
     */
    private $online_identifier;

    /**
     * Online Partner Vendor Name
     * Technical field used to store information from plaid/yodlee to match partner (used when a purchase is made)
     *
     * @var null|string
     */
    private $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     * Technical field used to store information from plaid/yodlee to match partner
     *
     * @var null|string
     */
    private $online_partner_bank_account;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Label
     * @param DateTimeInterface $date Date
     * @param Statement $statement_id Statement
     */
    public function __construct(string $name, DateTimeInterface $date, Statement $statement_id)
    {
        $this->name = $name;
        $this->date = $date;
        $this->statement_id = $statement_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|string
     */
    public function getOnlinePartnerBankAccount(): ?string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @return null|string
     */
    public function getOnlinePartnerVendorName(): ?string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param null|string $online_identifier
     */
    public function setOnlineIdentifier(?string $online_identifier): void
    {
        $this->online_identifier = $online_identifier;
    }

    /**
     * @return null|string
     */
    public function getUniqueImportId(): ?string
    {
        return $this->unique_import_id;
    }

    /**
     * @return null|string
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|float $amount_currency
     */
    public function setAmountCurrency(?float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return null|LineAlias[]
     */
    public function getJournalEntryIds(): ?array
    {
        return $this->journal_entry_ids;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $transaction_type
     */
    public function setTransactionType(?string $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param null|string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param null|string $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return null|Journal
     */
    public function getJournalId(): ?Journal
    {
        return $this->journal_id;
    }

    /**
     * @param Statement $statement_id
     */
    public function setStatementId(Statement $statement_id): void
    {
        $this->statement_id = $statement_id;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(?Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param null|Bank $bank_account_id
     */
    public function setBankAccountId(?Bank $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @param null|string $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return null|Currency
     */
    public function getJournalCurrencyId(): ?Currency
    {
        return $this->journal_currency_id;
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
