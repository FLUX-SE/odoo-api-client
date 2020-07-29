<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.model.constraint
 * ---
 * Name : ir.model.constraint
 * ---
 * Info :
 * This model tracks PostgreSQL foreign keys and constraints used by Odoo
 *         models.
 */
final class Constraint extends Base
{
    /**
     * Constraint
     * ---
     * PostgreSQL constraint or foreign key name.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Definition
     * ---
     * PostgreSQL constraint definition
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $definition;

    /**
     * Message
     * ---
     * Error message returned when the constraint is violated.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $message;

    /**
     * Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model;

    /**
     * Module
     * ---
     * Relation : many2one (ir.module.module)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $module;

    /**
     * Constraint Type
     * ---
     * Type of the constraint: `f` for a foreign key, `u` for other constraints.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * Write Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * Create Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

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
     * @param string $name Constraint
     *        ---
     *        PostgreSQL constraint or foreign key name.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model Model
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $module Module
     *        ---
     *        Relation : many2one (ir.module.module)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Module\Module
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Constraint Type
     *        ---
     *        Type of the constraint: `f` for a foreign key, `u` for other constraints.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $model, OdooRelation $module, string $type)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
        $this->type = $type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return string
     *
     * @SerializedName("type")
     */
    public function getType(): string
    {
        return $this->type;
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
     * @param OdooRelation $module
     */
    public function setModule(OdooRelation $module): void
    {
        $this->module = $module;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("module")
     */
    public function getModule(): OdooRelation
    {
        return $this->module;
    }

    /**
     * @param OdooRelation $model
     */
    public function setModel(OdooRelation $model): void
    {
        $this->model = $model;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model")
     */
    public function getModel(): OdooRelation
    {
        return $this->model;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message")
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $definition
     */
    public function setDefinition(?string $definition): void
    {
        $this->definition = $definition;
    }

    /**
     * @return string|null
     *
     * @SerializedName("definition")
     */
    public function getDefinition(): ?string
    {
        return $this->definition;
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
     */
    public static function getOdooModelName(): string
    {
        return 'ir.model.constraint';
    }
}
