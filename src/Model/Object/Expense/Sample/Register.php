<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Expense\Sample;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : expense.sample.register
 * ---
 * Name : expense.sample.register
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
     * Expense
     * ---
     * Relation : many2one (hr.expense.sheet)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense\Sheet
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sheet_id;

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
    private $memo;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * Outbound Payment Methods
     * ---
     * Manual:Pay bill by cash or any other method outside of Odoo.
     * Check:Pay bill by check and print it from Odoo.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. Enable this option
     * from the settings.
     * ---
     * Relation : many2many (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_method_ids;

    /**
     * Payment Method
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
     * Hide Payment
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_payment;

    /**
     * Payment Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Hide Partial
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_partial;

    /**
     * Payment Difference
     * ---
     * Selection :
     *     -> open (Keep open)
     *     -> paid (Mark as fully paid)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partial_mode;

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
     * @param DateTimeInterface $date Payment Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $date)
    {
        $this->date = $date;
    }

    /**
     * @param string|null $partial_mode
     */
    public function setPartialMode(?string $partial_mode): void
    {
        $this->partial_mode = $partial_mode;
    }

    /**
     * @param bool|null $hide_payment
     */
    public function setHidePayment(?bool $hide_payment): void
    {
        $this->hide_payment = $hide_payment;
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
     * @return bool|null
     *
     * @SerializedName("hide_partial")
     */
    public function isHidePartial(): ?bool
    {
        return $this->hide_partial;
    }

    /**
     * @param bool|null $hide_partial
     */
    public function setHidePartial(?bool $hide_partial): void
    {
        $this->hide_partial = $hide_partial;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partial_mode")
     */
    public function getPartialMode(): ?string
    {
        return $this->partial_mode;
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
     * @param OdooRelation|null $payment_method_id
     */
    public function setPaymentMethodId(?OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
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
     * @return bool|null
     *
     * @SerializedName("hide_payment")
     */
    public function isHidePayment(): ?bool
    {
        return $this->hide_payment;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sheet_id")
     */
    public function getSheetId(): ?OdooRelation
    {
        return $this->sheet_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation|null $sheet_id
     */
    public function setSheetId(?OdooRelation $sheet_id): void
    {
        $this->sheet_id = $sheet_id;
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
     * @return string|null
     *
     * @SerializedName("memo")
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * @param string|null $memo
     */
    public function setMemo(?string $memo): void
    {
        $this->memo = $memo;
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
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        if ($this->hasPaymentMethodIds($item)) {
            $index = array_search($item, $this->payment_method_ids);
            unset($this->payment_method_ids[$index]);
        }
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("payment_method_ids")
     */
    public function getPaymentMethodIds(): ?array
    {
        return $this->payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $payment_method_ids
     */
    public function setPaymentMethodIds(?array $payment_method_ids): void
    {
        $this->payment_method_ids = $payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->payment_method_ids) {
            return false;
        }

        return in_array($item, $this->payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        $this->payment_method_ids[] = $item;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'expense.sample.register';
    }
}
