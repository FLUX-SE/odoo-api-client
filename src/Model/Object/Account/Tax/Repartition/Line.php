<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Repartition;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.tax.repartition.line
 * ---
 * Name : account.tax.repartition.line
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
     * %
     * ---
     * Factor to apply on the account move lines generated from this distribution line, in percents
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $factor_percent;

    /**
     * Factor Ratio
     * ---
     * Factor to apply on the account move lines generated from this distribution line
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $factor;

    /**
     * Based On
     * ---
     * Base on which the factor will be applied.
     * ---
     * Selection :
     *     -> base (Base)
     *     -> tax (of tax)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $repartition_type;

    /**
     * Account
     * ---
     * Account on which to post the tax amount
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Tax Grids
     * ---
     * Relation : many2many (account.account.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Invoice Tax
     * ---
     * The tax set to apply this distribution on invoices. Mutually exclusive with refund_tax_id
     * ---
     * Relation : many2one (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_tax_id;

    /**
     * Refund Tax
     * ---
     * The tax set to apply this distribution on refund invoices. Mutually exclusive with invoice_tax_id
     * ---
     * Relation : many2one (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $refund_tax_id;

    /**
     * Tax
     * ---
     * Relation : many2one (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_id;

    /**
     * Fiscal Country
     * ---
     * Technical field used to restrict tags domain in form view.
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $tax_fiscal_country_id;

    /**
     * Company
     * ---
     * The company this distribution line belongs to.
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Sequence
     * ---
     * The order in which distribution lines are displayed and matched. For refunds to work properly, invoice
     * distribution lines should be arranged in the same order as the credit note distribution lines they correspond
     * to.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Tax Closing Entry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_in_tax_closing;

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
     * @param float $factor_percent %
     *        ---
     *        Factor to apply on the account move lines generated from this distribution line, in percents
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $repartition_type Based On
     *        ---
     *        Base on which the factor will be applied.
     *        ---
     *        Selection :
     *            -> base (Base)
     *            -> tax (of tax)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(float $factor_percent, string $repartition_type)
    {
        $this->factor_percent = $factor_percent;
        $this->repartition_type = $repartition_type;
    }

    /**
     * @param bool|null $use_in_tax_closing
     */
    public function setUseInTaxClosing(?bool $use_in_tax_closing): void
    {
        $this->use_in_tax_closing = $use_in_tax_closing;
    }

    /**
     * @param OdooRelation|null $tax_fiscal_country_id
     */
    public function setTaxFiscalCountryId(?OdooRelation $tax_fiscal_country_id): void
    {
        $this->tax_fiscal_country_id = $tax_fiscal_country_id;
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
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_in_tax_closing")
     */
    public function isUseInTaxClosing(): ?bool
    {
        return $this->use_in_tax_closing;
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
     * @param OdooRelation|null $tax_id
     */
    public function setTaxId(?OdooRelation $tax_id): void
    {
        $this->tax_id = $tax_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("tax_fiscal_country_id")
     */
    public function getTaxFiscalCountryId(): ?OdooRelation
    {
        return $this->tax_fiscal_country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tax_id")
     */
    public function getTaxId(): ?OdooRelation
    {
        return $this->tax_id;
    }

    /**
     * @return float
     *
     * @SerializedName("factor_percent")
     */
    public function getFactorPercent(): float
    {
        return $this->factor_percent;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param float $factor_percent
     */
    public function setFactorPercent(float $factor_percent): void
    {
        $this->factor_percent = $factor_percent;
    }

    /**
     * @return float|null
     *
     * @SerializedName("factor")
     */
    public function getFactor(): ?float
    {
        return $this->factor;
    }

    /**
     * @param float|null $factor
     */
    public function setFactor(?float $factor): void
    {
        $this->factor = $factor;
    }

    /**
     * @return string
     *
     * @SerializedName("repartition_type")
     */
    public function getRepartitionType(): string
    {
        return $this->repartition_type;
    }

    /**
     * @param string $repartition_type
     */
    public function setRepartitionType(string $repartition_type): void
    {
        $this->repartition_type = $repartition_type;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_ids")
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param OdooRelation|null $refund_tax_id
     */
    public function setRefundTaxId(?OdooRelation $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagIds(OdooRelation $item): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeTagIds(OdooRelation $item): void
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
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_tax_id")
     */
    public function getInvoiceTaxId(): ?OdooRelation
    {
        return $this->invoice_tax_id;
    }

    /**
     * @param OdooRelation|null $invoice_tax_id
     */
    public function setInvoiceTaxId(?OdooRelation $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("refund_tax_id")
     */
    public function getRefundTaxId(): ?OdooRelation
    {
        return $this->refund_tax_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.repartition.line';
    }
}
