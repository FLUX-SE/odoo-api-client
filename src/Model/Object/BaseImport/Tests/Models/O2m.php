<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\BaseImport\Tests\Models\O2m\Child;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base_import.tests.models.o2m
 * Name : base_import.tests.models.o2m
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
final class O2m extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Value
     *
     * @var null|Child[]
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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Child[] $value
     */
    public function setValue(?array $value): void
    {
        $this->value = $value;
    }

    /**
     * @param Child $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasValue(Child $item, bool $strict = true): bool
    {
        if (null === $this->value) {
            return false;
        }

        return in_array($item, $this->value, $strict);
    }

    /**
     * @param Child $item
     */
    public function addValue(Child $item): void
    {
        if ($this->hasValue($item)) {
            return;
        }

        if (null === $this->value) {
            $this->value = [];
        }

        $this->value[] = $item;
    }

    /**
     * @param Child $item
     */
    public function removeValue(Child $item): void
    {
        if (null === $this->value) {
            $this->value = [];
        }

        if ($this->hasValue($item)) {
            $index = array_search($item, $this->value);
            unset($this->value[$index]);
        }
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
