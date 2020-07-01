<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Batch;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.batch.payment
 * Name : account.batch.payment
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
final class Payment extends Base
{
    public const ODOO_MODEL_NAME = 'account.batch.payment';

    /**
     * Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * State
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (New)
     *     -> sent (Sent)
     *     -> reconciled (Reconciled)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Bank
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Payments
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $payment_ids;

    /**
     * Amount
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount;

    /**
     * Currency
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Batch Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> inbound (Inbound)
     *     -> outbound (Outbound)
     *
     *
     * @var string
     */
    private $batch_type;

    /**
     * Payment Method
     * The payment method used by the payments in this batch.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_method_id;

    /**
     * Code
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $payment_method_code;

    /**
     * Generation Date
     * Creation date of the related export file.
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $export_file_create_date;

    /**
     * File
     * Export file related to this batch
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $export_file;

    /**
     * File Name
     * Name of the export file generated for this batch
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $export_filename;

    /**
     * Available Payment Method
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $available_payment_method_ids;

    /**
     * File Generation Enabled
     * Whether or not this batch payment should display the 'Generate File' button instead of 'Print' in form view.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $file_generation_enabled;

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
     * @param string $name Reference
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Bank
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $payment_ids Payments
     *        Searchable : yes
     *        Sortable : no
     * @param string $batch_type Batch Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> inbound (Inbound)
     *            -> outbound (Outbound)
     *
     * @param OdooRelation $payment_method_id Payment Method
     *        The payment method used by the payments in this batch.
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        DateTimeInterface $date,
        OdooRelation $journal_id,
        array $payment_ids,
        string $batch_type,
        OdooRelation $payment_method_id
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->journal_id = $journal_id;
        $this->payment_ids = $payment_ids;
        $this->batch_type = $batch_type;
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAvailablePaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasAvailablePaymentMethodIds($item)) {
            return;
        }

        if (null === $this->available_payment_method_ids) {
            $this->available_payment_method_ids = [];
        }

        $this->available_payment_method_ids[] = $item;
    }

    /**
     * @param DateTimeInterface|null $export_file_create_date
     */
    public function setExportFileCreateDate(?DateTimeInterface $export_file_create_date): void
    {
        $this->export_file_create_date = $export_file_create_date;
    }

    /**
     * @return int|null
     */
    public function getExportFile(): ?int
    {
        return $this->export_file;
    }

    /**
     * @param int|null $export_file
     */
    public function setExportFile(?int $export_file): void
    {
        $this->export_file = $export_file;
    }

    /**
     * @return string|null
     */
    public function getExportFilename(): ?string
    {
        return $this->export_filename;
    }

    /**
     * @param string|null $export_filename
     */
    public function setExportFilename(?string $export_filename): void
    {
        $this->export_filename = $export_filename;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAvailablePaymentMethodIds(): ?array
    {
        return $this->available_payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $available_payment_method_ids
     */
    public function setAvailablePaymentMethodIds(?array $available_payment_method_ids): void
    {
        $this->available_payment_method_ids = $available_payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAvailablePaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->available_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->available_payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAvailablePaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->available_payment_method_ids) {
            $this->available_payment_method_ids = [];
        }

        if ($this->hasAvailablePaymentMethodIds($item)) {
            $index = array_search($item, $this->available_payment_method_ids);
            unset($this->available_payment_method_ids[$index]);
        }
    }

    /**
     * @param string|null $payment_method_code
     */
    public function setPaymentMethodCode(?string $payment_method_code): void
    {
        $this->payment_method_code = $payment_method_code;
    }

    /**
     * @return bool|null
     */
    public function isFileGenerationEnabled(): ?bool
    {
        return $this->file_generation_enabled;
    }

    /**
     * @param bool|null $file_generation_enabled
     */
    public function setFileGenerationEnabled(?bool $file_generation_enabled): void
    {
        $this->file_generation_enabled = $file_generation_enabled;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return DateTimeInterface|null
     */
    public function getExportFileCreateDate(): ?DateTimeInterface
    {
        return $this->export_file_create_date;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethodCode(): ?string
    {
        return $this->payment_method_code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation[] $payment_ids
     */
    public function setPaymentIds(array $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation[]
     */
    public function getPaymentIds(): array
    {
        return $this->payment_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentIds(OdooRelation $item): bool
    {
        return in_array($item, $this->payment_ids);
    }

    /**
     * @param OdooRelation $payment_method_id
     */
    public function setPaymentMethodId(OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIds($item)) {
            return;
        }

        $this->payment_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIds($item)) {
            $index = array_search($item, $this->payment_ids);
            unset($this->payment_ids[$index]);
        }
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string
     */
    public function getBatchType(): string
    {
        return $this->batch_type;
    }

    /**
     * @param string $batch_type
     */
    public function setBatchType(string $batch_type): void
    {
        $this->batch_type = $batch_type;
    }

    /**
     * @return OdooRelation
     */
    public function getPaymentMethodId(): OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
