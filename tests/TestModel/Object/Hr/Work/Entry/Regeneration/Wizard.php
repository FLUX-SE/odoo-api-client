<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work\Entry\Regeneration;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.work.entry.regeneration.wizard
 * ---
 * Name : hr.work.entry.regeneration.wizard
 * ---
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
     * Earliest date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $earliest_available_date;

    /**
     * Earliest Available Date Message
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $earliest_available_date_message;

    /**
     * Latest date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $latest_available_date;

    /**
     * Latest Available Date Message
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $latest_available_date_message;

    /**
     * From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_id;

    /**
     * Work Entries Within Interval
     * ---
     * Relation : many2many (hr.work.entry)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work\Entry
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $validated_work_entry_ids;

    /**
     * Search Criteria Completed
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $search_criteria_completed;

    /**
     * Valid
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $valid;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param DateTimeInterface $date_from From
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_to To
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_id Employee
     *        ---
     *        Relation : many2one (hr.employee)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        OdooRelation $employee_id
    ) {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->employee_id = $employee_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasValidatedWorkEntryIds(OdooRelation $item): bool
    {
        if (null === $this->validated_work_entry_ids) {
            return false;
        }

        return in_array($item, $this->validated_work_entry_ids);
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $valid
     */
    public function setValid(?bool $valid): void
    {
        $this->valid = $valid;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("valid")
     */
    public function isValid(): ?bool
    {
        return $this->valid;
    }

    /**
     * @param bool|null $search_criteria_completed
     */
    public function setSearchCriteriaCompleted(?bool $search_criteria_completed): void
    {
        $this->search_criteria_completed = $search_criteria_completed;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("search_criteria_completed")
     */
    public function isSearchCriteriaCompleted(): ?bool
    {
        return $this->search_criteria_completed;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeValidatedWorkEntryIds(OdooRelation $item): void
    {
        if (null === $this->validated_work_entry_ids) {
            $this->validated_work_entry_ids = [];
        }

        if ($this->hasValidatedWorkEntryIds($item)) {
            $index = array_search($item, $this->validated_work_entry_ids);
            unset($this->validated_work_entry_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addValidatedWorkEntryIds(OdooRelation $item): void
    {
        if ($this->hasValidatedWorkEntryIds($item)) {
            return;
        }

        if (null === $this->validated_work_entry_ids) {
            $this->validated_work_entry_ids = [];
        }

        $this->validated_work_entry_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $validated_work_entry_ids
     */
    public function setValidatedWorkEntryIds(?array $validated_work_entry_ids): void
    {
        $this->validated_work_entry_ids = $validated_work_entry_ids;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("earliest_available_date")
     */
    public function getEarliestAvailableDate(): ?DateTimeInterface
    {
        return $this->earliest_available_date;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("validated_work_entry_ids")
     */
    public function getValidatedWorkEntryIds(): ?array
    {
        return $this->validated_work_entry_ids;
    }

    /**
     * @param OdooRelation $employee_id
     */
    public function setEmployeeId(OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): OdooRelation
    {
        return $this->employee_id;
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
     *
     * @SerializedName("date_to")
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
     * @return DateTimeInterface
     *
     * @SerializedName("date_from")
     */
    public function getDateFrom(): DateTimeInterface
    {
        return $this->date_from;
    }

    /**
     * @param string|null $latest_available_date_message
     */
    public function setLatestAvailableDateMessage(?string $latest_available_date_message): void
    {
        $this->latest_available_date_message = $latest_available_date_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("latest_available_date_message")
     */
    public function getLatestAvailableDateMessage(): ?string
    {
        return $this->latest_available_date_message;
    }

    /**
     * @param DateTimeInterface|null $latest_available_date
     */
    public function setLatestAvailableDate(?DateTimeInterface $latest_available_date): void
    {
        $this->latest_available_date = $latest_available_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("latest_available_date")
     */
    public function getLatestAvailableDate(): ?DateTimeInterface
    {
        return $this->latest_available_date;
    }

    /**
     * @param string|null $earliest_available_date_message
     */
    public function setEarliestAvailableDateMessage(?string $earliest_available_date_message): void
    {
        $this->earliest_available_date_message = $earliest_available_date_message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("earliest_available_date_message")
     */
    public function getEarliestAvailableDateMessage(): ?string
    {
        return $this->earliest_available_date_message;
    }

    /**
     * @param DateTimeInterface|null $earliest_available_date
     */
    public function setEarliestAvailableDate(?DateTimeInterface $earliest_available_date): void
    {
        $this->earliest_available_date = $earliest_available_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.work.entry.regeneration.wizard';
    }
}
