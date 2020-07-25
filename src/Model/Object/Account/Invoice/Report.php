<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.invoice.report
 * Name : account.invoice.report
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
final class Report extends Base
{
    /**
     * Move
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Invoice #
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Partner
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
     * Partner Company
     * ---
     * Commercial Entity
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $commercial_partner_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Salesperson
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_user_id;

    /**
     * Type
     * ---
     * Selection : (default value, usually null)
     *     -> out_invoice (Customer Invoice)
     *     -> in_invoice (Vendor Bill)
     *     -> out_refund (Customer Credit Note)
     *     -> in_refund (Vendor Credit Note)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $type;

    /**
     * Invoice Status
     * ---
     * Selection : (default value, usually null)
     *     -> draft (Draft)
     *     -> posted (Open)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Payment Status
     * ---
     * Selection : (default value, usually null)
     *     -> not_paid (Not Paid)
     *     -> in_payment (In Payment)
     *     -> paid (paid)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $invoice_payment_state;

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
     * Invoice Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $invoice_date;

    /**
     * Payment Terms
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_payment_term_id;

    /**
     * Bank Account
     * ---
     * Relation : many2one (res.partner.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_partner_bank_id;

    /**
     * Line Count
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nbr_lines;

    /**
     * Due Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $residual;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_total;

    /**
     * Product Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $quantity;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_uom_id;

    /**
     * Product Category
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_categ_id;

    /**
     * Due Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $invoice_date_due;

    /**
     * Revenue/Expense Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Untaxed Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_subtotal;

    /**
     * Average Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_average;

    /**
     * Sales Team
     * ---
     * Relation : many2one (crm.team)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Team
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * @return OdooRelation|null
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductUomId(): ?OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param OdooRelation|null $invoice_partner_bank_id
     */
    public function setInvoicePartnerBankId(?OdooRelation $invoice_partner_bank_id): void
    {
        $this->invoice_partner_bank_id = $invoice_partner_bank_id;
    }

    /**
     * @return int|null
     */
    public function getNbrLines(): ?int
    {
        return $this->nbr_lines;
    }

    /**
     * @param int|null $nbr_lines
     */
    public function setNbrLines(?int $nbr_lines): void
    {
        $this->nbr_lines = $nbr_lines;
    }

    /**
     * @return float|null
     */
    public function getResidual(): ?float
    {
        return $this->residual;
    }

    /**
     * @param float|null $residual
     */
    public function setResidual(?float $residual): void
    {
        $this->residual = $residual;
    }

    /**
     * @return float|null
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @param float|null $amount_total
     */
    public function setAmountTotal(?float $amount_total): void
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param OdooRelation|null $product_uom_id
     */
    public function setProductUomId(?OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param OdooRelation|null $invoice_payment_term_id
     */
    public function setInvoicePaymentTermId(?OdooRelation $invoice_payment_term_id): void
    {
        $this->invoice_payment_term_id = $invoice_payment_term_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductCategId(): ?OdooRelation
    {
        return $this->product_categ_id;
    }

    /**
     * @param OdooRelation|null $product_categ_id
     */
    public function setProductCategId(?OdooRelation $product_categ_id): void
    {
        $this->product_categ_id = $product_categ_id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getInvoiceDateDue(): ?DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @param DateTimeInterface|null $invoice_date_due
     */
    public function setInvoiceDateDue(?DateTimeInterface $invoice_date_due): void
    {
        $this->invoice_date_due = $invoice_date_due;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return float|null
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @param float|null $price_subtotal
     */
    public function setPriceSubtotal(?float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
    }

    /**
     * @return float|null
     */
    public function getPriceAverage(): ?float
    {
        return $this->price_average;
    }

    /**
     * @param float|null $price_average
     */
    public function setPriceAverage(?float $price_average): void
    {
        $this->price_average = $price_average;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoicePartnerBankId(): ?OdooRelation
    {
        return $this->invoice_partner_bank_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoicePaymentTermId(): ?OdooRelation
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
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
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param DateTimeInterface|null $invoice_date
     */
    public function setInvoiceDate(?DateTimeInterface $invoice_date): void
    {
        $this->invoice_date = $invoice_date;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceUserId(): ?OdooRelation
    {
        return $this->invoice_user_id;
    }

    /**
     * @param OdooRelation|null $invoice_user_id
     */
    public function setInvoiceUserId(?OdooRelation $invoice_user_id): void
    {
        $this->invoice_user_id = $invoice_user_id;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getInvoicePaymentState(): ?string
    {
        return $this->invoice_payment_state;
    }

    /**
     * @param string|null $invoice_payment_state
     */
    public function setInvoicePaymentState(?string $invoice_payment_state): void
    {
        $this->invoice_payment_state = $invoice_payment_state;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.invoice.report';
    }
}
