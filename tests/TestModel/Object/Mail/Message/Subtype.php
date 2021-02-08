<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.message.subtype
 * ---
 * Name : mail.message.subtype
 * ---
 * Info :
 * Class holding subtype definition for messages. Subtypes allow to tune
 *                 the follower subscription, allowing only some subtypes to be pushed
 *                 on the Wall.
 */
final class Subtype extends Base
{
    /**
     * Message Type
     * ---
     * Message subtype gives a more precise type on the message, especially for system notifications. For example, it
     * can be a notification related to a new record (New), or to a stage change in a process (Stage change). Message
     * subtypes allow to precisely tune the notifications the user want to receive on its wall.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Description
     * ---
     * Description that will be added in the message posted for this subtype. If void, the name will be added
     * instead.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Internal Only
     * ---
     * Messages with internal subtypes will be visible only by employees, aka members of base_user group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $internal;

    /**
     * Parent
     * ---
     * Parent subtype, used for automatic subscription. This field is not correctly named. For example on a project,
     * the parent_id of project subtypes refers to task-related subtypes.
     * ---
     * Relation : many2one (mail.message.subtype)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message\Subtype
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Relation field
     * ---
     * Field used to link the related model to the subtype model when using automatic subscription on a related
     * document. The field is used to compute getattr(related_document.relation_field).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $relation_field;

    /**
     * Model
     * ---
     * Model the subtype applies to. If False, this subtype applies to all models.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Default
     * ---
     * Activated by default when subscribing.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $default;

    /**
     * Sequence
     * ---
     * Used to order subtypes.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Hidden
     * ---
     * Hide the subtype in the follower options
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hidden;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Message Type
     *        ---
     *        Message subtype gives a more precise type on the message, especially for system notifications. For example, it
     *        can be a notification related to a new record (New), or to a stage change in a process (Stage change). Message
     *        subtypes allow to precisely tune the notifications the user want to receive on its wall.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
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
     * @param bool|null $hidden
     */
    public function setHidden(?bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hidden")
     */
    public function isHidden(): ?bool
    {
        return $this->hidden;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param bool|null $default
     */
    public function setDefault(?bool $default): void
    {
        $this->default = $default;
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
     * @return bool|null
     *
     * @SerializedName("default")
     */
    public function isDefault(): ?bool
    {
        return $this->default;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
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
     * @param string|null $relation_field
     */
    public function setRelationField(?string $relation_field): void
    {
        $this->relation_field = $relation_field;
    }

    /**
     * @return string|null
     *
     * @SerializedName("relation_field")
     */
    public function getRelationField(): ?string
    {
        return $this->relation_field;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param bool|null $internal
     */
    public function setInternal(?bool $internal): void
    {
        $this->internal = $internal;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("internal")
     */
    public function isInternal(): ?bool
    {
        return $this->internal;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
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
        return 'mail.message.subtype';
    }
}
