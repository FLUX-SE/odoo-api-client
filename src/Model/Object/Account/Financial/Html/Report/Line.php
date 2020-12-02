<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.financial.html.report.line
 * ---
 * Name : account.financial.html.report.line
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
final class Line extends Base
{
    /**
     * Section Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $code;

    /**
     * Financial Report
     * ---
     * Relation : many2one (account.financial.html.report)
     * @see \Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $financial_report_id;

    /**
     * Parent
     * ---
     * Relation : many2one (account.financial.html.report.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Children
     * ---
     * Relation : one2many (account.financial.html.report.line -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_ids;

    /**
     * Parent Path
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_path;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain;

    /**
     * Formulas
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $formulas;

    /**
     * Group by
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $groupby;

    /**
     * Type
     * ---
     * Selection :
     *     -> float (Float)
     *     -> percents (Percents)
     *     -> no_unit (No Unit)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $figure_type;

    /**
     * Print On New Page
     * ---
     * When checked this line and everything after it will be printed on a new page.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $print_on_new_page;

    /**
     * Is growth good when positive
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $green_on_positive;

    /**
     * Level
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $level;

    /**
     * Special Date Changer
     * ---
     * Selection :
     *     -> from_beginning (From the beginning)
     *     -> to_beginning_of_period (At the beginning of the period)
     *     -> normal (Use given dates)
     *     -> strict_range (Force given dates for all accounts and account types)
     *     -> from_fiscalyear (From the beginning of the fiscal year)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $special_date_changer;

    /**
     * Show Domain
     * ---
     * Selection :
     *     -> always (Always)
     *     -> never (Never)
     *     -> foldable (Foldable)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $show_domain;

    /**
     * Hide If Zero
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hide_if_zero;

    /**
     * Hide If Empty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hide_if_empty;

    /**
     * Action
     * ---
     * Relation : many2one (ir.actions.actions)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Actions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $action_id;

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
     * @param string $figure_type Type
     *        ---
     *        Selection :
     *            -> float (Float)
     *            -> percents (Percents)
     *            -> no_unit (No Unit)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $level Level
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $figure_type, int $level)
    {
        $this->figure_type = $figure_type;
        $this->level = $level;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hide_if_empty")
     */
    public function isHideIfEmpty(): ?bool
    {
        return $this->hide_if_empty;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("green_on_positive")
     */
    public function isGreenOnPositive(): ?bool
    {
        return $this->green_on_positive;
    }

    /**
     * @param bool|null $green_on_positive
     */
    public function setGreenOnPositive(?bool $green_on_positive): void
    {
        $this->green_on_positive = $green_on_positive;
    }

    /**
     * @return int
     *
     * @SerializedName("level")
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string|null
     *
     * @SerializedName("special_date_changer")
     */
    public function getSpecialDateChanger(): ?string
    {
        return $this->special_date_changer;
    }

    /**
     * @param string|null $special_date_changer
     */
    public function setSpecialDateChanger(?string $special_date_changer): void
    {
        $this->special_date_changer = $special_date_changer;
    }

    /**
     * @return string|null
     *
     * @SerializedName("show_domain")
     */
    public function getShowDomain(): ?string
    {
        return $this->show_domain;
    }

    /**
     * @param string|null $show_domain
     */
    public function setShowDomain(?string $show_domain): void
    {
        $this->show_domain = $show_domain;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hide_if_zero")
     */
    public function isHideIfZero(): ?bool
    {
        return $this->hide_if_zero;
    }

    /**
     * @param bool|null $hide_if_zero
     */
    public function setHideIfZero(?bool $hide_if_zero): void
    {
        $this->hide_if_zero = $hide_if_zero;
    }

    /**
     * @param bool|null $hide_if_empty
     */
    public function setHideIfEmpty(?bool $hide_if_empty): void
    {
        $this->hide_if_empty = $hide_if_empty;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("print_on_new_page")
     */
    public function isPrintOnNewPage(): ?bool
    {
        return $this->print_on_new_page;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("action_id")
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
    }

    /**
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
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
     * @param bool|null $print_on_new_page
     */
    public function setPrintOnNewPage(?bool $print_on_new_page): void
    {
        $this->print_on_new_page = $print_on_new_page;
    }

    /**
     * @param string $figure_type
     */
    public function setFigureType(string $figure_type): void
    {
        $this->figure_type = $figure_type;
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
     * @param OdooRelation $item
     */
    public function addChildrenIds(OdooRelation $item): void
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
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("financial_report_id")
     */
    public function getFinancialReportId(): ?OdooRelation
    {
        return $this->financial_report_id;
    }

    /**
     * @param OdooRelation|null $financial_report_id
     */
    public function setFinancialReportId(?OdooRelation $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("children_ids")
     */
    public function getChildrenIds(): ?array
    {
        return $this->children_ids;
    }

    /**
     * @param OdooRelation[]|null $children_ids
     */
    public function setChildrenIds(?array $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenIds(OdooRelation $item): bool
    {
        if (null === $this->children_ids) {
            return false;
        }

        return in_array($item, $this->children_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildrenIds(OdooRelation $item): void
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
     * @return string
     *
     * @SerializedName("figure_type")
     */
    public function getFigureType(): string
    {
        return $this->figure_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("parent_path")
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("domain")
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("formulas")
     */
    public function getFormulas(): ?string
    {
        return $this->formulas;
    }

    /**
     * @param string|null $formulas
     */
    public function setFormulas(?string $formulas): void
    {
        $this->formulas = $formulas;
    }

    /**
     * @return string|null
     *
     * @SerializedName("groupby")
     */
    public function getGroupby(): ?string
    {
        return $this->groupby;
    }

    /**
     * @param string|null $groupby
     */
    public function setGroupby(?string $groupby): void
    {
        $this->groupby = $groupby;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.financial.html.report.line';
    }
}