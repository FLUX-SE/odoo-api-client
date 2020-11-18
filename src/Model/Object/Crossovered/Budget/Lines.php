<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Crossovered\Budget;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : crossovered.budget.lines
 * ---
 * Name : crossovered.budget.lines
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
final class Lines extends Base
{
    /**
     * Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Budget
     * ---
     * Relation : many2one (crossovered.budget)
     * @see \Flux\OdooApiClient\Model\Object\Crossovered\Budget
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $crossovered_budget_id;

    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Analytic Group
     * ---
     * Relation : many2one (account.analytic.group)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Group
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $analytic_group_id;

    /**
     * Budgetary Position
     * ---
     * Relation : many2one (account.budget.post)
     * @see \Flux\OdooApiClient\Model\Object\Account\Budget\Post
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $general_budget_id;

    /**
     * Start Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Paid Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $paid_date;

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
    private $currency_id;

    /**
     * Planned Amount
     * ---
     * Amount you plan to earn/spend. Record a positive amount if it is a revenue and a negative amount if it is a
     * cost.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $planned_amount;

    /**
     * Practical Amount
     * ---
     * Amount really earned/spent.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $practical_amount;

    /**
     * Theoretical Amount
     * ---
     * Amount you are supposed to have earned/spent at this date.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $theoritical_amount;

    /**
     * Achievement
     * ---
     * Comparison between practical and theoretical amount. This measure tells you if you are below or over budget.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $percentage;

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
     * Is Above Budget
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_above_budget;

    /**
     * Budget State
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> cancel (Cancelled)
     *     -> confirm (Confirmed)
     *     -> validate (Validated)
     *     -> done (Done)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $crossovered_budget_state;

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
     * @param OdooRelation $crossovered_budget_id Budget
     *        ---
     *        Relation : many2one (crossovered.budget)
     *        @see \Flux\OdooApiClient\Model\Object\Crossovered\Budget
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_from Start Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $date_to End Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $planned_amount Planned Amount
     *        ---
     *        Amount you plan to earn/spend. Record a positive amount if it is a revenue and a negative amount if it is a
     *        cost.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $crossovered_budget_id,
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        float $planned_amount
    ) {
        $this->crossovered_budget_id = $crossovered_budget_id;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->planned_amount = $planned_amount;
    }

    /**
     * @return string|null
     *
     * @SerializedName("crossovered_budget_state")
     */
    public function getCrossoveredBudgetState(): ?string
    {
        return $this->crossovered_budget_state;
    }

    /**
     * @param float|null $theoritical_amount
     */
    public function setTheoriticalAmount(?float $theoritical_amount): void
    {
        $this->theoritical_amount = $theoritical_amount;
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
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
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
     * @SerializedName("is_above_budget")
     */
    public function isIsAboveBudget(): ?bool
    {
        return $this->is_above_budget;
    }

    /**
     * @param bool|null $is_above_budget
     */
    public function setIsAboveBudget(?bool $is_above_budget): void
    {
        $this->is_above_budget = $is_above_budget;
    }

    /**
     * @param string|null $crossovered_budget_state
     */
    public function setCrossoveredBudgetState(?string $crossovered_budget_state): void
    {
        $this->crossovered_budget_state = $crossovered_budget_state;
    }

    /**
     * @param float|null $practical_amount
     */
    public function setPracticalAmount(?float $practical_amount): void
    {
        $this->practical_amount = $practical_amount;
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
     * @return float|null
     *
     * @SerializedName("theoritical_amount")
     */
    public function getTheoriticalAmount(): ?float
    {
        return $this->theoritical_amount;
    }

    /**
     * @return float|null
     *
     * @SerializedName("practical_amount")
     */
    public function getPracticalAmount(): ?float
    {
        return $this->practical_amount;
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
     * @param OdooRelation|null $general_budget_id
     */
    public function setGeneralBudgetId(?OdooRelation $general_budget_id): void
    {
        $this->general_budget_id = $general_budget_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("crossovered_budget_id")
     */
    public function getCrossoveredBudgetId(): OdooRelation
    {
        return $this->crossovered_budget_id;
    }

    /**
     * @param OdooRelation $crossovered_budget_id
     */
    public function setCrossoveredBudgetId(OdooRelation $crossovered_budget_id): void
    {
        $this->crossovered_budget_id = $crossovered_budget_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("analytic_account_id")
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("analytic_group_id")
     */
    public function getAnalyticGroupId(): ?OdooRelation
    {
        return $this->analytic_group_id;
    }

    /**
     * @param OdooRelation|null $analytic_group_id
     */
    public function setAnalyticGroupId(?OdooRelation $analytic_group_id): void
    {
        $this->analytic_group_id = $analytic_group_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("general_budget_id")
     */
    public function getGeneralBudgetId(): ?OdooRelation
    {
        return $this->general_budget_id;
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
     * @param float $planned_amount
     */
    public function setPlannedAmount(float $planned_amount): void
    {
        $this->planned_amount = $planned_amount;
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
     * @SerializedName("date_to")
     */
    public function getDateTo(): DateTimeInterface
    {
        return $this->date_to;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("paid_date")
     */
    public function getPaidDate(): ?DateTimeInterface
    {
        return $this->paid_date;
    }

    /**
     * @param DateTimeInterface|null $paid_date
     */
    public function setPaidDate(?DateTimeInterface $paid_date): void
    {
        $this->paid_date = $paid_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
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
     * @return float
     *
     * @SerializedName("planned_amount")
     */
    public function getPlannedAmount(): float
    {
        return $this->planned_amount;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'crossovered.budget.lines';
    }
}
