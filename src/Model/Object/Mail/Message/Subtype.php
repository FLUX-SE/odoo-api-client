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
 * Info :
 * Class holding subtype definition for messages. Subtypes allow to tune
 * the follower subscription, allowing only some subtypes to be pushed
 * on the Wall.
 */
final class Subtype extends Base
{
    /**
     * Message Type
     * Message subtype gives a more precise type on the message, especially for system notifications. For example, it
     * can be a notification related to a new record (New), or to a stage change in a process (Stage change). Message
     * subtypes allow to precisely tune the notifications the user want to receive on its wall.
     *
     * @var string
     */
    private $name;

    /**
     * Description
     * Description that will be added in the message posted for this subtype. If void, the name will be added
     * instead.
     *
     * @var null|string
     */
    private $description;

    /**
     * Internal Only
     * Messages with internal subtypes will be visible only by employees, aka members of base_user group
     *
     * @var null|bool
     */
    private $internal;

    /**
     * Parent
     * Parent subtype, used for automatic subscription. This field is not correctly named. For example on a project,
     * the parent_id of project subtypes refers to task-related subtypes.
     *
     * @var null|SubtypeAlias
     */
    private $parent_id;

    /**
     * Relation field
     * Field used to link the related model to the subtype model when using automatic subscription on a related
     * document. The field is used to compute getattr(related_document.relation_field).
     *
     * @var null|string
     */
    private $relation_field;

    /**
     * Model
     * Model the subtype applies to. If False, this subtype applies to all models.
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Default
     * Activated by default when subscribing.
     *
     * @var null|bool
     */
    private $default;

    /**
     * Sequence
     * Used to order subtypes.
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Hidden
     * Hide the subtype in the follower options
     *
     * @var null|bool
     */
    private $hidden;

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
     * @param string $name Message Type
     *        Message subtype gives a more precise type on the message, especially for system notifications. For example, it
     *        can be a notification related to a new record (New), or to a stage change in a process (Stage change). Message
     *        subtypes allow to precisely tune the notifications the user want to receive on its wall.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|bool $internal
     */
    public function setInternal(?bool $internal): void
    {
        $this->internal = $internal;
    }

    /**
     * @param null|SubtypeAlias $parent_id
     */
    public function setParentId(?SubtypeAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|string $relation_field
     */
    public function setRelationField(?string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @param null|string $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param null|bool $default
     */
    public function setDefault(?bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|bool $hidden
     */
    public function setHidden(?bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
