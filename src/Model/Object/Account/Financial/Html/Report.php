<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Financial\Html;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.financial.html.report
 * ---
 * Name : account.financial.html.report
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
final class Report extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Show Credit and Debit Columns
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $debit_credit;

    /**
     * Lines
     * ---
     * Relation : one2many (account.financial.html.report.line -> financial_report_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Based on date ranges
     * ---
     * specify if the report use date_range or single date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $date_range;

    /**
     * Allow comparison
     * ---
     * display the comparison filter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $comparison;

    /**
     * Allow analytic filters
     * ---
     * display the analytic filters
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $analytic;

    /**
     * Enable the hierarchy option
     * ---
     * Display the hierarchy choice in the report options
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hierarchy_option;

    /**
     * Allow filtering by journals
     * ---
     * display the journal filter in the report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $show_journal_filter;

    /**
     * Show unfold all filter
     * ---
     * display the unfold all options in report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $unfold_all_filter;

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
     * Menu Item
     * ---
     * The menu item generated for this report, or None if there isn't any.
     * ---
     * Relation : many2one (ir.ui.menu)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\Menu
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $generated_menu_id;

    /**
     * Parent Menu
     * ---
     * Relation : many2one (ir.ui.menu)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\Menu
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Tax Report
     * ---
     * Set to True to automatically filter out journal items that have the boolean field 'tax_exigible' set to False
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_report;

    /**
     * Applicable Filters
     * ---
     * Filters that can be used to filter and group lines in this report. This uses saved filters on journal items.
     * ---
     * Relation : many2many (ir.filters)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Filters
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $applicable_filters_ids;

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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addApplicableFiltersIds(OdooRelation $item): void
    {
        if ($this->hasApplicableFiltersIds($item)) {
            return;
        }

        if (null === $this->applicable_filters_ids) {
            $this->applicable_filters_ids = [];
        }

        $this->applicable_filters_ids[] = $item;
    }

    /**
     * @param OdooRelation|null $generated_menu_id
     */
    public function setGeneratedMenuId(?OdooRelation $generated_menu_id): void
    {
        $this->generated_menu_id = $generated_menu_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("tax_report")
     */
    public function isTaxReport(): ?bool
    {
        return $this->tax_report;
    }

    /**
     * @param bool|null $tax_report
     */
    public function setTaxReport(?bool $tax_report): void
    {
        $this->tax_report = $tax_report;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("applicable_filters_ids")
     */
    public function getApplicableFiltersIds(): ?array
    {
        return $this->applicable_filters_ids;
    }

    /**
     * @param OdooRelation[]|null $applicable_filters_ids
     */
    public function setApplicableFiltersIds(?array $applicable_filters_ids): void
    {
        $this->applicable_filters_ids = $applicable_filters_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasApplicableFiltersIds(OdooRelation $item): bool
    {
        if (null === $this->applicable_filters_ids) {
            return false;
        }

        return in_array($item, $this->applicable_filters_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeApplicableFiltersIds(OdooRelation $item): void
    {
        if (null === $this->applicable_filters_ids) {
            $this->applicable_filters_ids = [];
        }

        if ($this->hasApplicableFiltersIds($item)) {
            $index = array_search($item, $this->applicable_filters_ids);
            unset($this->applicable_filters_ids[$index]);
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
     * @return OdooRelation|null
     *
     * @SerializedName("generated_menu_id")
     */
    public function getGeneratedMenuId(): ?OdooRelation
    {
        return $this->generated_menu_id;
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
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool|null $date_range
     */
    public function setDateRange(?bool $date_range): void
    {
        $this->date_range = $date_range;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("debit_credit")
     */
    public function isDebitCredit(): ?bool
    {
        return $this->debit_credit;
    }

    /**
     * @param bool|null $debit_credit
     */
    public function setDebitCredit(?bool $debit_credit): void
    {
        $this->debit_credit = $debit_credit;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("date_range")
     */
    public function isDateRange(): ?bool
    {
        return $this->date_range;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("comparison")
     */
    public function isComparison(): ?bool
    {
        return $this->comparison;
    }

    /**
     * @param bool|null $unfold_all_filter
     */
    public function setUnfoldAllFilter(?bool $unfold_all_filter): void
    {
        $this->unfold_all_filter = $unfold_all_filter;
    }

    /**
     * @param bool|null $comparison
     */
    public function setComparison(?bool $comparison): void
    {
        $this->comparison = $comparison;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("analytic")
     */
    public function isAnalytic(): ?bool
    {
        return $this->analytic;
    }

    /**
     * @param bool|null $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hierarchy_option")
     */
    public function isHierarchyOption(): ?bool
    {
        return $this->hierarchy_option;
    }

    /**
     * @param bool|null $hierarchy_option
     */
    public function setHierarchyOption(?bool $hierarchy_option): void
    {
        $this->hierarchy_option = $hierarchy_option;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_journal_filter")
     */
    public function isShowJournalFilter(): ?bool
    {
        return $this->show_journal_filter;
    }

    /**
     * @param bool|null $show_journal_filter
     */
    public function setShowJournalFilter(?bool $show_journal_filter): void
    {
        $this->show_journal_filter = $show_journal_filter;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("unfold_all_filter")
     */
    public function isUnfoldAllFilter(): ?bool
    {
        return $this->unfold_all_filter;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.financial.html.report';
    }
}
