<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Message;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message\Subtype as SubtypeAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.message.subtype
 * Name : mail.message.subtype
 *
 * Class holding subtype definition for messages. Subtypes allow to tune
 * the follower subscription, allowing only some subtypes to be pushed
 * on the Wall.
 */
final class Subtype extends Base
{
    /**
     * Message Type
     *
     * @var null|string
     */
    private $name;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Internal Only
     *
     * @var bool
     */
    private $internal;

    /**
     * Parent
     *
     * @var SubtypeAlias
     */
    private $parent_id;

    /**
     * Relation field
     *
     * @var string
     */
    private $relation_field;

    /**
     * Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Default
     *
     * @var bool
     */
    private $default;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Hidden
     *
     * @var bool
     */
    private $hidden;

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
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param bool $internal
     */
    public function setInternal(bool $internal): void
    {
        $this->internal = $internal;
    }

    /**
     * @param SubtypeAlias $parent_id
     */
    public function setParentId(SubtypeAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param string $relation_field
     */
    public function setRelationField(string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param bool $default
     */
    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
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
