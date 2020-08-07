<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Server\Object_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.server.object.lines
 * ---
 * Name : ir.server.object.lines
 * ---
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
final class Lines extends Base
{
    /**
     * Related Server Action
     * ---
     * Relation : many2one (ir.actions.server)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Server
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $server_id;

    /**
     * Field
     * ---
     * Relation : many2one (ir.model.fields)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $col1;

    /**
     * Value
     * ---
     * Expression containing a value specification.
     * When Formula type is selected, this field may be a Python expression  that can use the same values as for the
     * code field on the server action.
     * If Value type is selected, the value will be used directly without evaluation.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $value;

    /**
     * Evaluation Type
     * ---
     * Selection :
     *     -> value (Value)
     *     -> reference (Reference)
     *     -> equation (Python expression)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $evaluation_type;

    /**
     * Record
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $resource_ref;

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
     * @param OdooRelation $col1 Field
     *        ---
     *        Relation : many2one (ir.model.fields)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $value Value
     *        ---
     *        Expression containing a value specification.
     *        When Formula type is selected, this field may be a Python expression  that can use the same values as for the
     *        code field on the server action.
     *        If Value type is selected, the value will be used directly without evaluation.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $evaluation_type Evaluation Type
     *        ---
     *        Selection :
     *            -> value (Value)
     *            -> reference (Reference)
     *            -> equation (Python expression)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $col1, string $value, string $evaluation_type)
    {
        $this->col1 = $col1;
        $this->value = $value;
        $this->evaluation_type = $evaluation_type;
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
     * @param mixed|null $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("server_id")
     */
    public function getServerId(): ?OdooRelation
    {
        return $this->server_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("resource_ref")
     */
    public function getResourceRef()
    {
        return $this->resource_ref;
    }

    /**
     * @param string $evaluation_type
     */
    public function setEvaluationType(string $evaluation_type): void
    {
        $this->evaluation_type = $evaluation_type;
    }

    /**
     * @return string
     *
     * @SerializedName("evaluation_type")
     */
    public function getEvaluationType(): string
    {
        return $this->evaluation_type;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     *
     * @SerializedName("value")
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param OdooRelation $col1
     */
    public function setCol1(OdooRelation $col1): void
    {
        $this->col1 = $col1;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("col1")
     */
    public function getCol1(): OdooRelation
    {
        return $this->col1;
    }

    /**
     * @param OdooRelation|null $server_id
     */
    public function setServerId(?OdooRelation $server_id): void
    {
        $this->server_id = $server_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.server.object.lines';
    }
}
