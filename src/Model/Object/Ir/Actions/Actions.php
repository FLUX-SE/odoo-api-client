<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.actions.actions
 * ---
 * Name : ir.actions.actions
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
final class Actions extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Action Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

    /**
     * External ID
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $xml_id;

    /**
     * Action Description
     * ---
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $help;

    /**
     * Binding Model
     * ---
     * Setting a value makes this action available in the sidebar for the given model.
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $binding_model_id;

    /**
     * Binding Type
     * ---
     * Selection : (default value, usually null)
     *     -> action (Action)
     *     -> report (Report)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $binding_type;

    /**
     * Binding View Types
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $binding_view_types;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $binding_type Binding Type
     *        ---
     *        Selection : (default value, usually null)
     *            -> action (Action)
     *            -> report (Report)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $type, string $binding_type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->binding_type = $binding_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("binding_view_types")
     */
    public function getBindingViewTypes(): ?string
    {
        return $this->binding_view_types;
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
     * @param string|null $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param string $binding_type
     */
    public function setBindingType(string $binding_type): void
    {
        $this->binding_type = $binding_type;
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
     * @return string
     *
     * @SerializedName("binding_type")
     */
    public function getBindingType(): string
    {
        return $this->binding_type;
    }

    /**
     * @param OdooRelation|null $binding_model_id
     */
    public function setBindingModelId(?OdooRelation $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("binding_model_id")
     */
    public function getBindingModelId(): ?OdooRelation
    {
        return $this->binding_model_id;
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
     * @param string|null $xml_id
     */
    public function setXmlId(?string $xml_id): void
    {
        $this->xml_id = $xml_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("xml_id")
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
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
        return 'ir.actions.actions';
    }
}
