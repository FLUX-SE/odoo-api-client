<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.report.manager
 * Name : account.report.manager
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
final class Manager extends Base
{
    /**
     * Report Name
     * name of the model of the report
     *
     * @var string
     */
    private $report_name;

    /**
     * Summary
     *
     * @var null|string
     */
    private $summary;

    /**
     * Footnotes
     *
     * @var null|Footnote[]
     */
    private $footnotes_ids;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Financial Report
     *
     * @var null|Report
     */
    private $financial_report_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

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
     * @param string $report_name Report Name
     *        name of the model of the report
     */
    public function __construct(string $report_name)
    {
        $this->report_name = $report_name;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param null|string $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @param null|Footnote[] $footnotes_ids
     */
    public function setFootnotesIds(?array $footnotes_ids): void
    {
        $this->footnotes_ids = $footnotes_ids;
    }

    /**
     * @param Footnote $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFootnotesIds(Footnote $item, bool $strict = true): bool
    {
        if (null === $this->footnotes_ids) {
            return false;
        }

        return in_array($item, $this->footnotes_ids, $strict);
    }

    /**
     * @param Footnote $item
     */
    public function addFootnotesIds(Footnote $item): void
    {
        if ($this->hasFootnotesIds($item)) {
            return;
        }

        if (null === $this->footnotes_ids) {
            $this->footnotes_ids = [];
        }

        $this->footnotes_ids[] = $item;
    }

    /**
     * @param Footnote $item
     */
    public function removeFootnotesIds(Footnote $item): void
    {
        if (null === $this->footnotes_ids) {
            $this->footnotes_ids = [];
        }

        if ($this->hasFootnotesIds($item)) {
            $index = array_search($item, $this->footnotes_ids);
            unset($this->footnotes_ids[$index]);
        }
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Report $financial_report_id
     */
    public function setFinancialReportId(?Report $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
