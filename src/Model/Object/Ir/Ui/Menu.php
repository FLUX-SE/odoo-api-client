<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Ui;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.ui.menu
 * ---
 * Name : ir.ui.menu
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
final class Menu extends Base
{
    /**
     * Menu
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Child IDs
     * ---
     * Relation : one2many (ir.ui.menu -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\Menu
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_id;

    /**
     * Parent Menu
     * ---
     * Relation : many2one (ir.ui.menu)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\Menu
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Parent Path
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_path;

    /**
     * Groups
     * ---
     * If you have groups, the visibility of this menu will be based on these groups. If this field is empty, Odoo
     * will compute visibility based on the related object's read access.
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
     * Full Path
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Web Icon File
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $web_icon;

    /**
     * Action
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $action;

    /**
     * Web Icon Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $web_icon_data;

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
     * @param string $name Menu
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     */
    public function addWebIconData($item): void
    {
        if ($this->hasWebIconData($item)) {
            return;
        }

        if (null === $this->web_icon_data) {
            $this->web_icon_data = [];
        }

        $this->web_icon_data[] = $item;
    }

    /**
     * @return string|null
     *
     * @SerializedName("web_icon")
     */
    public function getWebIcon(): ?string
    {
        return $this->web_icon;
    }

    /**
     * @param string|null $web_icon
     */
    public function setWebIcon(?string $web_icon): void
    {
        $this->web_icon = $web_icon;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("action")
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed|null $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return array|null
     *
     * @SerializedName("web_icon_data")
     */
    public function getWebIconData(): ?array
    {
        return $this->web_icon_data;
    }

    /**
     * @param array|null $web_icon_data
     */
    public function setWebIconData(?array $web_icon_data): void
    {
        $this->web_icon_data = $web_icon_data;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasWebIconData($item): bool
    {
        if (null === $this->web_icon_data) {
            return false;
        }

        return in_array($item, $this->web_icon_data);
    }

    /**
     * @param mixed $item
     */
    public function removeWebIconData($item): void
    {
        if (null === $this->web_icon_data) {
            $this->web_icon_data = [];
        }

        if ($this->hasWebIconData($item)) {
            $index = array_search($item, $this->web_icon_data);
            unset($this->web_icon_data[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("complete_name")
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
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
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
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
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildId(OdooRelation $item): bool
    {
        if (null === $this->child_id) {
            return false;
        }

        return in_array($item, $this->child_id);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_id")
     */
    public function getChildId(): ?array
    {
        return $this->child_id;
    }

    /**
     * @param OdooRelation[]|null $child_id
     */
    public function setChildId(?array $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildId(OdooRelation $item): void
    {
        if ($this->hasChildId($item)) {
            return;
        }

        if (null === $this->child_id) {
            $this->child_id = [];
        }

        $this->child_id[] = $item;
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
    public function removeChildId(OdooRelation $item): void
    {
        if (null === $this->child_id) {
            $this->child_id = [];
        }

        if ($this->hasChildId($item)) {
            $index = array_search($item, $this->child_id);
            unset($this->child_id[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("parent_path")
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.ui.menu';
    }
}
