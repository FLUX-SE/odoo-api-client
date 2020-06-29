<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Product\Category;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Bank;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : account.invoice.report
 * Name : account.invoice.report
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Report extends Base
{
    /**
     * Move
     *
     * @var null|Move
     */
    private $move_id;

    /**
     * Invoice #
     *
     * @var null|string
     */
    private $name;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Partner Company
     * Commercial Entity
     *
     * @var null|Partner
     */
    private $commercial_partner_id;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $invoice_user_id;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Invoice Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Payment Status
     *
     * @var null|array
     */
    private $invoice_payment_state;

    /**
     * Fiscal Position
     *
     * @var null|Position
     */
    private $fiscal_position_id;

    /**
     * Invoice Date
     *
     * @var null|DateTimeInterface
     */
    private $invoice_date;

    /**
     * Payment Terms
     *
     * @var null|Term
     */
    private $invoice_payment_term_id;

    /**
     * Bank Account
     *
     * @var null|Bank
     */
    private $invoice_partner_bank_id;

    /**
     * Line Count
     *
     * @var null|int
     */
    private $nbr_lines;

    /**
     * Due Amount
     *
     * @var null|float
     */
    private $residual;

    /**
     * Total
     *
     * @var null|float
     */
    private $amount_total;

    /**
     * Product Quantity
     *
     * @var null|float
     */
    private $quantity;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom_id;

    /**
     * Product Category
     *
     * @var null|Category
     */
    private $product_categ_id;

    /**
     * Due Date
     *
     * @var null|DateTimeInterface
     */
    private $invoice_date_due;

    /**
     * Revenue/Expense Account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Untaxed Total
     *
     * @var null|float
     */
    private $price_subtotal;

    /**
     * Average Price
     *
     * @var null|float
     */
    private $price_average;

    /**
     * Sales Team
     *
     * @var null|Team
     */
    private $team_id;

    /**
     * @return null|Move
     */
    public function getMoveId(): ?Move
    {
        return $this->move_id;
    }

    /**
     * @return null|Bank
     */
    public function getInvoicePartnerBankId(): ?Bank
    {
        return $this->invoice_partner_bank_id;
    }

    /**
     * @return null|float
     */
    public function getPriceAverage(): ?float
    {
        return $this->price_average;
    }

    /**
     * @return null|float
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @return null|Account
     */
    public function getAccountId(): ?Account
    {
        return $this->account_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getInvoiceDateDue(): ?DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @return null|Category
     */
    public function getProductCategId(): ?Category
    {
        return $this->product_categ_id;
    }

    /**
     * @return null|Uom
     */
    public function getProductUomId(): ?Uom
    {
        return $this->product_uom_id;
    }

    /**
     * @return null|Product
     */
    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    /**
     * @return null|float
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @return null|float
     */
    public function getAmountTotal(): ?float
    {
        return $this->amount_total;
    }

    /**
     * @return null|float
     */
    public function getResidual(): ?float
    {
        return $this->residual;
    }

    /**
     * @return null|int
     */
    public function getNbrLines(): ?int
    {
        return $this->nbr_lines;
    }

    /**
     * @return null|Term
     */
    public function getInvoicePaymentTermId(): ?Term
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getInvoiceDate(): ?DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @return null|Position
     */
    public function getFiscalPositionId(): ?Position
    {
        return $this->fiscal_position_id;
    }

    /**
     * @return null|array
     */
    public function getInvoicePaymentState(): ?array
    {
        return $this->invoice_payment_state;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|array
     */
    public function getType(): ?array
    {
        return $this->type;
    }

    /**
     * @return null|Users
     */
    public function getInvoiceUserId(): ?Users
    {
        return $this->invoice_user_id;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|Partner $commercial_partner_id
     */
    public function setCommercialPartnerId(?Partner $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Journal
     */
    public function getJournalId(): ?Journal
    {
        return $this->journal_id;
    }

    /**
     * @param null|Team $team_id
     */
    public function setTeamId(?Team $team_id): void
    {
        $this->team_id = $team_id;
    }
}
