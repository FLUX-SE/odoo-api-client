<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment\Acquirer\Onboarding;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.acquirer.onboarding.wizard
 * Name : payment.acquirer.onboarding.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Payment Method
     *
     * @var null|array
     */
    private $payment_method;

    /**
     * Paypal User Type
     *
     * @var null|array
     */
    private $paypal_user_type;

    /**
     * Email
     *
     * @var null|string
     */
    private $paypal_email_account;

    /**
     * Merchant Account ID
     *
     * @var null|string
     */
    private $paypal_seller_account;

    /**
     * PDT Identity Token
     *
     * @var null|string
     */
    private $paypal_pdt_token;

    /**
     * Stripe Secret Key
     *
     * @var null|string
     */
    private $stripe_secret_key;

    /**
     * Stripe Publishable Key
     *
     * @var null|string
     */
    private $stripe_publishable_key;

    /**
     * Method
     *
     * @var null|string
     */
    private $manual_name;

    /**
     * Bank Name
     *
     * @var null|string
     */
    private $journal_name;

    /**
     * Account Number
     *
     * @var null|string
     */
    private $acc_number;

    /**
     * Payment Instructions
     *
     * @var null|string
     */
    private $manual_post_msg;

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
     * @param null|array $payment_method
     */
    public function setPaymentMethod(?array $payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @param null|string $stripe_secret_key
     */
    public function setStripeSecretKey(?string $stripe_secret_key): void
    {
        $this->stripe_secret_key = $stripe_secret_key;
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
     * @param null|string $manual_post_msg
     */
    public function setManualPostMsg(?string $manual_post_msg): void
    {
        $this->manual_post_msg = $manual_post_msg;
    }

    /**
     * @param null|string $acc_number
     */
    public function setAccNumber(?string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @param null|string $journal_name
     */
    public function setJournalName(?string $journal_name): void
    {
        $this->journal_name = $journal_name;
    }

    /**
     * @param null|string $manual_name
     */
    public function setManualName(?string $manual_name): void
    {
        $this->manual_name = $manual_name;
    }

    /**
     * @param null|string $stripe_publishable_key
     */
    public function setStripePublishableKey(?string $stripe_publishable_key): void
    {
        $this->stripe_publishable_key = $stripe_publishable_key;
    }

    /**
     * @param null|string $paypal_pdt_token
     */
    public function setPaypalPdtToken(?string $paypal_pdt_token): void
    {
        $this->paypal_pdt_token = $paypal_pdt_token;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentMethod($item, bool $strict = true): bool
    {
        if (null === $this->payment_method) {
            return false;
        }

        return in_array($item, $this->payment_method, $strict);
    }

    /**
     * @param null|string $paypal_seller_account
     */
    public function setPaypalSellerAccount(?string $paypal_seller_account): void
    {
        $this->paypal_seller_account = $paypal_seller_account;
    }

    /**
     * @param null|string $paypal_email_account
     */
    public function setPaypalEmailAccount(?string $paypal_email_account): void
    {
        $this->paypal_email_account = $paypal_email_account;
    }

    /**
     * @param mixed $item
     */
    public function removePaypalUserType($item): void
    {
        if (null === $this->paypal_user_type) {
            $this->paypal_user_type = [];
        }

        if ($this->hasPaypalUserType($item)) {
            $index = array_search($item, $this->paypal_user_type);
            unset($this->paypal_user_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPaypalUserType($item): void
    {
        if ($this->hasPaypalUserType($item)) {
            return;
        }

        if (null === $this->paypal_user_type) {
            $this->paypal_user_type = [];
        }

        $this->paypal_user_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaypalUserType($item, bool $strict = true): bool
    {
        if (null === $this->paypal_user_type) {
            return false;
        }

        return in_array($item, $this->paypal_user_type, $strict);
    }

    /**
     * @param null|array $paypal_user_type
     */
    public function setPaypalUserType(?array $paypal_user_type): void
    {
        $this->paypal_user_type = $paypal_user_type;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentMethod($item): void
    {
        if (null === $this->payment_method) {
            $this->payment_method = [];
        }

        if ($this->hasPaymentMethod($item)) {
            $index = array_search($item, $this->payment_method);
            unset($this->payment_method[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPaymentMethod($item): void
    {
        if ($this->hasPaymentMethod($item)) {
            return;
        }

        if (null === $this->payment_method) {
            $this->payment_method = [];
        }

        $this->payment_method[] = $item;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
