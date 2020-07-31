<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.actions.client
 * ---
 * Name : ir.actions.client
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
final class Client extends Base
{
    /**
     * Action Name
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
     * Client action tag
     * ---
     * An arbitrary string, interpreted by the client according to its own needs and wishes. There is no central tag
     * repository across clients.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $tag;

    /**
     * Target Window
     * ---
     * Selection :
     *     -> current (Current Window)
     *     -> new (New Window)
     *     -> fullscreen (Full Screen)
     *     -> main (Main action of Current Window)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $target;

    /**
     * Destination Model
     * ---
     * Optional model, mostly used for needactions.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Context Value
     * ---
     * Context dictionary as Python expression, empty by default (Default: {})
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $context;

    /**
     * Supplementary arguments
     * ---
     * Arguments sent to the client along with the view tag
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $params;

    /**
     * Params storage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $params_store;

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
     * Selection :
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
     * @param string $name Action Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Action Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $tag Client action tag
     *        ---
     *        An arbitrary string, interpreted by the client according to its own needs and wishes. There is no central tag
     *        repository across clients.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $context Context Value
     *        ---
     *        Context dictionary as Python expression, empty by default (Default: {})
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $binding_type Binding Type
     *        ---
     *        Selection :
     *            -> action (Action)
     *            -> report (Report)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $type,
        string $tag,
        string $context,
        string $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->tag = $tag;
        $this->context = $context;
        $this->binding_type = $binding_type;
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
     * @return OdooRelation|null
     *
     * @SerializedName("binding_model_id")
     */
    public function getBindingModelId(): ?OdooRelation
    {
        return $this->binding_model_id;
    }

    /**
     * @param OdooRelation|null $binding_model_id
     */
    public function setBindingModelId(?OdooRelation $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
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
     * @param string $binding_type
     */
    public function setBindingType(string $binding_type): void
    {
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
     * @param string|null $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param string|null $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param string|null $xml_id
     */
    public function setXmlId(?string $xml_id): void
    {
        $this->xml_id = $xml_id;
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
     * @param string|null $target
     */
    public function setTarget(?string $target): void
    {
        $this->target = $target;
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
     * @SerializedName("type")
     */
    public function getType(): string
    {
        return $this->type;
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
     * @SerializedName("tag")
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return string|null
     *
     * @SerializedName("target")
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
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
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return string
     *
     * @SerializedName("context")
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return string|null
     *
     * @SerializedName("params")
     */
    public function getParams(): ?string
    {
        return $this->params;
    }

    /**
     * @param string|null $params
     */
    public function setParams(?string $params): void
    {
        $this->params = $params;
    }

    /**
     * @return string|null
     *
     * @SerializedName("params_store")
     */
    public function getParamsStore(): ?string
    {
        return $this->params_store;
    }

    /**
     * @param string|null $params_store
     */
    public function setParamsStore(?string $params_store): void
    {
        $this->params_store = $params_store;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.actions.client';
    }
}
