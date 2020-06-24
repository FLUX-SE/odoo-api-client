<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Move;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Line as Line2;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Tag as TagAlias;
use Flux\OdooApiClient\Model\Object\Account\Asset;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement;
use Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Account\Full\Reconcile;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Partial\Reconcile as ReconcileAlias;
use Flux\OdooApiClient\Model\Object\Account\Payment;
use Flux\OdooApiClient\Model\Object\Account\Reconcile\Model;
use Flux\OdooApiClient\Model\Object\Account\Root;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Account\Tax\Group;
use Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line as LineAliasAlias;
use Flux\OdooApiClient\Model\Object\AccountFollowup\Followup\Line as Line4;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line as Line3;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : account.move.line
 * Name : account.move.line
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
final class Line extends Base
{
    /**
     * Journal Entry
     *
     * @var null|Move
     */
    private $move_id;

    /**
     * Number
     *
     * @var string
     */
    private $move_name;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reference
     *
     * @var string
     */
    private $ref;

    /**
     * Status
     *
     * @var array
     */
    private $parent_state;

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
     * Company Currency
     *
     * @var Currency
     */
    private $company_currency_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Internal Type
     *
     * @var array
     */
    private $account_internal_type;

    /**
     * Account Root
     *
     * @var Root
     */
    private $account_root_id;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Label
     *
     * @var string
     */
    private $name;

    /**
     * Quantity
     *
     * @var float
     */
    private $quantity;

    /**
     * Unit Price
     *
     * @var float
     */
    private $price_unit;

    /**
     * Discount (%)
     *
     * @var float
     */
    private $discount;

    /**
     * Debit
     *
     * @var float
     */
    private $debit;

    /**
     * Credit
     *
     * @var float
     */
    private $credit;

    /**
     * Balance
     *
     * @var float
     */
    private $balance;

    /**
     * Amount in Currency
     *
     * @var float
     */
    private $amount_currency;

    /**
     * Subtotal
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Total
     *
     * @var float
     */
    private $price_total;

    /**
     * Reconciled
     *
     * @var bool
     */
    private $reconciled;

    /**
     * No Follow-up
     *
     * @var bool
     */
    private $blocked;

    /**
     * Due Date
     *
     * @var DateTimeInterface
     */
    private $date_maturity;

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
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom_id;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Reconciliation Model
     *
     * @var Model
     */
    private $reconcile_model_id;

    /**
     * Originator Payment
     *
     * @var Payment
     */
    private $payment_id;

    /**
     * Bank statement line reconciled with this entry
     *
     * @var LineAlias
     */
    private $statement_line_id;

    /**
     * Statement
     *
     * @var Statement
     */
    private $statement_id;

    /**
     * Taxes
     *
     * @var Tax
     */
    private $tax_ids;

    /**
     * Originator Tax
     *
     * @var Tax
     */
    private $tax_line_id;

    /**
     * Originator tax group
     *
     * @var Group
     */
    private $tax_group_id;

    /**
     * Base Amount
     *
     * @var float
     */
    private $tax_base_amount;

    /**
     * Appears in VAT report
     *
     * @var bool
     */
    private $tax_exigible;

    /**
     * Originator Tax Repartition Line
     *
     * @var LineAliasAlias
     */
    private $tax_repartition_line_id;

    /**
     * Tags
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Tax Audit String
     *
     * @var string
     */
    private $tax_audit;

    /**
     * Residual Amount
     *
     * @var float
     */
    private $amount_residual;

    /**
     * Residual Amount in Currency
     *
     * @var float
     */
    private $amount_residual_currency;

    /**
     * Matching #
     *
     * @var Reconcile
     */
    private $full_reconcile_id;

    /**
     * Matched Debits
     *
     * @var ReconcileAlias
     */
    private $matched_debit_ids;

    /**
     * Matched Credits
     *
     * @var ReconcileAlias
     */
    private $matched_credit_ids;

    /**
     * Analytic lines
     *
     * @var Line2
     */
    private $analytic_line_ids;

    /**
     * Analytic Account
     *
     * @var AccountAlias
     */
    private $analytic_account_id;

    /**
     * Analytic Tags
     *
     * @var TagAlias
     */
    private $analytic_tag_ids;

    /**
     * Recompute Tax Line
     *
     * @var bool
     */
    private $recompute_tax_line;

    /**
     * Display Type
     *
     * @var array
     */
    private $display_type;

    /**
     * Is Rounding Line
     *
     * @var bool
     */
    private $is_rounding_line;

    /**
     * Exclude From Invoice Tab
     *
     * @var bool
     */
    private $exclude_from_invoice_tab;

    /**
     * Foreign Currency
     *
     * @var Currency
     */
    private $always_set_currency_id;

    /**
     * Move Attachment
     *
     * @var Attachment
     */
    private $move_attachment_ids;

    /**
     * Predict From Name
     *
     * @var bool
     */
    private $predict_from_name;

    /**
     * Predict Override Default Account
     *
     * @var bool
     */
    private $predict_override_default_account;

    /**
     * Expected Payment Date
     *
     * @var DateTimeInterface
     */
    private $expected_pay_date;

    /**
     * Internal Note
     *
     * @var string
     */
    private $internal_note;

    /**
     * Next Action Date
     *
     * @var DateTimeInterface
     */
    private $next_action_date;

    /**
     * Sales Order Lines
     *
     * @var Line3
     */
    private $sale_line_ids;

    /**
     * Asset Linked
     *
     * @var Asset
     */
    private $asset_id;

    /**
     * Follow-up Level
     *
     * @var Line4
     */
    private $followup_line_id;

    /**
     * Latest Follow-up
     *
     * @var DateTimeInterface
     */
    private $followup_date;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @return null|Move
     */
    public function getMoveId(): Move
    {
        return $this->move_id;
    }

    /**
     * @return ReconcileAlias
     */
    public function getMatchedCreditIds(): ReconcileAlias
    {
        return $this->matched_credit_ids;
    }

    /**
     * @param array $display_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDisplayType(array $display_type, bool $strict = true): bool
    {
        return in_array($display_type, $this->display_type, $strict);
    }

    /**
     * @param array $display_type
     */
    public function setDisplayType(array $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return bool
     */
    public function isRecomputeTaxLine(): bool
    {
        return $this->recompute_tax_line;
    }

    /**
     * @param TagAlias $analytic_tag_ids
     */
    public function setAnalyticTagIds(TagAlias $analytic_tag_ids): void
    {
        $this->analytic_tag_ids = $analytic_tag_ids;
    }

    /**
     * @param AccountAlias $analytic_account_id
     */
    public function setAnalyticAccountId(AccountAlias $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @param Line2 $analytic_line_ids
     */
    public function setAnalyticLineIds(Line2 $analytic_line_ids): void
    {
        $this->analytic_line_ids = $analytic_line_ids;
    }

    /**
     * @return ReconcileAlias
     */
    public function getMatchedDebitIds(): ReconcileAlias
    {
        return $this->matched_debit_ids;
    }

    /**
     * @param array $display_type
     */
    public function removeDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            $index = array_search($display_type, $this->display_type);
            unset($this->display_type[$index]);
        }
    }

    /**
     * @return Reconcile
     */
    public function getFullReconcileId(): Reconcile
    {
        return $this->full_reconcile_id;
    }

    /**
     * @return float
     */
    public function getAmountResidualCurrency(): float
    {
        return $this->amount_residual_currency;
    }

    /**
     * @return float
     */
    public function getAmountResidual(): float
    {
        return $this->amount_residual;
    }

    /**
     * @return string
     */
    public function getTaxAudit(): string
    {
        return $this->tax_audit;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return LineAliasAlias
     */
    public function getTaxRepartitionLineId(): LineAliasAlias
    {
        return $this->tax_repartition_line_id;
    }

    /**
     * @param array $display_type
     */
    public function addDisplayType(array $display_type): void
    {
        if ($this->hasDisplayType($display_type)) {
            return;
        }

        $this->display_type[] = $display_type;
    }

    /**
     * @param bool $is_rounding_line
     */
    public function setIsRoundingLine(bool $is_rounding_line): void
    {
        $this->is_rounding_line = $is_rounding_line;
    }

    /**
     * @return float
     */
    public function getTaxBaseAmount(): float
    {
        return $this->tax_base_amount;
    }

    /**
     * @return Line3
     */
    public function getSaleLineIds(): Line3
    {
        return $this->sale_line_ids;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param DateTimeInterface $followup_date
     */
    public function setFollowupDate(DateTimeInterface $followup_date): void
    {
        $this->followup_date = $followup_date;
    }

    /**
     * @param Line4 $followup_line_id
     */
    public function setFollowupLineId(Line4 $followup_line_id): void
    {
        $this->followup_line_id = $followup_line_id;
    }

    /**
     * @param Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @param DateTimeInterface $next_action_date
     */
    public function setNextActionDate(DateTimeInterface $next_action_date): void
    {
        $this->next_action_date = $next_action_date;
    }

    /**
     * @param bool $exclude_from_invoice_tab
     */
    public function setExcludeFromInvoiceTab(bool $exclude_from_invoice_tab): void
    {
        $this->exclude_from_invoice_tab = $exclude_from_invoice_tab;
    }

    /**
     * @param string $internal_note
     */
    public function setInternalNote(string $internal_note): void
    {
        $this->internal_note = $internal_note;
    }

    /**
     * @param DateTimeInterface $expected_pay_date
     */
    public function setExpectedPayDate(DateTimeInterface $expected_pay_date): void
    {
        $this->expected_pay_date = $expected_pay_date;
    }

    /**
     * @param bool $predict_override_default_account
     */
    public function setPredictOverrideDefaultAccount(bool $predict_override_default_account): void
    {
        $this->predict_override_default_account = $predict_override_default_account;
    }

    /**
     * @param bool $predict_from_name
     */
    public function setPredictFromName(bool $predict_from_name): void
    {
        $this->predict_from_name = $predict_from_name;
    }

    /**
     * @return Attachment
     */
    public function getMoveAttachmentIds(): Attachment
    {
        return $this->move_attachment_ids;
    }

    /**
     * @return Currency
     */
    public function getAlwaysSetCurrencyId(): Currency
    {
        return $this->always_set_currency_id;
    }

    /**
     * @return bool
     */
    public function isTaxExigible(): bool
    {
        return $this->tax_exigible;
    }

    /**
     * @return Group
     */
    public function getTaxGroupId(): Group
    {
        return $this->tax_group_id;
    }

    /**
     * @return string
     */
    public function getMoveName(): string
    {
        return $this->move_name;
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param float $price_unit
     */
    public function setPriceUnit(float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return Root
     */
    public function getAccountRootId(): Root
    {
        return $this->account_root_id;
    }

    /**
     * @return array
     */
    public function getAccountInternalType(): array
    {
        return $this->account_internal_type;
    }

    /**
     * @return Country
     */
    public function getCountryId(): Country
    {
        return $this->country_id;
    }

    /**
     * @param float $debit
     */
    public function setDebit(float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @return Currency
     */
    public function getCompanyCurrencyId(): Currency
    {
        return $this->company_currency_id;
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
     * @return array
     */
    public function getParentState(): array
    {
        return $this->parent_state;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param float $credit
     */
    public function setCredit(float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return Tax
     */
    public function getTaxLineId(): Tax
    {
        return $this->tax_line_id;
    }

    /**
     * @param Uom $product_uom_id
     */
    public function setProductUomId(Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param Tax $tax_ids
     */
    public function setTaxIds(Tax $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @return Statement
     */
    public function getStatementId(): Statement
    {
        return $this->statement_id;
    }

    /**
     * @return LineAlias
     */
    public function getStatementLineId(): LineAlias
    {
        return $this->statement_line_id;
    }

    /**
     * @param Payment $payment_id
     */
    public function setPaymentId(Payment $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return Model
     */
    public function getReconcileModelId(): Model
    {
        return $this->reconcile_model_id;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param DateTimeInterface $date_maturity
     */
    public function setDateMaturity(DateTimeInterface $date_maturity): void
    {
        $this->date_maturity = $date_maturity;
    }

    /**
     * @param bool $blocked
     */
    public function setBlocked(bool $blocked): void
    {
        $this->blocked = $blocked;
    }

    /**
     * @return bool
     */
    public function isReconciled(): bool
    {
        return $this->reconciled;
    }

    /**
     * @return float
     */
    public function getPriceTotal(): float
    {
        return $this->price_total;
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @param float $amount_currency
     */
    public function setAmountCurrency(float $amount_currency): void
    {
        $this->amount_currency = $amount_currency;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
