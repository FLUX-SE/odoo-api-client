<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Multicurrency\Revaluation;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.multicurrency.revaluation.wizard
 * ---
 * Name : account.multicurrency.revaluation.wizard
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
     * Journal
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
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Reversal Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $reversal_date;

    /**
     * Expense account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $expense_provision_account_id;

    /**
     * Income Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $income_provision_account_id;

    /**
     * Preview Data
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $preview_data;

    /**
     * Show Warning Move
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $show_warning_move_id;

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
     * @param OdooRelation $journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param DateTimeInterface $date Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $reversal_date Reversal Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $expense_provision_account_id Expense account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $income_provision_account_id Income Account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $journal_id,
        DateTimeInterface $date,
        DateTimeInterface $reversal_date,
        OdooRelation $expense_provision_account_id,
        OdooRelation $income_provision_account_id
    ) {
        $this->journal_id = $journal_id;
        $this->date = $date;
        $this->reversal_date = $reversal_date;
        $this->expense_provision_account_id = $expense_provision_account_id;
        $this->income_provision_account_id = $income_provision_account_id;
    }

    /**
     * @param string|null $preview_data
     */
    public function setPreviewData(?string $preview_data): void
    {
        $this->preview_data = $preview_data;
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
     * @param OdooRelation|null $show_warning_move_id
     */
    public function setShowWarningMoveId(?OdooRelation $show_warning_move_id): void
    {
        $this->show_warning_move_id = $show_warning_move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("show_warning_move_id")
     */
    public function getShowWarningMoveId(): ?OdooRelation
    {
        return $this->show_warning_move_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("preview_data")
     */
    public function getPreviewData(): ?string
    {
        return $this->preview_data;
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
     * @param OdooRelation $income_provision_account_id
     */
    public function setIncomeProvisionAccountId(OdooRelation $income_provision_account_id): void
    {
        $this->income_provision_account_id = $income_provision_account_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("income_provision_account_id")
     */
    public function getIncomeProvisionAccountId(): OdooRelation
    {
        return $this->income_provision_account_id;
    }

    /**
     * @param OdooRelation $expense_provision_account_id
     */
    public function setExpenseProvisionAccountId(OdooRelation $expense_provision_account_id): void
    {
        $this->expense_provision_account_id = $expense_provision_account_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("expense_provision_account_id")
     */
    public function getExpenseProvisionAccountId(): OdooRelation
    {
        return $this->expense_provision_account_id;
    }

    /**
     * @param DateTimeInterface $reversal_date
     */
    public function setReversalDate(DateTimeInterface $reversal_date): void
    {
        $this->reversal_date = $reversal_date;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("reversal_date")
     */
    public function getReversalDate(): DateTimeInterface
    {
        return $this->reversal_date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.multicurrency.revaluation.wizard';
    }
}
