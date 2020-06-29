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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Action Type
     *
     * @var string
     */
    private $type;

    /**
     * Binding Type
     *
     * @var array
     */
    private $binding_type;

    /**
     * Model Name
     *
     * @var string
     */
    private $model;

    /**
     * Model
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Report Type
     * The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     * will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     * by the user.
     *
     * @var array
     */
    private $report_type;

    /**
     * Template Name
     * For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     * 'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     * name.
     *
     * @var string
     */
    private $report_name;

    /**
     * Report File
     * The path to the main report file (depending on Report Type) or empty if the content is in another field
     *
     * @var null|string
     */
    private $report_file;

    /**
     * Groups
     *
     * @var null|Groups[]
     */
    private $groups_id;

    /**
     * On Multiple Doc.
     * If set to true, the action will not be displayed on the right toolbar of a form view.
     *
     * @var null|bool
     */
    private $multi;

    /**
     * Paper Format
     *
     * @var null|Paperformat
     */
    private $paperformat_id;

    /**
     * Printed Report Name
     * This is the filename of the report going to download. Keep empty to not change the report filename. You can
     * use a python expression with the 'object' and 'time' variables.
     *
     * @var null|string
     */
    private $print_report_name;

    /**
     * Reload from Attachment
     * If you check this, then the second time the user prints with same attachment name, it returns the previous
     * report.
     *
     * @var null|bool
     */
    private $attachment_use;

    /**
     * Save as Attachment Prefix
     * This is the filename of the attachment used to store the printing result. Keep empty to not save the printed
     * reports. You can use a python expression with the object and time variables.
     *
     * @var null|string
     */
    private $attachment;

    /**
     * External ID
     *
     * @var null|string
     */
    private $xml_id;

    /**
     * Action Description
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     *
     * @var null|string
     */
    private $help;

    /**
     * Binding Model
     * Setting a value makes this action available in the sidebar for the given model.
     *
     * @var null|Model
     */
    private $binding_model_id;

    /**
     * Binding View Types
     *
     * @var null|string
     */
    private $binding_view_types;

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
     * @param string $type Action Type
     * @param array $binding_type Binding Type
     * @param string $model Model Name
     * @param array $report_type Report Type
     *        The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     *        will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     *        by the user.
     * @param string $report_name Template Name
     *        For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     *        'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     *        name.
     */
    public function __construct(
        string $name,
        string $type,
        array $binding_type,
        string $model,
        array $report_type,
        string $report_name
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->binding_type = $binding_type;
        $this->model = $model;
        $this->report_type = $report_type;
        $this->report_name = $report_name;
    }

    /**
     * @param Groups $item
     */
    public function addGroupsId(Groups $item): void
    {
        if ($this->hasGroupsId($item)) {
            return;
        }

        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        $this->groups_id[] = $item;
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
     * @param null|string $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param null|Model $binding_model_id
     */
    public function setBindingModelId(?Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param null|string $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param null|string $attachment
     */
    public function setAttachment(?string $attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @param null|bool $attachment_use
     */
    public function setAttachmentUse(?bool $attachment_use): void
    {
        $this->attachment_use = $attachment_use;
    }

    /**
     * @param null|string $print_report_name
     */
    public function setPrintReportName(?string $print_report_name): void
    {
        $this->print_report_name = $print_report_name;
    }

    /**
     * @param null|Paperformat $paperformat_id
     */
    public function setPaperformatId(?Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param null|bool $multi
     */
    public function setMulti(?bool $multi): void
    {
        $this->multi = $multi;
    }

    /**
     * @param Groups $item
     */
    public function removeGroupsId(Groups $item): void
    {
        if (null === $this->groups_id) {
            $this->groups_id = [];
        }

        if ($this->hasGroupsId($item)) {
            $index = array_search($item, $this->groups_id);
            unset($this->groups_id[$index]);
        }
    }

    /**
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroupsId(Groups $item, bool $strict = true): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param null|string $report_file
     */
    public function setReportFile(?string $report_file): void
    {
        $this->report_file = $report_file;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @param mixed $item
     */
    public function removeReportType($item): void
    {
        if ($this->hasReportType($item)) {
            $index = array_search($item, $this->report_type);
            unset($this->report_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addReportType($item): void
    {
        if ($this->hasReportType($item)) {
            return;
        }

        $this->report_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasReportType($item, bool $strict = true): bool
    {
        return in_array($item, $this->report_type, $strict);
    }

    /**
     * @param array $report_type
     */
    public function setReportType(array $report_type): void
    {
        $this->report_type = $report_type;
    }

    /**
     * @return null|Model
     */
    public function getModelId(): ?Model
    {
        return $this->model_id;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param mixed $item
     */
    public function removeBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            $index = array_search($item, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            return;
        }

        $this->binding_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType($item, bool $strict = true): bool
    {
        return in_array($item, $this->binding_type, $strict);
    }

    /**
     * @param array $binding_type
     */
    public function setBindingType(array $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
