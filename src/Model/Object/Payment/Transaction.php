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
 * Info :
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
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Acquirer
     *
     * @var Acquirer
     */
    private $acquirer_id;

    /**
     * Provider
     *
     * @var null|array
     */
    private $provider;

    /**
     * Type
     *
     * @var array
     */
    private $type;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Message
     * Field used to store error and/or validation messages for information
     *
     * @var null|string
     */
    private $state_message;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Fees
     * Fees amount; set by the system because depends on the acquirer
     *
     * @var null|float
     */
    private $fees;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Reference
     * Internal reference of the TX
     *
     * @var string
     */
    private $reference;

    /**
     * Acquirer Reference
     * Reference of the TX as stored in the acquirer database
     *
     * @var null|string
     */
    private $acquirer_reference;

    /**
     * Customer
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Partner Name
     *
     * @var null|string
     */
    private $partner_name;

    /**
     * Language
     *
     * @var null|array
     */
    private $partner_lang;

    /**
     * Email
     *
     * @var null|string
     */
    private $partner_email;

    /**
     * Zip
     *
     * @var null|string
     */
    private $partner_zip;

    /**
     * Address
     *
     * @var null|string
     */
    private $partner_address;

    /**
     * City
     *
     * @var null|string
     */
    private $partner_city;

    /**
     * Country
     *
     * @var Country
     */
    private $partner_country_id;

    /**
     * Phone
     *
     * @var null|string
     */
    private $partner_phone;

    /**
     * 3D Secure HTML
     *
     * @var null|string
     */
    private $html_3ds;

    /**
     * Callback Document Model
     *
     * @var null|Model
     */
    private $callback_model_id;

    /**
     * Callback Document ID
     *
     * @var null|int
     */
    private $callback_res_id;

    /**
     * Callback Method
     *
     * @var null|string
     */
    private $callback_method;

    /**
     * Callback Hash
     *
     * @var null|string
     */
    private $callback_hash;

    /**
     * Return URL after payment
     *
     * @var null|string
     */
    private $return_url;

    /**
     * Has the payment been post processed
     *
     * @var null|bool
     */
    private $is_processed;

    /**
     * Payment Token
     *
     * @var null|Token
     */
    private $payment_token_id;

    /**
     * Payment
     *
     * @var null|Payment
     */
    private $payment_id;

    /**
     * Invoices
     *
     * @var null|Move[]
     */
    private $invoice_ids;

    /**
     * # of Invoices
     *
     * @var null|int
     */
    private $invoice_ids_nbr;

    /**
     * Sales Orders
     *
     * @var null|Order[]
     */
    private $sale_order_ids;

    /**
     * # of Sales Orders
     *
     * @var null|int
     */
    private $sale_order_ids_nbr;

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
     * @param Acquirer $acquirer_id Acquirer
     * @param array $type Type
     * @param array $state Status
     * @param float $amount Amount
     * @param Currency $currency_id Currency
     * @param string $reference Reference
     *        Internal reference of the TX
     * @param Country $partner_country_id Country
     */
    public function __construct(
        Acquirer $acquirer_id,
        array $type,
        array $state,
        float $amount,
        Currency $currency_id,
        string $reference,
        Country $partner_country_id
    ) {
        $this->acquirer_id = $acquirer_id;
        $this->type = $type;
        $this->state = $state;
        $this->amount = $amount;
        $this->currency_id = $currency_id;
        $this->reference = $reference;
        $this->partner_country_id = $partner_country_id;
    }

    /**
     * @param null|bool $is_processed
     */
    public function setIsProcessed(?bool $is_processed): void
    {
        $this->is_processed = $is_processed;
    }

    /**
     * @param null|string $partner_phone
     */
    public function setPartnerPhone(?string $partner_phone): void
    {
        $this->partner_phone = $partner_phone;
    }

    /**
     * @param null|string $html_3ds
     */
    public function setHtml3ds(?string $html_3ds): void
    {
        $this->html_3ds = $html_3ds;
    }

    /**
     * @param null|Model $callback_model_id
     */
    public function setCallbackModelId(?Model $callback_model_id): void
    {
        $this->callback_model_id = $callback_model_id;
    }

    /**
     * @param null|int $callback_res_id
     */
    public function setCallbackResId(?int $callback_res_id): void
    {
        $this->callback_res_id = $callback_res_id;
    }

    /**
     * @param null|string $callback_method
     */
    public function setCallbackMethod(?string $callback_method): void
    {
        $this->callback_method = $callback_method;
    }

    /**
     * @param null|string $callback_hash
     */
    public function setCallbackHash(?string $callback_hash): void
    {
        $this->callback_hash = $callback_hash;
    }

    /**
     * @param null|string $return_url
     */
    public function setReturnUrl(?string $return_url): void
    {
        $this->return_url = $return_url;
    }

    /**
     * @return null|Token
     */
    public function getPaymentTokenId(): ?Token
    {
        return $this->payment_token_id;
    }

    /**
     * @param null|string $partner_city
     */
    public function setPartnerCity(?string $partner_city): void
    {
        $this->partner_city = $partner_city;
    }

    /**
     * @return null|Payment
     */
    public function getPaymentId(): ?Payment
    {
        return $this->payment_id;
    }

    /**
     * @return null|Move[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @return null|int
     */
    public function getInvoiceIdsNbr(): ?int
    {
        return $this->invoice_ids_nbr;
    }

    /**
     * @return null|Order[]
     */
    public function getSaleOrderIds(): ?array
    {
        return $this->sale_order_ids;
    }

    /**
     * @return null|int
     */
    public function getSaleOrderIdsNbr(): ?int
    {
        return $this->sale_order_ids_nbr;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param Country $partner_country_id
     */
    public function setPartnerCountryId(Country $partner_country_id): void
    {
        $this->partner_country_id = $partner_country_id;
    }

    /**
     * @param null|string $partner_address
     */
    public function setPartnerAddress(?string $partner_address): void
    {
        $this->partner_address = $partner_address;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Acquirer
     */
    public function getAcquirerId(): Acquirer
    {
        return $this->acquirer_id;
    }

    /**
     * @return null|array
     */
    public function getProvider(): ?array
    {
        return $this->provider;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return null|string
     */
    public function getStateMessage(): ?string
    {
        return $this->state_message;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return null|float
     */
    public function getFees(): ?float
    {
        return $this->fees;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param null|string $partner_zip
     */
    public function setPartnerZip(?string $partner_zip): void
    {
        $this->partner_zip = $partner_zip;
    }

    /**
     * @return null|string
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirer_reference;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|string $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @param null|array $partner_lang
     */
    public function setPartnerLang(?array $partner_lang): void
    {
        $this->partner_lang = $partner_lang;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerLang($item, bool $strict = true): bool
    {
        if (null === $this->partner_lang) {
            return false;
        }

        return in_array($item, $this->partner_lang, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPartnerLang($item): void
    {
        if ($this->hasPartnerLang($item)) {
            return;
        }

        if (null === $this->partner_lang) {
            $this->partner_lang = [];
        }

        $this->partner_lang[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removePartnerLang($item): void
    {
        if (null === $this->partner_lang) {
            $this->partner_lang = [];
        }

        if ($this->hasPartnerLang($item)) {
            $index = array_search($item, $this->partner_lang);
            unset($this->partner_lang[$index]);
        }
    }

    /**
     * @param null|string $partner_email
     */
    public function setPartnerEmail(?string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
