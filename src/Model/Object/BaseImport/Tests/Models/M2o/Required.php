<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models\M2o;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models\M2o\Required\Related;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base_import.tests.models.m2o.required
 * Name : base_import.tests.models.m2o.required
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
final class Required extends Base
{
    /**
     * Value
     *
     * @var Related
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
     * @param Related $value Value
     */
    public function __construct(Related $value)
    {
        $this->value = $value;
    }

    /**
     * @param Related $value
     */
    public function setValue(Related $value): void
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
