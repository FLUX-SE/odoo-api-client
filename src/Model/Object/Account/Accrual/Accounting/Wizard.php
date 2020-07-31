<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Accrual\Accounting;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.accrual.accounting.wizard
 * ---
 * Name : account.accrual.accounting.wizard
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
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Account Type
     * ---
     * Selection :
     *     -> income (Revenue)
     *     -> expense (Expense)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_type;

    /**
     * Active Move Line
     * ---
     * Relation : many2many (account.move.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $active_move_line_ids;

    /**
     * Accrual Default Journal
     * ---
     * Journal used by default for moving the period of an entry
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Expense Accrual Account
     * ---
     * Account used to move the period of an expense
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $expense_accrual_account;

    /**
     * Revenue Accrual Account
     * ---
     * Account used to move the period of a revenue
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $revenue_accrual_account;

    /**
     * Percentage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $percentage;

    /**
     * Total Amount
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $total_amount;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

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
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Accrual Default Journal
     *        ---
     *        Journal used by default for moving the period of an entry
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(DateTimeInterface $date, OdooRelation $company_id, OdooRelation $journal_id)
    {
        $this->date = $date;
        $this->company_id = $company_id;
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation|null $revenue_accrual_account
     */
    public function setRevenueAccrualAccount(?OdooRelation $revenue_accrual_account): void
    {
        $this->revenue_accrual_account = $revenue_accrual_account;
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
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_currency_id")
     */
    public function getCompanyCurrencyId(): ?OdooRelation
    {
        return $this->company_currency_id;
    }

    /**
     * @param float|null $total_amount
     */
    public function setTotalAmount(?float $total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total_amount")
     */
    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    /**
     * @param float|null $percentage
     */
    public function setPercentage(?float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return float|null
     *
     * @SerializedName("percentage")
     */
    public function getPercentage(): ?float
    {
        return $this->percentage;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("revenue_accrual_account")
     */
    public function getRevenueAccrualAccount(): ?OdooRelation
    {
        return $this->revenue_accrual_account;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("date")
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation|null $expense_accrual_account
     */
    public function setExpenseAccrualAccount(?OdooRelation $expense_accrual_account): void
    {
        $this->expense_accrual_account = $expense_accrual_account;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("expense_accrual_account")
     */
    public function getExpenseAccrualAccount(): ?OdooRelation
    {
        return $this->expense_accrual_account;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeActiveMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->active_move_line_ids) {
            $this->active_move_line_ids = [];
        }

        if ($this->hasActiveMoveLineIds($item)) {
            $index = array_search($item, $this->active_move_line_ids);
            unset($this->active_move_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addActiveMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasActiveMoveLineIds($item)) {
            return;
        }

        if (null === $this->active_move_line_ids) {
            $this->active_move_line_ids = [];
        }

        $this->active_move_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasActiveMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->active_move_line_ids) {
            return false;
        }

        return in_array($item, $this->active_move_line_ids);
    }

    /**
     * @param OdooRelation[]|null $active_move_line_ids
     */
    public function setActiveMoveLineIds(?array $active_move_line_ids): void
    {
        $this->active_move_line_ids = $active_move_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("active_move_line_ids")
     */
    public function getActiveMoveLineIds(): ?array
    {
        return $this->active_move_line_ids;
    }

    /**
     * @param string|null $account_type
     */
    public function setAccountType(?string $account_type): void
    {
        $this->account_type = $account_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_type")
     */
    public function getAccountType(): ?string
    {
        return $this->account_type;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.accrual.accounting.wizard';
    }
}
