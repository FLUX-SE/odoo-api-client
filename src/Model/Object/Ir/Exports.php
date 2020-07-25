<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.exports
 * Name : ir.exports
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Exports extends Base
{
    /**
     * Export Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Resource
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $resource;

    /**
     * Export ID
     * ---
     * Relation : one2many (ir.exports.line -> export_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Exports\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $export_fields;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExportFields(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addExportFields(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExportFields(OdooRelation $item): bool
    {
        if (null === $this->export_fields) {
            return false;
        }

        return in_array($item, $this->export_fields);
    }

    /**
     * @param OdooRelation[]|null $export_fields
     */
    public function setExportFields(?array $export_fields): void
    {
        $this->export_fields = $export_fields;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getExportFields(): ?array
    {
        return $this->export_fields;
    }

    /**
     * @param string|null $resource
     */
    public function setResource(?string $resource): void
    {
        $this->resource = $resource;
    }

    /**
     * @return string|null
     */
    public function getResource(): ?string
    {
        return $this->resource;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.exports';
    }
}
