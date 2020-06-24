<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields as FieldsAlias;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields\Selection;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.fields
 * Name : ir.model.fields
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Fields extends Base
{
    /**
     * Field Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Complete Name
     *
     * @var string
     */
    private $complete_name;

    /**
     * Object Name
     *
     * @var null|string
     */
    private $model;

    /**
     * Object Relation
     *
     * @var string
     */
    private $relation;

    /**
     * Relation Field
     *
     * @var string
     */
    private $relation_field;

    /**
     * Relation field
     *
     * @var FieldsAlias
     */
    private $relation_field_id;

    /**
     * Model
     *
     * @var null|Model
     */
    private $model_id;

    /**
     * Field Label
     *
     * @var null|string
     */
    private $field_description;

    /**
     * Field Help
     *
     * @var string
     */
    private $help;

    /**
     * Field Type
     *
     * @var null|array
     */
    private $ttype;

    /**
     * Selection Options (Deprecated)
     *
     * @var string
     */
    private $selection;

    /**
     * Selection Options
     *
     * @var Selection
     */
    private $selection_ids;

    /**
     * Copied
     *
     * @var bool
     */
    private $copied;

    /**
     * Related Field
     *
     * @var string
     */
    private $related;

    /**
     * Related field
     *
     * @var FieldsAlias
     */
    private $related_field_id;

    /**
     * Required
     *
     * @var bool
     */
    private $required;

    /**
     * Readonly
     *
     * @var bool
     */
    private $readonly;

    /**
     * Indexed
     *
     * @var bool
     */
    private $index;

    /**
     * Translatable
     *
     * @var bool
     */
    private $translate;

    /**
     * Size
     *
     * @var int
     */
    private $size;

    /**
     * Type
     *
     * @var null|array
     */
    private $state;

    /**
     * On Delete
     *
     * @var array
     */
    private $on_delete;

    /**
     * Domain
     *
     * @var string
     */
    private $domain;

    /**
     * Groups
     *
     * @var Groups
     */
    private $groups;

    /**
     * Selectable
     *
     * @var bool
     */
    private $selectable;

    /**
     * In Apps
     *
     * @var string
     */
    private $modules;

    /**
     * Relation Table
     *
     * @var string
     */
    private $relation_table;

    /**
     * Column 1
     *
     * @var string
     */
    private $column1;

    /**
     * Column 2
     *
     * @var string
     */
    private $column2;

    /**
     * Compute
     *
     * @var string
     */
    private $compute;

    /**
     * Dependencies
     *
     * @var string
     */
    private $depends;

    /**
     * Stored
     *
     * @var bool
     */
    private $store;

    /**
     * Enable Ordered Tracking
     *
     * @var int
     */
    private $tracking;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $relation_table
     */
    public function setRelationTable(string $relation_table): void
    {
        $this->relation_table = $relation_table;
    }

    /**
     * @param array $on_delete
     */
    public function setOnDelete(array $on_delete): void
    {
        $this->on_delete = $on_delete;
    }

    /**
     * @param array $on_delete
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOnDelete(array $on_delete, bool $strict = true): bool
    {
        return in_array($on_delete, $this->on_delete, $strict);
    }

    /**
     * @param array $on_delete
     */
    public function addOnDelete(array $on_delete): void
    {
        if ($this->hasOnDelete($on_delete)) {
            return;
        }

        $this->on_delete[] = $on_delete;
    }

    /**
     * @param array $on_delete
     */
    public function removeOnDelete(array $on_delete): void
    {
        if ($this->hasOnDelete($on_delete)) {
            $index = array_search($on_delete, $this->on_delete);
            unset($this->on_delete[$index]);
        }
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param Groups $groups
     */
    public function setGroups(Groups $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @param bool $selectable
     */
    public function setSelectable(bool $selectable): void
    {
        $this->selectable = $selectable;
    }

    /**
     * @return string
     */
    public function getModules(): string
    {
        return $this->modules;
    }

    /**
     * @param string $column1
     */
    public function setColumn1(string $column1): void
    {
        $this->column1 = $column1;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @param string $column2
     */
    public function setColumn2(string $column2): void
    {
        $this->column2 = $column2;
    }

    /**
     * @param string $compute
     */
    public function setCompute(string $compute): void
    {
        $this->compute = $compute;
    }

    /**
     * @param string $depends
     */
    public function setDepends(string $depends): void
    {
        $this->depends = $depends;
    }

    /**
     * @param bool $store
     */
    public function setStore(bool $store): void
    {
        $this->store = $store;
    }

    /**
     * @param int $tracking
     */
    public function setTracking(int $tracking): void
    {
        $this->tracking = $tracking;
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
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param bool $translate
     */
    public function setTranslate(bool $translate): void
    {
        $this->translate = $translate;
    }

    /**
     * @param string $complete_name
     */
    public function setCompleteName(string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @param ?array $ttype
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTtype(?array $ttype, bool $strict = true): bool
    {
        if (null === $this->ttype) {
            return false;
        }

        return in_array($ttype, $this->ttype, $strict);
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param string $relation
     */
    public function setRelation(string $relation): void
    {
        $this->relation = $relation;
    }

    /**
     * @param string $relation_field
     */
    public function setRelationField(string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @return FieldsAlias
     */
    public function getRelationFieldId(): FieldsAlias
    {
        return $this->relation_field_id;
    }

    /**
     * @param null|Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param null|string $field_description
     */
    public function setFieldDescription(?string $field_description): void
    {
        $this->field_description = $field_description;
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param null|array $ttype
     */
    public function setTtype(?array $ttype): void
    {
        $this->ttype = $ttype;
    }

    /**
     * @param ?array $ttype
     */
    public function addTtype(?array $ttype): void
    {
        if ($this->hasTtype($ttype)) {
            return;
        }

        if (null === $this->ttype) {
            $this->ttype = [];
        }

        $this->ttype[] = $ttype;
    }

    /**
     * @param bool $index
     */
    public function setIndex(bool $index): void
    {
        $this->index = $index;
    }

    /**
     * @param ?array $ttype
     */
    public function removeTtype(?array $ttype): void
    {
        if ($this->hasTtype($ttype)) {
            $index = array_search($ttype, $this->ttype);
            unset($this->ttype[$index]);
        }
    }

    /**
     * @param string $selection
     */
    public function setSelection(string $selection): void
    {
        $this->selection = $selection;
    }

    /**
     * @param Selection $selection_ids
     */
    public function setSelectionIds(Selection $selection_ids): void
    {
        $this->selection_ids = $selection_ids;
    }

    /**
     * @param bool $copied
     */
    public function setCopied(bool $copied): void
    {
        $this->copied = $copied;
    }

    /**
     * @param string $related
     */
    public function setRelated(string $related): void
    {
        $this->related = $related;
    }

    /**
     * @return FieldsAlias
     */
    public function getRelatedFieldId(): FieldsAlias
    {
        return $this->related_field_id;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void
    {
        $this->required = $required;
    }

    /**
     * @param bool $readonly
     */
    public function setReadonly(bool $readonly): void
    {
        $this->readonly = $readonly;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
