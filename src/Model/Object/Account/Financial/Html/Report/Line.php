<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report;
use Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Actions;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.financial.html.report.line
 * Name : account.financial.html.report.line
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
final class Line extends Base
{
    /**
     * Section Name
     *
     * @var string
     */
    private $name;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Financial Report
     *
     * @var Report
     */
    private $financial_report_id;

    /**
     * Parent
     *
     * @var LineAlias
     */
    private $parent_id;

    /**
     * Children
     *
     * @var LineAlias
     */
    private $children_ids;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Domain
     *
     * @var string
     */
    private $domain;

    /**
     * Formulas
     *
     * @var string
     */
    private $formulas;

    /**
     * Group by
     *
     * @var string
     */
    private $groupby;

    /**
     * Type
     *
     * @var null|array
     */
    private $figure_type;

    /**
     * Print On New Page
     *
     * @var bool
     */
    private $print_on_new_page;

    /**
     * Is growth good when positive
     *
     * @var bool
     */
    private $green_on_positive;

    /**
     * Level
     *
     * @var null|int
     */
    private $level;

    /**
     * Special Date Changer
     *
     * @var array
     */
    private $special_date_changer;

    /**
     * Show Domain
     *
     * @var array
     */
    private $show_domain;

    /**
     * Hide If Zero
     *
     * @var bool
     */
    private $hide_if_zero;

    /**
     * Hide If Empty
     *
     * @var bool
     */
    private $hide_if_empty;

    /**
     * Action
     *
     * @var Actions
     */
    private $action_id;

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
     * @param array $special_date_changer
     */
    public function setSpecialDateChanger(array $special_date_changer): void
    {
        $this->special_date_changer = $special_date_changer;
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
     * @param Actions $action_id
     */
    public function setActionId(Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @param bool $hide_if_empty
     */
    public function setHideIfEmpty(bool $hide_if_empty): void
    {
        $this->hide_if_empty = $hide_if_empty;
    }

    /**
     * @param bool $hide_if_zero
     */
    public function setHideIfZero(bool $hide_if_zero): void
    {
        $this->hide_if_zero = $hide_if_zero;
    }

    /**
     * @param array $show_domain
     */
    public function removeShowDomain(array $show_domain): void
    {
        if ($this->hasShowDomain($show_domain)) {
            $index = array_search($show_domain, $this->show_domain);
            unset($this->show_domain[$index]);
        }
    }

    /**
     * @param array $show_domain
     */
    public function addShowDomain(array $show_domain): void
    {
        if ($this->hasShowDomain($show_domain)) {
            return;
        }

        $this->show_domain[] = $show_domain;
    }

    /**
     * @param array $show_domain
     * @param bool $strict
     *
     * @return bool
     */
    public function hasShowDomain(array $show_domain, bool $strict = true): bool
    {
        return in_array($show_domain, $this->show_domain, $strict);
    }

    /**
     * @param array $show_domain
     */
    public function setShowDomain(array $show_domain): void
    {
        $this->show_domain = $show_domain;
    }

    /**
     * @param array $special_date_changer
     */
    public function removeSpecialDateChanger(array $special_date_changer): void
    {
        if ($this->hasSpecialDateChanger($special_date_changer)) {
            $index = array_search($special_date_changer, $this->special_date_changer);
            unset($this->special_date_changer[$index]);
        }
    }

    /**
     * @param array $special_date_changer
     */
    public function addSpecialDateChanger(array $special_date_changer): void
    {
        if ($this->hasSpecialDateChanger($special_date_changer)) {
            return;
        }

        $this->special_date_changer[] = $special_date_changer;
    }

    /**
     * @param array $special_date_changer
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSpecialDateChanger(array $special_date_changer, bool $strict = true): bool
    {
        return in_array($special_date_changer, $this->special_date_changer, $strict);
    }

    /**
     * @param null|int $level
     */
    public function setLevel(?int $level): void
    {
        $this->level = $level;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param bool $green_on_positive
     */
    public function setGreenOnPositive(bool $green_on_positive): void
    {
        $this->green_on_positive = $green_on_positive;
    }

    /**
     * @param bool $print_on_new_page
     */
    public function setPrintOnNewPage(bool $print_on_new_page): void
    {
        $this->print_on_new_page = $print_on_new_page;
    }

    /**
     * @param ?array $figure_type
     */
    public function removeFigureType(?array $figure_type): void
    {
        if ($this->hasFigureType($figure_type)) {
            $index = array_search($figure_type, $this->figure_type);
            unset($this->figure_type[$index]);
        }
    }

    /**
     * @param ?array $figure_type
     */
    public function addFigureType(?array $figure_type): void
    {
        if ($this->hasFigureType($figure_type)) {
            return;
        }

        if (null === $this->figure_type) {
            $this->figure_type = [];
        }

        $this->figure_type[] = $figure_type;
    }

    /**
     * @param ?array $figure_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFigureType(?array $figure_type, bool $strict = true): bool
    {
        if (null === $this->figure_type) {
            return false;
        }

        return in_array($figure_type, $this->figure_type, $strict);
    }

    /**
     * @param null|array $figure_type
     */
    public function setFigureType(?array $figure_type): void
    {
        $this->figure_type = $figure_type;
    }

    /**
     * @param string $groupby
     */
    public function setGroupby(string $groupby): void
    {
        $this->groupby = $groupby;
    }

    /**
     * @param string $formulas
     */
    public function setFormulas(string $formulas): void
    {
        $this->formulas = $formulas;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string $parent_path
     */
    public function setParentPath(string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param LineAlias $children_ids
     */
    public function setChildrenIds(LineAlias $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @param LineAlias $parent_id
     */
    public function setParentId(LineAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param Report $financial_report_id
     */
    public function setFinancialReportId(Report $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
