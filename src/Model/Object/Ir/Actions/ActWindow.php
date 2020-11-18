<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.actions.act_window
 * ---
 * Name : ir.actions.act_window
 * ---
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class ActWindow extends Base
{
    /**
     * Action Name
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
     * View Ref.
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $view_id;

    /**
     * Domain Value
     * ---
     * Optional domain filtering of the destination data, as a Python expression
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain;

    /**
     * Context Value
     * ---
     * Context dictionary as Python expression, empty by default (Default: {})
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $context;

    /**
     * Record ID
     * ---
     * Database ID of record to open in form view, when ``view_mode`` is set to 'form' only
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Destination Model
     * ---
     * Model name of the object to open in the view window
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $res_model;

    /**
     * Target Window
     * ---
     * Selection :
     *     -> current (Current Window)
     *     -> new (New Window)
     *     -> inline (Inline Edit)
     *     -> fullscreen (Full Screen)
     *     -> main (Main action of Current Window)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $target;

    /**
     * View Mode
     * ---
     * Comma-separated list of allowed view modes, such as 'form', 'tree', 'calendar', etc. (Default: tree,form)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $view_mode;

    /**
     * Action Usage
     * ---
     * Used to filter menu and home actions from the user form.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $usage;

    /**
     * No of Views
     * ---
     * Relation : one2many (ir.actions.act_window.view -> act_window_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow\View
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $view_ids;

    /**
     * Views
     * ---
     * This function field computes the ordered list of views that should be enabled when displaying the result of an
     * action, federating view mode, views and reference view. The result is returned as an ordered list of pairs
     * (view_id,view_mode).
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $views;

    /**
     * Limit
     * ---
     * Default limit for the list view
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $limit;

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
     * Search View Ref.
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $search_view_id;

    /**
     * Filter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $filter;

    /**
     * Search View
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $search_view;

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
     * @param string $name Action Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $context Context Value
     *        ---
     *        Context dictionary as Python expression, empty by default (Default: {})
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $res_model Destination Model
     *        ---
     *        Model name of the object to open in the view window
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $view_mode View Mode
     *        ---
     *        Comma-separated list of allowed view modes, such as 'form', 'tree', 'calendar', etc. (Default: tree,form)
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
     */
    public function __construct(
        string $name,
        string $type,
        string $context,
        string $res_model,
        string $view_mode,
        string $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->context = $context;
        $this->res_model = $res_model;
        $this->view_mode = $view_mode;
        $this->binding_type = $binding_type;
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
     * @return OdooRelation|null
     *
     * @SerializedName("search_view_id")
     */
    public function getSearchViewId(): ?OdooRelation
    {
        return $this->search_view_id;
    }

    /**
     * @param OdooRelation|null $search_view_id
     */
    public function setSearchViewId(?OdooRelation $search_view_id): void
    {
        $this->search_view_id = $search_view_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("filter")
     */
    public function isFilter(): ?bool
    {
        return $this->filter;
    }

    /**
     * @param bool|null $filter
     */
    public function setFilter(?bool $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @return string|null
     *
     * @SerializedName("search_view")
     */
    public function getSearchView(): ?string
    {
        return $this->search_view;
    }

    /**
     * @param string|null $search_view
     */
    public function setSearchView(?string $search_view): void
    {
        $this->search_view = $search_view;
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
     * @param OdooRelation[]|null $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups_id")
     */
    public function getGroupsId(): ?array
    {
        return $this->groups_id;
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
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
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
     * @return OdooRelation|null
     *
     * @SerializedName("view_id")
     */
    public function getViewId(): ?OdooRelation
    {
        return $this->view_id;
    }

    /**
     * @param OdooRelation|null $view_id
     */
    public function setViewId(?OdooRelation $view_id): void
    {
        $this->view_id = $view_id;
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
     * @return string
     *
     * @SerializedName("context")
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return string
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("target")
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @param string|null $target
     */
    public function setTarget(?string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     *
     * @SerializedName("view_mode")
     */
    public function getViewMode(): string
    {
        return $this->view_mode;
    }

    /**
     * @param string $view_mode
     */
    public function setViewMode(string $view_mode): void
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @return string|null
     *
     * @SerializedName("usage")
     */
    public function getUsage(): ?string
    {
        return $this->usage;
    }

    /**
     * @param string|null $usage
     */
    public function setUsage(?string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("view_ids")
     */
    public function getViewIds(): ?array
    {
        return $this->view_ids;
    }

    /**
     * @param OdooRelation[]|null $view_ids
     */
    public function setViewIds(?array $view_ids): void
    {
        $this->view_ids = $view_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasViewIds(OdooRelation $item): bool
    {
        if (null === $this->view_ids) {
            return false;
        }

        return in_array($item, $this->view_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addViewIds(OdooRelation $item): void
    {
        if ($this->hasViewIds($item)) {
            return;
        }

        if (null === $this->view_ids) {
            $this->view_ids = [];
        }

        $this->view_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeViewIds(OdooRelation $item): void
    {
        if (null === $this->view_ids) {
            $this->view_ids = [];
        }

        if ($this->hasViewIds($item)) {
            $index = array_search($item, $this->view_ids);
            unset($this->view_ids[$index]);
        }
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("views")
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param mixed|null $views
     */
    public function setViews($views): void
    {
        $this->views = $views;
    }

    /**
     * @return int|null
     *
     * @SerializedName("limit")
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.actions.act_window';
    }
}
