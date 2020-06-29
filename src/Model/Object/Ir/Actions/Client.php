<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.client
 * Name : ir.actions.client
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
final class Client extends Base
{
    /**
     * Action Name
     *
     * @var string
     */
    private $name;

    /**
     * Action Type
     *
     * @var string
     */
    private $type;

    /**
     * Client action tag
     * An arbitrary string, interpreted by the client according to its own needs and wishes. There is no central tag
     * repository across clients.
     *
     * @var string
     */
    private $tag;

    /**
     * Target Window
     *
     * @var null|array
     */
    private $target;

    /**
     * Destination Model
     * Optional model, mostly used for needactions.
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Context Value
     * Context dictionary as Python expression, empty by default (Default: {})
     *
     * @var string
     */
    private $context;

    /**
     * Supplementary arguments
     * Arguments sent to the client along with the view tag
     *
     * @var null|int
     */
    private $params;

    /**
     * Params storage
     *
     * @var null|int
     */
    private $params_store;

    /**
     * External ID
     *
     * @var null|string
     */
    private $xml_id;

    /**
     * Action Description
     * Optional help text for the users with a description of the target view, such as its usage and purpose.
     *
     * @var null|string
     */
    private $help;

    /**
     * Binding Model
     * Setting a value makes this action available in the sidebar for the given model.
     *
     * @var null|Model
     */
    private $binding_model_id;

    /**
     * Binding Type
     *
     * @var array
     */
    private $binding_type;

    /**
     * Binding View Types
     *
     * @var null|string
     */
    private $binding_view_types;

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
     * @param string $name Action Name
     * @param string $type Action Type
     * @param string $tag Client action tag
     *        An arbitrary string, interpreted by the client according to its own needs and wishes. There is no central tag
     *        repository across clients.
     * @param string $context Context Value
     *        Context dictionary as Python expression, empty by default (Default: {})
     * @param array $binding_type Binding Type
     */
    public function __construct(
        string $name,
        string $type,
        string $tag,
        string $context,
        array $binding_type
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->tag = $tag;
        $this->context = $context;
        $this->binding_type = $binding_type;
    }

    /**
     * @return null|string
     */
    public function getHelp(): ?string
    {
        return $this->help;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|string
     */
    public function getBindingViewTypes(): ?string
    {
        return $this->binding_view_types;
    }

    /**
     * @return array
     */
    public function getBindingType(): array
    {
        return $this->binding_type;
    }

    /**
     * @return null|Model
     */
    public function getBindingModelId(): ?Model
    {
        return $this->binding_model_id;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|int
     */
    public function getParamsStore(): ?int
    {
        return $this->params_store;
    }

    /**
     * @return null|int
     */
    public function getParams(): ?int
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @return null|string
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @return null|array
     */
    public function getTarget(): ?array
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
