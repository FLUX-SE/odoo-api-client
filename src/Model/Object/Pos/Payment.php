<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.payment
 * ---
 * Name : pos.payment
 * ---
 * Info :
 * Used to register payments made in a pos.order.
 *
 *         See `payment_ids` field of pos.order model.
 *         The main characteristics of pos.payment can be read from
 *         `payment_method_id`.
 */
final class Payment extends Base
{
    /**
     * Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Order
     * ---
     * Relation : many2one (pos.order)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pos_order_id;

    /**
     * Amount
     * ---
     * Total amount of the payment.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount;

    /**
     * Payment Method
     * ---
     * Relation : many2one (pos.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_method_id;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $payment_date;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Conversion Rate
     * ---
     * Conversion rate from company currency to order currency.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $currency_rate;

    /**
     * Customer
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Session
     * ---
     * Relation : many2one (pos.session)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $session_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Type of card used
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $card_type;

    /**
     * Payment Transaction ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $transaction_id;

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
     * @param OdooRelation $pos_order_id Order
     *        ---
     *        Relation : many2one (pos.order)
     *        @see \Flux\OdooApiClient\Model\Object\Pos\Order
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Amount
     *        ---
     *        Total amount of the payment.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $payment_method_id Payment Method
     *        ---
     *        Relation : many2one (pos.payment.method)
     *        @see \Flux\OdooApiClient\Model\Object\Pos\Payment\Method
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $payment_date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $pos_order_id,
        float $amount,
        OdooRelation $payment_method_id,
        DateTimeInterface $payment_date
    ) {
        $this->pos_order_id = $pos_order_id;
        $this->amount = $amount;
        $this->payment_method_id = $payment_method_id;
        $this->payment_date = $payment_date;
    }

    /**
     * @param OdooRelation|null $session_id
     */
    public function setSessionId(?OdooRelation $session_id): void
    {
        $this->session_id = $session_id;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $transaction_id
     */
    public function setTransactionId(?string $transaction_id): void
    {
        $this->transaction_id = $transaction_id;
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }

    /**
     * @param string|null $card_type
     */
    public function setCardType(?string $card_type): void
    {
        $this->card_type = $card_type;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->card_type;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSessionId(): ?OdooRelation
    {
        return $this->session_id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $payment_method_id
     */
    public function setPaymentMethodId(OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     */
    public function getPosOrderId(): OdooRelation
    {
        return $this->pos_order_id;
    }

    /**
     * @param OdooRelation $pos_order_id
     */
    public function setPosOrderId(OdooRelation $pos_order_id): void
    {
        $this->pos_order_id = $pos_order_id;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return OdooRelation
     */
    public function getPaymentMethodId(): OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getPaymentDate(): DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return float|null
     */
    public function getCurrencyRate(): ?float
    {
        return $this->currency_rate;
    }

    /**
     * @param float|null $currency_rate
     */
    public function setCurrencyRate(?float $currency_rate): void
    {
        $this->currency_rate = $currency_rate;
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
        return 'pos.payment';
    }
}
