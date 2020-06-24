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
 *
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
     * View Ref.
     *
     * @var View
     */
    private $view_id;

    /**
     * Domain Value
     *
     * @var string
     */
    private $domain;

    /**
     * Context Value
     *
     * @var null|string
     */
    private $context;

    /**
     * Record ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Destination Model
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Target Window
     *
     * @var array
     */
    private $target;

    /**
     * View Mode
     *
     * @var null|string
     */
    private $view_mode;

    /**
     * Action Usage
     *
     * @var string
     */
    private $usage;

    /**
     * No of Views
     *
     * @var ViewAlias
     */
    private $view_ids;

    /**
     * Views
     *
     * @var int
     */
    private $views;

    /**
     * Limit
     *
     * @var int
     */
    private $limit;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups_id;

    /**
     * Search View Ref.
     *
     * @var View
     */
    private $search_view_id;

    /**
     * Filter
     *
     * @var bool
     */
    private $filter;

    /**
     * Search View
     *
     * @var string
     */
    private $search_view;

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
     * Binding Type
     *
     * @var null|array
     */
    private $binding_type;

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
     * @param View $search_view_id
     */
    public function setSearchViewId(View $search_view_id): void
    {
        $this->search_view_id = $search_view_id;
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
     * @return string
     */
    public function getSearchView(): string
    {
        return $this->search_view;
    }

    /**
     * @param bool $filter
     */
    public function setFilter(bool $filter): void
    {
        $this->filter = $filter;
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
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getViews(): int
    {
        return $this->views;
    }

    /**
     * @param ViewAlias $view_ids
     */
    public function setViewIds(ViewAlias $view_ids): void
    {
        $this->view_ids = $view_ids;
    }

    /**
     * @param string $usage
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @param null|string $view_mode
     */
    public function setViewMode(?string $view_mode): void
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param array $target
     */
    public function removeTarget(array $target): void
    {
        if ($this->hasTarget($target)) {
            $index = array_search($target, $this->target);
            unset($this->target[$index]);
        }
    }

    /**
     * @param array $target
     */
    public function addTarget(array $target): void
    {
        if ($this->hasTarget($target)) {
            return;
        }

        $this->target[] = $target;
    }

    /**
     * @param array $target
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTarget(array $target, bool $strict = true): bool
    {
        return in_array($target, $this->target, $strict);
    }

    /**
     * @param array $target
     */
    public function setTarget(array $target): void
    {
        $this->target = $target;
    }

    /**
     * @param null|string $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|string $context
     */
    public function setContext(?string $context): void
    {
        $this->context = $context;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param View $view_id
     */
    public function setViewId(View $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
