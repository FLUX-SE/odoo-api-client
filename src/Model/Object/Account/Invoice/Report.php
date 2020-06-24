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
 *
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
     * @var Move
     */
    private $move_id;

    /**
     * Invoice #
     *
     * @var string
     */
    private $name;

    /**
     * Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Partner Company
     *
     * @var Partner
     */
    private $commercial_partner_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $invoice_user_id;

    /**
     * Type
     *
     * @var array
     */
    private $type;

    /**
     * Invoice Status
     *
     * @var array
     */
    private $state;

    /**
     * Payment Status
     *
     * @var array
     */
    private $invoice_payment_state;

    /**
     * Fiscal Position
     *
     * @var Position
     */
    private $fiscal_position_id;

    /**
     * Invoice Date
     *
     * @var DateTimeInterface
     */
    private $invoice_date;

    /**
     * Payment Terms
     *
     * @var Term
     */
    private $invoice_payment_term_id;

    /**
     * Bank Account
     *
     * @var Bank
     */
    private $invoice_partner_bank_id;

    /**
     * Line Count
     *
     * @var int
     */
    private $nbr_lines;

    /**
     * Due Amount
     *
     * @var float
     */
    private $residual;

    /**
     * Total
     *
     * @var float
     */
    private $amount_total;

    /**
     * Product Quantity
     *
     * @var float
     */
    private $quantity;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom_id;

    /**
     * Product Category
     *
     * @var Category
     */
    private $product_categ_id;

    /**
     * Due Date
     *
     * @var DateTimeInterface
     */
    private $invoice_date_due;

    /**
     * Revenue/Expense Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Untaxed Total
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Average Price
     *
     * @var float
     */
    private $price_average;

    /**
     * Sales Team
     *
     * @var Team
     */
    private $team_id;

    /**
     * @return Move
     */
    public function getMoveId(): Move
    {
        return $this->move_id;
    }

    /**
     * @return Bank
     */
    public function getInvoicePartnerBankId(): Bank
    {
        return $this->invoice_partner_bank_id;
    }

    /**
     * @return float
     */
    public function getPriceAverage(): float
    {
        return $this->price_average;
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @return Account
     */
    public function getAccountId(): Account
    {
        return $this->account_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getInvoiceDateDue(): DateTimeInterface
    {
        return $this->invoice_date_due;
    }

    /**
     * @return Category
     */
    public function getProductCategId(): Category
    {
        return $this->product_categ_id;
    }

    /**
     * @return Uom
     */
    public function getProductUomId(): Uom
    {
        return $this->product_uom_id;
    }

    /**
     * @return Product
     */
    public function getProductId(): Product
    {
        return $this->product_id;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getAmountTotal(): float
    {
        return $this->amount_total;
    }

    /**
     * @return float
     */
    public function getResidual(): float
    {
        return $this->residual;
    }

    /**
     * @return int
     */
    public function getNbrLines(): int
    {
        return $this->nbr_lines;
    }

    /**
     * @return Term
     */
    public function getInvoicePaymentTermId(): Term
    {
        return $this->invoice_payment_term_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getInvoiceDate(): DateTimeInterface
    {
        return $this->invoice_date;
    }

    /**
     * @return Position
     */
    public function getFiscalPositionId(): Position
    {
        return $this->fiscal_position_id;
    }

    /**
     * @return array
     */
    public function getInvoicePaymentState(): array
    {
        return $this->invoice_payment_state;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return Users
     */
    public function getInvoiceUserId(): Users
    {
        return $this->invoice_user_id;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param Partner $commercial_partner_id
     */
    public function setCommercialPartnerId(Partner $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @param Team $team_id
     */
    public function setTeamId(Team $team_id): void
    {
        $this->team_id = $team_id;
    }
}
