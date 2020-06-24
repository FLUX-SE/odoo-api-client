<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Payment;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order;

/**
 * Odoo model : payment.transaction
 * Name : payment.transaction
 *
 * Transaction Model. Each specific acquirer can extend the model by adding
 * its own fields.
 *
 * Methods that can be added in an acquirer-specific implementation:
 *
 * - ``<name>_create``: method receiving values used when creating a new
 * transaction and that returns a dictionary that will update those values.
 * This method can be used to tweak some transaction values.
 *
 * Methods defined for convention, depending on your controllers:
 *
 * - ``<name>_form_feedback(self, data)``: method that handles the data coming
 * from the acquirer after the transaction. It will generally receives data
 * posted by the acquirer after the transaction.
 */
final class Transaction extends Base
{
    /**
     * Validation Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Acquirer
     *
     * @var null|Acquirer
     */
    private $acquirer_id;

    /**
     * Provider
     *
     * @var array
     */
    private $provider;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Message
     *
     * @var string
     */
    private $state_message;

    /**
     * Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Fees
     *
     * @var float
     */
    private $fees;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Reference
     *
     * @var null|string
     */
    private $reference;

    /**
     * Acquirer Reference
     *
     * @var string
     */
    private $acquirer_reference;

    /**
     * Customer
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Partner Name
     *
     * @var string
     */
    private $partner_name;

    /**
     * Language
     *
     * @var array
     */
    private $partner_lang;

    /**
     * Email
     *
     * @var string
     */
    private $partner_email;

    /**
     * Zip
     *
     * @var string
     */
    private $partner_zip;

    /**
     * Address
     *
     * @var string
     */
    private $partner_address;

    /**
     * City
     *
     * @var string
     */
    private $partner_city;

    /**
     * Country
     *
     * @var null|Country
     */
    private $partner_country_id;

    /**
     * Phone
     *
     * @var string
     */
    private $partner_phone;

    /**
     * 3D Secure HTML
     *
     * @var string
     */
    private $html_3ds;

    /**
     * Callback Document Model
     *
     * @var Model
     */
    private $callback_model_id;

    /**
     * Callback Document ID
     *
     * @var int
     */
    private $callback_res_id;

    /**
     * Callback Method
     *
     * @var string
     */
    private $callback_method;

    /**
     * Callback Hash
     *
     * @var string
     */
    private $callback_hash;

    /**
     * Return URL after payment
     *
     * @var string
     */
    private $return_url;

    /**
     * Has the payment been post processed
     *
     * @var bool
     */
    private $is_processed;

    /**
     * Payment Token
     *
     * @var Token
     */
    private $payment_token_id;

    /**
     * Payment
     *
     * @var Payment
     */
    private $payment_id;

    /**
     * Invoices
     *
     * @var Move
     */
    private $invoice_ids;

    /**
     * # of Invoices
     *
     * @var int
     */
    private $invoice_ids_nbr;

    /**
     * Sales Orders
     *
     * @var Order
     */
    private $sale_order_ids;

    /**
     * # of Sales Orders
     *
     * @var int
     */
    private $sale_order_ids_nbr;

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
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return Token
     */
    public function getPaymentTokenId(): Token
    {
        return $this->payment_token_id;
    }

    /**
     * @param string $html_3ds
     */
    public function setHtml3ds(string $html_3ds): void
    {
        $this->html_3ds = $html_3ds;
    }

    /**
     * @param Model $callback_model_id
     */
    public function setCallbackModelId(Model $callback_model_id): void
    {
        $this->callback_model_id = $callback_model_id;
    }

    /**
     * @param int $callback_res_id
     */
    public function setCallbackResId(int $callback_res_id): void
    {
        $this->callback_res_id = $callback_res_id;
    }

    /**
     * @param string $callback_method
     */
    public function setCallbackMethod(string $callback_method): void
    {
        $this->callback_method = $callback_method;
    }

    /**
     * @param string $callback_hash
     */
    public function setCallbackHash(string $callback_hash): void
    {
        $this->callback_hash = $callback_hash;
    }

    /**
     * @param string $return_url
     */
    public function setReturnUrl(string $return_url): void
    {
        $this->return_url = $return_url;
    }

    /**
     * @param bool $is_processed
     */
    public function setIsProcessed(bool $is_processed): void
    {
        $this->is_processed = $is_processed;
    }

    /**
     * @return Payment
     */
    public function getPaymentId(): Payment
    {
        return $this->payment_id;
    }

    /**
     * @param null|Country $partner_country_id
     */
    public function setPartnerCountryId(Country $partner_country_id): void
    {
        $this->partner_country_id = $partner_country_id;
    }

    /**
     * @return Move
     */
    public function getInvoiceIds(): Move
    {
        return $this->invoice_ids;
    }

    /**
     * @return int
     */
    public function getInvoiceIdsNbr(): int
    {
        return $this->invoice_ids_nbr;
    }

    /**
     * @return Order
     */
    public function getSaleOrderIds(): Order
    {
        return $this->sale_order_ids;
    }

    /**
     * @return int
     */
    public function getSaleOrderIdsNbr(): int
    {
        return $this->sale_order_ids_nbr;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @param string $partner_phone
     */
    public function setPartnerPhone(string $partner_phone): void
    {
        $this->partner_phone = $partner_phone;
    }

    /**
     * @param string $partner_city
     */
    public function setPartnerCity(string $partner_city): void
    {
        $this->partner_city = $partner_city;
    }

    /**
     * @return null|Acquirer
     */
    public function getAcquirerId(): Acquirer
    {
        return $this->acquirer_id;
    }

    /**
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return array
     */
    public function getProvider(): array
    {
        return $this->provider;
    }

    /**
     * @return null|array
     */
    public function getType(): ?array
    {
        return $this->type;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getStateMessage(): string
    {
        return $this->state_message;
    }

    /**
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getFees(): float
    {
        return $this->fees;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return string
     */
    public function getAcquirerReference(): string
    {
        return $this->acquirer_reference;
    }

    /**
     * @param string $partner_address
     */
    public function setPartnerAddress(string $partner_address): void
    {
        $this->partner_address = $partner_address;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string $partner_name
     */
    public function setPartnerName(string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @param array $partner_lang
     */
    public function setPartnerLang(array $partner_lang): void
    {
        $this->partner_lang = $partner_lang;
    }

    /**
     * @param array $partner_lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerLang(array $partner_lang, bool $strict = true): bool
    {
        return in_array($partner_lang, $this->partner_lang, $strict);
    }

    /**
     * @param array $partner_lang
     */
    public function addPartnerLang(array $partner_lang): void
    {
        if ($this->hasPartnerLang($partner_lang)) {
            return;
        }

        $this->partner_lang[] = $partner_lang;
    }

    /**
     * @param array $partner_lang
     */
    public function removePartnerLang(array $partner_lang): void
    {
        if ($this->hasPartnerLang($partner_lang)) {
            $index = array_search($partner_lang, $this->partner_lang);
            unset($this->partner_lang[$index]);
        }
    }

    /**
     * @param string $partner_email
     */
    public function setPartnerEmail(string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @param string $partner_zip
     */
    public function setPartnerZip(string $partner_zip): void
    {
        $this->partner_zip = $partner_zip;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
