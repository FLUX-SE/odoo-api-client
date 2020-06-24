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
 *
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
     *
     * @var null|array
     */
    private $advance_payment_method;

    /**
     * Deduct down payments
     *
     * @var bool
     */
    private $deduct_down_payments;

    /**
     * Has down payments
     *
     * @var bool
     */
    private $has_down_payments;

    /**
     * Down Payment Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Order Count
     *
     * @var int
     */
    private $count;

    /**
     * Down Payment Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Down Payment Amount(Fixed)
     *
     * @var float
     */
    private $fixed_amount;

    /**
     * Income Account
     *
     * @var Account
     */
    private $deposit_account_id;

    /**
     * Customer Taxes
     *
     * @var Tax
     */
    private $deposit_taxes_id;

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
     * @param null|array $advance_payment_method
     */
    public function setAdvancePaymentMethod(?array $advance_payment_method): void
    {
        $this->advance_payment_method = $advance_payment_method;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param Tax $deposit_taxes_id
     */
    public function setDepositTaxesId(Tax $deposit_taxes_id): void
    {
        $this->deposit_taxes_id = $deposit_taxes_id;
    }

    /**
     * @param Account $deposit_account_id
     */
    public function setDepositAccountId(Account $deposit_account_id): void
    {
        $this->deposit_account_id = $deposit_account_id;
    }

    /**
     * @param float $fixed_amount
     */
    public function setFixedAmount(float $fixed_amount): void
    {
        $this->fixed_amount = $fixed_amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param ?array $advance_payment_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAdvancePaymentMethod(?array $advance_payment_method, bool $strict = true): bool
    {
        if (null === $this->advance_payment_method) {
            return false;
        }

        return in_array($advance_payment_method, $this->advance_payment_method, $strict);
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return bool
     */
    public function isHasDownPayments(): bool
    {
        return $this->has_down_payments;
    }

    /**
     * @param bool $deduct_down_payments
     */
    public function setDeductDownPayments(bool $deduct_down_payments): void
    {
        $this->deduct_down_payments = $deduct_down_payments;
    }

    /**
     * @param ?array $advance_payment_method
     */
    public function removeAdvancePaymentMethod(?array $advance_payment_method): void
    {
        if ($this->hasAdvancePaymentMethod($advance_payment_method)) {
            $index = array_search($advance_payment_method, $this->advance_payment_method);
            unset($this->advance_payment_method[$index]);
        }
    }

    /**
     * @param ?array $advance_payment_method
     */
    public function addAdvancePaymentMethod(?array $advance_payment_method): void
    {
        if ($this->hasAdvancePaymentMethod($advance_payment_method)) {
            return;
        }

        if (null === $this->advance_payment_method) {
            $this->advance_payment_method = [];
        }

        $this->advance_payment_method[] = $advance_payment_method;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
