<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Payment\Acquirer\Onboarding;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : sale.payment.acquirer.onboarding.wizard
 * Name : sale.payment.acquirer.onboarding.wizard
 *
 * Override for the sale quotation onboarding panel.
 */
final class Wizard extends Base
{
    /**
     * Payment Method
     *
     * @var array
     */
    private $payment_method;

    /**
     * Paypal User Type
     *
     * @var array
     */
    private $paypal_user_type;

    /**
     * Email
     *
     * @var string
     */
    private $paypal_email_account;

    /**
     * Merchant Account ID
     *
     * @var string
     */
    private $paypal_seller_account;

    /**
     * PDT Identity Token
     *
     * @var string
     */
    private $paypal_pdt_token;

    /**
     * Stripe Secret Key
     *
     * @var string
     */
    private $stripe_secret_key;

    /**
     * Stripe Publishable Key
     *
     * @var string
     */
    private $stripe_publishable_key;

    /**
     * Method
     *
     * @var string
     */
    private $manual_name;

    /**
     * Bank Name
     *
     * @var string
     */
    private $journal_name;

    /**
     * Account Number
     *
     * @var string
     */
    private $acc_number;

    /**
     * Payment Instructions
     *
     * @var string
     */
    private $manual_post_msg;

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
     * @param array $payment_method
     */
    public function setPaymentMethod(array $payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @param string $stripe_secret_key
     */
    public function setStripeSecretKey(string $stripe_secret_key): void
    {
        $this->stripe_secret_key = $stripe_secret_key;
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
     * @param string $manual_post_msg
     */
    public function setManualPostMsg(string $manual_post_msg): void
    {
        $this->manual_post_msg = $manual_post_msg;
    }

    /**
     * @param string $acc_number
     */
    public function setAccNumber(string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @param string $journal_name
     */
    public function setJournalName(string $journal_name): void
    {
        $this->journal_name = $journal_name;
    }

    /**
     * @param string $manual_name
     */
    public function setManualName(string $manual_name): void
    {
        $this->manual_name = $manual_name;
    }

    /**
     * @param string $stripe_publishable_key
     */
    public function setStripePublishableKey(string $stripe_publishable_key): void
    {
        $this->stripe_publishable_key = $stripe_publishable_key;
    }

    /**
     * @param string $paypal_pdt_token
     */
    public function setPaypalPdtToken(string $paypal_pdt_token): void
    {
        $this->paypal_pdt_token = $paypal_pdt_token;
    }

    /**
     * @param array $payment_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentMethod(array $payment_method, bool $strict = true): bool
    {
        return in_array($payment_method, $this->payment_method, $strict);
    }

    /**
     * @param string $paypal_seller_account
     */
    public function setPaypalSellerAccount(string $paypal_seller_account): void
    {
        $this->paypal_seller_account = $paypal_seller_account;
    }

    /**
     * @param string $paypal_email_account
     */
    public function setPaypalEmailAccount(string $paypal_email_account): void
    {
        $this->paypal_email_account = $paypal_email_account;
    }

    /**
     * @param array $paypal_user_type
     */
    public function removePaypalUserType(array $paypal_user_type): void
    {
        if ($this->hasPaypalUserType($paypal_user_type)) {
            $index = array_search($paypal_user_type, $this->paypal_user_type);
            unset($this->paypal_user_type[$index]);
        }
    }

    /**
     * @param array $paypal_user_type
     */
    public function addPaypalUserType(array $paypal_user_type): void
    {
        if ($this->hasPaypalUserType($paypal_user_type)) {
            return;
        }

        $this->paypal_user_type[] = $paypal_user_type;
    }

    /**
     * @param array $paypal_user_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaypalUserType(array $paypal_user_type, bool $strict = true): bool
    {
        return in_array($paypal_user_type, $this->paypal_user_type, $strict);
    }

    /**
     * @param array $paypal_user_type
     */
    public function setPaypalUserType(array $paypal_user_type): void
    {
        $this->paypal_user_type = $paypal_user_type;
    }

    /**
     * @param array $payment_method
     */
    public function removePaymentMethod(array $payment_method): void
    {
        if ($this->hasPaymentMethod($payment_method)) {
            $index = array_search($payment_method, $this->payment_method);
            unset($this->payment_method[$index]);
        }
    }

    /**
     * @param array $payment_method
     */
    public function addPaymentMethod(array $payment_method): void
    {
        if ($this->hasPaymentMethod($payment_method)) {
            return;
        }

        $this->payment_method[] = $payment_method;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
