<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fr;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.fr.fec
 * Name : account.fr.fec
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Fec extends Base
{
    /**
     * Start Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * FEC File
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $fec_data;

    /**
     * Filename
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $filename;

    /**
     * Export Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> official (Official FEC report (posted entries only))
     *     -> nonofficial (Non-official FEC report (posted and unposted entries))
     *
     *
     * @var string
     */
    private $export_type;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param DateTimeInterface $date_from Start Date
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_to End Date
     *        Searchable : yes
     *        Sortable : yes
     * @param string $export_type Export Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> official (Official FEC report (posted entries only))
     *            -> nonofficial (Non-official FEC report (posted and unposted entries))
     *
     */
    public function __construct(
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        string $export_type
    ) {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->export_type = $export_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param string $export_type
     */
    public function setExportType(string $export_type): void
    {
        $this->export_type = $export_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateFrom(): DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @return string
     */
    public function getExportType(): string
    {
        return $this->export_type;
    }

    /**
     * @param string|null $filename
     */
    public function setFilename(?string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param int|null $fec_data
     */
    public function setFecData(?int $fec_data): void
    {
        $this->fec_data = $fec_data;
    }

    /**
     * @return int|null
     */
    public function getFecData(): ?int
    {
        return $this->fec_data;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateTo(): DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.fr.fec';
    }
}
