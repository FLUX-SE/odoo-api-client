<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Advance\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : sale.advance.payment.inv
 * Name : sale.advance.payment.inv
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Inv extends Base
{
    /**
     * Create Invoice
     * A standard invoice is issued with all the order lines ready for invoicing,         according to their
     * invoicing policy (based on ordered or delivered quantity).
     *
     * @var array
     */
    private $advance_payment_method;

    /**
     * Deduct down payments
     *
     * @var null|bool
     */
    private $deduct_down_payments;

    /**
     * Has down payments
     *
     * @var null|bool
     */
    private $has_down_payments;

    /**
     * Down Payment Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Order Count
     *
     * @var null|int
     */
    private $count;

    /**
     * Down Payment Amount
     * The percentage of amount to be invoiced in advance, taxes excluded.
     *
     * @var null|float
     */
    private $amount;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Down Payment Amount(Fixed)
     * The fixed amount to be invoiced in advance, taxes excluded.
     *
     * @var null|float
     */
    private $fixed_amount;

    /**
     * Income Account
     * Account used for deposits
     *
     * @var null|Account
     */
    private $deposit_account_id;

    /**
     * Customer Taxes
     * Taxes used for deposits
     *
     * @var null|Tax[]
     */
    private $deposit_taxes_id;

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
     * @param array $advance_payment_method Create Invoice
     *        A standard invoice is issued with all the order lines ready for invoicing,         according to their
     *        invoicing policy (based on ordered or delivered quantity).
     */
    public function __construct(array $advance_payment_method)
    {
        $this->advance_payment_method = $advance_payment_method;
    }

    /**
     * @param null|float $fixed_amount
     */
    public function setFixedAmount(?float $fixed_amount): void
    {
        $this->fixed_amount = $fixed_amount;
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
     * @param Tax $item
     */
    public function removeDepositTaxesId(Tax $item): void
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
     * @param Tax $item
     */
    public function addDepositTaxesId(Tax $item): void
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
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDepositTaxesId(Tax $item, bool $strict = true): bool
    {
        if (null === $this->deposit_taxes_id) {
            return false;
        }

        return in_array($item, $this->deposit_taxes_id, $strict);
    }

    /**
     * @param null|Tax[] $deposit_taxes_id
     */
    public function setDepositTaxesId(?array $deposit_taxes_id): void
    {
        $this->deposit_taxes_id = $deposit_taxes_id;
    }

    /**
     * @param null|Account $deposit_account_id
     */
    public function setDepositAccountId(?Account $deposit_account_id): void
    {
        $this->deposit_account_id = $deposit_account_id;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param array $advance_payment_method
     */
    public function setAdvancePaymentMethod(array $advance_payment_method): void
    {
        $this->advance_payment_method = $advance_payment_method;
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param null|int $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return null|bool
     */
    public function isHasDownPayments(): ?bool
    {
        return $this->has_down_payments;
    }

    /**
     * @param null|bool $deduct_down_payments
     */
    public function setDeductDownPayments(?bool $deduct_down_payments): void
    {
        $this->deduct_down_payments = $deduct_down_payments;
    }

    /**
     * @param mixed $item
     */
    public function removeAdvancePaymentMethod($item): void
    {
        if ($this->hasAdvancePaymentMethod($item)) {
            $index = array_search($item, $this->advance_payment_method);
            unset($this->advance_payment_method[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAdvancePaymentMethod($item): void
    {
        if ($this->hasAdvancePaymentMethod($item)) {
            return;
        }

        $this->advance_payment_method[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAdvancePaymentMethod($item, bool $strict = true): bool
    {
        return in_array($item, $this->advance_payment_method, $strict);
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
