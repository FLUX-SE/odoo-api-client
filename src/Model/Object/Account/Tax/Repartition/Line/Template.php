<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Repartition\Line;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.tax.repartition.line.template
 * ---
 * Name : account.tax.repartition.line.template
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
     * Relation : many2one (account.account.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Invoice Tax
     * ---
     * The tax set to apply this repartition on invoices. Mutually exclusive with refund_tax_id
     * ---
     * Relation : many2one (account.tax.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Template
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
     * Relation : many2one (account.tax.template)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $refund_tax_id;

    /**
     * Financial Tags
     * ---
     * Additional tags that will be assigned by this repartition line for use in financial reports
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
     * Plus Tax Report Lines
     * ---
     * Tax report lines whose '+' tag will be assigned to move lines by this repartition line
     * ---
     * Relation : many2many (account.tax.report.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $plus_report_line_ids;

    /**
     * Minus Report Lines
     * ---
     * Tax report lines whose '-' tag will be assigned to move lines by this repartition line
     * ---
     * Relation : many2many (account.tax.report.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $minus_report_line_ids;

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
     */
    public function __construct(float $factor_percent, string $repartition_type)
    {
        $this->factor_percent = $factor_percent;
        $this->repartition_type = $repartition_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePlusReportLineIds(OdooRelation $item): void
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
     * @return OdooRelation[]|null
     */
    public function getMinusReportLineIds(): ?array
    {
        return $this->minus_report_line_ids;
    }

    /**
     * @param OdooRelation[]|null $minus_report_line_ids
     */
    public function setMinusReportLineIds(?array $minus_report_line_ids): void
    {
        $this->minus_report_line_ids = $minus_report_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMinusReportLineIds(OdooRelation $item): bool
    {
        if (null === $this->minus_report_line_ids) {
            return false;
        }

        return in_array($item, $this->minus_report_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMinusReportLineIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeMinusReportLineIds(OdooRelation $item): void
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPlusReportLineIds(OdooRelation $item): bool
    {
        if (null === $this->plus_report_line_ids) {
            return false;
        }

        return in_array($item, $this->plus_report_line_ids);
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
     * @param OdooRelation $item
     */
    public function addPlusReportLineIds(OdooRelation $item): void
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
     * @param OdooRelation[]|null $plus_report_line_ids
     */
    public function setPlusReportLineIds(?array $plus_report_line_ids): void
    {
        $this->plus_report_line_ids = $plus_report_line_ids;
    }

    /**
     * @return float
     */
    public function getFactorPercent(): float
    {
        return $this->factor_percent;
    }

    /**
     * @param OdooRelation|null $invoice_tax_id
     */
    public function setInvoiceTaxId(?OdooRelation $invoice_tax_id): void
    {
        $this->invoice_tax_id = $invoice_tax_id;
    }

    /**
     * @param float $factor_percent
     */
    public function setFactorPercent(float $factor_percent): void
    {
        $this->factor_percent = $factor_percent;
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
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceTaxId(): ?OdooRelation
    {
        return $this->invoice_tax_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRefundTaxId(): ?OdooRelation
    {
        return $this->refund_tax_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPlusReportLineIds(): ?array
    {
        return $this->plus_report_line_ids;
    }

    /**
     * @param OdooRelation|null $refund_tax_id
     */
    public function setRefundTaxId(?OdooRelation $refund_tax_id): void
    {
        $this->refund_tax_id = $refund_tax_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.repartition.line.template';
    }
}
