<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountReports\Export;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account_reports.export.wizard
 * Name : account_reports.export.wizard
 * Info :
 * Wizard allowing to export an accounting report in several different formats
 *         at once, saving them as attachments.
 */
final class Wizard extends Base
{
    /**
     * Export to
     * ---
     * Relation : many2many (account_reports.export.wizard.format)
     * @see \Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard\Format
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $export_format_ids;

    /**
     * Report Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $report_model;

    /**
     * Parent Report Id
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $report_id;

    /**
     * Documents Name
     * ---
     * Name to give to the generated documents.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $doc_name;

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
     * @param string $report_model Report Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $report_id Parent Report Id
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $report_model, int $report_id)
    {
        $this->report_model = $report_model;
        $this->report_id = $report_id;
    }

    /**
     * @param string|null $doc_name
     */
    public function setDocName(?string $doc_name): void
    {
        $this->doc_name = $doc_name;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
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
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return string|null
     */
    public function getDocName(): ?string
    {
        return $this->doc_name;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getExportFormatIds(): ?array
    {
        return $this->export_format_ids;
    }

    /**
     * @param int $report_id
     */
    public function setReportId(int $report_id): void
    {
        $this->report_id = $report_id;
    }

    /**
     * @return int
     */
    public function getReportId(): int
    {
        return $this->report_id;
    }

    /**
     * @param string $report_model
     */
    public function setReportModel(string $report_model): void
    {
        $this->report_model = $report_model;
    }

    /**
     * @return string
     */
    public function getReportModel(): string
    {
        return $this->report_model;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExportFormatIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addExportFormatIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExportFormatIds(OdooRelation $item): bool
    {
        if (null === $this->export_format_ids) {
            return false;
        }

        return in_array($item, $this->export_format_ids);
    }

    /**
     * @param OdooRelation[]|null $export_format_ids
     */
    public function setExportFormatIds(?array $export_format_ids): void
    {
        $this->export_format_ids = $export_format_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account_reports.export.wizard';
    }
}
