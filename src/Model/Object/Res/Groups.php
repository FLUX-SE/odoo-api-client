<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.groups
 * ---
 * Name : res.groups
 * ---
 * Info :
 * Update of res.groups class
 *                 - if adding users from a group, check mail.channels linked to this user
 *                     group and subscribe them. This is done by overriding the write method.
 */
final class Groups extends Base
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
     * Users
     * ---
     * Relation : many2many (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $users;

    /**
     * Access Controls
     * ---
     * Relation : one2many (ir.model.access -> group_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Access
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $model_access;

    /**
     * Rules
     * ---
     * Relation : many2many (ir.rule)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rule_groups;

    /**
     * Access Menu
     * ---
     * Relation : many2many (ir.ui.menu)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\Menu
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $menu_access;

    /**
     * Views
     * ---
     * Relation : many2many (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $view_access;

    /**
     * Comment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $comment;

    /**
     * Application
     * ---
     * Relation : many2one (ir.module.category)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Module\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $category_id;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Group Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $full_name;

    /**
     * Share Group
     * ---
     * Group created to set access rights for sharing data with some users.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $share;

    /**
     * Inherits
     * ---
     * Users of this group automatically inherit those groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $implied_ids;

    /**
     * Transitively inherits
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $trans_implied_ids;

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
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeImpliedIds(OdooRelation $item): void
    {
        if (null === $this->implied_ids) {
            $this->implied_ids = [];
        }

        if ($this->hasImpliedIds($item)) {
            $index = array_search($item, $this->implied_ids);
            unset($this->implied_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $category_id
     */
    public function setCategoryId(?OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("full_name")
     */
    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    /**
     * @param string|null $full_name
     */
    public function setFullName(?string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("share")
     */
    public function isShare(): ?bool
    {
        return $this->share;
    }

    /**
     * @param bool|null $share
     */
    public function setShare(?bool $share): void
    {
        $this->share = $share;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("implied_ids")
     */
    public function getImpliedIds(): ?array
    {
        return $this->implied_ids;
    }

    /**
     * @param OdooRelation[]|null $implied_ids
     */
    public function setImpliedIds(?array $implied_ids): void
    {
        $this->implied_ids = $implied_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasImpliedIds(OdooRelation $item): bool
    {
        if (null === $this->implied_ids) {
            return false;
        }

        return in_array($item, $this->implied_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addImpliedIds(OdooRelation $item): void
    {
        if ($this->hasImpliedIds($item)) {
            return;
        }

        if (null === $this->implied_ids) {
            $this->implied_ids = [];
        }

        $this->implied_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("trans_implied_ids")
     */
    public function getTransImpliedIds(): ?array
    {
        return $this->trans_implied_ids;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param OdooRelation[]|null $trans_implied_ids
     */
    public function setTransImpliedIds(?array $trans_implied_ids): void
    {
        $this->trans_implied_ids = $trans_implied_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTransImpliedIds(OdooRelation $item): bool
    {
        if (null === $this->trans_implied_ids) {
            return false;
        }

        return in_array($item, $this->trans_implied_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTransImpliedIds(OdooRelation $item): void
    {
        if ($this->hasTransImpliedIds($item)) {
            return;
        }

        if (null === $this->trans_implied_ids) {
            $this->trans_implied_ids = [];
        }

        $this->trans_implied_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTransImpliedIds(OdooRelation $item): void
    {
        if (null === $this->trans_implied_ids) {
            $this->trans_implied_ids = [];
        }

        if ($this->hasTransImpliedIds($item)) {
            $index = array_search($item, $this->trans_implied_ids);
            unset($this->trans_implied_ids[$index]);
        }
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
     * @return OdooRelation|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("comment")
     */
    public function getComment(): ?string
    {
        return $this->comment;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("rule_groups")
     */
    public function getRuleGroups(): ?array
    {
        return $this->rule_groups;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("users")
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

    /**
     * @param OdooRelation[]|null $users
     */
    public function setUsers(?array $users): void
    {
        $this->users = $users;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUsers(OdooRelation $item): bool
    {
        if (null === $this->users) {
            return false;
        }

        return in_array($item, $this->users);
    }

    /**
     * @param OdooRelation $item
     */
    public function addUsers(OdooRelation $item): void
    {
        if ($this->hasUsers($item)) {
            return;
        }

        if (null === $this->users) {
            $this->users = [];
        }

        $this->users[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUsers(OdooRelation $item): void
    {
        if (null === $this->users) {
            $this->users = [];
        }

        if ($this->hasUsers($item)) {
            $index = array_search($item, $this->users);
            unset($this->users[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("model_access")
     */
    public function getModelAccess(): ?array
    {
        return $this->model_access;
    }

    /**
     * @param OdooRelation[]|null $model_access
     */
    public function setModelAccess(?array $model_access): void
    {
        $this->model_access = $model_access;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModelAccess(OdooRelation $item): bool
    {
        if (null === $this->model_access) {
            return false;
        }

        return in_array($item, $this->model_access);
    }

    /**
     * @param OdooRelation $item
     */
    public function addModelAccess(OdooRelation $item): void
    {
        if ($this->hasModelAccess($item)) {
            return;
        }

        if (null === $this->model_access) {
            $this->model_access = [];
        }

        $this->model_access[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModelAccess(OdooRelation $item): void
    {
        if (null === $this->model_access) {
            $this->model_access = [];
        }

        if ($this->hasModelAccess($item)) {
            $index = array_search($item, $this->model_access);
            unset($this->model_access[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $rule_groups
     */
    public function setRuleGroups(?array $rule_groups): void
    {
        $this->rule_groups = $rule_groups;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeViewAccess(OdooRelation $item): void
    {
        if (null === $this->view_access) {
            $this->view_access = [];
        }

        if ($this->hasViewAccess($item)) {
            $index = array_search($item, $this->view_access);
            unset($this->view_access[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRuleGroups(OdooRelation $item): bool
    {
        if (null === $this->rule_groups) {
            return false;
        }

        return in_array($item, $this->rule_groups);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRuleGroups(OdooRelation $item): void
    {
        if ($this->hasRuleGroups($item)) {
            return;
        }

        if (null === $this->rule_groups) {
            $this->rule_groups = [];
        }

        $this->rule_groups[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRuleGroups(OdooRelation $item): void
    {
        if (null === $this->rule_groups) {
            $this->rule_groups = [];
        }

        if ($this->hasRuleGroups($item)) {
            $index = array_search($item, $this->rule_groups);
            unset($this->rule_groups[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("menu_access")
     */
    public function getMenuAccess(): ?array
    {
        return $this->menu_access;
    }

    /**
     * @param OdooRelation[]|null $menu_access
     */
    public function setMenuAccess(?array $menu_access): void
    {
        $this->menu_access = $menu_access;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMenuAccess(OdooRelation $item): bool
    {
        if (null === $this->menu_access) {
            return false;
        }

        return in_array($item, $this->menu_access);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMenuAccess(OdooRelation $item): void
    {
        if ($this->hasMenuAccess($item)) {
            return;
        }

        if (null === $this->menu_access) {
            $this->menu_access = [];
        }

        $this->menu_access[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMenuAccess(OdooRelation $item): void
    {
        if (null === $this->menu_access) {
            $this->menu_access = [];
        }

        if ($this->hasMenuAccess($item)) {
            $index = array_search($item, $this->menu_access);
            unset($this->menu_access[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("view_access")
     */
    public function getViewAccess(): ?array
    {
        return $this->view_access;
    }

    /**
     * @param OdooRelation[]|null $view_access
     */
    public function setViewAccess(?array $view_access): void
    {
        $this->view_access = $view_access;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasViewAccess(OdooRelation $item): bool
    {
        if (null === $this->view_access) {
            return false;
        }

        return in_array($item, $this->view_access);
    }

    /**
     * @param OdooRelation $item
     */
    public function addViewAccess(OdooRelation $item): void
    {
        if ($this->hasViewAccess($item)) {
            return;
        }

        if (null === $this->view_access) {
            $this->view_access = [];
        }

        $this->view_access[] = $item;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.groups';
    }
}
