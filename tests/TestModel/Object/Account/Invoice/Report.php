<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Invoice;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.invoice.report
 * ---
 * Name : account.invoice.report
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
final class Report extends Base
{
    /**
     * Move
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $move_id;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Company Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_user_id;

    /**
     * Move Type
     * ---
     * Selection :
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
    private $move_type;

    /**
     * Invoice Status
     * ---
     * Selection :
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
     * Selection :
     *     -> not_paid (Not Paid)
     *     -> in_payment (In Payment)
     *     -> paid (paid)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_state;

    /**
     * Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Fiscal\Position
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Product
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Uom\Uom
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Category
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
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
     * @return OdooRelation|null
     *
     * @SerializedName("move_id")
     */
    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_categ_id")
     */
    public function getProductCategId(): ?OdooRelation
    {
        return $this->product_categ_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("invoice_date")
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @param DateTimeInterface|null $invoice_date
     */
    public function setInvoiceDate(?DateTimeInterface $invoice_date): void
    {
        $this->invoice_date = $invoice_date;
    }

    /**
     * @return float|null
     *
     * @SerializedName("quantity")
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
     *
     * @SerializedName("product_id")
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
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_id")
     */
    public function getProductUomId(): ?OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param OdooRelation|null $product_uom_id
     */
    public function setProductUomId(?OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param OdooRelation|null $product_categ_id
     */
    public function setProductCategId(?OdooRelation $product_categ_id): void
    {
        $this->product_categ_id = $product_categ_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("fiscal_position_id")
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("invoice_date_due")
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
     *
     * @SerializedName("account_id")
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
     *
     * @SerializedName("price_subtotal")
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
     *
     * @SerializedName("price_average")
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
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @param string|null $payment_state
     */
    public function setPaymentState(?string $payment_state): void
    {
        $this->payment_state = $payment_state;
    }

    /**
     * @param OdooRelation|null $move_id
     */
    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("commercial_partner_id")
     */
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
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
     *
     * @SerializedName("company_id")
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
     *
     * @SerializedName("company_currency_id")
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     *
     * @SerializedName("payment_state")
     */
    public function getPaymentState(): ?string
    {
        return $this->payment_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
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
     *
     * @SerializedName("invoice_user_id")
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
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): ?string
    {
        return $this->move_type;
    }

    /**
     * @param string|null $move_type
     */
    public function setMoveType(?string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.invoice.report';
    }
}
