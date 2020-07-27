<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.tax.template
 * ---
 * Name : account.tax.template
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
final class Template extends Base
{
    /**
     * Chart Template
     * ---
     * Relation : many2one (account.chart.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Chart\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $chart_template_id;

    /**
     * Tax Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Tax Scope
     * ---
     * Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     * still be used in a group.
     * ---
     * Selection : (default value, usually null)
     *     -> sale (Sales)
     *     -> purchase (Purchases)
     *     -> none (None)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type_tax_use;

    /**
     * Tax Computation
     * ---
     * Selection : (default value, usually null)
     *     -> group (Group of Taxes)
     *     -> fixed (Fixed)
     *     -> percent (Percentage of Price)
     *     -> division (Percentage of Price Tax Included)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $amount_type;

    /**
     * Active
     * ---
     * Set active to false to hide the tax without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Children Taxes
     * ---
     * Relation : many2many (account.tax.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_tax_ids;

    /**
     * Sequence
     * ---
     * The sequence field is used to define order in which the tax lines are applied.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

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
     * Display on Invoices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Included in Price
     * ---
     * Check this if the price you use on the product and invoices includes this tax.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $price_include;

    /**
     * Affect Subsequent Taxes
     * ---
     * If set, taxes which are computed after this one will be computed based on the price tax included.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $include_base_amount;

    /**
     * Analytic Cost
     * ---
     * If set, the amount computed by this tax will be assigned to the same analytic account as the invoice line (if
     * any)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $analytic;

    /**
     * Repartition for Invoices
     * ---
     * Repartition when the tax is used on an invoice
     * ---
     * Relation : one2many (account.tax.repartition.line.template -> invoice_tax_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_repartition_line_ids;

    /**
     * Repartition for Refund Invoices
     * ---
     * Repartition when the tax is used on a refund
     * ---
     * Relation : one2many (account.tax.repartition.line.template -> refund_tax_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $refund_repartition_line_ids;

    /**
     * Tax Group
     * ---
     * Relation : many2one (account.tax.group)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_group_id;

    /**
     * Tax Due
     * ---
     * Based on Invoice: the tax is due as soon as the invoice is validated.
     * Based on Payment: the tax is due as soon as the payment of the invoice is received.
     * ---
     * Selection : (default value, usually null)
     *     -> on_invoice (Based on Invoice)
     *     -> on_payment (Based on Payment)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $tax_exigibility;

    /**
     * Cash Basis Transition Account
     * ---
     * Account used to transition the tax amount for cash basis taxes. It will contain the tax amount as long as the
     * original invoice has not been reconciled ; at reconciliation, this amount cancelled on this account and put on
     * the regular tax account.
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_basis_transition_account_id;

    /**
     * Base Tax Received Account
     * ---
     * Account that will be set on lines created in cash basis journal entry and used to keep track of the tax base
     * amount.
     * ---
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_basis_base_account_id;

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
     * @param OdooRelation $chart_template_id Chart Template
     *        ---
     *        Relation : many2one (account.chart.template)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Chart\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Tax Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type_tax_use Tax Scope
     *        ---
     *        Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     *        still be used in a group.
     *        ---
     *        Selection : (default value, usually null)
     *            -> sale (Sales)
     *            -> purchase (Purchases)
     *            -> none (None)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $amount_type Tax Computation
     *        ---
     *        Selection : (default value, usually null)
     *            -> group (Group of Taxes)
     *            -> fixed (Fixed)
     *            -> percent (Percentage of Price)
     *            -> division (Percentage of Price Tax Included)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        ---
     *        The sequence field is used to define order in which the tax lines are applied.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $amount Amount
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $chart_template_id,
        string $name,
        string $type_tax_use,
        string $amount_type,
        int $sequence,
        float $amount
    ) {
        $this->chart_template_id = $chart_template_id;
        $this->name = $name;
        $this->type_tax_use = $type_tax_use;
        $this->amount_type = $amount_type;
        $this->sequence = $sequence;
        $this->amount = $amount;
    }

    /**
     * @param string|null $tax_exigibility
     */
    public function setTaxExigibility(?string $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceRepartitionLineIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->invoice_repartition_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceRepartitionLineIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceRepartitionLineIds($item)) {
            return;
        }

        if (null === $this->invoice_repartition_line_ids) {
            $this->invoice_repartition_line_ids = [];
        }

        $this->invoice_repartition_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceRepartitionLineIds(OdooRelation $item): void
    {
        if (null === $this->invoice_repartition_line_ids) {
            $this->invoice_repartition_line_ids = [];
        }

        if ($this->hasInvoiceRepartitionLineIds($item)) {
            $index = array_search($item, $this->invoice_repartition_line_ids);
            unset($this->invoice_repartition_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRefundRepartitionLineIds(): ?array
    {
        return $this->refund_repartition_line_ids;
    }

    /**
     * @param OdooRelation[]|null $refund_repartition_line_ids
     */
    public function setRefundRepartitionLineIds(?array $refund_repartition_line_ids): void
    {
        $this->refund_repartition_line_ids = $refund_repartition_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRefundRepartitionLineIds(OdooRelation $item): bool
    {
        if (null === $this->refund_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->refund_repartition_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRefundRepartitionLineIds(OdooRelation $item): void
    {
        if ($this->hasRefundRepartitionLineIds($item)) {
            return;
        }

        if (null === $this->refund_repartition_line_ids) {
            $this->refund_repartition_line_ids = [];
        }

        $this->refund_repartition_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRefundRepartitionLineIds(OdooRelation $item): void
    {
        if (null === $this->refund_repartition_line_ids) {
            $this->refund_repartition_line_ids = [];
        }

        if ($this->hasRefundRepartitionLineIds($item)) {
            $index = array_search($item, $this->refund_repartition_line_ids);
            unset($this->refund_repartition_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxGroupId(): ?OdooRelation
    {
        return $this->tax_group_id;
    }

    /**
     * @param OdooRelation|null $tax_group_id
     */
    public function setTaxGroupId(?OdooRelation $tax_group_id): void
    {
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @return string|null
     */
    public function getTaxExigibility(): ?string
    {
        return $this->tax_exigibility;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashBasisTransitionAccountId(): ?OdooRelation
    {
        return $this->cash_basis_transition_account_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceRepartitionLineIds(): ?array
    {
        return $this->invoice_repartition_line_ids;
    }

    /**
     * @param OdooRelation|null $cash_basis_transition_account_id
     */
    public function setCashBasisTransitionAccountId(?OdooRelation $cash_basis_transition_account_id): void
    {
        $this->cash_basis_transition_account_id = $cash_basis_transition_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashBasisBaseAccountId(): ?OdooRelation
    {
        return $this->cash_basis_base_account_id;
    }

    /**
     * @param OdooRelation|null $cash_basis_base_account_id
     */
    public function setCashBasisBaseAccountId(?OdooRelation $cash_basis_base_account_id): void
    {
        $this->cash_basis_base_account_id = $cash_basis_base_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
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
     * @param OdooRelation[]|null $invoice_repartition_line_ids
     */
    public function setInvoiceRepartitionLineIds(?array $invoice_repartition_line_ids): void
    {
        $this->invoice_repartition_line_ids = $invoice_repartition_line_ids;
    }

    /**
     * @param bool|null $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @return OdooRelation
     */
    public function getChartTemplateId(): OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenTaxIds(OdooRelation $item): bool
    {
        if (null === $this->children_tax_ids) {
            return false;
        }

        return in_array($item, $this->children_tax_ids);
    }

    /**
     * @param OdooRelation $chart_template_id
     */
    public function setChartTemplateId(OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTypeTaxUse(): string
    {
        return $this->type_tax_use;
    }

    /**
     * @param string $type_tax_use
     */
    public function setTypeTaxUse(string $type_tax_use): void
    {
        $this->type_tax_use = $type_tax_use;
    }

    /**
     * @return string
     */
    public function getAmountType(): string
    {
        return $this->amount_type;
    }

    /**
     * @param string $amount_type
     */
    public function setAmountType(string $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChildrenTaxIds(): ?array
    {
        return $this->children_tax_ids;
    }

    /**
     * @param OdooRelation[]|null $children_tax_ids
     */
    public function setChildrenTaxIds(?array $children_tax_ids): void
    {
        $this->children_tax_ids = $children_tax_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildrenTaxIds(OdooRelation $item): void
    {
        if ($this->hasChildrenTaxIds($item)) {
            return;
        }

        if (null === $this->children_tax_ids) {
            $this->children_tax_ids = [];
        }

        $this->children_tax_ids[] = $item;
    }

    /**
     * @return bool|null
     */
    public function isAnalytic(): ?bool
    {
        return $this->analytic;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildrenTaxIds(OdooRelation $item): void
    {
        if (null === $this->children_tax_ids) {
            $this->children_tax_ids = [];
        }

        if ($this->hasChildrenTaxIds($item)) {
            $index = array_search($item, $this->children_tax_ids);
            unset($this->children_tax_ids[$index]);
        }
    }

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool|null
     */
    public function isPriceInclude(): ?bool
    {
        return $this->price_include;
    }

    /**
     * @param bool|null $price_include
     */
    public function setPriceInclude(?bool $price_include): void
    {
        $this->price_include = $price_include;
    }

    /**
     * @return bool|null
     */
    public function isIncludeBaseAmount(): ?bool
    {
        return $this->include_base_amount;
    }

    /**
     * @param bool|null $include_base_amount
     */
    public function setIncludeBaseAmount(?bool $include_base_amount): void
    {
        $this->include_base_amount = $include_base_amount;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.template';
    }
}
