<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow\View as ViewAlias;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.act_window
 * Name : ir.actions.act_window
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class ActWindow extends Base
{
    /**
     * Action Name
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
     * View Ref.
     *
     * @var null|View
     */
    private $view_id;

    /**
     * Domain Value
     * Optional domain filtering of the destination data, as a Python expression
     *
     * @var null|string
     */
    private $domain;

    /**
     * Context Value
     * Context dictionary as Python expression, empty by default (Default: {})
     *
     * @var string
     */
    private $context;

    /**
     * Record ID
     * Database ID of record to open in form view, when ``view_mode`` is set to 'form' only
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Destination Model
     * Model name of the object to open in the view window
     *
     * @var string
     */
    private $res_model;

    /**
     * Target Window
     *
     * @var null|array
     */
    private $target;

    /**
     * View Mode
     * Comma-separated list of allowed view modes, such as 'form', 'tree', 'calendar', etc. (Default: tree,form)
     *
     * @var string
     */
    private $view_mode;

    /**
     * Action Usage
     * Used to filter menu and home actions from the user form.
     *
     * @var null|string
     */
    private $usage;

    /**
     * No of Views
     *
     * @var null|ViewAlias[]
     */
    private $view_ids;

    /**
     * Views
     * This function field computes the ordered list of views that should be enabled when displaying the result of an
     * action, federating view mode, views and reference view. The result is returned as an ordered list of pairs
     * (view_id,view_mode).
     *
     * @var null|int
     */
    private $views;

    /**
     * Limit
     * Default limit for the list view
     *
     * @var null|int
     */
    private $limit;

    /**
     * Groups
     *
     * @var null|Groups[]
     */
    private $groups_id;

    /**
     * Search View Ref.
     *
     * @var null|View
     */
    private $search_view_id;

    /**
     * Filter
     *
     * @var null|bool
     */
    private $filter;

    /**
     * Search View
     *
     * @var null|string
     */
    private $search_view;

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
     * Binding Type
     *
     * @var array
     */
    private $binding_type;

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
     * @param string $name Action Name
     * @param string $type Action Type
     * @param string $context Context Value
     *        Context dictionary as Python expression, empty by default (Default: {})
     * @param string $res_model Destination Model
     *        Model name of the object to open in the view window
     * @param string $view_mode View Mode
     *        Comma-separated list of allowed view modes, such as 'form', 'tree', 'calendar', etc. (Default: tree,form)
     * @param array $binding_type Binding Type
     */
    public function __construct(
        string $name,
        string $type,
        string $context,
        string $res_model,
        string $view_mode,
        array $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->context = $context;
        $this->res_model = $res_model;
        $this->view_mode = $view_mode;
        $this->binding_type = $binding_type;
    }

    /**
     * @param null|Model $binding_model_id
     */
    public function setBindingModelId(?Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
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
     * @param null|View $search_view_id
     */
    public function setSearchViewId(?View $search_view_id): void
    {
        $this->search_view_id = $search_view_id;
    }

    /**
     * @param null|bool $filter
     */
    public function setFilter(?bool $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @return null|string
     */
    public function getSearchView(): ?string
    {
        return $this->search_view;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param null|string $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param array $binding_type
     */
    public function setBindingType(array $binding_type): void
    {
        $this->binding_type = $binding_type;
    }

    /**
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
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
     */
    public function removeBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            $index = array_search($item, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param null|string $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
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
     * @param null|int $limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTarget($item, bool $strict = true): bool
    {
        if (null === $this->target) {
            return false;
        }

        return in_array($item, $this->target, $strict);
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|View $view_id
     */
    public function setViewId(?View $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @param null|string $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param null|array $target
     */
    public function setTarget(?array $target): void
    {
        $this->target = $target;
    }

    /**
     * @param mixed $item
     */
    public function addTarget($item): void
    {
        if ($this->hasTarget($item)) {
            return;
        }

        if (null === $this->target) {
            $this->target = [];
        }

        $this->target[] = $item;
    }

    /**
     * @return null|int
     */
    public function getViews(): ?int
    {
        return $this->views;
    }

    /**
     * @param mixed $item
     */
    public function removeTarget($item): void
    {
        if (null === $this->target) {
            $this->target = [];
        }

        if ($this->hasTarget($item)) {
            $index = array_search($item, $this->target);
            unset($this->target[$index]);
        }
    }

    /**
     * @param string $view_mode
     */
    public function setViewMode(string $view_mode): void
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param null|string $usage
     */
    public function setUsage(?string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @param null|ViewAlias[] $view_ids
     */
    public function setViewIds(?array $view_ids): void
    {
        $this->view_ids = $view_ids;
    }

    /**
     * @param ViewAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasViewIds(ViewAlias $item, bool $strict = true): bool
    {
        if (null === $this->view_ids) {
            return false;
        }

        return in_array($item, $this->view_ids, $strict);
    }

    /**
     * @param ViewAlias $item
     */
    public function addViewIds(ViewAlias $item): void
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
     * @param ViewAlias $item
     */
    public function removeViewIds(ViewAlias $item): void
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
