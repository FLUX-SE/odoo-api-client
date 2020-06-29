<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.property
 * Name : ir.property
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
final class Property extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Resource
     * If not set, acts as a default value for new resources
     *
     * @var null|string
     */
    private $res_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Field
     *
     * @var Fields
     */
    private $fields_id;

    /**
     * Value Float
     *
     * @var null|float
     */
    private $value_float;

    /**
     * Value Integer
     *
     * @var null|int
     */
    private $value_integer;

    /**
     * Value Text
     *
     * @var null|string
     */
    private $value_text;

    /**
     * Value Binary
     *
     * @var null|int
     */
    private $value_binary;

    /**
     * Value Reference
     *
     * @var null|string
     */
    private $value_reference;

    /**
     * Value Datetime
     *
     * @var null|DateTimeInterface
     */
    private $value_datetime;

    /**
     * Type
     *
     * @var array
     */
    private $type;

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
     * @param Fields $fields_id Field
     * @param array $type Type
     */
    public function __construct(Fields $fields_id, array $type)
    {
        $this->fields_id = $fields_id;
        $this->type = $type;
    }

    /**
     * @param null|DateTimeInterface $value_datetime
     */
    public function setValueDatetime(?DateTimeInterface $value_datetime): void
    {
        $this->value_datetime = $value_datetime;
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
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param null|string $value_reference
     */
    public function setValueReference(?string $value_reference): void
    {
        $this->value_reference = $value_reference;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $value_binary
     */
    public function setValueBinary(?int $value_binary): void
    {
        $this->value_binary = $value_binary;
    }

    /**
     * @param null|string $value_text
     */
    public function setValueText(?string $value_text): void
    {
        $this->value_text = $value_text;
    }

    /**
     * @param null|int $value_integer
     */
    public function setValueInteger(?int $value_integer): void
    {
        $this->value_integer = $value_integer;
    }

    /**
     * @param null|float $value_float
     */
    public function setValueFloat(?float $value_float): void
    {
        $this->value_float = $value_float;
    }

    /**
     * @param Fields $fields_id
     */
    public function setFieldsId(Fields $fields_id): void
    {
        $this->fields_id = $fields_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|string $res_id
     */
    public function setResId(?string $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
