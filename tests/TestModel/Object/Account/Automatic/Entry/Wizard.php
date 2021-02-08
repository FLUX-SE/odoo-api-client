<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Automatic\Entry;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.automatic.entry.wizard
 * ---
 * Name : account.automatic.entry.wizard
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
     * Action
     * ---
     * Selection :
     *     -> change_period (Change Period)
     *     -> change_account (Change Account)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $action;

    /**
     * Move Data
     * ---
     * JSON value of the moves to be created
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $move_data;

    /**
     * Preview Move Data
     * ---
     * JSON value of the data to be displayed in the previewer
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $preview_move_data;

    /**
     * Move Line
     * ---
     * Relation : many2many (account.move.line)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_currency_id;

    /**
     * Percentage
     * ---
     * Percentage of each line to execute the action on.
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
     * Total amount impacted by the automatic entry.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $total_amount;

    /**
     * Journal
     * ---
     * Journal where to create the entry.
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $journal_id;

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
     * Expense Accrual Account
     * ---
     * Account used to move the period of an expense
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $revenue_accrual_account;

    /**
     * To
     * ---
     * Account to transfer to.
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $destination_account_id;

    /**
     * Currency Conversion Helper
     * ---
     * Technical field. Used to indicate whether or not to display the currency conversion tooltip. The tooltip
     * informs a currency conversion will be performed with the transfer.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_currency_helper;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $action Action
     *        ---
     *        Selection :
     *            -> change_period (Change Period)
     *            -> change_account (Change Account)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Journal where to create the entry.
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        string $action,
        DateTimeInterface $date,
        OdooRelation $company_id,
        OdooRelation $journal_id
    ) {
        $this->action = $action;
        $this->date = $date;
        $this->company_id = $company_id;
        $this->journal_id = $journal_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_currency_helper")
     */
    public function isDisplayCurrencyHelper(): ?bool
    {
        return $this->display_currency_helper;
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
     * @param string|null $account_type
     */
    public function setAccountType(?string $account_type): void
    {
        $this->account_type = $account_type;
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
     * @param OdooRelation|null $expense_accrual_account
     */
    public function setExpenseAccrualAccount(?OdooRelation $expense_accrual_account): void
    {
        $this->expense_accrual_account = $expense_accrual_account;
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
     * @param OdooRelation|null $revenue_accrual_account
     */
    public function setRevenueAccrualAccount(?OdooRelation $revenue_accrual_account): void
    {
        $this->revenue_accrual_account = $revenue_accrual_account;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("destination_account_id")
     */
    public function getDestinationAccountId(): ?OdooRelation
    {
        return $this->destination_account_id;
    }

    /**
     * @param OdooRelation|null $destination_account_id
     */
    public function setDestinationAccountId(?OdooRelation $destination_account_id): void
    {
        $this->destination_account_id = $destination_account_id;
    }

    /**
     * @param bool|null $display_currency_helper
     */
    public function setDisplayCurrencyHelper(?bool $display_currency_helper): void
    {
        $this->display_currency_helper = $display_currency_helper;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
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
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param float|null $total_amount
     */
    public function setTotalAmount(?float $total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return string
     *
     * @SerializedName("action")
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            return;
        }

        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        $this->move_line_ids[] = $item;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string|null
     *
     * @SerializedName("move_data")
     */
    public function getMoveData(): ?string
    {
        return $this->move_data;
    }

    /**
     * @param string|null $move_data
     */
    public function setMoveData(?string $move_data): void
    {
        $this->move_data = $move_data;
    }

    /**
     * @return string|null
     *
     * @SerializedName("preview_move_data")
     */
    public function getPreviewMoveData(): ?string
    {
        return $this->preview_move_data;
    }

    /**
     * @param string|null $preview_move_data
     */
    public function setPreviewMoveData(?string $preview_move_data): void
    {
        $this->preview_move_data = $preview_move_data;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_ids")
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
    }

    /**
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_ids) {
            return false;
        }

        return in_array($item, $this->move_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        if ($this->hasMoveLineIds($item)) {
            $index = array_search($item, $this->move_line_ids);
            unset($this->move_line_ids[$index]);
        }
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
     * @return DateTimeInterface
     *
     * @SerializedName("date")
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
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param OdooRelation|null $company_currency_id
     */
    public function setCompanyCurrencyId(?OdooRelation $company_currency_id): void
    {
        $this->company_currency_id = $company_currency_id;
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
     * @param float|null $percentage
     */
    public function setPercentage(?float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.automatic.entry.wizard';
    }
}
