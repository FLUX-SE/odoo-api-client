<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Wizard\Ir\Model\Menu;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\Menu;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : wizard.ir.model.menu.create
 * Name : wizard.ir.model.menu.create
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Create extends Base
{
    /**
     * Parent Menu
     *
     * @var Menu
     */
    private $menu_id;

    /**
     * Menu Name
     *
     * @var string
     */
    private $name;

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
     * @param Menu $menu_id Parent Menu
     * @param string $name Menu Name
     */
    public function __construct(Menu $menu_id, string $name)
    {
        $this->menu_id = $menu_id;
        $this->name = $name;
    }

    /**
     * @param Menu $menu_id
     */
    public function setMenuId(Menu $menu_id): void
    {
        $this->menu_id = $menu_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
