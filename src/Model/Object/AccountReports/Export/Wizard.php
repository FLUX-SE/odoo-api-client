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
 * Info :
 * Wizard allowing to export an accounting report in several different formats
 * at once, saving them as attachments.
 */
final class Wizard extends Base
{
    /**
     * Export to
     *
     * @var null|Format[]
     */
    private $export_format_ids;

    /**
     * Report Model
     *
     * @var string
     */
    private $report_model;

    /**
     * Parent Report Id
     *
     * @var int
     */
    private $report_id;

    /**
     * Documents Name
     * Name to give to the generated documents.
     *
     * @var null|string
     */
    private $doc_name;

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
     * @param string $report_model Report Model
     * @param int $report_id Parent Report Id
     */
    public function __construct(string $report_model, int $report_id)
    {
        $this->report_model = $report_model;
        $this->report_id = $report_id;
    }

    /**
     * @param null|Format[] $export_format_ids
     */
    public function setExportFormatIds(?array $export_format_ids): void
    {
        $this->export_format_ids = $export_format_ids;
    }

    /**
     * @param Format $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExportFormatIds(Format $item, bool $strict = true): bool
    {
        if (null === $this->export_format_ids) {
            return false;
        }

        return in_array($item, $this->export_format_ids, $strict);
    }

    /**
     * @param Format $item
     */
    public function addExportFormatIds(Format $item): void
    {
        if ($this->hasExportFormatIds($item)) {
            return;
        }

        if (null === $this->export_format_ids) {
            $this->export_format_ids = [];
        }

        $this->export_format_ids[] = $item;
    }

    /**
     * @param Format $item
     */
    public function removeExportFormatIds(Format $item): void
    {
        if (null === $this->export_format_ids) {
            $this->export_format_ids = [];
        }

        if ($this->hasExportFormatIds($item)) {
            $index = array_search($item, $this->export_format_ids);
            unset($this->export_format_ids[$index]);
        }
    }

    /**
     * @param string $report_model
     */
    public function setReportModel(string $report_model): void
    {
        $this->report_model = $report_model;
    }

    /**
     * @param int $report_id
     */
    public function setReportId(int $report_id): void
    {
        $this->report_id = $report_id;
    }

    /**
     * @param null|string $doc_name
     */
    public function setDocName(?string $doc_name): void
    {
        $this->doc_name = $doc_name;
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
