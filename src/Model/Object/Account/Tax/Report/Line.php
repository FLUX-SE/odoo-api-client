<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax.report.line
 * Name : account.tax.report.line
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
     * Name
     * Complete name for this report line, to be used in report.
     *
     * @var string
     */
    private $name;

    /**
     * Tags
     * Tax tags populating this line
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Country
     * Country for which this line is available.
     *
     * @var Country
     */
    private $country_id;

    /**
     * Report Action
     * The optional action to call when clicking on this line in accounting reports.
     *
     * @var null|ActWindow
     */
    private $report_action_id;

    /**
     * Children Lines
     * Lines that should be rendered as children of this one
     *
     * @var null|LineAlias[]
     */
    private $children_line_ids;

    /**
     * Parent Line
     *
     * @var null|LineAlias
     */
    private $parent_id;

    /**
     * Sequence
     * Sequence determining the order of the lines in the report (smaller ones come first). This order is applied
     * locally per section (so, children of the same line are always rendered one after the other).
     *
     * @var int
     */
    private $sequence;

    /**
     * Parent Path
     *
     * @var null|string
     */
    private $parent_path;

    /**
     * Tag Name
     * Short name for the tax grid corresponding to this report line. Leave empty if this report line should not
     * correspond to any such grid.
     *
     * @var null|string
     */
    private $tag_name;

    /**
     * Code
     * Optional unique code to refer to this line in total formulas
     *
     * @var null|string
     */
    private $code;

    /**
     * Formula
     * Python expression used to compute the value of a total line. This field is mutually exclusive with tag_name,
     * setting it turns the line to a total line. Tax report line codes can be used as variables in this expression
     * to refer to the balance of the corresponding lines in the report. A formula cannot refer to another line using
     * a formula.
     *
     * @var null|string
     */
    private $formula;

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
     * @param string $name Name
     *        Complete name for this report line, to be used in report.
     * @param Country $country_id Country
     *        Country for which this line is available.
     * @param int $sequence Sequence
     *        Sequence determining the order of the lines in the report (smaller ones come first). This order is applied
     *        locally per section (so, children of the same line are always rendered one after the other).
     */
    public function __construct(string $name, Country $country_id, int $sequence)
    {
        $this->name = $name;
        $this->country_id = $country_id;
        $this->sequence = $sequence;
    }

    /**
     * @param null|LineAlias $parent_id
     */
    public function setParentId(?LineAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
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
     * @param null|string $formula
     */
    public function setFormula(?string $formula): void
    {
        $this->formula = $formula;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|string $tag_name
     */
    public function setTagName(?string $tag_name): void
    {
        $this->tag_name = $tag_name;
    }

    /**
     * @param null|string $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param LineAlias $item
     */
    public function removeChildrenLineIds(LineAlias $item): void
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param LineAlias $item
     */
    public function addChildrenLineIds(LineAlias $item): void
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
     * @param LineAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildrenLineIds(LineAlias $item, bool $strict = true): bool
    {
        if (null === $this->children_line_ids) {
            return false;
        }

        return in_array($item, $this->children_line_ids, $strict);
    }

    /**
     * @param null|LineAlias[] $children_line_ids
     */
    public function setChildrenLineIds(?array $children_line_ids): void
    {
        $this->children_line_ids = $children_line_ids;
    }

    /**
     * @param null|ActWindow $report_action_id
     */
    public function setReportActionId(?ActWindow $report_action_id): void
    {
        $this->report_action_id = $report_action_id;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param Tag $item
     */
    public function removeTagIds(Tag $item): void
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
     * @param Tag $item
     */
    public function addTagIds(Tag $item): void
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
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids, $strict);
    }

    /**
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
