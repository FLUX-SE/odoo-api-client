<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.actions.report
 * Name : ir.actions.report
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class Report extends Base
{
    public const ODOO_MODEL_NAME = 'ir.actions.report';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Action Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * Binding Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> action (Action)
     *     -> report (Report)
     *
     *
     * @var string
     */
    private $binding_type;

    /**
     * Model Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Model
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Report Type
     * The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     * will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     * by the user.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> qweb-html (HTML)
     *     -> qweb-pdf (PDF)
     *     -> qweb-text (Text)
     *
     *
     * @var string
     */
    private $report_type;

    /**
     * Template Name
     * For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     * 'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     * name.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $report_name;

    /**
     * Report File
     * The path to the main report file (depending on Report Type) or empty if the content is in another field
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $report_file;

    /**
     * Groups
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups_id;

    /**
     * On Multiple Doc.
     * If set to true, the action will not be displayed on the right toolbar of a form view.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $multi;

    /**
     * Paper Format
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Printed Report Name
     * This is the filename of the report going to download. Keep empty to not change the report filename. You can
     * use a python expression with the 'object' and 'time' variables.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $print_report_name;

    /**
     * Reload from Attachment
     * If you check this, then the second time the user prints with same attachment name, it returns the previous
     * report.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $attachment_use;

    /**
     * Save as Attachment Prefix
     * This is the filename of the attachment used to store the printing result. Keep empty to not save the printed
     * reports. You can use a python expression with the object and time variables.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $attachment;

    /**
     * External ID
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $xml_id;

    /**
     * Action Description
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $help;

    /**
     * Binding Model
     * Setting a value makes this action available in the sidebar for the given model.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $binding_model_id;

    /**
     * Binding View Types
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $binding_view_types;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        Searchable : yes
     *        Sortable : yes
     * @param string $binding_type Binding Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> action (Action)
     *            -> report (Report)
     *
     * @param string $model Model Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $report_type Report Type
     *        The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     *        will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     *        by the user.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> qweb-html (HTML)
     *            -> qweb-pdf (PDF)
     *            -> qweb-text (Text)
     *
     * @param string $report_name Template Name
     *        For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     *        'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     *        name.
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $type,
        string $binding_type,
        string $model,
        string $report_type,
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
     * @return OdooRelation|null
     */
    public function getBindingModelId(): ?OdooRelation
    {
        return $this->binding_model_id;
    }

    /**
     * @param string|null $print_report_name
     */
    public function setPrintReportName(?string $print_report_name): void
    {
        $this->print_report_name = $print_report_name;
    }

    /**
     * @return bool|null
     */
    public function isAttachmentUse(): ?bool
    {
        return $this->attachment_use;
    }

    /**
     * @param bool|null $attachment_use
     */
    public function setAttachmentUse(?bool $attachment_use): void
    {
        $this->attachment_use = $attachment_use;
    }

    /**
     * @return string|null
     */
    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    /**
     * @param string|null $attachment
     */
    public function setAttachment(?string $attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @return string|null
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param string|null $xml_id
     */
    public function setXmlId(?string $xml_id): void
    {
        $this->xml_id = $xml_id;
    }

    /**
     * @return string|null
     */
    public function getHelp(): ?string
    {
        return $this->help;
    }

    /**
     * @param string|null $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param OdooRelation|null $binding_model_id
     */
    public function setBindingModelId(?OdooRelation $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @return string|null
     */
    public function getBindingViewTypes(): ?string
    {
        return $this->binding_view_types;
    }

    /**
     * @param string|null $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return string|null
     */
    public function getPrintReportName(): ?string
    {
        return $this->print_report_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getReportType(): string
    {
        return $this->report_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getBindingType(): string
    {
        return $this->binding_type;
    }

    /**
     * @param string $binding_type
     */
    public function setBindingType(string $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return OdooRelation|null
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param string $report_type
     */
    public function setReportType(string $report_type): void
    {
        $this->report_type = $report_type;
    }

    /**
     * @param bool|null $multi
     */
    public function setMulti(?bool $multi): void
    {
        $this->multi = $multi;
    }

    /**
     * @return string
     */
    public function getReportName(): string
    {
        return $this->report_name;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @return string|null
     */
    public function getReportFile(): ?string
    {
        return $this->report_file;
    }

    /**
     * @param string|null $report_file
     */
    public function setReportFile(?string $report_file): void
    {
        $this->report_file = $report_file;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
    }

    /**
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroupsId(OdooRelation $item): bool
    {
        if (null === $this->groups_id) {
            return false;
        }

        return in_array($item, $this->groups_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function addGroupsId(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeGroupsId(OdooRelation $item): void
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
     * @return bool|null
     */
    public function isMulti(): ?bool
    {
        return $this->multi;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
