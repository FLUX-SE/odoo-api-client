<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Ui;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\Menu as MenuAlias;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.ui.menu
 * Name : ir.ui.menu
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Menu extends Base
{
    /**
     * Menu
     *
     * @var null|string
     */
    private $name;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Child IDs
     *
     * @var MenuAlias
     */
    private $child_id;

    /**
     * Parent Menu
     *
     * @var MenuAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups_id;

    /**
     * Full Path
     *
     * @var string
     */
    private $complete_name;

    /**
     * Web Icon File
     *
     * @var string
     */
    private $web_icon;

    /**
     * Action
     *
     * @var mixed
     */
    private $action;

    /**
     * Web Icon Image
     *
     * @var int
     */
    private $web_icon_data;

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
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param MenuAlias $child_id
     */
    public function setChildId(MenuAlias $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @param MenuAlias $parent_id
     */
    public function setParentId(MenuAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param string $parent_path
     */
    public function setParentPath(string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param Groups $groups_id
     */
    public function setGroupsId(Groups $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @return string
     */
    public function getCompleteName(): string
    {
        return $this->complete_name;
    }

    /**
     * @param string $web_icon
     */
    public function setWebIcon(string $web_icon): void
    {
        $this->web_icon = $web_icon;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @param int $web_icon_data
     */
    public function setWebIconData(int $web_icon_data): void
    {
        $this->web_icon_data = $web_icon_data;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
