<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models\O2m;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models\O2m;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base_import.tests.models.o2m.child
 * Name : base_import.tests.models.o2m.child
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
final class Child extends Base
{
    /**
     * Parent
     *
     * @var null|O2m
     */
    private $parent_id;

    /**
     * Value
     *
     * @var null|int
     */
    private $value;

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
     * @param null|O2m $parent_id
     */
    public function setParentId(?O2m $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|int $value
     */
    public function setValue(?int $value): void
    {
        $this->value = $value;
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
