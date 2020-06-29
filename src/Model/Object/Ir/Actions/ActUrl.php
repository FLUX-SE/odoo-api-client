<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.act_url
 * Name : ir.actions.act_url
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
final class ActUrl extends Base
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
     * Action URL
     *
     * @var string
     */
    private $url;

    /**
     * Action Target
     *
     * @var array
     */
    private $target;

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
     * @param string $url Action URL
     * @param array $target Action Target
     * @param array $binding_type Binding Type
     */
    public function __construct(string $name, string $type, string $url, array $target, array $binding_type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
        $this->target = $target;
        $this->binding_type = $binding_type;
    }

    /**
     * @param array $binding_type
     */
    public function setBindingType(array $binding_type): void
    {
        $this->binding_type = $binding_type;
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
     * @param null|string $binding_view_types
     */
    public function setBindingViewTypes(?string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param mixed $item
     */
    public function removeBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            $index = array_search($item, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addBindingType($item): void
    {
        if ($this->hasBindingType($item)) {
            return;
        }

        $this->binding_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType($item, bool $strict = true): bool
    {
        return in_array($item, $this->binding_type, $strict);
    }

    /**
     * @param null|Model $binding_model_id
     */
    public function setBindingModelId(?Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $help
     */
    public function setHelp(?string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return null|string
     */
    public function getXmlId(): ?string
    {
        return $this->xml_id;
    }

    /**
     * @param mixed $item
     */
    public function removeTarget($item): void
    {
        if ($this->hasTarget($item)) {
            $index = array_search($item, $this->target);
            unset($this->target[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addTarget($item): void
    {
        if ($this->hasTarget($item)) {
            return;
        }

        $this->target[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTarget($item, bool $strict = true): bool
    {
        return in_array($item, $this->target, $strict);
    }

    /**
     * @param array $target
     */
    public function setTarget(array $target): void
    {
        $this->target = $target;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
