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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Complete Name
     *
     * @var null|string
     */
    private $complete_name;

    /**
     * Object Name
     * The technical name of the model this field belongs to
     *
     * @var string
     */
    private $model;

    /**
     * Object Relation
     * For relationship fields, the technical name of the target model
     *
     * @var null|string
     */
    private $relation;

    /**
     * Relation Field
     * For one2many fields, the field on the target model that implement the opposite many2one relationship
     *
     * @var null|string
     */
    private $relation_field;

    /**
     * Relation field
     *
     * @var null|FieldsAlias
     */
    private $relation_field_id;

    /**
     * Model
     * The model this field belongs to
     *
     * @var Model
     */
    private $model_id;

    /**
     * Field Label
     *
     * @var string
     */
    private $field_description;

    /**
     * Field Help
     *
     * @var null|string
     */
    private $help;

    /**
     * Field Type
     *
     * @var array
     */
    private $ttype;

    /**
     * Selection Options (Deprecated)
     *
     * @var null|string
     */
    private $selection;

    /**
     * Selection Options
     *
     * @var null|Selection[]
     */
    private $selection_ids;

    /**
     * Copied
     * Whether the value is copied when duplicating a record.
     *
     * @var null|bool
     */
    private $copied;

    /**
     * Related Field
     * The corresponding related field, if any. This must be a dot-separated list of field names.
     *
     * @var null|string
     */
    private $related;

    /**
     * Related field
     *
     * @var null|FieldsAlias
     */
    private $related_field_id;

    /**
     * Required
     *
     * @var null|bool
     */
    private $required;

    /**
     * Readonly
     *
     * @var null|bool
     */
    private $readonly;

    /**
     * Indexed
     *
     * @var null|bool
     */
    private $index;

    /**
     * Translatable
     * Whether values for this field can be translated (enables the translation mechanism for that field)
     *
     * @var null|bool
     */
    private $translate;

    /**
     * Size
     *
     * @var null|int
     */
    private $size;

    /**
     * Type
     *
     * @var array
     */
    private $state;

    /**
     * On Delete
     * On delete property for many2one fields
     *
     * @var null|array
     */
    private $on_delete;

    /**
     * Domain
     * The optional domain to restrict possible values for relationship fields, specified as a Python expression
     * defining a list of triplets. For example: [('color','=','red')]
     *
     * @var null|string
     */
    private $domain;

    /**
     * Groups
     *
     * @var null|Groups[]
     */
    private $groups;

    /**
     * Selectable
     *
     * @var null|bool
     */
    private $selectable;

    /**
     * In Apps
     * List of modules in which the field is defined
     *
     * @var null|string
     */
    private $modules;

    /**
     * Relation Table
     * Used for custom many2many fields to define a custom relation table name
     *
     * @var null|string
     */
    private $relation_table;

    /**
     * Column 1
     * Column referring to the record in the model table
     *
     * @var null|string
     */
    private $column1;

    /**
     * Column 2
     * Column referring to the record in the comodel table
     *
     * @var null|string
     */
    private $column2;

    /**
     * Compute
     * Code to compute the value of the field.
     * Iterate on the recordset 'self' and assign the field's value:
     *
     * for record in self:
     * record['size'] = len(record.name)
     *
     * Modules time, datetime, dateutil are available.
     *
     * @var null|string
     */
    private $compute;

    /**
     * Dependencies
     * Dependencies of compute method; a list of comma-separated field names, like
     *
     * name, partner_id.name
     *
     * @var null|string
     */
    private $depends;

    /**
     * Stored
     * Whether the value is stored in the database.
     *
     * @var null|bool
     */
    private $store;

    /**
     * Enable Ordered Tracking
     * If set every modification done to this field is tracked in the chatter. Value is used to order tracking
     * values.
     *
     * @var null|int
     */
    private $tracking;

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
     * @param string $name Field Name
     * @param string $model Object Name
     *        The technical name of the model this field belongs to
     * @param Model $model_id Model
     *        The model this field belongs to
     * @param string $field_description Field Label
     * @param array $ttype Field Type
     * @param array $state Type
     */
    public function __construct(
        string $name,
        string $model,
        Model $model_id,
        string $field_description,
        array $ttype,
        array $state
    ) {
        $this->name = $name;
        $this->model = $model;
        $this->model_id = $model_id;
        $this->field_description = $field_description;
        $this->ttype = $ttype;
        $this->state = $state;
    }

    /**
     * @param null|bool $selectable
     */
    public function setSelectable(?bool $selectable): void
    {
        $this->selectable = $selectable;
    }

    /**
     * @param null|array $on_delete
     */
    public function setOnDelete(?array $on_delete): void
    {
        $this->on_delete = $on_delete;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOnDelete($item, bool $strict = true): bool
    {
        if (null === $this->on_delete) {
            return false;
        }

        return in_array($item, $this->on_delete, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addOnDelete($item): void
    {
        if ($this->hasOnDelete($item)) {
            return;
        }

        if (null === $this->on_delete) {
            $this->on_delete = [];
        }

        $this->on_delete[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeOnDelete($item): void
    {
        if (null === $this->on_delete) {
            $this->on_delete = [];
        }

        if ($this->hasOnDelete($item)) {
            $index = array_search($item, $this->on_delete);
            unset($this->on_delete[$index]);
        }
    }

    /**
     * @param null|string $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @param null|Groups[] $groups
     */
    public function setGroups(?array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroups(Groups $item, bool $strict = true): bool
    {
        if (null === $this->groups) {
            return false;
        }

        return in_array($item, $this->groups, $strict);
    }

    /**
     * @param Groups $item
     */
    public function addGroups(Groups $item): void
    {
        if ($this->hasGroups($item)) {
            return;
        }

        if (null === $this->groups) {
            $this->groups = [];
        }

        $this->groups[] = $item;
    }

    /**
     * @param Groups $item
     */
    public function removeGroups(Groups $item): void
    {
        if (null === $this->groups) {
            $this->groups = [];
        }

        if ($this->hasGroups($item)) {
            $index = array_search($item, $this->groups);
            unset($this->groups[$index]);
        }
    }

    /**
     * @return null|string
     */
    public function getModules(): ?string
    {
        return $this->modules;
    }

    /**
     * @param null|int $size
     */
    public function setSize(?int $size): void
    {
        $this->size = $size;
    }

    /**
     * @param null|string $relation_table
     */
    public function setRelationTable(?string $relation_table): void
    {
        $this->relation_table = $relation_table;
    }

    /**
     * @param null|string $column1
     */
    public function setColumn1(?string $column1): void
    {
        $this->column1 = $column1;
    }

    /**
     * @param null|string $column2
     */
    public function setColumn2(?string $column2): void
    {
        $this->column2 = $column2;
    }

    /**
     * @param null|string $compute
     */
    public function setCompute(?string $compute): void
    {
        $this->compute = $compute;
    }

    /**
     * @param null|string $depends
     */
    public function setDepends(?string $depends): void
    {
        $this->depends = $depends;
    }

    /**
     * @param null|bool $store
     */
    public function setStore(?bool $store): void
    {
        $this->store = $store;
    }

    /**
     * @param null|int $tracking
     */
    public function setTracking(?int $tracking): void
    {
        $this->tracking = $tracking;
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
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param null|bool $translate
     */
    public function setTranslate(?bool $translate): void
    {
        $this->translate = $translate;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     */
    public function addTtype($item): void
    {
        if ($this->hasTtype($item)) {
            return;
        }

        $this->ttype[] = $item;
    }

    /**
     * @param null|string $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param null|string $relation
     */
    public function setRelation(?string $relation): void
    {
        $this->relation = $relation;
    }

    /**
     * @param null|string $relation_field
     */
    public function setRelationField(?string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @return null|FieldsAlias
     */
    public function getRelationFieldId(): ?FieldsAlias
    {
        return $this->relation_field_id;
    }

    /**
     * @param Model $model_id
     */
    public function setModelId(Model $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @param string $field_description
     */
    public function setFieldDescription(string $field_description): void
    {
        $this->field_description = $field_description;
    }

    /**
     * @param null|string $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param array $ttype
     */
    public function setTtype(array $ttype): void
    {
        $this->ttype = $ttype;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTtype($item, bool $strict = true): bool
    {
        return in_array($item, $this->ttype, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeTtype($item): void
    {
        if ($this->hasTtype($item)) {
            $index = array_search($item, $this->ttype);
            unset($this->ttype[$index]);
        }
    }

    /**
     * @param null|bool $index
     */
    public function setIndex(?bool $index): void
    {
        $this->index = $index;
    }

    /**
     * @param null|string $selection
     */
    public function setSelection(?string $selection): void
    {
        $this->selection = $selection;
    }

    /**
     * @param null|Selection[] $selection_ids
     */
    public function setSelectionIds(?array $selection_ids): void
    {
        $this->selection_ids = $selection_ids;
    }

    /**
     * @param Selection $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelectionIds(Selection $item, bool $strict = true): bool
    {
        if (null === $this->selection_ids) {
            return false;
        }

        return in_array($item, $this->selection_ids, $strict);
    }

    /**
     * @param Selection $item
     */
    public function addSelectionIds(Selection $item): void
    {
        if ($this->hasSelectionIds($item)) {
            return;
        }

        if (null === $this->selection_ids) {
            $this->selection_ids = [];
        }

        $this->selection_ids[] = $item;
    }

    /**
     * @param Selection $item
     */
    public function removeSelectionIds(Selection $item): void
    {
        if (null === $this->selection_ids) {
            $this->selection_ids = [];
        }

        if ($this->hasSelectionIds($item)) {
            $index = array_search($item, $this->selection_ids);
            unset($this->selection_ids[$index]);
        }
    }

    /**
     * @param null|bool $copied
     */
    public function setCopied(?bool $copied): void
    {
        $this->copied = $copied;
    }

    /**
     * @param null|string $related
     */
    public function setRelated(?string $related): void
    {
        $this->related = $related;
    }

    /**
     * @return null|FieldsAlias
     */
    public function getRelatedFieldId(): ?FieldsAlias
    {
        return $this->related_field_id;
    }

    /**
     * @param null|bool $required
     */
    public function setRequired(?bool $required): void
    {
        $this->required = $required;
    }

    /**
     * @param null|bool $readonly
     */
    public function setReadonly(?bool $readonly): void
    {
        $this->readonly = $readonly;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
