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
final class ActUrl extends Base
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
     * Action URL
     *
     * @var null|string
     */
    private $url;

    /**
     * Action Target
     *
     * @var null|array
     */
    private $target;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $binding_type
     */
    public function setBindingType(?array $binding_type): void
    {
        $this->binding_type = $binding_type;
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
     * @param string $binding_view_types
     */
    public function setBindingViewTypes(string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @param ?array $binding_type
     */
    public function removeBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            $index = array_search($binding_type, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param ?array $binding_type
     */
    public function addBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            return;
        }

        if (null === $this->binding_type) {
            $this->binding_type = [];
        }

        $this->binding_type[] = $binding_type;
    }

    /**
     * @param ?array $binding_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasBindingType(?array $binding_type, bool $strict = true): bool
    {
        if (null === $this->binding_type) {
            return false;
        }

        return in_array($binding_type, $this->binding_type, $strict);
    }

    /**
     * @param Model $binding_model_id
     */
    public function setBindingModelId(Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @param ?array $target
     */
    public function removeTarget(?array $target): void
    {
        if ($this->hasTarget($target)) {
            $index = array_search($target, $this->target);
            unset($this->target[$index]);
        }
    }

    /**
     * @param ?array $target
     */
    public function addTarget(?array $target): void
    {
        if ($this->hasTarget($target)) {
            return;
        }

        if (null === $this->target) {
            $this->target = [];
        }

        $this->target[] = $target;
    }

    /**
     * @param ?array $target
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTarget(?array $target, bool $strict = true): bool
    {
        if (null === $this->target) {
            return false;
        }

        return in_array($target, $this->target, $strict);
    }

    /**
     * @param null|array $target
     */
    public function setTarget(?array $target): void
    {
        $this->target = $target;
    }

    /**
     * @param null|string $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
