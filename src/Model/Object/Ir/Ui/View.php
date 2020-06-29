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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Model
     *
     * @var null|string
     */
    private $model;

    /**
     * Key
     *
     * @var null|string
     */
    private $key;

    /**
     * Sequence
     *
     * @var int
     */
    private $priority;

    /**
     * View Architecture
     * This field should be used when accessing view arch. It will use translation.
     * Note that it will read `arch_db` or `arch_fs` if in dev-xml mode.
     *
     * @var null|string
     */
    private $arch;

    /**
     * Base View Architecture
     * This field is the same as `arch` field without translations
     *
     * @var null|string
     */
    private $arch_base;

    /**
     * Arch Blob
     * This field stores the view arch.
     *
     * @var null|string
     */
    private $arch_db;

    /**
     * Arch Filename
     * File from where the view originates.
     * Useful to (hard) reset broken views or to read arch from file in dev-xml mode.
     *
     * @var null|string
     */
    private $arch_fs;

    /**
     * Modified Architecture
     *
     * @var null|bool
     */
    private $arch_updated;

    /**
     * Previous View Architecture
     * This field will save the current `arch_db` before writing on it.
     * Useful to (soft) reset a broken view.
     *
     * @var null|string
     */
    private $arch_prev;

    /**
     * Inherited View
     *
     * @var null|ViewAlias
     */
    private $inherit_id;

    /**
     * Views which inherit from this one
     *
     * @var null|ViewAlias[]
     */
    private $inherit_children_ids;

    /**
     * Child Field
     *
     * @var null|string
     */
    private $field_parent;

    /**
     * Model Data
     *
     * @var null|Data
     */
    private $model_data_id;

    /**
     * External ID
     * ID of the view defined in xml file
     *
     * @var null|string
     */
    private $xml_id;

    /**
     * Groups
     * If this field is empty, the view applies to all users. Otherwise, the view applies to the users of those
     * groups only.
     *
     * @var null|Groups[]
     */
    private $groups_id;

    /**
     * Models
     *
     * @var null|Data[]
     */
    private $model_ids;

    /**
     * View inheritance mode
     * Only applies if this view inherits from an other one (inherit_id is not False/Null).
     *
     * * if extension (default), if this view is requested the closest primary view
     * is looked up (via inherit_id), then all views inheriting from it with this
     * view's model are applied
     * * if primary, the closest primary view is fully resolved (even if it uses a
     * different model than this one), then this view's inheritance specs
     * (<xpath/>) are applied, and the result is used as if it were this view's
     * actual arch.
     *
     * @var array
     */
    private $mode;

    /**
     * Active
     * If this view is inherited,
     * * if True, the view always extends its parent
     * * if False, the view currently does not extend its parent but can be enabled
     *
     * @var null|bool
     */
    private $active;

    /**
     * View Type
     *
     * @var null|array
     */
    private $type;

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
     * @param string $name View Name
     * @param int $priority Sequence
     * @param array $mode View inheritance mode
     *        Only applies if this view inherits from an other one (inherit_id is not False/Null).
     *       
     *        * if extension (default), if this view is requested the closest primary view
     *        is looked up (via inherit_id), then all views inheriting from it with this
     *        view's model are applied
     *        * if primary, the closest primary view is fully resolved (even if it uses a
     *        different model than this one), then this view's inheritance specs
     *        (<xpath/>) are applied, and the result is used as if it were this view's
     *        actual arch.
     */
    public function __construct(string $name, int $priority, array $mode)
    {
        $this->name = $name;
        $this->priority = $priority;
        $this->mode = $mode;
    }

    /**
     * @param mixed $item
     */
    public function removeMode($item): void
    {
        if ($this->hasMode($item)) {
            $index = array_search($item, $this->mode);
            unset($this->mode[$index]);
        }
    }

    /**
     * @param null|Data[] $model_ids
     */
    public function setModelIds(?array $model_ids): void
    {
        $this->model_ids = $model_ids;
    }

    /**
     * @param Data $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModelIds(Data $item, bool $strict = true): bool
    {
        if (null === $this->model_ids) {
            return false;
        }

        return in_array($item, $this->model_ids, $strict);
    }

    /**
     * @param Data $item
     */
    public function addModelIds(Data $item): void
    {
        if ($this->hasModelIds($item)) {
            return;
        }

        if (null === $this->model_ids) {
            $this->model_ids = [];
        }

        $this->model_ids[] = $item;
    }

    /**
     * @param Data $item
     */
    public function removeModelIds(Data $item): void
    {
        if (null === $this->model_ids) {
            $this->model_ids = [];
        }

        if ($this->hasModelIds($item)) {
            $index = array_search($item, $this->model_ids);
            unset($this->model_ids[$index]);
        }
    }

    /**
     * @param array $mode
     */
    public function setMode(array $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMode($item, bool $strict = true): bool
    {
        return in_array($item, $this->mode, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addMode($item): void
    {
        if ($this->hasMode($item)) {
            return;
        }

        $this->mode[] = $item;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($item, $this->type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if (null === $this->type) {
            $this->type = [];
        }

        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
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
     * @param null|bool $arch_updated
     */
    public function setArchUpdated(?bool $arch_updated): void
    {
        $this->arch_updated = $arch_updated;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param null|string $key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param null|string $arch
     */
    public function setArch(?string $arch): void
    {
        $this->arch = $arch;
    }

    /**
     * @param null|string $arch_base
     */
    public function setArchBase(?string $arch_base): void
    {
        $this->arch_base = $arch_base;
    }

    /**
     * @param null|string $arch_db
     */
    public function setArchDb(?string $arch_db): void
    {
        $this->arch_db = $arch_db;
    }

    /**
     * @param null|string $arch_fs
     */
    public function setArchFs(?string $arch_fs): void
    {
        $this->arch_fs = $arch_fs;
    }

    /**
     * @param null|string $arch_prev
     */
    public function setArchPrev(?string $arch_prev): void
    {
        $this->arch_prev = $arch_prev;
    }

    /**
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param null|ViewAlias $inherit_id
     */
    public function setInheritId(?ViewAlias $inherit_id): void
    {
        $this->inherit_id = $inherit_id;
    }

    /**
     * @param null|ViewAlias[] $inherit_children_ids
     */
    public function setInheritChildrenIds(?array $inherit_children_ids): void
    {
        $this->inherit_children_ids = $inherit_children_ids;
    }

    /**
     * @param ViewAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInheritChildrenIds(ViewAlias $item, bool $strict = true): bool
    {
        if (null === $this->inherit_children_ids) {
            return false;
        }

        return in_array($item, $this->inherit_children_ids, $strict);
    }

    /**
     * @param ViewAlias $item
     */
    public function addInheritChildrenIds(ViewAlias $item): void
    {
        if ($this->hasInheritChildrenIds($item)) {
            return;
        }

        if (null === $this->inherit_children_ids) {
            $this->inherit_children_ids = [];
        }

        $this->inherit_children_ids[] = $item;
    }

    /**
     * @param ViewAlias $item
     */
    public function removeInheritChildrenIds(ViewAlias $item): void
    {
        if (null === $this->inherit_children_ids) {
            $this->inherit_children_ids = [];
        }

        if ($this->hasInheritChildrenIds($item)) {
            $index = array_search($item, $this->inherit_children_ids);
            unset($this->inherit_children_ids[$index]);
        }
    }

    /**
     * @param null|string $field_parent
     */
    public function setFieldParent(?string $field_parent): void
    {
        $this->field_parent = $field_parent;
    }

    /**
     * @return null|Data
     */
    public function getModelDataId(): ?Data
    {
        return $this->model_data_id;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
