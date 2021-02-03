<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.payment.register
 * ---
 * Name : account.payment.register
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Register extends Base
{
    /**
     * Payment Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $payment_date;

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
     * Memo
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $communication;

    /**
     * Group Payments
     * ---
     * Only one payment will be created by partner (bank)/ currency.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_payment;

    /**
     * Currency
     * ---
     * The payment's currency.
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
     * Recipient Bank Account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_bank_id;

    /**
     * Company Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Journal items
     * ---
     * Relation : many2many (account.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

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
     * @var string|null
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
     * @var string|null
     */
    private $partner_type;

    /**
     * Amount to Pay (company currency)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $source_amount;

    /**
     * Amount to Pay (foreign currency)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $source_amount_currency;

    /**
     * Source Currency
     * ---
     * The payment's currency.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_currency_id;

    /**
     * Can Edit Wizard
     * ---
     * Technical field used to indicate the user can edit the wizard content such as the amount.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $can_edit_wizard;

    /**
     * Can Group Payments
     * ---
     * Technical field used to indicate the user can see the 'group_payments' box.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $can_group_payments;

    /**
     * Company
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
     * Customer/Vendor
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
     * Payment Difference
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $payment_difference;

    /**
     * Payment Difference Handling
     * ---
     * Selection :
     *     -> open (Keep open)
     *     -> reconcile (Mark as fully paid)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_difference_handling;

    /**
     * Difference Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $writeoff_account_id;

    /**
     * Journal Item Label
     * ---
     * Change label of the counterpart that will hold the payment difference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $writeoff_label;

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
     * Country Code
     * ---
     * The ISO country code in two chars. 
     * You can use this field for quick search.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $country_code;

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
     * Suitable Payment Token Partner
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $suitable_payment_token_partner_ids;

    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $payment_method_code;

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
     * @param DateTimeInterface $payment_date Payment Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $payment_date)
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_difference_handling")
     */
    public function getPaymentDifferenceHandling(): ?string
    {
        return $this->payment_difference_handling;
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
     * @SerializedName("show_partner_bank_account")
     */
    public function isShowPartnerBankAccount(): ?bool
    {
        return $this->show_partner_bank_account;
    }

    /**
     * @param string|null $writeoff_label
     */
    public function setWriteoffLabel(?string $writeoff_label): void
    {
        $this->writeoff_label = $writeoff_label;
    }

    /**
     * @return string|null
     *
     * @SerializedName("writeoff_label")
     */
    public function getWriteoffLabel(): ?string
    {
        return $this->writeoff_label;
    }

    /**
     * @param OdooRelation|null $writeoff_account_id
     */
    public function setWriteoffAccountId(?OdooRelation $writeoff_account_id): void
    {
        $this->writeoff_account_id = $writeoff_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("writeoff_account_id")
     */
    public function getWriteoffAccountId(): ?OdooRelation
    {
        return $this->writeoff_account_id;
    }

    /**
     * @param string|null $payment_difference_handling
     */
    public function setPaymentDifferenceHandling(?string $payment_difference_handling): void
    {
        $this->payment_difference_handling = $payment_difference_handling;
    }

    /**
     * @param float|null $payment_difference
     */
    public function setPaymentDifference(?float $payment_difference): void
    {
        $this->payment_difference = $payment_difference;
    }

    /**
     * @param bool|null $require_partner_bank_account
     */
    public function setRequirePartnerBankAccount(?bool $require_partner_bank_account): void
    {
        $this->require_partner_bank_account = $require_partner_bank_account;
    }

    /**
     * @return float|null
     *
     * @SerializedName("payment_difference")
     */
    public function getPaymentDifference(): ?float
    {
        return $this->payment_difference;
    }

    /**
     * @param bool|null $hide_payment_method
     */
    public function setHidePaymentMethod(?bool $hide_payment_method): void
    {
        $this->hide_payment_method = $hide_payment_method;
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
     * @param OdooRelation[]|null $available_payment_method_ids
     */
    public function setAvailablePaymentMethodIds(?array $available_payment_method_ids): void
    {
        $this->available_payment_method_ids = $available_payment_method_ids;
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
     * @return string|null
     *
     * @SerializedName("country_code")
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    /**
     * @param OdooRelation|null $payment_method_id
     */
    public function setPaymentMethodId(?OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param string|null $payment_method_code
     */
    public function setPaymentMethodCode(?string $payment_method_code): void
    {
        $this->payment_method_code = $payment_method_code;
    }

    /**
     * @param string|null $country_code
     */
    public function setCountryCode(?string $country_code): void
    {
        $this->country_code = $country_code;
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
     * @param OdooRelation $item
     */
    public function removeSuitablePaymentTokenPartnerIds(OdooRelation $item): void
    {
        if (null === $this->suitable_payment_token_partner_ids) {
            $this->suitable_payment_token_partner_ids = [];
        }

        if ($this->hasSuitablePaymentTokenPartnerIds($item)) {
            $index = array_search($item, $this->suitable_payment_token_partner_ids);
            unset($this->suitable_payment_token_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSuitablePaymentTokenPartnerIds(OdooRelation $item): void
    {
        if ($this->hasSuitablePaymentTokenPartnerIds($item)) {
            return;
        }

        if (null === $this->suitable_payment_token_partner_ids) {
            $this->suitable_payment_token_partner_ids = [];
        }

        $this->suitable_payment_token_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSuitablePaymentTokenPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->suitable_payment_token_partner_ids) {
            return false;
        }

        return in_array($item, $this->suitable_payment_token_partner_ids);
    }

    /**
     * @param OdooRelation[]|null $suitable_payment_token_partner_ids
     */
    public function setSuitablePaymentTokenPartnerIds(?array $suitable_payment_token_partner_ids): void
    {
        $this->suitable_payment_token_partner_ids = $suitable_payment_token_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("suitable_payment_token_partner_ids")
     */
    public function getSuitablePaymentTokenPartnerIds(): ?array
    {
        return $this->suitable_payment_token_partner_ids;
    }

    /**
     * @param OdooRelation|null $payment_token_id
     */
    public function setPaymentTokenId(?OdooRelation $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("available_payment_method_ids")
     */
    public function getAvailablePaymentMethodIds(): ?array
    {
        return $this->available_payment_method_ids;
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
     * @return DateTimeInterface
     *
     * @SerializedName("payment_date")
     */
    public function getPaymentDate(): DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_currency_id")
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @param OdooRelation|null $partner_bank_id
     */
    public function setPartnerBankId(?OdooRelation $partner_bank_id): void
    {
        $this->partner_bank_id = $partner_bank_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_bank_id")
     */
    public function getPartnerBankId(): ?OdooRelation
    {
        return $this->partner_bank_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param bool|null $group_payment
     */
    public function setGroupPayment(?bool $group_payment): void
    {
        $this->group_payment = $group_payment;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("group_payment")
     */
    public function isGroupPayment(): ?bool
    {
        return $this->group_payment;
    }

    /**
     * @param string|null $communication
     */
    public function setCommunication(?string $communication): void
    {
        $this->communication = $communication;
    }

    /**
     * @return string|null
     *
     * @SerializedName("communication")
     */
    public function getCommunication(): ?string
    {
        return $this->communication;
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
     * @SerializedName("amount")
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation|null $source_currency_id
     */
    public function setSourceCurrencyId(?OdooRelation $source_currency_id): void
    {
        $this->source_currency_id = $source_currency_id;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param bool|null $can_group_payments
     */
    public function setCanGroupPayments(?bool $can_group_payments): void
    {
        $this->can_group_payments = $can_group_payments;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_group_payments")
     */
    public function isCanGroupPayments(): ?bool
    {
        return $this->can_group_payments;
    }

    /**
     * @param bool|null $can_edit_wizard
     */
    public function setCanEditWizard(?bool $can_edit_wizard): void
    {
        $this->can_edit_wizard = $can_edit_wizard;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_edit_wizard")
     */
    public function isCanEditWizard(): ?bool
    {
        return $this->can_edit_wizard;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("source_currency_id")
     */
    public function getSourceCurrencyId(): ?OdooRelation
    {
        return $this->source_currency_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param float|null $source_amount_currency
     */
    public function setSourceAmountCurrency(?float $source_amount_currency): void
    {
        $this->source_amount_currency = $source_amount_currency;
    }

    /**
     * @return float|null
     *
     * @SerializedName("source_amount_currency")
     */
    public function getSourceAmountCurrency(): ?float
    {
        return $this->source_amount_currency;
    }

    /**
     * @param float|null $source_amount
     */
    public function setSourceAmount(?float $source_amount): void
    {
        $this->source_amount = $source_amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("source_amount")
     */
    public function getSourceAmount(): ?float
    {
        return $this->source_amount;
    }

    /**
     * @param string|null $partner_type
     */
    public function setPartnerType(?string $partner_type): void
    {
        $this->partner_type = $partner_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_type")
     */
    public function getPartnerType(): ?string
    {
        return $this->partner_type;
    }

    /**
     * @param string|null $payment_type
     */
    public function setPaymentType(?string $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_type")
     */
    public function getPaymentType(): ?string
    {
        return $this->payment_type;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.payment.register';
    }
}
