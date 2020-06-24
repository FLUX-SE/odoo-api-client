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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Journal's Currency
     *
     * @var Currency
     */
    private $journal_currency_id;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Bank Account Number
     *
     * @var string
     */
    private $account_number;

    /**
     * Bank Account
     *
     * @var Bank
     */
    private $bank_account_id;

    /**
     * Counterpart Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Statement
     *
     * @var null|Statement
     */
    private $statement_id;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Partner Name
     *
     * @var string
     */
    private $partner_name;

    /**
     * Reference
     *
     * @var string
     */
    private $ref;

    /**
     * Notes
     *
     * @var string
     */
    private $note;

    /**
     * Transaction Type
     *
     * @var string
     */
    private $transaction_type;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Journal Items
     *
     * @var LineAlias
     */
    private $journal_entry_ids;

    /**
     * Amount Currency
     *
     * @var float
     */
    private $amount_currency;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Journal Entry Name
     *
     * @var string
     */
    private $move_name;

    /**
     * Import ID
     *
     * @var string
     */
    private $unique_import_id;

    /**
     * Online Identifier
     *
     * @var string
     */
    private $online_identifier;

    /**
     * Online Partner Vendor Name
     *
     * @var string
     */
    private $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     *
     * @var string
     */
    private $online_partner_bank_account;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getOnlinePartnerBankAccount(): string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @return string
     */
    public function getOnlinePartnerVendorName(): string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param string $online_identifier
     */
    public function setOnlineIdentifier(string $online_identifier): void
    {
        $this->online_identifier = $online_identifier;
    }

    /**
     * @return string
     */
    public function getUniqueImportId(): string
    {
        return $this->unique_import_id;
    }

    /**
     * @return string
     */
    public function getMoveName(): string
    {
        return $this->move_name;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param float $amount_currency
     */
    public function setAmountCurrency(float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return LineAlias
     */
    public function getJournalEntryIds(): LineAlias
    {
        return $this->journal_entry_ids;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $transaction_type
     */
    public function setTransactionType(string $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param string $partner_name
     */
    public function setPartnerName(string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @param null|Statement $statement_id
     */
    public function setStatementId(Statement $statement_id): void
    {
        $this->statement_id = $statement_id;
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param Bank $bank_account_id
     */
    public function setBankAccountId(Bank $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @param string $account_number
     */
    public function setAccountNumber(string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return Currency
     */
    public function getJournalCurrencyId(): Currency
    {
        return $this->journal_currency_id;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
