<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Template as Template3;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line\Template as Template2;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax.template
 * Name : account.tax.template
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
final class Template extends Base
{
    /**
     * Chart Template
     *
     * @var TemplateAlias
     */
    private $chart_template_id;

    /**
     * Tax Name
     *
     * @var string
     */
    private $name;

    /**
     * Tax Scope
     * Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     * still be used in a group.
     *
     * @var array
     */
    private $type_tax_use;

    /**
     * Tax Computation
     *
     * @var array
     */
    private $amount_type;

    /**
     * Active
     * Set active to false to hide the tax without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Children Taxes
     *
     * @var null|TemplateAliasAlias[]
     */
    private $children_tax_ids;

    /**
     * Sequence
     * The sequence field is used to define order in which the tax lines are applied.
     *
     * @var int
     */
    private $sequence;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Display on Invoices
     *
     * @var null|string
     */
    private $description;

    /**
     * Included in Price
     * Check this if the price you use on the product and invoices includes this tax.
     *
     * @var null|bool
     */
    private $price_include;

    /**
     * Affect Subsequent Taxes
     * If set, taxes which are computed after this one will be computed based on the price tax included.
     *
     * @var null|bool
     */
    private $include_base_amount;

    /**
     * Analytic Cost
     * If set, the amount computed by this tax will be assigned to the same analytic account as the invoice line (if
     * any)
     *
     * @var null|bool
     */
    private $analytic;

    /**
     * Repartition for Invoices
     * Repartition when the tax is used on an invoice
     *
     * @var null|Template2[]
     */
    private $invoice_repartition_line_ids;

    /**
     * Repartition for Refund Invoices
     * Repartition when the tax is used on a refund
     *
     * @var null|Template2[]
     */
    private $refund_repartition_line_ids;

    /**
     * Tax Group
     *
     * @var null|Group
     */
    private $tax_group_id;

    /**
     * Tax Due
     * Based on Invoice: the tax is due as soon as the invoice is validated.
     * Based on Payment: the tax is due as soon as the payment of the invoice is received.
     *
     * @var null|array
     */
    private $tax_exigibility;

    /**
     * Cash Basis Transition Account
     * Account used to transition the tax amount for cash basis taxes. It will contain the tax amount as long as the
     * original invoice has not been reconciled ; at reconciliation, this amount cancelled on this account and put on
     * the regular tax account.
     *
     * @var null|Template3
     */
    private $cash_basis_transition_account_id;

    /**
     * Base Tax Received Account
     * Account that will be set on lines created in cash basis journal entry and used to keep track of the tax base
     * amount.
     *
     * @var null|Template3
     */
    private $cash_basis_base_account_id;

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
     * @param TemplateAlias $chart_template_id Chart Template
     * @param string $name Tax Name
     * @param array $type_tax_use Tax Scope
     *        Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     *        still be used in a group.
     * @param array $amount_type Tax Computation
     * @param int $sequence Sequence
     *        The sequence field is used to define order in which the tax lines are applied.
     * @param float $amount Amount
     */
    public function __construct(
        TemplateAlias $chart_template_id,
        string $name,
        array $type_tax_use,
        array $amount_type,
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
     * @param null|Group $tax_group_id
     */
    public function setTaxGroupId(?Group $tax_group_id): void
    {
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceRepartitionLineIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->invoice_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->invoice_repartition_line_ids, $strict);
    }

    /**
     * @param Template2 $item
     */
    public function addInvoiceRepartitionLineIds(Template2 $item): void
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
     * @param Template2 $item
     */
    public function removeInvoiceRepartitionLineIds(Template2 $item): void
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
     * @param null|Template2[] $refund_repartition_line_ids
     */
    public function setRefundRepartitionLineIds(?array $refund_repartition_line_ids): void
    {
        $this->refund_repartition_line_ids = $refund_repartition_line_ids;
    }

    /**
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRefundRepartitionLineIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->refund_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->refund_repartition_line_ids, $strict);
    }

    /**
     * @param Template2 $item
     */
    public function addRefundRepartitionLineIds(Template2 $item): void
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
     * @param Template2 $item
     */
    public function removeRefundRepartitionLineIds(Template2 $item): void
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
     * @param null|array $tax_exigibility
     */
    public function setTaxExigibility(?array $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @param null|bool $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxExigibility($item, bool $strict = true): bool
    {
        if (null === $this->tax_exigibility) {
            return false;
        }

        return in_array($item, $this->tax_exigibility, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTaxExigibility($item): void
    {
        if ($this->hasTaxExigibility($item)) {
            return;
        }

        if (null === $this->tax_exigibility) {
            $this->tax_exigibility = [];
        }

        $this->tax_exigibility[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTaxExigibility($item): void
    {
        if (null === $this->tax_exigibility) {
            $this->tax_exigibility = [];
        }

        if ($this->hasTaxExigibility($item)) {
            $index = array_search($item, $this->tax_exigibility);
            unset($this->tax_exigibility[$index]);
        }
    }

    /**
     * @param null|Template3 $cash_basis_transition_account_id
     */
    public function setCashBasisTransitionAccountId(?Template3 $cash_basis_transition_account_id): void
    {
        $this->cash_basis_transition_account_id = $cash_basis_transition_account_id;
    }

    /**
     * @param null|Template3 $cash_basis_base_account_id
     */
    public function setCashBasisBaseAccountId(?Template3 $cash_basis_base_account_id): void
    {
        $this->cash_basis_base_account_id = $cash_basis_base_account_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param null|Template2[] $invoice_repartition_line_ids
     */
    public function setInvoiceRepartitionLineIds(?array $invoice_repartition_line_ids): void
    {
        $this->invoice_repartition_line_ids = $invoice_repartition_line_ids;
    }

    /**
     * @param null|bool $include_base_amount
     */
    public function setIncludeBaseAmount(?bool $include_base_amount): void
    {
        $this->include_base_amount = $include_base_amount;
    }

    /**
     * @param TemplateAlias $chart_template_id
     */
    public function setChartTemplateId(TemplateAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param mixed $item
     */
    public function addAmountType($item): void
    {
        if ($this->hasAmountType($item)) {
            return;
        }

        $this->amount_type[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $type_tax_use
     */
    public function setTypeTaxUse(array $type_tax_use): void
    {
        $this->type_tax_use = $type_tax_use;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTypeTaxUse($item, bool $strict = true): bool
    {
        return in_array($item, $this->type_tax_use, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addTypeTaxUse($item): void
    {
        if ($this->hasTypeTaxUse($item)) {
            return;
        }

        $this->type_tax_use[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeTypeTaxUse($item): void
    {
        if ($this->hasTypeTaxUse($item)) {
            $index = array_search($item, $this->type_tax_use);
            unset($this->type_tax_use[$index]);
        }
    }

    /**
     * @param array $amount_type
     */
    public function setAmountType(array $amount_type): void
    {
        $this->amount_type = $amount_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAmountType($item, bool $strict = true): bool
    {
        return in_array($item, $this->amount_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeAmountType($item): void
    {
        if ($this->hasAmountType($item)) {
            $index = array_search($item, $this->amount_type);
            unset($this->amount_type[$index]);
        }
    }

    /**
     * @param null|bool $price_include
     */
    public function setPriceInclude(?bool $price_include): void
    {
        $this->price_include = $price_include;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|TemplateAliasAlias[] $children_tax_ids
     */
    public function setChildrenTaxIds(?array $children_tax_ids): void
    {
        $this->children_tax_ids = $children_tax_ids;
    }

    /**
     * @param TemplateAliasAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildrenTaxIds(TemplateAliasAlias $item, bool $strict = true): bool
    {
        if (null === $this->children_tax_ids) {
            return false;
        }

        return in_array($item, $this->children_tax_ids, $strict);
    }

    /**
     * @param TemplateAliasAlias $item
     */
    public function addChildrenTaxIds(TemplateAliasAlias $item): void
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
     * @param TemplateAliasAlias $item
     */
    public function removeChildrenTaxIds(TemplateAliasAlias $item): void
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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
