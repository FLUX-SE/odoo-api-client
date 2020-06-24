<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Ui;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model\Data;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View as ViewAlias;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.ui.view
 * Name : ir.ui.view
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class View extends Base
{
    /**
     * View Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Model
     *
     * @var string
     */
    private $model;

    /**
     * Key
     *
     * @var string
     */
    private $key;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $priority;

    /**
     * View Architecture
     *
     * @var string
     */
    private $arch;

    /**
     * Base View Architecture
     *
     * @var string
     */
    private $arch_base;

    /**
     * Arch Blob
     *
     * @var string
     */
    private $arch_db;

    /**
     * Arch Filename
     *
     * @var string
     */
    private $arch_fs;

    /**
     * Modified Architecture
     *
     * @var bool
     */
    private $arch_updated;

    /**
     * Previous View Architecture
     *
     * @var string
     */
    private $arch_prev;

    /**
     * Inherited View
     *
     * @var ViewAlias
     */
    private $inherit_id;

    /**
     * Views which inherit from this one
     *
     * @var ViewAlias
     */
    private $inherit_children_ids;

    /**
     * Child Field
     *
     * @var string
     */
    private $field_parent;

    /**
     * Model Data
     *
     * @var Data
     */
    private $model_data_id;

    /**
     * External ID
     *
     * @var string
     */
    private $xml_id;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups_id;

    /**
     * Models
     *
     * @var Data
     */
    private $model_ids;

    /**
     * View inheritance mode
     *
     * @var null|array
     */
    private $mode;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * View Type
     *
     * @var array
     */
    private $type;

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
     * @param Data $model_ids
     */
    public function setModelIds(Data $model_ids): void
    {
        $this->model_ids = $model_ids;
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
     * @param array $type
     */
    public function removeType(array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param array $type
     */
    public function addType(array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        $this->type[] = $type;
    }

    /**
     * @param array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(array $type, bool $strict = true): bool
    {
        return in_array($type, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param ?array $mode
     */
    public function removeMode(?array $mode): void
    {
        if ($this->hasMode($mode)) {
            $index = array_search($mode, $this->mode);
            unset($this->mode[$index]);
        }
    }

    /**
     * @param ?array $mode
     */
    public function addMode(?array $mode): void
    {
        if ($this->hasMode($mode)) {
            return;
        }

        if (null === $this->mode) {
            $this->mode = [];
        }

        $this->mode[] = $mode;
    }

    /**
     * @param ?array $mode
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMode(?array $mode, bool $strict = true): bool
    {
        if (null === $this->mode) {
            return false;
        }

        return in_array($mode, $this->mode, $strict);
    }

    /**
     * @param null|array $mode
     */
    public function setMode(?array $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @param Groups $groups_id
     */
    public function setGroupsId(Groups $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @return Data
     */
    public function getModelDataId(): Data
    {
        return $this->model_data_id;
    }

    /**
     * @param string $field_parent
     */
    public function setFieldParent(string $field_parent): void
    {
        $this->field_parent = $field_parent;
    }

    /**
     * @param ViewAlias $inherit_children_ids
     */
    public function setInheritChildrenIds(ViewAlias $inherit_children_ids): void
    {
        $this->inherit_children_ids = $inherit_children_ids;
    }

    /**
     * @param ViewAlias $inherit_id
     */
    public function setInheritId(ViewAlias $inherit_id): void
    {
        $this->inherit_id = $inherit_id;
    }

    /**
     * @param string $arch_prev
     */
    public function setArchPrev(string $arch_prev): void
    {
        $this->arch_prev = $arch_prev;
    }

    /**
     * @param bool $arch_updated
     */
    public function setArchUpdated(bool $arch_updated): void
    {
        $this->arch_updated = $arch_updated;
    }

    /**
     * @param string $arch_fs
     */
    public function setArchFs(string $arch_fs): void
    {
        $this->arch_fs = $arch_fs;
    }

    /**
     * @param string $arch_db
     */
    public function setArchDb(string $arch_db): void
    {
        $this->arch_db = $arch_db;
    }

    /**
     * @param string $arch_base
     */
    public function setArchBase(string $arch_base): void
    {
        $this->arch_base = $arch_base;
    }

    /**
     * @param string $arch
     */
    public function setArch(string $arch): void
    {
        $this->arch = $arch;
    }

    /**
     * @param null|int $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
