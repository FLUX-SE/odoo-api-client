<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Advance\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : sale.advance.payment.inv
 * Name : sale.advance.payment.inv
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Inv extends Base
{
    public const ODOO_MODEL_NAME = 'sale.advance.payment.inv';

    /**
     * Create Invoice
     * A standard invoice is issued with all the order lines ready for invoicing,         according to their
     * invoicing policy (based on ordered or delivered quantity).
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> delivered (Regular invoice)
     *     -> percentage (Down payment (percentage))
     *     -> fixed (Down payment (fixed amount))
     *
     *
     * @var string
     */
    private $advance_payment_method;

    /**
     * Deduct down payments
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $deduct_down_payments;

    /**
     * Has down payments
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $has_down_payments;

    /**
     * Down Payment Product
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Order Count
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count;

    /**
     * Down Payment Amount
     * The percentage of amount to be invoiced in advance, taxes excluded.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Down Payment Amount(Fixed)
     * The fixed amount to be invoiced in advance, taxes excluded.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fixed_amount;

    /**
     * Income Account
     * Account used for deposits
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $deposit_account_id;

    /**
     * Customer Taxes
     * Taxes used for deposits
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $deposit_taxes_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $advance_payment_method Create Invoice
     *        A standard invoice is issued with all the order lines ready for invoicing,         according to their
     *        invoicing policy (based on ordered or delivered quantity).
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> delivered (Regular invoice)
     *            -> percentage (Down payment (percentage))
     *            -> fixed (Down payment (fixed amount))
     *
     */
    public function __construct(string $advance_payment_method)
    {
        $this->advance_payment_method = $advance_payment_method;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDepositAccountId(): ?OdooRelation
    {
        return $this->deposit_account_id;
    }

    /**
     * @return DateTimeInterface|null
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDepositTaxesId(OdooRelation $item): void
    {
        if (null === $this->deposit_taxes_id) {
            $this->deposit_taxes_id = [];
        }

        if ($this->hasDepositTaxesId($item)) {
            $index = array_search($item, $this->deposit_taxes_id);
            unset($this->deposit_taxes_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addDepositTaxesId(OdooRelation $item): void
    {
        if ($this->hasDepositTaxesId($item)) {
            return;
        }

        if (null === $this->deposit_taxes_id) {
            $this->deposit_taxes_id = [];
        }

        $this->deposit_taxes_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDepositTaxesId(OdooRelation $item): bool
    {
        if (null === $this->deposit_taxes_id) {
            return false;
        }

        return in_array($item, $this->deposit_taxes_id);
    }

    /**
     * @param OdooRelation[]|null $deposit_taxes_id
     */
    public function setDepositTaxesId(?array $deposit_taxes_id): void
    {
        $this->deposit_taxes_id = $deposit_taxes_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getDepositTaxesId(): ?array
    {
        return $this->deposit_taxes_id;
    }

    /**
     * @param OdooRelation|null $deposit_account_id
     */
    public function setDepositAccountId(?OdooRelation $deposit_account_id): void
    {
        $this->deposit_account_id = $deposit_account_id;
    }

    /**
     * @param float|null $fixed_amount
     */
    public function setFixedAmount(?float $fixed_amount): void
    {
        $this->fixed_amount = $fixed_amount;
    }

    /**
     * @return string
     */
    public function getAdvancePaymentMethod(): string
    {
        return $this->advance_payment_method;
    }

    /**
     * @return float|null
     */
    public function getFixedAmount(): ?float
    {
        return $this->fixed_amount;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
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
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param int|null $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param bool|null $has_down_payments
     */
    public function setHasDownPayments(?bool $has_down_payments): void
    {
        $this->has_down_payments = $has_down_payments;
    }

    /**
     * @return bool|null
     */
    public function isHasDownPayments(): ?bool
    {
        return $this->has_down_payments;
    }

    /**
     * @param bool|null $deduct_down_payments
     */
    public function setDeductDownPayments(?bool $deduct_down_payments): void
    {
        $this->deduct_down_payments = $deduct_down_payments;
    }

    /**
     * @return bool|null
     */
    public function isDeductDownPayments(): ?bool
    {
        return $this->deduct_down_payments;
    }

    /**
     * @param string $advance_payment_method
     */
    public function setAdvancePaymentMethod(string $advance_payment_method): void
    {
        $this->advance_payment_method = $advance_payment_method;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
