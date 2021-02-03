<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.payment
 * ---
 * Name : account.payment
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
final class Payment extends Move
{
    /**
     * Journal Entry
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $move_id;

    /**
     * Is Reconciled
     * ---
     * Technical field indicating if the payment is already reconciled.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_reconciled;

    /**
     * Is Matched With a Bank Statement
     * ---
     * Technical field indicating if the payment has been matched with a statement line.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_matched;

    /**
     * Is Internal Transfer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_internal_transfer;

    /**
     * QR Code
     * ---
     * QR-code report URL to use to generate the QR-code to scan with a banking app to perform this payment.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $qr_code;

    /**
     * Payment Method
     * ---
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Check: Pay bill by check and print it from Odoo.
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     * deposit.To enable batch deposit, module account_batch_payment must be installed.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     * transfer, module account_sepa must be installed 
     * ---
     * Relation : many2one (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_method_id;

    /**
     * Available Payment Method
     * ---
     * Relation : many2many (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $available_payment_method_ids;

    /**
     * Hide Payment Method
     * ---
     * Technical field used to hide the payment method if the selected journal has only one available which is
     * 'manual'
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_payment_method;

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
     * Payment Type
     * ---
     * Selection :
     *     -> outbound (Send Money)
     *     -> inbound (Receive Money)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $payment_type;

    /**
     * Partner Type
     * ---
     * Selection :
     *     -> customer (Customer)
     *     -> supplier (Vendor)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $partner_type;

    /**
     * Destination Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $destination_account_id;

    /**
     * Reconciled Invoices
     * ---
     * Invoices whose journal items have been reconciled with these payments.
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reconciled_invoice_ids;

    /**
     * # Reconciled Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $reconciled_invoices_count;

    /**
     * Reconciled Bills
     * ---
     * Invoices whose journal items have been reconciled with these payments.
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reconciled_bill_ids;

    /**
     * # Reconciled Bills
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $reconciled_bills_count;

    /**
     * Reconciled Statements
     * ---
     * Statements matched to this payment
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $reconciled_statement_ids;

    /**
     * # Reconciled Statements
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $reconciled_statements_count;

    /**
     * Code
     * ---
     * Technical field used to adapt the interface to the payment type selected.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $payment_method_code;

    /**
     * Show Partner Bank Account
     * ---
     * Technical field used to know whether the field `partner_bank_id` needs to be displayed or not in the payments
     * form views
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_partner_bank_account;

    /**
     * Require Partner Bank Account
     * ---
     * Technical field used to know whether the field `partner_bank_id` needs to be required or not in the payments
     * form views
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $require_partner_bank_account;

    /**
     * Payment Transaction
     * ---
     * Relation : many2one (payment.transaction)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Transaction
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_transaction_id;

    /**
     * Saved payment token
     * ---
     * Note that tokens from acquirers set to only authorize transactions (instead of capturing the amount) are not
     * available.
     * ---
     * Relation : many2one (payment.token)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_token_id;

    /**
     * Related Partner
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $related_partner_ids;

    /**
     * @param OdooRelation $move_id Journal Entry
     *        ---
     *        Relation : many2one (account.move)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Move
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $payment_type Payment Type
     *        ---
     *        Selection :
     *            -> outbound (Send Money)
     *            -> inbound (Receive Money)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $partner_type Partner Type
     *        ---
     *        Selection :
     *            -> customer (Customer)
     *            -> supplier (Vendor)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        ---
     *        Selection :
     *            -> draft (Draft)
     *            -> posted (Posted)
     *            -> cancel (Cancelled)
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
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
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
        string $payment_type,
        string $partner_type,
        DateTimeInterface $date,
        string $state,
        string $move_type,
        OdooRelation $journal_id,
        string $extract_state
    ) {
        $this->move_id = $move_id;
        $this->payment_type = $payment_type;
        $this->partner_type = $partner_type;
        parent::__construct(
            $date, 
            $state, 
            $move_type, 
            $journal_id, 
            $extract_state
        );
    }

    /**
     * @param int|null $reconciled_statements_count
     */
    public function setReconciledStatementsCount(?int $reconciled_statements_count): void
    {
        $this->reconciled_statements_count = $reconciled_statements_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("reconciled_bill_ids")
     */
    public function getReconciledBillIds(): ?array
    {
        return $this->reconciled_bill_ids;
    }

    /**
     * @param OdooRelation[]|null $reconciled_bill_ids
     */
    public function setReconciledBillIds(?array $reconciled_bill_ids): void
    {
        $this->reconciled_bill_ids = $reconciled_bill_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReconciledBillIds(OdooRelation $item): bool
    {
        if (null === $this->reconciled_bill_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_bill_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addReconciledBillIds(OdooRelation $item): void
    {
        if ($this->hasReconciledBillIds($item)) {
            return;
        }

        if (null === $this->reconciled_bill_ids) {
            $this->reconciled_bill_ids = [];
        }

        $this->reconciled_bill_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReconciledBillIds(OdooRelation $item): void
    {
        if (null === $this->reconciled_bill_ids) {
            $this->reconciled_bill_ids = [];
        }

        if ($this->hasReconciledBillIds($item)) {
            $index = array_search($item, $this->reconciled_bill_ids);
            unset($this->reconciled_bill_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("reconciled_bills_count")
     */
    public function getReconciledBillsCount(): ?int
    {
        return $this->reconciled_bills_count;
    }

    /**
     * @param int|null $reconciled_bills_count
     */
    public function setReconciledBillsCount(?int $reconciled_bills_count): void
    {
        $this->reconciled_bills_count = $reconciled_bills_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("reconciled_statement_ids")
     */
    public function getReconciledStatementIds(): ?array
    {
        return $this->reconciled_statement_ids;
    }

    /**
     * @param OdooRelation[]|null $reconciled_statement_ids
     */
    public function setReconciledStatementIds(?array $reconciled_statement_ids): void
    {
        $this->reconciled_statement_ids = $reconciled_statement_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReconciledStatementIds(OdooRelation $item): bool
    {
        if (null === $this->reconciled_statement_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_statement_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addReconciledStatementIds(OdooRelation $item): void
    {
        if ($this->hasReconciledStatementIds($item)) {
            return;
        }

        if (null === $this->reconciled_statement_ids) {
            $this->reconciled_statement_ids = [];
        }

        $this->reconciled_statement_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReconciledStatementIds(OdooRelation $item): void
    {
        if (null === $this->reconciled_statement_ids) {
            $this->reconciled_statement_ids = [];
        }

        if ($this->hasReconciledStatementIds($item)) {
            $index = array_search($item, $this->reconciled_statement_ids);
            unset($this->reconciled_statement_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("reconciled_statements_count")
     */
    public function getReconciledStatementsCount(): ?int
    {
        return $this->reconciled_statements_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_method_code")
     */
    public function getPaymentMethodCode(): ?string
    {
        return $this->payment_method_code;
    }

    /**
     * @return int|null
     *
     * @SerializedName("reconciled_invoices_count")
     */
    public function getReconciledInvoicesCount(): ?int
    {
        return $this->reconciled_invoices_count;
    }

    /**
     * @param string|null $payment_method_code
     */
    public function setPaymentMethodCode(?string $payment_method_code): void
    {
        $this->payment_method_code = $payment_method_code;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_partner_bank_account")
     */
    public function isShowPartnerBankAccount(): ?bool
    {
        return $this->show_partner_bank_account;
    }

    /**
     * @param bool|null $show_partner_bank_account
     */
    public function setShowPartnerBankAccount(?bool $show_partner_bank_account): void
    {
        $this->show_partner_bank_account = $show_partner_bank_account;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("require_partner_bank_account")
     */
    public function isRequirePartnerBankAccount(): ?bool
    {
        return $this->require_partner_bank_account;
    }

    /**
     * @param bool|null $require_partner_bank_account
     */
    public function setRequirePartnerBankAccount(?bool $require_partner_bank_account): void
    {
        $this->require_partner_bank_account = $require_partner_bank_account;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_transaction_id")
     */
    public function getPaymentTransactionId(): ?OdooRelation
    {
        return $this->payment_transaction_id;
    }

    /**
     * @param OdooRelation|null $payment_transaction_id
     */
    public function setPaymentTransactionId(?OdooRelation $payment_transaction_id): void
    {
        $this->payment_transaction_id = $payment_transaction_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_token_id")
     */
    public function getPaymentTokenId(): ?OdooRelation
    {
        return $this->payment_token_id;
    }

    /**
     * @param OdooRelation|null $payment_token_id
     */
    public function setPaymentTokenId(?OdooRelation $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("related_partner_ids")
     */
    public function getRelatedPartnerIds(): ?array
    {
        return $this->related_partner_ids;
    }

    /**
     * @param OdooRelation[]|null $related_partner_ids
     */
    public function setRelatedPartnerIds(?array $related_partner_ids): void
    {
        $this->related_partner_ids = $related_partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRelatedPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->related_partner_ids) {
            return false;
        }

        return in_array($item, $this->related_partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRelatedPartnerIds(OdooRelation $item): void
    {
        if ($this->hasRelatedPartnerIds($item)) {
            return;
        }

        if (null === $this->related_partner_ids) {
            $this->related_partner_ids = [];
        }

        $this->related_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRelatedPartnerIds(OdooRelation $item): void
    {
        if (null === $this->related_partner_ids) {
            $this->related_partner_ids = [];
        }

        if ($this->hasRelatedPartnerIds($item)) {
            $index = array_search($item, $this->related_partner_ids);
            unset($this->related_partner_ids[$index]);
        }
    }

    /**
     * @param int|null $reconciled_invoices_count
     */
    public function setReconciledInvoicesCount(?int $reconciled_invoices_count): void
    {
        $this->reconciled_invoices_count = $reconciled_invoices_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeReconciledInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->reconciled_invoice_ids) {
            $this->reconciled_invoice_ids = [];
        }

        if ($this->hasReconciledInvoiceIds($item)) {
            $index = array_search($item, $this->reconciled_invoice_ids);
            unset($this->reconciled_invoice_ids[$index]);
        }
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAvailablePaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->available_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->available_payment_method_ids);
    }

    /**
     * @param OdooRelation $move_id
     */
    public function setMoveId(OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
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
     * @return bool|null
     *
     * @SerializedName("is_matched")
     */
    public function isIsMatched(): ?bool
    {
        return $this->is_matched;
    }

    /**
     * @param bool|null $is_matched
     */
    public function setIsMatched(?bool $is_matched): void
    {
        $this->is_matched = $is_matched;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_internal_transfer")
     */
    public function isIsInternalTransfer(): ?bool
    {
        return $this->is_internal_transfer;
    }

    /**
     * @param bool|null $is_internal_transfer
     */
    public function setIsInternalTransfer(?bool $is_internal_transfer): void
    {
        $this->is_internal_transfer = $is_internal_transfer;
    }

    /**
     * @return string|null
     *
     * @SerializedName("qr_code")
     */
    public function getQrCode(): ?string
    {
        return $this->qr_code;
    }

    /**
     * @param string|null $qr_code
     */
    public function setQrCode(?string $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_method_id")
     */
    public function getPaymentMethodId(): ?OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @param OdooRelation|null $payment_method_id
     */
    public function setPaymentMethodId(?OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("available_payment_method_ids")
     */
    public function getAvailablePaymentMethodIds(): ?array
    {
        return $this->available_payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $available_payment_method_ids
     */
    public function setAvailablePaymentMethodIds(?array $available_payment_method_ids): void
    {
        $this->available_payment_method_ids = $available_payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAvailablePaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasAvailablePaymentMethodIds($item)) {
            return;
        }

        if (null === $this->available_payment_method_ids) {
            $this->available_payment_method_ids = [];
        }

        $this->available_payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function addReconciledInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasReconciledInvoiceIds($item)) {
            return;
        }

        if (null === $this->reconciled_invoice_ids) {
            $this->reconciled_invoice_ids = [];
        }

        $this->reconciled_invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAvailablePaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->available_payment_method_ids) {
            $this->available_payment_method_ids = [];
        }

        if ($this->hasAvailablePaymentMethodIds($item)) {
            $index = array_search($item, $this->available_payment_method_ids);
            unset($this->available_payment_method_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hide_payment_method")
     */
    public function isHidePaymentMethod(): ?bool
    {
        return $this->hide_payment_method;
    }

    /**
     * @param bool|null $hide_payment_method
     */
    public function setHidePaymentMethod(?bool $hide_payment_method): void
    {
        $this->hide_payment_method = $hide_payment_method;
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
     * @return string
     *
     * @SerializedName("payment_type")
     */
    public function getPaymentType(): string
    {
        return $this->payment_type;
    }

    /**
     * @param string $payment_type
     */
    public function setPaymentType(string $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return string
     *
     * @SerializedName("partner_type")
     */
    public function getPartnerType(): string
    {
        return $this->partner_type;
    }

    /**
     * @param string $partner_type
     */
    public function setPartnerType(string $partner_type): void
    {
        $this->partner_type = $partner_type;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("destination_account_id")
     */
    public function getDestinationAccountId(): ?OdooRelation
    {
        return $this->destination_account_id;
    }

    /**
     * @param OdooRelation|null $destination_account_id
     */
    public function setDestinationAccountId(?OdooRelation $destination_account_id): void
    {
        $this->destination_account_id = $destination_account_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("reconciled_invoice_ids")
     */
    public function getReconciledInvoiceIds(): ?array
    {
        return $this->reconciled_invoice_ids;
    }

    /**
     * @param OdooRelation[]|null $reconciled_invoice_ids
     */
    public function setReconciledInvoiceIds(?array $reconciled_invoice_ids): void
    {
        $this->reconciled_invoice_ids = $reconciled_invoice_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReconciledInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->reconciled_invoice_ids) {
            return false;
        }

        return in_array($item, $this->reconciled_invoice_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.payment';
    }
}
