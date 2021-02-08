<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move;

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
final class Line extends Move
{
    /**
     * Journal Entry
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $move_id;

    /**
     * Statement
     * ---
     * Relation : many2one (account.bank.statement)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $statement_id;

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
     * Transaction Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $transaction_type;

    /**
     * Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $payment_ref;

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
     * Foreign Currency
     * ---
     * The optional other currency if it is a multi-currency entry.
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $foreign_currency_id;

    /**
     * Auto-generated Payments
     * ---
     * Payments generated during the reconciliation of this bank statement lines.
     * ---
     * Relation : many2many (account.payment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_ids;

    /**
     * Is Reconciled
     * ---
     * Technical field indicating if the statement line is already reconciled.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_reconciled;

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
     * Online Transaction Identifier
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_transaction_identifier;

    /**
     * Online Partner Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_partner_information;

    /**
     * Online Account
     * ---
     * Relation : many2one (account.online.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Online\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $online_account_id;

    /**
     * Account Online Link
     * ---
     * Relation : many2one (account.online.link)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Online\Link
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $online_link_id;

    /**
     * @param OdooRelation $move_id Journal Entry
     *        ---
     *        Relation : many2one (account.move)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $statement_id Statement
     *        ---
     *        Relation : many2one (account.bank.statement)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $payment_ref Label
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation|null $currency_id Journal Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string|null $state Status
     *        ---
     *        The current state of your bank statement:- New: Fully editable with draft Journal Entries.- Processing: No
     *        longer editable with posted Journal entries, ready for the reconciliation.- Validated: All lines are
     *        reconciled. There is nothing left to process.
     *        ---
     *        Selection :
     *            -> open (New)
     *            -> posted (Processing)
     *            -> confirm (Validated)
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $move_type Type
     *        ---
     *        Selection :
     *            -> entry (Journal Entry)
     *            -> out_invoice (Customer Invoice)
     *            -> out_refund (Customer Credit Note)
     *            -> in_invoice (Vendor Bill)
     *            -> in_refund (Vendor Credit Note)
     *            -> out_receipt (Sales Receipt)
     *            -> in_receipt (Purchase Receipt)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $extract_state Extract state
     *        ---
     *        Selection :
     *            -> no_extract_requested (No extract requested)
     *            -> not_enough_credit (Not enough credit)
     *            -> error_status (An error occurred)
     *            -> waiting_extraction (Waiting extraction)
     *            -> extract_not_ready (waiting extraction, but it is not ready)
     *            -> waiting_validation (Waiting validation)
     *            -> done (Completed flow)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $move_id,
        OdooRelation $statement_id,
        string $payment_ref,
        ?OdooRelation $currency_id,
        ?string $state,
        DateTimeInterface $date,
        string $move_type,
        OdooRelation $journal_id,
        string $extract_state
    ) {
        $this->move_id = $move_id;
        $this->statement_id = $statement_id;
        $this->payment_ref = $payment_ref;
        parent::__construct( 
            $date, 
            $state, 
            $move_type, 
            $journal_id, 
            $currency_id, 
            $extract_state
        );
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
     * @param OdooRelation $item
     */
    public function addPaymentIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIds($item)) {
            return;
        }

        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        $this->payment_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentIds(OdooRelation $item): void
    {
        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        if ($this->hasPaymentIds($item)) {
            $index = array_search($item, $this->payment_ids);
            unset($this->payment_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_reconciled")
     */
    public function isIsReconciled(): ?bool
    {
        return $this->is_reconciled;
    }

    /**
     * @param bool|null $is_reconciled
     */
    public function setIsReconciled(?bool $is_reconciled): void
    {
        $this->is_reconciled = $is_reconciled;
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
     * @param string|null $online_partner_bank_account
     */
    public function setOnlinePartnerBankAccount(?string $online_partner_bank_account): void
    {
        $this->online_partner_bank_account = $online_partner_bank_account;
    }

    /**
     * @param OdooRelation[]|null $payment_ids
     */
    public function setPaymentIds(?array $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_transaction_identifier")
     */
    public function getOnlineTransactionIdentifier(): ?string
    {
        return $this->online_transaction_identifier;
    }

    /**
     * @param string|null $online_transaction_identifier
     */
    public function setOnlineTransactionIdentifier(?string $online_transaction_identifier): void
    {
        $this->online_transaction_identifier = $online_transaction_identifier;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_information")
     */
    public function getOnlinePartnerInformation(): ?string
    {
        return $this->online_partner_information;
    }

    /**
     * @param string|null $online_partner_information
     */
    public function setOnlinePartnerInformation(?string $online_partner_information): void
    {
        $this->online_partner_information = $online_partner_information;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("online_account_id")
     */
    public function getOnlineAccountId(): ?OdooRelation
    {
        return $this->online_account_id;
    }

    /**
     * @param OdooRelation|null $online_account_id
     */
    public function setOnlineAccountId(?OdooRelation $online_account_id): void
    {
        $this->online_account_id = $online_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("online_link_id")
     */
    public function getOnlineLinkId(): ?OdooRelation
    {
        return $this->online_link_id;
    }

    /**
     * @param OdooRelation|null $online_link_id
     */
    public function setOnlineLinkId(?OdooRelation $online_link_id): void
    {
        $this->online_link_id = $online_link_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentIds(OdooRelation $item): bool
    {
        if (null === $this->payment_ids) {
            return false;
        }

        return in_array($item, $this->payment_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("payment_ids")
     */
    public function getPaymentIds(): ?array
    {
        return $this->payment_ids;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("move_id")
     */
    public function getMoveId(): OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param string|null $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @param OdooRelation $move_id
     */
    public function setMoveId(OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
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
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @return string|null
     *
     * @SerializedName("partner_name")
     */
    public function getPartnerName(): ?string
    {
        return $this->partner_name;
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
     * @param OdooRelation|null $foreign_currency_id
     */
    public function setForeignCurrencyId(?OdooRelation $foreign_currency_id): void
    {
        $this->foreign_currency_id = $foreign_currency_id;
    }

    /**
     * @param string|null $transaction_type
     */
    public function setTransactionType(?string $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * @return string
     *
     * @SerializedName("payment_ref")
     */
    public function getPaymentRef(): string
    {
        return $this->payment_ref;
    }

    /**
     * @param string $payment_ref
     */
    public function setPaymentRef(string $payment_ref): void
    {
        $this->payment_ref = $payment_ref;
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
     * @SerializedName("foreign_currency_id")
     */
    public function getForeignCurrencyId(): ?OdooRelation
    {
        return $this->foreign_currency_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.bank.statement.line';
    }
}
