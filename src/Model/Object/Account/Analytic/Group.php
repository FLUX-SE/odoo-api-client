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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Parent
     *
     * @var null|GroupAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var null|string
     */
    private $parent_path;

    /**
     * Childrens
     *
     * @var null|GroupAlias[]
     */
    private $children_ids;

    /**
     * Complete Name
     *
     * @var null|string
     */
    private $complete_name;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return null|GroupAlias
     */
    public function getParentId(): ?GroupAlias
    {
        return $this->parent_id;
    }

    /**
     * @return null|string
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @return null|GroupAlias[]
     */
    public function getChildrenIds(): ?array
    {
        return $this->children_ids;
    }

    /**
     * @return null|string
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
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
