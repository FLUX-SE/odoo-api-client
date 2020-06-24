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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Users
     *
     * @var Users
     */
    private $users;

    /**
     * Access Controls
     *
     * @var Access
     */
    private $model_access;

    /**
     * Rules
     *
     * @var Rule
     */
    private $rule_groups;

    /**
     * Access Menu
     *
     * @var Menu
     */
    private $menu_access;

    /**
     * Views
     *
     * @var View
     */
    private $view_access;

    /**
     * Comment
     *
     * @var string
     */
    private $comment;

    /**
     * Application
     *
     * @var Category
     */
    private $category_id;

    /**
     * Color Index
     *
     * @var int
     */
    private $color;

    /**
     * Group Name
     *
     * @var string
     */
    private $full_name;

    /**
     * Share Group
     *
     * @var bool
     */
    private $share;

    /**
     * Inherits
     *
     * @var GroupsAlias
     */
    private $implied_ids;

    /**
     * Transitively inherits
     *
     * @var GroupsAlias
     */
    private $trans_implied_ids;

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
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
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
     * @return GroupsAlias
     */
    public function getTransImpliedIds(): GroupsAlias
    {
        return $this->trans_implied_ids;
    }

    /**
     * @param GroupsAlias $implied_ids
     */
    public function setImpliedIds(GroupsAlias $implied_ids): void
    {
        $this->implied_ids = $implied_ids;
    }

    /**
     * @param bool $share
     */
    public function setShare(bool $share): void
    {
        $this->share = $share;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param Users $users
     */
    public function setUsers(Users $users): void
    {
        $this->users = $users;
    }

    /**
     * @param Category $category_id
     */
    public function setCategoryId(Category $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param View $view_access
     */
    public function setViewAccess(View $view_access): void
    {
        $this->view_access = $view_access;
    }

    /**
     * @param Menu $menu_access
     */
    public function setMenuAccess(Menu $menu_access): void
    {
        $this->menu_access = $menu_access;
    }

    /**
     * @param Rule $rule_groups
     */
    public function setRuleGroups(Rule $rule_groups): void
    {
        $this->rule_groups = $rule_groups;
    }

    /**
     * @param Access $model_access
     */
    public function setModelAccess(Access $model_access): void
    {
        $this->model_access = $model_access;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
