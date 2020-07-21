<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Batch\Download;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.batch.download.wizard
 * Name : account.batch.download.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Batch Payment
     * Batch payment from which the file has been generated.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $batch_payment_id;

    /**
     * File
     * Generated XML file
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $export_file;

    /**
     * File name
     * Name of the generated XML file
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $export_filename;

    /**
     * Warning
     * Warning message to display about the content of the downloadable file.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $warning_message;

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
     * @param OdooRelation $batch_payment_id Batch Payment
     *        Batch payment from which the file has been generated.
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $batch_payment_id)
    {
        $this->batch_payment_id = $batch_payment_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     */
    public function getBatchPaymentId(): OdooRelation
    {
        return $this->batch_payment_id;
    }

    /**
     * @param string|null $warning_message
     */
    public function setWarningMessage(?string $warning_message): void
    {
        $this->warning_message = $warning_message;
    }

    /**
     * @return string|null
     */
    public function getWarningMessage(): ?string
    {
        return $this->warning_message;
    }

    /**
     * @param string|null $export_filename
     */
    public function setExportFilename(?string $export_filename): void
    {
        $this->export_filename = $export_filename;
    }

    /**
     * @return string|null
     */
    public function getExportFilename(): ?string
    {
        return $this->export_filename;
    }

    /**
     * @param int|null $export_file
     */
    public function setExportFile(?int $export_file): void
    {
        $this->export_file = $export_file;
    }

    /**
     * @return int|null
     */
    public function getExportFile(): ?int
    {
        return $this->export_file;
    }

    /**
     * @param OdooRelation $batch_payment_id
     */
    public function setBatchPaymentId(OdooRelation $batch_payment_id): void
    {
        $this->batch_payment_id = $batch_payment_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.batch.download.wizard';
    }
}
