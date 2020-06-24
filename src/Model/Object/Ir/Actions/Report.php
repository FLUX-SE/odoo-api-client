<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Report\Paperformat;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.report
 * Name : ir.actions.report
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
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
     * Action Type
     *
     * @var null|string
     */
    private $type;

    /**
     * Binding Type
     *
     * @var null|array
     */
    private $binding_type;

    /**
     * Model Name
     *
     * @var null|string
     */
    private $model;

    /**
     * Model
     *
     * @var Model
     */
    private $model_id;

    /**
     * Report Type
     *
     * @var null|array
     */
    private $report_type;

    /**
     * Template Name
     *
     * @var null|string
     */
    private $report_name;

    /**
     * Report File
     *
     * @var string
     */
    private $report_file;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups_id;

    /**
     * On Multiple Doc.
     *
     * @var bool
     */
    private $multi;

    /**
     * Paper Format
     *
     * @var Paperformat
     */
    private $paperformat_id;

    /**
     * Printed Report Name
     *
     * @var string
     */
    private $print_report_name;

    /**
     * Reload from Attachment
     *
     * @var bool
     */
    private $attachment_use;

    /**
     * Save as Attachment Prefix
     *
     * @var string
     */
    private $attachment;

    /**
     * External ID
     *
     * @var string
     */
    private $xml_id;

    /**
     * Action Description
     *
     * @var string
     */
    private $help;

    /**
     * Binding Model
     *
     * @var Model
     */
    private $binding_model_id;

    /**
     * Binding View Types
     *
     * @var string
     */
    private $binding_view_types;

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
     * @param bool $multi
     */
    public function setMulti(bool $multi): void
    {
        $this->multi = $multi;
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
     * @param string $binding_view_types
     */
    public function setBindingViewTypes(string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param Model $binding_model_id
     */
    public function setBindingModelId(Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @param string $attachment
     */
    public function setAttachment(string $attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @param bool $attachment_use
     */
    public function setAttachmentUse(bool $attachment_use): void
    {
        $this->attachment_use = $attachment_use;
    }

    /**
     * @param string $print_report_name
     */
    public function setPrintReportName(string $print_report_name): void
    {
        $this->print_report_name = $print_report_name;
    }

    /**
     * @param Paperformat $paperformat_id
     */
    public function setPaperformatId(Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param Groups $groups_id
     */
    public function setGroupsId(Groups $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $report_file
     */
    public function setReportFile(string $report_file): void
    {
        $this->report_file = $report_file;
    }

    /**
     * @param null|string $report_name
     */
    public function setReportName(?string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param ?array $report_type
     */
    public function removeReportType(?array $report_type): void
    {
        if ($this->hasReportType($report_type)) {
            $index = array_search($report_type, $this->report_type);
            unset($this->report_type[$index]);
        }
    }

    /**
     * @param ?array $report_type
     */
    public function addReportType(?array $report_type): void
    {
        if ($this->hasReportType($report_type)) {
            return;
        }

        if (null === $this->report_type) {
            $this->report_type = [];
        }

        $this->report_type[] = $report_type;
    }

    /**
     * @param ?array $report_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasReportType(?array $report_type, bool $strict = true): bool
    {
        if (null === $this->report_type) {
            return false;
        }

        return in_array($report_type, $this->report_type, $strict);
    }

    /**
     * @param null|array $report_type
     */
    public function setReportType(?array $report_type): void
    {
        $this->report_type = $report_type;
    }

    /**
     * @return Model
     */
    public function getModelId(): Model
    {
        return $this->model_id;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param ?array $binding_type
     */
    public function removeBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            $index = array_search($binding_type, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param ?array $binding_type
     */
    public function addBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            return;
        }

        if (null === $this->binding_type) {
            $this->binding_type = [];
        }

        $this->binding_type[] = $binding_type;
    }

    /**
     * @param ?array $binding_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType(?array $binding_type, bool $strict = true): bool
    {
        if (null === $this->binding_type) {
            return false;
        }

        return in_array($binding_type, $this->binding_type, $strict);
    }

    /**
     * @param null|array $binding_type
     */
    public function setBindingType(?array $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
