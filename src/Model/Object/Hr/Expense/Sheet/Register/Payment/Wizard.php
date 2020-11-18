<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Expense\Sheet\Register\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.expense.sheet.register.payment.wizard
 * ---
 * Name : hr.expense.sheet.register.payment.wizard
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Expense Report
     * ---
     * Relation : many2one (hr.expense.sheet)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense\Sheet
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $expense_sheet_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

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
    private $partner_bank_account_id;

    /**
     * Payment Method
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
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Payment Type
     * ---
     * Relation : many2one (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_method_id;

    /**
     * Payment Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

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
     * Memo
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $communication;

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
     * Show Partner Bank Account
     * ---
     * Technical field used to know whether the field `partner_bank_account_id` needs to be displayed or not in the
     * payments form views
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
     * Technical field used to know whether the field `partner_bank_account_id` needs to be required or not in the
     * payments form views
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $require_partner_bank_account;

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
     * @param OdooRelation $expense_sheet_id Expense Report
     *        ---
     *        Relation : many2one (hr.expense.sheet)
     *        @see \Flux\OdooApiClient\Model\Object\Hr\Expense\Sheet
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Partner
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Payment Method
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $payment_method_id Payment Type
     *        ---
     *        Relation : many2one (account.payment.method)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Payment Amount
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $payment_date Payment Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $expense_sheet_id,
        OdooRelation $partner_id,
        OdooRelation $journal_id,
        OdooRelation $payment_method_id,
        float $amount,
        OdooRelation $currency_id,
        DateTimeInterface $payment_date
    ) {
        $this->expense_sheet_id = $expense_sheet_id;
        $this->partner_id = $partner_id;
        $this->journal_id = $journal_id;
        $this->payment_method_id = $payment_method_id;
        $this->amount = $amount;
        $this->currency_id = $currency_id;
        $this->payment_date = $payment_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string|null $communication
     */
    public function setCommunication(?string $communication): void
    {
        $this->communication = $communication;
    }

    /**
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("expense_sheet_id")
     */
    public function getExpenseSheetId(): OdooRelation
    {
        return $this->expense_sheet_id;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation $expense_sheet_id
     */
    public function setExpenseSheetId(OdooRelation $expense_sheet_id): void
    {
        $this->expense_sheet_id = $expense_sheet_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_bank_account_id")
     */
    public function getPartnerBankAccountId(): ?OdooRelation
    {
        return $this->partner_bank_account_id;
    }

    /**
     * @param OdooRelation|null $partner_bank_account_id
     */
    public function setPartnerBankAccountId(?OdooRelation $partner_bank_account_id): void
    {
        $this->partner_bank_account_id = $partner_bank_account_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("payment_method_id")
     */
    public function getPaymentMethodId(): OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @param OdooRelation $payment_method_id
     */
    public function setPaymentMethodId(OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return float
     *
     * @SerializedName("amount")
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.expense.sheet.register.payment.wizard';
    }
}
