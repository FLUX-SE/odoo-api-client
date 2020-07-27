<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Repartition;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * Factor to apply on the account move lines generated from this repartition line, in percents
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
     * Factor to apply on the account move lines generated from this repartition line
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
     * Selection : (default value, usually null)
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
     * The tax set to apply this repartition on invoices. Mutually exclusive with refund_tax_id
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
     * The tax set to apply this repartition on refund invoices. Mutually exclusive with invoice_tax_id
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
     * Country
     * ---
     * Technical field used to restrict tags domain in form view.
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
     * Company
     * ---
     * The company this repartition line belongs to.
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
     * Sequence
     * ---
     * The order in which display and match repartition lines. For refunds to work properly, invoice repartition
     * lines should be arranged in the same order as the credit note repartition lines they correspond to.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

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
     *        Factor to apply on the account move lines generated from this repartition line, in percents
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $repartition_type Based On
     *        ---
     *        Base on which the factor will be applied.
     *        ---
     *        Selection : (default value, usually null)
     *            -> base (Base)
     *            -> tax (of tax)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        The company this repartition line belongs to.
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(float $factor_percent, string $repartition_type, OdooRelation $company_id)
    {
        $this->factor_percent = $factor_percent;
        $this->repartition_type = $repartition_type;
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
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
     * @return OdooRelation
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
     * @return int|null
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxId(): ?OdooRelation
    {
        return $this->tax_id;
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
     * @param OdooRelation|null $tax_id
     */
    public function setTaxId(?OdooRelation $tax_id): void
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @param OdooRelation|null $refund_tax_id
     */
    public function setRefundTaxId(?OdooRelation $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @return float
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
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRefundTaxId(): ?OdooRelation
    {
        return $this->refund_tax_id;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.repartition.line';
    }
}
