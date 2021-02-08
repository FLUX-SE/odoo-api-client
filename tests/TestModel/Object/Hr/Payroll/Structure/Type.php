<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.structure.type
 * ---
 * Name : hr.payroll.structure.type
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
final class Type extends Base
{
    /**
     * Default Working Hours
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_resource_calendar_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Structure Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Default Scheduled Pay
     * ---
     * Defines the frequency of the wage payment.
     * ---
     * Selection :
     *     -> monthly (Monthly)
     *     -> quarterly (Quarterly)
     *     -> semi-annually (Semi-annually)
     *     -> annually (Annually)
     *     -> weekly (Weekly)
     *     -> bi-weekly (Bi-weekly)
     *     -> bi-monthly (Bi-monthly)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $default_schedule_pay;

    /**
     * Structures
     * ---
     * Relation : one2many (hr.payroll.structure -> type_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $struct_ids;

    /**
     * Regular Pay Structure
     * ---
     * Relation : many2one (hr.payroll.structure)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll\Structure
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_struct_id;

    /**
     * Default Work Entry Type
     * ---
     * Work entry type for regular attendances.
     * ---
     * Relation : many2one (hr.work.entry.type)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $default_work_entry_type_id;

    /**
     * Wage Type
     * ---
     * Selection :
     *     -> monthly (Monthly Fixed Wage)
     *     -> hourly (Hourly Wage)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $wage_type;

    /**
     * Structure Type Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $struct_type_count;

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
     * @param OdooRelation $default_work_entry_type_id Default Work Entry Type
     *        ---
     *        Work entry type for regular attendances.
     *        ---
     *        Relation : many2one (hr.work.entry.type)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Work\Entry\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $wage_type Wage Type
     *        ---
     *        Selection :
     *            -> monthly (Monthly Fixed Wage)
     *            -> hourly (Hourly Wage)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $default_work_entry_type_id, string $wage_type)
    {
        $this->default_work_entry_type_id = $default_work_entry_type_id;
        $this->wage_type = $wage_type;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("default_work_entry_type_id")
     */
    public function getDefaultWorkEntryTypeId(): OdooRelation
    {
        return $this->default_work_entry_type_id;
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
     * @param int|null $struct_type_count
     */
    public function setStructTypeCount(?int $struct_type_count): void
    {
        $this->struct_type_count = $struct_type_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("struct_type_count")
     */
    public function getStructTypeCount(): ?int
    {
        return $this->struct_type_count;
    }

    /**
     * @param string $wage_type
     */
    public function setWageType(string $wage_type): void
    {
        $this->wage_type = $wage_type;
    }

    /**
     * @return string
     *
     * @SerializedName("wage_type")
     */
    public function getWageType(): string
    {
        return $this->wage_type;
    }

    /**
     * @param OdooRelation $default_work_entry_type_id
     */
    public function setDefaultWorkEntryTypeId(OdooRelation $default_work_entry_type_id): void
    {
        $this->default_work_entry_type_id = $default_work_entry_type_id;
    }

    /**
     * @param OdooRelation|null $default_struct_id
     */
    public function setDefaultStructId(?OdooRelation $default_struct_id): void
    {
        $this->default_struct_id = $default_struct_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_resource_calendar_id")
     */
    public function getDefaultResourceCalendarId(): ?OdooRelation
    {
        return $this->default_resource_calendar_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("default_struct_id")
     */
    public function getDefaultStructId(): ?OdooRelation
    {
        return $this->default_struct_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStructIds(OdooRelation $item): void
    {
        if (null === $this->struct_ids) {
            $this->struct_ids = [];
        }

        if ($this->hasStructIds($item)) {
            $index = array_search($item, $this->struct_ids);
            unset($this->struct_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addStructIds(OdooRelation $item): void
    {
        if ($this->hasStructIds($item)) {
            return;
        }

        if (null === $this->struct_ids) {
            $this->struct_ids = [];
        }

        $this->struct_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStructIds(OdooRelation $item): bool
    {
        if (null === $this->struct_ids) {
            return false;
        }

        return in_array($item, $this->struct_ids);
    }

    /**
     * @param OdooRelation[]|null $struct_ids
     */
    public function setStructIds(?array $struct_ids): void
    {
        $this->struct_ids = $struct_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("struct_ids")
     */
    public function getStructIds(): ?array
    {
        return $this->struct_ids;
    }

    /**
     * @param string|null $default_schedule_pay
     */
    public function setDefaultSchedulePay(?string $default_schedule_pay): void
    {
        $this->default_schedule_pay = $default_schedule_pay;
    }

    /**
     * @return string|null
     *
     * @SerializedName("default_schedule_pay")
     */
    public function getDefaultSchedulePay(): ?string
    {
        return $this->default_schedule_pay;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $default_resource_calendar_id
     */
    public function setDefaultResourceCalendarId(?OdooRelation $default_resource_calendar_id): void
    {
        $this->default_resource_calendar_id = $default_resource_calendar_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.structure.type';
    }
}
