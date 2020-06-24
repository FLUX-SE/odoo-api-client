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
 *
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
     * @var string
     */
    private $name;

    /**
     * Show Credit and Debit Columns
     *
     * @var bool
     */
    private $debit_credit;

    /**
     * Lines
     *
     * @var Line
     */
    private $line_ids;

    /**
     * Based on date ranges
     *
     * @var bool
     */
    private $date_range;

    /**
     * Allow comparison
     *
     * @var bool
     */
    private $comparison;

    /**
     * Allow analytic filters
     *
     * @var bool
     */
    private $analytic;

    /**
     * Enable the hierarchy option
     *
     * @var bool
     */
    private $hierarchy_option;

    /**
     * Allow filtering by journals
     *
     * @var bool
     */
    private $show_journal_filter;

    /**
     * Show unfold all filter
     *
     * @var bool
     */
    private $unfold_all_filter;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Menu Item
     *
     * @var Menu
     */
    private $generated_menu_id;

    /**
     * Parent Menu
     *
     * @var Menu
     */
    private $parent_id;

    /**
     * Tax Report
     *
     * @var bool
     */
    private $tax_report;

    /**
     * Applicable Filters
     *
     * @var Filters
     */
    private $applicable_filters_ids;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Menu $generated_menu_id
     */
    public function setGeneratedMenuId(Menu $generated_menu_id): void
    {
        $this->generated_menu_id = $generated_menu_id;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param Filters $applicable_filters_ids
     */
    public function setApplicableFiltersIds(Filters $applicable_filters_ids): void
    {
        $this->applicable_filters_ids = $applicable_filters_ids;
    }

    /**
     * @param bool $tax_report
     */
    public function setTaxReport(bool $tax_report): void
    {
        $this->tax_report = $tax_report;
    }

    /**
     * @param Menu $parent_id
     */
    public function setParentId(Menu $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param bool $debit_credit
     */
    public function setDebitCredit(bool $debit_credit): void
    {
        $this->debit_credit = $debit_credit;
    }

    /**
     * @param bool $unfold_all_filter
     */
    public function setUnfoldAllFilter(bool $unfold_all_filter): void
    {
        $this->unfold_all_filter = $unfold_all_filter;
    }

    /**
     * @param bool $show_journal_filter
     */
    public function setShowJournalFilter(bool $show_journal_filter): void
    {
        $this->show_journal_filter = $show_journal_filter;
    }

    /**
     * @param bool $hierarchy_option
     */
    public function setHierarchyOption(bool $hierarchy_option): void
    {
        $this->hierarchy_option = $hierarchy_option;
    }

    /**
     * @param bool $analytic
     */
    public function setAnalytic(bool $analytic): void
    {
        $this->analytic = $analytic;
    }

    /**
     * @param bool $comparison
     */
    public function setComparison(bool $comparison): void
    {
        $this->comparison = $comparison;
    }

    /**
     * @param bool $date_range
     */
    public function setDateRange(bool $date_range): void
    {
        $this->date_range = $date_range;
    }

    /**
     * @param Line $line_ids
     */
    public function setLineIds(Line $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
