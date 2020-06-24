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
     * %
     *
     * @var null|float
     */
    private $factor_percent;

    /**
     * Factor Ratio
     *
     * @var float
     */
    private $factor;

    /**
     * Based On
     *
     * @var null|array
     */
    private $repartition_type;

    /**
     * Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Tax Grids
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Invoice Tax
     *
     * @var Tax
     */
    private $invoice_tax_id;

    /**
     * Refund Tax
     *
     * @var Tax
     */
    private $refund_tax_id;

    /**
     * Tax
     *
     * @var Tax
     */
    private $tax_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @param null|float $factor_percent
     */
    public function setFactorPercent(?float $factor_percent): void
    {
        $this->factor_percent = $factor_percent;
    }

    /**
     * @return Tax
     */
    public function getTaxId(): Tax
    {
        return $this->tax_id;
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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return Country
     */
    public function getCountryId(): Country
    {
        return $this->country_id;
    }

    /**
     * @param Tax $refund_tax_id
     */
    public function setRefundTaxId(Tax $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @return float
     */
    public function getFactor(): float
    {
        return $this->factor;
    }

    /**
     * @param Tax $invoice_tax_id
     */
    public function setInvoiceTaxId(Tax $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param ?array $repartition_type
     */
    public function removeRepartitionType(?array $repartition_type): void
    {
        if ($this->hasRepartitionType($repartition_type)) {
            $index = array_search($repartition_type, $this->repartition_type);
            unset($this->repartition_type[$index]);
        }
    }

    /**
     * @param ?array $repartition_type
     */
    public function addRepartitionType(?array $repartition_type): void
    {
        if ($this->hasRepartitionType($repartition_type)) {
            return;
        }

        if (null === $this->repartition_type) {
            $this->repartition_type = [];
        }

        $this->repartition_type[] = $repartition_type;
    }

    /**
     * @param ?array $repartition_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRepartitionType(?array $repartition_type, bool $strict = true): bool
    {
        if (null === $this->repartition_type) {
            return false;
        }

        return in_array($repartition_type, $this->repartition_type, $strict);
    }

    /**
     * @param null|array $repartition_type
     */
    public function setRepartitionType(?array $repartition_type): void
    {
        $this->repartition_type = $repartition_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
