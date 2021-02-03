<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment\Acquirer\Onboarding;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : payment.acquirer.onboarding.wizard
 * ---
 * Name : payment.acquirer.onboarding.wizard
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
     * Payment Method
     * ---
     * Selection :
     *     -> paypal (PayPal)
     *     -> stripe (Credit card (via Stripe))
     *     -> other (Other payment acquirer)
     *     -> manual (Custom payment instructions)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_method;

    /**
     * Paypal User Type
     * ---
     * Selection :
     *     -> new_user (I don't have a Paypal account)
     *     -> existing_user (I have a Paypal account)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $paypal_user_type;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $paypal_email_account;

    /**
     * Merchant Account ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $paypal_seller_account;

    /**
     * PDT Identity Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $paypal_pdt_token;

    /**
     * Stripe Secret Key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $stripe_secret_key;

    /**
     * Stripe Publishable Key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $stripe_publishable_key;

    /**
     * Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $manual_name;

    /**
     * Bank Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $journal_name;

    /**
     * Account Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $acc_number;

    /**
     * Payment Instructions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $manual_post_msg;

    /**
     *   Data Fetched
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $_data_fetched;

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
     * @return string|null
     *
     * @SerializedName("payment_method")
     */
    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    /**
     * @param string|null $journal_name
     */
    public function setJournalName(?string $journal_name): void
    {
        $this->journal_name = $journal_name;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $_data_fetched
     */
    public function setDataFetched(?bool $_data_fetched): void
    {
        $this->_data_fetched = $_data_fetched;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("_data_fetched")
     */
    public function isDataFetched(): ?bool
    {
        return $this->_data_fetched;
    }

    /**
     * @param string|null $manual_post_msg
     */
    public function setManualPostMsg(?string $manual_post_msg): void
    {
        $this->manual_post_msg = $manual_post_msg;
    }

    /**
     * @return string|null
     *
     * @SerializedName("manual_post_msg")
     */
    public function getManualPostMsg(): ?string
    {
        return $this->manual_post_msg;
    }

    /**
     * @param string|null $acc_number
     */
    public function setAccNumber(?string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("acc_number")
     */
    public function getAccNumber(): ?string
    {
        return $this->acc_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("journal_name")
     */
    public function getJournalName(): ?string
    {
        return $this->journal_name;
    }

    /**
     * @param string|null $payment_method
     */
    public function setPaymentMethod(?string $payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @param string|null $manual_name
     */
    public function setManualName(?string $manual_name): void
    {
        $this->manual_name = $manual_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("manual_name")
     */
    public function getManualName(): ?string
    {
        return $this->manual_name;
    }

    /**
     * @param string|null $stripe_publishable_key
     */
    public function setStripePublishableKey(?string $stripe_publishable_key): void
    {
        $this->stripe_publishable_key = $stripe_publishable_key;
    }

    /**
     * @return string|null
     *
     * @SerializedName("stripe_publishable_key")
     */
    public function getStripePublishableKey(): ?string
    {
        return $this->stripe_publishable_key;
    }

    /**
     * @param string|null $stripe_secret_key
     */
    public function setStripeSecretKey(?string $stripe_secret_key): void
    {
        $this->stripe_secret_key = $stripe_secret_key;
    }

    /**
     * @return string|null
     *
     * @SerializedName("stripe_secret_key")
     */
    public function getStripeSecretKey(): ?string
    {
        return $this->stripe_secret_key;
    }

    /**
     * @param string|null $paypal_pdt_token
     */
    public function setPaypalPdtToken(?string $paypal_pdt_token): void
    {
        $this->paypal_pdt_token = $paypal_pdt_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("paypal_pdt_token")
     */
    public function getPaypalPdtToken(): ?string
    {
        return $this->paypal_pdt_token;
    }

    /**
     * @param string|null $paypal_seller_account
     */
    public function setPaypalSellerAccount(?string $paypal_seller_account): void
    {
        $this->paypal_seller_account = $paypal_seller_account;
    }

    /**
     * @return string|null
     *
     * @SerializedName("paypal_seller_account")
     */
    public function getPaypalSellerAccount(): ?string
    {
        return $this->paypal_seller_account;
    }

    /**
     * @param string|null $paypal_email_account
     */
    public function setPaypalEmailAccount(?string $paypal_email_account): void
    {
        $this->paypal_email_account = $paypal_email_account;
    }

    /**
     * @return string|null
     *
     * @SerializedName("paypal_email_account")
     */
    public function getPaypalEmailAccount(): ?string
    {
        return $this->paypal_email_account;
    }

    /**
     * @param string|null $paypal_user_type
     */
    public function setPaypalUserType(?string $paypal_user_type): void
    {
        $this->paypal_user_type = $paypal_user_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("paypal_user_type")
     */
    public function getPaypalUserType(): ?string
    {
        return $this->paypal_user_type;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.acquirer.onboarding.wizard';
    }
}
