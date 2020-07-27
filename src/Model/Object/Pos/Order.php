<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.order
 * ---
 * Name : pos.order
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Order extends Base
{
    /**
     * Order Ref
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_order;

    /**
     * Responsible
     * ---
     * Person who uses the cash register. It can be a reliever, a student or an interim employee.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Taxes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount_tax;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount_total;

    /**
     * Paid
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount_paid;

    /**
     * Returned
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $amount_return;

    /**
     * Order Lines
     * ---
     * Relation : one2many (pos.order.line -> order_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Order\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $lines;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Pricelist
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pricelist_id;

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
     * Sequence Number
     * ---
     * A session-unique sequence number for the order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence_number;

    /**
     * Session
     * ---
     * Relation : many2one (pos.session)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $session_id;

    /**
     * Point of Sale
     * ---
     * The physical point of sale you will use.
     * ---
     * Relation : many2one (pos.config)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Config
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $config_id;

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
     * Currency Rate
     * ---
     * The rate of the currency to the currency of rate 1 applicable at the date of the order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $currency_rate;

    /**
     * Invoicing
     * ---
     * Enables invoice generation from the Point of Sale.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $invoice_group;

    /**
     * Status
     * ---
     * Selection : (default value, usually null)
     *     -> draft (New)
     *     -> cancel (Cancelled)
     *     -> paid (Paid)
     *     -> done (Posted)
     *     -> invoiced (Invoiced)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Invoice
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_move;

    /**
     * Picking
     * ---
     * Relation : many2one (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $picking_id;

    /**
     * Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $picking_type_id;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_id;

    /**
     * Internal Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Number of Print
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nb_print;

    /**
     * Receipt Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $pos_reference;

    /**
     * Sales Journal
     * ---
     * Accounting journal used to post sales entries.
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_journal;

    /**
     * Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Payments
     * ---
     * Relation : one2many (pos.payment -> pos_order_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Payment
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_ids;

    /**
     * Session Journal Entry
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $session_move_id;

    /**
     * To invoice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_invoice;

    /**
     * Is Invoiced
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_invoiced;

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
     * @param string $name Order Ref
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount_tax Taxes
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount_total Total
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount_paid Paid
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount_return Returned
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $pricelist_id Pricelist
     *        ---
     *        Relation : many2one (product.pricelist)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $session_id Session
     *        ---
     *        Relation : many2one (pos.session)
     *        @see \Flux\OdooApiClient\Model\Object\Pos\Session
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        float $amount_tax,
        float $amount_total,
        float $amount_paid,
        float $amount_return,
        OdooRelation $company_id,
        OdooRelation $pricelist_id,
        OdooRelation $session_id
    ) {
        $this->name = $name;
        $this->amount_tax = $amount_tax;
        $this->amount_total = $amount_total;
        $this->amount_paid = $amount_paid;
        $this->amount_return = $amount_return;
        $this->company_id = $company_id;
        $this->pricelist_id = $pricelist_id;
        $this->session_id = $session_id;
    }

    /**
     * @return int|null
     */
    public function getNbPrint(): ?int
    {
        return $this->nb_print;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation|null $sale_journal
     */
    public function setSaleJournal(?OdooRelation $sale_journal): void
    {
        $this->sale_journal = $sale_journal;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSaleJournal(): ?OdooRelation
    {
        return $this->sale_journal;
    }

    /**
     * @param string|null $pos_reference
     */
    public function setPosReference(?string $pos_reference): void
    {
        $this->pos_reference = $pos_reference;
    }

    /**
     * @return string|null
     */
    public function getPosReference(): ?string
    {
        return $this->pos_reference;
    }

    /**
     * @param int|null $nb_print
     */
    public function setNbPrint(?int $nb_print): void
    {
        $this->nb_print = $nb_print;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPaymentIds(): ?array
    {
        return $this->payment_ids;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param OdooRelation|null $location_id
     */
    public function setLocationId(?OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLocationId(): ?OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation|null $picking_type_id
     */
    public function setPickingTypeId(?OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickingTypeId(): ?OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation|null $picking_id
     */
    public function setPickingId(?OdooRelation $picking_id): void
    {
        $this->picking_id = $picking_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickingId(): ?OdooRelation
    {
        return $this->picking_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @param OdooRelation[]|null $payment_ids
     */
    public function setPaymentIds(?array $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountMove(): ?OdooRelation
    {
        return $this->account_move;
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
     * @param bool|null $is_invoiced
     */
    public function setIsInvoiced(?bool $is_invoiced): void
    {
        $this->is_invoiced = $is_invoiced;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentIds(OdooRelation $item): bool
    {
        if (null === $this->payment_ids) {
            return false;
        }

        return in_array($item, $this->payment_ids);
    }

    /**
     * @return bool|null
     */
    public function isIsInvoiced(): ?bool
    {
        return $this->is_invoiced;
    }

    /**
     * @param bool|null $to_invoice
     */
    public function setToInvoice(?bool $to_invoice): void
    {
        $this->to_invoice = $to_invoice;
    }

    /**
     * @return bool|null
     */
    public function isToInvoice(): ?bool
    {
        return $this->to_invoice;
    }

    /**
     * @param OdooRelation|null $session_move_id
     */
    public function setSessionMoveId(?OdooRelation $session_move_id): void
    {
        $this->session_move_id = $session_move_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSessionMoveId(): ?OdooRelation
    {
        return $this->session_move_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentIds(OdooRelation $item): void
    {
        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        if ($this->hasPaymentIds($item)) {
            $index = array_search($item, $this->payment_ids);
            unset($this->payment_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIds($item)) {
            return;
        }

        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        $this->payment_ids[] = $item;
    }

    /**
     * @param OdooRelation|null $account_move
     */
    public function setAccountMove(?OdooRelation $account_move): void
    {
        $this->account_move = $account_move;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $amount_total
     */
    public function setAmountTotal(float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLines(OdooRelation $item): bool
    {
        if (null === $this->lines) {
            return false;
        }

        return in_array($item, $this->lines);
    }

    /**
     * @param OdooRelation[]|null $lines
     */
    public function setLines(?array $lines): void
    {
        $this->lines = $lines;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLines(): ?array
    {
        return $this->lines;
    }

    /**
     * @param float $amount_return
     */
    public function setAmountReturn(float $amount_return): void
    {
        $this->amount_return = $amount_return;
    }

    /**
     * @return float
     */
    public function getAmountReturn(): float
    {
        return $this->amount_return;
    }

    /**
     * @param float $amount_paid
     */
    public function setAmountPaid(float $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }

    /**
     * @return float
     */
    public function getAmountPaid(): float
    {
        return $this->amount_paid;
    }

    /**
     * @return float
     */
    public function getAmountTotal(): float
    {
        return $this->amount_total;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLines(OdooRelation $item): void
    {
        if (null === $this->lines) {
            $this->lines = [];
        }

        if ($this->hasLines($item)) {
            $index = array_search($item, $this->lines);
            unset($this->lines[$index]);
        }
    }

    /**
     * @param float $amount_tax
     */
    public function setAmountTax(float $amount_tax): void
    {
        $this->amount_tax = $amount_tax;
    }

    /**
     * @return float
     */
    public function getAmountTax(): float
    {
        return $this->amount_tax;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param DateTimeInterface|null $date_order
     */
    public function setDateOrder(?DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addLines(OdooRelation $item): void
    {
        if ($this->hasLines($item)) {
            return;
        }

        if (null === $this->lines) {
            $this->lines = [];
        }

        $this->lines[] = $item;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getConfigId(): ?OdooRelation
    {
        return $this->config_id;
    }

    /**
     * @param bool|null $invoice_group
     */
    public function setInvoiceGroup(?bool $invoice_group): void
    {
        $this->invoice_group = $invoice_group;
    }

    /**
     * @return bool|null
     */
    public function isInvoiceGroup(): ?bool
    {
        return $this->invoice_group;
    }

    /**
     * @param float|null $currency_rate
     */
    public function setCurrencyRate(?float $currency_rate): void
    {
        $this->currency_rate = $currency_rate;
    }

    /**
     * @return float|null
     */
    public function getCurrencyRate(): ?float
    {
        return $this->currency_rate;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $config_id
     */
    public function setConfigId(?OdooRelation $config_id): void
    {
        $this->config_id = $config_id;
    }

    /**
     * @param OdooRelation $session_id
     */
    public function setSessionId(OdooRelation $session_id): void
    {
        $this->session_id = $session_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     */
    public function getSessionId(): OdooRelation
    {
        return $this->session_id;
    }

    /**
     * @param int|null $sequence_number
     */
    public function setSequenceNumber(?int $sequence_number): void
    {
        $this->sequence_number = $sequence_number;
    }

    /**
     * @return int|null
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequence_number;
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
     * @param OdooRelation $pricelist_id
     */
    public function setPricelistId(OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPricelistId(): OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.order';
    }
}
