<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Studio\Approval;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : studio.approval.rule
 * ---
 * Name : studio.approval.rule
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
final class Rule extends Base
{
    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Group
     * ---
     * Relation : many2one (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $group_id;

    /**
     * Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $method;

    /**
     * Action
     * ---
     * Relation : many2one (ir.actions.actions)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Actions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $action_id;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $message;

    /**
     * Limit approver to this rule
     * ---
     * If set, the user who approves this rule will not be able to approve other rules for the same record
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $exclusive_user;

    /**
     * Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $model_name;

    /**
     * Domain
     * ---
     * If set, the rule will only apply on records that match the domain.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain;

    /**
     * Conditional Rule
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $conditional;

    /**
     * Can be approved
     * ---
     * Whether the rule can be approved by the current user
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $can_validate;

    /**
     * Entries
     * ---
     * Relation : one2many (studio.approval.entry -> rule_id)
     * @see \Flux\OdooApiClient\Model\Object\Studio\Approval\Entry
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $entry_ids;

    /**
     * Number of Entries
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $entries_count;

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
     * @param OdooRelation $group_id Group
     *        ---
     *        Relation : many2one (res.groups)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Groups
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Model
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $group_id, OdooRelation $model_id)
    {
        $this->group_id = $group_id;
        $this->model_id = $model_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("entries_count")
     */
    public function getEntriesCount(): ?int
    {
        return $this->entries_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_validate")
     */
    public function isCanValidate(): ?bool
    {
        return $this->can_validate;
    }

    /**
     * @param bool|null $can_validate
     */
    public function setCanValidate(?bool $can_validate): void
    {
        $this->can_validate = $can_validate;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("entry_ids")
     */
    public function getEntryIds(): ?array
    {
        return $this->entry_ids;
    }

    /**
     * @param OdooRelation[]|null $entry_ids
     */
    public function setEntryIds(?array $entry_ids): void
    {
        $this->entry_ids = $entry_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEntryIds(OdooRelation $item): bool
    {
        if (null === $this->entry_ids) {
            return false;
        }

        return in_array($item, $this->entry_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addEntryIds(OdooRelation $item): void
    {
        if ($this->hasEntryIds($item)) {
            return;
        }

        if (null === $this->entry_ids) {
            $this->entry_ids = [];
        }

        $this->entry_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEntryIds(OdooRelation $item): void
    {
        if (null === $this->entry_ids) {
            $this->entry_ids = [];
        }

        if ($this->hasEntryIds($item)) {
            $index = array_search($item, $this->entry_ids);
            unset($this->entry_ids[$index]);
        }
    }

    /**
     * @param int|null $entries_count
     */
    public function setEntriesCount(?int $entries_count): void
    {
        $this->entries_count = $entries_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("conditional")
     */
    public function isConditional(): ?bool
    {
        return $this->conditional;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param bool|null $conditional
     */
    public function setConditional(?bool $conditional): void
    {
        $this->conditional = $conditional;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("action_id")
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("group_id")
     */
    public function getGroupId(): OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation $group_id
     */
    public function setGroupId(OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("method")
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("domain")
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message")
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("exclusive_user")
     */
    public function isExclusiveUser(): ?bool
    {
        return $this->exclusive_user;
    }

    /**
     * @param bool|null $exclusive_user
     */
    public function setExclusiveUser(?bool $exclusive_user): void
    {
        $this->exclusive_user = $exclusive_user;
    }

    /**
     * @return string|null
     *
     * @SerializedName("model_name")
     */
    public function getModelName(): ?string
    {
        return $this->model_name;
    }

    /**
     * @param string|null $model_name
     */
    public function setModelName(?string $model_name): void
    {
        $this->model_name = $model_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'studio.approval.rule';
    }
}
