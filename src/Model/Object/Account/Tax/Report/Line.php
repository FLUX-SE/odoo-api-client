<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.tax.report.line
 * ---
 * Name : account.tax.report.line
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
     * Tags
     * ---
     * Tax tags populating this line
     * ---
     * Relation : many2many (account.account.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Country
     * ---
     * Country for which this line is available.
     * ---
     * Relation : many2one (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $country_id;

    /**
     * Report Action
     * ---
     * The optional action to call when clicking on this line in accounting reports.
     * ---
     * Relation : many2one (ir.actions.act_window)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_action_id;

    /**
     * Children Lines
     * ---
     * Lines that should be rendered as children of this one
     * ---
     * Relation : one2many (account.tax.report.line -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_line_ids;

    /**
     * Parent Line
     * ---
     * Relation : many2one (account.tax.report.line)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Sequence
     * ---
     * Sequence determining the order of the lines in the report (smaller ones come first). This order is applied
     * locally per section (so, children of the same line are always rendered one after the other).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

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
     * Code
     * ---
     * Optional unique code to refer to this line in total formulas
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $code;

    /**
     * Formula
     * ---
     * Python expression used to compute the value of a total line. This field is mutually exclusive with tag_name,
     * setting it turns the line to a total line. Tax report line codes can be used as variables in this expression
     * to refer to the balance of the corresponding lines in the report. A formula cannot refer to another line using
     * a formula.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $formula;

    /**
     * Name
     * ---
     * Complete name for this report line, to be used in report.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Tag Name
     * ---
     * Short name for the tax grid corresponding to this report line. Leave empty if this report line should not
     * correspond to any such grid.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $tag_name;

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
     * @param OdooRelation $country_id Country
     *        ---
     *        Country for which this line is available.
     *        ---
     *        Relation : many2one (res.country)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Country
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $sequence Sequence
     *        ---
     *        Sequence determining the order of the lines in the report (smaller ones come first). This order is applied
     *        locally per section (so, children of the same line are always rendered one after the other).
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Name
     *        ---
     *        Complete name for this report line, to be used in report.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $country_id, int $sequence, string $name)
    {
        $this->country_id = $country_id;
        $this->sequence = $sequence;
        $this->name = $name;
    }

    /**
     * @param string|null $tag_name
     */
    public function setTagName(?string $tag_name): void
    {
        $this->tag_name = $tag_name;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("formula")
     */
    public function getFormula(): ?string
    {
        return $this->formula;
    }

    /**
     * @param string|null $formula
     */
    public function setFormula(?string $formula): void
    {
        $this->formula = $formula;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tag_name")
     */
    public function getTagName(): ?string
    {
        return $this->tag_name;
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
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
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
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_ids")
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param OdooRelation|null $report_action_id
     */
    public function setReportActionId(?OdooRelation $report_action_id): void
    {
        $this->report_action_id = $report_action_id;
    }

    /**
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagIds(OdooRelation $item): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagIds(OdooRelation $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTagIds(OdooRelation $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation $country_id
     */
    public function setCountryId(OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_action_id")
     */
    public function getReportActionId(): ?OdooRelation
    {
        return $this->report_action_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("children_line_ids")
     */
    public function getChildrenLineIds(): ?array
    {
        return $this->children_line_ids;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param OdooRelation[]|null $children_line_ids
     */
    public function setChildrenLineIds(?array $children_line_ids): void
    {
        $this->children_line_ids = $children_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenLineIds(OdooRelation $item): bool
    {
        if (null === $this->children_line_ids) {
            return false;
        }

        return in_array($item, $this->children_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildrenLineIds(OdooRelation $item): void
    {
        if ($this->hasChildrenLineIds($item)) {
            return;
        }

        if (null === $this->children_line_ids) {
            $this->children_line_ids = [];
        }

        $this->children_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildrenLineIds(OdooRelation $item): void
    {
        if (null === $this->children_line_ids) {
            $this->children_line_ids = [];
        }

        if ($this->hasChildrenLineIds($item)) {
            $index = array_search($item, $this->children_line_ids);
            unset($this->children_line_ids[$index]);
        }
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
     * @return int
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.report.line';
    }
}
