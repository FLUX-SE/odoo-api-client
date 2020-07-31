<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Statement;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.bank.statement.line
 * ---
 * Name : account.bank.statement.line
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Line extends Base
{
    /**
     * Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Journal's Currency
     * ---
     * Utility field to express amount currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $journal_currency_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Bank Account Number
     * ---
     * Technical field used to store the bank account number before its creation, upon the line's processing
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_number;

    /**
     * Bank Account
     * ---
     * Bank account that was used in this transaction.
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $bank_account_id;

    /**
     * Counterpart Account
     * ---
     * This technical field can be used at the statement line creation/import time in order to avoid the
     * reconciliation process on it later on. The statement line will simply create a counterpart on this account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Statement
     * ---
     * Relation : many2one (account.bank.statement)
     * @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $statement_id;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Partner Name
     * ---
     * This field is used to record the third party name when importing bank statement in electronic format, when the
     * partner doesn't exist yet in the database (or cannot be found).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_name;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ref;

    /**
     * Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Transaction Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $transaction_type;

    /**
     * Sequence
     * ---
     * Gives the sequence order when displaying a list of bank statement lines.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Company
     * ---
     * Company related to this journal
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Journal Items
     * ---
     * Relation : one2many (account.move.line -> statement_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $journal_entry_ids;

    /**
     * Amount Currency
     * ---
     * The amount expressed in an optional other currency if it is a multi-currency entry.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_currency;

    /**
     * Currency
     * ---
     * The optional other currency if it is a multi-currency entry.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Status
     * ---
     * Selection :
     *     -> open (New)
     *     -> confirm (Validated)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $state;

    /**
     * Journal Entry Name
     * ---
     * Technical field holding the number given to the journal entry, automatically set when the statement line is
     * reconciled then stored to set the same number again if the line is cancelled, set to draft and re-processed
     * again.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_name;

    /**
     * Import ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $unique_import_id;

    /**
     * Online Identifier
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_identifier;

    /**
     * Online Partner Vendor Name
     * ---
     * Technical field used to store information from plaid/yodlee to match partner (used when a purchase is made)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     * ---
     * Technical field used to store information from plaid/yodlee to match partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_partner_bank_account;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Label
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $statement_id Statement
     *        ---
     *        Relation : many2one (account.bank.statement)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, DateTimeInterface $date, OdooRelation $statement_id)
    {
        $this->name = $name;
        $this->date = $date;
        $this->statement_id = $statement_id;
    }

    /**
     * @param string|null $unique_import_id
     */
    public function setUniqueImportId(?string $unique_import_id): void
    {
        $this->unique_import_id = $unique_import_id;
    }

    /**
     * @param OdooRelation[]|null $journal_entry_ids
     */
    public function setJournalEntryIds(?array $journal_entry_ids): void
    {
        $this->journal_entry_ids = $journal_entry_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasJournalEntryIds(OdooRelation $item): bool
    {
        if (null === $this->journal_entry_ids) {
            return false;
        }

        return in_array($item, $this->journal_entry_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addJournalEntryIds(OdooRelation $item): void
    {
        if ($this->hasJournalEntryIds($item)) {
            return;
        }

        if (null === $this->journal_entry_ids) {
            $this->journal_entry_ids = [];
        }

        $this->journal_entry_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeJournalEntryIds(OdooRelation $item): void
    {
        if (null === $this->journal_entry_ids) {
            $this->journal_entry_ids = [];
        }

        if ($this->hasJournalEntryIds($item)) {
            $index = array_search($item, $this->journal_entry_ids);
            unset($this->journal_entry_ids[$index]);
        }
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_currency")
     */
    public function getAmountCurrency(): ?float
    {
        return $this->amount_currency;
    }

    /**
     * @param float|null $amount_currency
     */
    public function setAmountCurrency(?float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_name")
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @param string|null $move_name
     */
    public function setMoveName(?string $move_name): void
    {
        $this->move_name = $move_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("unique_import_id")
     */
    public function getUniqueImportId(): ?string
    {
        return $this->unique_import_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_identifier")
     */
    public function getOnlineIdentifier(): ?string
    {
        return $this->online_identifier;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $online_identifier
     */
    public function setOnlineIdentifier(?string $online_identifier): void
    {
        $this->online_identifier = $online_identifier;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_vendor_name")
     */
    public function getOnlinePartnerVendorName(): ?string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param string|null $online_partner_vendor_name
     */
    public function setOnlinePartnerVendorName(?string $online_partner_vendor_name): void
    {
        $this->online_partner_vendor_name = $online_partner_vendor_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_bank_account")
     */
    public function getOnlinePartnerBankAccount(): ?string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @param string|null $online_partner_bank_account
     */
    public function setOnlinePartnerBankAccount(?string $online_partner_bank_account): void
    {
        $this->online_partner_bank_account = $online_partner_bank_account;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("journal_entry_ids")
     */
    public function getJournalEntryIds(): ?array
    {
        return $this->journal_entry_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_id")
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date")
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount")
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_currency_id")
     */
    public function getJournalCurrencyId(): ?OdooRelation
    {
        return $this->journal_currency_id;
    }

    /**
     * @param OdooRelation|null $journal_currency_id
     */
    public function setJournalCurrencyId(?OdooRelation $journal_currency_id): void
    {
        $this->journal_currency_id = $journal_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_number")
     */
    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    /**
     * @param string|null $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("bank_account_id")
     */
    public function getBankAccountId(): ?OdooRelation
    {
        return $this->bank_account_id;
    }

    /**
     * @param OdooRelation|null $bank_account_id
     */
    public function setBankAccountId(?OdooRelation $bank_account_id): void
    {
        $this->bank_account_id = $bank_account_id;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("statement_id")
     */
    public function getStatementId(): OdooRelation
    {
        return $this->statement_id;
    }

    /**
     * @param OdooRelation $statement_id
     */
    public function setStatementId(OdooRelation $statement_id): void
    {
        $this->statement_id = $statement_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_name")
     */
    public function getPartnerName(): ?string
    {
        return $this->partner_name;
    }

    /**
     * @param string|null $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ref")
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return string|null
     *
     * @SerializedName("transaction_type")
     */
    public function getTransactionType(): ?string
    {
        return $this->transaction_type;
    }

    /**
     * @param string|null $transaction_type
     */
    public function setTransactionType(?string $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.bank.statement.line';
    }
}
