<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Group as GroupAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.analytic.group
 * Name : account.analytic.group
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
final class Group extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Parent
     *
     * @var GroupAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Childrens
     *
     * @var GroupAlias
     */
    private $children_ids;

    /**
     * Complete Name
     *
     * @var string
     */
    private $complete_name;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return GroupAlias
     */
    public function getParentId(): GroupAlias
    {
        return $this->parent_id;
    }

    /**
     * @return string
     */
    public function getParentPath(): string
    {
        return $this->parent_path;
    }

    /**
     * @return GroupAlias
     */
    public function getChildrenIds(): GroupAlias
    {
        return $this->children_ids;
    }

    /**
     * @return string
     */
    public function getCompleteName(): string
    {
        return $this->complete_name;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
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
