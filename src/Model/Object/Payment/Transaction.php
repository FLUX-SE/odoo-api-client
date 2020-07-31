<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : payment.transaction
 * ---
 * Name : payment.transaction
 * ---
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
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Acquirer
     * ---
     * Relation : many2one (payment.acquirer)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Acquirer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $acquirer_id;

    /**
     * Provider
     * ---
     * Selection :
     *     -> manual (Custom Payment Form)
     *     -> transfer (Manual Payment)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $provider;

    /**
     * Type
     * ---
     * Selection :
     *     -> validation (Validation of the bank card)
     *     -> server2server (Server To Server)
     *     -> form (Form)
     *     -> form_save (Form with tokenization)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * Status
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> pending (Pending)
     *     -> authorized (Authorized)
     *     -> done (Done)
     *     -> cancel (Canceled)
     *     -> error (Error)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * Message
     * ---
     * Field used to store error and/or validation messages for information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state_message;

    /**
     * Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Fees
     * ---
     * Fees amount; set by the system because depends on the acquirer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Reference
     * ---
     * Internal reference of the TX
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reference;

    /**
     * Acquirer Reference
     * ---
     * Reference of the TX as stored in the acquirer database
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $acquirer_reference;

    /**
     * Customer
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Partner Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_name;

    /**
     * Language
     * ---
     * Selection :
     *     -> en_US (English (US))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_lang;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_email;

    /**
     * Zip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_zip;

    /**
     * Address
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_address;

    /**
     * City
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_city;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_country_id;

    /**
     * Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partner_phone;

    /**
     * 3D Secure HTML
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $html_3ds;

    /**
     * Callback Document Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $callback_model_id;

    /**
     * Callback Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $callback_res_id;

    /**
     * Callback Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $callback_method;

    /**
     * Callback Hash
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $callback_hash;

    /**
     * Return URL after payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $return_url;

    /**
     * Has the payment been post processed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_processed;

    /**
     * Payment Token
     * ---
     * Relation : many2one (payment.token)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_token_id;

    /**
     * Payment
     * ---
     * Relation : many2one (account.payment)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_id;

    /**
     * Invoices
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * # of Invoices
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invoice_ids_nbr;

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
     * @param OdooRelation $acquirer_id Acquirer
     *        ---
     *        Relation : many2one (payment.acquirer)
     *        @see \Flux\OdooApiClient\Model\Object\Payment\Acquirer
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        Selection :
     *            -> validation (Validation of the bank card)
     *            -> server2server (Server To Server)
     *            -> form (Form)
     *            -> form_save (Form with tokenization)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        ---
     *        Selection :
     *            -> draft (Draft)
     *            -> pending (Pending)
     *            -> authorized (Authorized)
     *            -> done (Done)
     *            -> cancel (Canceled)
     *            -> error (Error)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Amount
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $reference Reference
     *        ---
     *        Internal reference of the TX
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_country_id Country
     *        ---
     *        Relation : many2one (res.country)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Country
     *        ---
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
     * @param string|null $callback_method
     */
    public function setCallbackMethod(?string $callback_method): void
    {
        $this->callback_method = $callback_method;
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
     *
     * @SerializedName("is_processed")
     */
    public function isIsProcessed(): ?bool
    {
        return $this->is_processed;
    }

    /**
     * @param string|null $return_url
     */
    public function setReturnUrl(?string $return_url): void
    {
        $this->return_url = $return_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("return_url")
     */
    public function getReturnUrl(): ?string
    {
        return $this->return_url;
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
     *
     * @SerializedName("callback_hash")
     */
    public function getCallbackHash(): ?string
    {
        return $this->callback_hash;
    }

    /**
     * @return string|null
     *
     * @SerializedName("callback_method")
     */
    public function getCallbackMethod(): ?string
    {
        return $this->callback_method;
    }

    /**
     * @param OdooRelation|null $payment_token_id
     */
    public function setPaymentTokenId(?OdooRelation $payment_token_id): void
    {
        $this->payment_token_id = $payment_token_id;
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
     *
     * @SerializedName("callback_res_id")
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
     * @return OdooRelation|null
     *
     * @SerializedName("callback_model_id")
     */
    public function getCallbackModelId(): ?OdooRelation
    {
        return $this->callback_model_id;
    }

    /**
     * @param string|null $html_3ds
     */
    public function setHtml3ds(?string $html_3ds): void
    {
        $this->html_3ds = $html_3ds;
    }

    /**
     * @return string|null
     *
     * @SerializedName("html_3ds")
     */
    public function getHtml3ds(): ?string
    {
        return $this->html_3ds;
    }

    /**
     * @param string|null $partner_phone
     */
    public function setPartnerPhone(?string $partner_phone): void
    {
        $this->partner_phone = $partner_phone;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_token_id")
     */
    public function getPaymentTokenId(): ?OdooRelation
    {
        return $this->payment_token_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("payment_id")
     */
    public function getPaymentId(): ?OdooRelation
    {
        return $this->payment_id;
    }

    /**
     * @param OdooRelation $partner_country_id
     */
    public function setPartnerCountryId(OdooRelation $partner_country_id): void
    {
        $this->partner_country_id = $partner_country_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $payment_id
     */
    public function setPaymentId(?OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
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
     *
     * @SerializedName("invoice_ids_nbr")
     */
    public function getInvoiceIdsNbr(): ?int
    {
        return $this->invoice_ids_nbr;
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
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_ids")
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_phone")
     */
    public function getPartnerPhone(): ?string
    {
        return $this->partner_phone;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_country_id")
     */
    public function getPartnerCountryId(): OdooRelation
    {
        return $this->partner_country_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
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
     *
     * @SerializedName("fees")
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
     *
     * @SerializedName("amount")
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
     * @return string|null
     *
     * @SerializedName("state_message")
     */
    public function getStateMessage(): ?string
    {
        return $this->state_message;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     *
     * @SerializedName("type")
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
     *
     * @SerializedName("provider")
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
     *
     * @SerializedName("acquirer_id")
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
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return string
     *
     * @SerializedName("reference")
     */
    public function getReference(): string
    {
        return $this->reference;
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
     *
     * @SerializedName("partner_email")
     */
    public function getPartnerEmail(): ?string
    {
        return $this->partner_email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_city")
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
     *
     * @SerializedName("partner_address")
     */
    public function getPartnerAddress(): ?string
    {
        return $this->partner_address;
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
     *
     * @SerializedName("partner_zip")
     */
    public function getPartnerZip(): ?string
    {
        return $this->partner_zip;
    }

    /**
     * @param string|null $partner_email
     */
    public function setPartnerEmail(?string $partner_email): void
    {
        $this->partner_email = $partner_email;
    }

    /**
     * @param string|null $partner_lang
     */
    public function setPartnerLang(?string $partner_lang): void
    {
        $this->partner_lang = $partner_lang;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partner_lang")
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
     *
     * @SerializedName("partner_name")
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
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param string|null $acquirer_reference
     */
    public function setAcquirerReference(?string $acquirer_reference): void
    {
        $this->acquirer_reference = $acquirer_reference;
    }

    /**
     * @return string|null
     *
     * @SerializedName("acquirer_reference")
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirer_reference;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.transaction';
    }
}
