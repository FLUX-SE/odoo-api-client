<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model\Fields;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.fields.selection
 * Name : ir.model.fields.selection
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
final class Selection extends Base
{
    /**
     * Field
     *
     * @var Fields
     */
    private $field_id;

    /**
     * Value
     *
     * @var string
     */
    private $value;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

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
     * @param Fields $field_id Field
     * @param string $value Value
     * @param string $name Name
     */
    public function __construct(Fields $field_id, string $value, string $name)
    {
        $this->field_id = $field_id;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * @param Fields $field_id
     */
    public function setFieldId(Fields $field_id): void
    {
        $this->field_id = $field_id;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
