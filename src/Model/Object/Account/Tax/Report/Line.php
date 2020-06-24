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
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Tags
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Report Action
     *
     * @var ActWindow
     */
    private $report_action_id;

    /**
     * Children Lines
     *
     * @var LineAlias
     */
    private $children_line_ids;

    /**
     * Parent Line
     *
     * @var LineAlias
     */
    private $parent_id;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Tag Name
     *
     * @var string
     */
    private $tag_name;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Formula
     *
     * @var string
     */
    private $formula;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param ActWindow $report_action_id
     */
    public function setReportActionId(ActWindow $report_action_id): void
    {
        $this->report_action_id = $report_action_id;
    }

    /**
     * @param LineAlias $children_line_ids
     */
    public function setChildrenLineIds(LineAlias $children_line_ids): void
    {
        $this->children_line_ids = $children_line_ids;
    }

    /**
     * @param LineAlias $parent_id
     */
    public function setParentId(LineAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
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
     * @param string $tag_name
     */
    public function setTagName(string $tag_name): void
    {
        $this->tag_name = $tag_name;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param string $formula
     */
    public function setFormula(string $formula): void
    {
        $this->formula = $formula;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
