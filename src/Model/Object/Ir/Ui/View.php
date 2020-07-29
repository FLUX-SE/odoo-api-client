<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Ui;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.ui.view
 * ---
 * Name : ir.ui.view
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
final class View extends Base
{
    /**
     * View Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $model;

    /**
     * Key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $key;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $priority;

    /**
     * View Architecture
     * ---
     * This field should be used when accessing view arch. It will use translation.
     *                                                               Note that it will read `arch_db` or `arch_fs` if
     * in dev-xml mode.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $arch;

    /**
     * Base View Architecture
     * ---
     * This field is the same as `arch` field without translations
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $arch_base;

    /**
     * Arch Blob
     * ---
     * This field stores the view arch.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $arch_db;

    /**
     * Arch Filename
     * ---
     * File from where the view originates.
     *
     * Useful to (hard) reset broken views or to read arch from file in dev-xml mode.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $arch_fs;

    /**
     * Modified Architecture
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $arch_updated;

    /**
     * Previous View Architecture
     * ---
     * This field will save the current `arch_db` before writing on it.
     *
     * Useful to (soft) reset a broken view.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $arch_prev;

    /**
     * Inherited View
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $inherit_id;

    /**
     * Views which inherit from this one
     * ---
     * Relation : one2many (ir.ui.view -> inherit_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $inherit_children_ids;

    /**
     * Child Field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $field_parent;

    /**
     * Model Data
     * ---
     * Relation : many2one (ir.model.data)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Data
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_data_id;

    /**
     * External ID
     * ---
     * ID of the view defined in xml file
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $xml_id;

    /**
     * Groups
     * ---
     * If this field is empty, the view applies to all users. Otherwise, the view applies to the users of those
     * groups only.
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
     * Models
     * ---
     * Relation : one2many (ir.model.data -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Data
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $model_ids;

    /**
     * View inheritance mode
     * ---
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
     * ---
     * Selection : (default value, usually null)
     *     -> primary (Base view)
     *     -> extension (Extension View)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $mode;

    /**
     * Active
     * ---
     * If this view is inherited,
     * * if True, the view always extends its parent
     * * if False, the view currently does not extend its parent but can be enabled
     *
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * View Type
     * ---
     * Selection : (default value, usually null)
     *     -> tree (Tree)
     *     -> form (Form)
     *     -> graph (Graph)
     *     -> pivot (Pivot)
     *     -> calendar (Calendar)
     *     -> diagram (Diagram)
     *     -> gantt (Gantt)
     *     -> kanban (Kanban)
     *     -> search (Search)
     *     -> qweb (QWeb)
     *     -> cohort (Cohort)
     *     -> grid (Grid)
     *     -> activity (Activity)
     *     -> map (Map)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $type;

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
     * @param string $name View Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $priority Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $mode View inheritance mode
     *        ---
     *        Only applies if this view inherits from an other one (inherit_id is not False/Null).
     *
     *        * if extension (default), if this view is requested the closest primary view
     *        is looked up (via inherit_id), then all views inheriting from it with this
     *        view's model are applied
     *        * if primary, the closest primary view is fully resolved (even if it uses a
     *        different model than this one), then this view's inheritance specs
     *        (<xpath/>) are applied, and the result is used as if it were this view's
     *        actual arch.
     *
     *        ---
     *        Selection : (default value, usually null)
     *            -> primary (Base view)
     *            -> extension (Extension View)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, int $priority, string $mode)
    {
        $this->name = $name;
        $this->priority = $priority;
        $this->mode = $mode;
    }

    /**
     * @return string
     *
     * @SerializedName("mode")
     */
    public function getMode(): string
    {
        return $this->mode;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("model_ids")
     */
    public function getModelIds(): ?array
    {
        return $this->model_ids;
    }

    /**
     * @param OdooRelation[]|null $model_ids
     */
    public function setModelIds(?array $model_ids): void
    {
        $this->model_ids = $model_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModelIds(OdooRelation $item): bool
    {
        if (null === $this->model_ids) {
            return false;
        }

        return in_array($item, $this->model_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addModelIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeModelIds(OdooRelation $item): void
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
     * @param string $mode
     */
    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_data_id")
     */
    public function getModelDataId(): ?OdooRelation
    {
        return $this->model_data_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     *
     * @SerializedName("type")
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
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
     * @param OdooRelation|null $model_data_id
     */
    public function setModelDataId(?OdooRelation $model_data_id): void
    {
        $this->model_data_id = $model_data_id;
    }

    /**
     * @param string|null $field_parent
     */
    public function setFieldParent(?string $field_parent): void
    {
        $this->field_parent = $field_parent;
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
     * @param string|null $arch_db
     */
    public function setArchDb(?string $arch_db): void
    {
        $this->arch_db = $arch_db;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model")
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("key")
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return int
     *
     * @SerializedName("priority")
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return string|null
     *
     * @SerializedName("arch")
     */
    public function getArch(): ?string
    {
        return $this->arch;
    }

    /**
     * @param string|null $arch
     */
    public function setArch(?string $arch): void
    {
        $this->arch = $arch;
    }

    /**
     * @return string|null
     *
     * @SerializedName("arch_base")
     */
    public function getArchBase(): ?string
    {
        return $this->arch_base;
    }

    /**
     * @param string|null $arch_base
     */
    public function setArchBase(?string $arch_base): void
    {
        $this->arch_base = $arch_base;
    }

    /**
     * @return string|null
     *
     * @SerializedName("arch_db")
     */
    public function getArchDb(): ?string
    {
        return $this->arch_db;
    }

    /**
     * @return string|null
     *
     * @SerializedName("arch_fs")
     */
    public function getArchFs(): ?string
    {
        return $this->arch_fs;
    }

    /**
     * @return string|null
     *
     * @SerializedName("field_parent")
     */
    public function getFieldParent(): ?string
    {
        return $this->field_parent;
    }

    /**
     * @param string|null $arch_fs
     */
    public function setArchFs(?string $arch_fs): void
    {
        $this->arch_fs = $arch_fs;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("arch_updated")
     */
    public function isArchUpdated(): ?bool
    {
        return $this->arch_updated;
    }

    /**
     * @param bool|null $arch_updated
     */
    public function setArchUpdated(?bool $arch_updated): void
    {
        $this->arch_updated = $arch_updated;
    }

    /**
     * @return string|null
     *
     * @SerializedName("arch_prev")
     */
    public function getArchPrev(): ?string
    {
        return $this->arch_prev;
    }

    /**
     * @param string|null $arch_prev
     */
    public function setArchPrev(?string $arch_prev): void
    {
        $this->arch_prev = $arch_prev;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("inherit_id")
     */
    public function getInheritId(): ?OdooRelation
    {
        return $this->inherit_id;
    }

    /**
     * @param OdooRelation|null $inherit_id
     */
    public function setInheritId(?OdooRelation $inherit_id): void
    {
        $this->inherit_id = $inherit_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("inherit_children_ids")
     */
    public function getInheritChildrenIds(): ?array
    {
        return $this->inherit_children_ids;
    }

    /**
     * @param OdooRelation[]|null $inherit_children_ids
     */
    public function setInheritChildrenIds(?array $inherit_children_ids): void
    {
        $this->inherit_children_ids = $inherit_children_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInheritChildrenIds(OdooRelation $item): bool
    {
        if (null === $this->inherit_children_ids) {
            return false;
        }

        return in_array($item, $this->inherit_children_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addInheritChildrenIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeInheritChildrenIds(OdooRelation $item): void
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.ui.view';
    }
}
