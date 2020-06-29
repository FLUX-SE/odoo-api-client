<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Repartition;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax.repartition.line
 * Name : account.tax.repartition.line
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
     * %
     * Factor to apply on the account move lines generated from this repartition line, in percents
     *
     * @var float
     */
    private $factor_percent;

    /**
     * Factor Ratio
     * Factor to apply on the account move lines generated from this repartition line
     *
     * @var null|float
     */
    private $factor;

    /**
     * Based On
     * Base on which the factor will be applied.
     *
     * @var array
     */
    private $repartition_type;

    /**
     * Account
     * Account on which to post the tax amount
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Tax Grids
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Invoice Tax
     * The tax set to apply this repartition on invoices. Mutually exclusive with refund_tax_id
     *
     * @var null|Tax
     */
    private $invoice_tax_id;

    /**
     * Refund Tax
     * The tax set to apply this repartition on refund invoices. Mutually exclusive with invoice_tax_id
     *
     * @var null|Tax
     */
    private $refund_tax_id;

    /**
     * Tax
     *
     * @var null|Tax
     */
    private $tax_id;

    /**
     * Country
     * Technical field used to restrict tags domain in form view.
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Company
     * The company this repartition line belongs to.
     *
     * @var Company
     */
    private $company_id;

    /**
     * Sequence
     * The order in which display and match repartition lines. For refunds to work properly, invoice repartition
     * lines should be arranged in the same order as the credit note repartition lines they correspond to.
     *
     * @var null|int
     */
    private $sequence;

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
     * @param float $factor_percent %
     *        Factor to apply on the account move lines generated from this repartition line, in percents
     * @param array $repartition_type Based On
     *        Base on which the factor will be applied.
     * @param Company $company_id Company
     *        The company this repartition line belongs to.
     */
    public function __construct(float $factor_percent, array $repartition_type, Company $company_id)
    {
        $this->factor_percent = $factor_percent;
        $this->repartition_type = $repartition_type;
        $this->company_id = $company_id;
    }

    /**
     * @param null|Tax $invoice_tax_id
     */
    public function setInvoiceTaxId(?Tax $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
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
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    /**
     * @return null|Tax
     */
    public function getTaxId(): ?Tax
    {
        return $this->tax_id;
    }

    /**
     * @param null|Tax $refund_tax_id
     */
    public function setRefundTaxId(?Tax $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
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
     * @param float $factor_percent
     */
    public function setFactorPercent(float $factor_percent): void
    {
        $this->factor_percent = $factor_percent;
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
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(?Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param mixed $item
     */
    public function removeRepartitionType($item): void
    {
        if ($this->hasRepartitionType($item)) {
            $index = array_search($item, $this->repartition_type);
            unset($this->repartition_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addRepartitionType($item): void
    {
        if ($this->hasRepartitionType($item)) {
            return;
        }

        $this->repartition_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRepartitionType($item, bool $strict = true): bool
    {
        return in_array($item, $this->repartition_type, $strict);
    }

    /**
     * @param array $repartition_type
     */
    public function setRepartitionType(array $repartition_type): void
    {
        $this->repartition_type = $repartition_type;
    }

    /**
     * @return null|float
     */
    public function getFactor(): ?float
    {
        return $this->factor;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
