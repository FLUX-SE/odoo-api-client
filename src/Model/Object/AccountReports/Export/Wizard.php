<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountReports\Export;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard\Format;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account_reports.export.wizard
 * Name : account_reports.export.wizard
 *
 * Wizard allowing to export an accounting report in several different formats
 * at once, saving them as attachments.
 */
final class Wizard extends Base
{
    /**
     * Export to
     *
     * @var Format
     */
    private $export_format_ids;

    /**
     * Report Model
     *
     * @var null|string
     */
    private $report_model;

    /**
     * Parent Report Id
     *
     * @var null|int
     */
    private $report_id;

    /**
     * Documents Name
     *
     * @var string
     */
    private $doc_name;

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
     * @param Format $export_format_ids
     */
    public function setExportFormatIds(Format $export_format_ids): void
    {
        $this->export_format_ids = $export_format_ids;
    }

    /**
     * @param null|string $report_model
     */
    public function setReportModel(?string $report_model): void
    {
        $this->report_model = $report_model;
    }

    /**
     * @param null|int $report_id
     */
    public function setReportId(?int $report_id): void
    {
        $this->report_id = $report_id;
    }

    /**
     * @param string $doc_name
     */
    public function setDocName(string $doc_name): void
    {
        $this->doc_name = $doc_name;
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
