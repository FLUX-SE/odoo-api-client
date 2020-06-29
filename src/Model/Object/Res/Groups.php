<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model\Access;
use Flux\OdooApiClient\Model\Object\Ir\Module\Category;
use Flux\OdooApiClient\Model\Object\Ir\Rule;
use Flux\OdooApiClient\Model\Object\Ir\Ui\Menu;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Groups as GroupsAlias;

/**
 * Odoo model : res.groups
 * Name : res.groups
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Groups extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Users
     *
     * @var null|Users[]
     */
    private $users;

    /**
     * Access Controls
     *
     * @var null|Access[]
     */
    private $model_access;

    /**
     * Rules
     *
     * @var null|Rule[]
     */
    private $rule_groups;

    /**
     * Access Menu
     *
     * @var null|Menu[]
     */
    private $menu_access;

    /**
     * Views
     *
     * @var null|View[]
     */
    private $view_access;

    /**
     * Comment
     *
     * @var null|string
     */
    private $comment;

    /**
     * Application
     *
     * @var null|Category
     */
    private $category_id;

    /**
     * Color Index
     *
     * @var null|int
     */
    private $color;

    /**
     * Group Name
     *
     * @var null|string
     */
    private $full_name;

    /**
     * Share Group
     * Group created to set access rights for sharing data with some users.
     *
     * @var null|bool
     */
    private $share;

    /**
     * Inherits
     * Users of this group automatically inherit those groups
     *
     * @var null|GroupsAlias[]
     */
    private $implied_ids;

    /**
     * Transitively inherits
     *
     * @var null|GroupsAlias[]
     */
    private $trans_implied_ids;

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
     * @param string $name Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param null|GroupsAlias[] $implied_ids
     */
    public function setImpliedIds(?array $implied_ids): void
    {
        $this->implied_ids = $implied_ids;
    }

    /**
     * @param View $item
     */
    public function removeViewAccess(View $item): void
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
     * @param null|string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param null|Category $category_id
     */
    public function setCategoryId(?Category $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    /**
     * @param null|bool $share
     */
    public function setShare(?bool $share): void
    {
        $this->share = $share;
    }

    /**
     * @param GroupsAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasImpliedIds(GroupsAlias $item, bool $strict = true): bool
    {
        if (null === $this->implied_ids) {
            return false;
        }

        return in_array($item, $this->implied_ids, $strict);
    }

    /**
     * @param View $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasViewAccess(View $item, bool $strict = true): bool
    {
        if (null === $this->view_access) {
            return false;
        }

        return in_array($item, $this->view_access, $strict);
    }

    /**
     * @param GroupsAlias $item
     */
    public function addImpliedIds(GroupsAlias $item): void
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
     * @param GroupsAlias $item
     */
    public function removeImpliedIds(GroupsAlias $item): void
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
     * @return null|GroupsAlias[]
     */
    public function getTransImpliedIds(): ?array
    {
        return $this->trans_implied_ids;
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
     * @param View $item
     */
    public function addViewAccess(View $item): void
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
     * @param null|View[] $view_access
     */
    public function setViewAccess(?array $view_access): void
    {
        $this->view_access = $view_access;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Access $item
     */
    public function addModelAccess(Access $item): void
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
     * @param null|Users[] $users
     */
    public function setUsers(?array $users): void
    {
        $this->users = $users;
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUsers(Users $item, bool $strict = true): bool
    {
        if (null === $this->users) {
            return false;
        }

        return in_array($item, $this->users, $strict);
    }

    /**
     * @param Users $item
     */
    public function addUsers(Users $item): void
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
     * @param Users $item
     */
    public function removeUsers(Users $item): void
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
     * @param null|Access[] $model_access
     */
    public function setModelAccess(?array $model_access): void
    {
        $this->model_access = $model_access;
    }

    /**
     * @param Access $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModelAccess(Access $item, bool $strict = true): bool
    {
        if (null === $this->model_access) {
            return false;
        }

        return in_array($item, $this->model_access, $strict);
    }

    /**
     * @param Access $item
     */
    public function removeModelAccess(Access $item): void
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
     * @param Menu $item
     */
    public function removeMenuAccess(Menu $item): void
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
     * @param null|Rule[] $rule_groups
     */
    public function setRuleGroups(?array $rule_groups): void
    {
        $this->rule_groups = $rule_groups;
    }

    /**
     * @param Rule $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRuleGroups(Rule $item, bool $strict = true): bool
    {
        if (null === $this->rule_groups) {
            return false;
        }

        return in_array($item, $this->rule_groups, $strict);
    }

    /**
     * @param Rule $item
     */
    public function addRuleGroups(Rule $item): void
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
     * @param Rule $item
     */
    public function removeRuleGroups(Rule $item): void
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
     * @param null|Menu[] $menu_access
     */
    public function setMenuAccess(?array $menu_access): void
    {
        $this->menu_access = $menu_access;
    }

    /**
     * @param Menu $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMenuAccess(Menu $item, bool $strict = true): bool
    {
        if (null === $this->menu_access) {
            return false;
        }

        return in_array($item, $this->menu_access, $strict);
    }

    /**
     * @param Menu $item
     */
    public function addMenuAccess(Menu $item): void
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
