<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.property
 * ---
 * Name : ir.property
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
final class Property extends Base
{
    /**
     * Name
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
     * If not set, acts as a default value for new resources
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
    private $fields_id;

    /**
     * Value Float
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $value_float;

    /**
     * Value Integer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $value_integer;

    /**
     * Value Text
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $value_text;

    /**
     * Value Binary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $value_binary;

    /**
     * Value Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $value_reference;

    /**
     * Value Datetime
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $value_datetime;

    /**
     * Type
     * ---
     * Selection :
     *     -> char (Char)
     *     -> float (Float)
     *     -> boolean (Boolean)
     *     -> integer (Integer)
     *     -> text (Text)
     *     -> binary (Binary)
     *     -> many2one (Many2One)
     *     -> date (Date)
     *     -> datetime (DateTime)
     *     -> selection (Selection)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

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
     * @param OdooRelation $fields_id Field
     *        ---
     *        Relation : many2one (ir.model.fields)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        Selection :
     *            -> char (Char)
     *            -> float (Float)
     *            -> boolean (Boolean)
     *            -> integer (Integer)
     *            -> text (Text)
     *            -> binary (Binary)
     *            -> many2one (Many2One)
     *            -> date (Date)
     *            -> datetime (DateTime)
     *            -> selection (Selection)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $fields_id, string $type)
    {
        $this->fields_id = $fields_id;
        $this->type = $type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("value_reference")
     */
    public function getValueReference(): ?string
    {
        return $this->value_reference;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
     * @param DateTimeInterface|null $value_datetime
     */
    public function setValueDatetime(?DateTimeInterface $value_datetime): void
    {
        $this->value_datetime = $value_datetime;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("value_datetime")
     */
    public function getValueDatetime(): ?DateTimeInterface
    {
        return $this->value_datetime;
    }

    /**
     * @param string|null $value_reference
     */
    public function setValueReference(?string $value_reference): void
    {
        $this->value_reference = $value_reference;
    }

    /**
     * @param mixed|null $value_binary
     */
    public function setValueBinary($value_binary): void
    {
        $this->value_binary = $value_binary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("value_binary")
     */
    public function getValueBinary()
    {
        return $this->value_binary;
    }

    /**
     * @param string|null $value_text
     */
    public function setValueText(?string $value_text): void
    {
        $this->value_text = $value_text;
    }

    /**
     * @return string|null
     *
     * @SerializedName("value_text")
     */
    public function getValueText(): ?string
    {
        return $this->value_text;
    }

    /**
     * @param int|null $value_integer
     */
    public function setValueInteger(?int $value_integer): void
    {
        $this->value_integer = $value_integer;
    }

    /**
     * @return int|null
     *
     * @SerializedName("value_integer")
     */
    public function getValueInteger(): ?int
    {
        return $this->value_integer;
    }

    /**
     * @param float|null $value_float
     */
    public function setValueFloat(?float $value_float): void
    {
        $this->value_float = $value_float;
    }

    /**
     * @return float|null
     *
     * @SerializedName("value_float")
     */
    public function getValueFloat(): ?float
    {
        return $this->value_float;
    }

    /**
     * @param OdooRelation $fields_id
     */
    public function setFieldsId(OdooRelation $fields_id): void
    {
        $this->fields_id = $fields_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("fields_id")
     */
    public function getFieldsId(): OdooRelation
    {
        return $this->fields_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $res_id
     */
    public function setResId(?string $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?string
    {
        return $this->res_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.property';
    }
}
