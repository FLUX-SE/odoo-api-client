<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.actions.report
 * ---
 * Name : ir.actions.report
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
final class Report extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Action Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * Binding Type
     * ---
     * Selection :
     *     -> action (Action)
     *     -> report (Report)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $binding_type;

    /**
     * Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Report Type
     * ---
     * The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     * will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     * by the user.
     * ---
     * Selection :
     *     -> qweb-html (HTML)
     *     -> qweb-pdf (PDF)
     *     -> qweb-text (Text)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $report_type;

    /**
     * Template Name
     * ---
     * For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     * 'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     * name.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $report_name;

    /**
     * Report File
     * ---
     * The path to the main report file (depending on Report Type) or empty if the content is in another field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $report_file;

    /**
     * Groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups_id;

    /**
     * On Multiple Doc.
     * ---
     * If set to true, the action will not be displayed on the right toolbar of a form view.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $multi;

    /**
     * Paper Format
     * ---
     * Relation : many2one (report.paperformat)
     * @see \Flux\OdooApiClient\Model\Object\Report\Paperformat
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Printed Report Name
     * ---
     * This is the filename of the report going to download. Keep empty to not change the report filename. You can
     * use a python expression with the 'object' and 'time' variables.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $print_report_name;

    /**
     * Reload from Attachment
     * ---
     * If you check this, then the second time the user prints with same attachment name, it returns the previous
     * report.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $attachment_use;

    /**
     * Save as Attachment Prefix
     * ---
     * This is the filename of the attachment used to store the printing result. Keep empty to not save the printed
     * reports. You can use a python expression with the object and time variables.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $attachment;

    /**
     * External ID
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $xml_id;

    /**
     * Action Description
     * ---
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $help;

    /**
     * Binding Model
     * ---
     * Setting a value makes this action available in the sidebar for the given model.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $binding_model_id;

    /**
     * Binding View Types
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $binding_view_types;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $binding_type Binding Type
     *        ---
     *        Selection :
     *            -> action (Action)
     *            -> report (Report)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $model Model Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $report_type Report Type
     *        ---
     *        The type of the report that will be rendered, each one having its own rendering method. HTML means the report
     *        will be opened directly in your browser PDF means the report will be rendered using Wkhtmltopdf and downloaded
     *        by the user.
     *        ---
     *        Selection :
     *            -> qweb-html (HTML)
     *            -> qweb-pdf (PDF)
     *            -> qweb-text (Text)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $report_name Template Name
     *        ---
     *        For QWeb reports, name of the template used in the rendering. The method 'render_html' of the model
     *        'report.template_name' will be called (if any) to give the html. For RML reports, this is the LocalService
     *        name.
     *        ---
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
     *
     * @SerializedName("binding_model_id")
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
     *
     * @SerializedName("attachment_use")
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
     *
     * @SerializedName("attachment")
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
     *
     * @SerializedName("xml_id")
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
     *
     * @SerializedName("help")
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
     *
     * @SerializedName("binding_view_types")
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
     * @return string|null
     *
     * @SerializedName("print_report_name")
     */
    public function getPrintReportName(): ?string
    {
        return $this->print_report_name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("paperformat_id")
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
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
     * @return string
     *
     * @SerializedName("report_type")
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
     *
     * @SerializedName("type")
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
     *
     * @SerializedName("binding_type")
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
     *
     * @SerializedName("model")
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
     *
     * @SerializedName("model_id")
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
     *
     * @SerializedName("report_name")
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
     *
     * @SerializedName("report_file")
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
     *
     * @SerializedName("groups_id")
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
     *
     * @SerializedName("multi")
     */
    public function isMulti(): ?bool
    {
        return $this->multi;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.actions.report';
    }
}
