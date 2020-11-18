<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.model.fields
 * ---
 * Name : ir.model.fields
 * ---
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class Fields extends Base
{
    /**
     * Field Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Complete Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Object Name
     * ---
     * The technical name of the model this field belongs to
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Object Relation
     * ---
     * For relationship fields, the technical name of the target model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $relation;

    /**
     * Relation Field
     * ---
     * For one2many fields, the field on the target model that implement the opposite many2one relationship
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $relation_field;

    /**
     * Relation field
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $relation_field_id;

    /**
     * Model
     * ---
     * The model this field belongs to
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Field Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $field_description;

    /**
     * Field Help
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $help;

    /**
     * Field Type
     * ---
     * Selection :
     *     -> binary (binary)
     *     -> boolean (boolean)
     *     -> char (char)
     *     -> date (date)
     *     -> datetime (datetime)
     *     -> float (float)
     *     -> html (html)
     *     -> integer (integer)
     *     -> many2many (many2many)
     *     -> many2one (many2one)
     *     -> many2one_reference (many2one_reference)
     *     -> monetary (monetary)
     *     -> one2many (one2many)
     *     -> reference (reference)
     *     -> selection (selection)
     *     -> text (text)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $ttype;

    /**
     * Selection Options (Deprecated)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $selection;

    /**
     * Selection Options
     * ---
     * Relation : one2many (ir.model.fields.selection -> field_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields\Selection
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $selection_ids;

    /**
     * Copied
     * ---
     * Whether the value is copied when duplicating a record.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $copied;

    /**
     * Related Field
     * ---
     * The corresponding related field, if any. This must be a dot-separated list of field names.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $related;

    /**
     * Related field
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $related_field_id;

    /**
     * Required
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $required;

    /**
     * Readonly
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $readonly;

    /**
     * Indexed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $index;

    /**
     * Translatable
     * ---
     * Whether values for this field can be translated (enables the translation mechanism for that field)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $translate;

    /**
     * Size
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $size;

    /**
     * Type
     * ---
     * Selection :
     *     -> manual (Custom Field)
     *     -> base (Base Field)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * On Delete
     * ---
     * On delete property for many2one fields
     * ---
     * Selection :
     *     -> cascade (Cascade)
     *     -> set null (Set NULL)
     *     -> restrict (Restrict)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $on_delete;

    /**
     * Domain
     * ---
     * The optional domain to restrict possible values for relationship fields, specified as a Python expression
     * defining a list of triplets. For example: [('color','=','red')]
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain;

    /**
     * Groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups;

    /**
     * Selectable
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $selectable;

    /**
     * In Apps
     * ---
     * List of modules in which the field is defined
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $modules;

    /**
     * Relation Table
     * ---
     * Used for custom many2many fields to define a custom relation table name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $relation_table;

    /**
     * Column 1
     * ---
     * Column referring to the record in the model table
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $column1;

    /**
     * Column 2
     * ---
     * Column referring to the record in the comodel table
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $column2;

    /**
     * Compute
     * ---
     * Code to compute the value of the field.
     * Iterate on the recordset 'self' and assign the field's value:
     *
     *         for record in self:
     *                 record['size'] = len(record.name)
     *
     * Modules time, datetime, dateutil are available.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $compute;

    /**
     * Dependencies
     * ---
     * Dependencies of compute method; a list of comma-separated field names, like
     *
     *         name, partner_id.name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $depends;

    /**
     * Stored
     * ---
     * Whether the value is stored in the database.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $store;

    /**
     * Enable Ordered Tracking
     * ---
     * If set every modification done to this field is tracked in the chatter. Value is used to order tracking
     * values.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $tracking;

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
     * @param string $name Field Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $model Object Name
     *        ---
     *        The technical name of the model this field belongs to
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        ---
     *        The model this field belongs to
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $field_description Field Label
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $ttype Field Type
     *        ---
     *        Selection :
     *            -> binary (binary)
     *            -> boolean (boolean)
     *            -> char (char)
     *            -> date (date)
     *            -> datetime (datetime)
     *            -> float (float)
     *            -> html (html)
     *            -> integer (integer)
     *            -> many2many (many2many)
     *            -> many2one (many2one)
     *            -> many2one_reference (many2one_reference)
     *            -> monetary (monetary)
     *            -> one2many (one2many)
     *            -> reference (reference)
     *            -> selection (selection)
     *            -> text (text)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Type
     *        ---
     *        Selection :
     *            -> manual (Custom Field)
     *            -> base (Base Field)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $model,
        OdooRelation $model_id,
        string $field_description,
        string $ttype,
        string $state
    ) {
        $this->name = $name;
        $this->model = $model;
        $this->model_id = $model_id;
        $this->field_description = $field_description;
        $this->ttype = $ttype;
        $this->state = $state;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroups(OdooRelation $item): bool
    {
        if (null === $this->groups) {
            return false;
        }

        return in_array($item, $this->groups);
    }

    /**
     * @return string|null
     *
     * @SerializedName("relation_table")
     */
    public function getRelationTable(): ?string
    {
        return $this->relation_table;
    }

    /**
     * @param string|null $modules
     */
    public function setModules(?string $modules): void
    {
        $this->modules = $modules;
    }

    /**
     * @return string|null
     *
     * @SerializedName("modules")
     */
    public function getModules(): ?string
    {
        return $this->modules;
    }

    /**
     * @param bool|null $selectable
     */
    public function setSelectable(?bool $selectable): void
    {
        $this->selectable = $selectable;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("selectable")
     */
    public function isSelectable(): ?bool
    {
        return $this->selectable;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroups(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addGroups(OdooRelation $item): void
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
     * @param OdooRelation[]|null $groups
     */
    public function setGroups(?array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @return string|null
     *
     * @SerializedName("column1")
     */
    public function getColumn1(): ?string
    {
        return $this->column1;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups")
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("domain")
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param string|null $on_delete
     */
    public function setOnDelete(?string $on_delete): void
    {
        $this->on_delete = $on_delete;
    }

    /**
     * @return string|null
     *
     * @SerializedName("on_delete")
     */
    public function getOnDelete(): ?string
    {
        return $this->on_delete;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string|null $relation_table
     */
    public function setRelationTable(?string $relation_table): void
    {
        $this->relation_table = $relation_table;
    }

    /**
     * @param string|null $column1
     */
    public function setColumn1(?string $column1): void
    {
        $this->column1 = $column1;
    }

    /**
     * @return int|null
     *
     * @SerializedName("size")
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param int|null $tracking
     */
    public function setTracking(?int $tracking): void
    {
        $this->tracking = $tracking;
    }

    /**
     * @return string|null
     *
     * @SerializedName("column2")
     */
    public function getColumn2(): ?string
    {
        return $this->column2;
    }

    /**
     * @return int|null
     *
     * @SerializedName("tracking")
     */
    public function getTracking(): ?int
    {
        return $this->tracking;
    }

    /**
     * @param bool|null $store
     */
    public function setStore(?bool $store): void
    {
        $this->store = $store;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("store")
     */
    public function isStore(): ?bool
    {
        return $this->store;
    }

    /**
     * @param string|null $depends
     */
    public function setDepends(?string $depends): void
    {
        $this->depends = $depends;
    }

    /**
     * @return string|null
     *
     * @SerializedName("depends")
     */
    public function getDepends(): ?string
    {
        return $this->depends;
    }

    /**
     * @param string|null $compute
     */
    public function setCompute(?string $compute): void
    {
        $this->compute = $compute;
    }

    /**
     * @return string|null
     *
     * @SerializedName("compute")
     */
    public function getCompute(): ?string
    {
        return $this->compute;
    }

    /**
     * @param string|null $column2
     */
    public function setColumn2(?string $column2): void
    {
        $this->column2 = $column2;
    }

    /**
     * @param int|null $size
     */
    public function setSize(?int $size): void
    {
        $this->size = $size;
    }

    /**
     * @param bool|null $translate
     */
    public function setTranslate(?bool $translate): void
    {
        $this->translate = $translate;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("relation_field_id")
     */
    public function getRelationFieldId(): ?OdooRelation
    {
        return $this->relation_field_id;
    }

    /**
     * @param string|null $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return string|null
     *
     * @SerializedName("help")
     */
    public function getHelp(): ?string
    {
        return $this->help;
    }

    /**
     * @param string $field_description
     */
    public function setFieldDescription(string $field_description): void
    {
        $this->field_description = $field_description;
    }

    /**
     * @return string
     *
     * @SerializedName("field_description")
     */
    public function getFieldDescription(): string
    {
        return $this->field_description;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param OdooRelation|null $relation_field_id
     */
    public function setRelationFieldId(?OdooRelation $relation_field_id): void
    {
        $this->relation_field_id = $relation_field_id;
    }

    /**
     * @param string|null $relation_field
     */
    public function setRelationField(?string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @param string $ttype
     */
    public function setTtype(string $ttype): void
    {
        $this->ttype = $ttype;
    }

    /**
     * @return string|null
     *
     * @SerializedName("relation_field")
     */
    public function getRelationField(): ?string
    {
        return $this->relation_field;
    }

    /**
     * @param string|null $relation
     */
    public function setRelation(?string $relation): void
    {
        $this->relation = $relation;
    }

    /**
     * @return string|null
     *
     * @SerializedName("relation")
     */
    public function getRelation(): ?string
    {
        return $this->relation;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     *
     * @SerializedName("model")
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("complete_name")
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     *
     * @SerializedName("ttype")
     */
    public function getTtype(): string
    {
        return $this->ttype;
    }

    /**
     * @return string|null
     *
     * @SerializedName("selection")
     */
    public function getSelection(): ?string
    {
        return $this->selection;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("translate")
     */
    public function isTranslate(): ?bool
    {
        return $this->translate;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("related_field_id")
     */
    public function getRelatedFieldId(): ?OdooRelation
    {
        return $this->related_field_id;
    }

    /**
     * @param bool|null $index
     */
    public function setIndex(?bool $index): void
    {
        $this->index = $index;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("index")
     */
    public function isIndex(): ?bool
    {
        return $this->index;
    }

    /**
     * @param bool|null $readonly
     */
    public function setReadonly(?bool $readonly): void
    {
        $this->readonly = $readonly;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("readonly")
     */
    public function isReadonly(): ?bool
    {
        return $this->readonly;
    }

    /**
     * @param bool|null $required
     */
    public function setRequired(?bool $required): void
    {
        $this->required = $required;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("required")
     */
    public function isRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * @param OdooRelation|null $related_field_id
     */
    public function setRelatedFieldId(?OdooRelation $related_field_id): void
    {
        $this->related_field_id = $related_field_id;
    }

    /**
     * @param string|null $related
     */
    public function setRelated(?string $related): void
    {
        $this->related = $related;
    }

    /**
     * @param string|null $selection
     */
    public function setSelection(?string $selection): void
    {
        $this->selection = $selection;
    }

    /**
     * @return string|null
     *
     * @SerializedName("related")
     */
    public function getRelated(): ?string
    {
        return $this->related;
    }

    /**
     * @param bool|null $copied
     */
    public function setCopied(?bool $copied): void
    {
        $this->copied = $copied;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("copied")
     */
    public function isCopied(): ?bool
    {
        return $this->copied;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSelectionIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addSelectionIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSelectionIds(OdooRelation $item): bool
    {
        if (null === $this->selection_ids) {
            return false;
        }

        return in_array($item, $this->selection_ids);
    }

    /**
     * @param OdooRelation[]|null $selection_ids
     */
    public function setSelectionIds(?array $selection_ids): void
    {
        $this->selection_ids = $selection_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("selection_ids")
     */
    public function getSelectionIds(): ?array
    {
        return $this->selection_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.model.fields';
    }
}
