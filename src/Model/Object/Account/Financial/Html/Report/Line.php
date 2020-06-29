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
final class Line extends Base
{
    /**
     * Section Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Financial Report
     *
     * @var null|Report
     */
    private $financial_report_id;

    /**
     * Parent
     *
     * @var null|LineAlias
     */
    private $parent_id;

    /**
     * Children
     *
     * @var null|LineAlias[]
     */
    private $children_ids;

    /**
     * Parent Path
     *
     * @var null|string
     */
    private $parent_path;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Domain
     *
     * @var null|string
     */
    private $domain;

    /**
     * Formulas
     *
     * @var null|string
     */
    private $formulas;

    /**
     * Group by
     *
     * @var null|string
     */
    private $groupby;

    /**
     * Type
     *
     * @var array
     */
    private $figure_type;

    /**
     * Print On New Page
     * When checked this line and everything after it will be printed on a new page.
     *
     * @var null|bool
     */
    private $print_on_new_page;

    /**
     * Is growth good when positive
     *
     * @var null|bool
     */
    private $green_on_positive;

    /**
     * Level
     *
     * @var int
     */
    private $level;

    /**
     * Special Date Changer
     *
     * @var null|array
     */
    private $special_date_changer;

    /**
     * Show Domain
     *
     * @var null|array
     */
    private $show_domain;

    /**
     * Hide If Zero
     *
     * @var null|bool
     */
    private $hide_if_zero;

    /**
     * Hide If Empty
     *
     * @var null|bool
     */
    private $hide_if_empty;

    /**
     * Action
     *
     * @var null|Actions
     */
    private $action_id;

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
     * @param array $figure_type Type
     * @param int $level Level
     */
    public function __construct(array $figure_type, int $level)
    {
        $this->figure_type = $figure_type;
        $this->level = $level;
    }

    /**
     * @param mixed $item
     */
    public function addShowDomain($item): void
    {
        if ($this->hasShowDomain($item)) {
            return;
        }

        if (null === $this->show_domain) {
            $this->show_domain = [];
        }

        $this->show_domain[] = $item;
    }

    /**
     * @param null|array $special_date_changer
     */
    public function setSpecialDateChanger(?array $special_date_changer): void
    {
        $this->special_date_changer = $special_date_changer;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSpecialDateChanger($item, bool $strict = true): bool
    {
        if (null === $this->special_date_changer) {
            return false;
        }

        return in_array($item, $this->special_date_changer, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSpecialDateChanger($item): void
    {
        if ($this->hasSpecialDateChanger($item)) {
            return;
        }

        if (null === $this->special_date_changer) {
            $this->special_date_changer = [];
        }

        $this->special_date_changer[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSpecialDateChanger($item): void
    {
        if (null === $this->special_date_changer) {
            $this->special_date_changer = [];
        }

        if ($this->hasSpecialDateChanger($item)) {
            $index = array_search($item, $this->special_date_changer);
            unset($this->special_date_changer[$index]);
        }
    }

    /**
     * @param null|array $show_domain
     */
    public function setShowDomain(?array $show_domain): void
    {
        $this->show_domain = $show_domain;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasShowDomain($item, bool $strict = true): bool
    {
        if (null === $this->show_domain) {
            return false;
        }

        return in_array($item, $this->show_domain, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeShowDomain($item): void
    {
        if (null === $this->show_domain) {
            $this->show_domain = [];
        }

        if ($this->hasShowDomain($item)) {
            $index = array_search($item, $this->show_domain);
            unset($this->show_domain[$index]);
        }
    }

    /**
     * @param null|bool $green_on_positive
     */
    public function setGreenOnPositive(?bool $green_on_positive): void
    {
        $this->green_on_positive = $green_on_positive;
    }

    /**
     * @param null|bool $hide_if_zero
     */
    public function setHideIfZero(?bool $hide_if_zero): void
    {
        $this->hide_if_zero = $hide_if_zero;
    }

    /**
     * @param null|bool $hide_if_empty
     */
    public function setHideIfEmpty(?bool $hide_if_empty): void
    {
        $this->hide_if_empty = $hide_if_empty;
    }

    /**
     * @param null|Actions $action_id
     */
    public function setActionId(?Actions $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @param null|bool $print_on_new_page
     */
    public function setPrintOnNewPage(?bool $print_on_new_page): void
    {
        $this->print_on_new_page = $print_on_new_page;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param LineAlias $item
     */
    public function removeChildrenIds(LineAlias $item): void
    {
        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        if ($this->hasChildrenIds($item)) {
            $index = array_search($item, $this->children_ids);
            unset($this->children_ids[$index]);
        }
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|Report $financial_report_id
     */
    public function setFinancialReportId(?Report $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
    }

    /**
     * @param null|LineAlias $parent_id
     */
    public function setParentId(?LineAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|LineAlias[] $children_ids
     */
    public function setChildrenIds(?array $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @param LineAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildrenIds(LineAlias $item, bool $strict = true): bool
    {
        if (null === $this->children_ids) {
            return false;
        }

        return in_array($item, $this->children_ids, $strict);
    }

    /**
     * @param LineAlias $item
     */
    public function addChildrenIds(LineAlias $item): void
    {
        if ($this->hasChildrenIds($item)) {
            return;
        }

        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        $this->children_ids[] = $item;
    }

    /**
     * @param null|string $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param mixed $item
     */
    public function removeFigureType($item): void
    {
        if ($this->hasFigureType($item)) {
            $index = array_search($item, $this->figure_type);
            unset($this->figure_type[$index]);
        }
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|string $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param null|string $formulas
     */
    public function setFormulas(?string $formulas): void
    {
        $this->formulas = $formulas;
    }

    /**
     * @param null|string $groupby
     */
    public function setGroupby(?string $groupby): void
    {
        $this->groupby = $groupby;
    }

    /**
     * @param array $figure_type
     */
    public function setFigureType(array $figure_type): void
    {
        $this->figure_type = $figure_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFigureType($item, bool $strict = true): bool
    {
        return in_array($item, $this->figure_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addFigureType($item): void
    {
        if ($this->hasFigureType($item)) {
            return;
        }

        $this->figure_type[] = $item;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
