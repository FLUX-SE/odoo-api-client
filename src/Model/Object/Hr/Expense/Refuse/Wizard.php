<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Expense\Refuse;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.expense.refuse.wizard
 * ---
 * Name : hr.expense.refuse.wizard
 * ---
 * Info :
 * This wizard can be launched from an he.expense (an expense line)
 *         or from an hr.expense.sheet (En expense report)
 *         'hr_expense_refuse_model' must be passed in the context to differentiate
 *         the right model to use.
 */
final class Wizard extends Base
{
    /**
     * Reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $reason;

    /**
     * Hr Expense
     * ---
     * Relation : many2many (hr.expense)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $hr_expense_ids;

    /**
     * Hr Expense Sheet
     * ---
     * Relation : many2one (hr.expense.sheet)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense\Sheet
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $hr_expense_sheet_id;

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
     * @param string $reason Reason
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $reason)
    {
        $this->reason = $reason;
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
     * @param OdooRelation|null $hr_expense_sheet_id
     */
    public function setHrExpenseSheetId(?OdooRelation $hr_expense_sheet_id): void
    {
        $this->hr_expense_sheet_id = $hr_expense_sheet_id;
    }

    /**
     * @return string
     *
     * @SerializedName("reason")
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("hr_expense_sheet_id")
     */
    public function getHrExpenseSheetId(): ?OdooRelation
    {
        return $this->hr_expense_sheet_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeHrExpenseIds(OdooRelation $item): void
    {
        if (null === $this->hr_expense_ids) {
            $this->hr_expense_ids = [];
        }

        if ($this->hasHrExpenseIds($item)) {
            $index = array_search($item, $this->hr_expense_ids);
            unset($this->hr_expense_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addHrExpenseIds(OdooRelation $item): void
    {
        if ($this->hasHrExpenseIds($item)) {
            return;
        }

        if (null === $this->hr_expense_ids) {
            $this->hr_expense_ids = [];
        }

        $this->hr_expense_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasHrExpenseIds(OdooRelation $item): bool
    {
        if (null === $this->hr_expense_ids) {
            return false;
        }

        return in_array($item, $this->hr_expense_ids);
    }

    /**
     * @param OdooRelation[]|null $hr_expense_ids
     */
    public function setHrExpenseIds(?array $hr_expense_ids): void
    {
        $this->hr_expense_ids = $hr_expense_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("hr_expense_ids")
     */
    public function getHrExpenseIds(): ?array
    {
        return $this->hr_expense_ids;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.expense.refuse.wizard';
    }
}
