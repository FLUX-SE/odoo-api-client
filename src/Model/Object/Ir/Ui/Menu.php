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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Child IDs
     *
     * @var null|MenuAlias[]
     */
    private $child_id;

    /**
     * Parent Menu
     *
     * @var null|MenuAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var null|string
     */
    private $parent_path;

    /**
     * Groups
     * If you have groups, the visibility of this menu will be based on these groups. If this field is empty, Odoo
     * will compute visibility based on the related object's read access.
     *
     * @var null|Groups[]
     */
    private $groups_id;

    /**
     * Full Path
     *
     * @var null|string
     */
    private $complete_name;

    /**
     * Web Icon File
     *
     * @var null|string
     */
    private $web_icon;

    /**
     * Action
     *
     * @var null|mixed
     */
    private $action;

    /**
     * Web Icon Image
     *
     * @var null|int
     */
    private $web_icon_data;

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
     * @param string $name Menu
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|int $web_icon_data
     */
    public function setWebIconData(?int $web_icon_data): void
    {
        $this->web_icon_data = $web_icon_data;
    }

    /**
     * @param null|mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @param null|string $web_icon
     */
    public function setWebIcon(?string $web_icon): void
    {
        $this->web_icon = $web_icon;
    }

    /**
     * @return null|string
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
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
     * @param null|Groups[] $groups_id
     */
    public function setGroupsId(?array $groups_id): void
    {
        $this->groups_id = $groups_id;
    }

    /**
     * @param null|string $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param null|MenuAlias $parent_id
     */
    public function setParentId(?MenuAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param MenuAlias $item
     */
    public function removeChildId(MenuAlias $item): void
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
     * @param MenuAlias $item
     */
    public function addChildId(MenuAlias $item): void
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
     * @param MenuAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildId(MenuAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_id) {
            return false;
        }

        return in_array($item, $this->child_id, $strict);
    }

    /**
     * @param null|MenuAlias[] $child_id
     */
    public function setChildId(?array $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
