<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.move.line
 * ---
 * Name : account.move.line
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
final class Line extends Base
{
    /**
     * Journal Entry
     * ---
     * The move of this entry line.
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $move_id;

    /**
     * Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $move_name;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ref;

    /**
     * Status
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> posted (Posted)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_state;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
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
     * Company related to this journal
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
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
     * Utility field to express amount currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Fiscal Country
     * ---
     * The country to use the tax reports from for this company
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_fiscal_country_id;

    /**
     * Account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Internal Type
     * ---
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     * ---
     * Selection :
     *     -> other (Regular)
     *     -> receivable (Receivable)
     *     -> payable (Payable)
     *     -> liquidity (Liquidity)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $account_internal_type;

    /**
     * Internal Group
     * ---
     * The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     * ---
     * Selection :
     *     -> equity (Equity)
     *     -> asset (Asset)
     *     -> liability (Liability)
     *     -> income (Income)
     *     -> expense (Expense)
     *     -> off_balance (Off Balance)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $account_internal_group;

    /**
     * Account Root
     * ---
     * Relation : many2one (account.root)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Root
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_root_id;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

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
     * Quantity
     * ---
     * The optional quantity expressed by this line, eg: number of product sold. The quantity is not a legal
     * requirement but is very useful for some reports.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $quantity;

    /**
     * Unit Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_unit;

    /**
     * Discount (%)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

    /**
     * Debit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $debit;

    /**
     * Credit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $credit;

    /**
     * Balance
     * ---
     * Technical field holding the debit - credit in order to open meaningful graph views from reports
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance;

    /**
     * Cumulated Balance
     * ---
     * Cumulated balance depending on the domain and the order chosen in the view.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $cumulated_balance;

    /**
     * Amount in Currency
     * ---
     * The amount expressed in an optional other currency if it is a multi-currency entry.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_currency;

    /**
     * Subtotal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_subtotal;

    /**
     * Total
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Reconciled
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $reconciled;

    /**
     * No Follow-up
     * ---
     * You can check this box to mark this journal item as a litigation with the associated partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $blocked;

    /**
     * Due Date
     * ---
     * This field is used for payable and receivable journal entries. You can put the limit date for the payment of
     * this line.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_maturity;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Unit of Measure
     * ---
     * Relation : many2one (uom.uom)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_uom_id;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Category
     * ---
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     * ---
     * Relation : many2one (uom.category)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Uom\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_uom_category_id;

    /**
     * Reconciliation Model
     * ---
     * Relation : many2one (account.reconcile.model)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Reconcile\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $reconcile_model_id;

    /**
     * Originator Payment
     * ---
     * The payment that created this entry
     * ---
     * Relation : many2one (account.payment)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Payment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $payment_id;

    /**
     * Originator Statement Line
     * ---
     * The statement line that created this entry
     * ---
     * Relation : many2one (account.bank.statement.line)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $statement_line_id;

    /**
     * Statement
     * ---
     * The bank statement used for bank reconciliation
     * ---
     * Relation : many2one (account.bank.statement)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Bank\Statement
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $statement_id;

    /**
     * Taxes
     * ---
     * Taxes that apply on the base amount
     * ---
     * Relation : many2many (account.tax)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Originator Tax
     * ---
     * Indicates that this journal item is a tax line
     * ---
     * Relation : many2one (account.tax)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_line_id;

    /**
     * Originator tax group
     * ---
     * technical field for widget tax-group-custom-field
     * ---
     * Relation : many2one (account.tax.group)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_group_id;

    /**
     * Base Amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $tax_base_amount;

    /**
     * Appears in VAT report
     * ---
     * Technical field used to mark a tax line as exigible in the vat report or not (only exigible journal items are
     * displayed). By default all new journal items are directly exigible, but with the feature cash_basis on taxes,
     * some will become exigible only when the payment is recorded.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_exigible;

    /**
     * Originator Tax Distribution Line
     * ---
     * Tax distribution line that caused the creation of this move line, if any
     * ---
     * Relation : many2one (account.tax.repartition.line)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Tax\Repartition\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_repartition_line_id;

    /**
     * Tags
     * ---
     * Tags assigned to this line by the tax creating it, if any. It determines its impact on financial reports.
     * ---
     * Relation : many2many (account.account.tag)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_tag_ids;

    /**
     * Tax Audit String
     * ---
     * Computed field, listing the tax grids impacted by this line, and the amount it applies to each of them.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $tax_audit;

    /**
     * Residual Amount
     * ---
     * The residual amount on a journal item expressed in the company currency.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_residual;

    /**
     * Residual Amount in Currency
     * ---
     * The residual amount on a journal item expressed in its currency (possibly not the company currency).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_residual_currency;

    /**
     * Matching
     * ---
     * Relation : many2one (account.full.reconcile)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Full\Reconcile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $full_reconcile_id;

    /**
     * Matched Debits
     * ---
     * Debit journal items that are matched with this journal item.
     * ---
     * Relation : one2many (account.partial.reconcile -> credit_move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Partial\Reconcile
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $matched_debit_ids;

    /**
     * Matched Credits
     * ---
     * Credit journal items that are matched with this journal item.
     * ---
     * Relation : one2many (account.partial.reconcile -> debit_move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Partial\Reconcile
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $matched_credit_ids;

    /**
     * Matching #
     * ---
     * Matching number for this line, 'P' if it is only partially reconcile, or the name of the full reconcile if it
     * exists.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $matching_number;

    /**
     * Analytic lines
     * ---
     * Relation : one2many (account.analytic.line -> move_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Analytic\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_line_ids;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Analytic Tags
     * ---
     * Relation : many2many (account.analytic.tag)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_tag_ids;

    /**
     * Recompute Tax Line
     * ---
     * Technical field used to know on which lines the taxes must be recomputed.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $recompute_tax_line;

    /**
     * Display Type
     * ---
     * Technical field for UX purpose.
     * ---
     * Selection :
     *     -> line_section (Section)
     *     -> line_note (Note)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Is Rounding Line
     * ---
     * Technical field used to retrieve the cash rounding line.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_rounding_line;

    /**
     * Exclude From Invoice Tab
     * ---
     * Technical field used to exclude some lines from the invoice_line_ids tab in the form view.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $exclude_from_invoice_tab;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $move_id Journal Entry
     *        ---
     *        The move of this entry line.
     *        ---
     *        Relation : many2one (account.move)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $move_id, OdooRelation $currency_id)
    {
        $this->move_id = $move_id;
        $this->currency_id = $currency_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_residual_currency")
     */
    public function getAmountResidualCurrency(): ?float
    {
        return $this->amount_residual_currency;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxTagIds(OdooRelation $item): void
    {
        if ($this->hasTaxTagIds($item)) {
            return;
        }

        if (null === $this->tax_tag_ids) {
            $this->tax_tag_ids = [];
        }

        $this->tax_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxTagIds(OdooRelation $item): void
    {
        if (null === $this->tax_tag_ids) {
            $this->tax_tag_ids = [];
        }

        if ($this->hasTaxTagIds($item)) {
            $index = array_search($item, $this->tax_tag_ids);
            unset($this->tax_tag_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("tax_audit")
     */
    public function getTaxAudit(): ?string
    {
        return $this->tax_audit;
    }

    /**
     * @param string|null $tax_audit
     */
    public function setTaxAudit(?string $tax_audit): void
    {
        $this->tax_audit = $tax_audit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_residual")
     */
    public function getAmountResidual(): ?float
    {
        return $this->amount_residual;
    }

    /**
     * @param float|null $amount_residual
     */
    public function setAmountResidual(?float $amount_residual): void
    {
        $this->amount_residual = $amount_residual;
    }

    /**
     * @param float|null $amount_residual_currency
     */
    public function setAmountResidualCurrency(?float $amount_residual_currency): void
    {
        $this->amount_residual_currency = $amount_residual_currency;
    }

    /**
     * @param OdooRelation[]|null $tax_tag_ids
     */
    public function setTaxTagIds(?array $tax_tag_ids): void
    {
        $this->tax_tag_ids = $tax_tag_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("full_reconcile_id")
     */
    public function getFullReconcileId(): ?OdooRelation
    {
        return $this->full_reconcile_id;
    }

    /**
     * @param OdooRelation|null $full_reconcile_id
     */
    public function setFullReconcileId(?OdooRelation $full_reconcile_id): void
    {
        $this->full_reconcile_id = $full_reconcile_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("matched_debit_ids")
     */
    public function getMatchedDebitIds(): ?array
    {
        return $this->matched_debit_ids;
    }

    /**
     * @param OdooRelation[]|null $matched_debit_ids
     */
    public function setMatchedDebitIds(?array $matched_debit_ids): void
    {
        $this->matched_debit_ids = $matched_debit_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchedDebitIds(OdooRelation $item): bool
    {
        if (null === $this->matched_debit_ids) {
            return false;
        }

        return in_array($item, $this->matched_debit_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchedDebitIds(OdooRelation $item): void
    {
        if ($this->hasMatchedDebitIds($item)) {
            return;
        }

        if (null === $this->matched_debit_ids) {
            $this->matched_debit_ids = [];
        }

        $this->matched_debit_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxTagIds(OdooRelation $item): bool
    {
        if (null === $this->tax_tag_ids) {
            return false;
        }

        return in_array($item, $this->tax_tag_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tax_tag_ids")
     */
    public function getTaxTagIds(): ?array
    {
        return $this->tax_tag_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("matched_credit_ids")
     */
    public function getMatchedCreditIds(): ?array
    {
        return $this->matched_credit_ids;
    }

    /**
     * @param OdooRelation|null $tax_line_id
     */
    public function setTaxLineId(?OdooRelation $tax_line_id): void
    {
        $this->tax_line_id = $tax_line_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tax_ids")
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIds(OdooRelation $item): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIds(OdooRelation $item): void
    {
        if ($this->hasTaxIds($item)) {
            return;
        }

        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        $this->tax_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxIds(OdooRelation $item): void
    {
        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        if ($this->hasTaxIds($item)) {
            $index = array_search($item, $this->tax_ids);
            unset($this->tax_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_line_id")
     */
    public function getTaxLineId(): ?OdooRelation
    {
        return $this->tax_line_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_group_id")
     */
    public function getTaxGroupId(): ?OdooRelation
    {
        return $this->tax_group_id;
    }

    /**
     * @param OdooRelation|null $tax_repartition_line_id
     */
    public function setTaxRepartitionLineId(?OdooRelation $tax_repartition_line_id): void
    {
        $this->tax_repartition_line_id = $tax_repartition_line_id;
    }

    /**
     * @param OdooRelation|null $tax_group_id
     */
    public function setTaxGroupId(?OdooRelation $tax_group_id): void
    {
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("tax_base_amount")
     */
    public function getTaxBaseAmount(): ?float
    {
        return $this->tax_base_amount;
    }

    /**
     * @param float|null $tax_base_amount
     */
    public function setTaxBaseAmount(?float $tax_base_amount): void
    {
        $this->tax_base_amount = $tax_base_amount;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("tax_exigible")
     */
    public function isTaxExigible(): ?bool
    {
        return $this->tax_exigible;
    }

    /**
     * @param bool|null $tax_exigible
     */
    public function setTaxExigible(?bool $tax_exigible): void
    {
        $this->tax_exigible = $tax_exigible;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_repartition_line_id")
     */
    public function getTaxRepartitionLineId(): ?OdooRelation
    {
        return $this->tax_repartition_line_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchedDebitIds(OdooRelation $item): void
    {
        if (null === $this->matched_debit_ids) {
            $this->matched_debit_ids = [];
        }

        if ($this->hasMatchedDebitIds($item)) {
            $index = array_search($item, $this->matched_debit_ids);
            unset($this->matched_debit_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $matched_credit_ids
     */
    public function setMatchedCreditIds(?array $matched_credit_ids): void
    {
        $this->matched_credit_ids = $matched_credit_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("statement_id")
     */
    public function getStatementId(): ?OdooRelation
    {
        return $this->statement_id;
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
     * @return string|null
     *
     * @SerializedName("display_type")
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_rounding_line")
     */
    public function isIsRoundingLine(): ?bool
    {
        return $this->is_rounding_line;
    }

    /**
     * @param bool|null $is_rounding_line
     */
    public function setIsRoundingLine(?bool $is_rounding_line): void
    {
        $this->is_rounding_line = $is_rounding_line;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("exclude_from_invoice_tab")
     */
    public function isExcludeFromInvoiceTab(): ?bool
    {
        return $this->exclude_from_invoice_tab;
    }

    /**
     * @param bool|null $exclude_from_invoice_tab
     */
    public function setExcludeFromInvoiceTab(?bool $exclude_from_invoice_tab): void
    {
        $this->exclude_from_invoice_tab = $exclude_from_invoice_tab;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("recompute_tax_line")
     */
    public function isRecomputeTaxLine(): ?bool
    {
        return $this->recompute_tax_line;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param bool|null $recompute_tax_line
     */
    public function setRecomputeTaxLine(?bool $recompute_tax_line): void
    {
        $this->recompute_tax_line = $recompute_tax_line;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticTagIds(OdooRelation $item): void
    {
        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        if ($this->hasAnalyticTagIds($item)) {
            $index = array_search($item, $this->analytic_tag_ids);
            unset($this->analytic_tag_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchedCreditIds(OdooRelation $item): bool
    {
        if (null === $this->matched_credit_ids) {
            return false;
        }

        return in_array($item, $this->matched_credit_ids);
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticLineIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_line_ids) {
            return false;
        }

        return in_array($item, $this->analytic_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchedCreditIds(OdooRelation $item): void
    {
        if ($this->hasMatchedCreditIds($item)) {
            return;
        }

        if (null === $this->matched_credit_ids) {
            $this->matched_credit_ids = [];
        }

        $this->matched_credit_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchedCreditIds(OdooRelation $item): void
    {
        if (null === $this->matched_credit_ids) {
            $this->matched_credit_ids = [];
        }

        if ($this->hasMatchedCreditIds($item)) {
            $index = array_search($item, $this->matched_credit_ids);
            unset($this->matched_credit_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("matching_number")
     */
    public function getMatchingNumber(): ?string
    {
        return $this->matching_number;
    }

    /**
     * @param string|null $matching_number
     */
    public function setMatchingNumber(?string $matching_number): void
    {
        $this->matching_number = $matching_number;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_line_ids")
     */
    public function getAnalyticLineIds(): ?array
    {
        return $this->analytic_line_ids;
    }

    /**
     * @param OdooRelation[]|null $analytic_line_ids
     */
    public function setAnalyticLineIds(?array $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticLineIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticLineIds($item)) {
            return;
        }

        if (null === $this->analytic_line_ids) {
            $this->analytic_line_ids = [];
        }

        $this->analytic_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticTagIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticTagIds($item)) {
            return;
        }

        if (null === $this->analytic_tag_ids) {
            $this->analytic_tag_ids = [];
        }

        $this->analytic_tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticLineIds(OdooRelation $item): void
    {
        if (null === $this->analytic_line_ids) {
            $this->analytic_line_ids = [];
        }

        if ($this->hasAnalyticLineIds($item)) {
            $index = array_search($item, $this->analytic_line_ids);
            unset($this->analytic_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("analytic_account_id")
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_tag_ids")
     */
    public function getAnalyticTagIds(): ?array
    {
        return $this->analytic_tag_ids;
    }

    /**
     * @param OdooRelation[]|null $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticTagIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids);
    }

    /**
     * @param OdooRelation|null $statement_id
     */
    public function setStatementId(?OdooRelation $statement_id): void
    {
        $this->statement_id = $statement_id;
    }

    /**
     * @param OdooRelation|null $statement_line_id
     */
    public function setStatementLineId(?OdooRelation $statement_line_id): void
    {
        $this->statement_line_id = $statement_line_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("move_id")
     */
    public function getMoveId(): OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param OdooRelation|null $account_root_id
     */
    public function setAccountRootId(?OdooRelation $account_root_id): void
    {
        $this->account_root_id = $account_root_id;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_internal_type")
     */
    public function getAccountInternalType(): ?string
    {
        return $this->account_internal_type;
    }

    /**
     * @param string|null $account_internal_type
     */
    public function setAccountInternalType(?string $account_internal_type): void
    {
        $this->account_internal_type = $account_internal_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_internal_group")
     */
    public function getAccountInternalGroup(): ?string
    {
        return $this->account_internal_group;
    }

    /**
     * @param string|null $account_internal_group
     */
    public function setAccountInternalGroup(?string $account_internal_group): void
    {
        $this->account_internal_group = $account_internal_group;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_root_id")
     */
    public function getAccountRootId(): ?OdooRelation
    {
        return $this->account_root_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation|null $tax_fiscal_country_id
     */
    public function setTaxFiscalCountryId(?OdooRelation $tax_fiscal_country_id): void
    {
        $this->tax_fiscal_country_id = $tax_fiscal_country_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
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
     * @return float|null
     *
     * @SerializedName("price_unit")
     */
    public function getPriceUnit(): ?float
    {
        return $this->price_unit;
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
     * @return OdooRelation|null
     *
     * @SerializedName("tax_fiscal_country_id")
     */
    public function getTaxFiscalCountryId(): ?OdooRelation
    {
        return $this->tax_fiscal_country_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("discount")
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param string|null $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param OdooRelation $move_id
     */
    public function setMoveId(OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_name")
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @param string|null $move_name
     */
    public function setMoveName(?string $move_name): void
    {
        $this->move_name = $move_name;
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
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ref")
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @return string|null
     *
     * @SerializedName("parent_state")
     */
    public function getParentState(): ?string
    {
        return $this->parent_state;
    }

    /**
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @param string|null $parent_state
     */
    public function setParentState(?string $parent_state): void
    {
        $this->parent_state = $parent_state;
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
     * @param float|null $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("statement_line_id")
     */
    public function getStatementLineId(): ?OdooRelation
    {
        return $this->statement_line_id;
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
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_maturity")
     */
    public function getDateMaturity(): ?DateTimeInterface
    {
        return $this->date_maturity;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_category_id")
     */
    public function getProductUomCategoryId(): ?OdooRelation
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param OdooRelation|null $product_uom_category_id
     */
    public function setProductUomCategoryId(?OdooRelation $product_uom_category_id): void
    {
        $this->product_uom_category_id = $product_uom_category_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("reconcile_model_id")
     */
    public function getReconcileModelId(): ?OdooRelation
    {
        return $this->reconcile_model_id;
    }

    /**
     * @param OdooRelation|null $reconcile_model_id
     */
    public function setReconcileModelId(?OdooRelation $reconcile_model_id): void
    {
        $this->reconcile_model_id = $reconcile_model_id;
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
     * @param OdooRelation|null $payment_id
     */
    public function setPaymentId(?OdooRelation $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @param DateTimeInterface|null $date_maturity
     */
    public function setDateMaturity(?DateTimeInterface $date_maturity): void
    {
        $this->date_maturity = $date_maturity;
    }

    /**
     * @param bool|null $blocked
     */
    public function setBlocked(?bool $blocked): void
    {
        $this->blocked = $blocked;
    }

    /**
     * @return float|null
     *
     * @SerializedName("debit")
     */
    public function getDebit(): ?float
    {
        return $this->debit;
    }

    /**
     * @param float|null $cumulated_balance
     */
    public function setCumulatedBalance(?float $cumulated_balance): void
    {
        $this->cumulated_balance = $cumulated_balance;
    }

    /**
     * @param float|null $debit
     */
    public function setDebit(?float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("credit")
     */
    public function getCredit(): ?float
    {
        return $this->credit;
    }

    /**
     * @param float|null $credit
     */
    public function setCredit(?float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("balance")
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @param float|null $balance
     */
    public function setBalance(?float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return float|null
     *
     * @SerializedName("cumulated_balance")
     */
    public function getCumulatedBalance(): ?float
    {
        return $this->cumulated_balance;
    }

    /**
     * @return float|null
     *
     * @SerializedName("amount_currency")
     */
    public function getAmountCurrency(): ?float
    {
        return $this->amount_currency;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("blocked")
     */
    public function isBlocked(): ?bool
    {
        return $this->blocked;
    }

    /**
     * @param float|null $amount_currency
     */
    public function setAmountCurrency(?float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
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
     * @SerializedName("price_total")
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @param float|null $price_total
     */
    public function setPriceTotal(?float $price_total): void
    {
        $this->price_total = $price_total;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("reconciled")
     */
    public function isReconciled(): ?bool
    {
        return $this->reconciled;
    }

    /**
     * @param bool|null $reconciled
     */
    public function setReconciled(?bool $reconciled): void
    {
        $this->reconciled = $reconciled;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.move.line';
    }
}
