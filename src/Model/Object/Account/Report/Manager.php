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
final class Manager extends Base
{
    /**
     * Report Name
     *
     * @var null|string
     */
    private $report_name;

    /**
     * Summary
     *
     * @var string
     */
    private $summary;

    /**
     * Footnotes
     *
     * @var Footnote
     */
    private $footnotes_ids;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Financial Report
     *
     * @var Report
     */
    private $financial_report_id;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

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
     * @param null|string $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @param Footnote $footnotes_ids
     */
    public function setFootnotesIds(Footnote $footnotes_ids): void
    {
        $this->footnotes_ids = $footnotes_ids;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Report $financial_report_id
     */
    public function setFinancialReportId(Report $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
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
