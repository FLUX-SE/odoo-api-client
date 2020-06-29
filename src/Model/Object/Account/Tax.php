<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Tax as TaxAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax\Group;
use Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax
 * Name : account.tax
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
final class Tax extends Base
{
    /**
     * Tax Name
     *
     * @var string
     */
    private $name;

    /**
     * Tax Scope
     * Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     * still be used in a group. 'adjustment' is used to perform tax adjustment.
     *
     * @var array
     */
    private $type_tax_use;

    /**
     * Tax Computation
     *
     * - Group of Taxes: The tax is a set of sub taxes.
     * - Fixed: The tax amount stays the same whatever the price.
     * - Percentage of Price: The tax amount is a % of the price:
     * e.g 100 * 10% = 110 (not price included)
     * e.g 110 / (1 + 10%) = 100 (price included)
     * - Percentage of Price Tax Included: The tax amount is a division of the price:
     * e.g 180 / (1 - 10%) = 200 (not price included)
     * e.g 200 * (1 - 10%) = 180 (price included)
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
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Children Taxes
     *
     * @var null|TaxAlias[]
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
     * Label on Invoices
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
     * Affect Base of Subsequent Taxes
     * If set, taxes which are computed after this one will be computed based on the price tax included.
     *
     * @var null|bool
     */
    private $include_base_amount;

    /**
     * Include in Analytic Cost
     * If set, the amount computed by this tax will be assigned to the same analytic account as the invoice line (if
     * any)
     *
     * @var null|bool
     */
    private $analytic;

    /**
     * Tax Group
     *
     * @var Group
     */
    private $tax_group_id;

    /**
     * Hide Use Cash Basis Option
     *
     * @var null|bool
     */
    private $hide_tax_exigibility;

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
     * @var null|Account
     */
    private $cash_basis_transition_account_id;

    /**
     * Base Tax Received Account
     * Account that will be set on lines created in cash basis journal entry and used to keep track of the tax base
     * amount.
     *
     * @var null|Account
     */
    private $cash_basis_base_account_id;

    /**
     * Repartition for Invoices
     * Repartition when the tax is used on an invoice
     *
     * @var null|Line[]
     */
    private $invoice_repartition_line_ids;

    /**
     * Repartition for Refund Invoices
     * Repartition when the tax is used on a refund
     *
     * @var null|Line[]
     */
    private $refund_repartition_line_ids;

    /**
     * Country
     * Technical field used to restrict the domain of account tags for tax repartition lines created for this tax.
     *
     * @var null|Country
     */
    private $country_id;

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
     * @param string $name Tax Name
     * @param array $type_tax_use Tax Scope
     *        Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     *        still be used in a group. 'adjustment' is used to perform tax adjustment.
     * @param array $amount_type Tax Computation
     *       
     *        - Group of Taxes: The tax is a set of sub taxes.
     *        - Fixed: The tax amount stays the same whatever the price.
     *        - Percentage of Price: The tax amount is a % of the price:
     *        e.g 100 * 10% = 110 (not price included)
     *        e.g 110 / (1 + 10%) = 100 (price included)
     *        - Percentage of Price Tax Included: The tax amount is a division of the price:
     *        e.g 180 / (1 - 10%) = 200 (not price included)
     *        e.g 200 * (1 - 10%) = 180 (price included)
     * @param Company $company_id Company
     * @param int $sequence Sequence
     *        The sequence field is used to define order in which the tax lines are applied.
     * @param float $amount Amount
     * @param Group $tax_group_id Tax Group
     */
    public function __construct(
        string $name,
        array $type_tax_use,
        array $amount_type,
        Company $company_id,
        int $sequence,
        float $amount,
        Group $tax_group_id
    ) {
        $this->name = $name;
        $this->type_tax_use = $type_tax_use;
        $this->amount_type = $amount_type;
        $this->company_id = $company_id;
        $this->sequence = $sequence;
        $this->amount = $amount;
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @param Line $item
     */
    public function addInvoiceRepartitionLineIds(Line $item): void
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
     * @param null|array $tax_exigibility
     */
    public function setTaxExigibility(?array $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
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
     * @param null|Account $cash_basis_transition_account_id
     */
    public function setCashBasisTransitionAccountId(?Account $cash_basis_transition_account_id): void
    {
        $this->cash_basis_transition_account_id = $cash_basis_transition_account_id;
    }

    /**
     * @param null|Account $cash_basis_base_account_id
     */
    public function setCashBasisBaseAccountId(?Account $cash_basis_base_account_id): void
    {
        $this->cash_basis_base_account_id = $cash_basis_base_account_id;
    }

    /**
     * @param null|Line[] $invoice_repartition_line_ids
     */
    public function setInvoiceRepartitionLineIds(?array $invoice_repartition_line_ids): void
    {
        $this->invoice_repartition_line_ids = $invoice_repartition_line_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceRepartitionLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->invoice_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->invoice_repartition_line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function removeInvoiceRepartitionLineIds(Line $item): void
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
     * @param Group $tax_group_id
     */
    public function setTaxGroupId(Group $tax_group_id): void
    {
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @param null|Line[] $refund_repartition_line_ids
     */
    public function setRefundRepartitionLineIds(?array $refund_repartition_line_ids): void
    {
        $this->refund_repartition_line_ids = $refund_repartition_line_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRefundRepartitionLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->refund_repartition_line_ids) {
            return false;
        }

        return in_array($item, $this->refund_repartition_line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addRefundRepartitionLineIds(Line $item): void
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
     * @param Line $item
     */
    public function removeRefundRepartitionLineIds(Line $item): void
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
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
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
     * @return null|bool
     */
    public function isHideTaxExigibility(): ?bool
    {
        return $this->hide_tax_exigibility;
    }

    /**
     * @param null|bool $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
    public function addAmountType($item): void
    {
        if ($this->hasAmountType($item)) {
            return;
        }

        $this->amount_type[] = $item;
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
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|bool $include_base_amount
     */
    public function setIncludeBaseAmount(?bool $include_base_amount): void
    {
        $this->include_base_amount = $include_base_amount;
    }

    /**
     * @param null|TaxAlias[] $children_tax_ids
     */
    public function setChildrenTaxIds(?array $children_tax_ids): void
    {
        $this->children_tax_ids = $children_tax_ids;
    }

    /**
     * @param TaxAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildrenTaxIds(TaxAlias $item, bool $strict = true): bool
    {
        if (null === $this->children_tax_ids) {
            return false;
        }

        return in_array($item, $this->children_tax_ids, $strict);
    }

    /**
     * @param TaxAlias $item
     */
    public function addChildrenTaxIds(TaxAlias $item): void
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
     * @param TaxAlias $item
     */
    public function removeChildrenTaxIds(TaxAlias $item): void
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
     * @param null|bool $price_include
     */
    public function setPriceInclude(?bool $price_include): void
    {
        $this->price_include = $price_include;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
