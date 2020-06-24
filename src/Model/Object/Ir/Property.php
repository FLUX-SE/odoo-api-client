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
final class Property extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Resource
     *
     * @var string
     */
    private $res_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Field
     *
     * @var null|Fields
     */
    private $fields_id;

    /**
     * Value Float
     *
     * @var float
     */
    private $value_float;

    /**
     * Value Integer
     *
     * @var int
     */
    private $value_integer;

    /**
     * Value Text
     *
     * @var string
     */
    private $value_text;

    /**
     * Value Binary
     *
     * @var int
     */
    private $value_binary;

    /**
     * Value Reference
     *
     * @var string
     */
    private $value_reference;

    /**
     * Value Datetime
     *
     * @var DateTimeInterface
     */
    private $value_datetime;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param DateTimeInterface $value_datetime
     */
    public function setValueDatetime(DateTimeInterface $value_datetime): void
    {
        $this->value_datetime = $value_datetime;
    }

    /**
     * @param string $res_id
     */
    public function setResId(string $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string $value_reference
     */
    public function setValueReference(string $value_reference): void
    {
        $this->value_reference = $value_reference;
    }

    /**
     * @param int $value_binary
     */
    public function setValueBinary(int $value_binary): void
    {
        $this->value_binary = $value_binary;
    }

    /**
     * @param string $value_text
     */
    public function setValueText(string $value_text): void
    {
        $this->value_text = $value_text;
    }

    /**
     * @param int $value_integer
     */
    public function setValueInteger(int $value_integer): void
    {
        $this->value_integer = $value_integer;
    }

    /**
     * @param float $value_float
     */
    public function setValueFloat(float $value_float): void
    {
        $this->value_float = $value_float;
    }

    /**
     * @param null|Fields $fields_id
     */
    public function setFieldsId(Fields $fields_id): void
    {
        $this->fields_id = $fields_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
