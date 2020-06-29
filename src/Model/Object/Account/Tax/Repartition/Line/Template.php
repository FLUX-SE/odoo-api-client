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
     * %
     * Factor to apply on the account move lines generated from this repartition line, in percents
     *
     * @var float
     */
    private $factor_percent;

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
     * @var null|TemplateAlias
     */
    private $account_id;

    /**
     * Invoice Tax
     * The tax set to apply this repartition on invoices. Mutually exclusive with refund_tax_id
     *
     * @var null|TemplateAliasAlias
     */
    private $invoice_tax_id;

    /**
     * Refund Tax
     * The tax set to apply this repartition on refund invoices. Mutually exclusive with invoice_tax_id
     *
     * @var null|TemplateAliasAlias
     */
    private $refund_tax_id;

    /**
     * Financial Tags
     * Additional tags that will be assigned by this repartition line for use in financial reports
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Plus Tax Report Lines
     * Tax report lines whose '+' tag will be assigned to move lines by this repartition line
     *
     * @var null|Line[]
     */
    private $plus_report_line_ids;

    /**
     * Minus Report Lines
     * Tax report lines whose '-' tag will be assigned to move lines by this repartition line
     *
     * @var null|Line[]
     */
    private $minus_report_line_ids;

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
     */
    public function __construct(float $factor_percent, array $repartition_type)
    {
        $this->factor_percent = $factor_percent;
        $this->repartition_type = $repartition_type;
    }

    /**
     * @param null|Line[] $plus_report_line_ids
     */
    public function setPlusReportLineIds(?array $plus_report_line_ids): void
    {
        $this->plus_report_line_ids = $plus_report_line_ids;
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
     * @param Line $item
     */
    public function removeMinusReportLineIds(Line $item): void
    {
        if (null === $this->minus_report_line_ids) {
            $this->minus_report_line_ids = [];
        }

        if ($this->hasMinusReportLineIds($item)) {
            $index = array_search($item, $this->minus_report_line_ids);
            unset($this->minus_report_line_ids[$index]);
        }
    }

    /**
     * @param Line $item
     */
    public function addMinusReportLineIds(Line $item): void
    {
        if ($this->hasMinusReportLineIds($item)) {
            return;
        }

        if (null === $this->minus_report_line_ids) {
            $this->minus_report_line_ids = [];
        }

        $this->minus_report_line_ids[] = $item;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMinusReportLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->minus_report_line_ids) {
            return false;
        }

        return in_array($item, $this->minus_report_line_ids, $strict);
    }

    /**
     * @param null|Line[] $minus_report_line_ids
     */
    public function setMinusReportLineIds(?array $minus_report_line_ids): void
    {
        $this->minus_report_line_ids = $minus_report_line_ids;
    }

    /**
     * @param Line $item
     */
    public function removePlusReportLineIds(Line $item): void
    {
        if (null === $this->plus_report_line_ids) {
            $this->plus_report_line_ids = [];
        }

        if ($this->hasPlusReportLineIds($item)) {
            $index = array_search($item, $this->plus_report_line_ids);
            unset($this->plus_report_line_ids[$index]);
        }
    }

    /**
     * @param Line $item
     */
    public function addPlusReportLineIds(Line $item): void
    {
        if ($this->hasPlusReportLineIds($item)) {
            return;
        }

        if (null === $this->plus_report_line_ids) {
            $this->plus_report_line_ids = [];
        }

        $this->plus_report_line_ids[] = $item;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPlusReportLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->plus_report_line_ids) {
            return false;
        }

        return in_array($item, $this->plus_report_line_ids, $strict);
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
     * @param null|TemplateAliasAlias $refund_tax_id
     */
    public function setRefundTaxId(?TemplateAliasAlias $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @param null|TemplateAliasAlias $invoice_tax_id
     */
    public function setInvoiceTaxId(?TemplateAliasAlias $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
    }

    /**
     * @param null|TemplateAlias $account_id
     */
    public function setAccountId(?TemplateAlias $account_id): void
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
