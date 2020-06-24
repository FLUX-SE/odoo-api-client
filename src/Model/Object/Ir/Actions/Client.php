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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Action Type
     *
     * @var null|string
     */
    private $type;

    /**
     * Client action tag
     *
     * @var null|string
     */
    private $tag;

    /**
     * Target Window
     *
     * @var array
     */
    private $target;

    /**
     * Destination Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Context Value
     *
     * @var null|string
     */
    private $context;

    /**
     * Supplementary arguments
     *
     * @var int
     */
    private $params;

    /**
     * Params storage
     *
     * @var int
     */
    private $params_store;

    /**
     * External ID
     *
     * @var string
     */
    private $xml_id;

    /**
     * Action Description
     *
     * @var string
     */
    private $help;

    /**
     * Binding Model
     *
     * @var Model
     */
    private $binding_model_id;

    /**
     * Binding Type
     *
     * @var null|array
     */
    private $binding_type;

    /**
     * Binding View Types
     *
     * @var string
     */
    private $binding_view_types;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getHelp(): string
    {
        return $this->help;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
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
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getBindingViewTypes(): string
    {
        return $this->binding_view_types;
    }

    /**
     * @return null|array
     */
    public function getBindingType(): ?array
    {
        return $this->binding_type;
    }

    /**
     * @return Model
     */
    public function getBindingModelId(): Model
    {
        return $this->binding_model_id;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getParamsStore(): int
    {
        return $this->params_store;
    }

    /**
     * @return int
     */
    public function getParams(): int
    {
        return $this->params;
    }

    /**
     * @return null|string
     */
    public function getContext(): ?string
    {
        return $this->context;
    }

    /**
     * @return string
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @return array
     */
    public function getTarget(): array
    {
        return $this->target;
    }

    /**
     * @return null|string
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
