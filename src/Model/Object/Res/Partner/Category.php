<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Partner;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Partner\Category as CategoryAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : res.partner.category
 * Name : res.partner.category
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Category extends Base
{
    /**
     * Tag Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Color Index
     *
     * @var int
     */
    private $color;

    /**
     * Parent Category
     *
     * @var CategoryAlias
     */
    private $parent_id;

    /**
     * Child Tags
     *
     * @var CategoryAlias
     */
    private $child_ids;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Partners
     *
     * @var Partner
     */
    private $partner_ids;

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
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param CategoryAlias $parent_id
     */
    public function setParentId(CategoryAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param CategoryAlias $child_ids
     */
    public function setChildIds(CategoryAlias $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $parent_path
     */
    public function setParentPath(string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
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
