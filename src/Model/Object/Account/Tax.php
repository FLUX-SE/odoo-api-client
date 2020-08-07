<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.tax
 * ---
 * Name : account.tax
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
final class Tax extends Base
{
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
     * still be used in a group. 'adjustment' is used to perform tax adjustment.
     * ---
     * Selection :
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
     *
     *         - Group of Taxes: The tax is a set of sub taxes.
     *         - Fixed: The tax amount stays the same whatever the price.
     *         - Percentage of Price: The tax amount is a % of the price:
     *                 e.g 100 * 10% = 110 (not price included)
     *                 e.g 110 / (1 + 10%) = 100 (price included)
     *         - Percentage of Price Tax Included: The tax amount is a division of the price:
     *                 e.g 180 / (1 - 10%) = 200 (not price included)
     *                 e.g 200 * (1 - 10%) = 180 (price included)
     *
     * ---
     * Selection :
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
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Children Taxes
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
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
     * Label on Invoices
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
     * Affect Base of Subsequent Taxes
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
     * Include in Analytic Cost
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
     * Tax Group
     * ---
     * Relation : many2one (account.tax.group)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $tax_group_id;

    /**
     * Hide Use Cash Basis Option
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_tax_exigibility;

    /**
     * Tax Due
     * ---
     * Based on Invoice: the tax is due as soon as the invoice is validated.
     * Based on Payment: the tax is due as soon as the payment of the invoice is received.
     * ---
     * Selection :
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
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_basis_base_account_id;

    /**
     * Repartition for Invoices
     * ---
     * Repartition when the tax is used on an invoice
     * ---
     * Relation : one2many (account.tax.repartition.line -> invoice_tax_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line
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
     * Relation : one2many (account.tax.repartition.line -> refund_tax_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $refund_repartition_line_ids;

    /**
     * Country
     * ---
     * Technical field used to restrict the domain of account tags for tax repartition lines created for this tax.
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $country_id;

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
     * @param string $name Tax Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type_tax_use Tax Scope
     *        ---
     *        Determines where the tax is selectable. Note : 'None' means a tax can't be used by itself, however it can
     *        still be used in a group. 'adjustment' is used to perform tax adjustment.
     *        ---
     *        Selection :
     *            -> sale (Sales)
     *            -> purchase (Purchases)
     *            -> none (None)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $amount_type Tax Computation
     *        ---
     *
     *                - Group of Taxes: The tax is a set of sub taxes.
     *                - Fixed: The tax amount stays the same whatever the price.
     *                - Percentage of Price: The tax amount is a % of the price:
     *                        e.g 100 * 10% = 110 (not price included)
     *                        e.g 110 / (1 + 10%) = 100 (price included)
     *                - Percentage of Price Tax Included: The tax amount is a division of the price:
     *                        e.g 180 / (1 - 10%) = 200 (not price included)
     *                        e.g 200 * (1 - 10%) = 180 (price included)
     *
     *        ---
     *        Selection :
     *            -> group (Group of Taxes)
     *            -> fixed (Fixed)
     *            -> percent (Percentage of Price)
     *            -> division (Percentage of Price Tax Included)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
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
     * @param OdooRelation $tax_group_id Tax Group
     *        ---
     *        Relation : many2one (account.tax.group)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Tax\Group
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $type_tax_use,
        string $amount_type,
        OdooRelation $company_id,
        int $sequence,
        float $amount,
        OdooRelation $tax_group_id
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
     * @param OdooRelation[]|null $refund_repartition_line_ids
     */
    public function setRefundRepartitionLineIds(?array $refund_repartition_line_ids): void
    {
        $this->refund_repartition_line_ids = $refund_repartition_line_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tax_exigibility")
     */
    public function getTaxExigibility(): ?string
    {
        return $this->tax_exigibility;
    }

    /**
     * @param string|null $tax_exigibility
     */
    public function setTaxExigibility(?string $tax_exigibility): void
    {
        $this->tax_exigibility = $tax_exigibility;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("cash_basis_transition_account_id")
     */
    public function getCashBasisTransitionAccountId(): ?OdooRelation
    {
        return $this->cash_basis_transition_account_id;
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
     *
     * @SerializedName("cash_basis_base_account_id")
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_repartition_line_ids")
     */
    public function getInvoiceRepartitionLineIds(): ?array
    {
        return $this->invoice_repartition_line_ids;
    }

    /**
     * @param OdooRelation[]|null $invoice_repartition_line_ids
     */
    public function setInvoiceRepartitionLineIds(?array $invoice_repartition_line_ids): void
    {
        $this->invoice_repartition_line_ids = $invoice_repartition_line_ids;
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
     *
     * @SerializedName("refund_repartition_line_ids")
     */
    public function getRefundRepartitionLineIds(): ?array
    {
        return $this->refund_repartition_line_ids;
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
     * @return bool|null
     *
     * @SerializedName("hide_tax_exigibility")
     */
    public function isHideTaxExigibility(): ?bool
    {
        return $this->hide_tax_exigibility;
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
     * @SerializedName("create_uid")
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
     * @param bool|null $hide_tax_exigibility
     */
    public function setHideTaxExigibility(?bool $hide_tax_exigibility): void
    {
        $this->hide_tax_exigibility = $hide_tax_exigibility;
    }

    /**
     * @param OdooRelation $tax_group_id
     */
    public function setTaxGroupId(OdooRelation $tax_group_id): void
    {
        $this->tax_group_id = $tax_group_id;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     *
     * @SerializedName("type_tax_use")
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
     *
     * @SerializedName("amount_type")
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
     *
     * @SerializedName("active")
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
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("children_tax_ids")
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
     * @return OdooRelation
     *
     * @SerializedName("tax_group_id")
     */
    public function getTaxGroupId(): OdooRelation
    {
        return $this->tax_group_id;
    }

    /**
     * @return int
     *
     * @SerializedName("sequence")
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
     *
     * @SerializedName("amount")
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
     *
     * @SerializedName("description")
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
     *
     * @SerializedName("price_include")
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
     *
     * @SerializedName("include_base_amount")
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
     * @return bool|null
     *
     * @SerializedName("analytic")
     */
    public function isAnalytic(): ?bool
    {
        return $this->analytic;
    }

    /**
     * @param bool|null $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax';
    }
}
