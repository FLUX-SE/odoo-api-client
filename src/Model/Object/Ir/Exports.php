<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Exports\Line;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.exports
 * Name : ir.exports
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
final class Exports extends Base
{
    /**
     * Export Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Resource
     *
     * @var null|string
     */
    private $resource;

    /**
     * Export ID
     *
     * @var null|Line[]
     */
    private $export_fields;

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
     * @param null|string $resource
     */
    public function setResource(?string $resource): void
    {
        $this->resource = $resource;
    }

    /**
     * @param null|Line[] $export_fields
     */
    public function setExportFields(?array $export_fields): void
    {
        $this->export_fields = $export_fields;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasExportFields(Line $item, bool $strict = true): bool
    {
        if (null === $this->export_fields) {
            return false;
        }

        return in_array($item, $this->export_fields, $strict);
    }

    /**
     * @param Line $item
     */
    public function addExportFields(Line $item): void
    {
        if ($this->hasExportFields($item)) {
            return;
        }

        if (null === $this->export_fields) {
            $this->export_fields = [];
        }

        $this->export_fields[] = $item;
    }

    /**
     * @param Line $item
     */
    public function removeExportFields(Line $item): void
    {
        if (null === $this->export_fields) {
            $this->export_fields = [];
        }

        if ($this->hasExportFields($item)) {
            $index = array_search($item, $this->export_fields);
            unset($this->export_fields[$index]);
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
