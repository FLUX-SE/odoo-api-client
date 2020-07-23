<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : payment.transaction
 * Name : payment.transaction
 * Info :
 * Transaction Model. Each specific acquirer can extend the model by adding
 *         its own fields.
 *
 *         Methods that can be added in an acquirer-specific implementation:
 *
 *           - ``<name>_create``: method receiving values used when creating a new
 *               transaction and that returns a dictionary that will update those values.
 *               This method can be used to tweak some transaction values.
 *
 *         Methods defined for convention, depending on your controllers:
 *
 *           - ``<name>_form_feedback(self, data)``: method that handles the data coming
 *               from the acquirer after the transaction. It will generally receives data
 *               posted by the acquirer after the transaction.
 */
final class Transaction extends Base
{
    /**
     * Validation Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Acquirer
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $acquirer_id;

    /**
     * Provider
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> manual (Custom Payment Form)
     *     -> transfer (Manual Payment)
     *
     *
     * @var string|null
     */
    private $provider;

    /**
     * Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> validation (Validation of the bank card)
     *     -> server2server (Server To Server)
     *     -> form (Form)
     *     -> form_save (Form with tokenization)
     *
     *
     * @var string
     */
    private $type;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (Draft)
     *     -> pending (Pending)
     *     -> authorized (Authorized)
     *     -> done (Done)
     *     -> cancel (Canceled)
     *     -> error (Error)
     *
     *
     * @var string
     */
    private $state;

    /**
     * Message
     * Field used to store error and/or validation messages for information
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state_message;

    /**
     * Amount
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Fees
     * Fees amount; set by the system because depends on the acquirer
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Reference
     * Internal reference of the TX
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reference;

    /**
     * Acquirer Reference
     * Reference of the TX as stored in the acquirer database
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $acquirer_reference;

    /**
     * Customer
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Partner Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_name;

    /**
     * Language
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> en_US (English (US))
     *
     *
     * @var string|null
     */
    private $partner_lang;

    /**
     * Email
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_email;

    /**
     * Zip
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_zip;

    /**
     * Address
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_address;

    /**
     * City
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_city;

    /**
     * Country
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_country_id;

    /**
     * Phone
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_phone;

    /**
     * 3D Secure HTML
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $html_3ds;

    /**
     * Callback Document Model
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $callback_model_id;

    /**
     * Callback Document ID
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $callback_res_id;

    /**
     * Callback Method
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $callback_method;

    /**
     * Callback Hash
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $callback_hash;

    /**
     * Return URL after payment
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $return_url;

    /**
     * Has the payment been post processed
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_processed;

    /**
     * Payment Token
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_token_id;

    /**
     * Payment
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_id;

    /**
     * Invoices
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * # of Invoices
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invoice_ids_nbr;

    /**
     * Sales Orders
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_ids;

    /**
     * # of Sales Orders
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $sale_order_ids_nbr;

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
     * @param OdooRelation $acquirer_id Acquirer
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> validation (Validation of the bank card)
     *            -> server2server (Server To Server)
     *            -> form (Form)
     *            -> form_save (Form with tokenization)
     *
     * @param string $state Status
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> draft (Draft)
     *            -> pending (Pending)
     *            -> authorized (Authorized)
     *            -> done (Done)
     *            -> cancel (Canceled)
     *            -> error (Error)
     *
     * @param float $amount Amount
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        Searchable : yes
     *        Sortable : yes
     * @param string $reference Reference
     *        Internal reference of the TX
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_country_id Country
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $acquirer_id,
        string $type,
        string $state,
        float $amount,
        OdooRelation $currency_id,
        string $reference,
        OdooRelation $partner_country_id
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
     * @param string|null $return_url
     */
    public function setReturnUrl(?string $return_url): void
    {
        $this->return_url = $return_url;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param OdooRelation|null $payment_id
     */
    public function setPaymentId(?OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaymentId(): ?OdooRelation
    {
        return $this->payment_id;
    }

    /**
     * @param OdooRelation|null $payment_token_id
     */
    public function setPaymentTokenId(?OdooRelation $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaymentTokenId(): ?OdooRelation
    {
        return $this->payment_token_id;
    }

    /**
     * @param bool|null $is_processed
     */
    public function setIsProcessed(?bool $is_processed): void
    {
        $this->is_processed = $is_processed;
    }

    /**
     * @return bool|null
     */
    public function isIsProcessed(): ?bool
    {
        return $this->is_processed;
    }

    /**
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return $this->return_url;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param string|null $callback_hash
     */
    public function setCallbackHash(?string $callback_hash): void
    {
        $this->callback_hash = $callback_hash;
    }

    /**
     * @return string|null
     */
    public function getCallbackHash(): ?string
    {
        return $this->callback_hash;
    }

    /**
     * @param string|null $callback_method
     */
    public function setCallbackMethod(?string $callback_method): void
    {
        $this->callback_method = $callback_method;
    }

    /**
     * @return string|null
     */
    public function getCallbackMethod(): ?string
    {
        return $this->callback_method;
    }

    /**
     * @param int|null $callback_res_id
     */
    public function setCallbackResId(?int $callback_res_id): void
    {
        $this->callback_res_id = $callback_res_id;
    }

    /**
     * @return int|null
     */
    public function getCallbackResId(): ?int
    {
        return $this->callback_res_id;
    }

    /**
     * @param OdooRelation|null $callback_model_id
     */
    public function setCallbackModelId(?OdooRelation $callback_model_id): void
    {
        $this->callback_model_id = $callback_model_id;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param string|null $html_3ds
     */
    public function setHtml3ds(?string $html_3ds): void
    {
        $this->html_3ds = $html_3ds;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param int|null $sale_order_ids_nbr
     */
    public function setSaleOrderIdsNbr(?int $sale_order_ids_nbr): void
    {
        $this->sale_order_ids_nbr = $sale_order_ids_nbr;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getSaleOrderIdsNbr(): ?int
    {
        return $this->sale_order_ids_nbr;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSaleOrderIds(OdooRelation $item): void
    {
        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        if ($this->hasSaleOrderIds($item)) {
            $index = array_search($item, $this->sale_order_ids);
            unset($this->sale_order_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSaleOrderIds(OdooRelation $item): void
    {
        if ($this->hasSaleOrderIds($item)) {
            return;
        }

        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        $this->sale_order_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSaleOrderIds(OdooRelation $item): bool
    {
        if (null === $this->sale_order_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_ids);
    }

    /**
     * @param OdooRelation[]|null $sale_order_ids
     */
    public function setSaleOrderIds(?array $sale_order_ids): void
    {
        $this->sale_order_ids = $sale_order_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSaleOrderIds(): ?array
    {
        return $this->sale_order_ids;
    }

    /**
     * @param int|null $invoice_ids_nbr
     */
    public function setInvoiceIdsNbr(?int $invoice_ids_nbr): void
    {
        $this->invoice_ids_nbr = $invoice_ids_nbr;
    }

    /**
     * @return int|null
     */
    public function getInvoiceIdsNbr(): ?int
    {
        return $this->invoice_ids_nbr;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCallbackModelId(): ?OdooRelation
    {
        return $this->callback_model_id;
    }

    /**
     * @return string|null
     */
    public function getHtml3ds(): ?string
    {
        return $this->html_3ds;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return string|null
     */
    public function getStateMessage(): ?string
    {
        return $this->state_message;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param float|null $fees
     */
    public function setFees(?float $fees): void
    {
        $this->fees = $fees;
    }

    /**
     * @return float|null
     */
    public function getFees(): ?float
    {
        return $this->fees;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param string|null $state_message
     */
    public function setStateMessage(?string $state_message): void
    {
        $this->state_message = $state_message;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string|null $provider
     */
    public function setProvider(?string $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @param OdooRelation $acquirer_id
     */
    public function setAcquirerId(OdooRelation $acquirer_id): void
    {
        $this->acquirer_id = $acquirer_id;
    }

    /**
     * @return OdooRelation
     */
    public function getAcquirerId(): OdooRelation
    {
        return $this->acquirer_id;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return string|null
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirer_reference;
    }

    /**
     * @param string|null $partner_phone
     */
    public function setPartnerPhone(?string $partner_phone): void
    {
        $this->partner_phone = $partner_phone;
    }

    /**
     * @param string|null $partner_zip
     */
    public function setPartnerZip(?string $partner_zip): void
    {
        $this->partner_zip = $partner_zip;
    }

    /**
     * @return string|null
     */
    public function getPartnerPhone(): ?string
    {
        return $this->partner_phone;
    }

    /**
     * @param OdooRelation $partner_country_id
     */
    public function setPartnerCountryId(OdooRelation $partner_country_id): void
    {
        $this->partner_country_id = $partner_country_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPartnerCountryId(): OdooRelation
    {
        return $this->partner_country_id;
    }

    /**
     * @param string|null $partner_city
     */
    public function setPartnerCity(?string $partner_city): void
    {
        $this->partner_city = $partner_city;
    }

    /**
     * @return string|null
     */
    public function getPartnerCity(): ?string
    {
        return $this->partner_city;
    }

    /**
     * @param string|null $partner_address
     */
    public function setPartnerAddress(?string $partner_address): void
    {
        $this->partner_address = $partner_address;
    }

    /**
     * @return string|null
     */
    public function getPartnerAddress(): ?string
    {
        return $this->partner_address;
    }

    /**
     * @return string|null
     */
    public function getPartnerZip(): ?string
    {
        return $this->partner_zip;
    }

    /**
     * @param string|null $acquirer_reference
     */
    public function setAcquirerReference(?string $acquirer_reference): void
    {
        $this->acquirer_reference = $acquirer_reference;
    }

    /**
     * @param string|null $partner_email
     */
    public function setPartnerEmail(?string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @return string|null
     */
    public function getPartnerEmail(): ?string
    {
        return $this->partner_email;
    }

    /**
     * @param string|null $partner_lang
     */
    public function setPartnerLang(?string $partner_lang): void
    {
        $this->partner_lang = $partner_lang;
    }

    /**
     * @return string|null
     */
    public function getPartnerLang(): ?string
    {
        return $this->partner_lang;
    }

    /**
     * @param string|null $partner_name
     */
    public function setPartnerName(?string $partner_name): void
    {
        $this->partner_name = $partner_name;
    }

    /**
     * @return string|null
     */
    public function getPartnerName(): ?string
    {
        return $this->partner_name;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.transaction';
    }
}
