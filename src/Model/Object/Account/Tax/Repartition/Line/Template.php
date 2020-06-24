<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Account\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax.repartition.line.template
 * Name : account.tax.repartition.line.template
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
final class Template extends Base
{
    /**
     * %
     *
     * @var null|float
     */
    private $factor_percent;

    /**
     * Based On
     *
     * @var null|array
     */
    private $repartition_type;

    /**
     * Account
     *
     * @var TemplateAlias
     */
    private $account_id;

    /**
     * Invoice Tax
     *
     * @var TemplateAliasAlias
     */
    private $invoice_tax_id;

    /**
     * Refund Tax
     *
     * @var TemplateAliasAlias
     */
    private $refund_tax_id;

    /**
     * Financial Tags
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Plus Tax Report Lines
     *
     * @var Line
     */
    private $plus_report_line_ids;

    /**
     * Minus Report Lines
     *
     * @var Line
     */
    private $minus_report_line_ids;

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
     * @param null|array $repartition_type
     */
    public function setRepartitionType(?array $repartition_type): void
    {
        $this->repartition_type = $repartition_type;
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
     */
    public function removeRepartitionType(?array $repartition_type): void
    {
        if ($this->hasRepartitionType($repartition_type)) {
            $index = array_search($repartition_type, $this->repartition_type);
            unset($this->repartition_type[$index]);
        }
    }

    /**
     * @param TemplateAlias $account_id
     */
    public function setAccountId(TemplateAlias $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param TemplateAliasAlias $invoice_tax_id
     */
    public function setInvoiceTaxId(TemplateAliasAlias $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
    }

    /**
     * @param TemplateAliasAlias $refund_tax_id
     */
    public function setRefundTaxId(TemplateAliasAlias $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param Line $plus_report_line_ids
     */
    public function setPlusReportLineIds(Line $plus_report_line_ids): void
    {
        $this->plus_report_line_ids = $plus_report_line_ids;
    }

    /**
     * @param Line $minus_report_line_ids
     */
    public function setMinusReportLineIds(Line $minus_report_line_ids): void
    {
        $this->minus_report_line_ids = $minus_report_line_ids;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
