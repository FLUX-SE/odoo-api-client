<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Tag as TagAlias;
use Flux\OdooApiClient\Model\Object\Account\Asset;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Line as Line2;
use Flux\OdooApiClient\Model\Object\Account\Full\Reconcile;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Partial\Reconcile as ReconcileAlias;
use Flux\OdooApiClient\Model\Object\Account\Payment;
use Flux\OdooApiClient\Model\Object\Account\Reconcile\Model;
use Flux\OdooApiClient\Model\Object\Account\Root;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Account\Tax\Group;
use Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line as Line3;
use Flux\OdooApiClient\Model\Object\AccountFollowup\Followup\Line as LineAliasAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line as Line4;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : account.move.line
 * Name : account.move.line
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
final class Line extends Base
{
    /**
     * Journal Entry
     * The move of this entry line.
     *
     * @var Move
     */
    private $move_id;

    /**
     * Number
     *
     * @var null|string
     */
    private $move_name;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Reference
     *
     * @var null|string
     */
    private $ref;

    /**
     * Status
     *
     * @var null|array
     */
    private $parent_state;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Company
     * Company related to this journal
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Company Currency
     * Utility field to express amount currency
     *
     * @var null|Currency
     */
    private $company_currency_id;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Internal Type
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     *
     * @var null|array
     */
    private $account_internal_type;

    /**
     * Account Root
     *
     * @var null|Root
     */
    private $account_root_id;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Label
     *
     * @var null|string
     */
    private $name;

    /**
     * Quantity
     * The optional quantity expressed by this line, eg: number of product sold. The quantity is not a legal
     * requirement but is very useful for some reports.
     *
     * @var null|float
     */
    private $quantity;

    /**
     * Unit Price
     *
     * @var null|float
     */
    private $price_unit;

    /**
     * Discount (%)
     *
     * @var null|float
     */
    private $discount;

    /**
     * Debit
     *
     * @var null|float
     */
    private $debit;

    /**
     * Credit
     *
     * @var null|float
     */
    private $credit;

    /**
     * Balance
     * Technical field holding the debit - credit in order to open meaningful graph views from reports
     *
     * @var null|float
     */
    private $balance;

    /**
     * Amount in Currency
     * The amount expressed in an optional other currency if it is a multi-currency entry.
     *
     * @var null|float
     */
    private $amount_currency;

    /**
     * Subtotal
     *
     * @var null|float
     */
    private $price_subtotal;

    /**
     * Total
     *
     * @var null|float
     */
    private $price_total;

    /**
     * Reconciled
     *
     * @var null|bool
     */
    private $reconciled;

    /**
     * No Follow-up
     * You can check this box to mark this journal item as a litigation with the associated partner
     *
     * @var null|bool
     */
    private $blocked;

    /**
     * Due Date
     * This field is used for payable and receivable journal entries. You can put the limit date for the payment of
     * this line.
     *
     * @var null|DateTimeInterface
     */
    private $date_maturity;

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
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom_id;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Reconciliation Model
     *
     * @var null|Model
     */
    private $reconcile_model_id;

    /**
     * Originator Payment
     * Payment that created this entry
     *
     * @var null|Payment
     */
    private $payment_id;

    /**
     * Bank statement line reconciled with this entry
     *
     * @var null|Line2
     */
    private $statement_line_id;

    /**
     * Statement
     * The bank statement used for bank reconciliation
     *
     * @var null|Statement
     */
    private $statement_id;

    /**
     * Taxes
     * Taxes that apply on the base amount
     *
     * @var null|Tax[]
     */
    private $tax_ids;

    /**
     * Originator Tax
     * Indicates that this journal item is a tax line
     *
     * @var null|Tax
     */
    private $tax_line_id;

    /**
     * Originator tax group
     * technical field for widget tax-group-custom-field
     *
     * @var null|Group
     */
    private $tax_group_id;

    /**
     * Base Amount
     *
     * @var null|float
     */
    private $tax_base_amount;

    /**
     * Appears in VAT report
     * Technical field used to mark a tax line as exigible in the vat report or not (only exigible journal items are
     * displayed). By default all new journal items are directly exigible, but with the feature cash_basis on taxes,
     * some will become exigible only when the payment is recorded.
     *
     * @var null|bool
     */
    private $tax_exigible;

    /**
     * Originator Tax Repartition Line
     * Tax repartition line that caused the creation of this move line, if any
     *
     * @var null|Line3
     */
    private $tax_repartition_line_id;

    /**
     * Tags
     * Tags assigned to this line by the tax creating it, if any. It determines its impact on financial reports.
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Tax Audit String
     * Computed field, listing the tax grids impacted by this line, and the amount it applies to each of them.
     *
     * @var null|string
     */
    private $tax_audit;

    /**
     * Residual Amount
     * The residual amount on a journal item expressed in the company currency.
     *
     * @var null|float
     */
    private $amount_residual;

    /**
     * Residual Amount in Currency
     * The residual amount on a journal item expressed in its currency (possibly not the company currency).
     *
     * @var null|float
     */
    private $amount_residual_currency;

    /**
     * Matching #
     *
     * @var null|Reconcile
     */
    private $full_reconcile_id;

    /**
     * Matched Debits
     * Debit journal items that are matched with this journal item.
     *
     * @var null|ReconcileAlias[]
     */
    private $matched_debit_ids;

    /**
     * Matched Credits
     * Credit journal items that are matched with this journal item.
     *
     * @var null|ReconcileAlias[]
     */
    private $matched_credit_ids;

    /**
     * Analytic lines
     *
     * @var null|LineAlias[]
     */
    private $analytic_line_ids;

    /**
     * Analytic Account
     *
     * @var null|AccountAlias
     */
    private $analytic_account_id;

    /**
     * Analytic Tags
     *
     * @var null|TagAlias[]
     */
    private $analytic_tag_ids;

    /**
     * Recompute Tax Line
     * Technical field used to know on which lines the taxes must be recomputed.
     *
     * @var null|bool
     */
    private $recompute_tax_line;

    /**
     * Display Type
     * Technical field for UX purpose.
     *
     * @var null|array
     */
    private $display_type;

    /**
     * Is Rounding Line
     * Technical field used to retrieve the cash rounding line.
     *
     * @var null|bool
     */
    private $is_rounding_line;

    /**
     * Exclude From Invoice Tab
     * Technical field used to exclude some lines from the invoice_line_ids tab in the form view.
     *
     * @var null|bool
     */
    private $exclude_from_invoice_tab;

    /**
     * Foreign Currency
     * Technical field used to compute the monetary field. As currency_id is not a required field, we need to use
     * either the foreign currency, either the company one.
     *
     * @var null|Currency
     */
    private $always_set_currency_id;

    /**
     * Move Attachment
     *
     * @var null|Attachment[]
     */
    private $move_attachment_ids;

    /**
     * Predict From Name
     * Technical field used to know on which lines the prediction must be done.
     *
     * @var null|bool
     */
    private $predict_from_name;

    /**
     * Predict Override Default Account
     *
     * @var null|bool
     */
    private $predict_override_default_account;

    /**
     * Expected Payment Date
     * Expected payment date as manually set through the customer statement (e.g: if you had the customer on the
     * phone and want to remember the date he promised he would pay)
     *
     * @var null|DateTimeInterface
     */
    private $expected_pay_date;

    /**
     * Internal Note
     * Note you can set through the customer statement about a receivable journal item
     *
     * @var null|string
     */
    private $internal_note;

    /**
     * Next Action Date
     * Date where the next action should be taken for a receivable item. Usually, automatically set when sending
     * reminders through the customer statement.
     *
     * @var null|DateTimeInterface
     */
    private $next_action_date;

    /**
     * Sales Order Lines
     *
     * @var null|Line4[]
     */
    private $sale_line_ids;

    /**
     * Asset Linked
     * Asset created from this Journal Item
     *
     * @var null|Asset
     */
    private $asset_id;

    /**
     * Follow-up Level
     *
     * @var null|LineAliasAlias
     */
    private $followup_line_id;

    /**
     * Latest Follow-up
     *
     * @var null|DateTimeInterface
     */
    private $followup_date;

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
     * @param Move $move_id Journal Entry
     *        The move of this entry line.
     */
    public function __construct(Move $move_id)
    {
        $this->move_id = $move_id;
    }

    /**
     * @param null|LineAlias[] $analytic_line_ids
     */
    public function setAnalyticLineIds(?array $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @param TagAlias $item
     */
    public function addAnalyticTagIds(TagAlias $item): void
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
     * @param TagAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticTagIds(TagAlias $item, bool $strict = true): bool
    {
        if (null === $this->analytic_tag_ids) {
            return false;
        }

        return in_array($item, $this->analytic_tag_ids, $strict);
    }

    /**
     * @param null|TagAlias[] $analytic_tag_ids
     */
    public function setAnalyticTagIds(?array $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param null|AccountAlias $analytic_account_id
     */
    public function setAnalyticAccountId(?AccountAlias $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @param LineAlias $item
     */
    public function removeAnalyticLineIds(LineAlias $item): void
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
     * @param LineAlias $item
     */
    public function addAnalyticLineIds(LineAlias $item): void
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
     * @param LineAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticLineIds(LineAlias $item, bool $strict = true): bool
    {
        if (null === $this->analytic_line_ids) {
            return false;
        }

        return in_array($item, $this->analytic_line_ids, $strict);
    }

    /**
     * @return null|ReconcileAlias[]
     */
    public function getMatchedCreditIds(): ?array
    {
        return $this->matched_credit_ids;
    }

    /**
     * @return null|bool
     */
    public function isRecomputeTaxLine(): ?bool
    {
        return $this->recompute_tax_line;
    }

    /**
     * @return null|ReconcileAlias[]
     */
    public function getMatchedDebitIds(): ?array
    {
        return $this->matched_debit_ids;
    }

    /**
     * @return null|Reconcile
     */
    public function getFullReconcileId(): ?Reconcile
    {
        return $this->full_reconcile_id;
    }

    /**
     * @return null|float
     */
    public function getAmountResidualCurrency(): ?float
    {
        return $this->amount_residual_currency;
    }

    /**
     * @return null|float
     */
    public function getAmountResidual(): ?float
    {
        return $this->amount_residual;
    }

    /**
     * @return null|string
     */
    public function getTaxAudit(): ?string
    {
        return $this->tax_audit;
    }

    /**
     * @param Tag $item
     */
    public function removeTagIds(Tag $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @param Tag $item
     */
    public function addTagIds(Tag $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids, $strict);
    }

    /**
     * @param TagAlias $item
     */
    public function removeAnalyticTagIds(TagAlias $item): void
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
     * @param null|array $display_type
     */
    public function setDisplayType(?array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return null|Line3
     */
    public function getTaxRepartitionLineId(): ?Line3
    {
        return $this->tax_repartition_line_id;
    }

    /**
     * @param null|string $internal_note
     */
    public function setInternalNote(?string $internal_note): void
    {
        $this->internal_note = $internal_note;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|DateTimeInterface $followup_date
     */
    public function setFollowupDate(?DateTimeInterface $followup_date): void
    {
        $this->followup_date = $followup_date;
    }

    /**
     * @param null|LineAliasAlias $followup_line_id
     */
    public function setFollowupLineId(?LineAliasAlias $followup_line_id): void
    {
        $this->followup_line_id = $followup_line_id;
    }

    /**
     * @param null|Asset $asset_id
     */
    public function setAssetId(?Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return null|Line4[]
     */
    public function getSaleLineIds(): ?array
    {
        return $this->sale_line_ids;
    }

    /**
     * @param null|DateTimeInterface $next_action_date
     */
    public function setNextActionDate(?DateTimeInterface $next_action_date): void
    {
        $this->next_action_date = $next_action_date;
    }

    /**
     * @param null|DateTimeInterface $expected_pay_date
     */
    public function setExpectedPayDate(?DateTimeInterface $expected_pay_date): void
    {
        $this->expected_pay_date = $expected_pay_date;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType($item, bool $strict = true): bool
    {
        if (null === $this->display_type) {
            return false;
        }

        return in_array($item, $this->display_type, $strict);
    }

    /**
     * @param null|bool $predict_override_default_account
     */
    public function setPredictOverrideDefaultAccount(?bool $predict_override_default_account): void
    {
        $this->predict_override_default_account = $predict_override_default_account;
    }

    /**
     * @param null|bool $predict_from_name
     */
    public function setPredictFromName(?bool $predict_from_name): void
    {
        $this->predict_from_name = $predict_from_name;
    }

    /**
     * @return null|Attachment[]
     */
    public function getMoveAttachmentIds(): ?array
    {
        return $this->move_attachment_ids;
    }

    /**
     * @return null|Currency
     */
    public function getAlwaysSetCurrencyId(): ?Currency
    {
        return $this->always_set_currency_id;
    }

    /**
     * @param null|bool $exclude_from_invoice_tab
     */
    public function setExcludeFromInvoiceTab(?bool $exclude_from_invoice_tab): void
    {
        $this->exclude_from_invoice_tab = $exclude_from_invoice_tab;
    }

    /**
     * @param null|bool $is_rounding_line
     */
    public function setIsRoundingLine(?bool $is_rounding_line): void
    {
        $this->is_rounding_line = $is_rounding_line;
    }

    /**
     * @param mixed $item
     */
    public function removeDisplayType($item): void
    {
        if (null === $this->display_type) {
            $this->display_type = [];
        }

        if ($this->hasDisplayType($item)) {
            $index = array_search($item, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addDisplayType($item): void
    {
        if ($this->hasDisplayType($item)) {
            return;
        }

        if (null === $this->display_type) {
            $this->display_type = [];
        }

        $this->display_type[] = $item;
    }

    /**
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return null|bool
     */
    public function isTaxExigible(): ?bool
    {
        return $this->tax_exigible;
    }

    /**
     * @return Move
     */
    public function getMoveId(): Move
    {
        return $this->move_id;
    }

    /**
     * @return null|array
     */
    public function getAccountInternalType(): ?array
    {
        return $this->account_internal_type;
    }

    /**
     * @param null|float $debit
     */
    public function setDebit(?float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @param null|float $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param null|float $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param null|float $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return null|Root
     */
    public function getAccountRootId(): ?Root
    {
        return $this->account_root_id;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(?Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return null|float
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    /**
     * @return null|Currency
     */
    public function getCompanyCurrencyId(): ?Currency
    {
        return $this->company_currency_id;
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
     * @return null|array
     */
    public function getParentState(): ?array
    {
        return $this->parent_state;
    }

    /**
     * @param null|string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return null|string
     */
    public function getMoveName(): ?string
    {
        return $this->move_name;
    }

    /**
     * @param null|float $credit
     */
    public function setCredit(?float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @param null|float $amount_currency
     */
    public function setAmountCurrency(?float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return null|float
     */
    public function getTaxBaseAmount(): ?float
    {
        return $this->tax_base_amount;
    }

    /**
     * @param null|Payment $payment_id
     */
    public function setPaymentId(?Payment $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return null|Group
     */
    public function getTaxGroupId(): ?Group
    {
        return $this->tax_group_id;
    }

    /**
     * @return null|Tax
     */
    public function getTaxLineId(): ?Tax
    {
        return $this->tax_line_id;
    }

    /**
     * @param Tax $item
     */
    public function removeTaxIds(Tax $item): void
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
     * @param Tax $item
     */
    public function addTaxIds(Tax $item): void
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
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxIds(Tax $item, bool $strict = true): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids, $strict);
    }

    /**
     * @param null|Tax[] $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @return null|Statement
     */
    public function getStatementId(): ?Statement
    {
        return $this->statement_id;
    }

    /**
     * @return null|Line2
     */
    public function getStatementLineId(): ?Line2
    {
        return $this->statement_line_id;
    }

    /**
     * @return null|Model
     */
    public function getReconcileModelId(): ?Model
    {
        return $this->reconcile_model_id;
    }

    /**
     * @return null|float
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|Uom $product_uom_id
     */
    public function setProductUomId(?Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|DateTimeInterface $date_maturity
     */
    public function setDateMaturity(?DateTimeInterface $date_maturity): void
    {
        $this->date_maturity = $date_maturity;
    }

    /**
     * @param null|bool $blocked
     */
    public function setBlocked(?bool $blocked): void
    {
        $this->blocked = $blocked;
    }

    /**
     * @return null|bool
     */
    public function isReconciled(): ?bool
    {
        return $this->reconciled;
    }

    /**
     * @return null|float
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
