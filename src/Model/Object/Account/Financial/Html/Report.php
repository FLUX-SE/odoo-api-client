<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Financial\Html;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Filters;
use Flux\OdooApiClient\Model\Object\Ir\Ui\Menu;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.financial.html.report
 * Name : account.financial.html.report
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Report extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Show Credit and Debit Columns
     *
     * @var null|bool
     */
    private $debit_credit;

    /**
     * Lines
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Based on date ranges
     * specify if the report use date_range or single date
     *
     * @var null|bool
     */
    private $date_range;

    /**
     * Allow comparison
     * display the comparison filter
     *
     * @var null|bool
     */
    private $comparison;

    /**
     * Allow analytic filters
     * display the analytic filters
     *
     * @var null|bool
     */
    private $analytic;

    /**
     * Enable the hierarchy option
     * Display the hierarchy choice in the report options
     *
     * @var null|bool
     */
    private $hierarchy_option;

    /**
     * Allow filtering by journals
     * display the journal filter in the report
     *
     * @var null|bool
     */
    private $show_journal_filter;

    /**
     * Show unfold all filter
     * display the unfold all options in report
     *
     * @var null|bool
     */
    private $unfold_all_filter;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Menu Item
     * The menu item generated for this report, or None if there isn't any.
     *
     * @var null|Menu
     */
    private $generated_menu_id;

    /**
     * Parent Menu
     *
     * @var null|Menu
     */
    private $parent_id;

    /**
     * Tax Report
     * Set to True to automatically filter out journal items that have the boolean field 'tax_exigible' set to False
     *
     * @var null|bool
     */
    private $tax_report;

    /**
     * Applicable Filters
     * Filters that can be used to filter and group lines in this report. This uses saved filters on journal items.
     *
     * @var null|Filters[]
     */
    private $applicable_filters_ids;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Menu $generated_menu_id
     */
    public function setGeneratedMenuId(?Menu $generated_menu_id): void
    {
        $this->generated_menu_id = $generated_menu_id;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param Filters $item
     */
    public function removeApplicableFiltersIds(Filters $item): void
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
     * @param Filters $item
     */
    public function addApplicableFiltersIds(Filters $item): void
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
     * @param Filters $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasApplicableFiltersIds(Filters $item, bool $strict = true): bool
    {
        if (null === $this->applicable_filters_ids) {
            return false;
        }

        return in_array($item, $this->applicable_filters_ids, $strict);
    }

    /**
     * @param null|Filters[] $applicable_filters_ids
     */
    public function setApplicableFiltersIds(?array $applicable_filters_ids): void
    {
        $this->applicable_filters_ids = $applicable_filters_ids;
    }

    /**
     * @param null|bool $tax_report
     */
    public function setTaxReport(?bool $tax_report): void
    {
        $this->tax_report = $tax_report;
    }

    /**
     * @param null|Menu $parent_id
     */
    public function setParentId(?Menu $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|bool $debit_credit
     */
    public function setDebitCredit(?bool $debit_credit): void
    {
        $this->debit_credit = $debit_credit;
    }

    /**
     * @param null|bool $unfold_all_filter
     */
    public function setUnfoldAllFilter(?bool $unfold_all_filter): void
    {
        $this->unfold_all_filter = $unfold_all_filter;
    }

    /**
     * @param null|bool $show_journal_filter
     */
    public function setShowJournalFilter(?bool $show_journal_filter): void
    {
        $this->show_journal_filter = $show_journal_filter;
    }

    /**
     * @param null|bool $hierarchy_option
     */
    public function setHierarchyOption(?bool $hierarchy_option): void
    {
        $this->hierarchy_option = $hierarchy_option;
    }

    /**
     * @param null|bool $analytic
     */
    public function setAnalytic(?bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @param null|bool $comparison
     */
    public function setComparison(?bool $comparison): void
    {
        $this->comparison = $comparison;
    }

    /**
     * @param null|bool $date_range
     */
    public function setDateRange(?bool $date_range): void
    {
        $this->date_range = $date_range;
    }

    /**
     * @param Line $item
     */
    public function removeLineIds(Line $item): void
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
     * @param Line $item
     */
    public function addLineIds(Line $item): void
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
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param null|Line[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
