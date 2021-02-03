<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.sequence
 * ---
 * Name : ir.sequence
 * ---
 * Info :
 * Sequence model.
 *
 *         The sequence model allows to define and use so-called sequence objects.
 *         Such objects are used to generate unique identifiers in a transaction-safe
 *         way.
 */
final class Sequence extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Sequence Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $code;

    /**
     * Implementation
     * ---
     * While assigning a sequence number to a record, the 'no gap' sequence implementation ensures that each previous
     * sequence number has been assigned already. While this sequence implementation will not skip any sequence
     * number upon assignment, there can still be gaps in the sequence if records are deleted. The 'no gap'
     * implementation is slower than the standard one.
     * ---
     * Selection :
     *     -> standard (Standard)
     *     -> no_gap (No gap)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $implementation;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Prefix
     * ---
     * Prefix value of the record for the sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $prefix;

    /**
     * Suffix
     * ---
     * Suffix value of the record for the sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $suffix;

    /**
     * Next Number
     * ---
     * Next number of this sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $number_next;

    /**
     * Actual Next Number
     * ---
     * Next number that will be used. This number can be incremented frequently so the displayed value might already
     * be obsolete
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $number_next_actual;

    /**
     * Step
     * ---
     * The next number of the sequence will be incremented by this number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $number_increment;

    /**
     * Sequence Size
     * ---
     * Odoo will automatically adds some '0' on the left of the 'Next Number' to get the required padding size.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $padding;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Use subsequences per date_range
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_date_range;

    /**
     * Subsequences
     * ---
     * Relation : one2many (ir.sequence.date_range -> sequence_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence\DateRange
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $date_range_ids;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $implementation Implementation
     *        ---
     *        While assigning a sequence number to a record, the 'no gap' sequence implementation ensures that each previous
     *        sequence number has been assigned already. While this sequence implementation will not skip any sequence
     *        number upon assignment, there can still be gaps in the sequence if records are deleted. The 'no gap'
     *        implementation is slower than the standard one.
     *        ---
     *        Selection :
     *            -> standard (Standard)
     *            -> no_gap (No gap)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $number_next Next Number
     *        ---
     *        Next number of this sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $number_increment Step
     *        ---
     *        The next number of the sequence will be incremented by this number
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $padding Sequence Size
     *        ---
     *        Odoo will automatically adds some '0' on the left of the 'Next Number' to get the required padding size.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $implementation,
        int $number_next,
        int $number_increment,
        int $padding
    ) {
        $this->name = $name;
        $this->implementation = $implementation;
        $this->number_next = $number_next;
        $this->number_increment = $number_increment;
        $this->padding = $padding;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDateRangeIds(OdooRelation $item): void
    {
        if (null === $this->date_range_ids) {
            $this->date_range_ids = [];
        }

        if ($this->hasDateRangeIds($item)) {
            $index = array_search($item, $this->date_range_ids);
            unset($this->date_range_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_date_range")
     */
    public function isUseDateRange(): ?bool
    {
        return $this->use_date_range;
    }

    /**
     * @param bool|null $use_date_range
     */
    public function setUseDateRange(?bool $use_date_range): void
    {
        $this->use_date_range = $use_date_range;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("date_range_ids")
     */
    public function getDateRangeIds(): ?array
    {
        return $this->date_range_ids;
    }

    /**
     * @param OdooRelation[]|null $date_range_ids
     */
    public function setDateRangeIds(?array $date_range_ids): void
    {
        $this->date_range_ids = $date_range_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDateRangeIds(OdooRelation $item): bool
    {
        if (null === $this->date_range_ids) {
            return false;
        }

        return in_array($item, $this->date_range_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addDateRangeIds(OdooRelation $item): void
    {
        if ($this->hasDateRangeIds($item)) {
            return;
        }

        if (null === $this->date_range_ids) {
            $this->date_range_ids = [];
        }

        $this->date_range_ids[] = $item;
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
     * @param int $padding
     */
    public function setPadding(int $padding): void
    {
        $this->padding = $padding;
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return int
     *
     * @SerializedName("padding")
     */
    public function getPadding(): int
    {
        return $this->padding;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("prefix")
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     *
     * @SerializedName("implementation")
     */
    public function getImplementation(): string
    {
        return $this->implementation;
    }

    /**
     * @param string $implementation
     */
    public function setImplementation(string $implementation): void
    {
        $this->implementation = $implementation;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string|null $prefix
     */
    public function setPrefix(?string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * @param int $number_increment
     */
    public function setNumberIncrement(int $number_increment): void
    {
        $this->number_increment = $number_increment;
    }

    /**
     * @return string|null
     *
     * @SerializedName("suffix")
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @param string|null $suffix
     */
    public function setSuffix(?string $suffix): void
    {
        $this->suffix = $suffix;
    }

    /**
     * @return int
     *
     * @SerializedName("number_next")
     */
    public function getNumberNext(): int
    {
        return $this->number_next;
    }

    /**
     * @param int $number_next
     */
    public function setNumberNext(int $number_next): void
    {
        $this->number_next = $number_next;
    }

    /**
     * @return int|null
     *
     * @SerializedName("number_next_actual")
     */
    public function getNumberNextActual(): ?int
    {
        return $this->number_next_actual;
    }

    /**
     * @param int|null $number_next_actual
     */
    public function setNumberNextActual(?int $number_next_actual): void
    {
        $this->number_next_actual = $number_next_actual;
    }

    /**
     * @return int
     *
     * @SerializedName("number_increment")
     */
    public function getNumberIncrement(): int
    {
        return $this->number_increment;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.sequence';
    }
}
