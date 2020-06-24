<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.actions
 * Name : ir.actions.actions
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
final class Actions extends Base
{
    /**
     * Name
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
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xml_id;
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @param Model $binding_model_id
     */
    public function setBindingModelId(Model $binding_model_id): void
    {
        $this->binding_model_id = $binding_model_id;
    }

    /**
     * @param null|array $binding_type
     */
    public function setBindingType(?array $binding_type): void
    {
        $this->binding_type = $binding_type;
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
     */
    public function removeBindingType(?array $binding_type): void
    {
        if ($this->hasBindingType($binding_type)) {
            $index = array_search($binding_type, $this->binding_type);
            unset($this->binding_type[$index]);
        }
    }

    /**
     * @param string $binding_view_types
     */
    public function setBindingViewTypes(string $binding_view_types): void
    {
        $this->binding_view_types = $binding_view_types;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
